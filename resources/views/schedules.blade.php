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
                            <h2 id="available-schedules" class="font-headline-sm font-bold text-on-surface">Available Schedules</h2>
                            <p id="schedules-count" class="text-body-sm text-tertiary">
                                Showing {{ $departures->total() }} confirmed {{ Str::plural('departure', $departures->total()) }}
                            </p>
                        </div>
                        
                        <div class="flex items-center gap-space-sm shrink-0 w-52 sm:w-56">
                            <x-ui.select
                                id="season-filter"
                                name="season"
                                value="{{ request('season', '') }}"
                                :search="false"
                                :allow-deselect="false"
                                class="w-full"
                            >
                                <x-ui.select-item value="">All Seasons</x-ui.select-item>
                                <x-ui.select-item value="autumn">Autumn (Sep &ndash; Nov)</x-ui.select-item>
                                <x-ui.select-item value="spring">Spring (Mar &ndash; May)</x-ui.select-item>
                            </x-ui.select>
                        </div>
                    </div>

                    <div id="departures-container" class="space-y-space-md transition-opacity duration-200">
                        @include('components.departures-list', ['departures' => $departures])
                    </div>
                    
                    <div id="pagination-container" class="mt-space-2xl transition-opacity duration-200">
                        @if($departures->hasPages())
                            {{ $departures->withQueryString()->links() }}
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </main>

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const seasonFilter = document.getElementById('season-filter');
            const departuresContainer = document.getElementById('departures-container');
            const schedulesCount = document.getElementById('schedules-count');
            const paginationContainer = document.getElementById('pagination-container');

            function fetchSchedules(fetchUrl, updateHistory = true) {
                if (!departuresContainer) return;

                departuresContainer.style.opacity = '0.5';
                if (paginationContainer) paginationContainer.style.opacity = '0.5';

                const url = new URL(fetchUrl, window.location.origin);
                url.searchParams.set('partial', '1');

                fetch(url.toString(), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    departuresContainer.innerHTML = data.html;
                    departuresContainer.style.opacity = '1';

                    if (schedulesCount && data.count_text) {
                        schedulesCount.textContent = data.count_text;
                    }

                    if (paginationContainer) {
                        paginationContainer.innerHTML = data.pagination || '';
                        paginationContainer.style.opacity = '1';
                    }

                    if (updateHistory) {
                        const historyUrl = new URL(fetchUrl, window.location.origin);
                        historyUrl.searchParams.delete('partial');
                        window.history.pushState(
                            { season: historyUrl.searchParams.get('season') || '', page: historyUrl.searchParams.get('page') || '' },
                            '',
                            historyUrl.toString()
                        );
                    }
                })
                .catch(error => {
                    console.error('Error fetching schedules:', error);
                    departuresContainer.style.opacity = '1';
                    if (paginationContainer) paginationContainer.style.opacity = '1';
                });
            }

            if (seasonFilter && departuresContainer) {
                seasonFilter.addEventListener('change', function () {
                    const season = this.value;
                    const url = new URL('{{ route('schedules') }}', window.location.origin);
                    if (season) {
                        url.searchParams.set('season', season);
                    }
                    fetchSchedules(url.toString(), true);
                });
            }

            if (paginationContainer) {
                paginationContainer.addEventListener('click', function (e) {
                    const link = e.target.closest('a');
                    if (!link || !link.href) return;
                    e.preventDefault();
                    fetchSchedules(link.href, true);
                    window.scrollTo({ top: departuresContainer.offsetTop - 100, behavior: 'smooth' });
                });
            }

            window.addEventListener('popstate', function (e) {
                const state = e.state;
                const season = state?.season ?? (new URLSearchParams(window.location.search).get('season') || '');
                if (seasonFilter?._slimSelect) {
                    seasonFilter._slimSelect.setSelected(season);
                } else if (seasonFilter) {
                    seasonFilter.value = season;
                }
                fetchSchedules(window.location.href, false);
            });
        });
    </script>
</x-layouts.app>
