<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-48">
        <div class="flex w-full flex-col">
            <!-- Two-Column Operations & Consultation Hub -->
            <section class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop py-space-3xl mx-auto w-full">
                <div class="gap-space-2xl grid grid-cols-1 items-start lg:grid-cols-12">
                    <!-- Column 1: Custom Trek Briefing & Inquiry Form -->
                    <div
                        class="gap-space-lg bg-surface-container-lowest p-space-lg sm:p-space-xl flex flex-col rounded-xl shadow-md lg:col-span-7"
                        id="trek-form"
                    >
                        <div class="gap-space-2xs flex flex-col">
                            <div class="flex items-center justify-between">
                                <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-widest uppercase">General Inquiry</span>
                                <span class="font-label-sm text-label-sm text-primary bg-primary-container/20 px-space-xs py-space-2xs inline-flex items-center gap-1 rounded font-semibold">
                                    <x-lucide-message-square class="size-[14px]" /> We'd love to hear from you
                                </span>
                            </div>
                            <h2 class="font-headline-lg text-headline-md sm:text-headline-lg text-on-surface font-bold">
                                Contact Us
                            </h2>
                            <p class="font-body-md text-body-md text-tertiary">
                                Have a question or just want to say hi? Drop us a message and our team will get back to
                                you shortly.
                            </p>
                        </div>

                        <div id="contact-alert" class="relative mb-4 hidden rounded px-4 py-3" role="alert">
                            <span class="block sm:inline" id="contact-message"></span>
                        </div>

                        <form
                            id="contact-form"
                            class="gap-space-md flex flex-col"
                            method="POST"
                            action="{{ route('contact.store') }}"
                        >
                            @csrf
                            <div class="gap-space-md grid grid-cols-1 sm:grid-cols-2">
                                <div class="gap-space-2xs flex flex-col">
                                    <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Full Name *</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-user class="left-space-sm text-tertiary absolute size-[18px]" />
                                        <input
                                            class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:ring-primary-container w-full rounded-lg pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none"
                                            placeholder="Your Name"
                                            name="name"
                                            required=""
                                            type="text"
                                        />
                                    </div>
                                </div>
                                <div class="gap-space-2xs flex flex-col">
                                    <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Email Address *</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-mail class="left-space-sm text-tertiary absolute size-[18px]" />
                                        <input
                                            class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:ring-primary-container w-full rounded-lg pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none"
                                            placeholder="you@example.com"
                                            name="email"
                                            required=""
                                            type="email"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="gap-space-md grid grid-cols-1 sm:grid-cols-2">
                                <div class="gap-space-2xs flex flex-col">
                                    <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Phone Number</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-phone class="left-space-sm text-tertiary absolute size-[18px]" />
                                        <input
                                            class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:ring-primary-container w-full rounded-lg pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none"
                                            placeholder="+1 234 567 8900"
                                            name="phone"
                                            type="tel"
                                        />
                                    </div>
                                </div>
                                <div class="gap-space-2xs flex flex-col">
                                    <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Subject</label>
                                    <div class="relative flex items-center">
                                        <x-lucide-type class="left-space-sm text-tertiary absolute size-[18px]" />
                                        <input
                                            class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:ring-primary-container w-full rounded-lg pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none"
                                            placeholder="What is this regarding?"
                                            name="subject"
                                            type="text"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="gap-space-2xs pt-space-xs flex flex-col">
                                <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Your Message *</label>
                                <textarea
                                    name="message"
                                    required
                                    class="p-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:ring-primary-container w-full rounded-lg shadow-sm transition-all focus:ring-2 focus:outline-none"
                                    placeholder="How can we help you?"
                                    rows="6"
                                ></textarea>
                            </div>

                            <!-- Submit CTA -->
                            <div class="pt-space-sm gap-space-xs flex flex-col">
                                <button
                                    id="contact-submit-btn"
                                    class="py-space-md px-space-xl bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-headline-sm text-headline-sm gap-space-xs flex w-full items-center justify-center rounded-lg font-bold tracking-wider uppercase shadow-md transition-all"
                                    type="submit"
                                >
                                    <x-lucide-send class="size-4" />
                                    <span id="contact-submit-text">Send Message</span>
                                </button>
                            </div>
                        </form>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const form = document.getElementById('contact-form');
                                const alertBox = document.getElementById('contact-alert');
                                const alertMsg = document.getElementById('contact-message');
                                const submitBtn = document.getElementById('contact-submit-btn');
                                const submitText = document.getElementById('contact-submit-text');

                                form.addEventListener('submit', function (e) {
                                    e.preventDefault();

                                    submitBtn.disabled = true;
                                    submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
                                    submitText.textContent = 'Sending...';

                                    alertBox.classList.add('hidden');
                                    alertBox.classList.remove(
                                        'bg-green-100',
                                        'border-green-400',
                                        'text-green-700',
                                        'bg-red-100',
                                        'border-red-400',
                                        'text-red-700',
                                    );

                                    fetch(form.action, {
                                        method: 'POST',
                                        body: new FormData(form),
                                        headers: {
                                            'X-Requested-With': 'XMLHttpRequest',
                                            Accept: 'application/json',
                                        },
                                    })
                                        .then((response) => {
                                            return response
                                                .json()
                                                .then((data) => ({ status: response.status, body: data }));
                                        })
                                        .then(({ status, body }) => {
                                            alertBox.classList.remove('hidden');
                                            if (status === 200 || status === 201 || body.success) {
                                                alertBox.classList.add(
                                                    'bg-green-100',
                                                    'border',
                                                    'border-green-400',
                                                    'text-green-700',
                                                );
                                                alertMsg.textContent =
                                                    body.message || 'Your message has been sent successfully.';
                                                form.reset();
                                            } else {
                                                alertBox.classList.add(
                                                    'bg-red-100',
                                                    'border',
                                                    'border-red-400',
                                                    'text-red-700',
                                                );
                                                alertMsg.textContent =
                                                    body.message || 'Something went wrong. Please check your inputs.';
                                            }
                                        })
                                        .catch((error) => {
                                            alertBox.classList.remove('hidden');
                                            alertBox.classList.add(
                                                'bg-red-100',
                                                'border',
                                                'border-red-400',
                                                'text-red-700',
                                            );
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
                    <div class="gap-space-xl flex flex-col lg:col-span-5">
                        <!-- Kathmandu Central Headquarters -->
                        <div
                            class="bg-surface-container-lowest p-space-lg gap-space-md flex flex-col rounded-xl shadow-md"
                            id="dispatch-card"
                        >
                            <div class="flex items-start justify-between">
                                <div>
                                    <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-wider uppercase">Central HQ &amp; Briefing Lounge</span>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                        Kathmandu Basecamp
                                    </h3>
                                </div>
                                <div class="bg-primary-container/20 text-primary flex h-10 w-10 items-center justify-center rounded-full">
                                    <x-lucide-building-2 class="size-4" />
                                </div>
                            </div>
                            <div class="gap-space-sm font-body-md text-body-md text-tertiary flex flex-col">
                                <div class="gap-space-sm flex items-start">
                                    <x-lucide-map-pin class="text-primary mt-0.5 size-[20px] flex-shrink-0" />
                                    <div class="">
                                        <strong class="text-on-surface block font-medium">Office Address</strong>
                                        {{ $contact?->address ?? 'Contact us for our office address' }}
                                        @if ($contact?->google_maps_url)
                                            <a
                                                class="text-body-sm text-primary hover:text-on-surface block pt-0.5"
                                                href="{{ $contact->google_maps_url }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                            >View location details</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="gap-space-sm flex items-start">
                                    <x-lucide-phone-call class="text-primary mt-0.5 size-[20px] flex-shrink-0" />
                                    <div>
                                        <strong class="text-on-surface block font-medium">Telephone Line</strong>
                                        <a
                                            class=""
                                            href="tel:{{ preg_replace('/[^0-9+]/', '', $contact?->phone ?? '') }}"
                                        >{{ $contact?->phone ?? 'Contact us' }}</a>
                                    </div>
                                </div>
                                <div class="gap-space-sm flex items-start">
                                    <x-lucide-mail class="text-primary mt-0.5 size-[20px] flex-shrink-0" />
                                    <div>
                                        <strong class="text-on-surface block font-medium">Direct Email Inquiries</strong
                                        ><a
                                            class="text-on-surface hover:text-primary block transition-colors"
                                            href="mailto:{{ $contact?->email }}"
                                            >{{ $contact?->email ?? 'Email us' }}</a>
                                    </div>
                                </div>
                                <div class="gap-space-sm flex items-start">
                                    <x-lucide-clock-3 class="text-primary mt-0.5 size-[20px] flex-shrink-0" />
                                    <div class="">
                                        <strong class="text-on-surface block font-medium">Operations Hours (NPT)</strong>
                                        Sunday – Friday: 08:00 – 19:00 NPT<br />
                                        Saturday: Standby Duty Officer on site
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- WhatsApp Instant Planner Widget Card -->
                        <div class="p-space-md bg-surface-container-highest gap-space-md flex items-center justify-between rounded-xl shadow-sm">
                            <div class="gap-space-sm flex items-center">
                                <div class="bg-surface-container-lowest flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg shadow-sm">
                                    <x-lucide-messages-square class="text-primary size-[28px]" />
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-label-md text-label-md text-on-surface font-bold">Instant WhatsApp Advisory</span>
                                    <span class="font-body-sm text-body-sm text-tertiary">Chat direct with our Trek Logistics Officer</span>
                                </div>
                            </div>
                            <a
                                class="px-space-md py-space-xs bg-primary hover:bg-on-primary-container text-on-primary font-label-md text-label-md flex-shrink-0 rounded-lg font-semibold shadow-sm transition-colors"
                                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact?->whatsapp ?? '') }}"
                                rel="noopener noreferrer"
                                target="_blank"
                            >
                                Chat Now
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Map & Arrival Protocol Section -->
            <section class="bg-surface-container-low py-space-3xl px-gutter-mobile lg:px-gutter-desktop w-full shadow-inner">
                <div class="max-w-max-content-width gap-space-2xl mx-auto flex flex-col">
                    <!-- Section Header -->
                    <div class="gap-space-md flex flex-col justify-between md:flex-row md:items-end">
                        <div>
                            <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-widest uppercase">{{ $contact?->company_name ?? 'Company' }} Location</span>
                            <h2 class="font-headline-lg text-headline-md sm:text-headline-lg text-on-surface font-bold">
                                Visit Our Briefing Center in Thamel
                            </h2>
                        </div>
                        <div class="gap-space-xs text-tertiary font-label-sm text-label-sm bg-surface-container-lowest px-space-md py-space-xs flex items-center rounded-lg shadow-sm">
                            <x-lucide-compass class="text-primary size-[18px]" />
                            <span class="">Lat: 27.7154° N • Long: 85.3113° E • Elev: 1,400m</span>
                        </div>
                    </div>
                    <!-- Map Display & Nearby Landmarks Split -->
                    <div class="gap-space-xl grid grid-cols-1 items-center lg:grid-cols-12">
                        <!-- Interactive Static Map Pipeline Container -->
                        <div class="bg-surface-dim relative min-h-[380px] overflow-hidden rounded-xl shadow-lg lg:col-span-7">
                            @if ($contact?->google_maps_iframe)
                                <div class="[&>iframe]:w-full [&>iframe]:h-full [&>iframe]:min-h-[380px] [&>iframe]:border-0 h-full min-h-[380px] w-full">
                                    {!! $contact->google_maps_iframe !!}
                                </div>
                            @else
                                <div
                                    class="h-full min-h-[380px] w-full bg-cover bg-center"
                                    data-location="{{ $contact?->address }}"
                                    style="
                                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCSCPYK7toj5rVlPhvD-ROvULLcEvxI9Hv-EUzT_6onzr7ZHTWzpDaWTinbZ9jxfyRaCkL9tbr1_USs0zIYfLh-8Ji0jgBdfg-a8pgoGxwLK3T7fT2x3oPQID-UfMhJn1h_dIOgPWyrIpPnFJ-cilD22IbCoNKTXgyep1OTOtC-NtmsuGTZSAl7B9OqT_G4vRBTqpmHa5pWbjiUI8MDMVYeL1qP13NqB0xZKXLw3VCHxLqeJc1ajRxB');
                                    "
                                ></div>
                            @endif
                            <!-- Overlay Pin Marker Card -->
                            <div class="bottom-space-md left-space-md bg-surface-container-lowest/95 p-space-sm gap-space-sm absolute flex max-w-xs items-center rounded-lg shadow-md backdrop-blur-md">
                                <div class="bg-primary-container text-on-primary-fixed flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full">
                                    <x-lucide-map-pin class="size-[18px]" />
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-label-sm text-label-sm text-on-surface font-bold">{{ $contact?->company_name ?? 'Company HQ' }}</span>
                                    <span class="font-body-sm text-body-sm text-tertiary truncate">{{ $contact?->address ?? 'Office location' }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Visual Arrival Protocol: Step-by-Step Clinic -->
                        <div class="gap-space-md flex flex-col lg:col-span-5">
                            <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                What to Expect When Visiting
                            </h3>
                            <p class="font-body-md text-body-md text-tertiary">
                                Every climber and trekker undergoes our comprehensive pre-departure logistics process
                                prior to their domestic flight to Lukla or mountain trailheads.
                            </p>
                            <div class="space-y-space-sm pt-space-xs">
                                <div class="gap-space-sm p-space-sm bg-surface-container-lowest flex items-start rounded-lg shadow-sm">
                                    <div class="bg-primary-container text-on-primary-fixed font-label-md text-label-md flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-full font-bold">
                                        1
                                    </div>
                                    <div>
                                        <span class="font-label-md text-label-md text-on-surface block font-bold">Khata Scarf Welcome &amp; Espresso</span>
                                        <span class="font-body-sm text-body-sm text-tertiary"
                                            >Traditional Buddhist blessing by our lead Sirdars and detailed trek route
                                            folder presentation.</span>
                                    </div>
                                </div>
                                <div class="gap-space-sm p-space-sm bg-surface-container-lowest flex items-start rounded-lg shadow-sm">
                                    <div class="bg-primary-container text-on-primary-fixed font-label-md text-label-md flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-full font-bold">
                                        2
                                    </div>
                                    <div>
                                        <span class="font-label-md text-label-md text-on-surface block font-bold">Pre-Trek Gear &amp; Boot Inspection</span>
                                        <span class="font-body-sm text-body-sm text-tertiary"
                                            >Crampon, harness, down parka, and sleep system review with equipment
                                            adjustment and rental issuance.</span>
                                    </div>
                                </div>
                                <div class="gap-space-sm p-space-sm bg-surface-container-lowest flex items-start rounded-lg shadow-sm">
                                    <div class="bg-primary-container text-on-primary-fixed font-label-md text-label-md flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-full font-bold">
                                        3
                                    </div>
                                    <div>
                                        <span class="font-label-md text-label-md text-on-surface block font-bold">Permit Verification &amp; TIMS Biometrics</span>
                                        <span class="font-body-sm text-body-sm text-tertiary"
                                            >Final processing of Sagarmatha / Annapurna / Manaslu restricted zone
                                            permits with Government liaison.</span>
                                    </div>
                                </div>
                                <div class="gap-space-sm p-space-sm bg-surface-container-lowest flex items-start rounded-lg shadow-sm">
                                    <div class="bg-primary-container text-on-primary-fixed font-label-md text-label-md flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-full font-bold">
                                        4
                                    </div>
                                    <div>
                                        <span class="font-label-md text-label-md text-on-surface block font-bold">Duffel Weight Weigh-In &amp; Medical Log</span>
                                        <span class="font-body-sm text-body-sm text-tertiary"
                                            >Precise 15kg duffel limit calibration for Lukla Twin Otter STOL flights and
                                            baseline oxygen saturation log.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- High-Altitude Operations FAQ Accordion -->
            <section class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop py-space-3xl mx-auto w-full">
                <div class="gap-space-xs mb-space-2xl mx-auto flex max-w-2xl flex-col items-center text-center">
                    <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-widest uppercase">Field Readiness Inquiries</span>
                    <h2 class="font-headline-lg text-headline-md sm:text-headline-lg text-on-surface font-bold">
                        Frequently Asked Questions
                    </h2>
                    <p class="font-body-md text-body-md text-tertiary">
                        Essential considerations regarding high-altitude permits, insurance policies, and field
                        execution.
                    </p>
                </div>
                <div class="space-y-space-sm mx-auto max-w-3xl" id="faqAccordion">
                    <!-- Item 1 -->
                    <div class="bg-surface-container-lowest overflow-hidden rounded-lg shadow-sm transition-all">
                        <button
                            class="faq-toggle p-space-md font-headline-sm text-headline-sm text-on-surface hover:text-primary flex w-full items-center justify-between text-left font-semibold"
                            type="button"
                        >
                            <span class="">How soon before departure must trekking &amp; trekking permits be finalized?</span>
                            <x-lucide-chevron-down class="text-tertiary size-4 transform transition-transform duration-200" />
                        </button>
                        <div class="faq-content px-space-md pb-space-md text-tertiary font-body-md text-body-md hidden">
                            Standard trekking permits (TIMS, Sagarmatha, ACAP) take 24–48 hours to stamp at Nepal
                            Tourism Board. For restricted zones (Manaslu, Upper Mustang, Nar Phu, Dolpo) and NMA Pass
                            Trekking permits (Island Pass, Mera, Lobuche), we require your passport scans and
                            high-resolution photos at least 15 business days in advance to secure government officer
                            assignments.
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="bg-surface-container-lowest overflow-hidden rounded-lg shadow-sm transition-all">
                        <button
                            class="faq-toggle p-space-md font-headline-sm text-headline-sm text-on-surface hover:text-primary flex w-full items-center justify-between text-left font-semibold"
                            type="button"
                        >
                            <span class="">Do you accommodate custom route adjustments due to weather or acclimatization?</span>
                            <x-lucide-chevron-down class="text-tertiary size-4 transform transition-transform duration-200" />
                        </button>
                        <div class="faq-content px-space-md pb-space-md text-tertiary font-body-md text-body-md hidden">
                            Absolutely. Safety is our non-negotiable metric. Every lead Guide is equipped with
                            pulse oximeters, Lake Louise Acute Mountain Sickness (AMS) score sheets, and Garmin inReach
                            satellite devices. If weather conditions close high passes (such as Cho La or Thorong La) or
                            acclimatization requires extra rest days, our operations desk dynamically recalibrates your
                            teahouse bookings without logistical friction.
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="bg-surface-container-lowest overflow-hidden rounded-lg shadow-sm transition-all">
                        <button
                            class="faq-toggle p-space-md font-headline-sm text-headline-sm text-on-surface hover:text-primary flex w-full items-center justify-between text-left font-semibold"
                            type="button"
                        >
                            <span class="">How are payments, deposits, and emergency rescue bonds handled?</span>
                            <x-lucide-chevron-down class="text-tertiary size-4 transform transition-transform duration-200" />
                        </button>
                        <div class="faq-content px-space-md pb-space-md text-tertiary font-body-md text-body-md hidden">
                            A 25% deposit secures your trek slots, pass permits, and domestic Lukla/Pokhara flight
                            reservations via direct bank wire transfer or major credit card through Nepal Investment
                            Mega Bank (NIMB) secure gateway. The remaining balance can be settled in Kathmandu before
                            departure. We also coordinate cashless medical evacuation guarantees directly with your
                            trekking travel insurance provider (e.g., Ripcord, Global Rescue, Allianz).
                        </div>
                    </div>
                    <!-- Item 4 -->
                    <div class="bg-surface-container-lowest overflow-hidden rounded-lg shadow-sm transition-all">
                        <button
                            class="faq-toggle p-space-md font-headline-sm text-headline-sm text-on-surface hover:text-primary flex w-full items-center justify-between text-left font-semibold"
                            type="button"
                        >
                            <span class="">Can we meet our Lead Guide Sirdar before heading to Lukla or Pokhara?</span>
                            <x-lucide-chevron-down class="text-tertiary size-4 transform transition-transform duration-200" />
                        </button>
                        <div class="faq-content px-space-md pb-space-md text-tertiary font-body-md text-body-md hidden">
                            Yes. On Day 1 in Kathmandu, our official Trek Welcome Dinner &amp; Strategy Briefing
                            introduces you directly to your assigned Lead Guide, Sirdar, and Assistant Guides. You will
                            review maps, discuss pacing, adjust individual preferences, and conduct an intimate
                            equipment Q&amp;A session together.
                        </div>
                    </div>
                </div>
            </section>
            <!-- Accreditation & Official Partner Trust Badges -->
            <section class="bg-surface-container-lowest py-space-xl px-gutter-mobile lg:px-gutter-desktop w-full shadow-sm">
                <div class="max-w-max-content-width gap-space-lg mx-auto flex flex-col">
                    <div class="gap-space-md flex flex-col items-center justify-between text-center md:flex-row md:text-left">
                        <div>
                            <span class="font-badge-caption text-badge-caption text-primary block font-bold tracking-wider uppercase">Official Alpine Governance</span>
                            <span class="font-headline-sm text-headline-sm text-on-surface font-bold">Registered &amp; Fully Licensed Trek Operator</span>
                        </div>
                        <span class="text-body-sm text-tertiary font-body-sm">Govt. License No: 89432/071/072 • Central Bank Foreign Exchange Authorized</span>
                    </div>
                    <!-- Government and Association Partner Badges Grid -->
                    <div class="gap-space-sm pt-space-xs grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6">
                        <div class="p-space-sm bg-surface-container-low flex flex-col items-center justify-center rounded-lg text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm text-on-surface font-bold">MOCTA</span>
                            <span class="font-badge-caption text-badge-caption text-tertiary mt-1 uppercase">Ministry of Tourism</span>
                        </div>
                        <div class="p-space-sm bg-surface-container-low flex flex-col items-center justify-center rounded-lg text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm text-on-surface font-bold">NTB</span>
                            <span class="font-badge-caption text-badge-caption text-tertiary mt-1 uppercase">Nepal Tourism Board</span>
                        </div>
                        <div class="p-space-sm bg-surface-container-low flex flex-col items-center justify-center rounded-lg text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm text-on-surface font-bold">TAAN</span>
                            <span class="font-badge-caption text-badge-caption text-tertiary mt-1 uppercase">Trekking Agencies</span>
                        </div>
                        <div class="p-space-sm bg-surface-container-low flex flex-col items-center justify-center rounded-lg text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm text-on-surface font-bold">NMA</span>
                            <span class="font-badge-caption text-badge-caption text-tertiary mt-1 uppercase">Trekking Assoc.</span>
                        </div>
                        <div class="p-space-sm bg-surface-container-low flex flex-col items-center justify-center rounded-lg text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm text-on-surface font-bold">KEEP</span>
                            <span class="font-badge-caption text-badge-caption text-tertiary mt-1 uppercase">Eco-Tourism Project</span>
                        </div>
                        <div class="p-space-sm bg-surface-container-low flex flex-col items-center justify-center rounded-lg text-center shadow-xs">
                            <span class="font-headline-sm text-headline-sm text-on-surface font-bold">IMEC</span>
                            <span class="font-badge-caption text-badge-caption text-tertiary mt-1 uppercase">Porter Protection</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Submission Success Modal -->
            <div
                class="p-space-md bg-ridge-deep/60 fixed inset-0 z-50 flex hidden items-center justify-center backdrop-blur-md"
                id="formSuccessModal"
            >
                <div class="bg-surface-container-lowest p-space-xl gap-space-md flex w-full max-w-lg flex-col items-center rounded-xl text-center shadow-2xl">
                    <div class="bg-primary-container/20 text-primary flex h-16 w-16 items-center justify-center rounded-full">
                        <x-lucide-circle-check class="size-[36px]" />
                    </div>
                    <div class="space-y-space-2xs">
                        <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-widest uppercase">Trek Brief Logged</span>
                        <h3 class="font-headline-lg text-headline-md text-on-surface font-bold">
                            Transmission Received at Basecamp HQ
                        </h3>
                        <p class="font-body-md text-body-md text-tertiary">
                            Your route inquiry has been assigned to our Lead Treks Officer in Kathmandu. You will
                            receive an initial alpine briefing dossier and WhatsApp call invitation within 4 hours.
                        </p>
                    </div>
                    <button
                        class="py-space-sm px-space-md bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md w-full rounded-lg font-bold uppercase shadow-sm transition-colors"
                        onclick="document.getElementById('formSuccessModal').classList.add('hidden')"
                        type="button"
                    >
                        Return to Dispatch Desk
                    </button>
                </div>
            </div>
            <!-- Micro-interactions JavaScript -->
        </div>
    </main>
    <x-footer />
</x-layouts.app>
