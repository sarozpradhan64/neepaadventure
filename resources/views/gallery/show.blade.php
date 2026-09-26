<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-32 pb-20">
        <div class="max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop">
            <div class="mb-space-xl gap-space-sm flex flex-col justify-between md:flex-row md:items-end border-b border-surface-container-high pb-8">
                <div>
                    <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-widest uppercase"><a href="{{ route('gallery') }}" class="hover:text-primary-container">Gallery</a> / {{ $album->title }}</span>
                    <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight uppercase mt-2">
                        {{ $album->title }}
                    </h1>
                    @if($album->description)
                    <div class="text-body-md text-surface-dim mt-4 max-w-3xl prose prose-invert">
                        {!! $album->description !!}
                    </div>
                    @endif
                </div>
                <!-- View Switchers -->
                <div class="bg-surface-container flex items-center rounded-lg p-1 mt-4 md:mt-0">
                    <button
                        aria-label="Grid layout"
                        class="p-space-2xs bg-surface-container-lowest text-on-surface rounded shadow-sm transition-colors toggle-view-btn"
                        data-view="grid"
                        title="Grid View"
                    >
                        <x-lucide-grid-2x2 class="size-[20px]" />
                    </button>
                    <button
                        aria-label="List layout"
                        class="p-space-2xs text-tertiary hover:text-on-surface rounded transition-colors toggle-view-btn"
                        data-view="list"
                        title="List View"
                    >
                        <x-lucide-list class="size-[20px]" />
                    </button>
                </div>
            </div>

            @if($album->items->count() > 0)
            <div id="gallery-container" class="grid-view gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach($album->items as $item)
                <div class="gallery-item group bg-surface-container-lowest relative overflow-hidden rounded-xl shadow-sm transition-all duration-300 hover:shadow-xl">
                    <div class="relative h-80 w-full overflow-hidden item-image-container">
                        @if($item->file_path)
                            <img src="{{ Storage::url($item->file_path) }}" alt="{{ $item->title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                        @else
                            <div class="h-full w-full bg-surface-container-high flex items-center justify-center">
                                <x-lucide-image class="size-12 text-surface-dim" />
                            </div>
                        @endif
                        <div class="from-ridge-deep/90 via-ridge-deep/30 absolute inset-0 bg-gradient-to-t to-transparent opacity-90 transition-opacity group-hover:opacity-95 item-scrim"></div>
                        
                        <div class="p-space-md text-summit-white absolute inset-x-0 bottom-0 item-details z-10">
                            <h3 class="font-headline-sm text-headline-sm text-summit-white leading-tight font-bold">
                                {{ $item->title }}
                            </h3>
                            @if($item->caption)
                            <p class="text-body-sm text-surface-dim mt-1">
                                {{ $item->caption }}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="py-20 text-center text-surface-dim">
                <x-lucide-image class="size-16 mx-auto mb-4 opacity-50" />
                <p>No photos or videos found in this album.</p>
            </div>
            @endif
        </div>
    </main>
    <x-footer />
    
    <style>
        /* Grid View Default */
        #gallery-container.grid-view {
            display: grid;
        }
        
        /* List View */
        #gallery-container.list-view {
            display: flex;
            flex-direction: column;
        }
        #gallery-container.list-view .gallery-item {
            display: flex;
            flex-direction: row;
        }
        #gallery-container.list-view .item-image-container {
            width: 300px;
            height: 200px;
            flex-shrink: 0;
        }
        #gallery-container.list-view .item-scrim {
            display: none;
        }
        #gallery-container.list-view .item-details {
            position: static;
            padding: 1.5rem;
            color: inherit;
        }
        #gallery-container.list-view .item-details h3 {
            color: var(--color-on-surface);
        }
        #gallery-container.list-view .item-details p {
            color: var(--color-surface-dim);
        }
    </style>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('gallery-container');
            if(!container) return;
            
            const buttons = document.querySelectorAll('.toggle-view-btn');
            
            buttons.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    // Update active state
                    buttons.forEach(b => {
                        b.classList.remove('bg-surface-container-lowest', 'text-on-surface');
                        b.classList.add('text-tertiary');
                    });
                    
                    const target = e.currentTarget;
                    target.classList.remove('text-tertiary');
                    target.classList.add('bg-surface-container-lowest', 'text-on-surface');
                    
                    // Toggle container class
                    const view = target.dataset.view;
                    if(view === 'list') {
                        container.classList.remove('grid-view');
                        container.classList.add('list-view');
                        container.classList.remove('grid', 'grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-3');
                    } else {
                        container.classList.add('grid-view');
                        container.classList.remove('list-view');
                        container.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-3');
                    }
                });
            });
        });
    </script>
</x-layouts.app>
