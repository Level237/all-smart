@extends('admin.layouts.app')

@section('title', 'Gestion des Rendez-vous - Administration AllSmart')

@section('header')
    <div class="flex items-center gap-2 text-xs text-[#555555]">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-[#F5791F]">Tableau de Bord</a>
        <span>/</span>
        <span class="text-[#1A1A1A] font-bold">Rendez-vous</span>
    </div>
@endsection

@section('content')
    <div class="space-y-6">
        
        <!-- En-tête de section -->
        <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-[#1A1A1A] tracking-tight">Rendez-vous & Consultations</h1>
                <p class="text-xs sm:text-sm text-[#555555] mt-1">
                    Suivez, confirmez et traitez les demandes de cadrage reçues en ligne.
                </p>
            </div>

            <a href="/rendez-vous" target="_blank" 
               class="inline-flex items-center gap-2 rounded-xl border border-[#E5E7EB] bg-white px-4 py-2.5 text-xs font-bold text-[#1A1A1A] hover:bg-[#FAF4EF] hover:text-[#F5791F] transition-colors self-start sm:self-auto shadow-2xs">
                <span>Tester la prise de RDV publique</span>
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
            </a>
        </div>

        <!-- Filtres par Statut & Recherche -->
        <div class="bg-white p-4 rounded-2xl border border-[#E5E7EB] flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <!-- Onglets de statut -->
            <div class="flex items-center gap-1.5 overflow-x-auto pb-2 md:pb-0 text-xs">
                <a href="{{ route('admin.appointments.index', ['status' => 'all', 'q' => $search]) }}" 
                   class="rounded-lg px-3 py-1.5 font-bold transition-colors {{ $status === 'all' ? 'bg-[#1A1A1A] text-white' : 'text-[#555555] hover:bg-slate-100 hover:text-[#1A1A1A]' }}">
                    Tous ({{ $counts['all'] }})
                </a>
                <a href="{{ route('admin.appointments.index', ['status' => 'nouveau', 'q' => $search]) }}" 
                   class="rounded-lg px-3 py-1.5 font-bold transition-colors {{ $status === 'nouveau' ? 'bg-[#D97706] text-white' : 'text-[#555555] hover:bg-[#FAF4EF] hover:text-[#D97706]' }}">
                    Nouveaux ({{ $counts['nouveau'] }})
                </a>
                <a href="{{ route('admin.appointments.index', ['status' => 'confirme', 'q' => $search]) }}" 
                   class="rounded-lg px-3 py-1.5 font-bold transition-colors {{ $status === 'confirme' ? 'bg-[#16A34A] text-white' : 'text-[#555555] hover:bg-slate-100 hover:text-[#16A34A]' }}">
                    Confirmés ({{ $counts['confirme'] }})
                </a>
                <a href="{{ route('admin.appointments.index', ['status' => 'termine', 'q' => $search]) }}" 
                   class="rounded-lg px-3 py-1.5 font-bold transition-colors {{ $status === 'termine' ? 'bg-[#555555] text-white' : 'text-[#555555] hover:bg-slate-100 hover:text-[#1A1A1A]' }}">
                    Terminés ({{ $counts['termine'] }})
                </a>
                <a href="{{ route('admin.appointments.index', ['status' => 'annule', 'q' => $search]) }}" 
                   class="rounded-lg px-3 py-1.5 font-bold transition-colors {{ $status === 'annule' ? 'bg-[#DC2626] text-white' : 'text-[#555555] hover:bg-slate-100 hover:text-[#DC2626]' }}">
                    Annulés ({{ $counts['annule'] }})
                </a>
            </div>

            <!-- Barre de Recherche -->
            <form action="{{ route('admin.appointments.index') }}" method="GET" class="relative shrink-0 md:w-64">
                <input type="hidden" name="status" value="{{ $status }}">
                <input type="text" 
                       name="q" 
                       value="{{ $search }}" 
                       placeholder="Rechercher un prospect..." 
                       class="w-full rounded-xl bg-slate-50 pl-9 pr-4 py-2 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:bg-white transition-all">
                <svg class="h-4 w-4 text-[#555555] absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </form>
        </div>

        <!-- Tableau des Rendez-vous -->
        <div class="bg-white rounded-2xl border border-[#E5E7EB] overflow-hidden">
            @if($appointments->isEmpty())
                <div class="p-12 text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-[#FAF4EF] text-[#F5791F]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-bold text-[#1A1A1A]">Aucune demande pour ce filtre</h3>
                    <p class="mt-1 text-xs text-[#555555] max-w-sm mx-auto">
                        @if($search)
                            Aucun rendez-vous ne correspond à votre recherche « {{ $search }} ».
                        @else
                            Aucun rendez-vous n'est enregistré avec ce statut pour le moment.
                        @endif
                    </p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-[#FAF4EF]/40 border-b border-[#E5E7EB] text-[#555555] font-bold uppercase tracking-wider text-[11px]">
                            <tr>
                                <th scope="col" class="py-3.5 pl-6 pr-3">Prospect & Contact</th>
                                <th scope="col" class="px-3 py-3.5">Format & Pôle</th>
                                <th scope="col" class="px-3 py-3.5">Date & Créneau</th>
                                <th scope="col" class="px-3 py-3.5 text-center">Statut</th>
                                <th scope="col" class="py-3.5 pl-3 pr-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E5E7EB]">
                            @foreach($appointments as $appointment)
                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    
                                    <!-- Prospect & Entreprise -->
                                    <td class="py-4 pl-6 pr-3">
                                        <div>
                                            <a href="{{ route('admin.appointments.show', $appointment) }}" class="font-bold text-[#1A1A1A] hover:text-[#F5791F] block text-sm">
                                                {{ $appointment->name }}
                                            </a>
                                            @if($appointment->company)
                                                <span class="text-xs text-[#555555] block font-medium">{{ $appointment->company }}</span>
                                            @endif
                                            <div class="text-[11px] text-[#555555] mt-1 space-x-2">
                                                <span>{{ $appointment->email }}</span>
                                                <span>&bull;</span>
                                                <span>{{ $appointment->phone }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Format & Pôle -->
                                    <td class="px-3 py-4">
                                        <div class="space-y-1">
                                            <span class="font-bold text-[#1A1A1A] block">
                                                {{ $appointment->service }}
                                            </span>
                                            <span class="inline-flex items-center rounded-md border border-[#E5E7EB] bg-slate-50 px-2 py-0.5 text-[10px] font-medium text-[#555555]">
                                                {{ $appointment->meeting_type === 'visio' ? 'Visioconférence' : 'Présentiel (Douala)' }}
                                            </span>
                                        </div>
                                    </td>

                                    <!-- Date & Créneau -->
                                    <td class="px-3 py-4">
                                        <div class="space-y-0.5">
                                            <span class="font-bold text-[#1A1A1A] block">
                                                {{ $appointment->date->translatedFormat('d M Y') }}
                                            </span>
                                            <span class="text-xs font-mono font-medium text-[#F5791F] block">
                                                {{ $appointment->time }} (GMT+1)
                                            </span>
                                        </div>
                                    </td>

                                    <!-- Statut -->
                                    <td class="px-3 py-4 text-center">
                                        <span class="inline-flex items-center rounded-md border px-2.5 py-1 text-[11px] font-bold {{ $appointment->status_badge_classes }}">
                                            {{ $appointment->status_label }}
                                        </span>
                                    </td>

                                    <!-- Actions -->
                                    <td class="py-4 pl-3 pr-6 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('admin.appointments.show', $appointment) }}" 
                                               class="rounded-lg border border-[#E5E7EB] bg-white px-2.5 py-1.5 text-xs font-bold text-[#1A1A1A] hover:bg-[#FAF4EF] hover:text-[#F5791F] transition-colors"
                                               title="Consulter le dossier">
                                                Voir détails
                                            </a>

                                            <form action="{{ route('admin.appointments.destroy', $appointment) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Confirmez-vous la suppression de cette demande de rendez-vous ?');"
                                                  class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="rounded-lg border border-[#E5E7EB] bg-white p-1.5 text-xs text-[#DC2626] hover:bg-[#DC2626]/10 transition-colors cursor-pointer"
                                                        title="Supprimer">
                                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($appointments->hasPages())
                    <div class="p-4 border-t border-[#E5E7EB]">
                        {{ $appointments->links() }}
                    </div>
                @endif
            @endif
        </div>

    </div>
@endsection
