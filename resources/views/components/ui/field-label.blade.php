@props(['required' => false])

<label {{ $attributes->merge(['class' => 'text-sm font-medium']) }}>
    {{ $slot }}
    @if($required)
        <span class="text-destructive ml-1">*</span>
    @endif
</label>
