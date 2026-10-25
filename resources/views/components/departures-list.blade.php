@forelse($departures ?? [] as $departure)
@php
    $service = optional($departure->service);
    $spotsLeft = max(0, $departure->seats_total - $departure->seats_booked);
    $isFewSpots = $spotsLeft <= 3 && $spotsLeft > 0;
    $startDate = optional($departure->start_date);
    $endDate = optional($departure->end_date);
    $isSameMonth = $startDate && $endDate && $startDate->format('Y-m') === $endDate->format('Y-m');
@endphp
<div class="group relative bg-surface-container-lowest rounded-2xl overflow-hidden border border-outline/10 hover:border-primary/40 hover:shadow-xl hover:shadow-primary/5 transition-all duration-300">
    <div class="flex flex-col md:flex-row">
        <!-- Date Block -->
        <div class="bg-surface-container-low/60 md:w-52 p-4 sm:p-space-lg flex flex-col justify-center items-center text-center border-b md:border-b-0 md:border-r border-dashed border-outline/20 group-hover:bg-primary/5 transition-colors shrink-0">
            @if($isSameMonth)
                <span class="font-label-sm font-bold text-primary tracking-widest uppercase mb-1">
                    {{ $startDate->format('M Y') }}
                </span>
                <span class="font-display-sm text-display-sm font-black text-on-surface leading-none mb-1">
                    {{ $startDate->format('d') }} &ndash; {{ $endDate->format('d') }}
                </span>
            @else
                <span class="font-label-sm font-bold text-primary tracking-widest uppercase mb-1">
                    {{ $startDate->format('M') }} &ndash; {{ $endDate->format('M Y') }}
                </span>
                <span class="font-display-sm text-display-sm font-black text-on-surface leading-none mb-1 text-base sm:text-lg">
                    {{ $startDate->format('d M') }} &ndash; {{ $endDate->format('d M') }}
                </span>
            @endif
            <span class="font-body-sm text-tertiary mt-2 flex items-center gap-1.5">
                <x-lucide-calendar-clock class="size-4 text-primary" /> {{ $service->duration ?? 'TBA' }}
            </span>
        </div>
        
        <!-- Content Block -->
        <div class="flex-1 p-4 sm:p-space-lg flex flex-col justify-center">
            <div class="flex items-start justify-between gap-4 mb-2">
                <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors">
                    <a href="{{ $service->url ?? '#' }}" class="hover:underline">
                        {{ $service->title ?? 'Trek' }}
                    </a>
                </h3>
                <div class="shrink-0">
                    @if($spotsLeft <= 0 || $departure->status === 'Full')
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-error/10 text-error font-label-sm text-[11px] font-bold uppercase tracking-wider border border-error/20">
                            <x-lucide-alert-circle class="size-3" /> Sold Out
                        </span>
                    @elseif($isFewSpots)
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-primary-container/20 text-on-primary-fixed-variant font-label-sm text-[11px] font-bold uppercase tracking-wider border border-primary/20">
                            <span class="size-1.5 rounded-full bg-amber-flare animate-ping"></span>
                            Guaranteed &bull; Only {{ $spotsLeft }} Left
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-success/10 text-success font-label-sm text-[11px] font-bold uppercase tracking-wider border border-success/20">
                            <x-lucide-check-circle-2 class="size-3" /> Guaranteed Run
                        </span>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-x-6 gap-y-2 font-body-sm text-tertiary mb-2">
                <span class="flex items-center gap-1.5">
                    <x-lucide-map-pin class="size-4 text-amber-flare" /> {{ $service->region ?? 'Nepal' }}
                </span>
                <span class="flex items-center gap-1.5">
                    <x-lucide-trending-up class="size-4 text-primary" /> {{ $service->difficulty_level ?? 'Moderate' }}
                </span>
                <span class="flex items-center gap-1.5">
                    <x-lucide-users class="size-4 text-primary" />
                    @if($spotsLeft <= 0)
                        <span class="text-error font-semibold">Full Team</span>
                    @elseif($isFewSpots)
                        <span class="text-on-primary-fixed-variant font-bold">{{ $spotsLeft }} Spots Left</span>
                    @else
                        <span>{{ $spotsLeft }} Spots Left</span>
                    @endif
                </span>
            </div>
        </div>

        <!-- Action & Price Block -->
        <div class="p-4 sm:p-space-lg md:w-64 bg-surface-container-lowest flex flex-col sm:flex-row md:flex-col items-start sm:items-center md:items-end justify-between md:justify-center gap-3 border-t md:border-t-0 md:border-l border-outline/10 shrink-0">
            <div class="text-left md:text-right mb-0 md:mb-4 w-full sm:w-auto">
                @if($service->price_from)
                    @if($service->discount_amount > 0)
                        <div class="flex items-center md:justify-end gap-2 mb-1">
                            <span class="line-through text-tertiary font-body-sm">US${{ number_format((float) $service->price_from) }}</span>
                            <span class="px-2 py-0.5 rounded-md text-[10px] font-bold uppercase bg-error/10 text-error border border-error/20">Save ${{ number_format((float) $service->discount_amount) }}</span>
                        </div>
                        <div class="font-headline-md text-xl sm:text-headline-md font-black text-on-surface">US${{ number_format((float) ($service->price_from - $service->discount_amount)) }}</div>
                    @else
                        <div class="font-headline-md text-xl sm:text-headline-md font-black text-on-surface">US${{ number_format((float) $service->price_from) }}</div>
                    @endif
                @else
                    <div class="font-headline-md text-xl sm:text-headline-md font-black text-on-surface">TBA</div>
                @endif
            </div>
            @if($spotsLeft <= 0)
                <a href="{{ $service ? $service->url : '#' }}" class="inline-flex items-center justify-center gap-2 bg-surface-container-high hover:bg-surface-container-highest text-on-surface text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-xl transition-all w-full sm:w-auto border border-outline/10">
                    Join Waitlist
                    <x-lucide-arrow-right class="size-4" />
                </a>
            @else
                <a href="{{ $service ? $service->url : '#' }}" class="inline-flex items-center justify-center gap-2 bg-primary-container text-on-primary-fixed hover:bg-amber-flare text-xs font-bold uppercase tracking-wider px-5 py-2.5 rounded-xl transition-all shadow-sm hover:shadow-md w-full sm:w-auto group/btn">
                    Book Now 
                    <x-lucide-arrow-right class="size-4 group-hover/btn:translate-x-1 transition-transform" />
                </a>
            @endif
        </div>
    </div>
</div>
@empty
<div class="p-space-2xl text-center border border-dashed border-outline/20 rounded-2xl bg-surface-container-lowest space-y-4">
    <div class="w-14 h-14 rounded-2xl bg-primary/10 text-primary flex items-center justify-center mx-auto">
        <x-lucide-calendar class="size-7" />
    </div>
    <div class="space-y-1">
        <h3 class="text-lg font-bold text-on-surface">No Scheduled Departures Found</h3>
        <p class="text-tertiary font-body-sm max-w-md mx-auto">
            We operate flexible dates upon request. You can request a private or custom group departure tailored to your preferred season.
        </p>
    </div>
    <div class="pt-2">
        <a href="{{ route('plan-your-trek') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary-container hover:bg-amber-flare text-on-primary-fixed text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-sm">
            <x-lucide-calendar-plus class="size-4" /> Request Custom Date
        </a>
    </div>
</div>
@endforelse
