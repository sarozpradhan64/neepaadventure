<textarea name="{{ $name }}" {{ $attributes->merge(['class' => 'min-h-32 w-full rounded-md border border-input bg-background px-3 py-2 text-sm']) }}>{{ $slot ?? ($value ?? '') }}</textarea>
