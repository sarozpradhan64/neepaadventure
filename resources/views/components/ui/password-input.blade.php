<div x-data="{ visible: false }" class="relative">
    <input
        {{ $attributes->merge(['type' => 'password', 'class' => 'w-full rounded-md border border-input bg-background px-3 py-2 pr-10 text-sm']) }}
        x-bind:type="visible ? 'text' : 'password'">
    <button type="button"
        class="absolute inset-y-0 right-0 flex w-10 items-center justify-center text-muted-foreground hover:text-foreground"
        x-on:click="visible = !visible" x-bind:aria-label="visible ? 'Hide password' : 'Show password'"
        x-bind:title="visible ? 'Hide password' : 'Show password'">
        <x-lucide-eye-off x-show="visible" class="size-4" />
        <x-lucide-eye x-show="!visible" class="size-4" />
    </button>
</div>
