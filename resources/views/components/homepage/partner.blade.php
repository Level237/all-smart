<section id="partenaires" class="py-16 bg-[#edf2f6] md:py-24">
    
    <!-- Ligne décorative supérieure -->
    <div class="flex justify-center mb-8">
        <div class="w-full max-w-4xl h-[1px] bg-[#f5771d]/40"></div>
    </div>

    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        
        <!-- En-tête de section -->
        <div class="mb-16 text-center">
            <h2 class="font-zeyada text-5xl sm:text-6xl md:text-7xl text-[#f5771d] relative z-10">
                En nous, ils ont confiance
            </h2>
            <h3 class="text-3xl font-bold text-gray-900 sm:text-4xl md:text-5xl mt-[-20px] relative z-20">
                Nos partenaires
            </h3>
        </div>

        <!-- Défilement infini des logos (Marquee) -->
        <div class="relative flex overflow-hidden group">
            
            <!-- Dégradés pour fondre les bords (gauche et droite) -->
            <div class="absolute top-0 bottom-0 left-0 z-10 w-16 md:w-32 bg-gradient-to-r from-[#edf2f6] to-transparent pointer-events-none"></div>
            <div class="absolute top-0 bottom-0 right-0 z-10 w-16 md:w-32 bg-gradient-to-l from-[#edf2f6] to-transparent pointer-events-none"></div>
            
            <!-- Conteneur défilant -->
            <div class="flex items-center w-max gap-12 md:gap-20 py-4 animate-marquee pr-12 md:pr-20">
                
                <!-- Première série de logos -->
                @foreach (range(1, 7) as $num)
                <div class="flex items-center justify-center w-32 h-20 transition-all duration-300 md:w-40 md:h-24 grayscale opacity-70 hover:opacity-100 hover:grayscale-0 hover:scale-110 shrink-0 cursor-pointer">
                    <img src="{{ asset('assets/partners/partner' . $num . '.png') }}" alt="Partenaire {{ $num }}" class="object-contain w-full h-full drop-shadow-sm">
                </div>
                @endforeach
                
                <!-- Deuxième série de logos (Duplication exacte pour la boucle continue) -->
                @foreach (range(1, 7) as $num)
                <div class="flex items-center justify-center w-32 h-20 transition-all duration-300 md:w-40 md:h-24 grayscale opacity-70 hover:opacity-100 hover:grayscale-0 hover:scale-110 shrink-0 cursor-pointer">
                    <img src="{{ asset('assets/partners/partner' . $num . '.png') }}" alt="Partenaire {{ $num }}" class="object-contain w-full h-full drop-shadow-sm">
                </div>
                @endforeach

            </div>
        </div>

    </div>

    <style>
        /* Animation fluide pour faire défiler les logos */
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            /* 30s permet un défilement doux, modifiable selon le besoin */
            animation: marquee 30s linear infinite;
        }
        /* Met en pause le défilement quand la souris survole la zone */
        .group:hover .animate-marquee {
            animation-play-state: paused;
        }
    </style>
</section>
