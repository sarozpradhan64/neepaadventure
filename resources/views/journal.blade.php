<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-48">
        <div class="flex w-full flex-col">

            <!-- Editorial Hero Section -->
            <section class="bg-surface-container-lowest px-gutter-desktop pt-space-2xl pb-space-2xl w-full">
                <div class="max-w-max-content-width gap-space-xl mx-auto flex flex-col">
                    <div class="gap-space-xs flex flex-col">
                        <div class="gap-space-sm flex items-center">
                            <span class="font-badge-caption text-badge-caption text-primary tracking-widest uppercase">Field Dispatches &amp; Himalayan Intelligence</span>
                            <span class="text-secondary">•</span>
                            <span class="font-badge-caption text-badge-caption text-secondary tracking-widest uppercase">Neepa Alpine Archives</span>
                        </div>
                        <h1 class="font-display-xl text-display-xl text-on-surface max-w-4xl tracking-tight uppercase">
                            Stories from the Ridge, High Science &amp; Route Archives
                        </h1>
                        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-3xl">
                            Deep-dive route briefings, altitude physiology protocols, cultural heritage from Solukhumbu,
                            and unvarnished gear tests written by veteran IFMGA/NNMGA Sherpa guides, trek doctors, and
                            high-altitude navigators.
                        </p>
                    </div>
                    <!-- Search & Category Bar -->
                    <div class="gap-space-md pt-space-xs flex flex-col">
                        <form action="{{ route('blog') }}" method="GET" class="relative w-full max-w-2xl">
                            <x-lucide-search class="left-space-md text-secondary absolute top-1/2 -translate-y-1/2 size-[20px]" />
                            <input
                                name="search"
                                value="{{ request('search') }}"
                                class="pr-space-md bg-surface-container-low text-on-surface placeholder:text-secondary font-body-md text-body-md focus:bg-surface-container-lowest w-full rounded-lg py-3.5 pl-12 shadow-sm transition-all focus:outline-none"
                                placeholder="Search blog posts..."
                                type="text"
                            />
                        </form>
                        <!-- Filter Pills -->
                        <div class="gap-space-xs pb-space-2xs no-scrollbar flex items-center overflow-x-auto">
                            <a
                                href="{{ route('blog', request()->except('category')) }}"
                                class="px-space-md py-space-xs rounded font-label-sm text-label-sm whitespace-nowrap shadow-sm transition-colors {{ !request('category') ? 'bg-ridge-deep text-summit-white' : 'bg-surface-container hover:bg-surface-container-high text-on-surface-variant' }}"
                            >
                                All Posts ({{ $blogs->total() }})
                            </a>
                            @foreach ($categories as $cat)
                                <a
                                    href="{{ route('blog', array_merge(request()->except('category'), ['category' => $cat->slug])) }}"
                                    class="px-space-md py-space-xs rounded font-label-sm text-label-sm whitespace-nowrap transition-colors {{ request('category') === $cat->slug ? 'bg-ridge-deep text-summit-white' : 'bg-surface-container hover:bg-surface-container-high text-on-surface-variant' }}"
                                >
                                    {{ $cat->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- Featured Lead Dossier -->
            @if ($featured)
                <section class="bg-surface px-gutter-desktop py-space-2xl w-full">
                    <div class="max-w-max-content-width mx-auto">
                        <div class="gap-space-xl bg-surface-container-lowest grid grid-cols-1 overflow-hidden rounded-xl shadow-md lg:grid-cols-12">
                            <!-- Lead Content (7 Cols) -->
                            <div class="p-space-xl lg:p-space-2xl gap-space-lg flex flex-col justify-between lg:col-span-7">
                                <div class="gap-space-md flex flex-col">
                                    <div class="gap-space-xs flex flex-wrap items-center">
                                        <span class="px-space-xs py-space-2xs bg-primary-container text-on-primary-container font-badge-caption text-badge-caption rounded uppercase">
                                            Featured Field Essay
                                        </span>
                                        @if ($featured->category)
                                            <span class="px-space-xs py-space-2xs bg-surface-container-high text-secondary font-badge-caption text-badge-caption rounded uppercase">
                                                {{ $featured->category->name }}
                                            </span>
                                        @endif
                                    </div>
                                    <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                                        {{ $featured->title }}
                                    </h2>
                                    <p class="font-body-lg text-body-lg text-on-surface-variant">
                                        {{ $featured->excerpt }}
                                    </p>
                                </div>
                                <!-- Lead Meta & Button -->
                                <div class="gap-space-md pt-space-md mt-auto flex flex-col items-start justify-between sm:flex-row sm:items-center">
                                    <div class="gap-space-sm flex items-center">
                                        @if ($featured->author)
                                            <div class="bg-ridge-deep text-summit-white flex h-10 w-10 items-center justify-center rounded-full text-sm font-bold">
                                                {{ strtoupper(substr($featured->author->name, 0, 2)) }}
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="font-label-md text-label-md text-on-surface">{{ $featured->author->name }}</span>
                                                <span class="font-body-sm text-body-sm text-secondary">{{ $featured->created_at->format('M d, Y') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <a
                                        class="gap-space-xs px-space-lg bg-primary-container hover:bg-amber-flare text-on-primary-container font-label-md text-label-md inline-flex items-center rounded py-3 tracking-wider uppercase transition-colors"
                                        href="{{ route('blog-detail', $featured->slug) }}"
                                    >
                                        <span>Read Full Dossier</span>
                                        <x-lucide-arrow-right class="size-[18px]" />
                                    </a>
                                </div>
                            </div>
                            <!-- Graphic / Visual Card (5 Cols) -->
                            <div class="bg-surface-container-high relative flex min-h-[380px] flex-col justify-between overflow-hidden lg:col-span-5">
                                @if ($featured->featured_image)
                                    <img
                                        class="absolute inset-0 h-full w-full object-cover"
                                        alt="{{ $featured->title }}"
                                        src="{{ Storage::url($featured->featured_image) }}"
                                    />
                                @else
                                    <div class="bg-surface-variant absolute inset-0 h-full w-full"></div>
                                @endif
                                <div class="from-ridge-deep via-ridge-deep/40 absolute inset-0 bg-gradient-to-t to-transparent"></div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            <!-- Curated Dispatches & Field Notes Strip Section -->
            <section class="bg-surface-container-low px-gutter-desktop py-space-3xl w-full">
                <div class="max-w-max-content-width gap-space-2xl mx-auto flex flex-col">
                    <!-- Section Header -->
                    <div class="gap-space-md flex flex-col justify-between sm:flex-row sm:items-end">
                        <div>
                            <span class="font-badge-caption text-badge-caption text-primary tracking-widest uppercase">Intelligence Repository</span>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                                Curated Alpine Dispatches
                            </h2>
                        </div>
                        <span class="font-body-sm text-body-sm text-secondary">Displaying 6 of 48 peer-reviewed articles</span>
                    </div>
                    <!-- Main Layout: 8 cols Articles + 4 cols Sticky Field Notes -->
                    <div class="gap-space-xl grid grid-cols-1 lg:grid-cols-12">
                        <!-- Articles Grid (12 cols) -->
                        <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:col-span-12">
                            @foreach ($blogs as $post)
                                <article class="bg-surface-container-lowest flex flex-col overflow-hidden rounded-lg shadow-sm transition-all hover:shadow-md">
                                    <div class="relative h-48 w-full">
                                        @if ($post->featured_image)
                                            <img
                                                class="h-full w-full object-cover"
                                                alt="{{ $post->title }}"
                                                src="{{ Storage::url($post->featured_image) }}"
                                            />
                                        @else
                                            <div class="bg-surface-variant flex h-full w-full items-center justify-center">
                                                <x-lucide-image class="text-surface-dim size-[36px]" />
                                            </div>
                                        @endif
                                        @if ($post->category)
                                            <span class="top-space-sm left-space-sm px-space-xs py-space-2xs bg-ridge-deep text-summit-white font-badge-caption text-badge-caption absolute rounded uppercase">
                                                {{ $post->category->name }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="p-space-lg gap-space-md flex flex-grow flex-col justify-between">
                                        <div class="gap-space-xs flex flex-col">
                                            @if ($post->category)
                                                <span class="font-badge-caption text-badge-caption text-secondary uppercase">{{ $post->category->name }}</span>
                                            @endif
                                            <h3 class="font-headline-sm text-headline-sm text-on-surface hover:text-primary line-clamp-2 transition-colors">
                                                <a href="{{ route('blog-detail', $post->slug) }}">{{ $post->title }}</a>
                                            </h3>
                                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-3">
                                                {{ $post->excerpt }}
                                            </p>
                                        </div>
                                        <div class="pt-space-sm font-body-sm text-body-sm text-secondary flex items-center justify-between">
                                            <span>{{ $post->author?->name ?? 'Admin' }}</span>
                                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                    </div>
                    <!-- Pagination & Popular Topic Tags -->
                    <div class="gap-space-lg pt-space-md flex flex-col">
                        <!-- Tag Cloud -->
                        <div class="gap-space-xs flex flex-wrap items-center justify-center sm:justify-start">
                            <span class="font-label-sm text-label-sm text-secondary mr-space-xs">Index Tags:</span>
                            <a
                                class="px-space-xs py-space-2xs bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm rounded transition-colors"
                                href="#"
                            >#EverestBaseCamp</a>
                            <a
                                class="px-space-xs py-space-2xs bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm rounded transition-colors"
                                href="#"
                            >#Acclimatization</a>
                            <a
                                class="px-space-xs py-space-2xs bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm rounded transition-colors"
                                href="#"
                            >#AnnapurnaCircuit</a>
                            <a
                                class="px-space-xs py-space-2xs bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm rounded transition-colors"
                                href="#"
                            >#DiamoxProtocol</a>
                            <a
                                class="px-space-xs py-space-2xs bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm rounded transition-colors"
                                href="#"
                            >#SherpaLineage</a>
                            <a
                                class="px-space-xs py-space-2xs bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm rounded transition-colors"
                                href="#"
                            >#GokyoLakes</a>
                            <a
                                class="px-space-xs py-space-2xs bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm rounded transition-colors"
                                href="#"
                            >#WinterTrekking</a>
                            <a
                                class="px-space-xs py-space-2xs bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm rounded transition-colors"
                                href="#"
                            >#LuklaFlights</a>
                            <a
                                class="px-space-xs py-space-2xs bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm rounded transition-colors"
                                href="#"
                            >#PermitRules2025</a>
                        </div>
                        <!-- Pagination -->
                        <div class="mt-space-md">{{ $blogs->links() }}</div>
                    </div>
                </div>
            </section>
            <!-- Editorial Newsletter / Trek Briefing Box -->
            <section class="bg-surface-container-highest px-gutter-desktop py-space-3xl w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="bg-ridge-deep text-summit-white p-space-xl lg:p-space-3xl gap-space-2xl relative flex flex-col items-center justify-between overflow-hidden rounded-2xl shadow-xl lg:flex-row">
                        <!-- Abstract Topo Background Graphic -->
                        <svg
                            class="pointer-events-none absolute top-0 right-0 h-full w-1/2 opacity-5"
                            fill="none"
                            viewbox="0 0 500 500"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <ellipse cx="250" cy="250" rx="200" ry="120" stroke="white" stroke-width="2"></ellipse>
                            <ellipse cx="250" cy="250" rx="160" ry="90" stroke="white" stroke-width="2"></ellipse>
                            <ellipse cx="250" cy="250" rx="110" ry="60" stroke="white" stroke-width="2"></ellipse>
                            <ellipse cx="250" cy="250" rx="60" ry="30" stroke="white" stroke-width="2"></ellipse>
                        </svg>
                        <!-- Briefing Content -->
                        <div class="gap-space-sm relative z-10 flex max-w-xl flex-col">
                            <div class="gap-space-xs flex items-center">
                                <span class="bg-primary-container h-2.5 w-2.5 rounded-full"></span>
                                <span class="font-badge-caption text-badge-caption text-primary-container tracking-widest uppercase">
                                    Kathmandu Operations Briefing
                                </span>
                            </div>
                            <h2 class="font-headline-lg text-headline-lg text-summit-white tracking-tight">
                                Join 14,000+ Himalayan Trekkers &amp; Climbers
                            </h2>
                            <p class="font-body-md text-body-md text-surface-dim">
                                Receive seasonal permit bulletins, route conditions reports, and exclusive trek case
                                dossiers straight from our Kathmandu operations room.
                            </p>
                            <div class="gap-space-md text-surface-dim pt-space-xs flex items-center text-[12px]">
                                <span class="gap-space-2xs flex items-center"
                                    ><x-lucide-check-circle class="text-primary-container size-[16px]"
                                        />No spam</span>
                                <span class="gap-space-2xs flex items-center"
                                    ><x-lucide-check-circle class="text-primary-container size-[16px]"
                                        />Unsubscribe anytime</span>
                                <span class="gap-space-2xs flex items-center"
                                    ><x-lucide-check-circle class="text-primary-container size-[16px]"
                                        />Dispatched bi-weekly</span>
                            </div>
                        </div>
                        <!-- Subscription Form -->
                        <div class="gap-space-xs relative z-10 flex w-full max-w-md min-w-[320px] flex-col lg:w-auto">
                            <form class="gap-space-xs flex flex-col sm:flex-row" onsubmit="event.preventDefault()">
                                <input
                                    class="px-space-md bg-surface-container-lowest/10 text-summit-white placeholder:text-surface-dim/70 font-body-md text-body-md focus:bg-surface-container-lowest/20 flex-grow rounded py-3.5 focus:outline-none"
                                    placeholder="Enter your email address"
                                    required=""
                                    type="email"
                                />
                                <button
                                    class="px-space-lg bg-primary-container hover:bg-amber-flare text-on-primary-container font-label-md text-label-md rounded py-3.5 tracking-wider whitespace-nowrap uppercase transition-colors"
                                    type="submit"
                                >
                                    Receive Dispatches
                                </button>
                            </form>
                            <span class="text-surface-dim/80 text-center text-[11px] sm:text-left">
                                Your data remains private under Nepal DP &amp; GDPR regulations.
                            </span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
