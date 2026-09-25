@extends('layouts.main')

@section('title', 'Pack Visibilité Essentielle - Allsmart')

@section('content')
    <!-- Hero avec tabs -->
   <!-- Hero avec Tabs -->
<section class="relative h-[50vh] min-h-[420px] w-full overflow-hidden">
    <!-- Image de fond -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('assets/packs/hero-pack1.jpg') }}');"></div>
    </div>

    <!-- Tabs superposés en bas de l'image -->
    <div class="absolute bottom-0 left-0 right-0 z-24 flex justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-3xl">
            <div class="flex overflow-hidden bg-gradient-to-b from-[#a0704a] to-[#6b4530] shadow-lg">
                @php
                    $tabs = [
                        ['name' => 'Visibilité', 'active' => true],
                        ['name' => 'Croissance', 'active' => false],
                        ['name' => 'Image Premium', 'active' => false],
                        ['name' => 'Activation 360°', 'active' => false],
                    ];
                @endphp

                @foreach($tabs as $index => $tab)
                    <a href="#" 
                       class="flex-1 border-r border-white/30 px-4 py-3.5 text-center text-sm font-semibold text-white last:border-r-0 transition-colors duration-300 hover:brightness-110 {{ $tab['active'] ? 'bg-[#4a2e1a]' : '' }} md:text-base lg:px-6">
                        {{ $tab['name'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

    <!-- Contenu principal -->
    <section class="bg-white py-12 md:py-16">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            
            <!-- Titre -->
            <h1 class="text-3xl font-black leading-tight tracking-[-0.02em] text-[#f5771d] sm:text-4xl md:text-[2.8rem]">
                Pack Visibilité Essentielle
            </h1>
            <h2 class="mt-1 text-2xl font-black tracking-[-0.02em] text-[#f5771d] sm:text-3xl md:text-[2.2rem]">
                PME &amp; commerces
            </h2>

            <!-- Intro -->
            <p class="mt-6 max-w-3xl text-base leading-7 text-[#1f1f1f] md:text-lg md:leading-8">
                Développez votre présence en ligne et donnez plus de visibilité à votre activité grâce à une stratégie digitale adaptée à vos objectifs.
            </p>

            <!-- Ce pack comprend -->
            <div class="mt-10">
                <p class="text-xl font-bold text-[#f5771d] sm:text-2xl">
                    Ce pack comprend :
                </p>

                <ul class="mt-4 space-y-2.5">
                    @php
                        $packItems = [
                            'Audit rapide de votre communication.',
                            'Création ou optimisation de votre identité visuelle.',
                            'Gestion des réseaux sociaux.',
                            'Création de contenus visuels.',
                            'Calendrier éditorial.',
                            'Création d\'une campagne publicitaire digitale.',
                            'Suivi des performances.',
                        ];
                    @endphp

                    @foreach($packItems as $item)
                        <li class="flex items-start gap-3 text-base leading-7 text-[#1f1f1f] md:text-lg">
                            <span class="mt-2 h-2.5 w-2.5 flex-shrink-0 rounded-full bg-[#f5771d]"></span>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Résultats attendus -->
            <div class="mt-10">
                <p class="text-xl font-bold text-[#f5771d] sm:text-2xl">
                    Résultats attendus :
                </p>

                <ul class="mt-4 space-y-2.5">
                    @php
                        $resultItems = [
                            'Une image plus professionnelle.',
                            'Une meilleure visibilité.',
                            'Une communication plus cohérente.',
                            'Une augmentation de l\'engagement.',
                        ];
                    @endphp

                    @foreach($resultItems as $item)
                        <li class="flex items-start gap-3 text-base leading-7 text-[#1f1f1f] md:text-lg">
                            <span class="mt-2 h-2.5 w-2.5 flex-shrink-0 rounded-full bg-[#f5771d]"></span>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

   <!-- CTA final -->
<section class="py-12 md:py-16">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <!-- Image avec texte superposé -->
        <div class="relative overflow-hidden rounded-lg">
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('assets/packs/cta-pack1.jpg') }}');"></div>
            <div class="absolute inset-0 bg-[#1a3a4a]/70"></div>

            <div class="relative z-10 px-6 py-16 text-center text-white md:py-20 lg:py-24">
                <p class="text-lg font-light tracking-wide text-white md:text-xl">
                    Développons votre présence en ligne
                </p>

                <h3 class="mt-3 text-3xl font-black leading-tight tracking-[-0.02em] text-white sm:text-4xl md:text-5xl lg:text-6xl">
                    A partir de 400 000 FCFA
                </h3>
            </div>
        </div>

        <!-- Bouton en dehors de l'image -->
        <div class="mt-8 flex justify-center">
            <a href="#contact" class="inline-flex items-center justify-center rounded-lg bg-[#f5771d] px-10 py-4 text-lg font-bold text-white shadow-lg transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#e06917] md:px-14 md:py-5 md:text-xl">
                Demander un devis
            </a>
        </div>
    </div>
</section>
@endsection