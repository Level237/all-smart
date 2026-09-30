@extends('admin.layouts.app')

@section('title', 'Détail Rendez-vous - ' . $appointment->name)

@section('header')
    <div class="flex items-center gap-2 text-xs text-[#555555]">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-[#F5791F]">Tableau de Bord</a>
        <span>/</span>
        <a href="{{ route('admin.appointments.index') }}" class="hover:text-[#F5791F]">Rendez-vous</a>
        <span>/</span>
        <span class="text-[#1A1A1A] font-bold">{{ $appointment->name }}</span>
    </div>
@endsection

@section('content')
    <div class="space-y-6">
        
        <!-- En-tête avec Navigation Retour et Statut Actuel -->
        <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.appointments.index') }}" 
                   class="rounded-xl border border-[#E5E7EB] bg-white p-2.5 text-[#555555] hover:text-[#1A1A1A] hover:bg-slate-50 transition-colors"
                   title="Retour aux rendez-vous">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <div>
                    <div class="flex items-center gap-2.5">
                        <h1 class="text-xl sm:text-2xl font-bold text-[#1A1A1A] tracking-tight">{{ $appointment->name }}</h1>
                        <span class="inline-flex items-center rounded-md border px-2.5 py-0.5 text-xs font-bold {{ $appointment->status_badge_classes }}">
                            {{ $appointment->status_label }}
                        </span>
                    </div>
                    <p class="text-xs text-[#555555] mt-1">
                        Demande enregistrée le {{ $appointment->created_at->translatedFormat('d F Y à H:i') }}
                    </p>
                </div>
            </div>

            <!-- Bouton Supprimer -->
            <form action="{{ route('admin.appointments.destroy', $appointment) }}" 
                  method="POST" 
                  onsubmit="return confirm('Confirmez-vous la suppression définitive de cette demande ?');">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="rounded-xl border border-[#DC2626]/30 bg-white px-3.5 py-2 text-xs font-bold text-[#DC2626] hover:bg-[#DC2626]/10 transition-colors cursor-pointer">
                    Supprimer ce rendez-vous
                </button>
            </form>
        </div>

        <!-- Grille Principale (2/3 Dossier Client + 1/3 Traitement & Statut) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Colonne 2/3 : Fiche détaillée du prospect -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Détails du Rendez-vous -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-[#E5E7EB] space-y-6">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                        Paramètres de la Consultation
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <span class="block text-xs font-bold text-[#555555] uppercase tracking-wider">Format</span>
                            <p class="mt-1 text-sm font-bold text-[#1A1A1A]">
                                {{ $appointment->meeting_type === 'visio' ? 'Visioconférence (Lien Google Meet)' : 'Présentiel (Bureaux AllSmart - Bali, Douala)' }}
                            </p>
                        </div>

                        <div>
                            <span class="block text-xs font-bold text-[#555555] uppercase tracking-wider">Pôle d'Expertise Souhaité</span>
                            <p class="mt-1 text-sm font-bold text-[#F5791F]">
                                {{ $appointment->service }}
                            </p>
                        </div>

                        <div>
                            <span class="block text-xs font-bold text-[#555555] uppercase tracking-wider">Date Souhaitée</span>
                            <p class="mt-1 text-sm font-bold text-[#1A1A1A]">
                                {{ $appointment->date->translatedFormat('l j F Y') }}
                            </p>
                        </div>

                        <div>
                            <span class="block text-xs font-bold text-[#555555] uppercase tracking-wider">Créneau Horaire</span>
                            <p class="mt-1 text-sm font-mono font-bold text-[#1A1A1A]">
                                {{ $appointment->time }} (GMT+1 - Douala)
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Coordonnées du Contact -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-[#E5E7EB] space-y-6">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                        Coordonnées du Prospect
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <span class="block text-xs font-bold text-[#555555] uppercase tracking-wider">Nom & Prénom</span>
                            <p class="mt-1 text-sm font-bold text-[#1A1A1A]">{{ $appointment->name }}</p>
                        </div>

                        <div>
                            <span class="block text-xs font-bold text-[#555555] uppercase tracking-wider">Entreprise / Marque</span>
                            <p class="mt-1 text-sm font-bold text-[#1A1A1A]">{{ $appointment->company ?: 'Non renseignée' }}</p>
                        </div>

                        <div>
                            <span class="block text-xs font-bold text-[#555555] uppercase tracking-wider">Email</span>
                            <a href="mailto:{{ $appointment->email }}" class="mt-1 text-sm font-medium text-[#F5791F] hover:underline block">
                                {{ $appointment->email }}
                            </a>
                        </div>

                        <div>
                            <span class="block text-xs font-bold text-[#555555] uppercase tracking-wider">Téléphone / WhatsApp</span>
                            <p class="mt-1 text-sm font-mono font-bold text-[#1A1A1A]">{{ $appointment->phone }}</p>
                        </div>
                    </div>
                </div>

                <!-- Brief / Notes transmises par le client -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-[#E5E7EB] space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                        Objectif & Brief Exprimé
                    </h2>
                    
                    @if($appointment->notes)
                        <div class="rounded-xl bg-slate-50 p-4 border border-[#E5E7EB] text-sm text-[#1A1A1A] leading-relaxed whitespace-pre-line">
                            {{ $appointment->notes }}
                        </div>
                    @else
                        <p class="text-xs text-[#555555] italic">Aucune note particulière laissée lors de la réservation.</p>
                    @endif
                </div>

            </div>

            <!-- Colonne 1/3 : Traitement & Changement de Statut -->
            <div class="space-y-6">
                
                <!-- Formulaire de Traitement -->
                <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] space-y-6">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                        Statut du Traitement
                    </h2>

                    <form action="{{ route('admin.appointments.update', $appointment) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="status" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                                Modifier le statut
                            </label>
                            <select id="status" 
                                    name="status" 
                                    class="w-full rounded-xl bg-white px-3.5 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F]/20 font-bold">
                                <option value="nouveau" {{ $appointment->status === 'nouveau' ? 'selected' : '' }}>Nouveau (À traiter)</option>
                                <option value="confirme" {{ $appointment->status === 'confirme' ? 'selected' : '' }}>Confirmé (Rendez-vous calé)</option>
                                <option value="termine" {{ $appointment->status === 'termine' ? 'selected' : '' }}>Terminé (Échange effectué)</option>
                                <option value="annule" {{ $appointment->status === 'annule' ? 'selected' : '' }}>Annulé</option>
                            </select>
                        </div>

                        <div>
                            <label for="admin_notes" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                                Notes internes agence (Privé)
                            </label>
                            <textarea id="admin_notes" 
                                      name="admin_notes" 
                                      rows="4" 
                                      placeholder="Ex : Appelé le client le 01/10, lien Meet transmis par WhatsApp..."
                                      class="w-full rounded-xl bg-white px-3.5 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F]/20 resize-none">{{ old('admin_notes', $appointment->admin_notes) }}</textarea>
                        </div>

                        <button type="submit" 
                                class="w-full rounded-xl bg-[#F5791F] px-4 py-2.5 text-xs font-bold text-white shadow-2xs hover:bg-[#d96716] transition-colors cursor-pointer">
                            Enregistrer les modifications
                        </button>
                    </form>
                </div>

                <!-- Actions Rapides de Contact -->
                <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                        Actions Rapides
                    </h3>

                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', $appointment->phone);
                    @endphp

                    @if($cleanPhone)
                        <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode('Bonjour ' . $appointment->name . ', nous faisons suite à votre demande de rendez-vous chez AllSmart Consulting.') }}" 
                           target="_blank"
                           class="flex items-center justify-between p-3 rounded-xl border border-[#E5E7EB] hover:border-[#16A34A] hover:bg-emerald-50/30 transition-colors group">
                            <span class="text-xs font-bold text-[#1A1A1A] group-hover:text-[#16A34A]">Ouvrir discussion WhatsApp</span>
                            <svg class="h-4 w-4 text-[#555555] group-hover:text-[#16A34A]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </a>
                    @endif

                    <a href="mailto:{{ $appointment->email }}?subject={{ urlencode('Votre rendez-vous chez AllSmart Consulting') }}" 
                       class="flex items-center justify-between p-3 rounded-xl border border-[#E5E7EB] hover:border-[#F5791F] hover:bg-[#FAF4EF]/40 transition-colors group">
                        <span class="text-xs font-bold text-[#1A1A1A] group-hover:text-[#F5791F]">Envoyer un email</span>
                        <svg class="h-4 w-4 text-[#555555] group-hover:text-[#F5791F]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </a>
                </div>

            </div>

        </div>

    </div>
@endsection
