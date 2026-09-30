@props(['teams' => null])

@php
    $teamMembers = $teams ?? \App\Models\Team::query()->active()->ordered()->get();
@endphp

<!-- Section 1 : Le Manifeste & Positionnement de l'Agence -->
<section class="py-16 sm:py-20 lg:py-24 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <!-- Colonne Gauche : Récit & Vision -->
            <div class="lg:col-span-7 space-y-6">
                <div>
                    <span class="font-zeyada text-3xl sm:text-4xl text-[#F5791F] block mb-1">
                        Notre Vision & ADN
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#1A1A1A] tracking-tight leading-tight">
                        Combler le fossé entre la rigueur du conseil et la force de la création.
                    </h2>
                </div>

                <div class="space-y-4 text-sm sm:text-base text-[#555555] leading-relaxed">
                    <p>
                        <strong class="text-[#1A1A1A]">AllSmart Consulting</strong> est née d'une conviction fondamentale : une stratégie sans créativité reste invisible, et une créativité sans stratégie reste stérile. Dans un univers digital saturé, les marques et les personnalités publiques ont besoin d'une voix singulière pour émerger et s'imposer.
                    </p>
                    <p>
                        Notre agence combine le diagnostic méthodique d'un cabinet de conseil, le sens esthétique d'un studio créatif et l'énergie pragmatique des activations événementielles. Nous pensons votre image comme un actif stratégique générateur de valeur durable.
                    </p>
                </div>

                <div class="pt-2">
                    <a href="/rendez-vous" class="inline-flex items-center gap-2 rounded-xl bg-[#1A1A1A] px-6 py-3 text-xs sm:text-sm font-bold text-white hover:bg-[#F5791F] transition-colors shadow-sm">
                        <span>Échanger avec notre direction</span>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Colonne Droite : 3 Cartes de Chiffres Clés -->
            <div class="lg:col-span-5 space-y-4 sm:space-y-5">
                <div class="rounded-2xl border border-[#F4E6D9] bg-[#FAF4EF] p-6 sm:p-7 shadow-xs">
                    <span class="block text-4xl sm:text-5xl font-black text-[#F5791F]">360°</span>
                    <h3 class="mt-2 text-base font-bold text-[#1A1A1A]">Approche Intégrée</h3>
                    <p class="mt-1 text-xs text-[#555555] leading-relaxed">
                        De la réflexion stratégique jusqu'au déploiement opérationnel sur le terrain et en ligne.
                    </p>
                </div>

                <div class="rounded-2xl border border-[#F4E6D9] bg-[#FAF4EF] p-6 sm:p-7 shadow-xs">
                    <span class="block text-4xl sm:text-5xl font-black text-[#F5791F]">+100</span>
                    <h3 class="mt-2 text-base font-bold text-[#1A1A1A]">Projets & Événements</h3>
                    <p class="mt-1 text-xs text-[#555555] leading-relaxed">
                        Campagnes digitales, tournois nationaux, identités visuelles et stratégies d'influence menés à bien.
                    </p>
                </div>

                <div class="rounded-2xl border border-[#F4E6D9] bg-[#FAF4EF] p-6 sm:p-7 shadow-xs">
                    <span class="block text-4xl sm:text-5xl font-black text-[#F5791F]">7</span>
                    <h3 class="mt-2 text-base font-bold text-[#1A1A1A]">Pôles d'Expertise Métier</h3>
                    <p class="mt-1 text-xs text-[#555555] leading-relaxed">
                        Conseil, Community Management, Contenus, Personal Branding, Web, Événementiel et Influence.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Section 2 : Notre Méthode en 4 Étapes -->
<section class="py-16 sm:py-20 lg:py-24 bg-[#FAF4EF]/50 border-y border-[#F4E6D9]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <!-- En-tête de section -->
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
            <span class="font-zeyada text-3xl sm:text-4xl text-[#F5791F] block mb-1">
                Une démarche éprouvée
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#1A1A1A] tracking-tight">
                Notre Méthode en 4 Étapes
            </h2>
            <p class="mt-3 sm:mt-4 text-xs sm:text-sm text-[#555555] leading-relaxed">
                Chaque mission suit un processus rigoureux et agile pour garantir une visibilité optimale et un retour sur investissement tangible.
            </p>
        </div>

        <!-- Grille des 4 étapes méthodologiques -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Étape 1 -->
            <div class="rounded-2xl bg-white p-6 sm:p-7 border border-[#E5E7EB] shadow-xs flex flex-col justify-between">
                <div>
                    <span class="text-3xl font-black text-[#F5791F] block mb-3">01.</span>
                    <h3 class="text-lg font-bold text-[#1A1A1A] mb-2">Immersion & Audit</h3>
                    <p class="text-xs sm:text-sm text-[#555555] leading-relaxed">
                        Analyse approfondie de votre historique, benchmark sectoriel et identification précise de vos leviers de différenciation.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-[11px] font-bold text-[#F5791F]">
                    <span>Phase Diagnostic</span>
                </div>
            </div>

            <!-- Étape 2 -->
            <div class="rounded-2xl bg-white p-6 sm:p-7 border border-[#E5E7EB] shadow-xs flex flex-col justify-between">
                <div>
                    <span class="text-3xl font-black text-[#F5791F] block mb-3">02.</span>
                    <h3 class="text-lg font-bold text-[#1A1A1A] mb-2">Conception Stratégique</h3>
                    <p class="text-xs sm:text-sm text-[#555555] leading-relaxed">
                        Définition du positionnement, de la ligne éditoriale, des messages clés et de la feuille de route opérationnelle.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-[11px] font-bold text-[#F5791F]">
                    <span>Phase Architecture</span>
                </div>
            </div>

            <!-- Étape 3 -->
            <div class="rounded-2xl bg-white p-6 sm:p-7 border border-[#E5E7EB] shadow-xs flex flex-col justify-between">
                <div>
                    <span class="text-3xl font-black text-[#F5791F] block mb-3">03.</span>
                    <h3 class="text-lg font-bold text-[#1A1A1A] mb-2">Production & Déploiement</h3>
                    <p class="text-xs sm:text-sm text-[#555555] leading-relaxed">
                        Création des contenus visuels, scénographie événementielle, développement web et activation médiatique multicanale.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-[11px] font-bold text-[#F5791F]">
                    <span>Phase Exécution</span>
                </div>
            </div>

            <!-- Étape 4 -->
            <div class="rounded-2xl bg-white p-6 sm:p-7 border border-[#E5E7EB] shadow-xs flex flex-col justify-between">
                <div>
                    <span class="text-3xl font-black text-[#F5791F] block mb-3">04.</span>
                    <h3 class="text-lg font-bold text-[#1A1A1A] mb-2">Mesure & Optimisation</h3>
                    <p class="text-xs sm:text-sm text-[#555555] leading-relaxed">
                        Suivi des KPIs, mesure de l'engagement réel, analyse des retombées et ajustements continus de la performance.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-[11px] font-bold text-[#F5791F]">
                    <span>Phase Pérennisation</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Section 3 : Nos 4 Valeurs Fondatrices -->
<section class="py-16 sm:py-20 lg:py-24 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <!-- En-tête de section -->
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
            <span class="font-zeyada text-3xl sm:text-4xl text-[#F5791F] block mb-1">
                Ce qui nous guide au quotidien
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#1A1A1A] tracking-tight">
                Nos 4 Piliers Fondateurs
            </h2>
            <p class="mt-3 sm:mt-4 text-xs sm:text-sm text-[#555555] leading-relaxed">
                Des principes cardinaux qui orientent chacune de nos recommandations et chacune de nos créations.
            </p>
        </div>

        <!-- Grille des 4 Valeurs -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
            
            <!-- Pilier 1 : Audace Créative -->
            <div class="rounded-3xl border border-[#E5E7EB] bg-white p-7 text-left shadow-xs hover:border-[#F5791F]/40 transition-colors">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#FAF4EF] text-[#F5791F] mb-5">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.516 0c.85.493 1.508 1.333 1.508 2.316V18"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-[#1A1A1A] mb-2">Audace Créative</h3>
                <p class="text-xs sm:text-sm text-[#555555] leading-relaxed">
                    Nous refusons les formules convenues. Nous créons des concepts percutants qui captent l'attention et impriment les esprits.
                </p>
            </div>

            <!-- Pilier 2 : Rigueur Exécutive -->
            <div class="rounded-3xl border border-[#E5E7EB] bg-white p-7 text-left shadow-xs hover:border-[#F5791F]/40 transition-colors">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#FAF4EF] text-[#F5791F] mb-5">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-[#1A1A1A] mb-2">Rigueur Exécutive</h3>
                <p class="text-xs sm:text-sm text-[#555555] leading-relaxed">
                    L'excellence se joue dans le détail : précision des plannings, finitions scénographiques et tenue irréprochable de chaque promesse.
                </p>
            </div>

            <!-- Pilier 3 : Proximité & Écoute -->
            <div class="rounded-3xl border border-[#E5E7EB] bg-white p-7 text-left shadow-xs hover:border-[#F5791F]/40 transition-colors">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#FAF4EF] text-[#F5791F] mb-5">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-[#1A1A1A] mb-2">Proximité Humaine</h3>
                <p class="text-xs sm:text-sm text-[#555555] leading-relaxed">
                    Nous bâtissons des partenariats de long terme fondés sur l'écoute active, la transparence et une disponibilité constante.
                </p>
            </div>

            <!-- Pilier 4 : Culture du Résultat -->
            <div class="rounded-3xl border border-[#E5E7EB] bg-white p-7 text-left shadow-xs hover:border-[#F5791F]/40 transition-colors">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#FAF4EF] text-[#F5791F] mb-5">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-[#1A1A1A] mb-2">Culture du Résultat</h3>
                <p class="text-xs sm:text-sm text-[#555555] leading-relaxed">
                    Chaque action doit générer un impact mesurable : progression de l'autorité, croissance d'audience et conversion business.
                </p>
            </div>

        </div>
    </div>
</section>

@if($teamMembers && $teamMembers->isNotEmpty())
{{-- Section 4 : Smart Team (Uniquement si des membres existent) --}}
@php
    $teaserMembers = $teamMembers->take(4);
@endphp
<section class="py-16 sm:py-20 lg:py-24 bg-[#FAF4EF]/40 border-t border-[#F4E6D9]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <!-- En-tête de section -->
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
            <span class="font-zeyada text-3xl sm:text-4xl text-[#F5791F] block mb-1">
                L'énergie créative
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#1A1A1A] tracking-tight">
                La Smart team
            </h2>
            <p class="mt-3 sm:mt-4 text-xs sm:text-sm text-[#555555] leading-relaxed">
                Des stratèges, créateurs de contenus et coordinateurs événementiels unis pour faire rayonner votre marque.
            </p>
        </div>

        <!-- Grille des 4 Collaborateurs Phares -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
            @foreach($teaserMembers as $member)
                <div class="group flex flex-col rounded-3xl bg-white border border-[#E5E7EB] hover:border-[#F5791F]/40 overflow-hidden shadow-xs hover:shadow-md transition-colors duration-200">
                    
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
                                        <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24">
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

        <!-- Bouton Vers la Page Équipe Dédiée -->
        <div class="mt-12 sm:mt-16 text-center">
            <a href="{{ route('team.index') }}" 
               class="inline-flex items-center gap-2.5 rounded-xl bg-[#1A1A1A] hover:bg-[#F5791F] px-8 py-4 text-xs sm:text-sm font-bold text-white transition-colors shadow-sm">
                <span>Découvrir toute la Smart Team ({{ $teamMembers->count() }} talents)</span>
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>

    </div>
</section>
@endif
