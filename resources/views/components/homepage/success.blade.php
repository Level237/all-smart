<section id="succes" class="py-16 overflow-hidden md:py-24 bg-[#edf2f6]">

    <!-- Conteneur pour le Titre (Centré et contraint en largeur) -->
    <div class="px-4 mx-auto mb-10 max-w-7xl text-center">
        <h2 class="font-zeyada text-5xl sm:text-6xl md:text-7xl text-[#f5771d]">
            Un coup d'oeil
        </h2>
        <h3 class="text-2xl font-bold mt-[-25px] tracking-tight text-gray-900 sm:text-3xl md:text-4xl">
            sur nos précédents succès
        </h3>
    </div>

    <!-- Carousel Full Width (Prend toute la largeur de l'écran) -->
    <div class="relative w-full success-carousel" x-data="{ 
             active: 200, 
             baseImages: [
                 { src: '{{ asset('assets/success1.jpg') }}', alt: 'Championnat National de Scrabble' },
                 { src: '{{ asset('assets/success2.jpg') }}', alt: 'Bavaria Pool Vibes 2026' },
                 { src: '{{ asset('assets/success3.jpg') }}', alt: 'Super Masters Scrabble' },
                 { src: '{{ asset('assets/success4.jpg') }}', alt: 'Tournoi Féminin Scrabble' },
                  { src: '{{ asset('assets/success1.jpg') }}', alt: 'Bavaria Pool Vibes 2026' },

             ],
             images: [],
             resetTimeout: null,
             init() {
                 // 100 répétitions (400 images) pour garantir un défilement infini sans faille
                 this.images = Array(100).fill(this.baseImages).flat();
             },
             touchStartX: 0,
             touchEndX: 0,
             handleSwipe() {
                 if (this.touchStartX - this.touchEndX > 50) this.next();
                 else if (this.touchEndX - this.touchStartX > 50) this.prev();
             },
             next() {
                 this.active++;
                 this.checkReset();
             },
             prev() {
                 this.active--;
                 this.checkReset();
             },
             checkReset() {
                 // Permet de cliquer très vite sans bloquer l'animation
                 clearTimeout(this.resetTimeout);
                 this.resetTimeout = setTimeout(() => {
                     // Recalibrage très large (sécurité)
                     if(this.active >= 380 || this.active <= 20) {
                         this.$refs.slider.style.transition = 'none';
                         this.active = 200 + (this.active % 4);
                         setTimeout(() => { this.$refs.slider.style.transition = ''; }, 50);
                     }
                 }, 600);
             }
         }">

        <!-- Container des cartes -->
        <div x-ref="slider"
            class="relative flex items-center justify-center py-8 overflow-visible transition-transform duration-500 ease-out"
            :style="'transform: translateX(calc(50% - (' + active + ' * (var(--card-width) + var(--card-gap))) - (var(--card-width) / 2)))'"
            @touchstart="touchStartX = $event.changedTouches[0].screenX"
            @touchend="touchEndX = $event.changedTouches[0].screenX; handleSwipe()">

            <template x-for="(img, index) in images" :key="index">
                <div class="relative flex-shrink-0 transition-all duration-500 ease-in-out cursor-pointer group"
                    :style="'width: var(--card-width); height: var(--card-height); margin-right: var(--card-gap);'"
                    @click="active = index" :class="active === index 
                         ? 'z-30 scale-110 shadow-[0_0_30px_rgba(0,0,0,0.6)] brightness-100' 
                         : 'z-10 scale-100 opacity-90 brightness-[0.7] hover:scale-105 hover:z-40'">

                    <img :src="img.src" :alt="img.alt"
                        class="object-cover w-full h-full pointer-events-none select-none">

                    <!-- Overlay Sombre au Hover avec le titre animé -->
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center p-6 transition-all duration-500 opacity-0 bg-black/60 group-hover:opacity-100">
                        <h4 class="text-2xl font-bold leading-tight text-center text-white transition-transform duration-500 translate-y-8 opacity-0 md:text-3xl lg:text-4xl group-hover:translate-y-0 group-hover:opacity-100 drop-shadow-lg"
                            x-text="img.alt"></h4>
                    </div>
                </div>
            </template>
        </div>

        <!-- Flèches de navigation positionnées sur les bords extrêmes -->
        <!-- Flèche gauche -->
        <button @click="prev()"
            class="absolute top-1/2 -translate-y-1/2 left-4 md:left-8 lg:left-12 bg-white text-gray-800 hover:text-[#f5771d] w-12 h-12 md:w-14 md:h-14 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl focus:outline-none transition-all duration-300 z-40 hover:scale-105"
            aria-label="Succès précédent">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor" class="w-6 h-6 md:w-8 md:h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>

        <!-- Flèche droite -->
        <button @click="next()"
            class="absolute top-1/2 -translate-y-1/2 right-4 md:right-8 lg:right-12 bg-white text-gray-800 hover:text-[#f5771d] w-12 h-12 md:w-14 md:h-14 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl focus:outline-none transition-all duration-300 z-40 hover:scale-105"
            aria-label="Succès suivant">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor" class="w-6 h-6 md:w-8 md:h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    </div>

    <!-- Conteneur pour le Bouton CTA (Centré et contraint en largeur) -->
    <div class="px-4 mx-auto mt-12 max-w-7xl text-center">
        <a href="#portfolio"
            class="inline-block bg-[#f5771d] hover:bg-[#e06917] text-white font-bold text-base md:text-lg px-8 py-3.5 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 focus:ring-4 focus:ring-[#f5771d]/50">
            Découvrir toutes nos réalisations
        </a>
    </div>

    <style>
        .success-carousel {
            --card-width: 85vw;
            --card-gap: 0px;
            --card-height: 50vh;
        }

        @media (min-width: 640px) {
            .success-carousel {
                --card-width: 45vw;
                --card-gap: 0px;
                --card-height: 60vh;
            }
        }

        @media (min-width: 1024px) {
            .success-carousel {
                --card-width: 25vw;
                --card-gap: 0px;
                --card-height: 70vh;
            }
        }
    </style>
</section>