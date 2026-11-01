// resources/js/viewer.js
import Viewer from 'viewerjs';
import 'viewerjs/dist/viewer.css';

/**
 * Robust cross-origin / same-origin image download helper.
 * Fetches the image as a blob to trigger a genuine browser file download.
 *
 * @param {string} url
 * @param {string} [filename]
 */
export function downloadImage(url, filename = '') {
    if (!url) return;

    const sanitizeFilename = (name) => {
        let clean = (name || '').trim();
        if (!clean || clean.length > 80) {
            clean = url.split('/').pop().split('?')[0] || 'image';
        }
        // Strip out unsafe characters for file download
        clean = clean.replace(/[/\\?%*:|"<>]/g, '-');
        if (!/\.(jpe?g|png|webp|svg|gif|avif)$/i.test(clean)) {
            // Extract original extension from URL if available, else default to .jpg
            const match = url.match(/\.(jpe?g|png|webp|svg|gif|avif)($|\?)/i);
            clean += match ? '.' + match[1].toLowerCase() : '.jpg';
        }
        return clean;
    };

    const finalFilename = sanitizeFilename(filename);

    const fallbackDownload = () => {
        const a = document.createElement('a');
        a.href = url;
        a.target = '_blank';
        a.download = finalFilename;
        document.body.appendChild(a);
        a.click();
        setTimeout(() => document.body.removeChild(a), 150);
    };

    try {
        fetch(url, { mode: 'cors' })
            .then((res) => {
                if (!res.ok) throw new Error('Fetch failed');
                return res.blob();
            })
            .then((blob) => {
                const blobUrl = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.style.display = 'none';
                a.href = blobUrl;
                a.download = finalFilename;
                document.body.appendChild(a);
                a.click();
                setTimeout(() => {
                    window.URL.revokeObjectURL(blobUrl);
                    document.body.removeChild(a);
                }, 200);
            })
            .catch(() => {
                fallbackDownload();
            });
    } catch {
        fallbackDownload();
    }
}

/**
 * Shared ViewerJS options with integrated Download button in the toolbar.
 */
export const defaultViewerOptions = {
    button: true,
    navbar: 'auto',
    title: function (image) {
        return image.alt || image.title || '';
    },
    toolbar: {
        zoomIn: 1,
        zoomOut: 1,
        oneToOne: 0,
        reset: 1,
        prev: 1,
        play: 0,
        next: 1,
        rotateLeft: 0,
        rotateRight: 0,
        flipHorizontal: 0,
        flipVertical: 0,
        download: {
            show: 1,
            size: 'large',
            click: function () {
                const viewer = this.viewer || this;
                const currentCanvasImg = viewer.image;
                const originalImg = viewer.images ? viewer.images[viewer.index] : null;
                const src =
                    originalImg?.getAttribute('data-original-url') ||
                    originalImg?.src ||
                    currentCanvasImg?.src;
                const title =
                    originalImg?.alt ||
                    originalImg?.title ||
                    currentCanvasImg?.alt ||
                    currentCanvasImg?.title ||
                    '';
                downloadImage(src, title);
            },
        },
    },
    tooltip: true,
    movable: true,
    zoomable: true,
    rotatable: false,
    scalable: false,
    transition: true,
    viewed() {
        const downloadBtn = document.querySelector('.viewer-download');
        if (downloadBtn) {
            downloadBtn.setAttribute('title', 'Download image');
            downloadBtn.setAttribute('aria-label', 'Download image');
        }
    },
};

/**
 * Close and thoroughly destroy all active ViewerJS modals and clear opened files from DOM.
 */
export function closeAllImageViewers() {
    if (window._activeViewers && window._activeViewers.length > 0) {
        window._activeViewers.forEach((v) => {
            try {
                v.destroy();
            } catch (err) {}
        });
        window._activeViewers = [];
    }

    // Also close any statically-bound element viewers if currently open
    document.querySelectorAll('[data-viewer], [data-gallery], .viewer-gallery').forEach((el) => {
        if (el.__viewer && el.__viewer.isShown) {
            try {
                el.__viewer.hide();
            } catch (err) {}
        }
    });

    // Remove any dynamically created ul containers
    document.querySelectorAll('[data-viewer-temp-container]').forEach((el) => {
        el.remove();
    });

    // Remove any lingering viewer-container DOM nodes
    document.querySelectorAll('.viewer-container').forEach((el) => {
        el.remove();
    });

    // Restore body scroll in case viewer was in modal mode
    document.body.classList.remove('viewer-open');
    document.body.style.removeProperty('overflow');
    document.body.style.removeProperty('padding-right');
}

/**
 * Open one or multiple image items programmatically in ViewerJS.
 *
 * @param {string|string[]|Array<{url: string, title?: string, caption?: string}>} items
 * @param {number} [initialIndex=0]
 * @returns {Viewer}
 */
export function openImageViewer(items, initialIndex = 0) {
    // Clear any previously opened files / viewers first
    closeAllImageViewers();

    const list = Array.isArray(items) ? items : [items];
    if (!list || list.length === 0) return null;

    const container = document.createElement('ul');
    container.style.display = 'none';
    container.setAttribute('data-viewer-temp-container', 'true');

    list.forEach((item) => {
        const url = typeof item === 'string' ? item : item.url;
        const title = typeof item === 'object' ? item.title || item.caption || '' : '';
        const li = document.createElement('li');
        const img = document.createElement('img');
        img.src = url;
        img.alt = title;
        img.setAttribute('data-original-url', url);
        li.appendChild(img);
        container.appendChild(li);
    });

    document.body.appendChild(container);

    const viewer = new Viewer(container, {
        ...defaultViewerOptions,
        initialViewIndex: initialIndex,
        hidden() {
            closeAllImageViewers();
        },
    });

    if (!window._activeViewers) {
        window._activeViewers = [];
    }
    window._activeViewers.push(viewer);

    viewer.show();
    return viewer;
}

/**
 * Auto-initialize any containers or triggers in the document with ViewerJS.
 * - Containers with [data-viewer] or [data-gallery]
 * - Triggers with [data-viewer-src]
 */
export function initViewers(root = document) {
    // 1. Gallery containers
    const containers = root.querySelectorAll(
        '[data-viewer], [data-gallery], .viewer-gallery',
    );
    containers.forEach((el) => {
        if (el.__viewer) return;
        el.__viewer = new Viewer(el, {
            ...defaultViewerOptions,
            filter(img) {
                return !img.closest('[data-viewer-ignore]');
            },
        });
    });

    // 2. Individual click triggers
    const triggers = root.querySelectorAll('[data-viewer-src]');
    triggers.forEach((trigger) => {
        if (trigger.__viewerTriggerBound) return;
        trigger.__viewerTriggerBound = true;
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            const src = trigger.getAttribute('data-viewer-src');
            const title =
                trigger.getAttribute('data-viewer-title') ||
                trigger.getAttribute('title') ||
                '';
            if (src) {
                openImageViewer([{ url: src, title: title }]);
            }
        });
    });
}

// Intercept clicks on the ViewerJS close button (top-right 'x' or button) in capture phase
// to ensure it immediately terminates and clears all opened files without leaving behind stale viewers
document.addEventListener(
    'click',
    (e) => {
        const closeBtn = e.target.closest(
            '.viewer-button, .viewer-close, [data-viewer-action="mix"]'
        );
        if (closeBtn) {
            e.preventDefault();
            e.stopPropagation();
            closeAllImageViewers();
        }
    },
    true
);

// Close on Escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && document.querySelector('.viewer-container')) {
        closeAllImageViewers();
    }
});

// Expose on global window object
window.Viewer = Viewer;
window.openImageViewer = openImageViewer;
window.closeAllImageViewers = closeAllImageViewers;
window.initViewers = initViewers;
window.downloadImage = downloadImage;

// Initialize on DOMContentLoaded and Turbo/Livewire navigations if present
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => initViewers());
} else {
    initViewers();
}
document.addEventListener('livewire:navigated', () => initViewers());
