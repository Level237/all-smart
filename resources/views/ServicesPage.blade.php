@extends('layouts.main')

@section('title', 'Nos services - Allsmart')

@section('content')
    <section class="relative h-[50vh] min-h-[400px] w-full overflow-hidden bg-black">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-cover bg-center animate-zoom-slow"
                style="background-image: url('{{ asset('assets/services/slide-service.jpg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
        </div>

        <div class="relative z-10 container mx-auto flex h-full max-w-7xl flex-col justify-center px-6 md:px-10">
            <div class="max-w-3xl space-y-4">
                <div class="inline-block rounded-full bg-[#f5771d] px-4 py-1 text-sm font-bold text-white animate-fade-in">
                    Nos services
                </div>
                <h1 class="text-4xl font-black leading-tight text-white max-sm:text-3xl md:text-6xl animate-slide-in-left">
                    Transformons votre présence
                </h1>
                <div class="h-1 w-20 bg-[#f5771d] animate-width-grow"></div>
            </div>
        </div>

        <div class="absolute bottom-8 left-0 z-10 w-full">
            <div class="container mx-auto max-w-7xl px-6 md:px-10">
                <nav class="flex space-x-2 text-sm font-medium text-white/60">
                    <a href="/" class="transition-colors hover:text-[#f5771d] max-sm:text-xs">Accueil</a>
                    <span>/</span>
                    <span class="text-white max-sm:text-xs">Nos Services</span>
                </nav>
            </div>
        </div>
    </section>

    <style>
        @keyframes slide-in-left {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes zoom-slow {
            from {
                transform: scale(1.1);
            }
            to {
                transform: scale(1);
            }
        }

        .animate-slide-in-left {
            animation: slide-in-left 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-fade-in {
            animation: fade-in 1s ease-out forwards;
        }

        .animate-zoom-slow {
            animation: zoom-slow 20s linear forwards;
        }

        @keyframes width-grow {
            from {
                width: 0;
            }
            to {
                width: 5rem;
            }
        }

        .animate-width-grow {
            animation: width-grow 0.8s ease-out forwards;
        }
    </style>

    <section id="services-grid" class="pb-20 lg:pb-28 pt-10">
        <div class="mx-auto max-w-[1500px] px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($services as $service)
                    <a href="{{ $service['url'] }}" class="group block overflow-hidden rounded-[28px] border border-[#eef1f3] bg-white shadow-[0_24px_50px_rgba(17,24,39,0.05)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_24px_60px_rgba(17,24,39,0.12)]">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/15 to-transparent"></div>
                        </div>

                        <div class="p-6 sm:p-7">
                            <h2 class="text-[1.6rem] font-black leading-tight tracking-[-0.03em] text-[#1f1f1f] sm:text-[1.8rem]">
                                {{ $service['title'] }}
                            </h2>

                            <p class="mt-3 text-sm leading-7 text-gray-700 sm:text-base">
                                {{ $service['description'] }}
                            </p>

                            <div class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-[#f5771d] sm:text-base">
                                En savoir plus
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
