<x-layouts.app>
    <x-header />
    <main class="w-full pt-48  bg-surface">
        <div class="flex flex-col w-full">
            <!-- Top Banner / Scrim Ambient Canvas -->
            <section
                class="relative w-full bg-ridge-deep text-summit-white overflow-hidden -mt-20 pt-28 pb-space-3xl px-gutter-mobile lg:px-gutter-desktop shadow-2xl">
                <!-- Atmospheric Ambient Gradient Background -->
                <div class="absolute inset-0 pointer-events-none opacity-40 mix-blend-screen">
                    <div class="absolute -top-32 left-1/4 w-96 h-96 rounded-full bg-primary-container blur-[140px]">
                    </div>
                    <div class="absolute top-1/2 right-10 w-80 h-80 rounded-full bg-secondary-fixed blur-[160px]"></div>
                </div>
                <div class="max-w-max-content-width mx-auto relative z-10">
                    <!-- Breadcrumb & Coordinates Header -->
                    <div
                        class="flex flex-wrap items-center justify-between gap-space-sm mb-space-lg text-body-sm text-surface-dim">
                        <div
                            class="flex items-center gap-space-2xs uppercase tracking-widest font-label-sm text-label-sm">
                            <span class="text-primary-container font-semibold">Trek Archives</span>
                            <span class="text-tertiary">/</span>
                            <span>Visual Chronicles</span>
                            <span class="text-tertiary">/</span>
                            <span class="text-alpine-snow">Field Gallery 2025</span>
                        </div>
                        <div
                            class="flex items-center gap-space-md bg-surface-container-highest/20 backdrop-blur-md px-space-md py-space-2xs rounded-full text-label-sm font-label-sm">
                            <span class="inline-flex items-center gap-1 text-primary-container">
                                <x-lucide-satellite class="size-[15px]" />
                                <span>27°59'17"N • 86°55'31"E</span>
                            </span>
                            <span class="text-tertiary">•</span>
                            <span class="text-surface-dim">Bortle Class 1 • 5,364m Datum</span>
                        </div>
                    </div>
                    <!-- Main Headline Block with Asymmetrical Scale -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-end mb-space-2xl">
                        <div class="lg:col-span-8 space-y-space-md">
                            <div
                                class="inline-flex items-center gap-space-2xs px-space-sm py-1 rounded-full bg-primary/20 text-primary-fixed font-badge-caption text-badge-caption tracking-widest uppercase">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary-container animate-pulse"></span>
                                Dispatches from the High Himalaya • 3,000m to 8,848m
                            </div>
                            <h1
                                class="font-display-xl text-display-xl tracking-tight leading-[1.05] text-summit-white uppercase">
                                Trek Visual <span class="text-primary-container">Chronicles</span> &amp; Destination
                                Moments
                            </h1>
                            <p class="font-body-lg text-body-lg text-surface-dim max-w-2xl font-normal leading-relaxed">
                                Step onto the sacred ridgelines, glacial passes, and golden sunrise pitches through the
                                lenses of our Sherpa trek leaders, visiting alpinists, and mountain visualists.
                            </p>
                        </div>
                        <div
                            class="lg:col-span-4 flex flex-col gap-space-md bg-surface-container-highest/10 backdrop-blur-lg p-space-lg rounded-xl shadow-xl">
                            <div class="flex items-center justify-between">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary-fixed uppercase tracking-wider">Field
                                    Log Metadata</span>
                                <span class="flex items-center gap-1 text-body-sm text-surface-dim">
                                    <x-lucide-sparkles class="size-[16px] text-primary-container" />
                                    Clear • -14°C at Camp IV
                                </span>
                            </div>
                            <div class="grid grid-cols-2 gap-space-sm pt-space-xs text-body-sm">
                                <div class="bg-ridge-deep/80 p-space-sm rounded-lg">
                                    <div class="text-primary-container font-headline-sm text-headline-sm font-bold">12
                                    </div>
                                    <div class="text-surface-dim font-label-sm text-label-sm uppercase">Himalayan
                                        Sectors</div>
                                </div>
                                <div class="bg-ridge-deep/80 p-space-sm rounded-lg">
                                    <div class="text-primary-container font-headline-sm text-headline-sm font-bold">
                                        8,848m</div>
                                    <div class="text-surface-dim font-label-sm text-label-sm uppercase">Max Elevation
                                        Stills</div>
                                </div>
                                <div class="bg-ridge-deep/80 p-space-sm rounded-lg">
                                    <div class="text-primary-container font-headline-sm text-headline-sm font-bold">4.2
                                        TB</div>
                                    <div class="text-surface-dim font-label-sm text-label-sm uppercase">Raw Prores &amp;
                                        Stills</div>
                                </div>
                                <div class="bg-ridge-deep/80 p-space-sm rounded-lg">
                                    <div class="text-primary-container font-headline-sm text-headline-sm font-bold">100%
                                    </div>
                                    <div class="text-surface-dim font-label-sm text-label-sm uppercase">Sherpa Led
                                        Captures</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Quick Metrics Strip -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-space-md pt-space-md border-t border-tertiary/20">
                        <div class="flex items-center gap-space-sm text-surface-dim">
                            <x-lucide-mountain class="text-primary-container size-[24px]" />
                            <span class="font-label-sm text-label-sm uppercase tracking-wide">12 Distinct Himalayan
                                Regions</span>
                        </div>
                        <div class="flex items-center gap-space-sm text-surface-dim">
                            <x-lucide-house class="text-primary-container size-[24px]" />
                            <span class="font-label-sm text-label-sm uppercase tracking-wide">8,000m High Alpine
                                Camps</span>
                        </div>
                        <div class="flex items-center gap-space-sm text-surface-dim">
                            <x-lucide-camera class="text-primary-container size-[24px]" />
                            <span class="font-label-sm text-label-sm uppercase tracking-wide">Medium Format &amp; Drone
                                Stills</span>
                        </div>
                        <div class="flex items-center gap-space-sm text-surface-dim">
                            <x-lucide-shield-check class="text-primary-container size-[24px]" />
                            <span class="font-label-sm text-label-sm uppercase tracking-wide">Verified Climber
                                Submissions</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Filter & View Controls Toolbar (Sticky feel) -->
            <section
                class="w-full bg-surface-container-lowest shadow-sm z-30 py-space-md px-gutter-mobile lg:px-gutter-desktop">
                <div
                    class="max-w-max-content-width mx-auto flex flex-col xl:flex-row items-start xl:items-center justify-between gap-space-md">
                    <!-- Category Chips -->
                    <div class="flex flex-wrap items-center gap-space-xs overflow-x-auto pb-1 xl:pb-0 w-full xl:w-auto"
                        id="gallery-filters">
                        <button
                            class="gallery-pill active px-space-md py-space-2xs rounded-lg font-label-md text-label-md transition-all uppercase tracking-wider bg-primary-container text-on-primary-container shadow-sm"
                            data-category="all">
                            All Collections
                        </button>
                        <button
                            class="gallery-pill px-space-md py-space-2xs rounded-lg font-label-md text-label-md transition-all uppercase tracking-wider bg-surface-container hover:bg-surface-container-high text-on-surface-variant"
                            data-category="khumbu">
                            Everest &amp; Khumbu
                        </button>
                        <button
                            class="gallery-pill px-space-md py-space-2xs rounded-lg font-label-md text-label-md transition-all uppercase tracking-wider bg-surface-container hover:bg-surface-container-high text-on-surface-variant"
                            data-category="passes">
                            High Alpine Passes
                        </button>
                        <button
                            class="gallery-pill px-space-md py-space-2xs rounded-lg font-label-md text-label-md transition-all uppercase tracking-wider bg-surface-container hover:bg-surface-container-high text-on-surface-variant"
                            data-category="destinations">
                            8,000m Destinations
                        </button>
                        <button
                            class="gallery-pill px-space-md py-space-2xs rounded-lg font-label-md text-label-md transition-all uppercase tracking-wider bg-surface-container hover:bg-surface-container-high text-on-surface-variant"
                            data-category="culture">
                            Sherpa &amp; Teahouse Life
                        </button>
                        <button
                            class="gallery-pill px-space-md py-space-2xs rounded-lg font-label-md text-label-md transition-all uppercase tracking-wider bg-surface-container hover:bg-surface-container-high text-on-surface-variant"
                            data-category="astro">
                            Glacial Lakes &amp; Astro
                        </button>
                    </div>
                    <!-- Right Controls: Season Dropdown + View Mode Switches -->
                    <div class="flex items-center justify-between xl:justify-end w-full xl:w-auto gap-space-md">
                        <!-- Season Filter -->
                        <div
                            class="flex items-center gap-space-xs bg-surface-container px-space-sm py-1.5 rounded-lg text-body-sm">
                            <x-lucide-calendar-days class="size-[18px] text-primary" />
                            <select aria-label="Select Himalayan Trek Season"
                                class="bg-transparent text-on-surface font-label-sm text-label-sm uppercase focus:outline-none cursor-pointer"
                                id="season-select">
                                <option value="all">Season: All Windows</option>
                                <option value="spring">Spring Rhododendron (Mar-May)</option>
                                <option value="autumn">Autumn Crystalline Sky (Sep-Nov)</option>
                                <option value="winter">Winter Solitude (Dec-Feb)</option>
                            </select>
                        </div>
                        <!-- View Switchers -->
                        <div class="flex items-center bg-surface-container p-1 rounded-lg">
                            <button aria-label="Masonry layout"
                                class="p-space-2xs rounded bg-surface-container-lowest shadow-sm text-on-surface transition-colors"
                                id="btn-masonry" title="Masonry Multi-Column View">
                                <x-lucide-grid-2x2 class="size-[20px]" />
                            </button>
                            <button aria-label="Story spotlight layout"
                                class="p-space-2xs rounded text-tertiary hover:text-on-surface transition-colors"
                                id="btn-stories" title="Curated Story Spotlight View">
                                <x-lucide-list class="size-[20px]" />
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Curated Featured Photo Essays & Highlights (Editorial Horizontal Asymmetry) -->
            <section class="w-full py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface">
                <div class="max-w-max-content-width mx-auto">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-xl gap-space-sm">
                        <div>
                            <span
                                class="font-badge-caption text-badge-caption uppercase tracking-widest text-primary font-bold">Documentary
                                Spotlight</span>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface uppercase tracking-tight">
                                Curated Alpine Essays</h2>
                        </div>
                        <p class="text-tertiary font-body-sm text-body-sm max-w-md">
                            Ultra-high-resolution field documentation with verified altitude, exact telemetry readings,
                            and optical capture gear specifications.
                        </p>
                    </div>
                    <!-- 3 Spotlight Asymmetric Cards -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
                        <!-- Spotlight 1: Ama Dablam -->
                        <div
                            class="lg:col-span-7 group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                            <div class="relative h-[480px] w-full overflow-hidden">
                                <img alt="Ama Dablam Golden Ridge"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                    data-alt="Breathtaking golden morning sunlight hitting the razor-sharp eastern fluted ice ridge of Ama Dablam mountain Nepal, dramatic dark blue high-altitude sky, extreme details on frosted seracs and wind-sculpted snow plumes, warm alpine glow, ultra-wide professional trekking photography, 8k resolution"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDOOjUE5knG2M2kEbVvLC_ttRiTIttbT6VolS0w55kQYM64dx-Lj35wt_-hYQmy4JrgInJfveBWT0RO7vwlB-hFHp7qzbJACcS9oozdoAVHXp1_-0YL2It2J1hTVj4gadGuPsYCXQEZpnEqZDcHuBniSyRdG5OvyCdTwW0_J-apJDHsmaq6j3BNg0jNJM22Iy4bhVWGK_-O6JrNI0qpGtbtVDc9W8uHw5-tuHKQ8FyPG0I41uu-WX7W" />
                                <!-- Scrim Overlay -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep via-ridge-deep/40 to-transparent">
                                </div>
                                <!-- Altitude Tag & Compass -->
                                <div class="absolute top-space-md left-space-md flex items-center gap-space-xs">
                                    <span
                                        class="bg-ridge-deep/85 backdrop-blur-md text-summit-white px-space-sm py-1 rounded-full font-badge-caption text-badge-caption uppercase tracking-wider flex items-center gap-1">
                                        <x-lucide-arrow-up class="text-primary-container size-[14px]" /> 6,812m
                                        Destination
                                        Target
                                    </span>
                                    <span
                                        class="bg-primary-container text-on-primary-container px-space-sm py-1 rounded-full font-badge-caption text-badge-caption uppercase font-bold tracking-wider">
                                        Ama Dablam
                                    </span>
                                </div>
                                <!-- Telemetry & Metadata Strip Bottom -->
                                <div class="absolute bottom-0 inset-x-0 p-space-lg text-summit-white">
                                    <div
                                        class="flex items-center gap-space-sm text-primary-fixed font-label-sm text-label-sm mb-1">
                                        <x-lucide-map-pin class="size-[16px]" />
                                        Dingboche Upper Ridge • 06:14 AM Nepal Time
                                    </div>
                                    <h3
                                        class="font-headline-md text-headline-md text-summit-white font-bold leading-tight mb-space-xs">
                                        First Golden Rays on Ama Dablam East Ridge
                                    </h3>
                                    <p
                                        class="font-body-md text-body-md text-surface-dim line-clamp-2 max-w-xl mb-space-sm">
                                        Dawn breaks over the Matterhorn of the Himalaya as minus twenty winds whip
                                        crystalline powder off the hanging glacier face.
                                    </p>
                                    <!-- Technical EXIF Pill Bar -->
                                    <div
                                        class="flex flex-wrap items-center gap-space-sm text-body-sm font-label-sm text-surface-variant/90 pt-space-xs border-t border-white/15">
                                        <span class="inline-flex items-center gap-1"><x-lucide-camera
                                                class="size-[14px]" /> Hasselblad X2D 100C</span>
                                        <span>•</span>
                                        <span>90mm f/2.5</span>
                                        <span>•</span>
                                        <span>1/1250s at f/8</span>
                                        <span>•</span>
                                        <span>ISO 64</span>
                                        <span
                                            class="ml-auto hidden sm:inline-flex items-center gap-1 text-primary-container font-semibold">
                                            Photo by Sirdar Nima Sherpa
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Spotlight 2 & 3 Column -->
                        <div class="lg:col-span-5 flex flex-col gap-space-lg">
                            <!-- Spotlight 2: Cho La Pass -->
                            <div
                                class="group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-1 h-[228px]">
                                <img alt="Cho La Pass Spine"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                    data-alt="Climbers with crampons and ice axes navigating the steep frozen ice spine and crevasses of Cho La Pass Nepal at 5420m, colorful weathered Buddhist prayer flags whipping violently in high altitude alpine gusts, extreme turquoise and cobalt mountain sky, stark pristine white glacial terrain"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCACm33X6A5OtwehnzP7nKkcHR7AMtirE-_FsLdmjYE2iRj4v9V54F2ILjLjHzqtm8wSdJ4UaJ-zvZyBC2VbQI8ZuVu1nI72-5t23P3VOdEsTIiu8R3D5Zex1JFeRiBeywQFUHzTdX88h4GxtYw6S3SSAzMMJDrQjMaMyIMRuqLBueyny_0A5kGmxTP0To_hAqlBuLNe65cEiO7hIyOX6bRubpzPUwDNqsVp61SUJqchPFxCixEIdlZ" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep via-ridge-deep/50 to-transparent">
                                </div>
                                <div class="absolute top-space-sm left-space-sm">
                                    <span
                                        class="bg-ridge-deep/85 backdrop-blur-md text-summit-white px-space-xs py-0.5 rounded font-badge-caption text-badge-caption uppercase">
                                        5,420m Pass
                                    </span>
                                </div>
                                <div class="absolute bottom-0 inset-x-0 p-space-md text-summit-white">
                                    <div
                                        class="text-primary-container font-label-sm text-label-sm font-semibold flex items-center gap-1">
                                        <x-lucide-flag class="size-[14px]" /> Gokyo to Dzongla High Route
                                    </div>
                                    <h4
                                        class="font-headline-sm text-headline-sm text-summit-white font-bold leading-snug">
                                        Crossing the Frozen Spine of Cho La Pass
                                    </h4>
                                    <div class="flex items-center gap-space-sm text-surface-dim text-body-sm mt-1">
                                        <span>Sony A1 • 24-70mm GM II</span>
                                        <span>•</span>
                                        <span>ISO 100 • f/7.1</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Spotlight 3: Gokyo Sacred Lakes -->
                            <div
                                class="group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-1 h-[228px]">
                                <img alt="Gokyo Sacred Lakes Reflection"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                    data-alt="Sunset evening glow reflecting on the sacred turquoise glacial water of Dudh Pokhari Gokyo Lake 3 Nepal with pristine floating ice sheets, towering massive snow pass Cho Oyu in the background, deep violet shadows and warm ember clouds, serene high-alpine stillness"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBkrFqBEwyEge_eDtoFKUquiVxwGhx_Y5o3f3xx4IjsUZx8fXARsPmAVBtxIg1Kz6aIjsKv2pCP5_qu-Ut3Pd3LoaRzmYfU-F0YSGes7bQf6ozVVTfiScyNr1Aq0AyK-PxzH0q2tylOc7wSUgz3AEzGpwBExfG9JiZQ7yHd0ZYacHyWJ-yabAQtk6ZyA9iq_2dkCqocYbom0q7vPgeATb8R3nPtN_jeYeOTteFwjZ9gvKFnlUMTve2l" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep via-ridge-deep/50 to-transparent">
                                </div>
                                <div class="absolute top-space-sm left-space-sm">
                                    <span
                                        class="bg-ridge-deep/85 backdrop-blur-md text-summit-white px-space-xs py-0.5 rounded font-badge-caption text-badge-caption uppercase">
                                        4,790m Alpine Tarn
                                    </span>
                                </div>
                                <div class="absolute bottom-0 inset-x-0 p-space-md text-summit-white">
                                    <div
                                        class="text-primary-container font-label-sm text-label-sm font-semibold flex items-center gap-1">
                                        <x-lucide-droplets class="size-[14px]" /> Gokyo Sacred Sanctuary
                                    </div>
                                    <h4
                                        class="font-headline-sm text-headline-sm text-summit-white font-bold leading-snug">
                                        Evening Glow Over Gokyo Sacred Lakes (Dudh Pokhari)
                                    </h4>
                                    <div class="flex items-center gap-space-sm text-surface-dim text-body-sm mt-1">
                                        <span>Leica SL2 • 35mm Summilux</span>
                                        <span>•</span>
                                        <span>Cho Oyu (8,188m) Backdrop</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Masonry Photo Grid Section with Hover Telemetry -->
            <section class="w-full py-space-2xl px-gutter-mobile lg:px-gutter-desktop bg-surface-container-low">
                <div class="max-w-max-content-width mx-auto">
                    <div
                        class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-md mb-space-xl">
                        <div>
                            <div
                                class="font-badge-caption text-badge-caption uppercase tracking-widest text-primary font-bold">
                                The Archive</div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface uppercase tracking-tight">
                                Trek Masonry Portfolio</h2>
                        </div>
                        <div class="text-body-sm text-tertiary flex items-center gap-space-xs">
                            <span class="w-2 h-2 rounded-full bg-primary-container"></span>
                            <span>Showing 9 Selected Destination &amp; Trail Captures</span>
                        </div>
                    </div>
                    <!-- Asymmetric Responsive Grid (3 Columns on Desktop) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-lg" id="gallery-grid">
                        <!-- Item 1: Thorang La Pass -->
                        <div class="gallery-item group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
                            data-cat="passes" data-season="autumn">
                            <div class="relative h-80 overflow-hidden">
                                <img alt="Prayer Flags at Thorang La Pass"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    data-alt="Dense bundles of vibrant Buddhist prayer flags dancing in freezing wind at Thorang La Pass destination 5416m Nepal, deep cobalt blue sky, snow clad passes of Annapurna range, sharp natural contrast, high altitude mountain trek aesthetic"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFRniI9Lv4lDicOmRohJ5vECXEwYnVbM6USzGaVher5AEFaXAGBh2iwjRGcipH1kmdtK47z39tIK4EBlRB2MjAy6BXyzXAe4NvfIIRlzrmDEJdVGwaC-nD-XQab83pUzGvko_YACbdV_lVLTpDGJJM79PYaV7FS77O8hSrWkVYKQoCbXh6-oBARUCje5d8rZfKpkF-5yJslrTR9EYWAzeYgo5cv0J7OFeQeuKtEeiys_3BGAxE7tw1" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/90 via-ridge-deep/30 to-transparent opacity-90 group-hover:opacity-95 transition-opacity">
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span
                                        class="bg-ridge-deep/80 text-summit-white font-badge-caption text-badge-caption uppercase px-2 py-0.5 rounded">5,416m</span>
                                </div>
                                <button
                                    class="absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 hover:bg-primary-container text-on-surface flex items-center justify-center transition-colors"
                                    onclick="openModal('Thorang La Pass prayer flags', '5,416m • Annapurna Circuit', 'Autumn Crystalline Sky')"
                                    title="Expand Fullscreen Stills">
                                    <x-lucide-expand class="size-[18px]" />
                                </button>
                                <div class="absolute bottom-0 inset-x-0 p-space-md text-summit-white">
                                    <div
                                        class="text-primary-container font-label-sm text-label-sm uppercase font-semibold">
                                        Annapurna Circuit</div>
                                    <h3
                                        class="font-headline-sm text-headline-sm text-summit-white font-bold leading-tight">
                                        Prayer Flags at Thorang La Pass</h3>
                                    <p class="text-body-sm text-surface-dim mt-1">Sustained 45-knot crosswinds over the
                                        highest trekking pass in the central Nepal Himalaya.</p>
                                    <div
                                        class="flex items-center justify-between pt-space-xs mt-space-xs border-t border-white/10 text-body-sm text-surface-variant">
                                        <span>By Pemba Tsering Sherpa</span>
                                        <span class="font-label-sm text-label-sm text-primary-fixed">Nikon Z9</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 2: Sherpa Sirdar Dawa inspecting ropes -->
                        <div class="gallery-item group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
                            data-cat="destinations" data-season="autumn">
                            <div class="relative h-96 overflow-hidden">
                                <img alt="Sherpa Lead Sirdar Dawa Inspecting Ropes"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    data-alt="Sherpa Trek Lead Sirdar Dawa inspecting high-tensile fixed ropes and carabiners at Camp II on Mount Manaslu 8163m, heavy mountain trekking parka with down hood, wind blown snow crystals glistening, rugged high-altitude trek documentary portrait"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAb739w7li3SLGN7AtwJH_T837iWt-gzjcb_9Kv3qbO2-6hsID2QI2ap6EPmeePpyyoVU-tyQxPrAwEgCwtz8MNH8DWlznQcehGcFcknn5UOXpAjAJYlN0zufdex5SEmY48IBgQjWykCUh5A61kth7O0a-BpZlVdCSHMYxveF7o2syvsfhwNsnUiWlZqM7HWp5ovHE6cstnVrWSh-JaIJctC3polVpk9vU_6BXL8Kj7JY0bUnYvbKZa" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/90 via-ridge-deep/30 to-transparent opacity-90 group-hover:opacity-95 transition-opacity">
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span
                                        class="bg-primary-container text-on-primary-container font-badge-caption text-badge-caption uppercase font-bold px-2 py-0.5 rounded">6,400m
                                        Camp II</span>
                                </div>
                                <button
                                    class="absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 hover:bg-primary-container text-on-surface flex items-center justify-center transition-colors"
                                    onclick="openModal('Sherpa Lead Sirdar Dawa inspecting fixed ropes', '6,400m • Mt Manaslu Camp II', 'Autumn Technical Trek')"
                                    title="Expand Fullscreen Stills">
                                    <x-lucide-expand class="size-[18px]" />
                                </button>
                                <div class="absolute bottom-0 inset-x-0 p-space-md text-summit-white">
                                    <div
                                        class="text-primary-container font-label-sm text-label-sm uppercase font-semibold">
                                        Manaslu 8,000m Trek</div>
                                    <h3
                                        class="font-headline-sm text-headline-sm text-summit-white font-bold leading-tight">
                                        Sirdar Dawa at Camp II Ropes</h3>
                                    <p class="text-body-sm text-surface-dim mt-1">Validating dynamic line anchors prior
                                        to the destination push window opening above the Japanese Couloir.</p>
                                    <div
                                        class="flex items-center justify-between pt-space-xs mt-space-xs border-t border-white/10 text-body-sm text-surface-variant">
                                        <span>By Mark Vance, Alpinist</span>
                                        <span class="font-label-sm text-label-sm text-primary-fixed">Canon EOS
                                            R5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 3: Khumjung Heritage Teahouse -->
                        <div class="gallery-item group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
                            data-cat="culture" data-season="winter">
                            <div class="relative h-80 overflow-hidden">
                                <img alt="Warm butter tea in Khumjung teahouse"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    data-alt="Cozy interior of an authentic Sherpa stone teahouse in Khumjung village Nepal, steaming brass pots of salted butter tea on an iron central woodstove, warm ember glow lighting weathered wooden benches and wool yak blankets, outside window shows snowy dusk on Everest passes"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcCyo7UK6F21-FVksJwoqDUsc_v1UJf-nSmA59CgaWLdkTmnxgLhXHKQkoJh_QEd6LQn5bTuwpKUP5TIcPlGWAz8vA8XxLJtpNdxtC-Nkkb7AwFc8u3tZGWDTylRf9i1K0c2TR_bdY5CgpP7VXhfDoyq6nyRhrnhp_aL-K1rTqRFrV-3eq9JsOY-u5u2LuE5OblobISb8ur-rfNx_0H6BpVJdtSmGCrvv2sAobJdHcNAybEWpRsH8O" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/90 via-ridge-deep/30 to-transparent opacity-90 group-hover:opacity-95 transition-opacity">
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span
                                        class="bg-ridge-deep/80 text-summit-white font-badge-caption text-badge-caption uppercase px-2 py-0.5 rounded">3,790m
                                        Khumjung</span>
                                </div>
                                <button
                                    class="absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 hover:bg-primary-container text-on-surface flex items-center justify-center transition-colors"
                                    onclick="openModal('Warm butter tea and woodstove gathering', '3,790m • Khumjung Heritage Teahouse', 'Winter Hearth Gathering')"
                                    title="Expand Fullscreen Stills">
                                    <x-lucide-expand class="size-[18px]" />
                                </button>
                                <div class="absolute bottom-0 inset-x-0 p-space-md text-summit-white">
                                    <div
                                        class="text-primary-container font-label-sm text-label-sm uppercase font-semibold">
                                        Sherpa Heritage</div>
                                    <h3
                                        class="font-headline-sm text-headline-sm text-summit-white font-bold leading-tight">
                                        Khumjung Fireside &amp; Butter Tea</h3>
                                    <p class="text-body-sm text-surface-dim mt-1">Shelter from sub-zero winds as local
                                        elders share memories of Sir Edmund Hillary's school foundation.</p>
                                    <div
                                        class="flex items-center justify-between pt-space-xs mt-space-xs border-t border-white/10 text-body-sm text-surface-variant">
                                        <span>By Ang Lhamu Sherpa</span>
                                        <span class="font-label-sm text-label-sm text-primary-fixed">Fujifilm GFX
                                            100S</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 4: Khumbu Icefall 3:00 AM Headlamps -->
                        <div class="gallery-item group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
                            data-cat="khumbu" data-season="spring">
                            <div class="relative h-96 overflow-hidden">
                                <img alt="Khumbu Icefall 3 AM Night Traverse"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    data-alt="Monolithic towering turquoise ice seracs of the Khumbu Icefall on Mount Everest illuminated in the dark night at 3:00 AM by lines of climbers wearing bright headlamps, deep blue glacier crevasses with aluminum ladders spanning yawning chasms, starry night sky above Nuptse"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBH-riazagKtzxARpRsxaO_-Lg1_MpkdWrC-aUsXiX3SEF9arS_QG9TPniaoOQAgEXnJ4wAXyQ1GnndUPRPVrzeceQzRiJ0q1LjyVOvATA1Qwg35qnF91mpIn2rFq4ZybTyu05Bc5x2_Pk4N4uoI4APrK_2gEmIldNkC10nvy4vBszLcf8lkFsYehdNuigEApMOD6iODWgqeg3--feygFkQXZ9yqTfKyJ-Ii42Kg1LZGKBwVYNfF-bH" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/90 via-ridge-deep/30 to-transparent opacity-90 group-hover:opacity-95 transition-opacity">
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span
                                        class="bg-primary-container text-on-primary-container font-badge-caption text-badge-caption uppercase font-bold px-2 py-0.5 rounded">5,600m
                                        Icefall</span>
                                </div>
                                <button
                                    class="absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 hover:bg-primary-container text-on-surface flex items-center justify-center transition-colors"
                                    onclick="openModal('Everest Khumbu Icefall seracs illuminated at 3:00 AM', '5,600m • Khumbu Glacier Chasm', 'Spring Pre-Dawn Passage')"
                                    title="Expand Fullscreen Stills">
                                    <x-lucide-expand class="size-[18px]" />
                                </button>
                                <div class="absolute bottom-0 inset-x-0 p-space-md text-summit-white">
                                    <div
                                        class="text-primary-container font-label-sm text-label-sm uppercase font-semibold">
                                        Everest South Col Route</div>
                                    <h3
                                        class="font-headline-sm text-headline-sm text-summit-white font-bold leading-tight">
                                        3:00 AM Through the Icefall</h3>
                                    <p class="text-body-sm text-surface-dim mt-1">Trekking in the deepest freeze to
                                        minimize serac collapse hazards between Base Camp and Camp I.</p>
                                    <div
                                        class="flex items-center justify-between pt-space-xs mt-space-xs border-t border-white/10 text-body-sm text-surface-variant">
                                        <span>By Tashi Gyalzen</span>
                                        <span class="font-label-sm text-label-sm text-primary-fixed">Sony A7S III •
                                            20mm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 5: Upper Mustang Monasteries -->
                        <div class="gallery-item group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
                            data-cat="culture" data-season="autumn">
                            <div class="relative h-80 overflow-hidden">
                                <img alt="Lo Manthang Cliff Monasteries"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    data-alt="Ancient Tibetan Buddhist monasteries and cave dwellings hewn directly into sheer red sandstone cliffs of Lo Manthang Upper Mustang Nepal, ochre canyon rock formations, golden desert high-altitude plateau, deep blue Himalayan sky, timeless mystical scenery"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdFRRrKcSNoJBQfE-5MYs8czX2_fBWCHgOH_3fjsb1KQzk1snbbsnBdgQHIYq8nvtfyNBpgBaYiv_B-HC1cO8AY_0WQ3YjRU8kNCJvTIHZjl-arXQ4ImHLnYatiHwdEXAE_Im1paeAD6tApfItABNdsnI-wqdgkBTWghZgOgBI53OSmu9iDrtb-SAdfidqUHP7746BtvCfH4F4f5xjNATOEL4wkReXWcMjh3oo35Tk7MqWwT51aXd7" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/90 via-ridge-deep/30 to-transparent opacity-90 group-hover:opacity-95 transition-opacity">
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span
                                        class="bg-ridge-deep/80 text-summit-white font-badge-caption text-badge-caption uppercase px-2 py-0.5 rounded">3,840m
                                        Lo Manthang</span>
                                </div>
                                <button
                                    class="absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 hover:bg-primary-container text-on-surface flex items-center justify-center transition-colors"
                                    onclick="openModal('Ancient cliff-hewn monasteries of Upper Mustang', '3,840m • Kingdom of Lo', 'Autumn Crystalline Wind')"
                                    title="Expand Fullscreen Stills">
                                    <x-lucide-expand class="size-[18px]" />
                                </button>
                                <div class="absolute bottom-0 inset-x-0 p-space-md text-summit-white">
                                    <div
                                        class="text-primary-container font-label-sm text-label-sm uppercase font-semibold">
                                        Forbidden Kingdom</div>
                                    <h3
                                        class="font-headline-sm text-headline-sm text-summit-white font-bold leading-tight">
                                        Upper Mustang Cliff Citadels</h3>
                                    <p class="text-body-sm text-surface-dim mt-1">Centuries-old sky caves and monastic
                                        relics guarded by the rainshadow valleys of the Annapurna massifs.</p>
                                    <div
                                        class="flex items-center justify-between pt-space-xs mt-space-xs border-t border-white/10 text-body-sm text-surface-variant">
                                        <span>By Elena Rostova</span>
                                        <span class="font-label-sm text-label-sm text-primary-fixed">Leica Q3 •
                                            28mm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 6: Kanchenjunga Astrophotography -->
                        <div class="gallery-item group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
                            data-cat="astro" data-season="autumn">
                            <div class="relative h-96 overflow-hidden">
                                <img alt="Kanchenjunga Milky Way Astrophotography"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    data-alt="Spectacular luminous Milky Way galactic core arching over the towering snowy massif of Kanchenjunga Base Camp Pangpema Nepal, millions of pin-sharp stars in deep Bortle Class 1 dark sky, subtle tent headlamp light painting the glacial moraine, cold majestic wilderness"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsAej9DHLCVVzpmSjtp8Xp91U61YYQXOsDl8_Urdf_Aa0K5Trsk0Cx-cNP9xcNiEC-dRVlRA-PvN0Z5GRrLT1yX-Rhyx3_FkR_PxJpbXziTisyyCE-KVKv52JebcvET4plRgWRb6T3RQU51BKTwkfD_XvJ_6ryoP64SecgTMOjmhjF5PmsocOdiVxKSeByACTomkVgNX976dRxbIqZxtzEheWrwOYSgdxssDK0YZhgUs48DdkB8Zk5" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/90 via-ridge-deep/30 to-transparent opacity-90 group-hover:opacity-95 transition-opacity">
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span
                                        class="bg-ridge-deep/80 text-summit-white font-badge-caption text-badge-caption uppercase px-2 py-0.5 rounded">5,140m
                                        Pangpema</span>
                                </div>
                                <button
                                    class="absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 hover:bg-primary-container text-on-surface flex items-center justify-center transition-colors"
                                    onclick="openModal('Kanchenjunga Base Camp under the Milky Way', '5,140m • Eastern Nepal Frontier', 'Autumn Zero Bortle Night')"
                                    title="Expand Fullscreen Stills">
                                    <x-lucide-expand class="size-[18px]" />
                                </button>
                                <div class="absolute bottom-0 inset-x-0 p-space-md text-summit-white">
                                    <div
                                        class="text-primary-container font-label-sm text-label-sm uppercase font-semibold">
                                        Eastern High Frontier</div>
                                    <h3
                                        class="font-headline-sm text-headline-sm text-summit-white font-bold leading-tight">
                                        Milky Way Over Kanchenjunga</h3>
                                    <p class="text-body-sm text-surface-dim mt-1">Zero light pollution at Pangpema
                                        North Face sanctuary, revealing the central galactic bulge over the world's
                                        third highest destination.</p>
                                    <div
                                        class="flex items-center justify-between pt-space-xs mt-space-xs border-t border-white/10 text-body-sm text-surface-variant">
                                        <span>By Dr. Arjun Rai</span>
                                        <span class="font-label-sm text-label-sm text-primary-fixed">Stacked 14x25s •
                                            f/1.4</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 7: Namche Suspension Bridges & Yaks -->
                        <div class="gallery-item group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
                            data-cat="culture" data-season="spring">
                            <div class="relative h-80 overflow-hidden">
                                <img alt="Yaks Crossing Namche Suspension Bridge"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    data-alt="Caravan of loaded yaks wearing ceremonial woven tassels and brass bells crossing the dramatic high steel suspension Hillary Bridge over the roaring Dudh Koshi river gorge near Namche Bazaar Nepal, prayer flags wrapped along cables, pine clad Himalayan valley"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxuXw82viGkHDu2xMpnnrpsr3bcYBSxUupKTUK3ej4PohJs8GV3niyOHU9O4i6u3IRYB_KLuWllW-Ekfzpeo-NWbfIcoQRgPRKxWbIH6n5IzMAa2uite5Kbx5FOCj7zatNPrkiwR5JuBrHjp1KfentPEL_mY3n9FZ0rhMCYSuUMe6ObwVwmpTvK7l8rSvhyhwK9IrmcHubFKLn0C-kICXL8c4ThkIoVktaUG3YWGP3BBcqPXSADRLE" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/90 via-ridge-deep/30 to-transparent opacity-90 group-hover:opacity-95 transition-opacity">
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span
                                        class="bg-ridge-deep/80 text-summit-white font-badge-caption text-badge-caption uppercase px-2 py-0.5 rounded">3,050m
                                        Hillary Bridge</span>
                                </div>
                                <button
                                    class="absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 hover:bg-primary-container text-on-surface flex items-center justify-center transition-colors"
                                    onclick="openModal('Yaks crossing suspension bridges of Namche', '3,050m • Dudh Koshi Gorge', 'Spring Valley Trade')"
                                    title="Expand Fullscreen Stills">
                                    <x-lucide-expand class="size-[18px]" />
                                </button>
                                <div class="absolute bottom-0 inset-x-0 p-space-md text-summit-white">
                                    <div
                                        class="text-primary-container font-label-sm text-label-sm uppercase font-semibold">
                                        Khumbu Valley Lifeline</div>
                                    <h3
                                        class="font-headline-sm text-headline-sm text-summit-white font-bold leading-tight">
                                        Yak Caravans on Hillary Bridge</h3>
                                    <p class="text-body-sm text-surface-dim mt-1">Carrying trek supplies toward
                                        Namche Bazaar high market across the deep glacial gorge.</p>
                                    <div
                                        class="flex items-center justify-between pt-space-xs mt-space-xs border-t border-white/10 text-body-sm text-surface-variant">
                                        <span>By Mingma Norbu</span>
                                        <span class="font-label-sm text-label-sm text-primary-fixed">Sony A7 IV</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 8: Island Pass Headwall Push -->
                        <div class="gallery-item group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
                            data-cat="destinations" data-season="spring">
                            <div class="relative h-96 overflow-hidden">
                                <img alt="Island Pass Headwall Destination Push"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    data-alt="Roped alpine team ascending steep 50-degree ice headwall with ascenders and ice tools at sunrise on Island Pass Imja Tse 6189m Nepal, warm pink and amber dawn light crowning the sharp destination ridge against sharp Lhotse South Face backdrop"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuArPUFMk0F7u3uCELWqvHwEbjcRnRgO4p4KGDMteODGiNbOZsT-Mx4iB3y9MARrlLzpRkUec5vcLCQMzKfSmHAeLoZpWBKd8Q206U8fZhxpoalq7EgzVjz-cRovSeGuXwGKdty8haxKB3LOa4qePC73P2LMUgicYKsVsFUT_5f1pOj_ehQ7u3IAy87JeScEq3RY3Ivk0QE95CTC7pzZwjkcaODiH2ijoAAQS86IgwUZTX44nwi3-hGM" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/90 via-ridge-deep/30 to-transparent opacity-90 group-hover:opacity-95 transition-opacity">
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span
                                        class="bg-primary-container text-on-primary-container font-badge-caption text-badge-caption uppercase font-bold px-2 py-0.5 rounded">6,189m
                                        Headwall</span>
                                </div>
                                <button
                                    class="absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 hover:bg-primary-container text-on-surface flex items-center justify-center transition-colors"
                                    onclick="openModal('Island Pass headwall push at dawn', '6,189m • Imja Valley Cirque', 'Spring Destination Window')"
                                    title="Expand Fullscreen Stills">
                                    <x-lucide-expand class="size-[18px]" />
                                </button>
                                <div class="absolute bottom-0 inset-x-0 p-space-md text-summit-white">
                                    <div
                                        class="text-primary-container font-label-sm text-label-sm uppercase font-semibold">
                                        Trekking Pass Technical</div>
                                    <h3
                                        class="font-headline-sm text-headline-sm text-summit-white font-bold leading-tight">
                                        Island Pass Headwall Push</h3>
                                    <p class="text-body-sm text-surface-dim mt-1">Ascending fixed lines on the
                                        150-meter final ice pitch as first sunlight touches the Imja Valley.</p>
                                    <div
                                        class="flex items-center justify-between pt-space-xs mt-space-xs border-t border-white/10 text-body-sm text-surface-variant">
                                        <span>By Sonam Chhiring</span>
                                        <span class="font-label-sm text-label-sm text-primary-fixed">Canon R6 Mark
                                            II</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 9: Ngozumpa Glacier Turquoise Moraine -->
                        <div class="gallery-item group relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
                            data-cat="astro" data-season="autumn">
                            <div class="relative h-80 overflow-hidden">
                                <img alt="Ngozumpa Glacier Turquoise Moraine"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    data-alt="Top down telephoto view of bright turquoise glacial meltwater pools and braided streams cutting through the rugged gray moraines of Ngozumpa Glacier Nepal, longest glacier in Himalayas, surreal abstract textures of ice, silt, and pristine alpine minerals"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGeBsl22U5v-dfO5Er4digMuEOrxMq4MPZfJPMcLfnE2huR3r8VhKttqi6wnobm5Nht-475vaZx6_qA8zhoBuC5nx8QI9IwFYRHYVYv6se1f-lu7Wm7EKAn-Uz0bZ_ldBjXntI4ZP9BF8bieYsi_9UqFzywGfEeFlbTXkRSkIHmIoZDVDxxi_P4Bnk_YWrVeYrRqiDA39c8iE_9-huEzDauI2VBdX1th5R6d0YOdIJf6SXNym8a_Be" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/90 via-ridge-deep/30 to-transparent opacity-90 group-hover:opacity-95 transition-opacity">
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span
                                        class="bg-ridge-deep/80 text-summit-white font-badge-caption text-badge-caption uppercase px-2 py-0.5 rounded">4,900m
                                        Ngozumpa</span>
                                </div>
                                <button
                                    class="absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 hover:bg-primary-container text-on-surface flex items-center justify-center transition-colors"
                                    onclick="openModal('Glacial meltwater streams cutting through Ngozumpa Glacier', '4,900m • Ngozumpa Valley', 'Autumn Glacial Hydrology')"
                                    title="Expand Fullscreen Stills">
                                    <x-lucide-expand class="size-[18px]" />
                                </button>
                                <div class="absolute bottom-0 inset-x-0 p-space-md text-summit-white">
                                    <div
                                        class="text-primary-container font-label-sm text-label-sm uppercase font-semibold">
                                        Glacial Hydrology</div>
                                    <h3
                                        class="font-headline-sm text-headline-sm text-summit-white font-bold leading-tight">
                                        Ngozumpa Mineral Streams</h3>
                                    <p class="text-body-sm text-surface-dim mt-1">Glacial silt creates surreal neon
                                        hues across Nepal's longest active glacier beneath the Cho Oyu cirque.</p>
                                    <div
                                        class="flex items-center justify-between pt-space-xs mt-space-xs border-t border-white/10 text-body-sm text-surface-variant">
                                        <span>By David Lindqvist</span>
                                        <span class="font-label-sm text-label-sm text-primary-fixed">DJI Mavic 3 Pro
                                            Cine</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination / Load Full Archive CTA -->
                    <div class="mt-space-2xl text-center">
                        <button
                            class="inline-flex items-center gap-space-xs px-space-xl py-space-sm rounded-lg bg-surface-container-highest hover:bg-surface-variant text-on-surface font-label-md text-label-md uppercase tracking-wider transition-all shadow-sm">
                            <x-lucide-download class="size-[20px] text-primary" />
                            Load More High-Altitude Dispatches (48 Remaining)
                        </button>
                    </div>
                </div>
            </section>
            <!-- Video Dispatches & 4K Aerial Showcase Section -->
            <section
                class="w-full py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-ridge-deep text-summit-white relative overflow-hidden">
                <!-- Subtle Background Glow -->
                <div
                    class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-primary/10 rounded-full blur-[140px] pointer-events-none">
                </div>
                <div class="max-w-max-content-width mx-auto relative z-10">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-2xl gap-space-md">
                        <div>
                            <span
                                class="font-badge-caption text-badge-caption uppercase tracking-widest text-primary-container font-bold">4K
                                Cinema &amp; Drones</span>
                            <h2 class="font-headline-lg text-headline-lg text-summit-white uppercase tracking-tight">
                                Trek Film Dispatches</h2>
                            <p class="text-surface-dim font-body-md text-body-md max-w-xl mt-1">
                                Recorded in Apple ProRes 422 HQ and D-Log M across our 2024–2025 seasons. Immersive
                                soundscapes mixed in Dolby Atmos from high ridge winds.
                            </p>
                        </div>
                        <div class="flex items-center gap-space-sm text-label-sm font-label-sm text-surface-dim">
                            <span class="flex items-center gap-1 text-primary-container">
                                <x-lucide-hd class="size-[18px]" /> 4K Ultra High Definition
                            </span>
                            <span>•</span>
                            <span>Sherpa Spoken &amp; English Subtitles</span>
                        </div>
                    </div>
                    <!-- 3 Video Teaser Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
                        <!-- Video 1 -->
                        <div
                            class="group relative bg-surface-container-highest/10 backdrop-blur-md rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                            <div class="relative h-60 w-full overflow-hidden">
                                <img alt="Gokyo Ri Mini Doc Still"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                    data-alt="Dramatic drone cinema frame flying over Gokyo Ri mountain destination looking out to four 8000m passes Everest Lhotse Makalu Cho Oyu surrounded by morning sea of clouds Nepal, cinematic 4k film still with rich golden flare"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBNScL9j19oK8KlqIbIhpOP-aQ0wm26x3a-KgNMeKZLtuiCd0gFKudUK2BpVpLhZ-8q26-68xs3jc6KcXIqGy6h-PLOPZNhjDT2uAM32e6NgJ3VNP38LW0LdgzgxxPGHn9qVTqkLFa0JFj5OOpBkthIBUikkx9kcjIpjdr1-sKu01le7kvFZxVWyA4_kMEPUaS1wgypedTpFFs8HaIYG8cwlzom28Cs0YitBs3GDt3t3KGAmAJe0cN_" />
                                <div
                                    class="absolute inset-0 bg-ridge-deep/40 group-hover:bg-ridge-deep/20 transition-colors">
                                </div>
                                <!-- Play Button Overlay -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <button aria-label="Play Beyond the Cloudline documentary"
                                        class="w-14 h-14 rounded-full bg-primary-container/90 text-on-primary-fixed flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                        <x-lucide-play class="size-[32px] translate-x-0.5" />
                                    </button>
                                </div>
                                <!-- Duration Badge -->
                                <div
                                    class="absolute bottom-3 right-3 bg-ridge-deep/85 px-space-xs py-0.5 rounded font-badge-caption text-badge-caption text-summit-white">
                                    08:24 MIN • 4K
                                </div>
                            </div>
                            <div class="p-space-lg space-y-space-xs">
                                <div class="text-primary-container font-label-sm text-label-sm uppercase font-semibold">
                                    Mini-Documentary</div>
                                <h3 class="font-headline-sm text-headline-sm text-summit-white font-bold">Beyond the
                                    Cloudline: Gokyo Ri</h3>
                                <p class="font-body-sm text-body-sm text-surface-dim">
                                    A 16-day deep trek over the frozen lakes of Gokyo, high Cho La pass, and the
                                    remote western Khumbu valleys.
                                </p>
                                <div
                                    class="pt-space-xs flex items-center justify-between text-body-sm text-tertiary-fixed-dim">
                                    <span>Directed by Lobsang Sherpa</span>
                                    <span
                                        class="flex items-center gap-1 text-primary-fixed font-label-sm text-label-sm"><x-lucide-eye
                                            class="size-[14px]" /> 42k views</span>
                                </div>
                            </div>
                        </div>
                        <!-- Video 2 -->
                        <div
                            class="group relative bg-surface-container-highest/10 backdrop-blur-md rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                            <div class="relative h-60 w-full overflow-hidden">
                                <img alt="The Porter Path Short Film Still"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                    data-alt="Intimate cinematic camera portrait of Nepali high-altitude porters and Sherpa guides resting along a mist-shrouded stone staircase in Namche forest Nepal, carrying trek gear with traditional tump-lines, warm genuine smiles, documentary realism"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAyE5DrZVbEZ9Mqaavmj9LsxvLELi2WMLW_1ELngrp0T-KtMYwRq1yagjbAfZFOBP6MgPpkAREhbydew5iaukGLmGkzop5-xKZzd6VEnUO00rKjWNkSCLQ6CkFaCp7Q3G3Vu_JX1NMqCmdzYki6cuIPNb_zojzqvpzNh4J9CtHOXwAVhkEbnNDOpmqwfIzRKZRBw1Y9L867uAi8s3etih7bgLuml0pyYV8EJm74IQELqOjCNEd0v0fn" />
                                <div
                                    class="absolute inset-0 bg-ridge-deep/40 group-hover:bg-ridge-deep/20 transition-colors">
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <button aria-label="Play The Porter Path film"
                                        class="w-14 h-14 rounded-full bg-primary-container/90 text-on-primary-fixed flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                        <x-lucide-play class="size-[32px] translate-x-0.5" />
                                    </button>
                                </div>
                                <div
                                    class="absolute bottom-3 right-3 bg-ridge-deep/85 px-space-xs py-0.5 rounded font-badge-caption text-badge-caption text-summit-white">
                                    06:12 MIN • 4K
                                </div>
                            </div>
                            <div class="p-space-lg space-y-space-xs">
                                <div class="text-primary-container font-label-sm text-label-sm uppercase font-semibold">
                                    Ethical Advocacy Film</div>
                                <h3 class="font-headline-sm text-headline-sm text-summit-white font-bold">The Porter
                                    Path: Stewardship</h3>
                                <p class="font-body-sm text-body-sm text-surface-dim">
                                    Behind the scenes of our fair-wage, load-limited, and full-insurance porter welfare
                                    policy across the Solukhumbu trails.
                                </p>
                                <div
                                    class="pt-space-xs flex items-center justify-between text-body-sm text-tertiary-fixed-dim">
                                    <span>Festival Selected 2024</span>
                                    <span
                                        class="flex items-center gap-1 text-primary-fixed font-label-sm text-label-sm"><x-lucide-eye
                                            class="size-[14px]" /> 68k views</span>
                                </div>
                            </div>
                        </div>
                        <!-- Video 3 -->
                        <div
                            class="group relative bg-surface-container-highest/10 backdrop-blur-md rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                            <div class="relative h-60 w-full overflow-hidden">
                                <img alt="Pushing Destination on Mera Pass Still"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                    data-alt="High angle drone aerial shot of trekkers trekking the snow destination ridge of Mera Pass 6476m Nepal at sunrise, pristine untouched snowfields, sweeping panorama of five 8000 meter giants on the horizon, golden glow and cobalt shadows"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBI3tQn-492KEdjUUlGxX3SiYcL-xwKozARp4yNM4xLb7QG73_bPHEFhSA_ll4coZLk6ZEFV71U3J6JTaiWh0d-pbr8_9sxecKl2NtrX-EVeRywQgLXgJvvMUu1tpSQk5XiYoodhQjqU4orBfF_NcXLVTxrRcjwrTPAjtKV957e8HNdwmNEh7zhYbH9iaaFyp0-msRMLXj686BU5FDaZ0sc1Y0GfTcAj5EmRuQYWuiZfBVWxWIjQV3q" />
                                <div
                                    class="absolute inset-0 bg-ridge-deep/40 group-hover:bg-ridge-deep/20 transition-colors">
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <button aria-label="Play Pushing Destination on Mera Pass documentary"
                                        class="w-14 h-14 rounded-full bg-primary-container/90 text-on-primary-fixed flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                        <x-lucide-play class="size-[32px] translate-x-0.5" />
                                    </button>
                                </div>
                                <div
                                    class="absolute bottom-3 right-3 bg-ridge-deep/85 px-space-xs py-0.5 rounded font-badge-caption text-badge-caption text-summit-white">
                                    12:45 MIN • 4K
                                </div>
                            </div>
                            <div class="p-space-lg space-y-space-xs">
                                <div class="text-primary-container font-label-sm text-label-sm uppercase font-semibold">
                                    Technical Trekking Diary</div>
                                <h3 class="font-headline-sm text-headline-sm text-summit-white font-bold">Pushing
                                    Destination: Mera Pass 6,476m</h3>
                                <p class="font-body-sm text-body-sm text-surface-dim">
                                    From the lush Hinku valley through high camp crevasse fields to Nepal's most
                                    expansive panoramic viewpoint.
                                </p>
                                <div
                                    class="pt-space-xs flex items-center justify-between text-body-sm text-tertiary-fixed-dim">
                                    <span>Filmed by Pasang Kaji</span>
                                    <span
                                        class="flex items-center gap-1 text-primary-fixed font-label-sm text-label-sm"><x-lucide-eye
                                            class="size-[14px]" /> 95k views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Client Community Submission & Calendar Grants Section -->
            <section class="w-full py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface">
                <div class="max-w-max-content-width mx-auto">
                    <div class="bg-surface-container-low rounded-2xl p-space-xl lg:p-space-2xl shadow-sm">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-center">
                            <div class="lg:col-span-7 space-y-space-md">
                                <div
                                    class="inline-flex items-center gap-space-2xs px-space-sm py-1 rounded-full bg-primary-container/20 text-primary font-badge-caption text-badge-caption tracking-widest uppercase font-bold">
                                    <x-lucide-shield class="size-[16px]" />
                                    Annual Khumbu Photography Awards
                                </div>
                                <h2 class="font-headline-lg text-headline-lg text-on-surface uppercase tracking-tight">
                                    Share Your Himalayan Story • Annual Print Calendar
                                </h2>
                                <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                    Every year, Neepa Adventure selects 12 traveler and guide photographs to be featured
                                    in our limited-edition charity print calendar. 100% of calendar royalties directly
                                    fund the Sherpa Children's Himalayan Education Grant in Khumjung &amp; Phortse
                                    villages.
                                </p>
                                <div class="space-y-space-sm pt-space-xs">
                                    <div class="flex items-start gap-space-sm">
                                        <x-lucide-circle-check class="text-primary size-[22px] mt-0.5" />
                                        <div>
                                            <div
                                                class="font-label-md text-label-md font-bold text-on-surface uppercase">
                                                RAW or High-Res JPEG Accepted</div>
                                            <div class="font-body-sm text-body-sm text-tertiary">All cameras welcome:
                                                Medium format, mirrorless, 35mm film scans, or flagship mobile captures.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-space-sm">
                                        <x-lucide-circle-check class="text-primary size-[22px] mt-0.5" />
                                        <div>
                                            <div
                                                class="font-label-md text-label-md font-bold text-on-surface uppercase">
                                                Photographer Royalties &amp; Accreditation</div>
                                            <div class="font-body-sm text-body-sm text-tertiary">Selected photographers
                                                receive full global credit and a $500 trek credit token toward
                                                future treks.</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Upload Interaction Form Mock -->
                                <div class="pt-space-md flex flex-wrap items-center gap-space-md">
                                    <button
                                        class="px-space-xl py-space-sm rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider transition-all shadow-md flex items-center gap-space-2xs">
                                        <x-lucide-upload class="size-[20px]" />
                                        Submit Trek Stills
                                    </button>
                                    <a class="font-label-md text-label-md text-primary font-bold uppercase tracking-wider hover:underline flex items-center gap-1"
                                        href="#">
                                        View Past 2024 Winning Gallery <x-lucide-arrow-right class="size-[16px]" />
                                    </a>
                                </div>
                            </div>
                            <!-- Right Visual Graphic Box -->
                            <div
                                class="lg:col-span-5 bg-surface-container-lowest p-space-xl rounded-xl shadow-md space-y-space-md">
                                <div class="flex items-center justify-between">
                                    <span
                                        class="font-badge-caption text-badge-caption uppercase tracking-wider text-tertiary font-bold">2025
                                        Calendar Jury</span>
                                    <span
                                        class="bg-primary/10 text-primary font-label-sm text-label-sm px-2 py-0.5 rounded font-semibold uppercase">Entries
                                        Open</span>
                                </div>
                                <div class="h-44 w-full rounded-lg overflow-hidden relative">
                                    <img alt="Selected Fine Art Print Sample" class="w-full h-full object-cover"
                                        data-alt="Monochrome minimalist artistic print of Himalayan ridgeline with solitary climber walking along razor snow cornice under soft cloud inversion, museum fine art photography style"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAPht3KMLyYfMR6V9SYFmakDlPq_qkPhj787Aa2rBZnpqRo56wK7LVSINCFZiifZVFxwGLHBoqmY0BmqZx2oFcE4iIAnvhFDIaeGnZZPlzEc3vg62yBJGzxGmWpM5sqPdgZexFJ3EIhP-Y6l27TdAqMA-ZOJdXR8hdgGIQVcAZ_5q7M4mhqIKzhyXIHOpC8l0vD2q9J04o8idxFpVeedCLB3CO6S__5aT4P-MTZkP4aHp-9Zke5y7hg" />
                                    <div
                                        class="absolute bottom-2 left-2 bg-ridge-deep/80 text-summit-white px-2 py-0.5 rounded font-label-sm text-label-sm">
                                        Last Year's Grand Winner • Mera Ridge
                                    </div>
                                </div>
                                <div class="space-y-space-xs text-body-sm">
                                    <div class="flex justify-between text-tertiary">
                                        <span>Submission Window:</span>
                                        <span class="font-semibold text-on-surface">Oct 01 – Nov 30, 2025</span>
                                    </div>
                                    <div class="flex justify-between text-tertiary">
                                        <span>Resolution Target:</span>
                                        <span class="font-semibold text-on-surface">Min 24 Megapixels (300 DPI)</span>
                                    </div>
                                    <div class="flex justify-between text-tertiary">
                                        <span>Education Fund Raised (2024):</span>
                                        <span class="font-semibold text-primary">$18,450 USD</span>
                                    </div>
                                </div>
                                <div
                                    class="p-space-sm bg-surface-container rounded text-body-sm text-on-surface-variant flex items-center gap-space-2xs">
                                    <x-lucide-info class="text-primary size-[18px]" />
                                    <span>Submissions curated by TAAN Photography Circle.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- High Impact Final Booking / Lookbook Banner CTA -->
            <section
                class="w-full py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-ridge-deep text-summit-white relative overflow-hidden">
                <!-- Atmospheric Visual Backing -->
                <div class="absolute inset-0 opacity-20 pointer-events-none">
                    <img alt="Himalayan Amphitheater Backdrop" class="w-full h-full object-cover"
                        data-alt="Expansive panoramic view of the entire Everest and Lhotse mountain amphitheater under dramatic golden sunset clouds with light rays breaking over Himalayan glaciers, immense scale, ultra-wide"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgDtjRN4dk-MxO1jG7hY8oHLyKhC9ocn-ckkp6S_OydcuXlD-AzGbqTJCdx70HRFlGcagHjsys3sG0B2nau6V1gUXgfCv3Hjx4_PJYpeDhZ_D-L_HkeD4yrBMoO39EFiZx1yFNvYojKwn8osXWSC8icy4bz9jrh1tGAiOOF4gSQHs5EYb84PDBTPJM3Gw75LwuXiClSOmNEHD0TSDs9aSMW-2KpIoSnv8rOtwkAPSKapg5H5-A9mBx" />
                </div>
                <div class="absolute inset-0 bg-gradient-to-r from-ridge-deep via-ridge-deep/90 to-ridge-deep/70">
                </div>
                <div
                    class="max-w-max-content-width mx-auto relative z-10 text-center lg:text-left flex flex-col lg:flex-row items-center justify-between gap-space-2xl">
                    <div class="max-w-2xl space-y-space-sm">
                        <div
                            class="inline-flex items-center gap-space-2xs text-primary-container font-badge-caption text-badge-caption uppercase tracking-widest font-bold">
                            <x-lucide-footprints class="size-[16px]" /> Beyond the Lens
                        </div>
                        <h2
                            class="font-headline-lg text-headline-lg text-summit-white uppercase tracking-tight leading-tight">
                            Ready to Experience These Vistas in Person?
                        </h2>
                        <p class="font-body-lg text-body-lg text-surface-dim font-normal">
                            Every photo in our archive was captured on active Neepa Adventure treks. Stand at the
                            base of the Khumbu icefall, cross Cho La with veteran Sherpa mentors, and log your own
                            destination dispatches.
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center gap-space-md w-full lg:w-auto">
                        <a class="w-full sm:w-auto inline-flex items-center justify-center px-space-xl py-space-md rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider transition-all shadow-lg text-center"
                            data-path="treks" href="#">
                            Find Your Trek
                        </a>
                        <a class="w-full sm:w-auto inline-flex items-center justify-center gap-space-2xs px-space-xl py-space-md rounded-lg bg-surface-container-highest/20 hover:bg-surface-container-highest/30 text-summit-white font-label-md text-label-md font-bold uppercase tracking-wider transition-all backdrop-blur-md text-center"
                            href="#">
                            <x-lucide-download class="size-[20px] text-primary-container" />
                            2025/26 Lookbook (PDF)
                        </a>
                    </div>
                </div>
            </section>
            <!-- Interactive Lightbox Modal Structure -->
            <div class="fixed inset-0 z-50 hidden bg-ridge-deep/95 backdrop-blur-xl flex items-center justify-center p-gutter-mobile lg:p-gutter-desktop"
                id="lightbox-modal">
                <div
                    class="relative w-full max-w-5xl bg-surface-container-lowest rounded-2xl overflow-hidden shadow-2xl flex flex-col max-h-[921px]">
                    <!-- Modal Header -->
                    <div class="flex items-center justify-between p-space-md bg-surface-container-low">
                        <div class="flex items-center gap-space-sm">
                            <x-lucide-camera class="text-primary size-[24px]" />
                            <div>
                                <h4 class="font-headline-sm text-headline-sm text-on-surface uppercase font-bold"
                                    id="modal-title">Thorang La Pass</h4>
                                <p class="font-body-sm text-body-sm text-tertiary" id="modal-meta">5,416m • Annapurna
                                    Circuit • Autumn</p>
                            </div>
                        </div>
                        <button aria-label="Close modal"
                            class="w-10 h-10 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface flex items-center justify-center transition-colors"
                            onclick="closeModal()">
                            <x-lucide-x class="size-[24px]" />
                        </button>
                    </div>
                    <!-- Modal Image Viewport -->
                    <div
                        class="relative w-full bg-ridge-deep flex-1 flex items-center justify-center min-h-[350px] overflow-hidden">
                        <img alt="Himalayan Trek Detail" class="max-h-[665px] w-auto object-contain mx-auto"
                            data-alt="High-resolution full-screen alpine documentary shot in ultra clarity with crisp mountain details and vibrant lighting"
                            id="modal-img"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDRmUwWUNcS9ZrsGsOHpcc7-8WzOFImj5jDEQQ782vfeNmKTjr6XCmuXP2b-wcG7QqdA3ghemHg9Q0Wo7X3X7bnlDFVAa4mk3K5ZOA7tvxm-rtlu955q3Asr3bBnd8B-6SY06FsO0lLJ5uRXceb60z-fD2F35dO0UBZitBcAWFAFMtGxEh3DlDKFQUZphQVtZeQMF3FPdYc_Knb8Sr4K66B8uSV8OHafBGUel6uOC6w65_4crVVynvK" />
                    </div>
                    <!-- Modal Footer -->
                    <div
                        class="p-space-md bg-surface-container-lowest flex flex-wrap items-center justify-between gap-space-md text-body-sm">
                        <div class="flex items-center gap-space-md text-tertiary">
                            <span class="flex items-center gap-1"><x-lucide-copyright
                                    class="size-[16px] text-primary" /> Neepa Adventure Archives</span>
                            <span>•</span>
                            <span id="modal-tag">Verified Sherpa Capture</span>
                        </div>
                        <div class="flex items-center gap-space-sm">
                            <button
                                class="px-space-md py-space-xs rounded bg-surface-container hover:bg-surface-container-high font-label-sm text-label-sm uppercase font-bold text-on-surface flex items-center gap-1">
                                <x-lucide-share class="size-[16px]" /> Share
                            </button>
                            <a class="px-space-md py-space-xs rounded bg-primary-container text-on-primary-fixed font-label-sm text-label-sm uppercase font-bold flex items-center gap-1"
                                data-path="treks" href="#">
                                <x-lucide-map class="size-[16px]" /> View Route
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Interactive Javascript for Filtering, Layout View, and Modal -->

        </div>
    </main>
    <x-footer />
</x-layouts.app>