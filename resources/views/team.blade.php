<x-layouts.app 
    :title="$websiteSettings['team_seo_title'] ?? ($websiteSettings['team_banner_title'] ?? 'Meet Our Team')"
    :description="$websiteSettings['team_seo_description'] ?? ($websiteSettings['team_banner_text'] ?? 'The guides and people behind every memorable Himalayan journey.')"
>
    <x-header />
    <main class="bg-surface w-full">
        {{-- Banner: Adventure Photo — Template 01 — hangs flush under fixed navbar --}}
        <section class="w-full pt-48 pb-space-3xl px-gutter-mobile lg:px-gutter-desktop"
                 style="background: {!! !empty($websiteSettings['team_banner_image']) ? 'linear-gradient(90deg, var(--color-ridge-deep) 0%, rgba(15,24,33,0.82) 42%, rgba(15,24,33,0.22) 100%), url(' . Storage::url($websiteSettings['team_banner_image']) . ') center/cover no-repeat' : 'linear-gradient(90deg, var(--color-ridge-deep) 0%, rgba(15,24,33,0.82) 42%, rgba(15,24,33,0.22) 100%), linear-gradient(135deg,#2b3530,#4a5e50 45%,#131c18 46%,#c8c3a8)' !!}; position:relative; isolation:isolate; overflow:hidden;">

            {{-- Sun glow --}}
            <div class="absolute" style="right:13%; top:20%; width:88px; height:88px; border-radius:50%; background:radial-gradient(circle, var(--color-primary-container) 0%, var(--color-amber-flare) 100%); filter:blur(2px); opacity:.85;"></div>

            {{-- Mountain silhouette --}}
            <div class="absolute inset-x-0 bottom-0" style="height:75%; z-index:1;
                background:
                    linear-gradient(145deg,transparent 35%,#171d19 35.2% 49%,transparent 49.2%),
                    linear-gradient(25deg,transparent 40%,#29352e 40.2% 62%,transparent 62.2%),
                    linear-gradient(160deg,transparent 48%,#a9b1a1 48.2% 63%,transparent 63.2%);
                clip-path:polygon(0 100%,0 55%,14% 42%,25% 62%,38% 28%,52% 59%,66% 18%,79% 55%,91% 34%,100% 51%,100% 100%);
                opacity:.7;"></div>

            {{-- Content --}}
            <div class="relative z-10 max-w-max-content-width mx-auto py-space-xl">
                <div class="font-badge-caption text-badge-caption font-bold tracking-widest uppercase flex items-center gap-space-xs mb-space-sm" style="color:rgba(255,255,255,.6);">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                    <span style="color:var(--color-primary-container); font-weight:900;">/</span>
                    <span class="text-summit-white font-black">Our Team</span>
                </div>
                <div style="width:46px;height:4px;background:var(--color-primary-container);border-radius:20px;margin-bottom:var(--spacing-space-md);"></div>
                <h1 class="font-headline-lg text-headline-lg lg:text-display-xl text-summit-white font-extrabold tracking-tight mb-space-sm" style="line-height:.95; letter-spacing:-.03em;">
                    {{ $websiteSettings['team_banner_title'] ?? 'Meet Our Team' }}
                </h1>
                <p class="font-body-lg text-body-lg m-0 max-w-[520px]" style="color:var(--color-primary-container); opacity:.85;">
                    {{ $websiteSettings['team_banner_text'] ?? 'The guides and people behind every memorable Himalayan journey.' }}
                </p>
            </div>
        </section>

        <section class="py-space-3xl px-gutter-mobile lg:px-gutter-desktop bg-surface w-full">
            <div class="max-w-max-content-width mx-auto">
                @if($teamMembers->isNotEmpty())
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-space-xl">
                        @foreach($teamMembers as $member)
                            <div class="bg-surface-container-lowest p-space-sm rounded-2xl shadow-sm border border-outline/10 hover:shadow-md transition-shadow group flex flex-col items-center text-center">
                                <div class="overflow-hidden rounded-xl w-full aspect-[4/5] mb-space-md">
                                    <img src="{{ $member->image ? \Illuminate\Support\Facades\Storage::disk('public')->url($member->image) : 'https://placehold.co/400x500' }}" 
                                         alt="{{ $member->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">{{ $member->name }}</h3>
                                <p class="font-body-sm text-body-sm text-primary font-medium mt-space-2xs mb-space-sm">{{ $member->designation ?? 'Team Member' }}</p>
                                
                                @if(isset($member->description) && $member->description)
                                    <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3 px-space-xs">{{ $member->description }}</p>
                                @endif
                                
                                <div class="mt-auto pt-space-md flex gap-space-sm justify-center w-full">
                                    @if(isset($member->facebook_link) && $member->facebook_link)
                                        <a href="{{ $member->facebook_link }}" target="_blank" class="text-on-surface-variant hover:text-primary transition-colors">
                                            <x-lucide-facebook class="size-4" />
                                        </a>
                                    @endif
                                    @if(isset($member->instagram_link) && $member->instagram_link)
                                        <a href="{{ $member->instagram_link }}" target="_blank" class="text-on-surface-variant hover:text-primary transition-colors">
                                            <x-lucide-instagram class="size-4" />
                                        </a>
                                    @endif
                                </div>
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
