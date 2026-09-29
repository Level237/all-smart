@extends('layouts.main')

@section('title', ($pack['title'] ?? 'Pack') . ' - Allsmart')

@section('content')
    <!-- Hero avec Tabs -->
    <section class="relative h-[48vh] min-h-[380px] w-full overflow-hidden sm:min-h-[420px]">
        <!-- Image de fond -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset($pack['heroImage'] ?? 'assets/packs/hero-pack1.jpg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
        </div>

        <!-- Tabs superposés en bas de l'image -->
        <div class="absolute bottom-0 left-0 right-0 z-20 flex justify-center px-3 sm:px-6 lg:px-8">
            <div class="w-full max-w-3xl overflow-hidden rounded-t-[14px] bg-gradient-to-b from-[#a0704a] to-[#6b4530] shadow-lg">
                @php
                    $currentSlug = $pack['slug'] ?? 'visibilite';
                    $tabs = [
                        ['name' => 'Visibilité', 'slug' => 'visibilite', 'url' => '/packs/visibilite'],
                        ['name' => 'Croissance', 'slug' => 'croissance', 'url' => '/packs/croissance'],
                        ['name' => 'Image Premium', 'slug' => 'image-premium', 'url' => '/packs/image-premium'],
                    ];
                @endphp

                <nav class="flex overflow-x-auto no-scrollbar scroll-smooth">
                    @foreach($tabs as $tab)
                        @php
                            $isActive = ($currentSlug === $tab['slug']);
                        @endphp
                        <a href="{{ $tab['url'] }}" 
                           class="flex-1 whitespace-nowrap border-r border-white/20 px-3 py-3 text-center text-xs font-bold text-white transition-all duration-300 last:border-r-0 hover:bg-black/20 sm:px-6 sm:py-3.5 sm:text-sm md:text-base {{ $isActive ? 'bg-[#4a2e1a] text-white shadow-inner font-extrabold ring-1 ring-inset ring-white/10' : 'opacity-90' }}">
                            {{ $tab['name'] }}
                        </a>
                    @endforeach
                </nav>
            </div>
        </div>
    </section>

    <!-- Contenu principal -->
    <section class="bg-white py-12 sm:py-16 md:py-20">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            
            <!-- Titre & Sous-titre -->
            <h1 class="text-3xl font-black leading-tight tracking-[-0.02em] text-[#F5791F] sm:text-4xl md:text-[2.8rem]">
                {{ $pack['title'] }}
            </h1>
            <h2 class="mt-1 text-2xl font-black tracking-[-0.02em] text-[#1A1A1A] sm:text-3xl md:text-[2.2rem]">
                {{ $pack['subtitle'] }}
            </h2>

            <!-- Intro -->
            <p class="mt-6 max-w-3xl text-base leading-7 text-gray-700 md:text-lg md:leading-8">
                {{ $pack['intro'] }}
            </p>

            <!-- Ce pack comprend -->
            <div class="mt-10 sm:mt-12">
                <p class="text-xl font-bold text-[#F5791F] sm:text-2xl">
                    Ce pack comprend :
                </p>

                <ul class="mt-4 space-y-3 sm:space-y-3.5">
                    @foreach($pack['items'] as $item)
                        <li class="flex items-start gap-3 text-base leading-7 text-gray-800 md:text-lg">
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
                        <li class="flex items-start gap-3 text-base leading-7 text-gray-800 md:text-lg">
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
                <a href="#contact" class="inline-flex items-center justify-center rounded-xl bg-[#F5791F] px-8 py-4 text-base font-bold text-white shadow-[0_14px_28px_rgba(245,121,31,0.35)] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#d6630f] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/30 sm:px-12 sm:py-5 sm:text-lg md:px-14 md:text-xl">
                    {{ $pack['cta']['button'] }}
                </a>
            </div>
        </div>
    </section>
@endsection
