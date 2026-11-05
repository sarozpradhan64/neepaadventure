<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <x-seo-meta 
        :seo="$seo ?? null"
        :title="$title ?? null"
        :description="$description ?? null"
        :image="$image ?? null"
    />

    @if(!empty($websiteSettings['favicon']))
        <link rel="icon" type="image/x-icon" href="{{ Storage::url($websiteSettings['favicon']) }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (! empty($websiteSettings['google_analytics']))
        @php
            $googleAnalyticsId = trim($websiteSettings['google_analytics']);
        @endphp
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ urlencode($googleAnalyticsId) }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '{{ $googleAnalyticsId }}');
        </script>
    @endif
</head>

<body class="bg-surface font-body-md text-body-md text-on-surface">
    {{ $slot }}

    <script>
        var Tawk_API = Tawk_API || {};
        Tawk_API.customStyle = {
            visibility: {
                desktop: {
                    position: 'br',
                    xOffset: '20px',
                    yOffset: '92px'
                },
                mobile: {
                    position: 'br',
                    xOffset: '16px',
                    yOffset: '74px'
                }
            }
        };

        Tawk_API.onChatMaximized = function() {
            document.body.classList.add('tawk-maximized');
            if (typeof window.applyMobileChatVisibility === 'function') {
                window.applyMobileChatVisibility();
            }
        };
        Tawk_API.onChatMinimized = function() {
            document.body.classList.remove('tawk-maximized');
            if (typeof window.applyMobileChatVisibility === 'function') {
                window.applyMobileChatVisibility();
            }
        };
        Tawk_API.onChatHidden = function() {
            document.body.classList.remove('tawk-maximized');
            if (typeof window.applyMobileChatVisibility === 'function') {
                window.applyMobileChatVisibility();
            }
        };
        Tawk_API.onLoad = function() {
            if (typeof window.applyMobileChatVisibility === 'function') {
                window.applyMobileChatVisibility();
            }
        };

        // Scroll listener for mobile: Display chat icons only when scrolling UP
        (function() {
            let lastScrollY = window.scrollY;
            let ticking = false;
            const threshold = 6;
            const checkMobile = () => window.innerWidth < 640;

            function applyMobileChatVisibility() {
                const isMobile = checkMobile();
                const isHidden = document.body.classList.contains('mobile-chat-hidden');
                const isMaximized = document.body.classList.contains('tawk-maximized');

                // 1. Hide attention-grabber and preview bubbles on mobile
                const chatBubble = document.getElementById('chat-bubble');
                if (chatBubble) {
                    if (isMobile) {
                        chatBubble.style.setProperty('display', 'none', 'important');
                    } else {
                        chatBubble.style.removeProperty('display');
                    }
                }

                const msgPreview = document.getElementById('message-preview');
                if (msgPreview) {
                    if (isMobile) {
                        msgPreview.style.setProperty('display', 'none', 'important');
                    } else {
                        msgPreview.style.removeProperty('display');
                    }
                }

                // 2. Adjust minimized launcher bubble
                const minWidget = document.getElementById('min-widget');
                if (minWidget) {
                    const iframe = minWidget.querySelector('iframe');
                    const elements = [minWidget, iframe].filter(Boolean);

                    elements.forEach(el => {
                        if (isMobile) {
                            el.style.setProperty('transform-origin', 'bottom right', 'important');
                            el.style.setProperty('transition', 'transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease', 'important');

                            if (isHidden && !isMaximized) {
                                el.style.setProperty('transform', 'translateY(140px)', 'important');
                                el.style.setProperty('opacity', '0', 'important');
                                el.style.setProperty('pointer-events', 'none', 'important');
                            } else if (!isMaximized) {
                                el.style.setProperty('transform', 'none', 'important');
                                el.style.setProperty('opacity', '1', 'important');
                                el.style.setProperty('pointer-events', 'auto', 'important');
                            }
                        } else {
                            el.style.removeProperty('transform');
                            el.style.removeProperty('transform-origin');
                            el.style.removeProperty('transition');
                            el.style.removeProperty('opacity');
                            el.style.removeProperty('pointer-events');
                        }
                    });
                }
            }

            window.applyMobileChatVisibility = applyMobileChatVisibility;

            // Initially hide on mobile so icons only appear on scroll up
            if (checkMobile()) {
                document.body.classList.add('mobile-chat-hidden');
            }

            // Mutation observer to style Tawk elements as soon as they are injected
            const observer = new MutationObserver(function() {
                applyMobileChatVisibility();
            });

            if (document.body) {
                observer.observe(document.body, { childList: true, subtree: true });
            } else {
                document.addEventListener('DOMContentLoaded', function() {
                    observer.observe(document.body, { childList: true, subtree: true });
                });
            }

            window.addEventListener('resize', function() {
                if (!checkMobile()) {
                    document.body.classList.remove('mobile-chat-hidden');
                }
                applyMobileChatVisibility();
            }, { passive: true });

            window.addEventListener('scroll', function() {
                if (!checkMobile()) return;

                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        const currentScrollY = window.scrollY;
                        const diff = currentScrollY - lastScrollY;

                        if (Math.abs(diff) > threshold) {
                            if (diff > 0 && currentScrollY > 60) {
                                // Scrolling DOWN -> hide chat icons
                                document.body.classList.add('mobile-chat-hidden');
                            } else if (diff < 0) {
                                // Scrolling UP -> display chat icons
                                document.body.classList.remove('mobile-chat-hidden');
                            }
                            lastScrollY = currentScrollY;
                            applyMobileChatVisibility();
                        }
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });
        })();
    </script>
    <style>
        /* Base desktop placement for Tawk.to minimized bubble */
        @media (min-width: 640px) {
            #min-widget,
            div[id="min-widget"] {
                bottom: 92px !important;
                right: 20px !important;
            }
        }

        /* Mobile styling: Match WhatsApp size (48px) and handle scroll-up visibility */
        @media (max-width: 639px) {
            /* 1. Hide the attention-grabber banner and previews entirely on mobile */
            #chat-bubble,
            div[id="chat-bubble"],
            #chat-bubble iframe,
            #chat-bubble *,
            #message-preview,
            div[id="message-preview"],
            #message-preview iframe,
            #message-preview *,
            .tawk-bubble-container,
            div[id^="tawk-bubble"] {
                display: none !important;
                visibility: hidden !important;
                opacity: 0 !important;
                pointer-events: none !important;
                width: 0 !important;
                height: 0 !important;
            }

            /* WhatsApp button styling & transition */
            #whatsapp-chat-button {
                transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease !important;
            }

            /* Match Tawk.to minimized round launcher to WhatsApp size */
            #min-widget,
            div[id="min-widget"],
            #min-widget iframe,
            div[id="min-widget"] iframe {
                transform: none !important;
                transform-origin: bottom right !important;
                bottom: 74px !important;
                right: 16px !important;
                transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease !important;
            }

            /* When scrolling down: slide both chat icons down smoothly off-screen */
            body.mobile-chat-hidden #whatsapp-chat-button {
                transform: translateY(140px) !important;
                opacity: 0 !important;
                pointer-events: none !important;
            }

            body.mobile-chat-hidden:not(.tawk-maximized) #min-widget,
            body.mobile-chat-hidden:not(.tawk-maximized) div[id="min-widget"],
            body.mobile-chat-hidden:not(.tawk-maximized) #min-widget iframe,
            body.mobile-chat-hidden:not(.tawk-maximized) div[id="min-widget"] iframe {
                transform: translateY(140px) !important;
                opacity: 0 !important;
                pointer-events: none !important;
            }
        }
    </style>

    @if (! empty($websiteSettings['custom_footer_scripts']))
        {!! $websiteSettings['custom_footer_scripts'] !!}
    @endif

    @php
        $whatsappNumber = \App\Support\Site::contact()?->whatsapp;
        $whatsappNumberStr = $whatsappNumber ? preg_replace('/[^0-9]/', '', $whatsappNumber) : null;
    @endphp

    @if ($whatsappNumberStr)
        <a id="whatsapp-chat-button" href="https://wa.me/{{ $whatsappNumberStr }}" target="_blank" rel="noopener noreferrer" class="fixed bottom-4 sm:bottom-5 right-4 sm:right-5 z-40 flex h-12 w-12 sm:h-14 sm:w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-lg transition-transform hover:scale-110 hover:shadow-xl active:scale-95" aria-label="Chat with us on WhatsApp">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6 sm:size-8" viewBox="0 0 24 24" fill="currentColor">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
        </a>
    @endif
</body>
</html>
