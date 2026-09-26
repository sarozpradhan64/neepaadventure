<x-layouts.app>
    <x-header />
    <main class="w-full pt-48  bg-surface">
        <div class="flex flex-col w-full">
            <!-- Top Technical Breadcrumbs & Status Bar -->
            <div class="w-full bg-surface-container-low py-space-sm px-gutter-mobile lg:px-gutter-desktop">
                <div class="max-w-max-content-width mx-auto flex flex-wrap items-center justify-between gap-space-sm">
                    <div class="flex items-center gap-space-2xs font-label-sm text-label-sm text-tertiary">
                        <a class="hover:text-primary transition-colors" href="#">Treks</a>
                        <x-lucide-chevron-right class="size-[14px]" />
                        <a class="hover:text-primary transition-colors" href="#">Khumbu &amp; Everest</a>
                        <x-lucide-chevron-right class="size-[14px]" />
                        <span class="text-on-surface font-semibold">EBC &amp; Gokyo Ri Circuit</span>
                    </div>
                    <div class="flex items-center gap-space-md font-badge-caption text-badge-caption uppercase">
                        <span class="flex items-center gap-space-2xs text-tertiary">
                            <span class="w-2 h-2 rounded-full bg-primary-container animate-pulse"></span>
                            Spring 2025 Booking Open
                        </span>
                        <span class="text-tertiary/50">•</span>
                        <span class="text-on-surface-variant font-medium">Permit Status: TAAN Validated</span>
                    </div>
                </div>
            </div>
            <!-- Hero Headline & Visual Header Panel -->
            <section
                class="w-full bg-surface-container-lowest px-gutter-mobile lg:px-gutter-desktop pt-space-xl pb-space-2xl">
                <div class="max-w-max-content-width mx-auto">
                    <div class="flex flex-wrap items-center gap-space-xs mb-space-sm">
                        <span
                            class="inline-flex items-center gap-1 bg-primary-container/20 text-on-primary-container px-space-sm py-space-2xs rounded text-badge-caption font-badge-caption uppercase">
                            <x-lucide-mountain class="size-[14px]" />
                            Circuit Grade 4/5 • Demanding
                        </span>
                        <span
                            class="inline-flex items-center gap-1 bg-surface-container-high text-tertiary px-space-sm py-space-2xs rounded text-badge-caption font-badge-caption uppercase">
                            16 Days / 15 Nights
                        </span>
                        <span
                            class="inline-flex items-center gap-1 bg-surface-container-high text-tertiary px-space-sm py-space-2xs rounded text-badge-caption font-badge-caption uppercase">
                            Cho La Pass (5,420m)
                        </span>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start">
                        <div class="lg:col-span-8 space-y-space-md">
                            <h1 class="font-headline-lg text-headline-lg text-on-surface uppercase tracking-tight">
                                Everest Base Camp &amp; Gokyo Ri Lakes Circuit
                            </h1>
                            <p class="font-body-lg text-body-lg text-tertiary max-w-3xl">
                                A sacred circumnavigation through the high turquoise glacial lakes of Gokyo, over the
                                glaciated Cho La Pass (5,420m), onto the legendary Khumbu Icefall moraine beneath Mt.
                                Everest (8,848.86m).
                            </p>
                            <!-- Imagery Mosaic Strip -->
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-space-sm pt-space-xs">
                                <div class="sm:col-span-2 h-72 rounded-xl overflow-hidden shadow-md relative group">
                                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        data-alt="Stunning panoramic sunrise over emerald Gokyo Lakes reflecting Mount Cho Oyu with vibrant prayer flags gently waving in high altitude Himalayan crisp breeze under clear azure sky"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBl3rzSjmzyUAbsNtQo1iajDXG6R0468kIY4pBYxKG0Il4bOgcfSuo-XIKxRw4oHikE_kQCAJ7G4gLcZSdl_g7qZqLtTkkds9koIWwA105QqgSaC9BoSi63ez-J9yI4XslLzET_0spEZT6bI5G65Zb25Q7YFV31IswAajpF6tK3_s79n_tjxqnYvOdCjZ1o4umB8xkjvCFnThyPTUSDaK9bdZvk29PcfkSiIji5ZNuOv_SQAU_40aG8" />
                                    <div
                                        class="absolute bottom-3 left-3 bg-ridge-deep/80 backdrop-blur-md px-3 py-1.5 rounded text-summit-white font-badge-caption text-badge-caption uppercase flex items-center gap-1.5">
                                        <x-lucide-camera class="text-primary-container size-[16px]" />
                                        3rd Gokyo Lake (Dudh Pokhari, 4,790m)
                                    </div>
                                </div>
                                <div class="flex flex-col gap-space-sm h-72">
                                    <div class="h-1/2 rounded-xl overflow-hidden shadow-md relative group">
                                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            data-alt="Trekker team traversing rugged Cho La Pass glaciated terrain wearing crampons against towering sharp snow crags under bright sunlight"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuASTFDbBT_GYwEqYMyo_I5DWjTFwOpTwG5jrI0udNfRiWQ96z9-VVWetVBow8DK61WkEXZGyhFe-v7hIdl3N31mK_uWpWjGTph4SY4Va4qwx_gRjhCeJbb1a6uxFMA5LXUjVfYcXV-SO9C2i0peuGe43EW3gln8JIp4wAHJbxbE-bv5ZIAdpBIITYe2pGP6ifJU_VHBXY7-2TysV-nE_bMHt4qyVivt7UBTdgpPeRRETishS8EdoEF9" />
                                        <div
                                            class="absolute bottom-2 left-2 bg-ridge-deep/75 px-2 py-0.5 rounded text-summit-white font-label-sm text-label-sm">
                                            Cho La Glacial Pass
                                        </div>
                                    </div>
                                    <div class="h-1/2 rounded-xl overflow-hidden shadow-md relative group">
                                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            data-alt="Everest Base Camp colorful yellow trek tents pitched on rocky Khumbu Glacier with massive seracs and ice pinnacles looming in background"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCK4uDIdZsdTjdxOuKwLRVtlM45dtFab_Uj0dpyR1Qx3USWrX-tPKmTzh5D32NqdDfW-m4OGyIl6tldnKZrf8mApaIXRM1tAbKiPPnevHtVCMF86C22eUAf3gg1Ti-gAr-adVdho5r94sPvqaJcEUd7Gi7Hk4tsXWj7rwTRgEjsLBM-gJ5-rl4q-SONl7STJhvGaX5SbtSGQ2vOx4JjvZQl7dT1NU78SRfg8vxU-g8ie3WgbZhRjBz6" />
                                        <div
                                            class="absolute bottom-2 left-2 bg-ridge-deep/75 px-2 py-0.5 rounded text-summit-white font-label-sm text-label-sm">
                                            Khumbu Icefall Base
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sticky Quick Booking Matrix -->
                        <div
                            class="lg:col-span-4 bg-surface-container-low rounded-xl p-space-lg shadow-md space-y-space-md">
                            <div class="flex items-baseline justify-between">
                                <div>
                                    <span class="font-body-sm text-body-sm text-tertiary block">All-Inclusive Standard
                                        Rate</span>
                                    <span
                                        class="font-headline-lg text-headline-lg text-on-surface font-bold">$1,750</span>
                                    <span class="font-body-sm text-body-sm text-tertiary"> USD / Person</span>
                                </div>
                                <span
                                    class="bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption px-space-xs py-1 rounded font-bold uppercase">
                                    Guaranteed Run
                                </span>
                            </div>
                            <div class="space-y-space-xs pt-space-xs">
                                <label
                                    class="font-label-sm text-label-sm text-on-surface-variant uppercase font-semibold">Select
                                    Fixed Departure Date</label>
                                <select
                                    class="w-full bg-surface-container-lowest text-on-surface font-body-md text-body-md p-space-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-primary shadow-sm cursor-pointer"
                                    id="departure-select">
                                    <option value="apr-04">Apr 04 – Apr 19, 2025 (4 seats left)</option>
                                    <option value="apr-18">Apr 18 – May 03, 2025 (2 seats left)</option>
                                    <option value="may-02">May 02 – May 17, 2025 (6 seats left)</option>
                                    <option value="oct-05">Oct 05 – Oct 20, 2025 (Available)</option>
                                    <option value="oct-19">Oct 19 – Nov 03, 2025 (Available)</option>
                                </select>
                            </div>
                            <div
                                class="bg-surface-container-lowest p-space-sm rounded-lg space-y-space-2xs text-body-sm text-tertiary">
                                <div class="flex items-center justify-between">
                                    <span>Deposit Requirement:</span>
                                    <span class="font-semibold text-on-surface">20% ($350 USD)</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Group Size Cap:</span>
                                    <span class="font-semibold text-on-surface">Max 8 Trekkers</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Heli-Evac Coverage:</span>
                                    <span class="text-primary font-medium flex items-center gap-1">
                                        <x-lucide-shield-check class="size-[15px]" /> Mandatory / Monitored
                                    </span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-space-xs pt-space-2xs">
                                <button
                                    class="w-full py-space-sm px-space-md bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider rounded-lg shadow-sm transition-all text-center">
                                    Reserve Your Place
                                </button>
                                <button
                                    class="w-full py-space-sm px-space-md bg-surface-container-highest hover:bg-mist-slate text-on-surface font-label-md text-label-md font-bold uppercase tracking-wider rounded-lg transition-colors text-center">
                                    Request Private / Custom Date
                                </button>
                                <a class="w-full flex items-center justify-center gap-space-2xs py-space-xs text-on-surface-variant hover:text-primary font-label-sm text-label-sm font-semibold transition-colors"
                                    href="https://wa.me/97714700000" rel="noopener noreferrer" target="_blank">
                                    <x-lucide-message-circle class="size-[18px]" />
                                    Talk to Khumbu Operations on WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Quick Info Metric Bar -->
            <section class="w-full bg-surface-container py-space-md px-gutter-mobile lg:px-gutter-desktop">
                <div
                    class="max-w-max-content-width mx-auto grid grid-cols-2 md:grid-cols-5 gap-space-md text-on-surface">
                    <div class="flex items-center gap-space-xs">
                        <x-lucide-timer class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">Trek Duration
                            </div>
                            <div class="font-label-md text-label-md font-bold">16 Days High Loop</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-space-xs">
                        <x-lucide-mountain class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">Maximum Altitude
                            </div>
                            <div class="font-label-md text-label-md font-bold">5,545m (Kala Patthar)</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-space-xs">
                        <x-lucide-plane-takeoff class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">Start &amp; End
                                Point</div>
                            <div class="font-label-md text-label-md font-bold">Lukla (Tenzing-Hillary)</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-space-xs">
                        <x-lucide-users class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">Support Ratio
                            </div>
                            <div class="font-label-md text-label-md font-bold">1 Guide:4 &amp; 1 Porter:2</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-space-xs col-span-2 md:col-span-1">
                        <x-lucide-sun class="text-primary size-[28px]" />
                        <div>
                            <div class="font-badge-caption text-badge-caption text-tertiary uppercase">Prime Seasons
                            </div>
                            <div class="font-label-md text-label-md font-bold">Mar–May &amp; Oct–Dec</div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Elevation Profile & Route Architecture -->
            <section class="w-full bg-surface-container-lowest py-space-2xl px-gutter-mobile lg:px-gutter-desktop">
                <div class="max-w-max-content-width mx-auto space-y-space-lg">
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-sm">
                        <div>
                            <span
                                class="font-badge-caption text-badge-caption text-primary uppercase font-bold tracking-widest block">Topographic
                                Cross-Section</span>
                            <h2 class="font-headline-md text-headline-md text-on-surface uppercase">Elevation &amp;
                                Acclimatization Curve</h2>
                        </div>
                        <div class="flex items-center gap-space-md text-body-sm text-tertiary">
                            <span class="flex items-center gap-1.5"><span
                                    class="w-3 h-3 rounded-full bg-primary"></span> Acclimatization Checkpoints</span>
                            <span class="flex items-center gap-1.5"><span
                                    class="w-3 h-3 rounded-full bg-tertiary"></span> Technical Glacial Pass</span>
                        </div>
                    </div>
                    <!-- Custom SVG Chart Container -->
                    <div class="bg-surface-container-low rounded-xl p-space-md md:p-space-lg shadow-sm">
                        <div class="w-full overflow-x-auto">
                            <div class="min-w-[760px] relative">
                                <svg class="w-full h-64 overflow-visible" fill="none" viewbox="0 0 900 260"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <lineargradient id="elevationGrad" x1="0%" x2="0%" y1="0%" y2="100%">
                                            <stop offset="0%" stop-color="#f6ba1a" stop-opacity="0.45"></stop>
                                            <stop offset="100%" stop-color="#f6ba1a" stop-opacity="0.0"></stop>
                                        </lineargradient>
                                    </defs>
                                    <!-- Grid Horizontal Guide Lines -->
                                    <line stroke="#d2dce4" stroke-dasharray="4 4" stroke-width="1" x1="50" x2="870"
                                        y1="30" y2="30"></line>
                                    <text class="text-[11px] font-mono" fill="#4d6072" x="15" y="34">5,500m</text>
                                    <line stroke="#d2dce4" stroke-dasharray="4 4" stroke-width="1" x1="50" x2="870"
                                        y1="80" y2="80"></line>
                                    <text class="text-[11px] font-mono" fill="#4d6072" x="15" y="84">4,800m</text>
                                    <line stroke="#d2dce4" stroke-dasharray="4 4" stroke-width="1" x1="50" x2="870"
                                        y1="135" y2="135"></line>
                                    <text class="text-[11px] font-mono" fill="#4d6072" x="15" y="139">4,000m</text>
                                    <line stroke="#d2dce4" stroke-dasharray="4 4" stroke-width="1" x1="50" x2="870"
                                        y1="190" y2="190"></line>
                                    <text class="text-[11px] font-mono" fill="#4d6072" x="15" y="194">3,000m</text>
                                    <!-- Elevation Path Fill -->
                                    <path
                                        d="M 60 200 L 130 220 L 210 170 L 290 145 L 360 120 L 440 85 L 500 48 L 570 38 L 640 40 L 720 30 L 790 120 L 860 200 L 860 250 L 60 250 Z"
                                        fill="url(#elevationGrad)"></path>
                                    <!-- Elevation Path Stroke -->
                                    <path
                                        d="M 60 200 L 130 220 L 210 170 L 290 145 L 360 120 L 440 85 L 500 48 L 570 38 L 640 40 L 720 30 L 790 120 L 860 200"
                                        stroke="#795900" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="3"></path>
                                    <!-- Data Nodes -->
                                    <!-- Lukla -->
                                    <circle cx="60" cy="200" fill="#795900" r="4"></circle>
                                    <text class="text-[11px] font-bold" fill="#121d26" text-anchor="middle" x="60"
                                        y="240">Lukla</text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="60"
                                        y="252">2,846m</text>
                                    <!-- Namche -->
                                    <circle cx="210" cy="170" fill="#f6ba1a" r="5" stroke="#795900" stroke-width="2">
                                    </circle>
                                    <text class="text-[11px] font-bold" fill="#121d26" text-anchor="middle" x="210"
                                        y="240">Namche</text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="210"
                                        y="252">3,440m</text>
                                    <!-- Machhermo -->
                                    <circle cx="360" cy="120" fill="#795900" r="4"></circle>
                                    <text class="text-[11px] font-bold" fill="#121d26" text-anchor="middle" x="360"
                                        y="240">Machhermo</text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="360"
                                        y="252">4,470m</text>
                                    <!-- Gokyo Lakes -->
                                    <circle cx="440" cy="85" fill="#f6ba1a" r="5" stroke="#795900" stroke-width="2">
                                    </circle>
                                    <text class="text-[11px] font-bold" fill="#121d26" text-anchor="middle" x="440"
                                        y="240">Gokyo Ri</text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="440"
                                        y="252">5,357m</text>
                                    <!-- Cho La Pass -->
                                    <circle cx="570" cy="38" fill="#0F1821" r="6" stroke="#f6ba1a" stroke-width="2">
                                    </circle>
                                    <text class="text-[11px] font-bold" fill="#ba1a1a" text-anchor="middle" x="570"
                                        y="20">Cho La Pass</text>
                                    <text class="text-[11px] font-bold" fill="#121d26" text-anchor="middle" x="570"
                                        y="240">Pass Destination</text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="570"
                                        y="252">5,420m</text>
                                    <!-- Everest Base Camp -->
                                    <circle cx="640" cy="40" fill="#795900" r="5"></circle>
                                    <text class="text-[11px] font-bold" fill="#121d26" text-anchor="middle" x="640"
                                        y="240">EBC</text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="640"
                                        y="252">5,364m</text>
                                    <!-- Kala Patthar -->
                                    <circle cx="720" cy="30" fill="#f6ba1a" r="6" stroke="#795900" stroke-width="2">
                                    </circle>
                                    <text class="text-[11px] font-bold" fill="#795900" text-anchor="middle" x="720"
                                        y="16">Pass High</text>
                                    <text class="text-[11px] font-bold" fill="#121d26" text-anchor="middle" x="720"
                                        y="240">Kala Patthar</text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="720"
                                        y="252">5,545m</text>
                                    <!-- Return Lukla -->
                                    <circle cx="860" cy="200" fill="#795900" r="4"></circle>
                                    <text class="text-[11px] font-bold" fill="#121d26" text-anchor="middle" x="860"
                                        y="240">Lukla Flight</text>
                                    <text class="text-[10px]" fill="#4d6072" text-anchor="middle" x="860"
                                        y="252">2,846m</text>
                                </svg>
                            </div>
                        </div>
                        <div
                            class="mt-space-md p-space-sm bg-surface-container-lowest rounded flex items-center justify-between flex-wrap gap-space-xs text-body-sm text-tertiary">
                            <span class="flex items-center gap-1">
                                <x-lucide-briefcase-medical class="text-primary size-[18px]" />
                                Daily Morning &amp; Evening SpO2 / Pulse Saturation Logs required for all team members.
                            </span>
                            <span class="font-mono text-on-surface font-semibold">Max Ascend Gradient: +600m / day
                                (safe acclimatization)</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Detailed Day-by-Day Timeline / Accordion -->
            <section class="w-full bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop">
                <div class="max-w-max-content-width mx-auto">
                    <div class="max-w-2xl mb-space-xl">
                        <span
                            class="font-badge-caption text-badge-caption text-primary uppercase font-bold tracking-widest block">Trek
                            Milestones</span>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface uppercase">The 16-Day High Circuit
                            Itinerary</h2>
                        <p class="font-body-md text-body-md text-tertiary pt-space-2xs">
                            Built with an acclimatization buffer day at Namche Bazaar and contingency weather hours over
                            the Cho La Glacier.
                        </p>
                    </div>
                    <div class="space-y-space-md">
                        @forelse($trek->features as $index => $feature)
                            <!-- Day {{ $index + 1 }} -->
                            <div class="flex gap-space-md group">
                                <div class="flex flex-col items-center mt-2">
                                    <div
                                        class="w-10 h-10 rounded-full bg-surface-container border-2 border-primary text-primary flex items-center justify-center font-bold text-label-md transition-colors group-hover:bg-primary group-hover:text-summit-white">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </div>
                                    @if(!$loop->last)
                                        <div
                                            class="w-0.5 h-full bg-border-subtle mt-2 group-hover:bg-primary/30 transition-colors">
                                        </div>
                                    @endif
                                </div>
                                <div
                                    class="bg-surface-container-lowest rounded-xl p-space-md border border-border-subtle hover:border-primary/50 transition-all flex-1 shadow-sm hover:shadow-md">
                                    <div
                                        class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm pb-space-sm border-b border-border-subtle mb-space-sm">
                                        <div>
                                            <h3 class="font-headline-sm text-headline-sm text-on-surface">
                                                {{ $feature->title }}</h3>
                                            <span
                                                class="font-badge-caption text-badge-caption text-tertiary uppercase font-bold">{{ $feature->day_label ?? 'Day ' . ($index + 1) }}</span>
                                        </div>
                                        <div
                                            class="flex items-center gap-space-sm text-label-sm text-tertiary bg-surface-container px-space-sm py-space-2xs rounded-lg">
                                            <span class="flex items-center gap-1" title="Max Altitude"><x-lucide-mountain
                                                    class="size-4" /> {{ number_format((float) $feature->altitude) }}m</span>
                                            <span class="text-border-subtle">|</span>
                                            <span class="flex items-center gap-1" title="Trekking Distance"><x-lucide-map
                                                    class="size-4" /> {{ $feature->distance }}</span>
                                            <span class="text-border-subtle">|</span>
                                            <span class="flex items-center gap-1" title="Walking Hours"><x-lucide-clock
                                                    class="size-4" /> {{ $feature->walking_time }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="font-body-md text-body-md text-on-surface-variant mb-space-md leading-relaxed prose prose-sm max-w-none">
                                        {!! $feature->description !!}
                                    </div>
                                    <div
                                        class="bg-surface-container rounded-lg p-space-sm flex flex-wrap gap-space-md text-label-sm">
                                        <div class="flex items-center gap-2 text-on-surface">
                                            <x-lucide-home class="size-[16px] text-tertiary" /> <span
                                                class="font-semibold">Stay:</span>
                                            {{ $feature->accommodation ?? 'Tea House' }}
                                        </div>
                                        <div class="flex items-center gap-2 text-on-surface">
                                            <x-lucide-utensils class="size-[16px] text-tertiary" /> <span
                                                class="font-semibold">Meals:</span> {{ $feature->meals ?? 'B, L, D' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-tertiary text-center p-space-md">Detailed itinerary is not available yet.</p>
                        @endforelse
                    </div>
                </div>
        </div>
        </section>
        <!-- Side-by-Side Inclusions & Exclusions -->
        <section class="w-full bg-surface-container-lowest py-space-3xl px-gutter-mobile lg:px-gutter-desktop">
            <div class="max-w-max-content-width mx-auto">
                <div class="text-center max-w-xl mx-auto mb-space-2xl">
                    <span
                        class="font-badge-caption text-badge-caption text-primary uppercase font-bold tracking-widest block">Transparent
                        Operations</span>
                    <h2 class="font-headline-md text-headline-md text-on-surface uppercase">Trek Inclusions
                        &amp; Logistics</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-space-xl">
                    <!-- Inclusions Box -->
                    <div class="bg-surface-container-low rounded-xl p-space-xl shadow-sm space-y-space-md">
                        <div class="flex items-center gap-space-xs text-on-surface">
                            <x-lucide-circle-check class="text-primary size-[28px]" />
                            <h3 class="font-headline-sm text-headline-sm uppercase">What Is Fully Covered</h3>
                        </div>
                        <div
                            class="prose prose-sm max-w-none prose-li:text-tertiary prose-p:text-tertiary text-tertiary">
                            {!! $trek->inclusions !!}</div>
                    </div>
                    <!-- Exclusions Box -->
                    <div class="bg-surface-container rounded-xl p-space-xl shadow-sm space-y-space-md">
                        <div class="flex items-center gap-space-xs text-on-surface">
                            <x-lucide-x class="text-tertiary size-[28px]" />
                            <h3 class="font-headline-sm text-headline-sm uppercase">What Trekkers Cover</h3>
                        </div>
                        <div
                            class="prose prose-sm max-w-none prose-li:text-tertiary prose-p:text-tertiary text-tertiary">
                            {!! $trek->exclusions !!}</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Lead Trek Guide Profile Card (using provided image) -->
        <section class="w-full bg-surface-container py-space-3xl px-gutter-mobile lg:px-gutter-desktop">
            <div class="max-w-max-content-width mx-auto">
                <div
                    class="bg-surface-container-lowest rounded-2xl p-space-xl shadow-md grid grid-cols-1 md:grid-cols-12 gap-space-xl items-center">
                    <div class="md:col-span-5 flex justify-center">
                        <div class="relative w-full max-w-sm rounded-xl overflow-hidden shadow-lg">
                            <img alt="Lead Mountain Guide Dawa Tenzing Sherpa in alpine yellow down gear against Himalayan snowy destination passes"
                                class="w-full h-96 object-cover object-top"
                                src="https://lh3.googleusercontent.com/aida/AEtjO1VNGjPQgJtSEnKl7zmmZzJYfc2-mrQtN77I7_Zo0q3gEzI2Z5x0Mh_OQMKMAW_76HUyDq5X7_0BBA17p7KTzJJAsZ92x8NEAFMIYhuu2YI2WG_GB5qRh8-NQzDoptJLfnUTvLhVL0LbVJiiEC1xZ4Jade3ASI7IQXptmn7FXMDCwJqwTgJpIhrTXBd-mGGV41b6WSIPuDu-99EFB_CaiwdCGAD62wUmqyPS2OyVhPrAzTY7dUOqpbq5qA" />
                            <div
                                class="absolute bottom-3 left-3 bg-ridge-deep/85 px-3 py-1 rounded text-summit-white font-badge-caption text-badge-caption uppercase">
                                11x Everest • IFMGA Certified
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-7 space-y-space-md">
                        <div class="space-y-space-2xs">
                            <span
                                class="font-badge-caption text-badge-caption text-primary uppercase font-bold tracking-wider">Meet
                                Your Lead Alpine Guide</span>
                            <h3 class="font-headline-lg text-headline-lg text-on-surface uppercase">Dawa Tenzing
                                Sherpa</h3>
                            <p class="font-label-md text-label-md text-tertiary">Senior Sirdar &amp; Wilderness
                                Medical Trek Leader</p>
                        </div>
                        <p class="font-body-md text-body-md text-tertiary">
                            Born and raised in the Khumjung village of Khumbu, Dawa has completed over 35
                            high-altitude crossings of the Cho La and Renjo La passes, along with 11 successful
                            destinations of Mount Everest (Sagarmatha). Certified by both the Nepal Trekking
                            Association and the International Federation of Mountain Guides Associations (IFMGA).
                        </p>
                        <div class="grid grid-cols-3 gap-space-sm pt-space-xs">
                            <div class="bg-surface-container-low p-space-sm rounded-lg text-center">
                                <div class="font-headline-sm text-headline-sm font-bold text-on-surface">35+</div>
                                <div class="font-badge-caption text-badge-caption text-tertiary uppercase">Cho La
                                    Passes</div>
                            </div>
                            <div class="bg-surface-container-low p-space-sm rounded-lg text-center">
                                <div class="font-headline-sm text-headline-sm font-bold text-on-surface">100%</div>
                                <div class="font-badge-caption text-badge-caption text-tertiary uppercase">Safety
                                    Record</div>
                            </div>
                            <div class="bg-surface-container-low p-space-sm rounded-lg text-center">
                                <div class="font-headline-sm text-headline-sm font-bold text-on-surface">WFR</div>
                                <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                    Wilderness First</div>
                            </div>
                        </div>
                        <div class="pt-space-xs flex items-center gap-space-md">
                            <span class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1">
                                <x-lucide-shield-check class="text-primary size-[18px]" />
                                Trained in Gamow Hyperbaric Chambers &amp; High Altitude Cerebral Edema (HACE)
                                mitigation
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Medical Safety & Gear Checklist Bento Grid -->
        <section class="w-full bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop">
            <div class="max-w-max-content-width mx-auto space-y-space-2xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl">
                    <!-- Medical Protocol Section -->
                    <div
                        class="lg:col-span-6 bg-surface-container-lowest rounded-xl p-space-xl shadow-sm space-y-space-md">
                        <div class="flex items-center gap-space-xs">
                            <x-lucide-siren class="text-error size-[28px]" />
                            <div>
                                <h3 class="font-headline-sm text-headline-sm uppercase text-on-surface">Medical
                                    &amp; Satellite Protocol</h3>
                                <p class="font-badge-caption text-badge-caption text-tertiary uppercase">Alpine
                                    Survival Equipment Standard</p>
                            </div>
                        </div>
                        <p class="font-body-md text-body-md text-tertiary">
                            High-altitude trekking requires institutional preparedness. Every Neepa Adventure team
                            carries life-saving hyperbaric assets into the Cho La pass corridor:
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm pt-space-xs">
                            <div class="bg-surface-container-low p-space-md rounded-lg space-y-1">
                                <div
                                    class="flex items-center gap-1 font-label-md text-label-md font-bold text-on-surface">
                                    <x-lucide-heart-pulse class="text-primary size-[20px]" />
                                    Medical Oximetry
                                </div>
                                <p class="font-body-sm text-body-sm text-tertiary">
                                    Morning &amp; evening SpO2 diagnostics logged daily to intercept early onset
                                    AMS.
                                </p>
                            </div>
                            <div class="bg-surface-container-low p-space-md rounded-lg space-y-1">
                                <div
                                    class="flex items-center gap-1 font-label-md text-label-md font-bold text-on-surface">
                                    <x-lucide-wind class="text-primary size-[20px]" />
                                    Emergency O2 System
                                </div>
                                <p class="font-body-sm text-body-sm text-tertiary">
                                    Bottled medical oxygen cylinder &amp; mask carried above Namche Bazaar for
                                    emergency ascent bailouts.
                                </p>
                            </div>
                            <div class="bg-surface-container-low p-space-md rounded-lg space-y-1">
                                <div
                                    class="flex items-center gap-1 font-label-md text-label-md font-bold text-on-surface">
                                    <x-lucide-satellite class="text-primary size-[20px]" />
                                    Garmin inReach SOS
                                </div>
                                <p class="font-body-sm text-body-sm text-tertiary">
                                    Continuous 10-minute satellite breadcrumb ping directly tied to Kathmandu
                                    dispatch.
                                </p>
                            </div>
                            <div class="bg-surface-container-low p-space-md rounded-lg space-y-1">
                                <div
                                    class="flex items-center gap-1 font-label-md text-label-md font-bold text-on-surface">
                                    <x-lucide-helicopter class="text-primary size-[20px]" />
                                    Heli-Rescue Link
                                </div>
                                <p class="font-body-sm text-body-sm text-tertiary">
                                    Immediate charter helicopter extraction protocols coordinated with Simrik /
                                    Altitude Air.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Gear Checklist Section -->
                    <div
                        class="lg:col-span-6 bg-surface-container-lowest rounded-xl p-space-xl shadow-sm space-y-space-md">
                        <div class="flex items-center gap-space-xs">
                            <x-lucide-backpack class="text-primary size-[28px]" />
                            <div>
                                <h3 class="font-headline-sm text-headline-sm uppercase text-on-surface">Mandatory
                                    Packing Essentials</h3>
                                <p class="font-badge-caption text-badge-caption text-tertiary uppercase">Tested for
                                    Cho La Pass Sub-Zero Conditions</p>
                            </div>
                        </div>
                        <div class="space-y-space-xs text-body-sm text-tertiary">
                            <div
                                class="p-space-sm bg-surface-container-low rounded-lg flex items-center justify-between">
                                <div class="flex items-center gap-space-xs">
                                    <x-lucide-footprints class="text-primary size-[20px]" />
                                    <div>
                                        <div class="font-semibold text-on-surface">Microspikes or Flexible Crampons
                                        </div>
                                        <div class="text-tertiary">Required for the glaciated Cho La saddle</div>
                                    </div>
                                </div>
                                <span
                                    class="font-badge-caption text-badge-caption uppercase bg-amber-flare/20 text-on-primary-container px-2 py-0.5 rounded font-bold">Crucial</span>
                            </div>
                            <div
                                class="p-space-sm bg-surface-container-low rounded-lg flex items-center justify-between">
                                <div class="flex items-center gap-space-xs">
                                    <x-lucide-bed class="text-primary size-[20px]" />
                                    <div>
                                        <div class="font-semibold text-on-surface">4-Season Sleeping Bag (-20°C
                                            Rated)</div>
                                        <div class="text-tertiary">High-loft goose down or trek synthetic
                                            fill</div>
                                    </div>
                                </div>
                                <span
                                    class="font-badge-caption text-badge-caption uppercase bg-surface-container-highest text-tertiary px-2 py-0.5 rounded">Provided
                                    / Rent</span>
                            </div>
                            <div
                                class="p-space-sm bg-surface-container-low rounded-lg flex items-center justify-between">
                                <div class="flex items-center gap-space-xs">
                                    <x-lucide-brush-cleaning class="text-primary size-[20px]" />
                                    <div>
                                        <div class="font-semibold text-on-surface">800+ Fill Power Down Parka</div>
                                        <div class="text-tertiary">For Gorak Shep evenings and early morning
                                            destinations</div>
                                    </div>
                                </div>
                                <span
                                    class="font-badge-caption text-badge-caption uppercase bg-surface-container-highest text-tertiary px-2 py-0.5 rounded">Provided
                                    / Rent</span>
                            </div>
                            <div
                                class="p-space-sm bg-surface-container-low rounded-lg flex items-center justify-between">
                                <div class="flex items-center gap-space-xs">
                                    <x-lucide-eye class="text-primary size-[20px]" />
                                    <div>
                                        <div class="font-semibold text-on-surface">Category 3 or 4 Glacier
                                            Sunglasses</div>
                                        <div class="text-tertiary">100% UV block against high-altitude snow
                                            blindness</div>
                                    </div>
                                </div>
                                <span
                                    class="font-badge-caption text-badge-caption uppercase bg-amber-flare/20 text-on-primary-container px-2 py-0.5 rounded font-bold">Crucial</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Route Map Preview Component -->
        <section class="w-full bg-surface-container-lowest py-space-2xl px-gutter-mobile lg:px-gutter-desktop">
            <div class="max-w-max-content-width mx-auto space-y-space-md">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-xs">
                    <div>
                        <span
                            class="font-badge-caption text-badge-caption text-primary uppercase font-bold tracking-widest block">Geographic
                            Tracking</span>
                        <h2 class="font-headline-md text-headline-md text-on-surface uppercase">Khumbu High Circuit
                            Waypoints</h2>
                    </div>
                    <span class="text-body-sm text-tertiary font-mono">Centerpoint: 27.9881° N, 86.9250° E</span>
                </div>
                <div class="w-full h-80 bg-cover bg-center rounded-xl shadow-inner relative flex items-end p-space-md"
                    data-location="Everest Base Camp, Khumbu, Nepal"
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAyHCn2xRyd59q6a9HpjHnszI6fBUVWaBPwT-VLxgVKbM77YFgu2UR0NTB0od3jHwgTTdMOZ53kQ6Oog7m8W9nOKP5YEVlTiy7KhwhejYYHOewqU2Yi-scwEgOxx-Hpj9XnVzT-3--RwEHasR8fczE0VnrhkxG1_zw8USkGgUTvlY4dT7GsAXmhv73TcyCwOhgCG5-bIr9zfhKYPxqjmjdEi6QftoW4c-nla3fKx61i_XtksWe_eGXH');">
                    <div
                        class="bg-ridge-deep/90 backdrop-blur-md p-space-md rounded-lg max-w-md text-summit-white space-y-space-2xs shadow-md">
                        <div
                            class="flex items-center gap-space-2xs text-primary-container font-badge-caption text-badge-caption uppercase font-bold">
                            <x-lucide-map-pin class="size-[16px]" />
                            Interactive Waypoint Active
                        </div>
                        <div class="font-headline-sm text-headline-sm">Gokyo Ri • Cho La • Everest Base Camp</div>
                        <p class="font-body-sm text-body-sm text-mist-slate">
                            Full GPX track coordinates delivered to confirmed trekkers for Garmin Fenix / Apple
                            Watch Ultra offline navigation.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Verified Climber Testimonials -->
        <section class="w-full bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop">
            <div class="max-w-max-content-width mx-auto space-y-space-xl">
                <div class="text-center max-w-xl mx-auto">
                    <span
                        class="font-badge-caption text-badge-caption text-primary uppercase font-bold tracking-widest block">Trek
                        Proof</span>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface uppercase">Dispatches from Past
                        Trekkers</h2>
                    <p class="font-body-md text-body-md text-tertiary pt-space-2xs">Real trek feedback on the
                        Gokyo &amp; Cho La route.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
                    <!-- Review 1 -->
                    <div
                        class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col justify-between space-y-space-md">
                        <div class="space-y-space-xs">
                            <div class="flex items-center gap-1 text-primary">
                                <x-lucide-star class="size-[18px]" />
                                <x-lucide-star class="size-[18px]" />
                                <x-lucide-star class="size-[18px]" />
                                <x-lucide-star class="size-[18px]" />
                                <x-lucide-star class="size-[18px]" />
                            </div>
                            <h4 class="font-headline-sm text-headline-sm text-on-surface">"Cho La Pass was an
                                unforgettable highlight."</h4>
                            <p class="font-body-sm text-body-sm text-tertiary">
                                Doing standard EBC without Gokyo would be a huge miss. Dawa and his Sherpa team
                                guided us over the icy Cho La pass with incredible patience and security. The
                                sunrise from Gokyo Ri seeing four 8,000-meter passes is burned into my mind forever.
                            </p>
                        </div>
                        <div class="pt-space-xs flex items-center gap-space-sm">
                            <div
                                class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center font-bold text-on-surface">
                                MK
                            </div>
                            <div>
                                <div class="font-label-md text-label-md font-bold text-on-surface">Marcus Keller
                                </div>
                                <div class="font-badge-caption text-badge-caption text-tertiary uppercase">Zürich,
                                    Switzerland • Oct 2024</div>
                            </div>
                        </div>
                    </div>
                    <!-- Review 2 -->
                    <div
                        class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col justify-between space-y-space-md">
                        <div class="space-y-space-xs">
                            <div class="flex items-center gap-1 text-primary">
                                <x-lucide-star class="size-[18px]" />
                                <x-lucide-star class="size-[18px]" />
                                <x-lucide-star class="size-[18px]" />
                                <x-lucide-star class="size-[18px]" />
                                <x-lucide-star class="size-[18px]" />
                            </div>
                            <h4 class="font-headline-sm text-headline-sm text-on-surface">"Medical safety standards
                                are world-class."</h4>
                            <p class="font-body-sm text-body-sm text-tertiary">
                                My oxygen saturation dipped at Machhermo, but Dawa adjusted our pacing immediately,
                                checked me twice daily, and made sure I acclimated naturally. Arrived at Everest
                                Base Camp feeling strong and healthy. Extraordinary professionalism.
                            </p>
                        </div>
                        <div class="pt-space-xs flex items-center gap-space-sm">
                            <div
                                class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center font-bold text-on-surface">
                                SL
                            </div>
                            <div>
                                <div class="font-label-md text-label-md font-bold text-on-surface">Sarah Lindqvist
                                </div>
                                <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                    Stockholm, Sweden • Nov 2024</div>
                            </div>
                        </div>
                    </div>
                    <!-- Review 3 -->
                    <div
                        class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col justify-between space-y-space-md">
                        <div class="space-y-space-xs">
                            <div class="flex items-center gap-1 text-primary">
                                <x-lucide-star class="size-[18px]" />
                                <x-lucide-star class="size-[18px]" />
                                <x-lucide-star class="size-[18px]" />
                                <x-lucide-star class="size-[18px]" />
                                <x-lucide-star class="size-[18px]" />
                            </div>
                            <h4 class="font-headline-sm text-headline-sm text-on-surface">"Fair porter wages and
                                top tier mountain food."</h4>
                            <p class="font-body-sm text-body-sm text-tertiary">
                                I chose Neepa Adventure because of their ethical porter treatment charter and it was
                                evident on the trail. The porters were well-outfitted with proper alpine boots and
                                jackets. Meals were warm, abundant, and fresh fruit dessert at 4,900m is real
                                luxury!
                            </p>
                        </div>
                        <div class="pt-space-xs flex items-center gap-space-sm">
                            <div
                                class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center font-bold text-on-surface">
                                AR
                            </div>
                            <div>
                                <div class="font-label-md text-label-md font-bold text-on-surface">Alexander Reed
                                </div>
                                <div class="font-badge-caption text-badge-caption text-tertiary uppercase">
                                    Vancouver, Canada • May 2024</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Bottom Direct CTA Banner -->
        <section
            class="w-full bg-primary-container text-on-primary-fixed py-space-2xl px-gutter-mobile lg:px-gutter-desktop">
            <div
                class="max-w-max-content-width mx-auto flex flex-col lg:flex-row items-center justify-between gap-space-lg text-center lg:text-left">
                <div class="space-y-space-2xs">
                    <span
                        class="font-badge-caption text-badge-caption uppercase font-bold tracking-widest text-on-primary-fixed-variant">Ready
                        for the High Passes?</span>
                    <h2 class="font-headline-lg text-headline-lg font-bold">Secure Your 2025 Everest &amp; Gokyo
                        Permit</h2>
                    <p class="font-body-md text-body-md text-on-primary-fixed-variant max-w-xl">
                        Lukla flight slots and premium teahouse beds are limited by national park authority
                        regulations. Secure your departure date with a $350 deposit.
                    </p>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-space-sm shrink-0">
                    <button
                        class="py-space-md px-space-xl bg-ridge-deep hover:bg-tertiary text-summit-white font-label-md text-label-md font-bold uppercase tracking-wider rounded-lg shadow-md transition-all">
                        Book This Circuit ($1,750)
                    </button>
                    <button
                        class="py-space-md px-space-xl bg-surface-container-lowest hover:bg-mist-slate text-on-surface font-label-md text-label-md font-bold uppercase tracking-wider rounded-lg shadow-sm transition-all">
                        Download PDF Dossier
                    </button>
                </div>
            </div>
        </section>
        </div>
    </main>
    <x-footer />
</x-layouts.app>