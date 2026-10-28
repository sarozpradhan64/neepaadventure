<header x-data="{ mobileMenuOpen: false }"
    class="bg-white/98 border-b border-glacier-border fixed top-0 z-50 w-full shadow-[0_2px_12px_rgba(11,79,138,0.08)] backdrop-blur-xl">
    {{-- Top bar --}}
    <div class="bg-ridge-deep px-gutter-mobile lg:px-gutter-desktop border-b border-on-primary/10">
        <div class="max-w-max-content-width text-body-sm mx-auto flex h-9 items-center justify-between overflow-x-auto no-scrollbar">
            <div class="gap-2 sm:gap-space-md flex items-center shrink-0">
                @if ($contact?->registration_number)
                    <span class="gap-1 sm:gap-space-2xs text-surface-container/70 font-label-sm text-[11px] sm:text-label-sm flex items-center whitespace-nowrap">
                        <x-lucide-file-text class="text-primary-container size-3.5 sm:size-[16px] shrink-0" />
                        <span class="hidden xs:inline">Regd:</span> {{ $contact->registration_number }}
                    </span>
                    <div class="h-3 sm:h-4 w-px bg-outline/20"></div>
                @endif
                <div class="flex items-center gap-2 sm:gap-3">
                    @foreach ($socials ?? [] as $social)
                        <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                            class="text-surface-container/60 hover:text-summit-white gap-1 font-label-sm text-[11px] sm:text-label-sm flex items-center font-semibold tracking-wider uppercase transition-colors shrink-0"
                            aria-label="{{ $social->platform }}">
                            @if (strtolower($social->platform) === 'facebook')
                                <x-lucide-facebook class="size-3.5 sm:size-[16px]" />
                            @elseif (strtolower($social->platform) === 'instagram')
                                <x-lucide-instagram class="size-3.5 sm:size-[16px]" />
                            @elseif (strtolower($social->platform) === 'twitter' || strtolower($social->platform) === 'x')
                                <x-lucide-twitter class="size-3.5 sm:size-[16px]" />
                            @elseif (strtolower($social->platform) === 'youtube')
                                <x-lucide-youtube class="size-3.5 sm:size-[16px]" />
                            @elseif (strtolower($social->platform) === 'tiktok')
                                <svg class="size-3.5 sm:size-[16px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5" />
                                </svg>
                            @else
                                <x-lucide-globe class="size-3.5 sm:size-[16px]" />
                                <span class="hidden sm:inline">{{ $social->platform }}</span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="gap-space-lg hidden items-center md:flex shrink-0">
                    <a class="gap-space-2xs text-surface-container/70 hover:text-summit-white font-label-sm text-label-sm flex items-center transition-colors"
                        href="tel:{{ preg_replace('/[^0-9+]/', '', $contact?->phone ?? '') }}">
                        <x-lucide-phone class="text-primary-container size-[16px]" />
                    {{ $contact?->phone ?? 'Contact us' }}
                </a>
                @if ($contact?->email)
                    <a class="gap-space-2xs text-surface-container/70 hover:text-summit-white font-label-sm text-label-sm flex items-center transition-colors"
                        href="mailto:{{ $contact->email }}">
                        <x-lucide-mail class="text-primary-container size-[16px]" />
                        {{ $contact->email }}
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- Main nav bar --}}
    <div
        class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop gap-2 sm:gap-space-md mx-auto flex h-16 sm:h-20 items-center justify-between">
        <div class="gap-2 sm:gap-space-md flex items-center min-w-0">
            <a href="{{ route('home') }}" class="flex items-center gap-2 sm:gap-3 min-w-0">
                @if (!empty($websiteSettings['logo']))
                    <img src="{{ Storage::url($websiteSettings['logo']) }}"
                        alt="{{ $contact?->company_name ?? config('app.name') }}" class="h-10 sm:h-14 md:h-16 w-auto object-contain shrink-0">
                @endif
                <span
                    class="font-headline-xs text-xs sm:text-sm md:text-headline-xs text-primary font-bold tracking-tight uppercase truncate max-w-[150px] xs:max-w-[190px] sm:max-w-xs md:max-w-none">{{ $contact?->company_name ?? config('app.name') }}</span>
            </a>
        </div>

        @php
            $checkUrlActive = function (?string $url) {
                if (!$url || $url === '#') {
                    return false;
                }
                if (request()->url() === url($url)) {
                    return true;
                }
                $path = trim(parse_url($url, PHP_URL_PATH) ?? '', '/');
                if ($path === '') {
                    return request()->path() === '/' || request()->path() === '';
                }
                return request()->is($path) || request()->is($path . '/*');
            };
        @endphp

        <nav class="hidden items-center gap-1.5 xl:flex">
            @foreach($navMenus as $menu)
                @php
                    $isServiceMenu = $menu->children->contains(fn($c) => $c->type === 'service_category' || ($c->children && $c->children->contains(fn($cc) => $cc->type === 'service_category')));

                    // Gather child service categories and direct services
                    $childTabs = collect();
                    $directServices = collect();

                    if ($isServiceMenu) {
                        foreach ($menu->children as $child) {
                            if ($child->type === 'service_category' && $child->serviceCategory) {
                                $cat = $child->serviceCategory;
                                if ($cat->children->isNotEmpty()) {
                                    foreach ($cat->children as $subCat) {
                                        $childTabs->push($subCat);
                                    }
                                } else {
                                    foreach ($cat->services as $srv) {
                                        $directServices->push($srv);
                                    }
                                }
                            } elseif ($child->children->isNotEmpty()) {
                                foreach ($child->children as $subItem) {
                                    if ($subItem->serviceCategory) {
                                        $childTabs->push($subItem->serviceCategory);
                                    }
                                }
                            }
                        }
                    }

                    $hasActiveChild = $menu->children->isNotEmpty() && $menu->children->contains(function ($child) use ($checkUrlActive) {
                        if ($checkUrlActive($child->url)) {
                            return true;
                        }
                        if ($child->serviceCategory) {
                            $cat = $child->serviceCategory;
                            if (request()->url() === route('services.category', $cat->slug) || request()->is('services/' . $cat->slug . '*')) {
                                return true;
                            }
                        }
                        return false;
                    });

                    if (!$hasActiveChild && strtolower($menu->title) === 'about us' && (request()->routeIs('legal.*') || request()->is('legal*'))) {
                        $hasActiveChild = true;
                    }

                    $isMenuActive = $checkUrlActive($menu->url) || $hasActiveChild;
                @endphp

                @if($menu->children->isNotEmpty())
                    @if($isServiceMenu)
                        {{-- Multi-level Service Mega Menu --}}
                        @if($childTabs->isNotEmpty())
                            {{-- Case 1: Child service categories exist -> render clickable tabs on the left, corresponding services on the right --}}
                            <div class="group relative py-6" x-data="{ activeTab: '{{ $childTabs->first()->id }}' }">
                                <a class="relative px-3.5 py-2 font-label-md text-label-md rounded-xl transition-all duration-200 flex items-center gap-1.5 {{ $isMenuActive ? 'text-amber-500 font-bold' : 'text-on-surface hover:text-amber-500 hover:bg-surface-container-high/40 font-medium' }}"
                                    href="{{ $menu->url }}">
                                    <span>{{ $menu->title }}</span>
                                    <x-lucide-chevron-down class="size-4 transition-transform group-hover:rotate-180 {{ $isMenuActive ? 'text-amber-500' : 'opacity-50 group-hover:text-amber-500' }}" />
                                </a>
                                <div class="absolute left-1/2 top-full -translate-x-1/2 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 w-[920px] max-w-[95vw]">
                                    <div class="bg-surface rounded-2xl shadow-2xl border border-outline/10 overflow-hidden flex min-h-[420px]">
                                        {{-- Left Sidebar: Child service categories as clickable tabs --}}
                                        <div class="w-64 bg-surface-container-lowest/40 border-r border-outline/10 py-3 flex flex-col shrink-0">
                                            @foreach($childTabs as $childCat)
                                                <a 
                                                    href="{{ route('services.category', $childCat->slug) }}"
                                                    @mouseenter="activeTab = '{{ $childCat->id }}'"
                                                    @click="activeTab = '{{ $childCat->id }}'"
                                                    :class="activeTab === '{{ $childCat->id }}' ? 'bg-surface-container-high/40 text-amber-500 font-bold' : 'text-on-surface hover:text-amber-500 hover:bg-surface/50 border-r-2 border-transparent'"
                                                    class="flex items-center justify-between py-2.5 px-4 text-sm font-semibold transition-all group/tab"
                                                >
                                                    <span class="truncate">{{ $childCat->name }}</span>
                                                    <x-lucide-chevron-right class="size-4 opacity-30 transition-transform group-hover/tab:translate-x-0.5" />
                                                </a>
                                            @endforeach
                                        </div>

                                        {{-- Right Content Area: Corresponding services of active child category --}}
                                        <div class="flex-1 p-6 bg-surface overflow-y-auto max-h-[500px]">
                                            {{-- Top Action: Contact Us button --}}
                                            <div class="mb-5">
                                                <a href="{{ route('contact') }}" class="inline-flex items-center px-4 py-2 bg-primary-container hover:bg-amber-flare text-on-primary-fixed text-xs font-semibold rounded-lg shadow-sm transition-colors">
                                                    Contact Us
                                                </a>
                                            </div>

                                            {{-- Tab Panels: Services of the child category --}}
                                            @foreach($childTabs as $childCat)
                                                <div x-show="activeTab === '{{ $childCat->id }}'">
                                                    @if($childCat->children && $childCat->children->isNotEmpty())
                                                        <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                                                            @foreach($childCat->children as $subCat)
                                                                <div>
                                                                    <h4 class="font-bold text-sm text-on-surface mb-3">{{ $subCat->name }}</h4>
                                                                    <ul class="space-y-2.5">
                                                                        @forelse($subCat->services as $srv)
                                                                            <li>
                                                                                <a href="{{ $srv->url }}" class="group/srv flex items-start justify-between gap-3 text-xs hover:text-amber-500 transition-colors">
                                                                                    <span class="text-on-surface-variant group-hover/srv:text-amber-500 font-medium transition-colors leading-relaxed">{{ $srv->title }}</span>
                                                                                    @if($srv->duration)
                                                                                        <span class="text-[10px] text-primary font-semibold uppercase tracking-wider shrink-0 whitespace-nowrap pt-0.5">{{ $srv->duration }}</span>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        @empty
                                                                            <li class="text-xs text-muted-foreground italic">No services listed</li>
                                                                        @endforelse
                                                                    </ul>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @elseif($childCat->services && $childCat->services->isNotEmpty())
                                                        <div class="grid grid-cols-2 gap-4">
                                                            @foreach($childCat->services as $srv)
                                                                <a href="{{ $srv->url }}" class="group/srv flex items-start justify-between gap-3 text-xs hover:text-amber-500 transition-colors p-2 rounded-lg hover:bg-surface-container-low transition-all">
                                                                    <span class="text-on-surface-variant group-hover/srv:text-amber-500 font-medium transition-colors leading-relaxed">{{ $srv->title }}</span>
                                                                    @if($srv->duration)
                                                                        <span class="text-[10px] text-primary font-semibold uppercase tracking-wider shrink-0 whitespace-nowrap pt-0.5">{{ $srv->duration }}</span>
                                                                    @endif
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <div class="py-12 text-center text-xs text-muted-foreground italic">
                                                            No services listed yet for this category.
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- Case 2: Child service category does not exist -> list all available services directly without left sidebar --}}
                            <div class="group relative py-6">
                                <a class="relative px-3.5 py-2 font-label-md text-label-md rounded-xl transition-all duration-200 flex items-center gap-1.5 {{ $isMenuActive ? 'text-amber-500 font-bold' : 'text-on-surface hover:text-amber-500 hover:bg-surface-container-high/40 font-medium' }}"
                                    href="{{ $menu->url }}">
                                    <span>{{ $menu->title }}</span>
                                    <x-lucide-chevron-down class="size-4 transition-transform group-hover:rotate-180 {{ $isMenuActive ? 'text-amber-500' : 'opacity-50 group-hover:text-amber-500' }}" />
                                </a>
                                <div class="absolute left-1/2 top-full -translate-x-1/2 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 w-[640px] max-w-[95vw]">
                                    <div class="bg-surface rounded-2xl shadow-2xl border border-outline/10 p-6 overflow-hidden">
                                        <div class="flex items-center justify-between pb-4 mb-4 border-b border-outline/10">
                                            <span class="text-xs font-semibold text-on-surface-variant">Available Services</span>
                                            <a href="{{ route('contact') }}" class="inline-flex items-center px-3.5 py-1.5 bg-primary-container hover:bg-amber-flare text-on-primary-fixed text-xs font-semibold rounded-lg shadow-sm transition-colors">
                                                Contact Us
                                            </a>
                                        </div>
                                        @if($directServices->isNotEmpty())
                                            <div class="grid grid-cols-2 gap-x-6 gap-y-3 max-h-[400px] overflow-y-auto">
                                                @foreach($directServices as $srv)
                                                    <a href="{{ $srv->url }}" class="group/srv flex items-start justify-between gap-3 text-xs hover:text-amber-500 transition-colors py-1">
                                                        <span class="text-on-surface-variant group-hover/srv:text-amber-500 font-medium transition-colors leading-relaxed">{{ $srv->title }}</span>
                                                        @if($srv->duration)
                                                            <span class="text-[10px] text-primary font-semibold uppercase tracking-wider shrink-0 whitespace-nowrap pt-0.5">{{ $srv->duration }}</span>
                                                        @endif
                                                    </a>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="py-8 text-center text-xs text-muted-foreground italic">
                                                No services available yet.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        {{-- Standard Dropdown Menu --}}
                        <div class="group relative py-6">
                            <a class="relative px-3.5 py-2 font-label-md text-label-md rounded-xl transition-all duration-200 flex items-center gap-1.5 {{ $isMenuActive ? 'text-amber-500 font-bold' : 'text-on-surface hover:text-amber-500 hover:bg-surface-container-high/40 font-medium' }}"
                                href="{{ $menu->url }}">
                                <span>{{ $menu->title }}</span>
                                <x-lucide-chevron-down class="size-4 transition-transform group-hover:rotate-180 {{ $isMenuActive ? 'text-amber-500' : 'opacity-50 group-hover:text-amber-500' }}" />
                            </a>
                            <div class="absolute left-1/2 top-full -translate-x-1/2 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 w-[350px]">
                                <div class="bg-surface rounded-2xl shadow-xl border border-outline/10 p-4">
                                    <div class="mb-2 px-3">
                                        <h3 class="text-label-sm font-label-sm text-primary font-bold tracking-wider uppercase">
                                            {{ $menu->title }}</h3>
                                    </div>
                                    @foreach($menu->children as $child)
                                        @php
                                            $isChildActive = $checkUrlActive($child->url);
                                        @endphp
                                        <a href="{{ $child->url }}"
                                            class="flex items-center gap-3 p-3 rounded-xl transition-all {{ $isChildActive ? 'bg-surface-container-high/50 text-amber-500 font-bold' : 'hover:bg-surface-container-high text-on-surface-variant hover:text-amber-500' }}">
                                            @if($child->icon)
                                                <div class="{{ $isChildActive ? 'bg-amber-500/10 text-amber-500' : 'bg-primary/10 text-primary' }} rounded-lg p-2 transition-colors">
                                                    <x-dynamic-component :component="'lucide-' . $child->icon" class="size-5" />
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <div class="text-body-sm font-semibold {{ $isChildActive ? 'text-amber-500' : 'text-on-surface' }}">{{ $child->title }}</div>
                                                @if($child->subtitle)
                                                    <div class="text-body-xs text-on-surface-variant">{{ $child->subtitle }}</div>
                                                @endif
                                            </div>
                                        </a>
                                    @endforeach
                                    @if(strtolower($menu->title) === 'about us' && isset($navLegalDocuments) && $navLegalDocuments->isNotEmpty())
                                        @php
                                            $isLegalActive = request()->routeIs('legal.*') || request()->is('legal*');
                                        @endphp
                                        <div class="mt-4 mb-2 px-3 border-t border-outline/10 pt-4">
                                            <h3 class="text-label-sm font-label-sm text-primary font-bold tracking-wider uppercase">
                                                Legal & Policies</h3>
                                        </div>
                                        <a href="{{ route('legal.index') }}"
                                            class="flex items-center gap-3 p-3 rounded-xl transition-all {{ $isLegalActive ? 'bg-surface-container-high/50 text-amber-500 font-bold' : 'hover:bg-surface-container-high text-on-surface-variant hover:text-amber-500' }}">
                                            <div class="{{ $isLegalActive ? 'bg-amber-500/10 text-amber-500' : 'bg-primary/10 text-primary' }} rounded-lg p-2 transition-colors">
                                                <x-lucide-scale class="size-4" />
                                            </div>
                                            <div class="flex-1">
                                                <div class="text-body-sm font-semibold {{ $isLegalActive ? 'text-amber-500' : 'text-on-surface' }}">Legal Documents</div>
                                                <div class="text-body-xs text-on-surface-variant">View all policies</div>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="py-6">
                        <a class="relative px-3.5 py-2 font-label-md text-label-md rounded-xl transition-all duration-200 inline-flex items-center {{ $isMenuActive ? 'text-amber-500 font-bold' : 'text-on-surface hover:text-amber-500 hover:bg-surface-container-high/40 font-medium' }}"
                            href="{{ $menu->url }}">
                            <span>{{ $menu->title }}</span>
                        </a>
                    </div>
                @endif
            @endforeach
        </nav>

        <div class="gap-1.5 sm:gap-space-sm flex items-center shrink-0">
            <a href="{{ route('treks') }}" aria-label="Search Treks"
                class="text-on-surface-variant hover:text-amber-500 hover:bg-surface-container-high/40 flex h-9 w-9 sm:h-10 sm:w-10 items-center justify-center rounded-xl transition-colors">
                <x-lucide-search class="size-5 sm:size-6" />
            </a>
            <a class="px-space-md sm:px-space-lg py-2 sm:py-space-sm bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-md text-xs sm:text-label-md hidden items-center justify-center rounded-xl font-bold tracking-wider uppercase shadow-[0_2px_8px_rgba(255,210,0,0.4)] transition-all sm:inline-flex"
                href="{{ route('plan-your-trek') }}">Book Now</a>
            <button @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Open Mobile Navigation"
                class="text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high flex h-9 w-9 sm:h-10 sm:w-10 items-center justify-center rounded-xl xl:hidden cursor-pointer">
                <x-lucide-menu class="size-5 sm:size-6" />
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
                class="fixed inset-y-0 right-0 z-[10000] w-full max-w-full sm:max-w-sm md:max-w-md overflow-y-auto bg-surface px-5 sm:px-6 py-5 sm:py-6 sm:ring-1 sm:ring-outline/10 shadow-2xl">
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
                            @foreach($navMenus as $menu)
                                @php
                                    $isMobileChildActive = $menu->children->isNotEmpty() && $menu->children->contains(function ($child) use ($checkUrlActive) {
                                        if ($checkUrlActive($child->url)) {
                                            return true;
                                        }
                                        if ($child->serviceCategory) {
                                            $cat = $child->serviceCategory;
                                            if (request()->url() === route('services.category', $cat->slug) || request()->is('services/' . $cat->slug . '*')) {
                                                return true;
                                            }
                                        }
                                        return false;
                                    });

                                    if (!$isMobileChildActive && strtolower($menu->title) === 'about us' && (request()->routeIs('legal.*') || request()->is('legal*'))) {
                                        $isMobileChildActive = true;
                                    }

                                    $isMobileMenuActive = $checkUrlActive($menu->url) || $isMobileChildActive;
                                @endphp
                                @if($menu->children->isNotEmpty())
                                    <div x-data="{ open: {{ $isMobileMenuActive ? 'true' : 'false' }} }">
                                        <button @click="open = !open"
                                            class="-mx-3 flex w-full items-center justify-between rounded-xl py-2 px-3 text-base font-semibold leading-7 transition-colors {{ $isMobileMenuActive ? 'text-amber-500 font-bold' : 'hover:bg-surface-container-low text-on-surface hover:text-amber-500' }}">
                                            <span>{{ $menu->title }}</span>
                                            <x-lucide-chevron-down class="size-4 transition-transform duration-200 {{ $isMobileMenuActive ? 'text-amber-500' : '' }}"
                                                x-bind:class="{ 'rotate-180': open }" />
                                        </button>
                                        <div x-show="open" class="mt-2 space-y-1 pl-2" x-transition>
                                            @foreach($menu->children as $child)
                                                @php
                                                    $isChildActive = $checkUrlActive($child->url);
                                                    $hasSub = ($child->serviceCategory && ($child->serviceCategory->children->isNotEmpty() || $child->serviceCategory->services->isNotEmpty())) || $child->children->isNotEmpty();
                                                @endphp
                                                @if($hasSub)
                                                    <div x-data="{ childOpen: false }" class="pl-3">
                                                        <button @click="childOpen = !childOpen" class="flex w-full items-center justify-between py-1.5 pr-3 text-sm font-semibold text-on-surface hover:text-amber-500">
                                                            <span>{{ $child->title }}</span>
                                                            <x-lucide-chevron-down class="size-3.5 transition-transform" x-bind:class="{ 'rotate-180': childOpen }" />
                                                        </button>
                                                        <div x-show="childOpen" class="space-y-1 pl-3 my-1">
                                                            @if($child->serviceCategory && $child->serviceCategory->children->isNotEmpty())
                                                                @foreach($child->serviceCategory->children as $subCat)
                                                                    <a href="{{ route('services.category', $subCat->slug) }}" class="block text-xs font-bold text-primary pt-1 hover:text-amber-500 hover:underline">{{ $subCat->name }}</a>
                                                                    @foreach($subCat->services as $srv)
                                                                        <a href="{{ $srv->url }}" class="block py-1 pl-2 text-xs text-on-surface-variant hover:text-amber-500">
                                                                            {{ $srv->title }}
                                                                        </a>
                                                                    @endforeach
                                                                @endforeach
                                                            @elseif($child->serviceCategory && $child->serviceCategory->services->isNotEmpty())
                                                                @foreach($child->serviceCategory->services as $srv)
                                                                    <a href="{{ $srv->url }}" class="block py-1 text-xs text-on-surface-variant hover:text-amber-500">
                                                                        {{ $srv->title }}
                                                                    </a>
                                                                @endforeach
                                                            @elseif($child->children->isNotEmpty())
                                                                @foreach($child->children as $subItem)
                                                                    <a href="{{ $subItem->url }}" class="block py-1 text-xs text-on-surface-variant hover:text-amber-500">
                                                                        {{ $subItem->title }}
                                                                    </a>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                @else
                                                    <a href="{{ $child->url }}"
                                                        class="flex items-center justify-between rounded-lg py-2 px-3 text-sm font-semibold leading-7 transition-colors {{ $isChildActive ? 'text-amber-500 font-bold' : 'hover:bg-surface-container-low text-on-surface-variant hover:text-amber-500' }}">
                                                        <span>{{ $child->title }}</span>
                                                    </a>
                                                @endif
                                            @endforeach
                                            @if(strtolower($menu->title) === 'about us' && isset($navLegalDocuments) && $navLegalDocuments->isNotEmpty())
                                                @php
                                                    $isLegalActive = request()->routeIs('legal.*') || request()->is('legal*');
                                                @endphp
                                                <a href="{{ route('legal.index') }}"
                                                    class="flex items-center justify-between rounded-lg py-2 px-3 text-sm font-semibold leading-7 transition-colors {{ $isLegalActive ? 'text-amber-500 font-bold' : 'hover:bg-surface-container-low text-on-surface-variant hover:text-amber-500' }}">
                                                    <span>Legal Documents</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ $menu->url }}"
                                        class="-mx-3 block rounded-xl px-3 py-2 text-base font-semibold leading-7 transition-colors {{ $isMobileMenuActive ? 'text-amber-500 font-bold' : 'text-on-surface hover:text-amber-500 hover:bg-surface-container-low' }}">{{ $menu->title }}</a>
                                @endif
                            @endforeach
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
