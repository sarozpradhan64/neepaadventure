<x-layouts.app 
    :title="$websiteSettings['reviews_seo_title'] ?? ($websiteSettings['reviews_banner_title'] ?? 'Customer Reviews')"
    :description="$websiteSettings['reviews_seo_description'] ?? ($websiteSettings['reviews_banner_text'] ?? 'Real stories and experiences from travelers who explored Nepal with us.')"
>
    <x-header />
    <main class="bg-surface w-full">
        {{-- Banner: Adventure Photo — hangs flush under fixed navbar --}}
        <section class="w-full pt-28 pb-space-3xl px-gutter-mobile lg:px-gutter-desktop relative bg-ridge-deep overflow-hidden"
                 @if(!empty($websiteSettings['reviews_banner_image']))
                 style="background: linear-gradient(rgba(15,24,33,0.78), rgba(15,24,33,0.78)), url('{{ Storage::url($websiteSettings['reviews_banner_image']) }}') center/cover no-repeat;"
                 @endif>

            {{-- Content --}}
            <div class="relative z-10 max-w-max-content-width mx-auto py-space-xl">
                <div class="font-badge-caption text-badge-caption font-bold tracking-widest uppercase flex items-center gap-space-xs mb-space-sm text-summit-white/60">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                    <span class="text-primary font-bold">/</span>
                    <a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a>
                    <span class="text-primary font-bold">/</span>
                    <span class="text-summit-white font-bold">Reviews</span>
                </div>
                <div class="w-12 h-1 bg-primary rounded-full mb-space-md"></div>
                <h1 class="font-headline-lg text-headline-lg lg:text-display-xl text-summit-white font-extrabold tracking-tight mb-space-sm leading-tight">
                    {{ $websiteSettings['reviews_banner_title'] ?? 'Customer Reviews' }}
                </h1>
                <p class="font-body-lg text-body-lg m-0 max-w-[560px] text-summit-white/80">
                    {{ $websiteSettings['reviews_banner_text'] ?? 'Real stories and experiences from travelers who explored Nepal with us.' }}
                </p>
            </div>
        </section>

        {{-- Reviews Section --}}
        <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full">
            <div class="max-w-max-content-width mx-auto">

                {{-- Rating Summary & Write Review Action Bar --}}
                <div class="mb-space-2xl bg-surface-container-lowest p-space-lg lg:p-space-xl rounded-2xl shadow-sm border border-outline/10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex flex-wrap items-center gap-6">
                        <div class="flex items-center gap-3">
                            <span class="text-4xl lg:text-5xl font-black text-on-surface tracking-tight">
                                {{ number_format($averageRating ?? 5.0, 1) }}
                            </span>
                            <div>
                                <div class="flex items-center gap-1 text-amber-500">
                                    @for($i = 1; $i <= 5; $i++)
                                        <x-lucide-star class="size-5 fill-current" />
                                    @endfor
                                </div>
                                <span class="text-xs text-on-surface-variant font-medium mt-0.5 block">
                                    Overall Rating
                                </span>
                            </div>
                        </div>

                        <div class="hidden sm:block h-10 w-px bg-outline/20"></div>

                        <div class="flex items-center gap-2">
                            <div class="p-2 rounded-xl bg-primary/10 text-primary">
                                <x-lucide-shield-check class="size-5" />
                            </div>
                            <div>
                                <div class="font-label-md text-on-surface font-bold">
                                    {{ $totalReviews ?? count($reviews) }} Verified Stories
                                </div>
                                <div class="text-xs text-on-surface-variant">
                                    Direct feedback from Himalayan adventurers
                                </div>
                            </div>
                        </div>
                    </div>

                    <a 
                        href="{{ route('write-review') }}"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-primary text-on-primary font-bold shadow-sm hover:opacity-90 transition-all self-start md:self-auto"
                    >
                        <x-lucide-pencil class="size-4" />
                        <span>Write a Review</span>
                    </a>
                </div>

                {{-- Reviews Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-xl">
                    @forelse ($reviews as $review)
                        <div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm border border-outline/10 hover:shadow-md transition-shadow flex flex-col justify-between">
                            <div>
                                {{-- Stars & Date --}}
                                <div class="mb-space-md flex items-center justify-between">
                                    <div class="gap-1 text-amber-500 flex items-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= ($review->rating ?? 5))
                                                <x-lucide-star class="size-4 fill-current text-amber-500" />
                                            @else
                                                <x-lucide-star class="size-4 text-outline/30" />
                                            @endif
                                        @endfor
                                    </div>
                                    @if ($review->created_at)
                                        <span class="text-[11px] text-on-surface-variant/70 font-medium">
                                            {{ $review->created_at->format('M Y') }}
                                        </span>
                                    @endif
                                </div>

                                {{-- Content --}}
                                <div class="font-body-md text-body-md text-on-surface mb-space-xl leading-relaxed">
                                    "{!! nl2br(e(strip_tags($review->content))) !!}"
                                </div>
                            </div>

                            {{-- Author Info --}}
                            <div class="gap-space-sm flex items-center mt-auto pt-space-md border-t border-outline/10">
                                @if (!empty($review->image))
                                    <img 
                                        src="{{ Storage::url($review->image) }}" 
                                        alt="{{ $review->name }}" 
                                        class="h-12 w-12 rounded-full object-cover shrink-0 border border-outline/20"
                                    />
                                @else
                                    @php
                                        $initials = collect(explode(' ', trim($review->name)))
                                            ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                                            ->take(2)
                                            ->implode('');
                                    @endphp
                                    <div class="bg-primary-container text-on-primary-container font-label-lg flex h-12 w-12 shrink-0 items-center justify-center rounded-full font-bold">
                                        {{ $initials ?: 'TR' }}
                                    </div>
                                @endif
                                <div class="min-w-0 flex-1">
                                    <div class="font-label-md text-label-md text-on-surface font-bold truncate flex items-center gap-1.5">
                                        <span>{{ $review->name }}</span>
                                        <x-lucide-badge-check class="size-4 text-primary shrink-0" title="Verified Traveler" />
                                    </div>
                                    @if (!empty($review->role))
                                        <div class="font-body-sm text-body-sm text-on-surface-variant truncate">
                                            {{ $review->role }}
                                        </div>
                                    @elseif (!empty($review->company))
                                        <div class="font-body-sm text-body-sm text-on-surface-variant truncate">
                                            {{ $review->company }}
                                        </div>
                                    @else
                                        <div class="font-body-sm text-body-sm text-on-surface-variant truncate">
                                            Himalayan Adventurer
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-16 text-center bg-surface-container-lowest rounded-2xl border border-outline/10 p-8">
                            <div class="inline-flex p-4 rounded-full bg-primary/10 text-primary mb-4">
                                <x-lucide-star class="size-8" />
                            </div>
                            <h3 class="text-xl font-bold text-on-surface mb-2">No Reviews Yet</h3>
                            <p class="text-sm text-on-surface-variant max-w-md mx-auto mb-6">
                                Be the first traveler to share your journey and inspire other adventurers.
                            </p>
                            <a 
                                href="{{ route('write-review') }}"
                                class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-primary text-on-primary font-bold shadow-sm hover:opacity-90 transition-all text-sm"
                            >
                                <x-lucide-pencil class="size-4" />
                                <span>Write the First Review</span>
                            </a>
                        </div>
                    @endforelse
                </div>

                {{-- Pagination Links --}}
                @if (isset($reviews) && method_exists($reviews, 'hasPages') && $reviews->hasPages())
                    <div class="mt-space-2xl flex justify-center">
                        {{ $reviews->links() }}
                    </div>
                @endif

                {{-- Bottom CTA Box --}}
                <div class="mt-space-3xl rounded-2xl bg-surface-container-high/60 border border-outline/15 p-8 lg:p-12 text-center max-w-3xl mx-auto shadow-sm">
                    <div class="inline-flex p-3 rounded-2xl bg-primary/10 text-primary mb-4">
                        <x-lucide-sparkles class="size-6" />
                    </div>
                    <h3 class="text-2xl lg:text-3xl font-extrabold text-on-surface tracking-tight mb-3">
                        Trekked With Neepa Adventure?
                    </h3>
                    <p class="text-sm lg:text-base text-on-surface-variant max-w-lg mx-auto mb-6 leading-relaxed">
                        Your honest feedback guides future mountaineers and helps our local guiding team continue delivering exceptional Himalayan journeys.
                    </p>
                    <a 
                        href="{{ route('write-review') }}"
                        class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-primary text-on-primary font-bold shadow-md hover:opacity-90 hover:scale-[1.02] transition-all"
                    >
                        <x-lucide-pencil class="size-5" />
                        <span>Share Your Trekking Story</span>
                    </a>
                </div>

            </div>
        </section>
    </main>
    <x-footer />
</x-layouts.app>
