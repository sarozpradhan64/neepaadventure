<x-layouts.app>
    <x-header />
    <main class="w-full pt-20 bg-surface">
        <div class="flex flex-col w-full">
            <!-- HERO SECTION WITH TOP OVERLAY AND NEGATIVE MARGIN CLEARANCE -->
            <section class="relative w-full -mt-20 pt-36 pb-24 overflow-hidden bg-ridge-deep">
                <!-- Hero Background Visual with Atmospheric Gradient Scrim -->
                <div class="absolute inset-0 w-full h-full bg-cover bg-center opacity-45 mix-blend-luminosity transform scale-105 transition-transform duration-1000"
                    data-alt="Vast cinematic panorama of Ama Dablam and Mount Everest at golden hour sunrise in Nepal, towering snow-covered jagged peaks against a clear alpine sky with warm golden sun rays hitting pristine glaciers and prayer flags fluttering on an ancient stone ridge, ultra-wide professional landscape photography."
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBWm4bd_ZWSqeS4ZDUw6ieD9YH3wcgE-xDdiyCrLoZmNc38H_eVcehQRfzRaWV2oN-t64VYglXgF1h-4DHdB6nMBgmwPowMu-4r9ywUCBGFZjJisMPG4RtnRpF5UPMcIJNyW23CJQSCb9TOEbxfDuGF94E8WzXAW0uWithmsHUIg76y_5CnaMVtehdmjneAMWNTMHBcs6ppEQZqOk3MgezQ92YbpYMIPFMh_GChKQXV_cHcKCDVRVpR')">
                </div>
                <!-- Ambient Radial Warmth Gradient -->
                <div
                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep via-ridge-deep/75 to-transparent pointer-events-none">
                </div>
                <div
                    class="absolute -top-32 right-1/4 w-96 h-96 bg-primary-container/20 rounded-full blur-3xl pointer-events-none">
                </div>
                <div
                    class="relative max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop z-10 flex flex-col items-center text-center">
                    @php
                        $heroTitle = $websiteSettings['hero_title'] ?? "Conquer the World's Highest Peaks with Sherpa Mastery";
                        $heroText = $websiteSettings['hero_text'] ?? "Pioneering 100% safety records across Nepal's 8,000m trails. Led by certified IFMGA/NNMGA Sherpa leaders with sustainable zero-plastic ethics and intimate small expedition teams.";
                        $highlightText = $websiteSettings['hero_highlighted_text'] ?? '';
                        
                        if ($highlightText) {
                            $words = array_filter(array_map('trim', explode(',', $highlightText)));
                            foreach ($words as $word) {
                                if (str_contains($heroTitle, $word)) {
                                    $heroTitle = str_replace(
                                        $word, 
                                        '<span class="text-primary-container inline-block">' . $word . '</span>', 
                                        $heroTitle
                                    );
                                }
                            }
                        }
                    @endphp
                    <!-- Main Headline -->
                    <h1
                        class="font-display-xl text-display-xl text-summit-white max-w-4xl tracking-tight leading-[1.08] mb-space-md">
                        {!! $heroTitle !!}
                    </h1>
                    <!-- Subheadline -->
                    <p
                        class="font-body-lg text-body-lg text-surface-container max-w-2xl mx-auto mb-space-xl opacity-90">
                        {{ $heroText }}
                    </p>
                    <!-- Quick Trust Proof Badges -->
                    <div
                        class="flex flex-wrap items-center justify-center gap-space-sm mb-space-2xl text-summit-white font-label-sm text-label-sm">
                        <div
                            class="flex items-center gap-space-2xs px-space-sm py-space-2xs rounded-full bg-summit-white/10 backdrop-blur-sm">
                            <x-lucide-star class="text-primary-container size-[18px]" />
                            <span class="font-semibold text-summit-white">4.9/5 from 1,400+ Trekkers</span>
                        </div>
                        <div
                            class="flex items-center gap-space-2xs px-space-sm py-space-2xs rounded-full bg-summit-white/10 backdrop-blur-sm">
                            <x-lucide-shield-check class="text-primary-container size-[18px]" />
                            <span class="font-semibold text-summit-white">100% Guaranteed Departures</span>
                        </div>
                        <div
                            class="flex items-center gap-space-2xs px-space-sm py-space-2xs rounded-full bg-summit-white/10 backdrop-blur-sm">
                            <x-lucide-leaf class="text-primary-container size-[18px]" />
                            <span class="font-semibold text-summit-white">Zero-Trace Footprint</span>
                        </div>
                        <div
                            class="flex items-center gap-space-2xs px-space-sm py-space-2xs rounded-full bg-summit-white/10 backdrop-blur-sm">
                            <x-lucide-siren class="text-primary-container size-[18px]" />
                            <span class="font-semibold text-summit-white">24/7 Heli-Rescue Ready</span>
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
                                        <option value="technical">6,000m Peak Climbing</option>
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
                                        <option value="epic">17+ Days Expedition</option>
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
            <section class="w-full bg-surface-container-low pt-24 pb-space-xl">
                <div class="max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop">
                    <div
                        class="flex flex-wrap items-center justify-between gap-space-lg text-tertiary font-label-sm text-label-sm">
                        <div class="flex items-center gap-space-xs">
                            <x-lucide-shield-check class="text-primary size-[24px]" />
                            <span>100% High-Altitude Acclimatization Rate</span>
                        </div>
                        <div class="flex items-center gap-space-xs">
                            <x-lucide-users class="text-primary size-[24px]" />
                            <span>Sherpa-to-Guest Ratio 1:3 Maximum</span>
                        </div>
                        <div class="flex items-center gap-space-xs">
                            <x-lucide-briefcase-medical class="text-primary size-[24px]" />
                            <span>Gamow Bag &amp; O2 Backup on Every Pass</span>
                        </div>
                        <div class="flex items-center gap-space-xs">
                            <x-lucide-users-round class="text-primary size-[24px]" />
                            <span>Porter Welfare Certified (IMEC Compliance)</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- SIGNATURE EXPEDITIONS & TREKS -->
            <section class="w-full py-space-3xl bg-surface">
                <div class="max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop">
                    <!-- Section Header with Categorical Filter Tabs -->
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-2xl gap-space-lg">
                        <div>
                            <div
                                class="font-badge-caption text-badge-caption uppercase tracking-[0.2em] text-primary font-bold mb-space-2xs">
                                Curated Himalayan Routes</div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Signature Treks
                                &amp; Expeditions</h2>
                            <p class="font-body-md text-body-md text-tertiary mt-space-2xs max-w-xl">From standard high
                                passes to technical summits, all journeys feature experienced local leaders, private
                                logistics, and satellite rescue systems.</p>
                        </div>
                        <!-- Filter Pill Tabs -->
                        <div class="flex flex-wrap gap-space-2xs bg-surface-container-high p-1.5 rounded-xl self-start md:self-auto"
                            id="trekTabs">
                            <button
                                class="px-space-md py-space-2xs rounded-lg font-label-md text-label-md font-bold bg-primary-container text-on-primary-fixed shadow-sm">All
                                Expeditions</button>
                            <button
                                class="px-space-md py-space-2xs rounded-lg font-label-md text-label-md font-medium text-tertiary hover:text-on-surface hover:bg-surface-container-lowest transition-all">Classic
                                High Passes</button>
                            <button
                                class="px-space-md py-space-2xs rounded-lg font-label-md text-label-md font-medium text-tertiary hover:text-on-surface hover:bg-surface-container-lowest transition-all">Remote
                                &amp; Forbidden</button>
                            <button
                                class="px-space-md py-space-2xs rounded-lg font-label-md text-label-md font-medium text-tertiary hover:text-on-surface hover:bg-surface-container-lowest transition-all">6,000m
                                Summits</button>
                        </div>
                    </div>
                    <!-- 4-Card Expedition Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-lg">
                        <!-- CARD 1: EBC & Gokyo Ri -->
                        <x-trek-card title="Everest Base Camp & Gokyo Ri Lakes"
                            image="https://lh3.googleusercontent.com/aida-public/AB6AXuCGV3jfAcQ1D1ainUbQOlN36bRNEhWQGL-L0bvJWHSx_5I77ZvEQ4teqGSfxfW5liU1qVdN5ho5gk8-oKnbccQDJkvpcYj_8TzLI6GgS8VaXbizM_6LNxAqUB6z_2k4fVTZazbgFodhX2yNoJIVgNIVo_OEvmp7DjvNDZa-DXG8DQUg5anAkyougQ42Prtx9HnsPZcM5ZpLXXV-8LuhHwv8eHmzMgW5eQlsewese6Ng5S7WlYknGVUI"
                            badge="Best Seller" badgeClass="bg-primary-container text-on-primary-fixed"
                            altitude="5,364m" duration="16 Days" rating="4.9" reviews="340"
                            description="Cross the famed Cho La Pass, stand alongside the turquoise high-altitude sacred lakes, and witness uncrowded Everest sunrises."
                            :inclusions="['Sherpa Guide & 2:1 Porter Ratio', 'Oxygen & Sat-Com Tracking Included']" price="$1,750"
                            href="{{ route('trek-detail', ['slug' => 'ebc-gokyo-ri']) }}" />
                        <!-- CARD 2: Annapurna Circuit -->
                        <x-trek-card title="Annapurna Circuit & Tilicho Pass"
                            image="https://lh3.googleusercontent.com/aida-public/AB6AXuCNP4kkcrjSQJNNyDqk5v4TUHIaNS589LcNfzBtwllPHnSHJf0dCQ64ZfhruTaREzXKHpB4D1POySWp-MyxZNiNA4Uqb7_MxodO-wpXzCV4UgdLltxqxYwGm-NZtZL36EnkuoCgPp1kZPXawsV3OVC4iCXHTmXYFe5dt--5JtzqYFtRtsWgl1r_WngUYV8aDbDq0Zz0jsA9XFwXVZ1ucJsR9W5J5Z6JBO6ziEHlYZxqzl-Q5sZD0e0N"
                            badge="Classic Circuit" badgeClass="bg-ridge-deep/80 text-summit-white" altitude="5,416m"
                            duration="18 Days" rating="4.95" reviews="280"
                            description="Traverse dramatic climatic zones from lush subtropical valleys to the formidable Thorong La Pass and emerald Tilicho Lake."
                            :inclusions="['ACAP & TIMS Permits Arranged', 'Comfortable Teahouse Lodge Circuit']" price="$1,590"
                            href="{{ route('trek-detail', ['slug' => 'annapurna-circuit']) }}" />
                        <!-- CARD 3: Manaslu Circuit -->
                        <x-trek-card title="Manaslu Circuit: The Sacred Neepa"
                            image="https://lh3.googleusercontent.com/aida-public/AB6AXuAMPw5A0GYFgyE8SoATLMIVDSwWNinr21j8Kzk1dp_-FnC3tuXsKMA82YMQyISnVfT2-k2cKxubB636GyLSJNH1zrFSEO2dsLz3WLzURkCoIB4xNkhVHLBhyzd7JtlTa76aMnl9SBBwcT9H4BAGuPm7jP0RCXif5sT8DYhezfqs2kipCDXvSgsqqnn8H5iVRNyuCpkGVeEiL7i6edxsY2ggJJn8ouDb9FGAnr3gCbQxtjJqmSyBH8FE"
                            badge="Low Footfall • Wild" badgeClass="bg-tertiary text-summit-white" altitude="5,106m"
                            duration="14 Days" rating="4.92" reviews="190"
                            description="Circumnavigate the eighth highest peak on Earth through ancient Tibetan borderlands and over the thrilling Larkya La Pass."
                            :inclusions="['Restricted Area Government Permit', 'Authentic Gurung & Tibetan Villages']" price="$1,680"
                            href="{{ route('trek-detail', ['slug' => 'manaslu-circuit']) }}" />
                        <!-- CARD 4: Island Peak 6,189m -->
                        <x-trek-card title="Island Peak (Imja Tse) & EBC"
                            image="https://lh3.googleusercontent.com/aida-public/AB6AXuAlfFCnLWwAdMYDqNOV-XGuUMDBqo6v1AhcTLVRwrG0i3RXCOFbBgj7BocvuHe3_RMec3ZH27kl3HFEVvfTQM-_vtbXlM4AqRY0I7uXbpJnIFPDI8qJjJlF8OfQ4d3y0SEIaHk7eRUPaSjM-KO9RX49kuebgrh-b8-Illrkfi6cWgc1-_20PbX_Q5IHlCl-8O9H4zLnO6EB9OI2Ckr4wPnhEwbuJ6r0XnJ35ih0wKeRMtz8tRYtOkRj"
                            badge="6000m Peak Climb" badgeClass="bg-primary text-summit-white" altitude="6,189m"
                            duration="19 Days" rating="4.98" reviews="115"
                            description="Comprehensive alpine training combined with Everest Base Camp trekking before ascending fixed ropes onto a towering 6,000m summit."
                            :inclusions="['NMA Climbing Permit & High Camp Tents', '1:1 Climbing Sherpa on Summit Push']" price="$2,450"
                            href="{{ route('trek-detail', ['slug' => 'island-peak']) }}" />
                    </div>
                </div>
            </section>
            <!-- INTERACTIVE ALTITUDE & ACCLIMATIZATION GUIDE STRIP -->
            <section class="w-full bg-ridge-deep py-space-3xl text-summit-white relative overflow-hidden">
                <div class="max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop relative z-10">
                    <div class="text-center max-w-2xl mx-auto mb-space-2xl">
                        <div
                            class="font-badge-caption text-badge-caption uppercase tracking-[0.2em] text-primary-container font-bold mb-space-2xs">
                            Precision Alpine Science</div>
                        <h2 class="font-headline-lg text-headline-lg text-summit-white tracking-tight">Acclimatization
                            Profile &amp; Protocol</h2>
                        <p class="font-body-md text-body-md text-surface-container opacity-80 mt-space-2xs">
                            Our calibrated 500m daily ascent thresholds and built-in active rest days ensure maximum
                            summit success with zero altitude shock.
                        </p>
                    </div>
                    <!-- Technical SVG Elevation Graphic Strip -->
                    <div class="bg-surface-container-lowest/5 rounded-2xl p-space-lg lg:p-space-xl backdrop-blur-md">
                        <!-- SVG Elevation Profile -->
                        <div class="w-full h-48 relative">
                            <svg class="w-full h-full text-primary-container" preserveaspectratio="none"
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
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-space-md pt-space-lg text-left">
                            <div class="p-space-sm rounded-lg bg-summit-white/5">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary-container uppercase font-bold block">Base
                                    Checkpoint</span>
                                <div class="font-headline-sm text-headline-sm font-bold text-summit-white mt-1">
                                    Kathmandu</div>
                                <div class="font-body-sm text-body-sm text-surface-container opacity-70">1,400m /
                                    4,593ft</div>
                                <div class="font-body-sm text-body-sm text-surface-container-low mt-2">Briefing &amp;
                                    medical kit inspect.</div>
                            </div>
                            <div class="p-space-sm rounded-lg bg-summit-white/5">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary-container uppercase font-bold block">Sherpa
                                    Capital</span>
                                <div class="font-headline-sm text-headline-sm font-bold text-summit-white mt-1">Namche
                                    Bazaar</div>
                                <div class="font-body-sm text-body-sm text-surface-container opacity-70">3,440m /
                                    11,286ft</div>
                                <div class="font-body-sm text-body-sm text-surface-container-low mt-2">2 Nights active
                                    acclimatization.</div>
                            </div>
                            <div class="p-space-sm rounded-lg bg-summit-white/5">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary-container uppercase font-bold block">Spiritual
                                    Plateau</span>
                                <div class="font-headline-sm text-headline-sm font-bold text-summit-white mt-1">
                                    Dingboche</div>
                                <div class="font-body-sm text-body-sm text-surface-container opacity-70">4,410m /
                                    14,468ft</div>
                                <div class="font-body-sm text-body-sm text-surface-container-low mt-2">Nangkartshang
                                    Peak day climb.</div>
                            </div>
                            <div class="p-space-sm rounded-lg bg-summit-white/5">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary-container uppercase font-bold block">Khumbu
                                    Glacier</span>
                                <div class="font-headline-sm text-headline-sm font-bold text-summit-white mt-1">Everest
                                    Base Camp</div>
                                <div class="font-body-sm text-body-sm text-surface-container opacity-70">5,364m /
                                    17,598ft</div>
                                <div class="font-body-sm text-body-sm text-surface-container-low mt-2">Moraine traverse
                                    to icefall.</div>
                            </div>
                            <div class="p-space-sm rounded-lg bg-summit-white/10 ring-1 ring-primary-container">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary-container uppercase font-bold block">Summit
                                    Viewpoint</span>
                                <div class="font-headline-sm text-headline-sm font-bold text-summit-white mt-1">Kala
                                    Patthar</div>
                                <div class="font-body-sm text-body-sm text-surface-container opacity-70">5,545m /
                                    18,192ft</div>
                                <div class="font-body-sm text-body-sm text-surface-container-low mt-2">Sunrise 360°
                                    Himalayan vista.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- WHY TREK WITH Neepa Adventure (Values & Ethos Grid) -->
            <section class="w-full py-space-3xl bg-surface-container-low">
                <div class="max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop">
                    <div class="text-center max-w-2xl mx-auto mb-space-3xl">
                        <div
                            class="font-badge-caption text-badge-caption uppercase tracking-[0.2em] text-primary font-bold mb-space-2xs">
                            The Neepa Standard</div>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Built on Sherpa
                            Heritage &amp; Clinical Safety</h2>
                        <p class="font-body-md text-body-md text-tertiary mt-space-2xs">We do not outsource your safety
                            to contractors. Every itinerary is led by our full-time Kathmandu &amp; Khumbu expedition
                            family.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-lg">
                        <!-- Feature 1 -->
                        <div
                            class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                            <div>
                                <div
                                    class="w-12 h-12 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary transition-colors">
                                    <x-lucide-mountain class="size-[28px]" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Sherpa-Led
                                    Heritage</h3>
                                <p class="font-body-md text-body-md text-tertiary">
                                    Our lead expedition sardars boast multiple 8,000m summits and ancestral
                                    understanding of weather patterns, snow pack stability, and trail health.
                                </p>
                            </div>
                            <div
                                class="pt-space-lg font-label-sm text-label-sm font-bold text-primary flex items-center gap-1 uppercase tracking-wider">
                                <span>NNMGA Certified</span>
                                <x-lucide-arrow-right class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Feature 2 -->
                        <div
                            class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                            <div>
                                <div
                                    class="w-12 h-12 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary transition-colors">
                                    <x-lucide-shield-plus class="size-[28px]" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Medical &amp;
                                    Evacuation Ready</h3>
                                <p class="font-body-md text-body-md text-tertiary">
                                    Daily pulse oximeter records, hyperbaric Gamow chambers on remote passes, and direct
                                    satellite phone links with our Kathmandu medical team.
                                </p>
                            </div>
                            <div
                                class="pt-space-lg font-label-sm text-label-sm font-bold text-primary flex items-center gap-1 uppercase tracking-wider">
                                <span>Garmin InReach Active</span>
                                <x-lucide-arrow-right class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Feature 3 -->
                        <div
                            class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                            <div>
                                <div
                                    class="w-12 h-12 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary transition-colors">
                                    <x-lucide-hand-heart class="size-[28px]" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Fair Porter
                                    Welfare</h3>
                                <p class="font-body-md text-body-md text-tertiary">
                                    Strict 20kg weight caps, full mountain gear sets, living wages, and comprehensive
                                    medical insurance. Signatories to the International Porter Protection Charter.
                                </p>
                            </div>
                            <div
                                class="pt-space-lg font-label-sm text-label-sm font-bold text-primary flex items-center gap-1 uppercase tracking-wider">
                                <span>Ethical Employment</span>
                                <x-lucide-arrow-right class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Feature 4 -->
                        <div
                            class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                            <div>
                                <div
                                    class="w-12 h-12 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary transition-colors">
                                    <x-lucide-sliders-horizontal class="size-[28px]" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Bespoke
                                    Flexibility</h3>
                                <p class="font-body-md text-body-md text-tertiary">
                                    Upgrade to handpicked luxury teahouse lodges with heated beds, private helicopter
                                    returns from Kala Patthar, or custom alpine photography paces.
                                </p>
                            </div>
                            <div
                                class="pt-space-lg font-label-sm text-label-sm font-bold text-primary flex items-center gap-1 uppercase tracking-wider">
                                <span>Private &amp; Tailored</span>
                                <x-lucide-arrow-right class="size-[16px]" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- MEET OUR EXPEDITION LEADERS -->
            <section class="w-full py-space-3xl bg-surface">
                <div class="max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-center">
                        <!-- Left: Leader Highlight with Image -->
                        <div class="lg:col-span-6 relative">
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-ridge-deep">
                                <img alt="Portrait of Dawa Tenzing Sherpa, Senior Expedition Guide"
                                    class="w-full h-auto object-cover max-h-[580px]"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDacVdR5VA8tGaaIOU8DkYpJb4kqOBUqEhRNNZdvOFiYxTom4bM2ebieAgUriYYqW-KVdfcX6vxkBl5Ew4OvWs74tqA4vYaCbaKgmvg_QkDkrKaIEzv1lIRq_w60KQbKsmBDGdn8qOwZKSgrGA7XpwrYehBeNLKCm1sRc0t5Qu8rrgJcjG2y-D8nHkUVrO7JJyALl3aBLxSfmwX96EM7eKsWTkVttaqoZbg252LXTmAN2RFUD893XLz" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep via-transparent to-transparent opacity-90">
                                </div>
                                <div class="absolute bottom-6 left-6 right-6 text-summit-white">
                                    <span
                                        class="px-space-sm py-1 rounded bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption font-bold uppercase tracking-wider">
                                        Chief Expedition Leader
                                    </span>
                                    <h3 class="font-headline-md text-headline-md text-summit-white font-bold mt-2">Dawa
                                        Tenzing Sherpa</h3>
                                    <p class="font-body-sm text-body-sm text-surface-container-high opacity-90 mt-1">
                                        14x Everest Summits • 4x K2 Climbs • Lead High-Altitude Rescue Trainer</p>
                                </div>
                            </div>
                            <!-- Floating Micro Credential Card -->
                            <div
                                class="hidden sm:flex absolute -bottom-6 -right-6 bg-surface-container-lowest p-space-md rounded-xl shadow-xl items-center gap-space-md max-w-xs">
                                <x-lucide-award class="text-primary size-[36px]" />
                                <div>
                                    <div class="font-headline-sm text-headline-sm font-bold text-on-surface">100%</div>
                                    <div class="font-body-sm text-body-sm text-tertiary">Zero Serious Alpine Incidents
                                        across 13 Seasons</div>
                                </div>
                            </div>
                        </div>
                        <!-- Right: Story & Guide Culture -->
                        <div class="lg:col-span-6 space-y-space-lg">
                            <div>
                                <div
                                    class="font-badge-caption text-badge-caption uppercase tracking-[0.2em] text-primary font-bold mb-space-2xs">
                                    The Mountain Guardians</div>
                                <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">You Are in
                                    the Hands of Nepal's Finest Mountaineers</h2>
                            </div>
                            <p class="font-body-lg text-body-lg text-tertiary">
                                Every Neepa Adventure trekker is paired with authentic Sherpa guides born and raised in
                                high-altitude Khumbu, Rolwaling, or Dolpo valleys. Their physiological adaptation is
                                matched with world-standard certifications in wilderness trauma, high-angle rescue, and
                                weather modeling.
                            </p>
                            <div class="space-y-space-md">
                                <div class="flex items-start gap-space-md">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary shrink-0 mt-1">
                                        <x-lucide-badge-check class="size-[22px]" />
                                    </div>
                                    <div>
                                        <h4 class="font-headline-sm text-headline-sm text-on-surface">IFMGA &amp; NNMGA
                                            Licensed Sardars</h4>
                                        <p class="font-body-sm text-body-sm text-tertiary">Formal international
                                            diplomas certifying rope management, crevasse extraction, and alpine group
                                            leadership.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-space-md">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary shrink-0 mt-1">
                                        <x-lucide-languages class="size-[22px]" />
                                    </div>
                                    <div>
                                        <h4 class="font-headline-sm text-headline-sm text-on-surface">Multilingual
                                            Storytellers</h4>
                                        <p class="font-body-sm text-body-sm text-tertiary">Fluent in English, Nepali,
                                            Tibetan dialects, and German/French on specialized private departures.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-space-md">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary shrink-0 mt-1">
                                        <x-lucide-heart class="size-[22px]" />
                                    </div>
                                    <div>
                                        <h4 class="font-headline-sm text-headline-sm text-on-surface">Genuine Himalayan
                                            Hospitality</h4>
                                        <p class="font-body-sm text-body-sm text-tertiary">Experience teahouse evenings
                                            warming by hearths with ginger honey tea, Buddhist legends, and mountain
                                            songs.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-space-sm flex items-center gap-space-md">
                                <a class="px-space-lg py-space-sm rounded-lg bg-ridge-deep text-summit-white font-label-md text-label-md font-bold uppercase tracking-wider hover:bg-tertiary transition-all"
                                    data-path="about-nepal" href="#">
                                    Meet All 24 Guides
                                </a>
                                <span class="font-body-sm text-body-sm text-tertiary">Or request a specific sardar for
                                    private groups.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- TRAVELLER REVIEWS & VERIFIED EXPEDITIONS -->
            <section class="w-full py-space-3xl bg-surface-container-low">
                <div class="max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-2xl gap-space-md">
                        <div>
                            <div
                                class="font-badge-caption text-badge-caption uppercase tracking-[0.2em] text-primary font-bold mb-space-2xs">
                                Voices from the Pass</div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Verified
                                Climber Experiences</h2>
                        </div>
                        <div class="flex items-center gap-space-2xs">
                            <span class="font-headline-sm text-headline-sm font-bold text-on-surface">4.92 / 5.0</span>
                            <div class="flex text-primary">
                                <x-lucide-star class="size-[20px]" />
                                <x-lucide-star class="size-[20px]" />
                                <x-lucide-star class="size-[20px]" />
                                <x-lucide-star class="size-[20px]" />
                                <x-lucide-star class="size-[20px]" />
                            </div>
                            <span class="text-body-sm text-tertiary ml-2">TripAdvisor • Google Verified</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
                        <!-- Review Card 1 -->
                        <div
                            class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-1 text-primary mb-space-sm">
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                </div>
                                <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-2xs">"Flawless
                                    Cho La Pass crossing"</h4>
                                <p class="font-body-md text-body-md text-tertiary mb-space-md">
                                    "We had unexpected fresh snow on Cho La, but Dawa and Ang Karma guided our group
                                    with absolute calm and expertise. Their attention to our pulse ox twice daily made
                                    everyone feel confident and safe."
                                </p>
                            </div>
                            <div class="pt-space-md flex items-center justify-between">
                                <div>
                                    <div class="font-label-md text-label-md font-bold text-on-surface">Marcus &amp;
                                        Elena Vance</div>
                                    <div class="font-body-sm text-body-sm text-tertiary">Everest &amp; Gokyo Lakes •
                                        Oct 2024</div>
                                </div>
                                <x-lucide-shield-check class="text-primary size-[24px]" />
                            </div>
                        </div>
                        <!-- Review Card 2 -->
                        <div
                            class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-1 text-primary mb-space-sm">
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                </div>
                                <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-2xs">"My first
                                    6,000m summit on Island Peak"</h4>
                                <p class="font-body-md text-body-md text-tertiary mb-space-md">
                                    "The mountaineering refresher at High Camp was thorough. On summit day, my climbing
                                    Sherpa Pemba paced me like clockwork up the headwall. Standing at 6,189m at sunrise
                                    is an experience I will cherish forever."
                                </p>
                            </div>
                            <div class="pt-space-md flex items-center justify-between">
                                <div>
                                    <div class="font-label-md text-label-md font-bold text-on-surface">Dr. Julian
                                        Richter</div>
                                    <div class="font-body-sm text-body-sm text-tertiary">Island Peak Expedition • Nov
                                        2024</div>
                                </div>
                                <x-lucide-shield-check class="text-primary size-[24px]" />
                            </div>
                        </div>
                        <!-- Review Card 3 -->
                        <div
                            class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-1 text-primary mb-space-sm">
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                    <x-lucide-star class="size-[18px]" />
                                </div>
                                <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-2xs">"Untamed
                                    beauty around Manaslu"</h4>
                                <p class="font-body-md text-body-md text-tertiary mb-space-md">
                                    "No crowd jams, raw Tibetan culture, and incredible Sherpa care. Even when my bag
                                    zipper tore, our porter carried special repair tape. Outstanding logistics from
                                    Kathmandu airport to the mountain and back."
                                </p>
                            </div>
                            <div class="pt-space-md flex items-center justify-between">
                                <div>
                                    <div class="font-label-md text-label-md font-bold text-on-surface">Chloe Deschenes
                                    </div>
                                    <div class="font-body-sm text-body-sm text-tertiary">Manaslu Circuit • Apr 2024
                                    </div>
                                </div>
                                <x-lucide-shield-check class="text-primary size-[24px]" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- FINAL CALL TO ACTION BANNER -->
            <section class="w-full bg-ridge-deep py-space-3xl relative overflow-hidden">
                <!-- Atmospheric mountain background -->
                <div class="absolute inset-0 w-full h-full bg-cover bg-center opacity-25 mix-blend-screen pointer-events-none"
                    data-alt="Silhouetted mountain ranges of the Himalayas at twilight with deep blue and gold atmospheric gradient and twinkling Himalayan tea house lights in the valley below."
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBXePxF8MuSeK46xEujkhtG8vhxYAqOJILD6pYygp8iqloHj91ZYKR5w21kX8bFHqJuGAlzhQRNSXMHbFiIthpJ_l_9sk9xP5yqn_ZFbVbgJe8LI8W1kOBH9RgMKaRLHh4QzKCIePzu8si3aTM1sX8lNw5meRTk9zAP0pnjPtMvWoGPmjx4fa5scTXalsGChHu623kMP_JPOs0a170I1pMpFF0PzuaoS7sc0h6Hs-gcvTq5sn9VlECt')">
                </div>
                <div class="relative max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop z-10">
                    <div
                        class="bg-gradient-to-r from-surface-container-lowest/10 to-surface-container-lowest/5 backdrop-blur-xl p-space-xl lg:p-space-3xl rounded-2xl border border-summit-white/10 flex flex-col lg:flex-row items-center justify-between gap-space-2xl text-center lg:text-left">
                        <div class="max-w-xl space-y-space-sm">
                            <div
                                class="inline-flex items-center gap-space-xs px-space-sm py-1 rounded-full bg-primary-container/20 text-primary-container font-badge-caption text-badge-caption font-bold uppercase tracking-wider">
                                <x-lucide-headphones class="size-[16px]" />
                                Fast Response Expedition Desk
                            </div>
                            <h2
                                class="font-headline-lg text-headline-lg text-summit-white tracking-tight leading-tight">
                                Ready to Walk Among the Himalayan Giants?
                            </h2>
                            <p class="font-body-lg text-body-lg text-surface-container opacity-85">
                                Receive a personalized day-by-day itinerary, custom teahouse selection, and a
                                complimentary altitude readiness assessment within 2 hours.
                            </p>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center gap-space-md w-full sm:w-auto shrink-0">
                            <a class="w-full sm:w-auto px-space-xl py-space-md rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider transition-all shadow-lg text-center"
                                data-path="plan-your-trek" href="#">
                                Talk to an Alpine Specialist
                            </a>
                            <a class="w-full sm:w-auto px-space-xl py-space-md rounded-lg bg-summit-white/10 hover:bg-summit-white/20 text-summit-white font-label-md text-label-md font-bold uppercase tracking-wider transition-all backdrop-blur-sm text-center"
                                data-path="treks" href="#">
                                Download 2025/26 Catalog
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
                tabButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        tabButtons.forEach(b => {
                            b.classList.remove('bg-primary-container', 'text-on-primary-fixed',
                                'font-bold', 'shadow-sm');
                            b.classList.add('text-tertiary', 'font-medium');
                        });
                        this.classList.remove('text-tertiary', 'font-medium');
                        this.classList.add('bg-primary-container', 'text-on-primary-fixed', 'font-bold',
                            'shadow-sm');
                    });
                });
            })();
        </script>
    </main><x-footer />
</x-layouts.app>
