<x-layouts.app
    title="Search Adventures"
    description="Search treks, tours, and adventures across Nepal. Filter by category and find your perfect Himalayan experience."
>
    <x-header />

    <main class="bg-surface w-full pt-28">
        <div class="flex w-full flex-col">

            {{-- ── Search Hero Banner ── --}}
            <section class="bg-ridge-deep relative w-full overflow-hidden py-16">
                <div class="pointer-events-none absolute inset-0 bg-[url('https://lh3.googleusercontent.com/aida-public/AB6AXuBWm4bd_ZWSqeS4ZDUw6ieD9YH3wcgE-xDdiyCrLoZmNc38H_eVcehQRfzRaWV2oN-t64VYglXgF1h-4DHdB6nMBgmwPowMu-4r9ywUCBGFZjJisMPG4RtnRpF5UPMcIJNyW23CJQSCb9TOEbxfDuGF94E8WzXAW0uWithmsHUIg76y_5CnaMVtehdmjneAMWNTMHBcs6ppEQZqOk3MgezQ92YbpYMIPFMh_GChKQXV_cHcKCDVRVpR')] bg-cover bg-center opacity-20 mix-blend-luminosity scale-105"></div>
                <div class="from-ridge-deep via-ridge-deep/80 pointer-events-none absolute inset-0 bg-gradient-to-t to-transparent"></div>

                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop relative z-10 mx-auto flex flex-col items-center text-center gap-6">
                    {{-- Breadcrumb --}}
                    <nav aria-label="Breadcrumbs" class="gap-space-xs font-label-sm text-label-sm text-summit-white/60 flex items-center">
                        <a class="hover:text-summit-white transition-colors" href="{{ route('home') }}">Home</a>
                        <x-lucide-chevron-right class="size-[14px]" />
                        <span class="text-summit-white font-semibold">Search</span>
                    </nav>

                    <h1 class="font-display-md text-2xl sm:text-3xl md:text-4xl lg:text-display-md font-extrabold text-summit-white tracking-tight drop-shadow-md max-w-2xl leading-tight">
                        @if(request('search'))
                            Results for <span class="text-primary-container">"{{ request('search') }}"</span>
                        @else
                            Find Your Adventure
                        @endif
                    </h1>

                    {{-- Search Form --}}
                    <form action="{{ route('search') }}" method="GET"
                          class="w-full max-w-2xl bg-surface-container-lowest shadow-[0_8px_40px_rgba(0,0,0,0.5)] rounded-2xl p-2 sm:p-3 flex flex-col sm:flex-row items-stretch sm:items-center gap-2 border border-outline/10">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <div class="relative flex-1">
                            <x-lucide-search class="absolute left-4 top-1/2 -translate-y-1/2 text-tertiary size-[20px]" />
                            <input
                                id="search-input"
                                type="text"
                                name="search"
                                value="{{ request('search', '') }}"
                                placeholder="Search treks, tours, adventures…"
                                autofocus
                                class="w-full h-11 sm:h-12 pl-12 pr-4 bg-transparent font-body-md text-body-md text-on-surface focus:outline-none focus:ring-0 border-none placeholder-tertiary"
                            >
                        </div>
                        @if(request('search'))
                            <a href="{{ route('search', request()->except('search')) }}"
                               class="text-tertiary hover:text-on-surface transition-colors p-2 rounded-lg hover:bg-surface-container-low self-end sm:self-center"
                               title="Clear search">
                                <x-lucide-x class="size-[18px]" />
                            </a>
                        @endif
                        <button type="submit"
                            class="h-11 px-6 bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider rounded-xl transition-all flex items-center justify-center gap-2 shadow-md active:scale-95 shrink-0 cursor-pointer">
                            <x-lucide-compass class="size-[16px]" />
                            <span>Search</span>
                        </button>
                    </form>

                    {{-- Category Filter Pills --}}
                    @if($categories->isNotEmpty())
                        <div class="flex items-center justify-start sm:justify-center gap-2 overflow-x-auto no-scrollbar w-full py-1 -mx-gutter-mobile px-gutter-mobile sm:mx-0 sm:px-0">
                            <a href="{{ route('search', request()->except('category')) }}"
                               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-xs font-bold transition-all border backdrop-blur-sm shrink-0
                                      {{ !request('category') ? 'bg-primary-container text-on-primary-fixed border-primary-container shadow-md' : 'bg-summit-white/10 text-summit-white border-summit-white/20 hover:bg-summit-white/20' }}">
                                All
                            </a>
                            @foreach($categories as $cat)
                                <a href="{{ route('search', array_merge(request()->except('category'), ['category' => $cat->slug])) }}"
                                   class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-xs font-bold transition-all border backdrop-blur-sm shrink-0
                                          {{ request('category') === $cat->slug ? 'bg-primary-container text-on-primary-fixed border-primary-container shadow-md' : 'bg-summit-white/10 text-summit-white border-summit-white/20 hover:bg-summit-white/20' }}">
                                    {{ $cat->name }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>

            {{-- ── Results Section ── --}}
            <section class="px-gutter-mobile lg:px-gutter-desktop py-space-2xl w-full">
                <div class="max-w-max-content-width mx-auto">

                    {{-- Results count & active filters --}}
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-8">
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-semibold text-on-surface">
                                <span class="text-primary font-black">{{ $services->count() }}</span>
                                {{ Str::plural('result', $services->count()) }}
                                @if(request('search')) for "<span class="text-on-surface italic">{{ request('search') }}</span>"@endif
                                @if(request('category'))
                                    @php $activeCat = $categories->firstWhere('slug', request('category')); @endphp
                                    @if($activeCat) in <span class="text-on-surface font-bold">{{ $activeCat->name }}</span>@endif
                                @endif
                            </span>
                        </div>
                        @if(request()->hasAny(['search', 'category']))
                            <a href="{{ route('search') }}"
                               class="inline-flex items-center gap-1.5 text-xs font-bold text-primary hover:underline">
                                <x-lucide-x class="size-3.5" />
                                Clear all filters
                            </a>
                        @endif
                    </div>

                    @if($services->isEmpty())
                        {{-- Empty state --}}
                        <div class="bg-surface-container-low rounded-2xl p-16 text-center max-w-2xl mx-auto border border-outline/10 space-y-5">
                            <div class="bg-surface-container-high w-16 h-16 rounded-2xl flex items-center justify-center mx-auto">
                                <x-lucide-search class="size-8 text-tertiary" />
                            </div>
                            <h2 class="text-headline-md font-bold text-on-surface">No Adventures Found</h2>
                            <p class="text-body-md text-tertiary max-w-md mx-auto">
                                @if(request('search'))
                                    No results matched "{{ request('search') }}". Try different keywords or browse all adventures.
                                @else
                                    No services are available for the selected filter. Try browsing all categories.
                                @endif
                            </p>
                            <div class="pt-2 flex flex-wrap justify-center gap-3">
                                <a href="{{ route('search') }}"
                                   class="px-5 py-2.5 bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-md font-bold rounded-xl transition-all">
                                    Browse All
                                </a>
                                <a href="{{ route('plan-your-trek') }}"
                                   class="px-5 py-2.5 bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md font-bold rounded-xl transition-all shadow-md">
                                    Plan Custom Trek
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                            @foreach($services as $trek)
                                <article class="group bg-surface-container-lowest flex flex-col justify-between overflow-hidden rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-300 border border-outline/10">
                                    <div>
                                        {{-- Card Image --}}
                                        <a href="{{ $trek->url }}" class="bg-surface-dim relative block h-64 w-full overflow-hidden">
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
                                                    {{ $trek->category?->name ?? 'Adventure' }}
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
                                        </a>

                                        {{-- Card Content --}}
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

                                            {{-- Stats --}}
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

                                    {{-- Card Footer --}}
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
                                            <a class="bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-sm text-xs rounded-xl py-2.5 text-center font-bold tracking-wider uppercase transition-all"
                                               href="{{ $trek->url }}">
                                                Itinerary
                                            </a>
                                            <a class="bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-sm text-xs rounded-xl py-2.5 text-center font-bold tracking-wider uppercase transition-all shadow-sm"
                                               href="{{ $trek->url }}#booking">
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

            {{-- ── CTA Footer ── --}}
            <section class="bg-surface-container-low border-t border-outline/10 py-16 px-gutter-mobile lg:px-gutter-desktop w-full">
                <div class="max-w-4xl mx-auto text-center space-y-6">
                    <span class="bg-primary/10 text-primary text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full">
                        Custom Mountain Journeys
                    </span>
                    <h2 class="text-3xl font-extrabold text-on-surface">
                        Can't find what you're looking for?
                    </h2>
                    <p class="text-tertiary text-base max-w-2xl mx-auto leading-relaxed">
                        Our licensed guides craft fully custom journeys tailored to your fitness level, schedule, and budget — from intimate tea-house treks to full expedition support.
                    </p>
                    <div class="pt-2 flex flex-wrap justify-center gap-4">
                        <a href="{{ route('plan-your-trek') }}"
                           class="px-8 py-3.5 bg-primary hover:bg-primary/90 text-on-primary font-bold rounded-xl transition-all shadow-lg active:scale-95">
                            Plan Your Custom Trek
                        </a>
                        <a href="{{ route('contact') }}"
                           class="px-8 py-3.5 bg-surface-container-highest hover:bg-surface-container text-on-surface font-bold rounded-xl transition-all border border-outline/10">
                            Contact Us
                        </a>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <x-footer />
</x-layouts.app>
