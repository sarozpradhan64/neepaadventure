<x-layouts.app>
    <x-slot:title>{{ $legalDocument->title }} | {{ config('app.name') }}</x-slot:title>

    <x-header />

    <main class="bg-surface-container-lowest pb-space-3xl min-h-screen pt-32">
        <div class="max-w-3xl px-gutter-mobile lg:px-gutter-desktop mx-auto">
            <h1 class="text-display-sm font-display-sm text-on-surface mb-8 font-bold tracking-tight">
                {{ $legalDocument->title }}
            </h1>
            
            <div class="prose prose-on-surface lg:prose-lg max-w-none">
                {!! $legalDocument->content !!}
            </div>
            
            <div class="mt-12 text-body-sm text-on-surface-variant">
                Last updated on {{ $legalDocument->updated_at->format('F d, Y') }}
            </div>
        </div>
    </main>

    <x-footer />
</x-layouts.app>
