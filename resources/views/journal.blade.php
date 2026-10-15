<x-layouts.app>
    <x-slot:title>Nepal Travel Guides &amp; Field Journal</x-slot>

    <x-header />

    <main class="bg-surface w-full pt-28">
        <div class="flex w-full flex-col">

            <!-- Breadcrumbs / Status Ribbon -->
            <section class="bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop py-space-sm w-full border-b border-outline/10">
                <div class="max-w-max-content-width gap-space-xs text-body-sm mx-auto flex flex-col items-start justify-between md:flex-row md:items-center">
                    <nav aria-label="Breadcrumbs" class="gap-space-xs font-label-sm text-label-sm text-tertiary flex items-center">
                        <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
                        <x-lucide-chevron-right class="size-[14px]" />
                        <span class="text-on-surface font-semibold">Travel Guides &amp; Journal</span>
                    </nav>
                    <div class="gap-space-md flex items-center">
                        <span class="font-badge-caption text-badge-caption bg-surface-container-highest text-tertiary inline-flex items-center gap-1.5 rounded-full px-3 py-1 font-semibold uppercase tracking-wider">
                            <span class="bg-primary h-2 w-2 rounded-full animate-pulse"></span>
                            FIELD NOTES &amp; ALPINISM
                        </span>
                        <span class="text-tertiary hidden lg:inline">Route Guides &bull; Sherpa Insights &bull; Permits</span>
                    </div>
                </div>
            </section>

            <!-- Editorial Hero Section -->
            <section class="bg-surface relative px-gutter-mobile lg:px-gutter-desktop pt-space-2xl pb-space-2xl w-full border-b border-outline/10 overflow-hidden">
                <div class="max-w-max-content-width gap-space-lg mx-auto flex flex-col">
                    <div class="space-y-space-xs max-w-3xl">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary mb-1">
                            <x-lucide-book-open class="size-3.5" />
                            <span class="font-badge-caption text-badge-caption font-bold tracking-[0.2em] uppercase">Alpine Knowledge Base</span>
                        </div>
                        <h1 class="font-display-md text-display-md font-black text-on-surface tracking-tight">
                            Nepal Travel Guides &amp; <span class="text-primary font-bold">Field Journal</span>
                        </h1>
                        <p class="font-body-lg text-body-lg text-tertiary">
                            Expert trekking notes, route safety updates, permit protocols, and authentic cultural perspectives directly from our Kathmandu operations team and high-altitude Sherpa leads.
                        </p>
                    </div>

                    <!-- Search & Category Bar -->
                    <div class="gap-space-md pt-space-xs flex flex-col">
                        <form action="{{ route('blog') }}" method="GET" class="relative w-full max-w-2xl">
                            <x-lucide-search class="left-4 text-tertiary absolute top-1/2 -translate-y-1/2 size-5 pointer-events-none" />
                            <input
                                name="search"
                                value="{{ request('search') }}"
                                class="w-full rounded-xl border border-outline/15 bg-surface-container-lowest pl-12 pr-10 py-3.5 text-on-surface placeholder:text-tertiary text-sm font-body-md shadow-sm transition-all focus:border-primary focus:outline-none focus:ring-4 focus:ring-primary/10 hover:border-primary/40"
                                placeholder="Search articles, routes, gear, permits..."
                                type="text"
                            />
                            @if(request('search'))
                                <a href="{{ route('blog', request()->except('search')) }}" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-tertiary hover:text-on-surface p-1">
                                    <x-lucide-x class="size-4" />
                                </a>
                            @endif
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if(request('tag'))
                                <input type="hidden" name="tag" value="{{ request('tag') }}">
                            @endif
                        </form>

                        <!-- Filter Pills -->
                        <div class="gap-space-xs pb-space-2xs no-scrollbar flex items-center overflow-x-auto">
                            <a
                                href="{{ route('blog', request()->except(['category', 'page'])) }}"
                                class="px-4 py-2 rounded-xl font-label-sm text-xs whitespace-nowrap shadow-sm transition-all border {{ !request('category') ? 'bg-primary-container text-on-primary-fixed border-transparent font-bold' : 'bg-surface-container-lowest text-tertiary hover:text-on-surface hover:bg-surface-container-high border-outline/10 font-medium' }}"
                            >
                                All Posts ({{ $blogs->total() }})
                            </a>
                            @foreach ($categories as $cat)
                                <a
                                    href="{{ route('blog', array_merge(request()->except(['category', 'page']), ['category' => $cat->slug])) }}"
                                    class="px-4 py-2 rounded-xl font-label-sm text-xs whitespace-nowrap transition-all border {{ request('category') === $cat->slug ? 'bg-primary-container text-on-primary-fixed border-transparent font-bold' : 'bg-surface-container-lowest text-tertiary hover:text-on-surface hover:bg-surface-container-high border-outline/10 font-medium' }}"
                                >
                                    {{ $cat->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <!-- Featured Lead Blog -->
            @if ($featured && !request()->hasAny(['search', 'category', 'tag', 'page']))
                <section class="bg-surface px-gutter-mobile lg:px-gutter-desktop py-space-2xl w-full">
                    <div class="max-w-max-content-width mx-auto">
                        <div class="gap-space-xl bg-surface-container-lowest grid grid-cols-1 overflow-hidden rounded-2xl border border-outline/10 hover:border-primary/30 shadow-md transition-all duration-300 lg:grid-cols-12 group">
                            <!-- Lead Content (7 Cols) -->
                            <div class="p-space-xl lg:p-space-2xl gap-space-lg flex flex-col justify-between lg:col-span-7">
                                <div class="space-y-space-sm flex flex-col">
                                    <div class="gap-space-xs flex flex-wrap items-center">
                                        <span class="px-3 py-1 bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption rounded-lg uppercase font-bold tracking-wider">
                                            Featured Field Essay
                                        </span>
                                        @if ($featured->category)
                                            <span class="px-3 py-1 bg-surface-container-high text-tertiary font-badge-caption text-badge-caption rounded-lg uppercase font-semibold">
                                                {{ $featured->category->name }}
                                            </span>
                                        @endif
                                    </div>
                                    <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors">
                                        <a href="{{ route('blog-detail', $featured->slug) }}">
                                            {{ $featured->title }}
                                        </a>
                                    </h2>
                                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-3">
                                        {{ $featured->excerpt }}
                                    </p>
                                </div>
                                <!-- Lead Meta & Button -->
                                <div class="gap-space-md pt-space-md mt-auto flex flex-col items-start justify-between sm:flex-row sm:items-center border-t border-outline/10">
                                    <div class="gap-space-sm flex items-center">
                                        <div class="bg-primary/10 text-primary flex h-10 w-10 items-center justify-center rounded-full text-xs font-bold border border-primary/20">
                                            {{ strtoupper(substr($featured->author?->name ?? 'Admin', 0, 2)) }}
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="font-label-md text-label-md font-semibold text-on-surface">{{ $featured->author?->name ?? 'Neepa Editorial' }}</span>
                                            <span class="font-body-sm text-body-sm text-tertiary">{{ $featured->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                    <a
                                        class="gap-space-xs px-space-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-xs font-bold inline-flex items-center rounded-xl py-3 tracking-wider uppercase transition-all shadow-sm hover:shadow-md group/btn"
                                        href="{{ route('blog-detail', $featured->slug) }}"
                                    >
                                        <span>Read Full Guide</span>
                                        <x-lucide-arrow-right class="size-4 group-hover/btn:translate-x-1 transition-transform" />
                                    </a>
                                </div>
                            </div>
                            <!-- Graphic / Visual Card (5 Cols) -->
                            <div class="bg-surface-container-high relative min-h-[320px] lg:min-h-[420px] overflow-hidden lg:col-span-5">
                                @if ($featured->featured_image)
                                    <img
                                        class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-700"
                                        alt="{{ $featured->title }}"
                                        src="{{ Storage::url($featured->featured_image) }}"
                                    />
                                @else
                                    <div class="bg-surface-variant flex h-full w-full items-center justify-center">
                                        <x-lucide-image class="text-tertiary size-12" />
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent lg:hidden"></div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            <!-- Travel Guides & Articles Grid Section -->
            <section class="bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop py-space-3xl w-full border-t border-outline/10">
                <div class="max-w-max-content-width gap-space-2xl mx-auto flex flex-col">
                    <!-- Section Header -->
                    <div class="gap-space-md flex flex-col justify-between sm:flex-row sm:items-end">
                        <div>
                            <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface tracking-tight">
                                @if(request('category'))
                                    {{ $categories->firstWhere('slug', request('category'))?->name ?? 'Category' }} Articles
                                @elseif(request('tag'))
                                    Articles tagged #{{ request('tag') }}
                                @elseif(request('search'))
                                    Search results for &ldquo;{{ request('search') }}&rdquo;
                                @else
                                    All Himalayan Articles
                                @endif
                            </h2>
                            <p class="font-body-sm text-tertiary mt-1">
                                Showing {{ $blogs->total() }} published {{ Str::plural('article', $blogs->total()) }}
                            </p>
                        </div>
                        @if(request()->hasAny(['search', 'category', 'tag']))
                            <a href="{{ route('blog') }}" class="font-label-sm text-xs text-primary hover:underline flex items-center gap-1 font-bold">
                                <x-lucide-rotate-ccw class="size-3.5" /> Reset all filters
                            </a>
                        @endif
                    </div>

                    <!-- Articles Grid -->
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        @forelse ($blogs as $post)
                            <article class="bg-surface-container-lowest flex flex-col overflow-hidden rounded-2xl border border-outline/10 hover:border-primary/30 shadow-sm hover:shadow-xl transition-all duration-300 group">
                                <div class="relative h-52 w-full overflow-hidden bg-surface-container">
                                    @if ($post->featured_image)
                                        <img
                                            class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            alt="{{ $post->title }}"
                                            src="{{ Storage::url($post->featured_image) }}"
                                        />
                                    @else
                                        <div class="bg-surface-variant flex h-full w-full items-center justify-center">
                                            <x-lucide-image class="text-tertiary size-9" />
                                        </div>
                                    @endif
                                    @if ($post->category)
                                        <span class="top-3 left-3 px-2.5 py-1 bg-ridge-deep/80 backdrop-blur-sm text-summit-white border border-summit-white/10 font-badge-caption text-[11px] font-bold absolute rounded-lg uppercase tracking-wider">
                                            {{ $post->category->name }}
                                        </span>
                                    @endif
                                </div>
                                <div class="p-space-lg gap-space-md flex flex-grow flex-col justify-between">
                                    <div class="space-y-space-2xs flex flex-col">
                                        <div class="flex items-center gap-2 text-xs text-tertiary font-medium">
                                            <span class="flex items-center gap-1">
                                                <x-lucide-calendar class="size-3.5 text-primary" /> {{ $post->created_at->format('M d, Y') }}
                                            </span>
                                            <span>&bull;</span>
                                            <span class="flex items-center gap-1">
                                                <x-lucide-user class="size-3.5 text-primary" /> {{ $post->author?->name ?? 'Admin' }}
                                            </span>
                                        </div>
                                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary line-clamp-2 transition-colors pt-1">
                                            <a href="{{ route('blog-detail', $post->slug) }}">{{ $post->title }}</a>
                                        </h3>
                                        <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
                                            {{ $post->excerpt }}
                                        </p>
                                    </div>
                                    <div class="pt-space-md border-t border-outline/10 flex items-center justify-between">
                                        <a href="{{ route('blog-detail', $post->slug) }}" class="font-label-sm text-xs font-bold text-primary hover:text-amber-flare flex items-center gap-1 transition-colors uppercase tracking-wider group-hover:translate-x-0.5 transition-transform">
                                            Read Article <x-lucide-arrow-right class="size-3.5" />
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <div class="col-span-full p-space-2xl text-center border border-dashed border-outline/20 rounded-2xl bg-surface-container-lowest space-y-4">
                                <div class="w-14 h-14 rounded-2xl bg-primary/10 text-primary flex items-center justify-center mx-auto">
                                    <x-lucide-book-x class="size-7" />
                                </div>
                                <div class="space-y-1">
                                    <h3 class="text-lg font-bold text-on-surface">No Articles Found</h3>
                                    <p class="text-tertiary font-body-sm max-w-md mx-auto">
                                        We couldn't find any travel articles matching your current filter criteria.
                                    </p>
                                </div>
                                <div class="pt-2">
                                    <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary-container hover:bg-amber-flare text-on-primary-fixed text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-sm">
                                        <x-lucide-rotate-ccw class="size-4" /> View All Articles
                                    </a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination & Popular Topic Tags -->
                    <div class="gap-space-lg pt-space-md flex flex-col">
                        <!-- Tag Cloud -->
                        @if($popularTags->isNotEmpty())
                            <div class="gap-space-xs flex flex-wrap items-center justify-center sm:justify-start">
                                <span class="font-label-sm text-label-sm text-tertiary mr-space-xs font-bold uppercase tracking-wider text-xs flex items-center gap-1">
                                    <x-lucide-tag class="size-3.5" /> Popular Topics:
                                </span>
                                @foreach($popularTags as $tag)
                                    <a
                                        class="px-3 py-1 rounded-lg transition-all font-body-sm text-xs font-medium border {{ request('tag') === $tag->slug ? 'bg-primary-container text-on-primary-fixed border-transparent font-bold shadow-sm' : 'bg-surface-container-lowest text-tertiary hover:text-on-surface hover:bg-surface-container border-outline/10' }}"
                                        href="{{ route('blog', array_merge(request()->except(['tag', 'page']), ['tag' => $tag->slug])) }}"
                                    >#{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        @endif

                        <!-- Pagination -->
                        @if($blogs->hasPages())
                            <div class="mt-space-md">{{ $blogs->links() }}</div>
                        @endif
                    </div>
                </div>
            </section>

            <!-- Editorial Newsletter / Kathmandu Operations Briefing -->
            <section class="bg-surface px-gutter-mobile lg:px-gutter-desktop py-space-3xl w-full border-t border-outline/10">
                <div class="max-w-max-content-width mx-auto">
                    <div class="bg-ridge-deep text-summit-white p-space-xl lg:p-space-3xl gap-space-2xl relative flex flex-col items-center justify-between overflow-hidden rounded-2xl border border-outline/10 shadow-xl lg:flex-row">
                        <!-- Abstract Topo Graphic -->
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
                            <h2 class="font-headline-lg text-headline-lg font-black text-summit-white tracking-tight">
                                Himalayan Updates &amp; Weather Alerts
                            </h2>
                            <p class="font-body-md text-body-md text-surface-dim">
                                Receive seasonal pass conditions, safety advisories, permit regulations, and new high-altitude route guides straight to your inbox.
                            </p>
                            <div class="gap-space-md text-surface-dim pt-space-xs flex items-center text-[12px]">
                                <span class="gap-space-2xs flex items-center">
                                    <x-lucide-check-circle class="text-primary-container size-4" /> No spam
                                </span>
                                <span class="gap-space-2xs flex items-center">
                                    <x-lucide-check-circle class="text-primary-container size-4" /> Unsubscribe anytime
                                </span>
                            </div>
                        </div>

                        <!-- Subscription Form -->
                        <div class="gap-space-xs relative z-10 flex w-full max-w-md min-w-[300px] flex-col lg:w-auto">
                            <form id="journal-newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST" class="gap-space-xs flex flex-col sm:flex-row">
                                @csrf
                                <input
                                    id="journal-newsletter-email"
                                    name="email"
                                    class="px-4 bg-surface-container-lowest/15 text-summit-white placeholder:text-surface-dim/70 font-body-md text-sm border border-summit-white/10 focus:border-primary-container focus:bg-surface-container-lowest/25 flex-grow rounded-xl py-3.5 focus:outline-none transition-all"
                                    placeholder="Enter your email address"
                                    required
                                    type="email"
                                />
                                <button
                                    id="journal-newsletter-submit"
                                    class="px-6 bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-xs font-bold rounded-xl py-3.5 tracking-wider whitespace-nowrap uppercase transition-all shadow-md disabled:opacity-50 cursor-pointer"
                                    type="submit"
                                >
                                    Subscribe
                                </button>
                            </form>
                            <p id="journal-newsletter-error" class="text-error text-xs hidden"></p>
                            <p id="journal-newsletter-success" class="text-success text-xs hidden font-medium"></p>
                            <span class="text-surface-dim/70 text-center text-[11px] sm:text-left">
                                Your data is protected under Nepal DP &amp; international privacy standards.
                            </span>

                            <script>
                                document.getElementById('journal-newsletter-form')?.addEventListener('submit', async function(e) {
                                    e.preventDefault();

                                    const form = e.target;
                                    const submitBtn = document.getElementById('journal-newsletter-submit');
                                    const errorEl = document.getElementById('journal-newsletter-error');
                                    const successEl = document.getElementById('journal-newsletter-success');

                                    submitBtn.disabled = true;
                                    submitBtn.innerText = 'WAIT...';
                                    errorEl.classList.add('hidden');
                                    successEl.classList.add('hidden');

                                    try {
                                        const formData = new FormData(form);
                                        const response = await fetch(form.action, {
                                            method: 'POST',
                                            headers: {
                                                'X-Requested-With': 'XMLHttpRequest',
                                                'Accept': 'application/json',
                                            },
                                            body: formData
                                        });

                                        const data = await response.json();

                                        if (!response.ok) {
                                            if (response.status === 422 && data.errors && data.errors.email) {
                                                errorEl.innerText = data.errors.email[0];
                                            } else {
                                                errorEl.innerText = data.message || 'Something went wrong. Please try again.';
                                            }
                                            errorEl.classList.remove('hidden');
                                        } else {
                                            successEl.innerText = data.message;
                                            successEl.classList.remove('hidden');
                                            form.reset();
                                        }
                                    } catch (err) {
                                        errorEl.innerText = 'Network error. Please try again.';
                                        errorEl.classList.remove('hidden');
                                    } finally {
                                        submitBtn.disabled = false;
                                        submitBtn.innerText = 'SUBSCRIBE';
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
