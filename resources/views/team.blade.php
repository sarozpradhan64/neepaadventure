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
