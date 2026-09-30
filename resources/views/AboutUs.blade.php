@extends('layouts.main')

@section('title', 'Qui Sommes-Nous - Allsmart Consulting')
@section('meta_description', 'Découvrez l\'histoire, les valeurs, la méthode et l\'équipe d\'AllSmart Consulting, cabinet de conseil en stratégie, branding et communication d\'impact.')

@section('content')

<!-- Hero Section Qui Sommes-Nous Épurée -->
<section class="relative min-h-[340px] sm:min-h-[380px] lg:min-h-[420px] flex items-center justify-center overflow-hidden">
    <!-- Image de fond conservée avec overlay optimisé -->
    <div class="absolute inset-0 h-full w-full">
        <img src="{{ asset('assets/slideabout.jpg') }}" 
             alt="L'équipe et l'histoire AllSmart" 
             class="h-full w-full object-cover object-center">
        <div class="absolute inset-0 bg-black/45 backdrop-blur-[1px]"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/25 to-transparent"></div>
    </div>

    <!-- Contenu Textuel Épuré : Titre Clair & Simple Description -->
    <div class="relative z-10 mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center pt-20 pb-12">
        <span class="font-zeyada text-3xl sm:text-4xl text-[#F5791F] block mb-1">
            Notre Histoire
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight uppercase">
            Qui Sommes-Nous
        </h1>
        <p class="mt-3 sm:mt-4 text-sm sm:text-base md:text-lg text-white/90 max-w-xl mx-auto font-light leading-relaxed">
            L'agence qui conjugue vision stratégique et impact créatif.
        </p>
    </div>
</section>

<!-- Contenu Principal Structuré (Manifeste, Méthode, Valeurs, Smart Team) -->
<x-about.intro :teams="$teams ?? null" />

<!-- Section Appel à l'Action de Clôture -->
<x-homepage.cta />

@endsection
