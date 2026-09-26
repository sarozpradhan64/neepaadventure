<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-48">
        <div class="flex w-full flex-col">
            <!-- Top Alpine Announcement & Status Ribbon -->
            <section class="bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop py-space-sm w-full">
                <div class="max-w-max-content-width gap-space-xs text-body-sm mx-auto flex flex-col items-start justify-between md:flex-row md:items-center">
                    <nav
                        aria-label="Breadcrumbs"
                        class="gap-space-xs font-label-sm text-label-sm text-tertiary flex items-center"
                    >
                        <a class="hover:text-primary transition-colors" data-path="home" href="#">Home</a>
                        <x-lucide-chevron-right class="size-[14px]" />
                        <span class="text-on-surface font-semibold">Treks</span>
                        <x-lucide-chevron-right class="size-[14px]" />
                        <span class="text-on-surface-variant">2025/2026 Himalayan Catalog</span>
                    </nav>
                    <div class="gap-space-md flex items-center">
                        <span class="font-badge-caption text-badge-caption bg-surface-container-highest text-tertiary inline-flex items-center gap-1.5 rounded px-2.5 py-1">
                            <span class="bg-amber-flare h-2 w-2 animate-pulse rounded-full"></span>
                            AUTUMN &amp; SPRING BOOKINGS OPEN
                        </span>
                        <span class="text-tertiary hidden lg:inline">Garmin InReach v2 Satellite Monitoring on All Trails</span>
                    </div>
                </div>
            </section>
            <!-- Title & High-Altitude Context Banner -->
            <section class="px-gutter-mobile lg:px-gutter-desktop py-space-3xl relative w-full overflow-hidden shadow-md">
                <div class="absolute inset-0 z-0">
                    <img src="{{ asset('images/himalaya_hero.jpg') }}" alt="Himalayas Hero" class="h-full w-full object-cover">
                    <div class="bg-ridge-deep/80 absolute inset-0 mix-blend-multiply"></div>
                    <div class="bg-gradient-to-t from-surface to-transparent absolute inset-0"></div>
                </div>
                <div class="max-w-max-content-width relative z-10 mx-auto">
                    <div class="gap-space-lg flex flex-col justify-between lg:flex-row lg:items-end">
                        <div class="space-y-space-md max-w-3xl">
                            <div class="gap-space-xs font-label-sm text-label-sm text-amber-flare inline-flex items-center font-bold tracking-widest uppercase">
                                <x-lucide-mountain class="size-[18px]" />
                                Authentic Sherpa-Led Circuits &amp; High Passes
                            </div>
                            <h1 class="font-display-md text-display-md text-summit-white font-extrabold tracking-tight drop-shadow-lg">
                                Nepal Trekking Treks &amp; Classic High Passes
                            </h1>
                            <p class="font-body-xl text-body-xl text-mist-slate/90 max-w-2xl drop-shadow">
                                Curated, low-impact alpine journeys through sacred glacial basins, ancient
                                trans-Himalayan trade trails, and legendary 5,000m+ passes.
                            </p>
                        </div>
                        <!-- Season & Availability Quick Indicator -->
                        <div class="bg-surface-container-lowest/95 p-space-md gap-space-md flex min-w-[280px] items-center rounded-xl shadow-xl backdrop-blur-sm border border-surface-container-high/50">
                            <div class="bg-amber-flare/20 text-amber-flare flex h-14 w-14 items-center justify-center rounded-xl">
                                <x-lucide-sun class="size-[28px]" />
                            </div>
                            <div>
                                <div class="font-label-sm text-label-sm text-tertiary font-bold tracking-wider uppercase">
                                    Current Window
                                </div>
                                <div class="font-headline-sm text-headline-sm text-on-surface font-extrabold">
                                    Spring &amp; Autumn Pass
                                </div>
                                <div class="font-body-sm text-body-sm text-primary font-medium" id="catalog-count-indicator">
                                    Showing {{ $treks->count() }} verified routes
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Trust Assurance Strip -->
                    <div class="gap-space-md pt-space-xl mt-space-lg grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="gap-space-sm p-space-sm bg-surface flex items-center rounded-lg">
                            <x-lucide-shield-check class="text-primary size-[28px]" />
                            <div>
                                <span class="font-label-md text-label-md text-on-surface block font-bold">100% Guaranteed</span>
                                <span class="font-body-sm text-body-sm text-tertiary block">Every scheduled departure runs</span>
                            </div>
                        </div>
                        <div class="gap-space-sm p-space-sm bg-surface flex items-center rounded-lg">
                            <x-lucide-refresh-cw class="text-primary size-[28px]" />
                            <div>
                                <span class="font-label-md text-label-md text-on-surface block font-bold">Free Date Shifting</span>
                                <span class="font-body-sm text-body-sm text-tertiary block">Modify up to 45 days prior</span>
                            </div>
                        </div>
                        <div class="gap-space-sm p-space-sm bg-surface flex items-center rounded-lg">
                            <x-lucide-satellite class="text-primary size-[28px]" />
                            <div>
                                <span class="font-label-md text-label-md text-on-surface block font-bold">Satellite SOS Included</span>
                                <span class="font-body-sm text-body-sm text-tertiary block">Garmin inReach + 24/7 MedLink</span>
                            </div>
                        </div>
                        <div class="gap-space-sm p-space-sm bg-surface flex items-center rounded-lg">
                            <x-lucide-users class="text-primary size-[28px]" />
                            <div>
                                <span class="font-label-md text-label-md text-on-surface block font-bold">Small Team Ratio</span>
                                <span class="font-body-sm text-body-sm text-tertiary block">Maximum 8 trekkers per group</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Facet / Filtering Command Bar -->
            <section class="bg-surface-container-lowest py-space-sm px-gutter-mobile lg:px-gutter-desktop sticky top-20 z-40 w-full shadow-md">
                <div class="max-w-max-content-width space-y-space-sm mx-auto">
                    <div class="gap-space-sm flex flex-wrap items-center justify-between">
                        <!-- Search input -->
                        <div class="relative max-w-md min-w-[240px] flex-1">
                            <x-lucide-search class="text-tertiary absolute top-1/2 left-3 size-[20px] -translate-y-1/2" />
                            <input
                                class="pr-space-md bg-surface text-body-md text-on-surface placeholder:text-tertiary focus:bg-surface-container-low w-full rounded-lg py-2.5 pl-10 transition-all focus:outline-none"
                                id="search-input"
                                placeholder="Search passes, valleys, passes (e.g. Larkya La, Gokyo)..."
                                type="text"
                            />
                        </div>
                        <!-- Filter Selectors -->
                        <div class="gap-space-xs flex flex-wrap items-center">
                            <!-- Region Select -->
                            <div class="relative">
                                <select
                                    class="bg-surface hover:bg-surface-container text-on-surface px-space-md font-label-md text-label-md cursor-pointer appearance-none rounded-lg py-2 pr-8 transition-colors focus:outline-none"
                                    id="region-filter"
                                >
                                    <option value="all">All Himalayan Regions</option>
                                    <option value="khumbu">Everest &amp; Khumbu</option>
                                    <option value="annapurna">Annapurna &amp; Mustang</option>
                                    <option value="manaslu">Manaslu &amp; Ganesh Himal</option>
                                    <option value="langtang">Langtang &amp; Helambu</option>
                                    <option value="eastern">Far-Eastern (Kanchenjunga)</option>
                                </select>
                                <x-lucide-chevron-down class="text-tertiary pointer-events-none absolute top-1/2 right-2.5 size-[18px] -translate-y-1/2" />
                            </div>
                            <!-- Duration Select -->
                            <div class="relative">
                                <select
                                    class="bg-surface hover:bg-surface-container text-on-surface px-space-md font-label-md text-label-md cursor-pointer appearance-none rounded-lg py-2 pr-8 transition-colors focus:outline-none"
                                    id="duration-filter"
                                >
                                    <option value="all">Any Duration</option>
                                    <option value="7-12">7 - 12 Days</option>
                                    <option value="13-17">13 - 17 Days</option>
                                    <option value="18-24">18+ Days</option>
                                </select>
                                <x-lucide-chevron-down class="text-tertiary pointer-events-none absolute top-1/2 right-2.5 size-[18px] -translate-y-1/2" />
                            </div>
                            <!-- Max Altitude Select -->
                            <div class="relative">
                                <select
                                    class="bg-surface hover:bg-surface-container text-on-surface px-space-md font-label-md text-label-md cursor-pointer appearance-none rounded-lg py-2 pr-8 transition-colors focus:outline-none"
                                    id="altitude-filter"
                                >
                                    <option value="all">Altitude (All)</option>
                                    <option value="sub-4000">Up to 4,000m</option>
                                    <option value="sub-5200">Up to 5,200m</option>
                                    <option value="high-pass">5,300m+ High Passes</option>
                                </select>
                                <x-lucide-chevron-down class="text-tertiary pointer-events-none absolute top-1/2 right-2.5 size-[18px] -translate-y-1/2" />
                            </div>
                            <!-- Sort Selector -->
                            <div class="relative">
                                <select
                                    class="bg-surface-container text-on-surface-variant px-space-md font-label-md text-label-md cursor-pointer appearance-none rounded-lg py-2 pr-8 font-semibold transition-colors focus:outline-none"
                                    id="sort-selector"
                                >
                                    <option value="popular">Sort: Most Popular</option>
                                    <option value="price-asc">Price: Low to High</option>
                                    <option value="duration-desc">Duration: Longest</option>
                                    <option value="altitude-desc">Highest Altitude</option>
                                </select>
                                <x-lucide-arrow-down-up class="text-tertiary pointer-events-none absolute top-1/2 right-2.5 size-[18px] -translate-y-1/2" />
                            </div>
                            <button
                                class="text-tertiary hover:text-on-surface hover:bg-surface-container rounded-lg p-2 transition-colors"
                                id="reset-filters"
                                title="Reset Filters"
                            >
                                <x-lucide-rotate-ccw class="size-[20px]" />
                            </button>
                        </div>
                    </div>
                    <!-- Quick Category / Season Toggles -->
                    <div class="gap-space-xs pt-space-2xs text-label-sm font-label-sm flex flex-wrap items-center">
                        <span class="text-tertiary pr-2 font-bold tracking-wider uppercase">Difficulty:</span>
                        <button
                            class="difficulty-pill active-pill bg-surface-container-high text-on-surface rounded px-3 py-1 font-semibold"
                            data-difficulty="all"
                        >
                            All
                        </button>
                        <button
                            class="difficulty-pill bg-surface text-tertiary hover:text-on-surface rounded px-3 py-1 transition-colors"
                            data-difficulty="Moderate"
                        >
                            Moderate (3/5)
                        </button>
                        <button
                            class="difficulty-pill bg-surface text-tertiary hover:text-on-surface rounded px-3 py-1 transition-colors"
                            data-difficulty="Demanding"
                        >
                            Demanding (4/5)
                        </button>
                        <button
                            class="difficulty-pill bg-surface text-tertiary hover:text-on-surface rounded px-3 py-1 transition-colors"
                            data-difficulty="Alpine Strenuous"
                        >
                            Alpine Strenuous (5/5)
                        </button>
                        <div class="bg-surface-container-highest mx-2 hidden h-4 w-px sm:block"></div>
                        <span class="text-tertiary hidden pr-2 font-bold tracking-wider uppercase sm:inline">Season:</span>
                        <button
                            class="season-pill bg-surface text-tertiary hover:text-on-surface rounded px-3 py-1 transition-colors"
                            data-season="autumn"
                        >
                            Autumn (Clear Skies)
                        </button>
                        <button
                            class="season-pill bg-surface text-tertiary hover:text-on-surface rounded px-3 py-1 transition-colors"
                            data-season="spring"
                        >
                            Spring (Rhododendrons)
                        </button>
                        <button
                            class="season-pill bg-surface text-tertiary hover:text-on-surface rounded px-3 py-1 transition-colors"
                            data-season="mustang"
                        >
                            Monsoon-Proof (Mustang)
                        </button>
                    </div>
                </div>
            </section>
            <!-- Curated Trek Grid Catalog -->
            <section class="px-gutter-mobile lg:px-gutter-desktop py-space-lg w-full">
                <div class="max-w-max-content-width mx-auto">
                    <!-- Active Results Counter & Metric Grid -->
                    <div class="gap-space-sm pb-space-lg flex flex-col justify-between sm:flex-row sm:items-center">
                        <div>
                            <span class="font-headline-sm text-headline-sm text-on-surface font-bold">Curated Trekking Treks</span>
                            <span class="font-body-sm text-body-sm text-tertiary ml-2">(Standard &amp; Luxury Teahouse Treks)</span>
                        </div>
                        <div class="gap-space-md font-body-sm text-body-sm text-tertiary flex items-center">
                            <span class="flex items-center gap-1"><span class="bg-primary h-2.5 w-2.5 rounded-full"></span> High Pass</span>
                            <span class="flex items-center gap-1"><span class="bg-secondary h-2.5 w-2.5 rounded-full"></span> Circuit</span>
                            <span class="flex items-center gap-1"><span class="bg-amber-flare h-2.5 w-2.5 rounded-full"></span> Sanctuary / Basin</span>
                        </div>
                    </div>
                    <!-- Main Cards Container -->
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3" id="trek-cards-grid">
                        @foreach ($treks as $trek)
                            <article
                                class="trek-card group bg-surface-container-lowest flex flex-col justify-between overflow-hidden rounded-xl shadow-sm transition-all duration-300 hover:shadow-xl"
                                data-altitude="{{ (int) filter_var($trek->maximum_altitude, FILTER_SANITIZE_NUMBER_INT) }}"
                                data-difficulty="{{ $trek->difficulty_level }}"
                                data-duration="{{ (int) filter_var($trek->duration, FILTER_SANITIZE_NUMBER_INT) }}"
                                data-id="{{ $trek->id }}"
                                data-price="{{ $trek->price_from }}"
                            >
                                <div>
                                    <div class="bg-surface-dim relative h-64 w-full overflow-hidden">
                                        @if ($trek->featuredImage)
                                            <img
                                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                                alt="{{ $trek->title }}"
                                                src="{{ asset('storage/' . $trek->featuredImage->path) }}"
                                            />
                                        @else
                                            <img
                                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                                alt="{{ $trek->title }}"
                                                src=""
                                            />
                                        @endif
                                        <div class="from-on-surface/80 absolute inset-0 bg-gradient-to-t via-transparent to-transparent"></div>
                                        <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
                                            <span class="bg-amber-flare text-on-primary-fixed font-badge-caption text-badge-caption rounded px-2.5 py-1 font-bold uppercase">Trek</span>
                                        </div>
                                        <div class="text-summit-white absolute right-3 bottom-3 left-3 flex items-center justify-between">
                                            <div class="font-label-sm text-label-sm flex items-center gap-1 tracking-wider uppercase">
                                                <x-lucide-map-pin class="text-primary-container size-[16px]" />
                                                {{ $trek->start_end_point }}
                                            </div>
                                            <div class="font-badge-caption text-badge-caption bg-surface-container-lowest/20 text-summit-white rounded px-2 py-0.5 backdrop-blur-md">
                                                {{ $trek->duration }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-space-lg space-y-space-md">
                                        <div>
                                            <h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary font-bold transition-colors">
                                                {{ $trek->title }}
                                            </h3>
                                            <div class="font-body-md text-body-md text-tertiary mt-1 line-clamp-2">
                                                {!! strip_tags($trek->description) !!}
                                            </div>
                                        </div>
                                        <div class="py-space-xs bg-surface grid grid-cols-3 gap-2 rounded-lg p-2 text-center">
                                            <div>
                                                <span class="font-badge-caption text-badge-caption text-tertiary block uppercase">Grade</span>
                                                <span class="font-label-md text-label-md text-on-surface block font-bold">{{ ucfirst($trek->difficulty_level) }}</span>
                                            </div>
                                            <div class="border-surface-container border-l">
                                                <span class="font-badge-caption text-badge-caption text-tertiary block uppercase">Group Size</span>
                                                <span class="font-label-md text-label-md text-on-surface block font-bold">Max {{ $trek->max_group_size }}</span>
                                            </div>
                                            <div class="border-surface-container border-l">
                                                <span class="font-badge-caption text-badge-caption text-tertiary block uppercase">Pass/Alt</span>
                                                <span class="font-label-md text-label-md text-primary block font-bold">{{ $trek->maximum_altitude }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-space-lg space-y-space-sm pt-0">
                                    <div class="pt-space-xs border-surface-container flex items-baseline justify-between border-t">
                                        <div>
                                            <span class="font-body-sm text-body-sm text-tertiary block">All-inclusive from</span>
                                            <div class="flex items-baseline gap-1">
                                                <span class="font-headline-md text-headline-md text-on-surface font-bold">${{ number_format($trek->price_from, 2) }}</span>
                                                <span class="font-body-sm text-body-sm text-tertiary">USD / person</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gap-space-xs grid grid-cols-2">
                                        <a
                                            class="bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-sm text-label-sm w-full rounded px-3 py-2.5 text-center font-bold tracking-wider uppercase transition-colors"
                                            href="{{ route('trek-detail', $trek->slug) }}"
                                        >
                                            Itinerary
                                        </a>
                                        <button class="quick-book-btn bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-sm text-label-sm w-full rounded px-3 py-2.5 text-center font-bold tracking-wider uppercase shadow-sm transition-colors">
                                            Dates &amp; Book
                                        </button>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <!-- No Results State (Hidden by default) -->
                    <div
                        class="py-space-3xl space-y-space-md bg-surface-container-lowest hidden rounded-xl text-center"
                        id="no-results-state"
                    >
                        <x-lucide-map class="text-tertiary size-[54px]" />
                        <div class="space-y-space-xs mx-auto max-w-md">
                            <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                No matching treks found
                            </h3>
                            <p class="font-body-md text-body-md text-tertiary">
                                Try loosening your altitude or duration filters, or request a custom bespoke itinerary
                                crafted by our Sherpa team.
                            </p>
                            <button
                                class="mt-space-sm px-space-lg py-space-xs bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-sm text-label-sm rounded font-bold"
                                id="clear-all-filters-btn"
                            >
                                Reset All Filters
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Departure Date Quick-Booking Modal -->
            <div
                class="bg-ridge-deep/70 p-gutter-mobile fixed inset-0 z-50 flex hidden items-center justify-center backdrop-blur-sm"
                id="booking-modal"
            >
                <div class="bg-surface-container-lowest p-space-lg lg:p-space-xl space-y-space-md animate-in fade-in zoom-in relative w-full max-w-xl rounded-xl shadow-2xl duration-200">
                    <div class="flex items-start justify-between">
                        <div>
                            <span class="font-badge-caption text-badge-caption text-primary font-bold uppercase">Trek Reservation</span>
                            <h3
                                class="font-headline-sm text-headline-sm text-on-surface font-bold"
                                id="modal-trek-name"
                            >
                                Select Departure Dates
                            </h3>
                            <p class="font-body-sm text-body-sm text-tertiary">
                                Fixed group departures with maximum 8 trekkers per team.
                            </p>
                        </div>
                        <button
                            class="text-tertiary hover:text-on-surface hover:bg-surface-container rounded-lg p-1.5 transition-colors"
                            id="close-modal-btn"
                        >
                            <x-lucide-x class="size-4" />
                        </button>
                    </div>
                    <div class="space-y-space-xs">
                        <span class="font-label-md text-label-md text-on-surface block font-bold">Upcoming 2025/2026 Guaranteed Slots</span>
                        <div class="max-h-56 space-y-2 overflow-y-auto pr-1">
                            <label class="bg-surface hover:bg-surface-container-low has-[:checked]:border-primary has-[:checked]:bg-primary/5 flex cursor-pointer items-center justify-between rounded-lg border border-transparent p-3 transition-colors">
                                <div class="gap-space-sm flex items-center">
                                    <input
                                        checked=""
                                        class="text-primary h-4 w-4 focus:ring-0"
                                        name="departure-slot"
                                        type="radio"
                                    />
                                    <div>
                                        <span class="font-label-md text-label-md text-on-surface block font-bold">Oct 04, 2025 – Oct 19, 2025</span>
                                        <span class="font-body-sm text-body-sm text-tertiary">Prime Autumn Visibility • 3 Spots Open</span>
                                    </div>
                                </div>
                                <span
                                    class="font-label-md text-label-md text-on-surface font-bold"
                                    id="modal-price-slot-1"
                                >$1,750</span>
                            </label>
                            <label class="bg-surface hover:bg-surface-container-low has-[:checked]:border-primary has-[:checked]:bg-primary/5 flex cursor-pointer items-center justify-between rounded-lg border border-transparent p-3 transition-colors">
                                <div class="gap-space-sm flex items-center">
                                    <input
                                        class="text-primary h-4 w-4 focus:ring-0"
                                        name="departure-slot"
                                        type="radio"
                                    />
                                    <div>
                                        <span class="font-label-md text-label-md text-on-surface block font-bold">Nov 01, 2025 – Nov 16, 2025</span>
                                        <span class="font-body-sm text-body-sm text-tertiary">Crystal Clear Passes • 5 Spots Open</span>
                                    </div>
                                </div>
                                <span
                                    class="font-label-md text-label-md text-on-surface font-bold"
                                    id="modal-price-slot-2"
                                >$1,750</span>
                            </label>
                            <label class="bg-surface hover:bg-surface-container-low has-[:checked]:border-primary has-[:checked]:bg-primary/5 flex cursor-pointer items-center justify-between rounded-lg border border-transparent p-3 transition-colors">
                                <div class="gap-space-sm flex items-center">
                                    <input
                                        class="text-primary h-4 w-4 focus:ring-0"
                                        name="departure-slot"
                                        type="radio"
                                    />
                                    <div>
                                        <span class="font-label-md text-label-md text-on-surface block font-bold">Apr 12, 2026 – Apr 27, 2026</span>
                                        <span class="font-body-sm text-body-sm text-tertiary">Rhododendron Bloom • 6 Spots Open</span>
                                    </div>
                                </div>
                                <span
                                    class="font-label-md text-label-md text-on-surface font-bold"
                                    id="modal-price-slot-3"
                                >$1,750</span>
                            </label>
                        </div>
                    </div>
                    <div class="pt-space-xs space-y-space-xs">
                        <div class="font-body-sm text-body-sm text-tertiary flex justify-between">
                            <span>Refundable Deposit (Pay later):</span>
                            <span class="text-on-surface font-bold">$250 USD</span>
                        </div>
                        <div class="gap-space-xs text-badge-caption text-badge-caption text-primary flex items-center">
                            <x-lucide-lock-keyhole class="size-[16px]" />
                            Zero charge until your Sherpa Lead confirms medical suitability.
                        </div>
                    </div>
                    <div class="gap-space-sm pt-space-xs flex items-center justify-end">
                        <button
                            class="px-space-md font-label-md text-label-md text-tertiary hover:text-on-surface rounded py-2.5 transition-colors"
                            id="cancel-modal-btn"
                        >
                            Cancel
                        </button>
                        <button
                            class="px-space-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md rounded py-2.5 font-bold tracking-wider uppercase shadow-sm transition-colors"
                            id="confirm-booking-btn"
                        >
                            Reserve Provisional Spot
                        </button>
                    </div>
                </div>
            </div>
            <!-- Custom Tailored Trek Consultation Strip -->
            <section class="bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop py-space-2xl w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="gap-space-xl grid grid-cols-1 items-center lg:grid-cols-12">
                        <div class="space-y-space-sm lg:col-span-8">
                            <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-wider uppercase">Private &amp; Tailor-Made Treks</span>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold">
                                Need a Private Alpine Itinerary or Heli-Shuttle Return?
                            </h2>
                            <p class="font-body-lg text-body-lg text-tertiary max-w-2xl">
                                We regularly curate bespoke high passes, luxury heli-out charters, and custom
                                acclimatization timelines for private parties, trekking clubs, and solo alpine
                                photographers.
                            </p>
                            <div class="gap-space-md pt-space-xs font-body-sm text-body-sm text-on-surface-variant flex flex-wrap items-center">
                                <span class="flex items-center gap-1"
                                    ><x-lucide-shield-check class="text-primary size-[18px]" /> Custom Dietary
                                    Chef</span>
                                <span class="flex items-center gap-1"
                                    ><x-lucide-shield-check class="text-primary size-[18px]" /> Private Oxygen
                                    Supply</span>
                                <span class="flex items-center gap-1"
                                    ><x-lucide-shield-check class="text-primary size-[18px]" /> Chopper Fly-out from
                                    Gorakshep/Tilicho</span>
                            </div>
                        </div>
                        <div class="gap-space-sm flex flex-col sm:flex-row lg:col-span-4 lg:flex-col">
                            <a
                                class="gap-space-xs px-space-lg bg-on-surface text-surface font-label-md text-label-md hover:bg-tertiary flex items-center justify-center rounded py-3 text-center font-bold tracking-wider uppercase transition-colors"
                                href="tel:{{ preg_replace('/[^0-9+]/', '', $contact?->phone ?? '') }}"
                            >
                                <x-lucide-phone class="text-primary-container size-[18px]" />
                                Call {{ $contact?->company_name ?? 'our team' }} ({{ $contact?->phone ?? 'Contact us' }})
                            </a>
                            <a
                                class="gap-space-xs px-space-lg bg-surface-container-highest hover:bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center rounded py-3 text-center font-bold tracking-wider uppercase transition-colors"
                                data-path="about-us"
                                href="#"
                            >
                                <x-lucide-handshake class="size-[18px]" />
                                Consult Sherpa Trek Lead
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Client-side Interactive Filter, Quiz, and Booking Logic -->
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const searchInput = document.getElementById('search-input');
                    const difficultyPills = document.querySelectorAll('.difficulty-pill');
                    const trekCards = document.querySelectorAll('.trek-card');
                    const countIndicator = document.getElementById('catalog-count-indicator');
                    
                    const sortSelector = document.getElementById('sort-selector');
                    const cardsGrid = document.getElementById('trek-cards-grid');

                    function filterTreks() {
                        const searchTerm = searchInput.value.toLowerCase();
                        let activeDifficulty = 'all';
                        difficultyPills.forEach(pill => {
                            if (pill.classList.contains('active-pill')) {
                                activeDifficulty = pill.getAttribute('data-difficulty');
                            }
                        });

                        let visibleCount = 0;

                        trekCards.forEach(card => {
                            const title = card.querySelector('.font-headline-sm').innerText.toLowerCase();
                            const matchesSearch = title.includes(searchTerm);
                            const cardDifficulty = card.getAttribute('data-difficulty');
                            
                            const matchesDifficulty = (activeDifficulty === 'all' || cardDifficulty === activeDifficulty);

                            if (matchesSearch && matchesDifficulty) {
                                card.style.display = 'flex';
                                visibleCount++;
                            } else {
                                card.style.display = 'none';
                            }
                        });
                        
                        if(countIndicator) {
                            countIndicator.innerText = `Showing ${visibleCount} verified routes`;
                        }
                    }

                    // Event Listeners for Filters
                    searchInput.addEventListener('input', filterTreks);

                    difficultyPills.forEach(pill => {
                        pill.addEventListener('click', () => {
                            difficultyPills.forEach(p => {
                                p.classList.remove('active-pill', 'bg-surface-container-high', 'text-on-surface', 'font-semibold');
                                p.classList.add('bg-surface', 'text-tertiary');
                            });
                            pill.classList.remove('bg-surface', 'text-tertiary');
                            pill.classList.add('active-pill', 'bg-surface-container-high', 'text-on-surface', 'font-semibold');
                            filterTreks();
                        });
                    });
                    
                    // Simple Sort logic
                    sortSelector.addEventListener('change', (e) => {
                        const val = e.target.value;
                        let cardsArray = Array.from(trekCards);
                        
                        if(val === 'price-asc') {
                            cardsArray.sort((a,b) => parseInt(a.getAttribute('data-price')) - parseInt(b.getAttribute('data-price')));
                        } else if(val === 'duration-desc') {
                            cardsArray.sort((a,b) => parseInt(b.getAttribute('data-duration')) - parseInt(a.getAttribute('data-duration')));
                        } else if(val === 'altitude-desc') {
                            cardsArray.sort((a,b) => parseInt(b.getAttribute('data-altitude')) - parseInt(a.getAttribute('data-altitude')));
                        }
                        
                        // re-append in order
                        cardsArray.forEach(card => cardsGrid.appendChild(card));
                    });

                });
            </script>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
