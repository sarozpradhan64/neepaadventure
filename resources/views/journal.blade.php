<x-layouts.app>
  <x-header />
  <main class="w-full pt-48  bg-surface">
    <div class="flex flex-col w-full">
      <!-- Telemetry Strip -->
      <div class="w-full bg-surface-container-high px-gutter-desktop py-space-xs">
        <div
          class="max-w-max-content-width mx-auto flex flex-col md:flex-row items-start md:items-center justify-between gap-space-xs font-label-sm text-label-sm text-on-surface-variant">
          <div class="flex items-center gap-space-sm flex-wrap">
            <span
              class="inline-flex items-center gap-space-2xs bg-primary-container/20 text-on-primary-container px-space-xs py-space-2xs rounded text-[11px] font-bold tracking-wider uppercase">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-flare animate-ping"></span>
              Live Synoptic Desk
            </span>
            <span class="text-on-surface font-medium">Stable pre-monsoon high-pressure ridge active over Khumbu,
              Annapurna &amp; Manaslu ranges</span>
          </div>
          <div class="flex items-center gap-space-md text-[11px] text-secondary divide-x divide-outline-variant">
            <span class="pr-space-sm flex items-center gap-space-2xs"><span
                class="material-symbols-outlined text-[14px] text-primary">thermostat</span>Lukla Base: -4°C
              Clear</span>
            <span class="pl-space-sm flex items-center gap-space-2xs"><span
                class="material-symbols-outlined text-[14px] text-primary">air</span>South Col Wind: 22 kts NW</span>
            <span class="pl-space-sm hidden sm:inline-flex items-center gap-space-2xs"><span
                class="material-symbols-outlined text-[14px] text-primary">schedule</span>Issue No. 48 • Spring
              2025</span>
          </div>
        </div>
      </div>
      <!-- Editorial Hero Section -->
      <section class="w-full bg-surface-container-lowest px-gutter-desktop pt-space-2xl pb-space-2xl">
        <div class="max-w-max-content-width mx-auto flex flex-col gap-space-xl">
          <div class="flex flex-col gap-space-xs">
            <div class="flex items-center gap-space-sm">
              <span class="font-badge-caption text-badge-caption tracking-widest text-primary uppercase">Field
                Dispatches &amp; Himalayan Intelligence</span>
              <span class="text-secondary">•</span>
              <span class="font-badge-caption text-badge-caption tracking-widest text-secondary uppercase">Neepa Alpine
                Archives</span>
            </div>
            <h1 class="font-display-xl text-display-xl tracking-tight text-on-surface uppercase max-w-4xl">
              Stories from the Ridge, High Science &amp; Route Archives
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-3xl">
              Deep-dive route briefings, altitude physiology protocols, cultural heritage from Solukhumbu, and
              unvarnished gear tests written by veteran IFMGA/NNMGA Sherpa guides, trek doctors, and high-altitude
              navigators.
            </p>
          </div>
          <!-- Search & Category Bar -->
          <div class="flex flex-col gap-space-md pt-space-xs">
            <form action="{{ route('blog') }}" method="GET" class="relative w-full max-w-2xl">
              <span
                class="material-symbols-outlined absolute left-space-md top-1/2 -translate-y-1/2 text-secondary text-[20px]">search</span>
              <input name="search" value="{{ request('search') }}"
                class="w-full pl-12 pr-space-md py-3.5 bg-surface-container-low rounded-lg text-on-surface placeholder:text-secondary font-body-md text-body-md focus:outline-none focus:bg-surface-container-lowest shadow-sm transition-all"
                placeholder="Search blog posts..." type="text" />
            </form>
            <!-- Filter Pills -->
            <div class="flex items-center gap-space-xs overflow-x-auto pb-space-2xs no-scrollbar">
              <a href="{{ route('blog', request()->except('category')) }}"
                class="px-space-md py-space-xs rounded font-label-sm text-label-sm whitespace-nowrap shadow-sm transition-colors {{ !request('category') ? 'bg-ridge-deep text-summit-white' : 'bg-surface-container hover:bg-surface-container-high text-on-surface-variant' }}">
                All Posts ({{ $blogs->total() }})
              </a>
              @foreach ($categories as $cat)
                <a href="{{ route('blog', array_merge(request()->except('category'), ['category' => $cat->slug])) }}"
                  class="px-space-md py-space-xs rounded font-label-sm text-label-sm whitespace-nowrap transition-colors {{ request('category') === $cat->slug ? 'bg-ridge-deep text-summit-white' : 'bg-surface-container hover:bg-surface-container-high text-on-surface-variant' }}">
                  {{ $cat->name }}
                </a>
              @endforeach
            </div>
          </div>
        </div>
      </section>
      <!-- Featured Lead Dossier -->
      @if($featured)
        <section class="w-full bg-surface px-gutter-desktop py-space-2xl">
          <div class="max-w-max-content-width mx-auto">
            <div
              class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl bg-surface-container-lowest rounded-xl shadow-md overflow-hidden">
              <!-- Lead Content (7 Cols) -->
              <div class="lg:col-span-7 p-space-xl lg:p-space-2xl flex flex-col justify-between gap-space-lg">
                <div class="flex flex-col gap-space-md">
                  <div class="flex items-center gap-space-xs flex-wrap">
                    <span
                      class="px-space-xs py-space-2xs rounded bg-primary-container text-on-primary-container font-badge-caption text-badge-caption uppercase">
                      Featured Field Essay
                    </span>
                    @if($featured->category)
                      <span
                        class="px-space-xs py-space-2xs rounded bg-surface-container-high text-secondary font-badge-caption text-badge-caption uppercase">
                        {{ $featured->category->name }}
                      </span>
                    @endif
                  </div>
                  <h2 class="font-headline-lg text-headline-lg tracking-tight text-on-surface">
                    {{ $featured->title }}
                  </h2>
                  <p class="font-body-lg text-body-lg text-on-surface-variant">
                    {{ $featured->excerpt }}
                  </p>
                </div>
                <!-- Lead Meta & Button -->
                <div
                  class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-md pt-space-md mt-auto">
                  <div class="flex items-center gap-space-sm">
                    @if($featured->author)
                      <div
                        class="w-10 h-10 rounded-full bg-ridge-deep text-summit-white flex items-center justify-center font-bold text-sm">
                        {{ strtoupper(substr($featured->author->name, 0, 2)) }}
                      </div>
                      <div class="flex flex-col">
                        <span class="font-label-md text-label-md text-on-surface">{{ $featured->author->name }}</span>
                        <span
                          class="font-body-sm text-body-sm text-secondary">{{ $featured->created_at->format('M d, Y') }}</span>
                      </div>
                    @endif
                  </div>
                  <a class="inline-flex items-center gap-space-xs px-space-lg py-3 bg-primary-container hover:bg-amber-flare text-on-primary-container font-label-md text-label-md uppercase tracking-wider rounded transition-colors"
                    href="{{ route('blog-detail', $featured->slug) }}">
                    <span>Read Full Dossier</span>
                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                  </a>
                </div>
              </div>
              <!-- Graphic / Visual Card (5 Cols) -->
              <div
                class="lg:col-span-5 relative flex flex-col justify-between bg-surface-container-high overflow-hidden min-h-[380px]">
                @if($featured->featured_image)
                  <img class="absolute inset-0 w-full h-full object-cover" alt="{{ $featured->title }}"
                    src="{{ Storage::url($featured->featured_image) }}" />
                @else
                  <div class="absolute inset-0 w-full h-full bg-surface-variant"></div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-ridge-deep via-ridge-deep/40 to-transparent"></div>
              </div>
            </div>
          </div>
        </section>
      @endif
      <!-- Curated Dispatches & Field Notes Strip Section -->
      <section class="w-full bg-surface-container-low px-gutter-desktop py-space-3xl">
        <div class="max-w-max-content-width mx-auto flex flex-col gap-space-2xl">
          <!-- Section Header -->
          <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-space-md">
            <div>
              <span class="font-badge-caption text-badge-caption uppercase tracking-widest text-primary">Intelligence
                Repository</span>
              <h2 class="font-headline-lg text-headline-lg tracking-tight text-on-surface">Curated Alpine Dispatches
              </h2>
            </div>
            <span class="font-body-sm text-body-sm text-secondary">Displaying 6 of 48 peer-reviewed articles</span>
          </div>
          <!-- Main Layout: 8 cols Articles + 4 cols Sticky Field Notes -->
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl">
            <!-- Articles Grid (8 cols) -->
            <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-space-lg">
              @foreach($blogs as $post)
                <article
                  class="flex flex-col bg-surface-container-lowest rounded-lg shadow-sm hover:shadow-md transition-all overflow-hidden">
                  <div class="relative h-48 w-full">
                    @if($post->featured_image)
                      <img class="w-full h-full object-cover" alt="{{ $post->title }}"
                        src="{{ Storage::url($post->featured_image) }}" />
                    @else
                      <div class="w-full h-full bg-surface-variant flex items-center justify-center">
                        <span class="material-symbols-outlined text-4xl text-surface-dim">image</span>
                      </div>
                    @endif
                    @if($post->category)
                      <span
                        class="absolute top-space-sm left-space-sm px-space-xs py-space-2xs rounded bg-ridge-deep text-summit-white font-badge-caption text-badge-caption uppercase">
                        {{ $post->category->name }}
                      </span>
                    @endif
                  </div>
                  <div class="p-space-lg flex flex-col justify-between flex-grow gap-space-md">
                    <div class="flex flex-col gap-space-xs">
                      @if($post->category)
                        <span
                          class="font-badge-caption text-badge-caption uppercase text-secondary">{{ $post->category->name }}</span>
                      @endif
                      <h3
                        class="font-headline-sm text-headline-sm text-on-surface hover:text-primary transition-colors line-clamp-2">
                        <a href="{{ route('blog-detail', $post->slug) }}">{{ $post->title }}</a>
                      </h3>
                      <p class="font-body-md text-body-md text-on-surface-variant line-clamp-3">
                        {{ $post->excerpt }}
                      </p>
                    </div>
                    <div class="pt-space-sm flex items-center justify-between font-body-sm text-body-sm text-secondary">
                      <span>{{ $post->author?->name ?? 'Admin' }}</span>
                      <span>{{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                  </div>
                </article>
              @endforeach
            </div>
            <!-- Sidebar: Field Notes & Quick Wisdom (4 cols) -->
            <aside class="lg:col-span-4 flex flex-col gap-space-lg">
              <!-- Quick Wisdom Box -->
              <div class="bg-ridge-deep text-summit-white p-space-xl rounded-xl shadow-md flex flex-col gap-space-lg">
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-primary-container text-[22px]">bolt</span>
                    <span class="font-label-md text-label-md uppercase tracking-wider text-summit-white">Field
                      Notes</span>
                  </div>
                  <span
                    class="px-space-xs py-space-2xs rounded bg-surface-container-highest/20 font-badge-caption text-badge-caption text-primary-container">
                    Sirdar Wisdom
                  </span>
                </div>
                <!-- Wisdom Item 1 -->
                <div class="flex flex-col gap-space-2xs bg-surface-container-highest/10 p-space-md rounded-lg">
                  <div class="flex items-center justify-between text-[11px] text-surface-dim font-bold">
                    <span>NOTE #12</span>
                    <span class="text-primary-container">ELECTRONICS</span>
                  </div>
                  <h4 class="font-label-md text-label-md text-summit-white">Sleep with Your Camera &amp; Phone Batteries
                  </h4>
                  <p class="font-body-sm text-body-sm text-surface-dim">
                    Lithium-ion cells lose up to 70% capacity at -15°C overnight. Keep power banks and batteries inside
                    your sleeping bag inner chest pocket.
                  </p>
                </div>
                <!-- Wisdom Item 2 -->
                <div class="flex flex-col gap-space-2xs bg-surface-container-highest/10 p-space-md rounded-lg">
                  <div class="flex items-center justify-between text-[11px] text-surface-dim font-bold">
                    <span>NOTE #07</span>
                    <span class="text-primary-container">METEOROLOGY</span>
                  </div>
                  <h4 class="font-label-md text-label-md text-summit-white">The 10:00 AM Cloud Inversion Rule</h4>
                  <p class="font-body-sm text-body-sm text-surface-dim">
                    Thermal valley updrafts push cloud cover over passes like Cho La and Larkya La by mid-morning.
                    Always clear high col destinations before 09:30.
                  </p>
                </div>
                <!-- Wisdom Item 3 -->
                <div class="flex flex-col gap-space-2xs bg-surface-container-highest/10 p-space-md rounded-lg">
                  <div class="flex items-center justify-between text-[11px] text-surface-dim font-bold">
                    <span>NOTE #19</span>
                    <span class="text-primary-container">PODIATRY</span>
                  </div>
                  <h4 class="font-label-md text-label-md text-summit-white">Dual-Sock Friction Decoupling</h4>
                  <p class="font-body-sm text-body-sm text-surface-dim">
                    Pair an ultra-thin synthetic liner sock under a high-cushion Merino wool outer sock. Shearing
                    friction occurs between sock layers, never your skin.
                  </p>
                </div>
                <div class="pt-space-xs text-center">
                  <a class="font-label-sm text-label-sm text-primary-container hover:underline flex items-center justify-center gap-space-2xs"
                    href="#">
                    <span>Browse 34 Field Notes in Archive</span>
                    <span class="material-symbols-outlined text-[16px]">arrow_right_alt</span>
                  </a>
                </div>
              </div>
              <!-- Alpine Emergency Guide Callout Card -->
              <div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col gap-space-md">
                <div class="flex items-center gap-space-xs text-primary">
                  <span class="material-symbols-outlined text-[20px]">medical_services</span>
                  <span class="font-label-md text-label-md uppercase font-bold text-on-surface">Emergency Field
                    Reference</span>
                </div>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  Download our laminated, offline-ready pocket card containing Lake Louise HAPE/HACE symptoms, Gamow bag
                  assembly steps, and helicopter satellite grid coordinates.
                </p>
                <a class="inline-flex items-center justify-center gap-space-xs px-space-md py-space-xs rounded bg-surface-container hover:bg-surface-container-high text-on-surface font-label-sm text-label-sm transition-colors"
                  href="#">
                  <span class="material-symbols-outlined text-[16px]">download</span>
                  <span>Download PDF Field Card (2.1 MB)</span>
                </a>
              </div>
              <!-- Featured Author Badge -->
              <div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex items-center gap-space-md">
                <img alt="Neepa Adventure Treks" class="h-9 w-auto object-contain"
                  src="https://lh3.googleusercontent.com/aida/AEtjO1W3yQM8xHQjX2E5zFU6iD06bZt4OesA5A7xOgHv015jEqcfcZZ7HE_Hi2o8cpyIdFgrjO4RN7wgTRlrcHuP9UqSEdMBfQRkV-W4iLCDj5kA6yJRSDIcuUz5LDMX_7nIHPn7Z7NsgWAgM2MhXip9R99L0Ag18lYrFMd1bCYwmMS3sHb8Cl6_AXzosDe6CPqFc2XukhSPja8i9PivwzMEhd1eDcGrGiBpkzSMjPB_Jdom9ughkHb76SIb6g" />
                <div class="flex flex-col">
                  <span class="font-label-sm text-label-sm font-bold text-on-surface">Editorial Standards</span>
                  <span class="font-body-sm text-body-sm text-secondary">Every article vetted by certified IFMGA Sherpas
                    &amp; wilderness doctors.</span>
                </div>
              </div>
            </aside>
          </div>
          <!-- Pagination & Popular Topic Tags -->
          <div class="flex flex-col gap-space-lg pt-space-md">
            <!-- Tag Cloud -->
            <div class="flex flex-wrap items-center gap-space-xs justify-center sm:justify-start">
              <span class="font-label-sm text-label-sm text-secondary mr-space-xs">Index Tags:</span>
              <a class="px-space-xs py-space-2xs rounded bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm transition-colors"
                href="#">#EverestBaseCamp</a>
              <a class="px-space-xs py-space-2xs rounded bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm transition-colors"
                href="#">#Acclimatization</a>
              <a class="px-space-xs py-space-2xs rounded bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm transition-colors"
                href="#">#AnnapurnaCircuit</a>
              <a class="px-space-xs py-space-2xs rounded bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm transition-colors"
                href="#">#DiamoxProtocol</a>
              <a class="px-space-xs py-space-2xs rounded bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm transition-colors"
                href="#">#SherpaLineage</a>
              <a class="px-space-xs py-space-2xs rounded bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm transition-colors"
                href="#">#GokyoLakes</a>
              <a class="px-space-xs py-space-2xs rounded bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm transition-colors"
                href="#">#WinterTrekking</a>
              <a class="px-space-xs py-space-2xs rounded bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm transition-colors"
                href="#">#LuklaFlights</a>
              <a class="px-space-xs py-space-2xs rounded bg-surface-container hover:bg-surface-container-high text-secondary hover:text-on-surface font-body-sm text-body-sm transition-colors"
                href="#">#PermitRules2025</a>
            </div>
            <!-- Pagination -->
            <div class="mt-space-md">
              {{ $blogs->links() }}
            </div>
          </div>
        </div>
      </section>
      <!-- Editorial Newsletter / Trek Briefing Box -->
      <section class="w-full bg-surface-container-highest px-gutter-desktop py-space-3xl">
        <div class="max-w-max-content-width mx-auto">
          <div
            class="bg-ridge-deep text-summit-white rounded-2xl p-space-xl lg:p-space-3xl shadow-xl flex flex-col lg:flex-row items-center justify-between gap-space-2xl relative overflow-hidden">
            <!-- Abstract Topo Background Graphic -->
            <svg class="absolute right-0 top-0 h-full w-1/2 opacity-5 pointer-events-none" fill="none"
              viewbox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
              <ellipse cx="250" cy="250" rx="200" ry="120" stroke="white" stroke-width="2"></ellipse>
              <ellipse cx="250" cy="250" rx="160" ry="90" stroke="white" stroke-width="2"></ellipse>
              <ellipse cx="250" cy="250" rx="110" ry="60" stroke="white" stroke-width="2"></ellipse>
              <ellipse cx="250" cy="250" rx="60" ry="30" stroke="white" stroke-width="2"></ellipse>
            </svg>
            <!-- Briefing Content -->
            <div class="flex flex-col gap-space-sm max-w-xl relative z-10">
              <div class="flex items-center gap-space-xs">
                <span class="w-2.5 h-2.5 rounded-full bg-primary-container"></span>
                <span class="font-badge-caption text-badge-caption tracking-widest uppercase text-primary-container">
                  Kathmandu Operations Briefing
                </span>
              </div>
              <h2 class="font-headline-lg text-headline-lg tracking-tight text-summit-white">
                Join 14,000+ Himalayan Trekkers &amp; Climbers
              </h2>
              <p class="font-body-md text-body-md text-surface-dim">
                Receive seasonal permit bulletins, route conditions reports, and exclusive trek case dossiers straight
                from our Kathmandu operations room.
              </p>
              <div class="flex items-center gap-space-md text-[12px] text-surface-dim pt-space-xs">
                <span class="flex items-center gap-space-2xs"><span
                    class="material-symbols-outlined text-[16px] text-primary-container">check_circle</span>No
                  spam</span>
                <span class="flex items-center gap-space-2xs"><span
                    class="material-symbols-outlined text-[16px] text-primary-container">check_circle</span>Unsubscribe
                  anytime</span>
                <span class="flex items-center gap-space-2xs"><span
                    class="material-symbols-outlined text-[16px] text-primary-container">check_circle</span>Dispatched
                  bi-weekly</span>
              </div>
            </div>
            <!-- Subscription Form -->
            <div class="w-full lg:w-auto min-w-[320px] max-w-md relative z-10 flex flex-col gap-space-xs">
              <form class="flex flex-col sm:flex-row gap-space-xs" onsubmit="event.preventDefault();">
                <input
                  class="px-space-md py-3.5 bg-surface-container-lowest/10 text-summit-white placeholder:text-surface-dim/70 rounded font-body-md text-body-md focus:outline-none focus:bg-surface-container-lowest/20 flex-grow"
                  placeholder="Enter your email address" required="" type="email" />
                <button
                  class="px-space-lg py-3.5 bg-primary-container hover:bg-amber-flare text-on-primary-container font-label-md text-label-md uppercase tracking-wider rounded transition-colors whitespace-nowrap"
                  type="submit">
                  Receive Dispatches
                </button>
              </form>
              <span class="text-[11px] text-surface-dim/80 text-center sm:text-left">
                Your data remains private under Nepal DP &amp; GDPR regulations.
              </span>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <x-footer />
</x-layouts.app>