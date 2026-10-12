<x-layouts.app 
    :seo="$category->seoMetadata"
    :title="$category->name"
    :description="$category->description"
>
    <x-header />

    <main class="bg-surface w-full pt-28" x-data="{
        searchQuery: '{{ request('search', '') }}',
        activeFilter: 'all',
        services: {{ Js::from($services->map(fn($s) => [
            'id' => $s->id,
            'title' => $s->title,
            'category_id' => $s->service_category_id,
            'category_name' => $s->category?->name ?? '',
            'difficulty' => strtolower($s->difficulty_level ?? 'moderate'),
            'duration' => $s->duration ?? '',
            'altitude' => $s->maximum_altitude ?? '',
            'price' => $s->price_from ?? 0,
        ])) }}
    }">
        <div class="flex w-full flex-col">
            <!-- Top Status & Breadcrumb Ribbon -->
            <section class="bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop py-space-sm w-full border-b border-outline/10">
                <div class="max-w-max-content-width gap-space-xs text-body-sm mx-auto flex flex-col items-start justify-between md:flex-row md:items-center">
                    <nav aria-label="Breadcrumbs" class="gap-space-xs font-label-sm text-label-sm text-tertiary flex flex-wrap items-center">
                        <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
                        <x-lucide-chevron-right class="size-[14px]" />
                        
                        @foreach($ancestors as $ancestor)
                            <a class="hover:text-primary transition-colors" href="{{ route('services.category', $ancestor->slug) }}">
                                {{ $ancestor->name }}
                            </a>
                            <x-lucide-chevron-right class="size-[14px]" />
                        @endforeach

                        <span class="text-on-surface font-semibold">{{ $category->name }}</span>
                    </nav>

                    <div class="gap-space-md flex items-center">
                        <span class="font-badge-caption text-badge-caption bg-surface-container-highest text-tertiary inline-flex items-center gap-1.5 rounded-full px-3 py-1 font-semibold uppercase tracking-wider">
                            <span class="bg-emerald-500 h-2 w-2 animate-pulse rounded-full"></span>
                            2025/2026 Season Open
                        </span>
                     </div>
                </div>
            </section>

            <!-- Category Hero Banner -->
            <section class="px-gutter-mobile lg:px-gutter-desktop py-space-2xl md:py-space-3xl relative w-full overflow-hidden shadow-md">
                <div class="absolute inset-0 z-0">
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="h-full w-full object-cover">
                    @else
                        <img src="{{ asset('images/himalaya_hero.jpg') }}" alt="{{ $category->name }}" class="h-full w-full object-cover">
                    @endif
                    <div class="bg-slate-950/75 absolute inset-0 mix-blend-multiply"></div>
                    <div class="bg-gradient-to-t from-surface via-transparent to-transparent absolute inset-0"></div>
                </div>

                <div class="max-w-max-content-width relative z-10 mx-auto">
                    <div class="gap-space-lg flex flex-col justify-between lg:flex-row lg:items-end">
                        <div class="space-y-space-md max-w-3xl">
                            <div class="gap-space-xs font-label-sm text-label-sm text-amber-flare inline-flex items-center font-bold tracking-widest uppercase">
                                <x-lucide-mountain class="size-[18px]" />
                                Himalayan Exploration &bull; {{ $category->parent?->name ?? 'Curated Adventures' }}
                            </div>

                            <h1 class="font-display-md text-display-md text-summit-white font-extrabold tracking-tight drop-shadow-lg">
                                {{ $category->name }}
                            </h1>

                            @if($category->description)
                                <p class="font-body-lg text-body-lg text-mist-slate/90 max-w-2xl drop-shadow leading-relaxed">
                                    {!! strip_tags($category->description) !!}
                                </p>
                            @else
                                <p class="font-body-lg text-body-lg text-mist-slate/90 max-w-2xl drop-shadow leading-relaxed">
                                    Discover verified itineraries, classic circuits, and alpine expeditions across {{ $category->name }}. Fully supported by certified mountain guides.
                                </p>
                            @endif
                        </div>
                    </div>

                    {{-- Child Categories Sub-Pills (if any) --}}
                    @if($childCategories->isNotEmpty())
                        <div class="mt-8 pt-6 border-t border-white/10 flex flex-wrap items-center gap-2">
                            <span class="text-xs font-bold uppercase tracking-wider text-white/70 mr-2 flex items-center gap-1.5">
                                <x-lucide-layers class="size-3.5" /> Sub-Regions:
                            </span>
                            @foreach($childCategories as $child)
                                <a href="{{ route('services.category', $child->slug) }}" 
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold transition-all bg-white/15 hover:bg-white/25 text-white backdrop-blur-sm border border-white/20 hover:scale-105 shadow-sm">
                                    <span>{{ $child->name }}</span>
                                    @if($child->services_count ?? null)
                                        <span class="bg-white/20 text-white rounded-full px-2 py-0.5 text-[10px]">{{ $child->services_count }}</span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>

            <!-- Search & Filter Ribbon -->
            <section class="bg-surface-container-lowest py-space-sm px-gutter-mobile lg:px-gutter-desktop sticky top-20 z-40 w-full shadow-sm border-b border-outline/10">
                <div class="max-w-max-content-width mx-auto flex flex-wrap items-center justify-between gap-space-sm">
                    <!-- Search input -->
                    <form action="{{ route('services.category', $category->slug) }}" method="GET" class="relative max-w-md min-w-[260px] flex-1">
                        <x-lucide-search class="text-tertiary absolute top-1/2 left-3.5 size-[18px] -translate-y-1/2" />
                        <input
                            class="pr-space-md bg-surface text-body-md text-on-surface placeholder:text-tertiary focus:bg-surface-container-low w-full rounded-xl py-2 pl-10 transition-all focus:outline-none border border-outline/15 focus:border-primary text-sm"
                            name="search"
                            placeholder="Search within {{ $category->name }}..."
                            type="text"
                            value="{{ request('search', '') }}"
                        />
                    </form>

                    <div class="flex items-center gap-3">
                        <span class="text-xs font-semibold text-tertiary uppercase tracking-wider">
                            Showing {{ $services->count() }} {{ Str::plural('route', $services->count()) }}
                        </span>
                        @if(request('search'))
                            <a href="{{ route('services.category', $category->slug) }}" 
                               class="text-xs font-bold text-primary hover:underline flex items-center gap-1">
                                <x-lucide-x class="size-3.5" /> Clear search
                            </a>
                        @endif
                    </div>
                </div>
            </section>

            <!-- Main Services Grid -->
            <section class="px-gutter-mobile lg:px-gutter-desktop py-space-2xl w-full">
                <div class="max-w-max-content-width mx-auto">
                    @if($services->isEmpty())
                        <div class="bg-surface-container-low rounded-2xl p-12 text-center max-w-2xl mx-auto my-12 border border-outline/10 space-y-4">
                            <div class="bg-surface-container-high w-16 h-16 rounded-2xl flex items-center justify-center mx-auto text-tertiary">
                                <x-lucide-compass class="size-8 text-primary" />
                            </div>
                            <h2 class="text-headline-md font-bold text-on-surface">No Routes Found in {{ $category->name }}</h2>
                            <p class="text-body-md text-tertiary">
                                @if(request('search'))
                                    No services matched "{{ request('search') }}". Try searching with different keywords or clear your search filter.
                                @else
                                    We are currently curating and validating new itineraries for this region. Contact our alpine guides to plan a custom journey!
                                @endif
                            </p>
                            <div class="pt-4 flex flex-wrap justify-center gap-3">
                                @if(request('search'))
                                    <a href="{{ route('services.category', $category->slug) }}" class="px-5 py-2.5 bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-md font-bold rounded-xl transition-all">
                                        Reset Search
                                    </a>
                                @endif
                                <a href="{{ route('plan-your-trek') }}" class="px-5 py-2.5 bg-primary hover:bg-primary/90 text-on-primary font-label-md font-bold rounded-xl transition-all shadow-md">
                                    Plan Custom Trek
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                            @foreach($services as $trek)
                                <article class="group bg-surface-container-lowest flex flex-col justify-between overflow-hidden rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-300 border border-outline/10">
                                    <div>
                                        <!-- Card Image & Header Badges -->
                                        <div class="bg-surface-dim relative h-64 w-full overflow-hidden">
                                            @if($trek->featured_image)
                                                <img
                                                    class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                                                    alt="{{ $trek->title }}"
                                                    src="{{ asset('storage/' . $trek->featured_image) }}"
                                                />
                                            @else
                                                <div class="h-full w-full bg-slate-800 flex items-center justify-center text-slate-500">
                                                    <x-lucide-mountain class="size-16 opacity-30" />
                                                </div>
                                            @endif

                                            <div class="from-black/80 via-transparent to-transparent absolute inset-0 bg-gradient-to-t"></div>

                                            <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
                                                <span class="bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption rounded-lg px-2.5 py-1 font-bold uppercase shadow-sm">
                                                    {{ $trek->category?->name ?? $category->name }}
                                                </span>
                                            </div>

                                            <div class="text-white absolute right-3 bottom-3 left-3 flex items-center justify-between">
                                                <div class="font-label-sm text-label-sm flex items-center gap-1.5 tracking-wider uppercase font-semibold text-xs drop-shadow">
                                                    <x-lucide-map-pin class="text-amber-flare size-[14px]" />
                                                    <span class="truncate max-w-[160px]">{{ $trek->start_end_point ?: 'Kathmandu' }}</span>
                                                </div>
                                                @if($trek->duration)
                                                    <div class="font-badge-caption text-badge-caption bg-black/60 text-white rounded-lg px-2.5 py-1 backdrop-blur-md border border-white/10 text-xs font-semibold">
                                                        {{ $trek->duration }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Card Content -->
                                        <div class="p-6 space-y-4">
                                            <div>
                                                <a href="{{ $trek->url }}">
                                                    <h2 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary font-bold transition-colors line-clamp-2 leading-snug">
                                                        {{ $trek->title }}
                                                    </h2>
                                                </a>
                                                <p class="font-body-md text-body-md text-tertiary mt-2 line-clamp-2 text-sm leading-relaxed">
                                                    {{ $trek->short_description ?: strip_tags($trek->description) }}
                                                </p>
                                            </div>

                                            <!-- Technical Stats Grid -->
                                            <div class="py-2.5 px-3 bg-surface-container-low grid grid-cols-3 gap-2 rounded-xl text-center border border-outline/5">
                                                <div>
                                                    <span class="text-[10px] font-bold text-tertiary block uppercase tracking-wider">Grade</span>
                                                    <span class="text-xs text-on-surface block font-bold capitalize">{{ $trek->difficulty_level ?: 'Moderate' }}</span>
                                                </div>
                                                <div class="border-outline/10 border-l">
                                                    <span class="text-[10px] font-bold text-tertiary block uppercase tracking-wider">Group</span>
                                                    <span class="text-xs text-on-surface block font-bold">Max {{ $trek->max_group_size ?: 10 }}</span>
                                                </div>
                                                <div class="border-outline/10 border-l">
                                                    <span class="text-[10px] font-bold text-tertiary block uppercase tracking-wider">Max Alt</span>
                                                    <span class="text-xs text-primary block font-bold">{{ $trek->maximum_altitude ?: '4,000m' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card Footer with Pricing & Action Button -->
                                    <div class="p-6 pt-0 space-y-3">
                                        <div class="pt-3 border-outline/10 flex items-baseline justify-between border-t">
                                            <div>
                                                <span class="text-[11px] text-tertiary block uppercase font-semibold">All-inclusive from</span>
                                                <div class="flex items-baseline gap-1">
                                                    <span class="text-2xl font-black text-on-surface">
                                                        ${{ number_format($trek->price_from, 0) }}
                                                    </span>
                                                    <span class="text-xs text-tertiary font-medium">USD / person</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-2 gap-2">
                                            <a
                                                class="bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-sm text-xs rounded-xl py-2.5 text-center font-bold tracking-wider uppercase transition-all"
                                                href="{{ $trek->url }}"
                                            >
                                                Itinerary
                                            </a>
                                            <a
                                                class="bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-sm text-xs rounded-xl py-2.5 text-center font-bold tracking-wider uppercase transition-all shadow-sm"
                                                href="{{ $trek->url }}#booking"
                                            >
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>

            <!-- Bottom Custom Trek Callout -->
            <section class="bg-surface-container-low border-t border-outline/10 py-16 px-gutter-mobile lg:px-gutter-desktop w-full">
                <div class="max-w-4xl mx-auto text-center space-y-6">
                    <span class="bg-primary/10 text-primary text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full">
                        Custom Mountain Journeys
                    </span>
                    <h2 class="text-3xl font-extrabold text-on-surface">
                        Looking for a Custom Tour in {{ $category->name }}?
                    </h2>
                    <p class="text-tertiary text-base max-w-2xl mx-auto leading-relaxed">
                        Whether you require private tented camps, personalized acclimatization schedules, or combined climbing peaks, our licensed guides craft custom journeys tailored to your fitness and schedule.
                    </p>
                    <div class="pt-2 flex flex-wrap justify-center gap-4">
                        <a href="{{ route('plan-your-trek') }}" class="px-8 py-3.5 bg-primary hover:bg-primary/90 text-on-primary font-bold rounded-xl transition-all shadow-lg active:scale-95">
                            Plan Your Custom Trek
                        </a>
                        <a href="{{ route('contact') }}" class="px-8 py-3.5 bg-surface-container-highest hover:bg-surface-container text-on-surface font-bold rounded-xl transition-all border border-outline/10">
                            Contact Us
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <x-footer />
</x-layouts.app>
