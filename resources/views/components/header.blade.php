<header x-data="{ mobileMenuOpen: false }"
    class="bg-surface-container-lowest/95 fixed top-0 z-50 w-full shadow-[0_1px_8px_rgba(0,0,0,0.04)] backdrop-blur-xl">
    {{-- Top bar --}}
    <div class="bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop">
        <div class="max-w-max-content-width text-body-sm mx-auto flex h-9 items-center justify-between">
            <div class="gap-space-md flex items-center">
                @foreach ($socials ?? [] as $social)
                    <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                        class="text-tertiary hover:text-primary gap-space-2xs font-label-sm text-label-sm flex items-center font-semibold tracking-wider uppercase transition-colors"
                        aria-label="{{ $social->platform }}">
                        @if (strtolower($social->platform) === 'facebook')
                            <x-lucide-facebook class="size-[16px]" />
                        @elseif (strtolower($social->platform) === 'instagram')
                            <x-lucide-instagram class="size-[16px]" />
                        @elseif (strtolower($social->platform) === 'twitter' || strtolower($social->platform) === 'x')
                            <x-lucide-twitter class="size-[16px]" />
                        @elseif (strtolower($social->platform) === 'youtube')
                            <x-lucide-youtube class="size-[16px]" />
                        @elseif (strtolower($social->platform) === 'tiktok')
                            <svg class="size-[16px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5" />
                            </svg>
                        @else
                            {{ $social->platform }}
                        @endif
                    </a>
                @endforeach
            </div>
            <div class="gap-space-lg hidden items-center md:flex">
                <a class="gap-space-2xs text-on-surface-variant hover:text-on-surface font-label-sm text-label-sm flex items-center transition-colors"
                    href="tel:{{ preg_replace('/[^0-9+]/', '', $contact?->phone ?? '') }}">
                    <x-lucide-phone class="text-primary size-[16px]" />
                    {{ $contact?->phone ?? 'Contact us' }}
                </a>
                @if ($contact?->email)
                    <a class="gap-space-2xs text-on-surface-variant hover:text-on-surface font-label-sm text-label-sm flex items-center transition-colors"
                        href="mailto:{{ $contact->email }}">
                        <x-lucide-mail class="text-primary size-[16px]" />
                        {{ $contact->email }}
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- Main nav bar --}}
    <div
        class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop gap-space-md mx-auto flex h-20 items-center justify-between">
        <div class="gap-space-md flex items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-4">
                @if (!empty($websiteSettings['logo']))
                    <img src="{{ Storage::url($websiteSettings['logo']) }}"
                        alt="{{ $contact?->company_name ?? config('app.name') }}" class="h-16 w-auto object-contain">
                @endif
                <span
                    class="font-headline-xs text-headline-xs text-on-surface font-bold tracking-tight uppercase">{{ $contact?->company_name ?? config('app.name') }}</span>
            </a>
        </div>

        <nav class="hidden items-center gap-2 xl:flex">
            {{-- Treks Dropdown --}}
            <div class="group relative py-6">
                <a class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('treks*') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} flex items-center gap-1 transition-colors"
                    href="{{ route('treks') }}">
                    Treks
                    <x-lucide-chevron-down class="size-4 opacity-50 transition-transform group-hover:rotate-180" />
                </a>
                <div
                    class="absolute left-1/2 top-full -translate-x-1/2 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 w-[600px]">
                    <div class="bg-surface rounded-2xl shadow-xl border border-outline/10 p-6 overflow-hidden">
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <h3
                                    class="text-label-sm font-label-sm text-primary font-bold tracking-wider uppercase mb-4">
                                    Popular Regions</h3>
                                <ul class="space-y-3">
                                    <li>
                                        <a href="{{ route('treks') }}?region=everest"
                                            class="group/item flex items-center gap-3">
                                            <div
                                                class="bg-surface-container-high group-hover/item:bg-primary-container rounded-md p-2 transition-colors">
                                                <x-lucide-mountain
                                                    class="size-4 text-on-surface-variant group-hover/item:text-primary" />
                                            </div>
                                            <div>
                                                <div
                                                    class="text-body-sm font-body-sm text-on-surface font-semibold group-hover/item:text-primary transition-colors">
                                                    Everest Region</div>
                                                <div class="text-body-xs font-body-xs text-on-surface-variant">Iconic
                                                    peaks & sherpa culture</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('treks') }}?region=annapurna"
                                            class="group/item flex items-center gap-3">
                                            <div
                                                class="bg-surface-container-high group-hover/item:bg-primary-container rounded-md p-2 transition-colors">
                                                <x-lucide-map
                                                    class="size-4 text-on-surface-variant group-hover/item:text-primary" />
                                            </div>
                                            <div>
                                                <div
                                                    class="text-body-sm font-body-sm text-on-surface font-semibold group-hover/item:text-primary transition-colors">
                                                    Annapurna Region</div>
                                                <div class="text-body-xs font-body-xs text-on-surface-variant">Diverse
                                                    landscapes & trails</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('treks') }}?region=langtang"
                                            class="group/item flex items-center gap-3">
                                            <div
                                                class="bg-surface-container-high group-hover/item:bg-primary-container rounded-md p-2 transition-colors">
                                                <x-lucide-tent
                                                    class="size-4 text-on-surface-variant group-hover/item:text-primary" />
                                            </div>
                                            <div>
                                                <div
                                                    class="text-body-sm font-body-sm text-on-surface font-semibold group-hover/item:text-primary transition-colors">
                                                    Langtang Region</div>
                                                <div class="text-body-xs font-body-xs text-on-surface-variant">Valley of
                                                    glaciers & lakes</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="bg-surface-container-low -m-6 p-6">
                                <h3
                                    class="text-label-sm font-label-sm text-primary font-bold tracking-wider uppercase mb-4">
                                    Featured</h3>
                                <a href="{{ route('treks') }}"
                                    class="group/feature block relative rounded-xl overflow-hidden aspect-[4/3]">
                                    <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?q=80&w=600&auto=format&fit=crop"
                                        alt="Featured Trek"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover/feature:scale-105">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-4">
                                        <span class="text-white font-bold text-title-sm mb-1">Everest Base Camp</span>
                                        <span class="text-white/80 text-body-xs flex items-center gap-1">
                                            <x-lucide-clock class="size-3" /> 14 Days
                                        </span>
                                    </div>
                                </a>
                                <a href="{{ route('treks') }}"
                                    class="mt-4 text-label-sm font-label-sm text-primary font-bold hover:text-primary-600 flex items-center gap-1 transition-colors">
                                    View all treks <x-lucide-arrow-right class="size-4" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Projects Link --}}
            <div class="py-6">
                <a class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('projects*') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                    href="{{ route('projects') }}">Projects</a>
            </div>

            {{-- Standard Links --}}
            <div class="py-6">
                <a class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('gallery') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                    href="{{ route('gallery') }}">Gallery</a>
            </div>

            <div class="py-6">
                <a class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('blog') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                    href="{{ route('blog') }}">Blogs</a>
            </div>

            {{-- About Us Dropdown --}}
            <div class="group relative py-6">
                <a class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('about*') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} flex items-center gap-1 transition-colors"
                    href="{{ route('about') }}">
                    About Us
                    <x-lucide-chevron-down class="size-4 opacity-50 transition-transform group-hover:rotate-180" />
                </a>
                <div
                    class="absolute left-1/2 top-full -translate-x-1/2 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 w-[350px]">
                    <div class="bg-surface rounded-2xl shadow-xl border border-outline/10 p-4">
                        <div class="mb-2 px-3">
                            <h3 class="text-label-sm font-label-sm text-primary font-bold tracking-wider uppercase">
                                Company</h3>
                        </div>
                        <a href="{{ route('about') }}"
                            class="flex items-center gap-3 p-3 rounded-xl hover:bg-surface-container-high transition-colors">
                            <div class="bg-primary/10 text-primary rounded-lg p-2">
                                <x-lucide-users class="size-5" />
                            </div>
                            <div>
                                <div class="text-body-sm font-semibold text-on-surface">About Neepa Adventure</div>
                                <div class="text-body-xs text-on-surface-variant">Our story & team</div>
                            </div>
                        </a>

                        @if (isset($navLegalDocuments) && $navLegalDocuments->isNotEmpty())
                            <div class="mt-4 mb-2 px-3 border-t border-outline/10 pt-4">
                                <h3
                                    class="text-label-sm font-label-sm text-primary font-bold tracking-wider uppercase">
                                    Legal & Policies</h3>
                            </div>
                            <a href="{{ route('legal.index') }}"
                                class="flex items-center gap-3 p-3 rounded-xl hover:bg-surface-container-high transition-colors">
                                <div class="bg-primary/10 text-primary rounded-lg p-2">
                                    <x-lucide-scale class="size-4" />
                                </div>
                                <div>
                                    <div class="text-body-sm font-semibold text-on-surface">Legal Documents</div>
                                    <div class="text-body-xs text-on-surface-variant">View all policies</div>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="py-6">
                <a class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('contact') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                    href="{{ route('contact') }}">Contact Us</a>
            </div>
        </nav>

        <div class="gap-space-sm flex items-center">
            <button aria-label="Search Treks"
                class="text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high flex h-10 w-10 items-center justify-center rounded-lg transition-colors">
                <x-lucide-search class="size-6" />
            </button>
            <a class="px-space-lg py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-label-md hidden items-center justify-center rounded-lg font-bold tracking-wider uppercase shadow-[0_1px_3px_rgba(25,39,53,0.08)] transition-all sm:inline-flex"
                href="{{ route('plan-your-trek') }}">Plan Your Trek</a>
            <button @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Open Mobile Navigation"
                class="text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high flex h-10 w-10 items-center justify-center rounded-lg xl:hidden">
                <x-lucide-menu class="size-6" />
            </button>
        </div>
    </div>

    {{-- Mobile Nav bar --}}
    <template x-teleport="body">
        <div x-show="mobileMenuOpen" class="fixed inset-0 z-[9999] xl:hidden" style="display: none;"
            aria-modal="true">
            {{-- Backdrop --}}
            <div x-show="mobileMenuOpen" x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-black/80 backdrop-blur-sm" @click="mobileMenuOpen = false"
                aria-hidden="true"></div>

            {{-- Slide over panel --}}
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                class="fixed inset-y-0 right-0 z-[10000] w-full overflow-y-auto bg-surface px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-outline/10">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" class="-m-1.5 p-1.5 flex items-center gap-2">
                        @if (!empty($websiteSettings['logo']))
                            <img src="{{ Storage::url($websiteSettings['logo']) }}"
                                alt="{{ $contact?->company_name ?? config('app.name') }}" class="h-8 w-auto">
                        @endif
                        <span
                            class="font-headline-xs text-on-surface font-bold tracking-tight uppercase">{{ $contact?->company_name ?? config('app.name') }}</span>
                    </a>
                    <button type="button"
                        class="-m-2.5 rounded-md p-2.5 text-on-surface-variant hover:text-on-surface"
                        @click="mobileMenuOpen = false">
                        <span class="sr-only">Close menu</span>
                        <x-lucide-x class="size-6" />
                    </button>
                </div>

                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-outline/10">
                        <div class="space-y-2 py-6">
                            <div x-data="{ open: false }">
                                <button @click="open = !open"
                                    class="-mx-3 flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 hover:bg-surface-container-low transition-colors text-on-surface">
                                    Treks
                                    <x-lucide-chevron-down class="size-4 transition-transform duration-200"
                                        x-bind:class="{ 'rotate-180': open }" />
                                </button>
                                <div x-show="open" class="mt-2 space-y-2" x-transition>
                                    <a href="{{ route('treks') }}?region=everest"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 hover:bg-surface-container-low text-on-surface-variant hover:text-primary transition-colors">Everest
                                        Region</a>
                                    <a href="{{ route('treks') }}?region=annapurna"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 hover:bg-surface-container-low text-on-surface-variant hover:text-primary transition-colors">Annapurna
                                        Region</a>
                                    <a href="{{ route('treks') }}?region=langtang"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 hover:bg-surface-container-low text-on-surface-variant hover:text-primary transition-colors">Langtang
                                        Region</a>
                                    <a href="{{ route('treks') }}"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 hover:bg-surface-container-low text-primary transition-colors">View
                                        all treks</a>
                                </div>
                            </div>

                            <a href="{{ route('projects') }}"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 {{ request()->routeIs('projects*') ? 'bg-primary-container text-on-primary-container' : 'text-on-surface hover:bg-surface-container-low' }} transition-colors">Projects</a>
                            <a href="{{ route('gallery') }}"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 {{ request()->routeIs('gallery') ? 'bg-primary-container text-on-primary-container' : 'text-on-surface hover:bg-surface-container-low' }} transition-colors">Gallery</a>
                            <a href="{{ route('blog') }}"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 {{ request()->routeIs('blog') ? 'bg-primary-container text-on-primary-container' : 'text-on-surface hover:bg-surface-container-low' }} transition-colors">Blogs</a>

                            <div x-data="{ open: false }">
                                <button @click="open = !open"
                                    class="-mx-3 flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 hover:bg-surface-container-low transition-colors text-on-surface">
                                    About Us
                                    <x-lucide-chevron-down class="size-4 transition-transform duration-200"
                                        x-bind:class="{ 'rotate-180': open }" />
                                </button>
                                <div x-show="open" class="mt-2 space-y-2" x-transition>
                                    <a href="{{ route('about') }}"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 hover:bg-surface-container-low text-on-surface-variant hover:text-primary transition-colors">About
                                        Neepa Adventure</a>
                                    @if (isset($navLegalDocuments) && $navLegalDocuments->isNotEmpty())
                                        <a href="{{ route('legal.index') }}"
                                            class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 hover:bg-surface-container-low text-on-surface-variant hover:text-primary transition-colors">Legal
                                            Documents</a>
                                    @endif
                                </div>
                            </div>

                            <a href="{{ route('contact') }}"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 {{ request()->routeIs('contact') ? 'bg-primary-container text-on-primary-container' : 'text-on-surface hover:bg-surface-container-low' }} transition-colors">Contact
                                Us</a>
                        </div>
                        <div class="py-6">
                            <a href="{{ route('plan-your-trek') }}"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 hover:bg-primary-container text-primary transition-colors">Plan
                                Your Trek</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</header>
