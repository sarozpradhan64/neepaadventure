<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-48">
        <div class="flex w-full flex-col">
            <!-- HERO SECTION WITH TOP OVERLAY AND NEGATIVE MARGIN CLEARANCE -->
            <section class="bg-ridge-deep relative -mt-20 w-full overflow-hidden pt-36 pb-24">
                <!-- Hero Background Visual with Atmospheric Gradient Scrim -->
                <div
                    class="absolute inset-0 h-full w-full scale-105 transform bg-cover bg-center opacity-45 mix-blend-luminosity transition-transform duration-1000"
                    data-alt="Vast cinematic panorama of Ama Dablam and Mount Everest at golden hour sunrise in Nepal, towering snow-covered jagged passes against a clear alpine sky with warm golden sun rays hitting pristine glaciers and prayer flags fluttering on an ancient stone ridge, ultra-wide professional landscape photography."
                    style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBWm4bd_ZWSqeS4ZDUw6ieD9YH3wcgE-xDdiyCrLoZmNc38H_eVcehQRfzRaWV2oN-t64VYglXgF1h-4DHdB6nMBgmwPowMu-4r9ywUCBGFZjJisMPG4RtnRpF5UPMcIJNyW23CJQSCb9TOEbxfDuGF94E8WzXAW0uWithmsHUIg76y_5CnaMVtehdmjneAMWNTMHBcs6ppEQZqOk3MgezQ92YbpYMIPFMh_GChKQXV_cHcKCDVRVpR');
                    "
                ></div>
                <!-- Ambient Radial Warmth Gradient -->
                <div class="from-ridge-deep via-ridge-deep/75 pointer-events-none absolute inset-0 bg-gradient-to-t to-transparent"></div>
                <div class="bg-primary-container/20 pointer-events-none absolute -top-32 right-1/4 h-96 w-96 rounded-full blur-3xl"></div>
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop relative z-10 mx-auto flex flex-col items-center text-center">
                    @php
                        $heroTitle = $websiteSettings['hero_title'] ?? "Conquer the World's Highest Passes with Guide Mastery";
                        $heroText = $websiteSettings['hero_text'] ?? "Pioneering 100% safety records across Nepal's 8,000m trails. Led by certified IFMGA/NNMGA Guide leaders with sustainable zero-plastic ethics and intimate small trek teams.";
                        $highlightText = $websiteSettings['hero_highlighted_text'] ?? '';

                        if ($highlightText) {
                            $words = array_filter(array_map('trim', explode(',', $highlightText)));
                            foreach ($words as $word) {
                                if (str_contains($heroTitle, $word)) {
                                    $heroTitle = str_replace(
                                        $word,
                                        '<span class="text-primary-container inline-block font-black drop-shadow-lg">'.$word.'</span>',
                                        $heroTitle
                                    );
                                }
                            }
                        }
                    @endphp
                    <!-- Main Headline -->
                    <h1 class="font-display-xl text-display-xl font-extrabold text-summit-white mb-space-md max-w-4xl leading-[1.08] tracking-tight drop-shadow-md">
                        {!! $heroTitle !!}
                    </h1>
                    <!-- Subheadline -->
                    <p class="font-body-lg text-body-lg text-surface-container mb-space-xl mx-auto max-w-2xl opacity-90">
                        {{ $heroText }}
                    </p>
                    <!-- Quick Trust Proof Badges -->
                    <div class="gap-space-sm mb-space-2xl text-summit-white font-label-sm text-label-sm flex flex-wrap items-center justify-center">
                        <div class="gap-space-2xs px-space-sm py-space-2xs bg-summit-white/10 flex items-center rounded-full backdrop-blur-sm">
                            <x-lucide-star class="text-primary-container size-[18px]" />
                            <span class="text-summit-white font-semibold">4.9/5 from 1,400+ Trekkers</span>
                        </div>
                        <div class="gap-space-2xs px-space-sm py-space-2xs bg-summit-white/10 flex items-center rounded-full backdrop-blur-sm">
                            <x-lucide-shield-check class="text-primary-container size-[18px]" />
                            <span class="text-summit-white font-semibold">100% Guaranteed Departures</span>
                        </div>
                        <div class="gap-space-2xs px-space-sm py-space-2xs bg-summit-white/10 flex items-center rounded-full backdrop-blur-sm">
                            <x-lucide-leaf class="text-primary-container size-[18px]" />
                            <span class="text-summit-white font-semibold">Zero-Trace Footprint</span>
                        </div>
                        <div class="gap-space-2xs px-space-sm py-space-2xs bg-summit-white/10 flex items-center rounded-full backdrop-blur-sm">
                            <x-lucide-siren class="text-primary-container size-[18px]" />
                            <span class="text-summit-white font-semibold">24/7 Heli-Rescue Ready</span>
                        </div>
                    </div>
                    <!-- Interactive Floating Trip Search & Filter Bar -->
                    {{-- <div
                        class="w-full max-w-5xl bg-surface-container-lowest shadow-2xl rounded-xl p-space-md lg:p-space-lg text-left -mb-16 relative z-20">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-space-md items-end">
                            <!-- Destination Field -->
                            <div class="space-y-space-2xs">
                                <label
                                    class="block font-badge-caption text-badge-caption uppercase tracking-wider text-tertiary">Destination
                                    Region</label>
                                <div class="relative">
                                    <select
                                        class="w-full h-11 px-space-sm rounded-lg bg-surface-container-low font-body-md text-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-primary appearance-none cursor-pointer">
                                        <option value="all">All Himalayan Regions</option>
                                        <option value="everest">Everest &amp; Khumbu</option>
                                        <option value="annapurna">Annapurna Circuit &amp; Sanctuary</option>
                                        <option value="manaslu">Manaslu High Pass</option>
                                        <option value="mustang">Upper Mustang Kingdom</option>
                                        <option value="langtang">Langtang Valley</option>
                                    </select>
                                    <x-lucide-chevron-down
                                        class="absolute right-space-xs top-2.5 text-tertiary pointer-events-none size-[20px]" />
                                </div>
                            </div>
                            <!-- Activity Level -->
                            <div class="space-y-space-2xs">
                                <label
                                    class="block font-badge-caption text-badge-caption uppercase tracking-wider text-tertiary">Activity
                                    / Grade</label>
                                <div class="relative">
                                    <select
                                        class="w-full h-11 px-space-sm rounded-lg bg-surface-container-low font-body-md text-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-primary appearance-none cursor-pointer">
                                        <option value="all">Any Difficulty</option>
                                        <option value="moderate">Moderate (Grade II)</option>
                                        <option value="challenging">Challenging (Grade III)</option>
                                        <option value="strenuous">Strenuous Alpine (Grade IV)</option>
                                        <option value="technical">6,000m High Altitude Trekking</option>
                                    </select>
                                    <x-lucide-mountain
                                        class="absolute right-space-xs top-2.5 text-tertiary pointer-events-none size-[20px]" />
                                </div>
                            </div>
                            <!-- Season / Window -->
                            <div class="space-y-space-2xs">
                                <label
                                    class="block font-badge-caption text-badge-caption uppercase tracking-wider text-tertiary">Season
                                    Window</label>
                                <div class="relative">
                                    <select
                                        class="w-full h-11 px-space-sm rounded-lg bg-surface-container-low font-body-md text-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-primary appearance-none cursor-pointer">
                                        <option value="spring2025">Spring 2025 (Mar - May)</option>
                                        <option value="autumn2025">Autumn 2025 (Sep - Nov)</option>
                                        <option value="winter2025">Winter 2025 (Dec - Feb)</option>
                                        <option value="spring2026">Spring 2026</option>
                                    </select>
                                    <x-lucide-calendar-days
                                        class="absolute right-space-xs top-2.5 text-tertiary pointer-events-none size-[20px]" />
                                </div>
                            </div>
                            <!-- Duration -->
                            <div class="space-y-space-2xs">
                                <label
                                    class="block font-badge-caption text-badge-caption uppercase tracking-wider text-tertiary">Duration</label>
                                <div class="relative">
                                    <select
                                        class="w-full h-11 px-space-sm rounded-lg bg-surface-container-low font-body-md text-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-primary appearance-none cursor-pointer">
                                        <option value="all">Any Duration</option>
                                        <option value="short">7 - 11 Days</option>
                                        <option value="classic">12 - 16 Days</option>
                                        <option value="epic">17+ Days Trek</option>
                                    </select>
                                    <x-lucide-clock-3
                                        class="absolute right-space-xs top-2.5 text-tertiary pointer-events-none size-[20px]" />
                                </div>
                            </div>
                            <!-- Action Button -->
                            <button
                                class="w-full h-11 bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider rounded-lg transition-all flex items-center justify-center gap-space-xs shadow-md active:scale-95">
                                <x-lucide-search class="size-[20px]" />
                                <span>Explore</span>
                            </button>
                        </div>
                    </div> --}}
                </div>
            </section>
            <!-- REPUTATION STRIP (Elevation Transition) -->
            <section class="bg-surface-container-low pb-space-xl w-full pt-24">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                    <div class="gap-space-lg text-tertiary font-label-sm text-label-sm flex flex-wrap items-center justify-between">
                        <div class="gap-space-xs flex items-center">
                            <x-lucide-shield-check class="text-primary size-[24px]" />
                            <span>100% High-Altitude Acclimatization Rate</span>
                        </div>
                        <div class="gap-space-xs flex items-center">
                            <x-lucide-users class="text-primary size-[24px]" />
                            <span>Guide-to-Guest Ratio 1:3 Maximum</span>
                        </div>
                        <div class="gap-space-xs flex items-center">
                            <x-lucide-briefcase-medical class="text-primary size-[24px]" />
                            <span>Gamow Bag &amp; O2 Backup on Every Pass</span>
                        </div>
                        <div class="gap-space-xs flex items-center">
                            <x-lucide-users-round class="text-primary size-[24px]" />
                            <span>Porter Welfare Certified (IMEC Compliance)</span>
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
                            <div class="font-badge-caption text-badge-caption text-primary mb-space-2xs font-bold tracking-[0.2em] uppercase">
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
                        <div
                            class="gap-space-2xs bg-surface-container-high flex flex-wrap self-start rounded-xl p-1.5 md:self-auto"
                            id="trekTabs"
                        >
                            <button class="px-space-md py-space-2xs font-label-md text-label-md bg-primary-container text-on-primary-fixed rounded-lg font-bold shadow-sm">
                                All Treks
                            </button>
                            <button class="px-space-md py-space-2xs font-label-md text-label-md text-tertiary hover:text-on-surface hover:bg-surface-container-lowest rounded-lg font-medium transition-all">
                                Classic High Passes
                            </button>
                            <button class="px-space-md py-space-2xs font-label-md text-label-md text-tertiary hover:text-on-surface hover:bg-surface-container-lowest rounded-lg font-medium transition-all">
                                Remote &amp; Forbidden
                            </button>
                            <button class="px-space-md py-space-2xs font-label-md text-label-md text-tertiary hover:text-on-surface hover:bg-surface-container-lowest rounded-lg font-medium transition-all">
                                6,000m Destinations
                            </button>
                        </div>
                    </div>
                    <!-- 4-Card Trek Grid -->
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                        <!-- CARD 1: EBC & Gokyo Ri -->
                        <x-trek-card
                            title="Everest Base Camp & Gokyo Ri Lakes"
                            image="https://lh3.googleusercontent.com/aida-public/AB6AXuCGV3jfAcQ1D1ainUbQOlN36bRNEhWQGL-L0bvJWHSx_5I77ZvEQ4teqGSfxfW5liU1qVdN5ho5gk8-oKnbccQDJkvpcYj_8TzLI6GgS8VaXbizM_6LNxAqUB6z_2k4fVTZazbgFodhX2yNoJIVgNIVo_OEvmp7DjvNDZa-DXG8DQUg5anAkyougQ42Prtx9HnsPZcM5ZpLXXV-8LuhHwv8eHmzMgW5eQlsewese6Ng5S7WlYknGVUI"
                            badge="Best Seller"
                            badgeClass="bg-primary-container text-on-primary-fixed"
                            altitude="5,364m"
                            duration="16 Days"
                            rating="4.9"
                            reviews="340"
                            description="Cross the famed Cho La Pass, stand alongside the turquoise high-altitude sacred lakes, and witness uncrowded Everest sunrises."
                            :inclusions="['Guide & 2:1 Porter Ratio', 'Oxygen & Sat-Com Tracking Included']"
                            price="$1,750"
                            href="{{ route('trek-detail', ['slug' => 'ebc-gokyo-ri']) }}"
                        />
                        <!-- CARD 2: Annapurna Circuit -->
                        <x-trek-card
                            title="Annapurna Circuit & Tilicho Pass"
                            image="https://lh3.googleusercontent.com/aida-public/AB6AXuCNP4kkcrjSQJNNyDqk5v4TUHIaNS589LcNfzBtwllPHnSHJf0dCQ64ZfhruTaREzXKHpB4D1POySWp-MyxZNiNA4Uqb7_MxodO-wpXzCV4UgdLltxqxYwGm-NZtZL36EnkuoCgPp1kZPXawsV3OVC4iCXHTmXYFe5dt--5JtzqYFtRtsWgl1r_WngUYV8aDbDq0Zz0jsA9XFwXVZ1ucJsR9W5J5Z6JBO6ziEHlYZxqzl-Q5sZD0e0N"
                            badge="Classic Circuit"
                            badgeClass="bg-ridge-deep/80 text-summit-white"
                            altitude="5,416m"
                            duration="18 Days"
                            rating="4.95"
                            reviews="280"
                            description="Traverse dramatic climatic zones from lush subtropical valleys to the formidable Thorong La Pass and emerald Tilicho Lake."
                            :inclusions="['ACAP & TIMS Permits Arranged', 'Comfortable Teahouse Lodge Circuit']"
                            price="$1,590"
                            href="{{ route('trek-detail', ['slug' => 'annapurna-circuit']) }}"
                        />
                        <!-- CARD 3: Manaslu Circuit -->
                        <x-trek-card
                            title="Manaslu Circuit: The Sacred Neepa"
                            image="https://lh3.googleusercontent.com/aida-public/AB6AXuAMPw5A0GYFgyE8SoATLMIVDSwWNinr21j8Kzk1dp_-FnC3tuXsKMA82YMQyISnVfT2-k2cKxubB636GyLSJNH1zrFSEO2dsLz3WLzURkCoIB4xNkhVHLBhyzd7JtlTa76aMnl9SBBwcT9H4BAGuPm7jP0RCXif5sT8DYhezfqs2kipCDXvSgsqqnn8H5iVRNyuCpkGVeEiL7i6edxsY2ggJJn8ouDb9FGAnr3gCbQxtjJqmSyBH8FE"
                            badge="Low Footfall • Wild"
                            badgeClass="bg-tertiary text-summit-white"
                            altitude="5,106m"
                            duration="14 Days"
                            rating="4.92"
                            reviews="190"
                            description="Circumnavigate the eighth highest pass on Earth through ancient Tibetan borderlands and over the thrilling Larkya La Pass."
                            :inclusions="['Restricted Area Government Permit', 'Authentic Gurung & Tibetan Villages']"
                            price="$1,680"
                            href="{{ route('trek-detail', ['slug' => 'manaslu-circuit']) }}"
                        />
                        <!-- CARD 4: Island Pass 6,189m -->
                        <x-trek-card
                            title="Island Pass (Imja Tse) & EBC"
                            image="https://lh3.googleusercontent.com/aida-public/AB6AXuAlfFCnLWwAdMYDqNOV-XGuUMDBqo6v1AhcTLVRwrG0i3RXCOFbBgj7BocvuHe3_RMec3ZH27kl3HFEVvfTQM-_vtbXlM4AqRY0I7uXbpJnIFPDI8qJjJlF8OfQ4d3y0SEIaHk7eRUPaSjM-KO9RX49kuebgrh-b8-Illrkfi6cWgc1-_20PbX_Q5IHlCl-8O9H4zLnO6EB9OI2Ckr4wPnhEwbuJ6r0XnJ35ih0wKeRMtz8tRYtOkRj"
                            badge="High Altitude Trek"
                            badgeClass="bg-primary text-summit-white"
                            altitude="6,189m"
                            duration="19 Days"
                            rating="4.98"
                            reviews="115"
                            description="Comprehensive alpine training combined with Everest Base Camp trekking before ascending fixed ropes onto a towering 6,000m destination."
                            :inclusions="['NMA Trekking Permit & High Camp Tents', '1:1 Trekking Guide on Destination Push']"
                            price="$2,450"
                            href="{{ route('trek-detail', ['slug' => 'island-peak']) }}"
                        />
                    </div>
                </div>
            </section>
            <!-- INTERACTIVE ALTITUDE & ACCLIMATIZATION GUIDE STRIP -->
            <section class="bg-ridge-deep py-space-3xl text-summit-white relative w-full overflow-hidden">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop relative z-10 mx-auto">
                    <div class="mb-space-2xl mx-auto max-w-2xl text-center">
                        <div class="font-badge-caption text-badge-caption text-primary-container mb-space-2xs font-bold tracking-[0.2em] uppercase">
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
                            <svg
                                class="text-primary-container h-full w-full"
                                preserveaspectratio="none"
                                viewbox="0 0 900 160"
                            >
                                <defs>
                                    <lineargradient id="elevationGrad" x1="0" x2="0" y1="0" y2="1">
                                        <stop offset="0%" stop-color="#f6ba1a" stop-opacity="0.45"></stop>
                                        <stop offset="100%" stop-color="#f6ba1a" stop-opacity="0.0"></stop>
                                    </lineargradient>
                                </defs>
                                <!-- Elevation Filled Area -->
                                <path
                                    d="M0,150 L120,135 L260,110 L380,85 L520,60 L680,30 L780,18 L900,10 L900,160 L0,160 Z"
                                    fill="url(#elevationGrad)"
                                ></path>
                                <!-- Line Path -->
                                <path
                                    d="M0,150 L120,135 L260,110 L380,85 L520,60 L680,30 L780,18 L900,10"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-width="3"
                                ></path>
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
                                <span class="font-badge-caption text-badge-caption text-primary-container block font-bold uppercase">Base Checkpoint</span>
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
                                <span class="font-badge-caption text-badge-caption text-primary-container block font-bold uppercase">Guide Capital</span>
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
                                <span class="font-badge-caption text-badge-caption text-primary-container block font-bold uppercase">Spiritual Plateau</span>
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
                                <span class="font-badge-caption text-badge-caption text-primary-container block font-bold uppercase">Khumbu Glacier</span>
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
                                <span class="font-badge-caption text-badge-caption text-primary-container block font-bold uppercase">Destination Viewpoint</span>
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
                        <div class="font-badge-caption text-badge-caption text-primary mb-space-2xs font-bold tracking-[0.2em] uppercase">
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
                        <div class="bg-surface-container-lowest p-space-xl group flex flex-col justify-between rounded-xl shadow-sm transition-all hover:shadow-md">
                            <div>
                                <div class="bg-primary-container/20 text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary flex h-12 w-12 items-center justify-center rounded-lg transition-colors">
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
                            <div class="pt-space-lg font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold tracking-wider uppercase">
                                <span>NNMGA Certified</span>
                                <x-lucide-arrow-right class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Feature 2 -->
                        <div class="bg-surface-container-lowest p-space-xl group flex flex-col justify-between rounded-xl shadow-sm transition-all hover:shadow-md">
                            <div>
                                <div class="bg-primary-container/20 text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary flex h-12 w-12 items-center justify-center rounded-lg transition-colors">
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
                            <div class="pt-space-lg font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold tracking-wider uppercase">
                                <span>Garmin InReach Active</span>
                                <x-lucide-arrow-right class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Feature 3 -->
                        <div class="bg-surface-container-lowest p-space-xl group flex flex-col justify-between rounded-xl shadow-sm transition-all hover:shadow-md">
                            <div>
                                <div class="bg-primary-container/20 text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary flex h-12 w-12 items-center justify-center rounded-lg transition-colors">
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
                            <div class="pt-space-lg font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold tracking-wider uppercase">
                                <span>Ethical Employment</span>
                                <x-lucide-arrow-right class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Feature 4 -->
                        <div class="bg-surface-container-lowest p-space-xl group flex flex-col justify-between rounded-xl shadow-sm transition-all hover:shadow-md">
                            <div>
                                <div class="bg-primary-container/20 text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary flex h-12 w-12 items-center justify-center rounded-lg transition-colors">
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
                            <div class="pt-space-lg font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold tracking-wider uppercase">
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
                        <div class="relative lg:col-span-6">
                            <div class="bg-ridge-deep relative overflow-hidden rounded-2xl shadow-2xl">
                                <img
                                    alt="Portrait of Dawa Tenzing Sherpa, Senior Trek Guide"
                                    class="h-auto max-h-[580px] w-full object-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDacVdR5VA8tGaaIOU8DkYpJb4kqOBUqEhRNNZdvOFiYxTom4bM2ebieAgUriYYqW-KVdfcX6vxkBl5Ew4OvWs74tqA4vYaCbaKgmvg_QkDkrKaIEzv1lIRq_w60KQbKsmBDGdn8qOwZKSgrGA7XpwrYehBeNLKCm1sRc0t5Qu8rrgJcjG2y-D8nHkUVrO7JJyALl3aBLxSfmwX96EM7eKsWTkVttaqoZbg252LXTmAN2RFUD893XLz"
                                />
                                <div class="from-ridge-deep absolute inset-0 bg-gradient-to-t via-transparent to-transparent opacity-90"></div>
                                <div class="text-summit-white absolute right-6 bottom-6 left-6">
                                    <span class="px-space-sm bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption rounded py-1 font-bold tracking-wider uppercase">
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
                            <!-- Floating Micro Credential Card -->
                            <div class="bg-surface-container-lowest p-space-md gap-space-md absolute -right-6 -bottom-6 hidden max-w-xs items-center rounded-xl shadow-xl sm:flex">
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
                                <div class="font-badge-caption text-badge-caption text-primary mb-space-2xs font-bold tracking-[0.2em] uppercase">
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
                                    <div class="bg-surface-container-high text-primary mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
                                        <x-lucide-badge-check class="size-[22px]" />
                                    </div>
                                    <div>
                                        <h4 class="font-headline-sm text-headline-sm text-on-surface">
                                            IFMGA &amp; NNMGA Licensed Sardars
                                        </h4>
                                        <p class="font-body-sm text-body-sm text-tertiary">
                                            Formal international diplomas certifying rope management, crevasse
                                            extraction, and alpine group leadership.
                                        </p>
                                    </div>
                                </div>
                                <div class="gap-space-md flex items-start">
                                    <div class="bg-surface-container-high text-primary mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
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
                                    <div class="bg-surface-container-high text-primary mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
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
                                <a
                                    class="px-space-lg py-space-sm bg-ridge-deep text-summit-white font-label-md text-label-md hover:bg-tertiary rounded-lg font-bold tracking-wider uppercase transition-all"
                                    data-path="about-nepal"
                                    href="#"
                                >
                                    Meet All 24 Guides
                                </a>
                                <span class="font-body-sm text-body-sm text-tertiary">Or request a specific sardar for private groups.</span>
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
                            <div class="font-badge-caption text-badge-caption text-primary mb-space-2xs font-bold tracking-[0.2em] uppercase">
                                Voices from the Pass
                            </div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                                Verified Climber Experiences
                            </h2>
                        </div>
                        <div class="gap-space-2xs flex items-center">
                            <span class="font-headline-sm text-headline-sm text-on-surface font-bold">4.92 / 5.0</span>
                            <div class="text-primary flex">
                                <x-lucide-star class="size-[20px]" />
                                <x-lucide-star class="size-[20px]" />
                                <x-lucide-star class="size-[20px]" />
                                <x-lucide-star class="size-[20px]" />
                                <x-lucide-star class="size-[20px]" />
                            </div>
                            <span class="text-body-sm text-tertiary ml-2">TripAdvisor • Google Verified</span>
                        </div>
                    </div>
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-3">
                        <!-- Review Card 1 -->
                        <div class="bg-surface-container-lowest p-space-lg flex flex-col justify-between rounded-xl shadow-sm">
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
                        <div class="bg-surface-container-lowest p-space-lg flex flex-col justify-between rounded-xl shadow-sm">
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
                        <div class="bg-surface-container-lowest p-space-lg flex flex-col justify-between rounded-xl shadow-sm">
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
                <div
                    class="pointer-events-none absolute inset-0 h-full w-full bg-cover bg-center opacity-25 mix-blend-screen"
                    data-alt="Silhouetted mountain ranges of the Himalayas at twilight with deep blue and gold atmospheric gradient and twinkling Himalayan tea house lights in the valley below."
                    style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBXePxF8MuSeK46xEujkhtG8vhxYAqOJILD6pYygp8iqloHj91ZYKR5w21kX8bFHqJuGAlzhQRNSXMHbFiIthpJ_l_9sk9xP5yqn_ZFbVbgJe8LI8W1kOBH9RgMKaRLHh4QzKCIePzu8si3aTM1sX8lNw5meRTk9zAP0pnjPtMvWoGPmjx4fa5scTXalsGChHu623kMP_JPOs0a170I1pMpFF0PzuaoS7sc0h6Hs-gcvTq5sn9VlECt');
                    "
                ></div>
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop relative z-10 mx-auto">
                    <div class="from-surface-container-lowest/10 to-surface-container-lowest/5 p-space-xl lg:p-space-3xl border-summit-white/10 gap-space-2xl flex flex-col items-center justify-between rounded-2xl border bg-gradient-to-r text-center backdrop-blur-xl lg:flex-row lg:text-left">
                        <div class="space-y-space-sm max-w-xl">
                            <div class="gap-space-xs px-space-sm bg-primary-container/20 text-primary-container font-badge-caption text-badge-caption inline-flex items-center rounded-full py-1 font-bold tracking-wider uppercase">
                                <x-lucide-headphones class="size-[16px]" />
                                Fast Response Trek Desk
                            </div>
                            <h2 class="font-headline-lg text-headline-lg text-summit-white leading-tight tracking-tight">
                                Ready to Walk Among the Himalayan Giants?
                            </h2>
                            <p class="font-body-lg text-body-lg text-surface-container opacity-85">
                                Receive a personalized day-by-day itinerary, custom teahouse selection, and a
                                complimentary altitude readiness assessment within 2 hours.
                            </p>
                        </div>
                        <div class="gap-space-md flex w-full shrink-0 flex-col items-center sm:w-auto sm:flex-row">
                            <a
                                class="px-space-xl py-space-md bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md w-full rounded-lg text-center font-bold tracking-wider uppercase shadow-lg transition-all sm:w-auto"
                                data-path="plan-your-trek"
                                href="#"
                            >
                                Talk to an Alpine Specialist
                            </a>
                            <a
                                class="px-space-xl py-space-md bg-summit-white/10 hover:bg-summit-white/20 text-summit-white font-label-md text-label-md w-full rounded-lg text-center font-bold tracking-wider uppercase backdrop-blur-sm transition-all sm:w-auto"
                                data-path="treks"
                                href="#"
                            >
                                Download 2025/26 Catalog
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- CLIENT-SIDE MICRO-INTERACTIONS -->
        <script>
            (function () {
                const tabButtons = document.querySelectorAll('#trekTabs button');
                tabButtons.forEach((btn) => {
                    btn.addEventListener('click', function () {
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
                        this.classList.add('bg-primary-container', 'text-on-primary-fixed', 'font-bold', 'shadow-sm');
                    });
                });
            })();
        </script>
    </main>
    <x-footer />
</x-layouts.app>
