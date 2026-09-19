<header
    class="fixed top-0 w-full z-50 bg-surface-container-lowest/95 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
    {{-- Top bar --}}
    <div class="bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop">
        <div class="max-w-max-content-width mx-auto h-9 flex items-center justify-between text-body-sm">
            <div class="flex items-center gap-space-md">
                <span
                    class="flex items-center gap-space-2xs text-tertiary font-label-sm text-label-sm font-semibold uppercase tracking-wider">
                    <x-lucide-triangle-alert class="size-[16px] text-primary" />
                    Spring 2025 Permits &amp; Weather Bulletin:
                </span>
                <span class="text-on-surface-variant truncate max-w-xs md:max-w-lg">
                    Khumbu Icefall route opened &bull; Manaslu restricted permits issuing on schedule &bull; Lukla
                    operational
                </span>
            </div>
            <div class="hidden md:flex items-center gap-space-lg">
                <a class="flex items-center gap-space-2xs text-on-surface-variant hover:text-on-surface font-label-sm text-label-sm transition-colors"
                    href="tel:{{ preg_replace('/[^0-9+]/', '', $contact?->phone ?? '') }}">
                    <x-lucide-phone class="size-[16px] text-primary" />
                    {{ $contact?->phone ?? 'Contact us' }}
                </a>
                <div class="flex items-center gap-space-2xs font-label-sm text-label-sm text-on-surface-variant">
                    <x-lucide-globe class="size-[16px]" />
                    <span>NPR / USD ($)</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Main nav bar --}}
    <div
        class="h-20 max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop flex items-center justify-between gap-space-md">
        <div class="flex items-center gap-space-md">
            <a href="{{ route('home') }}" class="flex flex-col">
                <span
                    class="font-headline-sm text-headline-sm font-bold tracking-tight text-on-surface uppercase">{{ $contact?->company_name ?? config('app.name') }}</span>
                <span
                    class="font-badge-caption text-badge-caption text-primary tracking-[0.2em] uppercase font-bold">{{ $websiteSettings['slogan'] ?? 'Expeditions &bull; Nepal' }}</span>
            </a>
        </div>

        <nav class="hidden xl:flex items-center gap-space-md">
            <a class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('treks*') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                href="{{ route('treks') }}">Treks</a>
            <a class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('peak-climbing') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                href="{{ route('peak-climbing') }}">Peak Climbing</a>
            <a class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('projects') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                href="{{ route('projects') }}">Projects</a>
                <a class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('gallery') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                    href="{{ route('gallery') }}">Gallery</a>
            <a class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('about') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                href="{{ route('about') }}">About Us</a>
            <a class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('contact') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                href="{{ route('contact') }}">Contact Us</a>
        </nav>

        <div class="flex items-center gap-space-sm">
            <button aria-label="Search Expeditions"
                class="w-10 h-10 flex items-center justify-center rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors">
                <x-lucide-search class="size-4" />
            </button>
            <a class="hidden sm:inline-flex items-center justify-center px-space-lg py-space-sm rounded-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider transition-all shadow-[0_1px_3px_rgba(25,39,53,0.08)]"
                href="{{ route('contact') }}">Plan Your Trek</a>
            <button aria-label="Open Mobile Navigation"
                class="xl:hidden w-10 h-10 flex items-center justify-center rounded-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high">
                <x-lucide-menu class="size-4" />
            </button>
        </div>
    </div>
</header>
