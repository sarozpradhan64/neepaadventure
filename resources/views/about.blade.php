<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-28">
        <div class="flex w-full flex-col">
            <!-- Immersive Cinematic Hero: Bleeds cleanly beneath header -->
            <!-- About Us Generic Section -->
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="gap-space-2xl grid grid-cols-1 items-center lg:grid-cols-2">
                        <!-- Left: Image -->
                        <div class="relative">
                            <div class="relative overflow-hidden rounded-2xl shadow-xl">
                                <img
                                    class="h-80 w-full transform object-cover transition-transform duration-700 hover:scale-105 lg:h-96"
                                    alt="Group of trekkers walking on a scenic mountain trail in the Himalayas with a beautiful blue sky."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBH-T_vvEFdoqOoZOBFTvoDElAEOrBl2nCqehW5vdVes7CS0Ev4wPgcXWPtSHXQC5MQVCbTl5rLVPi3CE3Jei4Y4t69UHHGUb5DVNRi07EtBhAUyGWWMVgz3hcgMpAVgrgedsLsTKApZq9OtW7tCtmTCMZ1v9GgBpXWYLljR-hl89xy83ZmZfUzOCXb4uxE-cKGJ3o6Ph8TjCIUf4dke1y44J6Y2zLMm7oYDNr4TPlYaNilVlL_ZLHo"
                                />
                                <div class="bottom-space-sm left-space-sm bg-ridge-deep/85 px-space-md py-space-xs text-summit-white absolute rounded-xl backdrop-blur-md">
                                    <span class="font-badge-caption text-badge-caption text-primary-container block tracking-wider uppercase">Khumjung High Valley</span>
                                    <span class="font-body-sm text-body-sm font-medium">3,790m • Cradle of Himalayan Guides</span>
                                </div>
                            </div>
                            @php
                                $founder = \Blaze\AdminCore\Models\TeamMember::where('status', true)->orderBy('sort_order')->first();
                            @endphp
                            @if($founder)
                            <div class="bg-surface-container-lowest p-space-2xs relative -mt-12 ml-auto w-3/4 overflow-hidden rounded-2xl shadow-2xl border border-outline/10">
                                <img
                                    class="h-52 w-full rounded-xl object-cover"
                                    alt="{{ $founder->name }}"
                                    src="{{ $founder->image ? \Illuminate\Support\Facades\Storage::disk('public')->url($founder->image) : 'https://placehold.co/600x800' }}"
                                />
                                <div class="p-space-sm bg-surface-container-lowest">
                                    <div class="font-label-md text-label-md text-on-surface font-bold">
                                        {{ $founder->name }}
                                    </div>
                                    <div class="font-body-sm text-body-sm text-tertiary">
                                        {{ $founder->designation ?? 'Founder' }}
                                    </div>
                                    @php
                                        $founderFb = $founder->facebook_url ?? $founder->facebook_link ?? null;
                                        $founderIg = $founder->instagram_url ?? $founder->instagram_link ?? null;
                                        $founderLi = $founder->linkedin_url ?? $founder->linkedin_link ?? null;
                                        $founderTw = $founder->twitter_url ?? $founder->twitter_link ?? null;
                                    @endphp
                                    @if($founderFb || $founderIg || $founderLi || $founderTw)
                                        <div class="mt-2 pt-2 border-t border-outline/10 flex items-center gap-1.5">
                                            @if($founderFb)<a href="{{ $founderFb }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $founder->name }} on Facebook" class="size-6 rounded-full bg-surface-container hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_8px_rgba(255,210,0,0.4)] text-tertiary transition-all flex items-center justify-center"><x-lucide-facebook class="size-3" /></a>@endif
                                            @if($founderIg)<a href="{{ $founderIg }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $founder->name }} on Instagram" class="size-6 rounded-full bg-surface-container hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_8px_rgba(255,210,0,0.4)] text-tertiary transition-all flex items-center justify-center"><x-lucide-instagram class="size-3" /></a>@endif
                                            @if($founderLi)<a href="{{ $founderLi }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $founder->name }} on LinkedIn" class="size-6 rounded-full bg-surface-container hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_8px_rgba(255,210,0,0.4)] text-tertiary transition-all flex items-center justify-center"><x-lucide-linkedin class="size-3" /></a>@endif
                                            @if($founderTw)<a href="{{ $founderTw }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $founder->name }} on Twitter / X" class="size-6 rounded-full bg-surface-container hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_8px_rgba(255,210,0,0.4)] text-tertiary transition-all flex items-center justify-center"><x-lucide-twitter class="size-3" /></a>@endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                        <!-- Right: Narrative -->
                        <div class="space-y-space-xl">
                            <div>
                                <div class="gap-space-xs text-primary mb-space-xs flex items-center">
                                    <x-lucide-compass class="size-[20px]" />
                                    <span class="font-badge-caption text-badge-caption font-bold tracking-wider uppercase">Who We Are</span>
                                </div>
                                <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">
                                    Your Trusted Partner for Himalayan Adventures
                                </h2>
                            </div>
                            
                            <div class="space-y-space-xs bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm border border-outline/10">
                                <div class="gap-space-sm flex items-center">
                                    <div class="bg-primary-container/20 text-on-primary-container font-headline-sm text-body-md flex h-8 w-8 items-center justify-center rounded-lg font-bold">
                                        01
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                        Passion for the Outdoors
                                    </h3>
                                </div>
                                <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                    We are a team of dedicated travel professionals and experienced trekking guides who share a deep love for the great outdoors. Our mission is to provide unforgettable trekking experiences that allow our clients to connect with nature and explore the majestic beauty of the Himalayas in a safe and responsible manner.
                                </p>
                            </div>
                            
                            <div class="space-y-space-xs bg-surface-container-low p-space-xl rounded-2xl shadow-sm border border-outline/10">
                                <div class="gap-space-sm flex items-center">
                                    <div class="bg-primary-container text-on-primary-fixed font-headline-sm text-body-md flex h-8 w-8 items-center justify-center rounded-lg font-bold">
                                        02
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                        Commitment to Excellence
                                    </h3>
                                </div>
                                <p class="font-body-md text-body-md text-tertiary leading-relaxed">
                                    From carefully crafted itineraries to prioritizing your comfort and safety, we focus on delivering high-quality services. We believe in sustainable tourism that supports local communities and minimizes our environmental footprint, ensuring that the natural wonders we explore remain pristine for future generations.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Core Values & Operational Standards -->
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface-container-low w-full">
                <div class="max-w-max-content-width space-y-space-2xl mx-auto">
                    <div class="space-y-space-xs mx-auto max-w-2xl text-center">
                        <div class="font-badge-caption text-badge-caption text-primary font-bold tracking-[0.2em] uppercase">
                            Uncompromising Benchmarks
                        </div>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold">
                            The Four Pillars of High-Altitude Stewardship
                        </h2>
                        <p class="font-body-md text-body-md text-tertiary">
                            We believe ethical operations and top-tier mountain safety are inseparable disciplines.
                        </p>
                    </div>
                    <div class="gap-space-md grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                        <!-- Pillar 1 -->
                        <div class="bg-surface-container-lowest p-space-xl flex flex-col justify-between rounded-2xl shadow-sm border border-outline/10 transition-shadow hover:shadow-md">
                            <div class="space-y-space-md">
                                <div class="bg-primary-container/20 text-primary flex h-12 w-12 items-center justify-center rounded-xl">
                                    <x-lucide-mountain-snow class="size-[28px]" />
                                </div>
                                <div class="space-y-space-2xs">
                                    <div class="font-badge-caption text-badge-caption text-amber-flare uppercase">
                                        Pillar 01
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                        Native Mountain Lineage
                                    </h3>
                                </div>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    100% of our trip leaders are indigenous Guides holding certifications. Generational acclimation combined with elite technical rescue
                                    training ensures supreme leadership at all elevations.
                                </p>
                            </div>
                        </div>
                        <!-- Pillar 2 -->
                        <div class="bg-surface-container-lowest p-space-xl flex flex-col justify-between rounded-2xl shadow-sm border border-outline/10 transition-shadow hover:shadow-md">
                            <div class="space-y-space-md">
                                <div class="bg-primary-container/20 text-primary flex h-12 w-12 items-center justify-center rounded-xl">
                                    <x-lucide-briefcase-medical class="size-[28px]" />
                                </div>
                                <div class="space-y-space-2xs">
                                    <div class="font-badge-caption text-badge-caption text-amber-flare uppercase">
                                        Pillar 02
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                        Medical-Grade Safety Doctrine
                                    </h3>
                                </div>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Every high trek carries portable hyperbaric Gamow bags, dual O2 systems, and Garmin
                                    inReach satellite transceivers. Guides record daily twice-a-day SpO2, heart rate,
                                    and Lake Louise scores into our encrypted cloud database.
                                </p>
                            </div>
                        </div>
                        <!-- Pillar 3 -->
                        <div class="bg-surface-container-lowest p-space-xl flex flex-col justify-between rounded-2xl shadow-sm border border-outline/10 transition-shadow hover:shadow-md">
                            <div class="space-y-space-md">
                                <div class="bg-primary-container/20 text-primary flex h-12 w-12 items-center justify-center rounded-xl">
                                    <x-lucide-hand-heart class="size-[28px]" />
                                </div>
                                <div class="space-y-space-2xs">
                                    <div class="font-badge-caption text-badge-caption text-amber-flare uppercase">
                                        Pillar 03
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                        Uncompromising Porter Ethics
                                    </h3>
                                </div>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Strict 20kg maximum payload limits, thermal gear kit issue (four-season jackets,
                                    alpine boots, UV sunglasses), comprehensive medical insurance, and living wages that
                                    exceed national collective standards by 35%.
                                </p>
                            </div>
                        </div>
                        <!-- Pillar 4 -->
                        <div class="bg-surface-container-lowest p-space-xl flex flex-col justify-between rounded-2xl shadow-sm border border-outline/10 transition-shadow hover:shadow-md">
                            <div class="space-y-space-md">
                                <div class="bg-primary-container/20 text-primary flex h-12 w-12 items-center justify-center rounded-xl">
                                    <x-lucide-recycle class="size-[28px]" />
                                </div>
                                <div class="space-y-space-2xs">
                                    <div class="font-badge-caption text-badge-caption text-amber-flare uppercase">
                                        Pillar 04
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                        Regenerative Tourism
                                    </h3>
                                </div>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    5% of all trek profits flow into the Khumjung &amp; Phortse Community Education
                                    Trust. Furthermore, our teams haul back an average of 4kg of legacy trail refuse per
                                    client on every high pass crossing.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Expanded Leadership & Operations Team Grid -->
            <section id="team-leaders" class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full">
                <div class="max-w-max-content-width space-y-space-2xl mx-auto">
                    <div class="gap-space-md flex flex-col justify-between md:flex-row md:items-end">
                        <div class="space-y-space-2xs max-w-xl">
                            <div class="font-badge-caption text-badge-caption text-primary font-bold tracking-[0.2em] uppercase">
                                The Guardians
                            </div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold">
                                Trek Leadership &amp; High-Altitude Directors
                            </h2>
                            <p class="font-body-md text-body-md text-tertiary">
                                Our operational backbone combines decades of elite Himalayan destination leadership,
                                wilderness emergency medicine, and international logistics.
                            </p>
                        </div>
                    </div>
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        @php
                            $featuredGuides = \Blaze\AdminCore\Models\TeamMember::where('status', true)
                                ->where('is_guide', true)
                                ->where('featured', true)
                                ->orderBy('sort_order')
                                ->get();
                        @endphp
                        
                        @forelse($featuredGuides as $guide)
                        <div class="bg-surface-container-lowest group overflow-hidden rounded-2xl shadow-sm border border-outline/10 transition-all hover:shadow-lg">
                            <div class="relative h-64 overflow-hidden">
                                <img
                                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    alt="{{ $guide->name }}"
                                    src="{{ $guide->image ? \Illuminate\Support\Facades\Storage::disk('public')->url($guide->image) : 'https://placehold.co/600x800' }}"
                                />
                                <div class="from-on-surface/90 p-space-md absolute inset-x-0 bottom-0 bg-gradient-to-t to-transparent">
                                    <span class="text-primary-container font-badge-caption text-badge-caption uppercase">
                                        {{ $guide->department ?? 'Trek Leader' }}
                                    </span>
                                </div>
                                @if($guide->is_guide)
                                    <div class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-primary-container text-on-primary-fixed font-badge-caption text-[11px] font-extrabold tracking-wider uppercase shadow-md border border-primary-container/60 hover:bg-amber-flare hover:shadow-[0_2px_12px_rgba(255,210,0,0.55)] group-hover:bg-amber-flare group-hover:shadow-[0_2px_12px_rgba(255,210,0,0.5)] transition-all duration-300 flex items-center gap-1.5 select-none">
                                        <span class="size-1.5 rounded-full bg-on-primary-fixed inline-block"></span>
                                        Guide
                                    </div>
                                @endif
                            </div>
                            <div class="p-space-lg space-y-space-sm">
                                <div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                        {{ $guide->name }}
                                    </h3>
                                    <p class="font-label-sm text-label-sm text-primary font-semibold">
                                        {{ $guide->designation ?? $guide->role ?? '' }}
                                    </p>
                                </div>
                                <div class="font-body-sm text-body-sm text-tertiary leading-relaxed line-clamp-3">
                                    {!! strip_tags($guide->bio) !!}
                                </div>
                                @php
                                    $guideFb = $guide->facebook_url ?? $guide->facebook_link ?? null;
                                    $guideIg = $guide->instagram_url ?? $guide->instagram_link ?? null;
                                    $guideLi = $guide->linkedin_url ?? $guide->linkedin_link ?? null;
                                    $guideTw = $guide->twitter_url ?? $guide->twitter_link ?? null;
                                    $guideEmail = $guide->email ? trim($guide->email) : null;
                                    $guidePhone = $guide->phone ? trim($guide->phone) : null;
                                    $hasGuideSocials = $guideFb || $guideIg || $guideLi || $guideTw || $guideEmail || $guidePhone;
                                @endphp
                                @if($hasGuideSocials)
                                    <div class="pt-space-xs border-t border-outline/10 flex flex-wrap items-center gap-2">
                                        @if($guideFb)
                                            <a href="{{ $guideFb }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $guide->name }} on Facebook" title="Facebook" class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_10px_rgba(255,210,0,0.45)] text-tertiary transition-all duration-200 flex items-center justify-center hover:scale-110">
                                                <x-lucide-facebook class="size-4" />
                                            </a>
                                        @endif
                                        @if($guideIg)
                                            <a href="{{ $guideIg }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $guide->name }} on Instagram" title="Instagram" class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_10px_rgba(255,210,0,0.45)] text-tertiary transition-all duration-200 flex items-center justify-center hover:scale-110">
                                                <x-lucide-instagram class="size-4" />
                                            </a>
                                        @endif
                                        @if($guideLi)
                                            <a href="{{ $guideLi }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $guide->name }} on LinkedIn" title="LinkedIn" class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_10px_rgba(255,210,0,0.45)] text-tertiary transition-all duration-200 flex items-center justify-center hover:scale-110">
                                                <x-lucide-linkedin class="size-4" />
                                            </a>
                                        @endif
                                        @if($guideTw)
                                            <a href="{{ $guideTw }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $guide->name }} on Twitter / X" title="Twitter / X" class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_10px_rgba(255,210,0,0.45)] text-tertiary transition-all duration-200 flex items-center justify-center hover:scale-110">
                                                <x-lucide-twitter class="size-4" />
                                            </a>
                                        @endif
                                        @if($guideEmail)
                                            <a href="mailto:{{ $guideEmail }}" aria-label="Email {{ $guide->name }}" title="Email: {{ $guideEmail }}" class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_10px_rgba(255,210,0,0.45)] text-tertiary transition-all duration-200 flex items-center justify-center hover:scale-110">
                                                <x-lucide-mail class="size-4" />
                                            </a>
                                        @endif
                                        @if($guidePhone)
                                            <a href="tel:{{ $guidePhone }}" aria-label="Call {{ $guide->name }}" title="Call: {{ $guidePhone }}" class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_10px_rgba(255,210,0,0.45)] text-tertiary transition-all duration-200 flex items-center justify-center hover:scale-110">
                                                <x-lucide-phone class="size-4" />
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        @empty
                        <!-- Fallback static cards if no featured guides are found -->
                        @endforelse
                    </div>
                </div>
            </section>
            {{-- <!-- Community Commitment & Transparency Ledger Section -->
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="bg-ridge-deep text-summit-white p-space-xl lg:p-space-3xl relative overflow-hidden rounded-2xl shadow-2xl">
                        <div class="bg-primary-container/10 pointer-events-none absolute top-0 right-0 h-96 w-96 rounded-full blur-3xl"></div>
                        <div class="gap-space-2xl relative z-10 grid grid-cols-1 items-center lg:grid-cols-12">
                            <div class="space-y-space-lg lg:col-span-7">
                                <div class="space-y-space-xs">
                                    <div class="font-badge-caption text-badge-caption text-primary-container font-bold tracking-widest uppercase">
                                        Community &amp; Glacier Impact
                                    </div>
                                    <h2 class="font-headline-lg text-headline-lg text-summit-white font-bold">
                                        Leaving the Mountains Stronger for Generations to Come
                                    </h2>
                                    <p class="font-body-md text-body-md text-mist-slate leading-relaxed">
                                        Tourism in the Nepal Himalaya has historically extracted value while leaving
                                        Guide communities exposed to trail erosion, glacial retreat, and underfunded
                                        schools. We take pride in our open-book model: every trekker can trace their
                                        contribution directly to village projects.
                                    </p>
                                </div>
                                <!-- Impact Statistics Counter Mosaic -->
                                <div class="gap-space-md pt-space-xs grid grid-cols-2 sm:grid-cols-3">
                                    <div class="bg-surface-container-lowest/10 p-space-md rounded-xl backdrop-blur-sm">
                                        <div class="font-headline-md text-headline-md text-primary-container font-extrabold">
                                            64
                                        </div>
                                        <div class="font-body-sm text-body-sm text-mist-slate">
                                            Khumjung Children on Full Annual Scholarships
                                        </div>
                                    </div>
                                    <div class="bg-surface-container-lowest/10 p-space-md rounded-xl backdrop-blur-sm">
                                        <div class="font-headline-md text-headline-md text-primary-container font-extrabold">
                                            18,400kg
                                        </div>
                                        <div class="font-body-sm text-body-sm text-mist-slate">
                                            Glacial Trash Removed from Everest &amp; Manaslu
                                        </div>
                                    </div>
                                    <div class="bg-surface-container-lowest/10 p-space-md col-span-2 rounded-xl backdrop-blur-sm sm:col-span-1">
                                        <div class="font-headline-md text-headline-md text-primary-container font-extrabold">
                                            100%
                                        </div>
                                        <div class="font-body-sm text-body-sm text-mist-slate">
                                            Local Porter Gear &amp; Life Insurance Guaranteed
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-space-xs gap-space-md flex flex-wrap items-center">
                                    <a
                                        class="gap-space-xs px-space-lg py-space-sm bg-primary-container text-on-primary-fixed font-label-md text-label-md hover:bg-amber-flare inline-flex items-center rounded-lg font-bold tracking-wider uppercase shadow-md transition-all"
                                        data-path="projects"
                                        href="#"
                                    >
                                        View Public Projects Ledger
                                        <x-lucide-arrow-right class="size-[18px]" />
                                    </a>
                                    <span class="font-body-sm text-body-sm text-mist-slate/70">Audited independently by Himalayan Trust Nepal</span>
                                </div>
                            </div>
                            <!-- Right Visual Callout -->
                            <div class="space-y-space-md lg:col-span-5">
                                <div class="relative overflow-hidden rounded-xl shadow-xl">
                                    <img
                                        class="h-72 w-full object-cover"
                                        data-alt="Guide school children smiling warmly in traditional uniform outside Khumjung Hillary School with prayer flags and snowy passes in background."
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCFz92dIVESoXxKP2XWU9q3XN6t3KqHIgh8Elg91h_GNW7w_OyatAFhiO4cGVRyPc2lRXOkF9CijKSo852fLHOB_ajfEwSYITxRaJ6A2nhFi-r0SmO2ZHFwIPBOwZxLoSCIjmHy4U5iIwWdfG8g8W6GJj53GOUldMZw5ugs_4_g2H1SxWYp2dBcEfRyxuWu2ImCL_0MgklnNSZnJvlVQkmBFWbCobw1FOeOren4K_H83FyNwQCGpIB"
                                    />
                                    <div class="from-ridge-deep/90 absolute inset-0 bg-gradient-to-t via-transparent to-transparent"></div>
                                    <div class="bottom-space-md left-space-md right-space-md absolute">
                                        <div class="font-label-md text-label-md text-summit-white font-bold">
                                            Khumjung High Valley Children’s Fund
                                        </div>
                                        <div class="font-body-sm text-body-sm text-mist-slate">
                                            Providing STEM, English, and Alpine Guiding apprenticeships.
                                        </div>
                                    </div>
                                </div>
                                <!-- Quote badge -->
                                <div class="p-space-md bg-surface-container-lowest/5 gap-space-sm flex items-start rounded-xl backdrop-blur-md">
                                    <x-lucide-quote class="text-primary-container size-[28px] flex-shrink-0" />
                                    <p class="font-body-sm text-body-sm text-mist-slate italic">
                                        “We do not trek to conquer the passes. We trek to remind humanity of its
                                        humility, and to preserve the trails our grandfathers carved.”
                                        <span class="mt-space-2xs text-summit-white block font-semibold not-italic">— Dawa Tenzing Sherpa</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- Interactive Timeline / High Heritage Milestones -->
            {{-- <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface-container-low w-full">
                <div class="max-w-max-content-width space-y-space-2xl mx-auto">
                    <div class="space-y-space-2xs mx-auto max-w-2xl text-center">
                        <div class="font-badge-caption text-badge-caption text-primary font-bold tracking-[0.2em] uppercase">
                            Our Path
                        </div>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold">
                            The Milestones That Defined Our Journey
                        </h2>
                    </div>
                    <!-- Linear Timeline Grid -->
                    <div class="space-y-space-lg relative mx-auto max-w-4xl">
                        <!-- Timeline Item 1 -->
                        <div class="gap-space-md bg-surface-container-lowest p-space-lg flex flex-col items-start rounded-xl shadow-sm sm:flex-row">
                            <div class="px-space-md py-space-2xs bg-primary-container text-on-primary-fixed font-headline-sm text-body-lg flex-shrink-0 rounded-lg font-bold">
                                2011
                            </div>
                            <div class="space-y-space-2xs">
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Inception at Khumjung
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary">
                                    Dawa Tenzing and three cousin guides register Neepa Adventure in Kathmandu, pledging
                                    an all-Guide lead guide roster and strict 20kg porter load caps.
                                </p>
                            </div>
                        </div>
                        <!-- Timeline Item 2 -->
                        <div class="gap-space-md bg-surface-container-lowest p-space-lg flex flex-col items-start rounded-xl shadow-sm sm:flex-row">
                            <div class="px-space-md py-space-2xs bg-surface-container text-on-surface font-headline-sm text-body-lg flex-shrink-0 rounded-lg font-bold">
                                2015
                            </div>
                            <div class="space-y-space-2xs">
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Earthquake First Response &amp; Village Rebuild
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary">
                                    Following the Gorkha earthquake, Neepa Adventure converted its entire guide force
                                    into high-altitude helicopter extraction and emergency aid convoys across Langtang
                                    and Solukhumbu.
                                </p>
                            </div>
                        </div>
                        <!-- Timeline Item 3 -->
                        <div class="gap-space-md bg-surface-container-lowest p-space-lg flex flex-col items-start rounded-xl shadow-sm sm:flex-row">
                            <div class="px-space-md py-space-2xs bg-surface-container text-on-surface font-headline-sm text-body-lg flex-shrink-0 rounded-lg font-bold">
                                2018
                            </div>
                            <div class="space-y-space-2xs">
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Launch of Women's Alpine Leadership Initiative
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary">
                                    Pasang Lhamu Sherpa institutes our sponsored apprentice program for female guides,
                                    graduating 18 women into certified wilderness leaders.
                                </p>
                            </div>
                        </div>
                        <!-- Timeline Item 4 -->
                        <div class="gap-space-md bg-surface-container-lowest p-space-lg flex flex-col items-start rounded-xl shadow-sm sm:flex-row">
                            <div class="px-space-md py-space-2xs bg-primary-container text-on-primary-fixed font-headline-sm text-body-lg flex-shrink-0 rounded-lg font-bold">
                                2024–2025
                            </div>
                            <div class="space-y-space-2xs">
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Satellite Telemetry Across All Trek Passes
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary">
                                    Full deployment of Garmin inReach tracking relays, ensuring constant physician
                                    oversight and emergency helicopter positioning on 100% of departures.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- High Impact Bottom Conversion Banner -->
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-primary text-summit-white relative w-full overflow-hidden border-t border-primary/20">
                <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-white/10 via-transparent to-transparent"></div>
                <div class="absolute inset-0 z-0">
                    <div
                        class="h-full w-full bg-cover bg-center opacity-25"
                        data-alt="Hiker standing on high Himalayan ridge looking at sunset over clouds with Annapurna mountain range in the distance, cinematic lighting and majestic scale."
                        style="
                            background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD8h3Ti78C47vGC4B8hYmPifSTaMZgBOXAvkchoXGGS6ZYW92w2qAn4GP9gW6ZCiCuKDAUFv05k4HO-VjtX7nrE7GZ7ZvwiB6BCg6PrnJS0R-6mNMD6eHvs78kxKQsin6RwX7POD8vHGn_ttYa5kYcURkdx4_MtJFVGD_n45OMjPzUAgNiTiVrGq6RLclIHN6WC9BZB2cnXCh7f9UfaNsj9B7LiUVGFEeavRSHCntYVXoIF4rFqPL_f');
                        "
                    ></div>
                    <div class="from-primary via-primary/90 to-primary/75 absolute inset-0 bg-gradient-to-r"></div>
                </div>
                <div class="max-w-max-content-width space-y-space-xl relative z-10 mx-auto text-center">
                    <div class="space-y-space-sm mx-auto max-w-3xl">
                        <h2 class="font-display-xl text-headline-lg lg:text-display-xl text-summit-white leading-tight font-extrabold">
                            Experience Nepal with the People Who Call These Passes Home
                        </h2>
                        <p class="font-body-lg text-body-lg text-mist-slate/90 mx-auto max-w-2xl">
                            Whether you seek the tranquil waters of Gokyo Ri, the high crest of Thorong La, or technical
                            6,000m destinations, our indigenous Guide team guides you with absolute devotion.
                        </p>
                    </div>
                    <div class="gap-space-md flex flex-wrap items-center justify-center">
                        <a
                            class="gap-space-xs px-space-xl py-space-md bg-primary-container text-on-primary-fixed font-label-md text-label-md hover:bg-amber-flare inline-flex items-center justify-center rounded-xl font-bold tracking-wider uppercase shadow-xl transition-all cursor-pointer"
                            href="{{ route('plan-your-trek') }}"
                        >
                            Plan Your Custom Trek
                            <x-lucide-arrow-up-right class="size-[18px]" />
                        </a>
                        <a
                            class="gap-space-xs px-space-xl py-space-md bg-surface-container-lowest/15 hover:bg-surface-container-lowest/25 text-summit-white font-label-md text-label-md inline-flex items-center justify-center rounded-xl font-semibold tracking-wider backdrop-blur-sm transition-all cursor-pointer border border-white/20"
                            href="{{ route('contact') }}"
                        >
                            Contact Basecamp Headquarters
                            <x-lucide-message-circle class="size-[18px]" />
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
