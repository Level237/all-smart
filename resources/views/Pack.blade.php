@extends('layouts.main')

@section('title', ($pack['title'] ?? 'Pack') . ' - Allsmart')

@section('content')
    <!-- Hero avec Tabs -->
    <section class="relative h-[42vh] min-h-[340px] w-full sm:min-h-[380px]">
        <!-- Image de fond -->
        <div class="absolute inset-0 z-0 overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset($pack['heroImage'] ?? 'assets/packs/hero-pack1.jpg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
        </div>

        <!-- Tabs superposés à cheval sur le bord inférieur (plus bas) -->
        <div class="absolute bottom-0 left-0 right-0 z-20 flex justify-center px-3 sm:px-6 lg:px-8 translate-y-1/2">
            <div class="w-full max-w-4xl overflow-hidden rounded-[8px] sm:rounded-[10px] bg-white shadow-[0_12px_32px_rgba(0,0,0,0.14)] border border-gray-200/80">
                @php
                    $currentSlug = $pack['slug'] ?? 'visibilite';
                    $tabs = [
                        ['name' => 'Visibilité', 'slug' => 'visibilite', 'url' => '/packs/visibilite'],
                        ['name' => 'Croissance', 'slug' => 'croissance', 'url' => '/packs/croissance'],
                        ['name' => 'Image Premium', 'slug' => 'image-premium', 'url' => '/packs/image-premium'],
                        ['name' => 'Activation 360°', 'slug' => 'activation-360', 'url' => '/packs/activation-360'],
                    ];
                @endphp

                <nav class="flex overflow-x-auto no-scrollbar scroll-smooth">
                    @foreach($tabs as $tab)
                        @php
                            $isActive = ($currentSlug === $tab['slug']);
                        @endphp
                        <a href="{{ $tab['url'] }}" 
                           class="flex-1 whitespace-nowrap border-r border-gray-300 px-3 py-3.5 text-center text-xs font-bold transition-all duration-300 last:border-r-0 sm:px-6 sm:py-4 sm:text-sm md:text-base {{ $isActive ? 'bg-[#8C8780] text-white shadow-inner font-extrabold' : 'bg-white text-[#1f1f1f] hover:bg-gray-50' }}">
                            {{ $tab['name'] }}
                        </a>
                    @endforeach
                </nav>
            </div>
        </div>
    </section>

    <!-- Contenu principal (avec padding-top adapté à la carte superposée) -->
    <section class="bg-white pt-20 sm:pt-24 md:pt-28 pb-12 sm:pb-16 md:pb-20">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            
            <!-- Titre & Sous-titre -->
            <h1 class="text-3xl font-black leading-tight tracking-[-0.02em] text-[#F5791F] sm:text-4xl md:text-[2.8rem]">
                {{ $pack['title'] }}
            </h1>
            <h2 class="mt-1 text-2xl font-semibold tracking-[-0.02em] text-[#F5791F] sm:text-3xl md:text-[2.2rem]">
                {{ $pack['subtitle'] }}
            </h2>

            <!-- Intro -->
            <p class="mt-6 max-w-3xl text-base leading-7 text-[#1f1f1f] md:text-lg md:leading-8">
                {{ $pack['intro'] }}
            </p>

            <!-- Ce pack comprend -->
            <div class="mt-10 sm:mt-12">
                <p class="text-xl font-bold text-[#F5791F] sm:text-2xl">
                    Ce pack comprend :
                </p>

                <ul class="mt-4 space-y-3 sm:space-y-3.5">
                    @foreach($pack['items'] as $item)
                        <li class="flex items-start gap-3 text-base leading-7 text-[#1f1f1f] md:text-lg">
                            <span class="mt-2.5 h-2.5 w-2.5 flex-shrink-0 rounded-full bg-[#F5791F]"></span>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Résultats attendus -->
            <div class="mt-10 sm:mt-12">
                <p class="text-xl font-bold text-[#F5791F] sm:text-2xl">
                    Résultats attendus :
                </p>

                <ul class="mt-4 space-y-3 sm:space-y-3.5">
                    @foreach($pack['results'] as $item)
                        <li class="flex items-start gap-3 text-base leading-7 text-[#1f1f1f] md:text-lg">
                            <span class="mt-2.5 h-2.5 w-2.5 flex-shrink-0 rounded-full bg-[#F5791F]"></span>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <!-- CTA final -->
    <section class="pb-16 pt-4 sm:pb-20 md:pb-24">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <!-- Image avec texte superposé -->
            <div class="relative overflow-hidden rounded-[24px] shadow-md">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset($pack['cta']['background'] ?? 'assets/packs/cta-pack1.jpg') }}');"></div>
                <div class="absolute inset-0 bg-[#1a3a4a]/75 backdrop-blur-[2px]"></div>

                <div class="relative z-10 px-6 py-14 text-center text-white sm:py-16 md:py-20 lg:py-24">
                    <p class="text-base font-light tracking-wide text-white/90 sm:text-lg md:text-xl">
                        {{ $pack['cta']['title'] }}
                    </p>

                    <h3 class="mt-3 text-2xl font-black leading-tight tracking-[-0.02em] text-white sm:text-4xl md:text-5xl lg:text-6xl">
                        {{ $pack['cta']['price'] }}
                    </h3>
                </div>
            </div>

            <!-- Bouton CTA -->
            <div class="mt-8 flex justify-center">
                <a href="/rendez-vous" class="inline-flex items-center justify-center rounded-xl bg-[#F5791F] px-8 py-4 text-base font-bold text-white shadow-[0_14px_28px_rgba(245,121,31,0.35)] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#d6630f] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/30 sm:px-12 sm:py-5 sm:text-lg md:px-14 md:text-xl">
                    {{ $pack['cta']['button'] }}
                </a>
            </div>
        </div>
    </section>
@endsection
