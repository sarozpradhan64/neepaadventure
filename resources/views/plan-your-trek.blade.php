<x-layouts.app>
    <x-header />
    <main class="w-full pt-48 bg-surface pb-space-3xl">
        <div class="max-w-4xl mx-auto px-gutter-mobile lg:px-gutter-desktop">
            <div class="flex flex-col gap-space-2xs text-center mb-space-xl">
                <span class="font-badge-caption text-badge-caption text-primary uppercase tracking-widest font-bold">Confidential Consultation</span>
                <h1 class="font-display-sm text-display-sm sm:text-display-md font-bold text-on-surface">Plan Your Trek</h1>
                <p class="font-body-md text-body-md text-tertiary max-w-2xl mx-auto">
                    Submit your alpine profile and itinerary targets. Our licensed Trek Directors calculate logistics, guide ratios, and acclimatization profiles.
                </p>
            </div>

            <div class="bg-surface-container-lowest p-space-lg sm:p-space-xl rounded-xl shadow-md border border-surface-container-low" id="trek-form-container">
                <form class="flex flex-col gap-space-md" id="plan-your-trek-form" method="POST" action="{{ route('plan-your-trek.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                        <div class="flex flex-col gap-space-2xs">
                            <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Full Name *</label>
                            <div class="relative flex items-center">
                                <x-lucide-user class="absolute left-space-sm text-tertiary size-[18px]" />
                                <input class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm border border-surface-container focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" placeholder="e.g. Dr. Arthur Hansen" name="name" required="" type="text">
                            </div>
                        </div>
                        <div class="flex flex-col gap-space-2xs">
                            <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Email Address *</label>
                            <div class="relative flex items-center">
                                <x-lucide-mail class="absolute left-space-sm text-tertiary size-[18px]" />
                                <input class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm border border-surface-container focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" placeholder="you@example.com" name="email" required="" type="email">
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                        <div class="flex flex-col gap-space-2xs">
                            <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Country of Residence</label>
                            <div class="relative flex items-center">
                                <x-lucide-globe class="absolute left-space-sm text-tertiary size-[18px]" />
                                <input class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm border border-surface-container focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" placeholder="e.g. Switzerland / USA / UK" name="country" type="text">
                            </div>
                        </div>
                        <div class="flex flex-col gap-space-2xs">
                            <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Phone / WhatsApp *</label>
                            <div class="relative flex items-center">
                                <x-lucide-message-circle class="absolute left-space-sm text-tertiary size-[18px]" />
                                <input class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm border border-surface-container focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" placeholder="+1 234 567 8900" name="phone" required="" type="tel">
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                        <div class="flex flex-col gap-space-2xs">
                            <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Target Mountain Region</label>
                            <div class="relative flex items-center">
                                <x-lucide-mountain class="absolute left-space-sm text-tertiary size-[18px]" />
                                <select name="service_id" class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm border border-surface-container appearance-none focus:outline-none focus:ring-2 focus:ring-primary-container transition-all cursor-pointer">
                                    <option value="">Select a Region / Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                <x-lucide-chevron-down class="absolute right-space-sm text-tertiary pointer-events-none size-[18px]" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-space-2xs">
                            <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Estimated Window &amp; Duration</label>
                            <div class="relative flex items-center">
                                <x-lucide-calendar-days class="absolute left-space-sm text-tertiary size-[18px]" />
                                <input class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm border border-surface-container focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" placeholder="e.g. October 2025 (~18 Days)" name="window" type="text">
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                        <div class="flex flex-col gap-space-2xs">
                            <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Roster &amp; Group Size</label>
                            <div class="relative flex items-center">
                                <x-lucide-users class="absolute left-space-sm text-tertiary size-[18px]" />
                                <select name="group_size" class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm border border-surface-container appearance-none focus:outline-none focus:ring-2 focus:ring-primary-container transition-all cursor-pointer">
                                    <option value="Solo Alpine Trekker (1:1 Sherpa)">Solo Alpine Trekker (1:1 Sherpa)</option>
                                    <option value="Couple / Pair (2 Pax)">Couple / Pair (2 Pax)</option>
                                    <option value="Private Small Party (3 – 5 Pax)">Private Small Party (3 – 5 Pax)</option>
                                    <option value="Trek Team (6 – 10 Pax)">Trek Team (6 – 10 Pax)</option>
                                    <option value="Alpine Club / University Group (10+ Pax)">Alpine Club / University Group (10+ Pax)</option>
                                </select>
                                <x-lucide-chevron-down class="absolute right-space-sm text-tertiary pointer-events-none size-[18px]" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-space-2xs">
                            <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">High-Altitude Experience</label>
                            <div class="relative flex items-center">
                                <x-lucide-footprints class="absolute left-space-sm text-tertiary size-[18px]" />
                                <select name="experience" class="w-full pl-10 pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm border border-surface-container appearance-none focus:outline-none focus:ring-2 focus:ring-primary-container transition-all cursor-pointer">
                                    <option value="First time in the Himalaya (Beginner to Altitude)">First time in the Himalaya</option>
                                    <option value="Experienced up to 4,000m - 5,000m (Kilimanjaro/Alps)">Experienced up to 4,000m - 5,000m</option>
                                    <option value="High Pass Ascent completed (6,000m / Mera / Island)">High Pass Ascent completed</option>
                                    <option value="Technical Multi-Pitch / 7,000m+ Veteran">Technical Multi-Pitch / 7,000m+ Veteran</option>
                                </select>
                                <x-lucide-chevron-down class="absolute right-space-sm text-tertiary pointer-events-none size-[18px]" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col gap-space-xs pt-space-xs">
                        <span class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Logistics &amp; Field Directives</span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-xs">
                            <label class="flex items-center gap-space-xs p-space-xs rounded bg-surface-container-low/70 hover:bg-surface-container-low cursor-pointer transition-colors">
                                <input class="w-4 h-4 rounded text-primary focus:ring-primary-container border-surface-variant" name="logistics[]" value="Bespoke Dietary / High-Calorie Nutrition" type="checkbox">
                                <span class="font-body-sm text-body-sm text-on-surface">Bespoke Dietary / High-Calorie Nutrition</span>
                            </label>
                            <label class="flex items-center gap-space-xs p-space-xs rounded bg-surface-container-low/70 hover:bg-surface-container-low cursor-pointer transition-colors">
                                <input class="w-4 h-4 rounded text-primary focus:ring-primary-container border-surface-variant" name="logistics[]" value="Private Single Room / Tent Logistics" type="checkbox">
                                <span class="font-body-sm text-body-sm text-on-surface">Private Single Room / Tent Logistics</span>
                            </label>
                            <label class="flex items-center gap-space-xs p-space-xs rounded bg-surface-container-low/70 hover:bg-surface-container-low cursor-pointer transition-colors">
                                <input class="w-4 h-4 rounded text-primary focus:ring-primary-container border-surface-variant" name="logistics[]" value="Helicopter Lukla / Basecamp Return Option" type="checkbox">
                                <span class="font-body-sm text-body-sm text-on-surface">Helicopter Return Option</span>
                            </label>
                            <label class="flex items-center gap-space-xs p-space-xs rounded bg-surface-container-low/70 hover:bg-surface-container-low cursor-pointer transition-colors">
                                <input class="w-4 h-4 rounded text-primary focus:ring-primary-container border-surface-variant" name="logistics[]" value="Garmin inReach Rented Dispatch Unit" type="checkbox">
                                <span class="font-body-sm text-body-sm text-on-surface">Garmin inReach Rental</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="flex flex-col gap-space-2xs pt-space-xs">
                        <label class="font-label-sm text-label-sm font-bold text-on-surface uppercase">Trek Objectives &amp; Medical Notes</label>
                        <textarea name="notes" class="w-full p-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg shadow-sm border border-surface-container focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" placeholder="Detail your fitness background, destination ambitions, preferred gear requirements, or any specific acclimatization pace adjustments needed..." rows="4"></textarea>
                    </div>
                    
                    <div id="form-alert" class="hidden px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline" id="form-message"></span>
                    </div>

                    <div class="pt-space-sm flex flex-col gap-space-xs">
                        <button id="submit-btn" class="w-full py-space-md px-space-xl bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-headline-sm text-headline-sm uppercase tracking-wider font-bold rounded-lg shadow-md transition-all flex items-center justify-center gap-space-xs" type="submit">
                            <x-lucide-send class="size-4" id="submit-icon" />
                            <span id="submit-text">Submit Trek Brief</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('plan-your-trek-form');
            const alertBox = document.getElementById('form-alert');
            const alertMsg = document.getElementById('form-message');
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Set loading state
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
                submitText.textContent = 'Submitting...';
                
                // Hide previous alerts
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
                        alertMsg.textContent = body.message || 'Your inquiry has been submitted successfully.';
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
                    // Reset loading state
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                    submitText.textContent = 'Submit Trek Brief';
                });
            });
        });
    </script>
</x-layouts.app>