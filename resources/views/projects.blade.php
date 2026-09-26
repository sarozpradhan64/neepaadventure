<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-48">
        <div class="flex w-full flex-col">
            <!-- 1. Immersive Editorial Hero -->
            <section class="bg-ridge-deep text-summit-white py-space-3xl lg:py-space-4xl px-gutter-mobile lg:px-gutter-desktop relative w-full overflow-hidden">
                <!-- Atmospheric Ambient Shapes -->
                <div class="bg-primary/10 pointer-events-none absolute -top-32 -right-32 h-96 w-96 rounded-full blur-3xl"></div>
                <div class="bg-secondary-fixed/5 pointer-events-none absolute bottom-0 left-1/4 h-80 w-80 rounded-full blur-3xl"></div>
                <div class="max-w-max-content-width relative z-10 mx-auto">
                    <!-- Eyebrow Tag -->
                    <div class="gap-space-xs px-space-md py-space-2xs bg-summit-white/10 mb-space-lg inline-flex items-center rounded-full shadow-sm backdrop-blur-md">
                        <span class="bg-primary-container h-2 w-2 animate-pulse rounded-full"></span>
                        <span class="font-badge-caption text-badge-caption text-primary-container tracking-[0.14em] uppercase">TREK LOGS &amp; SUCCESS STORIES • FIELD ARCHIVE</span>
                    </div>
                    <div class="gap-space-xl grid grid-cols-1 items-start lg:grid-cols-12">
                        <div class="space-y-space-md lg:col-span-8">
                            <h1 class="font-display-xl text-headline-lg lg:text-display-xl text-summit-white leading-[1.08] font-extrabold tracking-tight uppercase">
                                Completed Trek Projects &amp;
                                <span class="text-primary-container">Field Case Studies</span>
                            </h1>
                            <p class="font-body-lg text-body-lg text-mist-slate/90 max-w-2xl leading-relaxed">
                                Explore real trek dispatches, international team triumphs, and customized destination
                                projects orchestrated across Nepal's high Himalaya. From Annapurna Base Camp winter
                                traverses to 6,000m technical passes.
                            </p>
                            <div class="gap-space-sm pt-space-sm flex flex-wrap">
                                <a
                                    class="gap-space-xs px-space-lg py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md inline-flex items-center rounded-lg font-bold tracking-wider uppercase shadow-md transition-all hover:-translate-y-0.5"
                                    href="#flagship-case-study"
                                >
                                    <span>View Flagship Russian ABC Project</span>
                                    <x-lucide-arrow-down class="size-[18px]" />
                                </a>
                                <a
                                    class="gap-space-xs px-space-lg py-space-sm bg-summit-white/10 hover:bg-summit-white/20 text-summit-white font-label-md text-label-md inline-flex items-center rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                    href="#case-studies-grid"
                                >
                                    <x-lucide-folder-open class="size-[18px]" />
                                    <span>Browse All Team Dossiers</span>
                                </a>
                            </div>
                        </div>
                        <div class="gap-space-md bg-summit-white/5 p-space-lg flex flex-col rounded-xl shadow-xl backdrop-blur-md lg:col-span-4">
                            <div class="pb-space-xs flex items-center justify-between">
                                <span class="font-label-sm text-label-sm text-mist-slate font-semibold tracking-wider uppercase">Field Operations 2024–2025</span>
                                <span class="gap-space-2xs text-primary-container text-body-sm inline-flex items-center font-semibold">
                                    <x-lucide-shield-check class="size-[16px]" />100% Monitored
                                </span>
                            </div>
                            <div class="text-body-sm text-mist-slate/80 leading-relaxed">
                                Every custom trek is supported by a dedicated Kathmandu 24/7 Operations Room, Garmin
                                inReach high-cadence satellite breadcrumbs, and senior certified Sherpa Sirdars.
                            </div>
                            <div class="pt-space-2xs">
                                <div class="text-body-sm mb-space-2xs flex justify-between">
                                    <span class="text-mist-slate font-medium">Seasonal Pass &amp; Destination Success</span>
                                    <span class="text-primary-container font-bold">98.6%</span>
                                </div>
                                <div class="bg-summit-white/10 h-2.5 w-full overflow-hidden rounded-full">
                                    <div class="bg-primary-container h-full w-[98.6%] rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Quick Impact Metrics Banner -->
                    <div class="mt-space-2xl gap-space-md grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="bg-summit-white/10 p-space-lg flex flex-col justify-between rounded-xl shadow-sm backdrop-blur-md">
                            <div class="mb-space-xs flex items-center justify-between">
                                <x-lucide-compass class="text-primary-container size-[28px]" />
                                <span class="font-badge-caption text-badge-caption text-mist-slate tracking-wider uppercase">Field Completed</span>
                            </div>
                            <div>
                                <div class="font-display-xl text-headline-lg text-summit-white font-extrabold tracking-tight">
                                    420+
                                </div>
                                <div class="font-body-sm text-body-sm text-mist-slate/90 mt-space-2xs">
                                    Trek projects executed seamlessly
                                </div>
                            </div>
                        </div>
                        <div class="bg-summit-white/10 p-space-lg flex flex-col justify-between rounded-xl shadow-sm backdrop-blur-md">
                            <div class="mb-space-xs flex items-center justify-between">
                                <x-lucide-shield-check class="text-primary-container size-[28px]" />
                                <span class="font-badge-caption text-badge-caption text-mist-slate tracking-wider uppercase">High Pass &amp; Pass</span>
                            </div>
                            <div>
                                <div class="font-display-xl text-headline-lg text-summit-white font-extrabold tracking-tight">
                                    98.6%
                                </div>
                                <div class="font-body-sm text-body-sm text-mist-slate/90 mt-space-2xs">
                                    Team destination &amp; high pass arrival success
                                </div>
                            </div>
                        </div>
                        <div class="bg-summit-white/10 p-space-lg flex flex-col justify-between rounded-xl shadow-sm backdrop-blur-md">
                            <div class="mb-space-xs flex items-center justify-between">
                                <x-lucide-globe class="text-primary-container size-[28px]" />
                                <span class="font-badge-caption text-badge-caption text-mist-slate tracking-wider uppercase">Global Clubs</span>
                            </div>
                            <div>
                                <div class="font-display-xl text-headline-lg text-summit-white font-extrabold tracking-tight">
                                    38 Nations
                                </div>
                                <div class="font-body-sm text-body-sm text-mist-slate/90 mt-space-2xs">
                                    International alpine clubs &amp; private teams
                                </div>
                            </div>
                        </div>
                        <div class="bg-summit-white/10 p-space-lg flex flex-col justify-between rounded-xl shadow-sm backdrop-blur-md">
                            <div class="mb-space-xs flex items-center justify-between">
                                <x-lucide-shield-plus class="text-primary-container size-[28px]" />
                                <span class="font-badge-caption text-badge-caption text-mist-slate tracking-wider uppercase">Medical Protocol</span>
                            </div>
                            <div>
                                <div class="font-display-xl text-headline-lg text-summit-white font-extrabold tracking-tight">
                                    Zero
                                </div>
                                <div class="font-body-sm text-body-sm text-mist-slate/90 mt-space-2xs">
                                    Safety compromises or unhandled evacuations
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 3. Featured Flagship Project (Spotlight Case Study: Russian ABC Trek) -->
            <section
                class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full"
                id="flagship-case-study"
            >
                <div class="max-w-max-content-width mx-auto">
                    <div class="mb-space-xl gap-space-md flex flex-col justify-between md:flex-row md:items-end">
                        <div>
                            <div class="gap-space-2xs text-primary font-label-sm text-label-sm mb-space-2xs flex items-center font-bold tracking-widest uppercase">
                                <x-lucide-shield class="size-[18px]" />
                                <span>PROJECT #HK-2024-88 • RUSSIAN ALPINE CLUB (MOSCOW &amp; ST. PETERSBURG)</span>
                            </div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight uppercase">
                                Annapurna Base Camp (ABC) &amp; Machapuchare Sanctuary Winter Trek
                            </h2>
                        </div>
                        <div class="gap-space-xs bg-surface-container-high px-space-md py-space-xs text-on-surface font-label-sm text-label-sm flex items-center rounded-lg">
                            <x-lucide-map-pin class="text-primary size-[18px]" />
                            <span>Annapurna Sanctuary, Gandaki Province (4,130m / 13,550ft)</span>
                        </div>
                    </div>
                    <!-- Flagship Mosaic Card -->
                    <div class="bg-surface-container-lowest grid grid-cols-1 overflow-hidden rounded-xl shadow-xl lg:grid-cols-12">
                        <div class="relative min-h-[420px] lg:col-span-7 lg:min-h-full">
                            <img
                                class="h-full w-full object-cover"
                                data-alt="Russian Alpine Club trek team wearing orange and blue trekking jackets posing triumphantly with ice axes and Russian and Nepali pennants at Annapurna Base Camp signpost at 4,130m in winter with snow-draped Annapurna South and Machapuchare towering under brilliant morning sun."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAnL9l-H0YfeesYzXkqErSsdW_Va60OZOAQfieyI9Rp_O340YwB1LAc6nWz6j8cywQWouRXZ_nHF_zuouLSOgxkDlVbfo_xFzn5-JLbHbcQfSL0_TbK-DXlgOxAnT47gtEVKhOr1oR9yWfYEImHzJNcpH_OqWj2rYZMJEtkvUoMpJ7F60FZLdtzqi1-49Swk34zYeAEVDTXot5COnjC0gzbrIH2xlPtinHffLBifK4RvNNsrMLWE4m"
                            />
                            <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                                <span class="px-space-sm py-space-2xs bg-ridge-deep/90 text-summit-white font-badge-caption text-badge-caption flex items-center gap-1.5 rounded-lg tracking-wider uppercase backdrop-blur-md">
                                    <span class="bg-primary-container h-2 w-2 rounded-full"></span>
                                    🇷🇺 Russian Federation Team (12 Climbers)
                                </span>
                                <span class="px-space-sm py-space-2xs bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption rounded-lg font-bold tracking-wider uppercase">
                                    100% Team Arrival at 4,130m
                                </span>
                            </div>
                            <div class="bg-ridge-deep/85 p-space-sm text-summit-white text-body-sm absolute right-4 bottom-4 left-4 flex flex-wrap items-center justify-between gap-2 rounded-lg backdrop-blur-md">
                                <div class="flex items-center gap-2">
                                    <x-lucide-user class="text-primary-container size-[18px]" />
                                    <span><strong>Leader:</strong> Alexey Volkov</span>
                                    <span class="text-mist-slate/60">|</span>
                                    <span><strong>Lead Sirdar:</strong> Dawa Tenzing Sherpa</span>
                                </div>
                                <div class="text-primary-container font-label-sm text-label-sm flex items-center gap-1 font-semibold">
                                    <x-lucide-satellite class="size-[16px]" />
                                    <span>Garmin InReach Log: Verified 108.4km</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-space-xl space-y-space-md bg-surface-container-lowest flex flex-col justify-between lg:col-span-5">
                            <div class="space-y-space-md">
                                <div class="gap-space-xs text-tertiary font-body-sm text-body-sm flex items-center">
                                    <x-lucide-route class="text-primary size-[16px]" />
                                    <span>Custom Route: Nayapul • Ghorepani Poon Hill • Chhomrong • Deurali • ABC</span>
                                </div>
                                <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                    In deep January winter snowpack, the 12-member Russian Alpine Club tasked Neepa
                                    Adventure to execute a fast, high-security traverse into the Annapurna Sanctuary. We
                                    deployed micro-spikes and gaiters for all members, chartered private 4WD transit
                                    from Pokhara, and arranged private teahouse wing bookings.
                                </p>
                                <!-- Key Case Stats Grid -->
                                <div class="gap-space-sm py-space-xs bg-surface-container-low p-space-md grid grid-cols-3 rounded-lg text-center">
                                    <div>
                                        <div class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                            11 Days
                                        </div>
                                        <div class="font-body-sm text-body-sm text-tertiary">Total Itinerary</div>
                                    </div>
                                    <div>
                                        <div class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                            4,130m
                                        </div>
                                        <div class="font-body-sm text-body-sm text-tertiary">Max Elevation</div>
                                    </div>
                                    <div>
                                        <div class="font-headline-sm text-headline-sm text-primary font-bold">
                                            12 of 12
                                        </div>
                                        <div class="font-body-sm text-body-sm text-tertiary">Reached ABC</div>
                                    </div>
                                </div>
                                <!-- Solution Highlights -->
                                <div class="space-y-space-xs text-body-sm">
                                    <div class="font-label-sm text-label-sm text-on-surface font-bold tracking-wider uppercase">
                                        Trek Logistics Solved:
                                    </div>
                                    <ul class="text-tertiary space-y-1.5">
                                        <li class="flex items-start gap-2">
                                            <x-lucide-circle-check class="text-primary mt-0.5 size-[16px]" />
                                            <span
                                                ><strong>Native Russian Liaison:</strong> Russian-speaking Nepalese
                                                liaison officer handled all daily briefings, safety debriefs, and
                                                medical telemetry.</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <x-lucide-circle-check class="text-primary mt-0.5 size-[16px]" />
                                            <span
                                                ><strong>Tailored Alpine Menu:</strong> High-calorie beetroot borsch,
                                                hearty buckwheat, and traditional dal bhat fusion designed for sub-zero
                                                endurance.</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <x-lucide-circle-check class="text-primary mt-0.5 size-[16px]" />
                                            <span
                                                ><strong>Cold Weather Protocols:</strong> Dedicated hot-water bottle
                                                provisions, pulse oximeter twice daily, sub-zero sleeping bags, and zero
                                                frostbite.</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Client Leader Quote -->
                                <div class="p-space-sm bg-surface-container-high/60 border-primary rounded-lg border-l-4">
                                    <p class="font-body-sm text-body-sm text-on-surface italic">
                                        "Our Russian club has trekked across the Caucasus and Altai, but the winter
                                        organization by Dawa Sherpa and Neepa Adventure was unmatched. To have all 12
                                        climbers safely watch sunrise light up Annapurna I South Face was an
                                        unforgettable dream."
                                    </p>
                                    <div class="text-label-sm mt-2 flex items-center justify-between font-bold">
                                        <span class="text-on-surface">— Alexey Volkov, Moscow Trekking Federation</span>
                                        <span class="text-primary flex items-center gap-1"><x-lucide-shield-check class="size-[14px]" />Certified Case</span>
                                    </div>
                                </div>
                            </div>
                            <div class="gap-space-sm pt-space-xs flex flex-wrap">
                                <button
                                    class="gap-space-2xs px-space-md py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md inline-flex flex-1 items-center justify-center rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                    onclick="
                                        openProjectModal(
                                            'Russian Alpine Club - Annapurna Base Camp Winter Trek',
                                            '12 Russian Trekkers • Nayapul to ABC (4,130m) • January 2024',
                                        )
                                    "
                                >
                                    <x-lucide-file-text class="size-[18px]" />
                                    <span>Read Full Debrief Dossier</span>
                                </button>
                                <a
                                    class="px-space-md py-space-sm bg-surface-container-high hover:bg-surface-container text-on-surface font-label-md text-label-md inline-flex items-center justify-center rounded-lg font-semibold transition-colors"
                                    href="#custom-project-inquiry"
                                >
                                    <span>Plan Similar Trek</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 2. Categorized Trek Projects Directory -->
            <section
                class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface-container-low w-full"
                id="case-studies-grid"
            >
                <div class="max-w-max-content-width mx-auto">
                    <div class="mb-space-2xl space-y-space-xs mx-auto max-w-3xl text-center">
                        <span class="font-label-sm text-label-sm text-primary font-bold tracking-widest uppercase">Verified Client Treks &amp; Field Reports</span>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight uppercase">
                            Trek Projects Directory
                        </h2>
                        <p class="font-body-md text-body-md text-tertiary">
                            Discover how international trekking clubs, university alpine teams, and private groups
                            achieved their dream Himalayan destinations and traverses under Neepa Adventure leadership.
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
                                data-filter="annapurna"
                            >
                                Annapurna &amp; ABC
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs font-label-sm text-label-sm bg-surface-container-lowest text-tertiary hover:text-on-surface rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                data-filter="everest"
                            >
                                Everest &amp; Khumbu
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs font-label-sm text-label-sm bg-surface-container-lowest text-tertiary hover:text-on-surface rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                data-filter="manaslu"
                            >
                                Manaslu &amp; Circuits
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs font-label-sm text-label-sm bg-surface-container-lowest text-tertiary hover:text-on-surface rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                data-filter="trekking"
                            >
                                High Altitude Trekking &amp; Destinations
                            </button>
                            <button
                                class="filter-btn px-space-md py-space-xs font-label-sm text-label-sm bg-surface-container-lowest text-tertiary hover:text-on-surface rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                data-filter="corporate"
                            >
                                Corporate &amp; University
                            </button>
                        </div>
                        <!-- Secondary Filter / Quick Sort Row -->
                        <div class="pt-space-md text-body-sm text-tertiary border-surface-container-high/80 mt-space-md flex flex-wrap items-center justify-between gap-3 border-t">
                            <div class="flex items-center gap-2">
                                <x-lucide-filter class="text-primary size-[18px]" />
                                <span class="text-on-surface font-semibold">Showing 6 Verified Field Case Studies</span>
                            </div>
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="text-xs font-bold tracking-wider uppercase">Filter by Nation:</span>
                                <span class="bg-surface-container-lowest text-on-surface rounded px-2 py-1 text-xs font-semibold shadow-sm">🇷🇺 Russia</span>
                                <span class="bg-surface-container-lowest text-on-surface rounded px-2 py-1 text-xs font-semibold shadow-sm">🇬🇧 UK</span>
                                <span class="bg-surface-container-lowest text-on-surface rounded px-2 py-1 text-xs font-semibold shadow-sm">🇯🇵 Japan</span>
                                <span class="bg-surface-container-lowest text-on-surface rounded px-2 py-1 text-xs font-semibold shadow-sm">🇸🇪 Nordic</span>
                                <span class="bg-surface-container-lowest text-on-surface rounded px-2 py-1 text-xs font-semibold shadow-sm">🇩🇪 Germany</span>
                                <span class="bg-surface-container-lowest text-on-surface rounded px-2 py-1 text-xs font-semibold shadow-sm">🇺🇸 USA</span>
                            </div>
                        </div>
                    </div>
                    <!-- Project Cards Grid -->
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3" id="projects-grid">
                        @forelse ($projects as $project)
                            <div
                                class="project-item bg-surface-container-lowest flex flex-col overflow-hidden rounded-xl shadow-md transition-all hover:-translate-y-1"
                                data-category="{{ strtolower($project->category->name ?? '') }}"
                            >
                                <div class="relative h-56 w-full">
                                    <img
                                        class="h-full w-full object-cover"
                                        alt="{{ $project->title }}"
                                        src="{{ $project->featured_image ? asset('storage/' . $project->featured_image) : asset('images/placeholder.jpg') }}"
                                    />
                                    <span class="bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption px-space-sm py-space-2xs absolute top-3 left-3 flex items-center gap-1 rounded-md font-bold tracking-wider uppercase">
                                        Team {{ $project->nation }} &bull; {{ $project->team_size }}
                                    </span>
                                    <span class="bg-ridge-deep/80 text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs absolute right-3 bottom-3 rounded-md backdrop-blur-md">
                                        {{ $project->location ?? '' }}
                                    </span>
                                </div>
                                <div class="p-space-lg space-y-space-md flex flex-1 flex-col justify-between">
                                    <div>
                                        <div class="text-tertiary font-label-sm text-label-sm mb-space-2xs flex items-center justify-between font-semibold tracking-wider uppercase">
                                            <span>{{ $project->category->name ?? '' }}</span>
                                            <span class="text-primary font-bold">{{ $project->duration }}</span>
                                        </div>
                                        <h3 class="font-headline-sm text-headline-sm text-on-surface leading-snug font-bold tracking-tight">
                                            {{ $project->title }}
                                        </h3>
                                        <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                            {{ $project->short_description }}
                                        </p>
                                    </div>
                                    <div class="border-surface-container-high space-y-2 border-t pt-2">
                                        <div class="text-body-sm grid grid-cols-2 gap-2">
                                            <div class="text-tertiary">
                                                Max Altitude:
                                                <strong class="text-on-surface">{{ $project->max_altitude }}</strong>
                                            </div>
                                            <div class="text-tertiary">
                                                Destination Success:
                                                <strong class="text-primary">{{ $project->destination_success }}</strong>
                                            </div>
                                            <div class="text-tertiary">
                                                Lead By:
                                                <strong class="text-on-surface">{{ $project->lead_by }}</strong>
                                            </div>
                                            <div class="text-tertiary">
                                                Season: <strong class="text-on-surface">{{ $project->season }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg flex items-center justify-between">
                                        <button
                                            class="py-space-2xs px-space-sm bg-surface-container-high hover:bg-primary-container hover:text-on-primary-fixed font-label-sm text-label-sm text-on-surface inline-flex w-full items-center justify-center gap-1.5 rounded-lg font-bold transition-all"
                                            onclick="openProjectModal('{{ addslashes($project->dossier_title ?? $project->title) }}', '{{ addslashes($project->dossier_description ?? $project->short_description) }}', '{{ addslashes($project->client_name ?? '') }}', '{{ addslashes($project->lead_by ?? '') }}', '{{ addslashes($project->inclusions ?? '') }}')"
                                        >
                                            <x-lucide-eye class="size-[16px]" />
                                            <span>View Project Case Dossier</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-tertiary col-span-full py-12 text-center">No projects found.</div>
                        @endforelse
                    </div>
                </div>
            </section>
            <!-- 5. How We Structure Your Custom Team Project -->
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="mb-space-2xl space-y-space-xs mx-auto max-w-3xl text-center">
                        <span class="font-label-sm text-label-sm text-primary font-bold tracking-widest uppercase">Standard of Excellence for Custom Groups</span>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight uppercase">
                            How We Structure Your Custom Team Project
                        </h2>
                        <p class="font-body-md text-body-md text-tertiary">
                            Whether you lead an alpine trekking federation, university exploration society, or executive
                            group, our Kathmandu team engineers every logistics layer.
                        </p>
                    </div>
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                        <!-- Step 1 -->
                        <div class="p-space-lg bg-surface-container-lowest space-y-space-sm border-primary flex flex-col justify-between rounded-xl border-t-4 shadow-md">
                            <div class="space-y-space-xs">
                                <div class="bg-surface-container-high text-primary flex h-12 w-12 items-center justify-center rounded-lg">
                                    <x-lucide-timeline class="size-[28px]" />
                                </div>
                                <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-wider uppercase">Phase 01 • Custom Design</span>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Acclimatization Modeling
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Every route is tailored to your team's previous alpine exposure with customized
                                    sleep-low trek-high profiles and rest buffer days.
                                </p>
                            </div>
                            <div class="font-label-sm text-label-sm text-primary flex items-center gap-1 font-semibold">
                                <span>Custom Route Maps &amp; GPX</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Step 2 -->
                        <div class="p-space-lg bg-surface-container-lowest space-y-space-sm border-secondary flex flex-col justify-between rounded-xl border-t-4 shadow-md">
                            <div class="space-y-space-xs">
                                <div class="bg-surface-container-high text-primary flex h-12 w-12 items-center justify-center rounded-lg">
                                    <x-lucide-languages class="size-[28px]" />
                                </div>
                                <span class="font-badge-caption text-badge-caption text-secondary font-bold tracking-wider uppercase">Phase 02 • Cultural Liaison</span>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Native Language &amp; Nutrition
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    We provide guides fluent in Russian, French, German, or Japanese, alongside tailored
                                    dietary requirements for optimal field endurance.
                                </p>
                            </div>
                            <div class="font-label-sm text-label-sm text-secondary flex items-center gap-1 font-semibold">
                                <span>Multi-Language Briefings</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Step 3 -->
                        <div class="p-space-lg bg-surface-container-lowest space-y-space-sm border-amber-flare flex flex-col justify-between rounded-xl border-t-4 shadow-md">
                            <div class="space-y-space-xs">
                                <div class="bg-surface-container-high text-primary flex h-12 w-12 items-center justify-center rounded-lg">
                                    <x-lucide-satellite class="size-[28px]" />
                                </div>
                                <span class="font-badge-caption text-badge-caption text-amber-flare font-bold tracking-wider uppercase">Phase 03 • Real-Time Safety</span>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Satellite Comms &amp; Heli Desk
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Live Garmin inReach breadcrumb tracking paired with 24/7 Kathmandu operations room
                                    and standby high-altitude helicopter rescue insurance coordination.
                                </p>
                            </div>
                            <div class="font-label-sm text-label-sm text-amber-flare flex items-center gap-1 font-semibold">
                                <span>24/7 Active Field Dispatch</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Step 4 -->
                        <div class="p-space-lg bg-surface-container-lowest space-y-space-sm border-tertiary flex flex-col justify-between rounded-xl border-t-4 shadow-md">
                            <div class="space-y-space-xs">
                                <div class="bg-surface-container-high text-primary flex h-12 w-12 items-center justify-center rounded-lg">
                                    <x-lucide-award class="size-[28px]" />
                                </div>
                                <span class="font-badge-caption text-badge-caption text-tertiary font-bold tracking-wider uppercase">Phase 04 • Documentation</span>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Certificates &amp; 4K Media
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Official Nepal Trekking Association destination badges, high-pass crossing
                                    credentials, and curated 4K team trek photo vaults.
                                </p>
                            </div>
                            <div class="font-label-sm text-label-sm text-tertiary flex items-center gap-1 font-semibold">
                                <span>Official Certifications</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 6. Bottom Call to Action: Custom Project Inquiry -->
            <section
                class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-ridge-deep text-summit-white relative w-full overflow-hidden"
                id="custom-project-inquiry"
            >
                <div class="max-w-max-content-width space-y-space-lg relative z-10 mx-auto text-center">
                    <div class="gap-space-xs px-space-md py-space-2xs bg-summit-white/10 inline-flex items-center rounded-full backdrop-blur-md">
                        <x-lucide-handshake class="text-primary-container size-[18px]" />
                        <span class="font-badge-caption text-badge-caption text-primary-container tracking-wider uppercase">Bespoke Club &amp; Private Treks</span>
                    </div>
                    <h2 class="font-headline-lg text-headline-lg lg:text-display-xl text-summit-white mx-auto max-w-4xl leading-tight font-extrabold tracking-tight uppercase">
                        Planning a Private Trek or Club Project in Nepal?
                    </h2>
                    <p class="font-body-lg text-body-lg text-mist-slate/90 mx-auto max-w-2xl">
                        Whether organizing an Annapurna Base Camp team trek from Russia, a UK university alpine project,
                        or a bespoke 6,000m trekking push, consult directly with our Chief Trek Director.
                    </p>
                    <div class="gap-space-md pt-space-sm flex flex-wrap items-center justify-center">
                        <button
                            class="gap-space-xs px-space-xl py-space-md bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md inline-flex items-center rounded-lg font-bold tracking-wider uppercase shadow-xl transition-all hover:-translate-y-0.5"
                            onclick="openPlanCustomModal()"
                        >
                            <span>Plan a Custom Group Project</span>
                            <x-lucide-flag class="size-[20px]" />
                        </button>
                        <a
                            class="gap-space-xs px-space-xl py-space-md bg-summit-white/10 hover:bg-summit-white/20 text-summit-white font-label-md text-label-md inline-flex items-center rounded-lg font-bold tracking-wider uppercase shadow-md transition-all"
                            href="#"
                        >
                            <x-lucide-download class="size-[20px]" />
                            <span>Download Trek Case Study Guide (PDF)</span>
                        </a>
                    </div>
                    <div class="pt-space-lg gap-space-xl text-mist-slate/70 font-body-sm text-body-sm flex flex-wrap items-center justify-center">
                        <div class="gap-space-2xs flex items-center">
                            <x-lucide-shield class="text-primary-container size-[18px]" />
                            <span>Official Nepal Tourism Board Licensed Agency #89432</span>
                        </div>
                        <div class="gap-space-2xs flex items-center">
                            <x-lucide-headphones class="text-primary-container size-[18px]" />
                            <span>Direct Consultation with Lead Sherpa Operations Desk</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Case Study Detail Modal -->
            <div
                class="bg-ridge-deep/80 p-space-md fixed inset-0 z-50 flex hidden items-center justify-center backdrop-blur-md"
                id="case-study-modal"
            >
                <div class="bg-surface-container-lowest p-space-xl space-y-space-md relative max-h-[90vh] w-full max-w-xl overflow-y-auto rounded-xl shadow-2xl">
                    <button
                        class="text-tertiary hover:text-on-surface p-space-2xs hover:bg-surface-container-high absolute top-4 right-4 rounded-lg transition-colors"
                        onclick="closeProjectModal()"
                    >
                        <x-lucide-x class="size-[24px]" />
                    </button>
                    <div class="gap-space-xs text-primary font-label-sm text-label-sm flex items-center font-bold tracking-wider uppercase">
                        <x-lucide-folder-open class="size-[20px]" />
                        <span>Neepa Adventure Field Dossier</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold" id="modal-project-title">
                        Russian Alpine Club - Annapurna Base Camp
                    </h3>
                    <p class="font-body-sm text-body-sm text-tertiary" id="modal-project-desc">
                        Complete operational debrief, team roster, satellite track record, and altitude profile.
                    </p>
                    <div class="p-space-md bg-surface-container-low text-body-sm space-y-2 rounded-lg">
                        <div class="border-surface-container-high flex justify-between border-b pb-1">
                            <span class="text-tertiary">Trek ID:</span>
                            <span class="text-on-surface font-bold">HK-PROJECT-2024-EXP</span>
                        </div>
                        <div class="border-surface-container-high flex justify-between border-b pb-1">
                            <span class="text-tertiary">Team Origin:</span>
                            <span class="text-on-surface font-bold">International Club Registry</span>
                        </div>
                        <div class="border-surface-container-high flex justify-between border-b pb-1">
                            <span class="text-tertiary">Lead By:</span>
                            <span class="text-primary font-bold" id="modal-lead-by-name"
                                >Certified IFMGA / NMA Sherpa</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-tertiary">Medical Evacuations:</span>
                            <span class="text-on-surface font-bold">Zero (Full Vital Telemetry OK)</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="font-label-sm text-label-sm text-on-surface font-bold uppercase">
                            Logistical Feats Handled:
                        </div>
                        <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                            Pre-booked private heated rooms across high camps, customized carbohydrate loading meals,
                            direct sat-phone check-ins twice daily, and private return charter transportation.
                        </p>
                    </div>
                    <div class="pt-space-xs flex gap-2">
                        <button
                            class="py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md flex-1 rounded-lg font-bold tracking-wider uppercase shadow-md transition-all"
                            onclick="
                                closeProjectModal();
                                openPlanCustomModal();
                            "
                        >
                            Request Similar Itinerary
                        </button>
                        <button
                            class="px-space-md py-space-sm bg-surface-container-high hover:bg-surface-container text-on-surface font-label-md text-label-md rounded-lg font-semibold transition-colors"
                            onclick="closeProjectModal()"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
            <!-- Custom Group Planning Modal -->
            <div
                class="bg-ridge-deep/80 p-space-md fixed inset-0 z-50 flex hidden items-center justify-center backdrop-blur-md"
                id="plan-modal"
            >
                <div class="bg-surface-container-lowest p-space-xl space-y-space-md relative w-full max-w-lg rounded-xl shadow-2xl">
                    <button
                        class="text-tertiary hover:text-on-surface p-space-2xs hover:bg-surface-container-high absolute top-4 right-4 rounded-lg transition-colors"
                        onclick="closePlanCustomModal()"
                    >
                        <x-lucide-x class="size-[24px]" />
                    </button>
                    <div class="gap-space-xs text-primary font-label-sm text-label-sm flex items-center font-bold tracking-wider uppercase">
                        <x-lucide-handshake class="size-[20px]" />
                        <span>Custom Team Trek Inquiry</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                        Organize a Custom Trek or Pass Project
                    </h3>
                    <p class="font-body-sm text-body-sm text-tertiary">
                        Fill out your club or team specifications. Our Chief Operations Sirdar will craft a custom
                        logistics plan within 24 hours.
                    </p>
                    <form class="space-y-space-sm pt-space-xs" onsubmit="handleCustomSubmit(event)">
                        <div>
                            <label class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Lead Organizer / Contact Name</label>
                            <input
                                class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none"
                                placeholder="e.g. Alexey Volkov or Dr. Sarah Jenkins"
                                required=""
                                type="text"
                            />
                        </div>
                        <div class="gap-space-sm grid grid-cols-2">
                            <div>
                                <label class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Email</label>
                                <input
                                    class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none"
                                    placeholder="alexey@club.org"
                                    required=""
                                    type="email"
                                />
                            </div>
                            <div>
                                <label class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Team Country</label>
                                <input
                                    class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none"
                                    placeholder="e.g. Russia, UK, USA"
                                    required=""
                                    type="text"
                                />
                            </div>
                        </div>
                        <div class="gap-space-sm grid grid-cols-2">
                            <div>
                                <label class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Target Route / Objective</label>
                                <select class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none">
                                    <option value="abc">Annapurna Sanctuary (ABC)</option>
                                    <option value="ebc">Everest Base Camp &amp; Gokyo</option>
                                    <option value="manaslu">Manaslu Circuit (Larkya La)</option>
                                    <option value="island">Island Pass / Mera Destination</option>
                                    <option value="amadablam">Ama Dablam Southwest Ridge</option>
                                    <option value="bespoke">Other / Custom Trek</option>
                                </select>
                            </div>
                            <div>
                                <label class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Estimated Team Size</label>
                                <select class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none">
                                    <option value="small">Small Team (2 - 5 Climbers)</option>
                                    <option selected="" value="medium">Club Group (6 - 12 Climbers)</option>
                                    <option value="large">Large Delegation (13 - 25+ Climbers)</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Special Language, Nutrition, or Timing Needs</label>
                            <textarea
                                class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none"
                                placeholder="e.g., Russian-speaking guide required, high-protein menu, January winter dates..."
                                rows="2"
                            ></textarea>
                        </div>
                        <button
                            class="py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md mt-space-sm w-full rounded-lg font-bold tracking-wider uppercase shadow-md transition-all"
                            type="submit"
                        >
                            Request Custom Trek Proposal
                        </button>
                    </form>
                </div>
            </div>
            <!-- Inline Client Interaction Script -->
            <script>
                function openProjectModal(title, desc, client, lead_by, inclusions) {
                    const modal = document.getElementById('case-study-modal');
                    if (modal) {
                        document.getElementById('modal-project-title').innerText = title || '';
                        document.getElementById('modal-project-desc').innerText = desc || '';

                        // Let's populate the dynamic info list if it exists
                        // You can extend the modal HTML to include these fields with IDs
                        const clientEl = document.getElementById('modal-client-name');
                        if (clientEl) clientEl.innerText = client || 'International Club Registry';

                        const sirdarEl = document.getElementById('modal-lead-by-name');
                        if (sirdarEl) sirdarEl.innerText = lead_by || 'Certified IFMGA / NMA Sherpa';

                        modal.classList.remove('hidden');
                    }
                }

                function closeProjectModal() {
                    const modal = document.getElementById('case-study-modal');
                    if (modal) {
                        modal.classList.add('hidden');
                    }
                }

                function openPlanCustomModal() {
                    const modal = document.getElementById('plan-modal');
                    if (modal) modal.classList.remove('hidden');
                }

                function closePlanCustomModal() {
                    const modal = document.getElementById('plan-modal');
                    if (modal) modal.classList.add('hidden');
                }

                function handleCustomSubmit(e) {
                    e.preventDefault();
                    alert('Custom Trek Proposal requested!');
                    closePlanCustomModal();
                }
            </script>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
