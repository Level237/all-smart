<section
    class="relative flex items-center justify-center w-full h-screen min-h-[600px] bg-gray-900 bg-center bg-no-repeat bg-cover"
    style="background-image: url('{{ asset('assets/slider1.jpg') }}');">
    <!-- Overlay sombre pour la lisibilité du texte -->
    <div class="absolute inset-0 bg-black/45"></div>

    <!-- Contenu du Hero -->
    <div class="relative z-10 flex flex-col items-center justify-center px-4 mx-auto text-center text-white max-w-7xl">
        <h1
            class="mb-4 text-5xl max-sm:text-4xl font-extrabold tracking-tight uppercase md:text-6xl lg:text-7xl drop-shadow-lg">
            Faites rayonner<br />votre marque
        </h1>
        <p
            class="mb-10 text-lg font-medium tracking-widest uppercase md:text-xl lg:text-2xl drop-shadow-md text-gray-100">
            Strategie, image & impact
        </p>

        <!-- Boutons d'action -->
        <div class="flex flex-col items-center justify-center w-full gap-4 sm:flex-row sm:w-auto">
            <a href="#services"
                class="w-full sm:w-auto px-8 py-3.5 text-sm font-bold text-gray-900 transition-all duration-300 bg-white rounded-md shadow-lg hover:bg-gray-100 hover:-translate-y-0.5 focus:ring-4 focus:ring-white/50">
                Découvrir nos services
            </a>
            <a href="#rendez-vous"
                class="w-full sm:w-auto px-8 py-3.5 text-sm font-bold text-white transition-all duration-300 bg-[#f5771d] rounded-md shadow-lg hover:bg-[#de6916] hover:-translate-y-0.5 focus:ring-4 focus:ring-[#f5771d]/50">
                Prendre rendez-vous
            </a>
        </div>
    </div>

    <!-- Navigation du slider (Statique pour le moment) -->
    <div class="absolute flex items-center justify-center space-x-2 bottom-8">
        <button class="w-3 h-3 transition-colors duration-300 rounded-full bg-[#f5771d] shadow-sm hover:bg-[#de6916]"
            aria-label="Slide 1"></button>
        <button class="w-6 h-1.5 transition-colors duration-300 rounded-full bg-white/60 hover:bg-white shadow-sm"
            aria-label="Slide 2"></button>
        <button class="w-6 h-1.5 transition-colors duration-300 rounded-full bg-white/60 hover:bg-white shadow-sm"
            aria-label="Slide 3"></button>
    </div>
</section>