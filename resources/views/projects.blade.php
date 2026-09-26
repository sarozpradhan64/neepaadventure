<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-24">
        <div class="flex w-full flex-col">
            <!-- 2. Categorized Trek Projects Directory -->
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface-container-low w-full"
                id="case-studies-grid">
                <div class="max-w-max-content-width mx-auto">
                    <div class="mb-space-2xl space-y-space-xs mx-auto max-w-3xl text-center">
                        <span
                            class="font-label-sm text-label-sm text-primary font-bold tracking-widest uppercase">Verified
                            Client Treks &amp; Field Reports</span>
                        <h2
                            class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight uppercase">
                            Trek Projects Directory
                        </h2>
                        <p class="font-body-md text-body-md text-tertiary">
                            Discover how international trekking clubs, university alpine teams, and private groups
                            achieved their dream Himalayan destinations and traverses under Neepa Adventure leadership.
                        </p>
                        <!-- Dynamic Filter Controls -->
                        <div class="gap-space-xs pt-space-md flex flex-wrap items-center justify-center"
                            id="project-filters">
                            <button
                                class="filter-btn active px-space-md py-space-xs font-label-sm text-label-sm bg-ridge-deep text-summit-white rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                data-filter="all">
                                All Projects ({{ $projects->count() }})
                            </button>
                            @foreach ($categories as $category)
                                <button
                                    class="filter-btn px-space-md py-space-xs font-label-sm text-label-sm bg-surface-container-lowest text-tertiary hover:text-on-surface rounded-lg font-bold tracking-wider uppercase shadow-sm transition-all"
                                    data-filter="{{ $category->slug }}">
                                    {{ $category->name }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <!-- Project Cards Grid -->
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3" id="projects-grid">
                        @forelse ($projects as $project)
                            <div class="project-item bg-surface-container-lowest flex flex-col overflow-hidden rounded-xl shadow-md transition-all hover:-translate-y-1"
                                data-category="{{ $project->category->slug ?? '' }}">
                                <div class="relative h-56 w-full">
                                    <img class="h-full w-full object-cover" alt="{{ $project->title }}"
                                        src="{{ $project->featured_image ? asset('storage/' . $project->featured_image) : asset('images/placeholder.jpg') }}" />
                                    <span
                                        class="bg-primary-container text-on-primary-fixed font-badge-caption text-badge-caption px-space-sm py-space-2xs absolute top-3 left-3 flex items-center gap-1 rounded-md font-bold tracking-wider uppercase">
                                        Team {{ $project->nation }} &bull; {{ $project->team_size }}
                                    </span>
                                    <span
                                        class="bg-ridge-deep/80 text-summit-white font-label-sm text-label-sm px-space-sm py-space-2xs absolute right-3 bottom-3 rounded-md backdrop-blur-md">
                                        {{ $project->location ?? '' }}
                                    </span>
                                </div>
                                <div class="p-space-lg space-y-space-md flex flex-1 flex-col justify-between">
                                    <div>
                                        <div
                                            class="text-tertiary font-label-sm text-label-sm mb-space-2xs flex items-center justify-between font-semibold tracking-wider uppercase">
                                            <span>{{ $project->category->name ?? '' }}</span>
                                            <span class="text-primary font-bold">{{ $project->duration }}</span>
                                        </div>
                                        <h3
                                            class="font-headline-sm text-headline-sm text-on-surface leading-snug font-bold tracking-tight">
                                            {{ $project->title }}
                                        </h3>
                                        <p class="font-body-md text-body-md text-tertiary mt-space-xs">
                                            {{ $project->short_description }}
                                        </p>
                                    </div>
                                    <div class="border-surface-container-high space-y-2 border-t pt-2">
                                        <div class="text-body-sm grid grid-cols-2 gap-2">
                                            <div class="text-tertiary">
                                                Max Altitude:
                                                <strong class="text-on-surface">{{ $project->max_altitude }}</strong>
                                            </div>
                                            <div class="text-tertiary">
                                                Destination Success:
                                                <strong
                                                    class="text-primary">{{ $project->destination_success }}</strong>
                                            </div>
                                            <div class="text-tertiary">
                                                Lead By:
                                                <strong class="text-on-surface">{{ $project->lead_by }}</strong>
                                            </div>
                                            <div class="text-tertiary">
                                                Season: <strong class="text-on-surface">{{ $project->season }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="pt-space-sm bg-surface-container-low/50 -mx-space-lg -mb-space-lg p-space-lg flex items-center justify-between">
                                        <button
                                            class="py-space-2xs px-space-sm bg-surface-container-high hover:bg-primary-container hover:text-on-primary-fixed font-label-sm text-label-sm text-on-surface inline-flex w-full items-center justify-center gap-1.5 rounded-lg font-bold transition-all"
                                            onclick="openProjectModal('{{ addslashes($project->dossier_title ?? $project->title) }}', '{{ addslashes($project->dossier_description ?? $project->short_description) }}', '{{ addslashes($project->client_name ?? '') }}', '{{ addslashes($project->lead_by ?? '') }}', '{{ addslashes($project->inclusions ?? '') }}')">
                                            <x-lucide-eye class="size-[16px]" />
                                            <span>View Project Case Dossier</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-tertiary col-span-full py-12 text-center">No projects found.</div>
                        @endforelse
                    </div>
                </div>
            </section>
            <!-- 5. How We Structure Your Custom Team Project -->
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full">
                <div class="max-w-max-content-width mx-auto">
                    <div class="mb-space-2xl space-y-space-xs mx-auto max-w-3xl text-center">
                        <span
                            class="font-label-sm text-label-sm text-primary font-bold tracking-widest uppercase">Standard
                            of Excellence for Custom Groups</span>
                        <h2
                            class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight uppercase">
                            How We Structure Your Custom Team Project
                        </h2>
                        <p class="font-body-md text-body-md text-tertiary">
                            Whether you lead an alpine trekking federation, university exploration society, or executive
                            group, our Kathmandu team engineers every logistics layer.
                        </p>
                    </div>
                    <div class="gap-space-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                        <!-- Step 1 -->
                        <div
                            class="p-space-lg bg-surface-container-lowest space-y-space-sm border-primary flex flex-col justify-between rounded-xl border-t-4 shadow-md">
                            <div class="space-y-space-xs">
                                <div
                                    class="bg-surface-container-high text-primary flex h-12 w-12 items-center justify-center rounded-lg">
                                    <x-lucide-timeline class="size-[28px]" />
                                </div>
                                <span
                                    class="font-badge-caption text-badge-caption text-primary font-bold tracking-wider uppercase">Phase
                                    01 • Custom Design</span>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Acclimatization Modeling
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Every route is tailored to your team's previous alpine exposure with customized
                                    sleep-low trek-high profiles and rest buffer days.
                                </p>
                            </div>
                            <div class="font-label-sm text-label-sm text-primary flex items-center gap-1 font-semibold">
                                <span>Custom Route Maps &amp; GPX</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Step 2 -->
                        <div
                            class="p-space-lg bg-surface-container-lowest space-y-space-sm border-secondary flex flex-col justify-between rounded-xl border-t-4 shadow-md">
                            <div class="space-y-space-xs">
                                <div
                                    class="bg-surface-container-high text-primary flex h-12 w-12 items-center justify-center rounded-lg">
                                    <x-lucide-languages class="size-[28px]" />
                                </div>
                                <span
                                    class="font-badge-caption text-badge-caption text-secondary font-bold tracking-wider uppercase">Phase
                                    02 • Cultural Liaison</span>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Native Language &amp; Nutrition
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    We provide guides fluent in Russian, French, German, or Japanese, alongside tailored
                                    dietary requirements for optimal field endurance.
                                </p>
                            </div>
                            <div
                                class="font-label-sm text-label-sm text-secondary flex items-center gap-1 font-semibold">
                                <span>Multi-Language Briefings</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Step 3 -->
                        <div
                            class="p-space-lg bg-surface-container-lowest space-y-space-sm border-amber-flare flex flex-col justify-between rounded-xl border-t-4 shadow-md">
                            <div class="space-y-space-xs">
                                <div
                                    class="bg-surface-container-high text-primary flex h-12 w-12 items-center justify-center rounded-lg">
                                    <x-lucide-satellite class="size-[28px]" />
                                </div>
                                <span
                                    class="font-badge-caption text-badge-caption text-amber-flare font-bold tracking-wider uppercase">Phase
                                    03 • Real-Time Safety</span>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Satellite Comms &amp; Heli Desk
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Live Garmin inReach breadcrumb tracking paired with 24/7 Kathmandu operations room
                                    and standby high-altitude helicopter rescue insurance coordination.
                                </p>
                            </div>
                            <div
                                class="font-label-sm text-label-sm text-amber-flare flex items-center gap-1 font-semibold">
                                <span>24/7 Active Field Dispatch</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                        <!-- Step 4 -->
                        <div
                            class="p-space-lg bg-surface-container-lowest space-y-space-sm border-tertiary flex flex-col justify-between rounded-xl border-t-4 shadow-md">
                            <div class="space-y-space-xs">
                                <div
                                    class="bg-surface-container-high text-primary flex h-12 w-12 items-center justify-center rounded-lg">
                                    <x-lucide-award class="size-[28px]" />
                                </div>
                                <span
                                    class="font-badge-caption text-badge-caption text-tertiary font-bold tracking-wider uppercase">Phase
                                    04 • Documentation</span>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                                    Certificates &amp; 4K Media
                                </h3>
                                <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                                    Official Nepal Trekking Association destination badges, high-pass crossing
                                    credentials, and curated 4K team trek photo vaults.
                                </p>
                            </div>
                            <div
                                class="font-label-sm text-label-sm text-tertiary flex items-center gap-1 font-semibold">
                                <span>Official Certifications</span>
                                <x-lucide-circle-check class="size-[16px]" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 6. Bottom Call to Action: Custom Project Inquiry -->
            <section
                class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-ridge-deep text-summit-white relative w-full overflow-hidden"
                id="custom-project-inquiry">
                <div class="max-w-max-content-width space-y-space-lg relative z-10 mx-auto text-center">
                    <div
                        class="gap-space-xs px-space-md py-space-2xs bg-summit-white/10 inline-flex items-center rounded-full backdrop-blur-md">
                        <x-lucide-handshake class="text-primary-container size-[18px]" />
                        <span
                            class="font-badge-caption text-badge-caption text-primary-container tracking-wider uppercase">Bespoke
                            Club &amp; Private Treks</span>
                    </div>
                    <h2
                        class="font-headline-lg text-headline-lg lg:text-display-xl text-summit-white mx-auto max-w-4xl leading-tight font-extrabold tracking-tight uppercase">
                        Planning a Private Trek or Club Project in Nepal?
                    </h2>
                    <p class="font-body-lg text-body-lg text-mist-slate/90 mx-auto max-w-2xl">
                        Whether organizing an Annapurna Base Camp team trek from Russia, a UK university alpine project,
                        or a bespoke 6,000m trekking push, consult directly with our Chief Trek Director.
                    </p>
                    <div class="gap-space-md pt-space-sm flex flex-wrap items-center justify-center">
                        <button
                            class="gap-space-xs px-space-xl py-space-md bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md inline-flex items-center rounded-lg font-bold tracking-wider uppercase shadow-xl transition-all hover:-translate-y-0.5"
                            onclick="openPlanCustomModal()">
                            <span>Plan a Custom Group Project</span>
                            <x-lucide-flag class="size-[20px]" />
                        </button>
                        <a class="gap-space-xs px-space-xl py-space-md bg-summit-white/10 hover:bg-summit-white/20 text-summit-white font-label-md text-label-md inline-flex items-center rounded-lg font-bold tracking-wider uppercase shadow-md transition-all"
                            href="#">
                            <x-lucide-download class="size-[20px]" />
                            <span>Download Trek Case Study Guide (PDF)</span>
                        </a>
                    </div>
                    <div
                        class="pt-space-lg gap-space-xl text-mist-slate/70 font-body-sm text-body-sm flex flex-wrap items-center justify-center">
                        <div class="gap-space-2xs flex items-center">
                            <x-lucide-shield class="text-primary-container size-[18px]" />
                            <span>Official Nepal Tourism Board Licensed Agency #89432</span>
                        </div>
                        <div class="gap-space-2xs flex items-center">
                            <x-lucide-headphones class="text-primary-container size-[18px]" />
                            <span>Direct Consultation with Lead Sherpa Operations Desk</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interactive Case Study Detail Modal -->
            <div class="bg-ridge-deep/80 p-space-md fixed inset-0 z-50 flex hidden items-center justify-center backdrop-blur-md"
                id="case-study-modal">
                <div
                    class="bg-surface-container-lowest p-space-xl space-y-space-md relative max-h-[90vh] w-full max-w-xl overflow-y-auto rounded-xl shadow-2xl">
                    <button
                        class="text-tertiary hover:text-on-surface p-space-2xs hover:bg-surface-container-high absolute top-4 right-4 rounded-lg transition-colors"
                        onclick="closeProjectModal()">
                        <x-lucide-x class="size-[24px]" />
                    </button>
                    <div
                        class="gap-space-xs text-primary font-label-sm text-label-sm flex items-center font-bold tracking-wider uppercase">
                        <x-lucide-folder-open class="size-[20px]" />
                        <span>Neepa Adventure Field Dossier</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold" id="modal-project-title">
                        Russian Alpine Club - Annapurna Base Camp
                    </h3>
                    <p class="font-body-sm text-body-sm text-tertiary" id="modal-project-desc">
                        Complete operational debrief, team roster, satellite track record, and altitude profile.
                    </p>
                    <div class="p-space-md bg-surface-container-low text-body-sm space-y-2 rounded-lg">
                        <div class="border-surface-container-high flex justify-between border-b pb-1">
                            <span class="text-tertiary">Trek ID:</span>
                            <span class="text-on-surface font-bold">HK-PROJECT-2024-EXP</span>
                        </div>
                        <div class="border-surface-container-high flex justify-between border-b pb-1">
                            <span class="text-tertiary">Team Origin:</span>
                            <span class="text-on-surface font-bold">International Club Registry</span>
                        </div>
                        <div class="border-surface-container-high flex justify-between border-b pb-1">
                            <span class="text-tertiary">Lead By:</span>
                            <span class="text-primary font-bold" id="modal-lead-by-name">Certified IFMGA / NMA
                                Sherpa</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-tertiary">Medical Evacuations:</span>
                            <span class="text-on-surface font-bold">Zero (Full Vital Telemetry OK)</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="font-label-sm text-label-sm text-on-surface font-bold uppercase">
                            Logistical Feats Handled:
                        </div>
                        <p class="font-body-sm text-body-sm text-tertiary leading-relaxed">
                            Pre-booked private heated rooms across high camps, customized carbohydrate loading meals,
                            direct sat-phone check-ins twice daily, and private return charter transportation.
                        </p>
                    </div>
                    <div class="pt-space-xs flex gap-2">
                        <button
                            class="py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md flex-1 rounded-lg font-bold tracking-wider uppercase shadow-md transition-all"
                            onclick="
                                closeProjectModal();
                                openPlanCustomModal();
                            ">
                            Request Similar Itinerary
                        </button>
                        <button
                            class="px-space-md py-space-sm bg-surface-container-high hover:bg-surface-container text-on-surface font-label-md text-label-md rounded-lg font-semibold transition-colors"
                            onclick="closeProjectModal()">
                            Close
                        </button>
                    </div>
                </div>
            </div>
            <!-- Custom Group Planning Modal -->
            <div class="bg-ridge-deep/80 p-space-md fixed inset-0 z-50 flex hidden items-center justify-center backdrop-blur-md"
                id="plan-modal">
                <div
                    class="bg-surface-container-lowest p-space-xl space-y-space-md relative w-full max-w-lg rounded-xl shadow-2xl">
                    <button
                        class="text-tertiary hover:text-on-surface p-space-2xs hover:bg-surface-container-high absolute top-4 right-4 rounded-lg transition-colors"
                        onclick="closePlanCustomModal()">
                        <x-lucide-x class="size-[24px]" />
                    </button>
                    <div
                        class="gap-space-xs text-primary font-label-sm text-label-sm flex items-center font-bold tracking-wider uppercase">
                        <x-lucide-handshake class="size-[20px]" />
                        <span>Custom Team Trek Inquiry</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                        Organize a Custom Trek or Pass Project
                    </h3>
                    <p class="font-body-sm text-body-sm text-tertiary">
                        Fill out your club or team specifications. Our Chief Operations Sirdar will craft a custom
                        logistics plan within 24 hours.
                    </p>
                    <form class="space-y-space-sm pt-space-xs" onsubmit="handleCustomSubmit(event)">
                        <div>
                            <label
                                class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Lead
                                Organizer / Contact Name</label>
                            <input
                                class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none"
                                placeholder="e.g. Alexey Volkov or Dr. Sarah Jenkins" required=""
                                type="text" />
                        </div>
                        <div class="gap-space-sm grid grid-cols-2">
                            <div>
                                <label
                                    class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Email</label>
                                <input
                                    class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none"
                                    placeholder="alexey@club.org" required="" type="email" />
                            </div>
                            <div>
                                <label
                                    class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Team
                                    Country</label>
                                <input
                                    class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none"
                                    placeholder="e.g. Russia, UK, USA" required="" type="text" />
                            </div>
                        </div>
                        <div class="gap-space-sm grid grid-cols-2">
                            <div>
                                <label
                                    class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Target
                                    Route / Objective</label>
                                <select
                                    class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none">
                                    <option value="abc">Annapurna Sanctuary (ABC)</option>
                                    <option value="ebc">Everest Base Camp &amp; Gokyo</option>
                                    <option value="manaslu">Manaslu Circuit (Larkya La)</option>
                                    <option value="island">Island Pass / Mera Destination</option>
                                    <option value="amadablam">Ama Dablam Southwest Ridge</option>
                                    <option value="bespoke">Other / Custom Trek</option>
                                </select>
                            </div>
                            <div>
                                <label
                                    class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Estimated
                                    Team Size</label>
                                <select
                                    class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none">
                                    <option value="small">Small Team (2 - 5 Climbers)</option>
                                    <option selected="" value="medium">Club Group (6 - 12 Climbers)</option>
                                    <option value="large">Large Delegation (13 - 25+ Climbers)</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label
                                class="font-label-sm text-label-sm text-on-surface mb-space-2xs block font-semibold">Special
                                Language, Nutrition, or Timing Needs</label>
                            <textarea
                                class="px-space-md py-space-xs bg-surface-container-lowest text-on-surface focus:ring-primary font-body-md w-full rounded-lg shadow-sm focus:ring-2 focus:outline-none"
                                placeholder="e.g., Russian-speaking guide required, high-protein menu, January winter dates..." rows="2"></textarea>
                        </div>
                        <button
                            class="py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md mt-space-sm w-full rounded-lg font-bold tracking-wider uppercase shadow-md transition-all"
                            type="submit">
                            Request Custom Trek Proposal
                        </button>
                    </form>
                </div>
            </div>
            <!-- Inline Client Interaction Script -->
            <script>
                function openProjectModal(title, desc, client, lead_by, inclusions) {
                    const modal = document.getElementById('case-study-modal');
                    if (modal) {
                        document.getElementById('modal-project-title').innerText = title || '';
                        document.getElementById('modal-project-desc').innerText = desc || '';

                        // Let's populate the dynamic info list if it exists
                        // You can extend the modal HTML to include these fields with IDs
                        const clientEl = document.getElementById('modal-client-name');
                        if (clientEl) clientEl.innerText = client || 'International Club Registry';

                        const sirdarEl = document.getElementById('modal-lead-by-name');
                        if (sirdarEl) sirdarEl.innerText = lead_by || 'Certified IFMGA / NMA Sherpa';

                        modal.classList.remove('hidden');
                    }
                }

                function closeProjectModal() {
                    const modal = document.getElementById('case-study-modal');
                    if (modal) {
                        modal.classList.add('hidden');
                    }
                }

                function openPlanCustomModal() {
                    const modal = document.getElementById('plan-modal');
                    if (modal) modal.classList.remove('hidden');
                }

                function closePlanCustomModal() {
                    const modal = document.getElementById('plan-modal');
                    if (modal) modal.classList.add('hidden');
                }

                document.addEventListener('DOMContentLoaded', () => {
                    const filterBtns = document.querySelectorAll('.filter-btn');
                    const projectItems = document.querySelectorAll('.project-item');

                    filterBtns.forEach(btn => {
                        btn.addEventListener('click', () => {
                            // Update active state
                            filterBtns.forEach(b => {
                                b.classList.remove('bg-ridge-deep', 'text-summit-white', 'active');
                                b.classList.add('bg-surface-container-lowest', 'text-tertiary', 'hover:text-on-surface');
                            });
                            btn.classList.remove('bg-surface-container-lowest', 'text-tertiary', 'hover:text-on-surface');
                            btn.classList.add('bg-ridge-deep', 'text-summit-white', 'active');

                            const filterValue = btn.getAttribute('data-filter');

                            projectItems.forEach(item => {
                                if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                                    item.style.display = 'flex';
                                } else {
                                    item.style.display = 'none';
                                }
                            });
                        });
                    });
                });

                function handleCustomSubmit(e) {
                    e.preventDefault();
                    alert('Custom Trek Proposal requested!');
                    closePlanCustomModal();
                }
            </script>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
