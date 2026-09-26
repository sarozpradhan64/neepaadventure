@props(['name', 'value' => '', 'id' => null])

@php
    $currentValue = old($name, $value);
    $selectedSvg = '';
    if ($currentValue && preg_match('/^[a-z0-9\-]+$/', $currentValue)) {
        $path = base_path('vendor/mallardduck/blade-lucide-icons/resources/svg/icons/'.$currentValue.'.svg');
        if (file_exists($path)) {
            $selectedSvg = file_get_contents($path);
        }
    }
@endphp

<div
    x-data="{
        open: false,
        search: '',
        selected: @js($currentValue),
        svgCache: {},
        allIcons: [],
        page: 0,
        pageSize: 50,
        loading: false,
        get filtered() {
            if (! this.search) return this.allIcons;
            const q = this.search.toLowerCase();
            return this.allIcons.filter(i => i.includes(q));
        },
        get visible() {
            return this.filtered.slice(0, this.page);
        },
        get hasMore() {
            return this.page < this.filtered.length;
        },
        async init() {
            this.selected && this.loadSvg(this.selected);
            this.$watch('search', () => { this.page = this.pageSize; this.$nextTick(() => this.loadVisibleSvgs()); });
        },
        async openPicker() {
            this.open = ! this.open;
            if (this.open && this.allIcons.length === 0) {
                await this.fetchIcons();
                this.page = this.pageSize;
                this.$nextTick(() => this.loadVisibleSvgs());
            }
        },
        async fetchIcons() {
            this.loading = true;
            try {
                const res = await fetch('/admin/lucide-icons');
                if (res.ok) this.allIcons = await res.json();
            } catch {}
            this.loading = false;
        },
        loadMore() {
            if (! this.hasMore) return;
            this.page += this.pageSize;
            this.$nextTick(() => this.loadVisibleSvgs());
        },
        loadVisibleSvgs() {
            this.visible.forEach(icon => this.loadSvg(icon));
        },
        async select(icon) {
            this.selected = icon;
            this.open = false;
            this.search = '';
            this.loadSvg(icon);
        },
        clear() { this.selected = ''; },
        async loadSvg(icon) {
            if (! icon || this.svgCache[icon]) return;
            try {
                const res = await fetch('/admin/lucide-icon/' + encodeURIComponent(icon));
                if (res.ok) this.svgCache[icon] = await res.text();
            } catch {}
        },
    }"
    class="relative"
>
    <input type="hidden" name="{{ $name }}" :value="selected" />

    {{-- Trigger --}}
    <button
        type="button"
        @click="openPicker()"
        class="file:text-foreground placeholder:text-muted-foreground border-input dark:bg-input/30 focus-visible:border-ring focus-visible:ring-ring/50 flex h-9 w-full items-center gap-2 rounded-md border bg-transparent px-3 py-1 text-sm shadow-xs transition-[color,box-shadow] outline-none focus-visible:ring-[3px]"
    >
        <span class="flex min-w-0 flex-1 items-center gap-2">
            <span class="[&_svg]:size-4 [&_svg]:text-foreground shrink-0">
                @if ($selectedSvg)
                    <span x-show="! svgCache[selected]">{!! $selectedSvg !!}</span>
                @endif
                <span x-show="svgCache[selected]" x-html="svgCache[selected]"></span>
            </span>
            <span x-show="selected" x-text="selected" class="truncate"></span>
            <span x-show="! selected" class="text-muted-foreground">Select an icon…</span>
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" class="text-muted-foreground ml-auto size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6" /></svg>
    </button>

    {{-- Dropdown --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.outside="open = false"
        style="display: none"
        class="border-input bg-popover absolute z-50 mt-1 w-full rounded-md border shadow-md"
    >
        {{-- Search --}}
        <div class="border-b p-2">
            <input
                type="text"
                x-model="search"
                placeholder="Search icons…"
                class="border-input placeholder:text-muted-foreground focus:border-ring flex h-8 w-full rounded-md border bg-transparent px-2 text-sm outline-none"
                @keydown.escape="open = false"
            />
        </div>

        {{-- Clear --}}
        <div class="border-b px-2 py-1">
            <button
                type="button"
                @click="clear()"
                class="text-muted-foreground hover:text-foreground w-full rounded px-2 py-1 text-left text-xs"
            >
                — No icon
            </button>
        </div>

        {{-- Icon grid --}}
        <div
            class="grid max-h-64 grid-cols-8 gap-1 overflow-y-auto p-2"
            @scroll="
                $event.target.scrollTop + $event.target.clientHeight >= $event.target.scrollHeight - 40 && loadMore()
            "
        >
            {{-- Loading state --}}
            <template x-if="loading">
                <div class="text-muted-foreground col-span-8 flex items-center justify-center gap-2 py-6 text-sm">
                    <svg class="size-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z" />
                    </svg>
                    Loading icons…
                </div>
            </template>

            <template x-if="! loading">
                <template x-for="icon in visible" :key="icon">
                    <button
                        type="button"
                        @click="select(icon)"
                        :title="icon"
                        :class="selected === icon ? 'bg-primary' : 'hover:bg-accent'"
                        class="flex items-center justify-center rounded p-1.5 transition-colors"
                    >
                        <span
                            class="[&_svg]:size-4 [&_svg]:pointer-events-none"
                            :class="selected === icon ? '[&_svg]:text-primary-foreground' : '[&_svg]:text-foreground'"
                            x-html="
                                svgCache[icon] ||
                                '<svg xmlns=\'http://www.w3.org/2000/svg\' class=\'size-4 opacity-20\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'2\'><rect width=\'18\' height=\'18\' x=\'3\' y=\'3\' rx=\'2\'/></svg>'
                            "
                        ></span>
                    </button>
                </template>
            </template>

            <p
                x-show="! loading && filtered.length === 0"
                class="text-muted-foreground col-span-8 py-4 text-center text-sm"
            >
                No icons found.
            </p>
        </div>
    </div>
</div>
