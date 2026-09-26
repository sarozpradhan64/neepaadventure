<footer class="bg-surface-container-lowest w-full shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
    <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop py-space-3xl mx-auto">
        <div class="gap-space-xl grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
            <div class="space-y-space-md lg:col-span-2">
                <div class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight uppercase">
                    {{ $contact?->company_name ?? config('app.name') }}
                </div>
                <p class="font-body-md text-body-md text-tertiary max-w-md">
                    {{ $websiteSettings['slogan'] ?? 'Explore Nepal. Experience the Himalayas.' }}
                </p>
                <div class="font-body-md text-body-md text-tertiary space-y-space-2xs">
                    <div>{{ $contact?->address ?? 'Contact us for our office address' }}</div>
                    <a
                        class="hover:text-primary block transition-colors"
                        href="tel:{{ preg_replace('/[^0-9+]/', '', $contact?->phone ?? '') }}"
                    >{{ $contact?->phone ?? 'Contact us' }}</a>
                    <a
                        class="hover:text-primary block transition-colors"
                        href="mailto:{{ $contact?->email }}"
                    >{{ $contact?->email ?? 'Email us' }}</a>
                </div>
            </div>
            <div class="space-y-space-sm">
                <div class="font-label-md text-label-md text-on-surface font-bold tracking-wider uppercase">
                    Follow the journey
                </div>
                <ul class="space-y-space-xs font-body-md text-body-md text-tertiary">
                    @foreach ($socials as $social)
                        <li>
                            <a
                                class="hover:text-primary transition-colors"
                                href="{{ $social->url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >{{ $social->platform }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="space-y-space-sm">
                <div class="font-label-md text-label-md text-on-surface font-bold tracking-wider uppercase">
                    Explore
                </div>
                <ul class="space-y-space-xs font-body-md text-body-md text-tertiary">
                    <li><a class="hover:text-primary transition-colors" href="{{ route('treks') }}">Treks</a></li>

                    <li><a class="hover:text-primary transition-colors" href="{{ route('about') }}">About Us</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="pt-space-2xl mt-space-2xl border-surface-container-high text-body-sm text-tertiary border-t">
            <span>&copy; {{ date('Y') }} {{ $contact?->company_name ?? config('app.name') }}. All rights reserved.</span>
        </div>
    </div>
</footer>
