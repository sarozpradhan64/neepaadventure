@props([
    'name',
    'current' => null,
    'accept' => null,
    'placeholder' => null,
    'removable' => true,
    'disabled' => false,
    'maxSizeKb' => null,
])

@php
    $currentUrl = null;
    $isCurrentImage = false;
    $currentFileName = null;

    if (! empty($current)) {
        $currentUrl = \Illuminate\Support\Str::startsWith($current, ['http://', 'https://', '/'])
            ? $current
            : \Illuminate\Support\Facades\Storage::disk('public')->url($current);
        $currentFileName = basename($current);
        $isCurrentImage = (bool) preg_match('/\.(jpe?g|png|webp|gif|svg)(\?.*)?$/i', $current);
    }
@endphp

<div
    {{ $attributes->merge(['class' => 'space-y-2']) }}
    x-data="{
        isDragging: false,
        hasCurrent: @js(!empty($current)),
        removed: false,
        selectedFile: null,
        previewUrl: null,
        isImage: false,
        clientError: null,
        maxSizeKb: @js($maxSizeKb),
        formatBytes(bytes) {
            if (!bytes || bytes === 0) return '0 B';
            const k = 1024;
            const sizes = ['B', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
        },
        handleFiles(files) {
            this.clientError = null;
            if (!files || files.length === 0) return;
            const file = files[0];

            if (this.maxSizeKb && file.size > this.maxSizeKb * 1024) {
                this.clientError = `Selected file is too large (${this.formatBytes(file.size)}). Maximum allowed size is ${this.formatBytes(this.maxSizeKb * 1024)}.`;
                this.clearSelected();
                return;
            }

            this.selectedFile = {
                name: file.name,
                size: this.formatBytes(file.size),
                type: file.type
            };
            this.removed = false;
            if (file.type.startsWith('image/')) {
                this.isImage = true;
                this.previewUrl = URL.createObjectURL(file);
            } else {
                this.isImage = false;
                this.previewUrl = null;
            }
        },
        clearSelected() {
            this.selectedFile = null;
            if (this.previewUrl) {
                URL.revokeObjectURL(this.previewUrl);
                this.previewUrl = null;
            }
            this.isImage = false;
            if (this.$refs.fileInput) {
                this.$refs.fileInput.value = '';
            }
        },
        markRemoved() {
            this.removed = true;
            this.clearSelected();
        },
        undoRemove() {
            this.removed = false;
        }
    }"
>
    {{-- Hidden removal marker for the server controller --}}
    <input type="hidden" name="remove_{{ $name }}" :value="removed ? '1' : '0'">

    {{-- Native hidden file input --}}
    <input
        type="file"
        x-ref="fileInput"
        name="{{ $name }}"
        @if($accept) accept="{{ $accept }}" @endif
        @disabled($disabled)
        class="sr-only"
        @change="handleFiles($event.target.files)"
    />

    {{-- Client validation alert --}}
    <div x-show="clientError" x-cloak class="p-2.5 rounded-md border border-destructive/40 bg-destructive/10 text-destructive text-xs font-medium flex items-center justify-between">
        <span x-text="clientError"></span>
        <button type="button" @click="clientError = null" class="cursor-pointer text-base leading-none ml-2">&times;</button>
    </div>

    {{-- 1. Existing Saved File State --}}
    @if (! empty($current))
        <div x-show="hasCurrent && !removed && !selectedFile" class="flex items-center justify-between p-3 rounded-lg border border-border bg-card/60 gap-3">
            <div class="flex items-center gap-3 min-w-0">
                @if ($isCurrentImage)
                    <a href="{{ $currentUrl }}" target="_blank" rel="noopener noreferrer" class="relative group block shrink-0" title="Click to view full image">
                        <img src="{{ $currentUrl }}" alt="Current file preview" class="size-12 rounded object-cover border border-border/80 group-hover:opacity-90 transition-opacity" />
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center rounded text-white transition-opacity">
                            <x-lucide-eye class="size-4" />
                        </div>
                    </a>
                @else
                    <div class="size-12 rounded bg-primary/10 text-primary flex items-center justify-center shrink-0 border border-primary/20">
                        <x-lucide-file-text class="size-6" />
                    </div>
                @endif
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-foreground truncate max-w-[240px] sm:max-w-md" title="{{ $currentFileName }}">
                        {{ $currentFileName }}
                    </p>
                    <div class="flex items-center gap-2 mt-0.5 text-xs text-muted-foreground">
                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-semibold bg-secondary text-secondary-foreground uppercase">
                            Current
                        </span>
                        <a href="{{ $currentUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-primary hover:underline font-medium">
                            <x-lucide-external-link class="size-3" /> View / Download
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-1.5 shrink-0">
                <button
                    type="button"
                    @click="$refs.fileInput.click()"
                    class="inline-flex items-center gap-1 px-2.5 py-1.5 text-xs font-medium rounded-md border border-input bg-background hover:bg-accent hover:text-accent-foreground transition-colors cursor-pointer"
                >
                    <x-lucide-upload class="size-3.5" /> Replace
                </button>
                @if ($removable)
                    <button
                        type="button"
                        @click="markRemoved()"
                        class="inline-flex items-center gap-1 px-2.5 py-1.5 text-xs font-medium rounded-md text-destructive hover:bg-destructive/10 transition-colors cursor-pointer"
                        title="Remove this file"
                    >
                        <x-lucide-trash-2 class="size-3.5" /> Remove
                    </button>
                @endif
            </div>
        </div>

        {{-- Marked for removal warning --}}
        <div x-show="removed && !selectedFile" x-cloak class="flex items-center justify-between p-3 rounded-lg border border-dashed border-destructive/40 bg-destructive/5 text-xs">
            <span class="text-destructive font-medium">Existing file marked for removal upon saving.</span>
            <button type="button" @click="undoRemove()" class="text-destructive font-semibold underline hover:opacity-80 cursor-pointer">
                Undo
            </button>
        </div>
    @endif

    {{-- 2. Newly Selected File (Pending Upload) --}}
    <div x-show="selectedFile" x-cloak class="flex items-center justify-between p-3 rounded-lg border border-emerald-500/40 bg-emerald-50/50 dark:bg-emerald-950/20 gap-3">
        <div class="flex items-center gap-3 min-w-0">
            <template x-if="isImage">
                <img :src="previewUrl" class="size-12 rounded object-cover border border-emerald-500/30 shrink-0" alt="New upload preview" />
            </template>
            <template x-if="!isImage">
                <div class="size-12 rounded bg-emerald-500/10 text-emerald-600 flex items-center justify-center shrink-0 border border-emerald-500/20">
                    <x-lucide-file-text class="size-6" />
                </div>
            </template>
            <div class="min-w-0 flex-1">
                <p x-text="selectedFile?.name" class="text-sm font-medium text-foreground truncate max-w-[240px] sm:max-w-md"></p>
                <div class="flex items-center gap-2 mt-0.5 text-xs text-muted-foreground">
                    <span x-text="selectedFile?.size"></span>
                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-semibold bg-emerald-100 text-emerald-800 dark:bg-emerald-900/60 dark:text-emerald-200">
                        Ready to upload
                    </span>
                </div>
            </div>
        </div>
        <button
            type="button"
            @click="clearSelected()"
            class="p-1.5 rounded-md text-muted-foreground hover:text-foreground hover:bg-black/5 dark:hover:bg-white/10 transition-colors cursor-pointer"
            title="Cancel selection"
        >
            <x-lucide-x class="size-4" />
        </button>
    </div>

    {{-- 3. Drag & Drop Upload Zone --}}
    <div
        x-show="!selectedFile && (!hasCurrent || removed)"
        @click="$refs.fileInput.click()"
        @dragover.prevent="isDragging = true"
        @dragleave.prevent="isDragging = false"
        @drop.prevent="isDragging = false; if ($event.dataTransfer.files.length) { $refs.fileInput.files = $event.dataTransfer.files; handleFiles($event.dataTransfer.files); }"
        :class="isDragging ? 'border-primary bg-primary/5 ring-2 ring-primary/20' : 'border-border/80 hover:border-primary/50 bg-muted/20 hover:bg-muted/40'"
        class="group relative flex flex-col items-center justify-center p-6 border-2 border-dashed rounded-lg cursor-pointer transition-all duration-200 text-center"
    >
        <div class="size-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-2 group-hover:scale-105 transition-transform">
            <x-lucide-upload class="size-5" />
        </div>
        <p class="text-sm font-medium text-foreground">
            <span class="text-primary hover:underline">Choose file</span> or drag & drop here
        </p>
        <p class="text-xs text-muted-foreground mt-1 max-w-sm">
            {{ $placeholder ?? ($accept ? 'Accepted: ' . $accept : 'Select or drop a file to upload') }}
        </p>
    </div>
</div>
