<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-48">
        <div class="flex w-full flex-col">
            <!-- Immersive Editorial Hero -->
            <section class="bg-ridge-deep text-summit-white py-space-3xl lg:py-space-4xl px-gutter-mobile lg:px-gutter-desktop relative w-full overflow-hidden">
                <!-- Atmospheric Ambient Shapes -->
                <div class="bg-primary/10 pointer-events-none absolute -top-32 -right-32 h-96 w-96 rounded-full blur-3xl"></div>
                <div class="bg-secondary-fixed/5 pointer-events-none absolute bottom-0 left-1/4 h-80 w-80 rounded-full blur-3xl"></div>
                <div class="max-w-max-content-width relative z-10 mx-auto">
                    <!-- Eyebrow Tag -->
                    <div class="gap-space-xs px-space-md py-space-2xs bg-summit-white/10 mb-space-lg inline-flex items-center rounded-full shadow-sm backdrop-blur-md">
                        <span class="bg-primary-container h-2 w-2 animate-pulse rounded-full"></span>
                        <span class="font-badge-caption text-badge-caption text-primary-container tracking-[0.14em] uppercase">Responsible Himalayan Stewardship • 5% Profit Pledge</span>
                    </div>
                    <div class="gap-space-xl grid grid-cols-1 items-start lg:grid-cols-12">
                        <div class="space-y-space-md lg:col-span-8">
                            <h1 class="font-display-xl text-headline-lg lg:text-display-xl text-summit-white leading-[1.08] font-extrabold tracking-tight uppercase">
                                Giving Back to the <span class="text-primary-container">Roofs of the World:</span>
                                Community &amp; Conservation
                            </h1>
                            <p class="font-body-lg text-body-lg text-mist-slate/90 max-w-2xl leading-relaxed">
                                Every trek and pass trek directly fuels local Sherpa education, solar winter clinics,
                                high-altitude glacier cleanup, and zero-emissions waste management across the Khumbu,
                                Rolwaling, and Manaslu valleys.
                            </p>
                            <div class="gap-space-sm pt-space-sm flex flex-wrap">
                                <a
                                    class="gap-space-xs px-space-lg py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md inline-flex items-center rounded-lg font-bold tracking-wider uppercase shadow-md transition-all hover:-translate-y-0.5"
                                    href="#flagship-project"
                                >
                                    <span>View Flagship Project</span>
                                    <x-lucide-arrow-down class="size-[18px]" />
                                </a>
                                <a
                                    class="gap-space-xs px-space-lg py-space-sm bg-summit-white/10 hover:bg-summit-white/20 text-summit-white font-label-md text-label-md inline-flex items-center rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                    href="#transparency-ledger"
                                >
                                    <x-lucide-wallet class="size-[18px]" />
                                    <span>Open Transparency Ledger</span>
                                </a>
                            </div>
                        </div>
                        <div class="gap-space-md bg-summit-white/5 p-space-lg flex flex-col rounded-xl shadow-xl backdrop-blur-md lg:col-span-4">
                            <div class="pb-space-xs flex items-center justify-between">
                                <span class="font-label-sm text-label-sm text-mist-slate font-semibold tracking-wider uppercase">Independent Audit 2024–2025</span>
                                <span class="gap-space-2xs text-primary-container text-body-sm inline-flex items-center font-semibold">
                                    <x-lucide-shield-check class="size-[16px]" />Verified
                                </span>
                            </div>
                            <div class="text-body-sm text-mist-slate/80 leading-relaxed">
                                All initiatives run on zero administrative deductions from traveler donations. 100% of
                                earmarked donor funding reaches field projects in high alpine zones.
                            </div>
                            <div class="pt-space-2xs">
                                <div class="text-body-sm mb-space-2xs flex justify-between">
                                    <span class="text-mist-slate font-medium">Fiscal Year Goal ($150,000)</span>
                                    <span class="text-primary-container font-bold">85.6%</span>
                                </div>
                                <div class="bg-summit-white/10 h-2.5 w-full overflow-hidden rounded-full">
                                    <div class="bg-primary-container h-full w-[85.6%] rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Quick Impact Metrics Banner -->
                    <div class="mt-space-2xl gap-space-md grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="bg-summit-white/10 p-space-lg flex flex-col justify-between rounded-xl shadow-sm backdrop-blur-md">
                            <div class="mb-space-xs flex items-center justify-between">
                                <x-lucide-wallet-cards class="text-primary-container size-[28px]" />
                                <span class="font-badge-caption text-badge-caption text-mist-slate tracking-wider uppercase">2018 - Present</span>
                            </div>
                            <div>
                                <div class="font-display-xl text-headline-lg text-summit-white font-extrabold tracking-tight">
                                    $128,400+
                                </div>
                                <div class="font-body-sm text-body-sm text-mist-slate/90 mt-space-2xs">
                                    Reinvested directly into Himalayan communities
                                </div>
                            </div>
                        </div>
                        <div class="bg-summit-white/10 p-space-lg flex flex-col justify-between rounded-xl shadow-sm backdrop-blur-md">
                            <div class="mb-space-xs flex items-center justify-between">
                                <x-lucide-school class="text-primary-container size-[28px]" />
                                <span class="font-badge-caption text-badge-caption text-mist-slate tracking-wider uppercase">Khumbu Valley</span>
                            </div>
                            <div>
                                <div class="font-display-xl text-headline-lg text-summit-white font-extrabold tracking-tight">
                                    42 Youths
                                </div>
                                <div class="font-body-sm text-body-sm text-mist-slate/90 mt-space-2xs">
                                    Full boarding &amp; academic alpine scholarships
                                </div>
                            </div>
                        </div>
                        <div class="bg-summit-white/10 p-space-lg flex flex-col justify-between rounded-xl shadow-sm backdrop-blur-md">
                            <div class="mb-space-xs flex items-center justify-between">
                                <x-lucide-trash-2 class="text-primary-container size-[28px]" />
                                <span class="font-badge-caption text-badge-caption text-mist-slate tracking-wider uppercase">Cho La &amp; EBC</span>
                            </div>
                            <div>
                                <div class="font-display-xl text-headline-lg text-summit-white font-extrabold tracking-tight">
                                    14.8 Tons
                                </div>
                                <div class="font-body-sm text-body-sm text-mist-slate/90 mt-space-2xs">
                                    High-pass glacier trash safely evacuated
                                </div>
                            </div>
                        </div>
                        <div class="bg-summit-white/10 p-space-lg flex flex-col justify-between rounded-xl shadow-sm backdrop-blur-md">
                            <div class="mb-space-xs flex items-center justify-between">
                                <x-lucide-sun-medium class="text-primary-container size-[28px]" />
                                <span class="font-badge-caption text-badge-caption text-mist-slate tracking-wider uppercase">Pheriche &amp; Beding</span>
                            </div>
                            <div>
                                <div class="font-display-xl text-headline-lg text-summit-white font-extrabold tracking-tight">
                                    6 Clinics
                                </div>
                                <div class="font-body-sm text-body-sm text-mist-slate/90 mt-space-2xs">
                                    Solar-heated high-altitude emergency aid posts
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Project Spotlight Section -->
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full" id="flagship-project">
                <div class="max-w-max-content-width mx-auto">
                    <div class="mb-space-xl gap-space-md flex flex-col justify-between md:flex-row md:items-end">
                        <div>
                            <div class="gap-space-2xs text-primary font-label-sm text-label-sm mb-space-2xs flex items-center font-bold tracking-widest uppercase">
                                <x-lucide-shield class="size-[18px]" />
                                <span>Flagship Educational Mission</span>
                            </div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight uppercase">
                                The Khumbu Himalayan Children's Initiative
                            </h2>
                        </div>
                        <div class="gap-space-xs bg-surface-container-high px-space-md py-space-xs text-on-surface font-label-sm text-label-sm flex items-center rounded-lg">
                            <x-lucide-map-pin class="text-primary size-[18px]" />
                            <span>Khumjung &amp; Phortse, Solukhumbu (3,780m &amp; 3,840m)</span>
                        </div>
                    </div>
                    <!-- Flagship Mosaic Card -->
                    <div class="bg-surface-container-lowest grid grid-cols-1 overflow-hidden rounded-xl shadow-xl lg:grid-cols-12">
                        <div class="relative min-h-[380px] lg:col-span-7 lg:min-h-full">
                            <img
                                class="h-full w-full object-cover"
                                data-alt="Young Sherpa school children in navy blue school uniforms smiling warmly outside the stone-walled Sir Edmund Hillary School in Khumjung, Nepal. In the sweeping crisp background, the sacred pass of Mount Ama Dablam rises dramatically into a cloudless cobalt Himalayan sky with colorful prayer flags fluttering."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcZ3Tr2Son_QBeDKEUgj-PmNxRQzuIDDvW_x11ZZUeAWMXJZOF43Ajp7lyv1FQKhXNwPmSRYnKLEvGpUnMvPWksh9BFd6VCpVwOm5cEcwgLZr-uqNIpca4q4rnGw2BQGu-eHFfUYNSiPpOUL2FMREWbCb_tFd2Dg3OQALhnOYA00rGjigQ1Q9k-6WyYgNgtKCT4v3n2wr3huoNfr4SpW-GePEjSMmqx6WpMySm15xT-KPr_CwEb6xg"
                            />
                            <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                                <span class="px-space-sm py-space-2xs bg-ridge-deep/90 text-summit-white font-badge-caption text-badge-caption rounded-lg tracking-wider uppercase backdrop-blur-md">
                                    Primary • Secondary Boarding
                                </span>
                                <span class="px-space-sm py-space-2xs bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption rounded-lg font-bold tracking-wider uppercase">
                                    100% Pass Rate 2024
                                </span>
                            </div>
                        </div>
                        <div class="p-space-xl space-y-space-lg bg-surface-container-lowest flex flex-col justify-between lg:col-span-5">
                            <div class="space-y-space-md">
                                <div class="gap-space-xs text-tertiary font-body-sm text-body-sm flex items-center">
                                    <x-lucide-users class="text-primary size-[16px]" />
                                    <span>Partnered with Sir Edmund Hillary Memorial School Khumjung</span>
                                </div>
                                <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                    When high-altitude trekking porters face severe illness or fatal incidents on trek
                                    routes, their children often lose access to schooling. Neepa Adventure guarantees
                                    comprehensive 10-year boarding stipends, warm alpine apparel, tuition, healthcare,
                                    and university entrance coaching.
                                </p>
                                <div class="gap-space-sm py-space-sm bg-surface-container-low p-space-md grid grid-cols-3 rounded-lg text-center">
                                    <div>
                                        <div class="font-headline-md text-headline-sm text-on-surface font-bold">
                                            42
                                        </div>
                                        <div class="font-body-sm text-body-sm text-tertiary">Active Scholars</div>
                                    </div>
                                    <div>
                                        <div class="font-headline-md text-headline-sm text-on-surface font-bold">
                                            18
                                        </div>
                                        <div class="font-body-sm text-body-sm text-tertiary">High Graduates</div>
                                    </div>
                                    <div>
                                        <div class="font-headline-md text-headline-sm text-primary font-bold">100%</div>
                                        <div class="font-body-sm text-body-sm text-tertiary">Tuition Funded</div>
                                    </div>
                                </div>
                                <div class="space-y-space-2xs">
                                    <div class="font-label-sm text-label-sm flex justify-between font-semibold">
                                        <span class="text-on-surface">2025 Winter Term Cohort Target</span>
                                        <span class="text-primary font-bold">42 / 50 Placed</span>
                                    </div>
                                    <div class="bg-surface-container-high h-2.5 w-full overflow-hidden rounded-full">
                                        <div class="bg-primary h-full w-[84%] rounded-full"></div>
                                    </div>
                                    <p class="font-body-sm text-body-sm text-tertiary pt-space-2xs">
                                        Only 8 sponsorships remaining to fully cover children from the Upper Dudh Koshi
                                        alpine corridor this winter.
                                    </p>
                                </div>
                            </div>
                            <div class="gap-space-sm pt-space-sm flex flex-wrap">
                                <button
                                    class="gap-space-2xs px-space-md py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md inline-flex flex-1 items-center justify-center rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                    onclick="openSponsorModal()"
                                >
                                    <x-lucide-hand-heart class="size-[18px]" />
                                    <span>Sponsor a Student ($45/mo)</span>
                                </button>
                                <a
                                    class="px-space-md py-space-sm bg-surface-container-high hover:bg-surface-container text-on-surface font-label-md text-label-md inline-flex items-center justify-center rounded-lg font-semibold transition-colors"
                                    href="#transparency-ledger"
                                >
                                    <span>View Audit Record</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Categorized Initiatives Portfolio -->
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface-container-low w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="mb-space-2xl space-y-space-xs mx-auto max-w-2xl text-center">
                        <span class="font-label-sm text-label-sm text-primary font-bold tracking-widest uppercase">Active Stewardship Field Deployments</span>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight uppercase">
                            Himalayan Project Directory
                        </h2>
                        <p class="font-body-md text-body-md text-tertiary">
                            Discover our active clean-glacier initiatives, winter medical conversions, and emergency
                            high-pass porter lifelines across Nepal.
                        </p>
                        <!-- Dynamic Filter Controls -->
                        <div
                            class="gap-space-xs pt-space-md flex flex-wrap items-center justify-center"
                            id="project-filters"
                        >
                            <button
                                class="filter-btn active px-space-md py-space-xs font-label-sm text-label-sm bg-ridge-deep text-summit-white rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                data-filter="all"
                            >
                                All Projects (6)
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs font-label-sm text-label-sm bg-surface-container-lowest text-tertiary hover:text-on-surface rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                data-filter="conservation"
                            >
                                Alpine Conservation
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs font-label-sm text-label-sm bg-surface-container-lowest text-tertiary hover:text-on-surface rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                data-filter="education"
                            >
                                Education &amp; Youth
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs font-label-sm text-label-sm bg-surface-container-lowest text-tertiary hover:text-on-surface rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                data-filter="health"
                            >
                                Solar Health Clinics
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs font-label-sm text-label-sm bg-surface-container-lowest text-tertiary hover:text-on-surface rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                data-filter="welfare"
                            >
                                Porter Welfare &amp; Shelters
                            </button>
                        </div>
                    </div>
                    <!-- Project Cards Grid -->
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3" id="projects-grid">
                        <!-- Project 1 -->
                        <div
                            class="project-item bg-surface-container-lowest flex flex-col overflow-hidden rounded-xl shadow-md transition-all hover:-translate-y-1"
                            data-category="conservation"
                        >
                            <div class="relative h-56 w-full">
                                <img
                                    class="h-full w-full object-cover"
                                    data-alt="Experienced Sherpa trekkers wearing yellow down suits safely hauling bundled recycled gear and decommissioned oxygen canisters on wooden sledges across the blue seracs of Khumbu Glacier near Everest Base Camp under bright morning alpine sunlight."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDiAGEahxSdJek9Y070WjXEC-4XB04kBt3nlH1fSZoiFrHG0SeB0xkfE14-Kg5tltXHepyCRCjpew51waoKq-ftMBlGs8tU3HUtTneu3m-9sWJa1b3UJTSeSL6lUOAeY8kAzBkZXPwlzG5wAkuIbo2_ncKtaTL0LhS-NNaNiTFRDJVeLzWI05rSFVQE2Z4C3bvvt9BtoNcdrS2fNGL5QnvoYmcO8rFCUdz2lDE_CAYMmhpiuLWWXJrn"
                                />
                                <span class="bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption px-space-sm py-space-2xs absolute top-3 left-3 rounded-md font-bold tracking-wider uppercase">
                                    Active Season 2025
                                </span>
                                <span class="bg-ridge-deep/80 text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs absolute right-3 bottom-3 rounded-md backdrop-blur-md">
                                    Cho La &amp; Sagarmatha (5,420m)
                                </span>
                            </div>
                            <div class="p-space-lg space-y-space-md flex flex-1 flex-col justify-between">
                                <div>
                                    <div class="text-tertiary font-label-sm text-label-sm mb-space-2xs font-semibold tracking-wider uppercase">
                                        High-Alpine Conservation
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface leading-snug font-bold tracking-tight">
                                        Sagarmatha Clean-Glacier &amp; Cho La Waste Extraction
                                    </h3>
                                    <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                        Removing discarded high-altitude oxygen bottles, shredded tents, and fixed ropes
                                        from fragile high camps above 5,300 meters before seasonal glacier melt.
                                    </p>
                                </div>
                                <div class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg space-y-space-xs">
                                    <div class="font-body-sm text-body-sm flex justify-between">
                                        <span class="text-tertiary">2025 Target Evacuation</span>
                                        <span class="text-on-surface font-bold">4.5 Tons Planned</span>
                                    </div>
                                    <div class="bg-surface-container-high h-1.5 w-full overflow-hidden rounded-full">
                                        <div class="bg-primary h-full w-3/5 rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project 2 -->
                        <div
                            class="project-item bg-surface-container-lowest flex flex-col overflow-hidden rounded-xl shadow-md transition-all hover:-translate-y-1"
                            data-category="health"
                        >
                            <div class="relative h-56 w-full">
                                <img
                                    class="h-full w-full object-cover"
                                    data-alt="Solar photovoltaic panels mounted on the weathered stone roof of a remote high-altitude stone clinic at Pheriche village in Nepal, surrounded by snowy Himalayan ridges with medical team inside treating local Sherpas with clean electric heat."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDsVy3f165iJzvyjJU1JxyUapbOrUtAUD3_55BWm525xfiPGaqkqXl86z5il6lxIQD3Qj6wvT45NFK6ojyk3v72yKoz7slSxvgWfjujurSXDw32SKLi7m5X-s283BQrkDiUytIvJTje635CU0gruKTSO-XdrGfV7xGy2LUvMRj0ggzeDObeGgFFKJ35wUJtM7MMw3VO5Y2BQiM6phwDZWHyyesU9ByQhPfsoP7b0G8twjMf8hFO6Z2a"
                                />
                                <span class="bg-surface-container-highest text-on-surface font-badge-caption text-badge-caption px-space-sm py-space-2xs absolute top-3 left-3 rounded-md font-bold tracking-wider uppercase">
                                    Completed Phase 2
                                </span>
                                <span class="bg-ridge-deep/80 text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs absolute right-3 bottom-3 rounded-md backdrop-blur-md">
                                    Pheriche &amp; Beding (4,240m)
                                </span>
                            </div>
                            <div class="p-space-lg space-y-space-md flex flex-1 flex-col justify-between">
                                <div>
                                    <div class="text-tertiary font-label-sm text-label-sm mb-space-2xs font-semibold tracking-wider uppercase">
                                        Solar Health Clinics
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface leading-snug font-bold tracking-tight">
                                        Winter Solar Thermal Retrofitting in Remote Teahouse Clinics
                                    </h3>
                                    <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                        Equipping remote high-altitude nursing posts with lithium-iron phosphate battery
                                        storage and solar wall collectors so oxygen concentrators operate continuously
                                        at sub-zero temperatures.
                                    </p>
                                </div>
                                <div class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg space-y-space-xs">
                                    <div class="font-body-sm text-body-sm flex justify-between">
                                        <span class="text-tertiary">Clean Power Reliability</span>
                                        <span class="text-primary font-bold">99.4% Uptime</span>
                                    </div>
                                    <div class="bg-surface-container-high h-1.5 w-full overflow-hidden rounded-full">
                                        <div class="bg-primary h-full w-full rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project 3 -->
                        <div
                            class="project-item bg-surface-container-lowest flex flex-col overflow-hidden rounded-xl shadow-md transition-all hover:-translate-y-1"
                            data-category="welfare"
                        >
                            <div class="relative h-56 w-full">
                                <img
                                    class="h-full w-full object-cover"
                                    data-alt="A sturdy stone and steel reinforced emergency mountain shelter perched beneath high snow-covered passes on the Larkya La pass in Manaslu, Nepal. Warm interior lights glow from the double-glazed windows where mountain porters rest comfortably."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMUK7JMHms9lTE8_cLhwxsKGeO0jTXshkh4EA1F_z0Jk7XyViUiM4hLFZXeLZb2b__liu1Prgd8sjNKzj5rA3XJM2I2sxFRZ6ZvcTWu6r4pntngFsN9gEwrZ8k2XSCS9ixj5k-YKKCKRyQe32pe6pUOCnCm1qqh8P02Jo62U_QD84VLeQZof81OAB4tLIlRONrDsJ_MRMtSo4wxRBV-cge4PpBUm5DK6DNRbomJUIua7XClk9yXARF"
                                />
                                <span class="bg-primary text-on-primary font-badge-caption text-badge-caption px-space-sm py-space-2xs absolute top-3 left-3 rounded-md font-bold tracking-wider uppercase">
                                    Under Construction
                                </span>
                                <span class="bg-ridge-deep/80 text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs absolute right-3 bottom-3 rounded-md backdrop-blur-md">
                                    Larkya La &amp; Cho La Approaches
                                </span>
                            </div>
                            <div class="p-space-lg space-y-space-md flex flex-1 flex-col justify-between">
                                <div>
                                    <div class="text-tertiary font-label-sm text-label-sm mb-space-2xs font-semibold tracking-wider uppercase">
                                        Porter Welfare &amp; Shelters
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface leading-snug font-bold tracking-tight">
                                        High-Altitude Porter Mountain Shelter Network
                                    </h3>
                                    <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                        Constructing windproof, insulated masonry refuges with clean mattresses, thermal
                                        blankets, and kerosene-free cooking facilities to protect mountain porters on
                                        exposed passes.
                                    </p>
                                </div>
                                <div class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg space-y-space-xs">
                                    <div class="font-body-sm text-body-sm flex justify-between">
                                        <span class="text-tertiary">Larkya Pass Refuges</span>
                                        <span class="text-on-surface font-bold">2 of 3 Shelters Completed</span>
                                    </div>
                                    <div class="bg-surface-container-high h-1.5 w-full overflow-hidden rounded-full">
                                        <div class="bg-primary h-full w-2/3 rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project 4 -->
                        <div
                            class="project-item bg-surface-container-lowest flex flex-col overflow-hidden rounded-xl shadow-md transition-all hover:-translate-y-1"
                            data-category="education"
                        >
                            <div class="relative h-56 w-full">
                                <img
                                    class="h-full w-full object-cover"
                                    data-alt="Young Sherpa men and women participating in rigorous wilderness first responder training on a grassy terrace in Namche Bazaar, practicing high-altitude hypothermia wrap and portable hyperbaric Gamow bag inflation with instructors."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAnL9l-H0YfeesYzXkqErSsdW_Va60OZOAQfieyI9Rp_O340YwB1LAc6nWz6j8cywQWouRXZ_nHF_zuouLSOgxkDlVbfo_xFzn5-JLbHbcQfSL0_TbK-DXlgOxAnT47gtEVKhOr1oR9yWfYEImHzJNcpH_OqWj2rYZMJEtkvUoMpJ7F60FZLdtzqi1-49Swk34zYeAEVDTXot5COnjC0gzbrIH2xlPtinHffLBifK4RvNNsrMLWE4m"
                                />
                                <span class="bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption px-space-sm py-space-2xs absolute top-3 left-3 rounded-md font-bold tracking-wider uppercase">
                                    Year-Round Program
                                </span>
                                <span class="bg-ridge-deep/80 text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs absolute right-3 bottom-3 rounded-md backdrop-blur-md">
                                    Namche &amp; Lukla Hub
                                </span>
                            </div>
                            <div class="p-space-lg space-y-space-md flex flex-1 flex-col justify-between">
                                <div>
                                    <div class="text-tertiary font-label-sm text-label-sm mb-space-2xs font-semibold tracking-wider uppercase">
                                        Education &amp; Youth
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface leading-snug font-bold tracking-tight">
                                        Indigenous Sherpa Wilderness First Responder (WFR) Certification
                                    </h3>
                                    <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                        Fully funding 80-hour international Wilderness Medical Associates certifications
                                        for young local guides and porters, dramatically increasing mountain safety and
                                        living wages.
                                    </p>
                                </div>
                                <div class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg space-y-space-xs">
                                    <div class="font-body-sm text-body-sm flex justify-between">
                                        <span class="text-tertiary">Sherpas Certified</span>
                                        <span class="text-on-surface font-bold">54 Guides in 2024</span>
                                    </div>
                                    <div class="bg-surface-container-high h-1.5 w-full overflow-hidden rounded-full">
                                        <div class="bg-primary h-full w-full rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project 5 -->
                        <div
                            class="project-item bg-surface-container-lowest flex flex-col overflow-hidden rounded-xl shadow-md transition-all hover:-translate-y-1"
                            data-category="conservation"
                        >
                            <div class="relative h-56 w-full">
                                <img
                                    class="h-full w-full object-cover"
                                    data-alt="A modern commercial kitchen inside an alpine stone Sherpa teahouse in Dingboche featuring bright stainless steel induction cooktops powered by rooftop solar battery banks, eliminating wood smoke with snowy Nuptse visible outside."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuASo7cCiURx7ov1b8xDmULKathZfkGk8jduldxi6WRE3nGLEcYXHGFO7TQt_7BENzzj5xOySQM4vEKl5NcetnV0cq9lko1GOgyA4dVYLBGUX9i81iSf924HXalt6gO9zezv5Yze99dKgz3_6kr-C-vbvMN8vkVMkSTE487lQg4MwRiYNd72DVUMKNRzeopSPwD9ljMWqPsvUAUebGytxm7cZwbuRFjl6G8CZvwcFSWMVMYfpyuuqjhS"
                                />
                                <span class="bg-secondary text-on-secondary font-badge-caption text-badge-caption px-space-sm py-space-2xs absolute top-3 left-3 rounded-md font-bold tracking-wider uppercase">
                                    Active Pilot
                                </span>
                                <span class="bg-ridge-deep/80 text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs absolute right-3 bottom-3 rounded-md backdrop-blur-md">
                                    Dingboche &amp; Pangboche (4,410m)
                                </span>
                            </div>
                            <div class="p-space-lg space-y-space-md flex flex-1 flex-col justify-between">
                                <div>
                                    <div class="text-tertiary font-label-sm text-label-sm mb-space-2xs font-semibold tracking-wider uppercase">
                                        Alpine Conservation
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface leading-snug font-bold tracking-tight">
                                        Lhakpa Rinjin Teahouse Solar Microgrid Trial
                                    </h3>
                                    <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                        Transitioning rural high-altitude teahouse dining rooms from fragile
                                        high-altitude juniper and imported kerosene stoves to zero-emission induction
                                        and thermal water systems.
                                    </p>
                                </div>
                                <div class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg space-y-space-xs">
                                    <div class="font-body-sm text-body-sm flex justify-between">
                                        <span class="text-tertiary">Juniper Deforestation Reduction</span>
                                        <span class="text-primary font-bold">-72% Biomass Burnt</span>
                                    </div>
                                    <div class="bg-surface-container-high h-1.5 w-full overflow-hidden rounded-full">
                                        <div class="bg-primary h-full w-[72%] rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project 6 -->
                        <div
                            class="project-item bg-surface-container-lowest flex flex-col overflow-hidden rounded-xl shadow-md transition-all hover:-translate-y-1"
                            data-category="conservation"
                        >
                            <div class="relative h-56 w-full">
                                <img
                                    class="h-full w-full object-cover"
                                    data-alt="An eco-friendly waste management bio-digester sorting facility on the outer hillside terraced slope above Namche Bazaar, featuring clean compost sorting bins, mountain workers handling recyclables, and towering Thamserku mountain backdrop."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcZ7pacaqrBEKy1Q3wLU56Nnaszw4Wb6h7PAkIqcC4v4Bq0v7drudpmnhn6X21ffBwjC5CVRbA5FUPD5Av42ZBnBxRO5OrRC7n3-8Rasbn1EfGTLcWEpjQskHo8KXD08rlC5AnA4jLYX46WrJHGv0linJln7rR3rRB3r_xHAVFf7I-p9vy6lCyktTeGnK1cXiKIf-2cD3SFjhLbngCKO9DcknyB-dhyjiZtBn4Z-ZvaU55Z-E_qtGO"
                                />
                                <span class="bg-surface-container-highest text-on-surface font-badge-caption text-badge-caption px-space-sm py-space-2xs absolute top-3 left-3 rounded-md font-bold tracking-wider uppercase">
                                    Completed Phase 1
                                </span>
                                <span class="bg-ridge-deep/80 text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs absolute right-3 bottom-3 rounded-md backdrop-blur-md">
                                    Namche Bazaar (3,440m)
                                </span>
                            </div>
                            <div class="p-space-lg space-y-space-md flex flex-1 flex-col justify-between">
                                <div>
                                    <div class="text-tertiary font-label-sm text-label-sm mb-space-2xs font-semibold tracking-wider uppercase">
                                        High-Alpine Conservation
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface leading-snug font-bold tracking-tight">
                                        Eco-Lodge Waste Sorting &amp; Bio-Digester Stations
                                    </h3>
                                    <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                        Closed-loop compost and bio-waste digestion processing that prevents untreated
                                        sewage runoff from contaminating pristine headwaters of the Bhote Koshi and Dudh
                                        Koshi rivers.
                                    </p>
                                </div>
                                <div class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg space-y-space-xs">
                                    <div class="font-body-sm text-body-sm flex justify-between">
                                        <span class="text-tertiary">Organic Waste Converted</span>
                                        <span class="text-on-surface font-bold">18,200 kg / year</span>
                                    </div>
                                    <div class="bg-surface-container-high h-1.5 w-full overflow-hidden rounded-full">
                                        <div class="bg-primary h-full w-full rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Financial Transparency & Public Ledger -->
            <section
                class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full"
                id="transparency-ledger"
            >
                <div class="max-w-max-content-width mx-auto">
                    <div class="gap-space-2xl grid grid-cols-1 items-center lg:grid-cols-12">
                        <!-- Text & Narrative -->
                        <div class="space-y-space-md lg:col-span-6">
                            <span class="font-label-sm text-label-sm text-primary font-bold tracking-widest uppercase">Uncompromising Openness</span>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight uppercase">
                                Financial Transparency &amp; Public Ledger
                            </h2>
                            <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                We operate with strict financial disclosures. Every commercial trek automatically
                                contributes 5% of net agency profits to the Neepa Adventure Foundation, pooled alongside
                                direct client philanthropy.
                            </p>
                            <div class="space-y-space-sm pt-space-xs">
                                <!-- 45% Direct Education -->
                                <div class="p-space-md bg-surface-container-low hover:bg-surface-container rounded-lg transition-all">
                                    <div class="mb-space-2xs flex items-center justify-between">
                                        <div class="gap-space-xs flex items-center">
                                            <span class="bg-primary h-3.5 w-3.5 rounded"></span>
                                            <span class="font-label-md text-label-md text-on-surface font-bold">Direct Sherpa Boarding &amp; Education</span>
                                        </div>
                                        <span class="font-headline-sm text-headline-sm text-primary font-extrabold">45%</span>
                                    </div>
                                    <p class="font-body-sm text-body-sm text-tertiary">
                                        Tuition, books, room, uniform, and nutrition for 42 students at Khumjung
                                        Memorial High School.
                                    </p>
                                </div>
                                <!-- 25% Environmental Trash -->
                                <div class="p-space-md bg-surface-container-low hover:bg-surface-container rounded-lg transition-all">
                                    <div class="mb-space-2xs flex items-center justify-between">
                                        <div class="gap-space-xs flex items-center">
                                            <span class="bg-secondary h-3.5 w-3.5 rounded"></span>
                                            <span class="font-label-md text-label-md text-on-surface font-bold">Environmental Trash &amp; Glacier Cleanup</span>
                                        </div>
                                        <span class="font-headline-sm text-headline-sm text-secondary font-extrabold">25%</span>
                                    </div>
                                    <p class="font-body-sm text-body-sm text-tertiary">
                                        Direct porter wages for waste retrieval treks, helicopter deadweight backhauls,
                                        and sorting stations.
                                    </p>
                                </div>
                                <!-- 20% Medical Clinics -->
                                <div class="p-space-md bg-surface-container-low hover:bg-surface-container rounded-lg transition-all">
                                    <div class="mb-space-2xs flex items-center justify-between">
                                        <div class="gap-space-xs flex items-center">
                                            <span class="bg-amber-flare h-3.5 w-3.5 rounded"></span>
                                            <span class="font-label-md text-label-md text-on-surface font-bold">Solar High-Altitude Clinics &amp; O2 Supply</span>
                                        </div>
                                        <span class="font-headline-sm text-headline-sm text-amber-flare font-extrabold">20%</span>
                                    </div>
                                    <p class="font-body-sm text-body-sm text-tertiary">
                                        Medical solar batteries, oxygen refills, altitude medicine kits, and Gamow bags
                                        in Pheriche and Beding.
                                    </p>
                                </div>
                                <!-- 10% Porter Safety Equipment -->
                                <div class="p-space-md bg-surface-container-low hover:bg-surface-container rounded-lg transition-all">
                                    <div class="mb-space-2xs flex items-center justify-between">
                                        <div class="gap-space-xs flex items-center">
                                            <span class="bg-tertiary h-3.5 w-3.5 rounded"></span>
                                            <span class="font-label-md text-label-md text-on-surface font-bold">Porter Winter Gear &amp; Life Insurance</span>
                                        </div>
                                        <span class="font-headline-sm text-headline-sm text-tertiary font-extrabold">10%</span>
                                    </div>
                                    <p class="font-body-sm text-body-sm text-tertiary">
                                        Providing alpine-grade crampons, UV eye protection, thermal sleeping bags, and
                                        medical evacuation rescue insurance.
                                    </p>
                                </div>
                            </div>
                            <div class="pt-space-sm gap-space-md flex flex-wrap items-center">
                                <a
                                    class="gap-space-xs px-space-lg py-space-sm bg-ridge-deep hover:bg-tertiary text-summit-white font-label-md text-label-md inline-flex items-center rounded-lg font-bold tracking-wider uppercase shadow-md transition-all"
                                    href="#"
                                >
                                    <x-lucide-download class="size-[18px]" />
                                    <span>Download 2024 Audited Financial Report (PDF)</span>
                                </a>
                                <span class="font-body-sm text-body-sm text-tertiary gap-space-2xs flex items-center">
                                    <x-lucide-shield-check class="text-primary size-[16px]" />
                                    Certified by Nepal Social Welfare Council
                                </span>
                            </div>
                        </div>
                        <!-- Inline Visual Chart & Stats Graphic -->
                        <div class="p-space-xl bg-surface-container-lowest flex flex-col items-center justify-center rounded-xl shadow-xl lg:col-span-6">
                            <div class="mb-space-md text-center">
                                <span class="font-label-sm text-label-sm text-tertiary font-bold tracking-wider uppercase">Annual Reinvestment Matrix</span>
                                <div class="font-headline-md text-headline-md text-on-surface mt-space-2xs font-bold">
                                    FY 2024 Total: $128,400
                                </div>
                            </div>
                            <!-- Clean Donut Visualization -->
                            <div class="relative flex h-64 w-64 items-center justify-center">
                                <svg class="h-full w-full -rotate-90 transform" viewbox="0 0 100 100">
                                    <!-- Background Circle -->
                                    <circle
                                        class="text-surface-container-high"
                                        cx="50"
                                        cy="50"
                                        fill="transparent"
                                        r="38"
                                        stroke="currentColor"
                                        stroke-width="12"
                                    ></circle>
                                    <!-- 45% Direct Education (Primary #795900) -->
                                    <circle
                                        class="text-primary"
                                        cx="50"
                                        cy="50"
                                        fill="transparent"
                                        r="38"
                                        stroke="currentColor"
                                        stroke-dasharray="107.44 238.76"
                                        stroke-dashoffset="0"
                                        stroke-width="12"
                                    ></circle>
                                    <!-- 25% Environmental Waste (Secondary #526070) -->
                                    <circle
                                        class="text-secondary"
                                        cx="50"
                                        cy="50"
                                        fill="transparent"
                                        r="38"
                                        stroke="currentColor"
                                        stroke-dasharray="59.69 238.76"
                                        stroke-dashoffset="-107.44"
                                        stroke-width="12"
                                    ></circle>
                                    <!-- 20% Medical Clinics (Amber Flare #D49806) -->
                                    <circle
                                        class="text-amber-flare"
                                        cx="50"
                                        cy="50"
                                        fill="transparent"
                                        r="38"
                                        stroke="currentColor"
                                        stroke-dasharray="47.75 238.76"
                                        stroke-dashoffset="-167.13"
                                        stroke-width="12"
                                    ></circle>
                                    <!-- 10% Porter Gear (Tertiary #4d6072) -->
                                    <circle
                                        class="text-tertiary"
                                        cx="50"
                                        cy="50"
                                        fill="transparent"
                                        r="38"
                                        stroke="currentColor"
                                        stroke-dasharray="23.88 238.76"
                                        stroke-dashoffset="-214.88"
                                        stroke-width="12"
                                    ></circle>
                                </svg>
                                <div class="absolute flex flex-col items-center justify-center text-center">
                                    <x-lucide-leaf class="text-primary size-[28px]" />
                                    <span class="font-headline-sm text-headline-sm text-on-surface font-extrabold">100%</span>
                                    <span class="font-badge-caption text-badge-caption text-tertiary tracking-wider uppercase">To Mountain Roots</span>
                                </div>
                            </div>
                            <div class="gap-space-sm mt-space-lg pt-space-md bg-surface-container-low p-space-md text-body-sm grid w-full grid-cols-2 rounded-lg">
                                <div class="gap-space-2xs flex items-center">
                                    <span class="bg-primary h-3 w-3 flex-shrink-0 rounded-full"></span>
                                    <span class="text-on-surface truncate">Education: <strong>$57,780</strong></span>
                                </div>
                                <div class="gap-space-2xs flex items-center">
                                    <span class="bg-secondary h-3 w-3 flex-shrink-0 rounded-full"></span>
                                    <span class="text-on-surface truncate">Clean Glaciers: <strong>$32,100</strong></span>
                                </div>
                                <div class="gap-space-2xs flex items-center">
                                    <span class="bg-amber-flare h-3 w-3 flex-shrink-0 rounded-full"></span>
                                    <span class="text-on-surface truncate">Solar Clinics: <strong>$25,680</strong></span>
                                </div>
                                <div class="gap-space-2xs flex items-center">
                                    <span class="bg-tertiary h-3 w-3 flex-shrink-0 rounded-full"></span>
                                    <span class="text-on-surface truncate">Porter Lifelines: <strong>$12,840</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Trekker Participation & "Carry It Forward" Callout -->
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface-container-high w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="mb-space-2xl space-y-space-xs mx-auto max-w-2xl text-center">
                        <span class="font-label-sm text-label-sm text-primary font-bold tracking-widest uppercase">Action Beyond The Trail</span>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight uppercase">
                            How Trekkers Can Participate
                        </h2>
                        <p class="font-body-md text-body-md text-tertiary">
                            True stewardship requires conscious trekkers. Here is how you can directly leave the
                            Himalayas cleaner and more resilient than you found them.
                        </p>
                    </div>
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                        <div class="p-space-lg bg-surface-container-lowest space-y-space-sm flex flex-col justify-between rounded-xl shadow-md">
                            <div class="space-y-space-xs">
                                <div class="bg-surface-container-high text-primary flex h-12 w-12 items-center justify-center rounded-lg">
                                    <x-lucide-luggage class="size-[28px]" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Pack-It-Out Pledge
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Every trekker receives a sealed, heavy-duty waste container to carry out personal
                                    non-biodegradable trash, including batteries, toiletries, and energy wrappers to
                                    Kathmandu.
                                </p>
                            </div>
                            <div class="font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold">
                                <span>Mandatory On All Trips</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                        <div class="p-space-lg bg-surface-container-lowest space-y-space-sm flex flex-col justify-between rounded-xl shadow-md">
                            <div class="space-y-space-xs">
                                <div class="bg-surface-container-high text-primary flex h-12 w-12 items-center justify-center rounded-lg">
                                    <x-lucide-leaf class="size-[28px]" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Carbon In-Valley Offset
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Offset your domestic Lukla/Jomsom flights directly through verified local Sherpa
                                    clean-energy microgrids instead of opaque third-party international schemes.
                                </p>
                            </div>
                            <div class="font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold">
                                <span>$35 / Flight Match</span>
                                <x-lucide-arrow-right class="size-[16px]" />
                            </div>
                        </div>
                        <div class="p-space-lg bg-surface-container-lowest space-y-space-sm flex flex-col justify-between rounded-xl shadow-md">
                            <div class="space-y-space-xs">
                                <div class="bg-surface-container-high text-primary flex h-12 w-12 items-center justify-center rounded-lg">
                                    <x-lucide-scale class="size-[28px]" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Strict 15kg Porter Cap
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    We conduct digital load scales at every trailhead. Porters are never overloaded past
                                    15kg and receive complete cold-weather mountain gear and shelter guarantees.
                                </p>
                            </div>
                            <div class="font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold">
                                <span>Ethical Porter Charter</span>
                                <x-lucide-shield class="size-[16px]" />
                            </div>
                        </div>
                        <div class="p-space-lg bg-surface-container-lowest space-y-space-sm flex flex-col justify-between rounded-xl shadow-md">
                            <div class="space-y-space-xs">
                                <div class="bg-surface-container-high text-primary flex h-12 w-12 items-center justify-center rounded-lg">
                                    <x-lucide-book-open class="size-[28px]" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Khumjung School Day
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Opt for an acclimatization volunteer afternoon at the Edmund Hillary School in
                                    Khumjung, sharing language exchange and reading workshops with our scholarship
                                    students.
                                </p>
                            </div>
                            <div class="font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold">
                                <span>Included In EBC Treks</span>
                                <x-lucide-heart class="size-[16px]" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- High-Impact Purpose-Driven Call to Action -->
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-ridge-deep text-summit-white relative w-full overflow-hidden">
                <div class="max-w-max-content-width space-y-space-lg relative z-10 mx-auto text-center">
                    <div class="gap-space-xs px-space-md py-space-2xs bg-summit-white/10 inline-flex items-center rounded-full backdrop-blur-md">
                        <x-lucide-handshake class="text-primary-container size-[18px]" />
                        <span class="font-badge-caption text-badge-caption text-primary-container tracking-wider uppercase">Partner With Our Alpine Communities</span>
                    </div>
                    <h2 class="font-headline-lg text-headline-lg lg:text-display-xl text-summit-white mx-auto max-w-3xl leading-tight font-extrabold tracking-tight uppercase">
                        Join a Purpose-Driven Trek or Sponsor a Himalayan Student
                    </h2>
                    <p class="font-body-lg text-body-lg text-mist-slate/90 mx-auto max-w-2xl">
                        Whether you walk beside us on the Gokyo ridges or fund an entire school year for a porter's
                        daughter, you become a permanent guardian of the Nepal Himalaya.
                    </p>
                    <div class="gap-space-md pt-space-sm flex flex-wrap items-center justify-center">
                        <a
                            class="gap-space-xs px-space-xl py-space-md bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md inline-flex items-center rounded-lg font-bold tracking-wider uppercase shadow-xl transition-all hover:-translate-y-0.5"
                            data-path="treks"
                            href="#"
                        >
                            <span>Explore Conscious Treks</span>
                            <x-lucide-compass class="size-[20px]" />
                        </a>
                        <button
                            class="gap-space-xs px-space-xl py-space-md bg-summit-white/10 hover:bg-summit-white/20 text-summit-white font-label-md text-label-md inline-flex items-center rounded-lg font-bold tracking-wider uppercase shadow-md transition-all"
                            onclick="openSponsorModal()"
                        >
                            <span>Direct Student Sponsorship Inquiries</span>
                            <x-lucide-mail class="size-[20px]" />
                        </button>
                    </div>
                    <div class="pt-space-lg gap-space-xl text-mist-slate/70 font-body-sm text-body-sm flex flex-wrap items-center justify-center">
                        <div class="gap-space-2xs flex items-center">
                            <x-lucide-lock class="text-primary-container size-[18px]" />
                            <span>Encrypted Tax-Deductible 501(c)(3) Partner Receipts</span>
                        </div>
                        <div class="gap-space-2xs flex items-center">
                            <x-lucide-images class="text-primary-container size-[18px]" />
                            <span>Bi-Annual Photographic Progress Reports</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Student Sponsorship Modal -->
            <div
                class="bg-ridge-deep/80 p-space-md fixed inset-0 z-50 flex hidden items-center justify-center backdrop-blur-md"
                id="sponsor-modal"
            >
                <div class="bg-surface-container-lowest p-space-xl space-y-space-md relative w-full max-w-lg rounded-xl shadow-2xl">
                    <button
                        class="text-tertiary hover:text-on-surface p-space-2xs hover:bg-surface-container-high absolute top-4 right-4 rounded-lg transition-colors"
                        onclick="closeSponsorModal()"
                    >
                        <x-lucide-x class="size-[24px]" />
                    </button>
                    <div class="gap-space-xs text-primary font-label-sm text-label-sm flex items-center font-bold tracking-wider uppercase">
                        <x-lucide-school class="size-[20px]" />
                        <span>Himalayan Student Sponsorship Inquiry</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                        Support an Alpine Boarding Scholar
                    </h3>
                    <p class="font-body-sm text-body-sm text-tertiary">
                        Sponsorship provides complete tuition, living quarters at Khumjung School, books, warm down
                        winter attire, and healthcare.
                    </p>
                    <form class="space-y-space-sm pt-space-xs" onsubmit="handleSponsorSubmit(event)">
                        <div>
                            <label class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Your Full Name</label>
                            <input
                                class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none"
                                placeholder="e.g. Maya Lin"
                                required=""
                                type="text"
                            />
                        </div>
                        <div>
                            <label class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Email Address</label>
                            <input
                                class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none"
                                placeholder="maya@trek.org"
                                required=""
                                type="email"
                            />
                        </div>
                        <div>
                            <label class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Sponsorship Tier</label>
                            <select class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none">
                                <option value="monthly">Monthly Sustainer ($45 / month)</option>
                                <option value="annual">Full Academic Year ($540 / year)</option>
                                <option value="graduate">Full High School Graduation Path ($2,160)</option>
                            </select>
                        </div>
                        <div>
                            <label class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Optional Message or Valley Preference</label>
                            <textarea
                                class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none"
                                placeholder="e.g., preference for Khumjung or Phortse village students..."
                                rows="2"
                            ></textarea>
                        </div>
                        <button
                            class="py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md mt-space-sm w-full rounded-lg font-bold tracking-wider uppercase shadow-md transition-all"
                            type="submit"
                        >
                            Submit Sponsorship Request
                        </button>
                    </form>
                </div>
            </div>
            <!-- Inline Client Interaction Script -->
        </div>
    </main>
    <x-footer />
</x-layouts.app>
