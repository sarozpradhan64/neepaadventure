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
                @if (isset($header))
                <div class="">{{ $header }}</div>
                @else
                <div class="flex-1"></div>
                @endif
                
                <x-ui.separator orientation="vertical" class="mr-2 h-4" />
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false" type="button" class="flex items-center gap-2 rounded-full border bg-background px-2 py-1 hover:bg-surface-container-low transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary/10 text-primary">
                            <x-lucide-user class="size-4" />
                        </div>
                        <span class="text-sm font-medium hidden md:block">{{ auth()->user()->name ?? 'Admin' }}</span>
                        <x-lucide-chevron-down class="size-4 text-muted-foreground transition-transform duration-200" x-bind:class="{ 'rotate-180': open }" />
                    </button>

                    <div x-show="open" x-transition.opacity.duration.200ms class="absolute right-0 mt-2 w-48 rounded-md border bg-popover text-popover-foreground shadow-md z-50 overflow-hidden" style="display: none;">
                        <div class="px-4 py-3 border-b">
                            <p class="text-sm font-medium leading-none">{{ auth()->user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-muted-foreground mt-1 truncate">{{ auth()->user()->email ?? 'admin@example.com' }}</p>
                        </div>
                        <div class="py-1">
                            @if (app(\Blaze\AdminCore\AdminCoreConfiguration::class)->enabled('profile'))
                                <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-accent hover:text-accent-foreground transition-colors w-full text-left">
                                    <x-lucide-user-cog class="size-4" />
                                    Profile
                                </a>
                            @endif
                            <form method="POST" action="{{ route('admin.logout') }}" class="block w-full">
                                @csrf
                                <button type="submit" class="flex w-full items-center gap-2 px-4 py-2 text-sm text-destructive hover:bg-accent hover:text-destructive transition-colors text-left">
                                    <x-lucide-log-out class="size-4" />
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
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
