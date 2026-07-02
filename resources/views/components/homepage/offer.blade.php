<section id="offres" class="relative py-24 bg-center bg-fixed bg-no-repeat bg-cover sm:py-32"
    style="background-image: url('{{ asset('assets/slider1.jpg') }}');">
    <!-- Overlay sombre sur toute la section pour faire ressortir les cartes -->
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm"></div>

    <div class="relative z-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <!-- En-tête de la section -->
        <div class="mb-16 text-center md:mb-24">
            <h2 class="text-4xl z-10 font-bold tracking-tight text-white  sm:text-5xl lg:text-6xl">
                <span class="text-[#f5771d] font-zeyada  text-5xl sm:text-6xl lg:text-7xl"> Nos offres</span>

            </h2>
            <h2 class="mt-[-20px] z-5 text-white font-bold text-4xl tracking-tight">Chez AllSmart</h2>

        </div>

        <!-- Grille des 3 offres -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3 md:gap-6 lg:gap-10">

            <!-- Composant Offre 1 -->
            <div
                class="relative overflow-hidden group h-[450px] shadow-xl cursor-pointer flex flex-col rounded-sm bg-black">
                <!-- Image -->
                <div
                    class="relative flex-1 w-full overflow-hidden transition-opacity duration-500 opacity-90 group-hover:opacity-100">
                    <img src="{{ asset('assets/offre1.jpg') }}" alt="Offre 1"
                        class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105">
                </div>

                <!-- Bande Orange Extensible -->
                <div
                    class="relative flex flex-col items-center justify-end w-full h-20 transition-all duration-500 bg-[#f5771d] group-hover:h-56">

                    <!-- Forme décorative ombre diagonale -->
                    <div
                        class="absolute inset-0 overflow-hidden opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                        <div class="absolute bottom-0 right-0 w-full h-full bg-black/10"
                            style="clip-path: polygon(100% 0, 100% 100%, 0% 100%);"></div>
                    </div>

                    <!-- Cercle Icone -->
                    <div
                        class="absolute top-0 z-20 flex items-center justify-center w-20 h-20 transition-transform duration-500 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-full shadow-[0_4px_15px_rgba(0,0,0,0.15)] left-1/2">
                        <img src="{{ asset('assets/solution.png') }}" alt="Solution" class="object-contain w-10 h-10">
                    </div>

                    <!-- Texte -->
                    <div
                        class="z-10 flex flex-col items-center justify-center w-full pb-8 transition-all duration-500 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100">
                        <h3 class="text-[32px] leading-tight text-center text-white">
                            <span class="font-light">Strategie</span><br>
                            <span class="font-bold">Marketing</span>
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Composant Offre 2 -->
            <div
                class="relative overflow-hidden group h-[450px] shadow-xl cursor-pointer flex flex-col rounded-sm bg-black">
                <div
                    class="relative flex-1 w-full overflow-hidden transition-opacity duration-500 opacity-90 group-hover:opacity-100">
                    <img src="{{ asset('assets/offre2.jpg') }}" alt="Offre 2"
                        class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105">
                </div>

                <div
                    class="relative flex flex-col items-center justify-end w-full h-20 transition-all duration-500 bg-[#f5771d] group-hover:h-56">
                    <div
                        class="absolute inset-0 overflow-hidden opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                        <div class="absolute bottom-0 right-0 w-full h-full bg-black/10"
                            style="clip-path: polygon(100% 0, 100% 100%, 0% 100%);"></div>
                    </div>

                    <div
                        class="absolute top-0 z-20 flex items-center justify-center w-20 h-20 transition-transform duration-500 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-full shadow-[0_4px_15px_rgba(0,0,0,0.15)] left-1/2">
                        <img src="{{ asset('assets/price.png') }}" alt="Prix" class="object-contain w-10 h-10">
                    </div>

                    <div
                        class="z-10 flex flex-col items-center justify-center w-full pb-8 transition-all duration-500 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100">
                        <h3 class="text-[32px] leading-tight text-center text-white">
                            <span class="font-light">Tarifs</span><br>
                            <span class="font-bold">Compétitifs</span>
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Composant Offre 3 -->
            <div
                class="relative overflow-hidden group h-[450px] shadow-xl cursor-pointer flex flex-col rounded-sm bg-black">
                <div
                    class="relative flex-1 w-full overflow-hidden transition-opacity duration-500 opacity-90 group-hover:opacity-100">
                    <img src="{{ asset('assets/offre3.jpg') }}" alt="Offre 3"
                        class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105">
                </div>

                <div
                    class="relative flex flex-col items-center justify-end w-full h-20 transition-all duration-500 bg-[#f5771d] group-hover:h-56">
                    <div
                        class="absolute inset-0 overflow-hidden opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                        <div class="absolute bottom-0 right-0 w-full h-full bg-black/10"
                            style="clip-path: polygon(100% 0, 100% 100%, 0% 100%);"></div>
                    </div>

                    <div
                        class="absolute top-0 z-20 flex items-center justify-center w-20 h-20 transition-transform duration-500 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-full shadow-[0_4px_15px_rgba(0,0,0,0.15)] left-1/2">
                        <img src="{{ asset('assets/like.png') }}" alt="Satisfaction" class="object-contain w-10 h-10">
                    </div>

                    <div
                        class="z-10 flex flex-col items-center justify-center w-full pb-8 transition-all duration-500 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100">
                        <h3 class="text-[32px] leading-tight text-center text-white">
                            <span class="font-light">Satisfaction</span><br>
                            <span class="font-bold">Garantie</span>
                        </h3>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-16 flex justify-center">
            <a class="bg-white px-7 font-bold rounded rounded-md text-xl py-4" href="">Découvrir les détails de nos
                services</a>
        </div>
    </div>
</section>