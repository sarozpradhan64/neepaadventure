<x-layouts.app>
    <x-slot:title>Legal Documents | {{ config('app.name') }}</x-slot:title>

    <x-header />

    <main class="bg-surface pb-space-3xl min-h-screen pt-28">
        <div class="flex w-full flex-col">
            <!-- Breadcrumbs -->
            <div class="bg-surface-container-low py-space-sm px-gutter-mobile lg:px-gutter-desktop w-full mb-12">
                <div class="max-w-max-content-width gap-space-sm mx-auto flex flex-wrap items-center justify-between">
                    <div class="gap-space-2xs font-label-sm text-label-sm text-tertiary flex items-center">
                        <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
                        <x-lucide-chevron-right class="size-[14px]" />
                        <a class="hover:text-primary transition-colors" href="{{ route('about') }}">About Us</a>
                        <x-lucide-chevron-right class="size-[14px]" />
                        <span class="text-on-surface font-semibold">Legal & Policies</span>
                    </div>
                    <div class="gap-space-md font-badge-caption text-badge-caption flex items-center uppercase">
                        <span class="gap-space-2xs text-tertiary flex items-center">
                            <span class="bg-primary-container h-2 w-2 rounded-full"></span>
                            Registered Company
                        </span>
                    </div>
                </div>
            </div>

            <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
            <div class="mb-12 max-w-4xl space-y-6">
                <p class="text-body-lg text-on-surface leading-relaxed">
                    <span class="text-primary font-semibold">{{ $contact?->company_name ?? config('app.name') }}</span> is a Nepal government-licensed and registered company that offers tours, treks, travel, peak climbing, and other related travel activities.
                </p>
                <p class="text-body-lg text-on-surface leading-relaxed">
                    We are a local tourism company in Nepal, and we are fully aware of our duties and responsibilities.
                </p>
                <p class="text-body-lg text-on-surface leading-relaxed">
                    Besides being a <span class="font-semibold">Nepal government-registered company</span>, {{ $contact?->company_name ?? config('app.name') }} is affiliated with the <span class="font-semibold">Nepal Tourism Board (NTB)</span>, the <span class="font-semibold">Trekking Agencies Association of Nepal (TAAN)</span>, the <span class="font-semibold">Department of Cottage & Small Industries</span>, the <span class="font-semibold">Inland Revenue Department</span>, <span class="font-semibold text-primary">Nepal Mountaineering Association</span> (NMA) Kathmandu, and the Foreign Transaction Authority from the <span class="font-semibold">Central Bank</span> of Nepal.
                </p>
                <p class="text-body-lg text-on-surface leading-relaxed">
                    You can see our licenses and letters of affiliation below.
                </p>
            </div>
            
            <div class="mt-16">
                <h2 class="text-headline-md font-headline-md text-on-surface mb-8 font-bold">Registrations and Affiliations</h2>
                
                @if($legalDocuments->isEmpty())
                    <div class="bg-surface-container p-8 text-center rounded-xl">
                        <x-lucide-file-text class="size-12 text-tertiary mx-auto mb-4 opacity-50" />
                        <p class="text-tertiary font-medium">No legal documents are currently available.</p>
                    </div>
                @else
                    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach($legalDocuments as $document)
                            @php
                                $isImage = preg_match('/\.(jpg|jpeg|png|webp|gif)$/i', $document->file_path);
                            @endphp
                            
                            <a href="{{ route('legal-document.show', $document->slug) }}" target="_blank" rel="noopener noreferrer" class="group block">
                                <div class="bg-surface-container-lowest border border-outline/10 shadow-sm rounded-lg overflow-hidden aspect-[3/4] mb-3 relative transition-all duration-300 group-hover:shadow-md group-hover:border-primary/30 group-hover:-translate-y-1">
                                    @if($document->file_path && $isImage)
                                        <img src="{{ Storage::disk('public')->url($document->file_path) }}" alt="{{ $document->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center p-6 text-center bg-surface-container-low/50">
                                            <x-lucide-file-text class="size-12 text-tertiary mb-3 group-hover:text-primary transition-colors" />
                                            <span class="text-body-sm font-semibold text-on-surface-variant">{{ $document->title }}</span>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="text-label-md font-label-md text-on-surface text-center font-bold">{{ $document->title }}</h3>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        </div>
    </main>

    <x-footer />
</x-layouts.app>
