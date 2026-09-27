<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? $websiteSettings['seo_default_title'] ?? config('app.name', 'Neepa Adventure') }}</title>
    <meta name="description" content="{{ $description ?? $websiteSettings['seo_default_description'] ?? 'Experience the best trekking, climbing, and adventure tours in Nepal.' }}" />
    <meta name="keywords" content="{{ $keywords ?? $websiteSettings['seo_default_keywords'] ?? 'trekking, nepal, himalayas' }}" />
    
    <meta property="og:title" content="{{ $title ?? $websiteSettings['seo_default_title'] ?? config('app.name', 'Neepa Adventure') }}" />
    <meta property="og:description" content="{{ $description ?? $websiteSettings['seo_default_description'] ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ request()->url() }}" />
    @if(!empty($image ?? $websiteSettings['seo_default_image']))
        <meta property="og:image" content="{{ Storage::url($image ?? $websiteSettings['seo_default_image']) }}" />
    @endif

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title ?? $websiteSettings['seo_default_title'] ?? config('app.name', 'Neepa Adventure') }}" />
    <meta name="twitter:description" content="{{ $description ?? $websiteSettings['seo_default_description'] ?? '' }}" />
    @if(!empty($image ?? $websiteSettings['seo_default_image']))
        <meta name="twitter:image" content="{{ Storage::url($image ?? $websiteSettings['seo_default_image']) }}" />
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (! empty($websiteSettings['google_analytics']))
        @php($googleAnalyticsId = trim($websiteSettings['google_analytics']))
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
    <div class="border-outline/40 bg-surface-container-lowest/90 fixed top-4 left-4 z-50 flex items-center justify-center rounded-full border p-2 shadow-sm backdrop-blur-sm">
        <x-lucide-compass class="text-primary size-4" aria-hidden="true" />
    </div>
    {{ $slot }}
</body>
</html>
