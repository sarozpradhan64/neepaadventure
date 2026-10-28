/**
 * Rich Text Editor Word & Google Docs Clipboard Cleaner
 * 
 * Detects, converts and sanitizes formatted text pasted from Microsoft Word,
 * Google Docs, and Office 365 into clean semantic HTML.
 */

export function isWordOrDocsHtml(html) {
    if (!html) return false;
    return /(class\s*=\s*["']?Mso|xmlns:o\s*=|xmlns:w\s*=|mso-|<!--\[if gte mso|<meta name=["']?Generator["']?\s+content=["']?Microsoft Word|id=["']?docs-internal-guid|data-sheets-value)/i.test(html);
}

export function cleanWordHtml(html) {
    let clean = html
        .replace(/<!--[\s\S]*?-->/gi, '')
        .replace(/<style[\s\S]*?<\/style>/gi, '')
        .replace(/<script[\s\S]*?<\/script>/gi, '')
        .replace(/<xml[\s\S]*?<\/xml>/gi, '')
        .replace(/<\/?o:[^>]*>/gi, '')
        .replace(/<\/?w:[^>]*>/gi, '')
        .replace(/<\/?m:[^>]*>/gi, '')
        .replace(/<\/?v:[^>]*>/gi, '');

    const parser = new DOMParser();
    const doc = parser.parseFromString(clean, 'text/html');

    // Convert Word pseudo-lists (MsoListParagraph) into semantic <ul> and <ol>
    const listParas = Array.from(
        doc.querySelectorAll('p[class*="MsoList"], p[style*="mso-list"]')
    );

    if (listParas.length > 0) {
        let currentList = null;
        let isOrdered = false;

        listParas.forEach((p) => {
            const ignoreSpan = p.querySelector('span[style*="mso-list:Ignore"]');
            const markerText = ignoreSpan ? ignoreSpan.textContent.trim() : '';
            const isNum = /^[0-9]+[.)]|^[a-zA-Z][.)]/.test(markerText);

            if (
                !currentList ||
                isOrdered !== isNum ||
                p.previousElementSibling !== currentList
            ) {
                isOrdered = isNum;
                currentList = doc.createElement(isOrdered ? 'ol' : 'ul');
                currentList.className =
                    'list-inside ' +
                    (isOrdered ? 'list-decimal' : 'list-disc') +
                    ' my-2 space-y-1';
                p.parentNode.insertBefore(currentList, p);
            }

            if (ignoreSpan) {
                ignoreSpan.remove();
            }

            const li = doc.createElement('li');
            while (p.firstChild) {
                li.appendChild(p.firstChild);
            }
            currentList.appendChild(li);
            p.remove();
        });
    }

    // Format tables cleanly
    doc.body.querySelectorAll('table').forEach((table) => {
        table.className = 'w-full border-collapse border border-border my-4';
        table.removeAttribute('border');
        table.removeAttribute('cellspacing');
        table.removeAttribute('cellpadding');
        table.querySelectorAll('th').forEach((th) => {
            th.className = 'border border-border p-2 bg-muted/50 font-semibold';
        });
        table.querySelectorAll('td').forEach((td) => {
            td.className = 'border border-border p-2';
        });
    });

    // Sanitize elements and styles
    const allowedTags = new Set([
        'P', 'H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'STRONG', 'B', 'EM', 'I', 'U', 'S', 'DEL', 'STRIKE',
        'UL', 'OL', 'LI', 'TABLE', 'THEAD', 'TBODY', 'TR', 'TH', 'TD', 'BLOCKQUOTE', 'A', 'IMG', 'BR', 'HR', 'SPAN', 'DIV'
    ]);

    doc.body.querySelectorAll('*').forEach((el) => {
        if (!allowedTags.has(el.tagName)) {
            el.replaceWith(...el.childNodes);
            return;
        }

        if (el.className) {
            const newClasses = el.className
                .split(/\s+/)
                .filter(
                    (c) =>
                        !c.toLowerCase().startsWith('mso') &&
                        !c.toLowerCase().includes('apple-')
                )
                .join(' ');
            if (newClasses) {
                el.className = newClasses;
            } else {
                el.removeAttribute('class');
            }
        }
        if (el.id && el.id.startsWith('docs-internal-guid')) {
            el.removeAttribute('id');
        }

        if (el.hasAttribute('style')) {
            const style = el.style;
            const isBold =
                style.fontWeight === 'bold' ||
                parseInt(style.fontWeight, 10) >= 600;
            const isItalic = style.fontStyle === 'italic';

            const safeStyles = [];
            if (
                style.textAlign &&
                ['left', 'center', 'right', 'justify'].includes(style.textAlign)
            ) {
                safeStyles.push(`text-align: ${style.textAlign}`);
            }

            if (safeStyles.length > 0) {
                el.setAttribute('style', safeStyles.join('; '));
            } else {
                el.removeAttribute('style');
            }

            if (isBold && el.tagName === 'SPAN') {
                const strong = doc.createElement('strong');
                el.parentNode.insertBefore(strong, el);
                strong.appendChild(el);
            }
            if (isItalic && el.tagName === 'SPAN') {
                const em = doc.createElement('em');
                el.parentNode.insertBefore(em, el);
                em.appendChild(em);
            }
        }

        if (el.tagName === 'SPAN' && !el.attributes.length) {
            el.replaceWith(...el.childNodes);
        }

        if (
            el.tagName === 'P' &&
            !el.textContent.trim() &&
            !el.querySelector('img, br')
        ) {
            el.remove();
        }
    });

    return doc.body.innerHTML.trim();
}

export function handleRtePaste(event, editorEl) {
    const clipboardData = event.clipboardData || window.clipboardData;
    if (!clipboardData) return false;

    const html = clipboardData.getData('text/html');

    if (html && isWordOrDocsHtml(html)) {
        event.preventDefault();
        const cleaned = cleanWordHtml(html);

        editorEl.focus();
        if (!document.execCommand('insertHTML', false, cleaned)) {
            const sel = window.getSelection();
            if (sel && sel.rangeCount > 0) {
                const range = sel.getRangeAt(0);
                range.deleteContents();
                const frag = range.createContextualFragment(cleaned);
                range.insertNode(frag);
                range.collapse(false);
            }
        }
        return true;
    }
    return false;
}

// Expose globally for Alpine components
window.isWordOrDocsHtml = isWordOrDocsHtml;
window.cleanWordHtml = cleanWordHtml;
window.handleRtePaste = handleRtePaste;
