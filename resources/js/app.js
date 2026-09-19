// resources/js/app.js
import Alpine from 'alpinejs';
import { registerBlatUI } from './blatui-core.js';
import Sortable from 'sortablejs';

registerBlatUI(Alpine);

Alpine.data('sortableList', ({ reorderUrl, csrfToken }) => ({
    init() {
        Sortable.create(this.$el, {
            handle: '[data-drag-handle]',
            animation: 150,
            ghostClass: 'opacity-40',
            onEnd: () => {
                const ids = [...this.$el.querySelectorAll('[data-id]')].map(el => el.dataset.id);
                fetch(reorderUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({ ids }),
                });
            },
        });
    },
}));

window.Alpine = Alpine;
Alpine.start();