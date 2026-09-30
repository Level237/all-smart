@extends('layouts.main')

@section('title', 'Qui Sommes-Nous - Allsmart Consulting')
@section('meta_description', 'Découvrez l\'histoire, les valeurs, la méthode et l\'équipe d\'AllSmart Consulting, cabinet de conseil en stratégie, branding et communication d\'impact.')

@section('content')

<!-- Hero Section Qui Sommes-Nous -->
<section class="relative min-h-[480px] sm:min-h-[540px] lg:min-h-[600px] flex items-center justify-center overflow-hidden">
    <!-- Image de fond avec overlay sombre pour une lisibilité parfaite -->
    <div class="absolute inset-0 h-full w-full">
        <img src="{{ asset('assets/slideabout.jpg') }}" 
             alt="L'équipe et l'histoire AllSmart" 
             class="h-full w-full object-cover object-center">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[1px]"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent"></div>
    </div>

    <!-- Contenu Textuel du Hero -->
    <div class="relative z-10 mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 text-center pt-24 pb-16">
        <span class="font-zeyada text-4xl sm:text-5xl md:text-6xl text-[#F5791F] block mb-2">
            Notre Histoire & Nos Ambitions
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
            L'agence qui conjugue vision stratégique et impact créatif
        </h1>
        <p class="mt-4 sm:mt-6 text-sm sm:text-base md:text-lg text-white/90 max-w-2xl mx-auto font-light leading-relaxed">
            AllSmart Consulting accompagne les marques, institutions et dirigeants dans la construction d'une image forte, crédible et mémorable.
        </p>
    </div>
</section>

<!-- Contenu Principal Structuré (Manifeste, Méthode, Valeurs, Smart Team) -->
<x-about.intro :teams="$teams ?? null" />

<!-- Section Appel à l'Action de Clôture -->
<x-homepage.cta />

@endsection
