<x-layouts.app 
    :title="$websiteSettings['team_seo_title'] ?? ($websiteSettings['team_banner_title'] ?? 'Meet Our Team')"
    :description="$websiteSettings['team_seo_description'] ?? ($websiteSettings['team_banner_text'] ?? 'The guides and people behind every memorable Himalayan journey.')"
>
    <x-header />
    <main class="bg-surface w-full">
        {{-- Banner: Adventure Photo — hangs flush under fixed navbar --}}
        <section class="w-full pt-28 pb-space-3xl px-gutter-mobile lg:px-gutter-desktop relative bg-ridge-deep overflow-hidden"
                 @if(!empty($websiteSettings['team_banner_image']))
                 style="background: linear-gradient(rgba(15,24,33,0.78), rgba(15,24,33,0.78)), url('{{ Storage::url($websiteSettings['team_banner_image']) }}') center/cover no-repeat;"
                 @endif>

            {{-- Content --}}
            <div class="relative z-10 max-w-max-content-width mx-auto py-space-xl">
                <div class="font-badge-caption text-badge-caption font-bold tracking-widest uppercase flex items-center gap-space-xs mb-space-sm text-summit-white/60">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                    <span class="text-primary font-bold">/</span>
                    <span class="text-summit-white font-bold">Our Team</span>
                </div>
                <div class="w-12 h-1 bg-primary rounded-full mb-space-md"></div>
                <h1 class="font-headline-lg text-headline-lg lg:text-display-xl text-summit-white font-extrabold tracking-tight mb-space-sm leading-tight">
                    {{ $websiteSettings['team_banner_title'] ?? 'Meet Our Team' }}
                </h1>
                <p class="font-body-lg text-body-lg m-0 max-w-[520px] text-summit-white/80">
                    {{ $websiteSettings['team_banner_text'] ?? 'The guides and people behind every memorable Himalayan journey.' }}
                </p>
            </div>
        </section>

        <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full">
            <div class="max-w-max-content-width mx-auto">
                @if($teamMembers->isNotEmpty())
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-space-xl">
                        @php
                            $formatUrl = function (?string $url): ?string {
                                if (! $url) return null;
                                $trimmed = trim($url);
                                if (empty($trimmed)) return null;
                                if (preg_match('#^https?://#i', $trimmed)) {
                                    return $trimmed;
                                }
                                return 'https://' . ltrim($trimmed, '/');
                            };
                        @endphp
                        @foreach($teamMembers as $member)
                            @php
                                $facebook = $formatUrl($member->facebook_url ?? $member->facebook_link ?? null);
                                $instagram = $formatUrl($member->instagram_url ?? $member->instagram_link ?? null);
                                $linkedin = $formatUrl($member->linkedin_url ?? $member->linkedin_link ?? null);
                                $twitter = $formatUrl($member->twitter_url ?? $member->twitter_link ?? null);
                                $email = $member->email ? trim($member->email) : null;
                                $phone = $member->phone ? trim($member->phone) : null;
                                $hasSocials = $facebook || $instagram || $linkedin || $twitter || $email || $phone;
                                $bio = $member->bio ?? $member->description ?? null;
                            @endphp
                            <div class="bg-surface-container-lowest p-space-md rounded-2xl shadow-sm border border-outline/10 hover:shadow-xl hover:border-primary/30 transition-all duration-300 group flex flex-col items-center text-center">
                                <div class="overflow-hidden rounded-xl w-full aspect-[4/5] mb-space-md relative bg-surface-container-low">
                                    <img src="{{ $member->image ? \Illuminate\Support\Facades\Storage::disk('public')->url($member->image) : 'https://placehold.co/400x500?text=' . urlencode($member->name) }}" 
                                         alt="{{ $member->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                                    @if($member->is_guide)
                                        <div class="absolute bottom-2.5 left-2.5 px-2.5 py-1 rounded-md bg-primary-container text-on-primary-fixed font-badge-caption text-[11px] font-extrabold tracking-wider uppercase shadow-md border border-primary-container/60 hover:bg-amber-flare hover:shadow-[0_2px_12px_rgba(255,210,0,0.55)] group-hover:bg-amber-flare group-hover:shadow-[0_2px_12px_rgba(255,210,0,0.5)] transition-all duration-300 flex items-center gap-1.5 select-none">
                                            <span class="size-1.5 rounded-full bg-on-primary-fixed inline-block"></span>
                                            Guide
                                        </div>
                                    @endif
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold group-hover:text-primary transition-colors">{{ $member->name }}</h3>
                                <p class="font-body-sm text-body-sm text-primary font-semibold mt-space-2xs mb-space-sm">{{ $member->designation ?? $member->role ?? 'Team Member' }}</p>
                                
                                @if($bio)
                                    <p class="font-body-sm text-body-sm text-tertiary line-clamp-3 px-space-2xs mb-space-md leading-relaxed">{!! strip_tags($bio) !!}</p>
                                @endif
                                
                                @if($hasSocials)
                                    <div class="mt-auto pt-space-sm border-t border-outline/10 flex flex-wrap items-center justify-center gap-2 w-full">
                                        @if($facebook)
                                            <a href="{{ $facebook }}" target="_blank" rel="noopener noreferrer" 
                                               aria-label="{{ $member->name }} on Facebook"
                                               title="Facebook"
                                               class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_10px_rgba(255,210,0,0.45)] text-tertiary transition-all duration-200 flex items-center justify-center hover:scale-110">
                                                <x-lucide-facebook class="size-4" />
                                            </a>
                                        @endif
                                        @if($instagram)
                                            <a href="{{ $instagram }}" target="_blank" rel="noopener noreferrer" 
                                               aria-label="{{ $member->name }} on Instagram"
                                               title="Instagram"
                                               class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_10px_rgba(255,210,0,0.45)] text-tertiary transition-all duration-200 flex items-center justify-center hover:scale-110">
                                                <x-lucide-instagram class="size-4" />
                                            </a>
                                        @endif
                                        @if($linkedin)
                                            <a href="{{ $linkedin }}" target="_blank" rel="noopener noreferrer" 
                                               aria-label="{{ $member->name }} on LinkedIn"
                                               title="LinkedIn"
                                               class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_10px_rgba(255,210,0,0.45)] text-tertiary transition-all duration-200 flex items-center justify-center hover:scale-110">
                                                <x-lucide-linkedin class="size-4" />
                                            </a>
                                        @endif
                                        @if($twitter)
                                            <a href="{{ $twitter }}" target="_blank" rel="noopener noreferrer" 
                                               aria-label="{{ $member->name }} on Twitter / X"
                                               title="Twitter / X"
                                               class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_10px_rgba(255,210,0,0.45)] text-tertiary transition-all duration-200 flex items-center justify-center hover:scale-110">
                                                <x-lucide-twitter class="size-4" />
                                            </a>
                                        @endif
                                        @if($email)
                                            <a href="mailto:{{ $email }}" 
                                               aria-label="Email {{ $member->name }}"
                                               title="Email: {{ $email }}"
                                               class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_10px_rgba(255,210,0,0.45)] text-tertiary transition-all duration-200 flex items-center justify-center hover:scale-110">
                                                <x-lucide-mail class="size-4" />
                                            </a>
                                        @endif
                                        @if($phone)
                                            <a href="tel:{{ $phone }}" 
                                               aria-label="Call {{ $member->name }}"
                                               title="Call: {{ $phone }}"
                                               class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed border border-outline/10 hover:border-primary-container hover:shadow-[0_2px_10px_rgba(255,210,0,0.45)] text-tertiary transition-all duration-200 flex items-center justify-center hover:scale-110">
                                                <x-lucide-phone class="size-4" />
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-space-3xl">
                        <p class="font-body-lg text-body-lg text-on-surface-variant">We're currently updating our team profiles. Please check back later!</p>
                    </div>
                @endif
            </div>
        </section>
    </main>
    <x-footer />
</x-layouts.app>
