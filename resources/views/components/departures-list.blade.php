                        @forelse($departures ?? [] as $departure)
                        @php
                            $service = optional($departure->service);
                            $spotsLeft = max(0, $departure->seats_total - $departure->seats_booked);
                        @endphp
                        <div class="group relative bg-surface-container-lowest rounded-2xl overflow-hidden border border-outline/10 hover:border-primary/30 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-300">
                            <div class="flex flex-col md:flex-row">
                                <!-- Date Block -->
                                <div class="bg-surface-container-low/50 md:w-48 p-space-lg flex flex-col justify-center items-center text-center border-b md:border-b-0 md:border-r border-dashed border-outline/20 group-hover:bg-primary/5 transition-colors">
                                    <span class="font-label-sm font-bold text-primary tracking-widest uppercase mb-1">{{ optional($departure->start_date)->format('M Y') }}</span>
                                    <span class="font-display-sm text-display-sm font-black text-on-surface leading-none mb-1">
                                        {{ optional($departure->start_date)->format('d') }}-{{ optional($departure->end_date)->format('d') }}
                                    </span>
                                    <span class="font-body-sm text-tertiary mt-2 flex items-center gap-1">
                                        <x-lucide-calendar-clock class="size-4" /> {{ $service->duration ?? 'TBA' }}
                                    </span>
                                </div>
                                
                                <!-- Content Block -->
                                <div class="flex-1 p-space-lg flex flex-col justify-center">
                                    <div class="flex items-start justify-between gap-4 mb-2">
                                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors">
                                            {{ $service->title ?? 'Trek' }}
                                        </h3>
                                        <div class="shrink-0">
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-700 font-label-sm text-[11px] font-bold uppercase tracking-wider">
                                                <x-lucide-check-circle-2 class="size-3" /> Guaranteed
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap items-center gap-x-6 gap-y-2 font-body-sm text-tertiary mb-4">
                                        <span class="flex items-center gap-1"><x-lucide-map-pin class="size-4 text-outline" /> {{ $service->region ?? 'Nepal' }}</span>
                                        <span class="flex items-center gap-1"><x-lucide-trending-up class="size-4 text-outline" /> {{ $service->difficulty_level ?? 'Moderate' }}</span>
                                        <span class="flex items-center gap-1"><x-lucide-users class="size-4 text-outline" /> {{ $spotsLeft }} Spots Left</span>
                                    </div>
                                </div>

                                <!-- Action & Price Block -->
                                <div class="p-space-lg md:w-64 bg-surface-container-lowest flex flex-row md:flex-col items-center md:items-end justify-between md:justify-center border-t md:border-t-0 md:border-l border-outline/10">
                                    <div class="text-left md:text-right mb-0 md:mb-4">
                                        @if($service->price_from)
                                            @if($service->discount_amount > 0)
                                                <div class="flex items-center md:justify-end gap-2 mb-1">
                                                    <span class="line-through text-tertiary font-body-sm">US${{ number_format((float) $service->price_from) }}</span>
                                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-rose-100 text-rose-700">Save ${{ number_format((float) $service->discount_amount) }}</span>
                                                </div>
                                                <div class="font-headline-md text-headline-md font-black text-on-surface">US${{ number_format((float) ($service->price_from - $service->discount_amount)) }}</div>
                                            @else
                                                <div class="font-headline-md text-headline-md font-black text-on-surface">US${{ number_format((float) $service->price_from) }}</div>
                                            @endif
                                        @else
                                            <div class="font-headline-md text-headline-md font-black text-on-surface">TBA</div>
                                        @endif
                                    </div>
                                    <a href="{{ $service->slug ? route('trek-detail', ['slug' => $service->slug]) : '#' }}" class="inline-flex items-center justify-center gap-2 bg-on-surface text-surface hover:bg-primary hover:text-on-primary text-sm font-bold px-4 py-2 rounded-lg transition-all w-full md:w-auto group/btn">
                                        Book Now 
                                        <x-lucide-arrow-right class="size-4 group-hover/btn:translate-x-1 transition-transform" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="p-space-xl text-center text-tertiary font-body-md border border-dashed border-outline/20 rounded-2xl">
                            No guaranteed departures available at the moment. Please check back later.
                        </div>
                        @endforelse
