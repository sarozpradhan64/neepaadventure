<x-layouts.app>
    <x-slot:title>Explore All Schedules</x-slot>

    <x-header />

    <main class="w-full">
        <!-- Header Section -->
    <section class="bg-surface relative py-space-3xl overflow-hidden mt-20">
        <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto relative z-10 text-center">
            <h1 class="font-display-md text-display-md font-black text-on-surface tracking-tight mb-4">
                Guaranteed <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-amber-500">Departures</span>
            </h1>
            <p class="font-body-lg text-body-lg text-tertiary max-w-2xl mx-auto">
                Find the perfect time for your adventure. Browse our complete schedule of fixed departures with confirmed groups and expert lead guides.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-space-3xl relative w-full bg-white">
        <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
            
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-space-xl gap-4">
                <h2 class="font-headline-sm font-bold text-on-surface">Available Schedules</h2>
                
                <form action="{{ route('schedules') }}" method="GET" class="flex items-center gap-space-sm shrink-0">
                    <div class="relative group">
                        <select name="season" onchange="this.form.submit()" class="appearance-none bg-surface-container-lowest border-2 border-outline/10 hover:border-primary/30 rounded-xl pl-5 pr-12 py-3 text-on-surface font-label-md font-bold focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all cursor-pointer">
                            <option value="">All Seasons</option>
                            <option value="autumn" {{ request('season') == 'autumn' ? 'selected' : '' }}>Autumn (Oct - Nov)</option>
                            <option value="spring" {{ request('season') == 'spring' ? 'selected' : '' }}>Spring (Mar - May)</option>
                        </select>
                        <x-lucide-chevron-down class="absolute right-4 top-1/2 -translate-y-1/2 size-5 text-tertiary pointer-events-none group-hover:text-primary transition-colors" />
                    </div>
                </form>
            </div>

            <div class="space-y-space-md">
                @include('components.departures-list', ['departures' => $departures])
            </div>
            
            <div class="mt-space-2xl">
                {{ $departures->withQueryString()->links() }}
            </div>
        </div>
    </section>
    </main>

    <x-footer />
</x-layouts.app>
