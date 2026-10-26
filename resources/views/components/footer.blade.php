<footer class="bg-surface-container-lowest w-full border-t border-outline/10 text-on-surface">
    <!-- Main Navigation & Content Columns -->
    <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop py-space-3xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-y-10 gap-x-8 lg:gap-x-12">
            
            <!-- Col 1: Brand & Contact Info (4 cols) -->
            <div class="lg:col-span-4 space-y-space-md">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    @if (!empty($websiteSettings['logo']))
                        <img src="{{ Storage::url($websiteSettings['logo']) }}"
                            alt="{{ $contact?->company_name ?? config('app.name') }}"
                            class="h-10 w-auto object-contain">
                    @else
                        <span class="font-headline-sm text-headline-sm font-bold tracking-tight uppercase text-on-surface">
                            {{ $contact?->company_name ?? config('app.name') }}
                        </span>
                    @endif
                </a>

                <p class="font-body-sm text-xs text-tertiary max-w-sm leading-relaxed">
                    {{ $websiteSettings['slogan'] ?? 'Bespoke Himalayan expeditions, classic high passes, and authentic guide-led journeys across Nepal.' }}
                </p>

                <!-- Contact & Legal Credentials -->
                <div class="space-y-2.5 text-xs text-tertiary pt-1">
                    @if ($contact?->registration_number)
                        <div class="flex items-center gap-2">
                            <x-lucide-file-badge class="size-4 text-primary shrink-0" />
                            <span class="font-medium">Govt. Reg. No: <strong class="text-on-surface">{{ $contact->registration_number }}</strong></span>
                        </div>
                    @endif

                    <div class="flex items-start gap-2">
                        <x-lucide-map-pin class="size-4 text-primary shrink-0 mt-0.5" />
                        <span>{{ $contact?->address ?? 'Kathmandu, Nepal' }}</span>
                    </div>

                    @if ($contact?->phone)
                        <div class="flex items-center gap-2">
                            <x-lucide-phone class="size-4 text-primary shrink-0" />
                            <a class="hover:text-primary transition-colors font-medium text-on-surface"
                                href="tel:{{ preg_replace('/[^0-9+]/', '', $contact->phone) }}">
                                {{ $contact->phone }}
                            </a>
                        </div>
                    @endif

                    @if ($contact?->email)
                        <div class="flex items-center gap-2">
                            <x-lucide-mail class="size-4 text-primary shrink-0" />
                            <a class="hover:text-primary transition-colors text-on-surface font-medium"
                                href="mailto:{{ $contact->email }}">
                                {{ $contact->email }}
                            </a>
                        </div>
                    @endif

                    @if ($contact?->working_hours)
                        <div class="flex items-center gap-2">
                            <x-lucide-clock class="size-4 text-primary shrink-0" />
                            <span>{{ $contact->working_hours }}</span>
                        </div>
                    @endif
                </div>

                <!-- Social Links Icon Buttons -->
                @if(isset($socials) && $socials->isNotEmpty())
                    <div class="pt-2">
                        <div class="flex flex-wrap items-center gap-2">
                            @foreach ($socials as $social)
                                <a 
                                    href="{{ $social->url }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    aria-label="{{ $social->platform }}"
                                    class="size-9 rounded-xl bg-surface-container-low hover:bg-primary-container text-tertiary hover:text-on-primary-fixed border border-outline/10 hover:border-primary/30 flex items-center justify-center transition-all shadow-xs hover:scale-105"
                                >
                                    @if (strtolower($social->platform) === 'facebook')
                                        <x-lucide-facebook class="size-4" />
                                    @elseif (strtolower($social->platform) === 'instagram')
                                        <x-lucide-instagram class="size-4" />
                                    @elseif (strtolower($social->platform) === 'twitter' || strtolower($social->platform) === 'x')
                                        <x-lucide-twitter class="size-4" />
                                    @elseif (strtolower($social->platform) === 'youtube')
                                        <x-lucide-youtube class="size-4" />
                                    @elseif (strtolower($social->platform) === 'linkedin')
                                        <x-lucide-linkedin class="size-4" />
                                    @elseif (strtolower($social->platform) === 'tiktok')
                                        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5" />
                                        </svg>
                                    @else
                                        <x-lucide-globe class="size-4" />
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Col 2: Himalayan Expeditions (3 cols) -->
            <div class="lg:col-span-3 space-y-space-sm">
                <div class="font-label-md text-xs font-bold text-on-surface uppercase tracking-wider flex items-center gap-1.5">
                    <span class="size-1.5 rounded-full bg-primary"></span>
                    Himalayan Expeditions
                </div>
                <ul class="space-y-2 font-body-sm text-xs text-tertiary">
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('treks') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Nepal Trekking Catalog</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('schedules') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Guaranteed Departures</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('services.category', 'trekking') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Classic High Passes</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('services.category', 'tours-experiences') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Tours &amp; Experiences</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('services.category', 'adventures') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Peak Climbing &amp; Alpine</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('plan-your-trek') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Plan Custom Itinerary</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('search') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Search Himalayan Routes</a></li>
                </ul>
            </div>

            <!-- Col 3: Company & Stories (2 cols) -->
            <div class="lg:col-span-2 space-y-space-sm">
                <div class="font-label-md text-xs font-bold text-on-surface uppercase tracking-wider flex items-center gap-1.5">
                    <span class="size-1.5 rounded-full bg-primary"></span>
                    Company &amp; Community
                </div>
                <ul class="space-y-2 font-body-sm text-xs text-tertiary">
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('about') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Our Story</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('team') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Mountain Guides</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('reviews') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Client Reviews</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('write-review') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Write a Review</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('blog') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Travel Guides &amp; Blog</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('projects') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Trek Case Studies</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('gallery') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Photo Gallery</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('careers.index') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Careers</a></li>
                    <li><a class="hover:text-primary transition-colors flex items-center gap-1.5 py-0.5" href="{{ route('contact') }}"><x-lucide-chevron-right class="size-3 text-outline" /> Contact Us</a></li>
                </ul>
            </div>

            <!-- Col 4: Newsletter & Direct Messaging (3 cols) -->
            <div class="lg:col-span-3 space-y-space-sm">
                <div class="font-label-md text-xs font-bold text-on-surface uppercase tracking-wider flex items-center gap-1.5">
                    <span class="size-1.5 rounded-full bg-primary"></span>
                    Kathmandu Briefing
                </div>
                <p class="font-body-sm text-xs text-tertiary leading-relaxed">
                    Subscribe for seasonal pass advisories, permit regulations, and early-bird slots.
                </p>

                <form id="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-2 pt-1">
                    @csrf
                    <div>
                        <input 
                            type="email" 
                            id="newsletter-email" 
                            name="email" 
                            placeholder="Enter your email address" 
                            required
                            class="w-full px-3.5 py-2.5 bg-surface-container-low border border-outline/15 rounded-xl text-xs text-on-surface placeholder:text-tertiary focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all shadow-xs"
                        />
                    </div>
                    <button 
                        type="submit" 
                        id="newsletter-submit" 
                        class="w-full py-2.5 px-4 bg-primary-container hover:bg-amber-flare text-on-primary-fixed text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-sm hover:shadow-md cursor-pointer flex items-center justify-center gap-1.5"
                    >
                        <span>Subscribe to Newsletter</span>
                        <x-lucide-send class="size-3.5" />
                    </button>
                    <p id="newsletter-error" class="text-error text-xs hidden"></p>
                    <p id="newsletter-success" class="text-success text-xs hidden font-medium"></p>
                </form>

                @if($contact?->whatsapp)
                    @php
                        $waClean = preg_replace('/[^0-9]/', '', $contact->whatsapp);
                    @endphp
                    <div class="pt-2">
                        <a 
                            href="https://wa.me/{{ $waClean }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 px-3.5 py-2.5 text-success rounded-xl text-xs font-semibold transition-colors border border-success/20 w-full justify-center"
                        >
                            <x-lucide-message-circle class="size-4" />
                            <span>Chat on WhatsApp</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        {{-- ───────────────────────────────────────────────────────────── --}}
        {{-- AFFILIATIONS & PAYMENT METHODS SECTION                      --}}
        {{-- ───────────────────────────────────────────────────────────── --}}
        @if((isset($affiliations) && $affiliations->isNotEmpty()) || (isset($paymentMethods) && $paymentMethods->isNotEmpty()))
            <div x-data="{
                activePayment: null,
                openDetails(payment) {
                    this.activePayment = payment;
                },
                closeDetails() {
                    this.activePayment = null;
                }
            }" class="pt-space-xl mt-space-2xl border-t border-outline/10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-space-xl items-start">
                    {{-- 1. OUR AFFILIATIONS --}}
                    @if(isset($affiliations) && $affiliations->isNotEmpty())
                        <div class="space-y-space-xs">
                            <div class="font-label-md text-xs font-bold text-on-surface uppercase tracking-wider flex items-center gap-1.5">
                                <x-lucide-award class="size-3.5 text-primary" />
                                Our Affiliations
                            </div>
                            <div class="flex flex-wrap items-center gap-4 pt-1">
                                @foreach($affiliations as $affiliation)
                                    @php
                                        $logoUrl = \Illuminate\Support\Facades\Storage::url($affiliation->logo);
                                    @endphp
                                    @if($affiliation->link)
                                        <a href="{{ $affiliation->link }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           title="{{ $affiliation->name }}"
                                           class="inline-block">
                                            <img src="{{ $logoUrl }}"
                                                 alt="{{ $affiliation->name }}"
                                                 class="h-9 md:h-11 w-auto max-w-[130px] object-contain rounded-lg" />
                                        </a>
                                    @else
                                        <div title="{{ $affiliation->name }}" class="inline-block">
                                            <img src="{{ $logoUrl }}"
                                                 alt="{{ $affiliation->name }}"
                                                 class="h-9 md:h-11 w-auto max-w-[130px] object-contain rounded-lg" />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- 2. ACCEPTED PAYMENT METHODS --}}
                    @if(isset($paymentMethods) && $paymentMethods->isNotEmpty())
                        <div class="space-y-space-xs lg:text-right">
                            <div class="font-label-md text-xs font-bold text-on-surface uppercase tracking-wider flex items-center gap-1.5 lg:justify-end">
                                <x-lucide-lock class="size-3.5 text-primary" />
                                We Accept
                            </div>
                            <div class="flex flex-wrap items-center gap-3 pt-1 lg:justify-end">
                                @foreach($paymentMethods as $payment)
                                    @php
                                        $hasDetails = !empty(trim(strip_tags($payment->details ?? '')));
                                    @endphp
                                    <button
                                        type="button"
                                        @if($hasDetails)
                                            @click="openDetails({{ Js::from([
                                                'name' => $payment->name,
                                                'logo' => $payment->logo ? \Illuminate\Support\Facades\Storage::url($payment->logo) : null,
                                                'details' => $payment->details
                                            ]) }})"
                                            title="Click to view {{ $payment->name }} details"
                                        @else
                                            title="{{ $payment->name }}"
                                        @endif
                                        class="inline-block focus:outline-none {{ $hasDetails ? 'cursor-pointer' : 'cursor-default' }}"
                                    >
                                        @if($payment->logo)
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($payment->logo) }}"
                                                 alt="{{ $payment->name }}"
                                                 title="{{ $payment->name }}"
                                                 class="h-7 md:h-8 w-auto max-w-[75px] object-contain rounded-lg" />
                                        @else
                                            <span class="inline-flex items-center gap-1 text-xs text-tertiary hover:text-on-surface font-medium">
                                                <x-lucide-credit-card class="size-3.5 text-primary shrink-0" />
                                                <span>{{ $payment->name }}</span>
                                            </span>
                                        @endif
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- PAYMENT METHOD DETAILS MODAL --}}
                <div
                    x-show="activePayment"
                    x-cloak
                    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-xs"
                    @keydown.escape.window="closeDetails()"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                >
                    <div
                        class="bg-surface-container-lowest max-w-lg w-full rounded-2xl shadow-2xl border border-outline/15 overflow-hidden text-left"
                        @click.away="closeDetails()"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                    >
                        <div class="p-6 border-b border-outline/10 flex items-center justify-between bg-surface-container-low/50">
                            <div class="flex items-center gap-3">
                                <template x-if="activePayment?.logo">
                                    <div class="h-10 w-16 bg-surface border border-outline/10 rounded-lg p-1 flex items-center justify-center">
                                        <img :src="activePayment.logo" :alt="activePayment.name" class="max-h-full max-w-full object-contain" />
                                    </div>
                                </template>
                                <template x-if="!activePayment?.logo">
                                    <div class="h-10 w-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center">
                                        <x-lucide-credit-card class="size-5" />
                                    </div>
                                </template>
                                <div>
                                    <h3 class="text-base font-bold text-on-surface" x-text="activePayment?.name"></h3>
                                    <p class="text-xs text-tertiary">Accepted Payment Details</p>
                                </div>
                            </div>
                            <button
                                type="button"
                                @click="closeDetails()"
                                class="rounded-lg p-1.5 text-tertiary hover:text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer"
                            >
                                <x-lucide-x class="size-5" />
                            </button>
                        </div>
                        <div class="p-6 max-h-[60vh] overflow-y-auto">
                            <div class="prose text-sm text-on-surface/90 max-w-none" x-html="activePayment?.details"></div>
                        </div>
                        <div class="px-6 py-4 bg-surface-container-low/30 border-t border-outline/10 flex justify-end">
                            <button
                                type="button"
                                @click="closeDetails()"
                                class="px-5 py-2 bg-primary-container hover:bg-amber-flare text-on-primary-fixed rounded-xl font-bold text-xs uppercase tracking-wider transition-colors shadow-xs cursor-pointer"
                            >
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- 4. Bottom Legal / Copyright Bar -->
        <div class="pt-space-xl mt-space-xl border-t border-outline/10 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-tertiary">
            <div class="flex flex-wrap items-center gap-x-2 gap-y-1 text-center md:text-left">
                <span>&copy; {{ date('Y') }} {{ $contact?->company_name ?? config('app.name') }}. All rights reserved.</span>
            </div>

            <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-center md:text-right">
                <a class="hover:text-primary transition-colors font-medium" href="{{ route('legal.index') }}">Legal &amp; Policies</a>
                @if(isset($navLegalDocuments) && $navLegalDocuments->isNotEmpty())
                    @foreach($navLegalDocuments->take(3) as $legalDoc)
                        <a class="hover:text-primary transition-colors text-tertiary/80" href="{{ route('legal-document.show', $legalDoc->slug) }}" target="_blank">
                            {{ $legalDoc->title }}
                        </a>
                    @endforeach
                @endif
                <a class="hover:text-primary transition-colors text-tertiary/80" href="{{ route('contact') }}">Support</a>
            </div>
        </div>
    </div>

    <!-- Newsletter Script -->
    <script>
        document.getElementById('newsletter-form')?.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const form = e.target;
            const submitBtn = document.getElementById('newsletter-submit');
            const errorEl = document.getElementById('newsletter-error');
            const successEl = document.getElementById('newsletter-success');
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Wait...</span>';
            errorEl.classList.add('hidden');
            successEl.classList.add('hidden');
            
            try {
                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: formData
                });
                
                const data = await response.json();
                
                if (!response.ok) {
                    if (response.status === 422 && data.errors && data.errors.email) {
                        errorEl.innerText = data.errors.email[0];
                    } else {
                        errorEl.innerText = data.message || 'Something went wrong. Please try again.';
                    }
                    errorEl.classList.remove('hidden');
                } else {
                    successEl.innerText = data.message;
                    successEl.classList.remove('hidden');
                    form.reset();
                }
            } catch (err) {
                errorEl.innerText = 'Network error. Please try again.';
                errorEl.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<span>Subscribe to Newsletter</span> <svg class="size-3.5 inline ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>';
            }
        });
    </script>
</footer>
