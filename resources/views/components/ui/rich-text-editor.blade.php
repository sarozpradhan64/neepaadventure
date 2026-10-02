@props([
    'name' => null,
    'value' => '',
    'placeholder' => 'Write something…',
    'id' => null,
])

@php
    // execCommand is deprecated but remains universally supported across every browser
    // and is the standard dependency-free way to build a WYSIWYG. The toolbar maps each
    // button to a command; `block` actions use formatBlock (H1/H2/paragraph).
    $editorId = $id ?: 'rte-'.\Illuminate\Support\Str::random(8);
    $labelId = $editorId.'-label';

    // Toolbar definition. `cmd` runs execCommand; `block` runs formatBlock with a tag;
    // `link` and `clear` are special-cased in the Alpine handlers. `state` is the
    // queryCommandState key used to reflect aria-pressed (null = not a toggle).
    $tools = [
        ['key' => 'bold',          'icon' => 'bold',           'label' => 'Bold',          'cmd' => 'bold',          'state' => 'bold'],
        ['key' => 'italic',        'icon' => 'italic',         'label' => 'Italic',        'cmd' => 'italic',        'state' => 'italic'],
        ['key' => 'underline',     'icon' => 'underline',      'label' => 'Underline',     'cmd' => 'underline',     'state' => 'underline'],
        ['key' => 'strike',        'icon' => 'strikethrough',  'label' => 'Strikethrough', 'cmd' => 'strikeThrough', 'state' => 'strikeThrough'],
        ['sep' => true],
        ['key' => 'h1',            'icon' => 'heading-1',      'label' => 'Heading 1',     'block' => 'h1',          'state' => null],
        ['key' => 'h2',            'icon' => 'heading-2',      'label' => 'Heading 2',     'block' => 'h2',          'state' => null],
        ['sep' => true],
        ['key' => 'align-left',    'icon' => 'align-left',     'label' => 'Align left',    'cmd' => 'justifyLeft',   'state' => 'justifyLeft'],
        ['key' => 'align-center',  'icon' => 'align-center',   'label' => 'Align center',  'cmd' => 'justifyCenter', 'state' => 'justifyCenter'],
        ['key' => 'align-right',   'icon' => 'align-right',    'label' => 'Align right',   'cmd' => 'justifyRight',  'state' => 'justifyRight'],
        ['key' => 'align-justify', 'icon' => 'align-justify',  'label' => 'Justify',       'cmd' => 'justifyFull',   'state' => 'justifyFull'],
        ['sep' => true],
        ['key' => 'ul',            'icon' => 'list',           'label' => 'Bullet list',   'cmd' => 'insertUnorderedList', 'state' => 'insertUnorderedList'],
        ['key' => 'ol',            'icon' => 'list-ordered',   'label' => 'Numbered list', 'cmd' => 'insertOrderedList',   'state' => 'insertOrderedList'],
        ['sep' => true],
        ['key' => 'link',          'icon' => 'link',           'label' => 'Insert link',   'link' => true,           'state' => null],
        ['key' => 'image',         'icon' => 'image',          'label' => 'Insert image',  'image' => true,          'state' => null],
        ['key' => 'table',         'icon' => 'table',          'label' => 'Insert table',  'table' => true,          'state' => null],
        ['key' => 'clear',         'icon' => 'remove-formatting', 'label' => 'Clear formatting', 'clear' => true,    'state' => null],
        ['sep' => true],
        ['key' => 'fullscreen',    'icon' => 'maximize',       'label' => 'Toggle fullscreen', 'fullscreen' => true, 'state' => null],
    ];

    // Livewire bridge — forward a consumer's wire:model onto the hidden mirror <textarea>.
    // Inert without Livewire (an empty attribute bag renders nothing).
    $wireAttrs = $attributes->whereStartsWith('wire:model');
    $hasWire = filled($wireAttrs->getAttributes());
    $attributes = $attributes->whereDoesntStartWith('wire:model');
    
    // Extract the merged classes into a string so we can safely use them in Alpine's :class binding
    $baseClasses = $attributes->twMerge('border-input bg-background focus-within:border-ring focus-within:ring-ring/50 w-full overflow-hidden rounded-md border shadow-xs transition-[color,box-shadow] focus-within:ring-[3px]')->get('class');
@endphp

<div
    data-slot="rich-text-editor"
    x-data="{
        active: {},
        fullscreen: false,
        selectedImage: null,
        sync() {
            if (this.$refs.input) {
                this.$refs.input.value = this.$refs.editor.innerHTML;
                // Notify Livewire (wire:model on the mirror) that the value changed.
                this.$refs.input.dispatchEvent(new Event('input', { bubbles: true }));
            }
        },
        run(cmd) {
            this.$refs.editor.focus();
            document.execCommand(cmd, false, null);
            this.refresh();
            this.sync();
        },
        block(tag) {
            this.$refs.editor.focus();
            document.execCommand('formatBlock', false, tag);
            this.refresh();
            this.sync();
        },
        link() {
            this.$refs.editor.focus();
            const url = window.prompt('Link URL');
            if (url) document.execCommand('createLink', false, url);
            this.refresh();
            this.sync();
        },
        image() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.onchange = (e) => {
                const file = e.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = (ev) => {
                    this.$refs.editor.focus();
                    document.execCommand('insertImage', false, ev.target.result);
                    this.refresh();
                    this.sync();
                };
                reader.readAsDataURL(file);
            };
            input.click();
        },
        table() {
            this.$refs.editor.focus();
            const rows = window.prompt('Number of rows', '3');
            const cols = window.prompt('Number of columns', '3');
            
            if (rows && cols) {
                let html = '<table class=\'w-full border-collapse border border-border my-4\'>';
                for (let i = 0; i < parseInt(rows); i++) {
                    html += '<tr>';
                    for (let j = 0; j < parseInt(cols); j++) {
                        if (i === 0) {
                            html += '<th class=\'border border-border p-2 bg-muted/50\'>Header</th>';
                        } else {
                            html += '<td class=\'border border-border p-2\'>Cell</td>';
                        }
                    }
                    html += '</tr>';
                }
                html += '</table><p><br></p>';
                document.execCommand('insertHTML', false, html);
            }
            this.refresh();
            this.sync();
        },
        clear() {
            this.$refs.editor.focus();
            document.execCommand('removeFormat', false, null);
            document.execCommand('unlink', false, null);
            this.refresh();
            this.sync();
        },
        refresh() {
            // Only reflect state when the selection is inside this editor.
            const sel = window.getSelection();
            if (! sel || ! sel.rangeCount || ! this.$refs.editor.contains(sel.anchorNode)) return;
            const next = {};
            for (const k of @js(collect($tools)->whereNotNull('state')->pluck('state')->values())) {
                try { next[k] = document.queryCommandState(k); } catch (e) { next[k] = false; }
            }
            this.active = next;
        },
        init() {
            this.sync();
            this._onSel = () => this.refresh();
            document.addEventListener('selectionchange', this._onSel);



            this.$refs.editor.addEventListener('click', (e) => {
                if (e.target.tagName === 'IMG') {
                    this.selectedImage = e.target;
                    this.$refs.editor.querySelectorAll('img').forEach(img => img.style.outline = 'none');
                    e.target.style.outline = '2px solid #3b82f6';
                } else {
                    this.selectedImage = null;
                    this.$refs.editor.querySelectorAll('img').forEach(img => img.style.outline = 'none');
                }
            });
            
            this.$refs.editor.addEventListener('input', () => {
                if (this.selectedImage && !this.$refs.editor.contains(this.selectedImage)) {
                    this.selectedImage = null;
                }
            });
        },
        destroy() {
            document.removeEventListener('selectionchange', this._onSel);
            if (this._observer) this._observer.disconnect();
        },
        resizeImage(widthClass) {
            if (this.selectedImage) {
                this.selectedImage.classList.remove('w-1/4', 'w-1/2', 'w-3/4', 'w-full');
                this.selectedImage.classList.add(widthClass);
                this.selectedImage.style.height = 'auto';
                this.sync();
            }
        },
        alignImage(alignment) {
            if (this.selectedImage) {
                this.selectedImage.classList.remove('float-left', 'mr-4', 'mb-4', 'float-right', 'ml-4', 'block', 'mx-auto');
                
                if (alignment === 'left') {
                    this.selectedImage.classList.add('float-left', 'mr-4', 'mb-4');
                } else if (alignment === 'right') {
                    this.selectedImage.classList.add('float-right', 'ml-4', 'mb-4');
                } else if (alignment === 'center') {
                    this.selectedImage.classList.add('block', 'mx-auto');
                }
                
                this.sync();
            }
        },
        editAltText() {
            if (this.selectedImage) {
                const alt = window.prompt('Image Alt Text', this.selectedImage.alt || '');
                if (alt !== null) {
                    this.selectedImage.alt = alt;
                    this.sync();
                }
            }
        },
    }"
    {{ $attributes->whereDoesntStartWith('class') }}
    :class="fullscreen ? 'fixed inset-0 z-[100] h-screen w-screen flex flex-col !rounded-none m-0 bg-background border-0' : '{{ $baseClasses }}'"
>
    <div
        role="toolbar"
        aria-label="Formatting"
        data-slot="rich-text-editor-toolbar"
        class="bg-muted/40 flex flex-wrap items-center gap-0.5 border-b p-1 relative"
    >
        @foreach ($tools as $tool)
        @if (isset($tool['sep']))
        <span aria-hidden="true" class="bg-border mx-1 h-5 w-px self-center"></span>
        @else
        <button
            type="button"
            data-slot="rich-text-editor-button"
            aria-label="{{ $tool['label'] }}"
            @if (! empty($tool['state']))
            :aria-pressed="!!active['{{ $tool['state'] }}']"
            @endif
            @if (isset($tool['cmd']))
            @click="run(@js($tool['cmd']))"
            @elseif (isset($tool['block']))
            @click="block(@js($tool['block']))"
            @elseif (isset($tool['link']))
            @click="link()"
            @elseif (isset($tool['image']))
            @click="image()"
            @elseif (isset($tool['table']))
            @click="table()"
            @elseif (isset($tool['clear']))
            @click="clear()"
            @elseif (isset($tool['fullscreen']))
            @click="fullscreen = !fullscreen; if(fullscreen) document.body.style.overflow = 'hidden'; else document.body.style.overflow = '';"
            @endif
            @class([
                'text-muted-foreground hover:bg-accent hover:text-accent-foreground focus-visible:ring-ring/50 inline-flex size-8 cursor-pointer items-center justify-center rounded-md outline-none transition-colors focus-visible:ring-[3px]',
                'aria-pressed:bg-accent aria-pressed:text-accent-foreground' => ! empty($tool['state']),
            ])
        >
            @if (isset($tool['fullscreen']))
                <x-lucide-maximize class="size-4" x-show="!fullscreen" aria-hidden="true" />
                <x-lucide-minimize class="size-4" x-show="fullscreen" x-cloak aria-hidden="true" />
            @else
                <x-dynamic-component :component="'lucide-'.$tool['icon']" class="size-4" aria-hidden="true" />
            @endif
        </button>
        @endif
        @endforeach

        <!-- Image Formatting Toolbar -->
        <template x-if="selectedImage">
            <div class="flex items-center gap-1 ml-auto border-l pl-2">
                <span class="text-[10px] uppercase font-bold text-muted-foreground mr-1">Align:</span>
                <button type="button" @click="alignImage('left')" title="Align Left" class="inline-flex size-7 cursor-pointer items-center justify-center rounded-md text-muted-foreground hover:bg-accent hover:text-accent-foreground transition-colors outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50"><x-lucide-align-left class="size-4" /></button>
                <button type="button" @click="alignImage('center')" title="Align Center" class="inline-flex size-7 cursor-pointer items-center justify-center rounded-md text-muted-foreground hover:bg-accent hover:text-accent-foreground transition-colors outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50"><x-lucide-align-center class="size-4" /></button>
                <button type="button" @click="alignImage('right')" title="Align Right" class="inline-flex size-7 cursor-pointer items-center justify-center rounded-md text-muted-foreground hover:bg-accent hover:text-accent-foreground transition-colors outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50"><x-lucide-align-right class="size-4" /></button>

                <div class="w-px h-4 bg-border mx-1"></div>

                <span class="text-[10px] uppercase font-bold text-muted-foreground mr-1">Resize:</span>
                <button type="button" @click="resizeImage('w-1/4')" class="text-xs px-2 py-1 rounded-md text-muted-foreground hover:bg-accent hover:text-accent-foreground transition-colors outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer">25%</button>
                <button type="button" @click="resizeImage('w-1/2')" class="text-xs px-2 py-1 rounded-md text-muted-foreground hover:bg-accent hover:text-accent-foreground transition-colors outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer">50%</button>
                <button type="button" @click="resizeImage('w-full')" class="text-xs px-2 py-1 rounded-md text-muted-foreground hover:bg-accent hover:text-accent-foreground transition-colors outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer">100%</button>

                <div class="w-px h-4 bg-border mx-1"></div>
                
                <button type="button" @click="editAltText()" title="Edit Alt Text" class="text-[10px] font-bold uppercase px-2 py-1 rounded-md text-muted-foreground hover:bg-accent hover:text-accent-foreground transition-colors outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer">ALT</button>
            </div>
        </template>
    </div>

    <div
        x-ref="editor"
        data-slot="rich-text-editor-content"
        contenteditable="true"
        role="textbox"
        aria-multiline="true"
        aria-labelledby="{{ $labelId }}"
        id="{{ $editorId }}"
        data-placeholder="{{ $placeholder }}"
        dir="auto"
        @input="sync()"
        @keyup="refresh()"
        @mouseup="refresh()"
        @focus="refresh()"
        class="empty:before:text-muted-foreground prose prose-sm max-w-none px-3 py-3 outline-none empty:before:pointer-events-none empty:before:content-[attr(data-placeholder)]"
        :class="fullscreen ? 'flex-1 overflow-y-auto max-h-none h-full' : 'min-h-40'"
    >
        {!! $value !!}
    </div>

    {{-- Accessible name for the textbox; visually hidden (it duplicates the placeholder intent). --}}
    <span id="{{ $labelId }}" class="sr-only">{{ $placeholder }}</span>

    @if ($name || $hasWire)
    <textarea
        x-ref="input"
        @if ($name)
        name="{{ $name }}"
        @endif
        {{ $wireAttrs }}
        class="hidden"
        aria-hidden="true"
        tabindex="-1"
    >{!! $value !!}</textarea>
    @endif
</div>
