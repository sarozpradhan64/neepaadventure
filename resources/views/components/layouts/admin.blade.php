<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ $title ?? 'Admin Dashboard' }} - {{ $contactInfo->company_name ?? config('app.name') }}</title>
    @if (! empty($websiteSettings['favicon']))
        <link rel="icon" href="{{ Storage::url($websiteSettings['favicon']) }}" />
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-foreground selection:bg-primary/20 selection:text-primary min-h-screen font-sans antialiased">
    <x-ui.sidebar-provider>
        <x-admin::sidebar />

        <x-ui.sidebar-inset>
            <header class="flex h-16 shrink-0 items-center gap-2 border-b px-4">
                <x-ui.sidebar-trigger />
                <x-ui.separator orientation="vertical" class="mr-2 h-4" />
                @if (isset($header))
                    <div class="flex-1">{{ $header }}</div>
                @endif
            </header>

            <main class="flex-1 space-y-6 p-4 md:p-6">
                @if (session('error'))
                    <div
                        role="alert"
                        class="border-destructive/50 bg-destructive/10 text-destructive flex items-start gap-3 rounded-md border p-4"
                    >
                        <x-lucide-circle-x class="mt-0.5 size-5 shrink-0" />
                        <p class="text-sm font-medium">{{ session('error') }}</p>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </x-ui.sidebar-inset>
    </x-ui.sidebar-provider>

    <x-ui.sonner />
    <x-ui.sonner-flash />
</body>
</html>
