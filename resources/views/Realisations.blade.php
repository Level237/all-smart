@extends('layouts.main')

@section('title', 'Nos Réalisations - Allsmart Consulting')
@section('meta_description', 'Découvrez les réalisations, campagnes et projets d\'envergure menés par AllSmart Consulting : stratégie, branding, digital et événementiel.')

@section('content')

<!-- Hero Banner Réalisations -->
<section class="relative min-h-[460px] sm:min-h-[520px] lg:min-h-[580px] flex items-center justify-center overflow-hidden">
    <!-- Image de fond avec overlay -->
    <div class="absolute inset-0 h-full w-full">
        <img src="{{ asset('assets/slideabout.jpg') }}" 
             alt="Réalisations AllSmart" 
             class="h-full w-full object-cover object-center">
        <!-- Double gradient pour une lisibilité parfaite des textes blancs -->
        <div class="absolute inset-0 bg-black/55 backdrop-blur-[1px]"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent"></div>
    </div>

    <!-- Contenu Textuel du Hero -->
    <div class="relative z-10 mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 text-center pt-24 pb-16">
        <span class="font-zeyada text-4xl sm:text-5xl md:text-6xl text-[#F5791F] block mb-1">
            Impact & Créativité
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
            Des résultats concrets qui font rayonner nos marques
        </h1>
        <p class="mt-4 sm:mt-6 text-sm sm:text-base md:text-lg text-white/90 max-w-2xl mx-auto font-light leading-relaxed">
            Découvrez une sélection de nos plus belles collaborations : stratégies d'envergure, créations de contenus engageants, identités digitales et activations terrain.
        </p>
    </div>
</section>

<!-- Section Principale du Portfolio avec Filtrage & Modal Immersif -->
<section class="py-16 sm:py-20 lg:py-24 bg-[#FAF4EF]/40" 
         x-data="{ 
             activeTab: 'all',
             selectedProject: null,
             matches(service) {
                 return this.activeTab === 'all' || this.activeTab === service;
             },
             openModal(project) {
                 this.selectedProject = project;
                 document.body.classList.add('overflow-hidden');
             },
             closeModal() {
                 this.selectedProject = null;
                 document.body.classList.remove('overflow-hidden');
             }
         }"
         @keydown.escape.window="closeModal()">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <!-- Barre de Navigation des Filtres par Pôle -->
        <div class="mb-12 sm:mb-16">
            <div class="flex items-center gap-2 sm:gap-3 overflow-x-auto pb-4 pt-2 -mx-4 px-4 sm:mx-0 sm:px-0 sm:flex-wrap sm:justify-center no-scrollbar">
                
                <!-- Onglet Tous -->
                <button type="button"
                        @click="activeTab = 'all'"
                        :class="activeTab === 'all' 
                            ? 'bg-[#F5791F] text-white shadow-md font-bold border-[#F5791F]' 
                            : 'bg-[#FAF4EF] text-[#1A1A1A] border-[#F4E6D9] hover:bg-[#F5791F]/10 hover:text-[#F5791F] font-medium'"
                        class="shrink-0 rounded-full px-5 py-2.5 text-xs sm:text-sm border transition-colors duration-200 cursor-pointer">
                    Toutes nos réalisations
                </button>

                <!-- Onglets par Service / Pôle -->
                @foreach($services as $service)
                    <button type="button"
                            @click="activeTab = '{{ addslashes($service) }}'"
                            :class="activeTab === '{{ addslashes($service) }}' 
                                ? 'bg-[#F5791F] text-white shadow-md font-bold border-[#F5791F]' 
                                : 'bg-[#FAF4EF] text-[#1A1A1A] border-[#F4E6D9] hover:bg-[#F5791F]/10 hover:text-[#F5791F] font-medium'"
                            class="shrink-0 rounded-full px-5 py-2.5 text-xs sm:text-sm border transition-colors duration-200 cursor-pointer">
                        {{ $service }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Grille Responsive des Réalisations (Cartes Stables sans saut) -->
        @if($projects->isEmpty())
            <div class="mx-auto max-w-lg rounded-3xl bg-white border border-[#E5E7EB] p-10 text-center shadow-xs">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-[#FAF4EF] text-[#F5791F]">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="mt-5 text-lg font-bold text-[#1A1A1A]">Nouvelles études de cas à venir</h3>
                <p class="mt-2 text-xs sm:text-sm text-[#555555]">
                    Notre équipe documente actuellement nos dernières activations et réussites clients. Revenez très prochainement !
                </p>
                <div class="mt-6">
                    <a href="/rendez-vous" class="inline-flex items-center gap-2 rounded-xl bg-[#F5791F] px-5 py-2.5 text-xs font-bold text-white hover:bg-[#d96716] transition-colors">
                        Discuter de votre projet
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10">
                @foreach($projects as $project)
                    @php
                        $projectData = [
                            'id' => $project->id,
                            'title' => $project->title,
                            'client' => $project->client,
                            'service' => $project->service,
                            'challenge' => $project->challenge,
                            'description' => $project->description,
                            'metrics' => $project->metrics ?? [],
                            'deliverables' => $project->deliverables,
                            'image_url' => $project->image_url,
                            'link' => $project->link,
                            'is_featured' => $project->is_featured,
                        ];
                    @endphp

                    <article x-show="matches('{{ addslashes($project->service) }}')"
                             x-transition:enter="transition ease-out duration-200 transform"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             @click="openModal({{ json_encode($projectData) }})"
                             class="group flex flex-col rounded-3xl bg-white border border-[#E5E7EB] hover:border-[#F5791F]/40 overflow-hidden shadow-xs hover:shadow-md transition-colors duration-200 cursor-pointer">
                        
                        <!-- Conteneur Image Fixe sans Zoom Agressif -->
                        <div class="relative aspect-[4/3] w-full overflow-hidden bg-[#FAF4EF]">
                            <img src="{{ $project->image_url }}" 
                                 alt="{{ $project->title }}" 
                                 loading="lazy"
                                 class="h-full w-full object-cover">
                            
                            <!-- Badge du Service / Pôle -->
                            <div class="absolute top-4 left-4 z-10">
                                <span class="inline-flex items-center rounded-full bg-[#FAF4EF]/95 backdrop-blur-xs px-3 py-1 text-xs font-bold text-[#F5791F] border border-[#F4E6D9] shadow-xs">
                                    {{ $project->service }}
                                </span>
                            </div>

                            <!-- Badge Mis en Avant (si featured) -->
                            @if($project->is_featured)
                                <div class="absolute top-4 right-4 z-10">
                                    <span class="inline-flex items-center gap-1 rounded-full bg-[#F5791F] px-2.5 py-1 text-[11px] font-bold text-white shadow-xs uppercase tracking-wider">
                                        À la une
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Corps du Projet -->
                        <div class="flex flex-1 flex-col justify-between p-6 sm:p-7">
                            <div class="space-y-2.5">
                                @if($project->client)
                                    <span class="block text-[11px] font-bold uppercase tracking-wider text-[#555555]">
                                        {{ $project->client }}
                                    </span>
                                @endif

                                <h2 class="text-xl sm:text-2xl font-bold text-[#1A1A1A] group-hover:text-[#F5791F] transition-colors leading-snug">
                                    {!! $project->title !!}
                                </h2>

                                @if($project->challenge)
                                    <p class="text-xs sm:text-sm text-[#1A1A1A] font-medium leading-relaxed line-clamp-2">
                                        {{ $project->challenge }}
                                    </p>
                                @elseif($project->description)
                                    <p class="text-xs sm:text-sm text-[#555555] leading-relaxed line-clamp-2">
                                        {{ $project->description }}
                                    </p>
                                @endif
                            </div>

                            <!-- Pied de Carte : Appel à voir les détails -->
                            <div class="pt-5 mt-5 border-t border-[#E5E7EB] flex items-center justify-between text-xs">
                                <span class="inline-flex items-center gap-1.5 font-bold text-[#F5791F] group-hover:underline">
                                    <span>Explorer l'étude de cas</span>
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                    </svg>
                                </span>

                                @if($project->deliverables)
                                    <span class="text-[11px] font-medium text-[#555555] hidden sm:inline">
                                        Livrables inclus
                                    </span>
                                @endif
                            </div>
                        </div>

                    </article>
                @endforeach
            </div>
        @endif

    </div>

    <!-- MODAL IMMERSIF DE DÉTAIL DE LA RÉALISATION -->
    <div x-cloak
         x-show="selectedProject !== null"
         class="fixed inset-0 z-50 overflow-y-auto"
         role="dialog" 
         aria-modal="true">
        
        <!-- Backdrop avec estompement sombre -->
        <div x-show="selectedProject !== null"
             x-transition:enter="transition-opacity ease-linear duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="closeModal()"
             class="fixed inset-0 bg-black/70 backdrop-blur-xs"></div>

        <!-- Conteneur centré du panneau Modal -->
        <div class="flex min-h-full items-center justify-center p-3 sm:p-6 lg:p-8">
            <div x-show="selectedProject !== null"
                 x-transition:enter="transition ease-out duration-200 transform"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-150 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 @click.away="closeModal()"
                 class="relative w-full max-w-3xl rounded-3xl bg-white border border-[#E5E7EB] shadow-2xl overflow-hidden max-h-[92vh] flex flex-col">

                <!-- Bouton Fermer flottant -->
                <button type="button" 
                        @click="closeModal()"
                        class="absolute top-4 right-4 z-30 flex h-10 w-10 items-center justify-center rounded-full bg-white/90 text-[#1A1A1A] hover:text-[#F5791F] hover:bg-white shadow-md transition-colors cursor-pointer focus:outline-none"
                        aria-label="Fermer la vue détaillée">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Zone Scrollable du Contenu de l'Étude de Cas -->
                <div class="overflow-y-auto flex-1">
                    
                    <!-- Grand Visuel du Projet -->
                    <div class="relative aspect-video w-full bg-[#FAF4EF] overflow-hidden">
                        <template x-if="selectedProject && selectedProject.image_url">
                            <img :src="selectedProject.image_url" 
                                 :alt="selectedProject ? selectedProject.title : ''" 
                                 class="h-full w-full object-cover">
                        </template>

                        <!-- Badge Pôle dans le Modal -->
                        <div class="absolute bottom-4 left-4 sm:left-6 z-10 flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center rounded-full bg-white/95 backdrop-blur-xs px-3.5 py-1 text-xs font-bold text-[#F5791F] border border-[#F4E6D9] shadow-sm"
                                  x-text="selectedProject ? selectedProject.service : ''"></span>
                            
                            <template x-if="selectedProject && selectedProject.is_featured">
                                <span class="inline-flex items-center rounded-full bg-[#F5791F] px-3 py-1 text-xs font-bold text-white shadow-sm uppercase tracking-wider">
                                    À la une
                                </span>
                            </template>
                        </div>
                    </div>

                    <!-- Détails Éditoriaux -->
                    <div class="p-6 sm:p-8 space-y-6">
                        
                        <!-- En-tête : Client & Titre -->
                        <div>
                            <template x-if="selectedProject && selectedProject.client">
                                <span class="block text-xs font-bold uppercase tracking-wider text-[#555555] mb-1"
                                      x-text="selectedProject.client"></span>
                            </template>
                            <h3 class="text-2xl sm:text-3xl font-black text-[#1A1A1A] tracking-tight leading-snug"
                                x-text="selectedProject ? selectedProject.title : ''"></h3>
                        </div>

                        <!-- 1. Le Défi Initial -->
                        <template x-if="selectedProject && selectedProject.challenge">
                            <div class="rounded-2xl bg-[#FAF4EF] p-5 border border-[#F4E6D9]">
                                <h4 class="text-xs font-bold uppercase tracking-wider text-[#F5791F] mb-2 flex items-center gap-2">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                                    </svg>
                                    <span>Le Défi à Relever</span>
                                </h4>
                                <p class="text-xs sm:text-sm text-[#1A1A1A] leading-relaxed font-medium"
                                   x-text="selectedProject.challenge"></p>
                            </div>
                        </template>

                        <!-- 2. La Solution AllSmart -->
                        <template x-if="selectedProject && selectedProject.description">
                            <div>
                                <h4 class="text-xs font-bold uppercase tracking-wider text-[#555555] mb-2">
                                    Stratégie & Déploiement
                                </h4>
                                <p class="text-xs sm:text-sm text-[#555555] leading-relaxed"
                                   x-text="selectedProject.description"></p>
                            </div>
                        </template>

                        <!-- 3. Chiffres Clés & Résultats (KPIs) -->
                        <template x-if="selectedProject && selectedProject.metrics && selectedProject.metrics.length > 0">
                            <div>
                                <h4 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-3">
                                    Impact & Chiffres Clés
                                </h4>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                    <template x-for="(metric, idx) in selectedProject.metrics" :key="idx">
                                        <div class="rounded-2xl border border-[#F4E6D9] bg-[#FAF4EF] p-4 text-center">
                                            <span class="block text-xl sm:text-2xl font-black text-[#F5791F]" x-text="metric.value"></span>
                                            <span class="block text-[11px] font-medium text-[#555555] mt-0.5" x-text="metric.label"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>

                        <!-- 4. Livrables Clés -->
                        <template x-if="selectedProject && selectedProject.deliverables">
                            <div>
                                <h4 class="text-xs font-bold uppercase tracking-wider text-[#555555] mb-2">
                                    Livrables Réalisés
                                </h4>
                                <p class="text-xs font-medium text-[#1A1A1A] bg-slate-50 p-3 rounded-xl border border-[#E5E7EB]"
                                   x-text="selectedProject.deliverables"></p>
                            </div>
                        </template>

                    </div>
                </div>

                <!-- Footer Fixe du Modal avec Actions de Conversion -->
                <div class="border-t border-[#E5E7EB] bg-slate-50 p-4 sm:p-6 flex flex-col sm:flex-row items-center justify-between gap-3">
                    <template x-if="selectedProject && selectedProject.link">
                        <a :href="selectedProject.link" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="inline-flex items-center gap-1.5 text-xs font-bold text-[#1A1A1A] hover:text-[#F5791F] transition-colors order-2 sm:order-1">
                            <span>Voir le projet en ligne</span>
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </a>
                    </template>
                    <template x-if="!selectedProject || !selectedProject.link">
                        <span class="text-xs font-medium text-[#555555] order-2 sm:order-1">
                            Accompagnement AllSmart Consulting
                        </span>
                    </template>

                    <a href="/rendez-vous" 
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-[#F5791F] px-6 py-3 text-xs font-bold text-white shadow-md hover:bg-[#d96716] transition-colors order-1 sm:order-2">
                        <span>Discuter d'un projet similaire</span>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Appel à l'action CTA -->
<x-homepage.cta />

@endsection
