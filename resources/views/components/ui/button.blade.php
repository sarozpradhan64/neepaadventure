@php
    $tag = $attributes->has('href') ? 'a' : 'button';
    $classes = 'inline-flex items-center justify-center gap-2 rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground';
@endphp
<{{ $tag }} {{ $attributes->merge(['class' => $classes]) }}>{{ $before ?? '' }}{{ $slot }}{{ $after ?? '' }}</{{ $tag }}>
