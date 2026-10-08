@props([
    'title',
    'slug',
    'image' => null,
    'imageAlt' => '',
    'category' => null,
    'excerpt' => null,
    'author' => null,
    'date',
])

<article class="bg-surface-container-lowest flex flex-col overflow-hidden rounded-lg shadow-sm transition-all hover:shadow-md">
    <div class="relative h-48 w-full">
        @if($image)
            <img
                class="h-full w-full object-cover"
                alt="{{ $imageAlt ?: $title }}"
                src="{{ $image }}"
            />
        @else
            <div class="bg-surface-variant flex h-full w-full items-center justify-center">
                <x-lucide-image class="text-surface-dim size-[36px]" />
            </div>
        @endif

        @if($category)
            <span class="top-space-sm left-space-sm px-space-xs py-space-2xs bg-ridge-deep text-summit-white font-badge-caption text-badge-caption absolute rounded uppercase">
                {{ $category }}
            </span>
        @endif
    </div>

    <div class="p-space-lg gap-space-md flex flex-grow flex-col justify-between">
        <div class="gap-space-xs flex flex-col">
            @if($category)
                <span class="font-badge-caption text-badge-caption text-secondary uppercase">{{ $category }}</span>
            @endif
            <h3 class="font-headline-sm text-headline-sm text-on-surface hover:text-primary line-clamp-2 transition-colors">
                <a href="{{ route('blog-detail', ['slug' => $slug]) }}">{{ $title }}</a>
            </h3>
            @if($excerpt)
                <p class="font-body-md text-body-md text-on-surface-variant line-clamp-3">{{ $excerpt }}</p>
            @endif
        </div>
        <div class="pt-space-sm font-body-sm text-body-sm text-secondary flex items-center justify-between">
            <span>{{ $author ?? 'Admin' }}</span>
            <span>{{ $date }}</span>
        </div>
    </div>
</article>
