@props(['member'])

<div {{ $attributes->merge(['class' => 'group relative aspect-[3/4] w-full overflow-hidden rounded-3xl bg-[#1A1A1A] border border-[#E5E7EB] hover:border-[#F5791F]/50 shadow-sm hover:shadow-xl transition-all duration-300']) }}>
    <!-- Photo du collaborateur -->
    <img src="{{ $member->photo_url }}" 
         alt="{{ strip_tags($member->name) }}" 
         loading="lazy"
         class="h-full w-full object-cover object-top transition-transform duration-700 ease-out group-hover:scale-105">

    <!-- Overlay sombre dégradé pour contraste et lisibilité optimale -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300 pointer-events-none"></div>

    <!-- Cartouche Inférieur AllSmart (#1A1A1A) -->
    <div class="absolute inset-x-0 bottom-0 p-4 sm:p-5 flex flex-col justify-end bg-gradient-to-t from-[#1A1A1A] via-[#1A1A1A]/95 to-transparent pt-12">
        <!-- Badge Rôle -->
        @if($member->role)
            <div class="mb-1.5">
                <span class="inline-flex items-center rounded-full bg-[#F5791F] px-2.5 py-0.5 text-[10px] sm:text-[11px] font-bold text-white uppercase tracking-wider shadow-2xs">
                    {{ $member->role }}
                </span>
            </div>
        @endif

        <!-- Nom du collaborateur -->
        <h3 class="text-xl sm:text-2xl font-black text-white leading-tight tracking-tight drop-shadow-xs">
            {!! $member->name !!}
        </h3>

        <!-- Signature Zeyada -->
        @if($member->label)
            <p class="mt-0.5 font-['Zeyada'] text-2xl sm:text-[26px] text-[#F5791F] leading-tight">
                {{ $member->label }}
            </p>
        @endif

        <!-- Réseaux sociaux -->
        @if($member->instagram_url || $member->facebook_url || $member->x_url || $member->linkedin_url)
            <div class="mt-3 pt-2.5 border-t border-white/20 flex items-center justify-between">
                <span class="text-[10px] font-bold uppercase tracking-wider text-white/70">
                    Connect
                </span>
                <div class="flex items-center gap-1.5">
                    @if($member->linkedin_url)
                        <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn de {{ strip_tags($member->name) }}"
                           class="flex h-7 w-7 items-center justify-center rounded-full border border-white/30 bg-white/10 backdrop-blur-xs text-white hover:text-[#F5791F] hover:bg-white hover:border-white transition-all duration-200">
                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.64 1.64 0 0 0 1.64-1.64 1.64 1.64 0 1 0-3.28 0 1.64 1.64 0 0 0 1.64 1.64m1.39 9.74v-8.37H5.07v8.37h2.78Z"/>
                            </svg>
                        </a>
                    @endif

                    @if($member->instagram_url)
                        <a href="{{ $member->instagram_url }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram de {{ strip_tags($member->name) }}"
                           class="flex h-7 w-7 items-center justify-center rounded-full border border-white/30 bg-white/10 backdrop-blur-xs text-white hover:text-[#F5791F] hover:bg-white hover:border-white transition-all duration-200">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="5"></rect>
                                <circle cx="12" cy="12" r="4"></circle>
                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor"></circle>
                            </svg>
                        </a>
                    @endif

                    @if($member->facebook_url)
                        <a href="{{ $member->facebook_url }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook de {{ strip_tags($member->name) }}"
                           class="flex h-7 w-7 items-center justify-center rounded-full border border-white/30 bg-white/10 backdrop-blur-xs text-white hover:text-[#F5791F] hover:bg-white hover:border-white transition-all duration-200">
                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.5 21v-8h2.7l.4-3h-3.1V7.5c0-.9.3-1.5 1.6-1.5H17V3.1c-.3 0-1.3-.1-2.5-.1-2.5 0-4.1 1.5-4.1 4.3V10H8v3h2.4v8h3.1Z"/>
                            </svg>
                        </a>
                    @endif

                    @if($member->x_url)
                        <a href="{{ $member->x_url }}" target="_blank" rel="noopener noreferrer" aria-label="X de {{ strip_tags($member->name) }}"
                           class="flex h-7 w-7 items-center justify-center rounded-full border border-white/30 bg-white/10 backdrop-blur-xs text-white hover:text-[#F5791F] hover:bg-white hover:border-white transition-all duration-200">
                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.9 2h3.4l-7.4 8.5L22.6 22h-6.8l-5.3-7.8L4 22H.6l7.9-9L1.2 2h7l4.8 7.1L18.9 2Zm-1.2 18h1.9L7.1 3.9H5.1L17.7 20Z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
