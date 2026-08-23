@extends('layouts.main')

@section('title', $service['title'] ?? 'Allsmart - Service')

@section('content')
    @php
        $defaultService = [
            'title' => 'Stratégie & Conseil',
            'subtitle' => 'Audit, positionnement, plan d\'actions',
            'intro' => 'Avant de créer, il faut comprendre. Chaque projet débute par une phase d\'analyse permettant d\'identifier les forces, les faiblesses et les opportunités de la marque.',
            'items' => [
                'Audit de marque et analyse de l\'existant.',
                'Analyse du marché, de la concurrence et des tendances.',
                'Définition ou clarification du positionnement de la marque.',
                'Identification des cibles et de leurs attentes.',
                'Élaboration de la plateforme de marque (vision, mission, valeurs, personnalité, ton).',
                'Définition des objectifs de communication.',
                'Construction d\'une stratégie de marque cohérente.',
                'Élaboration d\'un plan d\'actions avec priorités, calendrier et recommandations.',
            ],
            'sideItems' => [
                ['name' => 'Stratégie & Conseil', 'active' => true, 'url' => '#strategie'],
                ['name' => 'Community Management', 'active' => false, 'url' => '#community'],
                ['name' => 'Création de Contenus', 'active' => false, 'url' => '#contenus'],
                ['name' => 'Personal Branding', 'active' => false, 'url' => '#branding'],
                ['name' => 'Site Internet', 'active' => false, 'url' => '#site'],
                ['name' => 'Activations & Événementiel', 'active' => false, 'url' => '#activations'],
                ['name' => 'Marketing d\'Influence', 'active' => false, 'url' => '#influence'],
            ],
            'titleClass' => 'text-[#f5771d]',
            'heroImage' => 'assets/services/slide-service.jpg',
            'gallery' => [
                'top' => 'assets/services/strategie1.jpg',
                'bottom' => [
                    'assets/services/strategie2.jpg',
                    'assets/services/strategie3.jpg',
                ],
            ],
            'resultTitle' => 'Résultat :',
            'resultText' => 'Une marque personnelle forte, cohérente et authentique qui renforce votre visibilité, inspire confiance et crée des opportunités professionnelles, commerciales et médiatiques.',
            'cta' => [
                'type' => 'default',
                'background' => 'assets/cta.jpg',
                'title' => 'Construisons',
                'subtitle' => 'votre stratégie',
                'button' => 'Planifions un audit stratégique',
                'buttonClass' => 'bg-[#f5771d] hover:bg-[#e06917] shadow-[0_18px_30px_rgba(245,119,29,0.42)]',
            ],
        ];

        $service = array_replace_recursive($defaultService, $service ?? []);
    @endphp

    <!-- Hero Image Section -->
    <section class="relative">
        <div class="">
            <div class="relative overflow-hidden">
                <img src="{{ asset($service['heroImage']) }}" 
                     alt="{{ $service['title'] }}" 
                     class="h-[300px] w-full object-cover object-center sm:h-[400px] md:h-[500px] lg:h-[680px]">
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="relative pb-16 lg:pb-24">
        <div class="mx-auto max-w-[1500px] px-4 sm:px-6 lg:px-8">
            <div class="relative grid gap-8 lg:grid-cols-[1.7fr_1fr] lg:items-start">
                
                <!-- Left: Content -->
                <article class="bg-white px-5 py-6 sm:px-8 sm:py-10 lg:px-10 lg:py-12">
                    <h1 class="text-[2rem] font-black leading-[0.95] tracking-[-0.02em] {{ $service['titleClass'] }} sm:text-[2.8rem] lg:text-[4rem]">
                        {{ $service['title'] }}
                    </h1>

                    <h2 class="mt-2 text-[1.1rem] font-medium leading-tight tracking-[-0.02em] text-gray-800 sm:text-[1.4rem] lg:text-[2rem]">
                        {{ $service['subtitle'] }}
                    </h2>

                    <p class="mt-5 max-w-[760px] text-[0.95rem] leading-7 text-gray-700 sm:text-[1.05rem] md:text-[1.12rem] md:leading-8">
                        {{ $service['intro'] }}
                    </p>

                    <div class="mt-7 sm:mt-8">
                        <p class="text-[1rem] font-bold {{ $service['titleClass'] }} sm:text-[1.1rem] md:text-[1.2rem]">
                            Ce service comprend :
                        </p>

                        <ul class="mt-4 space-y-3 sm:space-y-4">
                            @foreach($service['items'] as $item)
                                <li class="flex items-start gap-3 text-[0.92rem] leading-7 text-gray-700 sm:text-[1rem] md:text-[1.08rem]">
                                    <span class="mt-2 h-2 w-2 flex-shrink-0 rounded-full bg-[#f5771d]"></span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Galerie d'images -->
                    <div class="mt-24 space-y-4">
                        <div class="relative h-[100px] w-full overflow-hidden rounded-[18px] border border-[#dfe8ee] bg-gray-200 sm:h-[250px] lg:h-[250px]">
                            <img src="{{ asset($service['gallery']['top']) }}"
                                 alt="{{ $service['title'] }} - vue 1"
                                 class="h-full w-full object-cover">
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            @foreach($service['gallery']['bottom'] as $image)
                                <div class="relative h-[150px] overflow-hidden rounded-[18px] border border-[#dfe8ee] bg-gray-200 sm:h-[280px] lg:h-[290px]">
                                    <img src="{{ asset($image) }}"
                                         alt="{{ $service['title'] }} - vue secondaire"
                                         class="h-full w-full object-cover">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Texte Résultat -->
                    <div class="mt-10">
                        <p class="text-[1.6rem] font-black leading-none tracking-[-0.04em] {{ $service['titleClass'] }} sm:text-[2rem] lg:text-[2.5rem]">
                            {{ $service['resultTitle'] }}
                        </p>

                        <h3 class="mt-5 text-[1.05rem] font-normal leading-[1.5] tracking-[-0.02em] text-[#1a1a1a] sm:text-[1.3rem] lg:text-[1.6rem]">
                            {{ $service['resultText'] }}
                        </h3>
                    </div>
                </article>

                <!-- Right: Side Menu (Sticky) -->
                <aside class="relative lg:sticky lg:top-44 lg:self-start">
                    <div class="overflow-hidden rounded-tl-[32px] bg-[#f5771d] shadow-[0_20px_50px_rgba(245,119,29,0.25)]">
                        <div class="p-4 sm:p-6 md:p-7 lg:p-8">
                            <div class="space-y-1">
                                @foreach($service['sideItems'] as $index => $item)
                                    <div class="{{ $item['active'] ? 'bg-[#f4b896] rounded-lg px-3 py-2 sm:px-4 sm:py-3' : 'border-b border-white/30 last:border-b-0' }}">
                                        <a href="{{ $item['url'] }}" 
                                           class="block py-1.5 text-[1rem] font-bold leading-snug tracking-[-0.01em] {{ $item['active'] ? 'text-gray-900' : 'text-white' }} transition-all duration-300 hover:opacity-85 sm:text-[1.15rem] lg:text-[1.35rem]">
                                            {{ $item['name'] }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- CTA final -->
    @if(($service['cta']['type'] ?? 'default') === 'community')
        <section class="relative overflow-hidden border border-[#e5e5e5] bg-[#d76a1e]">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-70" style="background-image: url('{{ asset($service['cta']['background']) }}');"></div>
            <div class="absolute inset-0 bg-[#d76a1e]/70"></div>

            <div class="relative z-10 mx-auto max-w-[1500px] px-4 py-13 sm:px-6 lg:px-8 lg:py-24">
                <div class="mx-auto max-w-[1200px] text-center text-white">
                    <p class="text-3xl font-light leading-none text-white sm:text-xl md:text-xl lg:text-4xl">
                        {{ $service['cta']['title'] }}
                    </p>

                    <div class="mt-2 flex flex-wrap items-center justify-center gap-x-3 gap-y-2 text-[2rem] font-black leading-[0.9] tracking-[-0.04em] text-white sm:text-[2.8rem] lg:text-[4rem]">
                        <span>{{ $service['cta']['subtitle'] }}</span>
                        <span class="block text-white/95">{{ $service['cta']['highlight'] }}</span>
                    </div>

                    <div class="mt-7 flex justify-center">
                        <a href="#contact" class="inline-flex items-center justify-center rounded-[18px] bg-[#4a8ca1] px-7 py-4 text-lg font-bold text-white shadow-[0_16px_28px_rgba(70,123,136,0.35)] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#3e7d8d] focus:outline-none focus:ring-4 focus:ring-[#4a8ca1]/30 sm:px-10 sm:py-5 sm:text-[1.8rem] lg:px-14 lg:py-5">
                            {{ $service['cta']['button'] }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @elseif(($service['cta']['type'] ?? 'default') === 'content-cta')
        <section class="relative overflow-hidden  bg-[#d76a1e]">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-[0.9]" style="background-image: url('{{ asset($service['cta']['background']) }}');"></div>
            <div class="absolute inset-0 bg-[#d76a1e]/65"></div>

            <div class="relative z-10 mx-auto max-w-[1500px] px-4 py-8 sm:px-6 lg:px-8 lg:py-24">
                <div class="mx-auto max-w-[1200px] text-center text-white">
                    <p class="text-3xl font-light leading-none text-white sm:text-xl md:text-xl lg:text-5xl">
                        {{ $service['cta']['title'] }}
                    </p>

                    <p class="mt-2 text-[2rem] font-black leading-[0.9] tracking-[-0.04em] text-white sm:text-[3rem] lg:text-[6rem]">
                        {{ $service['cta']['subtitle'] }}
                    </p>

                    <div class="mt-8 flex justify-center">
                        <a href="#contact" class="inline-flex items-center justify-center rounded-[18px] bg-[#5d9daf] px-8 py-4 text-xl font-bold text-white shadow-[0_16px_28px_rgba(70,123,136,0.35)] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#4e8ca0] focus:outline-none focus:ring-4 focus:ring-[#5d9daf]/30 sm:px-12 sm:py-5 sm:text-[2rem] lg:px-16 lg:py-5 lg:text-[1.5rem]">
                            {{ $service['cta']['button'] }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="relative overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset($service['cta']['background']) }}');"></div>
            <div class="absolute inset-0 bg-black/30"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#382e28]/65 via-[#5c4c3f]/30 to-[#382e28]/65"></div>

            <div class="relative z-10 mx-auto flex min-h-[320px] max-w-[1500px] items-center justify-center px-4 py-12 sm:min-h-[400px] sm:px-6 lg:min-h-[440px] lg:px-8">
                <div class="w-full max-w-[1100px] text-center">
                    <p class="text-3xl font-light leading-none text-white sm:text-xl md:text-xl lg:text-4xl">
                        {{ $service['cta']['title'] }}
                    </p>
                    <p class="mt-2 text-4xl font-black leading-[0.9] tracking-[-0.04em] text-white sm:text-5xl md:text-6xl lg:text-6xl">
                        {{ $service['cta']['subtitle'] }}
                    </p>

                    <div class="mt-8 flex justify-center">
                        <a href="#contact" class="inline-flex items-center justify-center rounded-xl {{ $service['cta']['buttonClass'] }} px-9 py-4 text-xl font-bold text-white transition-all duration-300 hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-[#f5771d]/30 sm:px-12 sm:py-5 sm:text-2xl lg:px-16 lg:py-5 lg:text-2xl">
                            {{ $service['cta']['button'] }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection