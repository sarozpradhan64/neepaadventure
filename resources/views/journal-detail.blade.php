<x-layouts.app 
    :seo="$blog->seoMetadata"
    :title="$blog->title"
    :description="$blog->excerpt"
    :image="$blog->featured_image"
>
    <x-header />
    <main class="bg-surface w-full">
        <div class="flex w-full flex-col">
            <!-- ARTICLE HEADER HERO SECTION -->
            <header class="relative pt-36 md:pt-44 pb-space-2xl w-full min-h-[55vh] flex flex-col justify-end bg-ridge-deep text-summit-white">
                @if ($blog->featured_image)
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ Storage::url($blog->featured_image) }}')"></div>
                    <div class="absolute inset-0 bg-ridge-deep/75 bg-gradient-to-t from-ridge-deep via-ridge-deep/60 to-ridge-deep/30"></div>
                @else
                    <div class="absolute inset-0 bg-surface-container-high"></div>
                @endif
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto relative z-10 w-full">
                    <!-- Breadcrumbs -->
                    <div class="gap-space-sm pb-space-md font-label-sm text-xs text-summit-white/75 flex flex-wrap items-center justify-between">
                        <nav aria-label="Breadcrumbs" class="gap-space-2xs flex items-center">
                            <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
                            <span class="opacity-40">/</span>
                            <a class="hover:text-primary transition-colors" href="{{ route('blog') }}">Journal</a>
                            <span class="opacity-40">/</span>
                            @if($blog->category)
                                <a
                                    class="hover:text-primary transition-colors"
                                    href="{{ route('blog', ['category' => $blog->category->slug]) }}"
                                >
                                    {{ $blog->category->name }}
                                </a>
                                <span class="opacity-40">/</span>
                            @endif
                            <span class="text-summit-white max-w-[200px] sm:max-w-xs truncate font-semibold">{{ $blog->title }}</span>
                        </nav>
                    </div>

                    <!-- Category Pill -->
                    <div class="pt-space-xs pb-space-sm">
                        <span class="gap-space-2xs px-3 py-1 bg-primary/20 text-primary font-badge-caption text-xs inline-flex items-center rounded-lg tracking-widest uppercase border border-primary/30 font-bold backdrop-blur-sm">
                            <x-lucide-mountain class="size-3.5" />
                            {{ $blog->category?->name ?? 'Field Guide' }}
                        </span>
                    </div>

                    <!-- Headline & Subtitle -->
                    <div class="gap-space-sm flex max-w-4xl flex-col">
                        <h1 class="font-display-md text-headline-lg md:text-display-md font-black text-summit-white leading-tight tracking-tight">
                            {{ $blog->title }}
                        </h1>
                        @if($blog->excerpt)
                            <p class="font-body-lg text-body-lg text-summit-white/85 leading-relaxed">
                                {{ $blog->excerpt }}
                            </p>
                        @endif
                    </div>

                    <!-- Author Metadata -->
                    <div class="mt-space-md flex flex-wrap items-center gap-space-md">
                        <div class="gap-space-sm flex items-center">
                            <div class="bg-summit-white/10 text-summit-white flex h-9 w-9 shrink-0 items-center justify-center overflow-hidden rounded-full backdrop-blur-sm border border-summit-white/20">
                                <span class="text-xs font-bold">{{ strtoupper(substr($blog->author?->name ?? 'Admin', 0, 2)) }}</span>
                            </div>
                            <div class="gap-space-2xs flex items-center">
                                <span class="font-label-md text-xs sm:text-sm text-summit-white font-semibold">{{ $blog->author?->name ?? 'Neepa Adventure Lead' }}</span>
                                <x-lucide-check-circle class="text-primary size-4" title="Verified Author" />
                            </div>
                        </div>
                        <div class="bg-summit-white/20 h-4 w-px hidden sm:block"></div>
                        <div class="gap-space-2xs font-body-sm text-xs sm:text-sm text-summit-white/75 flex items-center">
                            <x-lucide-calendar class="text-summit-white/50 size-4" />
                            <span>{{ $blog->created_at->format('F d, Y') }}</span>
                        </div>
                    </div>

                    <!-- Share Bar with Copy Feedback -->
                    <div 
                        x-data="{ copied: false }" 
                        class="mt-space-md flex flex-wrap items-center justify-between gap-space-sm pt-space-xs text-summit-white/80 font-label-sm text-xs border-t border-summit-white/10"
                    >
                        <div class="gap-space-xs flex items-center mt-3">
                            <span class="text-summit-white/90 font-semibold mr-1">Share Article:</span>
                            
                            <!-- WhatsApp -->
                            <a 
                                aria-label="Share WhatsApp" 
                                target="_blank"
                                rel="noopener noreferrer"
                                class="bg-summit-white/10 hover:bg-[#25D366] hover:text-white flex h-8 w-8 items-center justify-center rounded-lg transition-all backdrop-blur-sm" 
                                href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' ' . url()->current()) }}"
                            >
                                <x-lucide-message-circle class="size-4" />
                            </a>
                            
                            <!-- LinkedIn -->
                            <a 
                                aria-label="Share LinkedIn" 
                                target="_blank"
                                rel="noopener noreferrer"
                                class="bg-summit-white/10 hover:bg-[#0A66C2] hover:text-white flex h-8 w-8 items-center justify-center rounded-lg transition-all backdrop-blur-sm" 
                                href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                            >
                                <x-lucide-linkedin class="size-4" />
                            </a>
                            
                            <!-- Interactive Copy Link -->
                            <button 
                                type="button"
                                aria-label="Copy Link" 
                                class="bg-summit-white/10 hover:bg-primary-container hover:text-on-primary-fixed flex h-8 items-center gap-1.5 px-2.5 rounded-lg transition-all backdrop-blur-sm cursor-pointer" 
                                @click="
                                    navigator.clipboard.writeText(window.location.href);
                                    copied = true;
                                    setTimeout(() => copied = false, 2500);
                                "
                            >
                                <template x-if="!copied">
                                    <span class="flex items-center gap-1"><x-lucide-link class="size-3.5" /> <span class="text-[11px] font-semibold hidden sm:inline">Copy Link</span></span>
                                </template>
                                <template x-if="copied">
                                    <span class="flex items-center gap-1 text-success font-bold"><x-lucide-check class="size-3.5" /> <span class="text-[11px]">Copied!</span></span>
                                </template>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- MAIN ARTICLE BODY -->
            <section class="bg-surface py-space-3xl w-full">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                    <article class="flex min-w-0 flex-col max-w-4xl mx-auto">
                        <div class="prose prose-slate lg:prose-lg max-w-none text-on-surface-variant prose-headings:font-bold prose-headings:text-on-surface prose-headings:tracking-tight prose-a:text-primary prose-a:font-semibold hover:prose-a:underline prose-strong:text-on-surface prose-blockquote:border-l-primary prose-blockquote:bg-surface-container-low/60 prose-blockquote:rounded-r-xl prose-img:rounded-2xl prose-img:shadow-md mb-space-2xl">
                            {!! $blog->content !!}
                        </div>

                        <!-- Post Tags -->
                        @if($blog->tags && $blog->tags->isNotEmpty())
                            <div class="pt-space-lg border-t border-outline/10 flex flex-wrap items-center gap-2">
                                <span class="text-xs font-bold uppercase tracking-wider text-tertiary mr-2 flex items-center gap-1">
                                    <x-lucide-tag class="size-3.5" /> Article Topics:
                                </span>
                                @foreach($blog->tags as $tag)
                                    <a 
                                        href="{{ route('blog', ['tag' => $tag->slug]) }}" 
                                        class="px-3 py-1 rounded-lg text-xs font-semibold bg-surface-container-low hover:bg-surface-container-high text-tertiary hover:text-primary transition-colors border border-outline/10"
                                    >
                                        #{{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        <!-- Expedition Advisory & CTA Card -->
                        <div class="mt-space-2xl p-space-xl bg-surface-container-low rounded-2xl border border-outline/10 flex flex-col sm:flex-row items-center justify-between gap-6 shadow-sm">
                            <div class="space-y-1 text-center sm:text-left">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider">Ready for the High Passes?</span>
                                <h3 class="text-lg font-bold text-on-surface">Plan Your Himalayan Trek with Neepa Adventure</h3>
                                <p class="text-xs text-tertiary max-w-lg">
                                    Our certified mountain guides and Sherpa logistics team design bespoke itineraries, manage permits, and guarantee satellite safety telemetry.
                                </p>
                            </div>
                            <a href="{{ route('plan-your-trek') }}" class="px-5 py-3 bg-primary-container hover:bg-amber-flare text-on-primary-fixed text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-sm shrink-0 whitespace-nowrap">
                                Request Custom Itinerary
                            </a>
                        </div>
                    </article>
                </div>
            </section>

            <!-- RELATED TREK GUIDES -->
            @if($relatedBlogs->isNotEmpty())
            <section class="bg-surface-container-low py-space-3xl w-full border-t border-outline/10">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                    <div class="gap-space-md mb-space-xl flex flex-col justify-between sm:flex-row sm:items-end">
                        <div>
                            <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-widest uppercase">Related Articles</span>
                            <h3 class="font-headline-lg text-headline-lg font-bold text-on-surface mt-1 tracking-tight">
                                Recommended Reading
                            </h3>
                        </div>
                        <a class="font-label-md text-xs font-bold text-primary flex items-center gap-1 hover:underline uppercase tracking-wider" href="{{ route('blog') }}">
                            Explore all articles
                            <x-lucide-arrow-right class="size-4" />
                        </a>
                    </div>
                    
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-3">
                        @foreach ($relatedBlogs as $related)
                            <article class="bg-surface-container-lowest flex flex-col overflow-hidden rounded-2xl border border-outline/10 hover:border-primary/30 shadow-sm hover:shadow-xl transition-all duration-300 group">
                                <div class="relative h-48 w-full overflow-hidden bg-surface-container">
                                    @if ($related->featured_image)
                                        <img class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $related->title }}" src="{{ Storage::url($related->featured_image) }}" />
                                    @else
                                        <div class="bg-surface-variant flex h-full w-full items-center justify-center">
                                            <x-lucide-image class="text-tertiary size-9" />
                                        </div>
                                    @endif
                                    @if ($related->category)
                                        <span class="bg-ridge-deep/80 backdrop-blur-sm text-summit-white border border-summit-white/10 font-badge-caption text-[11px] font-bold absolute top-3 left-3 rounded-lg px-2.5 py-1 uppercase tracking-wider">
                                            {{ $related->category->name }}
                                        </span>
                                    @endif
                                </div>
                                <div class="p-space-md gap-space-sm flex flex-1 flex-col justify-between">
                                    <div>
                                        <div class="gap-space-2xs text-tertiary font-body-sm text-xs mb-1.5 flex items-center">
                                            <x-lucide-calendar class="size-3.5 text-primary mr-1" />
                                            <span>{{ $related->created_at->format('M d, Y') }}</span>
                                        </div>
                                        <h4 class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors line-clamp-2">
                                            <a href="{{ route('blog-detail', $related->slug) }}">{{ $related->title }}</a>
                                        </h4>
                                        <p class="font-body-sm text-xs text-on-surface-variant mt-2 line-clamp-2">
                                            {{ $related->excerpt }}
                                        </p>
                                    </div>
                                    <div class="pt-space-sm border-t border-outline/10">
                                        <a class="font-label-sm text-xs text-primary font-bold flex items-center gap-1 hover:text-amber-flare transition-colors uppercase tracking-wider" href="{{ route('blog-detail', $related->slug) }}">
                                            Read More
                                            <x-lucide-arrow-right class="size-3.5" />
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif
        </div>
    </main>
    <x-footer />
</x-layouts.app>
