<x-layouts.app 
    :title="$member->name . ' - ' . ($member->designation ?? $member->role ?? 'Team Member') . ' | Neepa Adventure'"
    :description="!empty($member->bio) ? Str::limit(strip_tags($member->bio), 155) : 'Meet ' . $member->name . ', ' . ($member->designation ?? 'guide and mountain leader') . ' at Neepa Adventure.'"
    :image="$member->image ? \Illuminate\Support\Facades\Storage::disk('public')->url($member->image) : null"
>
    <x-header />

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

        $facebook = $formatUrl($member->facebook_url ?? $member->facebook_link ?? null);
        $instagram = $formatUrl($member->instagram_url ?? $member->instagram_link ?? null);
        $linkedin = $formatUrl($member->linkedin_url ?? $member->linkedin_link ?? null);
        $twitter = $formatUrl($member->twitter_url ?? $member->twitter_link ?? null);
        $email = $member->email ? trim($member->email) : null;
        $phone = $member->phone ? trim($member->phone) : null;
        $hasSocials = $facebook || $instagram || $linkedin || $twitter || $phone;

        $phoneDigits = $phone ? preg_replace('/[^0-9]/', '', $phone) : null;
        $roleName = $member->designation ?? $member->role ?? 'Team Member';
        $departmentName = $member->department ?? ($member->is_guide ? 'Field Expeditions' : 'Operations');
        $memberImage = $member->image 
            ? \Illuminate\Support\Facades\Storage::disk('public')->url($member->image) 
            : 'https://placehold.co/600x750?text=' . urlencode($member->name);
    @endphp

    <main class="bg-surface w-full pt-28 pb-space-3xl sm:pt-32">
        {{-- Profile Main Container --}}
        <div class="max-w-max-content-width mx-auto px-gutter-mobile lg:px-gutter-desktop">
            {{-- Breadcrumbs --}}
            <nav aria-label="Breadcrumb" class="font-badge-caption text-badge-caption font-bold tracking-widest uppercase flex items-center gap-space-xs mb-space-md text-tertiary">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span class="text-primary font-bold">/</span>
                <a href="{{ route('team') }}" class="hover:text-primary transition-colors">Our Team</a>
                <span class="text-primary font-bold">/</span>
                <span class="text-on-surface font-bold truncate max-w-[200px] sm:max-w-none">{{ $member->name }}</span>
            </nav>
            <div class="w-12 h-1 bg-primary rounded-full mb-space-xl"></div>

            {{-- Profile Card / Layout --}}
            <div class="bg-surface-container-lowest rounded-3xl p-space-xl sm:p-space-2xl border border-outline/10 shadow-sm mb-space-3xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl lg:gap-space-2xl items-start">
                    {{-- Left: Portrait Photo (Sticky on desktop) --}}
                    <div class="lg:col-span-4 xl:col-span-4 flex justify-center lg:justify-start lg:sticky lg:top-28">
                        <div class="relative w-full max-w-[340px] sm:max-w-[380px] lg:max-w-full">
                            <div class="overflow-hidden rounded-2xl aspect-[4/5] bg-surface-container-low shadow-md border border-outline/10 relative group cursor-pointer" onclick="window.openImageViewer([{ url: '{{ $memberImage }}', title: '{{ addslashes($member->name) }}' }])">
                                <img src="{{ $memberImage }}" 
                                     alt="{{ $member->name }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                                <div class="absolute top-3 right-3 z-10 size-8 rounded-full bg-black/60 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity backdrop-blur-sm pointer-events-none" title="Zoom &amp; Download Portrait">
                                    <x-lucide-maximize-2 class="size-4 text-primary-container" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right: Details, Actions & Bio --}}
                    <div class="lg:col-span-8 xl:col-span-8">

                        <h1 class="font-headline-lg text-headline-lg sm:text-display-xl text-on-surface font-extrabold tracking-tight mb-space-xs leading-tight">
                            {{ $member->name }}
                        </h1>

                        <p class="font-headline-sm text-headline-sm text-primary font-bold tracking-wide mb-space-lg">
                            {{ $roleName }}
                        </p>

                        {{-- Action Buttons & Socials Bar --}}
                        @if((($phone && $phoneDigits) || $email) || $hasSocials)
                            <div class="flex flex-wrap items-center justify-between gap-space-sm mb-space-xl pb-space-lg border-b border-outline/10">
                                <div class="flex flex-wrap items-center gap-space-sm">
                                    @if($phone && $phoneDigits)
                                        <a href="https://wa.me/{{ $phoneDigits }}?text={{ urlencode('Hello ' . $member->name . ', I would like to inquire about planning a trek with Neepa Adventure.') }}" 
                                           target="_blank" 
                                           rel="noopener noreferrer"
                                           class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-success/10 hover:bg-success text-success hover:text-white border border-success/20 text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-sm">
                                            <x-lucide-message-circle class="size-4" />
                                            <span>WhatsApp</span>
                                        </a>
                                    @endif

                                    @if($email)
                                        <a href="mailto:{{ $email }}" 
                                           class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed text-on-surface border border-outline/10 hover:border-primary-container text-xs font-bold uppercase tracking-wider rounded-xl transition-all">
                                            <x-lucide-mail class="size-4" />
                                            <span>Email</span>
                                        </a>
                                    @endif
                                </div>

                                @if($hasSocials)
                                    <div class="flex flex-wrap items-center gap-2">
                                        @if($facebook)
                                            <a href="{{ $facebook }}" target="_blank" rel="noopener noreferrer" 
                                               aria-label="{{ $member->name }} on Facebook" title="Facebook"
                                               class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed text-tertiary border border-outline/10 transition-all flex items-center justify-center hover:scale-110">
                                                <x-lucide-facebook class="size-3.5" />
                                            </a>
                                        @endif
                                        @if($instagram)
                                            <a href="{{ $instagram }}" target="_blank" rel="noopener noreferrer" 
                                               aria-label="{{ $member->name }} on Instagram" title="Instagram"
                                               class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed text-tertiary border border-outline/10 transition-all flex items-center justify-center hover:scale-110">
                                                <x-lucide-instagram class="size-3.5" />
                                            </a>
                                        @endif
                                        @if($linkedin)
                                            <a href="{{ $linkedin }}" target="_blank" rel="noopener noreferrer" 
                                               aria-label="{{ $member->name }} on LinkedIn" title="LinkedIn"
                                               class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed text-tertiary border border-outline/10 transition-all flex items-center justify-center hover:scale-110">
                                                <x-lucide-linkedin class="size-3.5" />
                                            </a>
                                        @endif
                                        @if($twitter)
                                            <a href="{{ $twitter }}" target="_blank" rel="noopener noreferrer" 
                                               aria-label="{{ $member->name }} on Twitter / X" title="Twitter / X"
                                               class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed text-tertiary border border-outline/10 transition-all flex items-center justify-center hover:scale-110">
                                                <x-lucide-twitter class="size-3.5" />
                                            </a>
                                        @endif
                                        @if($phone)
                                            <a href="tel:{{ $phone }}" 
                                               aria-label="Call {{ $member->name }}" title="Call: {{ $phone }}"
                                               class="size-8 rounded-full bg-surface-container-low hover:bg-primary-container hover:text-on-primary-fixed text-tertiary border border-outline/10 transition-all flex items-center justify-center hover:scale-110">
                                                <x-lucide-phone class="size-3.5" />
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endif

                        {{-- Rich Text Biography Content --}}
                        @if(!empty($member->bio))
                            <div class="prose max-w-none text-tertiary font-body-md text-body-md leading-relaxed prose-headings:text-on-surface prose-headings:font-bold prose-headings:mt-6 prose-headings:mb-3 prose-p:text-tertiary prose-p:mb-4 prose-p:leading-relaxed prose-strong:text-on-surface prose-a:text-primary prose-ul:text-tertiary prose-li:my-1 [&_*]:!float-none [&_*]:!w-auto [&_div]:!m-0 [&_div]:!p-0 [&_div]:!w-full [&_div]:!float-none">
                                {!! $member->bio !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Meet More of Our Team Section --}}
        @if(isset($otherMembers) && $otherMembers->isNotEmpty())
            <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface-container-low w-full border-t border-outline/10">
                <div class="max-w-max-content-width mx-auto">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-2xl gap-space-md">
                        <div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight">
                                Meet More of Our Team
                            </h2>
                            <p class="font-body-md text-body-md text-tertiary mt-1">
                                The passionate leaders, navigators, and logistics specialists of Neepa Adventure.
                            </p>
                        </div>
                        <a href="{{ route('team') }}" class="inline-flex items-center gap-1.5 font-label-md text-label-md font-bold text-primary hover:text-amber-flare transition-colors shrink-0">
                            <span>View All Team Members</span>
                            <x-lucide-arrow-right class="size-4" />
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-xl">
                        @foreach($otherMembers as $other)
                            @php
                                $otherUrl = route('team.show', $other->slug ?? $other->id);
                                $otherImage = $other->image 
                                    ? \Illuminate\Support\Facades\Storage::disk('public')->url($other->image) 
                                    : 'https://placehold.co/400x500?text=' . urlencode($other->name);
                            @endphp
                            <div class="bg-surface-container-lowest p-space-md rounded-2xl shadow-sm border border-outline/10 hover:shadow-xl hover:border-primary/30 transition-all duration-300 group flex flex-col items-center text-center">
                                <a href="{{ $otherUrl }}" class="overflow-hidden rounded-xl w-full aspect-[4/5] mb-space-md relative bg-surface-container-low block">
                                    <img src="{{ $otherImage }}" 
                                         alt="{{ $other->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                                    @if($other->is_guide)
                                        <div class="absolute bottom-2.5 left-2.5 px-2.5 py-1 rounded-md bg-primary-container text-on-primary-fixed font-badge-caption text-[11px] font-extrabold tracking-wider uppercase shadow-md flex items-center gap-1.5 select-none">
                                            <span class="size-1.5 rounded-full bg-on-primary-fixed inline-block"></span>
                                            Guide
                                        </div>
                                    @endif
                                </a>

                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold group-hover:text-primary transition-colors">
                                    <a href="{{ $otherUrl }}">{{ $other->name }}</a>
                                </h3>
                                <p class="font-body-sm text-body-sm text-primary font-semibold mt-space-2xs mb-space-sm">
                                    {{ $other->designation ?? $other->role ?? 'Team Member' }}
                                </p>

                                @if(!empty($other->bio))
                                    <p class="font-body-sm text-body-sm text-tertiary line-clamp-2 px-space-2xs mb-space-md leading-relaxed">
                                        {{ strip_tags($other->bio) }}
                                    </p>
                                @endif

                                <div class="mt-auto pt-space-xs w-full">
                                    <a href="{{ $otherUrl }}" 
                                       class="inline-flex items-center justify-center gap-1.5 text-xs font-bold text-on-surface group-hover:text-primary transition-colors">
                                        <span>View Profile</span>
                                        <x-lucide-arrow-right class="size-3.5 group-hover:translate-x-1 transition-transform" />
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </main>

    <x-footer />
</x-layouts.app>
