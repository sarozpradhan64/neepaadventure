<template x-teleport="body">
    <div x-show="open" style="display: none" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4" x-transition.opacity>
        <div @click.away="open = false" {{ $attributes->merge(['class' => 'w-full max-w-lg rounded-lg border bg-background p-6 shadow-lg relative']) }} x-show="open" x-transition>
            {{ $slot }}
        </div>
    </div>
</template>
