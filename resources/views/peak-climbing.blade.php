<x-layouts.app>
    <x-header />
    <main class="w-full pt-20 bg-surface">
        <div class="flex flex-col w-full">
            <!-- Top Altitude Ticker Scrim -->
            <div
                class="w-full bg-ridge-deep text-alpine-snow py-space-xs px-gutter-mobile lg:px-gutter-desktop text-body-sm shadow-sm">
                <div class="max-w-max-content-width mx-auto flex flex-wrap items-center justify-between gap-space-sm">
                    <div
                        class="flex items-center gap-space-sm text-amber-flare font-label-sm uppercase tracking-wider font-semibold">
                        <span class="inline-block w-2 h-2 rounded-full bg-primary-container animate-ping"></span>
                        <span>Spring &amp; Autumn Climbing Roster Open</span>
                    </div>
                    <div class="hidden md:flex items-center gap-space-xl font-label-sm text-secondary-fixed-dim">
                        <span class="flex items-center gap-space-2xs"><x-lucide-compass
                                class="size-[16px] text-amber-flare" />100% Sherpa
                            Guided Expeditions</span>
                        <span class="flex items-center gap-space-2xs"><x-lucide-shield-plus
                                class="size-[16px] text-amber-flare" />Garmin
                            inReach SOS + TopOut O2</span>
                        <span class="flex items-center gap-space-2xs"><x-lucide-shield-check
                                class="size-[16px] text-amber-flare" />NMA / Govt
                            Reg License 104/072</span>
                    </div>
                </div>
            </div>
            <!-- Hero Section -->
            <section class="relative w-full overflow-hidden bg-ridge-deep text-summit-white">
                <div class="absolute inset-0 bg-cover bg-center mix-blend-luminosity opacity-25 scale-105 transition-transform duration-1000"
                    data-alt="Dusk falling upon the razor-sharp icy ridge of Ama Dablam and Everest massif in Nepal, high alpine mountaineers roped up under starry indigo sky with headlamps glittering, warm amber glow on snow seracs, minimalist editorial expedition photography style"
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC60I7t2YKGGxzSMoBNmzwdXTp-1I3YoWaOHm7v_e2amPWclXK4si3pf-qcZDmpZA7b5ig3T1brj5nIFJM03G2BuYCa8xD23PMmutQ2idDkB8BFd7Luj9MGM4Oqsqg1xzjj_7eSg6qDYWwPFli6UWh9AL2yCifC0OMS8KCBrrmGP2usj5j0Qm5sUunAEJYyghoIRtxITyzBPQT8-hw_7_AOIzAQ0EWsuXAiOB_jOtONLZzSgMJ-BwEo')">
                </div>
                <div
                    class="relative max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop py-space-3xl lg:py-space-4xl flex flex-col justify-between min-h-[540px]">
                    <div class="max-w-3xl space-y-space-md">
                        <div
                            class="inline-flex items-center gap-space-xs bg-ridge-deep/80 backdrop-blur-md px-space-sm py-space-2xs rounded-full text-amber-flare">
                            <x-lucide-mountain class="size-[18px]" />
                            <span class="font-badge-caption text-badge-caption uppercase">From 6,000m Trekking Peaks to
                                8,848.86m Giants</span>
                        </div>
                        <h1
                            class="font-display-xl text-display-xl tracking-tight text-summit-white leading-none uppercase">
                            Nepal Peak Climbing <span class="text-primary-container">&amp; 8,000m</span> Expeditions
                        </h1>
                        <p class="font-body-lg text-body-lg text-mist-slate/90 max-w-2xl leading-relaxed">
                            From first technical 6,000m trekking summits to legendary 7,000m ridges and iconic 8,000m
                            giants. Precision alpine logistics, medical-grade safety envelopes, and 1:1 summit-day
                            pairings led by 14x Everest Sherpa Sirdars.
                        </p>
                        <div class="pt-space-sm flex flex-wrap items-center gap-space-md">
                            <a class="inline-flex items-center gap-space-xs px-space-xl py-space-sm rounded-lg bg-primary-container text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider hover:bg-amber-flare transition-all shadow-lg"
                                href="#expeditions-matrix">
                                <span>Explore Summits</span>
                                <x-lucide-arrow-down class="size-[18px]" />
                            </a>
                            <a class="inline-flex items-center gap-space-xs px-space-lg py-space-sm rounded-lg bg-surface-container-high/15 backdrop-blur-sm text-summit-white font-label-md text-label-md font-bold uppercase tracking-wider hover:bg-surface-container-high/25 transition-all"
                                href="#director-consult">
                                <x-lucide-phone-call class="size-[18px] text-amber-flare" />
                                <span>Expedition Director Call</span>
                            </a>
                        </div>
                    </div>
                    <!-- Quick Alpine Vital Stats Bar -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-space-md pt-space-2xl">
                        <div class="bg-surface-container-highest/10 backdrop-blur-md p-space-md rounded-xl">
                            <div class="font-display-xl text-headline-lg text-primary-container font-extrabold">1:1
                            </div>
                            <div class="font-label-sm text-label-sm uppercase tracking-wide text-mist-slate">Summit
                                Sherpa Ratio</div>
                            <div class="font-body-sm text-body-sm text-tertiary-fixed-dim">Guaranteed for all 7k &amp;
                                8k</div>
                        </div>
                        <div class="bg-surface-container-highest/10 backdrop-blur-md p-space-md rounded-xl">
                            <div class="font-display-xl text-headline-lg text-summit-white font-extrabold">98.4%</div>
                            <div class="font-label-sm text-label-sm uppercase tracking-wide text-mist-slate">Safe
                                High-Pass Rate</div>
                            <div class="font-body-sm text-body-sm text-tertiary-fixed-dim">Over 480 expeditions led
                            </div>
                        </div>
                        <div class="bg-surface-container-highest/10 backdrop-blur-md p-space-md rounded-xl">
                            <div class="font-display-xl text-headline-lg text-primary-container font-extrabold">4L / min
                            </div>
                            <div class="font-label-sm text-label-sm uppercase tracking-wide text-mist-slate">TopOut O2
                                Delivery</div>
                            <div class="font-body-sm text-body-sm text-tertiary-fixed-dim">Composite lightweight tanks
                            </div>
                        </div>
                        <div class="bg-surface-container-highest/10 backdrop-blur-md p-space-md rounded-xl">
                            <div class="font-display-xl text-headline-lg text-summit-white font-extrabold">24/7</div>
                            <div class="font-label-sm text-label-sm uppercase tracking-wide text-mist-slate">Kathmandu
                                Heli Link</div>
                            <div class="font-body-sm text-body-sm text-tertiary-fixed-dim">Direct satellite telemetry
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Category Filtering Tabs Section -->
            <section class="w-full bg-surface-container-lowest py-space-2xl px-gutter-mobile lg:px-gutter-desktop"
                id="expeditions-matrix">
                <div class="max-w-max-content-width mx-auto">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-xl gap-space-md">
                        <div class="space-y-space-2xs">
                            <span
                                class="font-badge-caption text-badge-caption uppercase text-primary font-bold tracking-widest">Summit
                                Classification</span>
                            <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface uppercase">Himalayan
                                Expeditions Matrix</h2>
                            <p class="font-body-md text-body-md text-tertiary max-w-xl">Filter verified climbs according
                                to alpine difficulty, altitude envelope, and technical gear requirements.</p>
                        </div>
                        <!-- Filter Buttons -->
                        <div class="flex flex-wrap items-center gap-space-xs bg-surface-container-low p-space-2xs rounded-full"
                            id="filter-container">
                            <button
                                class="filter-btn active px-space-md py-space-xs rounded-full font-label-md text-label-md uppercase font-bold transition-all bg-ridge-deep text-summit-white shadow-sm"
                                data-filter="all">
                                All Expeditions
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs rounded-full font-label-md text-label-md uppercase font-semibold text-tertiary hover:text-on-surface transition-all"
                                data-filter="trekking">
                                6,000m Trekking Peaks
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs rounded-full font-label-md text-label-md uppercase font-semibold text-tertiary hover:text-on-surface transition-all"
                                data-filter="technical">
                                Technical 7,000m
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs rounded-full font-label-md text-label-md uppercase font-semibold text-tertiary hover:text-on-surface transition-all"
                                data-filter="eight-thousander">
                                8,000m Majors
                            </button>
                        </div>
                    </div>
                    <!-- Expeditions Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-xl" id="peaks-grid">
                        <!-- Card 1: Island Peak -->
                        <article
                            class="expedition-card group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col"
                            data-category="trekking">
                            <div class="relative h-64 overflow-hidden bg-surface-container">
                                <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-700"
                                    data-alt="Island Peak Imja Tse sharp snow pyramid rising above the Khumbu Glacier with fixed rope climbing ladders and early dawn light casting golden glow on crevasses"
                                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCnP5aCsU3mE1TZlG3B6x-302qdaoJq6fx0cG96_yn0UjfpSoSCyyxgziXXUC-IvAhRPCChgAzeiLqUaHqLeIWWeRpuoVNbryAaH1Hjj8O0BuM_I42JfVMlrBuVSaXhNtNsY3wHi-fzrdbxpIeT6NVp5OG4Ouvh2XsFbzWGuAkoX7otuLvJcLPKjmV8VRpZVT7O4YxO1K3jvKMCrsc7X-EYSfcgmgv5AP4AuAsurkdJNmbnDrITcIBH')">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/80 via-transparent to-transparent">
                                </div>
                                <div class="absolute top-space-md left-space-md flex flex-wrap gap-space-xs">
                                    <span
                                        class="bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption px-space-xs py-space-2xs rounded uppercase font-bold tracking-wider">Grade
                                        PD+</span>
                                    <span
                                        class="bg-ridge-deep text-summit-white font-badge-caption text-badge-caption px-space-xs py-space-2xs rounded uppercase font-bold">6,189
                                        M</span>
                                </div>
                                <div
                                    class="absolute bottom-space-md left-space-md right-space-md flex justify-between items-end text-summit-white">
                                    <div>
                                        <span
                                            class="font-label-sm text-label-sm text-amber-flare uppercase tracking-wider block">Khumbu
                                            Glacier / Everest</span>
                                        <h3 class="font-headline-sm text-headline-sm font-bold leading-snug">Island Peak
                                            (Imja Tse) + EBC</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="p-space-lg flex-1 flex flex-col justify-between space-y-space-md">
                                <p class="font-body-md text-body-md text-tertiary">
                                    Nepal's quintessential introductory alpine peak combining acclimatization along the
                                    classic Everest Base Camp trail, headwall jumar ascension, and narrow knife-edge
                                    snow ridge.
                                </p>
                                <div
                                    class="bg-surface-container-low rounded-lg p-space-sm grid grid-cols-3 gap-space-xs text-center">
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Duration</div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">19 Days
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Ratio</div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">1:1 Summit
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Terrain</div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">Snow &amp;
                                            Ice</div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pt-space-xs">
                                    <div>
                                        <span class="font-label-sm text-label-sm text-secondary uppercase block">All
                                            Inclusive From</span>
                                        <span
                                            class="font-headline-md text-headline-md font-extrabold text-on-surface">$2,450
                                            <span class="font-body-sm text-body-sm font-normal text-tertiary">/
                                                climber</span></span>
                                    </div>
                                    <button
                                        class="px-space-md py-space-xs rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase transition-all flex items-center gap-space-2xs shadow-sm">
                                        <span>Itinerary</span>
                                        <x-lucide-chevron-right class="size-[16px]" />
                                    </button>
                                </div>
                            </div>
                        </article>
                        <!-- Card 2: Mera Peak -->
                        <article
                            class="expedition-card group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col"
                            data-category="trekking">
                            <div class="relative h-64 overflow-hidden bg-surface-container">
                                <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-700"
                                    data-alt="Mera Peak Nepal highest trekking peak panorama with dramatic view of Mount Everest, Lhotse, Makalu, Cho Oyu, and Kanchenjunga summits emerging from sea of morning clouds in warm alpine sunlight"
                                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDsOwEFMqkRpBs9-cRhCM5AdX-GQj3sAk8JCccLa3oBmeVNb4ikTPJBIxon2-x115SpuT_82HdUP-8IAJehctDPeiyeSk2xHYvE3G8KhBoaFURrzggNfgcZXGX4Z63vWzQVU0kmxlku_qZJgXsbfycn5xBo4nGHKG3LxBGLNRImLg-UKICDGnfJLbs-HpT_8YPXqBQRrCfb8ydgjNACUX5k-gS32SezAOgKfVuavOi5T8lmUHgDdgrS')">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/80 via-transparent to-transparent">
                                </div>
                                <div class="absolute top-space-md left-space-md flex flex-wrap gap-space-xs">
                                    <span
                                        class="bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption px-space-xs py-space-2xs rounded uppercase font-bold tracking-wider">Grade
                                        F / PD</span>
                                    <span
                                        class="bg-ridge-deep text-summit-white font-badge-caption text-badge-caption px-space-xs py-space-2xs rounded uppercase font-bold">6,476
                                        M</span>
                                </div>
                                <div
                                    class="absolute bottom-space-md left-space-md right-space-md flex justify-between items-end text-summit-white">
                                    <div>
                                        <span
                                            class="font-label-sm text-label-sm text-amber-flare uppercase tracking-wider block">Hinku
                                            Valley Wilderness</span>
                                        <h3 class="font-headline-sm text-headline-sm font-bold leading-snug">Mera Peak
                                            Summit</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="p-space-lg flex-1 flex flex-col justify-between space-y-space-md">
                                <p class="font-body-md text-body-md text-tertiary">
                                    Nepal's highest trekking peak offering unmatched 360° panoramas of 5 of the world's
                                    6 highest mountains: Everest, Kanchenjunga, Lhotse, Makalu, and Cho Oyu.
                                </p>
                                <div
                                    class="bg-surface-container-low rounded-lg p-space-sm grid grid-cols-3 gap-space-xs text-center">
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Duration
                                        </div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">18 Days
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Ratio</div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">1:2 or
                                            1:1</div>
                                    </div>
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Glacier Walk
                                        </div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">Moderate
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pt-space-xs">
                                    <div>
                                        <span class="font-label-sm text-label-sm text-secondary uppercase block">All
                                            Inclusive From</span>
                                        <span
                                            class="font-headline-md text-headline-md font-extrabold text-on-surface">$2,290
                                            <span class="font-body-sm text-body-sm font-normal text-tertiary">/
                                                climber</span></span>
                                    </div>
                                    <button
                                        class="px-space-md py-space-xs rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase transition-all flex items-center gap-space-2xs shadow-sm">
                                        <span>Itinerary</span>
                                        <x-lucide-chevron-right class="size-[16px]" />
                                    </button>
                                </div>
                            </div>
                        </article>
                        <!-- Card 3: Lobuche East -->
                        <article
                            class="expedition-card group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col"
                            data-category="trekking">
                            <div class="relative h-64 overflow-hidden bg-surface-container">
                                <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-700"
                                    data-alt="Lobuche East steep summit ridge with fixed mountaineering lines and mountaineers traversing hard wind-packed snow with Khumbu icefall and Nuptse in dramatic background"
                                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDX6YaoGHftIO9YMXA5gMBr9S221twyML0fiPlFf1Cip8DAHML4tbhU_mMVjcO4UINTfXswKQM03tli98ZA6RZ5FvpFWtS6qmqGPdIibFc3ls-Mr-hIDI6VLejIz6pLdqoJXy9ttBDKQpoYw9NlDcCROOvXNRxxmfqrwVqgQEmqEGa__iS7zP30YfVNUDd4hWH_BJpSuUNUQj7oHzPpflTSTGE0FQsg-AiN2nZ0qj_dbodx7N_uIZEw')">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/80 via-transparent to-transparent">
                                </div>
                                <div class="absolute top-space-md left-space-md flex flex-wrap gap-space-xs">
                                    <span
                                        class="bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption px-space-xs py-space-2xs rounded uppercase font-bold tracking-wider">Grade
                                        PD+</span>
                                    <span
                                        class="bg-ridge-deep text-summit-white font-badge-caption text-badge-caption px-space-xs py-space-2xs rounded uppercase font-bold">6,119
                                        M</span>
                                </div>
                                <div
                                    class="absolute bottom-space-md left-space-md right-space-md flex justify-between items-end text-summit-white">
                                    <div>
                                        <span
                                            class="font-label-sm text-label-sm text-amber-flare uppercase tracking-wider block">Khumbu
                                            Sanctuary</span>
                                        <h3 class="font-headline-sm text-headline-sm font-bold leading-snug">Lobuche
                                            East Peak</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="p-space-lg flex-1 flex flex-col justify-between space-y-space-md">
                                <p class="font-body-md text-body-md text-tertiary">
                                    A technical step-up from Island Peak with prolonged steep snow, mixed slab climbing,
                                    and direct sightlines straight into the Everest amphitheatre and Pumori.
                                </p>
                                <div
                                    class="bg-surface-container-low rounded-lg p-space-sm grid grid-cols-3 gap-space-xs text-center">
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Duration
                                        </div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">16 Days
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Ratio</div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">1:1
                                            Summit</div>
                                    </div>
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Technical
                                        </div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">Steep
                                            Snow</div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pt-space-xs">
                                    <div>
                                        <span class="font-label-sm text-label-sm text-secondary uppercase block">All
                                            Inclusive From</span>
                                        <span
                                            class="font-headline-md text-headline-md font-extrabold text-on-surface">$2,380
                                            <span class="font-body-sm text-body-sm font-normal text-tertiary">/
                                                climber</span></span>
                                    </div>
                                    <button
                                        class="px-space-md py-space-xs rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase transition-all flex items-center gap-space-2xs shadow-sm">
                                        <span>Itinerary</span>
                                        <x-lucide-chevron-right class="size-[16px]" />
                                    </button>
                                </div>
                            </div>
                        </article>
                        <!-- Card 4: Ama Dablam -->
                        <article
                            class="expedition-card group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col"
                            data-category="technical">
                            <div class="relative h-64 overflow-hidden bg-surface-container">
                                <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-700"
                                    data-alt="The Matterhorn of the Himalayas Ama Dablam southwestern ridge showing sheer vertical granite towers Camp 1 and Camp 2 precarious ledges hanging glaciers in pristine alpine sunset"
                                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDKadScnghXwMnikE-jkGDFLWr_d8xmBS9k5mc70M1tYAKcewGEYmHhl_YFe8NRTWV7Lf3Ccn_EUvPot4USig8voMSZvPb9OOqH67CBJW1PmPytmp_Ou23rawNq-iOiWd2mfP0rguZlTR5tGpOcRxQrNAk_4L98WItV2rfMWOyiHZ-SZPAKhqHraiGSN-S5ajLnLydCPjjaOVnXxW0bir4pqYYePq7acRygpqEXIR3mLBH8RH4QBy1e')">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/80 via-transparent to-transparent">
                                </div>
                                <div class="absolute top-space-md left-space-md flex flex-wrap gap-space-xs">
                                    <span
                                        class="bg-primary text-summit-white font-badge-caption text-badge-caption px-space-xs py-space-2xs rounded uppercase font-bold tracking-wider">Grade
                                        TD (Technical)</span>
                                    <span
                                        class="bg-ridge-deep text-summit-white font-badge-caption text-badge-caption px-space-xs py-space-2xs rounded uppercase font-bold">6,812
                                        M</span>
                                </div>
                                <div
                                    class="absolute bottom-space-md left-space-md right-space-md flex justify-between items-end text-summit-white">
                                    <div>
                                        <span
                                            class="font-label-sm text-label-sm text-amber-flare uppercase tracking-wider block">The
                                            Himalayan Jewel</span>
                                        <h3 class="font-headline-sm text-headline-sm font-bold leading-snug">Ama Dablam
                                            SW Ridge</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="p-space-lg flex-1 flex flex-col justify-between space-y-space-md">
                                <p class="font-body-md text-body-md text-tertiary">
                                    Revered as one of the most aesthetic technical peaks on Earth. Features steep
                                    granite crack climbing (5.7), mixed couloirs, and hanging ice seracs along the
                                    iconic Southwest Ridge.
                                </p>
                                <div
                                    class="bg-surface-container-low rounded-lg p-space-sm grid grid-cols-3 gap-space-xs text-center">
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Duration
                                        </div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">28 Days
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Ratio</div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">1:1
                                            Dedicated</div>
                                    </div>
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Rigging</div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">Fixed
                                            Rope / Rock</div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pt-space-xs">
                                    <div>
                                        <span class="font-label-sm text-label-sm text-secondary uppercase block">All
                                            Inclusive From</span>
                                        <span
                                            class="font-headline-md text-headline-md font-extrabold text-on-surface">$5,900
                                            <span class="font-body-sm text-body-sm font-normal text-tertiary">/
                                                climber</span></span>
                                    </div>
                                    <button
                                        class="px-space-md py-space-xs rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase transition-all flex items-center gap-space-2xs shadow-sm">
                                        <span>Itinerary</span>
                                        <x-lucide-chevron-right class="size-[16px]" />
                                    </button>
                                </div>
                            </div>
                        </article>
                        <!-- Card 5: Manaslu 8,163m -->
                        <article
                            class="expedition-card group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col"
                            data-category="eight-thousander">
                            <div class="relative h-64 overflow-hidden bg-surface-container">
                                <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-700"
                                    data-alt="Mount Manaslu 8163m mountain of the spirit massive high camp tents illuminated at twilight on snowy slopes beneath pristine summit pinnacle with prayer flags foreground"
                                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC7eeZMXLdDim8tc11o5oiSwNghqHd2PTIila-BDhDAEut7-23QkHaaEyZ1RAQpQ1ddy9xaY3fIA0nu-SSgzsP4BpKlM2j-aOQUZWWQFfKuZ0rTb472gsz_ZDuGet-N-EFiMRpJ_IlRWYi7DA1HLeGMi-AmVZ9CPq1CXCXAULKpmiJjerKI4di-CVMyYnN7gjB-FDokUDOeqBButS79MO3ntNoTL96uQZMPbkrAh4X7sMmzzbUkhdPH')">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/80 via-transparent to-transparent">
                                </div>
                                <div class="absolute top-space-md left-space-md flex flex-wrap gap-space-xs">
                                    <span
                                        class="bg-amber-flare text-on-primary-fixed font-badge-caption text-badge-caption px-space-xs py-space-2xs rounded uppercase font-bold tracking-wider">8,000m
                                        Major</span>
                                    <span
                                        class="bg-ridge-deep text-summit-white font-badge-caption text-badge-caption px-space-xs py-space-2xs rounded uppercase font-bold">8,163
                                        M</span>
                                </div>
                                <div
                                    class="absolute bottom-space-md left-space-md right-space-md flex justify-between items-end text-summit-white">
                                    <div>
                                        <span
                                            class="font-label-sm text-label-sm text-amber-flare uppercase tracking-wider block">Gorkha
                                            Himalaya Massif</span>
                                        <h3 class="font-headline-sm text-headline-sm font-bold leading-snug">Manaslu
                                            'Mountain of the Spirit'</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="p-space-lg flex-1 flex flex-col justify-between space-y-space-md">
                                <p class="font-body-md text-body-md text-tertiary">
                                    The 8th highest peak on earth and the premier autumn 8,000m testpiece. Full summit
                                    support with 4x supplemental composite O2 cylinders, heated high camp mess, and
                                    private Sherpa sirdar.
                                </p>
                                <div
                                    class="bg-surface-container-low rounded-lg p-space-sm grid grid-cols-3 gap-space-xs text-center">
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Duration
                                        </div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">42 Days
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Oxygen</div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">4
                                            Cylinders</div>
                                    </div>
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Sherpa</div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">1:1 Elite
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pt-space-xs">
                                    <div>
                                        <span class="font-label-sm text-label-sm text-secondary uppercase block">Full
                                            Expedition Logistics</span>
                                        <span
                                            class="font-headline-md text-headline-md font-extrabold text-on-surface">$12,500
                                            <span class="font-body-sm text-body-sm font-normal text-tertiary">/
                                                climber</span></span>
                                    </div>
                                    <button
                                        class="px-space-md py-space-xs rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase transition-all flex items-center gap-space-2xs shadow-sm">
                                        <span>Dossier</span>
                                        <x-lucide-chevron-right class="size-[16px]" />
                                    </button>
                                </div>
                            </div>
                        </article>
                        <!-- Card 6: Mount Everest 8,848.86m -->
                        <article
                            class="expedition-card group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col"
                            data-category="eight-thousander">
                            <div class="relative h-64 overflow-hidden bg-surface-container">
                                <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-700"
                                    data-alt="Mount Everest Sagarmatha summit ridge and Hillary Step with climbers moving along South Col route under deep blue sky with Himalayan weather plume streaming"
                                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCb745BVDJk5JTv5tpBK1biZfWOpsMjl5n5BBBap4KJlMoVCSXKb05GZM6kVMyNndZ_mVQewrJQBoUbCzDpx-QzwmCNQgkgPPhHfOdrJB759Vmi-0aFFQRFtJpNyiTgbZNj5o_aWr1lY1G2bphln9vBbtdnhxbTRnSbBweH2vhh6riBAU_YoOSRXHVWTylAaY20sDNROTKhIG0r7r2CLW5UBDm3mEwqzjW_1DXP8BxPj7Xd2Rn4KK2O')">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep/80 via-transparent to-transparent">
                                </div>
                                <div class="absolute top-space-md left-space-md flex flex-wrap gap-space-xs">
                                    <span
                                        class="bg-amber-flare text-on-primary-fixed font-badge-caption text-badge-caption px-space-xs py-space-2xs rounded uppercase font-bold tracking-wider">The
                                        Apex</span>
                                    <span
                                        class="bg-ridge-deep text-summit-white font-badge-caption text-badge-caption px-space-xs py-space-2xs rounded uppercase font-bold">8,848.86
                                        M</span>
                                </div>
                                <div
                                    class="absolute bottom-space-md left-space-md right-space-md flex justify-between items-end text-summit-white">
                                    <div>
                                        <span
                                            class="font-label-sm text-label-sm text-amber-flare uppercase tracking-wider block">South
                                            Col Route • Nepal</span>
                                        <h3 class="font-headline-sm text-headline-sm font-bold leading-snug">Mount
                                            Everest (Sagarmatha)</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="p-space-lg flex-1 flex flex-col justify-between space-y-space-md">
                                <p class="font-body-md text-body-md text-tertiary">
                                    The pinnacle of human endurance. Neepa Adventure’s signature VIP Everest Expedition
                                    offers an unmatched safety protocol, private geodesic base dome, 2:1 summit Sherpa
                                    option, and 8 O2 cylinders.
                                </p>
                                <div
                                    class="bg-surface-container-low rounded-lg p-space-sm grid grid-cols-3 gap-space-xs text-center">
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Duration
                                        </div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">55 Days
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Oxygen</div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">8
                                            Cylinders</div>
                                    </div>
                                    <div>
                                        <div class="font-label-sm text-label-sm uppercase text-secondary">Sherpa</div>
                                        <div class="font-headline-sm text-label-md font-bold text-on-surface">1:1 or
                                            2:1</div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pt-space-xs">
                                    <div>
                                        <span class="font-label-sm text-label-sm text-secondary uppercase block">Custom
                                            VIP Logistics</span>
                                        <span
                                            class="font-headline-md text-headline-md font-extrabold text-on-surface">$48,000
                                            <span class="font-body-sm text-body-sm font-normal text-tertiary">/
                                                climber</span></span>
                                    </div>
                                    <button
                                        class="px-space-md py-space-xs rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase transition-all flex items-center gap-space-2xs shadow-sm">
                                        <span>Dossier</span>
                                        <x-lucide-chevron-right class="size-[16px]" />
                                    </button>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
            <!-- Technical Summit Readiness & Safety Standards Section -->
            <section class="w-full bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop">
                <div class="max-w-max-content-width mx-auto space-y-space-2xl">
                    <div class="text-center max-w-3xl mx-auto space-y-space-xs">
                        <span
                            class="font-badge-caption text-badge-caption uppercase text-primary font-bold tracking-widest">Alpine
                            Protocols &amp; Life Support</span>
                        <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface uppercase">Technical
                            Summit Readiness Standards</h2>
                        <p class="font-body-md text-body-md text-tertiary">Every Neepa Adventure expedition is
                            engineered
                            around the Swiss Alpine safety doctrine adapted to the extreme demands of the Nepalese
                            Himalaya.</p>
                    </div>
                    <!-- Bento Grid of Safety & Infrastructure Pillars -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-lg">
                        <!-- Feature 1 -->
                        <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm space-y-space-md">
                            <div
                                class="w-12 h-12 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary">
                                <x-lucide-cpu class="size-[32px]" />
                            </div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface uppercase">
                                Fixed-Rope &amp; Rigging Protocols</h3>
                            <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                All technical headwalls and crevasse zones utilize certified 10.5mm static ropes
                                anchored with rated snow pickets and titanium ice screws. Strict double-carabiner
                                tethering required on all exposed pitches.
                            </p>
                            <div
                                class="pt-space-xs font-label-sm text-label-sm font-semibold text-secondary flex items-center gap-space-2xs">
                                <x-lucide-shield-check class="text-primary size-[18px]" />
                                UIAA &amp; CE Certified Alpine Hardware
                            </div>
                        </div>
                        <!-- Feature 2 -->
                        <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm space-y-space-md">
                            <div
                                class="w-12 h-12 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary">
                                <x-lucide-wind class="size-[32px]" />
                            </div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface uppercase">TopOut
                                High-Flow Oxygen Systems</h3>
                            <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                Above 7,000m, we deploy advanced British TopOut mask assemblies paired with
                                ultra-lightweight carbon fiber composite oxygen cylinders, maintaining optimal flow
                                rates (up to 4L/min) with zero freezing valves.
                            </p>
                            <div
                                class="pt-space-xs font-label-sm text-label-sm font-semibold text-secondary flex items-center gap-space-2xs">
                                <x-lucide-shield-check class="text-primary size-[18px]" />
                                Backup Regulator &amp; Mask at Camp 3 &amp; 4
                            </div>
                        </div>
                        <!-- Feature 3 -->
                        <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm space-y-space-md">
                            <div
                                class="w-12 h-12 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary">
                                <x-lucide-shield-check class="size-[32px]" />
                            </div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface uppercase">1:1
                                Sherpa Sirdar Pairing</h3>
                            <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                Your dedicated summit day guide is an IFMGA/NNMGA certified or multi-time 8,000m
                                summiteer. No sharing guides on summit push; you climb alongside an experienced brother
                                of the mountain who holds decisive authority.
                            </p>
                            <div
                                class="pt-space-xs font-label-sm text-label-sm font-semibold text-secondary flex items-center gap-space-2xs">
                                <x-lucide-shield-check class="text-primary size-[18px]" />
                                Fair Pay &amp; Full Rescue Insurance Included
                            </div>
                        </div>
                        <!-- Feature 4 -->
                        <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm space-y-space-md">
                            <div
                                class="w-12 h-12 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary">
                                <x-lucide-house class="size-[32px]" />
                            </div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface uppercase">Base Camp
                                Geodesic Luxury</h3>
                            <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                Rest is alpine medicine. Our base camps feature double-insulated, heated geodesic dome
                                dining structures, individual standing sleeping tents with cots, solar micro-grids,
                                barista espresso machines, and Starlink satellite Wi-Fi.
                            </p>
                            <div
                                class="pt-space-xs font-label-sm text-label-sm font-semibold text-secondary flex items-center gap-space-2xs">
                                <x-lucide-shield-check class="text-primary size-[18px]" />
                                Fresh Chef-Prepared High Calorie Menus
                            </div>
                        </div>
                        <!-- Feature 5 -->
                        <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm space-y-space-md">
                            <div
                                class="w-12 h-12 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary">
                                <x-lucide-satellite class="size-[32px]" />
                            </div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface uppercase">Garmin
                                InReach &amp; Heli-Rescue</h3>
                            <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                Real-time satellite GPS tracking with our Kathmandu Command Center. We hold
                                pre-authorized direct dispatch agreements with Nepal's premier high-altitude helicopter
                                rescue operators (up to 7,000m with long-line capability).
                            </p>
                            <div
                                class="pt-space-xs font-label-sm text-label-sm font-semibold text-secondary flex items-center gap-space-2xs">
                                <x-lucide-shield-check class="text-primary size-[18px]" />
                                Continuous Pulse Oximetry &amp; Gamow Bags
                            </div>
                        </div>
                        <!-- Feature 6 -->
                        <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm space-y-space-md">
                            <div
                                class="w-12 h-12 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary">
                                <x-lucide-shield-check class="size-[32px]" />
                            </div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface uppercase">Legal
                                Permits &amp; TIMS Compliance</h3>
                            <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                All Nepal Mountaineering Association (NMA) and Ministry of Culture, Tourism &amp; Civil
                                Aviation royalties, garbage deposit bonds, local community entry levies, and liaison
                                officer paperwork managed seamlessly.
                            </p>
                            <div
                                class="pt-space-xs font-label-sm text-label-sm font-semibold text-secondary flex items-center gap-space-2xs">
                                <x-lucide-shield-check class="text-primary size-[18px]" />
                                Zero Administrative Delays Guaranteed
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Visual Data Breakdown: Permits, Fees & Regulatory Matrix -->
            <section class="w-full bg-surface-container-lowest py-space-2xl px-gutter-mobile lg:px-gutter-desktop">
                <div class="max-w-max-content-width mx-auto">
                    <div
                        class="bg-ridge-deep text-summit-white rounded-2xl p-space-xl lg:p-space-2xl shadow-xl overflow-hidden relative">
                        <div class="relative z-10 flex flex-col lg:flex-row gap-space-2xl items-start justify-between">
                            <div class="max-w-xl space-y-space-md">
                                <span
                                    class="font-badge-caption text-badge-caption uppercase text-amber-flare tracking-widest font-bold">Government
                                    of Nepal Regulatory Framework</span>
                                <h2 class="font-headline-lg text-headline-lg font-bold uppercase leading-tight">
                                    Climbing Royalty &amp; Permit Inclusions</h2>
                                <p class="font-body-md text-body-md text-mist-slate">
                                    Climbing in Nepal requires strict governmental sanction. Neepa Adventure manages all
                                    official deposits, environmental bonds, and liaison officer accommodations on behalf
                                    of every climber.
                                </p>
                                <div class="space-y-space-sm pt-space-xs">
                                    <div
                                        class="flex items-center gap-space-sm font-body-sm text-body-sm text-tertiary-fixed-dim">
                                        <x-lucide-circle-check class="text-amber-flare size-[20px]" />
                                        <span>NMA Trekking Peaks (Island, Mera, Lobuche): Included in listed expedition
                                            price.</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-space-sm font-body-sm text-body-sm text-tertiary-fixed-dim">
                                        <x-lucide-circle-check class="text-amber-flare size-[20px]" />
                                        <span>Sagarmatha / Annapurna / Manaslu National Park Conservation Entry &amp;
                                            TIMS.</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-space-sm font-body-sm text-body-sm text-tertiary-fixed-dim">
                                        <x-lucide-circle-check class="text-amber-flare size-[20px]" />
                                        <span>SPCC Khumbu Icefall Route Fixing Royalty Fee &amp; environmental cleanup
                                            deposits.</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Permitting Breakdown Table Card -->
                            <div
                                class="w-full lg:w-1/2 bg-surface-container-highest/10 backdrop-blur-md rounded-xl p-space-lg">
                                <div
                                    class="font-label-md text-label-md uppercase font-bold text-amber-flare mb-space-md flex items-center justify-between">
                                    <span>Peak Category</span>
                                    <span>Govt Royalty (Spring / Autumn)</span>
                                </div>
                                <div class="space-y-space-sm text-body-sm">
                                    <div
                                        class="flex justify-between items-center py-space-xs bg-surface-container-highest/5 px-space-sm rounded">
                                        <div>
                                            <div class="font-semibold text-summit-white">Group 'A' &amp; 'B' Trekking
                                                Peaks</div>
                                            <div class="text-tertiary-fixed-dim text-[11px]">Island, Mera, Lobuche East
                                                (6,000m - 6,500m)</div>
                                        </div>
                                        <div class="font-mono text-amber-flare font-bold text-right">$250 / $125 <span
                                                class="text-[10px] text-mist-slate block">NMA Direct</span></div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center py-space-xs bg-surface-container-highest/5 px-space-sm rounded">
                                        <div>
                                            <div class="font-semibold text-summit-white">Ama Dablam (6,812m)</div>
                                            <div class="text-tertiary-fixed-dim text-[11px]">Expedition Peak Royalty
                                                (Govt of Nepal)</div>
                                        </div>
                                        <div class="font-mono text-amber-flare font-bold text-right">$400 / $400 <span
                                                class="text-[10px] text-mist-slate block">MoCTCA</span></div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center py-space-xs bg-surface-container-highest/5 px-space-sm rounded">
                                        <div>
                                            <div class="font-semibold text-summit-white">Manaslu (8,163m)</div>
                                            <div class="text-tertiary-fixed-dim text-[11px]">Autumn Season Special
                                                8,000m Permit</div>
                                        </div>
                                        <div class="font-mono text-amber-flare font-bold text-right">$900 / $1,800
                                            <span class="text-[10px] text-mist-slate block">MoCTCA + LO</span>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center py-space-xs bg-surface-container-highest/5 px-space-sm rounded">
                                        <div>
                                            <div class="font-semibold text-summit-white">Mount Everest (8,848.86m)
                                            </div>
                                            <div class="text-tertiary-fixed-dim text-[11px]">South Col Normal Route
                                                Spring Season</div>
                                        </div>
                                        <div class="font-mono text-amber-flare font-bold text-right">$11,000 <span
                                                class="text-[10px] text-mist-slate block">Ministry Royalty</span></div>
                                    </div>
                                </div>
                                <div
                                    class="mt-space-md p-space-sm bg-primary-container/20 rounded-lg text-[12px] text-mist-slate flex items-center gap-space-xs">
                                    <x-lucide-info class="text-amber-flare size-[18px]" />
                                    <span>All royalties and waste management clearance bonds are integrated into your
                                        turnkey expedition dossier.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Pre-Expedition Training & Preparation Guide -->
            <section class="w-full bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop">
                <div class="max-w-max-content-width mx-auto">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
                        <div class="lg:col-span-5 space-y-space-md">
                            <span
                                class="font-badge-caption text-badge-caption uppercase text-primary font-bold tracking-widest">Physical
                                &amp; Alpine Conditioning</span>
                            <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface uppercase">
                                Pre-Summit Training &amp; High Camp Drills</h2>
                            <p class="font-body-md text-body-md text-tertiary">
                                High altitude demands exceptional aerobic conditioning, core stability, and subconscious
                                familiarity with cold-weather mountaineering hardware.
                            </p>
                            <div class="space-y-space-md pt-space-xs">
                                <div class="flex gap-space-md items-start">
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary-container text-on-primary-fixed flex items-center justify-center font-bold text-label-md flex-shrink-0">
                                        1</div>
                                    <div>
                                        <h4 class="font-headline-sm text-label-md font-bold text-on-surface">Zone 2
                                            Aerobic Base (16-24 Weeks Prior)</h4>
                                        <p class="font-body-sm text-body-sm text-tertiary">Long rucking with a 15-20kg
                                            weighted pack, stairmaster sessions, and multi-hour hill traverses to build
                                            metabolic mitochondrial density.</p>
                                    </div>
                                </div>
                                <div class="flex gap-space-md items-start">
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary-container text-on-primary-fixed flex items-center justify-center font-bold text-label-md flex-shrink-0">
                                        2</div>
                                    <div>
                                        <h4 class="font-headline-sm text-label-md font-bold text-on-surface">Base Camp
                                            High-Angle Clinic</h4>
                                        <p class="font-body-sm text-body-sm text-tertiary">Every expedition includes a
                                            mandatory half-day skills refresher at basecamp covering ascender (jumar)
                                            usage on vertical lines, figure-8 rappel, and ice ax arrest.</p>
                                    </div>
                                </div>
                                <div class="flex gap-space-md items-start">
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary-container text-on-primary-fixed flex items-center justify-center font-bold text-label-md flex-shrink-0">
                                        3</div>
                                    <div>
                                        <h4 class="font-headline-sm text-label-md font-bold text-on-surface">Controlled
                                            Rotations &amp; Acclimatization</h4>
                                        <p class="font-body-sm text-body-sm text-tertiary">We strictly adhere to the
                                            "climb high, sleep low" doctrine with scheduled rest days at intermediate
                                            elevations before initiating the final summit assault.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                            <div class="space-y-space-md">
                                <div class="rounded-xl overflow-hidden h-72 shadow-sm bg-surface-container">
                                    <div class="w-full h-full bg-cover bg-center"
                                        data-alt="Experienced Sherpa mountaineering instructor showing climber how to connect mechanical jumar ascender to fixed blue static rope at Island Peak High Camp against towering ice wall"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBIvvBz9yjDgDfH5LwlOgnyhHcGxZY7TZoKAzxdnRKB4yd0cBMm0H68K_wn5f5IC6KFhvJ_g8My34GWQpTrqMxNEbXJW--FVWpo1T9HJdUPp-XNovCrkgnNUbHOqCUy6w_vY6O54FJf-zyQrVmt6bDhKWaRchvzR1QG5kAPYdlFn3v14F7uygstP9m-FGF8CvUP7gDvjikY2-8w2IHFEBvNErgfbHGirXJgExdzSppEn1n0cG6MUJDl')">
                                    </div>
                                </div>
                                <div class="p-space-lg bg-surface-container-lowest rounded-xl shadow-sm">
                                    <div
                                        class="font-label-md text-label-md font-bold text-on-surface uppercase mb-space-2xs">
                                        Required Alpine Kit</div>
                                    <p class="font-body-sm text-body-sm text-tertiary">Double 6000m mountaineering
                                        boots, C2/C3 hybrid crampons, alpine climbing harness, 2 locking screwgate
                                        carabiners, prusik loops, and 800+ fill down suit.</p>
                                </div>
                            </div>
                            <div class="space-y-space-md sm:pt-space-xl">
                                <div class="p-space-lg bg-primary text-on-primary rounded-xl shadow-sm">
                                    <x-lucide-dumbbell class="size-[32px] text-primary-container mb-space-xs" />
                                    <div class="font-headline-sm text-headline-sm font-bold uppercase mb-space-2xs">
                                        Personalized Training Dossier</div>
                                    <p class="font-body-sm text-body-sm opacity-90">Upon reservation, each climber
                                        receives a customized 16-week endurance and pulmonary capacity blueprint
                                        engineered by our sports science consultants.</p>
                                </div>
                                <div class="rounded-xl overflow-hidden h-72 shadow-sm bg-surface-container">
                                    <div class="w-full h-full bg-cover bg-center"
                                        data-alt="Trekker performing weighted pack training on rugged mountain trail in the morning sunrise preparing for high altitude expedition"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD5PmdkgYbfxH5f9cE_1xDb29VptGUwtNltcwAxhuUe0HCtmVNktD2tk3t_J-H_0FCs9MfE2VQwb2Q2pmgRwfbmv9n9qoioG2sW2b0-9DnWVk7xlGAtGeYYLvNOu34aDrUtnc2la1SO0-5ExZzpTrxVwEs3ZQSR_qQwoUIpeM8l5KvZV6d1dJF9sq-2SI5keuSCf6X5I6CfbvqhrU2A9EEM2IK0g5djGUrCguqmiRohP1QCQU84gOWR')">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Talk With Our Expedition Director CTA Section -->
            <section class="w-full bg-surface py-space-3xl px-gutter-mobile lg:px-gutter-desktop"
                id="director-consult">
                <div class="max-w-max-content-width mx-auto">
                    <div class="bg-surface-container-lowest rounded-2xl shadow-xl overflow-hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-12">
                            <div
                                class="lg:col-span-7 p-space-xl lg:p-space-2xl flex flex-col justify-between space-y-space-xl">
                                <div class="space-y-space-sm">
                                    <div
                                        class="inline-flex items-center gap-space-xs bg-primary-container/20 text-on-surface font-badge-caption text-badge-caption px-space-sm py-space-2xs rounded-full uppercase font-bold">
                                        <x-lucide-headphones class="size-[16px] text-primary" />
                                        <span>Direct High-Altitude Advisory</span>
                                    </div>
                                    <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface uppercase">
                                        Speak with an Expedition Director</h2>
                                    <p class="font-body-md text-body-md text-tertiary">
                                        Whether assessing your technical readiness for Ama Dablam, planning a private
                                        Island Peak team, or securing Manaslu autumn slots, speak directly with our
                                        senior mountain operations staff in Kathmandu.
                                    </p>
                                </div>
                                <!-- Direct Contact Grid -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                                    <div class="bg-surface-container-low p-space-md rounded-xl space-y-space-2xs">
                                        <div
                                            class="flex items-center gap-space-2xs text-primary font-label-md text-label-md font-bold uppercase">
                                            <x-lucide-phone class="size-[20px]" />
                                            Direct Operations Desk
                                        </div>
                                        <div class="font-headline-sm text-headline-sm font-bold text-on-surface">
                                            {{ $contact?->phone ?? 'Contact us' }}</div>
                                        <div class="font-body-sm text-body-sm text-secondary">Thamel HQ, 09:00 - 19:00
                                            NPT</div>
                                    </div>
                                    <div class="bg-surface-container-low p-space-md rounded-xl space-y-space-2xs">
                                        <div
                                            class="flex items-center gap-space-2xs text-primary font-label-md text-label-md font-bold uppercase">
                                            <x-lucide-mail class="size-[20px]" />
                                            Summit Inquiries
                                        </div>
                                        <div class="font-label-md text-label-md font-bold text-on-surface truncate">
                                            {{ $contact?->email ?? 'Email us' }}</div>
                                        <div class="font-body-sm text-body-sm text-secondary">Dossier response within 4
                                            hours</div>
                                    </div>
                                </div>
                                <!-- Quick Inquiry Mini Form -->
                                <form class="space-y-space-sm pt-space-xs"
                                    onsubmit="event.preventDefault(); alert('Your consultation request has been dispatched to Senior Sirdar Pemba Sherpa.');">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
                                        <div>
                                            <label
                                                class="block font-label-sm text-label-sm text-on-surface uppercase mb-space-2xs font-semibold">Your
                                                Name</label>
                                            <input
                                                class="w-full px-space-md py-space-sm rounded-lg bg-surface-container-low text-on-surface placeholder:text-tertiary focus:outline-none focus:ring-2 focus:ring-primary-container font-body-md text-body-md"
                                                placeholder="e.g., Alex Vance" required="" type="text" />
                                        </div>
                                        <div>
                                            <label
                                                class="block font-label-sm text-label-sm text-on-surface uppercase mb-space-2xs font-semibold">Target
                                                Peak</label>
                                            <select
                                                class="w-full px-space-md py-space-sm rounded-lg bg-surface-container-low text-on-surface focus:outline-none focus:ring-2 focus:ring-primary-container font-body-md text-body-md">
                                                <option>Island Peak (6,189m)</option>
                                                <option>Mera Peak (6,476m)</option>
                                                <option>Lobuche East (6,119m)</option>
                                                <option>Ama Dablam (6,812m)</option>
                                                <option>Manaslu (8,163m)</option>
                                                <option>Mount Everest (8,848m)</option>
                                                <option>Custom Private Expedition</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row gap-space-sm pt-space-2xs">
                                        <input
                                            class="flex-1 px-space-md py-space-sm rounded-lg bg-surface-container-low text-on-surface placeholder:text-tertiary focus:outline-none focus:ring-2 focus:ring-primary-container font-body-md text-body-md"
                                            placeholder="your.email@expedition.org" required="" type="email" />
                                        <button
                                            class="px-space-xl py-space-sm rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase transition-all shadow-md flex items-center justify-center gap-space-2xs whitespace-nowrap"
                                            type="submit">
                                            <span>Schedule Consultation</span>
                                            <x-lucide-send class="size-[18px]" />
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- Director Feature Image Panel -->
                            <div
                                class="lg:col-span-5 bg-ridge-deep text-summit-white relative flex flex-col justify-end p-space-xl overflow-hidden min-h-[380px]">
                                <div class="absolute inset-0 bg-cover bg-center mix-blend-luminosity opacity-40"
                                    data-alt="Portrait of seasoned high-altitude Sherpa expedition leader standing proudly at basecamp with prayer flags fluttering in snowstorm and towering icy mountain in background"
                                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBvHCxJ2qqfofEmJ-nlghTXbu-5-Q2-QxAAxW8iuwQdP_SU1KBndVnrubBVav02WFvrYrtsfgIiNyokQSjAQkUjgsCpWiWnmX4M1UriALS7-DzXuwyDRr9floHWig2Ljiw_qHkXa0xxvRaUFpyGy0XyE4gzP96aK5Rq9fUxXRvMcqOnX2p4DYQ8us-i1Z59rQEwO32Td5xvyAlle6pAeR2zENoZ_i-sS65dD8afFGEu1J77ch78S-dj')">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-ridge-deep via-ridge-deep/60 to-transparent">
                                </div>
                                <div class="relative z-10 space-y-space-xs">
                                    <div class="flex items-center gap-space-2xs text-amber-flare">
                                        <x-lucide-shield class="size-[20px]" />
                                        <span
                                            class="font-badge-caption text-badge-caption uppercase font-bold tracking-wider">Lead
                                            Field Sirdar</span>
                                    </div>
                                    <div class="font-headline-md text-headline-md font-bold text-summit-white">Dawa
                                        Tenzing Sherpa</div>
                                    <p class="font-body-sm text-body-sm text-mist-slate">14x Everest Summits • 8x
                                        Manaslu • UIAGM/IFMGA Licensed Mountain Guide</p>
                                    <blockquote
                                        class="italic font-body-sm text-body-sm text-tertiary-fixed-dim pt-space-2xs">
                                        "In the death zone, courage is useless without judgment. We climb as family,
                                        honor the mountain, and return together."
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
