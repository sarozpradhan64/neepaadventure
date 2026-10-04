<x-layouts.app 
    :title="$websiteSettings['reviews_seo_title'] ?? ($websiteSettings['reviews_banner_title'] ?? 'Customer Reviews')"
    :description="$websiteSettings['reviews_seo_description'] ?? ($websiteSettings['reviews_banner_text'] ?? 'Real stories and experiences from travelers who explored Nepal with us.')"
>
    <x-header />
    <main class="bg-surface w-full">
        {{-- Banner: Adventure Photo — Template 01 —  hangs flush under fixed navbar --}}
        <section class="w-full pt-48 pb-space-3xl px-gutter-mobile lg:px-gutter-desktop"
                 style="background: {!! !empty($websiteSettings['reviews_banner_image']) ? 'linear-gradient(90deg, var(--color-ridge-deep) 0%, rgba(15,24,33,0.82) 42%, rgba(15,24,33,0.22) 100%), url(' . Storage::url($websiteSettings['reviews_banner_image']) . ') center/cover no-repeat' : 'linear-gradient(90deg, var(--color-ridge-deep) 0%, rgba(15,24,33,0.82) 42%, rgba(15,24,33,0.22) 100%), linear-gradient(135deg,#2b3530,#4a5e50 45%,#131c18 46%,#c8c3a8)' !!}; position:relative; isolation:isolate; overflow:hidden;">

            {{-- Sun glow --}}
            <div class="absolute" style="right:13%; top:20%; width:88px; height:88px; border-radius:50%; background:radial-gradient(circle, var(--color-primary-container) 0%, var(--color-amber-flare) 100%); filter:blur(2px); opacity:.85;"></div>

            {{-- Mountain silhouette --}}
            <div class="absolute inset-x-0 bottom-0" style="height:75%; z-index:1;
                background:
                    linear-gradient(145deg,transparent 35%,#171d19 35.2% 49%,transparent 49.2%),
                    linear-gradient(25deg,transparent 40%,#29352e 40.2% 62%,transparent 62.2%),
                    linear-gradient(160deg,transparent 48%,#a9b1a1 48.2% 63%,transparent 63.2%);
                clip-path:polygon(0 100%,0 55%,14% 42%,25% 62%,38% 28%,52% 59%,66% 18%,79% 55%,91% 34%,100% 51%,100% 100%);
                opacity:.7;"></div>

            {{-- Content --}}
            <div class="relative z-10 max-w-max-content-width mx-auto py-space-xl">
                <div class="font-badge-caption text-badge-caption font-bold tracking-widest uppercase flex items-center gap-space-xs mb-space-sm" style="color:rgba(255,255,255,.6);">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                    <span style="color:var(--color-primary-container); font-weight:900;">/</span>
                    <span class="text-summit-white font-black">Reviews</span>
                </div>
                <div style="width:46px;height:4px;background:var(--color-primary-container);border-radius:20px;margin-bottom:var(--spacing-space-md);"></div>
                <h1 class="font-headline-lg text-headline-lg lg:text-display-xl text-summit-white font-extrabold tracking-tight mb-space-sm" style="line-height:.95; letter-spacing:-.03em;">
                    {{ $websiteSettings['reviews_banner_title'] ?? 'Customer Reviews' }}
                </h1>
                <p class="font-body-lg text-body-lg m-0 max-w-[520px]" style="color:var(--color-primary-container); opacity:.85;">
                    {{ $websiteSettings['reviews_banner_text'] ?? 'Real stories and experiences from travelers who explored Nepal with us.' }}
                </p>
            </div>
        </section>

        <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full">
            <div class="max-w-max-content-width mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-xl">
                    <!-- Placeholder reviews -->
                    <div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm border border-outline/10 hover:shadow-md transition-shadow flex flex-col">
                        <div class="gap-space-2xs text-amber-500 mb-space-md flex items-center">
                            <x-lucide-star class="size-5 fill-current" />
                            <x-lucide-star class="size-5 fill-current" />
                            <x-lucide-star class="size-5 fill-current" />
                            <x-lucide-star class="size-5 fill-current" />
                            <x-lucide-star class="size-5 fill-current" />
                        </div>
                        <p class="font-body-md text-body-md text-on-surface mb-space-xl">"An unforgettable experience! The guides were incredibly knowledgeable and supportive throughout our trek to Everest Base Camp."</p>
                        <div class="gap-space-sm flex items-center mt-auto">
                            <div class="bg-primary-container text-on-primary-container font-label-lg flex h-12 w-12 shrink-0 items-center justify-center rounded-full font-bold">
                                JD
                            </div>
                            <div>
                                <div class="font-label-md text-label-md text-on-surface font-bold">John Doe</div>
                                <div class="font-body-sm text-body-sm text-on-surface-variant">Everest Base Camp Trek</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm border border-outline/10 hover:shadow-md transition-shadow flex flex-col">
                        <div class="gap-space-2xs text-amber-500 mb-space-md flex items-center">
                            <x-lucide-star class="size-5 fill-current" />
                            <x-lucide-star class="size-5 fill-current" />
                            <x-lucide-star class="size-5 fill-current" />
                            <x-lucide-star class="size-5 fill-current" />
                            <x-lucide-star class="size-5 fill-current" />
                        </div>
                        <p class="font-body-md text-body-md text-on-surface mb-space-xl">"Everything was organized perfectly. The Annapurna Circuit was challenging but the breathtaking views made it all worth it."</p>
                        <div class="gap-space-sm flex items-center mt-auto">
                            <div class="bg-primary-container text-on-primary-container font-label-lg flex h-12 w-12 shrink-0 items-center justify-center rounded-full font-bold">
                                SJ
                            </div>
                            <div>
                                <div class="font-label-md text-label-md text-on-surface font-bold">Sarah Jenkins</div>
                                <div class="font-body-sm text-body-sm text-on-surface-variant">Annapurna Circuit Trek</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm border border-outline/10 hover:shadow-md transition-shadow flex flex-col">
                        <div class="gap-space-2xs text-amber-500 mb-space-md flex items-center">
                            <x-lucide-star class="size-5 fill-current" />
                            <x-lucide-star class="size-5 fill-current" />
                            <x-lucide-star class="size-5 fill-current" />
                            <x-lucide-star class="size-5 fill-current" />
                            <x-lucide-star class="size-5 fill-current" />
                        </div>
                        <p class="font-body-md text-body-md text-on-surface mb-space-xl">"Neepa Adventure's team went above and beyond to ensure our safety and comfort. Highly recommended for anyone trekking in Nepal."</p>
                        <div class="gap-space-sm flex items-center mt-auto">
                            <div class="bg-primary-container text-on-primary-container font-label-lg flex h-12 w-12 shrink-0 items-center justify-center rounded-full font-bold">
                                MP
                            </div>
                            <div>
                                <div class="font-label-md text-label-md text-on-surface font-bold">Mike Peterson</div>
                                <div class="font-body-sm text-body-sm text-on-surface-variant">Langtang Valley Trek</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <x-footer />
</x-layouts.app>
