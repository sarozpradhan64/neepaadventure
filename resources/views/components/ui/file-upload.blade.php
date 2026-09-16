<div {{ $attributes->merge(['class' => 'space-y-2']) }}>
    @if (!empty($current))
        <p class="text-xs text-muted-foreground">Current file: {{ $current }}</p>
    @endif
    <input type="file" name="{{ $name }}" accept="{{ $accept ?? null }}" class="block w-full rounded-md border border-input bg-background px-3 py-2 text-sm">
</div>
