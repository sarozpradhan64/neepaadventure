<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full">
        <!-- Hero Section -->
        <section class="relative pt-48 pb-24 px-gutter-mobile lg:px-gutter-desktop overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&q=80&w=2000" alt="Himalayan Mountain Range" class="w-full h-full object-cover opacity-70">
                <div class="absolute inset-0 bg-gradient-to-b from-surface/95 via-surface/80 to-surface"></div>
            </div>
            <div class="relative z-10 max-w-max-content-width mx-auto text-center">
                <div class="font-badge-caption text-badge-caption text-primary font-bold tracking-[0.2em] uppercase mb-4">
                    Join Our Team
                </div>
                <h1 class="font-headline-lg text-headline-lg text-on-surface font-bold mb-4">
                    Forge Your Career in the Himalayas
                </h1>
                <p class="font-body-md text-body-md text-tertiary max-w-2xl mx-auto">
                    Are you passionate about high-altitude exploration and delivering exceptional experiences? Join a family of dedicated professionals preserving the heritage of Nepal's greatest trails.
                </p>
            </div>
        </section>

        <!-- Culture Section -->
        <section class="py-space-2xl px-gutter-mobile lg:px-gutter-desktop bg-surface-container-lowest border-y border-surface-container">
            <div class="max-w-max-content-width mx-auto">
                <div class="text-center mb-12">
                    <h2 class="font-headline-md text-headline-md font-bold text-on-surface">Why Neepa Adventure?</h2>
                    <p class="font-body-md text-tertiary mt-2 max-w-lg mx-auto">More than a job, it's a calling to the mountains. We take pride in how we treat our team and the environment.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-8 rounded-2xl bg-surface border border-surface-container hover:shadow-lg hover:border-primary/20 transition-all duration-300">
                        <div class="w-14 h-14 bg-primary/10 text-primary rounded-xl flex items-center justify-center mb-6">
                            <x-lucide-mountain-snow class="size-7" />
                        </div>
                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface mb-3">Heritage & Pride</h3>
                        <p class="font-body-sm text-tertiary leading-relaxed">We are deeply rooted in local communities. Work alongside indigenous leaders who share generations of unwritten mountain wisdom and culture.</p>
                    </div>
                    <div class="p-8 rounded-2xl bg-surface border border-surface-container hover:shadow-lg hover:border-primary/20 transition-all duration-300">
                        <div class="w-14 h-14 bg-primary/10 text-primary rounded-xl flex items-center justify-center mb-6">
                            <x-lucide-shield-check class="size-7" />
                        </div>
                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface mb-3">Uncompromising Safety</h3>
                        <p class="font-body-sm text-tertiary leading-relaxed">Safety is our bedrock. We provide top-tier medical training, specialized alpine gear, and strict protocols ensuring everyone returns home safely.</p>
                    </div>
                    <div class="p-8 rounded-2xl bg-surface border border-surface-container hover:shadow-lg hover:border-primary/20 transition-all duration-300">
                        <div class="w-14 h-14 bg-primary/10 text-primary rounded-xl flex items-center justify-center mb-6">
                            <x-lucide-heart-handshake class="size-7" />
                        </div>
                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface mb-3">Fair Compensation</h3>
                        <p class="font-body-sm text-tertiary leading-relaxed">We exceed national collective standards for wages. Our team enjoys comprehensive medical insurance, strict load limits for porters, and continuing education.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Open Positions -->
        <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop" x-data="{ activeTab: 'all' }">
            <div class="max-w-max-content-width mx-auto">
                <div class="mb-8 text-center">
                    <h2 class="font-headline-md text-headline-md font-bold text-on-surface">Open Positions</h2>
                    <p class="font-body-md text-tertiary mt-2">Find your next great adventure below.</p>
                </div>

                @if(isset($categories) && $categories->isNotEmpty() && !$jobs->isEmpty())
                <div class="flex flex-wrap justify-center gap-2 mb-10">
                    <button 
                        @click="activeTab = 'all'" 
                        :class="activeTab === 'all' ? 'bg-primary text-on-primary' : 'bg-surface-container hover:bg-surface-container-high text-on-surface'"
                        class="px-6 py-2.5 rounded-full font-label-md font-bold transition-colors">
                        All Openings
                    </button>
                    @foreach($categories as $category)
                    <button 
                        @click="activeTab = {{ $category->id }}" 
                        :class="activeTab === {{ $category->id }} ? 'bg-primary text-on-primary' : 'bg-surface-container hover:bg-surface-container-high text-on-surface'"
                        class="px-6 py-2.5 rounded-full font-label-md font-bold transition-colors">
                        {{ $category->title }}
                    </button>
                    @endforeach
                </div>
                @endif
                
                @if($jobs->isEmpty())
                    <div class="bg-surface-container-low p-12 rounded-xl text-center max-w-2xl mx-auto">
                        <x-lucide-briefcase class="size-16 text-tertiary mx-auto mb-4 opacity-50" />
                        <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold mb-2">No Open Positions</h3>
                        <p class="font-body-md text-body-md text-tertiary">
                            We currently do not have any open positions. Please check back later or follow us on social media for updates.
                        </p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($jobs as $job)
                            <div 
                                x-show="activeTab === 'all' || activeTab === {{ $job->job_category_id ?? 'null' }}"
                                x-transition
                                class="bg-surface-container-lowest p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-surface-container flex flex-col justify-between group">
                                <div>
                                    @if($job->category)
                                        <div class="text-primary font-label-sm uppercase tracking-wider mb-2">
                                            {{ $job->category->title }}
                                        </div>
                                    @endif
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold mb-3 group-hover:text-primary transition-colors">
                                        {{ $job->title }}
                                    </h3>
                                    <div class="text-tertiary font-body-sm mb-4 line-clamp-3">
                                        {{ $job->excerpt ?? Str::limit(strip_tags($job->description), 120) }}
                                    </div>
                                    <div class="flex flex-wrap gap-3 mb-6">
                                        @if($job->location)
                                            <div class="flex items-center text-label-sm text-tertiary bg-surface-container px-3 py-1 rounded-full">
                                                <x-lucide-map-pin class="size-4 mr-1.5" />
                                                {{ $job->location }}
                                            </div>
                                        @endif
                                        @if($job->deadline)
                                            <div class="flex items-center text-label-sm text-tertiary bg-surface-container px-3 py-1 rounded-full">
                                                <x-lucide-calendar class="size-4 mr-1.5" />
                                                By {{ $job->deadline->format('M d, Y') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('careers.show', $job->slug) }}" class="inline-flex items-center justify-center w-full bg-primary-container text-on-primary-container hover:bg-amber-flare px-6 py-3 rounded-lg font-bold uppercase tracking-wider transition-colors">
                                        View Details
                                        <x-lucide-arrow-right class="size-4 ml-2 group-hover:translate-x-1 transition-transform" />
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>
    <x-footer />
</x-layouts.app>
