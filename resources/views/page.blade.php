<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-48 pb-24">
        <div class="max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop">
            <div class="space-y-8">
                <div class="text-center">
                    <h1 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">
                        {{ $page->title }}
                    </h1>
                    @if($page->sub_title)
                        <p class="mt-4 font-body-lg text-body-lg text-tertiary">
                            {{ $page->sub_title }}
                        </p>
                    @endif
                </div>

                @if($page->featured_image)
                    <div class="w-full rounded-2xl overflow-hidden shadow-xl my-12">
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($page->featured_image) }}" alt="{{ $page->title }}" class="w-full h-auto max-h-[600px] object-cover" />
                    </div>
                @endif

                <div class="prose prose-slate prose-lg max-w-4xl mx-auto text-on-surface-variant">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
