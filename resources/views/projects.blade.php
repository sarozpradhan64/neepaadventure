<x-layouts.app>
    <x-header />
    <main class="w-full pt-20 bg-surface">
        <div class="flex flex-col w-full">
            <!-- 1. Immersive Editorial Hero -->
            <section
                class="relative w-full bg-ridge-deep text-summit-white overflow-hidden py-space-3xl lg:py-space-4xl px-gutter-mobile lg:px-gutter-desktop">
                <!-- Atmospheric Ambient Shapes -->
                <div
                    class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-primary/10 blur-3xl pointer-events-none">
                </div>
                <div
                    class="absolute bottom-0 left-1/4 w-80 h-80 rounded-full bg-secondary-fixed/5 blur-3xl pointer-events-none">
                </div>
                <div class="relative z-10 max-w-max-content-width mx-auto">
                    <!-- Eyebrow Tag -->
                    <div
                        class="inline-flex items-center gap-space-xs px-space-md py-space-2xs rounded-full bg-summit-white/10 backdrop-blur-md mb-space-lg shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-primary-container animate-pulse"></span>
                        <span
                            class="font-badge-caption text-badge-caption uppercase tracking-[0.14em] text-primary-container">TREK
                            LOGS &amp; SUCCESS STORIES • FIELD ARCHIVE</span>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start">
                        <div class="lg:col-span-8 space-y-space-md">
                            <h1
                                class="font-display-xl text-headline-lg lg:text-display-xl font-extrabold uppercase tracking-tight text-summit-white leading-[1.08]">
                                Completed Trek Projects &amp; <span class="text-primary-container">Field Case
                                    Studies</span>
                            </h1>
                            <p class="font-body-lg text-body-lg text-mist-slate/90 max-w-2xl leading-relaxed">
                                Explore real trek dispatches, international team triumphs, and customized destination
                                projects orchestrated across Nepal's high Himalaya. From Annapurna Base Camp winter
                                traverses to 6,000m technical passes.
                            </p>
                            <div class="flex flex-wrap gap-space-sm pt-space-sm">
                                <a class="inline-flex items-center gap-space-xs px-space-lg py-space-sm rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider transition-all shadow-md hover:-translate-y-0.5"
                                    href="#flagship-case-study">
                                    <span>View Flagship Russian ABC Project</span>
                                    <x-lucide-arrow-down class="size-[18px]" />
                                </a>
                                <a class="inline-flex items-center gap-space-xs px-space-lg py-space-sm rounded-lg bg-summit-white/10 hover:bg-summit-white/20 text-summit-white font-label-md text-label-md font-bold uppercase tracking-wider transition-all shadow-sm"
                                    href="#case-studies-grid">
                                    <x-lucide-folder-open class="size-[18px]" />
                                    <span>Browse All Team Dossiers</span>
                                </a>
                            </div>
                        </div>
                        <div
                            class="lg:col-span-4 flex flex-col gap-space-md bg-summit-white/5 backdrop-blur-md p-space-lg rounded-xl shadow-xl">
                            <div class="flex items-center justify-between pb-space-xs">
                                <span
                                    class="font-label-sm text-label-sm text-mist-slate font-semibold uppercase tracking-wider">Field
                                    Operations 2024–2025</span>
                                <span
                                    class="inline-flex items-center gap-space-2xs text-primary-container text-body-sm font-semibold">
                                    <x-lucide-shield-check class="size-[16px]" />100% Monitored
                                </span>
                            </div>
                            <div class="text-body-sm text-mist-slate/80 leading-relaxed">
                                Every custom trek is supported by a dedicated Kathmandu 24/7 Operations Room,
                                Garmin inReach high-cadence satellite breadcrumbs, and senior certified Sherpa Sirdars.
                            </div>
                            <div class="pt-space-2xs">
                                <div class="flex justify-between text-body-sm mb-space-2xs">
                                    <span class="text-mist-slate font-medium">Seasonal Pass &amp; Destination Success</span>
                                    <span class="font-bold text-primary-container">98.6%</span>
                                </div>
                                <div class="w-full bg-summit-white/10 h-2.5 rounded-full overflow-hidden">
                                    <div class="bg-primary-container h-full rounded-full w-[98.6%]"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Quick Impact Metrics Banner -->
                    <div class="mt-space-2xl grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md">
                        <div
                            class="bg-summit-white/10 backdrop-blur-md p-space-lg rounded-xl flex flex-col justify-between shadow-sm">
                            <div class="flex items-center justify-between mb-space-xs">
                                <x-lucide-compass class="text-primary-container size-[28px]" />
                                <span
                                    class="font-badge-caption text-badge-caption uppercase tracking-wider text-mist-slate">Field
                                    Completed</span>
                            </div>
                            <div>
                                <div
                                    class="font-display-xl text-headline-lg font-extrabold text-summit-white tracking-tight">
                                    420+</div>
                                <div class="font-body-sm text-body-sm text-mist-slate/90 mt-space-2xs">Trek
                                    projects executed seamlessly</div>
                            </div>
                        </div>
                        <div
                            class="bg-summit-white/10 backdrop-blur-md p-space-lg rounded-xl flex flex-col justify-between shadow-sm">
                            <div class="flex items-center justify-between mb-space-xs">
                                <x-lucide-shield-check class="text-primary-container size-[28px]" />
                                <span
                                    class="font-badge-caption text-badge-caption uppercase tracking-wider text-mist-slate">High
                                    Pass &amp; Pass</span>
                            </div>
                            <div>
                                <div
                                    class="font-display-xl text-headline-lg font-extrabold text-summit-white tracking-tight">
                                    98.6%</div>
                                <div class="font-body-sm text-body-sm text-mist-slate/90 mt-space-2xs">Team destination &amp;
                                    high pass arrival success</div>
                            </div>
                        </div>
                        <div
                            class="bg-summit-white/10 backdrop-blur-md p-space-lg rounded-xl flex flex-col justify-between shadow-sm">
                            <div class="flex items-center justify-between mb-space-xs">
                                <x-lucide-globe class="text-primary-container size-[28px]" />
                                <span
                                    class="font-badge-caption text-badge-caption uppercase tracking-wider text-mist-slate">Global
                                    Clubs</span>
                            </div>
                            <div>
                                <div
                                    class="font-display-xl text-headline-lg font-extrabold text-summit-white tracking-tight">
                                    38 Nations</div>
                                <div class="font-body-sm text-body-sm text-mist-slate/90 mt-space-2xs">International
                                    alpine clubs &amp; private teams</div>
                            </div>
                        </div>
                        <div
                            class="bg-summit-white/10 backdrop-blur-md p-space-lg rounded-xl flex flex-col justify-between shadow-sm">
                            <div class="flex items-center justify-between mb-space-xs">
                                <x-lucide-shield-plus class="text-primary-container size-[28px]" />
                                <span
                                    class="font-badge-caption text-badge-caption uppercase tracking-wider text-mist-slate">Medical
                                    Protocol</span>
                            </div>
                            <div>
                                <div
                                    class="font-display-xl text-headline-lg font-extrabold text-summit-white tracking-tight">
                                    Zero</div>
                                <div class="font-body-sm text-body-sm text-mist-slate/90 mt-space-2xs">Safety
                                    compromises or unhandled evacuations</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 3. Featured Flagship Project (Spotlight Case Study: Russian ABC Trek) -->
            <section class="w-full py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface"
                id="flagship-case-study">
                <div class="max-w-max-content-width mx-auto">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-xl gap-space-md">
                        <div>
                            <div
                                class="flex items-center gap-space-2xs text-primary font-label-sm text-label-sm font-bold uppercase tracking-widest mb-space-2xs">
                                <x-lucide-shield class="size-[18px]" />
                                <span>PROJECT #HK-2024-88 • RUSSIAN ALPINE CLUB (MOSCOW &amp; ST. PETERSBURG)</span>
                            </div>
                            <h2
                                class="font-headline-lg text-headline-lg text-on-surface font-extrabold uppercase tracking-tight">
                                Annapurna Base Camp (ABC) &amp; Machapuchare Sanctuary Winter Trek
                            </h2>
                        </div>
                        <div
                            class="flex items-center gap-space-xs bg-surface-container-high px-space-md py-space-xs rounded-lg text-on-surface font-label-sm text-label-sm">
                            <x-lucide-map-pin class="text-primary size-[18px]" />
                            <span>Annapurna Sanctuary, Gandaki Province (4,130m / 13,550ft)</span>
                        </div>
                    </div>
                    <!-- Flagship Mosaic Card -->
                    <div
                        class="bg-surface-container-lowest rounded-xl shadow-xl overflow-hidden grid grid-cols-1 lg:grid-cols-12">
                        <div class="lg:col-span-7 relative min-h-[420px] lg:min-h-full">
                            <img class="w-full h-full object-cover"
                                data-alt="Russian Alpine Club trek team wearing orange and blue trekking jackets posing triumphantly with ice axes and Russian and Nepali pennants at Annapurna Base Camp signpost at 4,130m in winter with snow-draped Annapurna South and Machapuchare towering under brilliant morning sun."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAnL9l-H0YfeesYzXkqErSsdW_Va60OZOAQfieyI9Rp_O340YwB1LAc6nWz6j8cywQWouRXZ_nHF_zuouLSOgxkDlVbfo_xFzn5-JLbHbcQfSL0_TbK-DXlgOxAnT47gtEVKhOr1oR9yWfYEImHzJNcpH_OqWj2rYZMJEtkvUoMpJ7F60FZLdtzqi1-49Swk34zYeAEVDTXot5COnjC0gzbrIH2xlPtinHffLBifK4RvNNsrMLWE4m" />
                            <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                                <span
                                    class="px-space-sm py-space-2xs bg-ridge-deep/90 text-summit-white font-badge-caption text-badge-caption uppercase rounded-lg tracking-wider backdrop-blur-md flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-primary-container"></span>
                                    🇷🇺 Russian Federation Team (12 Climbers)
                                </span>
                                <span
                                    class="px-space-sm py-space-2xs bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption font-bold uppercase rounded-lg tracking-wider">
                                    100% Team Arrival at 4,130m
                                </span>
                            </div>
                            <div
                                class="absolute bottom-4 left-4 right-4 bg-ridge-deep/85 backdrop-blur-md p-space-sm rounded-lg text-summit-white text-body-sm flex flex-wrap items-center justify-between gap-2">
                                <div class="flex items-center gap-2">
                                    <x-lucide-user class="text-primary-container size-[18px]" />
                                    <span><strong>Leader:</strong> Alexey Volkov</span>
                                    <span class="text-mist-slate/60">|</span>
                                    <span><strong>Lead Sirdar:</strong> Dawa Tenzing Sherpa</span>
                                </div>
                                <div
                                    class="flex items-center gap-1 text-primary-container font-label-sm text-label-sm font-semibold">
                                    <x-lucide-satellite class="size-[16px]" />
                                    <span>Garmin InReach Log: Verified 108.4km</span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="lg:col-span-5 p-space-xl flex flex-col justify-between space-y-space-md bg-surface-container-lowest">
                            <div class="space-y-space-md">
                                <div class="flex items-center gap-space-xs text-tertiary font-body-sm text-body-sm">
                                    <x-lucide-route class="size-[16px] text-primary" />
                                    <span>Custom Route: Nayapul • Ghorepani Poon Hill • Chhomrong • Deurali • ABC</span>
                                </div>
                                <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                    In deep January winter snowpack, the 12-member Russian Alpine Club tasked Neepa
                                    Adventure to execute a fast, high-security traverse into the Annapurna Sanctuary. We
                                    deployed micro-spikes and gaiters for all members, chartered private 4WD transit
                                    from Pokhara, and arranged private teahouse wing bookings.
                                </p>
                                <!-- Key Case Stats Grid -->
                                <div
                                    class="grid grid-cols-3 gap-space-sm py-space-xs bg-surface-container-low rounded-lg p-space-md text-center">
                                    <div>
                                        <div class="font-headline-sm text-headline-sm font-bold text-on-surface">11 Days
                                        </div>
                                        <div class="font-body-sm text-body-sm text-tertiary">Total Itinerary</div>
                                    </div>
                                    <div>
                                        <div class="font-headline-sm text-headline-sm font-bold text-on-surface">4,130m
                                        </div>
                                        <div class="font-body-sm text-body-sm text-tertiary">Max Elevation</div>
                                    </div>
                                    <div>
                                        <div class="font-headline-sm text-headline-sm font-bold text-primary">12 of 12
                                        </div>
                                        <div class="font-body-sm text-body-sm text-tertiary">Reached ABC</div>
                                    </div>
                                </div>
                                <!-- Solution Highlights -->
                                <div class="space-y-space-xs text-body-sm">
                                    <div
                                        class="font-label-sm text-label-sm font-bold uppercase tracking-wider text-on-surface">
                                        Trek Logistics Solved:</div>
                                    <ul class="space-y-1.5 text-tertiary">
                                        <li class="flex items-start gap-2">
                                            <x-lucide-circle-check class="size-[16px] text-primary mt-0.5" />
                                            <span><strong>Native Russian Liaison:</strong> Russian-speaking Nepalese
                                                liaison officer handled all daily briefings, safety debriefs, and
                                                medical telemetry.</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <x-lucide-circle-check class="size-[16px] text-primary mt-0.5" />
                                            <span><strong>Tailored Alpine Menu:</strong> High-calorie beetroot borsch,
                                                hearty buckwheat, and traditional dal bhat fusion designed for sub-zero
                                                endurance.</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <x-lucide-circle-check class="size-[16px] text-primary mt-0.5" />
                                            <span><strong>Cold Weather Protocols:</strong> Dedicated hot-water bottle
                                                provisions, pulse oximeter twice daily, sub-zero sleeping bags, and zero
                                                frostbite.</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Client Leader Quote -->
                                <div
                                    class="p-space-sm bg-surface-container-high/60 rounded-lg border-l-4 border-primary">
                                    <p class="font-body-sm text-body-sm italic text-on-surface">
                                        "Our Russian club has trekked across the Caucasus and Altai, but the winter
                                        organization by Dawa Sherpa and Neepa Adventure was unmatched. To have all 12
                                        climbers safely watch sunrise light up Annapurna I South Face was an
                                        unforgettable dream."
                                    </p>
                                    <div class="mt-2 flex items-center justify-between text-label-sm font-bold">
                                        <span class="text-on-surface">— Alexey Volkov, Moscow Trekking
                                            Federation</span>
                                        <span class="text-primary flex items-center gap-1"><x-lucide-shield-check
                                                class="size-[14px]" />Certified Case</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-space-sm pt-space-xs">
                                <button
                                    class="flex-1 inline-flex items-center justify-center gap-space-2xs px-space-md py-space-sm rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider transition-all shadow-sm"
                                    onclick="openProjectModal('Russian Alpine Club - Annapurna Base Camp Winter Trek', '12 Russian Trekkers • Nayapul to ABC (4,130m) • January 2024')">
                                    <x-lucide-file-text class="size-[18px]" />
                                    <span>Read Full Debrief Dossier</span>
                                </button>
                                <a class="inline-flex items-center justify-center px-space-md py-space-sm rounded-lg bg-surface-container-high hover:bg-surface-container text-on-surface font-label-md text-label-md font-semibold transition-colors"
                                    href="#custom-project-inquiry">
                                    <span>Plan Similar Trek</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 2. Categorized Trek Projects Directory -->
            <section class="w-full py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface-container-low"
                id="case-studies-grid">
                <div class="max-w-max-content-width mx-auto">
                    <div class="text-center max-w-3xl mx-auto mb-space-2xl space-y-space-xs">
                        <span
                            class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">Verified
                            Client Treks &amp; Field Reports</span>
                        <h2
                            class="font-headline-lg text-headline-lg font-extrabold text-on-surface uppercase tracking-tight">
                            Trek Projects Directory</h2>
                        <p class="font-body-md text-body-md text-tertiary">
                            Discover how international trekking clubs, university alpine teams, and private groups
                            achieved their dream Himalayan destinations and traverses under Neepa Adventure leadership.
                        </p>
                        <!-- Dynamic Filter Controls -->
                        <div class="flex flex-wrap items-center justify-center gap-space-xs pt-space-md"
                            id="project-filters">
                            <button
                                class="filter-btn active px-space-md py-space-xs rounded-lg font-label-sm text-label-sm font-bold uppercase tracking-wider transition-all bg-ridge-deep text-summit-white shadow-sm"
                                data-filter="all">
                                All Projects (6)
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs rounded-lg font-label-sm text-label-sm font-bold uppercase tracking-wider transition-all bg-surface-container-lowest text-tertiary hover:text-on-surface shadow-sm"
                                data-filter="annapurna">
                                Annapurna &amp; ABC
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs rounded-lg font-label-sm text-label-sm font-bold uppercase tracking-wider transition-all bg-surface-container-lowest text-tertiary hover:text-on-surface shadow-sm"
                                data-filter="everest">
                                Everest &amp; Khumbu
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs rounded-lg font-label-sm text-label-sm font-bold uppercase tracking-wider transition-all bg-surface-container-lowest text-tertiary hover:text-on-surface shadow-sm"
                                data-filter="manaslu">
                                Manaslu &amp; Circuits
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs rounded-lg font-label-sm text-label-sm font-bold uppercase tracking-wider transition-all bg-surface-container-lowest text-tertiary hover:text-on-surface shadow-sm"
                                data-filter="trekking">
                                High Altitude Trekking &amp; Destinations
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs rounded-lg font-label-sm text-label-sm font-bold uppercase tracking-wider transition-all bg-surface-container-lowest text-tertiary hover:text-on-surface shadow-sm"
                                data-filter="corporate">
                                Corporate &amp; University
                            </button>
                        </div>
                        <!-- Secondary Filter / Quick Sort Row -->
                        <div
                            class="flex flex-wrap items-center justify-between gap-3 pt-space-md text-body-sm text-tertiary border-t border-surface-container-high/80 mt-space-md">
                            <div class="flex items-center gap-2">
                                <x-lucide-filter class="size-[18px] text-primary" />
                                <span class="font-semibold text-on-surface">Showing 6 Verified Field Case
                                    Studies</span>
                            </div>
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="text-xs uppercase font-bold tracking-wider">Filter by Nation:</span>
                                <span
                                    class="px-2 py-1 bg-surface-container-lowest rounded text-xs font-semibold text-on-surface shadow-sm">🇷🇺
                                    Russia</span>
                                <span
                                    class="px-2 py-1 bg-surface-container-lowest rounded text-xs font-semibold text-on-surface shadow-sm">🇬🇧
                                    UK</span>
                                <span
                                    class="px-2 py-1 bg-surface-container-lowest rounded text-xs font-semibold text-on-surface shadow-sm">🇯🇵
                                    Japan</span>
                                <span
                                    class="px-2 py-1 bg-surface-container-lowest rounded text-xs font-semibold text-on-surface shadow-sm">🇸🇪
                                    Nordic</span>
                                <span
                                    class="px-2 py-1 bg-surface-container-lowest rounded text-xs font-semibold text-on-surface shadow-sm">🇩🇪
                                    Germany</span>
                                <span
                                    class="px-2 py-1 bg-surface-container-lowest rounded text-xs font-semibold text-on-surface shadow-sm">🇺🇸
                                    USA</span>
                            </div>
                        </div>
                    </div>
                    <!-- Project Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-lg" id="projects-grid">
                        <!-- Project 1: Russian Alpine Club ABC -->
                        <div class="project-item flex flex-col bg-surface-container-lowest rounded-xl shadow-md overflow-hidden transition-all hover:-translate-y-1"
                            data-category="annapurna">
                            <div class="relative h-56 w-full">
                                <img class="w-full h-full object-cover"
                                    data-alt="Trekking team with heavy alpine packs ascending stone staircases through snowy rhododendron forests toward Machapuchare Base Camp and Annapurna Base Camp under clear blue Himalayan sky."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDiAGEahxSdJek9Y070WjXEC-4XB04kBt3nlH1fSZoiFrHG0SeB0xkfE14-Kg5tltXHepyCRCjpew51waoKq-ftMBlGs8tU3HUtTneu3m-9sWJa1b3UJTSeSL6lUOAeY8kAzBkZXPwlzG5wAkuIbo2_ncKtaTL0LhS-NNaNiTFRDJVeLzWI05rSFVQE2Z4C3bvvt9BtoNcdrS2fNGL5QnvoYmcO8rFCUdz2lDE_CAYMmhpiuLWWXJrn" />
                                <span
                                    class="absolute top-3 left-3 bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption font-bold px-space-sm py-space-2xs rounded-md uppercase tracking-wider flex items-center gap-1">
                                    <span>🇷🇺</span> Team Russia • 12 Members
                                </span>
                                <span
                                    class="absolute bottom-3 right-3 bg-ridge-deep/80 backdrop-blur-md text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs rounded-md">
                                    Annapurna ABC (4,130m)
                                </span>
                            </div>
                            <div class="p-space-lg flex-1 flex flex-col justify-between space-y-space-md">
                                <div>
                                    <div
                                        class="text-tertiary font-label-sm text-label-sm font-semibold uppercase tracking-wider mb-space-2xs flex items-center justify-between">
                                        <span>Annapurna Sanctuary Circuit</span>
                                        <span class="text-primary font-bold">11 Days</span>
                                    </div>
                                    <h3
                                        class="font-headline-sm text-headline-sm font-bold text-on-surface tracking-tight leading-snug">
                                        Russian Alpine Club - Annapurna Sanctuary Winter Traverse
                                    </h3>
                                    <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                        Complete winter traversal through Deurali avalanche chutes to Annapurna Base
                                        Camp with Russian-speaking guide, specialized nutrition, and zero altitude
                                        sickness delays.
                                    </p>
                                </div>
                                <div class="space-y-2 pt-2 border-t border-surface-container-high">
                                    <div class="grid grid-cols-2 gap-2 text-body-sm">
                                        <div class="text-tertiary">Max Altitude: <strong
                                                class="text-on-surface">4,130m</strong></div>
                                        <div class="text-tertiary">Pass/Destination: <strong class="text-primary">100%
                                                (12/12)</strong></div>
                                        <div class="text-tertiary">Sirdar: <strong class="text-on-surface">Dawa
                                                Sherpa</strong></div>
                                        <div class="text-tertiary">Season: <strong class="text-on-surface">Winter
                                                2024</strong></div>
                                    </div>
                                </div>
                                <div
                                    class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg flex items-center justify-between">
                                    <button
                                        class="w-full inline-flex items-center justify-center gap-1.5 py-space-2xs px-space-sm rounded-lg bg-surface-container-high hover:bg-primary-container hover:text-on-primary-fixed font-label-sm text-label-sm font-bold transition-all text-on-surface"
                                        onclick="openProjectModal('Russian Alpine Club ABC Trek', '12 Members from Moscow &amp; St. Petersburg reached 4,130m ABC with 100% success rate.')">
                                        <x-lucide-eye class="size-[16px]" />
                                        <span>View Project Case Dossier</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Project 2: Cambridge University Manaslu -->
                        <div class="project-item flex flex-col bg-surface-container-lowest rounded-xl shadow-md overflow-hidden transition-all hover:-translate-y-1"
                            data-category="manaslu corporate">
                            <div class="relative h-56 w-full">
                                <img class="w-full h-full object-cover"
                                    data-alt="University student trekking trek crossing the high snow pass of Larkya La at 5,106m with Tibetan prayer flags snapping in the wind and Manaslu towering behind."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDsVy3f165iJzvyjJU1JxyUapbOrUtAUD3_55BWm525xfiPGaqkqXl86z5il6lxIQD3Qj6wvT45NFK6ojyk3v72yKoz7slSxvgWfjujurSXDw32SKLi7m5X-s283BQrkDiUytIvJTje635CU0gruKTSO-XdrGfV7xGy2LUvMRj0ggzeDObeGgFFKJ35wUJtM7MMw3VO5Y2BQiM6phwDZWHyyesU9ByQhPfsoP7b0G8twjMf8hFO6Z2a" />
                                <span
                                    class="absolute top-3 left-3 bg-secondary text-on-secondary font-badge-caption text-badge-caption font-bold px-space-sm py-space-2xs rounded-md uppercase tracking-wider flex items-center gap-1">
                                    <span>🇬🇧</span> Team UK • 8 Climbers
                                </span>
                                <span
                                    class="absolute bottom-3 right-3 bg-ridge-deep/80 backdrop-blur-md text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs rounded-md">
                                    Larkya La Pass (5,106m)
                                </span>
                            </div>
                            <div class="p-space-lg flex-1 flex flex-col justify-between space-y-space-md">
                                <div>
                                    <div
                                        class="text-tertiary font-label-sm text-label-sm font-semibold uppercase tracking-wider mb-space-2xs flex items-center justify-between">
                                        <span>Manaslu Restricted Circuit</span>
                                        <span class="text-primary font-bold">14 Days</span>
                                    </div>
                                    <h3
                                        class="font-headline-sm text-headline-sm font-bold text-on-surface tracking-tight leading-snug">
                                        Cambridge University Alpine Society - Manaslu Larkya La Circuit
                                    </h3>
                                    <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                        Successfully negotiated the restricted Manaslu route and early spring snow
                                        crossing at Larkya La (5,106m) with zero weather delays and rigorous
                                        acclimatization pacing.
                                    </p>
                                </div>
                                <div class="space-y-2 pt-2 border-t border-surface-container-high">
                                    <div class="grid grid-cols-2 gap-2 text-body-sm">
                                        <div class="text-tertiary">Max Altitude: <strong
                                                class="text-on-surface">5,106m</strong></div>
                                        <div class="text-tertiary">Pass Success: <strong class="text-primary">100%
                                                (8/8)</strong></div>
                                        <div class="text-tertiary">Sirdar: <strong class="text-on-surface">Pasang
                                                Lhakpa</strong></div>
                                        <div class="text-tertiary">Season: <strong class="text-on-surface">Spring
                                                2024</strong></div>
                                    </div>
                                </div>
                                <div
                                    class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg flex items-center justify-between">
                                    <button
                                        class="w-full inline-flex items-center justify-center gap-1.5 py-space-2xs px-space-sm rounded-lg bg-surface-container-high hover:bg-primary-container hover:text-on-primary-fixed font-label-sm text-label-sm font-bold transition-all text-on-surface"
                                        onclick="openProjectModal('Cambridge Alpine Society Manaslu Project', '8 UK student climbers successfully traversed the 5,106m Larkya La pass in restricted Manaslu.')">
                                        <x-lucide-eye class="size-[16px]" />
                                        <span>View Project Case Dossier</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Project 3: Tokyo Trekking Club Island Pass -->
                        <div class="project-item flex flex-col bg-surface-container-lowest rounded-xl shadow-md overflow-hidden transition-all hover:-translate-y-1"
                            data-category="trekking everest">
                            <div class="relative h-56 w-full">
                                <img class="w-full h-full object-cover"
                                    data-alt="Technical trekking team roped up on steep headwall snow with ascenders on fixed lines ascending toward Island Pass Imja Tse destination with Lhotse and Ama Dablam behind."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMUK7JMHms9lTE8_cLhwxsKGeO0jTXshkh4EA1F_z0Jk7XyViUiM4hLFZXeLZb2b__liu1Prgd8sjNKzj5rA3XJM2I2sxFRZ6ZvcTWu6r4pntngFsN9gEwrZ8k2XSCS9ixj5k-YKKCKRyQe32pe6pUOCnCm1qqh8P02Jo62U_QD84VLeQZof81OAB4tLIlRONrDsJ_MRMtSo4wxRBV-cge4PpBUm5DK6DNRbomJUIua7XClk9yXARF" />
                                <span
                                    class="absolute top-3 left-3 bg-primary text-on-primary font-badge-caption text-badge-caption font-bold px-space-sm py-space-2xs rounded-md uppercase tracking-wider flex items-center gap-1">
                                    <span>🇯🇵</span> Team Japan • 6 Climbers
                                </span>
                                <span
                                    class="absolute bottom-3 right-3 bg-ridge-deep/80 backdrop-blur-md text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs rounded-md">
                                    Island Pass Destination (6,189m)
                                </span>
                            </div>
                            <div class="p-space-lg flex-1 flex flex-col justify-between space-y-space-md">
                                <div>
                                    <div
                                        class="text-tertiary font-label-sm text-label-sm font-semibold uppercase tracking-wider mb-space-2xs flex items-center justify-between">
                                        <span>Khumbu Technical Pass</span>
                                        <span class="text-primary font-bold">16 Days</span>
                                    </div>
                                    <h3
                                        class="font-headline-sm text-headline-sm font-bold text-on-surface tracking-tight leading-snug">
                                        Tokyo Trekking Club - Island Pass (Imja Tse, 6,189m) Push
                                    </h3>
                                    <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                        Precision technical push with 1:1 Sherpa guide pairings, crevasse ladder
                                        training, and pre-rigged fixed lines on the destination headwall for 100% destination
                                        completion.
                                    </p>
                                </div>
                                <div class="space-y-2 pt-2 border-t border-surface-container-high">
                                    <div class="grid grid-cols-2 gap-2 text-body-sm">
                                        <div class="text-tertiary">Max Altitude: <strong
                                                class="text-on-surface">6,189m</strong></div>
                                        <div class="text-tertiary">Destination Success: <strong class="text-primary">100%
                                                (6/6)</strong></div>
                                        <div class="text-tertiary">Lead Guide: <strong class="text-on-surface">Mingma
                                                Nuru</strong></div>
                                        <div class="text-tertiary">Season: <strong class="text-on-surface">Autumn
                                                2024</strong></div>
                                    </div>
                                </div>
                                <div
                                    class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg flex items-center justify-between">
                                    <button
                                        class="w-full inline-flex items-center justify-center gap-1.5 py-space-2xs px-space-sm rounded-lg bg-surface-container-high hover:bg-primary-container hover:text-on-primary-fixed font-label-sm text-label-sm font-bold transition-all text-on-surface"
                                        onclick="openProjectModal('Tokyo Trekking Club Island Pass Trek', '6 Japanese alpinists achieved 100% destination success on Imja Tse 6,189m with 1:1 Sherpa guide support.')">
                                        <x-lucide-eye class="size-[16px]" />
                                        <span>View Project Case Dossier</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Project 4: Nordic Explorer Group EBC & Gokyo Ri Cho La -->
                        <div class="project-item flex flex-col bg-surface-container-lowest rounded-xl shadow-md overflow-hidden transition-all hover:-translate-y-1"
                            data-category="everest">
                            <div class="relative h-56 w-full">
                                <img class="w-full h-full object-cover"
                                    data-alt="Trekking group overlooking the turquoise alpine glacial lake of Gokyo with massive Ngozumpa Glacier and snowy Cho Oyu in the background under crisp sunny sky."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcZ3Tr2Son_QBeDKEUgj-PmNxRQzuIDDvW_x11ZZUeAWMXJZOF43Ajp7lyv1FQKhXNwPmSRYnKLEvGpUnMvPWksh9BFd6VCpVwOm5cEcwgLZr-uqNIpca4q4rnGw2BQGu-eHFfUYNSiPpOUL2FMREWbCb_tFd2Dg3OQALhnOYA00rGjigQ1Q9k-6WyYgNgtKCT4v3n2wr3huoNfr4SpW-GePEjSMmqx6WpMySm15xT-KPr_CwEb6xg" />
                                <span
                                    class="absolute top-3 left-3 bg-surface-container-highest text-on-surface font-badge-caption text-badge-caption font-bold px-space-sm py-space-2xs rounded-md uppercase tracking-wider flex items-center gap-1">
                                    <span>🇸🇪 🇳🇴</span> Nordic Explorer • 10 Trekkers
                                </span>
                                <span
                                    class="absolute bottom-3 right-3 bg-ridge-deep/80 backdrop-blur-md text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs rounded-md">
                                    Cho La Pass (5,420m)
                                </span>
                            </div>
                            <div class="p-space-lg flex-1 flex flex-col justify-between space-y-space-md">
                                <div>
                                    <div
                                        class="text-tertiary font-label-sm text-label-sm font-semibold uppercase tracking-wider mb-space-2xs flex items-center justify-between">
                                        <span>Everest &amp; Gokyo Traverse</span>
                                        <span class="text-primary font-bold">17 Days</span>
                                    </div>
                                    <h3
                                        class="font-headline-sm text-headline-sm font-bold text-on-surface tracking-tight leading-snug">
                                        Nordic Explorer Group - EBC &amp; Gokyo Ri Cho La Traverse
                                    </h3>
                                    <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                        Twin-peak high vantage traverse across Kala Patthar and Gokyo Ri via glaciated
                                        Cho La pass, with continuous medical telemetry and zero altitude incidents.
                                    </p>
                                </div>
                                <div class="space-y-2 pt-2 border-t border-surface-container-high">
                                    <div class="grid grid-cols-2 gap-2 text-body-sm">
                                        <div class="text-tertiary">Max Altitude: <strong
                                                class="text-on-surface">5,545m (Kala Patthar)</strong></div>
                                        <div class="text-tertiary">Team Completion: <strong class="text-primary">100%
                                                (10/10)</strong></div>
                                        <div class="text-tertiary">Sirdar: <strong class="text-on-surface">Ang
                                                Phurba</strong></div>
                                        <div class="text-tertiary">Season: <strong class="text-on-surface">Spring
                                                2024</strong></div>
                                    </div>
                                </div>
                                <div
                                    class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg flex items-center justify-between">
                                    <button
                                        class="w-full inline-flex items-center justify-center gap-1.5 py-space-2xs px-space-sm rounded-lg bg-surface-container-high hover:bg-primary-container hover:text-on-primary-fixed font-label-sm text-label-sm font-bold transition-all text-on-surface"
                                        onclick="openProjectModal('Nordic Explorer EBC &amp; Gokyo Project', '10 climbers from Sweden &amp; Norway completed the Cho La Pass and twin destinations of Gokyo Ri and Kala Patthar.')">
                                        <x-lucide-eye class="size-[16px]" />
                                        <span>View Project Case Dossier</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Project 5: Munich High-Altitude Club Ama Dablam -->
                        <div class="project-item flex flex-col bg-surface-container-lowest rounded-xl shadow-md overflow-hidden transition-all hover:-translate-y-1"
                            data-category="trekking everest">
                            <div class="relative h-56 w-full">
                                <img class="w-full h-full object-cover"
                                    data-alt="Technical trekkers ascending exposed granite and ice knife-edge ridge on Ama Dablam Southwest Ridge with sheer Himalayan drop-offs under twilight alpine glow."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuASo7cCiURx7ov1b8xDmULKathZfkGk8jduldxi6WRE3nGLEcYXHGFO7TQt_7BENzzj5xOySQM4vEKl5NcetnV0cq9lko1GOgyA4dVYLBGUX9i81iSf924HXalt6gO9zezv5Yze99dKgz3_6kr-C-vbvMN8vkVMkSTE487lQg4MwRiYNd72DVUMKNRzeopSPwD9ljMWqPsvUAUebGytxm7cZwbuRFjl6G8CZvwcFSWMVMYfpyuuqjhS" />
                                <span
                                    class="absolute top-3 left-3 bg-amber-flare text-on-primary-fixed font-badge-caption text-badge-caption font-bold px-space-sm py-space-2xs rounded-md uppercase tracking-wider flex items-center gap-1">
                                    <span>🇩🇪 🇦🇹</span> Team Germany/Austria • 4 Alpinists
                                </span>
                                <span
                                    class="absolute bottom-3 right-3 bg-ridge-deep/80 backdrop-blur-md text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs rounded-md">
                                    Ama Dablam Destination (6,812m)
                                </span>
                            </div>
                            <div class="p-space-lg flex-1 flex flex-col justify-between space-y-space-md">
                                <div>
                                    <div
                                        class="text-tertiary font-label-sm text-label-sm font-semibold uppercase tracking-wider mb-space-2xs flex items-center justify-between">
                                        <span>Technical Himalayan Alpinism</span>
                                        <span class="text-primary font-bold">24 Days</span>
                                    </div>
                                    <h3
                                        class="font-headline-sm text-headline-sm font-bold text-on-surface tracking-tight leading-snug">
                                        Munich High-Altitude Club - Ama Dablam Southwest Ridge (6,812m)
                                    </h3>
                                    <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                        Masterfully fixed 1,200 meters of alpine line across Camp 2 Yellow Tower and
                                        mushroom ice ridge, successfully summiting during a tight 18-hour weather
                                        window.
                                    </p>
                                </div>
                                <div class="space-y-2 pt-2 border-t border-surface-container-high">
                                    <div class="grid grid-cols-2 gap-2 text-body-sm">
                                        <div class="text-tertiary">Max Altitude: <strong
                                                class="text-on-surface">6,812m</strong></div>
                                        <div class="text-tertiary">Destination Arrival: <strong class="text-primary">100%
                                                (4/4)</strong></div>
                                        <div class="text-tertiary">Trekking Sirdar: <strong
                                                class="text-on-surface">Tashi G. Sherpa</strong></div>
                                        <div class="text-tertiary">Season: <strong class="text-on-surface">Late Autumn
                                                2024</strong></div>
                                    </div>
                                </div>
                                <div
                                    class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg flex items-center justify-between">
                                    <button
                                        class="w-full inline-flex items-center justify-center gap-1.5 py-space-2xs px-space-sm rounded-lg bg-surface-container-high hover:bg-primary-container hover:text-on-primary-fixed font-label-sm text-label-sm font-bold transition-all text-on-surface"
                                        onclick="openProjectModal('Munich Club Ama Dablam Technical Trek', '4 German and Austrian alpinists summited 6,812m Ama Dablam via Southwest Ridge with Neepa Adventure fixed lines.')">
                                        <x-lucide-eye class="size-[16px]" />
                                        <span>View Project Case Dossier</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Project 6: Silicon Valley Tech Leaders Langtang -->
                        <div class="project-item flex flex-col bg-surface-container-lowest rounded-xl shadow-md overflow-hidden transition-all hover:-translate-y-1"
                            data-category="corporate">
                            <div class="relative h-56 w-full">
                                <img class="w-full h-full object-cover"
                                    data-alt="Corporate trekking team hiking alongside stone mani walls in the open glacial valley of Langtang toward Kyanjin Gompa with towering snowy Langtang Lirung passes."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcZ7pacaqrBEKy1Q3wLU56Nnaszw4Wb6h7PAkIqcC4v4Bq0v7drudpmnhn6X21ffBwjC5CVRbA5FUPD5Av42ZBnBxRO5OrRC7n3-8Rasbn1EfGTLcWEpjQskHo8KXD08rlC5AnA4jLYX46WrJHGv0linJln7rR3rRB3r_xHAVFf7I-p9vy6lCyktTeGnK1cXiKIf-2cD3SFjhLbngCKO9DcknyB-dhyjiZtBn4Z-ZvaU55Z-E_qtGO" />
                                <span
                                    class="absolute top-3 left-3 bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption font-bold px-space-sm py-space-2xs rounded-md uppercase tracking-wider flex items-center gap-1">
                                    <span>🇺🇸</span> Team USA • 14 Execs
                                </span>
                                <span
                                    class="absolute bottom-3 right-3 bg-ridge-deep/80 backdrop-blur-md text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs rounded-md">
                                    Kyanjin Ri Pass (4,773m)
                                </span>
                            </div>
                            <div class="p-space-lg flex-1 flex flex-col justify-between space-y-space-md">
                                <div>
                                    <div
                                        class="text-tertiary font-label-sm text-label-sm font-semibold uppercase tracking-wider mb-space-2xs flex items-center justify-between">
                                        <span>Executive Leadership Trek</span>
                                        <span class="text-primary font-bold">8 Days</span>
                                    </div>
                                    <h3
                                        class="font-headline-sm text-headline-sm font-bold text-on-surface tracking-tight leading-snug">
                                        Silicon Valley Tech Leaders - Langtang &amp; Kyanjin Ri Regeneration Trek
                                    </h3>
                                    <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                        Curated high-comfort alpine leadership retreat combining Starlink connectivity
                                        at teahouses with 4,773m dawn ridge treks and local community cheese
                                        cooperative support.
                                    </p>
                                </div>
                                <div class="space-y-2 pt-2 border-t border-surface-container-high">
                                    <div class="grid grid-cols-2 gap-2 text-body-sm">
                                        <div class="text-tertiary">Max Altitude: <strong
                                                class="text-on-surface">4,773m</strong></div>
                                        <div class="text-tertiary">Leadership Ascent: <strong
                                                class="text-primary">100% (14/14)</strong></div>
                                        <div class="text-tertiary">Sirdar: <strong class="text-on-surface">Pemba
                                                Tamang</strong></div>
                                        <div class="text-tertiary">Season: <strong class="text-on-surface">Autumn
                                                2024</strong></div>
                                    </div>
                                </div>
                                <div
                                    class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg flex items-center justify-between">
                                    <button
                                        class="w-full inline-flex items-center justify-center gap-1.5 py-space-2xs px-space-sm rounded-lg bg-surface-container-high hover:bg-primary-container hover:text-on-primary-fixed font-label-sm text-label-sm font-bold transition-all text-on-surface"
                                        onclick="openProjectModal('Silicon Valley Langtang Leadership Trek', '14 corporate leaders successfully summited Kyanjin Ri 4,773m with satellite office comms &amp; luxury teahouse support.')">
                                        <x-lucide-eye class="size-[16px]" />
                                        <span>View Project Case Dossier</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 5. How We Structure Your Custom Team Project -->
            <section class="w-full py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface">
                <div class="max-w-max-content-width mx-auto">
                    <div class="text-center max-w-3xl mx-auto mb-space-2xl space-y-space-xs">
                        <span
                            class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">Standard
                            of Excellence for Custom Groups</span>
                        <h2
                            class="font-headline-lg text-headline-lg font-extrabold text-on-surface uppercase tracking-tight">
                            How We Structure Your Custom Team Project
                        </h2>
                        <p class="font-body-md text-body-md text-tertiary">
                            Whether you lead an alpine trekking federation, university exploration society, or
                            executive group, our Kathmandu team engineers every logistics layer.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-lg">
                        <!-- Step 1 -->
                        <div
                            class="p-space-lg bg-surface-container-lowest rounded-xl shadow-md space-y-space-sm flex flex-col justify-between border-t-4 border-primary">
                            <div class="space-y-space-xs">
                                <div
                                    class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center text-primary">
                                    <x-lucide-timeline class="size-[28px]" />
                                </div>
                                <span
                                    class="font-badge-caption text-badge-caption uppercase tracking-wider text-primary font-bold">Phase
                                    01 • Custom Design</span>
                                <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Acclimatization
                                    Modeling</h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Every route is tailored to your team's previous alpine exposure with customized
                                    sleep-low trek-high profiles and rest buffer days.
                                </p>
                            </div>
                            <div
                                class="font-label-sm text-label-sm font-semibold text-primary flex items-center gap-1">
                                <span>Custom Route Maps &amp; GPX</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Step 2 -->
                        <div
                            class="p-space-lg bg-surface-container-lowest rounded-xl shadow-md space-y-space-sm flex flex-col justify-between border-t-4 border-secondary">
                            <div class="space-y-space-xs">
                                <div
                                    class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center text-primary">
                                    <x-lucide-languages class="size-[28px]" />
                                </div>
                                <span
                                    class="font-badge-caption text-badge-caption uppercase tracking-wider text-secondary font-bold">Phase
                                    02 • Cultural Liaison</span>
                                <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Native Language
                                    &amp; Nutrition</h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    We provide guides fluent in Russian, French, German, or Japanese, alongside tailored
                                    dietary requirements for optimal field endurance.
                                </p>
                            </div>
                            <div
                                class="font-label-sm text-label-sm font-semibold text-secondary flex items-center gap-1">
                                <span>Multi-Language Briefings</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Step 3 -->
                        <div
                            class="p-space-lg bg-surface-container-lowest rounded-xl shadow-md space-y-space-sm flex flex-col justify-between border-t-4 border-amber-flare">
                            <div class="space-y-space-xs">
                                <div
                                    class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center text-primary">
                                    <x-lucide-satellite class="size-[28px]" />
                                </div>
                                <span
                                    class="font-badge-caption text-badge-caption uppercase tracking-wider text-amber-flare font-bold">Phase
                                    03 • Real-Time Safety</span>
                                <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Satellite Comms
                                    &amp; Heli Desk</h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Live Garmin inReach breadcrumb tracking paired with 24/7 Kathmandu operations room
                                    and standby high-altitude helicopter rescue insurance coordination.
                                </p>
                            </div>
                            <div
                                class="font-label-sm text-label-sm font-semibold text-amber-flare flex items-center gap-1">
                                <span>24/7 Active Field Dispatch</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Step 4 -->
                        <div
                            class="p-space-lg bg-surface-container-lowest rounded-xl shadow-md space-y-space-sm flex flex-col justify-between border-t-4 border-tertiary">
                            <div class="space-y-space-xs">
                                <div
                                    class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center text-primary">
                                    <x-lucide-award class="size-[28px]" />
                                </div>
                                <span
                                    class="font-badge-caption text-badge-caption uppercase tracking-wider text-tertiary font-bold">Phase
                                    04 • Documentation</span>
                                <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Certificates
                                    &amp; 4K Media</h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Official Nepal Trekking Association destination badges, high-pass crossing
                                    credentials, and curated 4K team trek photo vaults.
                                </p>
                            </div>
                            <div
                                class="font-label-sm text-label-sm font-semibold text-tertiary flex items-center gap-1">
                                <span>Official Certifications</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 6. Bottom Call to Action: Custom Project Inquiry -->
            <section
                class="w-full py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-ridge-deep text-summit-white relative overflow-hidden"
                id="custom-project-inquiry">
                <div class="max-w-max-content-width mx-auto relative z-10 text-center space-y-space-lg">
                    <div
                        class="inline-flex items-center gap-space-xs px-space-md py-space-2xs rounded-full bg-summit-white/10 backdrop-blur-md">
                        <x-lucide-handshake class="text-primary-container size-[18px]" />
                        <span
                            class="font-badge-caption text-badge-caption uppercase tracking-wider text-primary-container">Bespoke
                            Club &amp; Private Treks</span>
                    </div>
                    <h2
                        class="font-headline-lg text-headline-lg lg:text-display-xl font-extrabold uppercase tracking-tight text-summit-white max-w-4xl mx-auto leading-tight">
                        Planning a Private Trek or Club Project in Nepal?
                    </h2>
                    <p class="font-body-lg text-body-lg text-mist-slate/90 max-w-2xl mx-auto">
                        Whether organizing an Annapurna Base Camp team trek from Russia, a UK university alpine project,
                        or a bespoke 6,000m trekking push, consult directly with our Chief Trek Director.
                    </p>
                    <div class="flex flex-wrap items-center justify-center gap-space-md pt-space-sm">
                        <button
                            class="inline-flex items-center gap-space-xs px-space-xl py-space-md rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider transition-all shadow-xl hover:-translate-y-0.5"
                            onclick="openPlanCustomModal()">
                            <span>Plan a Custom Group Project</span>
                            <x-lucide-flag class="size-[20px]" />
                        </button>
                        <a class="inline-flex items-center gap-space-xs px-space-xl py-space-md rounded-lg bg-summit-white/10 hover:bg-summit-white/20 text-summit-white font-label-md text-label-md font-bold uppercase tracking-wider transition-all shadow-md"
                            href="#">
                            <x-lucide-download class="size-[20px]" />
                            <span>Download Trek Case Study Guide (PDF)</span>
                        </a>
                    </div>
                    <div
                        class="pt-space-lg flex flex-wrap items-center justify-center gap-space-xl text-mist-slate/70 font-body-sm text-body-sm">
                        <div class="flex items-center gap-space-2xs">
                            <x-lucide-shield class="text-primary-container size-[18px]" />
                            <span>Official Nepal Tourism Board Licensed Agency #89432</span>
                        </div>
                        <div class="flex items-center gap-space-2xs">
                            <x-lucide-headphones class="text-primary-container size-[18px]" />
                            <span>Direct Consultation with Lead Sherpa Operations Desk</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Case Study Detail Modal -->
            <div class="fixed inset-0 z-50 hidden flex items-center justify-center bg-ridge-deep/80 backdrop-blur-md p-space-md"
                id="case-study-modal">
                <div
                    class="bg-surface-container-lowest rounded-xl max-w-xl w-full p-space-xl shadow-2xl relative space-y-space-md max-h-[90vh] overflow-y-auto">
                    <button
                        class="absolute top-4 right-4 text-tertiary hover:text-on-surface p-space-2xs rounded-lg hover:bg-surface-container-high transition-colors"
                        onclick="closeProjectModal()">
                        <x-lucide-x class="size-[24px]" />
                    </button>
                    <div
                        class="flex items-center gap-space-xs text-primary font-label-sm text-label-sm font-bold uppercase tracking-wider">
                        <x-lucide-folder-open class="size-[20px]" />
                        <span>Neepa Adventure Field Dossier</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface" id="modal-project-title">
                        Russian Alpine Club - Annapurna Base Camp
                    </h3>
                    <p class="font-body-sm text-body-sm text-tertiary" id="modal-project-desc">
                        Complete operational debrief, team roster, satellite track record, and altitude profile.
                    </p>
                    <div class="p-space-md bg-surface-container-low rounded-lg space-y-2 text-body-sm">
                        <div class="flex justify-between border-b border-surface-container-high pb-1">
                            <span class="text-tertiary">Trek ID:</span>
                            <span class="font-bold text-on-surface">HK-PROJECT-2024-EXP</span>
                        </div>
                        <div class="flex justify-between border-b border-surface-container-high pb-1">
                            <span class="text-tertiary">Team Origin:</span>
                            <span class="font-bold text-on-surface">International Club Registry</span>
                        </div>
                        <div class="flex justify-between border-b border-surface-container-high pb-1">
                            <span class="text-tertiary">Field Sirdar &amp; Guide:</span>
                            <span class="font-bold text-primary">Certified IFMGA / NMA Sherpa</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-tertiary">Medical Evacuations:</span>
                            <span class="font-bold text-on-surface">Zero (Full Vital Telemetry OK)</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="font-label-sm text-label-sm font-bold uppercase text-on-surface">Logistical Feats
                            Handled:</div>
                        <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                            Pre-booked private heated rooms across high camps, customized carbohydrate loading meals,
                            direct sat-phone check-ins twice daily, and private return charter transportation.
                        </p>
                    </div>
                    <div class="flex gap-2 pt-space-xs">
                        <button
                            class="flex-1 py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider rounded-lg transition-all shadow-md"
                            onclick="closeProjectModal(); openPlanCustomModal();">
                            Request Similar Itinerary
                        </button>
                        <button
                            class="px-space-md py-space-sm bg-surface-container-high hover:bg-surface-container text-on-surface font-label-md text-label-md font-semibold rounded-lg transition-colors"
                            onclick="closeProjectModal()">
                            Close
                        </button>
                    </div>
                </div>
            </div>
            <!-- Custom Group Planning Modal -->
            <div class="fixed inset-0 z-50 hidden flex items-center justify-center bg-ridge-deep/80 backdrop-blur-md p-space-md"
                id="plan-modal">
                <div
                    class="bg-surface-container-lowest rounded-xl max-w-lg w-full p-space-xl shadow-2xl relative space-y-space-md">
                    <button
                        class="absolute top-4 right-4 text-tertiary hover:text-on-surface p-space-2xs rounded-lg hover:bg-surface-container-high transition-colors"
                        onclick="closePlanCustomModal()">
                        <x-lucide-x class="size-[24px]" />
                    </button>
                    <div
                        class="flex items-center gap-space-xs text-primary font-label-sm text-label-sm font-bold uppercase tracking-wider">
                        <x-lucide-handshake class="size-[20px]" />
                        <span>Custom Team Trek Inquiry</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">
                        Organize a Custom Trek or Pass Project
                    </h3>
                    <p class="font-body-sm text-body-sm text-tertiary">
                        Fill out your club or team specifications. Our Chief Operations Sirdar will craft a custom
                        logistics plan within 24 hours.
                    </p>
                    <form class="space-y-space-sm pt-space-xs" onsubmit="handleCustomSubmit(event)">
                        <div>
                            <label
                                class="block font-label-sm text-label-sm font-semibold text-on-surface mb-space-2xs">Lead
                                Organizer / Contact Name</label>
                            <input
                                class="w-full px-space-md py-space-xs rounded-lg bg-surface-container-lowest text-on-surface shadow-sm focus:outline-none focus:ring-2 focus:ring-primary font-body-md"
                                placeholder="e.g. Alexey Volkov or Dr. Sarah Jenkins" required=""
                                type="text" />
                        </div>
                        <div class="grid grid-cols-2 gap-space-sm">
                            <div>
                                <label
                                    class="block font-label-sm text-label-sm font-semibold text-on-surface mb-space-2xs">Email</label>
                                <input
                                    class="w-full px-space-md py-space-xs rounded-lg bg-surface-container-lowest text-on-surface shadow-sm focus:outline-none focus:ring-2 focus:ring-primary font-body-md"
                                    placeholder="alexey@club.org" required="" type="email" />
                            </div>
                            <div>
                                <label
                                    class="block font-label-sm text-label-sm font-semibold text-on-surface mb-space-2xs">Team
                                    Country</label>
                                <input
                                    class="w-full px-space-md py-space-xs rounded-lg bg-surface-container-lowest text-on-surface shadow-sm focus:outline-none focus:ring-2 focus:ring-primary font-body-md"
                                    placeholder="e.g. Russia, UK, USA" required="" type="text" />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-space-sm">
                            <div>
                                <label
                                    class="block font-label-sm text-label-sm font-semibold text-on-surface mb-space-2xs">Target
                                    Route / Objective</label>
                                <select
                                    class="w-full px-space-md py-space-xs rounded-lg bg-surface-container-lowest text-on-surface shadow-sm focus:outline-none focus:ring-2 focus:ring-primary font-body-md">
                                    <option value="abc">Annapurna Sanctuary (ABC)</option>
                                    <option value="ebc">Everest Base Camp &amp; Gokyo</option>
                                    <option value="manaslu">Manaslu Circuit (Larkya La)</option>
                                    <option value="island">Island Pass / Mera Destination</option>
                                    <option value="amadablam">Ama Dablam Southwest Ridge</option>
                                    <option value="bespoke">Other / Custom Trek</option>
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block font-label-sm text-label-sm font-semibold text-on-surface mb-space-2xs">Estimated
                                    Team Size</label>
                                <select
                                    class="w-full px-space-md py-space-xs rounded-lg bg-surface-container-lowest text-on-surface shadow-sm focus:outline-none focus:ring-2 focus:ring-primary font-body-md">
                                    <option value="small">Small Team (2 - 5 Climbers)</option>
                                    <option selected="" value="medium">Club Group (6 - 12 Climbers)</option>
                                    <option value="large">Large Delegation (13 - 25+ Climbers)</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label
                                class="block font-label-sm text-label-sm font-semibold text-on-surface mb-space-2xs">Special
                                Language, Nutrition, or Timing Needs</label>
                            <textarea
                                class="w-full px-space-md py-space-xs rounded-lg bg-surface-container-lowest text-on-surface shadow-sm focus:outline-none focus:ring-2 focus:ring-primary font-body-md"
                                placeholder="e.g., Russian-speaking guide required, high-protein menu, January winter dates..." rows="2"></textarea>
                        </div>
                        <button
                            class="w-full py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider rounded-lg transition-all shadow-md mt-space-sm"
                            type="submit">
                            Request Custom Trek Proposal
                        </button>
                    </form>
                </div>
            </div>
            <!-- Inline Client Interaction Script -->

        </div>
    </main>
    <x-footer />
</x-layouts.app>
