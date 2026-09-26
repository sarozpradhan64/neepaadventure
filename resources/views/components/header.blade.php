<header class="bg-surface-container-lowest/95 fixed top-0 z-50 w-full shadow-[0_1px_8px_rgba(0,0,0,0.04)] backdrop-blur-xl">
    {{-- Top bar --}}
    <div class="bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop">
        <div class="max-w-max-content-width text-body-sm mx-auto flex h-9 items-center justify-between">
            <div class="gap-space-md flex items-center">
                @foreach ($socials ?? [] as $social)
                    <a
                        href="{{ $social->url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-tertiary hover:text-primary gap-space-2xs font-label-sm text-label-sm flex items-center font-semibold tracking-wider uppercase transition-colors"
                        aria-label="{{ $social->platform }}"
                    >
                        @if (strtolower($social->platform) === 'facebook')
                            <x-lucide-facebook class="size-[16px]" />
                        @elseif (strtolower($social->platform) === 'instagram')
                            <x-lucide-instagram class="size-[16px]" />
                        @elseif (strtolower($social->platform) === 'twitter' || strtolower($social->platform) === 'x')
                            <x-lucide-twitter class="size-[16px]" />
                        @elseif (strtolower($social->platform) === 'youtube')
                            <x-lucide-youtube class="size-[16px]" />
                        @elseif (strtolower($social->platform) === 'tiktok')
                            <svg class="size-[16px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5" />
                            </svg>
                        @else
                            {{ $social->platform }}
                        @endif
                    </a>
                @endforeach
            </div>
            <div class="gap-space-lg hidden items-center md:flex">
                <a
                    class="gap-space-2xs text-on-surface-variant hover:text-on-surface font-label-sm text-label-sm flex items-center transition-colors"
                    href="tel:{{ preg_replace('/[^0-9+]/', '', $contact?->phone ?? '') }}"
                >
                    <x-lucide-phone class="text-primary size-[16px]" />
                    {{ $contact?->phone ?? 'Contact us' }}
                </a>
                <div class="gap-space-2xs font-label-sm text-label-sm text-on-surface-variant flex items-center">
                    <x-lucide-globe class="size-[16px]" />
                    <span>NPR / USD ($)</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Main nav bar --}}
    <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop gap-space-md mx-auto flex h-20 items-center justify-between">
        <div class="gap-space-md flex items-center">
            <a href="{{ route('home') }}" class="flex flex-col">
                <span class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight uppercase">{{ $contact?->company_name ?? config('app.name') }}</span>
                <span class="font-badge-caption text-badge-caption text-primary font-bold tracking-[0.2em] uppercase">{{ $websiteSettings['slogan'] ?? 'Treks &bull; Nepal' }}</span>
            </a>
        </div>

        <nav class="gap-space-md hidden items-center xl:flex">
            <a
                class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('treks*') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                href="{{ route('treks') }}"
            >Treks</a>

            <a
                class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('projects') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                href="{{ route('projects') }}"
            >Projects</a>
            <a
                class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('gallery') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                href="{{ route('gallery') }}"
            >Gallery</a>
            <a
                class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('blog') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                href="{{ route('blog') }}"
            >Blogs</a>
            <a
                class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('about') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                href="{{ route('about') }}"
            >About Us</a>
            <a
                class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('contact') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                href="{{ route('contact') }}"
            >Contact Us</a>
        </nav>

        <div class="gap-space-sm flex items-center">
            <button
                aria-label="Search Treks"
                class="text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high flex h-10 w-10 items-center justify-center rounded-lg transition-colors"
            >
                <x-lucide-search class="size-4" />
            </button>
            <a
                class="px-space-lg py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md hidden items-center justify-center rounded-lg font-bold tracking-wider uppercase shadow-[0_1px_3px_rgba(25,39,53,0.08)] transition-all sm:inline-flex"
                href="{{ route('plan-your-trek') }}"
            >Plan Your Trek</a>
            <button
                aria-label="Open Mobile Navigation"
                class="text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high flex h-10 w-10 items-center justify-center rounded-lg xl:hidden"
            >
                <x-lucide-menu class="size-4" />
            </button>
        </div>
    </div>
</header>
