@props(['column', 'sort_by' => request('sort_by'), 'sort_dir' => request('sort_dir')])

@php
    $isActive = $sort_by === $column;
    $nextDir = $isActive && $sort_dir === 'asc' ? 'desc' : 'asc';
@endphp

<x-ui.table-head {{ $attributes }}>
    <a href="{{ request()->fullUrlWithQuery(['sort_by' => $column, 'sort_dir' => $nextDir]) }}" class="flex items-center gap-1 hover:text-foreground">
        {{ $slot }}
        <x-lucide-arrow-up-down class="size-3 text-muted-foreground {{ $isActive ? 'text-foreground' : '' }}" />
    </a>
</x-ui.table-head>
