<x-layouts.app 
    :seo="$trek->seoMetadata"
    :title="$trek->title"
    :description="$trek->short_description"
    :image="$trek->featured_image"
>
    <x-header />
@php
    $galleryItems = $trek->galleryAlbum?->items ?? collect();
    $totalPhotos = $galleryItems->count();
    $galleryJson = $galleryItems->map(fn($item) => [
        'url' => Storage::disk('public')->url($item->file_path),
        'title' => $item->title ?? '',
        'caption' => $item->caption ?? '',
    ])->values();

    $routeMapUrl = !empty($trek->map_image)
        ? Storage::disk('public')->url($trek->map_image)
        : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAyHCn2xRyd59q6a9HpjHnszI6fBUVWaBPwT-VLxgVKbM77YFgu2UR0NTB0od3jHwgTTdMOZ53kQ6Oog7m8W9nOKP5YEVlTiy7KhwhejYYHOewqU2Yi-scwEgOxx-Hpj9XnVzT-3--RwEHasR8fczE0VnrhkxG1_zw8USkGgUTvlY4dT7GsAXmhv73TcyCwOhgCG5-bIr9zfhKYPxqjmjdEi6QftoW4c-nla3fKx61i_XtksWe_eGXH';

    // Calculate dynamic elevation profile from features itinerary
    $elevationPoints = collect();
    $rawFeatures = $trek->features ?? collect();

    $prevAlt = null;
    $maxAscent = 0;
    $totalGain = 0;
    $acclimatizationCount = 0;

    foreach ($rawFeatures as $idx => $feat) {
        $altVal = null;
        if (!empty($feat->altitude)) {
            if (is_numeric($feat->altitude)) {
                $altVal = (int) $feat->altitude;
            } elseif (preg_match('/(\d[\d,]*)/', (string) $feat->altitude, $matches)) {
                $altVal = (int) str_replace(',', '', $matches[1]);
            }
        }

        // Fallback: extract altitude from title or description if altitude field is empty
        if ($altVal === null || $altVal <= 0) {
            $textToSearch = ($feat->title ?? '') . ' ' . strip_tags($feat->description ?? '');
            if (preg_match('/(?:elev(?:ation)?|altitude|peak|summit|pass)?\s*[:(]?\s*(\d{1,2}[,.]?\d{3})\s*(?:m|meters|metres)\b/i', $textToSearch, $m)) {
                $altVal = (int) str_replace([',', '.'], '', $m[1]);
            }
        }

        // Validate realistic alpine elevation (between 100m and 8900m)
        if ($altVal !== null && ($altVal < 100 || $altVal > 8900)) {
            $altVal = null;
        }

        if ($altVal !== null) {
            $text = strtolower(($feat->title ?? '') . ' ' . ($feat->description ?? ''));
            $isAcclimatization = str_contains($text, 'acclimatiz') || str_contains($text, 'rest day') || str_contains($text, 'contingency') || str_contains($text, 'buffer day');
            if ($isAcclimatization) {
                $acclimatizationCount++;
            }

            $delta = 0;
            if ($prevAlt !== null) {
                $delta = $altVal - $prevAlt;
                if ($delta > 0) {
                    $totalGain += $delta;
                    if ($delta > $maxAscent) {
                        $maxAscent = $delta;
                    }
                }
            }

            $cleanTitle = preg_replace('/^(?:trek|fly|drive|hike|climb|cross|early morning (?:hike|trek|climb|flight))\s+(?:to|from|through)?\s*/i', '', $feat->title ?? '');
            $cleanTitle = preg_replace('/\s*\(.*?\)/', '', $cleanTitle);
            $cleanTitle = trim($cleanTitle);
            if (empty($cleanTitle)) {
                $cleanTitle = $feat->title ?? ('Stage ' . ($idx + 1));
            }

            $elevationPoints->push([
                'index' => $idx,
                'day' => $feat->day_label ?: ('Day ' . ($idx + 1)),
                'title' => $feat->title,
                'short_title' => \Illuminate\Support\Str::limit($cleanTitle, 16),
                'altitude' => $altVal,
                'altitude_ft' => number_format((int) round($altVal * 3.28084)),
                'altitude_label' => number_format($altVal) . 'm',
                'delta' => $delta,
                'is_acclimatization' => $isAcclimatization,
            ]);

            $prevAlt = $altVal;
        }
    }

    $hasDynamicElevation = $elevationPoints->count() >= 2;
    $coords = [];
    $gridLines = [];
    $strokeD = '';
    $fillD = '';
    $minAlt = 0;
    $maxAlt = 0;
    $startAlt = 0;
    $endAlt = 0;
    $svgWidth = 900;
    $highestPoint = null;

    if ($hasDynamicElevation) {
        $minAlt = $elevationPoints->min('altitude');
        $maxAlt = $elevationPoints->max('altitude');
        $startAlt = $elevationPoints->first()['altitude'];
        $endAlt = $elevationPoints->last()['altitude'];

        $padding = max(200, (int) round(($maxAlt - $minAlt) * 0.1));
        $chartMin = max(0, (int) (floor(($minAlt - $padding) / 500) * 500));
        $chartMax = (int) (ceil(($maxAlt + $padding) / 500) * 500);
        if ($chartMax <= $chartMin) {
            $chartMax = $chartMin + 1000;
        }

        $pointCount = $elevationPoints->count();
        $nodeSpacing = max(68, min(100, (int) floor(1000 / max(1, $pointCount))));
        $svgWidth = max(900, ($pointCount * $nodeSpacing) + 140);
        $svgHeight = 270;
        $topMargin = 45;
        $bottomMargin = 65;
        $leftMargin = 70;
        $rightMargin = 70;
        $usableWidth = $svgWidth - $leftMargin - $rightMargin;
        $usableHeight = $svgHeight - $topMargin - $bottomMargin;

        foreach ($elevationPoints as $i => $pt) {
            $x = $leftMargin + ($pointCount > 1 ? ($i * ($usableWidth / ($pointCount - 1))) : ($usableWidth / 2));
            $ratio = ($pt['altitude'] - $chartMin) / ($chartMax - $chartMin);
            $y = $topMargin + (1 - $ratio) * $usableHeight;
            $isHigh = ($pt['altitude'] === $maxAlt);
            $coordData = array_merge($pt, [
                'x' => round($x, 1),
                'y' => round($y, 1),
                'is_highest' => $isHigh,
            ]);
            $coords[] = $coordData;
            if ($isHigh && $highestPoint === null) {
                $highestPoint = $coordData;
            }
        }

        // Generate smooth cubic spline / Catmull-Rom path for natural mountain curve
        $pathCmds = [];
        $len = count($coords);
        for ($i = 0; $i < $len; $i++) {
            if ($i === 0) {
                $pathCmds[] = "M {$coords[0]['x']} {$coords[0]['y']}";
            } else {
                $p0 = $coords[max(0, $i - 2)];
                $p1 = $coords[$i - 1];
                $p2 = $coords[$i];
                $p3 = $coords[min($len - 1, $i + 1)];

                $cp1x = round($p1['x'] + ($p2['x'] - $p0['x']) / 6, 1);
                $cp1y = round($p1['y'] + ($p2['y'] - $p0['y']) / 6, 1);
                $cp2x = round($p2['x'] - ($p3['x'] - $p1['x']) / 6, 1);
                $cp2y = round($p2['y'] - ($p3['y'] - $p1['y']) / 6, 1);

                $pathCmds[] = "C {$cp1x} {$cp1y}, {$cp2x} {$cp2y}, {$p2['x']} {$p2['y']}";
            }
        }
        $strokeD = implode(' ', $pathCmds);

        $firstX = $coords[0]['x'];
        $lastX = $coords[$len - 1]['x'];
        $groundY = $svgHeight - $bottomMargin + 18;
        $fillD = "{$strokeD} L {$lastX} {$groundY} L {$firstX} {$groundY} Z";

        $range = $chartMax - $chartMin;
        $step = 500;
        if ($range > 3500) {
            $step = 1000;
        } elseif ($range <= 1500) {
            $step = 250;
        }

        for ($a = $chartMin + $step; $a <= $chartMax; $a += $step) {
            $r = ($a - $chartMin) / ($chartMax - $chartMin);
            $gy = round($topMargin + (1 - $r) * $usableHeight, 1);
            $gridLines[] = ['alt' => $a, 'y' => $gy];
        }
    }
@endphp
    <main class="bg-surface w-full pt-28 pb-20 lg:pb-0" x-data="{
        bookingModalOpen: false,
        galleryOpen: false,
        activeGalleryIndex: 0,
        galleryPhotos: {{ Js::from($galleryJson) }},
        prevGalleryPhoto() {
            if (!this.galleryPhotos || this.galleryPhotos.length === 0) return;
            this.activeGalleryIndex = (this.activeGalleryIndex - 1 + this.galleryPhotos.length) % this.galleryPhotos.length;
        },
        nextGalleryPhoto() {
            if (!this.galleryPhotos || this.galleryPhotos.length === 0) return;
            this.activeGalleryIndex = (this.activeGalleryIndex + 1) % this.galleryPhotos.length;
        },
        selectedDeparture: '{{ $departures->isNotEmpty() ? $departures->first()->id : 'custom' }}',
        selectedDepartureLabel: '{{ $departures->isNotEmpty() ? ($departures->first()->start_date?->format('M d, Y') . ' – ' . $departures->first()->end_date?->format('M d, Y')) : 'Custom / Flexible Dates' }}',
        trekkersCount: 1,
        basePrice: {{ (float) ($trek->price_from ?: 1750) }},
        depositPerPerson: {{ (float) ($trek->deposit_requirement ? (float) filter_var($trek->deposit_requirement, FILTER_SANITIZE_NUMBER_INT) : 350) ?: 350 }},
        name: '',
        email: '',
        phone: '',
        country: '',
        notes: '',
        submitting: false,
        submitted: false,
        successMessage: '',
        errorMessage: '',

        openBooking(depId = null, depLabel = null) {
            if (depId) {
                this.selectedDeparture = depId;
                const sel = document.getElementById('departure-select');
                if (sel) { sel.value = depId; }
            } else {
                const sel = document.getElementById('departure-select');
                if (sel && sel.value) { this.selectedDeparture = sel.value; }
            }

            if (depLabel) {
                this.selectedDepartureLabel = depLabel;
            } else {
                const sel = document.getElementById('departure-select');
                if (sel && sel.selectedIndex >= 0) {
                    this.selectedDepartureLabel = sel.options[sel.selectedIndex].text;
                }
            }

            this.submitted = false;
            this.errorMessage = '';
            this.bookingModalOpen = true;
        },

        async submitBooking() {
            if (!this.name || !this.email || !this.phone) {
                this.errorMessage = 'Please provide your full name, email address, and phone/WhatsApp number.';
                return;
            }
            this.submitting = true;
            this.errorMessage = '';

            try {
                const response = await fetch('{{ route('services.book', ['categorySlug' => $trek->category?->slug ?? 'trekking', 'serviceSlug' => $trek->slug]) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        name: this.name,
                        email: this.email,
                        phone: this.phone,
                        departure_id: this.selectedDeparture,
                        trekkers_count: this.trekkersCount,
                        country: this.country,
                        notes: this.notes
                    })
                });

                const data = await response.json();
                if (response.ok && data.success) {
                    this.submitted = true;
                    this.successMessage = data.message;
                } else {
                    this.errorMessage = data.message || 'Unable to submit booking. Please check your information.';
                }
            } catch (err) {
                this.errorMessage = 'Network connection issue. Please try again or message us directly on WhatsApp.';
            } finally {
                this.submitting = false;
            }
        }
    }">
        <div class="flex w-full flex-col">
            <!-- Top Technical Breadcrumbs & Status Bar -->
            <div class="bg-surface-container-low py-space-sm px-gutter-mobile lg:px-gutter-desktop w-full">
                <div class="max-w-max-content-width gap-space-sm mx-auto flex flex-wrap items-center justify-between">
                    <div class="gap-space-2xs font-label-sm text-label-sm text-tertiary flex items-center flex-wrap">
                        <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
                        <x-lucide-chevron-right class="size-[14px]" />
                        @if($trek->category)
                            @if($trek->category->parent)
                                <a class="hover:text-primary transition-colors" href="{{ route('services.category', $trek->category->parent->slug) }}">{{ $trek->category->parent->name }}</a>
                                <x-lucide-chevron-right class="size-[14px]" />
                            @endif
                            <a class="hover:text-primary transition-colors" href="{{ route('services.category', $trek->category->slug) }}">{{ $trek->category->name }}</a>
                            <x-lucide-chevron-right class="size-[14px]" />
                        @endif
                        <span class="text-on-surface font-semibold truncate max-w-xs md:max-w-md">{{ $trek->title }}</span>
                    </div>
                    <div class="gap-space-md font-badge-caption text-badge-caption flex items-center uppercase">
                        @php
                            $seasonYears = date('Y') . '/' . (date('Y') + 1);
                        @endphp
                        <a href="#upcoming-departures" class="gap-space-2xs text-primary hover:text-amber-flare transition-colors flex items-center font-bold tracking-wider group cursor-pointer bg-primary/10 hover:bg-primary/20 px-3 py-1 rounded-full border border-primary/20">
                            <span class="bg-success h-2 w-2 animate-pulse rounded-full"></span>
                            <span>{{ $seasonYears }} Season Open</span>
                            <x-lucide-chevron-down class="size-3.5 transition-transform group-hover:translate-y-0.5" />
                        </a>
                        <span class="text-tertiary/50 hidden sm:inline">•</span>
                        <span class="text-on-surface-variant font-medium hidden sm:inline">Permit Status: TAAN Validated</span>
                    </div>
                </div>
            </div>
            <!-- Hero Headline & Visual Header Panel -->
            <section class="bg-surface-container-lowest px-gutter-mobile lg:px-gutter-desktop pt-space-xl pb-space-2xl w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="gap-space-xs mb-space-sm flex flex-wrap items-center">
                        @if ($trek->difficulty_level)
                            <span class="bg-primary-container/20 text-on-primary-container px-space-sm py-space-2xs text-badge-caption font-badge-caption inline-flex items-center gap-1 rounded-md uppercase">
                                <x-lucide-mountain class="size-[14px]" />
                                Circuit Grade: {{ ucfirst($trek->difficulty_level) }}
                            </span>
                        @endif
                        @if ($trek->duration)
                            <span class="bg-surface-container-high text-tertiary px-space-sm py-space-2xs text-badge-caption font-badge-caption inline-flex items-center gap-1 rounded-md uppercase">
                                {{ $trek->duration }}
                            </span>
                        @endif
                        @if ($trek->maximum_altitude)
                            <span class="bg-surface-container-high text-tertiary px-space-sm py-space-2xs text-badge-caption font-badge-caption inline-flex items-center gap-1 rounded-md uppercase">
                                Max Alt: {{ $trek->maximum_altitude }}
                            </span>
                        @endif
                    </div>
                    <div class="gap-space-xl grid grid-cols-1 items-start lg:grid-cols-12">
                        <div class="space-y-space-md lg:col-span-8">
                            <h1 class="font-headline-lg text-2xl sm:text-3xl md:text-4xl lg:text-headline-lg text-on-surface tracking-tight uppercase">
                                {{ $trek->title }}
                            </h1>
                            @if ($trek->short_description)
                                <p class="font-body-lg text-base sm:text-body-lg text-tertiary max-w-3xl">
                                    {{ $trek->short_description }}
                                </p>
                            @endif
                            <!-- Imagery Mosaic Strip -->
                            <div class="gap-space-sm pt-space-xs grid grid-cols-1 sm:grid-cols-3">
                                @if($totalPhotos > 0)
                                    <!-- Image 1: Main Large -->
                                    <div class="group relative h-56 sm:h-72 overflow-hidden rounded-xl shadow-md sm:col-span-2 cursor-pointer" @click="activeGalleryIndex = 0; galleryOpen = true">
                                        <img
                                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                            src="{{ Storage::disk('public')->url($galleryItems[0]->file_path) }}"
                                            alt="{{ $galleryItems[0]->title ?? $trek->title }}"
                                        />
                                        <div class="bg-ridge-deep/80 text-summit-white font-badge-caption text-badge-caption absolute bottom-3 left-3 flex items-center gap-1.5 rounded-md px-3 py-1.5 uppercase backdrop-blur-md max-w-[90%]">
                                            <x-lucide-camera class="text-primary-container size-[16px] shrink-0" />
                                            <span class="truncate">{{ $galleryItems[0]->caption ?: ($galleryItems[0]->title ?: $trek->title) }}</span>
                                        </div>
                                    </div>

                                    <!-- Right Column: Image 2 & Image 3 -->
                                    <div class="gap-space-sm flex h-40 sm:h-72 flex-row sm:flex-col">
                                        <!-- Image 2 -->
                                        @if($totalPhotos >= 2)
                                            <div class="group relative w-1/2 sm:w-full h-full sm:h-1/2 overflow-hidden rounded-xl shadow-md cursor-pointer" @click="activeGalleryIndex = 1; galleryOpen = true">
                                                <img
                                                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                                    src="{{ Storage::disk('public')->url($galleryItems[1]->file_path) }}"
                                                    alt="{{ $galleryItems[1]->title }}"
                                                />
                                                <div class="bg-ridge-deep/75 text-summit-white font-label-sm text-label-sm absolute bottom-2 left-2 rounded-md px-2 py-0.5 truncate max-w-[90%]">
                                                    {{ $galleryItems[1]->caption ?: ($galleryItems[1]->title ?: '') }}
                                                </div>
                                            </div>
                                        @else
                                            <div class="relative w-1/2 sm:w-full h-full sm:h-1/2 overflow-hidden rounded-xl bg-surface-container flex items-center justify-center text-tertiary">
                                                <x-lucide-mountain class="size-6 text-primary/40" />
                                            </div>
                                        @endif

                                        <!-- Image 3 (with +N card overlay if > 3 photos) -->
                                        @if($totalPhotos >= 3)
                                            <div class="group relative w-1/2 sm:w-full h-full sm:h-1/2 overflow-hidden rounded-xl shadow-md cursor-pointer" @click="activeGalleryIndex = 2; galleryOpen = true">
                                                <img
                                                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                                    src="{{ Storage::disk('public')->url($galleryItems[2]->file_path) }}"
                                                    alt="{{ $galleryItems[2]->title }}"
                                                />
                                                @if($totalPhotos > 3)
                                                    <div class="absolute inset-0 bg-ridge-deep/75 group-hover:bg-ridge-deep/85 flex flex-col items-center justify-center text-summit-white transition-all backdrop-blur-[2px]">
                                                        <span class="text-xl sm:text-2xl font-black tracking-tight text-primary-container">+{{ $totalPhotos - 3 }}</span>
                                                        <span class="text-[10px] font-bold uppercase tracking-wider text-summit-white">More Photos</span>
                                                    </div>
                                                @else
                                                    <div class="bg-ridge-deep/75 text-summit-white font-label-sm text-label-sm absolute bottom-2 left-2 rounded-md px-2 py-0.5 truncate max-w-[90%]">
                                                        {{ $galleryItems[2]->caption ?: ($galleryItems[2]->title ?: '') }}
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <div class="relative w-1/2 sm:w-full h-full sm:h-1/2 overflow-hidden rounded-xl bg-surface-container flex items-center justify-center text-tertiary">
                                                <x-lucide-mountain class="size-6 text-primary/40" />
                                            </div>
                                        @endif
                                    </div>
                                @elseif($trek->featured_image)
                                    <!-- Fallback: Service Featured Image -->
                                    <div class="group relative h-72 overflow-hidden rounded-xl shadow-md sm:col-span-3">
                                        <img
                                            class="h-full w-full object-cover"
                                            src="{{ Storage::disk('public')->url($trek->featured_image) }}"
                                            alt="{{ $trek->title }}"
                                        />
                                        <div class="bg-ridge-deep/80 text-summit-white font-badge-caption text-badge-caption absolute bottom-3 left-3 flex items-center gap-1.5 rounded-md px-3 py-1.5 uppercase backdrop-blur-md">
                                            <x-lucide-camera class="text-primary-container size-[16px]" />
                                            {{ $trek->title }}
                                        </div>
                                    </div>
                                @else
                                    <!-- Fallback Placeholder -->
                                    <div class="group relative h-72 overflow-hidden rounded-xl shadow-md sm:col-span-2">
                                        <img
                                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBl3rzSjmzyUAbsNtQo1iajDXG6R0468kIY4pBYxKG0Il4bOgcfSuo-XIKxRw4oHikE_kQCAJ7G4gLcZSdl_g7qZqLtTkkds9koIWwA105QqgSaC9BoSi63ez-J9yI4XslLzET_0spEZT6bI5G65Zb25Q7YFV31IswAajpF6tK3_s79n_tjxqnYvOdCjZ1o4umB8xkjvCFnThyPTUSDaK9bdZvk29PcfkSiIji5ZNuOv_SQAU_40aG8"
                                            alt="{{ $trek->title }}"
                                        />
                                        <div class="bg-ridge-deep/80 text-summit-white font-badge-caption text-badge-caption absolute bottom-3 left-3 flex items-center gap-1.5 rounded-md px-3 py-1.5 uppercase backdrop-blur-md">
                                            <x-lucide-camera class="text-primary-container size-[16px]" />
                                            {{ $trek->title }}
                                        </div>
                                    </div>
                                    <div class="gap-space-sm flex h-72 flex-col">
                                        <div class="group relative h-1/2 overflow-hidden rounded-xl shadow-md">
                                            <img
                                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuASTFDbBT_GYwEqYMyo_I5DWjTFwOpTwG5jrI0udNfRiWQ96z9-VVWetVBow8DK61WkEXZGyhFe-v7hIdl3N31mK_uWpWjGTph4SY4Va4qwx_gRjhCeJbb1a6uxFMA5LXUjVfYcXV-SO9C2i0peuGe43EW3gln8JIp4wAHJbxbE-bv5ZIAdpBIITYe2pGP6ifJU_VHBXY7-2TysV-nE_bMHt4qyVivt7UBTdgpPeRRETishS8EdoEF9"
                                                alt="{{ $trek->title }}"
                                            />
                                        </div>
                                        <div class="group relative h-1/2 overflow-hidden rounded-xl shadow-md">
                                            <img
                                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCK4uDIdZsdTjdxOuKwLRVtlM45dtFab_Uj0dpyR1Qx3USWrX-tPKmTzh5D32NqdDfW-m4OGyIl6tldnKZrf8mApaIXRM1tAbKiPPnevHtVCMF86C22eUAf3gg1Ti-gAr-adVdho5r94sPvqaJcEUd7Gi7Hk4tsXWj7rwTRgEjsLBM-gJ5-rl4q-SONl7STJhvGaX5SbtSGQ2vOx4JjvZQl7dT1NU78SRfg8vxU-g8ie3WgbZhRjBz6"
                                                alt="{{ $trek->title }}"
                                            />
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Sticky Quick Booking Matrix -->
                        <div id="booking" class="scroll-mt-28 bg-surface-container-low p-space-lg space-y-space-md rounded-xl shadow-md lg:col-span-4">
                            <div class="flex items-baseline justify-between">
                                <div>
                                    <span class="font-body-sm text-body-sm text-tertiary block">All-Inclusive Standard Rate</span>
                                    <span class="font-headline-lg text-headline-lg text-on-surface font-bold">${{ number_format((float) $trek->price_from, 0) }}</span>
                                    <span class="font-body-sm text-body-sm text-tertiary"> USD / Person</span>
                                </div>
                                <span class="bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption px-space-xs rounded py-1 font-bold uppercase">
                                    Guaranteed Run
                                </span>
                            </div>
                            <div class="space-y-space-xs pt-space-xs">
                                <div class="flex items-center justify-between">
                                    <label class="font-label-sm text-label-sm text-on-surface-variant font-semibold uppercase">Select Departure Date</label>
                                    <a href="#upcoming-departures" class="text-[11px] font-bold text-primary hover:underline flex items-center gap-1">
                                        View Schedule <x-lucide-arrow-down class="size-3" />
                                    </a>
                                </div>
                                <select
                                    class="bg-surface-container-lowest text-on-surface font-body-md text-body-md p-space-sm focus:ring-primary w-full cursor-pointer rounded-xl shadow-sm focus:ring-2 focus:outline-none border border-outline/10 text-sm"
                                    id="departure-select"
                                    x-model="selectedDeparture"
                                    @change="
                                        const opt = $event.target.options[$event.target.selectedIndex];
                                        if (opt) { selectedDepartureLabel = opt.text; }
                                    "
                                >
                                    @forelse($departures as $dep)
                                        @php
                                            $spotsLeft = max(0, $dep->seats_total - $dep->seats_booked);
                                        @endphp
                                        <option value="{{ $dep->id }}">
                                            {{ $dep->start_date?->format('M d') }} – {{ $dep->end_date?->format('M d, Y') }} ({{ $spotsLeft }} {{ Str::plural('seat', $spotsLeft) }} left)
                                        </option>
                                    @empty
                                        <option value="custom">Inquire for Flexible Dates / Custom Group</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="bg-surface-container-lowest p-space-sm space-y-space-2xs text-body-sm text-tertiary rounded-lg">
                                <div class="flex items-center justify-between">
                                    <span>Deposit Requirement:</span>
                                    <span class="text-on-surface font-semibold">20% (${{ number_format((float) ($trek->deposit_requirement ?: 350)) }} USD)</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Group Size Cap:</span>
                                    <span class="text-on-surface font-semibold">Max {{ $trek->max_group_size ?: 8 }} Trekkers</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Heli-Evac Coverage:</span>
                                    <span class="text-primary flex items-center gap-1 font-medium">
                                        <x-lucide-shield-check class="size-[15px]" /> {{ $trek->heli_evac_coverage ?: 'Mandatory / Monitored' }}
                                    </span>
                                </div>
                            </div>
                            <div class="gap-space-xs pt-space-2xs flex flex-col">
                                <button 
                                    type="button" 
                                    @click="openBooking()"
                                    class="py-space-sm px-space-md bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md w-full rounded-xl text-center font-bold tracking-wider uppercase shadow-sm transition-all cursor-pointer"
                                >
                                    Reserve Your Place
                                </button>
                                <button 
                                    type="button" 
                                    @click="openBooking('custom', 'Custom / Private Date Request')"
                                    class="py-space-sm px-space-md bg-surface-container-highest hover:bg-mist-slate text-on-surface font-label-md text-label-md w-full rounded-xl text-center font-bold tracking-wider uppercase transition-colors cursor-pointer"
                                >
                                    Request Private / Custom Date
                                </button>
                                <a
                                    class="gap-space-2xs py-space-xs text-on-surface-variant hover:text-primary font-label-sm text-label-sm flex w-full items-center justify-center font-semibold transition-colors"
                                    href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->whatsapp ?? '97714700000') }}"
                                    rel="noopener noreferrer"
                                    target="_blank"
                                >
                                    <x-lucide-message-circle class="size-[18px]" />
                                    Talk to Operations on WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Quick Info Metric Bar -->
            <section class="bg-surface-container py-space-md px-gutter-mobile lg:px-gutter-desktop w-full">
                <div class="max-w-max-content-width gap-space-md text-on-surface mx-auto grid grid-cols-2 md:grid-cols-5">
                    <div class="gap-space-xs flex items-center">
                        <x-lucide-timer class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                Trek Duration
                            </div>
                            <div class="font-label-md text-label-md font-bold">{{ $trek->duration ?: '16 Days High Loop' }}</div>
                        </div>
                    </div>
                    <div class="gap-space-xs flex items-center">
                        <x-lucide-mountain class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                Maximum Altitude
                            </div>
                            <div class="font-label-md text-label-md font-bold">{{ $trek->maximum_altitude ?: '5,545m' }}</div>
                        </div>
                    </div>
                    <div class="gap-space-xs flex items-center">
                        <x-lucide-plane-takeoff class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                Start &amp; End Point
                            </div>
                            <div class="font-label-md text-label-md font-bold">{{ $trek->start_end_point ?: 'Lukla (Tenzing-Hillary)' }}</div>
                        </div>
                    </div>
                    <div class="gap-space-xs flex items-center">
                        <x-lucide-users class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                Support Ratio
                            </div>
                            <div class="font-label-md text-label-md font-bold">{{ $trek->support_ratio ?: '1 Guide:4 & 1 Porter:2' }}</div>
                        </div>
                    </div>
                    <div class="gap-space-xs col-span-2 flex items-center md:col-span-1">
                        <x-lucide-sun class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                Prime Seasons
                            </div>
                            <div class="font-label-md text-label-md font-bold">{{ $trek->best_season ?: 'Mar–May & Oct–Dec' }}</div>
                        </div>
                    </div>
                </div>    </div>
            </section>
            <!-- Interactive Elevation Profile & Route Architecture -->
            <section class="bg-surface-container-lowest py-space-2xl px-gutter-mobile lg:px-gutter-desktop w-full">
                <div class="max-w-max-content-width space-y-space-lg mx-auto">
                    <div class="gap-space-sm flex flex-col justify-between md:flex-row md:items-end">
                        <div>
                            <span class="font-badge-caption text-badge-caption text-primary block font-bold tracking-widest uppercase">Topographic Cross-Section</span>
                            <h2 id="elevation-acclimatization-curve" class="font-headline-md text-headline-md text-on-surface uppercase">
                                Elevation &amp; Acclimatization Curve
                            </h2>
                        </div>
                        <div class="gap-space-md text-body-sm text-tertiary flex flex-wrap items-center">
                            @if($hasDynamicElevation)
                                <span class="flex items-center gap-1.5"><span class="bg-primary h-3 w-3 rounded-full"></span> {{ $elevationPoints->count() }} Route Checkpoints</span>
                                <span class="bg-surface-container px-2.5 py-1 rounded-md text-xs font-mono font-semibold text-on-surface">Peak: {{ number_format($maxAlt) }}m</span>
                                <span class="bg-surface-container px-2.5 py-1 rounded-md text-xs font-mono text-tertiary">Start: {{ number_format($startAlt) }}m</span>
                            @else
                                <span class="flex items-center gap-1.5"><span class="bg-primary h-3 w-3 rounded-full"></span> Max Altitude: {{ $trek->maximum_altitude ?: 'Himalayan Pass' }}</span>
                            @endif
                        </div>
                    </div>

                    @if($hasDynamicElevation)
                        <!-- Dynamic SVG Chart Container with Alpine.js Tooltip Interaction -->
                        <div 
                            class="bg-surface-container-low p-space-md md:p-space-lg rounded-2xl shadow-sm border border-outline/10 relative"
                            x-data="{ 
                                activePoint: null,
                                tooltipX: 0,
                                tooltipY: 0,
                                setPoint(pt, evt) {
                                    this.activePoint = pt;
                                    const rect = evt.currentTarget.getBoundingClientRect();
                                    const parentRect = this.$el.getBoundingClientRect();
                                    this.tooltipX = rect.left - parentRect.left + (rect.width / 2);
                                    this.tooltipY = rect.top - parentRect.top - 12;
                                },
                                clearPoint() {
                                    this.activePoint = null;
                                }
                            }"
                        >
                            <!-- Floating Alpine.js Telemetry Card / Tooltip -->
                            <div 
                                x-show="activePoint" 
                                x-cloak
                                x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 translate-y-1 scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                class="absolute z-30 pointer-events-none -translate-x-1/2 -translate-y-full mb-2 min-w-[200px] max-w-xs bg-ridge-deep/95 backdrop-blur-md text-summit-white rounded-xl p-3 shadow-xl border border-outline/20 text-left"
                                :style="`left: ${tooltipX}px; top: ${tooltipY}px;`"
                            >
                                <div class="flex items-center justify-between gap-2 border-b border-outline/20 pb-1.5 mb-1.5">
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-primary-container" x-text="activePoint?.day"></span>
                                    <template x-if="activePoint?.is_highest">
                                        <span class="text-[9px] font-black uppercase px-1.5 py-0.5 rounded bg-amber-500/20 text-amber-300 border border-amber-400/30">
                                            Peak Alt
                                        </span>
                                    </template>
                                    <template x-if="activePoint?.is_acclimatization && !activePoint?.is_highest">
                                        <span class="text-[9px] font-bold uppercase px-1.5 py-0.5 rounded bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                                            Rest/Acclimatize
                                        </span>
                                    </template>
                                </div>
                                <div class="font-headline-sm text-xs font-bold truncate text-summit-white mb-1" x-text="activePoint?.title"></div>
                                <div class="flex items-baseline justify-between gap-2 text-xs">
                                    <div class="font-mono font-bold text-summit-white text-sm">
                                        <span x-text="activePoint?.altitude_label"></span>
                                        <span class="text-[10px] text-tertiary font-normal" x-text="`(${activePoint?.altitude_ft} ft)`"></span>
                                    </div>
                                    <template x-if="activePoint?.delta !== undefined && activePoint?.delta !== 0">
                                        <span 
                                            class="text-[11px] font-mono font-semibold"
                                            :class="activePoint.delta > 0 ? 'text-amber-300' : 'text-sky-300'"
                                            x-text="`${activePoint.delta > 0 ? '+' : ''}${activePoint.delta}m`"
                                        ></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Horizontal Scrollable Canvas Area -->
                            <div class="w-full overflow-x-auto pb-2 scrollbar-thin">
                                <div class="relative" style="min-width: {{ $svgWidth }}px;">
                                    <svg
                                        class="h-72 w-full overflow-visible"
                                        fill="none"
                                        viewBox="0 0 {{ $svgWidth }} 270"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <defs>
                                            <linearGradient id="elevationGrad" x1="0%" x2="0%" y1="0%" y2="100%">
                                                <stop offset="0%" stop-color="#f6ba1a" stop-opacity="0.45"></stop>
                                                <stop offset="80%" stop-color="#f6ba1a" stop-opacity="0.08"></stop>
                                                <stop offset="100%" stop-color="#f6ba1a" stop-opacity="0.0"></stop>
                                            </linearGradient>
                                            <filter id="nodeShadow" x="-20%" y="-20%" width="140%" height="140%">
                                                <feDropShadow dx="0" dy="2" stdDeviation="2" flood-color="#000" flood-opacity="0.2"/>
                                            </filter>
                                        </defs>

                                        <!-- Dynamic Horizontal Grid Lines -->
                                        @foreach($gridLines as $gl)
                                            <line
                                                stroke="#d2dce4"
                                                stroke-dasharray="4 4"
                                                stroke-width="1"
                                                x1="55"
                                                x2="{{ $svgWidth - 45 }}"
                                                y1="{{ $gl['y'] }}"
                                                y2="{{ $gl['y'] }}"
                                            ></line>
                                            <text class="font-mono text-[11px]" fill="#526070" x="12" y="{{ $gl['y'] + 4 }}">{{ number_format($gl['alt']) }}m</text>
                                        @endforeach

                                        <!-- Mountain Profile Fill Area -->
                                        <path
                                            d="{{ $fillD }}"
                                            fill="url(#elevationGrad)"
                                        ></path>

                                        <!-- Mountain Profile Stroke Curve -->
                                        <path
                                            d="{{ $strokeD }}"
                                            stroke="#d49806"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="3"
                                        ></path>

                                        <!-- Vertical Guide Lines & Interactive Checkpoint Nodes -->
                                        @foreach($coords as $coord)
                                            @php
                                                $isHighest = $coord['is_highest'];
                                                $isAcclimatize = $coord['is_acclimatization'];
                                                $groundY = 270 - 65 + 18;
                                            @endphp

                                            <!-- Vertical drop line -->
                                            <line 
                                                x1="{{ $coord['x'] }}" 
                                                x2="{{ $coord['x'] }}" 
                                                y1="{{ $coord['y'] }}" 
                                                y2="{{ $groundY }}" 
                                                stroke="{{ $isHighest ? '#d49806' : '#d2dce4' }}" 
                                                stroke-width="{{ $isHighest ? '1.5' : '1' }}"
                                                stroke-dasharray="{{ $isHighest ? 'none' : '3 3' }}"
                                                opacity="{{ $isHighest ? '0.7' : '0.45' }}"
                                            />

                                            <!-- Node Marker Group with hover events -->
                                            <g 
                                                class="cursor-pointer transition-transform duration-200"
                                                @mouseenter="setPoint({{ Js::from($coord) }}, $event)"
                                                @mouseleave="clearPoint()"
                                                @click="setPoint({{ Js::from($coord) }}, $event)"
                                            >
                                                @if($isHighest)
                                                    <!-- Outer pulsing beacon for Highest Point -->
                                                    <circle
                                                        cx="{{ $coord['x'] }}"
                                                        cy="{{ $coord['y'] }}"
                                                        fill="#f6ba1a"
                                                        fill-opacity="0.25"
                                                        r="12"
                                                        class="animate-ping"
                                                    ></circle>
                                                    <circle
                                                        cx="{{ $coord['x'] }}"
                                                        cy="{{ $coord['y'] }}"
                                                        fill="#f6ba1a"
                                                        r="7"
                                                        stroke="#5c4300"
                                                        stroke-width="2.5"
                                                        filter="url(#nodeShadow)"
                                                    ></circle>

                                                    <!-- Peak Callout Badge -->
                                                    <rect
                                                        x="{{ $coord['x'] - 52 }}"
                                                        y="{{ max(12, $coord['y'] - 32) }}"
                                                        width="104"
                                                        height="20"
                                                        rx="10"
                                                        fill="#0f1821"
                                                        stroke="#f6ba1a"
                                                        stroke-width="1.5"
                                                    />
                                                    <text
                                                        class="text-[10px] font-extrabold uppercase font-mono tracking-wider"
                                                        fill="#f6ba1a"
                                                        text-anchor="middle"
                                                        x="{{ $coord['x'] }}"
                                                        y="{{ max(26, $coord['y'] - 18) }}"
                                                    >
                                                        ★ {{ $coord['altitude_label'] }}
                                                    </text>
                                                @elseif($isAcclimatize)
                                                    <!-- Acclimatization rest node -->
                                                    <circle
                                                        cx="{{ $coord['x'] }}"
                                                        cy="{{ $coord['y'] }}"
                                                        fill="#25d366"
                                                        r="5.5"
                                                        stroke="#ffffff"
                                                        stroke-width="2"
                                                        filter="url(#nodeShadow)"
                                                    ></circle>
                                                @else
                                                    <!-- Standard Stage Node -->
                                                    <circle
                                                        cx="{{ $coord['x'] }}"
                                                        cy="{{ $coord['y'] }}"
                                                        fill="#526070"
                                                        r="4.5"
                                                        stroke="#ffffff"
                                                        stroke-width="1.8"
                                                        filter="url(#nodeShadow)"
                                                    ></circle>
                                                @endif

                                                <!-- Invisible larger hit area for easy tapping / hover -->
                                                <circle
                                                    cx="{{ $coord['x'] }}"
                                                    cy="{{ $coord['y'] }}"
                                                    fill="transparent"
                                                    r="18"
                                                ></circle>

                                                <!-- Milestone Labels below baseline -->
                                                <text
                                                    class="text-[10px] font-bold uppercase tracking-wider"
                                                    fill="{{ $isHighest ? '#d49806' : ($isAcclimatize ? '#25d366' : '#795900') }}"
                                                    text-anchor="middle"
                                                    x="{{ $coord['x'] }}"
                                                    y="238"
                                                >
                                                    {{ $coord['day'] }}
                                                </text>

                                                <text
                                                    class="text-[10px] font-bold font-mono"
                                                    fill="#121d26"
                                                    text-anchor="middle"
                                                    x="{{ $coord['x'] }}"
                                                    y="251"
                                                >
                                                    {{ $coord['altitude_label'] }}
                                                </text>

                                                <text
                                                    class="text-[9px] font-medium"
                                                    fill="#526070"
                                                    text-anchor="middle"
                                                    x="{{ $coord['x'] }}"
                                                    y="263"
                                                >
                                                    {{ $coord['short_title'] }}
                                                </text>
                                            </g>
                                        @endforeach
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Dynamic Alpine Telemetry Strip -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 pt-1">
                            <div class="bg-surface-container-low p-4 rounded-xl border border-outline/10 shadow-sm flex items-start gap-3">
                                <div class="p-2.5 bg-primary/15 text-primary rounded-xl shrink-0">
                                    <x-lucide-mountain class="size-5" />
                                </div>
                                <div class="min-w-0">
                                    <span class="text-[11px] font-bold text-tertiary uppercase tracking-wider block">Peak Elevation</span>
                                    <div class="text-base sm:text-lg font-black text-on-surface truncate">
                                        {{ number_format($maxAlt) }}m
                                        <span class="text-xs text-tertiary font-normal">/ {{ number_format(round($maxAlt * 3.28084)) }}ft</span>
                                    </div>
                                    <span class="text-[11px] text-tertiary truncate block">{{ $highestPoint['title'] ?? 'Summit Point' }}</span>
                                </div>
                            </div>

                            <div class="bg-surface-container-low p-4 rounded-xl border border-outline/10 shadow-sm flex items-start gap-3">
                                <div class="p-2.5 bg-primary/15 text-primary rounded-xl shrink-0">
                                    <x-lucide-trending-up class="size-5" />
                                </div>
                                <div class="min-w-0">
                                    <span class="text-[11px] font-bold text-tertiary uppercase tracking-wider block">Max Daily Ascent</span>
                                    <div class="text-base sm:text-lg font-black text-on-surface truncate">
                                        +{{ number_format($maxAscent) }}m
                                        <span class="text-xs text-tertiary font-normal">/ day</span>
                                    </div>
                                    <span class="text-[11px] text-tertiary block">
                                        @if($maxAscent <= 600)
                                            Safe acclimatization gradient
                                        @else
                                            Acclimatization monitored
                                        @endif
                                    </span>
                                </div>
                            </div>

                            <div class="bg-surface-container-low p-4 rounded-xl border border-outline/10 shadow-sm flex items-start gap-3">
                                <div class="p-2.5 bg-primary/15 text-primary rounded-xl shrink-0">
                                    <x-lucide-activity class="size-5" />
                                </div>
                                <div class="min-w-0">
                                    <span class="text-[11px] font-bold text-tertiary uppercase tracking-wider block">Total Gain</span>
                                    <div class="text-base sm:text-lg font-black text-on-surface truncate">
                                        +{{ number_format($totalGain) }}m
                                    </div>
                                    <span class="text-[11px] text-tertiary block">Start: {{ number_format($startAlt) }}m</span>
                                </div>
                            </div>

                            <div class="bg-surface-container-low p-4 rounded-xl border border-outline/10 shadow-sm flex items-start gap-3">
                                <div class="p-2.5 bg-primary/15 text-primary rounded-xl shrink-0">
                                    <x-lucide-shield-check class="size-5" />
                                </div>
                                <div class="min-w-0">
                                    <span class="text-[11px] font-bold text-tertiary uppercase tracking-wider block">Acclimatization</span>
                                    <div class="text-base sm:text-lg font-black text-on-surface truncate">
                                        {{ $acclimatizationCount > 0 ? $acclimatizationCount . ' Buffer ' . Str::plural('Stage', $acclimatizationCount) : 'Paced Ascent' }}
                                    </div>
                                    <span class="text-[11px] text-tertiary block">Twice-daily SpO2 logs</span>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Informative overview when detailed day-by-day points are pending -->
                        <div class="bg-surface-container-low p-8 rounded-2xl border border-outline/10 text-center max-w-xl mx-auto space-y-4">
                            <div class="bg-primary/10 text-primary w-14 h-14 rounded-2xl flex items-center justify-center mx-auto">
                                <x-lucide-mountain class="size-7" />
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-on-surface uppercase">Maximum Altitude: {{ $trek->maximum_altitude ?: 'Alpine Route' }}</h3>
                                <p class="text-sm text-tertiary mt-1 leading-relaxed">
                                    The full topological cross-section for this itinerary will be mapped once specific camp waypoint telemetry is updated by our operations desk.
                                </p>
                            </div>
                            <div class="flex items-center justify-center gap-4 text-xs font-semibold text-tertiary pt-2 border-t border-outline/10">
                                <span>Duration: <strong class="text-on-surface">{{ $trek->duration ?: 'Custom' }}</strong></span>
                                <span>&bull;</span>
                                <span>Grade: <strong class="text-on-surface">{{ ucfirst($trek->difficulty_level ?: 'Moderate') }}</strong></span>
                            </div>
                        </div>
                    @endif
                </div>
            </section>

            <!-- Detailed Day-by-Day Timeline / Accordion -->
            <section class="bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="mb-space-xl max-w-2xl">
                        <span class="font-badge-caption text-badge-caption text-primary block font-bold tracking-widest uppercase">Trek Milestones</span>
                        <h2 id="{{ Str::slug(($trek->duration ?: ($trek->features->count() ? $trek->features->count() . '-Day' : 'Trek')) . '-itinerary') }}" class="font-headline-lg text-headline-lg text-on-surface uppercase">
                            The {{ $trek->duration ?: ($trek->features->count() ? $trek->features->count() . '-Day' : 'Trek') }} Itinerary
                        </h2>
                        <p class="font-body-md text-body-md text-tertiary pt-space-2xs">
                            Comprehensive daily stages, trail elevations, trekking hours, and lodging stops across {{ $trek->title }}.
                        </p>
                    </div>
                    <div class="space-y-space-md">
                        @forelse ($trek->features as $index => $feature)
                            <!-- Day {{ $index + 1 }} -->
                            <div class="gap-space-md group flex">
                                <div class="mt-2 flex flex-col items-center">
                                    <div class="bg-surface-container border-primary text-primary text-label-md group-hover:bg-primary group-hover:text-summit-white flex h-10 w-10 items-center justify-center rounded-full border-2 font-bold transition-colors">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </div>
                                    @if (! $loop->last)
                                        <div class="bg-border-subtle group-hover:bg-primary/30 mt-2 h-full w-0.5 transition-colors"></div>
                                    @endif
                                </div>
                                <div class="bg-surface-container-lowest p-space-md border-border-subtle hover:border-primary/50 flex-1 rounded-xl border shadow-sm transition-all hover:shadow-md">
                                    <div class="gap-space-sm pb-space-sm border-border-subtle mb-space-sm flex flex-col justify-between border-b md:flex-row md:items-center">
                                        <div>
                                            <h3 class="font-headline-sm text-headline-sm text-on-surface">
                                                {{ $feature->title }}
                                            </h3>
                                            <span class="font-badge-caption text-badge-caption text-tertiary font-bold uppercase">{{ $feature->day_label ?? 'Day ' . ($index + 1) }}</span>
                                        </div>
                                        <div class="gap-space-sm text-label-sm text-tertiary bg-surface-container px-space-sm py-space-2xs flex items-center rounded-lg">
                                            <span class="flex items-center gap-1" title="Max Altitude"
                                                ><x-lucide-mountain class="size-4" />
                                                {{ number_format((float) $feature->altitude) }}m</span>
                                            <span class="text-border-subtle">|</span>
                                            <span class="flex items-center gap-1" title="Trekking Distance"
                                                ><x-lucide-map class="size-4" /> {{ $feature->distance }}</span>
                                            <span class="text-border-subtle">|</span>
                                            <span class="flex items-center gap-1" title="Walking Hours"
                                                ><x-lucide-clock class="size-4" /> {{ $feature->walking_time }}</span>
                                        </div>
                                    </div>
                                    <div class="font-body-md text-body-md text-on-surface-variant mb-space-md prose prose-sm max-w-none leading-relaxed">
                                        {!! $feature->description !!}
                                    </div>
                                    <div class="bg-surface-container p-space-sm gap-space-md text-label-sm flex flex-wrap rounded-lg">
                                        <div class="text-on-surface flex items-center gap-2">
                                            <x-lucide-home class="text-tertiary size-[16px]" />
                                            <span class="font-semibold">Stay:</span>
                                            {{ $feature->accommodation ?? 'Tea House' }}
                                        </div>
                                        <div class="text-on-surface flex items-center gap-2">
                                            <x-lucide-utensils class="text-tertiary size-[16px]" />
                                            <span class="font-semibold">Meals:</span> {{ $feature->meals ?? 'B, L, D' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-tertiary p-space-md text-center">Detailed itinerary is not available yet.</p>
                        @endforelse
                    </div>
                </div>
        </div>
        </section>
        <!-- Side-by-Side Inclusions & Exclusions -->
        <section class="bg-surface-container-lowest py-space-3xl px-gutter-mobile lg:px-gutter-desktop w-full">
            <div class="max-w-max-content-width mx-auto">
                <div class="mb-space-2xl mx-auto max-w-xl text-center">
                    <span class="font-badge-caption text-badge-caption text-primary block font-bold tracking-widest uppercase">Transparent Operations</span>
                    <h2 id="trek-inclusions-logistics" class="font-headline-md text-headline-md text-on-surface uppercase">
                        Trek Inclusions &amp; Logistics
                    </h2>
                </div>
                <div class="gap-space-xl grid grid-cols-1 md:grid-cols-2">
                    <!-- Inclusions Box -->
                    <div class="bg-surface-container-low p-space-xl space-y-space-md rounded-xl shadow-sm">
                        <div class="gap-space-xs text-on-surface flex items-center">
                            <x-lucide-circle-check class="text-primary size-[28px]" />
                            <h3 class="font-headline-sm text-headline-sm uppercase">What Is Fully Covered</h3>
                        </div>
                        <div class="prose prose-sm prose-li:text-tertiary prose-p:text-tertiary text-tertiary max-w-none">
                            {!! $trek->inclusions !!}
                        </div>
                    </div>
                    <!-- Exclusions Box -->
                    <div class="bg-surface-container p-space-xl space-y-space-md rounded-xl shadow-sm">
                        <div class="gap-space-xs text-on-surface flex items-center">
                            <x-lucide-x class="text-tertiary size-[28px]" />
                            <h3 class="font-headline-sm text-headline-sm uppercase">What Trekkers Cover</h3>
                        </div>
                        <div class="prose prose-sm prose-li:text-tertiary prose-p:text-tertiary text-tertiary max-w-none">
                            {!! $trek->exclusions !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Medical Safety & Gear Checklist Bento Grid -->
        <section class="bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop w-full">
            <div class="max-w-max-content-width space-y-space-2xl mx-auto">
                <div class="gap-space-xl grid grid-cols-1 lg:grid-cols-12">
                    <!-- Medical Protocol Section -->
                    <div class="bg-surface-container-lowest p-space-xl space-y-space-md rounded-xl shadow-sm lg:col-span-6">
                        <div class="gap-space-xs flex items-center">
                            <x-lucide-siren class="text-error size-[28px]" />
                            <div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface uppercase">
                                    Medical &amp; Satellite Protocol
                                </h3>
                                <p class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                    Alpine Survival Equipment Standard
                                </p>
                            </div>
                        </div>
                        <p class="font-body-md text-body-md text-tertiary">
                            High-altitude trekking requires institutional preparedness. Every Neepa Adventure team
                            carries life-saving hyperbaric assets into the Cho La pass corridor:
                        </p>
                        <div class="gap-space-sm pt-space-xs grid grid-cols-1 sm:grid-cols-2">
                            <div class="bg-surface-container-low p-space-md space-y-1 rounded-lg">
                                <div class="font-label-md text-label-md text-on-surface flex items-center gap-1 font-bold">
                                    <x-lucide-heart-pulse class="text-primary size-[20px]" />
                                    Medical Oximetry
                                </div>
                                <p class="font-body-sm text-body-sm text-tertiary">
                                    Morning &amp; evening SpO2 diagnostics logged daily to intercept early onset AMS.
                                </p>
                            </div>
                            <div class="bg-surface-container-low p-space-md space-y-1 rounded-lg">
                                <div class="font-label-md text-label-md text-on-surface flex items-center gap-1 font-bold">
                                    <x-lucide-wind class="text-primary size-[20px]" />
                                    Emergency O2 System
                                </div>
                                <p class="font-body-sm text-body-sm text-tertiary">
                                    Bottled medical oxygen cylinder &amp; mask carried above Namche Bazaar for emergency
                                    ascent bailouts.
                                </p>
                            </div>
                            <div class="bg-surface-container-low p-space-md space-y-1 rounded-lg">
                                <div class="font-label-md text-label-md text-on-surface flex items-center gap-1 font-bold">
                                    <x-lucide-satellite class="text-primary size-[20px]" />
                                    Garmin inReach SOS
                                </div>
                                <p class="font-body-sm text-body-sm text-tertiary">
                                    Continuous 10-minute satellite breadcrumb ping directly tied to Kathmandu operations base.
                                </p>
                            </div>
                            <div class="bg-surface-container-low p-space-md space-y-1 rounded-lg">
                                <div class="font-label-md text-label-md text-on-surface flex items-center gap-1 font-bold">
                                    <x-lucide-helicopter class="text-primary size-[20px]" />
                                    Heli-Rescue Link
                                </div>
                                <p class="font-body-sm text-body-sm text-tertiary">
                                    Immediate charter helicopter extraction protocols coordinated with Simrik / Altitude
                                    Air.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Gear Checklist Section -->
                    <div class="bg-surface-container-lowest p-space-xl space-y-space-md rounded-xl shadow-sm lg:col-span-6">
                        <div class="gap-space-xs flex items-center">
                            <x-lucide-backpack class="text-primary size-[28px]" />
                            <div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface uppercase">
                                    Mandatory Packing Essentials
                                </h3>
                                <p class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                    Tested for Cho La Pass Sub-Zero Conditions
                                </p>
                            </div>
                        </div>
                        <div class="space-y-space-xs text-body-sm text-tertiary">
                            <div class="p-space-sm bg-surface-container-low flex items-center justify-between rounded-lg">
                                <div class="gap-space-xs flex items-center">
                                    <x-lucide-footprints class="text-primary size-[20px]" />
                                    <div>
                                        <div class="text-on-surface font-semibold">
                                            Microspikes or Flexible Crampons
                                        </div>
                                        <div class="text-tertiary">Required for the glaciated Cho La saddle</div>
                                    </div>
                                </div>
                                <span class="font-badge-caption text-badge-caption bg-amber-flare/20 text-on-primary-container rounded-md px-2 py-0.5 font-bold uppercase">Crucial</span>
                            </div>
                            <div class="p-space-sm bg-surface-container-low flex items-center justify-between rounded-lg">
                                <div class="gap-space-xs flex items-center">
                                    <x-lucide-bed class="text-primary size-[20px]" />
                                    <div>
                                        <div class="text-on-surface font-semibold">
                                            4-Season Sleeping Bag (-20°C Rated)
                                        </div>
                                        <div class="text-tertiary">High-loft goose down or trek synthetic fill</div>
                                    </div>
                                </div>
                                <span class="font-badge-caption text-badge-caption bg-surface-container-highest text-tertiary rounded-md px-2 py-0.5 uppercase">Provided / Rent</span>
                            </div>
                            <div class="p-space-sm bg-surface-container-low flex items-center justify-between rounded-lg">
                                <div class="gap-space-xs flex items-center">
                                    <x-lucide-brush-cleaning class="text-primary size-[20px]" />
                                    <div>
                                        <div class="text-on-surface font-semibold">800+ Fill Power Down Parka</div>
                                        <div class="text-tertiary">
                                            For Gorak Shep evenings and early morning destinations
                                        </div>
                                    </div>
                                </div>
                                <span class="font-badge-caption text-badge-caption bg-surface-container-highest text-tertiary rounded-md px-2 py-0.5 uppercase">Provided / Rent</span>
                            </div>
                            <div class="p-space-sm bg-surface-container-low flex items-center justify-between rounded-lg">
                                <div class="gap-space-xs flex items-center">
                                    <x-lucide-eye class="text-primary size-[20px]" />
                                    <div>
                                        <div class="text-on-surface font-semibold">
                                            Category 3 or 4 Glacier Sunglasses
                                        </div>
                                        <div class="text-tertiary">
                                            100% UV block against high-altitude snow blindness
                                        </div>
                                    </div>
                                </div>
                                <span class="font-badge-caption text-badge-caption bg-amber-flare/20 text-on-primary-container rounded-md px-2 py-0.5 font-bold uppercase">Crucial</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Upcoming Guaranteed Departures Section -->
        <section id="upcoming-departures" class="scroll-mt-24 bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop w-full border-t border-outline/10">
            <div class="max-w-max-content-width space-y-space-xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-space-sm border-b border-outline/10">
                    <div class="space-y-space-2xs max-w-2xl">
                        <div class="flex items-center gap-2">
                            <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-widest uppercase">
                                Fixed & Guaranteed Schedules
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-success/10 text-success">
                                <span class="size-1.5 rounded-full bg-success animate-pulse"></span>
                                {{ date('Y') }}/{{ date('Y') + 1 }} Season Open
                            </span>
                        </div>
                        <h2 id="upcoming-guaranteed-departures" class="font-headline-lg text-headline-lg text-on-surface uppercase font-extrabold tracking-tight">
                            Upcoming Guaranteed Departures
                        </h2>
                        <p class="font-body-md text-body-md text-tertiary">
                            Join one of our verified small-group departures for {{ $trek->title }}. All dates feature guaranteed run status with certified high-altitude Sherpa leadership and comprehensive medical telemetry.
                        </p>
                    </div>

                    <div class="flex items-center gap-3 shrink-0">
                        <a href="{{ route('plan-your-trek') }}" class="px-5 py-2.5 bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-md text-xs font-bold uppercase tracking-wider rounded-xl transition-all border border-outline/10 flex items-center gap-1.5">
                            <x-lucide-calendar-plus class="size-4 text-primary" /> Request Custom Date
                        </a>
                    </div>
                </div>

                @if($departures->isNotEmpty())
                    <div class="grid grid-cols-1 gap-4">
                        @foreach($departures as $departure)
                            @php
                                $spotsLeft = max(0, $departure->seats_total - $departure->seats_booked);
                                $isFewSpots = $spotsLeft <= 3 && $spotsLeft > 0;
                            @endphp
                            <div class="group bg-surface-container-lowest hover:bg-surface rounded-2xl p-5 md:p-6 border border-outline/10 hover:border-primary/40 hover:shadow-xl transition-all duration-300 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                                <!-- Date & Duration Column -->
                                <div class="flex items-start sm:items-center gap-4">
                                    <div class="bg-surface-container-low rounded-2xl p-3 sm:p-4 text-center border border-outline/15 min-w-[84px] shadow-sm group-hover:border-primary/30 transition-colors shrink-0">
                                        <span class="block text-[11px] font-black uppercase text-primary tracking-wider">
                                            {{ $departure->start_date?->format('M') }}
                                        </span>
                                        <span class="block text-2xl font-black text-on-surface leading-tight">
                                            {{ $departure->start_date?->format('d') }}
                                        </span>
                                        <span class="block text-[10px] font-semibold text-tertiary">
                                            {{ $departure->start_date?->format('Y') }}
                                        </span>
                                    </div>
                                    <div class="space-y-1">
                                        <div class="flex flex-wrap items-center gap-2">
                                            <span class="text-base sm:text-lg font-bold text-on-surface">
                                                {{ $departure->start_date?->format('M d, Y') }} &ndash; {{ $departure->end_date?->format('M d, Y') }}
                                            </span>
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider bg-success/10 text-success border border-success/20">
                                                <x-lucide-check-circle-2 class="size-3" /> Guaranteed Run
                                            </span>
                                        </div>
                                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-tertiary">
                                            <span class="flex items-center gap-1 font-medium">
                                                <x-lucide-clock class="size-3.5 text-primary" /> {{ $trek->duration ?: '16 Days' }}
                                            </span>
                                            <span class="flex items-center gap-1 font-medium">
                                                <x-lucide-map-pin class="size-3.5 text-amber-flare" /> {{ $trek->start_end_point ?: 'Kathmandu' }}
                                            </span>
                                            <span class="flex items-center gap-1 font-medium">
                                                <x-lucide-users class="size-3.5 text-primary" /> Max {{ $departure->seats_total }} Trekkers
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Availability & Status Column -->
                                <div class="flex flex-wrap items-center gap-6 lg:justify-end">
                                    <div class="space-y-1 text-left lg:text-right">
                                        <div class="flex items-center lg:justify-end gap-2">
                                            @if($spotsLeft === 0)
                                                <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase bg-error/10 text-error border border-error/20">
                                                    Sold Out
                                                </span>
                                            @elseif($isFewSpots)
                                                <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase bg-primary-container/20 text-on-primary-fixed-variant border border-primary/20 flex items-center gap-1">
                                                    <span class="size-1.5 rounded-full bg-amber-flare animate-ping"></span>
                                                    Only {{ $spotsLeft }} {{ Str::plural('Spot', $spotsLeft) }} Left
                                                </span>
                                            @else
                                                <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase bg-success/10 text-success border border-success/20">
                                                    {{ $spotsLeft }} Spots Available
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-xs text-tertiary font-medium">
                                            Deposit: ${{ number_format((float) ($trek->deposit_requirement ?: 350)) }} USD / person
                                        </div>
                                    </div>

                                    <!-- Price & CTA -->
                                    <div class="flex items-center gap-4">
                                        <div class="text-right">
                                            <div class="text-xl sm:text-2xl font-black text-on-surface">
                                                ${{ number_format((float) $trek->price_from, 0) }}
                                            </div>
                                            <div class="text-[10px] text-tertiary font-semibold uppercase tracking-wider">
                                                USD / Person
                                            </div>
                                        </div>

                                        <button 
                                            type="button" 
                                            @click="openBooking('{{ $departure->id }}', '{{ $departure->start_date?->format('M d, Y') }} – {{ $departure->end_date?->format('M d, Y') }}')"
                                            class="px-5 py-3 bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-sm hover:shadow-md flex items-center gap-1.5 group/btn shrink-0 cursor-pointer"
                                        >
                                            <span>Select Date</span>
                                            <x-lucide-arrow-right class="size-3.5 transition-transform group-hover/btn:translate-x-0.5" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-surface-container-lowest rounded-2xl p-10 text-center border border-outline/10 space-y-4 max-w-xl mx-auto shadow-sm">
                        <div class="bg-surface-container-high w-14 h-14 rounded-2xl flex items-center justify-center mx-auto text-primary">
                            <x-lucide-calendar class="size-7" />
                        </div>
                        <h3 class="text-xl font-bold text-on-surface">Flexible & Custom Departures Available</h3>
                        <p class="text-sm text-tertiary leading-relaxed">
                            We operate flexible weekly departures during the peak Spring & Autumn seasons. Contact our alpine logistics team to open a guaranteed group date or schedule a private trek on your preferred days.
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('plan-your-trek') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-bold text-xs uppercase tracking-wider rounded-xl shadow-md transition-all">
                                Request Private / Custom Date
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </section>

        <!-- Route Map Preview Component -->
        <section class="bg-surface-container-lowest py-space-2xl px-gutter-mobile lg:px-gutter-desktop w-full">
            <div class="max-w-max-content-width space-y-space-md mx-auto">
                <div class="gap-space-xs flex flex-col justify-between md:flex-row md:items-end">
                    <div>
                        <span class="font-badge-caption text-badge-caption text-primary block font-bold tracking-widest uppercase">Geographic Tracking</span>
                        <h2 id="{{ Str::slug($trek->title . '-route-waypoints') }}" class="font-headline-md text-headline-md text-on-surface uppercase">
                            {{ $trek->title }} Route &amp; Waypoints
                        </h2>
                    </div>
                    @if ($trek->maximum_altitude)
                        <span class="text-body-sm text-tertiary font-mono">Max Elevation: {{ $trek->maximum_altitude }}</span>
                    @else
                        <span class="text-body-sm text-tertiary font-mono">Himalayan Expedition Trail</span>
                    @endif
                </div>
                <div
                    class="p-space-md relative flex min-h-[22rem] sm:min-h-[26rem] w-full items-end rounded-xl bg-cover bg-center shadow-inner overflow-hidden group"
                    data-location="{{ $trek->title }}"
                    style="background-image: url('{{ $routeMapUrl }}');"
                >
                    <div class="bg-ridge-deep/90 p-space-md text-summit-white space-y-space-2xs max-w-md rounded-lg shadow-md backdrop-blur-md">
                        <div class="gap-space-2xs text-primary-container font-badge-caption text-badge-caption flex items-center font-bold uppercase">
                            <x-lucide-map-pin class="size-[16px]" />
                            {{ !empty($trek->map_image) ? 'Expedition Route Map Active' : 'Interactive Waypoint Preview' }}
                        </div>
                        <div class="font-headline-sm text-headline-sm">
                            @if (!empty($trek->start_point) && !empty($trek->end_point))
                                {{ $trek->start_point }} • {{ $trek->end_point }}
                            @elseif (!empty($trek->maximum_altitude))
                                High Alpine Route • {{ $trek->maximum_altitude }}
                            @else
                                {{ $trek->title }}
                            @endif
                        </div>
                        <p class="font-body-sm text-body-sm text-mist-slate">
                            Full GPX track coordinates and detailed topographical checkpoints delivered to confirmed trekkers for Garmin Fenix / Apple Watch offline navigation.
                        </p>
                        @if (!empty($trek->map_image))
                            <div class="pt-2">
                                <a 
                                    href="{{ $routeMapUrl }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center gap-1.5 text-xs font-bold text-primary-container hover:underline uppercase tracking-wider"
                                >
                                    <x-lucide-external-link class="size-3.5" /> Open Full Resolution Map
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- Verified Climber Testimonials -->
        <section class="bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop w-full">
            <div class="max-w-max-content-width space-y-space-xl mx-auto">
                <div class="mx-auto max-w-xl text-center">
                    <span class="font-badge-caption text-badge-caption text-primary block font-bold tracking-widest uppercase">Trek Proof</span>
                    <h2 id="real-journeys-real-stories" class="font-headline-lg text-headline-lg text-on-surface uppercase">
                        Real Journeys. Real Stories.
                    </h2>
                    <p class="font-body-md text-body-md text-tertiary pt-space-2xs">
                        Real traveler stories and feedback for {{ $trek->title }}.
                    </p>
                </div>
                <div class="gap-space-lg grid grid-cols-1 md:grid-cols-3">
                    @forelse ($testimonials as $testimonial)
                        <div class="bg-surface-container-lowest p-space-lg space-y-space-md flex flex-col justify-between rounded-xl shadow-sm">
                            <div class="space-y-space-xs">
                                <div class="text-amber-500 flex items-center gap-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= ($testimonial->rating ?? 5))
                                            <x-lucide-star class="size-[18px] fill-current text-amber-500" />
                                        @else
                                            <x-lucide-star class="size-[18px] text-outline/30" />
                                        @endif
                                    @endfor
                                </div>
                                <div class="font-body-sm text-body-sm text-on-surface leading-relaxed pt-1">
                                    "{!! nl2br(e(strip_tags($testimonial->content))) !!}"
                                </div>
                            </div>
                            <div class="pt-space-xs gap-space-sm flex items-center border-t border-outline/10">
                                @if (! empty($testimonial->image))
                                    <img 
                                        src="{{ Storage::url($testimonial->image) }}" 
                                        alt="{{ $testimonial->name }}" 
                                        class="h-10 w-10 rounded-full object-cover shrink-0 border border-outline/20"
                                    />
                                @else
                                    @php
                                        $initials = collect(explode(' ', trim($testimonial->name)))
                                            ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                                            ->take(2)
                                            ->implode('');
                                    @endphp
                                    <div class="bg-surface-container-highest text-on-surface flex h-10 w-10 shrink-0 items-center justify-center rounded-full font-bold">
                                        {{ $initials ?: 'TR' }}
                                    </div>
                                @endif
                                <div class="min-w-0 flex-1">
                                    <div class="font-label-md text-label-md text-on-surface font-bold truncate">
                                        {{ $testimonial->name }}
                                    </div>
                                    <div class="font-badge-caption text-badge-caption text-tertiary uppercase truncate">
                                        {{ $testimonial->role ?: ($testimonial->company ?: 'Verified Trekker') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-12 text-center bg-surface-container-lowest rounded-xl border border-outline/10 p-6">
                            <p class="font-body-md text-tertiary mb-3">No reviews recorded specifically for this trek yet.</p>
                            <a 
                                href="{{ route('write-review') }}" 
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-primary hover:underline"
                            >
                                <x-lucide-pencil class="size-3.5" />
                                <span>Be the first to share your experience</span>
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- Bottom Direct CTA Banner -->
        <section class="bg-primary-container text-on-primary-fixed py-space-2xl px-gutter-mobile lg:px-gutter-desktop w-full">
            <div class="max-w-max-content-width gap-space-lg mx-auto flex flex-col items-center justify-between text-center lg:flex-row lg:text-left">
                <div class="space-y-space-2xs">
                    <span class="font-badge-caption text-badge-caption text-on-primary-fixed-variant font-bold tracking-widest uppercase">Ready for the High Passes?</span>
                    <h2 id="secure-your-permit" class="font-headline-lg text-headline-lg font-bold">
                        Secure Your 2025 Everest &amp; Gokyo Permit
                    </h2>
                    <p class="font-body-md text-body-md text-on-primary-fixed-variant max-w-xl">
                        Lukla flight slots and premium teahouse beds are limited by national park authority regulations.
                        Secure your departure date with a $350 deposit.
                    </p>
                </div>
                <div class="gap-space-sm flex shrink-0 flex-wrap items-center justify-center">
                    <button 
                        type="button"
                        @click="openBooking()"
                        class="py-space-md px-space-xl bg-ridge-deep hover:bg-tertiary text-summit-white font-label-md text-label-md rounded-xl font-bold tracking-wider uppercase shadow-md transition-all cursor-pointer"
                    >
                        Book This Circuit (${{ number_format((float) $trek->price_from, 0) }})
                    </button>
                    <button class="py-space-md px-space-xl bg-surface-container-lowest hover:bg-mist-slate text-on-surface font-label-md text-label-md rounded-xl font-bold tracking-wider uppercase shadow-sm transition-all cursor-pointer">
                        Download PDF Blog
                    </button>
                </div>
            </div>
        </section>
        </div>

        <!-- Dynamic Booking & Reservation Modal -->
        <div 
            x-cloak
            x-show="bookingModalOpen"
            @keydown.escape.window="bookingModalOpen = false"
            class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="booking-modal-title" 
            role="dialog" 
            aria-modal="true"
        >
            <!-- Backdrop -->
            <div 
                x-show="bookingModalOpen"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-ridge-deep/75 backdrop-blur-sm transition-opacity"
                @click="bookingModalOpen = false"
            ></div>

            <!-- Modal Panel Centering Wrapper -->
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-6">
                <div 
                    x-show="bookingModalOpen"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative w-full max-w-2xl transform overflow-hidden rounded-2xl bg-surface-container-lowest text-left shadow-2xl transition-all border border-outline/10"
                    @click.stop
                >
                    <!-- Modal Header -->
                    <div class="bg-surface-container px-6 py-5 border-b border-outline/10 flex items-center justify-between">
                        <div class="space-y-1 pr-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider bg-primary-container text-on-primary-fixed">
                                <x-lucide-calendar-check class="size-3.5" /> Direct Reservation
                            </span>
                            <h3 class="text-xl font-bold text-on-surface" id="booking-modal-title">
                                {{ $trek->title }}
                            </h3>
                        </div>
                        <button 
                            type="button" 
                            @click="bookingModalOpen = false"
                            class="rounded-lg p-2 text-tertiary hover:text-on-surface hover:bg-surface-container-high transition-colors"
                        >
                            <x-lucide-x class="size-5" />
                        </button>
                    </div>

                    <!-- Modal Body: Form View -->
                    <div x-show="!submitted" class="p-6 space-y-6 max-h-[75vh] overflow-y-auto">
                        <!-- Selected Departure Info Card -->
                        <div class="rounded-xl bg-surface-container p-4 border border-outline/10 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div>
                                <div class="text-xs uppercase font-bold tracking-wider text-tertiary">Selected Departure Date</div>
                                <div class="text-sm sm:text-base font-semibold text-on-surface mt-0.5" x-text="selectedDepartureLabel"></div>
                            </div>
                            <div class="sm:text-right shrink-0">
                                <div class="text-xs uppercase font-bold tracking-wider text-tertiary">Base Rate</div>
                                <div class="text-base font-bold text-primary">${{ number_format((float) $trek->price_from, 0) }} <span class="text-xs text-tertiary font-normal">/ person</span></div>
                            </div>
                        </div>

                        <!-- Departure Change Dropdown (Optional Override) -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-tertiary mb-1.5">
                                Change Departure Date
                            </label>
                            <select 
                                x-model="selectedDeparture"
                                @change="
                                    const opt = $event.target.options[$event.target.selectedIndex];
                                    if (opt) { selectedDepartureLabel = opt.text; }
                                "
                                class="w-full rounded-xl border border-outline/15 bg-surface-container-lowest px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none"
                            >
                                @forelse($departures as $dep)
                                    @php
                                        $spotsLeft = max(0, $dep->seats_total - $dep->seats_booked);
                                    @endphp
                                    <option value="{{ $dep->id }}">
                                        {{ $dep->start_date?->format('M d') }} – {{ $dep->end_date?->format('M d, Y') }} ({{ $spotsLeft }} {{ Str::plural('seat', $spotsLeft) }} left)
                                    </option>
                                @empty
                                    <option value="custom">Inquire for Flexible Dates / Custom Group</option>
                                @endforelse
                                <option value="custom">Custom / Private Date Request</option>
                            </select>
                        </div>

                        <!-- Number of Trekkers & Calculation -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center rounded-xl bg-surface-container/60 p-4 border border-outline/10">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-tertiary mb-2">
                                    Number of Trekkers
                                </label>
                                <div class="inline-flex items-center gap-3 bg-surface-container-lowest rounded-xl border border-outline/15 p-1.5 shadow-sm">
                                    <button 
                                        type="button"
                                        @click="if (trekkersCount > 1) trekkersCount--"
                                        class="size-8 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-bold flex items-center justify-center transition-colors cursor-pointer"
                                    >
                                        -
                                    </button>
                                    <span class="w-8 text-center font-bold text-on-surface" x-text="trekkersCount">1</span>
                                    <button 
                                        type="button"
                                        @click="if (trekkersCount < 16) trekkersCount++"
                                        class="size-8 rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-bold flex items-center justify-center transition-colors cursor-pointer"
                                    >
                                        +
                                    </button>
                                </div>
                            </div>
                            <div class="space-y-1 sm:text-right">
                                <div class="text-xs text-tertiary">
                                    Total Est: <span class="font-bold text-on-surface" x-text="'$' + (basePrice * trekkersCount).toLocaleString() + ' USD'"></span>
                                </div>
                                <div class="text-xs text-tertiary">
                                    Deposit Due (20%): <span class="font-bold text-primary" x-text="'$' + (depositPerPerson * trekkersCount).toLocaleString() + ' USD'"></span>
                                </div>
                                <div class="text-[11px] text-tertiary italic">Payable after itinerary confirmation</div>
                            </div>
                        </div>

                        <!-- Error Message Banner -->
                        <div x-show="errorMessage" class="rounded-xl bg-red-500/10 border border-red-500/30 p-4 text-xs font-medium text-red-600 flex items-start gap-2.5">
                            <x-lucide-alert-circle class="size-4 shrink-0 mt-0.5" />
                            <span x-text="errorMessage"></span>
                        </div>

                        <!-- Contact Details Form -->
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-tertiary mb-1">
                                        Full Name <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        x-model="name"
                                        placeholder="e.g. Alexander Smith"
                                        class="w-full rounded-xl border border-outline/15 bg-surface-container-lowest px-4 py-2.5 text-sm text-on-surface placeholder:text-outline focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none"
                                        required
                                    />
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-tertiary mb-1">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="email" 
                                        x-model="email"
                                        placeholder="e.g. alex@example.com"
                                        class="w-full rounded-xl border border-outline/15 bg-surface-container-lowest px-4 py-2.5 text-sm text-on-surface placeholder:text-outline focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-tertiary mb-1">
                                        WhatsApp / Phone <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="tel" 
                                        x-model="phone"
                                        placeholder="e.g. +1 555 123 4567"
                                        class="w-full rounded-xl border border-outline/15 bg-surface-container-lowest px-4 py-2.5 text-sm text-on-surface placeholder:text-outline focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none"
                                        required
                                    />
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-tertiary mb-1">
                                        Country / Nationality
                                    </label>
                                    <input 
                                        type="text" 
                                        x-model="country"
                                        placeholder="e.g. United States, Germany, Australia"
                                        class="w-full rounded-xl border border-outline/15 bg-surface-container-lowest px-4 py-2.5 text-sm text-on-surface placeholder:text-outline focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none"
                                    />
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-tertiary mb-1">
                                    Special Requests / Questions
                                </label>
                                <textarea 
                                    x-model="notes"
                                    rows="3"
                                    placeholder="Tell us about your fitness level, dietary requirements, or private guide preferences..."
                                    class="w-full rounded-xl border border-outline/15 bg-surface-container-lowest px-4 py-2.5 text-sm text-on-surface placeholder:text-outline focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none"
                                ></textarea>
                            </div>
                        </div>

                        <!-- Footer Actions -->
                        <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-outline/10">
                            <div class="flex items-center gap-2 text-xs text-tertiary">
                                <x-lucide-shield-check class="size-4 text-emerald-600" />
                                <span>No payment required right now. 100% free inquiry.</span>
                            </div>
                            <div class="flex items-center gap-3 w-full sm:w-auto">
                                <button 
                                    type="button"
                                    @click="bookingModalOpen = false"
                                    class="w-1/2 sm:w-auto px-4 py-2.5 rounded-xl border border-outline/20 text-xs font-bold uppercase tracking-wider text-tertiary hover:text-on-surface hover:bg-surface-container transition-colors"
                                >
                                    Cancel
                                </button>
                                <button 
                                    type="button"
                                    @click="submitBooking()"
                                    :disabled="submitting"
                                    class="w-1/2 sm:w-auto px-6 py-2.5 rounded-xl bg-primary-container hover:bg-amber-flare text-on-primary-fixed text-xs font-bold uppercase tracking-wider transition-all shadow-md flex items-center justify-center gap-2 disabled:opacity-50 cursor-pointer"
                                >
                                    <span x-show="!submitting">Confirm Booking Request</span>
                                    <span x-show="submitting" class="flex items-center gap-2">
                                        <x-lucide-loader-2 class="size-4 animate-spin" /> Submitting...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Body: Success View -->
                    <div x-show="submitted" class="p-8 text-center space-y-5">
                        <div class="size-16 rounded-full bg-success/10 text-success mx-auto flex items-center justify-center">
                            <x-lucide-check-circle-2 class="size-9" />
                        </div>
                        <div class="space-y-2">
                            <h4 class="text-2xl font-bold text-on-surface">Booking Request Submitted!</h4>
                            <p class="text-sm text-tertiary max-w-md mx-auto" x-text="successMessage"></p>
                        </div>
                        <div class="rounded-xl bg-surface-container p-4 border border-outline/10 text-xs text-on-surface-variant max-w-md mx-auto">
                            Our expedition specialists will review your departure date, check national park permit availability, and reach out via email or WhatsApp within 12 hours.
                        </div>
                        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-3">
                            <a 
                                href="https://wa.me/97714700000" 
                                target="_blank" 
                                rel="noopener noreferrer"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-[#25D366] text-white text-xs font-bold uppercase tracking-wider hover:opacity-90 transition-opacity"
                            >
                                <x-lucide-message-circle class="size-4" /> Message Us on WhatsApp
                            </a>
                            <button 
                                type="button" 
                                @click="bookingModalOpen = false"
                                class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-surface-container hover:bg-surface-container-high text-xs font-bold uppercase tracking-wider text-on-surface transition-colors cursor-pointer"
                            >
                                Done
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Interactive Gallery Lightbox Modal -->
        <template x-if="galleryPhotos && galleryPhotos.length > 0">
            <div 
                x-cloak
                x-show="galleryOpen"
                @keydown.escape.window="galleryOpen = false"
                @keydown.arrow-left.window="if (galleryOpen) prevGalleryPhoto()"
                @keydown.arrow-right.window="if (galleryOpen) nextGalleryPhoto()"
                class="fixed inset-0 z-50 flex flex-col justify-between overflow-hidden bg-black/95 text-white backdrop-blur-md"
                role="dialog"
                aria-modal="true"
                aria-label="Expedition Photo Gallery"
            >
                <!-- Top Toolbar -->
                <div class="flex items-center justify-between px-6 py-4 border-b border-white/10 z-10 bg-black/40">
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-bold tracking-widest uppercase text-primary-container px-3 py-1 rounded-full bg-white/10 border border-white/10">
                            Expedition Gallery
                        </span>
                        <span class="text-sm text-white/70 font-mono">
                            <span x-text="activeGalleryIndex + 1"></span> / <span x-text="galleryPhotos.length"></span>
                        </span>
                    </div>
                    <button 
                        type="button"
                        @click="galleryOpen = false"
                        class="p-2 rounded-full hover:bg-white/15 text-white/80 hover:text-white transition-colors cursor-pointer"
                        aria-label="Close Gallery"
                    >
                        <x-lucide-x class="size-6" />
                    </button>
                </div>

                <!-- Main Image Stage with Navigation Buttons -->
                <div class="relative flex-1 flex items-center justify-center p-4 sm:p-8 min-h-0">
                    <!-- Previous Button -->
                    <button 
                        type="button"
                        x-show="galleryPhotos.length > 1"
                        @click="prevGalleryPhoto()"
                        class="absolute left-4 z-10 p-3 rounded-full bg-black/60 hover:bg-black/85 text-white/90 hover:text-white border border-white/10 transition-transform active:scale-95 cursor-pointer backdrop-blur-sm"
                        aria-label="Previous Photo"
                    >
                        <x-lucide-chevron-left class="size-6" />
                    </button>

                    <!-- Active Image Display -->
                    <div class="relative max-h-full max-w-full flex flex-col items-center justify-center">
                        <img 
                            :src="galleryPhotos[activeGalleryIndex]?.url" 
                            :alt="galleryPhotos[activeGalleryIndex]?.title || '{{ $trek->title }}'" 
                            class="max-h-[68vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
                        />
                        <div 
                            x-show="galleryPhotos[activeGalleryIndex]?.caption || galleryPhotos[activeGalleryIndex]?.title" 
                            class="mt-3 text-center max-w-2xl px-4"
                        >
                            <p 
                                class="text-sm sm:text-base font-medium text-white/90" 
                                x-text="galleryPhotos[activeGalleryIndex]?.caption || galleryPhotos[activeGalleryIndex]?.title"
                            ></p>
                        </div>
                    </div>

                    <!-- Next Button -->
                    <button 
                        type="button"
                        x-show="galleryPhotos.length > 1"
                        @click="nextGalleryPhoto()"
                        class="absolute right-4 z-10 p-3 rounded-full bg-black/60 hover:bg-black/85 text-white/90 hover:text-white border border-white/10 transition-transform active:scale-95 cursor-pointer backdrop-blur-sm"
                        aria-label="Next Photo"
                    >
                        <x-lucide-chevron-right class="size-6" />
                    </button>
                </div>

                <!-- Bottom Thumbnails Strip -->
                <div class="px-6 py-4 border-t border-white/10 bg-black/40 overflow-x-auto">
                    <div class="flex items-center gap-2 mx-auto justify-center min-w-max">
                        <template x-for="(photo, idx) in galleryPhotos" :key="idx">
                            <button
                                type="button"
                                @click="activeGalleryIndex = idx"
                                :class="activeGalleryIndex === idx ? 'ring-2 ring-primary scale-105 opacity-100' : 'opacity-50 hover:opacity-80'"
                                class="relative h-14 w-20 rounded-md overflow-hidden transition-all shrink-0 cursor-pointer border border-white/10"
                            >
                                <img :src="photo.url" :alt="photo.title" class="h-full w-full object-cover" />
                            </button>
                        </template>
                    </div>
                </div>
            </div>
        </template>

        <!-- Mobile Sticky Bottom Booking CTA Bar -->
        <div class="lg:hidden fixed bottom-0 inset-x-0 z-40 bg-surface-container-lowest/95 backdrop-blur-xl border-t border-outline/15 px-4 py-3 shadow-[0_-4px_20px_rgba(0,0,0,0.12)] flex items-center justify-between gap-3">
            <div class="min-w-0">
                <div class="text-[11px] font-bold uppercase tracking-wider text-tertiary">From Rate</div>
                <div class="flex items-baseline gap-1">
                    <span class="text-lg font-black text-on-surface">${{ number_format((float) $trek->price_from, 0) }}</span>
                    <span class="text-[10px] text-tertiary">USD</span>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a 
                    href="#upcoming-departures"
                    class="bg-surface-container hover:bg-surface-container-high text-on-surface px-3 py-2 rounded-xl text-xs font-bold transition-colors border border-outline/15"
                >
                    Dates
                </a>
                <button 
                    type="button"
                    @click="openBooking()"
                    class="bg-primary hover:bg-primary/90 text-on-primary-fixed px-4 py-2 rounded-xl text-xs font-extrabold uppercase tracking-wider shadow-sm transition-transform active:scale-95 flex items-center gap-1.5 cursor-pointer"
                >
                    <span>Book Now</span>
                    <x-lucide-arrow-right class="size-3.5" />
                </button>
            </div>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
