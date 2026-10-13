<header x-data="{ mobileMenuOpen: false }"
    class="bg-surface-container-lowest/95 fixed top-0 z-50 w-full shadow-[0_1px_8px_rgba(0,0,0,0.04)] backdrop-blur-xl">
    {{-- Top bar --}}
    <div class="bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop">
        <div class="max-w-max-content-width text-body-sm mx-auto flex h-9 items-center justify-between">
            <div class="gap-space-md flex items-center">
                @if ($contact?->registration_number)
                    <span class="gap-space-2xs text-on-surface-variant font-label-sm text-label-sm flex items-center">
                        <x-lucide-file-text class="text-primary size-[16px]" />
                        Regd: {{ $contact->registration_number }}
                    </span>
                    <div class="h-4 w-px bg-outline/20 hidden md:block"></div>
                @endif
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
                                <a class="relative px-3 py-2 font-label-md text-label-md rounded-lg transition-all duration-200 flex items-center gap-1.5 {{ $isMenuActive ? 'text-on-surface font-bold' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high/40 font-medium' }}"
                                    href="{{ $menu->url }}">
                                    <span>{{ $menu->title }}</span>
                                    <x-lucide-chevron-down class="size-4 transition-transform group-hover:rotate-180 {{ $isMenuActive ? 'text-primary' : 'opacity-50' }}" />
                                    @if($isMenuActive)
                                        <span class="absolute bottom-0 inset-x-2 h-[2.5px] rounded-full bg-primary"></span>
                                    @endif
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
                                                    :class="activeTab === '{{ $childCat->id }}' ? 'bg-sky-50/70 dark:bg-sky-950/30 text-primary font-bold border-r-2 border-primary' : 'text-on-surface hover:text-primary hover:bg-surface/50 border-r-2 border-transparent'"
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
                                                                                <a href="{{ $srv->url }}" class="group/srv flex items-start justify-between gap-3 text-xs hover:text-primary transition-colors">
                                                                                    <span class="text-on-surface-variant group-hover/srv:text-primary font-medium transition-colors leading-relaxed">{{ $srv->title }}</span>
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
                                                                <a href="{{ $srv->url }}" class="group/srv flex items-start justify-between gap-3 text-xs hover:text-primary transition-colors p-2 rounded-lg hover:bg-surface-container-low transition-all">
                                                                    <span class="text-on-surface-variant group-hover/srv:text-primary font-medium transition-colors leading-relaxed">{{ $srv->title }}</span>
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
                                <a class="relative px-3 py-2 font-label-md text-label-md rounded-lg transition-all duration-200 flex items-center gap-1.5 {{ $isMenuActive ? 'text-on-surface font-bold' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high/40 font-medium' }}"
                                    href="{{ $menu->url }}">
                                    <span>{{ $menu->title }}</span>
                                    <x-lucide-chevron-down class="size-4 transition-transform group-hover:rotate-180 {{ $isMenuActive ? 'text-primary' : 'opacity-50' }}" />
                                    @if($isMenuActive)
                                        <span class="absolute bottom-0 inset-x-2 h-[2.5px] rounded-full bg-primary"></span>
                                    @endif
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
                                                    <a href="{{ $srv->url }}" class="group/srv flex items-start justify-between gap-3 text-xs hover:text-primary transition-colors py-1">
                                                        <span class="text-on-surface-variant group-hover/srv:text-primary font-medium transition-colors leading-relaxed">{{ $srv->title }}</span>
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
                            <a class="relative px-3 py-2 font-label-md text-label-md rounded-lg transition-all duration-200 flex items-center gap-1.5 {{ $isMenuActive ? 'text-on-surface font-bold' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high/40 font-medium' }}"
                                href="{{ $menu->url }}">
                                <span>{{ $menu->title }}</span>
                                <x-lucide-chevron-down class="size-4 transition-transform group-hover:rotate-180 {{ $isMenuActive ? 'text-primary' : 'opacity-50' }}" />
                                @if($isMenuActive)
                                    <span class="absolute bottom-0 inset-x-2 h-[2.5px] rounded-full bg-primary"></span>
                                @endif
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
                                            class="flex items-center gap-3 p-3 rounded-xl transition-all {{ $isChildActive ? 'bg-primary/10 shadow-[inset_0_0_0_1px_rgba(246,186,26,0.25)] text-on-surface font-semibold' : 'hover:bg-surface-container-high text-on-surface-variant hover:text-on-surface' }}">
                                            @if($child->icon)
                                                <div class="{{ $isChildActive ? 'bg-primary text-on-primary-fixed shadow-sm' : 'bg-primary/10 text-primary' }} rounded-lg p-2 transition-colors">
                                                    <x-dynamic-component :component="'lucide-' . $child->icon" class="size-5" />
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <div class="text-body-sm font-semibold {{ $isChildActive ? 'text-primary' : 'text-on-surface' }}">{{ $child->title }}</div>
                                                @if($child->subtitle)
                                                    <div class="text-body-xs text-on-surface-variant">{{ $child->subtitle }}</div>
                                                @endif
                                            </div>
                                            @if($isChildActive)
                                                <span class="size-1.5 rounded-full bg-primary"></span>
                                            @endif
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
                                            class="flex items-center gap-3 p-3 rounded-xl transition-all {{ $isLegalActive ? 'bg-primary/10 shadow-[inset_0_0_0_1px_rgba(246,186,26,0.25)] text-on-surface font-semibold' : 'hover:bg-surface-container-high text-on-surface-variant hover:text-on-surface' }}">
                                            <div class="{{ $isLegalActive ? 'bg-primary text-on-primary-fixed shadow-sm' : 'bg-primary/10 text-primary' }} rounded-lg p-2 transition-colors">
                                                <x-lucide-scale class="size-4" />
                                            </div>
                                            <div class="flex-1">
                                                <div class="text-body-sm font-semibold {{ $isLegalActive ? 'text-primary' : 'text-on-surface' }}">Legal Documents</div>
                                                <div class="text-body-xs text-on-surface-variant">View all policies</div>
                                            </div>
                                            @if($isLegalActive)
                                                <span class="size-1.5 rounded-full bg-primary"></span>
                                            @endif
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="py-6">
                        <a class="relative px-3 py-2 font-label-md text-label-md rounded-lg transition-all duration-200 inline-flex items-center {{ $isMenuActive ? 'text-on-surface font-bold' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high/40 font-medium' }}"
                            href="{{ $menu->url }}">
                            <span>{{ $menu->title }}</span>
                            @if($isMenuActive)
                                <span class="absolute bottom-0 inset-x-2 h-[2.5px] rounded-full bg-primary"></span>
                            @endif
                        </a>
                    </div>
                @endif
            @endforeach
        </nav>

        <div class="gap-space-sm flex items-center">
            <a href="{{ route('treks') }}" aria-label="Search Treks"
                class="text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high flex h-10 w-10 items-center justify-center rounded-lg transition-colors">
                <x-lucide-search class="size-6" />
            </a>
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
                                            class="-mx-3 flex w-full items-center justify-between rounded-xl py-2 pl-3 pr-3.5 text-base font-semibold leading-7 transition-colors {{ $isMobileMenuActive ? 'bg-primary/10 text-on-surface font-bold border-l-4 border-primary pl-2' : 'hover:bg-surface-container-low text-on-surface' }}">
                                            <span>{{ $menu->title }}</span>
                                            <x-lucide-chevron-down class="size-4 transition-transform duration-200 {{ $isMobileMenuActive ? 'text-primary' : '' }}"
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
                                                        <button @click="childOpen = !childOpen" class="flex w-full items-center justify-between py-1.5 pr-3 text-sm font-semibold text-on-surface hover:text-primary">
                                                            <span>{{ $child->title }}</span>
                                                            <x-lucide-chevron-down class="size-3.5 transition-transform" x-bind:class="{ 'rotate-180': childOpen }" />
                                                        </button>
                                                        <div x-show="childOpen" class="space-y-1 pl-3 my-1">
                                                            @if($child->serviceCategory && $child->serviceCategory->children->isNotEmpty())
                                                                @foreach($child->serviceCategory->children as $subCat)
                                                                    <a href="{{ route('services.category', $subCat->slug) }}" class="block text-xs font-bold text-primary pt-1 hover:underline">{{ $subCat->name }}</a>
                                                                    @foreach($subCat->services as $srv)
                                                                        <a href="{{ $srv->url }}" class="block py-1 pl-2 text-xs text-on-surface-variant hover:text-primary">
                                                                            {{ $srv->title }}
                                                                        </a>
                                                                    @endforeach
                                                                @endforeach
                                                            @elseif($child->serviceCategory && $child->serviceCategory->services->isNotEmpty())
                                                                @foreach($child->serviceCategory->services as $srv)
                                                                    <a href="{{ $srv->url }}" class="block py-1 text-xs text-on-surface-variant hover:text-primary">
                                                                        {{ $srv->title }}
                                                                    </a>
                                                                @endforeach
                                                            @elseif($child->children->isNotEmpty())
                                                                @foreach($child->children as $subItem)
                                                                    <a href="{{ $subItem->url }}" class="block py-1 text-xs text-on-surface-variant hover:text-primary">
                                                                        {{ $subItem->title }}
                                                                    </a>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                @else
                                                    <a href="{{ $child->url }}"
                                                        class="flex items-center justify-between rounded-lg py-2 pl-4 pr-3 text-sm font-semibold leading-7 transition-colors {{ $isChildActive ? 'bg-primary/10 text-primary font-bold shadow-[inset_0_0_0_1px_rgba(246,186,26,0.2)]' : 'hover:bg-surface-container-low text-on-surface-variant hover:text-primary' }}">
                                                        <span>{{ $child->title }}</span>
                                                        @if($isChildActive)
                                                            <span class="size-1.5 rounded-full bg-primary"></span>
                                                        @endif
                                                    </a>
                                                @endif
                                            @endforeach
                                            @if(strtolower($menu->title) === 'about us' && isset($navLegalDocuments) && $navLegalDocuments->isNotEmpty())
                                                @php
                                                    $isLegalActive = request()->routeIs('legal.*') || request()->is('legal*');
                                                @endphp
                                                <a href="{{ route('legal.index') }}"
                                                    class="flex items-center justify-between rounded-lg py-2 pl-4 pr-3 text-sm font-semibold leading-7 transition-colors {{ $isLegalActive ? 'bg-primary/10 text-primary font-bold shadow-[inset_0_0_0_1px_rgba(246,186,26,0.2)]' : 'hover:bg-surface-container-low text-on-surface-variant hover:text-primary' }}">
                                                    <span>Legal Documents</span>
                                                    @if($isLegalActive)
                                                        <span class="size-1.5 rounded-full bg-primary"></span>
                                                    @endif
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ $menu->url }}"
                                        class="-mx-3 block rounded-xl px-3 py-2 text-base font-semibold leading-7 transition-colors {{ $isMobileMenuActive ? 'bg-primary/10 text-on-surface font-bold border-l-4 border-primary pl-2' : 'text-on-surface hover:bg-surface-container-low' }}">{{ $menu->title }}</a>
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
