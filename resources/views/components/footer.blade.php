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

                <div class="pt-space-md max-w-md">
                    <div class="font-label-md text-label-md text-on-surface font-bold tracking-wider uppercase mb-space-xs">
                        Subscribe to our Newsletter
                    </div>
                    <form id="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST" class="flex gap-2">
                        @csrf
                        <input type="email" id="newsletter-email" name="email" placeholder="Enter your email (e.g. @gmail.com)" required
                            class="flex-1 px-4 py-2 bg-surface border border-outline/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        <button type="submit" id="newsletter-submit" class="px-6 py-2 bg-primary text-on-primary rounded-lg font-bold hover:bg-primary/90 transition-colors text-sm">
                            Subscribe
                        </button>
                    </form>
                    <p id="newsletter-error" class="text-error text-xs mt-1 hidden"></p>
                    <p id="newsletter-success" class="text-green-600 text-xs mt-1 hidden"></p>

                    <script>
                        document.getElementById('newsletter-form').addEventListener('submit', async function(e) {
                            e.preventDefault();
                            
                            const form = e.target;
                            const submitBtn = document.getElementById('newsletter-submit');
                            const errorEl = document.getElementById('newsletter-error');
                            const successEl = document.getElementById('newsletter-success');
                            
                            submitBtn.disabled = true;
                            submitBtn.innerHTML = 'Wait...';
                            errorEl.classList.add('hidden');
                            successEl.classList.add('hidden');
                            
                            try {
                                const formData = new FormData(form);
                                const response = await fetch(form.action, {
                                    method: 'POST',
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest',
                                        'Accept': 'application/json',
                                    },
                                    body: formData
                                });
                                
                                const data = await response.json();
                                
                                if (!response.ok) {
                                    if (response.status === 422) {
                                        errorEl.innerText = data.errors.email[0];
                                    } else {
                                        errorEl.innerText = data.message || 'Something went wrong. Please try again.';
                                    }
                                    errorEl.classList.remove('hidden');
                                } else {
                                    successEl.innerText = data.message;
                                    successEl.classList.remove('hidden');
                                    form.reset();
                                }
                            } catch (err) {
                                errorEl.innerText = 'Network error. Please try again.';
                                errorEl.classList.remove('hidden');
                            } finally {
                                submitBtn.disabled = false;
                                submitBtn.innerHTML = 'Subscribe';
                            }
                        });
                    </script>
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
                    <li><a class="hover:text-primary transition-colors" href="{{ route('careers.index') }}">Careers</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('contact') }}">Contact</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('write-review') }}">Write a Review</a></li>
                </ul>
            </div>
            
            @if(isset($navLegalDocuments) && $navLegalDocuments->isNotEmpty())
            <div class="space-y-space-sm">
                <div class="font-label-md text-label-md text-on-surface font-bold tracking-wider uppercase">
                    Legal
                </div>
                <ul class="space-y-space-xs font-body-md text-body-md text-tertiary">
                    <li><a class="hover:text-primary transition-colors" href="{{ route('legal.index') }}">Legal & Policies</a></li>
                </ul>
            </div>
            @endif
        </div>
        <div class="pt-space-2xl mt-space-2xl border-surface-container-high text-body-sm text-tertiary border-t">
            <span>&copy; {{ date('Y') }} {{ $contact?->company_name ?? config('app.name') }}. All rights reserved.</span>
        </div>
    </div>
</footer>
