<x-layouts.app>
    <x-header />
    <main class="w-full pt-20 bg-surface">
        <div class="flex flex-col w-full">
            <!-- Operational Scrim & Command Hero -->
            <section
                class="relative w-full bg-ridge-deep text-summit-white overflow-hidden py-space-3xl px-gutter-mobile lg:px-gutter-desktop shadow-md">
                <!-- Ambient alpine gradient circles -->
                <div
                    class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-primary-container/10 blur-3xl pointer-events-none">
                </div>
                <div
                    class="absolute bottom-0 -left-20 w-80 h-80 rounded-full bg-secondary-fixed-dim/5 blur-3xl pointer-events-none">
                </div>
                <div class="relative max-w-max-content-width mx-auto flex flex-col gap-space-lg">
                    <!-- Status Pill & Live Dispatch Telemetry -->
                    <div class="flex flex-wrap items-center justify-between gap-space-sm">
                        <div
                            class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-surface-container-lowest/10 backdrop-blur-md shadow-sm">
                            <span class="relative flex h-2.5 w-2.5">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-container opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-primary-container"></span>
                            </span>
                            <span
                                class="font-badge-caption text-badge-caption text-primary-fixed tracking-widest uppercase font-bold">24/7
                                Kathmandu Operations Desk &amp; Dispatch</span>
                        </div>
                        <!-- Telemetry bar -->
                        <div
                            class="flex flex-wrap items-center gap-space-md text-surface-variant font-label-sm text-label-sm">
                            <div class="flex items-center gap-space-2xs">
                                <x-lucide-satellite class="text-primary-container size-[18px]" />
                                <span class="">Garmin inReach Active</span>
                            </div>
                            <span class="text-surface-variant/40">•</span>
                            <div class="flex items-center gap-space-2xs">
                                <x-lucide-tower-control class="text-primary-container size-[18px]" />
                                <span class="">VHF Ch. 16 Monitored</span>
                            </div>
                            <span class="text-surface-variant/40">•</span>
                            <div class="flex items-center gap-space-2xs">
                                <x-lucide-siren class="text-amber-flare size-[18px]" />
                                <span class="">Heli-Medevac Desk Standby</span>
                            </div>
                        </div>
                    </div>
                    <!-- Main Headline Block -->
                    <div class="max-w-4xl space-y-space-sm">
                        <h1
                            class="font-display-xl text-headline-lg lg:text-display-xl font-bold tracking-tight leading-tight text-summit-white">
                            CONNECT WITH OUR <span class="text-primary-container">BASECAMP</span> HEADQUARTERS
                        </h1>
                        <p class="font-body-lg text-body-lg text-mist-slate font-normal leading-relaxed max-w-3xl">
                            Whether planning a high-altitude traverse, seeking technical climbing advice, inquiring
                            about private club expeditions, or requiring 24/7 satellite dispatch assistance, our
                            Kathmandu and Khumbu operations team is at your service.
                        </p>
                    </div>
                    <!-- Quick Action Jump Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-space-sm pt-space-xs">
                        <a class="flex items-center gap-space-xs p-space-sm rounded-lg bg-surface-container-lowest/5 hover:bg-surface-container-lowest/15 transition-all shadow-sm"
                            href="#expedition-form">
                            <x-lucide-calendar-plus class="text-primary-container size-[20px]" />
                            <div class="flex flex-col min-w-0">
                                <span class="font-label-md text-label-md font-bold text-summit-white truncate">Trip
                                    Inquiry</span>
                                <span class="font-body-sm text-body-sm text-tertiary-fixed-dim">Custom Proposals</span>
                            </div>
                        </a>
                        <a class="flex items-center gap-space-xs p-space-sm rounded-lg bg-surface-container-lowest/5 hover:bg-surface-container-lowest/15 transition-all shadow-sm"
                            href="#dispatch-card">
                            <x-lucide-phone class="text-primary-container size-[20px]" />
                            <div class="flex flex-col min-w-0">
                                <span class="font-label-md text-label-md font-bold text-summit-white truncate">HQ
                                    Hotline</span>
                                <span
                                    class="font-body-sm text-body-sm text-tertiary-fixed-dim">{{ $contact?->phone ?? 'Contact us' }}</span>
                            </div>
                        </a>
                        <a class="flex items-center gap-space-xs p-space-sm rounded-lg bg-surface-container-lowest/5 hover:bg-surface-container-lowest/15 transition-all shadow-sm"
                            href="#khumbu-field-office">
                            <x-lucide-mountain-snow class="text-primary-container size-[20px]" />
                            <div class="flex flex-col min-w-0">
                                <span class="font-label-md text-label-md font-bold text-summit-white truncate">Namche
                                    3,440m</span>
                                <span class="font-body-sm text-body-sm text-tertiary-fixed-dim">Solukhumbu Camp</span>
                            </div>
                        </a>
                        <a class="flex items-center gap-space-xs p-space-sm rounded-lg bg-error-container/20 hover:bg-error-container/30 transition-all shadow-sm"
                            href="#emergency-section">
                            <x-lucide-rotate-cw class="text-primary-fixed-dim size-[20px]" />
                            <div class="flex flex-col min-w-0">
                                <span class="font-label-md text-label-md font-bold text-primary-fixed truncate">Search
                                    &amp; Rescue</span>
                                <span class="font-body-sm text-body-sm text-surface-variant">Instant Heli Link</span>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <!-- Two-Column Operations & Consultation Hub -->
            <section class="w-full max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop py-space-3xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-start">
                    <!-- Column 1: Custom Expedition Briefing & Inquiry Form -->
                    <div class="lg:col-span-7 flex flex-col gap-space-lg bg-surface-container-lowest p-space-lg sm:p-space-xl rounded-xl shadow-md"
                        id="expedition-form">
                        <div class="flex flex-col gap-space-2xs">
                            <div class="flex items-center justify-between">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary uppercase tracking-widest font-bold">Confidential
                                    Consultation</span>
                                <span
                                    class="inline-flex items-center gap-1 font-label-sm text-label-sm text-primary font-semibold bg-primary-container/20 px-space-xs py-space-2xs rounded">
                                    <x-lucide-timer class="size-[14px]" /> 4-Hour Response SLA
                                </span>
                            </div>
                            <h2 class="font-headline-lg text-headline-md sm:text-headline-lg font-bold text-on-surface">
                                Expedition Inquiry &amp; Custom Route Briefing</h2>
                            <p class="font-body-md text-body-md text-tertiary">
                                Submit your alpine profile and itinerary targets. Our licensed Expedition Directors
                                calculate logistics, guide ratios, acclimatization profiles, and permit windows.
                            </p>
                        </div>
                        <!-- Expedition Type Pill Selector -->
                        <div class="flex flex-col gap-space-xs">
                            <label
                                class="font-label-sm text-label-sm uppercase tracking-wider font-bold text-on-surface">Trip
                                Categorization</label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-space-xs" id="tripTypeTabs">
                                <button
                                    class="trip-pill active-pill py-space-xs px-space-sm rounded-lg font-label-sm text-label-sm font-semibold transition-all text-center bg-primary-container text-on-primary-fixed shadow-sm"
                                    type="button">
                                    Trekking Circuit
                                </button>
                                <button
                                    class="trip-pill py-space-xs px-space-sm rounded-lg font-label-sm text-label-sm font-semibold transition-all text-center bg-surface-container-high text-on-surface hover:bg-surface-container"
                                    type="button">
                                    Peak Climbing
                                </button>
                                <button
                                    class="trip-pill py-space-xs px-space-sm rounded-lg font-label-sm text-label-sm font-semibold transition-all text-center bg-surface-container-high text-on-surface hover:bg-surface-container"
                                    type="button">
                                    Alpine Club
                                </button>
                                <button
                                    class="trip-pill py-space-xs px-space-sm rounded-lg font-label-sm text-label-sm font-semibold transition-all text-center bg-surface-container-high text-on-surface hover:bg-surface-container"
                                    type="button">
                                    Tailor-Made
                                </button>
                            </div>
                        </div>
                        <!-- Form Fields Grid -->
                        <form class="flex flex-col gap-space-md"
                            onsubmit="event.preventDefault(); document.getElementById('formSuccessModal').classList.remove('hidden');">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                                <div class="flex flex-col gap-space-2xs">
                                    <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Full
                                        Name *</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-user class="absolute left-space-sm text-tertiary size-[18px]" />
                                        <input
                                            class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-container transition-all"
                                            placeholder="e.g. Dr. Arthur Hansen" required="" type="text">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-space-2xs">
                                    <label
                                        class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Official
                                        Email *</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-mail class="absolute left-space-sm text-tertiary size-[18px]" />
                                        <input
                                            class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-container transition-all"
                                            placeholder="arthur.hansen@expedition.org" required="" type="email">
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                                <div class="flex flex-col gap-space-2xs">
                                    <label
                                        class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Country
                                        of Residence</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-globe class="absolute left-space-sm text-tertiary size-[18px]" />
                                        <input
                                            class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-container transition-all"
                                            placeholder="e.g. Switzerland / USA / UK" type="text">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-space-2xs">
                                    <label
                                        class="font-label-sm text-label-sm font-bold text-on-surface uppercase">WhatsApp
                                        / Signal / Phone *</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-message-circle
                                            class="absolute left-space-sm text-tertiary size-[18px]" />
                                        <input
                                            class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-container transition-all"
                                            placeholder="+41 79 123 4567" required="" type="tel">
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                                <div class="flex flex-col gap-space-2xs">
                                    <label
                                        class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Target
                                        Mountain Region</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-mountain class="absolute left-space-sm text-tertiary size-[18px]" />
                                        <select
                                            class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-primary-container transition-all cursor-pointer">
                                            <option>Khumbu &amp; Everest / Gokyo Lakes (5,364m)</option>
                                            <option>Annapurna Sanctuary &amp; Thorong La (5,416m)</option>
                                            <option>Manaslu Circuit &amp; Larkya La (5,106m)</option>
                                            <option>Upper Mustang &amp; Lo Manthang Kingdom</option>
                                            <option>Island Peak / Imja Tse (6,189m Summit)</option>
                                            <option>Mera Peak High Altitude Ascent (6,476m)</option>
                                            <option>Ama Dablam Technical Expedition (6,812m)</option>
                                            <option>Langtang Valley &amp; Gosaikunda Holy Lakes</option>
                                        </select>
                                        <x-lucide-chevron-down
                                            class="absolute right-space-sm text-tertiary pointer-events-none size-[18px]" />
                                    </div>
                                </div>
                                <div class="flex flex-col gap-space-2xs">
                                    <label
                                        class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Estimated
                                        Window &amp; Duration</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-calendar-days
                                            class="absolute left-space-sm text-tertiary size-[18px]" />
                                        <input
                                            class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-container transition-all"
                                            placeholder="e.g. October 2025 (~18 Days)" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                                <div class="flex flex-col gap-space-2xs">
                                    <label
                                        class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Roster
                                        &amp; Group Size</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-users class="absolute left-space-sm text-tertiary size-[18px]" />
                                        <select
                                            class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-primary-container transition-all cursor-pointer">
                                            <option>Solo Alpine Trekker (1:1 Sherpa)</option>
                                            <option>Couple / Pair (2 Pax)</option>
                                            <option>Private Small Party (3 – 5 Pax)</option>
                                            <option>Expedition Team (6 – 10 Pax)</option>
                                            <option>Alpine Club / University Group (10+ Pax)</option>
                                        </select>
                                        <x-lucide-chevron-down
                                            class="absolute right-space-sm text-tertiary pointer-events-none size-[18px]" />
                                    </div>
                                </div>
                                <div class="flex flex-col gap-space-2xs">
                                    <label
                                        class="font-label-sm text-label-sm font-bold text-on-surface uppercase">High-Altitude
                                        Mountaineering Experience</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-footprints
                                            class="absolute left-space-sm text-tertiary size-[18px]" />
                                        <select
                                            class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-primary-container transition-all cursor-pointer">
                                            <option>First time in the Himalaya (Beginner to Altitude)</option>
                                            <option>Experienced up to 4,000m - 5,000m (Kilimanjaro/Alps)</option>
                                            <option>High Peak Ascent completed (6,000m / Mera / Island)</option>
                                            <option>Technical Multi-Pitch / 7,000m+ Veteran</option>
                                        </select>
                                        <x-lucide-chevron-down
                                            class="absolute right-space-sm text-tertiary pointer-events-none size-[18px]" />
                                    </div>
                                </div>
                            </div>
                            <!-- Special Requirements Checkboxes -->
                            <div class="flex flex-col gap-space-xs pt-space-xs">
                                <span class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Logistics
                                    &amp; Field Directives</span>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-xs">
                                    <label
                                        class="flex items-center gap-space-xs p-space-xs rounded bg-surface-container-low/70 hover:bg-surface-container-low cursor-pointer transition-colors">
                                        <input class="w-4 h-4 rounded text-primary focus:ring-primary-container"
                                            type="checkbox">
                                        <span class="font-body-sm text-body-sm text-on-surface">Bespoke Dietary /
                                            High-Calorie Nutrition</span>
                                    </label>
                                    <label
                                        class="flex items-center gap-space-xs p-space-xs rounded bg-surface-container-low/70 hover:bg-surface-container-low cursor-pointer transition-colors">
                                        <input class="w-4 h-4 rounded text-primary focus:ring-primary-container"
                                            type="checkbox">
                                        <span class="font-body-sm text-body-sm text-on-surface">Private Single Room /
                                            Tent Logistics</span>
                                    </label>
                                    <label
                                        class="flex items-center gap-space-xs p-space-xs rounded bg-surface-container-low/70 hover:bg-surface-container-low cursor-pointer transition-colors">
                                        <input class="w-4 h-4 rounded text-primary focus:ring-primary-container"
                                            type="checkbox">
                                        <span class="font-body-sm text-body-sm text-on-surface">Helicopter Lukla /
                                            Basecamp Return Option</span>
                                    </label>
                                    <label
                                        class="flex items-center gap-space-xs p-space-xs rounded bg-surface-container-low/70 hover:bg-surface-container-low cursor-pointer transition-colors">
                                        <input class="w-4 h-4 rounded text-primary focus:ring-primary-container"
                                            type="checkbox">
                                        <span class="font-body-sm text-body-sm text-on-surface">Garmin inReach Rented
                                            Dispatch Unit</span>
                                    </label>
                                </div>
                            </div>
                            <!-- Message Area -->
                            <div class="flex flex-col gap-space-2xs pt-space-xs">
                                <label
                                    class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Expedition
                                    Objectives &amp; Medical Notes</label>
                                <textarea
                                    class="w-full p-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-container transition-all"
                                    placeholder="Detail your fitness background, summit ambitions, preferred gear requirements, or any specific acclimatization pace adjustments needed..."
                                    rows="4"></textarea>
                            </div>
                            <!-- Submit CTA -->
                            <div class="pt-space-sm flex flex-col gap-space-xs">
                                <button
                                    class="w-full py-space-md px-space-xl bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-headline-sm text-headline-sm uppercase tracking-wider font-bold rounded-lg shadow-md transition-all flex items-center justify-center gap-space-xs"
                                    type="submit">
                                    <x-lucide-send class="size-4" />
                                    <span class="">Submit Expedition Brief &amp; Request Itinerary Call</span>
                                </button>
                                <div
                                    class="flex items-center justify-center gap-space-xs text-tertiary font-body-sm text-body-sm text-center">
                                    <x-lucide-shield-check class="size-[16px] text-primary" />
                                    <span class="">Direct review by Certified IFMGA / NMA Mountain Guides • No
                                        obligation quote</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Column 2: Direct Operations Desks, Khumbu Outpost & Emergency Dispatch -->
                    <div class="lg:col-span-5 flex flex-col gap-space-xl">
                        <!-- Urgent Search & Rescue Desk (Safety Red Accent) -->
                        <div class="bg-ridge-deep text-summit-white p-space-lg rounded-xl shadow-xl relative overflow-hidden"
                            id="emergency-section">
                            <div class="absolute top-0 right-0 p-space-sm opacity-10">
                                <x-lucide-heater class="size-[120px] text-error" />
                            </div>
                            <div class="relative flex flex-col gap-space-sm">
                                <div class="flex items-center gap-space-xs">
                                    <span class="h-3 w-3 rounded-full bg-error animate-pulse"></span>
                                    <span
                                        class="font-badge-caption text-badge-caption text-primary-fixed-dim uppercase tracking-widest font-bold">Priority
                                        High Altitude Dispatch</span>
                                </div>
                                <h3
                                    class="font-headline-md text-headline-md font-bold text-summit-white leading-tight">
                                    24/7 Heli-Medevac &amp; SOS Ops</h3>
                                <p class="font-body-sm text-body-sm text-surface-variant">
                                    Immediate satellite coordinate logging and helicopter evacuation clearance covering
                                    Sagarmatha, Annapurna, and Western Nepal zones. Direct link with Himalayan Rescue
                                    Association (HRA).
                                </p>
                                <div
                                    class="bg-surface-container-lowest/10 p-space-md rounded-lg flex flex-col gap-space-2xs">
                                    <span
                                        class="font-label-sm text-label-sm uppercase tracking-wider text-surface-variant font-bold">SAR
                                        Operational Hotline (24/7)</span>
                                    <a class="font-headline-md text-headline-md font-extrabold text-primary-fixed hover:text-amber-flare transition-colors flex items-center gap-space-xs"
                                        href="tel:{{ preg_replace('/[^0-9+]/', '', $contact?->phone ?? '') }}">
                                        <x-lucide-phone class="size-[24px]" />
                                        {{ $contact?->phone ?? 'Contact us' }}
                                    </a>
                                    <div
                                        class="flex items-center gap-space-xs font-body-sm text-body-sm text-surface-variant pt-space-2xs">
                                        <x-lucide-plane-takeoff class="text-primary-container size-[16px]" />
                                        <span class="">Standby: Simrik Air, Dynasty Heli, Altitude Air</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Kathmandu Central Headquarters -->
                        <div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-md flex flex-col gap-space-md"
                            id="dispatch-card">
                            <div class="flex items-start justify-between">
                                <div>
                                    <span
                                        class="font-badge-caption text-badge-caption text-primary font-bold uppercase tracking-wider">Central
                                        HQ &amp; Briefing Lounge</span>
                                    <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Kathmandu
                                        Basecamp</h3>
                                </div>
                                <div
                                    class="w-10 h-10 rounded-full bg-primary-container/20 flex items-center justify-center text-primary">
                                    <x-lucide-building-2 class="size-4" />
                                </div>
                            </div>
                            <div class="flex flex-col gap-space-sm font-body-md text-body-md text-tertiary">
                                <div class="flex items-start gap-space-sm">
                                    <x-lucide-map-pin class="text-primary size-[20px] flex-shrink-0 mt-0.5" />
                                    <div class="">
                                        <strong class="text-on-surface font-medium block">Office Address</strong>
                                        {{ $contact?->address ?? 'Contact us for our office address' }}
                                        @if ($contact?->google_maps_url)
                                            <a class="text-body-sm text-primary hover:text-on-surface block pt-0.5"
                                                href="{{ $contact->google_maps_url }}" target="_blank"
                                                rel="noopener noreferrer">View location details</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex items-start gap-space-sm">
                                    <x-lucide-phone-call class="text-primary size-[20px] flex-shrink-0 mt-0.5" />
                                    <div>
                                        <strong class="text-on-surface font-medium block">Telephone Line</strong>
                                        <a class=""
                                            href="tel:{{ preg_replace('/[^0-9+]/', '', $contact?->phone ?? '') }}">{{ $contact?->phone ?? 'Contact us' }}</a>
                                    </div>
                                </div>
                                <div class="flex items-start gap-space-sm">
                                    <x-lucide-mail class="text-primary size-[20px] flex-shrink-0 mt-0.5" />
                                    <div><strong class="text-on-surface font-medium block">Direct Email
                                            Inquiries</strong><a
                                            class="text-on-surface hover:text-primary transition-colors block"
                                            href="mailto:{{ $contact?->email }}">{{ $contact?->email ?? 'Email us' }}</a>
                                    </div>
                                </div>
                                <div class="flex items-start gap-space-sm">
                                    <x-lucide-clock-3 class="text-primary size-[20px] flex-shrink-0 mt-0.5" />
                                    <div class="">
                                        <strong class="text-on-surface font-medium block">Operations Hours
                                            (NPT)</strong>
                                        Sunday – Friday: 08:00 – 19:00 NPT<br>
                                        Saturday: Standby Duty Officer on site
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Khumbu Field Logistics Basecamp -->
                        <div class="bg-surface-container-low p-space-lg rounded-xl shadow-sm flex flex-col gap-space-sm"
                            id="khumbu-field-office">
                            <div class="flex items-start justify-between">
                                <div>
                                    <span
                                        class="font-badge-caption text-badge-caption text-primary font-bold uppercase tracking-wider">Field
                                        Camp • 3,440m</span>
                                    <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Namche
                                        Bazaar Outpost</h3>
                                </div>
                                <div
                                    class="w-9 h-9 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface">
                                    <x-lucide-mountain class="size-4" />
                                </div>
                            </div>
                            <p class="font-body-sm text-body-sm text-tertiary">
                                Our permanent staging depot for Khumbu Icefall expeditions, Gokyo Ri acclimatization,
                                and high-altitude porter equipment staging.
                            </p>
                            <div
                                class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm pt-space-xs font-body-sm text-body-sm text-on-surface-variant">
                                <div class="p-space-xs bg-surface-container-lowest rounded shadow-xs">
                                    <span class="font-label-sm text-label-sm font-bold text-on-surface block">Field
                                        Director</span>
                                    Pasang Lhamu Sherpa (UIAGM / IFMGA)
                                </div>
                                <div class="p-space-xs bg-surface-container-lowest rounded shadow-xs">
                                    <span class="font-label-sm text-label-sm font-bold text-on-surface block">Satellite
                                        Radio Link</span>
                                    VHF Frequency: 156.800 MHz (Ch. 16)
                                </div>
                            </div>
                        </div>
                        <!-- WhatsApp Instant Planner Widget Card -->
                        <div
                            class="p-space-md rounded-xl bg-surface-container-highest shadow-sm flex items-center justify-between gap-space-md">
                            <div class="flex items-center gap-space-sm">
                                <div
                                    class="w-12 h-12 rounded-lg bg-surface-container-lowest flex items-center justify-center flex-shrink-0 shadow-sm">
                                    <x-lucide-messages-square class="text-primary size-[28px]" />
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-label-md text-label-md font-bold text-on-surface">Instant
                                        WhatsApp Advisory</span>
                                    <span class="font-body-sm text-body-sm text-tertiary">Chat direct with our Trek
                                        Logistics Officer</span>
                                </div>
                            </div>
                            <a class="px-space-md py-space-xs bg-primary hover:bg-on-primary-container text-on-primary rounded-lg font-label-md text-label-md font-semibold transition-colors flex-shrink-0 shadow-sm"
                                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact?->whatsapp ?? '') }}"
                                rel="noopener noreferrer" target="_blank">
                                Chat Now
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Map & Arrival Protocol Section -->
            <section
                class="w-full bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop shadow-inner">
                <div class="max-w-max-content-width mx-auto flex flex-col gap-space-2xl">
                    <!-- Section Header -->
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md">
                        <div>
                            <span
                                class="font-badge-caption text-badge-caption text-primary uppercase tracking-widest font-bold">{{ $contact?->company_name ?? 'Company' }}
                                Location</span>
                            <h2
                                class="font-headline-lg text-headline-md sm:text-headline-lg font-bold text-on-surface">
                                Visit Our Briefing Center in Thamel</h2>
                        </div>
                        <div
                            class="flex items-center gap-space-xs text-tertiary font-label-sm text-label-sm bg-surface-container-lowest px-space-md py-space-xs rounded-lg shadow-sm">
                            <x-lucide-compass class="text-primary size-[18px]" />
                            <span class="">Lat: 27.7154° N • Long: 85.3113° E • Elev: 1,400m</span>
                        </div>
                    </div>
                    <!-- Map Display & Nearby Landmarks Split -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
                        <!-- Interactive Static Map Pipeline Container -->
                        <div
                            class="lg:col-span-7 rounded-xl overflow-hidden shadow-lg relative min-h-[380px] bg-surface-dim">
                            <div class="w-full h-full min-h-[380px] bg-cover bg-center"
                                data-location="{{ $contact?->address }}"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCSCPYK7toj5rVlPhvD-ROvULLcEvxI9Hv-EUzT_6onzr7ZHTWzpDaWTinbZ9jxfyRaCkL9tbr1_USs0zIYfLh-8Ji0jgBdfg-a8pgoGxwLK3T7fT2x3oPQID-UfMhJn1h_dIOgPWyrIpPnFJ-cilD22IbCoNKTXgyep1OTOtC-NtmsuGTZSAl7B9OqT_G4vRBTqpmHa5pWbjiUI8MDMVYeL1qP13NqB0xZKXLw3VCHxLqeJc1ajRxB')">
                            </div>
                            <!-- Overlay Pin Marker Card -->
                            <div
                                class="absolute bottom-space-md left-space-md bg-surface-container-lowest/95 backdrop-blur-md p-space-sm rounded-lg shadow-md flex items-center gap-space-sm max-w-xs">
                                <div
                                    class="w-8 h-8 rounded-full bg-primary-container flex items-center justify-center flex-shrink-0 text-on-primary-fixed">
                                    <x-lucide-map-pin class="size-[18px]" />
                                </div>
                                <div class="flex flex-col">
                                    <span
                                        class="font-label-sm text-label-sm font-bold text-on-surface">{{ $contact?->company_name ?? 'Company HQ' }}</span>
                                    <span
                                        class="font-body-sm text-body-sm text-tertiary truncate">{{ $contact?->address ?? 'Office location' }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Visual Arrival Protocol: Step-by-Step Clinic -->
                        <div class="lg:col-span-5 flex flex-col gap-space-md">
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">What to Expect When
                                Visiting</h3>
                            <p class="font-body-md text-body-md text-tertiary">
                                Every climber and trekker undergoes our comprehensive pre-departure logistics process
                                prior to their domestic flight to Lukla or mountain trailheads.
                            </p>
                            <div class="space-y-space-sm pt-space-xs">
                                <div
                                    class="flex items-start gap-space-sm p-space-sm rounded-lg bg-surface-container-lowest shadow-sm">
                                    <div
                                        class="w-7 h-7 rounded-full bg-primary-container text-on-primary-fixed font-label-md text-label-md font-bold flex items-center justify-center flex-shrink-0">
                                        1
                                    </div>
                                    <div>
                                        <span class="font-label-md text-label-md font-bold text-on-surface block">Khata
                                            Scarf Welcome &amp; Espresso</span>
                                        <span class="font-body-sm text-body-sm text-tertiary">Traditional Buddhist
                                            blessing by our lead Sirdars and detailed expedition route folder
                                            presentation.</span>
                                    </div>
                                </div>
                                <div
                                    class="flex items-start gap-space-sm p-space-sm rounded-lg bg-surface-container-lowest shadow-sm">
                                    <div
                                        class="w-7 h-7 rounded-full bg-primary-container text-on-primary-fixed font-label-md text-label-md font-bold flex items-center justify-center flex-shrink-0">
                                        2
                                    </div>
                                    <div>
                                        <span
                                            class="font-label-md text-label-md font-bold text-on-surface block">Pre-Trek
                                            Gear &amp; Boot Inspection</span>
                                        <span class="font-body-sm text-body-sm text-tertiary">Crampon, harness, down
                                            parka, and sleep system review with equipment adjustment and rental
                                            issuance.</span>
                                    </div>
                                </div>
                                <div
                                    class="flex items-start gap-space-sm p-space-sm rounded-lg bg-surface-container-lowest shadow-sm">
                                    <div
                                        class="w-7 h-7 rounded-full bg-primary-container text-on-primary-fixed font-label-md text-label-md font-bold flex items-center justify-center flex-shrink-0">
                                        3
                                    </div>
                                    <div>
                                        <span
                                            class="font-label-md text-label-md font-bold text-on-surface block">Permit
                                            Verification &amp; TIMS Biometrics</span>
                                        <span class="font-body-sm text-body-sm text-tertiary">Final processing of
                                            Sagarmatha / Annapurna / Manaslu restricted zone permits with Government
                                            liaison.</span>
                                    </div>
                                </div>
                                <div
                                    class="flex items-start gap-space-sm p-space-sm rounded-lg bg-surface-container-lowest shadow-sm">
                                    <div
                                        class="w-7 h-7 rounded-full bg-primary-container text-on-primary-fixed font-label-md text-label-md font-bold flex items-center justify-center flex-shrink-0">
                                        4
                                    </div>
                                    <div>
                                        <span
                                            class="font-label-md text-label-md font-bold text-on-surface block">Duffel
                                            Weight Weigh-In &amp; Medical Log</span>
                                        <span class="font-body-sm text-body-sm text-tertiary">Precise 15kg duffel limit
                                            calibration for Lukla Twin Otter STOL flights and baseline oxygen saturation
                                            log.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- High-Altitude Operations FAQ Accordion -->
            <section class="w-full max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop py-space-3xl">
                <div class="flex flex-col items-center text-center gap-space-xs mb-space-2xl max-w-2xl mx-auto">
                    <span
                        class="font-badge-caption text-badge-caption text-primary uppercase tracking-widest font-bold">Field
                        Readiness Inquiries</span>
                    <h2 class="font-headline-lg text-headline-md sm:text-headline-lg font-bold text-on-surface">
                        Frequently Asked Questions</h2>
                    <p class="font-body-md text-body-md text-tertiary">
                        Essential considerations regarding high-altitude permits, insurance policies, and field
                        execution.
                    </p>
                </div>
                <div class="max-w-3xl mx-auto space-y-space-sm" id="faqAccordion">
                    <!-- Item 1 -->
                    <div class="bg-surface-container-lowest rounded-lg shadow-sm overflow-hidden transition-all">
                        <button
                            class="faq-toggle w-full p-space-md flex items-center justify-between text-left font-headline-sm text-headline-sm font-semibold text-on-surface hover:text-primary"
                            type="button">
                            <span class="">How soon before departure must climbing &amp; trekking permits be
                                finalized?</span>
                            <x-lucide-chevron-down
                                class="transform transition-transform duration-200 text-tertiary size-4" />
                        </button>
                        <div
                            class="faq-content hidden px-space-md pb-space-md text-tertiary font-body-md text-body-md">
                            Standard trekking permits (TIMS, Sagarmatha, ACAP) take 24–48 hours to stamp at Nepal
                            Tourism Board. For restricted zones (Manaslu, Upper Mustang, Nar Phu, Dolpo) and NMA Peak
                            Climbing permits (Island Peak, Mera, Lobuche), we require your passport scans and
                            high-resolution photos at least 15 business days in advance to secure government officer
                            assignments.
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="bg-surface-container-lowest rounded-lg shadow-sm overflow-hidden transition-all">
                        <button
                            class="faq-toggle w-full p-space-md flex items-center justify-between text-left font-headline-sm text-headline-sm font-semibold text-on-surface hover:text-primary"
                            type="button">
                            <span class="">Do you accommodate custom route adjustments due to weather or
                                acclimatization?</span>
                            <x-lucide-chevron-down
                                class="transform transition-transform duration-200 text-tertiary size-4" />
                        </button>
                        <div
                            class="faq-content hidden px-space-md pb-space-md text-tertiary font-body-md text-body-md">
                            Absolutely. Safety is our non-negotiable metric. Every lead Sherpa guide is equipped with
                            pulse oximeters, Lake Louise Acute Mountain Sickness (AMS) score sheets, and Garmin inReach
                            satellite devices. If weather conditions close high passes (such as Cho La or Thorong La) or
                            acclimatization requires extra rest days, our operations desk dynamically recalibrates your
                            teahouse bookings without logistical friction.
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="bg-surface-container-lowest rounded-lg shadow-sm overflow-hidden transition-all">
                        <button
                            class="faq-toggle w-full p-space-md flex items-center justify-between text-left font-headline-sm text-headline-sm font-semibold text-on-surface hover:text-primary"
                            type="button">
                            <span class="">How are payments, deposits, and emergency rescue bonds handled?</span>
                            <x-lucide-chevron-down
                                class="transform transition-transform duration-200 text-tertiary size-4" />
                        </button>
                        <div
                            class="faq-content hidden px-space-md pb-space-md text-tertiary font-body-md text-body-md">
                            A 25% deposit secures your expedition slots, peak permits, and domestic Lukla/Pokhara flight
                            reservations via direct bank wire transfer or major credit card through Nepal Investment
                            Mega Bank (NIMB) secure gateway. The remaining balance can be settled in Kathmandu before
                            departure. We also coordinate cashless medical evacuation guarantees directly with your
                            mountaineering travel insurance provider (e.g., Ripcord, Global Rescue, Allianz).
                        </div>
                    </div>
                    <!-- Item 4 -->
                    <div class="bg-surface-container-lowest rounded-lg shadow-sm overflow-hidden transition-all">
                        <button
                            class="faq-toggle w-full p-space-md flex items-center justify-between text-left font-headline-sm text-headline-sm font-semibold text-on-surface hover:text-primary"
                            type="button">
                            <span class="">Can we meet our Lead Sherpa Sirdar before heading to Lukla or
                                Pokhara?</span>
                            <x-lucide-chevron-down
                                class="transform transition-transform duration-200 text-tertiary size-4" />
                        </button>
                        <div
                            class="faq-content hidden px-space-md pb-space-md text-tertiary font-body-md text-body-md">
                            Yes. On Day 1 in Kathmandu, our official Expedition Welcome Dinner &amp; Strategy Briefing
                            introduces you directly to your assigned Lead Guide, Sirdar, and Assistant Guides. You will
                            review maps, discuss pacing, adjust individual preferences, and conduct an intimate
                            equipment Q&amp;A session together.
                        </div>
                    </div>
                </div>
            </section>
            <!-- Accreditation & Official Partner Trust Badges -->
            <section
                class="w-full bg-surface-container-lowest py-space-xl px-gutter-mobile lg:px-gutter-desktop shadow-sm">
                <div class="max-w-max-content-width mx-auto flex flex-col gap-space-lg">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between gap-space-md text-center md:text-left">
                        <div>
                            <span
                                class="font-badge-caption text-badge-caption text-primary font-bold uppercase tracking-wider block">Official
                                Alpine Governance</span>
                            <span class="font-headline-sm text-headline-sm font-bold text-on-surface">Registered &amp;
                                Fully Licensed Expedition Operator</span>
                        </div>
                        <span class="text-body-sm text-tertiary font-body-sm">Govt. License No: 89432/071/072 • Central
                            Bank Foreign Exchange Authorized</span>
                    </div>
                    <!-- Government and Association Partner Badges Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-space-sm pt-space-xs">
                        <div
                            class="flex flex-col items-center justify-center p-space-sm rounded-lg bg-surface-container-low text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm font-bold text-on-surface">MOCTA</span>
                            <span class="font-badge-caption text-badge-caption text-tertiary uppercase mt-1">Ministry
                                of Tourism</span>
                        </div>
                        <div
                            class="flex flex-col items-center justify-center p-space-sm rounded-lg bg-surface-container-low text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm font-bold text-on-surface">NTB</span>
                            <span class="font-badge-caption text-badge-caption text-tertiary uppercase mt-1">Nepal
                                Tourism Board</span>
                        </div>
                        <div
                            class="flex flex-col items-center justify-center p-space-sm rounded-lg bg-surface-container-low text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm font-bold text-on-surface">TAAN</span>
                            <span class="font-badge-caption text-badge-caption text-tertiary uppercase mt-1">Trekking
                                Agencies</span>
                        </div>
                        <div
                            class="flex flex-col items-center justify-center p-space-sm rounded-lg bg-surface-container-low text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm font-bold text-on-surface">NMA</span>
                            <span
                                class="font-badge-caption text-badge-caption text-tertiary uppercase mt-1">Mountaineering
                                Assoc.</span>
                        </div>
                        <div
                            class="flex flex-col items-center justify-center p-space-sm rounded-lg bg-surface-container-low text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm font-bold text-on-surface">KEEP</span>
                            <span
                                class="font-badge-caption text-badge-caption text-tertiary uppercase mt-1">Eco-Tourism
                                Project</span>
                        </div>
                        <div
                            class="flex flex-col items-center justify-center p-space-sm rounded-lg bg-surface-container-low text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm font-bold text-on-surface">IMEC</span>
                            <span class="font-badge-caption text-badge-caption text-tertiary uppercase mt-1">Porter
                                Protection</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Submission Success Modal -->
            <div class="fixed inset-0 z-50 flex items-center justify-center p-space-md bg-ridge-deep/60 backdrop-blur-md hidden"
                id="formSuccessModal">
                <div
                    class="bg-surface-container-lowest max-w-lg w-full rounded-xl p-space-xl shadow-2xl flex flex-col items-center text-center gap-space-md">
                    <div
                        class="w-16 h-16 rounded-full bg-primary-container/20 flex items-center justify-center text-primary">
                        <x-lucide-circle-check class="size-[36px]" />
                    </div>
                    <div class="space-y-space-2xs">
                        <span
                            class="font-badge-caption text-badge-caption text-primary uppercase font-bold tracking-widest">Expedition
                            Brief Logged</span>
                        <h3 class="font-headline-lg text-headline-md font-bold text-on-surface">Transmission Received
                            at Basecamp HQ</h3>
                        <p class="font-body-md text-body-md text-tertiary">
                            Your route inquiry has been assigned to our Lead Expeditions Officer in Kathmandu. You will
                            receive an initial alpine briefing dossier and WhatsApp call invitation within 4 hours.
                        </p>
                    </div>
                    <button
                        class="w-full py-space-sm px-space-md bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase rounded-lg shadow-sm transition-colors"
                        onclick="document.getElementById('formSuccessModal').classList.add('hidden')" type="button">
                        Return to Dispatch Desk
                    </button>
                </div>
            </div>
            <!-- Micro-interactions JavaScript -->

        </div>
    </main>
    <x-footer />
</x-layouts.app>
