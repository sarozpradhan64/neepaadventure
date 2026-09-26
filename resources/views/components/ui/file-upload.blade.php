<div {{ $attributes->merge(['class' => 'space-y-2']) }}>
    @if (! empty($current))
        <p class="text-muted-foreground text-xs">Current file: {{ $current }}</p>
    @endif
    <input
        type="file"
        name="{{ $name }}"
        accept="{{ $accept ?? null }}"
        class="border-input bg-background block w-full rounded-md border px-3 py-2 text-sm"
    />
</div>
