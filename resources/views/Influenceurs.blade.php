@extends('layouts.main')

@section('title', "Notre Réseau de Créateurs - Allsmart")

@section('content')
    <!-- Hero Banner Image -->
    <section class="relative w-full overflow-hidden">
        <div class="relative h-[240px] sm:h-[320px] md:h-[400px] lg:h-[480px] w-full">
            <img src="{{ asset('assets/services/marketing-influence/hero-influence.jpg') }}" 
                 alt="Notre Réseau de Créateurs - AllSmart" 
                 class="h-full w-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-black/10"></div>
        </div>
    </section>

    @php
        $creators = [
            [
                'id' => 1,
                'name' => 'Ivana Ononino',
                'role' => 'Influenceur lifestyle',
                'category' => 'Lifestyle',
                'platform' => 'Instagram',
                'location' => 'Douala - Cameroun',
                'image' => 'assets/services/marketing-influence/profil.jpg',
                'tags' => ['Lifestyle', 'Beauté', 'Mode', 'Entrepreneuriat'],
                'followers' => '+350k',
                'audience' => '+150k',
                'engagement' => '75,5%',
                'bio' => "Créatrice de contenu passionnée basée à Douala, spécialisée dans l'univers du lifestyle, de la mode africaine et de l'entrepreneuriat féminin. Forte d'une communauté active et engagée à travers le Cameroun et l'Afrique centrale.",
                'socials' => [
                    'instagram' => '@ivana_ononino',
                    'tiktok' => '@ivana.officiel',
                    'youtube' => 'Ivana Ononino',
                    'linkedin' => 'Ivana Ononino'
                ]
            ],
            [
                'id' => 2,
                'name' => 'Ivana Ononino',
                'role' => 'Influenceur lifestyle',
                'category' => 'Lifestyle',
                'platform' => 'TikTok',
                'location' => 'Yaoundé - Cameroun',
                'image' => 'assets/services/marketing-influence/profil.jpg',
                'tags' => ['TikTok Viral', 'Trendsetter', 'Lifestyle', 'Danse'],
                'followers' => '+420k',
                'audience' => '+180k',
                'engagement' => '82,0%',
                'bio' => "Créatrice dynamique et spontanée, référence des tendances TikTok et des formats courts à fort taux de partage auprès de la Gen-Z.",
                'socials' => [
                    'instagram' => '@ivana_ononino',
                    'tiktok' => '@ivana.officiel',
                    'youtube' => 'Ivana Ononino',
                    'linkedin' => 'Ivana Ononino'
                ]
            ],
            [
                'id' => 3,
                'name' => 'Ivana Ononino',
                'role' => 'Influenceur lifestyle',
                'category' => 'Mode & Beauté',
                'platform' => 'Instagram',
                'location' => 'Douala - Cameroun',
                'image' => 'assets/services/marketing-influence/profil.jpg',
                'tags' => ['Haute Couture', 'Skin Care', 'Beauté Noire', 'Style'],
                'followers' => '+280k',
                'audience' => '+120k',
                'engagement' => '68,4%',
                'bio' => "Ambassadrice de la beauté naturelle et du chic urbain, elle collabore régulièrement avec les plus grandes maisons de mode et marques cosmétiques.",
                'socials' => [
                    'instagram' => '@ivana_ononino',
                    'tiktok' => '@ivana.officiel',
                    'youtube' => 'Ivana Ononino',
                    'linkedin' => 'Ivana Ononino'
                ]
            ],
            [
                'id' => 4,
                'name' => 'Ivana Ononino',
                'role' => 'Influenceur lifestyle',
                'category' => 'Lifestyle',
                'platform' => 'YouTube',
                'location' => 'Douala - Cameroun',
                'image' => 'assets/services/marketing-influence/profil.jpg',
                'tags' => ['Vlog', 'Voyage', 'Lifestyle', 'Docu-série'],
                'followers' => '+190k',
                'audience' => '+95k',
                'engagement' => '64,2%',
                'bio' => "Des formats longs immersifs, vlogs lifestyle de qualité cinématographique et récits inspirants explorant le quotidien et les voyages.",
                'socials' => [
                    'instagram' => '@ivana_ononino',
                    'tiktok' => '@ivana.officiel',
                    'youtube' => 'Ivana Ononino',
                    'linkedin' => 'Ivana Ononino'
                ]
            ],
            [
                'id' => 5,
                'name' => 'Ivana Ononino',
                'role' => 'Influenceur lifestyle',
                'category' => 'Humour & Divertissement',
                'platform' => 'TikTok',
                'location' => 'Douala - Cameroun',
                'image' => 'assets/services/marketing-influence/profil.jpg',
                'tags' => ['Humour', 'Sketch', 'Comédie', 'Divertissement'],
                'followers' => '+510k',
                'audience' => '+260k',
                'engagement' => '88,3%',
                'bio' => "Créatrice d’ambiance et d’histoires courtes humoristiques, connectée au quotidien des jeunes actifs avec un ton chaleureux et fédérateur.",
                'socials' => [
                    'instagram' => '@ivana_ononino',
                    'tiktok' => '@ivana.officiel',
                    'youtube' => 'Ivana Ononino',
                    'linkedin' => 'Ivana Ononino'
                ]
            ],
            [
                'id' => 6,
                'name' => 'Ivana Ononino',
                'role' => 'Influenceur lifestyle',
                'category' => 'Lifestyle',
                'platform' => 'Instagram',
                'location' => 'Douala - Cameroun',
                'image' => 'assets/services/marketing-influence/profil.jpg',
                'tags' => ['Wellness', 'Fitness', 'Routine Saine', 'Inspiration'],
                'followers' => '+310k',
                'audience' => '+140k',
                'engagement' => '71,9%',
                'bio' => "Partage au quotidien ses routines bien-être, conseils équilibre et motivation positive pour une communauté active.",
                'socials' => [
                    'instagram' => '@ivana_ononino',
                    'tiktok' => '@ivana.officiel',
                    'youtube' => 'Ivana Ononino',
                    'linkedin' => 'Ivana Ononino'
                ]
            ],
            [
                'id' => 7,
                'name' => 'Ivana Ononino',
                'role' => 'Influenceur lifestyle',
                'category' => 'Tech & Gaming',
                'platform' => 'YouTube',
                'location' => 'Douala - Cameroun',
                'image' => 'assets/services/marketing-influence/profil.jpg',
                'tags' => ['Tech Reviews', 'Gadgets', 'Gaming', 'Innovation'],
                'followers' => '+165k',
                'audience' => '+80k',
                'engagement' => '62,5%',
                'bio' => "Tests de smartphones, innovations technologiques et conseils d'équipements pour créateurs et passionnés du digital.",
                'socials' => [
                    'instagram' => '@ivana_ononino',
                    'tiktok' => '@ivana.officiel',
                    'youtube' => 'Ivana Ononino',
                    'linkedin' => 'Ivana Ononino'
                ]
            ],
            [
                'id' => 8,
                'name' => 'Ivana Ononino',
                'role' => 'Influenceur lifestyle',
                'category' => 'Lifestyle',
                'platform' => 'TikTok',
                'location' => 'Yaoundé - Cameroun',
                'image' => 'assets/services/marketing-influence/profil.jpg',
                'tags' => ['Lifestyle', 'DIY', 'Astuces', 'Inspiration'],
                'followers' => '+390k',
                'audience' => '+160k',
                'engagement' => '79,1%',
                'bio' => "Astuces créatives du quotidien, organisation personnelle et inspirations modernes en formats courts captivants.",
                'socials' => [
                    'instagram' => '@ivana_ononino',
                    'tiktok' => '@ivana.officiel',
                    'youtube' => 'Ivana Ononino',
                    'linkedin' => 'Ivana Ononino'
                ]
            ],
            [
                'id' => 9,
                'name' => 'Ivana Ononino',
                'role' => 'Influenceur lifestyle',
                'category' => 'Business & Finance',
                'platform' => 'LinkedIn',
                'location' => 'Douala - Cameroun',
                'image' => 'assets/services/marketing-influence/profil.jpg',
                'tags' => ['Entrepreneuriat', 'Leadership', 'Networking', 'B2B'],
                'followers' => '+85k',
                'audience' => '+55k',
                'engagement' => '58,7%',
                'bio' => "Prise de parole d'expertise, réflexions sur les écosystèmes entrepreneuriaux africains et conseils stratégiques de marque.",
                'socials' => [
                    'instagram' => '@ivana_ononino',
                    'tiktok' => '@ivana.officiel',
                    'youtube' => 'Ivana Ononino',
                    'linkedin' => 'Ivana Ononino'
                ]
            ],
            [
                'id' => 10,
                'name' => 'Ivana Ononino',
                'role' => 'Influenceur lifestyle',
                'category' => 'Lifestyle',
                'platform' => 'Instagram',
                'location' => 'Douala - Cameroun',
                'image' => 'assets/services/marketing-influence/profil.jpg',
                'tags' => ['Décoration', 'Design Intérieur', 'Lifestyle', 'Moodboard'],
                'followers' => '+295k',
                'audience' => '+135k',
                'engagement' => '73,2%',
                'bio' => "Sens aigu de l'esthétique, aménagement d'espaces inspirants et mise en valeur des savoir-faire artisanaux et contemporains.",
                'socials' => [
                    'instagram' => '@ivana_ononino',
                    'tiktok' => '@ivana.officiel',
                    'youtube' => 'Ivana Ononino',
                    'linkedin' => 'Ivana Ononino'
                ]
            ],
            [
                'id' => 11,
                'name' => 'Ivana Ononino',
                'role' => 'Influenceur lifestyle',
                'category' => 'Food & Gastronomie',
                'platform' => 'TikTok',
                'location' => 'Douala - Cameroun',
                'image' => 'assets/services/marketing-influence/profil.jpg',
                'tags' => ['Fooding', 'Cuisine Africaine', 'Recettes', 'Gourmet'],
                'followers' => '+440k',
                'audience' => '+190k',
                'engagement' => '84,6%',
                'bio' => "Exploration culinaire, valorisation des saveurs locales revisitées et découvertes des meilleures adresses gourmandes.",
                'socials' => [
                    'instagram' => '@ivana_ononino',
                    'tiktok' => '@ivana.officiel',
                    'youtube' => 'Ivana Ononino',
                    'linkedin' => 'Ivana Ononino'
                ]
            ],
            [
                'id' => 12,
                'name' => 'Ivana Ononino',
                'role' => 'Influenceur lifestyle',
                'category' => 'Lifestyle',
                'platform' => 'Instagram',
                'location' => 'Douala - Cameroun',
                'image' => 'assets/services/marketing-influence/profil.jpg',
                'tags' => ['Mode Durable', 'Accessoires', 'Tendances', 'Culture'],
                'followers' => '+350k',
                'audience' => '+150k',
                'engagement' => '75,5%',
                'bio' => "Créatrice de contenu passionnée basée à Douala, spécialisée dans l'univers du lifestyle, de la mode africaine et de l'entrepreneuriat féminin.",
                'socials' => [
                    'instagram' => '@ivana_ononino',
                    'tiktok' => '@ivana.officiel',
                    'youtube' => 'Ivana Ononino',
                    'linkedin' => 'Ivana Ononino'
                ]
            ],
        ];

        $categories = [
            'Toutes les catégories',
            'Lifestyle',
            'Mode & Beauté',
            'Tech & Gaming',
            'Humour & Divertissement',
            'Business & Finance',
            'Food & Gastronomie'
        ];

        $platforms = [
            'Toutes les plateformes',
            'Instagram',
            'TikTok',
            'YouTube',
            'LinkedIn',
            'Facebook'
        ];
    @endphp

    <!-- Section Catalogue avec Filtres Interactifs & Modal Profil -->
    <section class="bg-white py-12 sm:py-16 md:py-20 relative" 
             x-data="{
                search: '',
                category: 'all',
                platform: 'all',
                catOpen: false,
                platOpen: false,
                selectedCreator: null,
                openModal(creator) {
                    this.selectedCreator = creator;
                    document.body.classList.add('overflow-hidden');
                },
                closeModal() {
                    this.selectedCreator = null;
                    document.body.classList.remove('overflow-hidden');
                },
                creators: {{ json_encode($creators) }},
                get filteredCreators() {
                    return this.creators.filter(c => {
                        const matchesSearch = this.search === '' || 
                            c.name.toLowerCase().includes(this.search.toLowerCase()) || 
                            c.role.toLowerCase().includes(this.search.toLowerCase()) ||
                            c.category.toLowerCase().includes(this.search.toLowerCase());
                        const matchesCat = this.category === 'all' || c.category.toLowerCase() === this.category.toLowerCase();
                        const matchesPlat = this.platform === 'all' || c.platform.toLowerCase() === this.platform.toLowerCase();
                        return matchesSearch && matchesCat && matchesPlat;
                    });
                }
             }"
             @keydown.escape.window="closeModal()">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <!-- Titre Principal -->
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black uppercase tracking-tight text-[#F5791F]">
                    NOTRE RESEAU DE CREATEURS
                </h1>
            </div>

            <!-- Barre de Recherche & Filtres -->
            <div class="mt-8 sm:mt-12 flex flex-col md:flex-row items-stretch md:items-center justify-center gap-3.5 sm:gap-4 max-w-4xl mx-auto">
                
                <!-- Champ Recherche -->
                <div class="relative flex-1">
                    <input type="text" 
                           x-model="search"
                           placeholder="Recherche....." 
                           class="w-full rounded-[10px] border border-gray-400/80 bg-white px-4 py-3 pr-11 text-base text-gray-800 placeholder-gray-500 shadow-sm transition-all focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20">
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3.5 text-gray-500">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <!-- Dropdown Catégories -->
                <div class="relative" @click.away="catOpen = false">
                    <button type="button" 
                            @click="catOpen = !catOpen; platOpen = false"
                            class="flex w-full md:w-auto items-center justify-between gap-3 rounded-[10px] border border-gray-400/80 bg-white px-5 py-3 text-base font-medium text-gray-800 shadow-sm transition-all hover:bg-gray-50 focus:border-[#F5791F] focus:outline-none">
                        <span x-text="category === 'all' ? 'Catégories' : category">Catégories</span>
                        <svg class="h-4 w-4 text-gray-600 transition-transform duration-200" :class="{ 'rotate-90': catOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <!-- Menu Catégories -->
                    <div x-show="catOpen" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute left-0 mt-2 z-30 w-56 rounded-xl border border-gray-200 bg-white py-2 shadow-xl">
                        <button type="button" 
                                @click="category = 'all'; catOpen = false"
                                class="w-full px-4 py-2 text-left text-sm hover:bg-gray-100 transition-colors"
                                :class="{ 'text-[#F5791F] font-bold': category === 'all' }">
                            Toutes les catégories
                        </button>
                        @foreach($categories as $cat)
                            @if($cat !== 'Toutes les catégories')
                                <button type="button" 
                                        @click="category = '{{ $cat }}'; catOpen = false"
                                        class="w-full px-4 py-2 text-left text-sm hover:bg-gray-100 transition-colors"
                                        :class="{ 'text-[#F5791F] font-bold': category === '{{ $cat }}' }">
                                    {{ $cat }}
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Dropdown Plateformes -->
                <div class="relative" @click.away="platOpen = false">
                    <button type="button" 
                            @click="platOpen = !platOpen; catOpen = false"
                            class="flex w-full md:w-auto items-center justify-between gap-3 rounded-[10px] border border-gray-400/80 bg-white px-5 py-3 text-base font-medium text-gray-800 shadow-sm transition-all hover:bg-gray-50 focus:border-[#F5791F] focus:outline-none">
                        <span x-text="platform === 'all' ? 'Plateformes' : platform">Plateformes</span>
                        <svg class="h-4 w-4 text-gray-600 transition-transform duration-200" :class="{ 'rotate-90': platOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <!-- Menu Plateformes -->
                    <div x-show="platOpen" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute left-0 mt-2 z-30 w-56 rounded-xl border border-gray-200 bg-white py-2 shadow-xl">
                        <button type="button" 
                                @click="platform = 'all'; platOpen = false"
                                class="w-full px-4 py-2 text-left text-sm hover:bg-gray-100 transition-colors"
                                :class="{ 'text-[#F5791F] font-bold': platform === 'all' }">
                            Toutes les plateformes
                        </button>
                        @foreach($platforms as $plat)
                            @if($plat !== 'Toutes les plateformes')
                                <button type="button" 
                                        @click="platform = '{{ $plat }}'; platOpen = false"
                                        class="w-full px-4 py-2 text-left text-sm hover:bg-gray-100 transition-colors"
                                        :class="{ 'text-[#F5791F] font-bold': platform === '{{ $plat }}' }">
                                    {{ $plat }}
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Grille de Cartes Créateurs (12 profils) -->
            <div class="mt-12 sm:mt-16">
                <!-- Message si aucun résultat -->
                <div x-show="filteredCreators.length === 0" class="py-16 text-center text-gray-500">
                    <p class="text-xl font-medium">Aucun créateur ne correspond à votre recherche.</p>
                    <button type="button" 
                            @click="search = ''; category = 'all'; platform = 'all'" 
                            class="mt-4 font-bold text-[#F5791F] hover:underline">
                        Réinitialiser les filtres
                    </button>
                </div>

                <!-- Grille -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-7">
                    <template x-for="creator in filteredCreators" :key="creator.id">
                        <div class="group flex flex-col overflow-hidden rounded-[16px] bg-white shadow-[0_4px_20px_rgba(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_12px_30px_rgba(0,0,0,0.15)] cursor-pointer"
                             @click="openModal(creator)">
                            <!-- Image Profil -->
                            <div class="relative h-[290px] sm:h-[310px] w-full overflow-hidden bg-gray-100">
                                <img :src="'{{ asset('') }}' + creator.image" 
                                     :alt="creator.name" 
                                     class="h-full w-full object-cover object-top transition-transform duration-700 group-hover:scale-105">
                            </div>

                            <!-- Bloc Inférieur Teal -->
                            <div class="bg-[#3D6B7A] p-4 text-white">
                                <h2 class="text-base sm:text-lg font-bold leading-tight" x-text="creator.name"></h2>
                                <p class="mt-0.5 text-xs text-white/80" x-text="creator.role"></p>
                                
                                <div class="mt-2.5 flex items-center justify-between">
                                    <span class="inline-block rounded-full bg-white/15 px-2 py-0.5 text-[10px] font-medium text-white/90" x-text="creator.platform"></span>
                                    <button type="button"
                                            @click.stop="openModal(creator)"
                                            class="text-xs font-semibold text-[#F5791F] transition-colors hover:text-white hover:underline focus:outline-none">
                                        voir détails profil
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Pagination (Précédent / Suivant) -->
            <div class="mt-14 sm:mt-20 flex items-center justify-center gap-8 text-base font-semibold text-[#1A1A1A]">
                <button type="button" 
                        class="inline-flex items-center gap-2 transition-colors hover:text-[#F5791F] disabled:opacity-40 disabled:hover:text-inherit">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    <span>Précédent</span>
                </button>

                <button type="button" 
                        class="inline-flex items-center gap-2 transition-colors hover:text-[#F5791F]">
                    <span>Suivant</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Modal Profil Influenceur (Option A - Studio Unifié) -->
            <div x-cloak
                 x-show="selectedCreator" 
                 class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 overflow-y-auto"
                 role="dialog" 
                 aria-modal="true"
                 aria-labelledby="modal-creator-name">
                
                <!-- Backdrop / Fond flouté sombre -->
                <div x-show="selectedCreator"
                     x-transition:enter="transition-opacity ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition-opacity ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     @click="closeModal()" 
                     class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

                <!-- Boîte Modale -->
                <div x-show="selectedCreator"
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                     x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                     class="relative w-full max-w-2xl overflow-hidden rounded-[24px] bg-white shadow-2xl border border-gray-100 z-10 my-8">

                    <!-- Bouton Fermer (Croix en haut à droite) -->
                    <button type="button" 
                            @click="closeModal()"
                            aria-label="Fermer"
                            class="absolute top-4 right-4 z-20 flex h-10 w-10 items-center justify-center rounded-full bg-white/80 text-gray-700 shadow-md backdrop-blur transition-all hover:bg-white hover:text-black hover:scale-105 focus:outline-none">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <!-- En-tête : Couverture chaude & Avatar circulaire -->
                    <div class="relative bg-gradient-to-r from-[#FAF4EF] via-[#FDEBDD] to-[#FCEADE] px-6 pt-8 pb-6 sm:px-8 border-b border-[#F4E6D9]">
                        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-5">
                            <!-- Avatar -->
                            <div class="relative h-24 w-24 sm:h-28 sm:w-28 flex-shrink-0 overflow-hidden rounded-full border-4 border-white shadow-lg bg-gray-200">
                                <img :src="'{{ asset('') }}' + (selectedCreator ? selectedCreator.image : '')" 
                                     :alt="selectedCreator ? selectedCreator.name : ''" 
                                     class="h-full w-full object-cover object-top">
                            </div>

                            <!-- Nom & Localisation & Réseaux Sociaux -->
                            <div class="flex-1 text-center sm:text-left">
                                <div class="inline-flex items-center gap-2">
                                    <h2 id="modal-creator-name" 
                                        class="text-2xl sm:text-3xl font-black text-[#1A1A1A] tracking-tight uppercase"
                                        x-text="selectedCreator?.name"></h2>
                                    <!-- Badge Certifié Allsmart -->
                                    <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#F5791F] text-white shadow-sm" title="Créateur Partenaire AllSmart">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                                </div>

                                <p class="text-sm font-bold text-[#F5791F]" x-text="selectedCreator?.role"></p>
                                
                                <div class="mt-1.5 flex items-center justify-center sm:justify-start gap-1.5 text-xs text-gray-600 font-medium">
                                    <svg class="h-4 w-4 text-[#3D6B7A] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span x-text="selectedCreator?.location || 'Douala - Cameroun'"></span>
                                    <span class="mx-1 text-gray-300">•</span>
                                    <span class="font-semibold text-[#3D6B7A]" x-text="selectedCreator?.platform"></span>
                                </div>

                                <!-- Réseaux Sociaux (Icônes interactives) -->
                                <div class="mt-3.5 flex items-center justify-center sm:justify-start gap-2">
                                    <!-- Instagram -->
                                    <a href="#" class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-700 shadow-sm transition-transform hover:scale-110 hover:text-[#E4405F]" title="Instagram">
                                        <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </a>
                                    <!-- TikTok -->
                                    <a href="#" class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-700 shadow-sm transition-transform hover:scale-110 hover:text-black" title="TikTok">
                                        <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                                            <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.88 2.89 2.89 0 01-2.88-2.88 2.89 2.89 0 012.88-2.88c.28 0 .55.04.81.12v-3.53a6.36 6.36 0 00-.81-.05A6.33 6.33 0 003 15.67 6.33 6.33 0 009.34 22a6.33 6.33 0 006.33-6.33V9.17a8.28 8.28 0 004.92 1.6v-3.52c-.34 0-.68-.18-1-.56z"/>
                                        </svg>
                                    </a>
                                    <!-- YouTube -->
                                    <a href="#" class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-700 shadow-sm transition-transform hover:scale-110 hover:text-[#FF0000]" title="YouTube">
                                        <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                        </svg>
                                    </a>
                                    <!-- LinkedIn -->
                                    <a href="#" class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-700 shadow-sm transition-transform hover:scale-110 hover:text-[#0A66C2]" title="LinkedIn">
                                        <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Corps de la Modale -->
                    <div class="px-6 py-6 sm:px-8 space-y-6 max-h-[calc(85vh-220px)] overflow-y-auto">
                        
                        <!-- Tags / Thématiques -->
                        <div>
                            <div class="flex flex-wrap items-center gap-2">
                                <template x-for="tag in (selectedCreator ? selectedCreator.tags : [])" :key="tag">
                                    <span class="inline-flex items-center rounded-full bg-[#FAF4EF] px-3.5 py-1 text-xs font-bold text-[#3D6B7A] border border-[#3D6B7A]/20"
                                          x-text="tag"></span>
                                </template>
                            </div>
                        </div>

                        <!-- Bio / Description -->
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-gray-400">
                                À propos de l'influenceur
                            </h3>
                            <p class="mt-2 text-sm sm:text-base leading-relaxed text-gray-700" 
                               x-text="selectedCreator?.bio"></p>
                        </div>

                        <!-- 3 Statistiques Clés (Cartes KPI Horizontales) -->
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-3">
                                Métriques Clés & Performance
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5">
                                <!-- KPI 1 : Abonnés -->
                                <div class="rounded-2xl bg-[#FDEBDD]/50 border border-[#FDEBDD] p-4 text-center transition-all hover:bg-[#FDEBDD]/70">
                                    <span class="block text-2xl sm:text-3xl font-black text-[#F5791F]" x-text="selectedCreator?.followers || '+350k'"></span>
                                    <span class="mt-1 block text-xs font-bold uppercase tracking-wider text-gray-600">Abonnés Totaux</span>
                                </div>

                                <!-- KPI 2 : Audience Prioritaire -->
                                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-4 text-center transition-all hover:bg-slate-100/70">
                                    <span class="block text-2xl sm:text-3xl font-black text-[#3D6B7A]" x-text="selectedCreator?.audience || '+150k'"></span>
                                    <span class="mt-1 block text-xs font-bold uppercase tracking-wider text-gray-600">Audience Cible</span>
                                </div>

                                <!-- KPI 3 : Taux d'engagement -->
                                <div class="rounded-2xl bg-orange-50/60 border border-orange-200/60 p-4 text-center transition-all hover:bg-orange-100/50">
                                    <span class="block text-2xl sm:text-3xl font-black text-[#1A1A1A]" x-text="selectedCreator?.engagement || '75,5%'"></span>
                                    <span class="mt-1 block text-xs font-bold uppercase tracking-wider text-gray-600">Taux d'Engagement</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Footer d'Action -->
                    <div class="bg-gray-50 border-t border-gray-100 px-6 py-4 sm:px-8 sm:py-5 flex flex-col sm:flex-row items-center justify-between gap-3">
                        <p class="text-xs sm:text-sm text-gray-500 font-medium text-center sm:text-left">
                            Campagne sur-mesure disponible sous 48h
                        </p>

                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <button type="button" 
                                    @click="closeModal()" 
                                    class="hidden sm:inline-flex rounded-xl px-4 py-3 text-sm font-semibold text-gray-600 hover:text-gray-900 transition-colors">
                                Fermer
                            </button>
                            <a :href="'mailto:contact@allsmart-consulting.com?subject=' + encodeURIComponent('Demande de collaboration avec ' + (selectedCreator ? selectedCreator.name : ''))" 
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-[#F5791F] px-6 py-3.5 text-sm sm:text-base font-bold text-white shadow-lg shadow-[#F5791F]/25 hover:bg-[#d6630f] hover:scale-[1.02] transition-all">
                                <span>Contacter le profil</span>
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- Bannière Split : Vous êtes une marque ? -->
    <section class="bg-white py-12 sm:py-16 md:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[20px] shadow-xl border border-gray-100 grid grid-cols-1 lg:grid-cols-2">
                <!-- Colonne Gauche : Image -->
                <div class="relative min-h-[300px] sm:min-h-[360px] lg:min-h-[420px] w-full">
                    <img src="{{ asset('assets/services/marketing-influence/influences-section1.jpg') }}" 
                         alt="Sélection d'influenceurs AllSmart" 
                         class="h-full w-full object-cover object-center">
                </div>

                <!-- Colonne Droite : Bloc Orange #F5791F -->
                <div class="flex flex-col justify-center bg-[#F5791F] p-8 sm:p-10 md:p-12 lg:p-16 text-white">
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black uppercase tracking-tight text-white leading-tight">
                        VOUS ÊTES UNE MARQUE ?
                    </h2>

                    <p class="mt-4 text-sm sm:text-base lg:text-lg font-medium text-white/95 leading-relaxed">
                        Créer de l'attention autour d'un nouveau produit, service ou événement avec notre sélection premium d’influenceurs
                    </p>

                    <div class="mt-8">
                        <a href="#contact" 
                           class="inline-flex items-center justify-center rounded-xl bg-white px-7 py-3.5 text-base font-bold text-[#F5791F] shadow-md transition-all duration-300 hover:bg-white/95 hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-white/40">
                            Créer votre campagne d’influence
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section CTA Globale : Un projet? Discutons-en -->
    <section class="relative overflow-hidden w-full">
        <!-- Fond photo avec overlay -->
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('assets/cta.jpg') }}');"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#2a1d17]/85 via-[#3d271a]/70 to-[#2a1d17]/85"></div>

        <div class="relative z-10 mx-auto flex min-h-[320px] max-w-5xl flex-col items-center justify-center px-4 py-16 text-center text-white sm:min-h-[380px] sm:py-20 lg:min-h-[420px]">
            <p class="text-2xl sm:text-3xl font-light text-white">
                Un projet?
            </p>
            <h2 class="mt-1 text-4xl sm:text-5xl md:text-6xl font-black tracking-tight text-white">
                Discutons-en
            </h2>

            <div class="mt-8">
                <a href="#contact" 
                   class="inline-flex items-center justify-center rounded-xl bg-[#F5791F] px-10 py-4 text-lg font-bold text-white shadow-[0_14px_28px_rgba(245,121,31,0.35)] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#d6630f] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/30 sm:px-12 sm:text-xl">
                    Prendre rendez-vous
                </a>
            </div>
        </div>
    </section>
@endsection
