/**
 * Neepa Adventure - Subtle Frontend Animations & Loading States
 * 
 * Provides:
 * - Top page loading bar for instant link navigation feedback
 * - Subtle IntersectionObserver scroll reveal system
 * - Image progressive fade-in helper
 * - Universal button loading state controller
 */

// 1. Top Page Navigation Loading Bar
export function initPageLoader() {
    let loaderBar = document.getElementById('page-loader-bar');
    if (!loaderBar) {
        loaderBar = document.createElement('div');
        loaderBar.id = 'page-loader-bar';
        loaderBar.setAttribute('aria-hidden', 'true');
        document.body.prepend(loaderBar);
    }

    let progressTimer = null;
    let currentProgress = 0;

    function setProgress(percent) {
        currentProgress = percent;
        loaderBar.style.width = `${percent}%`;
    }

    function start() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            return;
        }
        clearInterval(progressTimer);
        loaderBar.classList.remove('finished');
        loaderBar.classList.add('is-loading');
        setProgress(18);

        progressTimer = setInterval(() => {
            if (currentProgress < 75) {
                setProgress(currentProgress + (85 - currentProgress) * 0.15);
            } else if (currentProgress < 92) {
                setProgress(currentProgress + 0.8);
            }
        }, 120);
    }

    function finish() {
        clearInterval(progressTimer);
        setProgress(100);
        loaderBar.classList.add('finished');
        setTimeout(() => {
            loaderBar.classList.remove('is-loading', 'finished');
            setProgress(0);
        }, 320);
    }

    function reset() {
        clearInterval(progressTimer);
        loaderBar.classList.remove('is-loading', 'finished');
        setProgress(0);
    }

    // Expose to window for AJAX / custom usage
    window.startPageLoader = start;
    window.stopPageLoader = finish;

    // Listen to normal internal link clicks to trigger top bar immediately
    document.addEventListener('click', (e) => {
        const link = e.target.closest('a');
        if (!link) return;

        const href = link.getAttribute('href');
        if (
            !href ||
            href.startsWith('#') ||
            href.startsWith('javascript:') ||
            href.startsWith('mailto:') ||
            href.startsWith('tel:') ||
            link.hasAttribute('download') ||
            link.getAttribute('target') === '_blank' ||
            e.metaKey ||
            e.ctrlKey ||
            e.shiftKey ||
            e.altKey ||
            e.defaultPrevented
        ) {
            return;
        }

        // Check if same origin
        try {
            const url = new URL(link.href, window.location.origin);
            if (url.origin === window.location.origin && url.pathname !== window.location.pathname) {
                start();
            }
        } catch {
            // ignore invalid urls
        }
    });

    // Reset when browser restores page from cache (Back/Forward navigation)
    window.addEventListener('pageshow', (e) => {
        if (e.persisted) {
            reset();
        } else {
            finish();
        }
    });

    window.addEventListener('load', finish);
}

// 2. Subtle Scroll Reveal System (IntersectionObserver)
export function initScrollReveal() {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const revealElements = document.querySelectorAll('.reveal-on-scroll, .reveal-fade, [data-reveal]');
    if (!revealElements.length) return;

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        revealElements.forEach((el) => el.classList.add('is-revealed'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    obs.unobserve(entry.target);
                }
            });
        },
        {
            rootMargin: '0px 0px -50px 0px',
            threshold: 0.08,
        }
    );

    revealElements.forEach((el) => observer.observe(el));
}

// 3. Universal Button Loading State Manager
export function setButtonLoading(button, isLoading, loadingText = 'Processing...') {
    if (!button) return;

    if (isLoading) {
        button.disabled = true;
        button.dataset.originalHtml = button.innerHTML;
        button.classList.add('is-btn-loading', 'opacity-85', 'cursor-not-allowed');

        const spinnerSvg = `
            <svg class="size-4 animate-spin shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        `;

        button.innerHTML = `
            <span class="inline-flex items-center justify-center gap-2">
                ${spinnerSvg}
                <span>${loadingText}</span>
            </span>
        `;
    } else {
        button.disabled = false;
        button.classList.remove('is-btn-loading', 'opacity-85', 'cursor-not-allowed');
        if (button.dataset.originalHtml) {
            button.innerHTML = button.dataset.originalHtml;
            delete button.dataset.originalHtml;
        }
    }
}

window.setButtonLoading = setButtonLoading;

// Auto-run on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    initPageLoader();
    initScrollReveal();
});

