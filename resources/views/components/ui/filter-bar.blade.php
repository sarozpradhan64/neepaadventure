@props([
    'action' => request()->url(),
    'clearUrl' => request()->url(),
])

<div class=" flex flex-col gap-4 mb-6">
    <form action="{{ $action }}" method="GET" class="flex flex-wrap items-center gap-4 bg-card p-4 rounded-lg border">
        
        {{ $slot }}

        <div class="shrink-0 flex gap-2 items-center ml-auto">
            <x-ui.button type="submit" size="sm" class="bg-primary/10 text-primary hover:bg-primary/20 hover:text-primary">
                Apply Filters
            </x-ui.button>
            <x-ui.button type="button" variant="ghost" size="sm" href="{{ $clearUrl }}">
                <x-slot:before><x-lucide-refresh-cw class="size-4" /></x-slot:before>
                Clear Filters
            </x-ui.button>
        </div>
    </form>
</div>
