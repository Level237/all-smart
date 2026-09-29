@extends('layouts.main')

@section('title', "Contactez-nous - Allsmart")
@section('meta_description', "Contactez l'agence AllSmart pour vos projets de stratégie de marque, création de contenus, community management et marketing d'influence.")

@section('content')
    <!-- Hero Banner Image (Standard AllSmart) -->
    <section class="relative w-full overflow-hidden">
        <div class="relative h-[240px] sm:h-[320px] md:h-[400px] lg:h-[460px] w-full">
            <img src="{{ asset('assets/slideabout.jpg') }}" 
                 alt="Contactez AllSmart" 
                 class="h-full w-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black/25 via-transparent to-black/10"></div>
        </div>
    </section>

    <!-- Section Principale de Contact -->
    <section class="bg-white py-12 sm:py-16 md:py-20 lg:py-24"
             x-data="{
                subject: 'Stratégie & Conseil',
                submitted: false,
                name: '',
                email: '',
                phone: '',
                company: '',
                message: '',
                submitForm() {
                    this.submitted = true;
                    window.scrollTo({ top: 350, behavior: 'smooth' });
                }
             }">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            
            <!-- En-tête Titre Standard Ubuntu Black -->
            <div class="mb-10 sm:mb-14">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black uppercase tracking-tight text-[#F5791F]">
                    CONTACTEZ-NOUS
                </h1>
                <p class="mt-2 text-base sm:text-lg text-[#555555] max-w-2xl font-normal">
                    Une question, une demande de collaboration ou un projet à nous confier ? Notre équipe vous répond sous 24 heures ouvrées.
                </p>
            </div>

            <!-- Grille Split-Screen 2 Colonnes -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- COLONNE GAUCHE : Coordonnées & Présence Agence (lg:col-span-5) -->
                <div class="lg:col-span-5 rounded-[20px] bg-[#FAF4EF] border border-[#F4E6D9] p-6 sm:p-8 md:p-10 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-[#F5791F]">
                            AllSmart Agency
                        </span>
                        
                        <h2 class="mt-1 text-2xl sm:text-3xl font-black tracking-tight text-[#1A1A1A]">
                            Parlons de votre marque
                        </h2>
                        
                        <p class="mt-3 text-sm sm:text-base text-[#555555] leading-relaxed">
                            Basée à Douala avec un rayonnement international, notre agence conçoit des stratégies sur-mesure pour amplifier votre visibilité et votre crédibilité.
                        </p>

                        <!-- Liste des Coordonnées Épurées -->
                        <div class="mt-8 space-y-6">
                            
                            <!-- Téléphone & WhatsApp -->
                            <div class="flex items-start gap-4">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white border border-[#F4E6D9] text-[#1A1A1A] shadow-sm">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold uppercase tracking-wider text-gray-500">Téléphone & WhatsApp</span>
                                    <a href="tel:+237612345678" class="mt-0.5 block text-base font-bold text-[#1A1A1A] hover:text-[#F5791F] transition-colors">
                                        +237 612 345 678
                                    </a>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-start gap-4">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white border border-[#F4E6D9] text-[#1A1A1A] shadow-sm">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold uppercase tracking-wider text-gray-500">Adresse Email</span>
                                    <a href="mailto:contact@allsmart-consulting.com" class="mt-0.5 block text-sm sm:text-base font-bold text-[#1A1A1A] hover:text-[#F5791F] transition-colors break-all">
                                        contact@allsmart-consulting.com
                                    </a>
                                </div>
                            </div>

                            <!-- Localisation -->
                            <div class="flex items-start gap-4">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white border border-[#F4E6D9] text-[#1A1A1A] shadow-sm">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold uppercase tracking-wider text-gray-500">Bureaux</span>
                                    <p class="mt-0.5 text-sm sm:text-base font-semibold text-[#1A1A1A] leading-snug">
                                        Bali, Avenue Jamaica<br>Rue 237, Douala — Cameroun
                                    </p>
                                </div>
                            </div>

                            <!-- Horaires -->
                            <div class="flex items-start gap-4">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white border border-[#F4E6D9] text-[#1A1A1A] shadow-sm">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold uppercase tracking-wider text-gray-500">Horaires</span>
                                    <p class="mt-0.5 text-sm sm:text-base font-medium text-[#1A1A1A]">
                                        Lundi au Vendredi : 08h30 - 18h00
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Encart Passerelle vers Rendez-vous -->
                    <div class="mt-10 pt-6 border-t border-[#F4E6D9]">
                        <p class="text-xs text-gray-600 font-medium">
                            Vous souhaitez planifier une séance de travail ou un échange stratégique ?
                        </p>
                        <a href="/rendez-vous" class="mt-2.5 inline-flex items-center gap-2 text-sm font-bold text-[#F5791F] hover:underline">
                            <span>Prendre un rendez-vous dédié</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>

                </div>

                <!-- COLONNE DROITE : Formulaire Soigné & Épuré (lg:col-span-7) -->
                <div class="lg:col-span-7 rounded-[20px] bg-white border border-gray-200 p-6 sm:p-8 md:p-10 shadow-sm">
                    
                    <!-- Message de Confirmation de Soumission -->
                    <div x-show="submitted" 
                         x-cloak
                         class="rounded-xl bg-gray-50 border border-gray-200 p-8 text-center">
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#F5791F]/15 text-[#F5791F] mb-4">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-black text-[#1A1A1A]">Message bien reçu</h3>
                        <p class="mt-2 text-sm text-[#555555] max-w-md mx-auto">
                            Merci de nous avoir contactés. Notre équipe reviendra vers vous sous 24h avec les informations adaptées à votre projet.
                        </p>
                        <button type="button" 
                                @click="submitted = false; message = ''" 
                                class="mt-6 inline-flex items-center justify-center rounded-xl bg-[#F5791F] px-7 py-3 text-sm font-bold text-white transition-all hover:bg-[#d6630f]">
                            Envoyer un nouveau message
                        </button>
                    </div>

                    <!-- Formulaire Interactif -->
                    <div x-show="!submitted">
                        <h2 class="text-xl sm:text-2xl font-black tracking-tight text-[#1A1A1A]">
                            Envoyer un message
                        </h2>
                        <p class="mt-1 text-sm text-[#555555]">
                            Complétez le formulaire ci-dessous pour démarrer l'échange.
                        </p>

                        <form @submit.prevent="submitForm()" class="mt-6 space-y-4">
                            
                            <!-- Objet de la Demande (Select épuré) -->
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                    Objet de votre demande <span class="text-[#F5791F]">*</span>
                                </label>
                                <select x-model="subject" 
                                        required
                                        class="w-full rounded-xl bg-white px-4 py-3 text-sm sm:text-base text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                                    <option value="Stratégie & Conseil">Stratégie & Conseil</option>
                                    <option value="Community Management">Community Management</option>
                                    <option value="Création de Contenus">Création de Contenus</option>
                                    <option value="Personal Branding">Personal Branding</option>
                                    <option value="Site Internet">Site Internet</option>
                                    <option value="Activations & Événementiel">Activations & Événementiel</option>
                                    <option value="Marketing d'Influence">Marketing d'Influence</option>
                                    <option value="Solutions & Packs">Solutions & Packs AllSmart</option>
                                    <option value="Autre demande">Autre demande</option>
                                </select>
                            </div>

                            <!-- Nom & Entreprise (Grid 2 colonnes) -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                        Nom & Prénom <span class="text-[#F5791F]">*</span>
                                    </label>
                                    <input type="text" 
                                           x-model="name"
                                           required
                                           placeholder="Votre nom" 
                                           class="w-full rounded-xl bg-white px-4 py-3 text-sm sm:text-base text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                        Entreprise / Marque <span class="text-xs text-gray-400 lowercase font-normal">(optionnel)</span>
                                    </label>
                                    <input type="text" 
                                           x-model="company"
                                           placeholder="Nom de votre structure" 
                                           class="w-full rounded-xl bg-white px-4 py-3 text-sm sm:text-base text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                                </div>
                            </div>

                            <!-- Email & Téléphone (Grid 2 colonnes) -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                        Adresse Email <span class="text-[#F5791F]">*</span>
                                    </label>
                                    <input type="email" 
                                           x-model="email"
                                           required
                                           placeholder="nom@exemple.com" 
                                           class="w-full rounded-xl bg-white px-4 py-3 text-sm sm:text-base text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                        Téléphone / WhatsApp <span class="text-[#F5791F]">*</span>
                                    </label>
                                    <input type="tel" 
                                           x-model="phone"
                                           required
                                           placeholder="+237 ..." 
                                           class="w-full rounded-xl bg-white px-4 py-3 text-sm sm:text-base text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                                </div>
                            </div>

                            <!-- Message -->
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                    Votre message <span class="text-[#F5791F]">*</span>
                                </label>
                                <textarea x-model="message"
                                          required
                                          rows="4" 
                                          placeholder="Présentez brièvement vos besoins, votre calendrier ou vos objectifs..." 
                                          class="w-full rounded-xl bg-white px-4 py-3 text-sm sm:text-base text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all resize-none"></textarea>
                            </div>

                            <!-- Bouton d'action AllSmart -->
                            <div class="pt-2">
                                <button type="submit" 
                                        class="w-full inline-flex items-center justify-center gap-2.5 rounded-xl bg-[#F5791F] px-8 py-4 text-base font-bold text-white shadow-md transition-all duration-300 hover:bg-[#d6630f] hover:scale-[1.01] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/30 cursor-pointer">
                                    <span>Envoyer le message</span>
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
