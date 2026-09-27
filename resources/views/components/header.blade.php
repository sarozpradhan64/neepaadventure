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
                @if ($contact?->email)
                    <a
                        class="gap-space-2xs text-on-surface-variant hover:text-on-surface font-label-sm text-label-sm flex items-center transition-colors"
                        href="mailto:{{ $contact->email }}"
                    >
                        <x-lucide-mail class="text-primary size-[16px]" />
                        {{ $contact->email }}
                    </a>
                @endif
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

        <nav class="hidden items-center gap-2 xl:flex">
            {{-- Treks Dropdown --}}
            <div class="group relative py-6">
                <a
                    class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('treks*') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} flex items-center gap-1 transition-colors"
                    href="{{ route('treks') }}"
                >
                    Treks
                    <x-lucide-chevron-down class="size-4 opacity-50 transition-transform group-hover:rotate-180" />
                </a>
                <div class="absolute left-1/2 top-full -translate-x-1/2 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 w-[600px]">
                    <div class="bg-surface rounded-2xl shadow-xl border border-outline/10 p-6 overflow-hidden">
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-label-sm font-label-sm text-primary font-bold tracking-wider uppercase mb-4">Popular Regions</h3>
                                <ul class="space-y-3">
                                    <li>
                                        <a href="{{ route('treks') }}?region=everest" class="group/item flex items-center gap-3">
                                            <div class="bg-surface-container-high group-hover/item:bg-primary-container rounded-md p-2 transition-colors">
                                                <x-lucide-mountain class="size-4 text-on-surface-variant group-hover/item:text-primary" />
                                            </div>
                                            <div>
                                                <div class="text-body-sm font-body-sm text-on-surface font-semibold group-hover/item:text-primary transition-colors">Everest Region</div>
                                                <div class="text-body-xs font-body-xs text-on-surface-variant">Iconic peaks & sherpa culture</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('treks') }}?region=annapurna" class="group/item flex items-center gap-3">
                                            <div class="bg-surface-container-high group-hover/item:bg-primary-container rounded-md p-2 transition-colors">
                                                <x-lucide-map class="size-4 text-on-surface-variant group-hover/item:text-primary" />
                                            </div>
                                            <div>
                                                <div class="text-body-sm font-body-sm text-on-surface font-semibold group-hover/item:text-primary transition-colors">Annapurna Region</div>
                                                <div class="text-body-xs font-body-xs text-on-surface-variant">Diverse landscapes & trails</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('treks') }}?region=langtang" class="group/item flex items-center gap-3">
                                            <div class="bg-surface-container-high group-hover/item:bg-primary-container rounded-md p-2 transition-colors">
                                                <x-lucide-tent class="size-4 text-on-surface-variant group-hover/item:text-primary" />
                                            </div>
                                            <div>
                                                <div class="text-body-sm font-body-sm text-on-surface font-semibold group-hover/item:text-primary transition-colors">Langtang Region</div>
                                                <div class="text-body-xs font-body-xs text-on-surface-variant">Valley of glaciers & lakes</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="bg-surface-container-low -m-6 p-6">
                                <h3 class="text-label-sm font-label-sm text-primary font-bold tracking-wider uppercase mb-4">Featured</h3>
                                <a href="{{ route('treks') }}" class="group/feature block relative rounded-xl overflow-hidden aspect-[4/3]">
                                    <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?q=80&w=600&auto=format&fit=crop" alt="Featured Trek" class="w-full h-full object-cover transition-transform duration-700 group-hover/feature:scale-105">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-4">
                                        <span class="text-white font-bold text-title-sm mb-1">Everest Base Camp</span>
                                        <span class="text-white/80 text-body-xs flex items-center gap-1">
                                            <x-lucide-clock class="size-3" /> 14 Days
                                        </span>
                                    </div>
                                </a>
                                <a href="{{ route('treks') }}" class="mt-4 text-label-sm font-label-sm text-primary font-bold hover:text-primary-600 flex items-center gap-1 transition-colors">
                                    View all treks <x-lucide-arrow-right class="size-4" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Projects Dropdown --}}
            <div class="group relative py-6">
                <a
                    class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('projects*') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} flex items-center gap-1 transition-colors"
                    href="{{ route('projects') }}"
                >
                    Projects
                    <x-lucide-chevron-down class="size-4 opacity-50 transition-transform group-hover:rotate-180" />
                </a>
                <div class="absolute left-1/2 top-full -translate-x-1/2 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 w-[300px]">
                    <div class="bg-surface rounded-2xl shadow-xl border border-outline/10 p-2">
                        <a href="{{ route('projects') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-surface-container-high transition-colors">
                            <div class="bg-primary/10 text-primary rounded-lg p-2">
                                <x-lucide-folder-git-2 class="size-5" />
                            </div>
                            <div>
                                <div class="text-body-sm font-semibold text-on-surface">Our Initiatives</div>
                                <div class="text-body-xs text-on-surface-variant">Community & conservation</div>
                            </div>
                        </a>
                        <a href="{{ route('projects') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-surface-container-high transition-colors">
                            <div class="bg-primary/10 text-primary rounded-lg p-2">
                                <x-lucide-heart-handshake class="size-5" />
                            </div>
                            <div>
                                <div class="text-body-sm font-semibold text-on-surface">Get Involved</div>
                                <div class="text-body-xs text-on-surface-variant">Volunteer with us</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Standard Links --}}
            <div class="py-6">
                <a
                    class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('gallery') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                    href="{{ route('gallery') }}"
                >Gallery</a>
            </div>
            
            <div class="py-6">
                <a
                    class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('blog') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                    href="{{ route('blog') }}"
                >Blogs</a>
            </div>
            
            {{-- About Us Dropdown --}}
            <div class="group relative py-6">
                <a
                    class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('about*') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} flex items-center gap-1 transition-colors"
                    href="{{ route('about') }}"
                >
                    About Us
                    <x-lucide-chevron-down class="size-4 opacity-50 transition-transform group-hover:rotate-180" />
                </a>
                <div class="absolute left-1/2 top-full -translate-x-1/2 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 w-[350px]">
                    <div class="bg-surface rounded-2xl shadow-xl border border-outline/10 p-4">
                        <div class="mb-2 px-3">
                            <h3 class="text-label-sm font-label-sm text-primary font-bold tracking-wider uppercase">Company</h3>
                        </div>
                        <a href="{{ route('about') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-surface-container-high transition-colors">
                            <div class="bg-primary/10 text-primary rounded-lg p-2">
                                <x-lucide-users class="size-5" />
                            </div>
                            <div>
                                <div class="text-body-sm font-semibold text-on-surface">About Neepa Adventure</div>
                                <div class="text-body-xs text-on-surface-variant">Our story & team</div>
                            </div>
                        </a>
                        
                        @if(isset($navLegalDocuments) && $navLegalDocuments->isNotEmpty())
                            <div class="mt-4 mb-2 px-3 border-t border-outline/10 pt-4">
                                <h3 class="text-label-sm font-label-sm text-primary font-bold tracking-wider uppercase">Legal & Policies</h3>
                            </div>
                            <a href="{{ route('legal.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-surface-container-high transition-colors">
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
                <a
                    class="px-space-sm py-space-2xs font-label-md text-label-md {{ request()->routeIs('contact') ? 'text-on-primary-container bg-primary-container font-semibold rounded-lg' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                    href="{{ route('contact') }}"
                >Contact Us</a>
            </div>
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
