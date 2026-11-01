<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-28 pb-16 sm:pt-36 sm:pb-24">
        <div class="max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop">
            <div class="space-y-8">
                <div class="text-center">
                    <h1 class="font-headline-lg text-2xl sm:text-3xl lg:text-headline-lg text-on-surface font-bold tracking-tight">
                        {{ $page->title }}
                    </h1>
                    @if($page->sub_title)
                        <p class="mt-4 font-body-lg text-base sm:text-body-lg text-tertiary">
                            {{ $page->sub_title }}
                        </p>
                    @endif
                </div>

                @if($page->featured_image)
                    <div class="w-full rounded-2xl overflow-hidden shadow-xl my-12 cursor-pointer group relative" onclick="window.openImageViewer([{ url: '{{ \Illuminate\Support\Facades\Storage::disk('public')->url($page->featured_image) }}', title: '{{ addslashes($page->title) }}' }])">
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($page->featured_image) }}" alt="{{ $page->title }}" class="w-full h-auto max-h-[600px] object-cover transition-transform duration-500 group-hover:scale-[1.02]" />
                        <div class="absolute top-4 right-4 z-10 size-8 rounded-full bg-black/60 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity backdrop-blur-sm pointer-events-none" title="Zoom &amp; Download">
                            <x-lucide-maximize-2 class="size-4 text-primary-container" />
                        </div>
                    </div>
                @endif

                <div data-viewer class="prose prose-slate prose-lg max-w-4xl mx-auto text-on-surface-variant prose-img:cursor-pointer prose-img:rounded-xl">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
