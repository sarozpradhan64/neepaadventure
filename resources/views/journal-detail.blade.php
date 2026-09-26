<x-layouts.app>
    <x-header />
    <main class="w-full pt-48  bg-surface">
        <div class="flex flex-col w-full">
            <!-- Reading Progress Tracker Bar (Client Hooked) -->
            <div class="sticky top-20 z-40 w-full bg-surface-container-high h-1 overflow-hidden">
                <div class="h-full bg-primary-container transition-all duration-150 w-0" id="readProgress"></div>
            </div>
            <!-- ARTICLE HEADER SECTION -->
            <header class="w-full bg-surface-container-low pt-space-xl pb-space-2xl">
                <div class="max-w-max-content-width mx-auto px-gutter-desktop">
                    <!-- Breadcrumbs & Tactical Bulletin -->
                    <div
                        class="flex flex-wrap items-center justify-between gap-space-sm pb-space-md font-label-sm text-label-sm text-secondary">
                        <nav aria-label="Breadcrumbs" class="flex items-center gap-space-2xs">
                            <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
                            <span>/</span>
                            <a class="hover:text-primary transition-colors" href="{{ route('blog') }}">Journal</a>
                            <span>/</span>
                            <a class="hover:text-primary transition-colors"
                                href="{{ route('blog', ['category' => $blog->category?->slug]) }}">
                                {{ $blog->category?->name ?? 'Uncategorized' }}
                            </a>
                            <span>/</span>
                            <span
                                class="text-on-surface font-semibold truncate max-w-xs md:max-w-md">{{ $blog->title }}</span>
                        </nav>
                        <div
                            class="flex items-center gap-space-xs bg-surface-container px-space-sm py-1 rounded-full text-on-surface text-badge-caption font-badge-caption">
                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-primary-container"></span>
                            <span>VERIFIED FIELD LOG</span>
                        </div>
                    </div>
                    <!-- Category Alpine Tag -->
                    <div class="pt-space-xs pb-space-sm">
                        <span
                            class="inline-flex items-center gap-space-2xs px-space-sm py-1 rounded bg-primary-container/15 text-on-primary-container font-badge-caption text-badge-caption tracking-widest uppercase">
                            <span class="material-symbols-outlined text-[14px]">vital_signs</span>
                            {{ $blog->category?->name ?? 'Dossier' }}
                        </span>
                    </div>
                    <!-- Master Article Headline & Subtitle -->
                    <div class="max-w-4xl flex flex-col gap-space-sm">
                        <h1
                            class="font-display-xl text-headline-lg md:text-display-xl text-on-surface tracking-tight leading-tight">
                            {{ $blog->title }}
                        </h1>
                        <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                            {{ $blog->excerpt }}
                        </p>
                    </div>
                    <!-- Dual Author Metadata & Audio Player Strip -->
                    <div
                        class="mt-space-xl pt-space-lg flex flex-col xl:flex-row xl:items-center justify-between gap-space-lg bg-surface-container-lowest rounded-xl p-space-md shadow-sm">
                        <!-- Authors -->
                        <div class="flex flex-wrap items-center gap-space-lg">
                            <div class="flex items-center gap-space-sm">
                                <div
                                    class="w-12 h-12 rounded-full overflow-hidden bg-ridge-deep text-summit-white flex items-center justify-center shrink-0">
                                    <span
                                        class="font-bold">{{ strtoupper(substr($blog->author?->name ?? 'NA', 0, 2)) }}</span>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-space-2xs">
                                        <span
                                            class="font-label-md text-label-md text-on-surface">{{ $blog->author?->name ?? 'Neepa Team' }}</span>
                                        <span class="material-symbols-outlined text-primary text-[16px]"
                                            title="Verified Author">verified</span>
                                    </div>
                                    <span class="font-body-sm text-body-sm text-secondary">Author • Field Expert</span>
                                </div>
                            </div>
                        </div>
                        <!-- Telemetry Data & Actions -->
                        <div class="flex flex-wrap items-center gap-space-md font-body-sm text-body-sm text-secondary">
                            <div class="flex items-center gap-space-2xs">
                                <span class="material-symbols-outlined text-[16px] text-tertiary">calendar_today</span>
                                <span>{{ $blog->created_at->format('F d, Y') }}</span>
                            </div>
                            <!-- Audio Listen Pill -->
                            <button
                                class="flex items-center gap-space-xs px-space-sm py-1.5 rounded-lg bg-surface-container-high hover:bg-surface-dim text-on-surface font-label-sm text-label-sm transition-colors"
                                id="audioPlayBtn">
                                <span class="material-symbols-outlined text-[18px] text-primary"
                                    id="playIcon">play_circle</span>
                                <span id="audioText">Listen</span>
                            </button>
                        </div>
                    </div>
                    class="mt-space-md flex flex-wrap items-center justify-between gap-space-sm pt-space-xs
                    text-secondary font-label-sm text-label-sm">
                    <div class="flex items-center gap-space-xs">
                        <span class="text-on-surface-variant font-medium">Field Toolkit:</span>
                        <button class="hover:text-primary transition-colors flex items-center gap-1"
                            onclick="navigator.clipboard.writeText(window.location.href); alert('Field link copied to clipboard.');">
                            <span class="material-symbols-outlined text-[16px]">link</span>Copy Link
                        </button>
                        <span>•</span>
                        <a class="hover:text-primary transition-colors flex items-center gap-1" href="#">
                            <span class="material-symbols-outlined text-[16px]">picture_as_pdf</span>Download Field
                            Dossier (PDF 4.2MB)
                        </a>
                        <span>•</span>
                        <button class="hover:text-primary transition-colors flex items-center gap-1"
                            onclick="window.print()">
                            <span class="material-symbols-outlined text-[16px]">print</span>Print
                        </button>
                    </div>
                    <div class="flex items-center gap-space-xs">
                        <span class="text-on-surface-variant font-medium">Share Dossier:</span>
                        <a aria-label="Share WhatsApp"
                            class="w-7 h-7 rounded bg-surface-container flex items-center justify-center hover:bg-primary hover:text-on-primary transition-colors"
                            href="#">
                            <span class="material-symbols-outlined text-[16px]">chat</span>
                        </a>
                        <a aria-label="Share LinkedIn"
                            class="w-7 h-7 rounded bg-surface-container flex items-center justify-center hover:bg-primary hover:text-on-primary transition-colors"
                            href="#">
                            <span class="material-symbols-outlined text-[16px]">share</span>
                        </a>
                    </div>
                </div>
        </div>
        </header>
        <!-- LEAD VISUAL & TOPOGRAPHICAL ACCLIMATIZATION MATRIX -->
        <section class="w-full bg-surface pb-space-3xl">
            <div class="max-w-max-content-width mx-auto px-gutter-desktop">
                <!-- Immersive Trek Image -->
                <div class="relative w-full h-[380px] md:h-[500px] rounded-2xl overflow-hidden shadow-xl mt-space-md">
                    <div class="w-full h-full bg-cover bg-center"
                        data-alt="Panoramic photograph of the High Khumbu valley trail in Nepal, surrounded by dry alpine tundra, juniper shrubs, with the jagged sharp destination of Ama Dablam soaring into a deep cobalt blue sky under brilliant morning sun"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAS-57qM1U6N-NiVlYr3SQoNo-BWY7YPzr8GhUtEELiGNRq-A_WoXJhvu6gNU-iyBcHPmtE8kd9SUPXLLicJOGH9_z8aCFYfpsUkbrE2WbdITfF2eQHIPVFHY3nNdDkxr1uar8cLTAxuICzDg7G8QKEO8gm_FaTfH7ORU5EVmY2AvjVqp1HvwrLgDfGKGlarWyUt2t8t_zUKlP7qqfwjeTe-cw4yLmtRNDeNrf1_pA_9o6aGvYzIUl5')">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-ridge-deep/80 via-transparent to-transparent">
                    </div>
                    <!-- Live Field Telemetry Floating Overlay -->
                    <div
                        class="absolute bottom-6 left-6 right-6 flex flex-wrap items-end justify-between gap-space-md text-summit-white">
                        <div>
                            <span
                                class="font-badge-caption text-badge-caption tracking-widest text-primary-container uppercase bg-ridge-deep/80 px-2 py-1 rounded">Observation
                                Vantage</span>
                            <h2 class="font-headline-md text-headline-md text-summit-white mt-1">Duglha Ridge
                                (4,620m) facing Ama Dablam &amp; Cholatse</h2>
                            <p class="font-body-sm text-body-sm text-surface-dim max-w-xl">Critical biological
                                threshold where arterial oxygen saturation drops below 82% in un-acclimatized
                                trekkers.</p>
                        </div>
                        <div
                            class="bg-ridge-deep/90 backdrop-blur-md p-space-sm rounded-xl flex items-center gap-space-md">
                            <div>
                                <div class="font-badge-caption text-badge-caption text-surface-dim uppercase">
                                    Barometric Pressure</div>
                                <div class="font-headline-sm text-headline-sm text-primary-container font-bold">59.2
                                    kPa</div>
                            </div>
                            <div class="w-px h-8 bg-secondary/50"></div>
                            <div>
                                <div class="font-badge-caption text-badge-caption text-surface-dim uppercase">
                                    Effective O2</div>
                                <div class="font-headline-sm text-headline-sm text-summit-white font-bold">12.1%
                                    <span class="text-xs font-normal text-surface-dim">(Sea lvl: 20.9%)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Embedded Topographical Acclimatization Matrix Visual (SVG + Data Grid) -->
                <div class="mt-space-xl bg-surface-container-lowest rounded-2xl p-space-lg md:p-space-xl shadow-md">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm pb-space-md">
                        <div>
                            <div
                                class="flex items-center gap-space-2xs text-primary font-badge-caption text-badge-caption uppercase tracking-wider">
                                <span class="material-symbols-outlined text-[16px]">show_chart</span>
                                Tactical Ascent Dynamics
                            </div>
                            <h3 class="font-headline-md text-headline-md text-on-surface">The Khumbu Physiological
                                Staircase Profile</h3>
                        </div>
                        <div class="flex flex-wrap items-center gap-space-xs text-body-sm font-body-sm">
                            <span
                                class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-secondary-container text-on-secondary-container">
                                <span class="w-2 h-2 rounded-full bg-primary"></span>
                                Ascent Rule: &lt;450m sleep gain/24h above 3,000m
                            </span>
                        </div>
                    </div>
                    <!-- Custom SVG Visual Elevation & Pressure Gradient Profile -->
                    <div class="w-full overflow-x-auto">
                        <div class="min-w-[760px] py-space-sm">
                            <svg class="w-full h-auto text-on-surface" fill="none" viewbox="0 0 860 220"
                                xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <!-- Immersive Trek Image -->
                                    <div
                                        class="relative w-full h-[380px] md:h-[500px] rounded-2xl overflow-hidden shadow-xl mt-space-md">
                                        @if($blog->featured_image)
                                            <div class="w-full h-full bg-cover bg-center"
                                                style="background-image: url('{{ Storage::url($blog->featured_image) }}')">
                                            </div>
                                        @else
                                            <div class="w-full h-full bg-surface-variant flex items-center justify-center">
                                                <span
                                                    class="material-symbols-outlined text-6xl text-surface-dim">image</span>
                                            </div>
                                        @endif
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-ridge-deep/80 via-transparent to-transparent">
                                        </div>
                                        <div
                                            class="absolute bottom-6 left-6 right-6 flex flex-wrap items-end justify-between gap-space-md text-summit-white">
                                            <div>
                                                <h2 class="font-headline-md text-headline-md text-summit-white mt-1">
                                                    {{ $blog->title }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Rest / Acclimatization Flat Plateau Callouts -->
                                    <rect fill="#f6ba1a" fill-opacity="0.25" height="20" rx="4" width="80" x="250"
                                        y="115"></rect>
                                    <text class="text-[10px] font-bold fill-on-primary-container" text-anchor="middle"
                                        x="290" y="129">NAMCHE (2 NIGHTS)</text>
                                    <rect fill="#f6ba1a" fill-opacity="0.25" height="20" rx="4" width="80" x="520"
                                        y="60"></rect>
                                    <text class="text-[10px] font-bold fill-on-primary-container" text-anchor="middle"
                                        x="560" y="74">DINGBOCHE (2 NIGHTS)</text>
                                    <!-- Node Points -->
                                    <!-- Lukla -->
                                    <circle cx="70" cy="158" fill="#526070" r="4"></circle>
                                    <text class="text-[10px] font-semibold fill-on-surface" text-anchor="middle" x="70"
                                        y="186">Lukla</text>
                                    <text class="text-[9px] fill-secondary" text-anchor="middle" x="70"
                                        y="198">2,840m</text>
                                    <!-- Phakding -->
                                    <circle cx="160" cy="172" fill="#526070" r="3"></circle>
                                    <text class="text-[10px] fill-on-surface" text-anchor="middle" x="160"
                                        y="188">Phakding</text>
                                    <text class="text-[9px] fill-secondary" text-anchor="middle" x="160"
                                        y="198">2,610m</text>
                                    <!-- Namche -->
                                    <circle cx="260" cy="125" fill="#f6ba1a" r="5" stroke="#795900" stroke-width="2">
                                    </circle>
                                    <circle cx="320" cy="125" fill="#f6ba1a" r="5" stroke="#795900" stroke-width="2">
                                    </circle>
                                    <!-- Deboche -->
                                    <circle cx="420" cy="105" fill="#526070" r="3"></circle>
                                    <text class="text-[10px] fill-on-surface" text-anchor="middle" x="420"
                                        y="125">Deboche</text>
                                    <text class="text-[9px] fill-secondary" text-anchor="middle" x="420"
                                        y="137">3,820m</text>
                                    <!-- Dingboche -->
                                    <circle cx="530" cy="70" fill="#f6ba1a" r="5" stroke="#795900" stroke-width="2">
                                    </circle>
                                    <circle cx="590" cy="70" fill="#f6ba1a" r="5" stroke="#795900" stroke-width="2">
                                    </circle>
                                    <!-- Lobuche -->
                                    <circle cx="690" cy="46" fill="#526070" r="4"></circle>
                                    <text class="text-[10px] fill-on-surface" text-anchor="middle" x="690"
                                        y="65">Lobuche</text>
                                    <text class="text-[9px] fill-secondary" text-anchor="middle" x="690"
                                        y="77">4,940m</text>
                                    <!-- EBC / Kala Patthar -->
                                    <circle cx="760" cy="30" fill="#526070" r="4"></circle>
                                    <text class="text-[10px] font-semibold fill-on-surface" text-anchor="middle" x="760"
                                        y="16">Gorak Shep/EBC (5,364m)</text>
                                    <circle cx="810" cy="18" fill="#ba1a1a" r="5"></circle>
                                    <text class="text-[10px] font-bold fill-error" text-anchor="middle" x="810"
                                        y="8">Kala Patthar (5,545m)</text>
                            </svg>
                        </div>
                    </div>
                    <!-- 3-Pillar Data Matrix -->
                    <div
                        class="grid grid-cols-1 md:grid-cols-3 gap-space-md pt-space-md mt-space-sm bg-surface-container-low rounded-xl p-space-md">
                        <div class="flex items-start gap-space-sm">
                            <span class="material-symbols-outlined text-primary text-[24px]">thermostat</span>
                            <div>
                                <div class="font-label-md text-label-md text-on-surface">Barometric Drop Off</div>
                                <div class="font-body-sm text-body-sm text-on-surface-variant">Sea level: 101.3 kPa
                                    → Namche: 68 kPa → Kala Patthar: 50.8 kPa (O2 molecule density halved).</div>
                            </div>
                        </div>
                        <div class="flex items-start gap-space-sm">
                            <span class="material-symbols-outlined text-primary text-[24px]">bedtime</span>
                            <div>
                                <div class="font-label-md text-label-md text-on-surface">The Dual Rest Mandate
                                </div>
                                <div class="font-body-sm text-body-sm text-on-surface-variant">Two consecutive
                                    sleep cycles at 3,440m and 4,410m trigger renal compensation before entering the
                                    death-zone transition.</div>
                            </div>
                        </div>
                        <div class="flex items-start gap-space-sm">
                            <span class="material-symbols-outlined text-primary text-[24px]">health_and_safety</span>
                            <div>
                                <div class="font-label-md text-label-md text-on-surface">Neepa Safety Standard
                                </div>
                                <div class="font-body-sm text-body-sm text-on-surface-variant">Zero evacuations
                                    across 420 groups when adhering to zero-ascent on symptomatic morning pulse-ox
                                    readings.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- MAIN ARTICLE 2-COLUMN ARCHITECTURE (70% Content / 30% Sticky Field Sidebar) -->
        <section class="w-full bg-surface pb-space-4xl">
            <div class="max-w-max-content-width mx-auto px-gutter-desktop">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl">
                    <!-- LEFT EDITORIAL CONTENT (8 cols on lg) -->
                    <article class="lg:col-span-8 flex flex-col gap-space-2xl min-w-0">
                        <!-- DYNAMIC ARTICLE CONTENT -->
                        <div class="prose prose-slate lg:prose-lg max-w-none text-on-surface-variant mb-space-2xl">
                            {!! $blog->content !!}
                        </div>
                        <!-- AUTHOR DETAILED PROFILE BOX -->
                        <div class="mt-space-xl p-space-lg bg-surface-container-lowest rounded-2xl shadow-sm">
                            <div
                                class="font-badge-caption text-badge-caption text-primary uppercase tracking-wider mb-space-sm">
                                Trek Medical Board • Peer Reviewed
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-space-lg">
                                <div class="flex gap-space-sm">
                                    <div class="w-16 h-16 rounded-full overflow-hidden bg-surface-dim shrink-0">
                                        <img class="w-full h-full object-cover"
                                            data-alt="Portrait photo of Dr Nima Tshering wearing blue medical down jacket at high altitude base camp"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBXk0OnBb4Bp3F4bNWi4Wm64iA_UgdNHBJnrrnyCGYUhfV_10TSNZVRFawqOvDwgpmuIceUkloiv0VIqQ4ztqCifh3PEGpcihQV-IBvJQX3oj2aLWiF7Rwr1POcbjPhAyvBy83cEYSWKIVrCwDq20Ofnqx1Iygoy-Ngb-97kysrOOWZoIVxPiP9CnTL-HDCNdF8hkjOsuC2-aKpzHjPZC5Y921c0vXCACeroPor9Jo3Wl7Y7qMeA4jj" />
                                    </div>
                                    <div class="flex flex-col">
                                        <h4 class="font-headline-sm text-headline-sm text-on-surface">Dr. Nima
                                            Tshering, MD</h4>
                                        <span class="font-label-sm text-label-sm text-primary font-semibold">MBBS,
                                            DiMM (Diploma Mountain Medicine)</span>
                                        <p class="font-body-sm text-body-sm text-secondary mt-1">12 years attending
                                            physician at Pheriche Himalayan Rescue Clinic. Lead researcher in
                                            high-altitude pulmonary edema prevention.</p>
                                    </div>
                                </div>
                                <div class="flex gap-space-sm">
                                    <div class="w-16 h-16 rounded-full overflow-hidden bg-surface-dim shrink-0">
                                        <img class="w-full h-full object-cover"
                                            data-alt="Portrait photo of Dawa Tenzing Sherpa holding trekking ice axe on Himalayan pass with prayer flags"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuANbuXHTk1Pc2rVHtdMeHg6BwsjMQUtZmGU9Ny7iLBGSp0illyazH3zLcn9nvkZ-Gx_096Uk98dJTKt9-EtsW95ysU36qe0dGxGJgJhtv4fPeqxUBS20HRQlMRLWunOKJZGmjzmHpA6IaEwiwoJphIgVdxOzheT-k3mFdLUZI2tYNSInzUTo51D0bpMse4khqH0wGZzqz6KTTWWqehyzY9OWWxuYxFwpbomVyc-4xAkhaPeaxrEn5oK" />
                                    </div>
                                    <div class="flex flex-col">
                                        <h4 class="font-headline-sm text-headline-sm text-on-surface">Dawa Tenzing
                                            Sherpa</h4>
                                        <span class="font-label-sm text-label-sm text-primary font-semibold">IFMGA
                                            / UIAGM Certified Guide</span>
                                        <p class="font-body-sm text-body-sm text-secondary mt-1">Khangba native, 14
                                            Everest destinations, pioneer of standard Khumbu acclimatization schedules
                                            across 420 Neepa treks.</p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="mt-space-md pt-space-sm flex justify-between items-center text-label-sm font-label-sm">
                                <span class="text-secondary">Wilderness Medical Society Protocol Verification:
                                    2025/KHU-402</span>
                                <a class="text-primary hover:underline flex items-center gap-1 font-bold" href="#">
                                    Read all 18 Field Guides by this Team <span
                                        class="material-symbols-outlined text-[16px]">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                        <!-- ARTICLE RATING & VERIFIED COMMENTS -->
                        <div
                            class="mt-space-xl p-space-lg bg-surface-container-low rounded-2xl flex flex-col gap-space-lg">
                            <div
                                class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pb-space-sm">
                                <div>
                                    <h4 class="font-headline-sm text-headline-sm text-on-surface">Was this field
                                        dossier clinically helpful?</h4>
                                    <p class="font-body-sm text-body-sm text-secondary">98% of high-altitude
                                        trekkers found this article actionable (1,842 ratings).</p>
                                </div>
                                <div class="flex items-center gap-space-xs">
                                    <button
                                        class="flex items-center gap-1 px-space-md py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high transition-colors font-label-sm text-label-sm text-on-surface"
                                        onclick="this.classList.toggle('bg-primary-container'); this.classList.toggle('text-on-primary-container');">
                                        <span class="material-symbols-outlined text-[18px]">thumb_up</span> Yes
                                    </button>
                                    <button
                                        class="flex items-center gap-1 px-space-md py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high transition-colors font-label-sm text-label-sm text-on-surface"
                                        onclick="alert('Thank you for your feedback. Our medical desk will review.');">
                                        <span class="material-symbols-outlined text-[18px]">thumb_down</span> No
                                    </button>
                                </div>
                            </div>
                            <!-- 4 Verified Trekker Comments -->
                            <div class="space-y-space-md">
                                <span class="font-label-md text-label-md text-on-surface uppercase tracking-wider">Field
                                    Inquiries &amp; Medical Desk Responses (4)</span>
                                <!-- Comment 1 -->
                                <div
                                    class="bg-surface-container-lowest p-space-md rounded-xl space-y-space-xs shadow-sm">
                                    <div class="flex items-center justify-between text-label-sm font-label-sm">
                                        <span class="font-bold text-on-surface">Marcus Vance • EBC 3-Passes
                                            Climber</span>
                                        <span class="text-secondary">2 days ago</span>
                                    </div>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                                        “I have mild exercise-induced asthma. How does acetazolamide interact with
                                        regular albuterol / budesonide inhaler routines once above Namche?”
                                    </p>
                                    <!-- Doctor Response -->
                                    <div class="bg-surface-container p-space-sm rounded-lg ml-space-md space-y-1">
                                        <div class="flex items-center gap-1 text-xs font-bold text-primary">
                                            <span class="material-symbols-outlined text-[14px]">medical_services</span>
                                            Dr. Nima Tshering (Lead Medical Advisor)
                                        </div>
                                        <p class="font-body-sm text-body-sm text-on-surface-variant">
                                            “Marcus, albuterol (beta-2 agonist) and inhaled corticosteroids have no
                                            negative metabolic cross-reactivity with Diamox. In fact, dry cold air
                                            bronchospasm is common; continue preventive puffs 20 minutes prior to
                                            trail departure. Always carry your rescue puffer on your chest under
                                            your mid-layer to prevent medication freezing.”
                                        </p>
                                    </div>
                                </div>
                                <!-- Comment 2 -->
                                <div
                                    class="bg-surface-container-lowest p-space-md rounded-xl space-y-space-xs shadow-sm">
                                    <div class="flex items-center justify-between text-label-sm font-label-sm">
                                        <span class="font-bold text-on-surface">Elena Rostova • Ama Dablam
                                            Attempt</span>
                                        <span class="text-secondary">4 days ago</span>
                                    </div>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                                        “Is it true that taking Diamox causes tingling in facial lips as well as
                                        hands? I felt it intensely at Deboche last year.”
                                    </p>
                                    <div class="bg-surface-container p-space-sm rounded-lg ml-space-md space-y-1">
                                        <div class="flex items-center gap-1 text-xs font-bold text-primary">
                                            <span class="material-symbols-outlined text-[14px]">medical_services</span>
                                            Dr. Nima Tshering (Lead Medical Advisor)
                                        </div>
                                        <p class="font-body-sm text-body-sm text-on-surface-variant">
                                            “Yes, Elena. Perioral and extremity paresthesias are hallmark benign
                                            side effects. Consuming potassium-dense snacks like dried bananas or
                                            coconut water powder reduces the sensation significantly.”
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- RIGHT STICKY FIELD SIDEBAR (4 cols on lg) -->
                    <aside class="lg:col-span-4 space-y-space-lg">
                        <div class="sticky top-28 space-y-space-lg">
                            <!-- Quick Table of Contents -->
                            <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm">
                                <h3
                                    class="font-label-md text-label-md text-on-surface uppercase tracking-wider flex items-center gap-space-2xs">
                                    <span class="material-symbols-outlined text-primary text-[18px]">toc</span>
                                    Field Dossier Contents
                                </h3>
                                <nav class="mt-space-sm flex flex-col gap-space-xs font-body-sm text-body-sm">
                                    <a class="text-on-surface-variant hover:text-primary transition-colors py-1 flex items-center gap-2"
                                        href="#biology">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
                                        01. Chemoreceptor &amp; Plasma Biology
                                    </a>
                                    <a class="text-on-surface-variant hover:text-primary transition-colors py-1 flex items-center gap-2"
                                        href="#diamox-protocols">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
                                        02. Acetazolamide (Diamox) Dosage
                                    </a>
                                    <a class="text-on-surface-variant hover:text-primary transition-colors py-1 flex items-center gap-2"
                                        href="#lake-louise">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
                                        03. Lake Louise AMS Diagnostic Matrix
                                    </a>
                                    <a class="text-on-surface-variant hover:text-primary transition-colors py-1 flex items-center gap-2"
                                        href="#pulse-oximetry">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
                                        04. Pulse Oximetry Field Fallacy
                                    </a>
                                    <a class="text-on-surface-variant hover:text-primary transition-colors py-1 flex items-center gap-2"
                                        href="#hydration">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
                                        05. Hydration &amp; Caloric Balancing
                                    </a>
                                </nav>
                            </div>
                            <!-- Live Telemetry Widget: Khumbu Sector -->
                            <div class="bg-ridge-deep text-summit-white rounded-xl p-space-md shadow-md">
                                <div class="flex items-center justify-between pb-space-xs">
                                    <span
                                        class="font-badge-caption text-badge-caption text-primary-container uppercase tracking-widest flex items-center gap-1">
                                        <span
                                            class="inline-block w-2 h-2 rounded-full bg-primary-container animate-pulse"></span>
                                        Live Khumbu Stations
                                    </span>
                                    <span class="text-[10px] text-surface-dim font-mono">08:00 NPT</span>
                                </div>
                                <div class="space-y-space-sm mt-space-xs">
                                    <!-- Namche station -->
                                    <div
                                        class="bg-secondary/20 p-space-xs rounded-lg flex items-center justify-between font-body-sm text-body-sm">
                                        <div>
                                            <div class="font-semibold text-summit-white">Namche Bazaar</div>
                                            <div class="text-xs text-surface-dim font-mono">3,440m • Clear</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-primary-container">-2°C</div>
                                            <div class="text-[11px] text-surface-dim">Avg SpO2: 89%</div>
                                        </div>
                                    </div>
                                    <!-- Dingboche station -->
                                    <div
                                        class="bg-secondary/20 p-space-xs rounded-lg flex items-center justify-between font-body-sm text-body-sm">
                                        <div>
                                            <div class="font-semibold text-summit-white">Dingboche Ridge</div>
                                            <div class="text-xs text-surface-dim font-mono">4,410m • High Wind
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-primary-container">-9°C</div>
                                            <div class="text-[11px] text-surface-dim">Avg SpO2: 84%</div>
                                        </div>
                                    </div>
                                    <!-- Gorak Shep station -->
                                    <div
                                        class="bg-secondary/20 p-space-xs rounded-lg flex items-center justify-between font-body-sm text-body-sm">
                                        <div>
                                            <div class="font-semibold text-summit-white">Gorak Shep Base</div>
                                            <div class="text-xs text-surface-dim font-mono">5,164m • Gusts 28kt
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-primary-container">-16°C</div>
                                            <div class="text-[11px] text-surface-dim">Avg SpO2: 78%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Doctor's High-Altitude Medical Kit Checklist -->
                            <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm">
                                <h3
                                    class="font-label-md text-label-md text-on-surface uppercase tracking-wider flex items-center gap-space-2xs">
                                    <span
                                        class="material-symbols-outlined text-primary text-[18px]">medical_information</span>
                                    Neepa Trek Med-Kit
                                </h3>
                                <p class="font-body-sm text-body-sm text-secondary mt-1">Carried on every guided
                                    destination group:</p>
                                <ul
                                    class="mt-space-sm space-y-space-xs font-body-sm text-body-sm text-on-surface-variant">
                                    <li class="flex items-center gap-2">
                                        <span
                                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span>
                                        <span><strong>Acetazolamide (Diamox):</strong> 125mg tabs</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span
                                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span>
                                        <span><strong>Nifedipine:</strong> HAPE emergency pulmonary dilator</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span
                                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span>
                                        <span><strong>Dexamethasone:</strong> HACE rescue steroid</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span
                                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span>
                                        <span><strong>Ibuprofen 400mg:</strong> High-altitude headache relief</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span
                                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span>
                                        <span><strong>Oral Rehydration Salts (WHO):</strong> Electrolytes</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span
                                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span>
                                        <span><strong>Military Dual Pulse Oximeter:</strong> Cold calibrated</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span
                                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span>
                                        <span><strong>Hyperbaric Gamow Bag:</strong> At Basecamp HQ</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Lead Guide / Doctor Contact Card -->
                            <div class="bg-surface-container p-space-md rounded-xl flex flex-col gap-space-sm">
                                <div
                                    class="flex items-center gap-space-2xs text-on-surface font-label-md text-label-md">
                                    <span
                                        class="material-symbols-outlined text-primary text-[20px]">contact_support</span>
                                    Personal Medical Consultation
                                </div>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">
                                    Have questions about your heart profile, previous altitude sickness, or
                                    medication history before booking?
                                </p>
                                <a class="inline-flex items-center justify-center gap-2 px-space-md py-2.5 rounded-lg bg-ridge-deep text-summit-white font-label-sm text-label-sm uppercase tracking-wider hover:bg-secondary transition-colors"
                                    href="#">
                                    <span class="material-symbols-outlined text-[16px]">stethoscope</span>
                                    Consult Trek Medical Desk
                                </a>
                            </div>
                            <!-- Downloadable Asset Banner -->
                            <div class="bg-primary-container/20 rounded-xl p-space-md flex items-center gap-space-sm">
                                <span
                                    class="material-symbols-outlined text-primary text-[32px] shrink-0">download_for_offline</span>
                                <div class="flex flex-col">
                                    <span class="font-label-md text-label-md text-on-surface font-bold">Printable
                                        Oximetry Log</span>
                                    <span class="font-body-sm text-body-sm text-secondary">Keep in pocket on Khumbu
                                        trails</span>
                                    <a class="mt-1 font-label-sm text-label-sm text-primary font-bold hover:underline flex items-center gap-1"
                                        href="#">
                                        Download PDF Logbook (1.1 MB) <span
                                            class="material-symbols-outlined text-[14px]">arrow_outward</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
        <!-- RELATED TREK GUIDES & DOSSIERS (3 CARDS) -->
        <section class="w-full bg-surface-container-low py-space-3xl">
            <div class="max-w-max-content-width mx-auto px-gutter-desktop">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-xl">
                    <div>
                        <span
                            class="font-badge-caption text-badge-caption text-primary uppercase tracking-widest">High-Alpine
                            Curriculum</span>
                        <h3 class="font-headline-lg text-headline-lg text-on-surface tracking-tight mt-1">
                            Recommended Field Intelligence</h3>
                    </div>
                    <a class="font-label-md text-label-md text-primary font-bold hover:underline flex items-center gap-1"
                        href="#">
                        Explore Complete blog Library <span
                            class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
                    <!-- Card 1 -->
                    <article
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
                        <div class="h-48 w-full overflow-hidden relative">
                            <img class="w-full h-full object-cover"
                                data-alt="High glaciated mountain pass with climbers navigating crampon tracks on icy Cho La pass with massive blue seracs behind"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCxFnS9H1H7k9jIq--V9aN_ZH1Pchik6KV1Uw9wAkc3Ip_m5HZo54GVTC1ZBGPyJtRLhhCONZwXxB1Aa-OF9vbW6nCmqlmwi3_NBBZ9yoZEUedWzD7QVNau448y9Ecb68eTUQuaVNCeYlBSCcdkg0YIoaYQ_3wfeoxQ-s2TjkvqyetU4UiYhQMDBS69t7aYjKBGmjruixKyeomJ5YvBHBaUw_-1b7KlEBn9TWjEqlMHEtwnMuSZsVL9" />
                            <span
                                class="absolute top-3 left-3 px-2 py-0.5 rounded bg-ridge-deep/80 text-primary-container font-badge-caption text-badge-caption uppercase">High
                                Passes</span>
                        </div>
                        <div class="p-space-md flex flex-col flex-1 justify-between gap-space-sm">
                            <div>
                                <div
                                    class="flex items-center gap-space-2xs text-secondary font-body-sm text-body-sm mb-1">
                                    <span>Pass Crossing</span> • <span>11 min read</span>
                                </div>
                                <h4
                                    class="font-headline-sm text-headline-sm text-on-surface font-semibold hover:text-primary transition-colors">
                                    <a href="#">Cho La vs. Renjo La: Choosing Your High Khumbu Pass</a>
                                </h4>
                                <p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
                                    Technical crampon navigation vs. expansive panoramic ridge traverses across the
                                    turquoise Gokyo Lakes.
                                </p>
                            </div>
                            <a class="font-label-sm text-label-sm text-primary font-bold hover:underline flex items-center gap-1"
                                href="#">
                                Read Field Guide <span
                                    class="material-symbols-outlined text-[14px]">arrow_forward</span>
                            </a>
                        </div>
                    </article>
                    <!-- Card 2 -->
                    <article
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
                        <div class="h-48 w-full overflow-hidden relative">
                            <img class="w-full h-full object-cover"
                                data-alt="Trekking technical gear layout flat lay with 800 fill down parka, Gore-Tex shell, ice axes and alpine boots on rustic wood table"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyaufqKvW_j0-Io8lgubsHS4-HC-G60EZYh_o8hgkr6d1oDGf74DnOSZ3xTvc2xJkY4w37aMCbGUqUkhuXuskQrHyYaH8xqUmS2ypZSBVZ05nr9HCUjvmdWnWF081E_kvSy-fbfcIEXDzjnmAe78enksnQklh2bZzzBWMrav6jxlN-W5vIaOJinn58GO8Qcmv6n1cqDL2MJv1VKadydQBqQVrMTSlDJsk4gcicRfvI9LIXZkUdEyL0" />
                            <span
                                class="absolute top-3 left-3 px-2 py-0.5 rounded bg-ridge-deep/80 text-primary-container font-badge-caption text-badge-caption uppercase">Trek
                                Gear</span>
                        </div>
                        <div class="p-space-md flex flex-col flex-1 justify-between gap-space-sm">
                            <div>
                                <div
                                    class="flex items-center gap-space-2xs text-secondary font-body-sm text-body-sm mb-1">
                                    <span>Thermal Systems</span> • <span>8 min read</span>
                                </div>
                                <h4
                                    class="font-headline-sm text-headline-sm text-on-surface font-semibold hover:text-primary transition-colors">
                                    <a href="#">The Layering Doctrine: Technical Down vs. Primaloft in
                                        Negative 25°C</a>
                                </h4>
                                <p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
                                    Preventing hypothermia during pre-dawn destination pushes to Kala Patthar and Kongma
                                    La pass.
                                </p>
                            </div>
                            <a class="font-label-sm text-label-sm text-primary font-bold hover:underline flex items-center gap-1"
                                href="#">
                                Read Field Guide <span
                                    class="material-symbols-outlined text-[14px]">arrow_forward</span>
                            </a>
                        </div>
                    </article>
                    <!-- Card 3 -->
                    <article
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
                        <div class="h-48 w-full overflow-hidden relative">
                            <img class="w-full h-full object-cover"
                                data-alt="Trekker trekking steep granite stone steps in the Khumbu forest near Namche Bazaar with trekking poles and heavy backpack"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBuwm0AEQjcgEop5nlUbXI2C4ZD2Fj-WN8NTWq_kEQVpLbPIa7Suvp7-gnlUnQ43aiIh0oMZkZP8MYL3hcHyRg5m2MRL2dKp4ka6mMfI3_xI2VciRi415gJ2hruahpudVueB0ozXqcfxVEBkVNZq09Oeis48BWUXuQLtHnNct-qg5z3mMp4q3L72rrMLQpnwSx5A_1tuXJJQNCUR6_yTNdUASdgiAwLV9LiaZu0eBiFkISqLYl8NHaa" />
                            <span
                                class="absolute top-3 left-3 px-2 py-0.5 rounded bg-ridge-deep/80 text-primary-container font-badge-caption text-badge-caption uppercase">Conditioning</span>
                        </div>
                        <div class="p-space-md flex flex-col flex-1 justify-between gap-space-sm">
                            <div>
                                <div
                                    class="flex items-center gap-space-2xs text-secondary font-body-sm text-body-sm mb-1">
                                    <span>Training</span> • <span>16 min read</span>
                                </div>
                                <h4
                                    class="font-headline-sm text-headline-sm text-on-surface font-semibold hover:text-primary transition-colors">
                                    <a href="#">Building Eccentric Leg Strength for 3,000 Stone Steps:
                                        12-Week Protocol</a>
                                </h4>
                                <p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
                                    Conditioning quadriceps and stabilizing tendons for the jarring descents from
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
                                    @foreach($relatedBlogs as $related)
                                        <article
                                            class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
                                            <div class="h-48 w-full overflow-hidden relative">
                                                @if($related->featured_image)
                                                    <img class="w-full h-full object-cover" alt="{{ $related->title }}"
                                                        src="{{ Storage::url($related->featured_image) }}" />
                                                @else
                                                    <div
                                                        class="w-full h-full bg-surface-variant flex items-center justify-center">
                                                        <span
                                                            class="material-symbols-outlined text-4xl text-surface-dim">image</span>
                                                    </div>
                                                @endif
                                                @if($related->category)
                                                    <span
                                                        class="absolute top-3 left-3 px-2 py-0.5 rounded bg-ridge-deep/80 text-primary-container font-badge-caption text-badge-caption uppercase">{{ $related->category->name }}</span>
                                                @endif
                                            </div>
                                            <div class="p-space-md flex flex-col flex-1 justify-between gap-space-sm">
                                                <div>
                                                    <div
                                                        class="flex items-center gap-space-2xs text-secondary font-body-sm text-body-sm mb-1">
                                                        <span>{{ $related->created_at->format('M d, Y') }}</span>
                                                    </div>
                                                    <h4
                                                        class="font-headline-sm text-headline-sm text-on-surface font-semibold hover:text-primary transition-colors">
                                                        <a
                                                            href="{{ route('blog-detail', $related->slug) }}">{{ $related->title }}</a>
                                                    </h4>
                                                    <p
                                                        class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
                                                        {{ $related->excerpt }}
                                                    </p>
                                                </div>
                                                <a class="font-label-sm text-label-sm text-primary font-bold hover:underline flex items-center gap-1"
                                                    href="{{ route('blog-detail', $related->slug) }}">
                                                    Read Field Guide <span
                                                        class="material-symbols-outlined text-[14px]">arrow_forward</span>
                                                </a>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                                const gVal = document.getElementById('giVal');
                                const fVal = document.getElementById('fatigueVal');
                                const dVal = document.getElementById('dizzinessVal');

                                const totalScoreEl = document.getElementById('totalScore');
                                const scoreBadge = document.getElementById('scoreBadge');
                                const scoreAction = document.getElementById('scoreAction');

                                function updateScore() {
                                const h = parseInt(hSlider ? hSlider.value : 0);
                                const g = parseInt(gSlider ? gSlider.value : 0);
                                const f = parseInt(fSlider ? fSlider.value : 0);
                                const d = parseInt(dSlider ? dSlider.value : 0);

                                if (hVal) hVal.textContent = h + ' pts';
                                if (gVal) gVal.textContent = g + ' pts';
                                if (fVal) fVal.textContent = f + ' pts';
                                if (dVal) dVal.textContent = d + ' pts';

                                const total = h + g + f + d;
                                if (totalScoreEl) totalScoreEl.textContent = total;

                                // Clinical Evaluation Criteria
                                if (total === 0) {
                                scoreBadge.className =
                                'inline-block px-space-sm py-1 rounded font-label-md text-label-md
                                bg-secondary-container text-on-secondary-container';
                                scoreBadge.textContent = 'Optimal Acclimatization Status (Score: 0)';
                                scoreAction.textContent = 'Clear for scheduled elevation gain. Continue twice-daily
                                telemetry logging.';
                                } else if (total >= 1 && total <= 2) {
                                    scoreBadge.className='inline-block px-space-sm py-1 rounded font-label-md text-label-md bg-surface-container-high text-on-surface'
                                    ; scoreBadge.textContent='Borderline Physiological Stress (Score: 1-2)' ;
                                    scoreAction.textContent='Monitor closely. Increase water and electrolytes. Ascend with caution if headache-free.'
                                    ; } else if (total>= 3 && total <= 5) {
                                        scoreBadge.className='inline-block px-space-sm py-1 rounded font-label-md text-label-md bg-primary-container text-on-primary-container font-bold'
                                        ; scoreBadge.textContent='Mild to Moderate AMS Confirmed (Score: 3-5)' ;
                                        scoreAction.textContent='HALT ASCENT IMMEDIATELY. Spend extra night at current altitude. Administer 125mg Diamox + hydration.'
                                        ; } else {
                                        scoreBadge.className='inline-block px-space-sm py-1 rounded font-label-md text-label-md bg-error text-on-error font-bold'
                                        ; scoreBadge.textContent='SEVERE AMS / HIGH-ALTITUDE EMERGENCY (Score: 6+)' ;
                                        scoreAction.textContent='MANDATORY DESCENT &gt;500M. Alert lead guide, initiate oxygen or Gamow hyperbaric protocol.'
                                        ; } } [hSlider, gSlider, fSlider, dSlider].forEach(slider=> {
                                        if (slider) slider.addEventListener('input', updateScore);
                                        });
                                        </script>
                            </div>
    </main>
    <x-footer />
</x-layouts.app>