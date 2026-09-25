<x-layouts.app>
    <x-header />
    <main class="w-full pt-20 bg-surface">
        <div class="flex flex-col w-full">
            <!-- Top Alpine Announcement & Status Ribbon -->
            <section class="w-full bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop py-space-sm">
                <div
                    class="max-w-max-content-width mx-auto flex flex-col md:flex-row items-start md:items-center justify-between gap-space-xs text-body-sm">
                    <nav aria-label="Breadcrumbs"
                        class="flex items-center gap-space-xs font-label-sm text-label-sm text-tertiary">
                        <a class="hover:text-primary transition-colors" data-path="home" href="#">Home</a>
                        <x-lucide-chevron-right class="size-[14px]" />
                        <span class="text-on-surface font-semibold">Treks &amp; Expeditions</span>
                        <x-lucide-chevron-right class="size-[14px]" />
                        <span class="text-on-surface-variant">2025/2026 Himalayan Catalog</span>
                    </nav>
                    <div class="flex items-center gap-space-md">
                        <span
                            class="inline-flex items-center gap-1.5 font-badge-caption text-badge-caption px-2.5 py-1 rounded bg-surface-container-highest text-tertiary">
                            <span class="w-2 h-2 rounded-full bg-amber-flare animate-pulse"></span>
                            AUTUMN &amp; SPRING BOOKINGS OPEN
                        </span>
                        <span class="hidden lg:inline text-tertiary">Garmin InReach v2 Satellite Monitoring on All
                            Trails</span>
                    </div>
                </div>
            </section>
            <!-- Title & High-Altitude Context Banner -->
            <section
                class="w-full bg-surface-container-lowest px-gutter-mobile lg:px-gutter-desktop py-space-xl shadow-sm">
                <div class="max-w-max-content-width mx-auto">
                    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-lg">
                        <div class="space-y-space-xs max-w-3xl">
                            <div
                                class="inline-flex items-center gap-space-xs text-primary font-label-sm text-label-sm tracking-widest uppercase">
                                <x-lucide-mountain class="size-[18px]" />
                                Authentic Sherpa-Led Circuits &amp; High Passes
                            </div>
                            <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                                Nepal Trekking Expeditions &amp; Classic High Passes
                            </h1>
                            <p class="font-body-lg text-body-lg text-tertiary">
                                Curated, low-impact alpine journeys through sacred glacial basins, ancient
                                trans-Himalayan trade trails, and legendary 5,000m+ passes.
                            </p>
                        </div>
                        <!-- Season & Availability Quick Indicator -->
                        <div
                            class="bg-surface-container-low rounded-xl p-space-md flex items-center gap-space-md min-w-[280px]">
                            <div
                                class="w-12 h-12 rounded-lg bg-primary-container text-on-primary-container flex items-center justify-center">
                                <x-lucide-sun class="size-[26px]" />
                            </div>
                            <div>
                                <div
                                    class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">
                                    Current Window</div>
                                <div class="font-headline-sm text-headline-sm font-semibold text-on-surface">Spring
                                    &amp; Autumn Peak</div>
                                <div class="font-body-sm text-body-sm text-tertiary" id="catalog-count-indicator">
                                    Showing 6 verified routes (18 total)</div>
                            </div>
                        </div>
                    </div>
                    <!-- Trust Assurance Strip -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md pt-space-xl mt-space-lg">
                        <div class="flex items-center gap-space-sm p-space-sm bg-surface rounded-lg">
                            <x-lucide-shield-check class="text-primary size-[28px]" />
                            <div>
                                <span class="block font-label-md text-label-md font-bold text-on-surface">100%
                                    Guaranteed</span>
                                <span class="block font-body-sm text-body-sm text-tertiary">Every scheduled departure
                                    runs</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-space-sm p-space-sm bg-surface rounded-lg">
                            <x-lucide-refresh-cw class="text-primary size-[28px]" />
                            <div>
                                <span class="block font-label-md text-label-md font-bold text-on-surface">Free Date
                                    Shifting</span>
                                <span class="block font-body-sm text-body-sm text-tertiary">Modify up to 45 days
                                    prior</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-space-sm p-space-sm bg-surface rounded-lg">
                            <x-lucide-satellite class="text-primary size-[28px]" />
                            <div>
                                <span class="block font-label-md text-label-md font-bold text-on-surface">Satellite SOS
                                    Included</span>
                                <span class="block font-body-sm text-body-sm text-tertiary">Garmin inReach + 24/7
                                    MedLink</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-space-sm p-space-sm bg-surface rounded-lg">
                            <x-lucide-users class="text-primary size-[28px]" />
                            <div>
                                <span class="block font-label-md text-label-md font-bold text-on-surface">Small Team
                                    Ratio</span>
                                <span class="block font-body-sm text-body-sm text-tertiary">Maximum 8 trekkers per
                                    group</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Facet / Filtering Command Bar -->
            <section
                class="sticky top-20 z-40 w-full bg-surface-container-lowest shadow-md py-space-sm px-gutter-mobile lg:px-gutter-desktop">
                <div class="max-w-max-content-width mx-auto space-y-space-sm">
                    <div class="flex flex-wrap items-center justify-between gap-space-sm">
                        <!-- Search input -->
                        <div class="relative flex-1 min-w-[240px] max-w-md">
                            <x-lucide-search
                                class="absolute left-3 top-1/2 -translate-y-1/2 text-tertiary size-[20px]" />
                            <input
                                class="w-full pl-10 pr-space-md py-2.5 bg-surface rounded-lg text-body-md text-on-surface placeholder:text-tertiary focus:outline-none focus:bg-surface-container-low transition-all"
                                id="search-input" placeholder="Search passes, valleys, peaks (e.g. Larkya La, Gokyo)..."
                                type="text" />
                        </div>
                        <!-- Filter Selectors -->
                        <div class="flex flex-wrap items-center gap-space-xs">
                            <!-- Region Select -->
                            <div class="relative">
                                <select
                                    class="appearance-none bg-surface hover:bg-surface-container text-on-surface px-space-md py-2 pr-8 rounded-lg font-label-md text-label-md cursor-pointer transition-colors focus:outline-none"
                                    id="region-filter">
                                    <option value="all">All Himalayan Regions</option>
                                    <option value="khumbu">Everest &amp; Khumbu</option>
                                    <option value="annapurna">Annapurna &amp; Mustang</option>
                                    <option value="manaslu">Manaslu &amp; Ganesh Himal</option>
                                    <option value="langtang">Langtang &amp; Helambu</option>
                                    <option value="eastern">Far-Eastern (Kanchenjunga)</option>
                                </select>
                                <x-lucide-chevron-down
                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none text-tertiary size-[18px]" />
                            </div>
                            <!-- Duration Select -->
                            <div class="relative">
                                <select
                                    class="appearance-none bg-surface hover:bg-surface-container text-on-surface px-space-md py-2 pr-8 rounded-lg font-label-md text-label-md cursor-pointer transition-colors focus:outline-none"
                                    id="duration-filter">
                                    <option value="all">Any Duration</option>
                                    <option value="7-12">7 - 12 Days</option>
                                    <option value="13-17">13 - 17 Days</option>
                                    <option value="18-24">18+ Days</option>
                                </select>
                                <x-lucide-chevron-down
                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none text-tertiary size-[18px]" />
                            </div>
                            <!-- Max Altitude Select -->
                            <div class="relative">
                                <select
                                    class="appearance-none bg-surface hover:bg-surface-container text-on-surface px-space-md py-2 pr-8 rounded-lg font-label-md text-label-md cursor-pointer transition-colors focus:outline-none"
                                    id="altitude-filter">
                                    <option value="all">Altitude (All)</option>
                                    <option value="sub-4000">Up to 4,000m</option>
                                    <option value="sub-5200">Up to 5,200m</option>
                                    <option value="high-pass">5,300m+ High Passes</option>
                                </select>
                                <x-lucide-chevron-down
                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none text-tertiary size-[18px]" />
                            </div>
                            <!-- Sort Selector -->
                            <div class="relative">
                                <select
                                    class="appearance-none bg-surface-container text-on-surface-variant font-semibold px-space-md py-2 pr-8 rounded-lg font-label-md text-label-md cursor-pointer transition-colors focus:outline-none"
                                    id="sort-selector">
                                    <option value="popular">Sort: Most Popular</option>
                                    <option value="price-asc">Price: Low to High</option>
                                    <option value="duration-desc">Duration: Longest</option>
                                    <option value="altitude-desc">Highest Altitude</option>
                                </select>
                                <x-lucide-arrow-down-up
                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none text-tertiary size-[18px]" />
                            </div>
                            <button
                                class="p-2 text-tertiary hover:text-on-surface hover:bg-surface-container rounded-lg transition-colors"
                                id="reset-filters" title="Reset Filters">
                                <x-lucide-rotate-ccw class="size-[20px]" />
                            </button>
                        </div>
                    </div>
                    <!-- Quick Category / Season Toggles -->
                    <div class="flex flex-wrap items-center gap-space-xs pt-space-2xs text-label-sm font-label-sm">
                        <span class="text-tertiary font-bold tracking-wider uppercase pr-2">Difficulty:</span>
                        <button
                            class="difficulty-pill active-pill px-3 py-1 rounded bg-surface-container-high text-on-surface font-semibold"
                            data-difficulty="all">All</button>
                        <button
                            class="difficulty-pill px-3 py-1 rounded bg-surface text-tertiary hover:text-on-surface transition-colors"
                            data-difficulty="Moderate">Moderate (3/5)</button>
                        <button
                            class="difficulty-pill px-3 py-1 rounded bg-surface text-tertiary hover:text-on-surface transition-colors"
                            data-difficulty="Demanding">Demanding (4/5)</button>
                        <button
                            class="difficulty-pill px-3 py-1 rounded bg-surface text-tertiary hover:text-on-surface transition-colors"
                            data-difficulty="Alpine Strenuous">Alpine Strenuous (5/5)</button>
                        <div class="h-4 w-px bg-surface-container-highest mx-2 hidden sm:block"></div>
                        <span
                            class="text-tertiary font-bold tracking-wider uppercase pr-2 hidden sm:inline">Season:</span>
                        <button
                            class="season-pill px-3 py-1 rounded bg-surface text-tertiary hover:text-on-surface transition-colors"
                            data-season="autumn">Autumn (Clear Skies)</button>
                        <button
                            class="season-pill px-3 py-1 rounded bg-surface text-tertiary hover:text-on-surface transition-colors"
                            data-season="spring">Spring (Rhododendrons)</button>
                        <button
                            class="season-pill px-3 py-1 rounded bg-surface text-tertiary hover:text-on-surface transition-colors"
                            data-season="mustang">Monsoon-Proof (Mustang)</button>
                    </div>
                </div>
            </section>
            <!-- Interactive Trek Recommendation Quiz Banner ("Find My Perfect Trek") -->
            <section class="w-full px-gutter-mobile lg:px-gutter-desktop py-space-xl">
                <div class="max-w-max-content-width mx-auto">
                    <div
                        class="bg-surface-container-lowest rounded-xl p-space-lg lg:p-space-xl shadow-sm relative overflow-hidden">
                        <div
                            class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-primary/5 pointer-events-none">
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-center">
                            <div class="lg:col-span-4 space-y-space-xs">
                                <div
                                    class="inline-flex items-center gap-space-2xs text-primary font-label-sm text-label-sm font-bold uppercase tracking-wider">
                                    <x-lucide-compass class="size-[18px]" />
                                    Interactive Expedition Matcher
                                </div>
                                <h2 class="font-headline-md text-headline-md text-on-surface font-bold">
                                    Find My Perfect Trek
                                </h2>
                                <p class="font-body-md text-body-md text-tertiary">
                                    Answer 3 quick high-altitude preferences to isolate your optimal trail,
                                    acclimatization curve, and seasonal timing.
                                </p>
                            </div>
                            <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-3 gap-space-md">
                                <!-- Step 1 -->
                                <div class="bg-surface p-space-md rounded-lg space-y-space-xs">
                                    <div class="flex items-center justify-between">
                                        <span class="font-badge-caption text-badge-caption text-primary font-bold">STEP
                                            01</span>
                                        <x-lucide-footprints class="text-tertiary size-[18px]" />
                                    </div>
                                    <label class="font-label-md text-label-md font-bold text-on-surface block"
                                        for="quiz-experience">Alpine Experience</label>
                                    <select
                                        class="w-full bg-surface-container-lowest text-body-sm text-on-surface p-2 rounded focus:outline-none"
                                        id="quiz-experience">
                                        <option value="first">First Himalayan Trek</option>
                                        <option value="regular">Multi-Day Hiker (Up to 4,000m)</option>
                                        <option value="hardcore">Experienced Mountaineer / High Passes</option>
                                    </select>
                                </div>
                                <!-- Step 2 -->
                                <div class="bg-surface p-space-md rounded-lg space-y-space-xs">
                                    <div class="flex items-center justify-between">
                                        <span class="font-badge-caption text-badge-caption text-primary font-bold">STEP
                                            02</span>
                                        <x-lucide-calendar-days class="text-tertiary size-[18px]" />
                                    </div>
                                    <label class="font-label-md text-label-md font-bold text-on-surface block"
                                        for="quiz-time">Available Days</label>
                                    <select
                                        class="w-full bg-surface-container-lowest text-body-sm text-on-surface p-2 rounded focus:outline-none"
                                        id="quiz-time">
                                        <option value="under12">Under 12 Days</option>
                                        <option value="two-weeks">12 to 16 Days</option>
                                        <option value="three-weeks">17 to 25 Days</option>
                                    </select>
                                </div>
                                <!-- Step 3 -->
                                <div class="bg-surface p-space-md rounded-lg space-y-space-xs">
                                    <div class="flex items-center justify-between">
                                        <span class="font-badge-caption text-badge-caption text-primary font-bold">STEP
                                            03</span>
                                        <x-lucide-mountain-snow class="text-tertiary size-[18px]" />
                                    </div>
                                    <label class="font-label-md text-label-md font-bold text-on-surface block"
                                        for="quiz-scenery">Preferred Vibe</label>
                                    <select
                                        class="w-full bg-surface-container-lowest text-body-sm text-on-surface p-2 rounded focus:outline-none"
                                        id="quiz-scenery">
                                        <option value="classic-peaks">Dramatic Glaciers &amp; 8,000m Giants</option>
                                        <option value="isolated-wild">Remote Wilds &amp; Low Footfall</option>
                                        <option value="culture-monastery">Tibetan Buddhist Enclaves</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div
                            class="mt-space-md pt-space-md bg-surface-container-low/40 rounded-lg p-space-sm flex flex-col sm:flex-row items-center justify-between gap-space-sm">
                            <div class="flex items-center gap-space-xs text-body-sm text-tertiary">
                                <x-lucide-sparkles class="text-primary size-[18px]" />
                                <span id="quiz-recommendation-text">Based on default inputs: <strong>Everest Base Camp
                                        &amp; Gokyo Ri (16 Days)</strong> is your top algorithmic match.</span>
                            </div>
                            <button
                                class="px-space-md py-2 bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-sm text-label-sm font-bold uppercase tracking-wider rounded transition-colors whitespace-nowrap"
                                id="apply-recommendation-btn">
                                Highlight My Match
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Curated Trek Grid Catalog -->
            <section class="w-full px-gutter-mobile lg:px-gutter-desktop py-space-lg">
                <div class="max-w-max-content-width mx-auto">
                    <!-- Active Results Counter & Metric Grid -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pb-space-lg">
                        <div>
                            <span class="font-headline-sm text-headline-sm font-bold text-on-surface">Curated Trekking
                                Expeditions</span>
                            <span class="ml-2 font-body-sm text-body-sm text-tertiary">(Standard &amp; Luxury Teahouse
                                Treks)</span>
                        </div>
                        <div class="flex items-center gap-space-md font-body-sm text-body-sm text-tertiary">
                            <span class="flex items-center gap-1"><span
                                    class="w-2.5 h-2.5 rounded-full bg-primary"></span> High Pass</span>
                            <span class="flex items-center gap-1"><span
                                    class="w-2.5 h-2.5 rounded-full bg-secondary"></span> Circuit</span>
                            <span class="flex items-center gap-1"><span
                                    class="w-2.5 h-2.5 rounded-full bg-amber-flare"></span> Sanctuary / Basin</span>
                        </div>
                    </div>
                    <!-- Main Cards Container -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-lg" id="trek-cards-grid">
                        @foreach($treks as $trek)
                        <article class="trek-card group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between" data-altitude="{{ (int) filter_var($trek->maximum_altitude, FILTER_SANITIZE_NUMBER_INT) }}" data-difficulty="{{ $trek->difficulty_level }}" data-duration="{{ (int) filter_var($trek->duration, FILTER_SANITIZE_NUMBER_INT) }}" data-id="{{ $trek->id }}" data-price="{{ $trek->price_from }}">
                            <div>
                                <div class="relative h-64 w-full overflow-hidden bg-surface-dim">
                                    @if($trek->featuredImage)
                                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $trek->title }}" src="{{ asset('storage/' . $trek->featuredImage->path) }}" />
                                    @else
                                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $trek->title }}" src="" />
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-on-surface/80 via-transparent to-transparent"></div>
                                    <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
                                        <span class="px-2.5 py-1 bg-amber-flare text-on-primary-fixed font-badge-caption text-badge-caption font-bold rounded uppercase">Trek</span>
                                    </div>
                                    <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-summit-white">
                                        <div class="flex items-center gap-1 font-label-sm text-label-sm uppercase tracking-wider">
                                            <x-lucide-map-pin class="size-[16px] text-primary-container" />
                                            {{ $trek->start_end_point }}
                                        </div>
                                        <div class="font-badge-caption text-badge-caption bg-surface-container-lowest/20 backdrop-blur-md px-2 py-0.5 rounded text-summit-white">
                                            {{ $trek->duration }}
                                        </div>
                                    </div>
                                </div>
                                <div class="p-space-lg space-y-space-md">
                                    <div>
                                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors">{{ $trek->title }}</h3>
                                        <div class="font-body-md text-body-md text-tertiary line-clamp-2 mt-1">{!! strip_tags($trek->description) !!}</div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-2 py-space-xs bg-surface rounded-lg p-2 text-center">
                                        <div>
                                            <span class="block font-badge-caption text-badge-caption text-tertiary uppercase">Grade</span>
                                            <span class="block font-label-md text-label-md font-bold text-on-surface">{{ ucfirst($trek->difficulty_level) }}</span>
                                        </div>
                                        <div class="border-l border-surface-container">
                                            <span class="block font-badge-caption text-badge-caption text-tertiary uppercase">Group Size</span>
                                            <span class="block font-label-md text-label-md font-bold text-on-surface">Max {{ $trek->max_group_size }}</span>
                                        </div>
                                        <div class="border-l border-surface-container">
                                            <span class="block font-badge-caption text-badge-caption text-tertiary uppercase">Pass/Alt</span>
                                            <span class="block font-label-md text-label-md font-bold text-primary">{{ $trek->maximum_altitude }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-space-lg pt-0 space-y-space-sm">
                                <div class="flex items-baseline justify-between pt-space-xs border-t border-surface-container">
                                    <div>
                                        <span class="font-body-sm text-body-sm text-tertiary block">All-inclusive from</span>
                                        <div class="flex items-baseline gap-1">
                                            <span class="font-headline-md text-headline-md font-bold text-on-surface">${{ number_format($trek->price_from, 2) }}</span>
                                            <span class="font-body-sm text-body-sm text-tertiary">USD / person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-space-xs">
                                    <a class="w-full py-2.5 px-3 bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-sm text-label-sm font-bold uppercase tracking-wider rounded text-center transition-colors" href="{{ route('trek-detail', $trek->slug) }}">
                                        Itinerary
                                    </a>
                                    <button class="quick-book-btn w-full py-2.5 px-3 bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-sm text-label-sm font-bold uppercase tracking-wider rounded text-center transition-colors shadow-sm">
                                        Dates &amp; Book
                                    </button>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                    <!-- No Results State (Hidden by default) -->
                    <div class="hidden text-center py-space-3xl space-y-space-md bg-surface-container-lowest rounded-xl"
                        id="no-results-state">
                        <x-lucide-map class="size-[54px] text-tertiary" />
                        <div class="max-w-md mx-auto space-y-space-xs">
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">No matching
                                expeditions found</h3>
                            <p class="font-body-md text-body-md text-tertiary">
                                Try loosening your altitude or duration filters, or request a custom bespoke itinerary
                                crafted by our Sherpa team.
                            </p>
                            <button
                                class="mt-space-sm px-space-lg py-space-xs bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-sm text-label-sm font-bold rounded"
                                id="clear-all-filters-btn">
                                Reset All Filters
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Departure Date Quick-Booking Modal -->
            <div class="fixed inset-0 z-50 hidden bg-ridge-deep/70 backdrop-blur-sm flex items-center justify-center p-gutter-mobile"
                id="booking-modal">
                <div
                    class="bg-surface-container-lowest rounded-xl max-w-xl w-full p-space-lg lg:p-space-xl shadow-2xl relative space-y-space-md animate-in fade-in zoom-in duration-200">
                    <div class="flex items-start justify-between">
                        <div>
                            <span
                                class="font-badge-caption text-badge-caption text-primary font-bold uppercase">Expedition
                                Reservation</span>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface"
                                id="modal-trek-name">Select Departure Dates</h3>
                            <p class="font-body-sm text-body-sm text-tertiary">Fixed group departures with maximum 8
                                mountaineers per team.</p>
                        </div>
                        <button
                            class="p-1.5 rounded-lg text-tertiary hover:text-on-surface hover:bg-surface-container transition-colors"
                            id="close-modal-btn">
                            <x-lucide-x class="size-4" />
                        </button>
                    </div>
                    <div class="space-y-space-xs">
                        <span class="font-label-md text-label-md font-bold text-on-surface block">Upcoming 2025/2026
                            Guaranteed Slots</span>
                        <div class="space-y-2 max-h-56 overflow-y-auto pr-1">
                            <label
                                class="flex items-center justify-between p-3 rounded-lg bg-surface hover:bg-surface-container-low cursor-pointer transition-colors border border-transparent has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                                <div class="flex items-center gap-space-sm">
                                    <input checked="" class="text-primary focus:ring-0 w-4 h-4"
                                        name="departure-slot" type="radio" />
                                    <div>
                                        <span class="font-label-md text-label-md font-bold text-on-surface block">Oct
                                            04, 2025 – Oct 19, 2025</span>
                                        <span class="font-body-sm text-body-sm text-tertiary">Prime Autumn Visibility •
                                            3 Spots Open</span>
                                    </div>
                                </div>
                                <span class="font-label-md text-label-md font-bold text-on-surface"
                                    id="modal-price-slot-1">$1,750</span>
                            </label>
                            <label
                                class="flex items-center justify-between p-3 rounded-lg bg-surface hover:bg-surface-container-low cursor-pointer transition-colors border border-transparent has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                                <div class="flex items-center gap-space-sm">
                                    <input class="text-primary focus:ring-0 w-4 h-4" name="departure-slot"
                                        type="radio" />
                                    <div>
                                        <span class="font-label-md text-label-md font-bold text-on-surface block">Nov
                                            01, 2025 – Nov 16, 2025</span>
                                        <span class="font-body-sm text-body-sm text-tertiary">Crystal Clear Passes • 5
                                            Spots Open</span>
                                    </div>
                                </div>
                                <span class="font-label-md text-label-md font-bold text-on-surface"
                                    id="modal-price-slot-2">$1,750</span>
                            </label>
                            <label
                                class="flex items-center justify-between p-3 rounded-lg bg-surface hover:bg-surface-container-low cursor-pointer transition-colors border border-transparent has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                                <div class="flex items-center gap-space-sm">
                                    <input class="text-primary focus:ring-0 w-4 h-4" name="departure-slot"
                                        type="radio" />
                                    <div>
                                        <span class="font-label-md text-label-md font-bold text-on-surface block">Apr
                                            12, 2026 – Apr 27, 2026</span>
                                        <span class="font-body-sm text-body-sm text-tertiary">Rhododendron Bloom • 6
                                            Spots Open</span>
                                    </div>
                                </div>
                                <span class="font-label-md text-label-md font-bold text-on-surface"
                                    id="modal-price-slot-3">$1,750</span>
                            </label>
                        </div>
                    </div>
                    <div class="pt-space-xs space-y-space-xs">
                        <div class="flex justify-between font-body-sm text-body-sm text-tertiary">
                            <span>Refundable Deposit (Pay later):</span>
                            <span class="font-bold text-on-surface">$250 USD</span>
                        </div>
                        <div class="flex items-center gap-space-xs text-badge-caption text-badge-caption text-primary">
                            <x-lucide-lock-keyhole class="size-[16px]" />
                            Zero charge until your Sherpa Lead confirms medical suitability.
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-space-sm pt-space-xs">
                        <button
                            class="px-space-md py-2.5 rounded font-label-md text-label-md text-tertiary hover:text-on-surface transition-colors"
                            id="cancel-modal-btn">
                            Cancel
                        </button>
                        <button
                            class="px-space-lg py-2.5 rounded bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider transition-colors shadow-sm"
                            id="confirm-booking-btn">
                            Reserve Provisional Spot
                        </button>
                    </div>
                </div>
            </div>
            <!-- Custom Tailored Expedition Consultation Strip -->
            <section class="w-full bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop py-space-2xl">
                <div class="max-w-max-content-width mx-auto">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
                        <div class="lg:col-span-8 space-y-space-sm">
                            <span
                                class="font-badge-caption text-badge-caption text-primary font-bold uppercase tracking-wider">Private
                                &amp; Tailor-Made Treks</span>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold">
                                Need a Private Alpine Itinerary or Heli-Shuttle Return?
                            </h2>
                            <p class="font-body-lg text-body-lg text-tertiary max-w-2xl">
                                We regularly curate bespoke high passes, luxury heli-out charters, and custom
                                acclimatization timelines for private parties, climbing clubs, and solo alpine
                                photographers.
                            </p>
                            <div
                                class="flex flex-wrap items-center gap-space-md pt-space-xs font-body-sm text-body-sm text-on-surface-variant">
                                <span class="flex items-center gap-1"><x-lucide-shield-check
                                        class="text-primary size-[18px]" />
                                    Custom Dietary Chef</span>
                                <span class="flex items-center gap-1"><x-lucide-shield-check
                                        class="text-primary size-[18px]" />
                                    Private Oxygen Supply</span>
                                <span class="flex items-center gap-1"><x-lucide-shield-check
                                        class="text-primary size-[18px]" />
                                    Chopper Fly-out from Gorakshep/Tilicho</span>
                            </div>
                        </div>
                        <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-space-sm">
                            <a class="flex items-center justify-center gap-space-xs px-space-lg py-3 rounded bg-on-surface text-surface font-label-md text-label-md font-bold uppercase tracking-wider hover:bg-tertiary transition-colors text-center"
                                href="tel:{{ preg_replace('/[^0-9+]/', '', $contact?->phone ?? '') }}">
                                <x-lucide-phone class="size-[18px] text-primary-container" />
                                Call {{ $contact?->company_name ?? 'our team' }}
                                ({{ $contact?->phone ?? 'Contact us' }})
                            </a>
                            <a class="flex items-center justify-center gap-space-xs px-space-lg py-3 rounded bg-surface-container-highest hover:bg-surface-container text-on-surface font-label-md text-label-md font-bold uppercase tracking-wider transition-colors text-center"
                                data-path="about-us" href="#">
                                <x-lucide-handshake class="size-[18px]" />
                                Consult Sherpa Expedition Lead
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Client-side Interactive Filter, Quiz, and Booking Logic -->

        </div>
    </main>
    <x-footer />
</x-layouts.app>
