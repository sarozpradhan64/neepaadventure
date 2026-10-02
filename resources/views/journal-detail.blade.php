<x-layouts.app 
    :seo="$blog->seoMetadata"
    :title="$blog->title"
    :description="$blog->excerpt"
    :image="$blog->featured_image"
>
    <x-header />
    <main class="bg-surface w-full">
        <div class="flex w-full flex-col">
            <!-- ARTICLE HEADER SECTION -->
            <header class="relative pt-40 pb-space-2xl w-full min-h-[60vh] flex flex-col justify-end">
                @if ($blog->featured_image)
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ Storage::url($blog->featured_image) }}')"></div>
                    <div class="absolute inset-0 bg-ridge-deep/60 bg-gradient-to-t from-ridge-deep/90 to-ridge-deep/20"></div>
                @else
                    <div class="absolute inset-0 bg-surface-container-high"></div>
                @endif
                <div class="max-w-max-content-width px-gutter-desktop mx-auto relative z-10 w-full">
                    <!-- Breadcrumbs -->
                    <div class="gap-space-sm pb-space-md font-label-sm text-label-sm text-summit-white/70 flex flex-wrap items-center justify-between">
                        <nav aria-label="Breadcrumbs" class="gap-space-2xs flex items-center">
                            <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
                            <span>/</span>
                            <a class="hover:text-primary transition-colors" href="{{ route('blog') }}">Journal</a>
                            <span>/</span>
                            <a
                                class="hover:text-primary transition-colors"
                                href="{{ route('blog', ['category' => $blog->category?->slug]) }}"
                            >
                                {{ $blog->category?->name ?? 'Uncategorized' }}
                            </a>
                            <span>/</span>
                            <span class="text-summit-white max-w-xs truncate font-semibold md:max-w-md">{{ $blog->title }}</span>
                        </nav>
                    </div>

                    <!-- Category -->
                    <div class="pt-space-xs pb-space-sm">
                        <span class="gap-space-2xs px-space-sm bg-primary/20 text-primary font-badge-caption text-badge-caption inline-flex items-center rounded py-1 tracking-widest uppercase border border-primary/30">
                            <x-lucide-activity class="size-[14px]" />
                            {{ $blog->category?->name ?? 'Blog' }}
                        </span>
                    </div>

                    <!-- Headline & Subtitle -->
                    <div class="gap-space-sm flex max-w-4xl flex-col">
                        <h1 class="font-display-xl text-headline-lg md:text-display-xl text-summit-white leading-tight tracking-tight">
                            {{ $blog->title }}
                        </h1>
                        <p class="font-body-lg text-body-lg text-summit-white/80 leading-relaxed">
                            {{ $blog->excerpt }}
                        </p>
                    </div>

                    <!-- Author Metadata -->
                    <div class="mt-space-md flex flex-wrap items-center gap-space-md">
                        <div class="gap-space-sm flex items-center">
                            <div class="bg-summit-white/10 text-summit-white flex h-8 w-8 shrink-0 items-center justify-center overflow-hidden rounded-full backdrop-blur-sm">
                                <span class="text-xs font-bold">{{ strtoupper(substr($blog->author?->name ?? 'NA', 0, 2)) }}</span>
                            </div>
                            <div class="gap-space-2xs flex items-center">
                                <span class="font-label-sm text-label-sm text-summit-white font-medium">{{ $blog->author?->name ?? 'Neepa Team' }}</span>
                                <x-lucide-check-circle class="text-primary size-[14px]" title="Verified Author" />
                            </div>
                        </div>
                        <div class="bg-summit-white/20 h-4 w-px hidden sm:block"></div>
                        <div class="gap-space-2xs font-body-sm text-body-sm text-summit-white/70 flex items-center">
                            <x-lucide-calendar class="text-summit-white/50 size-[14px]" />
                            <span>{{ $blog->created_at->format('F d, Y') }}</span>
                        </div>
                    </div>

                    <div class="mt-space-md flex flex-wrap items-center justify-between gap-space-sm pt-space-xs text-summit-white/70 font-label-sm text-label-sm border-t border-summit-white/10">
                        <div class="gap-space-xs flex items-center mt-4">
                            <span class="text-summit-white/90 font-medium">Share Blog:</span>
                            <a aria-label="Share WhatsApp" class="bg-summit-white/10 hover:bg-primary hover:text-on-primary flex h-7 w-7 items-center justify-center rounded transition-colors backdrop-blur-sm" href="#">
                                <x-lucide-message-circle class="size-[16px]" />
                            </a>
                            <a aria-label="Share LinkedIn" class="bg-summit-white/10 hover:bg-primary hover:text-on-primary flex h-7 w-7 items-center justify-center rounded transition-colors backdrop-blur-sm" href="#">
                                <x-lucide-linkedin class="size-[16px]" />
                            </a>
                            <a aria-label="Copy Link" class="bg-summit-white/10 hover:bg-primary hover:text-on-primary flex h-7 w-7 items-center justify-center rounded transition-colors backdrop-blur-sm" href="#" onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied!');">
                                <x-lucide-link class="size-[16px]" />
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- MAIN ARTICLE -->
            <section class="bg-surface pb-space-4xl w-full">
                <div class="max-w-max-content-width px-gutter-desktop mx-auto">
                    <article class="flex min-w-0 flex-col max-w-4xl mx-auto">
                        <div class="prose prose-slate lg:prose-lg text-on-surface-variant mb-space-2xl max-w-none">
                            {!! $blog->content !!}
                        </div>
                    </article>
                </div>
            </section>

            <!-- RELATED TREK GUIDES -->
            @if($relatedBlogs->isNotEmpty())
            <section class="bg-surface-container-low py-space-3xl w-full">
                <div class="max-w-max-content-width px-gutter-desktop mx-auto">
                    <div class="gap-space-md mb-space-xl flex flex-col justify-between md:flex-row md:items-end">
                        <div>
                            <h3 class="font-headline-lg text-headline-lg text-on-surface mt-1 tracking-tight">
                                Recommended Reading
                            </h3>
                        </div>
                        <a class="font-label-md text-label-md text-primary flex items-center gap-1 font-bold hover:underline" href="{{ route('blog') }}">
                            Explore all blogs
                            <x-lucide-arrow-right class="size-[18px]" />
                        </a>
                    </div>
                    
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-3">
                        @foreach ($relatedBlogs as $related)
                            <article class="bg-surface-container-lowest flex flex-col overflow-hidden rounded-xl shadow-sm transition-shadow hover:shadow-md">
                                <div class="relative h-48 w-full overflow-hidden">
                                    @if ($related->featured_image)
                                        <img class="h-full w-full object-cover" alt="{{ $related->title }}" src="{{ Storage::url($related->featured_image) }}" />
                                    @else
                                        <div class="bg-surface-variant flex h-full w-full items-center justify-center">
                                            <x-lucide-image class="text-surface-dim size-[36px]" />
                                        </div>
                                    @endif
                                    @if ($related->category)
                                        <span class="bg-ridge-deep/80 text-primary-container font-badge-caption text-badge-caption absolute top-3 left-3 rounded px-2 py-0.5 uppercase">{{ $related->category->name }}</span>
                                    @endif
                                </div>
                                <div class="p-space-md gap-space-sm flex flex-1 flex-col justify-between">
                                    <div>
                                        <div class="gap-space-2xs text-secondary font-body-sm text-body-sm mb-1 flex items-center">
                                            <span>{{ $related->created_at->format('M d, Y') }}</span>
                                        </div>
                                        <h4 class="font-headline-sm text-headline-sm text-on-surface hover:text-primary font-semibold transition-colors">
                                            <a href="{{ route('blog-detail', $related->slug) }}">{{ $related->title }}</a>
                                        </h4>
                                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
                                            {{ $related->excerpt }}
                                        </p>
                                    </div>
                                    <a class="font-label-sm text-label-sm text-primary flex items-center gap-1 font-bold hover:underline" href="{{ route('blog-detail', $related->slug) }}">
                                        Read More
                                        <x-lucide-arrow-right class="size-[14px]" />
                                    </a>
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
