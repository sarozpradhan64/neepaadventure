<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-48 pb-24">
        <div class="max-w-3xl mx-auto px-gutter-mobile lg:px-gutter-desktop">
            <div class="mb-8">
                <a href="{{ route('careers.index') }}" class="inline-flex items-center text-primary font-label-md hover:underline mb-6">
                    <x-lucide-arrow-left class="size-4 mr-2" />
                    Back to all careers
                </a>
                
                @if($job->category)
                    <div class="text-primary font-badge-caption uppercase tracking-wider mb-3">
                        {{ $job->category->title }}
                    </div>
                @endif
                
                <h1 class="font-headline-lg text-headline-lg text-on-surface font-bold mb-6">
                    {{ $job->title }}
                </h1>
                
                <div class="flex flex-wrap gap-4 mb-8 pb-8 border-b border-surface-container">
                    @if($job->location)
                        <div class="flex items-center text-body-sm text-tertiary">
                            <x-lucide-map-pin class="size-5 mr-2 text-primary" />
                            <span class="font-semibold mr-1">Location:</span> {{ $job->location }}
                        </div>
                    @endif
                    @if($job->salary)
                        <div class="flex items-center text-body-sm text-tertiary">
                            <x-lucide-banknote class="size-5 mr-2 text-primary" />
                            <span class="font-semibold mr-1">Salary:</span> {{ $job->salary }}
                        </div>
                    @endif
                    @if($job->positions)
                        <div class="flex items-center text-body-sm text-tertiary">
                            <x-lucide-users class="size-5 mr-2 text-primary" />
                            <span class="font-semibold mr-1">Openings:</span> {{ $job->positions }}
                        </div>
                    @endif
                    @if($job->deadline)
                        <div class="flex items-center text-body-sm text-tertiary">
                            <x-lucide-calendar class="size-5 mr-2 text-primary" />
                            <span class="font-semibold mr-1">Apply Before:</span> {{ $job->deadline->format('M d, Y') }}
                        </div>
                    @endif
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-8 font-body-md flex items-start">
                    <x-lucide-check-circle class="size-6 mr-3 flex-shrink-0" />
                    {{ session('success') }}
                </div>
            @endif

            <div class="prose max-w-none prose-p:text-tertiary prose-headings:text-on-surface prose-li:text-tertiary mb-12">
                @if($job->description)
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold mb-4">Job Description</h2>
                        {!! $job->description !!}
                    </div>
                @endif

                @if($job->requirements)
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold mb-4">Requirements</h2>
                        {!! $job->requirements !!}
                    </div>
                @endif
            </div>

            <div class="bg-surface-container-low p-8 rounded-2xl text-center border border-primary/10">
                <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface mb-3">Ready to join our team?</h3>
                <p class="font-body-md text-tertiary mb-6">Apply now and start your journey with Neepa Adventure.</p>
                <a href="{{ route('careers.apply', $job->slug) }}" class="inline-flex items-center justify-center bg-primary-container text-on-primary-container hover:bg-amber-flare px-8 py-4 rounded-lg font-bold uppercase tracking-wider transition-colors shadow-sm">
                    Apply for this Position
                    <x-lucide-file-text class="size-5 ml-2" />
                </a>
            </div>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
