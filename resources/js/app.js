// resources/js/app.js
import Alpine from "alpinejs";
import { registerBlatUI } from "./blatui-core.js";
import Sortable from "sortablejs";

window.Sortable = Sortable;

registerBlatUI(Alpine);

Alpine.data("tagPicker", ({ initial = "", searchUrl }) => ({
    selected: initial
        .split(",")
        .map((tag) => tag.trim())
        .filter(Boolean),
    query: "",
    suggestions: [],
    highlighted: 0,
    open: false,

    normalizedQuery() {
        return this.query.trim();
    },

    serializedTags() {
        return this.selected.join(", ");
    },

    async search() {
        const search = this.normalizedQuery();
        const response = await fetch(
            `${searchUrl}?search=${encodeURIComponent(search)}`,
            {
                headers: { Accept: "application/json" },
            },
        );

        if (!response.ok) {
            this.suggestions = [];
            return;
        }

        const selected = new Set(this.selected.map((tag) => tag.toLowerCase()));
        this.suggestions = (await response.json()).filter(
            (tag) => !selected.has(tag.name.toLowerCase()),
        );
        this.highlighted = 0;
    },

    canCreateCurrent() {
        const query = this.normalizedQuery();

        return (
            query !== "" &&
            !this.selected.some(
                (tag) => tag.toLowerCase() === query.toLowerCase(),
            )
        );
    },

    select(tag) {
        const value = tag.trim();

        if (
            value &&
            !this.selected.some(
                (selected) => selected.toLowerCase() === value.toLowerCase(),
            )
        ) {
            this.selected.push(value);
        }

        this.query = "";
        this.suggestions = [];
        this.highlighted = 0;
        this.open = true;
        this.$nextTick(() => this.$refs.input.focus());
    },

    chooseHighlightedOrCreate() {
        const highlightedTag = this.suggestions[this.highlighted];

        if (highlightedTag) {
            this.select(highlightedTag.name);
            return;
        }

        if (
            this.highlighted === this.suggestions.length &&
            this.canCreateCurrent()
        ) {
            this.select(this.normalizedQuery());
        }
    },

    move(direction) {
        const optionCount =
            this.suggestions.length + (this.canCreateCurrent() ? 1 : 0);

        if (optionCount === 0) {
            return;
        }

        this.highlighted =
            (this.highlighted + direction + optionCount) % optionCount;
    },

    remove(tag) {
        this.selected = this.selected.filter((selected) => selected !== tag);
    },

    removeLastWhenEmpty() {
        if (this.query === "" && this.selected.length > 0) {
            this.selected.pop();
        }
    },
}));

    Alpine.data("sortableList", ({ reorderUrl, csrfToken }) => ({
    init() {
        Sortable.create(this.$el, {
            handle: "[data-drag-handle]",
            animation: 150,
            ghostClass: "opacity-40",
            onEnd: () => {
                const ids = [...this.$el.querySelectorAll("[data-id]")].map(
                    (el) => el.dataset.id,
                );
                fetch(reorderUrl, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    body: JSON.stringify({ ids }),
                });
            },
        });
    },
}));

import SlimSelect from "slim-select";
import "slim-select/styles";

window.SlimSelect = SlimSelect;

window.initSlimSelect = function (element, options = {}) {
    if (!element) return null;
    const selectEl =
        typeof element === "string" ? document.querySelector(element) : element;
    if (!selectEl) return null;
    if (selectEl._slimSelect) return selectEl._slimSelect;

    selectEl._slimSelect = new SlimSelect({
        select: selectEl,
        settings: {
            placeholderText:
                selectEl.getAttribute("placeholder") || "Select option(s)...",
            searchPlaceholder: "Search...",
            allowDeselect: true,
            closeOnSelect: !selectEl.multiple,
            ...(options.settings || {}),
        },
        ...options,
    });

    return selectEl._slimSelect;
};

Alpine.data("slimSelect", (options = {}) => ({
    init() {
        this.$nextTick(() => {
            const selectEl =
                this.$el.tagName === "SELECT"
                    ? this.$el
                    : this.$el.querySelector("select");
            if (selectEl) {
                window.initSlimSelect(selectEl, options);
            }
        });
    },
    destroy() {
        const selectEl =
            this.$el.tagName === "SELECT"
                ? this.$el
                : this.$el.querySelector("select");
        if (selectEl?._slimSelect) {
            selectEl._slimSelect.destroy();
            selectEl._slimSelect = null;
        }
    },
}));

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("select.slim-select").forEach((el) => {
        window.initSlimSelect(el);
    });
});

window.Alpine = Alpine;
Alpine.start();

