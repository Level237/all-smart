@extends('layouts.main')

@section('title', 'La Smart Team - Nos Talents & Experts | Allsmart Consulting')
@section('meta_description', 'Découvrez les visages et talents d\'AllSmart Consulting : stratèges, directeurs artistiques, créateurs de contenus et chefs de projets unis pour propulser votre marque.')

@section('content')

<!-- Hero Banner Équipe Dédié -->
<section class="relative min-h-[460px] sm:min-h-[520px] lg:min-h-[580px] flex items-center justify-center overflow-hidden">
    <!-- Image de fond avec overlay sombre -->
    <div class="absolute inset-0 h-full w-full">
        <img src="{{ asset('assets/slideabout.jpg') }}" 
             alt="La Smart Team AllSmart" 
             class="h-full w-full object-cover object-center">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[1px]"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent"></div>
    </div>

    <!-- Contenu Textuel du Hero -->
    <div class="relative z-10 mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 text-center pt-24 pb-16">
        <span class="font-zeyada text-4xl sm:text-5xl md:text-6xl text-[#F5791F] block mb-2">
            L'intelligence collective
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
            Les talents et experts derrière vos plus grands succès
        </h1>
        <p class="mt-4 sm:mt-6 text-sm sm:text-base md:text-lg text-white/90 max-w-2xl mx-auto font-light leading-relaxed">
            Stratèges de marque, créateurs de contenus, directeurs artistiques et coordinateurs événementiels réunis par une exigence sans compromis.
        </p>
    </div>
</section>

<!-- Section Complète des Collaborateurs -->
<section class="py-16 sm:py-20 lg:py-24 bg-white"
         x-data="{
             search: '',
             matches(name, role) {
                 if (!this.search) return true;
                 const q = this.search.toLowerCase();
                 return (name && name.toLowerCase().includes(q)) || (role && role.toLowerCase().includes(q));
             }
         }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <!-- En-tête avec Recherche Rapide -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12 sm:mb-16 pb-8 border-b border-[#E5E7EB]">
            <div>
                <span class="font-zeyada text-3xl sm:text-4xl text-[#F5791F] block mb-1">
                    Les visages AllSmart
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#1A1A1A] tracking-tight">
                    Toute la Smart Team ({{ $teams->count() }})
                </h2>
                <p class="mt-2 text-xs sm:text-sm text-[#555555]">
                    Découvrez les compétences et signatures uniques qui animent nos projets au quotidien.
                </p>
            </div>

            <!-- Champ de Recherche Client -->
            <div class="w-full md:w-72">
                <div class="relative">
                    <input type="text" 
                           x-model="search"
                           placeholder="Rechercher par nom ou rôle..."
                           class="w-full rounded-xl bg-[#FAF4EF] pl-10 pr-4 py-3 text-xs sm:text-sm text-[#1A1A1A] border border-[#F4E6D9] focus:border-[#F5791F] focus:outline-none focus:bg-white transition-all placeholder:text-[#555555]/60">
                    <svg class="absolute left-3.5 top-3.5 h-4 w-4 text-[#555555]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Grille Complète Responsive 4 Colonnes -->
        @if($teams->isEmpty())
            <div class="mx-auto max-w-md rounded-3xl bg-[#FAF4EF] border border-[#F4E6D9] p-10 text-center shadow-xs">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-[#F5791F] shadow-2xs">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="mt-5 text-lg font-bold text-[#1A1A1A]">Profils en cours de publication</h3>
                <p class="mt-2 text-xs sm:text-sm text-[#555555]">
                    L'équipe AllSmart se structure et s'enrichit continuellement. Les fiches collaborateurs seront très bientôt en ligne.
                </p>
                <div class="mt-6">
                    <a href="/contact" class="inline-flex items-center gap-2 rounded-xl bg-[#F5791F] px-5 py-2.5 text-xs font-bold text-white hover:bg-[#d96716] transition-colors">
                        Nous contacter
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8">
                @foreach($teams as $member)
                    <div x-show="matches('{{ addslashes(strip_tags($member->name)) }}', '{{ addslashes($member->role ?? '') }}')"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="group flex flex-col rounded-3xl bg-white border border-[#E5E7EB] hover:border-[#F5791F]/40 overflow-hidden shadow-xs hover:shadow-md transition-colors duration-200">
                        
                        <!-- Photo du collaborateur -->
                        <div class="relative aspect-[3/4] w-full overflow-hidden bg-[#FAF4EF]">
                            <img src="{{ $member->photo_url }}" 
                                 alt="{{ strip_tags($member->name) }}" 
                                 loading="lazy"
                                 class="h-full w-full object-cover object-top">
                        </div>

                        <!-- Cartouche d'informations -->
                        <div class="p-6 flex flex-1 flex-col justify-between space-y-4">
                            <div>
                                @if($member->role)
                                    <span class="inline-flex items-center rounded-full bg-[#FAF4EF] px-3 py-1 text-[11px] font-bold text-[#F5791F] border border-[#F4E6D9] w-fit mb-2.5">
                                        {{ $member->role }}
                                    </span>
                                @endif

                                <h3 class="text-xl font-black text-[#1A1A1A] leading-snug">
                                    {!! $member->name !!}
                                </h3>

                                @if($member->label)
                                    <p class="mt-1 font-['Zeyada'] text-xl text-[#555555]">
                                        {{ $member->label }}
                                    </p>
                                @endif
                            </div>

                            <!-- Réseaux sociaux du membre -->
                            @if($member->instagram_url || $member->facebook_url || $member->x_url || $member->linkedin_url)
                                <div class="pt-4 border-t border-[#E5E7EB] flex items-center justify-end gap-2">
                                    @if($member->linkedin_url)
                                        <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn de {{ strip_tags($member->name) }}"
                                           class="flex h-7 w-7 items-center justify-center rounded-full border border-[#E5E7EB] bg-white text-[#555555] hover:text-[#F5791F] hover:border-[#F5791F] transition-colors">
                                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.64 1.64 0 0 0 1.64-1.64 1.64 1.64 0 1 0-3.28 0 1.64 1.64 0 0 0 1.64 1.64m1.39 9.74v-8.37H5.07v8.37h2.78Z"/>
                                            </svg>
                                        </a>
                                    @endif

                                    @if($member->instagram_url)
                                        <a href="{{ $member->instagram_url }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram de {{ strip_tags($member->name) }}"
                                           class="flex h-7 w-7 items-center justify-center rounded-full border border-[#E5E7EB] bg-white text-[#555555] hover:text-[#F5791F] hover:border-[#F5791F] transition-colors">
                                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <rect x="3" y="3" width="18" height="18" rx="5"></rect>
                                                <circle cx="12" cy="12" r="4"></circle>
                                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor"></circle>
                                            </svg>
                                        </a>
                                    @endif

                                    @if($member->facebook_url)
                                        <a href="{{ $member->facebook_url }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook de {{ strip_tags($member->name) }}"
                                           class="flex h-7 w-7 items-center justify-center rounded-full border border-[#E5E7EB] bg-white text-[#555555] hover:text-[#F5791F] hover:border-[#F5791F] transition-colors">
                                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.5 21v-8h2.7l.4-3h-3.1V7.5c0-.9.3-1.5 1.6-1.5H17V3.1c-.3 0-1.3-.1-2.5-.1-2.5 0-4.1 1.5-4.1 4.3V10H8v3h2.4v8h3.1Z"/>
                                            </svg>
                                        </a>
                                    @endif

                                    @if($member->x_url)
                                        <a href="{{ $member->x_url }}" target="_blank" rel="noopener noreferrer" aria-label="X de {{ strip_tags($member->name) }}"
                                           class="flex h-7 w-7 items-center justify-center rounded-full border border-[#E5E7EB] bg-white text-[#555555] hover:text-[#F5791F] hover:border-[#F5791F] transition-colors">
                                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M18.9 2h3.4l-7.4 8.5L22.6 22h-6.8l-5.3-7.8L4 22H.6l7.9-9L1.2 2h7l4.8 7.1L18.9 2Zm-1.2 18h1.9L7.1 3.9H5.1L17.7 20Z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            @endif

                        </div>

                    </div>
                @endforeach
            </div>
        @endif

        <!-- Encart RH & Recrutement -->
        <div class="mt-20 rounded-3xl bg-[#FAF4EF] border border-[#F4E6D9] p-8 sm:p-12 text-center max-w-4xl mx-auto shadow-xs">
            <span class="font-zeyada text-3xl sm:text-4xl text-[#F5791F] block mb-1">
                Grandir ensemble
            </span>
            <h3 class="text-2xl sm:text-3xl font-black text-[#1A1A1A] tracking-tight">
                Envie de rejoindre la Smart Team ?
            </h3>
            <p class="mt-3 text-xs sm:text-sm text-[#555555] max-w-xl mx-auto leading-relaxed">
                AllSmart recherche continuellement des talents passionnés : stratèges, créateurs de contenus, développeurs ou coordinateurs événementiels. Participez à des projets d'envergure.
            </p>
            <div class="mt-6 flex flex-wrap items-center justify-center gap-4">
                <a href="/rejoindre-le-reseau" 
                   class="inline-flex items-center gap-2 rounded-xl bg-[#F5791F] px-6 py-3 text-xs sm:text-sm font-bold text-white shadow-sm hover:bg-[#d96716] transition-colors">
                    <span>Rejoindre notre réseau de talents</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
                <a href="/contact" 
                   class="inline-flex items-center gap-2 rounded-xl border border-[#E5E7EB] bg-white px-6 py-3 text-xs sm:text-sm font-bold text-[#1A1A1A] hover:bg-slate-50 transition-colors">
                    Nous contacter
                </a>
            </div>
        </div>

    </div>
</section>

<!-- Section Appel à l'Action Final -->
<x-homepage.cta />

@endsection
