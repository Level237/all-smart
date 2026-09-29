@extends('layouts.main')

@section('title', "Marketing d'Influence - Allsmart")

@section('content')
    <!-- Hero Banner Image -->
    <section class="relative w-full overflow-hidden">
        <div class="relative h-[300px] sm:h-[420px] md:h-[520px] lg:h-[620px] w-full">
            <img src="{{ asset('assets/services/marketing-influence/hero.jpg') }}" 
                 alt="Marketing d'Influence - AllSmart" 
                 class="h-full w-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black/25 via-transparent to-black/10"></div>
        </div>
    </section>

    <!-- Section Présentation & CTAs -->
    <section class="bg-white py-12 sm:py-16 md:py-20">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            
            <!-- Sur-titre Catégorie -->
            <p class="text-2xl sm:text-3xl lg:text-4xl font-black tracking-tight text-[#F5791F] uppercase">
                MARKETING D'INFLUENCE
            </p>

            <!-- Numéro / Sous-titre -->
            <h2 class="mt-2 text-xl sm:text-2xl lg:text-3xl font-semibold text-[#F5791F]">
                1 — Héro
            </h2>

            <!-- Titre d'accroche -->
            <h1 class="mt-4 text-lg sm:text-xl lg:text-2xl font-bold text-[#1A1A1A] leading-snug">
                Votre marque, amplifiée par les bonnes voix.
            </h1>

            <!-- Paragraphe descriptif -->
            <p class="mt-4 text-base sm:text-lg text-gray-700 leading-relaxed max-w-3xl">
                Nous connectons les marques aux créateurs qui partagent les mêmes valeurs, les mêmes audiences et les mêmes ambitions pour transformer l'influence en véritable levier de visibilité, d'engagement et de croissance.
            </p>

            <!-- Double Call to Action -->
            <div class="mt-8 flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                
                <!-- Bouton 1 : Voir nos influenceurs -->
                <a href="/influenceurs" 
                   class="inline-flex items-center justify-center gap-3.5 rounded-xl bg-[#F5791F] px-6 py-4 text-base font-bold text-white shadow-[0_12px_24px_rgba(245,121,31,0.3)] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#d6630f] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/30 sm:text-lg">
                    <!-- Icone User Circle -->
                    <svg class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0zM12 2a10 10 0 100 20 10 10 0 000-20z"/>
                    </svg>
                    <!-- Séparateur vertical -->
                    <span class="h-5 w-px bg-white/40"></span>
                    <span>Voir nos influenceurs</span>
                </a>

                <!-- Bouton 2 : Je suis créateur de contenus -->
                <a href="/createur-de-contenu" 
                   class="inline-flex items-center justify-center gap-3.5 rounded-xl bg-[#3D6B7A] px-6 py-4 text-base font-bold text-white shadow-[0_12px_24px_rgba(61,107,122,0.3)] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#325865] focus:outline-none focus:ring-4 focus:ring-[#3D6B7A]/30 sm:text-lg">
                    <!-- Icone User Plus -->
                    <svg class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    <!-- Séparateur vertical -->
                    <span class="h-5 w-px bg-white/40"></span>
                    <span>Je suis créateur de contenus</span>
                </a>
            </div>

            <!-- Punchline réassurance -->
            <p class="mt-8 text-base sm:text-lg font-medium text-gray-800">
                Des profils sélectionnés. Des collaborations ciblées. Des campagnes pensées pour générer de l'impact.
            </p>

        </div>
    </section>

    <!-- Section 2 — Notre réseau de créateurs -->
    <section id="influenceurs" class="bg-[#FDEBDD] py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            
            <!-- Numérotation & Titre -->
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold tracking-tight text-[#F5791F]">
                2 — Notre réseau de créateurs
            </h2>

            <!-- Titre d'accroche -->
            <h3 class="mt-3 text-lg sm:text-xl font-bold text-[#1A1A1A]">
                Les bonnes personnes pour faire entendre votre marque.
            </h3>

            <!-- Paragraphes explicatifs -->
            <div class="mt-4 space-y-3 max-w-4xl text-base sm:text-lg text-gray-700 leading-relaxed">
                <p>
                    Chaque communauté est différente. C'est pourquoi nous privilégions la pertinence plutôt que la simple taille d'audience.
                </p>
                <p>
                    Notre réseau réunit des créateurs de contenu aux univers, communautés et expertises variés, capables de porter votre message de manière naturelle et crédible auprès de leurs audiences.
                </p>
            </div>

            <!-- Grille / Carrousel des cartes créateurs -->
            <div class="mt-12">
                <div class="flex gap-5 overflow-x-auto pb-4 snap-x snap-mandatory sm:grid sm:grid-cols-2 lg:grid-cols-4 sm:overflow-visible no-scrollbar">
                    @php
                        $creators = [
                            [
                                'name' => 'Ivana Ononino',
                                'role' => 'Influenceur lifestyle',
                                'image' => 'assets/services/marketing-influence/profil.jpg',
                                'link' => '#',
                            ],
                            [
                                'name' => 'Ivana Ononino',
                                'role' => 'Influenceur lifestyle',
                                'image' => 'assets/services/marketing-influence/profil.jpg',
                                'link' => '#',
                            ],
                            [
                                'name' => 'Ivana Ononino',
                                'role' => 'Influenceur lifestyle',
                                'image' => 'assets/services/marketing-influence/profil.jpg',
                                'link' => '#',
                            ],
                            [
                                'name' => 'Ivana Ononino',
                                'role' => 'Influenceur lifestyle',
                                'image' => 'assets/services/marketing-influence/profil.jpg',
                                'link' => '#',
                            ],
                        ];
                    @endphp

                    @foreach($creators as $creator)
                        <div class="w-[75vw] max-w-[280px] flex-shrink-0 snap-center sm:w-auto sm:max-w-none sm:flex-shrink overflow-hidden rounded-[16px] bg-white shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                            <!-- Image Profil -->
                            <div class="relative h-[280px] sm:h-[300px] w-full overflow-hidden bg-gray-100">
                                <img src="{{ asset($creator['image']) }}" 
                                     alt="{{ $creator['name'] }}" 
                                     class="h-full w-full object-cover object-top transition-transform duration-500 hover:scale-105">
                            </div>

                            <!-- Bloc Bas Teal -->
                            <div class="bg-[#3D6B7A] p-4 text-white">
                                <h4 class="text-base sm:text-lg font-bold leading-tight">
                                    {{ $creator['name'] }}
                                </h4>
                                <p class="mt-0.5 text-xs text-white/80">
                                    {{ $creator['role'] }}
                                </p>
                                <div class="mt-2 text-right">
                                    <a href="{{ $creator['link'] }}" class="text-xs font-semibold text-[#F5791F] hover:underline">
                                        voir détails profil
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Bouton CTA final -->
            <div class="mt-12 flex justify-center">
                <a href="/influenceurs" 
                   class="inline-flex items-center justify-center rounded-xl bg-[#F5791F] px-8 py-3.5 text-base sm:text-lg font-bold text-white shadow-[0_10px_25px_rgba(245,121,31,0.3)] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#d6630f] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/30">
                    Voir tous nos influenceurs
                </a>
            </div>

        </div>
    </section>

    <!-- Section 3 — Pourquoi travailler avec le réseau d'AllSmart ? -->
    <section class="bg-white py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            
            <!-- Numérotation & Titre -->
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold tracking-tight text-[#F5791F]">
                2 — Pourquoi travailler avec le réseau d’AllSmart ?
            </h2>

            <!-- Titre d'accroche -->
            <h3 class="mt-4 text-xl sm:text-2xl font-bold text-[#1A1A1A]">
                Plus qu'un réseau
            </h3>

            <!-- Paragraphes explicatifs -->
            <div class="mt-4 space-y-4 text-base sm:text-lg text-gray-700 leading-relaxed">
                <p>
                    Nous ne cherchons pas simplement des influenceurs. Nous cherchons les bons profils pour votre marque.
                </p>
                <p>
                    Le nombre d'abonnés ne suffit pas à garantir l'efficacité d'une campagne. Nous analysons la pertinence du profil, son univers, son audience et sa capacité à porter votre message pour construire des collaborations cohérentes et performantes.
                </p>
            </div>

            <!-- Image de la section -->
            <div class="mt-10 overflow-hidden rounded-[20px] shadow-lg">
                <img src="{{ asset('assets/services/marketing-influence/influences-section.jpg') }}" 
                     alt="Créateurs de contenu AllSmart" 
                     class="h-full w-full object-cover">
            </div>

            <!-- Bloc 4 Avantages -->
            <div class="mt-14 sm:mt-16">
                <!-- Titre avantages -->
                <p class="text-xl sm:text-2xl font-bold text-[#F5791F]">
                    Quatre (04) avantages
                </p>

                <!-- Liste des 4 avantages -->
                <div class="mt-8 space-y-8">
                    <!-- Avantage 1 -->
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-[#1A1A1A]">
                            01 — Des profils pertinents
                        </h4>
                        <p class="mt-2 text-base sm:text-lg text-gray-700 leading-relaxed">
                            Nous identifions les créateurs dont l'univers et l'audience correspondent réellement à votre marque et à vos objectifs.
                        </p>
                    </div>

                    <!-- Avantage 2 -->
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-[#1A1A1A]">
                            02 — Un matching stratégique
                        </h4>
                        <p class="mt-2 text-base sm:text-lg text-gray-700 leading-relaxed">
                            Nous rapprochons chaque campagne des profils les plus adaptés à votre cible, votre message et votre budget.
                        </p>
                    </div>

                    <!-- Avantage 3 -->
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-[#1A1A1A]">
                            03 — Un accompagnement de bout en bout
                        </h4>
                        <p class="mt-2 text-base sm:text-lg text-gray-700 leading-relaxed">
                            De la sélection des créateurs au suivi de la campagne, AllSmart coordonne les différentes étapes pour vous faire gagner du temps.
                        </p>
                    </div>

                    <!-- Avantage 4 -->
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-[#1A1A1A]">
                            04 — Des résultats mesurables
                        </h4>
                        <p class="mt-2 text-base sm:text-lg text-gray-700 leading-relaxed">
                            Nous suivons les performances des campagnes afin de mesurer leur portée, leur engagement et leur impact.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Section 4 — CTA Final : Vous êtes une marque ? -->
    <section class="w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <!-- Colonne Gauche : Image -->
            <div class="relative min-h-[340px] sm:min-h-[420px] lg:min-h-[520px] w-full">
                <img src="{{ asset('assets/services/marketing-influence/influences-section1.jpg') }}" 
                     alt="Collaboration de marque AllSmart" 
                     class="h-full w-full object-cover object-center">
            </div>

            <!-- Colonne Droite : Bloc Orange #F5791F -->
            <div class="flex flex-col justify-center bg-[#F5791F] px-6 py-12 sm:px-12 sm:py-16 md:px-16 md:py-20 lg:p-24 text-white">
                <div class="max-w-xl">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight text-white leading-tight">
                        VOUS ÊTES UNE MARQUE ?
                    </h2>

                    <p class="mt-4 text-base sm:text-lg lg:text-xl font-medium text-white/95 leading-relaxed">
                        Créer de l'attention autour d'un nouveau produit, service ou événement avec notre sélection premium d’influenceurs
                    </p>

                    <div class="mt-8 sm:mt-10">
                        <a href="/rendez-vous" 
                           class="inline-flex items-center justify-center rounded-xl bg-white px-8 py-4 text-base sm:text-lg font-bold text-[#F5791F] shadow-lg transition-all duration-300 hover:bg-white/95 hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-white/40">
                            Créer votre campagne d’influence
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
