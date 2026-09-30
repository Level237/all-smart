@extends('admin.layouts.app')

@section('title', 'Smart Team - Administration AllSmart')

@section('header')
    <div class="flex items-center gap-2 text-xs text-[#555555]">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-[#F5791F]">Tableau de Bord</a>
        <span>/</span>
        <span class="text-[#1A1A1A] font-bold">Smart Team</span>
    </div>
@endsection

@section('content')
    <div class="space-y-6">
        
        <!-- En-tête de section avec Titre et Bouton Créer -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-2xl border border-[#E5E7EB]">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-[#1A1A1A] tracking-tight">Smart Team</h1>
                <p class="text-xs sm:text-sm text-[#555555] mt-1">
                    Gérez les profils des collaborateurs affichés sur la page « Qui Sommes-Nous ».
                </p>
            </div>

            <a href="{{ route('admin.team.create') }}" 
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#F5791F] px-4 py-2.5 text-xs font-bold text-white shadow-2xs hover:bg-[#d96716] transition-colors self-start sm:self-auto cursor-pointer">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                <span>Ajouter un membre</span>
            </a>
        </div>

        <!-- Tableau des Collaborateurs -->
        <div class="bg-white rounded-2xl border border-[#E5E7EB] overflow-hidden">
            @if($members->isEmpty())
                <div class="p-12 text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-[#FAF4EF] text-[#F5791F]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-bold text-[#1A1A1A]">Aucun collaborateur enregistré</h3>
                    <p class="mt-1 text-xs text-[#555555] max-w-sm mx-auto">
                        Votre équipe est actuellement vide. Ajoutez les membres de l'agence pour les présenter publiquement.
                    </p>
                    <div class="mt-5">
                        <a href="{{ route('admin.team.create') }}" 
                           class="inline-flex items-center gap-2 rounded-lg bg-[#1A1A1A] px-4 py-2 text-xs font-bold text-white hover:bg-[#F5791F] transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                            <span>Créer le premier profil</span>
                        </a>
                    </div>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-[#FAF4EF]/40 border-b border-[#E5E7EB] text-[#555555] font-bold uppercase tracking-wider text-[11px]">
                            <tr>
                                <th scope="col" class="py-3.5 pl-6 pr-3">Collaborateur</th>
                                <th scope="col" class="px-3 py-3.5">Poste / Rôle</th>
                                <th scope="col" class="px-3 py-3.5">Signature (Zeyada)</th>
                                <th scope="col" class="px-3 py-3.5 text-center">Ordre</th>
                                <th scope="col" class="px-3 py-3.5 text-center">Statut</th>
                                <th scope="col" class="py-3.5 pl-3 pr-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E5E7EB]">
                            @foreach($members as $member)
                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    <!-- Photo + Nom -->
                                    <td class="py-4 pl-6 pr-3">
                                        <div class="flex items-center gap-3">
                                            <div class="h-11 w-11 shrink-0 overflow-hidden rounded-lg bg-slate-100 border border-[#E5E7EB]">
                                                <img src="{{ $member->photo_url }}" 
                                                     alt="{{ $member->name }}" 
                                                     class="h-full w-full object-cover object-top">
                                            </div>
                                            <div>
                                                <span class="font-bold text-[#1A1A1A] block">{!! $member->name !!}</span>
                                                <div class="flex items-center gap-2 mt-1">
                                                    @if($member->instagram_url)
                                                        <span class="text-[10px] text-[#555555]">IG</span>
                                                    @endif
                                                    @if($member->linkedin_url)
                                                        <span class="text-[10px] text-[#555555]">IN</span>
                                                    @endif
                                                    @if($member->facebook_url)
                                                        <span class="text-[10px] text-[#555555]">FB</span>
                                                    @endif
                                                    @if($member->x_url)
                                                        <span class="text-[10px] text-[#555555]">X</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Poste -->
                                    <td class="px-3 py-4 text-[#1A1A1A] font-medium">
                                        {{ $member->role ?: '—' }}
                                    </td>

                                    <!-- Label -->
                                    <td class="px-3 py-4 font-['Zeyada'] text-base text-[#555555]">
                                        {{ $member->label ?: '—' }}
                                    </td>

                                    <!-- Ordre -->
                                    <td class="px-3 py-4 text-center font-mono text-slate-700">
                                        {{ $member->order }}
                                    </td>

                                    <!-- Statut -->
                                    <td class="px-3 py-4 text-center">
                                        @if($member->is_active)
                                            <span class="inline-flex items-center rounded-md border border-[#16A34A]/30 bg-[#16A34A]/10 px-2 py-0.5 text-[11px] font-bold text-[#16A34A]">
                                                En ligne
                                            </span>
                                        @else
                                            <span class="inline-flex items-center rounded-md border border-[#E5E7EB] bg-white px-2 py-0.5 text-[11px] font-medium text-[#555555]">
                                                Masqué
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td class="py-4 pl-3 pr-6 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('admin.team.edit', $member) }}" 
                                               class="rounded-lg border border-[#E5E7EB] bg-white px-2.5 py-1.5 text-xs font-medium text-[#1A1A1A] hover:bg-[#FAF4EF] hover:text-[#F5791F] transition-colors"
                                               title="Modifier">
                                                Modifier
                                            </a>

                                            <form action="{{ route('admin.team.destroy', $member) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Confirmez-vous la suppression définitive de ce collaborateur ?');"
                                                  class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="rounded-lg border border-[#E5E7EB] bg-white px-2.5 py-1.5 text-xs font-medium text-[#DC2626] hover:bg-[#DC2626]/10 transition-colors cursor-pointer"
                                                        title="Supprimer">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($members->hasPages())
                    <div class="p-4 border-t border-[#E5E7EB]">
                        {{ $members->links() }}
                    </div>
                @endif
            @endif
        </div>

    </div>
@endsection
