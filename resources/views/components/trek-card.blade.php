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
    'href' => '#',
])

<div class="bg-surface-container-lowest group flex flex-col overflow-hidden rounded-xl shadow-sm transition-all duration-300 hover:shadow-xl">
    <!-- Card Image & Badges -->
    <div class="relative h-60 w-full overflow-hidden">
        <div
            class="h-full w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
            data-alt="{{ $imageAlt }}"
            style="background-image: url('{{ $image }}')"
        ></div>

        @if ($badge)
            <div class="absolute top-3 left-3 px-space-sm py-1 rounded font-badge-caption text-badge-caption font-bold uppercase shadow-sm {{ $badgeClass }}">
                {{ $badge }}
            </div>
        @endif

        @if ($altitude)
            <div class="px-space-sm bg-ridge-deep/85 text-summit-white font-badge-caption text-badge-caption absolute right-3 bottom-3 flex items-center gap-1 rounded py-1 font-bold uppercase backdrop-blur-sm">
                <x-lucide-mountain class="text-primary-container size-[14px]" />
                {{ $altitude }}
            </div>
        @endif
    </div>

    <!-- Card Body -->
    <div class="p-space-lg flex flex-1 flex-col justify-between">
        <div>
            <div class="text-tertiary font-label-sm text-label-sm mb-space-2xs flex items-center justify-between">
                @if ($duration)
                    <span class="flex items-center gap-1"><x-lucide-clock-3 class="size-[16px]" /> {{ $duration }}</span>
                @endif

                @if ($rating)
                    <span class="text-primary flex items-center gap-1 font-semibold">
                        <x-lucide-star class="size-[16px]" />
                        {{ $rating }}
                        @if ($reviews) ({{ $reviews }}+) @endif
                    </span>
                @endif
            </div>

            <h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary mb-space-xs leading-tight transition-colors">
                {{ $title }}
            </h3>

            <p class="font-body-sm text-body-sm text-tertiary mb-space-md line-clamp-2">{{ $description }}</p>

            @if (count($inclusions) > 0)
                <!-- Inclusions checklist -->
                <div class="mb-space-lg bg-surface-container-low p-space-sm text-on-surface font-body-sm text-body-sm space-y-1.5 rounded-lg">
                    @foreach ($inclusions as $inclusion)
                        <div class="gap-space-2xs flex items-center">
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
                <span class="font-badge-caption text-badge-caption text-tertiary block uppercase">From Kathmandu</span>
                <span class="font-headline-sm text-headline-sm text-on-surface font-bold">{{ $price }}</span>
                <span class="text-body-sm text-tertiary">/ person</span>
            </div>

            <x-ui.button
                variant="secondary"
                as="a"
                href="{{ $href }}"
                class="bg-surface-container-high hover:bg-primary-container hover:text-on-primary-fixed text-on-surface font-label-md text-label-md font-bold uppercase transition-all"
            >
                Itinerary
            </x-ui.button>
        </div>
    </div>
</div>
