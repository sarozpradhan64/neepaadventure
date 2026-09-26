<?php

$content = file_get_contents('resources/views/treks.blade.php');
$start_marker = '<!-- Main Cards Container -->';
$end_marker = '<!-- No Results State (Hidden by default) -->';
$start_pos = strpos($content, $start_marker);
$end_pos = strpos($content, $end_marker);

if ($start_pos !== false && $end_pos !== false) {
    // Find the end of the start marker div
    $div_start = strpos($content, 'id="trek-cards-grid">', $start_pos) + strlen('id="trek-cards-grid">');
    // Find the closing div of the grid which is just before $end_marker
    $div_end = strrpos(substr($content, 0, $end_pos), '</div>');

    $replacement = '
                        @foreach($treks as $trek)
                        <article class="trek-card group bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between" data-altitude="{{ (int) filter_var($trek->maximum_altitude, FILTER_SANITIZE_NUMBER_INT) }}" data-difficulty="{{ $trek->difficulty_level }}" data-duration="{{ (int) filter_var($trek->duration, FILTER_SANITIZE_NUMBER_INT) }}" data-id="{{ $trek->id }}" data-price="{{ $trek->price_from }}">
                            <div>
                                <div class="relative h-64 w-full overflow-hidden bg-surface-dim">
                                    @if($trek->featuredImage)
                                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $trek->title }}" src="{{ asset(\'storage/\' . $trek->featuredImage->path) }}" />
                                    @else
                                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $trek->title }}" src="" />
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-on-surface/80 via-transparent to-transparent"></div>
                                    <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
                                        <span class="px-2.5 py-1 bg-amber-flare text-on-primary-fixed font-badge-caption text-badge-caption font-bold rounded uppercase">Trek</span>
                                    </div>
                                    <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-summit-white">
                                        <div class="flex items-center gap-1 font-label-sm text-label-sm uppercase tracking-wider">
                                            <x-lucide-map-pin class="size-[16px] text-primary-container" />
                                            {{ $trek->start_end_point }}
                                        </div>
                                        <div class="font-badge-caption text-badge-caption bg-surface-container-lowest/20 backdrop-blur-md px-2 py-0.5 rounded text-summit-white">
                                            {{ $trek->duration }}
                                        </div>
                                    </div>
                                </div>
                                <div class="p-space-lg space-y-space-md">
                                    <div>
                                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors">{{ $trek->title }}</h3>
                                        <div class="font-body-md text-body-md text-tertiary line-clamp-2 mt-1">{!! strip_tags($trek->description) !!}</div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-2 py-space-xs bg-surface rounded-lg p-2 text-center">
                                        <div>
                                            <span class="block font-badge-caption text-badge-caption text-tertiary uppercase">Grade</span>
                                            <span class="block font-label-md text-label-md font-bold text-on-surface">{{ ucfirst($trek->difficulty_level) }}</span>
                                        </div>
                                        <div class="border-l border-surface-container">
                                            <span class="block font-badge-caption text-badge-caption text-tertiary uppercase">Group Size</span>
                                            <span class="block font-label-md text-label-md font-bold text-on-surface">Max {{ $trek->max_group_size }}</span>
                                        </div>
                                        <div class="border-l border-surface-container">
                                            <span class="block font-badge-caption text-badge-caption text-tertiary uppercase">Pass/Alt</span>
                                            <span class="block font-label-md text-label-md font-bold text-primary">{{ $trek->maximum_altitude }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-space-lg pt-0 space-y-space-sm">
                                <div class="flex items-baseline justify-between pt-space-xs border-t border-surface-container">
                                    <div>
                                        <span class="font-body-sm text-body-sm text-tertiary block">All-inclusive from</span>
                                        <div class="flex items-baseline gap-1">
                                            <span class="font-headline-md text-headline-md font-bold text-on-surface">${{ number_format($trek->price_from, 2) }}</span>
                                            <span class="font-body-sm text-body-sm text-tertiary">USD / person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-space-xs">
                                    <a class="w-full py-2.5 px-3 bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-sm text-label-sm font-bold uppercase tracking-wider rounded text-center transition-colors" href="{{ route(\'trek-detail\', $trek->slug) }}">
                                        Itinerary
                                    </a>
                                    <button class="quick-book-btn w-full py-2.5 px-3 bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-sm text-label-sm font-bold uppercase tracking-wider rounded text-center transition-colors shadow-sm">
                                        Dates &amp; Book
                                    </button>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    ';

    $new_content = substr($content, 0, $div_start).$replacement.substr($content, $div_end);
    file_put_contents('resources/views/treks.blade.php', $new_content);
    echo "Replaced cards.\n";
} else {
    echo "Markers not found.\n";
}
