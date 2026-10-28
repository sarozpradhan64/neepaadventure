<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full">
        <div class="flex w-full flex-col">
            <!-- HERO SECTION WITH CINEMATIC HIMALAYAN VISUAL & TRIP FINDER -->
            <section class="bg-slate-950 relative w-full overflow-hidden pt-28 pb-16 sm:pt-36 sm:pb-24 md:pt-44 md:pb-32">
                <!-- Hero Background Visual (Natural Himalayan Golden Hour Panorama) -->
                <div class="absolute inset-0 h-full w-full scale-105 transform bg-cover bg-center opacity-85 sm:opacity-90 transition-transform duration-1000"
                    data-alt="Vast cinematic panorama of Mount Everest and Himalayan passes at golden hour sunrise in Nepal"
                    style="background-image: url('{{ asset('images/himalaya_hero.jpg') }}');">
                </div>

                <!-- Neutral Cinematic Scrim & Vignette (No blue wash - lets natural mountain photography shine) -->
                <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-slate-950/75 via-slate-950/30 to-slate-950/90"></div>
                <div class="pointer-events-none absolute inset-0 bg-black/20"></div>

                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop relative z-10 mx-auto flex flex-col items-center text-center">
                    @php
                        $heroTitle =
                            $websiteSettings['hero_title'] ?? "Conquer the World's Highest Passes with Guide Mastery";
                        $heroText =
                            $websiteSettings['hero_text'] ??
                            "Pioneering 100% safety records across Nepal's 8,000m trails. Led by certified Guide leaders with sustainable zero-plastic ethics and intimate small trek teams.";
                        $highlightText = $websiteSettings['hero_highlighted_text'] ?? '';

                        if ($highlightText) {
                            $words = array_filter(array_map('trim', explode(',', $highlightText)));
                            foreach ($words as $word) {
                                if (str_contains($heroTitle, $word)) {
                                    $heroTitle = str_replace(
                                        $word,
                                        '<span class="text-primary-container inline-block font-black drop-shadow-md">' .
                                            $word .
                                            '</span>',
                                        $heroTitle,
                                    );
                                }
                            }
                        }

                        $heroStats = json_decode($websiteSettings['hero_stats'] ?? '[]', true) ?: [];
                        if (empty($heroStats)) {
                            $heroStats = [
                                ['value' => '500+', 'label' => 'Happy Clients'],
                                ['value' => '100%', 'label' => 'Success Rate'],
                                ['value' => '', 'label' => 'Eco-Friendly'],
                                ['value' => '24/7', 'label' => 'Rescue Support'],
                            ];
                        }
                        $statIcons = ['star', 'shield-check', 'leaf', 'siren'];
                        $searchAction = route('search');
                    @endphp

                    <!-- Main Headline -->
                    <h1 class="font-display-xl text-3xl sm:text-5xl md:text-6xl font-extrabold text-summit-white mb-4 sm:mb-5 max-w-4xl leading-[1.12] sm:leading-[1.08] tracking-tight drop-shadow-xl px-1">
                        {!! $heroTitle !!}
                    </h1>

                    <!-- Subheadline -->
                    <p class="font-body-lg text-sm sm:text-base md:text-lg text-slate-200/90 mx-auto max-w-2xl mb-7 sm:mb-9 px-2 leading-relaxed drop-shadow">
                        {{ $heroText }}
                    </p>

                    <!-- Interactive Floating Trip Search Bar (Single Input as Original) -->
                    <div class="w-full max-w-3xl mx-auto bg-surface-container-lowest shadow-[0_12px_45px_rgba(0,0,0,0.4)] rounded-2xl p-2 sm:p-2.5 text-left mb-6 sm:mb-8 relative z-20 border border-outline/10">
                        <form action="{{ $searchAction }}" method="GET" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
                            <div class="relative flex-1">
                                <x-lucide-search class="absolute left-3.5 sm:left-4 top-1/2 -translate-y-1/2 text-tertiary size-[18px] sm:size-[20px]" />
                                <input type="text" name="search" placeholder="Search Treks, Tours, Adventure & Authentic Nepal Experiences" 
                                    class="w-full h-11 sm:h-13 pl-10 sm:pl-12 pr-4 bg-transparent font-body-md text-sm sm:text-body-md text-on-surface focus:outline-none focus:ring-0 border-none placeholder-tertiary">
                            </div>
                            <button type="submit"
                                class="h-11 sm:h-13 px-6 sm:px-7 bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-xs sm:text-label-md font-bold uppercase tracking-wider rounded-xl transition-all flex items-center justify-center gap-space-xs shadow-md active:scale-95 shrink-0 cursor-pointer">
                                <x-lucide-compass class="size-[16px]" />
                                <span>Explore</span>
                            </button>
                        </form>
                    </div>

                    <!-- Quick Action CTAs -->
                    <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-4 mb-8 sm:mb-10">
                        <a href="{{ route('services.category', 'trekking') }}"
                            class="inline-flex items-center gap-2 px-5 sm:px-6 py-2.5 sm:py-3 rounded-xl bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-bold text-xs sm:text-sm tracking-wider uppercase shadow-lg hover:shadow-xl transition-all active:scale-95">
                            <x-lucide-compass class="size-4" />
                            <span>Explore Expeditions</span>
                        </a>
                        <a href="{{ route('plan-your-trek') }}"
                            class="inline-flex items-center gap-2 px-5 sm:px-6 py-2.5 sm:py-3 rounded-xl bg-white/10 hover:bg-white/20 text-summit-white border border-white/25 backdrop-blur-md font-semibold text-xs sm:text-sm tracking-wider uppercase shadow-md transition-all active:scale-95">
                            <x-lucide-calendar class="size-4 text-primary-container" />
                            <span>Plan Custom Trek</span>
                        </a>
                    </div>

                    <!-- Trust Proof Badges -->
                    <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3.5 relative z-20 px-2">
                        @foreach($heroStats as $index => $stat)
                            @php
                                $icon = !empty($stat['icon']) ? $stat['icon'] : $statIcons[$index % count($statIcons)];
                                $value = trim($stat['value'] ?? '');
                                $label = trim($stat['label'] ?? '');
                            @endphp
                            @if($label)
                            <div class="flex items-center gap-2 sm:gap-2.5 rounded-xl bg-white/10 hover:bg-white/15 border border-white/20 px-3.5 py-2 sm:px-4 sm:py-2.5 backdrop-blur-md transition-all shadow-sm">
                                @svg('lucide-'.$icon, 'text-primary-container size-3.5 sm:size-4 shrink-0')
                                <div class="flex items-baseline gap-1 sm:gap-1.5 text-xs sm:text-sm">
                                    @if($value)
                                        <span class="text-primary-container font-black tracking-tight">{{ $value }}</span>
                                    @endif
                                    <span class="text-summit-white/90 text-[11px] sm:text-xs font-medium">{{ $label }}</span>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- WHO ARE WE SECTION -->
            @php
                $whoTitle = $websiteSettings['who_are_we_title'] ?? 'Setting the Standard in Trekking Excellence';
                $whoSubtitle = $websiteSettings['who_are_we_subtitle'] ?? 'Who We Are';
                $whoText = $websiteSettings['who_are_we_text'] ?? 'We believe in building more than just itineraries; we build trust through unparalleled safety, expert guidance, and sustainable practices. Join us to experience the mountains with true professionals.';
                $whoBullets = json_decode($websiteSettings['who_are_we_bullets'] ?? '[]', true) ?: [
                    'Uncompromising safety standards on every trek.',
                    'Decades of proven Himalayan expertise.',
                    'Commitment to sustainable and ethical practices.'
                ];
                $whoImage = !empty($websiteSettings['who_are_we_image']) 
                    ? asset('storage/' . $websiteSettings['who_are_we_image']) 
                    : 'https://images.unsplash.com/photo-1522163182402-834f871fd851?q=80&w=2000&auto=format&fit=crop';
            @endphp
            <section class="bg-surface-container-lowest py-space-2xl md:py-space-3xl w-full">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                    <div class="gap-space-xl lg:gap-space-2xl grid grid-cols-1 items-center lg:grid-cols-2">
                        <!-- Image Side -->
                        <div class="relative w-full rounded-2xl overflow-hidden shadow-lg h-[280px] sm:h-[380px] lg:h-[550px]">
                            <img src="{{ $whoImage }}" alt="{{ $whoTitle }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <!-- Small decorative element on image -->
                            <div class="absolute bottom-6 left-6 right-6">
                                <div class="bg-surface/90 backdrop-blur-md p-space-md rounded-xl inline-flex items-center gap-4 shadow-sm">
                                    <div class="bg-primary text-on-primary flex h-12 w-12 shrink-0 items-center justify-center rounded-full">
                                        <x-lucide-shield-check class="size-6" />
                                    </div>
                                    <div>
                                        <div class="font-headline-sm font-bold text-on-surface">Trusted by Thousands</div>
                                        <div class="font-body-sm text-tertiary">Verified Excellence</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Text Side -->
                        <div class="flex flex-col justify-center">
                            <div class="font-badge-caption text-badge-caption text-primary mb-space-xs font-bold tracking-[0.2em] uppercase">
                                {{ $whoSubtitle }}
                            </div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface mb-space-md tracking-tight">
                                {{ $whoTitle }}
                            </h2>
                            <p class="font-body-lg text-body-lg text-tertiary mb-space-lg leading-relaxed">
                                {{ $whoText }}
                            </p>
                            
                            @if(!empty($whoBullets))
                                <div class="space-y-4 mb-space-lg">
                                    @foreach($whoBullets as $bullet)
                                        <div class="flex items-start gap-3">
                                            <div class="text-primary mt-1 shrink-0">
                                                <x-lucide-check-circle class="size-5" />
                                            </div>
                                            <p class="font-body-md text-on-surface">{{ $bullet }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <div>
                                <a href="{{ route('about') }}" class="bg-primary-container text-on-primary-fixed hover:bg-amber-flare font-label-md px-space-xl py-space-sm inline-flex items-center justify-center rounded-xl font-bold uppercase tracking-wider transition-colors shadow-sm">
                                    Read Our Full Story
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @if(isset($homepageSections) && $homepageSections->isNotEmpty())
                @foreach($homepageSections as $section)
                    @switch($section->section_type)

                        {{-- CURATED / CUSTOM SERVICES SECTION --}}
                        @case('custom_services')
                            @php
                                $selectedServiceIds = $section->settings['service_ids'] ?? [];
                                $curatedServices = collect($selectedServiceIds)
                                    ->map(fn($id) => $allServices->get((int)$id))
                                    ->filter();

                                if ($curatedServices->isEmpty()) {
                                    $curatedServices = $treks->take(4);
                                }
                            @endphp
                            @if($curatedServices->isNotEmpty())
                            <section class="py-space-3xl bg-surface-container-lowest border-y border-outline/5 w-full">
                                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                                    <div class="mb-space-2xl gap-space-lg flex flex-col justify-between md:flex-row md:items-end">
                                        <div>
                                            @if($section->subtitle)
                                                <div class="font-badge-caption text-badge-caption text-primary mb-space-2xs font-bold tracking-[0.2em] uppercase">
                                                    {{ $section->subtitle }}
                                                </div>
                                            @endif
                                            <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                                                {{ $section->title }}
                                            </h2>
                                        </div>
                                        @if($section->button_text)
                                            <a href="{{ $section->button_url ?: ($defaultCategory ? route('services.category', $defaultCategory->slug) : route('treks')) }}" class="group inline-flex items-center gap-2 font-label-md font-bold text-on-surface hover:text-primary transition-colors py-2 px-4 rounded-full border border-outline/20 hover:border-primary/40 bg-surface self-start md:self-auto">
                                                {{ $section->button_text }}
                                                <span class="bg-primary/10 text-primary group-hover:bg-primary group-hover:text-on-primary p-1 rounded-full transition-colors">
                                                    <x-lucide-arrow-right class="size-4" />
                                                </span>
                                            </a>
                                        @endif
                                    </div>
                                    <!-- 4-Card Trek Grid for Curated Services -->
                                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                                        @foreach($curatedServices as $trek)
                                            @php
                                                $badgeClass = $loop->index % 4 === 0 ? 'bg-primary-container text-on-primary-fixed' : 
                                                              ($loop->index % 4 === 1 ? 'bg-ridge-deep/80 text-summit-white' : 
                                                              ($loop->index % 4 === 2 ? 'bg-tertiary text-summit-white' : 
                                                              'bg-primary text-summit-white'));
                                                
                                                $inclusionsList = [];
                                                if (!empty($trek->inclusions)) {
                                                    if (preg_match_all('/<li[^>]*>(.*?)<\/li>/is', $trek->inclusions, $matches)) {
                                                        $rawItems = $matches[1];
                                                    } else {
                                                        $rawItems = explode("\n", $trek->inclusions);
                                                    }
                                                    $inclusionsList = array_slice(array_values(array_filter(array_map(fn($item) => trim(html_entity_decode(strip_tags($item))), $rawItems))), 0, 2);
                                                }
                                            @endphp
                                            <x-trek-card 
                                                title="{{ $trek->title }}"
                                                image="{{ $trek->featured_image ? asset('storage/' . $trek->featured_image) : 'https://placehold.co/600x400?text=Neepa+Adventure' }}"
                                                badge="{{ $trek->difficulty_level ?? 'Featured Trek' }}" 
                                                badgeClass="{{ $badgeClass }}"
                                                altitude="{{ $trek->maximum_altitude ?? 'TBA' }}" 
                                                duration="{{ $trek->duration ?? 'TBA' }}" 
                                                rating="5.0" 
                                                reviews="100+"
                                                description="{{ Str::limit($trek->short_description ?? strip_tags($trek->description), 120) }}"
                                                :inclusions="$inclusionsList" 
                                                price="${{ number_format((float)($trek->price_from ?? 0)) }}"
                                                href="{{ $trek->url }}" 
                                            />
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                            @endif
                            @break

                        {{-- 2026/27 GUARANTEED DEPARTURES --}}
                        @case('departures')
                            <section class="py-space-3xl relative w-full overflow-hidden bg-surface">
                                <!-- Decorative background elements -->
                                <div class="absolute inset-0 pointer-events-none overflow-hidden">
                                    <div class="absolute -top-[20%] -right-[10%] w-[50%] h-[50%] rounded-full bg-primary-container/10 blur-[100px]"></div>
                                    <div class="absolute -bottom-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-tertiary/5 blur-[120px]"></div>
                                </div>

                                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop relative z-10 mx-auto">
                                    <!-- Section Header -->
                                    <div class="mb-space-2xl flex flex-col md:flex-row md:items-end justify-between gap-space-lg">
                                        <div class="max-w-2xl">
                                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary mb-space-sm">
                                                <span class="relative flex h-2 w-2">
                                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                                                </span>
                                                <span class="font-badge-caption text-badge-caption font-bold tracking-[0.2em] uppercase">Limited Slots</span>
                                            </div>
                                            <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight mb-2">
                                                2026/27 <span class="text-primary font-bold">Guaranteed Departures</span>
                                            </h2>
                                            <p class="font-body-md text-body-md text-tertiary">
                                                Lock in your adventure early. Fixed departure dates with confirmed groups, expert lead guides, and early-bird savings.
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-space-sm shrink-0">
                                            <div class="relative group">
                                                <select id="season-filter" class="appearance-none bg-surface-container-lowest border-2 border-outline/10 hover:border-primary/30 rounded-xl pl-5 pr-12 py-3 text-on-surface font-label-md font-bold focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all cursor-pointer">
                                                    <option value="">All Seasons</option>
                                                    <option value="autumn">Autumn (Oct - Nov)</option>
                                                    <option value="spring">Spring (Mar - May)</option>
                                                </select>
                                                <x-lucide-chevron-down class="absolute right-4 top-1/2 -translate-y-1/2 size-5 text-tertiary pointer-events-none group-hover:text-primary transition-colors" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modern Ticket-Style Cards -->
                                    <div id="departures-container" class="space-y-space-md">
                                        @include('components.departures-list', ['departures' => $departures])
                                    </div>
                                    
                                    <!-- Footer Link -->
                                    <div class="mt-space-xl text-center md:text-left flex justify-center md:justify-start">
                                        <a href="{{ route('schedules') }}" class="group inline-flex items-center gap-3 font-label-md font-bold text-on-surface uppercase tracking-wider hover:text-primary transition-colors py-2 px-4 rounded-full border border-transparent hover:border-primary/20 hover:bg-primary/5">
                                            Explore All Schedules 
                                            <span class="bg-primary/10 text-primary group-hover:bg-primary group-hover:text-on-primary p-1.5 rounded-full transition-colors">
                                                <x-lucide-arrow-right class="size-4" />
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </section>
                            @break

                        {{-- WHY TREK / THE NEEPA STANDARD --}}
                        @case('why_trek')
                            <section class="py-space-3xl bg-surface-container-low w-full">
                                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                                    <div class="mb-space-3xl mx-auto max-w-2xl text-center">
                                        <div
                                            class="font-badge-caption text-badge-caption text-primary mb-space-2xs font-bold tracking-[0.2em] uppercase">
                                            {{ $section->subtitle ?: 'The Neepa Standard' }}
                                        </div>
                                        <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                                            {{ $section->title ?: 'Built on Guide Heritage & Clinical Safety' }}
                                        </h2>
                                        <p class="font-body-md text-body-md text-tertiary mt-space-2xs">
                                            We do not outsource your safety to contractors. Every itinerary is led by our full-time
                                            Kathmandu &amp; Khumbu trek family.
                                        </p>
                                    </div>
                                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                                        <!-- Feature 1 -->
                                        <div
                                            class="bg-surface-container-lowest p-space-xl group flex flex-col justify-between rounded-2xl border border-outline/10 shadow-sm transition-all hover:shadow-md">
                                            <div>
                                                <div
                                                    class="bg-primary-container/20 text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary flex h-12 w-12 items-center justify-center rounded-lg transition-colors">
                                                    <x-lucide-mountain class="size-[28px]" />
                                                </div>
                                                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">
                                                    Guide-Led Heritage
                                                </h3>
                                                <p class="font-body-md text-body-md text-tertiary">
                                                    Our lead trek sardars boast multiple 8,000m destinations and ancestral understanding
                                                    of weather patterns, snow pack stability, and trail health.
                                                </p>
                                            </div>
                                            <div
                                                class="pt-space-lg font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold tracking-wider uppercase">
                                                <span>NNMGA Certified</span>
                                                <x-lucide-arrow-right class="size-[16px]" />
                                            </div>
                                        </div>
                                        <!-- Feature 2 -->
                                        <div
                                            class="bg-surface-container-lowest p-space-xl group flex flex-col justify-between rounded-2xl border border-outline/10 shadow-sm transition-all hover:shadow-md">
                                            <div>
                                                <div
                                                    class="bg-primary-container/20 text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary flex h-12 w-12 items-center justify-center rounded-lg transition-colors">
                                                    <x-lucide-shield-plus class="size-[28px]" />
                                                </div>
                                                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">
                                                    Medical &amp; Evacuation Ready
                                                </h3>
                                                <p class="font-body-md text-body-md text-tertiary">
                                                    Daily pulse oximeter records, hyperbaric Gamow chambers on remote passes, and direct
                                                    satellite phone links with our Kathmandu medical team.
                                                </p>
                                            </div>
                                            <div
                                                class="pt-space-lg font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold tracking-wider uppercase">
                                                <span>Garmin InReach Active</span>
                                                <x-lucide-arrow-right class="size-[16px]" />
                                            </div>
                                        </div>
                                        <!-- Feature 3 -->
                                        <div
                                            class="bg-surface-container-lowest p-space-xl group flex flex-col justify-between rounded-2xl border border-outline/10 shadow-sm transition-all hover:shadow-md">
                                            <div>
                                                <div
                                                    class="bg-primary-container/20 text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary flex h-12 w-12 items-center justify-center rounded-lg transition-colors">
                                                    <x-lucide-hand-heart class="size-[28px]" />
                                                </div>
                                                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">
                                                    Fair Porter Welfare
                                                </h3>
                                                <p class="font-body-md text-body-md text-tertiary">
                                                    Strict 20kg weight caps, full mountain gear sets, living wages, and comprehensive
                                                    medical insurance. Signatories to the International Porter Protection Charter.
                                                </p>
                                            </div>
                                            <div
                                                class="pt-space-lg font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold tracking-wider uppercase">
                                                <span>Ethical Employment</span>
                                                <x-lucide-arrow-right class="size-[16px]" />
                                            </div>
                                        </div>
                                        <!-- Feature 4 -->
                                        <div
                                            class="bg-surface-container-lowest p-space-xl group flex flex-col justify-between rounded-2xl border border-outline/10 shadow-sm transition-all hover:shadow-md">
                                            <div>
                                                <div
                                                    class="bg-primary-container/20 text-primary mb-space-lg group-hover:bg-primary group-hover:text-on-primary flex h-12 w-12 items-center justify-center rounded-lg transition-colors">
                                                    <x-lucide-sliders-horizontal class="size-[28px]" />
                                                </div>
                                                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">
                                                    Bespoke Flexibility
                                                </h3>
                                                <p class="font-body-md text-body-md text-tertiary">
                                                    Upgrade to handpicked luxury teahouse lodges with heated beds, private helicopter
                                                    returns from Kala Patthar, or custom alpine photography paces.
                                                </p>
                                            </div>
                                            <div
                                                class="pt-space-lg font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold tracking-wider uppercase">
                                                <span>Private &amp; Tailored</span>
                                                <x-lucide-arrow-right class="size-[16px]" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            @break

                        {{-- MEET OUR TREK LEADERS --}}
                        @case('team_guides')
                            <section class="py-space-3xl bg-surface w-full">
                                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                                    <div class="gap-space-2xl grid grid-cols-1 items-center lg:grid-cols-12">
                                        <!-- Left: Leader Highlight with Image -->
                                        @php
                                            $featuredGuide = \Blaze\AdminCore\Models\TeamMember::where('status', true)
                                                ->where('is_guide', true)
                                                ->where('featured', true)
                                                ->orderBy('sort_order')
                                                ->first();
                                            $totalGuides = \Blaze\AdminCore\Models\TeamMember::where('status', true)->where('is_guide', true)->count();
                                        @endphp
                                        <div class="relative lg:col-span-6">
                                            @if($featuredGuide)
                                                <div class="bg-ridge-deep relative overflow-hidden rounded-2xl shadow-2xl">
                                                    <img alt="{{ $featuredGuide->name }}"
                                                        class="h-auto max-h-[580px] w-full object-cover"
                                                        src="{{ $featuredGuide->image ? \Illuminate\Support\Facades\Storage::disk('public')->url($featuredGuide->image) : 'https://placehold.co/600x800' }}" />
                                                    <div
                                                        class="from-ridge-deep absolute inset-0 bg-gradient-to-t via-transparent to-transparent opacity-90">
                                                    </div>
                                                    <div class="text-summit-white absolute right-6 bottom-6 left-6">
                                                        <span
                                                            class="px-space-sm bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption rounded-lg py-1 font-bold tracking-wider uppercase">
                                                            {{ $featuredGuide->designation ?? $featuredGuide->role ?? 'Trek Leader' }}
                                                        </span>
                                                        <h3 class="font-headline-md text-headline-md text-summit-white mt-2 font-bold">
                                                            {{ $featuredGuide->name }}
                                                        </h3>
                                                        <p class="font-body-sm text-body-sm text-surface-container-high mt-1 opacity-90">
                                                            {!! strip_tags($featuredGuide->bio) !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            @else
                                            <div class="bg-ridge-deep relative overflow-hidden rounded-2xl shadow-2xl">
                                                <img alt="Portrait of Dawa Tenzing Sherpa, Senior Trek Guide"
                                                    class="h-auto max-h-[580px] w-full object-cover"
                                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDacVdR5VA8tGaaIOU8DkYpJb4kqOBUqEhRNNZdvOFiYxTom4bM2ebieAgUriYYqW-KVdfcX6vxkBl5Ew4OvWs74tqA4vYaCbaKgmvg_QkDkrKaIEzv1lIRq_w60KQbKsmBDGdn8qOwZKSgrGA7XpwrYehBeNLKCm1sRc0t5Qu8rrgJcjG2y-D8nHkUVrO7JJyALl3aBLxSfmwX96EM7eKsWTkVttaqoZbg252LXTmAN2RFUD893XLz" />
                                                <div
                                                    class="from-ridge-deep absolute inset-0 bg-gradient-to-t via-transparent to-transparent opacity-90">
                                                </div>
                                                <div class="text-summit-white absolute right-6 bottom-6 left-6">
                                                    <span
                                                        class="px-space-sm bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption rounded-lg py-1 font-bold tracking-wider uppercase">
                                                        Chief Trek Leader
                                                    </span>
                                                    <h3 class="font-headline-md text-headline-md text-summit-white mt-2 font-bold">
                                                        Dawa Tenzing Sherpa
                                                    </h3>
                                                    <p class="font-body-sm text-body-sm text-surface-container-high mt-1 opacity-90">
                                                        14x Everest Destinations • 4x K2 Treks • Lead High-Altitude Rescue Trainer
                                                    </p>
                                                </div>
                                            </div>
                                            @endif
                                            <!-- Floating Micro Credential Card -->
                                            <div
                                                class="bg-surface-container-lowest p-space-md gap-space-md absolute -right-6 -bottom-6 hidden max-w-xs items-center rounded-xl shadow-xl sm:flex">
                                                <x-lucide-award class="text-primary size-[36px]" />
                                                <div>
                                                    <div class="font-headline-sm text-headline-sm text-on-surface font-bold">100%</div>
                                                    <div class="font-body-sm text-body-sm text-tertiary">
                                                        Zero Serious Alpine Incidents across 13 Seasons
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Right: Story & Guide Culture -->
                                        <div class="space-y-space-lg lg:col-span-6">
                                            <div>
                                                <div
                                                    class="font-badge-caption text-badge-caption text-primary mb-space-2xs font-bold tracking-[0.2em] uppercase">
                                                    {{ $section->subtitle ?: 'The Mountain Guardians' }}
                                                </div>
                                                <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                                                    {{ $section->title ?: "You Are in the Hands of Nepal's Finest Trekkers" }}
                                                </h2>
                                            </div>
                                            <p class="font-body-lg text-body-lg text-tertiary">
                                                Every Neepa Adventure trekker is paired with authentic Guides born and raised in
                                                high-altitude Khumbu, Rolwaling, or Dolpo valleys. Their physiological adaptation is
                                                matched with world-standard certifications in wilderness trauma, high-angle rescue, and
                                                weather modeling.
                                            </p>
                                            <div class="space-y-space-md">
                                                <div class="gap-space-md flex items-start">
                                                    <div
                                                        class="bg-surface-container-high text-primary mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
                                                        <x-lucide-badge-check class="size-[22px]" />
                                                    </div>
                                                    <div>
                                                        <h4 class="font-headline-sm text-headline-sm text-on-surface">
                                                            Licensed Guides
                                                        </h4>
                                                        <p class="font-body-sm text-body-sm text-tertiary">
                                                            Formal international diplomas certifying rope management, crevasse
                                                            extraction, and alpine group leadership.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="gap-space-md flex items-start">
                                                    <div
                                                        class="bg-surface-container-high text-primary mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
                                                        <x-lucide-languages class="size-[22px]" />
                                                    </div>
                                                    <div>
                                                        <h4 class="font-headline-sm text-headline-sm text-on-surface">
                                                            Multilingual Storytellers
                                                        </h4>
                                                        <p class="font-body-sm text-body-sm text-tertiary">
                                                            Fluent in English, Nepali, Tibetan dialects, and German/French on
                                                            specialized private departures.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="gap-space-md flex items-start">
                                                    <div
                                                        class="bg-surface-container-high text-primary mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
                                                        <x-lucide-heart class="size-[22px]" />
                                                    </div>
                                                    <div>
                                                        <h4 class="font-headline-sm text-headline-sm text-on-surface">
                                                            Genuine Himalayan Hospitality
                                                        </h4>
                                                        <p class="font-body-sm text-body-sm text-tertiary">
                                                            Experience teahouse evenings warming by hearths with ginger honey tea,
                                                            Buddhist legends, and mountain songs.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-space-sm gap-space-md flex items-center">
                                                <a class="px-space-lg py-space-sm bg-ridge-deep text-summit-white font-label-md text-label-md hover:bg-tertiary rounded-xl font-bold tracking-wider uppercase transition-all shadow-sm"
                                                    href="{{ route('about') }}#team-leaders">
                                                    Meet All {{ $totalGuides > 0 ? $totalGuides : 24 }} Guides
                                                </a>
                                                <span class="font-body-sm text-body-sm text-tertiary">Or request a specific sardar for
                                                    private groups.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            @break

                        {{-- TRAVELLER REVIEWS --}}
                        @case('reviews')
                            <section class="py-space-3xl bg-ridge-deep w-full">
                                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                                    <div class="mb-space-2xl gap-space-md flex flex-col justify-between md:flex-row md:items-end">
                                        <div>
                                            <div
                                                class="font-badge-caption text-badge-caption text-primary-container mb-space-2xs font-bold tracking-[0.2em] uppercase">
                                                {{ $section->subtitle ?: 'Voices from the Pass' }}
                                            </div>
                                            <h2 class="font-headline-lg text-headline-lg text-summit-white tracking-tight">
                                                {{ $section->title ?: 'Hear From Our Clients' }}
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-3">
                                        @if(isset($testimonials) && $testimonials->isNotEmpty())
                                            @foreach($testimonials->take(3) as $testimonial)
                                                <div class="bg-primary/20 p-space-lg flex flex-col justify-between rounded-2xl border border-summit-white/10 shadow-sm">
                                                    <div>
                                                        <div class="text-primary-container mb-space-sm flex items-center gap-1">
                                                            @for($i = 0; $i < ($testimonial->rating ?? 5); $i++)
                                                                <x-lucide-star class="size-[18px]" />
                                                            @endfor
                                                        </div>
                                                        <h4 class="font-headline-sm text-headline-sm text-summit-white mb-space-2xs">
                                                            "{{ $testimonial->title ?: $testimonial->trip_name ?: 'Exceptional Experience' }}"
                                                        </h4>
                                                        <p class="font-body-md text-body-md text-surface-container/70 mb-space-md">
                                                            "{!! Str::limit(strip_tags($testimonial->content), 200) !!}"
                                                        </p>
                                                    </div>
                                                    <div class="pt-space-md flex items-center justify-between">
                                                        <div>
                                                            <div class="font-label-md text-label-md text-summit-white font-bold">
                                                                {{ $testimonial->name }}
                                                            </div>
                                                            <div class="font-body-sm text-body-sm text-surface-container/60">
                                                                {{ $testimonial->trip_name ?: $testimonial->country }}
                                                            </div>
                                                        </div>
                                                        <x-lucide-shield-check class="text-primary size-[24px]" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <!-- Review Card 1 -->
                                            <div
                                                class="bg-primary/20 p-space-lg flex flex-col justify-between rounded-2xl border border-summit-white/10 shadow-sm">
                                                <div>
                                                    <div class="text-primary-container mb-space-sm flex items-center gap-1">
                                                        <x-lucide-star class="size-[18px]" />
                                                        <x-lucide-star class="size-[18px]" />
                                                        <x-lucide-star class="size-[18px]" />
                                                        <x-lucide-star class="size-[18px]" />
                                                        <x-lucide-star class="size-[18px]" />
                                                    </div>
                                                    <h4 class="font-headline-sm text-headline-sm text-summit-white mb-space-2xs">
                                                        "Flawless Cho La Pass crossing"
                                                    </h4>
                                                    <p class="font-body-md text-body-md text-surface-container/70 mb-space-md">
                                                        "We had unexpected fresh snow on Cho La, but Dawa and Ang Karma guided our group
                                                        with absolute calm and expertise. Their attention to our pulse ox twice daily made
                                                        everyone feel confident and safe."
                                                    </p>
                                                </div>
                                                <div class="pt-space-md flex items-center justify-between">
                                                    <div>
                                                        <div class="font-label-md text-label-md text-summit-white font-bold">
                                                            Marcus &amp; Elena Vance
                                                        </div>
                                                        <div class="font-body-sm text-body-sm text-surface-container/60">
                                                            Everest &amp; Gokyo Lakes • Oct 2024
                                                        </div>
                                                    </div>
                                                    <x-lucide-shield-check class="text-primary-container size-[24px]" />
                                                </div>
                                            </div>
                                            <!-- Review Card 2 -->
                                            <div
                                                class="bg-primary/20 p-space-lg flex flex-col justify-between rounded-2xl border border-summit-white/10 shadow-sm">
                                                <div>
                                                    <div class="text-primary-container mb-space-sm flex items-center gap-1">
                                                        <x-lucide-star class="size-[18px]" />
                                                        <x-lucide-star class="size-[18px]" />
                                                        <x-lucide-star class="size-[18px]" />
                                                        <x-lucide-star class="size-[18px]" />
                                                        <x-lucide-star class="size-[18px]" />
                                                    </div>
                                                    <h4 class="font-headline-sm text-headline-sm text-summit-white mb-space-2xs">
                                                        "My first 6,000m destination on Island Pass"
                                                    </h4>
                                                    <p class="font-body-md text-body-md text-surface-container/70 mb-space-md">
                                                        "The trekking refresher at High Camp was thorough. On destination day, my trekking
                                                        Guide Pemba paced me like clockwork up the headwall. Standing at 6,189m at sunrise
                                                        is an experience I will cherish forever."
                                                    </p>
                                                </div>
                                                <div class="pt-space-md flex items-center justify-between">
                                                    <div>
                                                        <div class="font-label-md text-label-md text-summit-white font-bold">
                                                            Dr. Julian Richter
                                                        </div>
                                                        <div class="font-body-sm text-body-sm text-surface-container/60">
                                                            Island Pass Trek • Nov 2024
                                                        </div>
                                                    </div>
                                                    <x-lucide-shield-check class="text-primary-container size-[24px]" />
                                                </div>
                                            </div>
                                            <!-- Review Card 3 -->
                                            <div
                                                class="bg-primary/20 p-space-lg flex flex-col justify-between rounded-2xl border border-summit-white/10 shadow-sm">
                                                <div>
                                                    <div class="text-primary-container mb-space-sm flex items-center gap-1">
                                                        <x-lucide-star class="size-[18px]" />
                                                        <x-lucide-star class="size-[18px]" />
                                                        <x-lucide-star class="size-[18px]" />
                                                        <x-lucide-star class="size-[18px]" />
                                                        <x-lucide-star class="size-[18px]" />
                                                    </div>
                                                    <h4 class="font-headline-sm text-headline-sm text-summit-white mb-space-2xs">
                                                        "Untamed beauty around Manaslu"
                                                    </h4>
                                                    <p class="font-body-md text-body-md text-surface-container/70 mb-space-md">
                                                        "No crowd jams, raw Tibetan culture, and incredible Guide care. Even when my bag
                                                        zipper tore, our porter carried special repair tape. Outstanding logistics from
                                                        Kathmandu airport to the mountain and back."
                                                    </p>
                                                </div>
                                                <div class="pt-space-md flex items-center justify-between">
                                                    <div>
                                                        <div class="font-label-md text-label-md text-summit-white font-bold">
                                                            Chloe Deschenes
                                                        </div>
                                                        <div class="font-body-sm text-body-sm text-surface-container/60">
                                                            Manaslu Circuit • Apr 2024
                                                        </div>
                                                    </div>
                                                    <x-lucide-shield-check class="text-primary-container size-[24px]" />
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </section>
                            @break

                        {{-- LATEST TRAVEL GUIDES / BLOGS --}}
                        @case('blogs')
                            @if(isset($latestBlogs) && $latestBlogs->isNotEmpty())
                            <section class="bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop py-space-3xl w-full">
                                <div class="max-w-max-content-width mx-auto flex flex-col gap-space-2xl">

                                    <!-- Section Header -->
                                    <div class="flex flex-col gap-space-md justify-between sm:flex-row sm:items-end">
                                        <div class="gap-space-xs flex flex-col">
                                            <span class="font-badge-caption text-badge-caption text-primary font-bold uppercase tracking-[0.2em]">{{ $section->subtitle ?: 'Get Inspired' }}</span>
                                            <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">{{ $section->title ?: 'Latest Travel Guides' }}</h2>
                                        </div>
                                        <a href="{{ route('blog') }}" class="gap-space-xs px-space-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md inline-flex items-center rounded-xl py-3 tracking-wider uppercase transition-colors self-start sm:self-auto shadow-sm">
                                            <span>{{ $section->button_text ?: 'View All Posts' }}</span>
                                            <x-lucide-arrow-right class="size-[18px]" />
                                        </a>
                                    </div>

                                    <!-- Blog Cards Grid -->
                                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                                        @foreach($latestBlogs->take(3) as $post)
                                            <x-blog-card
                                                :title="$post->title"
                                                :slug="$post->slug"
                                                :image="$post->featured_image ? Storage::url($post->featured_image) : null"
                                                :image-alt="$post->title"
                                                :category="$post->category?->name"
                                                :excerpt="$post->excerpt"
                                                :author="$post->author?->name"
                                                :date="$post->created_at->format('M d, Y')"
                                            />
                                        @endforeach
                                    </div>

                                </div>
                            </section>
                            @endif
                            @break

                        {{-- FINAL CALL TO ACTION BANNER --}}
                        @case('cta')
                            <section class="bg-primary py-space-3xl relative w-full overflow-hidden border-t border-primary/20">
                                <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-white/10 via-transparent to-transparent"></div>
                                <div class="pointer-events-none absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-primary-container/10 blur-3xl"></div>
                                <div class="max-w-4xl px-gutter-mobile lg:px-gutter-desktop relative z-10 mx-auto text-center">
                                    @php
                                        // Fetch Krishna from teams (TeamMember), case-insensitive search
                                        $krishnaMember = \Blaze\AdminCore\Models\TeamMember::where('status', true)
                                            ->where('name', 'like', '%Krishna%')
                                            ->first()
                                            ?? \Blaze\AdminCore\Models\TeamMember::where('status', true)->first();

                                        $expertName = $krishnaMember?->name ?? 'Krishna';
                                        $expertRole = $krishnaMember?->designation ?? 'Travel & Trekking Specialist';
                                        $expertImage = $krishnaMember?->image ? \Illuminate\Support\Facades\Storage::disk('public')->url($krishnaMember->image) : null;

                                        $whatsappRaw = $krishnaMember?->phone ?? $contact?->whatsapp ?? '+977-9808389420';
                                        $whatsappClean = preg_replace('/[^0-9]/', '', $whatsappRaw);
                                        $whatsappUrl = 'https://wa.me/' . $whatsappClean . '?text=' . urlencode('Hello ' . $expertName . ', I would like to plan my trek in Nepal.');
                                    @endphp

                                    <!-- Eyebrow Badge -->
                                    <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3.5 py-1 text-badge-caption font-badge-caption tracking-wider uppercase text-primary-container backdrop-blur-sm">
                                        <x-lucide-compass class="size-3.5" />
                                        <span>{{ $section->subtitle ?: 'Ask to travel experts' }}</span>
                                    </div>

                                    <!-- Heading & Description -->
                                    <h2 class="mt-4 font-headline-lg text-headline-lg font-bold text-summit-white tracking-tight">
                                        {{ $section->title ?: 'Plan my trips' }}
                                    </h2>
                                    <p class="mt-3 text-body-md text-white/85 max-w-xl mx-auto leading-relaxed">
                                        Connect directly with our local Himalayan travel specialists for tailored itineraries, advice, and seamless journey planning.
                                    </p>

                                    <!-- Expert Contact Card (Krishna) -->
                                    <div class="mt-8 inline-flex items-center gap-3.5 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-left backdrop-blur-md shadow-sm">
                                        <div class="relative">
                                            @if($expertImage)
                                                <img src="{{ $expertImage }}" alt="{{ $expertName }}" class="size-11 rounded-full object-cover ring-1 ring-white/30" />
                                            @else
                                                <div class="size-11 rounded-full bg-primary-container/20 text-primary-container ring-1 ring-primary-container/30 flex items-center justify-center font-bold text-sm">
                                                    {{ strtoupper(substr($expertName, 0, 1)) }}
                                                </div>
                                            @endif
                                            <span class="absolute -bottom-0.5 -right-0.5 size-3 rounded-full bg-emerald-400 ring-2 ring-primary" title="Available to chat"></span>
                                        </div>
                                        <div>
                                            <div class="font-label-md text-label-md font-semibold text-summit-white leading-tight">
                                                {{ $expertName }}
                                            </div>
                                            <div class="text-xs text-white/70 mt-0.5">
                                                {{ $expertRole }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
                                        @if($whatsappClean)
                                            <a href="{{ $whatsappUrl }}"
                                               target="_blank"
                                               rel="noopener noreferrer"
                                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-[#25D366] hover:bg-[#20bd5a] px-6 py-3 text-label-md font-label-md font-semibold text-white shadow-md transition-colors">
                                                <svg class="size-4 fill-current shrink-0" viewBox="0 0 24 24">
                                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.646 5.426l-.999 3.647 3.842-.772zm11.391-7.009c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                                                </svg>
                                                <span>Chat on WhatsApp</span>
                                            </a>
                                        @endif
                                        <a href="{{ route('plan-your-trek') }}"
                                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-primary-container hover:bg-amber-flare px-6 py-3 text-label-md font-label-md font-semibold text-on-primary-fixed shadow-md transition-colors">
                                            <span>{{ $section->button_text ?: 'Plan My Trip' }}</span>
                                            <x-lucide-arrow-right class="size-4 shrink-0" />
                                        </a>
                                    </div>
                                </div>
                            </section>
                            @break
                    @endswitch
                @endforeach
            @endif
        </div>
        <!-- CLIENT-SIDE MICRO-INTERACTIONS -->
        <script>
            (function() {
                const tabButtons = document.querySelectorAll('#trekTabs button');
                tabButtons.forEach((btn) => {
                    btn.addEventListener('click', function() {
                        tabButtons.forEach((b) => {
                            b.classList.remove(
                                'bg-primary-container',
                                'text-on-primary-fixed',
                                'font-bold',
                                'shadow-sm',
                            );
                            b.classList.add('text-tertiary', 'font-medium');
                        });
                        this.classList.remove('text-tertiary', 'font-medium');
                        this.classList.add('bg-primary-container', 'text-on-primary-fixed', 'font-bold',
                            'shadow-sm');
                    });
                });
            })();
        </script>
    </main>
    <x-footer />
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const seasonFilter = document.getElementById('season-filter');
            const departuresContainer = document.getElementById('departures-container');

            if (seasonFilter && departuresContainer) {
                seasonFilter.addEventListener('change', function () {
                    const season = this.value;
                    
                    departuresContainer.style.opacity = '0.5';
                    
                    fetch(`{{ route('schedules') }}?season=${season}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        departuresContainer.innerHTML = html;
                        departuresContainer.style.opacity = '1';
                    })
                    .catch(error => {
                        console.error('Error fetching departures:', error);
                        departuresContainer.style.opacity = '1';
                    });
                });
            }
        });
    </script>
</x-layouts.app>
