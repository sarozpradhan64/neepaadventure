@php($selectedIcon = $value ?? null)
<div {{ $attributes->merge(['class' => 'space-y-2']) }}>
    <input type="text" name="{{ $name }}" value="{{ $selectedIcon }}" placeholder="Icon name" class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm">
</div>
