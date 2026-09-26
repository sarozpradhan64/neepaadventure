<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-32">
        <div class="flex w-full flex-col">
            <!-- Curated Featured Photo Essays & Highlights -->
            @if($featuredAlbums->count() > 0)
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="mb-space-xl gap-space-sm flex flex-col justify-between md:flex-row md:items-end">
                        <div>
                            <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-widest uppercase">Documentary Spotlight</span>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight uppercase">
                                Featured Albums
                            </h2>
                        </div>
                    </div>
                    
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        @foreach($featuredAlbums as $album)
                        <a href="{{ route('gallery.show', $album->slug) }}" class="group bg-surface-container-lowest relative overflow-hidden rounded-xl shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                            <div class="relative h-80 overflow-hidden">
                                @if($album->cover_image)
                                    <img src="{{ Storage::url($album->cover_image) }}" alt="{{ $album->title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                                @else
                                    <div class="h-full w-full bg-surface-container-high flex items-center justify-center">
                                        <x-lucide-image class="size-12 text-surface-dim" />
                                    </div>
                                @endif
                                <div class="from-ridge-deep/90 via-ridge-deep/30 absolute inset-0 bg-gradient-to-t to-transparent opacity-90 transition-opacity group-hover:opacity-95"></div>
                                
                                <div class="p-space-md text-summit-white absolute inset-x-0 bottom-0">
                                    <h3 class="font-headline-sm text-headline-sm text-summit-white leading-tight font-bold">
                                        {{ $album->title }}
                                    </h3>
                                    @if($album->description)
                                    <div class="text-body-sm text-surface-dim mt-1 line-clamp-2">
                                        {!! strip_tags($album->description) !!}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif

            <!-- Masonry Photo Grid Section -->
            <section class="py-space-2xl px-gutter-mobile lg:px-gutter-desktop bg-surface-container-low w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="gap-space-md mb-space-xl flex flex-col items-start justify-between sm:flex-row sm:items-center">
                        <div>
                            <div class="font-badge-caption text-badge-caption text-primary font-bold tracking-widest uppercase">
                                The Archive
                            </div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight uppercase">
                                All Albums
                            </h2>
                        </div>
                    </div>
                    
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3" id="gallery-grid">
                        @foreach($albums as $album)
                        <a href="{{ route('gallery.show', $album->slug) }}" class="gallery-item group bg-surface-container-lowest relative overflow-hidden rounded-xl shadow-sm transition-all duration-300 hover:shadow-xl">
                            <div class="relative h-80 overflow-hidden">
                                @if($album->cover_image)
                                    <img src="{{ Storage::url($album->cover_image) }}" alt="{{ $album->title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                                @else
                                    <div class="h-full w-full bg-surface-container-high flex items-center justify-center">
                                        <x-lucide-image class="size-12 text-surface-dim" />
                                    </div>
                                @endif
                                <div class="from-ridge-deep/90 via-ridge-deep/30 absolute inset-0 bg-gradient-to-t to-transparent opacity-90 transition-opacity group-hover:opacity-95"></div>
                                
                                <div class="p-space-md text-summit-white absolute inset-x-0 bottom-0">
                                    <h3 class="font-headline-sm text-headline-sm text-summit-white leading-tight font-bold">
                                        {{ $album->title }}
                                    </h3>
                                    @if($album->description)
                                    <div class="text-body-sm text-surface-dim mt-1 line-clamp-2">
                                        {!! strip_tags($album->description) !!}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
