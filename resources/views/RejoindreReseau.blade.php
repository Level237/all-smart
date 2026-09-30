@extends('layouts.main')

@section('title', "Rejoindre le Réseau AllSmart - Inscription Créateur")
@section('meta_description', "Rejoignez le réseau AllSmart de créateurs et influenceurs. Créez votre profil pour accéder aux collaborations de marques.")

@section('content')
    <!-- Hero Banner Image -->
    <section class="relative w-full overflow-hidden">
        <div class="relative h-[220px] sm:h-[300px] md:h-[380px] lg:h-[440px] w-full">
            <img src="{{ asset('assets/services/marketing-influence/hero-createur.jpg') }}" 
                 alt="Rejoindre le réseau AllSmart - Créateurs de contenu" 
                 class="h-full w-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black/25 via-transparent to-black/10"></div>
        </div>
    </section>

    <!-- Section Formulaire -->
    <section class="bg-white py-12 sm:py-16 md:py-20 lg:py-24" 
             x-data="{
                photoPreview: null,
                selectedLanguages: ['Français'],
                selectedNiches: ['Lifestyle'],
                selectedPlatform: 'facebook',
                platformUrl: '',
                status: 'Disponible',
                acceptConditions: false,
                submitted: false,
                loading: false,
                errorMessage: '',
                toggleItem(array, item) {
                    const idx = array.indexOf(item);
                    if (idx > -1) {
                        if (array.length > 1) array.splice(idx, 1);
                    } else {
                        array.push(item);
                    }
                },
                handlePhotoChange(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.photoPreview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                },
                submitForm() {
                    if (!this.acceptConditions) {
                        alert('Veuillez accepter les conditions pour continuer.');
                        return;
                    }
                    this.loading = true;
                    this.errorMessage = '';
                    const formData = new FormData(this.$refs.form);
                    
                    fetch('{{ route('creators.apply.submit') }}', {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        },
                        body: formData
                    })
                    .then(async response => {
                        if (!response.ok) {
                            const err = await response.json().catch(() => ({}));
                            throw new Error(err.message || 'Une erreur est survenue lors de l\'enregistrement.');
                        }
                        return response.json();
                    })
                    .then(data => {
                        this.submitted = true;
                        this.loading = false;
                        window.scrollTo({ top: 350, behavior: 'smooth' });
                    })
                    .catch(error => {
                        this.loading = false;
                        this.errorMessage = error.message;
                        alert(this.errorMessage);
                    });
                }
             }">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            
            <!-- Grand Titre Orange -->
            <div class="text-left mb-8 sm:mb-12">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[46px] font-black uppercase tracking-tight text-[#F5791F]">
                    REJOINDRE LE RESEAU ALLSMART
                </h1>
            </div>

            <!-- Message de Succès si formulaire soumis -->
            <div x-show="submitted" 
                 x-cloak
                 class="mb-10 rounded-2xl bg-green-50 border border-green-200 p-8 text-center shadow-lg">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-100 text-green-600 mb-4 shadow-sm">
                    <svg class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-green-900">Votre candidature a été envoyée avec succès !</h2>
                <p class="mt-2 text-base text-green-700 max-w-lg mx-auto">
                    Merci d'avoir rejoint le réseau AllSmart. Notre équipe étudiera votre profil sous 48h et vous recontactera avec nos opportunités de campagnes.
                </p>
            </div>

            <!-- Card Container Grise avec Bande Supérieure Muted Teal & Relief Moderne -->
            <div x-show="!submitted" class="overflow-hidden rounded-[20px] sm:rounded-[24px] bg-[#EBECEE] shadow-[0_20px_50px_rgba(0,0,0,0.12)] border border-gray-300/70 transition-all">
                
                <!-- Bandeau Supérieur Teinté Gris/Bleu (frame Figma) -->
                <div class="h-14 sm:h-20 w-full bg-gradient-to-r from-[#7D9AA4] via-[#8DA3AB] to-[#7D9AA4] shadow-inner"></div>

                <!-- Contenu Interne de la Carte -->
                <form action="{{ route('creators.apply.submit') }}" 
                      method="POST" 
                      enctype="multipart/form-data" 
                      x-ref="form" 
                      @submit.prevent="submitForm()" 
                      class="p-6 sm:p-10 md:p-12 lg:p-16">
                    @csrf

                    <!-- Champs masqués pour les tableaux dynamiques -->
                    <template x-for="lang in selectedLanguages" :key="lang">
                        <input type="hidden" name="languages[]" :value="lang">
                    </template>
                    <template x-for="niche in selectedNiches" :key="niche">
                        <input type="hidden" name="niches[]" :value="niche">
                    </template>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-start">
                        
                        <!-- Colonne Gauche : Upload Photo (lg:col-span-4) -->
                        <div class="lg:col-span-4 flex flex-col items-center">
                            <!-- Boîte d'upload avec relief -->
                            <div class="relative w-full max-w-[280px] sm:max-w-[320px] h-[360px] sm:h-[420px] rounded-[18px] bg-[#D4D8DB] flex items-center justify-center overflow-visible shadow-[inset_0_2px_8px_rgba(0,0,0,0.15)] border-2 border-dashed border-gray-400/60 hover:border-[#F5791F]/70 transition-all group">
                                
                                <!-- Aperçu photo si chargée -->
                                <template x-if="photoPreview">
                                    <img :src="photoPreview" alt="Aperçu photo profil" class="h-full w-full object-cover rounded-[16px] shadow-sm">
                                </template>

                                <!-- Placeholder neutre si pas de photo -->
                                <template x-if="!photoPreview">
                                    <div class="flex flex-col items-center justify-center text-gray-500/80 px-4 text-center">
                                        <div class="h-20 w-20 rounded-full bg-white/40 flex items-center justify-center shadow-inner mb-3">
                                            <svg class="h-10 w-10 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs font-semibold text-gray-600 uppercase tracking-wider">Format Portrait</span>
                                    </div>
                                </template>

                                <!-- Bouton Rond Orange "+" en bas à droite avec relief et hover -->
                                <button type="button" 
                                        @click="$refs.photoInput.click()" 
                                        aria-label="Sélectionner une photo"
                                        class="absolute -bottom-4 -right-4 sm:-bottom-5 sm:-right-5 flex h-14 w-14 sm:h-16 sm:w-16 items-center justify-center rounded-full bg-[#F5791F] text-white shadow-[0_10px_25px_rgba(245,121,31,0.45)] transition-all duration-300 hover:bg-[#d6630f] hover:scale-110 hover:shadow-[0_14px_30px_rgba(245,121,31,0.6)] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/30 cursor-pointer">
                                    <svg class="h-8 w-8 sm:h-9 sm:w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>

                                <!-- Input file masqué -->
                                <input type="file" 
                                       name="photo"
                                       x-ref="photoInput" 
                                       @change="handlePhotoChange($event)" 
                                       accept="image/*" 
                                       class="hidden">
                            </div>

                            <!-- Légende sous la photo -->
                            <p class="mt-6 text-center text-base sm:text-lg font-bold text-gray-800">
                                Upload une photo
                            </p>
                        </div>

                        <!-- Colonne Droite : Champs de Formulaire (lg:col-span-8) -->
                        <div class="lg:col-span-8 space-y-4 sm:space-y-5">
                            
                            <!-- 1. Nom complet -->
                            <div>
                                <input type="text" 
                                       name="name" 
                                       required
                                       placeholder="Nom complet" 
                                       class="w-full rounded-[10px] bg-white px-5 py-3.5 text-base text-gray-800 placeholder-gray-500 shadow-[0_2px_8px_rgba(0,0,0,0.04)] border border-gray-200/80 focus:border-[#F5791F] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/15 transition-all">
                            </div>

                            <!-- 2. @pseudo -->
                            <div>
                                <input type="text" 
                                       name="handle" 
                                       required
                                       placeholder="@pseudo" 
                                       class="w-full rounded-[10px] bg-white px-5 py-3.5 text-base text-gray-800 placeholder-gray-500 shadow-[0_2px_8px_rgba(0,0,0,0.04)] border border-gray-200/80 focus:border-[#F5791F] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/15 transition-all">
                            </div>

                            <!-- 3. Bio courte -->
                            <div>
                                <textarea name="bio" 
                                          rows="3" 
                                          placeholder="Bio courte" 
                                          class="w-full rounded-[10px] bg-white px-5 py-3.5 text-base text-gray-800 placeholder-gray-500 shadow-[0_2px_8px_rgba(0,0,0,0.04)] border border-gray-200/80 focus:border-[#F5791F] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/15 transition-all resize-none"></textarea>
                            </div>

                            <!-- 4. Localisation -->
                            <div>
                                <input type="text" 
                                       name="location" 
                                       required
                                       placeholder="Localisation" 
                                       class="w-full rounded-[10px] bg-white px-5 py-3.5 text-base text-gray-800 placeholder-gray-500 shadow-[0_2px_8px_rgba(0,0,0,0.04)] border border-gray-200/80 focus:border-[#F5791F] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/15 transition-all">
                            </div>

                            <!-- 5. Langue & Badges -->
                            <div>
                                <div class="rounded-[10px] bg-white px-5 py-3.5 shadow-[0_2px_8px_rgba(0,0,0,0.04)] border border-gray-200/80">
                                    <span class="text-base text-gray-500">Langue</span>
                                </div>
                                <!-- Badges Langues avec relief interactif -->
                                <div class="mt-2.5 flex flex-wrap items-center gap-2.5">
                                    <template x-for="lang in ['Français', 'Anglais', 'Espagnol']" :key="lang">
                                        <button type="button" 
                                                @click="toggleItem(selectedLanguages, lang)"
                                                class="rounded-[8px] px-4 py-2 text-xs sm:text-sm font-bold transition-all cursor-pointer"
                                                :class="selectedLanguages.includes(lang) ? 'bg-[#3D6B7A] text-white shadow-md shadow-[#3D6B7A]/30 scale-[1.02]' : 'bg-white text-gray-700 border border-gray-200 shadow-sm hover:border-gray-300 hover:bg-gray-50'"
                                                x-text="lang">
                                        </button>
                                    </template>
                                </div>
                            </div>

                            <!-- 6. Niches & Badges -->
                            <div>
                                <div class="rounded-[10px] bg-white px-5 py-3.5 shadow-[0_2px_8px_rgba(0,0,0,0.04)] border border-gray-200/80">
                                    <span class="text-base text-gray-500">Niches</span>
                                </div>
                                <!-- Badges Niches avec relief interactif -->
                                <div class="mt-2.5 flex flex-wrap items-center gap-2.5">
                                    <template x-for="niche in ['Lifestyle', 'Beauté', 'Mode', 'Entrepreneur']" :key="niche">
                                        <button type="button" 
                                                @click="toggleItem(selectedNiches, niche)"
                                                class="rounded-[8px] px-4 py-2 text-xs sm:text-sm font-bold transition-all cursor-pointer"
                                                :class="selectedNiches.includes(niche) ? 'bg-[#3D6B7A] text-white shadow-md shadow-[#3D6B7A]/30 scale-[1.02]' : 'bg-white text-gray-700 border border-gray-200 shadow-sm hover:border-gray-300 hover:bg-gray-50'"
                                                x-text="niche">
                                        </button>
                                    </template>
                                </div>
                            </div>

                            <!-- 7. Plateformes -->
                            <div class="rounded-[10px] bg-white px-5 py-4 shadow-[0_2px_8px_rgba(0,0,0,0.04)] border border-gray-200/80">
                                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                    <span class="text-base font-bold text-gray-800 sm:w-28 shrink-0">Plateformes</span>
                                    
                                    <div class="flex flex-wrap items-center gap-x-5 gap-y-2.5 text-sm font-medium text-gray-700">
                                        <template x-for="plat in ['facebook', 'TikTok', 'X', 'Instagram', 'Linkedin', 'Snapchat', 'Youtube']" :key="plat">
                                            <label class="inline-flex items-center gap-2 cursor-pointer transition-colors hover:text-[#F5791F]">
                                                <input type="radio" 
                                                       name="platform" 
                                                       :value="plat" 
                                                       x-model="selectedPlatform"
                                                       class="h-4 w-4 text-[#F5791F] border-gray-300 focus:ring-[#F5791F]">
                                                <span x-text="plat" class="capitalize"></span>
                                            </label>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <!-- 8. Lien URL Plateforme dynamique -->
                            <div>
                                <input type="url" 
                                       name="platform_url" 
                                       x-model="platformUrl"
                                       :placeholder="'Lien URL ' + (selectedPlatform ? selectedPlatform.charAt(0).toUpperCase() + selectedPlatform.slice(1) : 'Facebook')" 
                                       class="w-full rounded-[10px] bg-white px-5 py-3.5 text-base text-gray-800 placeholder-gray-500 shadow-[0_2px_8px_rgba(0,0,0,0.04)] border border-gray-200/80 focus:border-[#F5791F] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/15 transition-all">
                            </div>

                            <!-- 9. Status -->
                            <div class="rounded-[10px] bg-white px-5 py-4 shadow-[0_2px_8px_rgba(0,0,0,0.04)] border border-gray-200/80">
                                <div class="flex items-center gap-4">
                                    <span class="text-base font-bold text-gray-800 sm:w-28 shrink-0">Status</span>
                                    
                                    <div class="flex items-center gap-6 text-sm font-medium text-gray-700">
                                        <label class="inline-flex items-center gap-2 cursor-pointer hover:text-[#3D6B7A]">
                                            <input type="radio" 
                                                   name="status" 
                                                   value="Disponible" 
                                                   x-model="status" 
                                                   class="h-4 w-4 text-[#3D6B7A] border-gray-300 focus:ring-[#3D6B7A]">
                                            <span>Disponible</span>
                                        </label>

                                        <label class="inline-flex items-center gap-2 cursor-pointer hover:text-[#3D6B7A]">
                                            <input type="radio" 
                                                   name="status" 
                                                   value="Sur demande" 
                                                   x-model="status" 
                                                   class="h-4 w-4 text-[#3D6B7A] border-gray-300 focus:ring-[#3D6B7A]">
                                            <span>Sur demande</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- 10. Conditions d'inscription -->
                            <div class="pt-2">
                                <label class="inline-flex items-start gap-2.5 cursor-pointer">
                                    <input type="checkbox" 
                                           x-model="acceptConditions" 
                                           required
                                           class="mt-1 h-4 w-4 rounded text-[#F5791F] border-gray-300 focus:ring-[#F5791F]">
                                    <span class="text-base font-bold text-gray-800">Conditions</span>
                                </label>

                                <div class="mt-2 text-xs leading-relaxed text-gray-600 pl-6 space-y-2">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercice ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                    <p class="font-medium text-gray-700">
                                        L'inscription est gratuite. Votre profil sera étudié avant toute proposition de collaboration.
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Bouton Submit "S'inscrire" (Centré en bas) -->
                    <div class="mt-12 sm:mt-16 flex justify-center">
                        <button type="submit" 
                                class="inline-flex items-center justify-center rounded-xl bg-[#F5791F] px-14 sm:px-20 py-4.5 text-xl font-black text-white shadow-[0_14px_30px_rgba(245,121,31,0.4)] transition-all duration-300 hover:bg-[#d6630f] hover:scale-[1.03] hover:shadow-[0_18px_38px_rgba(245,121,31,0.55)] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/30 cursor-pointer">
                            S'inscrire
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </section>

      <section class="w-full bg-[#F5791F] overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <!-- Colonne Gauche : Image -->
            <div class="relative min-h-[340px] sm:min-h-[420px] lg:min-h-[480px] w-full">
                <img src="{{ asset('assets/services/marketing-influence/influences-section1.jpg') }}" 
                     alt="Sélection d'influenceurs AllSmart" 
                     class="h-full w-full object-cover object-center">
            </div>

            <!-- Colonne Droite : Bloc Orange #F5791F -->
            <div class="flex flex-col justify-center bg-[#F5791F] p-8 sm:p-12 md:p-16 lg:p-20 text-white">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight text-white leading-tight">
                    VOUS ÊTES UNE MARQUE ?
                </h2>

                <p class="mt-4 text-base sm:text-lg lg:text-xl font-medium text-white/95 leading-relaxed max-w-xl">
                    Créer de l'attention autour d'un nouveau produit, service ou événement avec notre sélection premium d’influenceurs
                </p>

                <div class="mt-8 sm:mt-10">
                    <a href="/services/marketing-d-influence#contact" 
                       class="inline-flex items-center justify-center rounded-xl bg-white px-8 py-4 text-base sm:text-lg font-bold text-[#F5791F] shadow-md transition-all duration-300 hover:bg-white/95 hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-white/40">
                        Créer votre campagne d’influence
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
