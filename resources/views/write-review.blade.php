<x-layouts.app title="Write a Review - {{ config('app.name') }}">
    <x-header />

    <main class="bg-surface w-full pt-40 pb-24">
        <div class="max-w-max-content-width px-gutter-mobile lg:px-gutter-desktop mx-auto">
            <div class="mb-space-2xl text-center max-w-2xl mx-auto">
                <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight mb-space-sm">
                    Write a Review
                </h1>
                <p class="font-body-md text-body-md text-tertiary">
                    We'd love to hear about your experience with us! Please share your thoughts below.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl">
                <!-- Review Form -->
                <div class="lg:col-span-7 bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm border border-outline/10">
                    <div id="review-success" class="bg-green-50 text-green-700 p-4 rounded-lg mb-6 border border-green-200 hidden">
                    </div>
                    
                    <div id="review-error-general" class="bg-red-50 text-red-700 p-4 rounded-lg mb-6 border border-red-200 hidden">
                    </div>

                    <form id="review-form" action="{{ route('write-review.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block font-label-md text-on-surface mb-2 font-bold">Your Name *</label>
                                <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                    class="w-full px-4 py-3 bg-surface border border-outline/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary">
                                <span class="review-error-msg text-error text-xs mt-1 hidden" id="error-name"></span>
                            </div>
                            <div>
                                <label for="role" class="block font-label-md text-on-surface mb-2 font-bold">Role / Trip (Optional)</label>
                                <input type="text" id="role" name="role" value="{{ old('role') }}" placeholder="e.g. Everest Base Camp Trekker"
                                    class="w-full px-4 py-3 bg-surface border border-outline/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary">
                                <span class="review-error-msg text-error text-xs mt-1 hidden" id="error-role"></span>
                            </div>
                        </div>

                        <div>
                            <label for="company" class="block font-label-md text-on-surface mb-2 font-bold">Company (Optional)</label>
                            <input type="text" id="company" name="company" value="{{ old('company') }}"
                                class="w-full px-4 py-3 bg-surface border border-outline/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary">
                            <span class="review-error-msg text-error text-xs mt-1 hidden" id="error-company"></span>
                        </div>

                        <div>
                            <label class="block font-label-md text-on-surface mb-2 font-bold">Rating *</label>
                            <div class="flex items-center gap-1" id="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                <button type="button" class="star-btn focus:outline-none transition-transform hover:scale-110" data-value="{{ $i }}">
                                    <x-lucide-star class="size-8 text-outline/30 transition-colors duration-200" id="star-{{ $i }}" />
                                </button>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" id="rating-input" value="{{ old('rating', 5) }}" required>
                            <span class="review-error-msg text-error text-xs mt-1 hidden" id="error-rating"></span>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const stars = document.querySelectorAll('.star-btn');
                                const ratingInput = document.getElementById('rating-input');
                                
                                function updateStars(rating) {
                                    stars.forEach(star => {
                                        const val = parseInt(star.dataset.value);
                                        const svg = star.querySelector('svg');
                                        if (val <= rating) {
                                            svg.classList.remove('text-outline/30');
                                            svg.classList.add('text-amber-400', 'fill-amber-400');
                                        } else {
                                            svg.classList.remove('text-amber-400', 'fill-amber-400');
                                            svg.classList.add('text-outline/30');
                                        }
                                    });
                                }

                                // Initial state based on old input
                                updateStars(ratingInput.value);

                                stars.forEach(star => {
                                    star.addEventListener('click', () => {
                                        ratingInput.value = star.dataset.value;
                                        updateStars(ratingInput.value);
                                    });
                                    
                                    star.addEventListener('mouseenter', () => {
                                        updateStars(star.dataset.value);
                                    });
                                });

                                document.getElementById('star-rating').addEventListener('mouseleave', () => {
                                    updateStars(ratingInput.value);
                                });
                            });
                        </script>

                        <div>
                            <label for="content" class="block font-label-md text-on-surface mb-2 font-bold">Your Review *</label>
                            <textarea id="content" name="content" rows="5" required
                                class="w-full px-4 py-3 bg-surface border border-outline/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary">{{ old('content') }}</textarea>
                            <span class="review-error-msg text-error text-xs mt-1 hidden" id="error-content"></span>
                        </div>

                        <button type="submit" id="review-submit-btn" class="w-full py-4 bg-primary text-on-primary rounded-xl font-bold hover:bg-primary/90 transition-colors uppercase tracking-wider flex items-center justify-center gap-2">
                            <span>Submit Review</span>
                        </button>
                    </form>
                    
                    <script>
                        document.getElementById('review-form').addEventListener('submit', async function(e) {
                            e.preventDefault();
                            
                            const form = e.target;
                            const submitBtn = document.getElementById('review-submit-btn');
                            const successEl = document.getElementById('review-success');
                            const generalErrorEl = document.getElementById('review-error-general');
                            
                            // Hide all previous errors
                            document.querySelectorAll('.review-error-msg').forEach(el => el.classList.add('hidden'));
                            successEl.classList.add('hidden');
                            generalErrorEl.classList.add('hidden');
                            
                            // Loading state
                            submitBtn.disabled = true;
                            submitBtn.querySelector('span').innerText = 'Submitting...';
                            submitBtn.classList.add('opacity-75');
                            
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
                                    if (response.status === 422 && data.errors) {
                                        // Display specific field errors
                                        for (const [field, messages] of Object.entries(data.errors)) {
                                            const errorSpan = document.getElementById('error-' + field);
                                            if (errorSpan) {
                                                errorSpan.innerText = messages[0];
                                                errorSpan.classList.remove('hidden');
                                            }
                                        }
                                    } else {
                                        generalErrorEl.innerText = data.message || 'Something went wrong. Please try again.';
                                        generalErrorEl.classList.remove('hidden');
                                    }
                                } else {
                                    // Success
                                    successEl.innerText = data.message;
                                    successEl.classList.remove('hidden');
                                    form.reset();
                                    
                                    // Reset stars UI to 5
                                    document.getElementById('rating-input').value = 5;
                                    const stars = document.querySelectorAll('.star-btn svg');
                                    stars.forEach(svg => {
                                        svg.classList.remove('text-outline/30');
                                        svg.classList.add('text-amber-400', 'fill-amber-400');
                                    });
                                }
                            } catch (err) {
                                generalErrorEl.innerText = 'Network error. Please try again.';
                                generalErrorEl.classList.remove('hidden');
                            } finally {
                                submitBtn.disabled = false;
                                submitBtn.classList.remove('opacity-75');
                                submitBtn.querySelector('span').innerText = 'Submit Review';
                            }
                        });
                    </script>
                </div>

                <!-- Contact & Social Info -->
                <div class="lg:col-span-5 space-y-space-xl">
                    <div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm border border-outline/10">
                        <h3 class="font-headline-sm text-on-surface font-bold mb-space-md">Connect With Us</h3>
                        <p class="font-body-sm text-tertiary mb-space-lg">
                            Follow our journey and share your own experiences on our social media platforms!
                        </p>
                        <div class="flex flex-wrap gap-4">
                            @foreach($socials as $social)
                                <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer" 
                                   class="flex items-center justify-center size-12 bg-primary-container text-on-primary-fixed rounded-full hover:bg-primary hover:text-on-primary transition-colors shadow-sm"
                                   title="{{ $social->platform }}">
                                    @if(str_contains(strtolower($social->platform), 'facebook'))
                                        <x-lucide-facebook class="size-5" />
                                    @elseif(str_contains(strtolower($social->platform), 'instagram'))
                                        <x-lucide-instagram class="size-5" />
                                    @elseif(str_contains(strtolower($social->platform), 'twitter') || str_contains(strtolower($social->platform), 'x'))
                                        <x-lucide-twitter class="size-5" />
                                    @elseif(str_contains(strtolower($social->platform), 'youtube'))
                                        <x-lucide-youtube class="size-5" />
                                    @else
                                        <x-lucide-link class="size-5" />
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>

                    @if(!empty($contact?->google_maps_iframe))
                        <div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm border border-outline/10 overflow-hidden">
                            <h3 class="font-headline-sm text-on-surface font-bold mb-space-md">Find Us Here</h3>
                            <div class="w-full aspect-video rounded-xl overflow-hidden">
                                {!! str_replace('<iframe ', '<iframe class="w-full h-full" ', $contact->google_maps_iframe) !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <x-footer />
</x-layouts.app>
