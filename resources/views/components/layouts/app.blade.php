<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Neepa Adventure') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-surface font-body-md text-body-md text-on-surface">
    <div
        class="fixed left-4 top-4 z-50 flex items-center justify-center rounded-full border border-outline/40 bg-surface-container-lowest/90 p-2 shadow-sm backdrop-blur-sm">
        <x-lucide-compass class="size-4 text-primary" aria-hidden="true" />
    </div>
    {{ $slot }}
</body>

</html>
