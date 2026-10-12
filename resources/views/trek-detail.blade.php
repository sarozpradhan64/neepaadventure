<x-layouts.app 
    :seo="$trek->seoMetadata"
    :title="$trek->title"
    :description="$trek->short_description"
    :image="$trek->featured_image"
>
    <x-header />
    <main class="bg-surface w-full pt-48">
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
                        <a href="#upcoming-departures" class="gap-space-2xs text-primary hover:text-amber-600 transition-colors flex items-center font-bold tracking-wider group cursor-pointer bg-primary/10 hover:bg-primary/20 px-3 py-1 rounded-full border border-primary/20">
                            <span class="bg-emerald-500 h-2 w-2 animate-pulse rounded-full"></span>
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
                        <span class="bg-primary-container/20 text-on-primary-container px-space-sm py-space-2xs text-badge-caption font-badge-caption inline-flex items-center gap-1 rounded uppercase">
                            <x-lucide-mountain class="size-[14px]" />
                            Circuit Grade 4/5 • Demanding
                        </span>
                        <span class="bg-surface-container-high text-tertiary px-space-sm py-space-2xs text-badge-caption font-badge-caption inline-flex items-center gap-1 rounded uppercase">
                            16 Days / 15 Nights
                        </span>
                        <span class="bg-surface-container-high text-tertiary px-space-sm py-space-2xs text-badge-caption font-badge-caption inline-flex items-center gap-1 rounded uppercase">
                            Cho La Pass (5,420m)
                        </span>
                    </div>
                    <div class="gap-space-xl grid grid-cols-1 items-start lg:grid-cols-12">
                        <div class="space-y-space-md lg:col-span-8">
                            <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight uppercase">
                                Everest Base Camp &amp; Gokyo Ri Lakes Circuit
                            </h1>
                            <p class="font-body-lg text-body-lg text-tertiary max-w-3xl">
                                A sacred circumnavigation through the high turquoise glacial lakes of Gokyo, over the
                                glaciated Cho La Pass (5,420m), onto the legendary Khumbu Icefall moraine beneath Mt.
                                Everest (8,848.86m).
                            </p>
                            <!-- Imagery Mosaic Strip -->
                            <div class="gap-space-sm pt-space-xs grid grid-cols-1 sm:grid-cols-3">
                                <div class="group relative h-72 overflow-hidden rounded-xl shadow-md sm:col-span-2">
                                    <img
                                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                        data-alt="Stunning panoramic sunrise over emerald Gokyo Lakes reflecting Mount Cho Oyu with vibrant prayer flags gently waving in high altitude Himalayan crisp breeze under clear azure sky"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBl3rzSjmzyUAbsNtQo1iajDXG6R0468kIY4pBYxKG0Il4bOgcfSuo-XIKxRw4oHikE_kQCAJ7G4gLcZSdl_g7qZqLtTkkds9koIWwA105QqgSaC9BoSi63ez-J9yI4XslLzET_0spEZT6bI5G65Zb25Q7YFV31IswAajpF6tK3_s79n_tjxqnYvOdCjZ1o4umB8xkjvCFnThyPTUSDaK9bdZvk29PcfkSiIji5ZNuOv_SQAU_40aG8"
                                    />
                                    <div class="bg-ridge-deep/80 text-summit-white font-badge-caption text-badge-caption absolute bottom-3 left-3 flex items-center gap-1.5 rounded px-3 py-1.5 uppercase backdrop-blur-md">
                                        <x-lucide-camera class="text-primary-container size-[16px]" />
                                        3rd Gokyo Lake (Dudh Pokhari, 4,790m)
                                    </div>
                                </div>
                                <div class="gap-space-sm flex h-72 flex-col">
                                    <div class="group relative h-1/2 overflow-hidden rounded-xl shadow-md">
                                        <img
                                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                            data-alt="Trekker team traversing rugged Cho La Pass glaciated terrain wearing crampons against towering sharp snow crags under bright sunlight"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuASTFDbBT_GYwEqYMyo_I5DWjTFwOpTwG5jrI0udNfRiWQ96z9-VVWetVBow8DK61WkEXZGyhFe-v7hIdl3N31mK_uWpWjGTph4SY4Va4qwx_gRjhCeJbb1a6uxFMA5LXUjVfYcXV-SO9C2i0peuGe43EW3gln8JIp4wAHJbxbE-bv5ZIAdpBIITYe2pGP6ifJU_VHBXY7-2TysV-nE_bMHt4qyVivt7UBTdgpPeRRETishS8EdoEF9"
                                        />
                                        <div class="bg-ridge-deep/75 text-summit-white font-label-sm text-label-sm absolute bottom-2 left-2 rounded px-2 py-0.5">
                                            Cho La Glacial Pass
                                        </div>
                                    </div>
                                    <div class="group relative h-1/2 overflow-hidden rounded-xl shadow-md">
                                        <img
                                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                            data-alt="Everest Base Camp colorful yellow trek tents pitched on rocky Khumbu Glacier with massive seracs and ice pinnacles looming in background"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCK4uDIdZsdTjdxOuKwLRVtlM45dtFab_Uj0dpyR1Qx3USWrX-tPKmTzh5D32NqdDfW-m4OGyIl6tldnKZrf8mApaIXRM1tAbKiPPnevHtVCMF86C22eUAf3gg1Ti-gAr-adVdho5r94sPvqaJcEUd7Gi7Hk4tsXWj7rwTRgEjsLBM-gJ5-rl4q-SONl7STJhvGaX5SbtSGQ2vOx4JjvZQl7dT1NU78SRfg8vxU-g8ie3WgbZhRjBz6"
                                        />
                                        <div class="bg-ridge-deep/75 text-summit-white font-label-sm text-label-sm absolute bottom-2 left-2 rounded px-2 py-0.5">
                                            Khumbu Icefall Base
                                        </div>
                                    </div>
                                </div>
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
                                    class="bg-surface-container-lowest text-on-surface font-body-md text-body-md p-space-sm focus:ring-primary w-full cursor-pointer rounded-lg shadow-sm focus:ring-2 focus:outline-none border border-outline/10 text-sm"
                                    id="departure-select"
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
                                    <span class="text-on-surface font-semibold">20% ($350 USD)</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Group Size Cap:</span>
                                    <span class="text-on-surface font-semibold">Max 8 Trekkers</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Heli-Evac Coverage:</span>
                                    <span class="text-primary flex items-center gap-1 font-medium">
                                        <x-lucide-shield-check class="size-[15px]" /> Mandatory / Monitored
                                    </span>
                                </div>
                            </div>
                            <div class="gap-space-xs pt-space-2xs flex flex-col">
                                <button class="py-space-sm px-space-md bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md w-full rounded-lg text-center font-bold tracking-wider uppercase shadow-sm transition-all">
                                    Reserve Your Place
                                </button>
                                <button class="py-space-sm px-space-md bg-surface-container-highest hover:bg-mist-slate text-on-surface font-label-md text-label-md w-full rounded-lg text-center font-bold tracking-wider uppercase transition-colors">
                                    Request Private / Custom Date
                                </button>
                                <a
                                    class="gap-space-2xs py-space-xs text-on-surface-variant hover:text-primary font-label-sm text-label-sm flex w-full items-center justify-center font-semibold transition-colors"
                                    href="https://wa.me/97714700000"
                                    rel="noopener noreferrer"
                                    target="_blank"
                                >
                                    <x-lucide-message-circle class="size-[18px]" />
                                    Talk to Khumbu Operations on WhatsApp
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
                            <div class="font-label-md text-label-md font-bold">16 Days High Loop</div>
                        </div>
                    </div>
                    <div class="gap-space-xs flex items-center">
                        <x-lucide-mountain class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                Maximum Altitude
                            </div>
                            <div class="font-label-md text-label-md font-bold">5,545m (Kala Patthar)</div>
                        </div>
                    </div>
                    <div class="gap-space-xs flex items-center">
                        <x-lucide-plane-takeoff class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                Start &amp; End Point
                            </div>
                            <div class="font-label-md text-label-md font-bold">Lukla (Tenzing-Hillary)</div>
                        </div>
                    </div>
                    <div class="gap-space-xs flex items-center">
                        <x-lucide-users class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                Support Ratio
                            </div>
                            <div class="font-label-md text-label-md font-bold">1 Guide:4 &amp; 1 Porter:2</div>
                        </div>
                    </div>
                    <div class="gap-space-xs col-span-2 flex items-center md:col-span-1">
                        <x-lucide-sun class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                Prime Seasons
                            </div>
                            <div class="font-label-md text-label-md font-bold">Mar–May &amp; Oct–Dec</div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Elevation Profile & Route Architecture -->
            <section class="bg-surface-container-lowest py-space-2xl px-gutter-mobile lg:px-gutter-desktop w-full">
                <div class="max-w-max-content-width space-y-space-lg mx-auto">
                    <div class="gap-space-sm flex flex-col justify-between md:flex-row md:items-end">
                        <div>
                            <span class="font-badge-caption text-badge-caption text-primary block font-bold tracking-widest uppercase">Topographic Cross-Section</span>
                            <h2 class="font-headline-md text-headline-md text-on-surface uppercase">
                                Elevation &amp; Acclimatization Curve
                            </h2>
                        </div>
                        <div class="gap-space-md text-body-sm text-tertiary flex items-center">
                            <span class="flex items-center gap-1.5"><span class="bg-primary h-3 w-3 rounded-full"></span> Acclimatization Checkpoints</span>
                            <span class="flex items-center gap-1.5"><span class="bg-tertiary h-3 w-3 rounded-full"></span> Technical Glacial Pass</span>
                        </div>
                    </div>
                    <!-- Custom SVG Chart Container -->
                    <div class="bg-surface-container-low p-space-md md:p-space-lg rounded-xl shadow-sm">
                        <div class="w-full overflow-x-auto">
                            <div class="relative min-w-[760px]">
                                <svg
                                    class="h-64 w-full overflow-visible"
                                    fill="none"
                                    viewbox="0 0 900 260"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <defs>
                                        <lineargradient id="elevationGrad" x1="0%" x2="0%" y1="0%" y2="100%">
                                            <stop offset="0%" stop-color="#f6ba1a" stop-opacity="0.45"></stop>
                                            <stop offset="100%" stop-color="#f6ba1a" stop-opacity="0.0"></stop>
                                        </lineargradient>
                                    </defs>
                                    <!-- Grid Horizontal Guide Lines -->
                                    <line
                                        stroke="#d2dce4"
                                        stroke-dasharray="4 4"
                                        stroke-width="1"
                                        x1="50"
                                        x2="870"
                                        y1="30"
                                        y2="30"
                                    ></line>
                                    <text class="font-mono text-[11px]" fill="#4d6072" x="15" y="34">5,500m</text>
                                    <line
                                        stroke="#d2dce4"
                                        stroke-dasharray="4 4"
                                        stroke-width="1"
                                        x1="50"
                                        x2="870"
                                        y1="80"
                                        y2="80"
                                    ></line>
                                    <text class="font-mono text-[11px]" fill="#4d6072" x="15" y="84">4,800m</text>
                                    <line
                                        stroke="#d2dce4"
                                        stroke-dasharray="4 4"
                                        stroke-width="1"
                                        x1="50"
                                        x2="870"
                                        y1="135"
                                        y2="135"
                                    ></line>
                                    <text class="font-mono text-[11px]" fill="#4d6072" x="15" y="139">4,000m</text>
                                    <line
                                        stroke="#d2dce4"
                                        stroke-dasharray="4 4"
                                        stroke-width="1"
                                        x1="50"
                                        x2="870"
                                        y1="190"
                                        y2="190"
                                    ></line>
                                    <text class="font-mono text-[11px]" fill="#4d6072" x="15" y="194">3,000m</text>
                                    <!-- Elevation Path Fill -->
                                    <path
                                        d="M 60 200 L 130 220 L 210 170 L 290 145 L 360 120 L 440 85 L 500 48 L 570 38 L 640 40 L 720 30 L 790 120 L 860 200 L 860 250 L 60 250 Z"
                                        fill="url(#elevationGrad)"
                                    ></path>
                                    <!-- Elevation Path Stroke -->
                                    <path
                                        d="M 60 200 L 130 220 L 210 170 L 290 145 L 360 120 L 440 85 L 500 48 L 570 38 L 640 40 L 720 30 L 790 120 L 860 200"
                                        stroke="#795900"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="3"
                                    ></path>
                                    <!-- Data Nodes -->
                                    <!-- Lukla -->
                                    <circle cx="60" cy="200" fill="#795900" r="4"></circle>
                                    <text
                                        class="text-[11px] font-bold"
                                        fill="#121d26"
                                        text-anchor="middle"
                                        x="60"
                                        y="240"
                                    >
                                        Lukla
                                    </text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="60" y="252">
                                        2,846m
                                    </text>
                                    <!-- Namche -->
                                    <circle cx="210" cy="170" fill="#f6ba1a" r="5" stroke="#795900" stroke-width="2"></circle>
                                    <text
                                        class="text-[11px] font-bold"
                                        fill="#121d26"
                                        text-anchor="middle"
                                        x="210"
                                        y="240"
                                    >
                                        Namche
                                    </text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="210" y="252">
                                        3,440m
                                    </text>
                                    <!-- Machhermo -->
                                    <circle cx="360" cy="120" fill="#795900" r="4"></circle>
                                    <text
                                        class="text-[11px] font-bold"
                                        fill="#121d26"
                                        text-anchor="middle"
                                        x="360"
                                        y="240"
                                    >
                                        Machhermo
                                    </text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="360" y="252">
                                        4,470m
                                    </text>
                                    <!-- Gokyo Lakes -->
                                    <circle cx="440" cy="85" fill="#f6ba1a" r="5" stroke="#795900" stroke-width="2"></circle>
                                    <text
                                        class="text-[11px] font-bold"
                                        fill="#121d26"
                                        text-anchor="middle"
                                        x="440"
                                        y="240"
                                    >
                                        Gokyo Ri
                                    </text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="440" y="252">
                                        5,357m
                                    </text>
                                    <!-- Cho La Pass -->
                                    <circle cx="570" cy="38" fill="#0F1821" r="6" stroke="#f6ba1a" stroke-width="2"></circle>
                                    <text
                                        class="text-[11px] font-bold"
                                        fill="#ba1a1a"
                                        text-anchor="middle"
                                        x="570"
                                        y="20"
                                    >
                                        Cho La Pass
                                    </text>
                                    <text
                                        class="text-[11px] font-bold"
                                        fill="#121d26"
                                        text-anchor="middle"
                                        x="570"
                                        y="240"
                                    >
                                        Pass Destination
                                    </text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="570" y="252">
                                        5,420m
                                    </text>
                                    <!-- Everest Base Camp -->
                                    <circle cx="640" cy="40" fill="#795900" r="5"></circle>
                                    <text
                                        class="text-[11px] font-bold"
                                        fill="#121d26"
                                        text-anchor="middle"
                                        x="640"
                                        y="240"
                                    >
                                        EBC
                                    </text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="640" y="252">
                                        5,364m
                                    </text>
                                    <!-- Kala Patthar -->
                                    <circle cx="720" cy="30" fill="#f6ba1a" r="6" stroke="#795900" stroke-width="2"></circle>
                                    <text
                                        class="text-[11px] font-bold"
                                        fill="#795900"
                                        text-anchor="middle"
                                        x="720"
                                        y="16"
                                    >
                                        Pass High
                                    </text>
                                    <text
                                        class="text-[11px] font-bold"
                                        fill="#121d26"
                                        text-anchor="middle"
                                        x="720"
                                        y="240"
                                    >
                                        Kala Patthar
                                    </text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="720" y="252">
                                        5,545m
                                    </text>
                                    <!-- Return Lukla -->
                                    <circle cx="860" cy="200" fill="#795900" r="4"></circle>
                                    <text
                                        class="text-[11px] font-bold"
                                        fill="#121d26"
                                        text-anchor="middle"
                                        x="860"
                                        y="240"
                                    >
                                        Lukla Flight
                                    </text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="860" y="252">
                                        2,846m
                                    </text>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-space-md p-space-sm bg-surface-container-lowest gap-space-xs text-body-sm text-tertiary flex flex-wrap items-center justify-between rounded">
                            <span class="flex items-center gap-1">
                                <x-lucide-briefcase-medical class="text-primary size-[18px]" />
                                Daily Morning &amp; Evening SpO2 / Pulse Saturation Logs required for all team members.
                            </span>
                            <span class="text-on-surface font-mono font-semibold">Max Ascend Gradient: +600m / day (safe acclimatization)</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Detailed Day-by-Day Timeline / Accordion -->
            <section class="bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="mb-space-xl max-w-2xl">
                        <span class="font-badge-caption text-badge-caption text-primary block font-bold tracking-widest uppercase">Trek Milestones</span>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface uppercase">
                            The 16-Day High Circuit Itinerary
                        </h2>
                        <p class="font-body-md text-body-md text-tertiary pt-space-2xs">
                            Built with an acclimatization buffer day at Namche Bazaar and contingency weather hours over
                            the Cho La Glacier.
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
                    <h2 class="font-headline-md text-headline-md text-on-surface uppercase">
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
        <!-- Lead Trek Guide Profile Card (using provided image) -->
        <section class="bg-surface-container py-space-3xl px-gutter-mobile lg:px-gutter-desktop w-full">
            <div class="max-w-max-content-width mx-auto">
                <div class="bg-surface-container-lowest p-space-xl gap-space-xl grid grid-cols-1 items-center rounded-2xl shadow-md md:grid-cols-12">
                    <div class="flex justify-center md:col-span-5">
                        <div class="relative w-full max-w-sm overflow-hidden rounded-xl shadow-lg">
                            <img
                                alt="Lead Mountain Guide Dawa Tenzing Sherpa in alpine yellow down gear against Himalayan snowy destination passes"
                                class="h-96 w-full object-cover object-top"
                                src="https://lh3.googleusercontent.com/aida/AEtjO1VNGjPQgJtSEnKl7zmmZzJYfc2-mrQtN77I7_Zo0q3gEzI2Z5x0Mh_OQMKMAW_76HUyDq5X7_0BBA17p7KTzJJAsZ92x8NEAFMIYhuu2YI2WG_GB5qRh8-NQzDoptJLfnUTvLhVL0LbVJiiEC1xZ4Jade3ASI7IQXptmn7FXMDCwJqwTgJpIhrTXBd-mGGV41b6WSIPuDu-99EFB_CaiwdCGAD62wUmqyPS2OyVhPrAzTY7dUOqpbq5qA"
                            />
                            <div class="bg-ridge-deep/85 text-summit-white font-badge-caption text-badge-caption absolute bottom-3 left-3 rounded px-3 py-1 uppercase">
                                11x Everest • Certified
                            </div>
                        </div>
                    </div>
                    <div class="space-y-space-md md:col-span-7">
                        <div class="space-y-space-2xs">
                            <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-wider uppercase">Meet Your Lead Alpine Guide</span>
                            <h3 class="font-headline-lg text-headline-lg text-on-surface uppercase">
                                Dawa Tenzing Sherpa
                            </h3>
                            <p class="font-label-md text-label-md text-tertiary">
                                Senior Sirdar &amp; Wilderness Medical Trek Leader
                            </p>
                        </div>
                        <p class="font-body-md text-body-md text-tertiary">
                            Born and raised in the Khumjung village of Khumbu, Dawa has completed over 35 high-altitude
                            crossings of the Cho La and Renjo La passes, along with 11 successful destinations of Mount
                            Everest (Sagarmatha). Certified by both the Nepal Trekking Association and the International
                            Federation of Mountain Guides Associations.
                        </p>
                        <div class="gap-space-sm pt-space-xs grid grid-cols-3">
                            <div class="bg-surface-container-low p-space-sm rounded-lg text-center">
                                <div class="font-headline-sm text-headline-sm text-on-surface font-bold">35+</div>
                                <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                    Cho La Passes
                                </div>
                            </div>
                            <div class="bg-surface-container-low p-space-sm rounded-lg text-center">
                                <div class="font-headline-sm text-headline-sm text-on-surface font-bold">100%</div>
                                <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                    Safety Record
                                </div>
                            </div>
                            <div class="bg-surface-container-low p-space-sm rounded-lg text-center">
                                <div class="font-headline-sm text-headline-sm text-on-surface font-bold">WFR</div>
                                <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                    Wilderness First
                                </div>
                            </div>
                        </div>
                        <div class="pt-space-xs gap-space-md flex items-center">
                            <span class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1">
                                <x-lucide-shield-check class="text-primary size-[18px]" />
                                Trained in Gamow Hyperbaric Chambers &amp; High Altitude Cerebral Edema (HACE)
                                mitigation
                            </span>
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
                                    Continuous 10-minute satellite breadcrumb ping directly tied to Kathmandu dispatch.
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
                                <span class="font-badge-caption text-badge-caption bg-amber-flare/20 text-on-primary-container rounded px-2 py-0.5 font-bold uppercase">Crucial</span>
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
                                <span class="font-badge-caption text-badge-caption bg-surface-container-highest text-tertiary rounded px-2 py-0.5 uppercase">Provided / Rent</span>
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
                                <span class="font-badge-caption text-badge-caption bg-surface-container-highest text-tertiary rounded px-2 py-0.5 uppercase">Provided / Rent</span>
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
                                <span class="font-badge-caption text-badge-caption bg-amber-flare/20 text-on-primary-container rounded px-2 py-0.5 font-bold uppercase">Crucial</span>
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
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800 dark:bg-emerald-950 dark:text-emerald-300">
                                <span class="size-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                {{ date('Y') }}/{{ date('Y') + 1 }} Season Open
                            </span>
                        </div>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface uppercase font-extrabold tracking-tight">
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
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                                <x-lucide-check-circle-2 class="size-3" /> Guaranteed Run
                                            </span>
                                        </div>
                                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-tertiary">
                                            <span class="flex items-center gap-1 font-medium">
                                                <x-lucide-clock class="size-3.5 text-primary" /> {{ $trek->duration ?: '16 Days' }}
                                            </span>
                                            <span class="flex items-center gap-1 font-medium">
                                                <x-lucide-map-pin class="size-3.5 text-amber-500" /> {{ $trek->start_end_point ?: 'Kathmandu' }}
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
                                                <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase bg-rose-500/10 text-rose-600 border border-rose-500/20">
                                                    Sold Out
                                                </span>
                                            @elseif($isFewSpots)
                                                <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase bg-amber-500/10 text-amber-600 border border-amber-500/20 flex items-center gap-1">
                                                    <span class="size-1.5 rounded-full bg-amber-500 animate-ping"></span>
                                                    Only {{ $spotsLeft }} {{ Str::plural('Spot', $spotsLeft) }} Left
                                                </span>
                                            @else
                                                <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase bg-emerald-500/10 text-emerald-600 border border-emerald-500/20">
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
                                            onclick="
                                                var sel = document.getElementById('departure-select');
                                                if (sel) { sel.value = '{{ $departure->id }}'; }
                                                var bookingCard = document.getElementById('booking');
                                                if (bookingCard) { 
                                                    bookingCard.scrollIntoView({ behavior: 'smooth' }); 
                                                    bookingCard.classList.add('ring-2', 'ring-primary');
                                                    setTimeout(() => bookingCard.classList.remove('ring-2', 'ring-primary'), 2000);
                                                }
                                            "
                                            class="px-5 py-3 bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-sm hover:shadow-md flex items-center gap-1.5 group/btn shrink-0"
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
                            <a href="{{ route('plan-your-trek') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary hover:bg-primary/90 text-on-primary font-bold text-xs uppercase tracking-wider rounded-xl shadow-md transition-all">
                                Request Private / Custom Date
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Departure Guarantee Badges Strip -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 pt-4 border-t border-outline/10">
                    <div class="bg-surface-container-lowest p-4 rounded-xl flex items-start gap-3 border border-outline/10 shadow-sm">
                        <div class="p-2 bg-primary/10 text-primary rounded-lg shrink-0">
                            <x-lucide-shield-check class="size-5" />
                        </div>
                        <div>
                            <div class="text-xs font-bold text-on-surface uppercase tracking-wider">100% Guaranteed Runs</div>
                            <div class="text-[11px] text-tertiary mt-0.5">Your trip is guaranteed to depart once booked.</div>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-4 rounded-xl flex items-start gap-3 border border-outline/10 shadow-sm">
                        <div class="p-2 bg-primary/10 text-primary rounded-lg shrink-0">
                            <x-lucide-users class="size-5" />
                        </div>
                        <div>
                            <div class="text-xs font-bold text-on-surface uppercase tracking-wider">Max 8 Trekkers</div>
                            <div class="text-[11px] text-tertiary mt-0.5">Intimate small teams ensure safety & attention.</div>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-4 rounded-xl flex items-start gap-3 border border-outline/10 shadow-sm">
                        <div class="p-2 bg-primary/10 text-primary rounded-lg shrink-0">
                            <x-lucide-repeat class="size-5" />
                        </div>
                        <div>
                            <div class="text-xs font-bold text-on-surface uppercase tracking-wider">Free Date Shift</div>
                            <div class="text-[11px] text-tertiary mt-0.5">Transfer your booking up to 30 days before departure.</div>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-4 rounded-xl flex items-start gap-3 border border-outline/10 shadow-sm">
                        <div class="p-2 bg-primary/10 text-primary rounded-lg shrink-0">
                            <x-lucide-radio class="size-5" />
                        </div>
                        <div>
                            <div class="text-xs font-bold text-on-surface uppercase tracking-wider">Garmin Monitored</div>
                            <div class="text-[11px] text-tertiary mt-0.5">Continuous satellite safety & rescue link.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Route Map Preview Component -->
        <section class="bg-surface-container-lowest py-space-2xl px-gutter-mobile lg:px-gutter-desktop w-full">
            <div class="max-w-max-content-width space-y-space-md mx-auto">
                <div class="gap-space-xs flex flex-col justify-between md:flex-row md:items-end">
                    <div>
                        <span class="font-badge-caption text-badge-caption text-primary block font-bold tracking-widest uppercase">Geographic Tracking</span>
                        <h2 class="font-headline-md text-headline-md text-on-surface uppercase">
                            Khumbu High Circuit Waypoints
                        </h2>
                    </div>
                    <span class="text-body-sm text-tertiary font-mono">Centerpoint: 27.9881° N, 86.9250° E</span>
                </div>
                <div
                    class="p-space-md relative flex h-80 w-full items-end rounded-xl bg-cover bg-center shadow-inner"
                    data-location="Everest Base Camp, Khumbu, Nepal"
                    style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAyHCn2xRyd59q6a9HpjHnszI6fBUVWaBPwT-VLxgVKbM77YFgu2UR0NTB0od3jHwgTTdMOZ53kQ6Oog7m8W9nOKP5YEVlTiy7KhwhejYYHOewqU2Yi-scwEgOxx-Hpj9XnVzT-3--RwEHasR8fczE0VnrhkxG1_zw8USkGgUTvlY4dT7GsAXmhv73TcyCwOhgCG5-bIr9zfhKYPxqjmjdEi6QftoW4c-nla3fKx61i_XtksWe_eGXH');
                    "
                >
                    <div class="bg-ridge-deep/90 p-space-md text-summit-white space-y-space-2xs max-w-md rounded-lg shadow-md backdrop-blur-md">
                        <div class="gap-space-2xs text-primary-container font-badge-caption text-badge-caption flex items-center font-bold uppercase">
                            <x-lucide-map-pin class="size-[16px]" />
                            Interactive Waypoint Active
                        </div>
                        <div class="font-headline-sm text-headline-sm">Gokyo Ri • Cho La • Everest Base Camp</div>
                        <p class="font-body-sm text-body-sm text-mist-slate">
                            Full GPX track coordinates delivered to confirmed trekkers for Garmin Fenix / Apple Watch
                            Ultra offline navigation.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Verified Climber Testimonials -->
        <section class="bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop w-full">
            <div class="max-w-max-content-width space-y-space-xl mx-auto">
                <div class="mx-auto max-w-xl text-center">
                    <span class="font-badge-caption text-badge-caption text-primary block font-bold tracking-widest uppercase">Trek Proof</span>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface uppercase">
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
                    <h2 class="font-headline-lg text-headline-lg font-bold">
                        Secure Your 2025 Everest &amp; Gokyo Permit
                    </h2>
                    <p class="font-body-md text-body-md text-on-primary-fixed-variant max-w-xl">
                        Lukla flight slots and premium teahouse beds are limited by national park authority regulations.
                        Secure your departure date with a $350 deposit.
                    </p>
                </div>
                <div class="gap-space-sm flex shrink-0 flex-wrap items-center justify-center">
                    <button class="py-space-md px-space-xl bg-ridge-deep hover:bg-tertiary text-summit-white font-label-md text-label-md rounded-lg font-bold tracking-wider uppercase shadow-md transition-all">
                        Book This Circuit ($1,750)
                    </button>
                    <button class="py-space-md px-space-xl bg-surface-container-lowest hover:bg-mist-slate text-on-surface font-label-md text-label-md rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all">
                        Download PDF Blog
                    </button>
                </div>
            </div>
        </section>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
