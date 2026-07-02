<header class="fixed top-0 left-0 right-0 z-50 w-full pt-6 transition-all duration-300"
    x-data="{ mobileMenuOpen: false }">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Barre de navigation principale -->
        <nav
            class="flex items-center justify-between px-6 py-3 md:py-4 bg-[#e8e2d7]/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/30">

            <!-- Logo Responsive -->
            <div class="flex-shrink-0">
                <a href="/" class="focus:outline-none focus:ring-2 focus:ring-[#f5771d] rounded">
                    <!-- On s'assure que le logo a une hauteur flexible selon l'écran -->
                    <img src="{{ asset('assets/logo.png') }}" alt="Allsmart Logo"
                        class="w-auto h-8 sm:h-10 md:h-12 transition-transform hover:scale-105 duration-300">
                </a>
            </div>

            <!-- Liens de navigation (Desktop) -->
            <div class="hidden lg:flex items-center space-x-6 xl:space-x-8">
                <a href="#qui-sommes-nous"
                    class="text-sm xl:text-base font-bold text-gray-900 transition-colors hover:text-[#f5771d]">Qui
                    sommes-nous ?</a>

                <div class="relative group">
                    <button
                        class="flex items-center text-sm xl:text-base font-bold text-gray-900 transition-colors hover:text-[#f5771d] focus:outline-none">
                        Nos services
                        <svg class="w-3.5 h-3.5 ml-1.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 18l6-6-6-6v12z" />
                        </svg>
                    </button>
                </div>

                <div class="relative group">
                    <button
                        class="flex items-center text-sm xl:text-base font-bold text-gray-900 transition-colors hover:text-[#f5771d] focus:outline-none">
                        Réalisations
                        <svg class="w-3.5 h-3.5 ml-1.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 18l6-6-6-6v12z" />
                        </svg>
                    </button>
                </div>

                <a href="#blog"
                    class="text-sm xl:text-base font-bold text-gray-900 transition-colors hover:text-[#f5771d]">Blog</a>
            </div>

            <!-- Call to Action & Langue (Desktop) -->
            <div class="hidden lg:flex items-center space-x-4 xl:space-x-6">
                <a href="#rendez-vous"
                    class="px-5 xl:px-6 py-2.5 text-sm font-bold text-white transition-all duration-300 bg-[#f5771d] rounded-md hover:bg-[#de6916] shadow-md hover:-translate-y-0.5 focus:ring-4 focus:ring-[#f5771d]/50">
                    Prendre rendez-vous
                </a>

                <!-- Drapeau Français (Bouton de langue) -->
                <button
                    class="flex items-center justify-center w-8 h-8 xl:w-9 xl:h-9 overflow-hidden transition-transform duration-300 border-2 border-gray-200 rounded-full shadow-sm hover:scale-110 focus:outline-none focus:ring-2 focus:ring-[#f5771d]"
                    aria-label="Changer de langue">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3 2"
                        class="object-cover rounded w-full h-full">
                        <rect width="3" height="2" fill="#ED2939" />
                        <rect width="2" height="2" fill="#fff" />
                        <rect width="1" height="2" fill="#002395" />
                    </svg>
                </button>
            </div>

            <!-- Bouton Menu Mobile (Hamburger) -->
            <div class="flex items-center lg:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                    class="p-2 text-gray-900 transition-colors rounded-md hover:bg-black/5 hover:text-[#f5771d] focus:outline-none"
                    aria-label="Ouvrir le menu principal">
                    <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <!-- Icone Fermer -->
                    <svg x-show="mobileMenuOpen" style="display: none;" class="w-7 h-7" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Overlay Sombre (Arrière-plan flou) -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 bg-black/60 backdrop-blur-sm lg:hidden"
            @click="mobileMenuOpen = false" style="display: none;"></div>

        <!-- Menu Mobile (Tiroir coulissant depuis la droite) -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed inset-y-0 right-0 z-50 w-full max-w-sm px-6 py-6 overflow-y-auto bg-[#e8e2d7] shadow-2xl lg:hidden border-l border-white/40"
            style="display: none;">

            <!-- En-tête du tiroir (Logo et bouton Fermer) -->
            <div class="flex items-center justify-between mb-10">
                <a href="/" class="focus:outline-none focus:ring-2 focus:ring-[#f5771d] rounded">
                    <img src="{{ asset('assets/logo.png') }}" alt="Allsmart Logo" class="w-auto h-8 sm:h-10">
                </a>
                <button type="button" @click="mobileMenuOpen = false"
                    class="p-2 -mr-2 text-gray-900 transition-colors rounded-md hover:bg-black/10 hover:text-[#f5771d] focus:outline-none"
                    aria-label="Fermer le menu">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Liens de navigation -->
            <div class="flex flex-col space-y-6">
                <div class="flex flex-col space-y-2">
                    <a href="#qui-sommes-nous"
                        class="block px-4 py-3 text-lg font-bold text-gray-900 transition-all rounded-xl hover:bg-white/50 hover:text-[#f5771d] hover:translate-x-2">Qui
                        sommes-nous ?</a>
                    <a href="#services"
                        class="block px-4 py-3 text-lg font-bold text-gray-900 transition-all rounded-xl hover:bg-white/50 hover:text-[#f5771d] hover:translate-x-2">Nos
                        services</a>
                    <a href="#realisations"
                        class="block px-4 py-3 text-lg font-bold text-gray-900 transition-all rounded-xl hover:bg-white/50 hover:text-[#f5771d] hover:translate-x-2">Réalisations</a>
                    <a href="#blog"
                        class="block px-4 py-3 text-lg font-bold text-gray-900 transition-all rounded-xl hover:bg-white/50 hover:text-[#f5771d] hover:translate-x-2">Blog</a>
                </div>

                <hr class="border-gray-300/60">

                <!-- Call-to-Action & Langue -->
                <div class="flex flex-col gap-6 pt-4">
                    <a href="#rendez-vous"
                        class="flex items-center justify-center w-full px-6 py-4 text-base font-bold text-white transition-all duration-300 bg-[#f5771d] rounded-xl shadow-lg hover:bg-[#de6916] hover:-translate-y-1">
                        Prendre rendez-vous
                    </a>

                    <div class="flex justify-center">
                        <button
                            class="w-12 h-12 overflow-hidden transition-transform border-4 border-white rounded-full shadow-lg hover:scale-110 focus:outline-none focus:ring-4 focus:ring-[#f5771d]/50"
                            aria-label="Langue: Français">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3 2"
                                class="object-cover w-full h-full">
                                <rect width="3" height="2" fill="#ED2939" />
                                <rect width="2" height="2" fill="#fff" />
                                <rect width="1" height="2" fill="#002395" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>