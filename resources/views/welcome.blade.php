<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-48">
        <div class="flex w-full flex-col">
            <!-- HERO SECTION WITH TOP OVERLAY AND NEGATIVE MARGIN CLEARANCE -->
            <section class="bg-ridge-deep relative -mt-20 w-full overflow-hidden pt-36 pb-24">
                <!-- Hero Background Visual with Atmospheric Gradient Scrim -->
                <div class="absolute inset-0 h-full w-full scale-105 transform bg-cover bg-center opacity-45 mix-blend-luminosity transition-transform duration-1000"
                    data-alt="Vast cinematic panorama of Ama Dablam and Mount Everest at golden hour sunrise in Nepal, towering snow-covered jagged passes against a clear alpine sky with warm golden sun rays hitting pristine glaciers and prayer flags fluttering on an ancient stone ridge, ultra-wide professional landscape photography."
                    style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBWm4bd_ZWSqeS4ZDUw6ieD9YH3wcgE-xDdiyCrLoZmNc38H_eVcehQRfzRaWV2oN-t64VYglXgF1h-4DHdB6nMBgmwPowMu-4r9ywUCBGFZjJisMPG4RtnRpF5UPMcIJNyW23CJQSCb9TOEbxfDuGF94E8WzXAW0uWithmsHUIg76y_5CnaMVtehdmjneAMWNTMHBcs6ppEQZqOk3MgezQ92YbpYMIPFMh_GChKQXV_cHcKCDVRVpR');
                    ">
                </div>
                <!-- Ambient Radial Warmth Gradient -->
                <div
                    class="from-ridge-deep via-ridge-deep/75 pointer-events-none absolute inset-0 bg-gradient-to-t to-transparent">
                </div>
                <div
                    class="bg-primary-container/20 pointer-events-none absolute -top-32 right-1/4 h-96 w-96 rounded-full blur-3xl">
                </div>
                <div
                    class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop relative z-10 mx-auto flex flex-col items-center text-center">
                    @php
                        $heroTitle =
                            $websiteSettings['hero_title'] ?? "Conquer the World's Highest Passes with Guide Mastery";
                        $heroText =
                            $websiteSettings['hero_text'] ??
                            "Pioneering 100% safety records across Nepal's 8,000m trails. Led by certified Guide leaders with sustainable zero-plastic ethics and intimate small trek teams.";
                        $highlightText = $websiteSettings['hero_highlighted_text'] ?? '';

                        if ($highlightText) {
                            $words = array_filter(array_map('trim', explode(',', $highlightText)));
                            foreach ($words as $word) {
                                if (str_contains($heroTitle, $word)) {
                                    $heroTitle = str_replace(
                                        $word,
                                        '<span class="text-primary-container inline-block font-black drop-shadow-lg">' .
                                            $word .
                                            '</span>',
                                        $heroTitle,
                                    );
                                }
                            }
                        }
                    @endphp
                    <!-- Main Headline -->
                    <h1
                        class="font-display-xl text-display-xl font-extrabold text-summit-white mb-space-md max-w-4xl leading-[1.08] tracking-tight drop-shadow-md">
                        {!! $heroTitle !!}
                    </h1>
                    <!-- Subheadline -->
                    <p
                        class="font-body-lg text-body-lg text-surface-container mb-space-xl mx-auto max-w-2xl opacity-90">
                        {{ $heroText }}
                    </p>
                    @php
                        $heroStats = json_decode($websiteSettings['hero_stats'] ?? '[]', true) ?: [];
                        
                        if(empty($heroStats)) {
                            $heroStats = [
                                ['value' => '500+', 'label' => 'Happy Clients'],
                                ['value' => '100%', 'label' => 'Success Rate'],
                                ['value' => '', 'label' => 'Eco-Friendly'],
                                ['value' => '24/7', 'label' => 'Rescue']
                            ];
                        }
                        
                        $statIcons = [
                            'star',
                            'shield-check',
                            'leaf',
                            'siren'
                        ];
                    @endphp
                    <!-- Quick Trust Proof Badges -->
                    <div
                        class="gap-space-sm mb-space-2xl text-summit-white font-label-sm text-label-sm flex flex-wrap items-center justify-center">
                        @foreach($heroStats as $index => $stat)
                            @php
                                $icon = !empty($stat['icon']) ? $stat['icon'] : $statIcons[$index % count($statIcons)];
                                $text = trim(($stat['value'] ?? '') . ' ' . ($stat['label'] ?? ''));
                            @endphp
                            @if($text)
                            <div
                                class="gap-space-2xs px-space-sm py-space-2xs bg-summit-white/10 flex items-center rounded-full backdrop-blur-sm">
                                @svg('lucide-'.$icon, 'text-primary-container size-[18px]')
                                <span class="text-summit-white font-semibold">{{ $text }}</span>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Interactive Floating Trip Search & Filter Bar -->
                    <div
                        class="w-full max-w-3xl mx-auto bg-surface-container-lowest shadow-2xl rounded-full p-2 text-left -mb-8 relative z-20 border border-outline/10">
                        <form action="{{ route('treks') }}" method="GET" class="flex items-center gap-2">
                            <div class="relative flex-1">
                                <x-lucide-search class="absolute left-4 top-1/2 -translate-y-1/2 text-tertiary size-[22px]" />
                                <input type="text" name="search" placeholder="Search Treks, Tours, Adventure & Authentic Nepal Experiences" 
                                    class="w-full h-14 pl-12 pr-4 bg-transparent font-body-md text-body-md text-on-surface focus:outline-none focus:ring-0 border-none placeholder-tertiary">
                            </div>
                            <button type="submit"
                                class="h-12 px-8 bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider rounded-full transition-all flex items-center justify-center gap-space-xs shadow-md active:scale-95 shrink-0">
                                <span>Explore</span>
                            </button>
                        </form>
                    </div>
                </div>
            </section>
            <!-- WHO ARE WE SECTION -->
            @php
                $whoTitle = $websiteSettings['who_are_we_title'] ?? 'Setting the Standard in Trekking Excellence';
                $whoSubtitle = $websiteSettings['who_are_we_subtitle'] ?? 'Who We Are';
                $whoText = $websiteSettings['who_are_we_text'] ?? 'We believe in building more than just itineraries; we build trust through unparalleled safety, expert guidance, and sustainable practices. Join us to experience the mountains with true professionals.';
                $whoBullets = json_decode($websiteSettings['who_are_we_bullets'] ?? '[]', true) ?: [
                    'Uncompromising safety standards on every trek.',
                    'Decades of proven Himalayan expertise.',
                    'Commitment to sustainable and ethical practices.'
                ];
                $whoImage = !empty($websiteSettings['who_are_we_image']) 
                    ? asset('storage/' . $websiteSettings['who_are_we_image']) 
                    : 'https://images.unsplash.com/photo-1522163182402-834f871fd851?q=80&w=2000&auto=format&fit=crop';
            @endphp
            <section class="bg-surface-container-lowest pt-[5rem] pb-space-3xl w-full">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                    <div class="gap-space-2xl grid grid-cols-1 items-center lg:grid-cols-2">
                        <!-- Image Side -->
                        <div class="relative w-full rounded-2xl overflow-hidden shadow-lg h-[400px] lg:h-[550px]">
                            <img src="{{ $whoImage }}" alt="{{ $whoTitle }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <!-- Small decorative element on image -->
                            <div class="absolute bottom-6 left-6 right-6">
                                <div class="bg-surface/90 backdrop-blur-md p-space-md rounded-xl inline-flex items-center gap-4 shadow-sm">
                                    <div class="bg-primary text-on-primary flex h-12 w-12 shrink-0 items-center justify-center rounded-full">
                                        <x-lucide-shield-check class="size-6" />
                                    </div>
                                    <div>
                                        <div class="font-headline-sm font-bold text-on-surface">Trusted by Thousands</div>
                                        <div class="font-body-sm text-tertiary">Verified Excellence</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Text Side -->
                        <div class="flex flex-col justify-center">
                            <div class="font-badge-caption text-badge-caption text-primary mb-space-xs font-bold tracking-[0.2em] uppercase">
                                {{ $whoSubtitle }}
                            </div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface mb-space-md tracking-tight">
                                {{ $whoTitle }}
                            </h2>
                            <p class="font-body-lg text-body-lg text-tertiary mb-space-lg leading-relaxed">
                                {{ $whoText }}
                            </p>
                            
                            @if(!empty($whoBullets))
                                <div class="space-y-4 mb-space-lg">
                                    @foreach($whoBullets as $bullet)
                                        <div class="flex items-start gap-3">
                                            <div class="text-primary mt-1 shrink-0">
                                                <x-lucide-check-circle class="size-5" />
                                            </div>
                                            <p class="font-body-md text-on-surface">{{ $bullet }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <div>
                                <a href="#" class="bg-primary text-on-primary hover:bg-primary/90 font-label-lg px-space-xl py-space-sm inline-flex items-center justify-center rounded-full transition-colors">
                                    Read Our Full Story
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SIGNATURE TREKS -->
            <section class="py-space-3xl bg-surface w-full">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                    <!-- Section Header with Categorical Filter Tabs -->
                    <div class="mb-space-2xl gap-space-lg flex flex-col justify-between md:flex-row md:items-end">
                        <div>
                            <div
                                class="font-badge-caption text-badge-caption text-primary mb-space-2xs font-bold tracking-[0.2em] uppercase">
                                Curated Himalayan Routes
                            </div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                                Signature Treks
                            </h2>
                            <p class="font-body-md text-body-md text-tertiary mt-space-2xs max-w-xl">
                                From standard high passes to technical destinations, all journeys feature experienced
                                local leaders, private logistics, and satellite rescue systems.
                            </p>
                        </div>
                        <!-- Filter Pill Tabs -->
                        <div class="gap-space-2xs bg-surface-container-high flex flex-wrap self-start rounded-xl p-1.5 md:self-auto"
                            id="trekTabs">
                            <button
                                class="px-space-md py-space-2xs font-label-md text-label-md bg-primary-container text-on-primary-fixed rounded-lg font-bold shadow-sm">
                                All Treks
                            </button>
                            <button
                                class="px-space-md py-space-2xs font-label-md text-label-md text-tertiary hover:text-on-surface hover:bg-surface-container-lowest rounded-lg font-medium transition-all">
                                Classic High Passes
                            </button>
                            <button
                                class="px-space-md py-space-2xs font-label-md text-label-md text-tertiary hover:text-on-surface hover:bg-surface-container-lowest rounded-lg font-medium transition-all">
                                Remote &amp; Forbidden
                            </button>
                            <button
                                class="px-space-md py-space-2xs font-label-md text-label-md text-tertiary hover:text-on-surface hover:bg-surface-container-lowest rounded-lg font-medium transition-all">
                                6,000m Destinations
                            </button>
                        </div>
                    </div>
                    <!-- 4-Card Trek Grid -->
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                        @foreach($treks->take(4) as $trek)
                            @php
                                $badgeClass = $loop->index % 4 === 0 ? 'bg-primary-container text-on-primary-fixed' : 
                                              ($loop->index % 4 === 1 ? 'bg-ridge-deep/80 text-summit-white' : 
                                              ($loop->index % 4 === 2 ? 'bg-tertiary text-summit-white' : 
                                              'bg-primary text-summit-white'));
                                
                                $inclusionsList = [];
                                if (!empty($trek->inclusions)) {
                                    $lines = array_filter(array_map('trim', explode("\n", $trek->inclusions)));
                                    $inclusionsList = array_slice($lines, 0, 2);
                                }
                            @endphp
                            <x-trek-card 
                                title="{{ $trek->title }}"
                                image="{{ $trek->featured_image ? asset('storage/' . $trek->featured_image) : 'https://placehold.co/600x400?text=Neepa+Adventure' }}"
                                badge="{{ $trek->difficulty_level ?? 'Featured Trek' }}" 
                                badgeClass="{{ $badgeClass }}"
                                altitude="{{ $trek->maximum_altitude ?? 'TBA' }}" 
                                duration="{{ $trek->duration ?? 'TBA' }}" 
                                rating="5.0" 
                                reviews="100+"
                                description="{{ Str::limit($trek->short_description ?? strip_tags($trek->description), 120) }}"
                                :inclusions="$inclusionsList" 
                                price="${{ number_format((float)($trek->price_from ?? 0)) }}"
                                href="{{ route('trek-detail', ['slug' => $trek->slug]) }}" 
                            />
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- INTERACTIVE ALTITUDE & ACCLIMATIZATION GUIDE STRIP -->
            <section class="bg-ridge-deep py-space-3xl text-summit-white relative w-full overflow-hidden">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop relative z-10 mx-auto">
                    <div class="mb-space-2xl mx-auto max-w-2xl text-center">
                        <div
                            class="font-badge-caption text-badge-caption text-primary-container mb-space-2xs font-bold tracking-[0.2em] uppercase">
                            Precision Alpine Science
                        </div>
                        <h2 class="font-headline-lg text-headline-lg text-summit-white tracking-tight">
                            Acclimatization Profile &amp; Protocol
                        </h2>
                        <p class="font-body-md text-body-md text-surface-container mt-space-2xs opacity-80">
                            Our calibrated 500m daily ascent thresholds and built-in active rest days ensure maximum
                            destination success with zero altitude shock.
                        </p>
                    </div>
                    <!-- Technical SVG Elevation Graphic Strip -->
                    <div class="bg-surface-container-lowest/5 p-space-lg lg:p-space-xl rounded-2xl backdrop-blur-md">
                        <!-- SVG Elevation Profile -->
                        <div class="relative h-48 w-full">
                            <svg class="text-primary-container h-full w-full" preserveaspectratio="none"
                                viewbox="0 0 900 160">
                                <defs>
                                    <lineargradient id="elevationGrad" x1="0" x2="0" y1="0"
                                        y2="1">
                                        <stop offset="0%" stop-color="#f6ba1a" stop-opacity="0.45"></stop>
                                        <stop offset="100%" stop-color="#f6ba1a" stop-opacity="0.0"></stop>
                                    </lineargradient>
                                </defs>
                                <!-- Elevation Filled Area -->
                                <path
                                    d="M0,150 L120,135 L260,110 L380,85 L520,60 L680,30 L780,18 L900,10 L900,160 L0,160 Z"
                                    fill="url(#elevationGrad)"></path>
                                <!-- Line Path -->
                                <path d="M0,150 L120,135 L260,110 L380,85 L520,60 L680,30 L780,18 L900,10"
                                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="3">
                                </path>
                                <!-- Checkpoints Dots & Text -->
                                <circle cx="0" cy="150" fill="#f6ba1a" r="5"></circle>
                                <circle cx="120" cy="135" fill="#f6ba1a" r="5"></circle>
                                <circle cx="260" cy="110" fill="#ffffff" r="6"></circle>
                                <circle cx="380" cy="85" fill="#f6ba1a" r="5"></circle>
                                <circle cx="520" cy="60" fill="#ffffff" r="6"></circle>
                                <circle cx="680" cy="30" fill="#f6ba1a" r="5"></circle>
                                <circle cx="780" cy="18" fill="#f6ba1a" r="7"></circle>
                            </svg>
                        </div>
                        <!-- Milestones Row -->
                        <div class="gap-space-md pt-space-lg grid grid-cols-2 text-left md:grid-cols-5">
                            <div class="p-space-sm bg-summit-white/5 rounded-lg">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary-container block font-bold uppercase">Base
                                    Checkpoint</span>
                                <div class="font-headline-sm text-headline-sm text-summit-white mt-1 font-bold">
                                    Kathmandu
                                </div>
                                <div class="font-body-sm text-body-sm text-surface-container opacity-70">
                                    1,400m / 4,593ft
                                </div>
                                <div class="font-body-sm text-body-sm text-surface-container-low mt-2">
                                    Briefing &amp; medical kit inspect.
                                </div>
                            </div>
                            <div class="p-space-sm bg-summit-white/5 rounded-lg">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary-container block font-bold uppercase">Guide
                                    Capital</span>
                                <div class="font-headline-sm text-headline-sm text-summit-white mt-1 font-bold">
                                    Namche Bazaar
                                </div>
                                <div class="font-body-sm text-body-sm text-surface-container opacity-70">
                                    3,440m / 11,286ft
                                </div>
                                <div class="font-body-sm text-body-sm text-surface-container-low mt-2">
                                    2 Nights active acclimatization.
                                </div>
                            </div>
                            <div class="p-space-sm bg-summit-white/5 rounded-lg">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary-container block font-bold uppercase">Spiritual
                                    Plateau</span>
                                <div class="font-headline-sm text-headline-sm text-summit-white mt-1 font-bold">
                                    Dingboche
                                </div>
                                <div class="font-body-sm text-body-sm text-surface-container opacity-70">
                                    4,410m / 14,468ft
                                </div>
                                <div class="font-body-sm text-body-sm text-surface-container-low mt-2">
                                    Nangkartshang Pass day trek.
                                </div>
                            </div>
                            <div class="p-space-sm bg-summit-white/5 rounded-lg">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary-container block font-bold uppercase">Khumbu
                                    Glacier</span>
                                <div class="font-headline-sm text-headline-sm text-summit-white mt-1 font-bold">
                                    Everest Base Camp
                                </div>
                                <div class="font-body-sm text-body-sm text-surface-container opacity-70">
                                    5,364m / 17,598ft
                                </div>
                                <div class="font-body-sm text-body-sm text-surface-container-low mt-2">
                                    Moraine traverse to icefall.
                                </div>
                            </div>
                            <div class="p-space-sm bg-summit-white/10 ring-primary-container rounded-lg ring-1">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary-container block font-bold uppercase">Destination
                                    Viewpoint</span>
                                <div class="font-headline-sm text-headline-sm text-summit-white mt-1 font-bold">
                                    Kala Patthar
                                </div>
                                <div class="font-body-sm text-body-sm text-surface-container opacity-70">
                                    5,545m / 18,192ft
                                </div>
                                <div class="font-body-sm text-body-sm text-surface-container-low mt-2">
                                    Sunrise 360° Himalayan vista.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- WHY TREK WITH Neepa Adventure (Values & Ethos Grid) -->
            <section class="py-space-3xl bg-surface-container-low w-full">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                    <div class="mb-space-3xl mx-auto max-w-2xl text-center">
                        <div
                            class="font-badge-caption text-badge-caption text-primary mb-space-2xs font-bold tracking-[0.2em] uppercase">
                            The Neepa Standard
                        </div>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                            Built on Guide Heritage &amp; Clinical Safety
                        </h2>
                        <p class="font-body-md text-body-md text-tertiary mt-space-2xs">
                            We do not outsource your safety to contractors. Every itinerary is led by our full-time
                            Kathmandu &amp; Khumbu trek family.
                        </p>
                    </div>
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                        <!-- Feature 1 -->
                        <div
                            class="bg-surface-container-lowest p-space-xl group flex flex-col justify-between rounded-xl shadow-sm transition-all hover:shadow-md">
                            <div>
                                <div
                                    class="bg-primary-container/20 text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary flex h-12 w-12 items-center justify-center rounded-lg transition-colors">
                                    <x-lucide-mountain class="size-[28px]" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">
                                    Guide-Led Heritage
                                </h3>
                                <p class="font-body-md text-body-md text-tertiary">
                                    Our lead trek sardars boast multiple 8,000m destinations and ancestral understanding
                                    of weather patterns, snow pack stability, and trail health.
                                </p>
                            </div>
                            <div
                                class="pt-space-lg font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold tracking-wider uppercase">
                                <span>NNMGA Certified</span>
                                <x-lucide-arrow-right class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Feature 2 -->
                        <div
                            class="bg-surface-container-lowest p-space-xl group flex flex-col justify-between rounded-xl shadow-sm transition-all hover:shadow-md">
                            <div>
                                <div
                                    class="bg-primary-container/20 text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary flex h-12 w-12 items-center justify-center rounded-lg transition-colors">
                                    <x-lucide-shield-plus class="size-[28px]" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">
                                    Medical &amp; Evacuation Ready
                                </h3>
                                <p class="font-body-md text-body-md text-tertiary">
                                    Daily pulse oximeter records, hyperbaric Gamow chambers on remote passes, and direct
                                    satellite phone links with our Kathmandu medical team.
                                </p>
                            </div>
                            <div
                                class="pt-space-lg font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold tracking-wider uppercase">
                                <span>Garmin InReach Active</span>
                                <x-lucide-arrow-right class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Feature 3 -->
                        <div
                            class="bg-surface-container-lowest p-space-xl group flex flex-col justify-between rounded-xl shadow-sm transition-all hover:shadow-md">
                            <div>
                                <div
                                    class="bg-primary-container/20 text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary flex h-12 w-12 items-center justify-center rounded-lg transition-colors">
                                    <x-lucide-hand-heart class="size-[28px]" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">
                                    Fair Porter Welfare
                                </h3>
                                <p class="font-body-md text-body-md text-tertiary">
                                    Strict 20kg weight caps, full mountain gear sets, living wages, and comprehensive
                                    medical insurance. Signatories to the International Porter Protection Charter.
                                </p>
                            </div>
                            <div
                                class="pt-space-lg font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold tracking-wider uppercase">
                                <span>Ethical Employment</span>
                                <x-lucide-arrow-right class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Feature 4 -->
                        <div
                            class="bg-surface-container-lowest p-space-xl group flex flex-col justify-between rounded-xl shadow-sm transition-all hover:shadow-md">
                            <div>
                                <div
                                    class="bg-primary-container/20 text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary flex h-12 w-12 items-center justify-center rounded-lg transition-colors">
                                    <x-lucide-sliders-horizontal class="size-[28px]" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">
                                    Bespoke Flexibility
                                </h3>
                                <p class="font-body-md text-body-md text-tertiary">
                                    Upgrade to handpicked luxury teahouse lodges with heated beds, private helicopter
                                    returns from Kala Patthar, or custom alpine photography paces.
                                </p>
                            </div>
                            <div
                                class="pt-space-lg font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold tracking-wider uppercase">
                                <span>Private &amp; Tailored</span>
                                <x-lucide-arrow-right class="size-[16px]" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- MEET OUR TREK LEADERS -->
            <section class="py-space-3xl bg-surface w-full">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                    <div class="gap-space-2xl grid grid-cols-1 items-center lg:grid-cols-12">
                        <!-- Left: Leader Highlight with Image -->
                        @php
                            $featuredGuide = \Blaze\AdminCore\Models\TeamMember::where('status', true)
                                ->where('is_guide', true)
                                ->where('featured', true)
                                ->orderBy('sort_order')
                                ->first();
                            $totalGuides = \Blaze\AdminCore\Models\TeamMember::where('status', true)->where('is_guide', true)->count();
                        @endphp
                        <div class="relative lg:col-span-6">
                            @if($featuredGuide)
                                <div class="bg-ridge-deep relative overflow-hidden rounded-2xl shadow-2xl">
                                    <img alt="{{ $featuredGuide->name }}"
                                        class="h-auto max-h-[580px] w-full object-cover"
                                        src="{{ $featuredGuide->image ? \Illuminate\Support\Facades\Storage::disk('public')->url($featuredGuide->image) : 'https://placehold.co/600x800' }}" />
                                    <div
                                        class="from-ridge-deep absolute inset-0 bg-gradient-to-t via-transparent to-transparent opacity-90">
                                    </div>
                                    <div class="text-summit-white absolute right-6 bottom-6 left-6">
                                        <span
                                            class="px-space-sm bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption rounded py-1 font-bold tracking-wider uppercase">
                                            {{ $featuredGuide->designation ?? $featuredGuide->role ?? 'Trek Leader' }}
                                        </span>
                                        <h3 class="font-headline-md text-headline-md text-summit-white mt-2 font-bold">
                                            {{ $featuredGuide->name }}
                                        </h3>
                                        <p class="font-body-sm text-body-sm text-surface-container-high mt-1 opacity-90">
                                            {!! strip_tags($featuredGuide->bio) !!}
                                        </p>
                                    </div>
                                </div>
                            @else
                            <div class="bg-ridge-deep relative overflow-hidden rounded-2xl shadow-2xl">
                                <img alt="Portrait of Dawa Tenzing Sherpa, Senior Trek Guide"
                                    class="h-auto max-h-[580px] w-full object-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDacVdR5VA8tGaaIOU8DkYpJb4kqOBUqEhRNNZdvOFiYxTom4bM2ebieAgUriYYqW-KVdfcX6vxkBl5Ew4OvWs74tqA4vYaCbaKgmvg_QkDkrKaIEzv1lIRq_w60KQbKsmBDGdn8qOwZKSgrGA7XpwrYehBeNLKCm1sRc0t5Qu8rrgJcjG2y-D8nHkUVrO7JJyALl3aBLxSfmwX96EM7eKsWTkVttaqoZbg252LXTmAN2RFUD893XLz" />
                                <div
                                    class="from-ridge-deep absolute inset-0 bg-gradient-to-t via-transparent to-transparent opacity-90">
                                </div>
                                <div class="text-summit-white absolute right-6 bottom-6 left-6">
                                    <span
                                        class="px-space-sm bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption rounded py-1 font-bold tracking-wider uppercase">
                                        Chief Trek Leader
                                    </span>
                                    <h3 class="font-headline-md text-headline-md text-summit-white mt-2 font-bold">
                                        Dawa Tenzing Sherpa
                                    </h3>
                                    <p class="font-body-sm text-body-sm text-surface-container-high mt-1 opacity-90">
                                        14x Everest Destinations • 4x K2 Treks • Lead High-Altitude Rescue Trainer
                                    </p>
                                </div>
                            </div>
                            @endif
                            <!-- Floating Micro Credential Card -->
                            <div
                                class="bg-surface-container-lowest p-space-md gap-space-md absolute -right-6 -bottom-6 hidden max-w-xs items-center rounded-xl shadow-xl sm:flex">
                                <x-lucide-award class="text-primary size-[36px]" />
                                <div>
                                    <div class="font-headline-sm text-headline-sm text-on-surface font-bold">100%</div>
                                    <div class="font-body-sm text-body-sm text-tertiary">
                                        Zero Serious Alpine Incidents across 13 Seasons
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Right: Story & Guide Culture -->
                        <div class="space-y-space-lg lg:col-span-6">
                            <div>
                                <div
                                    class="font-badge-caption text-badge-caption text-primary mb-space-2xs font-bold tracking-[0.2em] uppercase">
                                    The Mountain Guardians
                                </div>
                                <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                                    You Are in the Hands of Nepal's Finest Trekkers
                                </h2>
                            </div>
                            <p class="font-body-lg text-body-lg text-tertiary">
                                Every Neepa Adventure trekker is paired with authentic Guides born and raised in
                                high-altitude Khumbu, Rolwaling, or Dolpo valleys. Their physiological adaptation is
                                matched with world-standard certifications in wilderness trauma, high-angle rescue, and
                                weather modeling.
                            </p>
                            <div class="space-y-space-md">
                                <div class="gap-space-md flex items-start">
                                    <div
                                        class="bg-surface-container-high text-primary mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
                                        <x-lucide-badge-check class="size-[22px]" />
                                    </div>
                                    <div>
                                        <h4 class="font-headline-sm text-headline-sm text-on-surface">
                                            Licensed Guides
                                        </h4>
                                        <p class="font-body-sm text-body-sm text-tertiary">
                                            Formal international diplomas certifying rope management, crevasse
                                            extraction, and alpine group leadership.
                                        </p>
                                    </div>
                                </div>
                                <div class="gap-space-md flex items-start">
                                    <div
                                        class="bg-surface-container-high text-primary mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
                                        <x-lucide-languages class="size-[22px]" />
                                    </div>
                                    <div>
                                        <h4 class="font-headline-sm text-headline-sm text-on-surface">
                                            Multilingual Storytellers
                                        </h4>
                                        <p class="font-body-sm text-body-sm text-tertiary">
                                            Fluent in English, Nepali, Tibetan dialects, and German/French on
                                            specialized private departures.
                                        </p>
                                    </div>
                                </div>
                                <div class="gap-space-md flex items-start">
                                    <div
                                        class="bg-surface-container-high text-primary mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
                                        <x-lucide-heart class="size-[22px]" />
                                    </div>
                                    <div>
                                        <h4 class="font-headline-sm text-headline-sm text-on-surface">
                                            Genuine Himalayan Hospitality
                                        </h4>
                                        <p class="font-body-sm text-body-sm text-tertiary">
                                            Experience teahouse evenings warming by hearths with ginger honey tea,
                                            Buddhist legends, and mountain songs.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-space-sm gap-space-md flex items-center">
                                <a class="px-space-lg py-space-sm bg-ridge-deep text-summit-white font-label-md text-label-md hover:bg-tertiary rounded-lg font-bold tracking-wider uppercase transition-all"
                                    href="{{ route('about') }}#team-leaders">
                                    Meet All {{ $totalGuides > 0 ? $totalGuides : 24 }} Guides
                                </a>
                                <span class="font-body-sm text-body-sm text-tertiary">Or request a specific sardar for
                                    private groups.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- TRAVELLER REVIEWS & VERIFIED TREKS -->
            <section class="py-space-3xl bg-surface-container-low w-full">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                    <div class="mb-space-2xl gap-space-md flex flex-col justify-between md:flex-row md:items-end">
                        <div>
                            <div
                                class="font-badge-caption text-badge-caption text-primary mb-space-2xs font-bold tracking-[0.2em] uppercase">
                                Voices from the Pass
                            </div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                                Hear From Our Clients
                            </h2>
                        </div>
                        {{-- <div class="gap-space-2xs flex items-center">
                            <span class="font-headline-sm text-headline-sm text-on-surface font-bold">4.92 / 5.0</span>
                            <div class="text-primary flex">
                                <x-lucide-star class="size-[20px]" />
                                <x-lucide-star class="size-[20px]" />
                                <x-lucide-star class="size-[20px]" />
                                <x-lucide-star class="size-[20px]" />
                                <x-lucide-star class="size-[20px]" />
                            </div>
                            <span class="text-body-sm text-tertiary ml-2">TripAdvisor • Google Verified</span>
                        </div> --}}
                    </div>
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-3">
                        <!-- Review Card 1 -->
                        <div
                            class="bg-surface-container-lowest p-space-lg flex flex-col justify-between rounded-xl shadow-sm">
                            <div>
                                <div class="text-primary mb-space-sm flex items-center gap-1">
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                </div>
                                <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-2xs">
                                    "Flawless Cho La Pass crossing"
                                </h4>
                                <p class="font-body-md text-body-md text-tertiary mb-space-md">
                                    "We had unexpected fresh snow on Cho La, but Dawa and Ang Karma guided our group
                                    with absolute calm and expertise. Their attention to our pulse ox twice daily made
                                    everyone feel confident and safe."
                                </p>
                            </div>
                            <div class="pt-space-md flex items-center justify-between">
                                <div>
                                    <div class="font-label-md text-label-md text-on-surface font-bold">
                                        Marcus &amp; Elena Vance
                                    </div>
                                    <div class="font-body-sm text-body-sm text-tertiary">
                                        Everest &amp; Gokyo Lakes • Oct 2024
                                    </div>
                                </div>
                                <x-lucide-shield-check class="text-primary size-[24px]" />
                            </div>
                        </div>
                        <!-- Review Card 2 -->
                        <div
                            class="bg-surface-container-lowest p-space-lg flex flex-col justify-between rounded-xl shadow-sm">
                            <div>
                                <div class="text-primary mb-space-sm flex items-center gap-1">
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                </div>
                                <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-2xs">
                                    "My first 6,000m destination on Island Pass"
                                </h4>
                                <p class="font-body-md text-body-md text-tertiary mb-space-md">
                                    "The trekking refresher at High Camp was thorough. On destination day, my trekking
                                    Guide Pemba paced me like clockwork up the headwall. Standing at 6,189m at sunrise
                                    is an experience I will cherish forever."
                                </p>
                            </div>
                            <div class="pt-space-md flex items-center justify-between">
                                <div>
                                    <div class="font-label-md text-label-md text-on-surface font-bold">
                                        Dr. Julian Richter
                                    </div>
                                    <div class="font-body-sm text-body-sm text-tertiary">
                                        Island Pass Trek • Nov 2024
                                    </div>
                                </div>
                                <x-lucide-shield-check class="text-primary size-[24px]" />
                            </div>
                        </div>
                        <!-- Review Card 3 -->
                        <div
                            class="bg-surface-container-lowest p-space-lg flex flex-col justify-between rounded-xl shadow-sm">
                            <div>
                                <div class="text-primary mb-space-sm flex items-center gap-1">
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                </div>
                                <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-2xs">
                                    "Untamed beauty around Manaslu"
                                </h4>
                                <p class="font-body-md text-body-md text-tertiary mb-space-md">
                                    "No crowd jams, raw Tibetan culture, and incredible Guide care. Even when my bag
                                    zipper tore, our porter carried special repair tape. Outstanding logistics from
                                    Kathmandu airport to the mountain and back."
                                </p>
                            </div>
                            <div class="pt-space-md flex items-center justify-between">
                                <div>
                                    <div class="font-label-md text-label-md text-on-surface font-bold">
                                        Chloe Deschenes
                                    </div>
                                    <div class="font-body-sm text-body-sm text-tertiary">
                                        Manaslu Circuit • Apr 2024
                                    </div>
                                </div>
                                <x-lucide-shield-check class="text-primary size-[24px]" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- FINAL CALL TO ACTION BANNER -->
            <section class="bg-ridge-deep py-space-3xl relative w-full overflow-hidden">
                <!-- Atmospheric mountain background -->
                <div class="pointer-events-none absolute inset-0 h-full w-full bg-cover bg-center opacity-25 mix-blend-screen"
                    data-alt="Silhouetted mountain ranges of the Himalayas at twilight with deep blue and gold atmospheric gradient and twinkling Himalayan tea house lights in the valley below."
                    style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBXePxF8MuSeK46xEujkhtG8vhxYAqOJILD6pYygp8iqloHj91ZYKR5w21kX8bFHqJuGAlzhQRNSXMHbFiIthpJ_l_9sk9xP5yqn_ZFbVbgJe8LI8W1kOBH9RgMKaRLHh4QzKCIePzu8si3aTM1sX8lNw5meRTk9zAP0pnjPtMvWoGPmjx4fa5scTXalsGChHu623kMP_JPOs0a170I1pMpFF0PzuaoS7sc0h6Hs-gcvTq5sn9VlECt');
                    ">
                </div>
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop relative z-10 mx-auto">
                    <div
                        class="from-surface-container-lowest/10 to-surface-container-lowest/5 p-space-xl lg:p-space-3xl border-summit-white/10 gap-space-2xl flex flex-col items-center justify-between rounded-2xl border bg-gradient-to-r text-center backdrop-blur-xl lg:flex-row lg:text-left">
                        <div class="space-y-space-sm max-w-xl">
                            <div
                                class="gap-space-xs px-space-sm bg-primary-container/20 text-primary-container font-badge-caption text-badge-caption inline-flex items-center rounded-full py-1 font-bold tracking-wider uppercase">
                                <x-lucide-headphones class="size-[16px]" />
                                Fast Response Trek Desk
                            </div>
                            <h2
                                class="font-headline-lg text-headline-lg text-summit-white leading-tight tracking-tight">
                                Ready to Walk Among the Himalayan Giants?
                            </h2>
                            <p class="font-body-lg text-body-lg text-surface-container opacity-85">
                                Receive a personalized day-by-day itinerary, custom teahouse selection, and a
                                complimentary altitude readiness assessment within 2 hours.
                            </p>
                        </div>
                        <div class="gap-space-md flex w-full shrink-0 flex-col items-center sm:w-auto sm:flex-row">
                            <a class="px-space-xl py-space-md bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md w-full rounded-lg text-center font-bold tracking-wider uppercase shadow-lg transition-all sm:w-auto"
                                data-path="plan-your-trek" href="#">
                                Talk to an Expert
                            </a>
                            <a class="px-space-xl py-space-md bg-summit-white/10 hover:bg-summit-white/20 text-summit-white font-label-md text-label-md w-full rounded-lg text-center font-bold tracking-wider uppercase backdrop-blur-sm transition-all sm:w-auto"
                                data-path="treks" href="#">
                                Download Catalog
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- CLIENT-SIDE MICRO-INTERACTIONS -->
        <script>
            (function() {
                const tabButtons = document.querySelectorAll('#trekTabs button');
                tabButtons.forEach((btn) => {
                    btn.addEventListener('click', function() {
                        tabButtons.forEach((b) => {
                            b.classList.remove(
                                'bg-primary-container',
                                'text-on-primary-fixed',
                                'font-bold',
                                'shadow-sm',
                            );
                            b.classList.add('text-tertiary', 'font-medium');
                        });
                        this.classList.remove('text-tertiary', 'font-medium');
                        this.classList.add('bg-primary-container', 'text-on-primary-fixed', 'font-bold',
                            'shadow-sm');
                    });
                });
            })();
        </script>
    </main>
    <x-footer />
</x-layouts.app>
