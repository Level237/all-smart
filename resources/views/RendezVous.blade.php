@extends('layouts.main')

@section('title', "Prendre Rendez-vous - Allsmart")
@section('meta_description', "Réservez votre consultation stratégique de 30 minutes avec les experts AllSmart, en visioconférence ou dans nos bureaux à Douala.")

@section('content')
    <!-- Hero Banner Image (Standard AllSmart) -->
    <section class="relative w-full overflow-hidden">
        <div class="relative h-[240px] sm:h-[320px] md:h-[400px] lg:h-[460px] w-full">
            <img src="{{ asset('assets/slideabout.jpg') }}" 
                 alt="Prendre rendez-vous chez AllSmart" 
                 class="h-full w-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black/25 via-transparent to-black/10"></div>
        </div>
    </section>

    <!-- Section Principale de Prise de Rendez-vous -->
    <section class="bg-white py-12 sm:py-16 md:py-20 lg:py-24" x-data="appointmentBooking()">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            
            <!-- En-tête Titre Standard Ubuntu Black -->
            <div class="mb-10 sm:mb-14">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black uppercase tracking-tight text-[#F5791F]">
                    PRENDRE RENDEZ-VOUS
                </h1>
                <p class="mt-2 text-base sm:text-lg text-[#555555] max-w-2xl font-normal">
                    Planifiez un échange de cadrage stratégique de 30 minutes avec un consultant AllSmart, en visioconférence ou dans nos locaux à Douala.
                </p>
            </div>

            <!-- Grille Split-Screen 2 Colonnes -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- COLONNE RÉCAPITULATIF : En dessous sur mobile (order-2), sticky à gauche sur desktop (lg:order-1) -->
                <div class="order-2 lg:order-1 lg:col-span-5 rounded-[20px] bg-[#FAF4EF] border border-[#F4E6D9] p-6 sm:p-8 md:p-10 flex flex-col justify-between lg:sticky lg:top-28">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-[#F5791F]">
                            Consultation Stratégique
                        </span>
                        
                        <h2 class="mt-1 text-2xl sm:text-3xl font-black tracking-tight text-[#1A1A1A]">
                            Votre rendez-vous
                        </h2>
                        
                        <p class="mt-3 text-sm text-[#555555] leading-relaxed">
                            Ce premier échange nous permet de cerner vos objectifs, de diagnostiquer vos enjeux actuels et d'orienter vos prochaines actions.
                        </p>

                        <!-- Encart dynamique des choix -->
                        <div class="mt-8 space-y-4 rounded-xl bg-white border border-[#F4E6D9] p-5 shadow-sm">
                            
                            <!-- Format -->
                            <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-500">Format</span>
                                <span class="text-sm font-bold text-[#1A1A1A] flex items-center gap-1.5" x-text="meetingType === 'visio' ? 'Visioconférence (Google Meet)' : 'Présentiel (Agence Bali)'">
                                    Visioconférence (Google Meet)
                                </span>
                            </div>

                            <!-- Pôle concerné -->
                            <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-500">Pôle</span>
                                <span class="text-sm font-bold text-[#F5791F]" x-text="service">Stratégie & Conseil</span>
                            </div>

                            <!-- Date et créneau -->
                            <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-500">Date</span>
                                <span class="text-sm font-bold text-[#1A1A1A]" x-text="selectedDateLabel">Prochain jour ouvré</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-500">Créneau horaire</span>
                                <span class="text-sm font-black text-[#F5791F]" x-text="selectedTime + ' (GMT+1)'">11:00 (GMT+1)</span>
                            </div>

                        </div>

                        <!-- 3 Points de Réassurance AllSmart -->
                        <div class="mt-8 space-y-3.5 text-xs text-gray-600 font-medium">
                            <div class="flex items-start gap-2.5">
                                <svg class="h-4 w-4 text-[#F5791F] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Premier échange de 30 minutes sans engagement.</span>
                            </div>
                            <div class="flex items-start gap-2.5">
                                <svg class="h-4 w-4 text-[#F5791F] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Confirmation immédiate et rappel par email & WhatsApp.</span>
                            </div>
                            <div class="flex items-start gap-2.5">
                                <svg class="h-4 w-4 text-[#F5791F] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Locaux : Bali, Avenue Jamaica, Douala - Cameroun.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Passerelle vers Contact Simple -->
                    <div class="mt-10 pt-6 border-t border-[#F4E6D9]">
                        <p class="text-xs text-gray-600 font-medium">
                            Vous préférez simplement nous poser une question par écrit ?
                        </p>
                        <a href="/contact" class="mt-2 inline-flex items-center gap-2 text-sm font-bold text-[#F5791F] hover:underline">
                            <span>Formulaire de contact simple →</span>
                        </a>
                    </div>

                </div>

                <!-- COLONNE FORMULAIRE : En priorité sur mobile (order-1), à droite sur desktop (lg:order-2) -->
                <div class="order-1 lg:order-2 lg:col-span-7 rounded-[20px] bg-white border border-gray-200 p-6 sm:p-8 md:p-10 shadow-sm">
                    
                    <!-- Confirmation Finale -->
                    <div x-show="confirmed" 
                         x-cloak
                         class="rounded-xl bg-gray-50 border border-gray-200 p-8 sm:p-10 text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#16A34A]/10 text-[#16A34A] mb-4 shadow-sm">
                            <svg class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-black text-[#1A1A1A]">Rendez-vous confirmé !</h3>
                        <p class="mt-2 text-base text-[#555555] max-w-md mx-auto">
                            Merci <strong class="text-[#1A1A1A]" x-text="name"></strong>. Votre rendez-vous pour <strong class="text-[#F5791F]" x-text="service"></strong> a été réservé pour le <strong class="text-[#1A1A1A]" x-text="selectedDateLabel"></strong> à <strong class="text-[#1A1A1A]" x-text="selectedTime"></strong>.
                        </p>
                        <p class="mt-2 text-xs text-gray-500">
                            Un email récapitulatif contenant les détails de l'échange vient d'être envoyé à <span class="font-semibold text-gray-800" x-text="email"></span>.
                        </p>
                        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
                            <a href="/" class="w-full sm:w-auto inline-flex items-center justify-center rounded-xl bg-[#F5791F] px-8 py-3.5 text-sm font-bold text-white shadow-md hover:bg-[#d6630f] transition-all">
                                Retour à l'accueil
                            </a>
                            <button type="button" 
                                    @click="confirmed = false" 
                                    class="w-full sm:w-auto inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-6 py-3.5 text-sm font-bold text-gray-700 hover:bg-gray-50 transition-all">
                                Réserver un autre créneau
                            </button>
                        </div>
                    </div>

                    <!-- Formulaire de Réservation -->
                    <div x-show="!confirmed">
                        
                        <form @submit.prevent="confirmBooking()" class="space-y-8">
                            
                            <!-- Étape 1 : Format & Pôle d'expertise -->
                            <div>
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#F5791F] text-xs font-black text-white">1</span>
                                    <h3 class="text-lg font-black text-[#1A1A1A] tracking-tight">Format de l'échange & Pôle concerné</h3>
                                </div>

                                <!-- Choix du format (2 cartes) -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-4">
                                    <button type="button" 
                                            @click="meetingType = 'visio'"
                                            class="rounded-xl border p-4 text-left transition-all cursor-pointer"
                                            :class="meetingType === 'visio' ? 'border-[#F5791F] bg-[#FAF4EF] ring-2 ring-[#F5791F]/30' : 'border-gray-200 bg-white hover:border-gray-300'">
                                        <div class="flex items-center justify-between">
                                            <span class="font-bold text-sm text-[#1A1A1A]">Visioconférence</span>
                                            <span class="h-4 w-4 rounded-full border flex items-center justify-center" :class="meetingType === 'visio' ? 'border-[#F5791F] bg-[#F5791F]' : 'border-gray-300'">
                                                <span class="h-1.5 w-1.5 rounded-full bg-white" x-show="meetingType === 'visio'"></span>
                                            </span>
                                        </div>
                                        <p class="mt-1 text-xs text-gray-500">Lien Google Meet transmis par email</p>
                                    </button>

                                    <button type="button" 
                                            @click="meetingType = 'presentiel'"
                                            class="rounded-xl border p-4 text-left transition-all cursor-pointer"
                                            :class="meetingType === 'presentiel' ? 'border-[#F5791F] bg-[#FAF4EF] ring-2 ring-[#F5791F]/30' : 'border-gray-200 bg-white hover:border-gray-300'">
                                        <div class="flex items-center justify-between">
                                            <span class="font-bold text-sm text-[#1A1A1A]">En présentiel</span>
                                            <span class="h-4 w-4 rounded-full border flex items-center justify-center" :class="meetingType === 'presentiel' ? 'border-[#F5791F] bg-[#F5791F]' : 'border-gray-300'">
                                                <span class="h-1.5 w-1.5 rounded-full bg-white" x-show="meetingType === 'presentiel'"></span>
                                            </span>
                                        </div>
                                        <p class="mt-1 text-xs text-gray-500">À nos bureaux de Douala (Bali)</p>
                                    </button>
                                </div>

                                <!-- Sélecteur Pôle / Service -->
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                        Pôle d'expertise concerné
                                    </label>
                                    <select x-model="service" 
                                            class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                                        <option value="Stratégie & Conseil">Stratégie & Conseil</option>
                                        <option value="Marketing d'Influence">Marketing d'Influence</option>
                                        <option value="Community Management">Community Management</option>
                                        <option value="Création de Contenus">Création de Contenus</option>
                                        <option value="Personal Branding">Personal Branding</option>
                                        <option value="Site Internet">Site Internet & Digital</option>
                                        <option value="Activations & Événementiel">Activations & Événementiel</option>
                                        <option value="Solutions & Packs">Solutions & Packs AllSmart</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Étape 2 : Date & Créneau horaire -->
                            <div class="pt-2">
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#F5791F] text-xs font-black text-white">2</span>
                                    <h3 class="text-lg font-black text-[#1A1A1A] tracking-tight">Choisissez votre date & créneau</h3>
                                </div>

                                <!-- Calendrier Interactif AllSmart -->
                                <div class="rounded-2xl border border-gray-200 bg-[#FAF4EF]/40 p-4 sm:p-5 mb-5 shadow-sm">
                                    <!-- Header du calendrier (Mois, Année + Navigation) -->
                                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-gray-200/80">
                                        <div class="flex items-center gap-2">
                                            <svg class="h-5 w-5 text-[#F5791F]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="text-base font-black text-[#1A1A1A] capitalize tracking-tight" 
                                                  x-text="monthNames[currentMonth] + ' ' + currentYear">
                                                Calendrier des disponibilités
                                            </span>
                                        </div>

                                        <div class="flex items-center gap-1">
                                            <button type="button"
                                                    @click="prevMonth()"
                                                    :disabled="!canGoPrev()"
                                                    class="p-2 rounded-lg transition-colors"
                                                    :class="canGoPrev() ? 'text-gray-700 hover:bg-white hover:text-[#F5791F] shadow-sm cursor-pointer' : 'text-gray-300 cursor-not-allowed opacity-30'"
                                                    title="Mois précédent">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                                </svg>
                                            </button>

                                            <button type="button"
                                                    @click="nextMonth()"
                                                    class="p-2 rounded-lg text-gray-700 hover:bg-white hover:text-[#F5791F] shadow-sm transition-colors cursor-pointer"
                                                    title="Mois suivant">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Noms des jours de la semaine (Lun à Dim) -->
                                    <div class="grid grid-cols-7 text-center mb-1.5">
                                        <template x-for="dayName in weekDays" :key="dayName">
                                            <span class="text-[11px] sm:text-xs font-bold text-gray-400 uppercase tracking-wider py-1 select-none" 
                                                  x-text="dayName"></span>
                                        </template>
                                    </div>

                                    <!-- Grille des cellules du mois -->
                                    <div class="grid grid-cols-7 gap-1 sm:gap-1.5">
                                        <template x-for="(item, idx) in calendarDays" :key="idx">
                                            <button type="button"
                                                    @click="selectDay(item)"
                                                    :disabled="!item.isSelectable"
                                                    class="w-full h-9 sm:h-10 rounded-lg text-xs sm:text-sm flex items-center justify-center transition-all select-none"
                                                    :class="{
                                                        'bg-[#F5791F] text-white font-black shadow-sm ring-2 ring-[#F5791F]/30 cursor-pointer': item.isCurrentMonth && selectedDate === item.dateString,
                                                        'bg-white text-[#1A1A1A] font-semibold hover:bg-[#FAF4EF] hover:text-[#F5791F] border border-gray-100 hover:border-[#F4E6D9] cursor-pointer shadow-sm': item.isCurrentMonth && item.isSelectable && selectedDate !== item.dateString,
                                                        'text-gray-300 cursor-not-allowed opacity-30 bg-transparent': item.isCurrentMonth && !item.isSelectable,
                                                        'text-gray-300/20 cursor-default bg-transparent pointer-events-none': !item.isCurrentMonth
                                                    }">
                                                <span x-text="item.dayNumber"></span>
                                            </button>
                                        </template>
                                    </div>

                                    <!-- Légende discrète sous le calendrier -->
                                    <div class="mt-4 pt-3 border-t border-gray-200/70 flex flex-wrap items-center justify-between gap-2 text-[11px] text-gray-500 font-medium">
                                        <div class="flex items-center gap-1.5">
                                            <span class="h-2 w-2 rounded-full bg-[#F5791F]"></span>
                                            <span>Sélectionné</span>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <span class="h-2 w-2 rounded-full bg-white border border-gray-300"></span>
                                            <span>Disponible (Lun - Ven)</span>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <span class="h-2 w-2 rounded-full bg-gray-300"></span>
                                            <span>Fermé / Week-end</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sélecteur Heures pour le jour sélectionné -->
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-700">
                                            Heure disponible pour le <span class="text-[#F5791F]" x-text="selectedDateLabel"></span>
                                        </label>
                                        <span class="text-xs text-gray-400">Durée : 30 min</span>
                                    </div>
                                    <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                                        <template x-for="t in times" :key="t">
                                            <button type="button" 
                                                    @click="selectedTime = t"
                                                    class="rounded-xl border py-2.5 px-3 text-center text-sm font-bold transition-all cursor-pointer"
                                                    :class="selectedTime === t ? 'bg-[#F5791F] border-[#F5791F] text-white shadow-sm ring-2 ring-[#F5791F]/25' : 'bg-white border-gray-200 text-[#1A1A1A] hover:border-[#F5791F] hover:bg-[#FAF4EF]'"
                                                    x-text="t">
                                            </button>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <!-- Étape 3 : Coordonnées du contact -->
                            <div class="pt-2">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#F5791F] text-xs font-black text-white">3</span>
                                    <h3 class="text-lg font-black text-[#1A1A1A] tracking-tight">Vos coordonnées</h3>
                                </div>

                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                                Nom & Prénom <span class="text-[#F5791F]">*</span>
                                            </label>
                                            <input type="text" 
                                                   x-model="name"
                                                   required
                                                   placeholder="Votre nom" 
                                                   class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                                Entreprise / Marque <span class="text-xs text-gray-400 lowercase font-normal">(optionnel)</span>
                                            </label>
                                            <input type="text" 
                                                   x-model="company"
                                                   placeholder="Nom de votre structure" 
                                                   class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                                Adresse Email <span class="text-[#F5791F]">*</span>
                                            </label>
                                            <input type="email" 
                                                   x-model="email"
                                                   required
                                                   placeholder="nom@exemple.com" 
                                                   class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                                Téléphone / WhatsApp <span class="text-[#F5791F]">*</span>
                                            </label>
                                            <input type="tel" 
                                                   x-model="phone"
                                                   required
                                                   placeholder="+237 ..." 
                                                   class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                            Objectif principal de l'échange <span class="text-xs text-gray-400 lowercase font-normal">(optionnel)</span>
                                        </label>
                                        <textarea x-model="notes" 
                                                  rows="2" 
                                                  placeholder="Ex : Lancement d'un nouveau produit, audit de notre communication actuelle..." 
                                                  class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all resize-none"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Erreur éventuelle -->
                            <div x-show="submitError" x-cloak class="p-4 rounded-xl border border-[#DC2626]/30 bg-[#DC2626]/10 text-xs text-[#DC2626] font-medium" x-text="submitError"></div>

                            <!-- Bouton de Confirmation AllSmart -->
                            <div class="pt-4">
                                <button type="submit" 
                                        :disabled="isSubmitting"
                                        class="w-full inline-flex items-center justify-center gap-2.5 rounded-xl bg-[#F5791F] px-8 py-4 text-base sm:text-lg font-bold text-white shadow-md transition-all duration-300 hover:bg-[#d6630f] hover:scale-[1.01] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/30 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer">
                                    <span x-text="isSubmitting ? 'Enregistrement en cours...' : 'Confirmer mon rendez-vous'"></span>
                                    <svg x-show="!isSubmitting" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
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

    <!-- Script du composant Alpine.js pour la prise de rendez-vous -->
    <script>
        function appointmentBooking() {
            return {
                step: 1,
                meetingType: 'visio',
                service: 'Stratégie & Conseil',
                currentYear: new Date().getFullYear(),
                currentMonth: new Date().getMonth(),
                monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
                weekDays: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                selectedDate: '',
                selectedDateLabel: '',
                selectedTime: '11:00',
                times: ['09:30', '11:00', '14:30', '16:00', '17:15'],
                name: '',
                company: '',
                email: '',
                phone: '',
                notes: '',
                confirmed: false,
                isSubmitting: false,
                submitError: '',
                init() {
                    const today = new Date();
                    
                    // Sélectionner le premier jour ouvré à venir (aujourd'hui si ouvré, sinon lundi suivant)
                    let d = new Date(today);
                    if (d.getDay() === 0) d.setDate(d.getDate() + 1);
                    else if (d.getDay() === 6) d.setDate(d.getDate() + 2);
                    
                    this.currentYear = d.getFullYear();
                    this.currentMonth = d.getMonth();
                    
                    const year = d.getFullYear();
                    const month = d.getMonth();
                    const dayNumber = d.getDate();
                    const mStr = String(month + 1).padStart(2, '0');
                    const dStr = String(dayNumber).padStart(2, '0');
                    this.selectedDate = `${year}-${mStr}-${dStr}`;
                    const dayName = this.dayNames[d.getDay()];
                    const monthName = this.monthNames[month];
                    this.selectedDateLabel = `${dayName} ${dayNumber} ${monthName} ${year}`;
                },
                get calendarDays() {
                    const days = [];
                    const year = this.currentYear;
                    const month = this.currentMonth;
                    const firstDay = new Date(year, month, 1);
                    const totalDays = new Date(year, month + 1, 0).getDate();

                    // Lundi = 0, Dimanche = 6
                    let startDay = firstDay.getDay() - 1;
                    if (startDay === -1) startDay = 6;

                    // Jours du mois précédent
                    const prevMonthDays = new Date(year, month, 0).getDate();
                    for (let i = startDay - 1; i >= 0; i--) {
                        days.push({
                            dayNumber: prevMonthDays - i,
                            year: month === 0 ? year - 1 : year,
                            month: month === 0 ? 11 : month - 1,
                            isCurrentMonth: false,
                            isSelectable: false,
                            dateString: ''
                        });
                    }

                    // Jours du mois en cours
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);

                    for (let d = 1; d <= totalDays; d++) {
                        const dateObj = new Date(year, month, d);
                        dateObj.setHours(0, 0, 0, 0);
                        const dayOfWeek = dateObj.getDay();
                        const isWeekend = (dayOfWeek === 0 || dayOfWeek === 6);
                        const isPast = dateObj < today;
                        const isSelectable = !isWeekend && !isPast;
                        const mStr = String(month + 1).padStart(2, '0');
                        const dStr = String(d).padStart(2, '0');
                        const dateString = `${year}-${mStr}-${dStr}`;

                        days.push({
                            dayNumber: d,
                            year: year,
                            month: month,
                            isCurrentMonth: true,
                            isSelectable: isSelectable,
                            isToday: dateObj.getTime() === today.getTime(),
                            dateString: dateString
                        });
                    }

                    // Compléter la dernière ligne pour atteindre un multiple de 7
                    const remaining = (7 - (days.length % 7)) % 7;
                    for (let i = 1; i <= remaining; i++) {
                        days.push({
                            dayNumber: i,
                            year: month === 11 ? year + 1 : year,
                            month: month === 11 ? 0 : month + 1,
                            isCurrentMonth: false,
                            isSelectable: false,
                            dateString: ''
                        });
                    }

                    return days;
                },
                selectDay(item) {
                    if (!item || !item.isSelectable) return;
                    this.selectedDate = item.dateString;
                    const d = new Date(item.year, item.month, item.dayNumber);
                    const dayName = this.dayNames[d.getDay()];
                    const monthName = this.monthNames[item.month];
                    this.selectedDateLabel = `${dayName} ${item.dayNumber} ${monthName} ${item.year}`;
                },
                prevMonth() {
                    const today = new Date();
                    if (this.currentYear === today.getFullYear() && this.currentMonth <= today.getMonth()) {
                        return;
                    }
                    if (this.currentMonth === 0) {
                        this.currentMonth = 11;
                        this.currentYear--;
                    } else {
                        this.currentMonth--;
                    }
                },
                nextMonth() {
                    if (this.currentMonth === 11) {
                        this.currentMonth = 0;
                        this.currentYear++;
                    } else {
                        this.currentMonth++;
                    }
                },
                canGoPrev() {
                    const today = new Date();
                    return !(this.currentYear === today.getFullYear() && this.currentMonth <= today.getMonth());
                },
                confirmBooking() {
                    this.isSubmitting = true;
                    this.submitError = '';
                    
                    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

                    fetch('{{ route('appointments.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({
                            name: this.name,
                            email: this.email,
                            phone: this.phone,
                            company: this.company,
                            meeting_type: this.meetingType,
                            service: this.service,
                            date: this.selectedDate,
                            time: this.selectedTime,
                            notes: this.notes
                        })
                    })
                    .then(response => {
                        return response.json().then(data => {
                            if (!response.ok) {
                                throw new Error(data.message || 'Une erreur est survenue lors de l\'enregistrement de votre rendez-vous.');
                            }
                            return data;
                        });
                    })
                    .then(data => {
                        this.confirmed = true;
                        this.isSubmitting = false;
                        window.scrollTo({ top: 350, behavior: 'smooth' });
                    })
                    .catch(err => {
                        this.submitError = err.message || 'Impossible d\'enregistrer le rendez-vous. Veuillez vérifier vos informations.';
                        this.isSubmitting = false;
                    });
                }
            };
        }
    </script>
@endsection
