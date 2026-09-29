@extends('layouts.main')

@section('title', "Je suis créateur de contenu - Allsmart")
@section('meta_description', "Rejoignez le réseau de créateurs AllSmart et collaborez avec des marques qui correspondent à votre univers.")

@section('content')
    <!-- Hero Banner Image -->
    <section class="relative w-full overflow-hidden">
        <div class="relative h-[240px] sm:h-[320px] md:h-[400px] lg:h-[460px] w-full">
            <img src="{{ asset('assets/services/marketing-influence/hero-createur.jpg') }}" 
                 alt="Je suis créateur de contenu - AllSmart" 
                 class="h-full w-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-black/10"></div>
        </div>
    </section>

    <!-- Contenu Principal -->
    <section class="bg-white py-14 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            
            <!-- Grand Titre Orange -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black uppercase tracking-tight text-[#F5791F]">
                JE SUIS CRÉATEUR DE CONTENU
            </h1>

            <!-- Sous-titre & Accroche -->
            <div class="mt-8 sm:mt-10 md:mt-12">
                <h2 class="text-xl sm:text-2xl md:text-[26px] font-black uppercase text-[#1A1A1A] tracking-tight">
                    CRÉATEURS, REJOIGNEZ-NOUS
                </h2>
                <p class="mt-1 text-lg sm:text-xl md:text-2xl font-bold text-[#1A1A1A]">
                    Votre communauté peut devenir votre plus belle opportunité.
                </p>
            </div>

            <!-- Paragraphes de Présentation -->
            <div class="mt-6 sm:mt-8 space-y-4 text-base sm:text-lg md:text-xl text-gray-700 leading-relaxed font-normal">
                <p>
                    Vous créez du contenu, vous fédérez une communauté et vous souhaitez collaborer avec des marques qui correspondent à votre univers ?
                </p>
                <p>
                    Rejoignez le réseau de créateurs AllSmart et faites partie d'une base de profils susceptibles d'être sélectionnés pour nos prochaines campagnes et activations.
                </p>
            </div>

            <!-- Liste des Bénéfices ("Ce que vous pouvez rejoindre") -->
            <div class="mt-10 sm:mt-12">
                <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-[#1A1A1A]">
                    Ce que vous pouvez rejoindre
                </h3>

                <ul class="mt-5 sm:mt-6 space-y-3 sm:space-y-3.5 text-base sm:text-lg md:text-xl text-gray-700 font-normal">
                    <li class="flex items-start gap-3.5">
                        <span class="mt-2 h-2.5 w-2.5 rounded-full bg-[#F5791F] flex-shrink-0"></span>
                        <span>Des campagnes de marques.</span>
                    </li>
                    <li class="flex items-start gap-3.5">
                        <span class="mt-2 h-2.5 w-2.5 rounded-full bg-[#F5791F] flex-shrink-0"></span>
                        <span>Des collaborations rémunérées ou selon les modalités définies avec la marque.</span>
                    </li>
                    <li class="flex items-start gap-3.5">
                        <span class="mt-2 h-2.5 w-2.5 rounded-full bg-[#F5791F] flex-shrink-0"></span>
                        <span>Des activations adaptées à votre niche.</span>
                    </li>
                    <li class="flex items-start gap-3.5">
                        <span class="mt-2 h-2.5 w-2.5 rounded-full bg-[#F5791F] flex-shrink-0"></span>
                        <span>Des opportunités de visibilité.</span>
                    </li>
                    <li class="flex items-start gap-3.5">
                        <span class="mt-2 h-2.5 w-2.5 rounded-full bg-[#F5791F] flex-shrink-0"></span>
                        <span>Un réseau professionnel de créateurs et de marques.</span>
                    </li>
                </ul>
            </div>

            <!-- Bouton CTA Principal -->
            <div class="mt-10 sm:mt-14">
                <a href="/rejoindre-le-reseau" 
                   class="inline-flex items-center justify-center rounded-xl bg-[#F5791F] px-8 py-4 sm:px-10 sm:py-4.5 text-base sm:text-lg md:text-xl font-bold text-white shadow-[0_12px_24px_rgba(245,121,31,0.3)] transition-all duration-300 hover:bg-[#d6630f] hover:-translate-y-0.5 hover:shadow-[0_16px_30px_rgba(245,121,31,0.4)] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/30">
                    Rejoindre le réseau AllSmart
                </a>
            </div>

        </div>
    </section>

    <!-- Bannière Split Pleine Largeur : Vous êtes une marque ? -->
    <section class="w-full bg-[#F5791F] overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <!-- Colonne Gauche : Image -->
            <div class="relative min-h-[340px] sm:min-h-[420px] lg:min-h-[480px] w-full">
                <img src="{{ asset('assets/services/marketing-influence/influences-section1.jpg') }}" 
                     alt="Sélection d'influenceurs AllSmart" 
                     class="h-full w-full object-cover object-center">
            </div>

            <!-- Colonne Droite : Bloc Orange #F5791F -->
            <div class="flex flex-col justify-center bg-[#F5791F] p-8 sm:p-12 md:p-16 lg:p-20 text-white">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight text-white leading-tight">
                    VOUS ÊTES UNE MARQUE ?
                </h2>

                <p class="mt-4 text-base sm:text-lg lg:text-xl font-medium text-white/95 leading-relaxed max-w-xl">
                    Créer de l'attention autour d'un nouveau produit, service ou événement avec notre sélection premium d’influenceurs
                </p>

                <div class="mt-8 sm:mt-10">
                    <a href="/services/marketing-d-influence#contact" 
                       class="inline-flex items-center justify-center rounded-xl bg-white px-8 py-4 text-base sm:text-lg font-bold text-[#F5791F] shadow-md transition-all duration-300 hover:bg-white/95 hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-white/40">
                        Créer votre campagne d’influence
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
