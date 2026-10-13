<x-layouts.app>
    <x-slot:title>Guaranteed Departures & Fixed Schedules</x-slot>

    <x-header />

    <main class="bg-surface w-full pt-28">
        <div class="flex w-full flex-col">
            <!-- Breadcrumbs / Ribbon -->
            <section class="bg-surface-container-low px-gutter-mobile lg:px-gutter-desktop py-space-sm w-full border-b border-outline/10">
                <div class="max-w-max-content-width gap-space-xs text-body-sm mx-auto flex flex-col items-start justify-between md:flex-row md:items-center">
                    <nav aria-label="Breadcrumbs" class="gap-space-xs font-label-sm text-label-sm text-tertiary flex items-center">
                        <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
                        <x-lucide-chevron-right class="size-[14px]" />
                        <span class="text-on-surface font-semibold">Guaranteed Departures</span>
                    </nav>
                    <div class="gap-space-md flex items-center">
                        <span class="font-badge-caption text-badge-caption bg-surface-container-highest text-tertiary inline-flex items-center gap-1.5 rounded-full px-3 py-1 font-semibold uppercase tracking-wider">
                            <span class="bg-success h-2 w-2 animate-pulse rounded-full"></span>
                            100% GUARANTEED RUNS
                        </span>
                        <span class="text-tertiary hidden lg:inline">Small Group Himalayan Treks &bull; Confirmed Departures</span>
                    </div>
                </div>
            </section>

            <!-- Header Section -->
            <section class="bg-surface relative py-space-2xl overflow-hidden">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto relative z-10 text-center">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary mb-space-sm">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                        </span>
                        <span class="font-badge-caption text-badge-caption font-bold tracking-[0.2em] uppercase">{{ date('Y') }}/{{ date('Y') + 1 }} Schedule</span>
                    </div>
                    <h1 class="font-display-md text-display-md font-black text-on-surface tracking-tight mb-4">
                        Guaranteed <span class="text-primary font-bold">Departures</span>
                    </h1>
                    <p class="font-body-lg text-body-lg text-tertiary max-w-2xl mx-auto">
                        Find the ideal dates for your Himalayan journey. Browse our complete schedule of fixed departures with confirmed small groups, expert lead guides, and comprehensive alpine safety.
                    </p>
                </div>
            </section>

            <!-- Main Content -->
            <section class="py-space-2xl lg:py-space-3xl relative w-full bg-surface-container-low border-t border-outline/10">
                <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
                    
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-space-xl gap-4">
                        <div>
                            <h2 class="font-headline-sm font-bold text-on-surface">Available Schedules</h2>
                            <p class="text-body-sm text-tertiary">
                                Showing {{ $departures->total() }} confirmed {{ Str::plural('departure', $departures->total()) }}
                            </p>
                        </div>
                        
                        <form action="{{ route('schedules') }}" method="GET" class="flex items-center gap-space-sm shrink-0">
                            <div class="relative group">
                                <select name="season" onchange="this.form.submit()" class="appearance-none bg-surface-container-lowest border border-outline/15 hover:border-primary/40 rounded-xl pl-4 pr-10 py-2.5 text-on-surface font-label-md font-bold focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all cursor-pointer text-sm shadow-sm">
                                    <option value="">All Seasons</option>
                                    <option value="autumn" {{ request('season') == 'autumn' ? 'selected' : '' }}>Autumn (Sep &ndash; Nov)</option>
                                    <option value="spring" {{ request('season') == 'spring' ? 'selected' : '' }}>Spring (Mar &ndash; May)</option>
                                </select>
                                <x-lucide-chevron-down class="absolute right-3.5 top-1/2 -translate-y-1/2 size-4 text-tertiary pointer-events-none group-hover:text-primary transition-colors" />
                            </div>
                        </form>
                    </div>

                    <div class="space-y-space-md">
                        @include('components.departures-list', ['departures' => $departures])
                    </div>
                    
                    @if($departures->hasPages())
                        <div class="mt-space-2xl">
                            {{ $departures->withQueryString()->links() }}
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </main>

    <x-footer />
</x-layouts.app>
