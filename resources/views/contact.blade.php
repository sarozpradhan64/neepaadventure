<x-layouts.app>
    <x-header />
    <main class="w-full pt-48  bg-surface">
        <div class="flex flex-col w-full">
            <!-- Two-Column Operations & Consultation Hub -->
            <section class="w-full max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop py-space-3xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-start">
                    <!-- Column 1: Custom Trek Briefing & Inquiry Form -->
                    <div class="lg:col-span-7 flex flex-col gap-space-lg bg-surface-container-lowest p-space-lg sm:p-space-xl rounded-xl shadow-md"
                        id="trek-form">
                        <div class="flex flex-col gap-space-2xs">
                            <div class="flex items-center justify-between">
                                <span
                                    class="font-badge-caption text-badge-caption text-primary uppercase tracking-widest font-bold">General Inquiry</span>
                                <span
                                    class="inline-flex items-center gap-1 font-label-sm text-label-sm text-primary font-semibold bg-primary-container/20 px-space-xs py-space-2xs rounded">
                                    <x-lucide-message-square class="size-[14px]" /> We'd love to hear from you
                                </span>
                            </div>
                            <h2 class="font-headline-lg text-headline-md sm:text-headline-lg font-bold text-on-surface">
                                Contact Us</h2>
                            <p class="font-body-md text-body-md text-tertiary">
                                Have a question or just want to say hi? Drop us a message and our team will get back to you shortly.
                            </p>
                        </div>
                        
                        <div id="contact-alert" class="hidden px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline" id="contact-message"></span>
                        </div>
                        
                        <form id="contact-form" class="flex flex-col gap-space-md" method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                                <div class="flex flex-col gap-space-2xs">
                                    <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Full Name *</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-user class="absolute left-space-sm text-tertiary size-[18px]" />
                                        <input
                                            class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-container transition-all"
                                            placeholder="Your Name" name="name" required="" type="text">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-space-2xs">
                                    <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Email Address *</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-mail class="absolute left-space-sm text-tertiary size-[18px]" />
                                        <input
                                            class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-container transition-all"
                                            placeholder="you@example.com" name="email" required="" type="email">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                                <div class="flex flex-col gap-space-2xs">
                                    <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Phone Number</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-phone class="absolute left-space-sm text-tertiary size-[18px]" />
                                        <input
                                            class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-container transition-all"
                                            placeholder="+1 234 567 8900" name="phone" type="tel">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-space-2xs">
                                    <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Subject</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-type class="absolute left-space-sm text-tertiary size-[18px]" />
                                        <input
                                            class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-container transition-all"
                                            placeholder="What is this regarding?" name="subject" type="text">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex flex-col gap-space-2xs pt-space-xs">
                                <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Your Message *</label>
                                <textarea name="message" required
                                    class="w-full p-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-container transition-all"
                                    placeholder="How can we help you?"
                                    rows="6"></textarea>
                            </div>
                            
                            <!-- Submit CTA -->
                            <div class="pt-space-sm flex flex-col gap-space-xs">
                                <button id="contact-submit-btn"
                                    class="w-full py-space-md px-space-xl bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-headline-sm text-headline-sm uppercase tracking-wider font-bold rounded-lg shadow-md transition-all flex items-center justify-center gap-space-xs"
                                    type="submit">
                                    <x-lucide-send class="size-4" />
                                    <span id="contact-submit-text">Send Message</span>
                                </button>
                            </div>
                        </form>
                        
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const form = document.getElementById('contact-form');
                                const alertBox = document.getElementById('contact-alert');
                                const alertMsg = document.getElementById('contact-message');
                                const submitBtn = document.getElementById('contact-submit-btn');
                                const submitText = document.getElementById('contact-submit-text');

                                form.addEventListener('submit', function(e) {
                                    e.preventDefault();
                                    
                                    submitBtn.disabled = true;
                                    submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
                                    submitText.textContent = 'Sending...';
                                    
                                    alertBox.classList.add('hidden');
                                    alertBox.classList.remove('bg-green-100', 'border-green-400', 'text-green-700', 'bg-red-100', 'border-red-400', 'text-red-700');

                                    fetch(form.action, {
                                        method: 'POST',
                                        body: new FormData(form),
                                        headers: {
                                            'X-Requested-With': 'XMLHttpRequest',
                                            'Accept': 'application/json',
                                        }
                                    })
                                    .then(response => {
                                        return response.json().then(data => ({ status: response.status, body: data }));
                                    })
                                    .then(({ status, body }) => {
                                        alertBox.classList.remove('hidden');
                                        if(status === 200 || status === 201 || body.success) {
                                            alertBox.classList.add('bg-green-100', 'border', 'border-green-400', 'text-green-700');
                                            alertMsg.textContent = body.message || 'Your message has been sent successfully.';
                                            form.reset();
                                        } else {
                                            alertBox.classList.add('bg-red-100', 'border', 'border-red-400', 'text-red-700');
                                            alertMsg.textContent = body.message || 'Something went wrong. Please check your inputs.';
                                        }
                                    })
                                    .catch(error => {
                                        alertBox.classList.remove('hidden');
                                        alertBox.classList.add('bg-red-100', 'border', 'border-red-400', 'text-red-700');
                                        alertMsg.textContent = 'A network error occurred. Please try again.';
                                    })
                                    .finally(() => {
                                        submitBtn.disabled = false;
                                        submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                                        submitText.textContent = 'Send Message';
                                    });
                                });
                            });
                        </script>
                    </div>
                    <!-- Column 2: Direct Operations Desks, Khumbu Outpost & Emergency Dispatch -->
                    <div class="lg:col-span-5 flex flex-col gap-space-xl">
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
                            <h2 class="font-headline-lg text-headline-md sm:text-headline-lg font-bold text-on-surface">
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
                            @if ($contact?->google_maps_iframe)
                                <div class="w-full h-full min-h-[380px] [&>iframe]:w-full [&>iframe]:h-full [&>iframe]:min-h-[380px] [&>iframe]:border-0">
                                    {!! $contact->google_maps_iframe !!}
                                </div>
                            @else
                                <div class="w-full h-full min-h-[380px] bg-cover bg-center"
                                    data-location="{{ $contact?->address }}"
                                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCSCPYK7toj5rVlPhvD-ROvULLcEvxI9Hv-EUzT_6onzr7ZHTWzpDaWTinbZ9jxfyRaCkL9tbr1_USs0zIYfLh-8Ji0jgBdfg-a8pgoGxwLK3T7fT2x3oPQID-UfMhJn1h_dIOgPWyrIpPnFJ-cilD22IbCoNKTXgyep1OTOtC-NtmsuGTZSAl7B9OqT_G4vRBTqpmHa5pWbjiUI8MDMVYeL1qP13NqB0xZKXLw3VCHxLqeJc1ajRxB')">
                                </div>
                            @endif
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
                                            blessing by our lead Sirdars and detailed trek route folder
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
                                        <span class="font-label-md text-label-md font-bold text-on-surface block">Permit
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
                                        <span class="font-label-md text-label-md font-bold text-on-surface block">Duffel
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
                            <span class="">How soon before departure must trekking &amp; trekking permits be
                                finalized?</span>
                            <x-lucide-chevron-down
                                class="transform transition-transform duration-200 text-tertiary size-4" />
                        </button>
                        <div class="faq-content hidden px-space-md pb-space-md text-tertiary font-body-md text-body-md">
                            Standard trekking permits (TIMS, Sagarmatha, ACAP) take 24–48 hours to stamp at Nepal
                            Tourism Board. For restricted zones (Manaslu, Upper Mustang, Nar Phu, Dolpo) and NMA Pass
                            Trekking permits (Island Pass, Mera, Lobuche), we require your passport scans and
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
                        <div class="faq-content hidden px-space-md pb-space-md text-tertiary font-body-md text-body-md">
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
                        <div class="faq-content hidden px-space-md pb-space-md text-tertiary font-body-md text-body-md">
                            A 25% deposit secures your trek slots, pass permits, and domestic Lukla/Pokhara flight
                            reservations via direct bank wire transfer or major credit card through Nepal Investment
                            Mega Bank (NIMB) secure gateway. The remaining balance can be settled in Kathmandu before
                            departure. We also coordinate cashless medical evacuation guarantees directly with your
                            trekking travel insurance provider (e.g., Ripcord, Global Rescue, Allianz).
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
                        <div class="faq-content hidden px-space-md pb-space-md text-tertiary font-body-md text-body-md">
                            Yes. On Day 1 in Kathmandu, our official Trek Welcome Dinner &amp; Strategy Briefing
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
                                Fully Licensed Trek Operator</span>
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
                            <span class="font-badge-caption text-badge-caption text-tertiary uppercase mt-1">Trekking
                                Assoc.</span>
                        </div>
                        <div
                            class="flex flex-col items-center justify-center p-space-sm rounded-lg bg-surface-container-low text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm font-bold text-on-surface">KEEP</span>
                            <span class="font-badge-caption text-badge-caption text-tertiary uppercase mt-1">Eco-Tourism
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
                            class="font-badge-caption text-badge-caption text-primary uppercase font-bold tracking-widest">Trek
                            Brief Logged</span>
                        <h3 class="font-headline-lg text-headline-md font-bold text-on-surface">Transmission Received
                            at Basecamp HQ</h3>
                        <p class="font-body-md text-body-md text-tertiary">
                            Your route inquiry has been assigned to our Lead Treks Officer in Kathmandu. You will
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