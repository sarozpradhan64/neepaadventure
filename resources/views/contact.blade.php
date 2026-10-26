<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-28">
        <div class="flex w-full flex-col">
            <!-- Two-Column Operations & Consultation Hub -->
            <section class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop py-space-3xl mx-auto w-full">
                <div class="gap-space-2xl grid grid-cols-1 items-start lg:grid-cols-12">
                    <!-- Column 1: Custom Trek Briefing & Inquiry Form -->
                    <div
                        class="gap-space-lg bg-surface-container-lowest p-space-lg sm:p-space-xl flex flex-col rounded-2xl shadow-sm border border-outline/10 lg:col-span-7"
                        id="trek-form"
                    >
                        <div class="gap-space-2xs flex flex-col">
                            <div class="flex items-center justify-between">
                                <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-widest uppercase">General Inquiry</span>
                                <span class="font-label-sm text-label-sm text-primary bg-primary-container/20 px-space-xs py-space-2xs inline-flex items-center gap-1 rounded-lg font-semibold">
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

                        <div id="contact-alert" class="relative mb-4 hidden rounded-xl px-4 py-3 border" role="alert">
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
                                            class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:ring-primary-container w-full rounded-xl pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none border border-outline/15"
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
                                            class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:ring-primary-container w-full rounded-xl pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none border border-outline/15"
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
                                            class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:ring-primary-container w-full rounded-xl pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none border border-outline/15"
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
                                            class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:ring-primary-container w-full rounded-xl pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none border border-outline/15"
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
                                    class="p-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:ring-primary-container w-full rounded-xl shadow-sm transition-all focus:ring-2 focus:outline-none border border-outline/15"
                                    placeholder="How can we help you?"
                                    rows="6"
                                ></textarea>
                            </div>

                            <!-- Submit CTA -->
                            <div class="pt-space-sm gap-space-xs flex flex-col">
                                <button
                                    id="contact-submit-btn"
                                    class="py-space-md px-space-xl bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md gap-space-xs flex w-full items-center justify-center rounded-xl font-bold tracking-wider uppercase shadow-md transition-all cursor-pointer"
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
                    <!-- Column 2: Direct Operations Desks, Khumbu Outpost & Emergency Support -->
                    <div class="gap-space-xl flex flex-col lg:col-span-5">
                        <!-- Kathmandu Central Headquarters -->
                        <div
                            class="bg-surface-container-lowest p-space-lg gap-space-md flex flex-col rounded-2xl shadow-sm border border-outline/10"
                            id="hq-card"
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
                                @php
                                    $phoneClean = preg_replace('/[^0-9+]/', '', $contact?->phone ?? '');
                                    $whatsappClean = preg_replace('/[^0-9+]/', '', $contact?->whatsapp ?? '');
                                    $viberClean = preg_replace('/[^0-9+]/', '', $contact?->viber ?? '');

                                    $hasPhone = (bool) $phoneClean;
                                    $hasWhatsapp = (bool) $whatsappClean;
                                    $hasViber = (bool) $viberClean;

                                    $phoneIsWhatsapp = $hasPhone && $hasWhatsapp && $phoneClean === $whatsappClean;
                                    $phoneIsViber = $hasPhone && $hasViber && $phoneClean === $viberClean;
                                    $whatsappIsViber = $hasWhatsapp && $hasViber && $whatsappClean === $viberClean;
                                @endphp

                                <div class="gap-space-sm flex items-start">
                                    <x-lucide-phone-call class="text-primary mt-0.5 size-[20px] flex-shrink-0" />
                                    <div>
                                        <strong class="text-on-surface block font-medium">Phone number</strong>
                                        <div class="flex flex-wrap items-center gap-1">
                                            <a
                                                class="hover:text-primary transition-colors"
                                                href="tel:{{ $phoneClean }}"
                                            >{{ $contact?->phone ?? 'Contact us' }}</a>
                                            
                                            @php
                                                $phoneTags = [];
                                                if ($phoneIsWhatsapp) $phoneTags[] = 'WhatsApp';
                                                if ($phoneIsViber) $phoneTags[] = 'Viber';
                                            @endphp
                                            
                                            @if(!empty($phoneTags))
                                                <span class="text-tertiary text-sm">({{ implode('/', $phoneTags) }})</span>
                                            @endif

                                            @if ($phoneIsWhatsapp && $contact->whatsapp_name)
                                                <span class="text-tertiary text-sm">({{ $contact->whatsapp_name }})</span>
                                            @elseif ($phoneIsViber && $contact->viber_name)
                                                <span class="text-tertiary text-sm">({{ $contact->viber_name }})</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if ($contact?->whatsapp && !$phoneIsWhatsapp)
                                    <div class="gap-space-sm flex items-start">
                                        <x-lucide-message-circle class="text-primary mt-0.5 size-[20px] flex-shrink-0" />
                                        <div>
                                            <strong class="text-on-surface block font-medium">WhatsApp @if($whatsappIsViber) / Viber @endif</strong>
                                            <div class="flex flex-wrap items-center gap-1">
                                                <a
                                                    class="hover:text-primary transition-colors"
                                                    href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->whatsapp) }}"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                >{{ $contact->whatsapp }}</a>
                                                @if ($contact->whatsapp_name)
                                                    <span class="text-tertiary text-sm">({{ $contact->whatsapp_name }})</span>
                                                @elseif ($whatsappIsViber && $contact->viber_name)
                                                    <span class="text-tertiary text-sm">({{ $contact->viber_name }})</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($contact?->viber && !$phoneIsViber && !$whatsappIsViber)
                                    <div class="gap-space-sm flex items-start">
                                        <x-lucide-phone-forwarded class="text-primary mt-0.5 size-[20px] flex-shrink-0" />
                                        <div>
                                            <strong class="text-on-surface block font-medium">Viber</strong>
                                            <div class="flex flex-wrap items-center gap-1">
                                                <a
                                                    class="hover:text-primary transition-colors"
                                                    href="tel:{{ $viberClean }}"
                                                >{{ $contact->viber }}</a>
                                                @if ($contact->viber_name)
                                                    <span class="text-tertiary text-sm">({{ $contact->viber_name }})</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($contact?->secondary_phone)
                                    <div class="gap-space-sm flex items-start">
                                        <x-lucide-phone class="text-primary mt-0.5 size-[20px] flex-shrink-0" />
                                        <div>
                                            <strong class="text-on-surface block font-medium">Secondary Phone</strong>
                                            <a
                                                class="hover:text-primary transition-colors"
                                                href="tel:{{ preg_replace('/[^0-9+]/', '', $contact->secondary_phone) }}"
                                            >{{ $contact->secondary_phone }}</a>
                                        </div>
                                    </div>
                                @endif
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
                                @if ($contact?->secondary_email)
                                    <div class="gap-space-sm flex items-start">
                                        <x-lucide-mail class="text-primary mt-0.5 size-[20px] flex-shrink-0" />
                                        <div>
                                            <strong class="text-on-surface block font-medium">Secondary Email</strong
                                            ><a
                                                class="text-on-surface hover:text-primary block transition-colors"
                                                href="mailto:{{ $contact->secondary_email }}"
                                                >{{ $contact->secondary_email }}</a>
                                        </div>
                                    </div>
                                @endif
                                <div class="gap-space-sm flex items-start">
                                    <x-lucide-clock-3 class="text-primary mt-0.5 size-[20px] flex-shrink-0" />
                                    <div class="">
                                        <strong class="text-on-surface block font-medium">Operations Hours (NPT)</strong>
                                        {!! nl2br($contact?->working_hours) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- WhatsApp Instant Planner Widget Card -->
                        <div class="p-space-md bg-[#25D366]/5 border-[#25D366]/20 gap-space-md flex items-center justify-between rounded-2xl border shadow-sm">
                            <div class="gap-space-sm flex items-center">
                                <div class="bg-[#25D366]/20 flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="currentColor" class="text-[#25D366]">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.347-.272.297-1.04 1.016-1.04 2.479 0 1.463 1.065 2.876 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                    </svg>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-label-md text-label-md text-on-surface font-bold">Instant WhatsApp Advisory</span>
                                    <span class="font-body-sm text-body-sm text-tertiary">Chat direct with our Trek Logistics Officer</span>
                                </div>
                            </div>
                            <a
                                class="px-space-md py-space-xs bg-[#25D366] hover:bg-[#128C7E] text-white font-label-md text-label-md flex-shrink-0 rounded-xl font-semibold shadow-sm transition-colors cursor-pointer"
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
                        <div class="gap-space-xs text-tertiary font-label-sm text-label-sm bg-surface-container-lowest px-space-md py-space-xs flex items-center rounded-xl shadow-sm border border-outline/10">
                            <x-lucide-compass class="text-primary size-[18px]" />
                            <span class="">Lat: 27.7154° N • Long: 85.3113° E • Elev: 1,400m</span>
                        </div>
                    </div>
                    <!-- Map Display & Nearby Landmarks Split -->
                    <div class="gap-space-xl grid grid-cols-1 items-center lg:grid-cols-12">
                        <!-- Interactive Static Map Pipeline Container -->
                        <div class="bg-surface-dim relative min-h-[380px] overflow-hidden rounded-2xl shadow-lg border border-outline/10 lg:col-span-7">
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
                            <div class="bottom-space-md left-space-md bg-surface-container-lowest/95 p-space-sm gap-space-sm absolute flex max-w-xs items-center rounded-xl shadow-md backdrop-blur-md border border-outline/10">
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
                                <div class="gap-space-sm p-space-sm bg-surface-container-lowest flex items-start rounded-xl shadow-sm border border-outline/10">
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
                                <div class="gap-space-sm p-space-sm bg-surface-container-lowest flex items-start rounded-xl shadow-sm border border-outline/10">
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
                                <div class="gap-space-sm p-space-sm bg-surface-container-lowest flex items-start rounded-xl shadow-sm border border-outline/10">
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
                                <div class="gap-space-sm p-space-sm bg-surface-container-lowest flex items-start rounded-xl shadow-sm border border-outline/10">
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
            @php
                $contactFaqs = $faqs ?? \Blaze\AdminCore\Models\Faq::where('status', true)->where('is_contact_page', true)->orderBy('sort_order')->get();
            @endphp
            @if($contactFaqs->isNotEmpty())
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
                <div class="space-y-space-sm mx-auto max-w-3xl" id="faqAccordion" x-data="{ active: null }">
                    @foreach($contactFaqs as $index => $faq)
                        <div class="bg-surface-container-lowest overflow-hidden rounded-xl shadow-sm border border-outline/10 transition-all">
                            <button
                                @click="active = (active === {{ $index }} ? null : {{ $index }})"
                                class="p-space-md font-headline-sm text-headline-sm text-on-surface hover:text-primary flex w-full items-center justify-between text-left font-semibold cursor-pointer transition-colors"
                                type="button"
                                :aria-expanded="active === {{ $index }} ? 'true' : 'false'"
                            >
                                <span>{{ $faq->question }}</span>
                                <x-lucide-chevron-down
                                    class="text-tertiary size-4 transform transition-transform duration-200 shrink-0 ml-3"
                                    x-bind:class="{ 'rotate-180 text-primary': active === {{ $index }} }"
                                />
                            </button>
                            <div
                                x-show="active === {{ $index }}"
                                x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="px-space-md pb-space-md text-tertiary font-body-md text-body-md leading-relaxed"
                            >
                                <div class="prose prose-sm max-w-none text-tertiary">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            @endif
            <!-- Accreditation & Official Legal Governance / Partner Trust Badges -->
            @php
                $docs = $legalDocuments ?? $navLegalDocuments ?? \Blaze\AdminCore\Models\LegalDocument::cached();
            @endphp
            <section class="bg-surface-container-lowest py-space-xl px-gutter-mobile lg:px-gutter-desktop w-full shadow-sm">
                <div class="max-w-max-content-width gap-space-lg mx-auto flex flex-col">
                    <div class="gap-space-md flex flex-col items-center justify-between text-center md:flex-row md:text-left">
                        <div>
                            <span class="font-badge-caption text-badge-caption text-primary block font-bold tracking-wider uppercase">Official Alpine Governance</span>
                            <h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Registered &amp; Fully Licensed Trek Operator</h2>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4">
                            @if(!empty($contact?->registration_number))
                                <span class="text-body-sm text-tertiary font-body-sm">Govt. Reg. No: {{ $contact->registration_number }}</span>
                                <span class="text-tertiary/40 hidden sm:inline">•</span>
                            @else
                                <span class="text-body-sm text-tertiary font-body-sm">Govt. Authorized &bull; Central Bank Licensed</span>
                                <span class="text-tertiary/40 hidden sm:inline">•</span>
                            @endif
                            <a href="{{ route('legal.index') }}" class="inline-flex items-center gap-1.5 text-label-sm font-bold text-primary hover:text-amber-flare transition-colors">
                                <span>All Legal Documents</span>
                                <x-lucide-arrow-right class="size-4" />
                            </a>
                        </div>
                    </div>

                    @if($docs->isNotEmpty())
                        <!-- Dynamic Legal Documents Grid -->
                        <div class="gap-space-sm pt-space-xs grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            @foreach($docs as $doc)
                                @php
                                    $isImage = $doc->file_path && preg_match('/\.(jpg|jpeg|png|webp|gif)$/i', $doc->file_path);
                                @endphp
                                <a 
                                    href="{{ route('legal-document.show', $doc->slug) }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer" 
                                    class="group p-4 sm:p-space-md bg-surface-container-low hover:bg-surface-container hover:border-primary/40 rounded-xl transition-all duration-300 shadow-xs border border-outline/10 flex items-start gap-3.5 hover:shadow-md hover:-translate-y-0.5"
                                >
                                    <div class="size-11 rounded-lg bg-primary-container/20 text-primary flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:text-on-primary-fixed transition-colors">
                                        @if($isImage)
                                            <x-lucide-file-check-2 class="size-5" />
                                        @else
                                            <x-lucide-shield-check class="size-5" />
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center justify-between gap-1">
                                            <span class="font-label-sm text-[11px] font-bold text-primary uppercase tracking-wider">Verified License</span>
                                            <x-lucide-external-link class="size-3.5 text-tertiary group-hover:text-primary transition-colors shrink-0" />
                                        </div>
                                        <h3 class="font-headline-sm text-body-md text-on-surface font-bold leading-snug line-clamp-2 mt-0.5 group-hover:text-primary transition-colors">
                                            {{ $doc->title }}
                                        </h3>
                                        <span class="text-[11px] text-tertiary font-medium mt-1 inline-flex items-center gap-1 group-hover:text-primary transition-colors">
                                            <span>View Certificate</span>
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <!-- Fallback Government & Association Partner Badges Grid -->
                        <div class="gap-space-sm pt-space-xs grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6">
                            <a href="{{ route('legal.index') }}" class="group p-space-sm bg-surface-container-low hover:bg-surface-container hover:border-primary/30 flex flex-col items-center justify-center rounded-xl text-center shadow-xs border border-outline/10 transition-all">
                                <span class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary font-bold transition-colors">MOCTA</span>
                                <span class="font-badge-caption text-badge-caption text-tertiary mt-1 uppercase">Ministry of Tourism</span>
                            </a>
                            <a href="{{ route('legal.index') }}" class="group p-space-sm bg-surface-container-low hover:bg-surface-container hover:border-primary/30 flex flex-col items-center justify-center rounded-xl text-center shadow-xs border border-outline/10 transition-all">
                                <span class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary font-bold transition-colors">NTB</span>
                                <span class="font-badge-caption text-badge-caption text-tertiary mt-1 uppercase">Nepal Tourism Board</span>
                            </a>
                            <a href="{{ route('legal.index') }}" class="group p-space-sm bg-surface-container-low hover:bg-surface-container hover:border-primary/30 flex flex-col items-center justify-center rounded-xl text-center shadow-xs border border-outline/10 transition-all">
                                <span class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary font-bold transition-colors">TAAN</span>
                                <span class="font-badge-caption text-badge-caption text-tertiary mt-1 uppercase">Trekking Agencies</span>
                            </a>
                            <a href="{{ route('legal.index') }}" class="group p-space-sm bg-surface-container-low hover:bg-surface-container hover:border-primary/30 flex flex-col items-center justify-center rounded-xl text-center shadow-xs border border-outline/10 transition-all">
                                <span class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary font-bold transition-colors">NMA</span>
                                <span class="font-badge-caption text-badge-caption text-tertiary mt-1 uppercase">Trekking Assoc.</span>
                            </a>
                            <a href="{{ route('legal.index') }}" class="group p-space-sm bg-surface-container-low hover:bg-surface-container hover:border-primary/30 flex flex-col items-center justify-center rounded-xl text-center shadow-xs border border-outline/10 transition-all">
                                <span class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary font-bold transition-colors">KEEP</span>
                                <span class="font-badge-caption text-badge-caption text-tertiary mt-1 uppercase">Eco-Tourism Project</span>
                            </a>
                            <a href="{{ route('legal.index') }}" class="group p-space-sm bg-surface-container-low hover:bg-surface-container hover:border-primary/30 flex flex-col items-center justify-center rounded-xl text-center shadow-xs border border-outline/10 transition-all">
                                <span class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary font-bold transition-colors">IMEC</span>
                                <span class="font-badge-caption text-badge-caption text-tertiary mt-1 uppercase">Porter Protection</span>
                            </a>
                        </div>
                    @endif
                </div>
            </section>
            <!-- Interactive Submission Success Modal -->
            <div
                class="p-space-md bg-ridge-deep/60 fixed inset-0 z-50 flex hidden items-center justify-center backdrop-blur-md"
                id="formSuccessModal"
            >
                <div class="bg-surface-container-lowest p-space-xl gap-space-md flex w-full max-w-lg flex-col items-center rounded-2xl text-center shadow-2xl border border-outline/15">
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
                            receive an initial alpine briefing blog and WhatsApp call invitation within 4 hours.
                        </p>
                    </div>
                    <button
                        class="py-space-sm px-space-md bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md w-full rounded-xl font-bold uppercase shadow-sm transition-colors cursor-pointer"
                        onclick="document.getElementById('formSuccessModal').classList.add('hidden')"
                        type="button"
                    >
                        Return to Contact Page
                    </button>
                </div>
            </div>
            <!-- Micro-interactions JavaScript -->
        </div>
    </main>
    <x-footer />
</x-layouts.app>
