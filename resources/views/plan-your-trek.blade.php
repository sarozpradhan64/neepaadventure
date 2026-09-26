<x-layouts.app>
    <x-header />
    <main class="bg-surface pb-space-3xl w-full pt-48">
        <div class="px-gutter-mobile lg:px-gutter-desktop mx-auto max-w-4xl">
            <div class="gap-space-2xs mb-space-xl flex flex-col text-center">
                <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-widest uppercase">Confidential Consultation</span>
                <h1 class="font-display-sm text-display-sm sm:text-display-md text-on-surface font-bold">
                    Plan Your Trek
                </h1>
                <p class="font-body-md text-body-md text-tertiary mx-auto max-w-2xl">
                    Submit your alpine profile and itinerary targets. Our licensed Trek Directors calculate logistics,
                    guide ratios, and acclimatization profiles.
                </p>
            </div>

            <div
                class="bg-surface-container-lowest p-space-lg sm:p-space-xl border-surface-container-low rounded-xl border shadow-md"
                id="trek-form-container"
            >
                <form
                    class="gap-space-md flex flex-col"
                    id="plan-your-trek-form"
                    method="POST"
                    action="{{ route('plan-your-trek.store') }}"
                >
                    @csrf
                    <div class="gap-space-md grid grid-cols-1 sm:grid-cols-2">
                        <div class="gap-space-2xs flex flex-col">
                            <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Full Name *</label>
                            <div class="relative flex items-center">
                                <x-lucide-user class="left-space-sm text-tertiary absolute size-[18px]" />
                                <input
                                    class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full rounded-lg border pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none"
                                    placeholder="e.g. Dr. Arthur Hansen"
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
                                    class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full rounded-lg border pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none"
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
                            <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Country of Residence</label>
                            <div class="relative flex items-center">
                                <x-lucide-globe class="left-space-sm text-tertiary absolute size-[18px]" />
                                <input
                                    class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full rounded-lg border pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none"
                                    placeholder="e.g. Switzerland / USA / UK"
                                    name="country"
                                    type="text"
                                />
                            </div>
                        </div>
                        <div class="gap-space-2xs flex flex-col">
                            <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Phone / WhatsApp *</label>
                            <div class="relative flex items-center">
                                <x-lucide-message-circle class="left-space-sm text-tertiary absolute size-[18px]" />
                                <input
                                    class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full rounded-lg border pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none"
                                    placeholder="+1 234 567 8900"
                                    name="phone"
                                    required=""
                                    type="tel"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="gap-space-md grid grid-cols-1 sm:grid-cols-2">
                        <div class="gap-space-2xs flex flex-col">
                            <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Target Mountain Region</label>
                            <div class="relative flex items-center">
                                <x-lucide-mountain class="left-space-sm text-tertiary absolute size-[18px]" />
                                <select
                                    name="service_id"
                                    class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full cursor-pointer appearance-none rounded-lg border pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none"
                                >
                                    <option value="">Select a Region / Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                <x-lucide-chevron-down class="right-space-sm text-tertiary pointer-events-none absolute size-[18px]" />
                            </div>
                        </div>
                        <div class="gap-space-2xs flex flex-col">
                            <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Estimated Window &amp; Duration</label>
                            <div class="relative flex items-center">
                                <x-lucide-calendar-days class="left-space-sm text-tertiary absolute size-[18px]" />
                                <input
                                    class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full rounded-lg border pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none"
                                    placeholder="e.g. October 2025 (~18 Days)"
                                    name="window"
                                    type="text"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="gap-space-md grid grid-cols-1 sm:grid-cols-2">
                        <div class="gap-space-2xs flex flex-col">
                            <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Roster &amp; Group Size</label>
                            <div class="relative flex items-center">
                                <x-lucide-users class="left-space-sm text-tertiary absolute size-[18px]" />
                                <select
                                    name="group_size"
                                    class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full cursor-pointer appearance-none rounded-lg border pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none"
                                >
                                    <option value="Solo Alpine Trekker (1:1 Guide)">
                                        Solo Alpine Trekker (1:1 Guide)
                                    </option>
                                    <option value="Couple / Pair (2 Pax)">Couple / Pair (2 Pax)</option>
                                    <option value="Private Small Party (3 – 5 Pax)">
                                        Private Small Party (3 – 5 Pax)
                                    </option>
                                    <option value="Trek Team (6 – 10 Pax)">Trek Team (6 – 10 Pax)</option>
                                    <option value="Alpine Club / University Group (10+ Pax)">
                                        Alpine Club / University Group (10+ Pax)
                                    </option>
                                </select>
                                <x-lucide-chevron-down class="right-space-sm text-tertiary pointer-events-none absolute size-[18px]" />
                            </div>
                        </div>
                        <div class="gap-space-2xs flex flex-col">
                            <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">High-Altitude Experience</label>
                            <div class="relative flex items-center">
                                <x-lucide-footprints class="left-space-sm text-tertiary absolute size-[18px]" />
                                <select
                                    name="experience"
                                    class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full cursor-pointer appearance-none rounded-lg border pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none"
                                >
                                    <option value="First time in the Himalaya (Beginner to Altitude)">
                                        First time in the Himalaya
                                    </option>
                                    <option value="Experienced up to 4,000m - 5,000m (Kilimanjaro/Alps)">
                                        Experienced up to 4,000m - 5,000m
                                    </option>
                                    <option value="High Pass Ascent completed (6,000m / Mera / Island)">
                                        High Pass Ascent completed
                                    </option>
                                    <option value="Technical Multi-Pitch / 7,000m+ Veteran">
                                        Technical Multi-Pitch / 7,000m+ Veteran
                                    </option>
                                </select>
                                <x-lucide-chevron-down class="right-space-sm text-tertiary pointer-events-none absolute size-[18px]" />
                            </div>
                        </div>
                    </div>

                    <div class="gap-space-xs pt-space-xs flex flex-col">
                        <span class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Logistics &amp; Field Directives</span>
                        <div class="gap-space-xs grid grid-cols-1 sm:grid-cols-2">
                            <label class="gap-space-xs p-space-xs bg-surface-container-low/70 hover:bg-surface-container-low flex cursor-pointer items-center rounded transition-colors">
                                <input
                                    class="text-primary focus:ring-primary-container border-surface-variant h-4 w-4 rounded"
                                    name="logistics[]"
                                    value="Bespoke Dietary / High-Calorie Nutrition"
                                    type="checkbox"
                                />
                                <span class="font-body-sm text-body-sm text-on-surface">Bespoke Dietary / High-Calorie Nutrition</span>
                            </label>
                            <label class="gap-space-xs p-space-xs bg-surface-container-low/70 hover:bg-surface-container-low flex cursor-pointer items-center rounded transition-colors">
                                <input
                                    class="text-primary focus:ring-primary-container border-surface-variant h-4 w-4 rounded"
                                    name="logistics[]"
                                    value="Private Single Room / Tent Logistics"
                                    type="checkbox"
                                />
                                <span class="font-body-sm text-body-sm text-on-surface">Private Single Room / Tent Logistics</span>
                            </label>
                            <label class="gap-space-xs p-space-xs bg-surface-container-low/70 hover:bg-surface-container-low flex cursor-pointer items-center rounded transition-colors">
                                <input
                                    class="text-primary focus:ring-primary-container border-surface-variant h-4 w-4 rounded"
                                    name="logistics[]"
                                    value="Helicopter Lukla / Basecamp Return Option"
                                    type="checkbox"
                                />
                                <span class="font-body-sm text-body-sm text-on-surface">Helicopter Return Option</span>
                            </label>
                            <label class="gap-space-xs p-space-xs bg-surface-container-low/70 hover:bg-surface-container-low flex cursor-pointer items-center rounded transition-colors">
                                <input
                                    class="text-primary focus:ring-primary-container border-surface-variant h-4 w-4 rounded"
                                    name="logistics[]"
                                    value="Garmin inReach Rented Dispatch Unit"
                                    type="checkbox"
                                />
                                <span class="font-body-sm text-body-sm text-on-surface">Garmin inReach Rental</span>
                            </label>
                        </div>
                    </div>

                    <div class="gap-space-2xs pt-space-xs flex flex-col">
                        <label class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Trek Objectives &amp; Medical Notes</label>
                        <textarea
                            name="notes"
                            class="p-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full rounded-lg border shadow-sm transition-all focus:ring-2 focus:outline-none"
                            placeholder="Detail your fitness background, destination ambitions, preferred gear requirements, or any specific acclimatization pace adjustments needed..."
                            rows="4"
                        ></textarea>
                    </div>

                    <div id="form-alert" class="relative hidden rounded px-4 py-3" role="alert">
                        <span class="block sm:inline" id="form-message"></span>
                    </div>

                    <div class="pt-space-sm gap-space-xs flex flex-col">
                        <button
                            id="submit-btn"
                            class="py-space-md px-space-xl bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-headline-sm text-headline-sm gap-space-xs flex w-full items-center justify-center rounded-lg font-bold tracking-wider uppercase shadow-md transition-all"
                            type="submit"
                        >
                            <x-lucide-send class="size-4" id="submit-icon" />
                            <span id="submit-text">Submit Trek Brief</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('plan-your-trek-form');
            const alertBox = document.getElementById('form-alert');
            const alertMsg = document.getElementById('form-message');
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // Set loading state
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
                submitText.textContent = 'Submitting...';

                // Hide previous alerts
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
                        return response.json().then((data) => ({ status: response.status, body: data }));
                    })
                    .then(({ status, body }) => {
                        alertBox.classList.remove('hidden');
                        if (status === 200 || status === 201 || body.success) {
                            alertBox.classList.add('bg-green-100', 'border', 'border-green-400', 'text-green-700');
                            alertMsg.textContent = body.message || 'Your inquiry has been submitted successfully.';
                            form.reset();
                        } else {
                            alertBox.classList.add('bg-red-100', 'border', 'border-red-400', 'text-red-700');
                            alertMsg.textContent = body.message || 'Something went wrong. Please check your inputs.';
                        }
                    })
                    .catch((error) => {
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
