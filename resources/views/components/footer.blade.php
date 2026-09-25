<footer class="w-full bg-surface-container-lowest shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
    <div class="max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop py-space-3xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-xl">
            <div class="lg:col-span-2 space-y-space-md">
                <div class="font-headline-sm text-headline-sm font-bold tracking-tight text-on-surface uppercase">
                    {{ $contact?->company_name ?? config('app.name') }}
                </div>
                <p class="font-body-md text-body-md text-tertiary max-w-md">
                    {{ $websiteSettings['slogan'] ?? 'Explore Nepal. Experience the Himalayas.' }}
                </p>
                <div class="font-body-md text-body-md text-tertiary space-y-space-2xs">
                    <div>{{ $contact?->address ?? 'Contact us for our office address' }}</div>
                    <a class="block hover:text-primary transition-colors"
                        href="tel:{{ preg_replace('/[^0-9+]/', '', $contact?->phone ?? '') }}">{{ $contact?->phone ?? 'Contact us' }}</a>
                    <a class="block hover:text-primary transition-colors"
                        href="mailto:{{ $contact?->email }}">{{ $contact?->email ?? 'Email us' }}</a>
                </div>
            </div>
            <div class="space-y-space-sm">
                <div class="font-label-md text-label-md font-bold uppercase tracking-wider text-on-surface">Follow the
                    journey</div>
                <ul class="space-y-space-xs font-body-md text-body-md text-tertiary">
                    @foreach ($socials as $social)
                        <li><a class="hover:text-primary transition-colors" href="{{ $social->url }}" target="_blank"
                                rel="noopener noreferrer">{{ $social->platform }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="space-y-space-sm">
                <div class="font-label-md text-label-md font-bold uppercase tracking-wider text-on-surface">Explore
                </div>
                <ul class="space-y-space-xs font-body-md text-body-md text-tertiary">
                    <li><a class="hover:text-primary transition-colors" href="{{ route('treks') }}">Treks</a></li>

                    <li><a class="hover:text-primary transition-colors" href="{{ route('about') }}">About Us</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="pt-space-2xl mt-space-2xl border-t border-surface-container-high text-body-sm text-tertiary">
            <span>&copy; {{ date('Y') }} {{ $contact?->company_name ?? config('app.name') }}. All rights
                reserved.</span>
        </div>
    </div>
</footer>
