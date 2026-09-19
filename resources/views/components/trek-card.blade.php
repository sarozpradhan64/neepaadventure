@props([
    'title',
    'image',
    'imageAlt' => '',
    'badge' => null,
    'badgeClass' => 'bg-primary-container text-on-primary-fixed',
    'altitude' => null,
    'duration' => null,
    'rating' => null,
    'reviews' => null,
    'description',
    'inclusions' => [],
    'price' => null,
    'href' => '#'
])

<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group">
    <!-- Card Image & Badges -->
    <div class="relative h-60 w-full overflow-hidden">
        <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-500" data-alt="{{ $imageAlt }}" style="background-image: url('{{ $image }}')">
        </div>
        
        @if($badge)
        <div class="absolute top-3 left-3 px-space-sm py-1 rounded font-badge-caption text-badge-caption font-bold uppercase shadow-sm {{ $badgeClass }}">
            {{ $badge }}
        </div>
        @endif

        @if($altitude)
        <div class="absolute bottom-3 right-3 px-space-sm py-1 rounded bg-ridge-deep/85 backdrop-blur-sm text-summit-white font-badge-caption text-badge-caption font-bold uppercase flex items-center gap-1">
            <x-lucide-mountain class="text-primary-container size-[14px]" />
            {{ $altitude }}
        </div>
        @endif
    </div>

    <!-- Card Body -->
    <div class="p-space-lg flex-1 flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between text-tertiary font-label-sm text-label-sm mb-space-2xs">
                @if($duration)
                <span class="flex items-center gap-1"><x-lucide-clock-3 class="size-[16px]" /> {{ $duration }}</span>
                @endif
                
                @if($rating)
                <span class="flex items-center gap-1 text-primary font-semibold">
                    <x-lucide-star class="size-[16px]" /> 
                    {{ $rating }} @if($reviews) ({{ $reviews }}+) @endif
                </span>
                @endif
            </div>

            <h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors leading-tight mb-space-xs">
                {{ $title }}
            </h3>

            <p class="font-body-sm text-body-sm text-tertiary line-clamp-2 mb-space-md">
                {{ $description }}
            </p>

            @if(count($inclusions) > 0)
            <!-- Inclusions checklist -->
            <div class="space-y-1.5 mb-space-lg bg-surface-container-low p-space-sm rounded-lg text-on-surface font-body-sm text-body-sm">
                @foreach($inclusions as $inclusion)
                <div class="flex items-center gap-space-2xs">
                    <x-lucide-circle-check class="text-primary size-[16px]" />
                    <span>{{ $inclusion }}</span>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Pricing & Action Row -->
        <div class="pt-space-md flex items-center justify-between">
            <div>
                <span class="font-badge-caption text-badge-caption uppercase text-tertiary block">From Kathmandu</span>
                <span class="font-headline-sm text-headline-sm font-bold text-on-surface">{{ $price }}</span>
                <span class="text-body-sm text-tertiary">/ person</span>
            </div>
            
            <x-ui.button variant="secondary" as="a" href="{{ $href }}" class="bg-surface-container-high hover:bg-primary-container hover:text-on-primary-fixed text-on-surface font-label-md text-label-md font-bold uppercase transition-all">
                Itinerary
            </x-ui.button>
        </div>
    </div>
</div>
