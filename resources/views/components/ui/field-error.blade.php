@props(['name' => null])

@if ($name && $errors->has($name))
    <p {{ $attributes->except('name')->merge(['class' => 'text-sm text-destructive']) }}>{{ $errors->first($name) }}</p>
@elseif (trim((string) $slot) !== '')
    <p {{ $attributes->except('name')->merge(['class' => 'text-sm text-destructive']) }}>{{ $slot }}</p>
@endif
