@extends('admin.layouts.app')

@section('title', 'Tableau de Bord - Administration AllSmart')

@section('header')
    <div>
        <h1 class="text-xl font-bold text-[#1A1A1A] tracking-tight sm:text-2xl">Tableau de Bord</h1>
        <p class="text-xs text-[#555555]">Vue d'ensemble de l'agence et indicateurs clés</p>
    </div>
@endsection

@section('content')
    <!-- En-tête de bienvenue & Contexte -->
    <div class="mb-8 rounded-2xl bg-white border border-[#E5E7EB] p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-[#1A1A1A] tracking-tight">
                Bonjour, {{ Auth::user()->name }}
            </h2>
            <p class="mt-1 text-xs sm:text-sm text-[#555555]">
                Bienvenue dans l'espace d'administration AllSmart.
            </p>
        </div>

        <div class="flex items-center gap-3 self-start md:self-auto shrink-0 bg-white px-4 py-2.5 rounded-xl border border-[#E5E7EB]">
            <svg class="h-4 w-4 text-[#F5791F]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <div class="text-xs">
                <span class="block font-bold text-[#1A1A1A]">{{ now()->translatedFormat('l j F Y') }}</span>
                <span class="block text-[11px] text-[#555555]">Douala (GMT+1)</span>
            </div>
        </div>
    </div>

    <!-- Niveau 1 : Grille des 5 Cartes KPI -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-5 mb-8">
        
        <!-- KPI 1 : Rendez-vous -->
        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-5 transition-colors hover:border-[#F5791F]">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium text-[#555555]">Rendez-vous à venir</p>
                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#FAF4EF] text-[#F5791F]">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-3xl font-bold tracking-tight text-[#1A1A1A]">{{ \App\Models\Appointment::where('status', 'nouveau')->count() }}</span>
                <p class="text-[11px] text-[#555555] mt-1">demande(s) en attente</p>
            </div>
        </div>

        <!-- KPI 2 : Créateurs Réseau -->
        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-5 transition-colors hover:border-[#F5791F]">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium text-[#555555]">Réseau Créateurs</p>
                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#FAF4EF] text-[#F5791F]">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632zM18 10.5h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-3xl font-bold tracking-tight text-[#1A1A1A]">{{ \App\Models\Creator::active()->count() }}</span>
                <p class="text-[11px] text-[#555555] mt-1">en ligne ({{ \App\Models\Creator::count() }} total)</p>
            </div>
        </div>

        <!-- KPI 3 : Smart Team -->
        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-5 transition-colors hover:border-[#1A1A1A]">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium text-[#555555]">Smart Team</p>
                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#FAF4EF] text-[#1A1A1A]">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-3xl font-bold tracking-tight text-[#1A1A1A]">{{ \App\Models\Team::active()->count() }}</span>
                <p class="text-[11px] text-[#555555] mt-1">collaborateurs actifs</p>
            </div>
        </div>

        <!-- KPI 4 : Réalisations -->
        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-5 transition-colors hover:border-[#1A1A1A]">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium text-[#555555]">Réalisations</p>
                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#FAF4EF] text-[#1A1A1A]">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-3xl font-bold tracking-tight text-[#1A1A1A]">{{ \App\Models\PortfolioProject::active()->count() }}</span>
                <p class="text-[11px] text-[#555555] mt-1">projets pointillés</p>
            </div>
        </div>

        <!-- KPI 5 : Sécurité & Slug Furtif -->
        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-5 transition-colors hover:border-[#1A1A1A]">
            <div class="flex items-center justify-between">
                <p class="text-xs font-medium text-[#555555]">Sécurité d'accès</p>
                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#FAF4EF] text-[#16A34A]">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-xl font-bold tracking-tight text-[#1A1A1A]">Protégé</span>
                <p class="text-[11px] font-mono text-[#555555] mt-1">/{{ env('ADMIN_PATH', 'smart-desk') }}</p>
            </div>
        </div>

    </div>

    <!-- Niveau 2 : Grille Asymétrique (2/3 Tableau + 1/3 Raccourcis) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Colonne Gauche (2/3) : Tableau des dernières demandes de RDV -->
        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6">
                @php
                    $recentAppointments = \App\Models\Appointment::query()->recent()->take(5)->get();
                @endphp

                <div class="flex items-center justify-between pb-4 border-b border-[#E5E7EB]">
                    <div>
                        <h3 class="text-base font-bold text-[#1A1A1A]">Dernières Demandes de Rendez-vous</h3>
                        <p class="text-xs text-[#555555]">Consultations enregistrées depuis le formulaire public</p>
                    </div>

                    @if($recentAppointments->isNotEmpty())
                        <a href="{{ route('admin.appointments.index') }}" class="text-xs font-bold text-[#F5791F] hover:underline">
                            Tout voir ({{ \App\Models\Appointment::count() }})
                        </a>
                    @endif
                </div>

                @if($recentAppointments->isEmpty())
                    <!-- Empty State sobre -->
                    <div class="mt-6">
                        <div class="rounded-xl border border-dashed border-[#E5E7EB] bg-white p-8 text-center">
                            <div class="mx-auto flex h-10 w-10 items-center justify-center rounded-lg bg-[#FAF4EF] text-[#F5791F]">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h4 class="mt-3 text-sm font-bold text-[#1A1A1A]">Aucune demande en attente</h4>
                            <p class="mt-1 text-xs text-[#555555] max-w-md mx-auto">
                                Les futures réservations soumises par vos prospects s'afficheront ici avec leurs créneaux et leurs coordonnées.
                            </p>
                            <div class="mt-5">
                                <a href="/rendez-vous" target="_blank" 
                                   class="inline-flex items-center gap-2 rounded-lg bg-[#1A1A1A] px-4 py-2 text-xs font-bold text-white hover:bg-[#F5791F] transition-colors">
                                    <span>Voir le formulaire de rendez-vous</span>
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Table des demandes récentes -->
                    <div class="mt-4 overflow-x-auto">
                        <table class="w-full text-left text-xs">
                            <thead class="text-[#555555] font-bold text-[11px] uppercase border-b border-[#E5E7EB]">
                                <tr>
                                    <th scope="col" class="py-3 pr-3">Prospect</th>
                                    <th scope="col" class="px-3 py-3">Pôle</th>
                                    <th scope="col" class="px-3 py-3">Date & Créneau</th>
                                    <th scope="col" class="px-3 py-3 text-center">Statut</th>
                                    <th scope="col" class="py-3 pl-3 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#E5E7EB]">
                                @foreach($recentAppointments as $item)
                                    <tr class="hover:bg-slate-50/60 transition-colors">
                                        <td class="py-3 pr-3">
                                            <span class="font-bold text-[#1A1A1A] block">{{ $item->name }}</span>
                                            <span class="text-[11px] text-[#555555] block">{{ $item->company ?: $item->email }}</span>
                                        </td>
                                        <td class="px-3 py-3 text-[#1A1A1A] font-medium">
                                            {{ $item->service }}
                                        </td>
                                        <td class="px-3 py-3 text-[#555555]">
                                            <span class="font-bold text-[#1A1A1A] block">{{ $item->date->translatedFormat('d M') }}</span>
                                            <span class="text-[11px] text-[#F5791F] font-mono">{{ $item->time }}</span>
                                        </td>
                                        <td class="px-3 py-3 text-center">
                                            <span class="inline-flex items-center rounded-md border px-2 py-0.5 text-[10px] font-bold {{ $item->status_badge_classes }}">
                                                {{ $item->status_label }}
                                            </span>
                                        </td>
                                        <td class="py-3 pl-3 text-right">
                                            <a href="{{ route('admin.appointments.show', $item) }}" 
                                               class="rounded-lg border border-[#E5E7EB] bg-white px-2 py-1 text-xs font-bold text-[#1A1A1A] hover:bg-[#FAF4EF] hover:text-[#F5791F] transition-colors">
                                                Détails
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <!-- Dernières Candidatures Créateurs -->
            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6">
                @php
                    $recentCreators = \App\Models\Creator::query()->latest()->take(5)->get();
                @endphp

                <div class="flex items-center justify-between pb-4 border-b border-[#E5E7EB]">
                    <div>
                        <h3 class="text-base font-bold text-[#1A1A1A]">Dernières Candidatures Créateurs</h3>
                        <p class="text-xs text-[#555555]">Candidatures reçues via le formulaire Rejoindre le Réseau</p>
                    </div>

                    @if($recentCreators->isNotEmpty())
                        <a href="{{ route('admin.creators.index') }}" 
                           class="text-xs font-bold text-[#F5791F] hover:underline flex items-center gap-1">
                            <span>Voir tout ({{ \App\Models\Creator::count() }})</span>
                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                            </svg>
                        </a>
                    @endif
                </div>

                @if($recentCreators->isEmpty())
                    <div class="py-8 text-center text-xs text-[#555555]">
                        <p>Aucune candidature de créateur enregistrée pour le moment.</p>
                    </div>
                @else
                    <div class="overflow-x-auto mt-4">
                        <table class="w-full text-left text-xs">
                            <thead class="text-[11px] font-bold text-[#555555] uppercase tracking-wider bg-[#FAF4EF]/40">
                                <tr>
                                    <th scope="col" class="py-3 pl-3 pr-3">Créateur</th>
                                    <th scope="col" class="px-3 py-3">Plateforme & Niche</th>
                                    <th scope="col" class="px-3 py-3 text-center">Statut</th>
                                    <th scope="col" class="py-3 pl-3 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#E5E7EB]">
                                @foreach($recentCreators as $creatorItem)
                                    <tr class="hover:bg-slate-50/60 transition-colors">
                                        <td class="py-3 pl-3 pr-3">
                                            <div class="flex items-center gap-3">
                                                <div class="h-9 w-9 rounded-xl bg-[#FAF4EF] border border-[#E5E7EB] overflow-hidden shrink-0 flex items-center justify-center font-bold text-xs text-[#F5791F]">
                                                    @if($creatorItem->photo_url)
                                                        <img src="{{ $creatorItem->photo_url }}" alt="{{ $creatorItem->name }}" class="h-full w-full object-cover">
                                                    @else
                                                        {{ strtoupper(substr($creatorItem->name, 0, 1)) }}
                                                    @endif
                                                </div>
                                                <div>
                                                    <span class="font-bold text-[#1A1A1A] block">{{ $creatorItem->name }}</span>
                                                    <span class="text-[11px] text-[#555555] block">{{ $creatorItem->formatted_handle }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 py-3">
                                            <span class="font-bold text-[#1A1A1A] block">{{ $creatorItem->platform }}</span>
                                            <span class="text-[11px] text-[#555555] block">
                                                {{ !empty($creatorItem->niches) ? implode(', ', array_slice($creatorItem->niches, 0, 2)) : 'Généraliste' }}
                                            </span>
                                        </td>
                                        <td class="px-3 py-3 text-center">
                                            @if($creatorItem->is_active)
                                                <span class="inline-flex items-center rounded-md border border-[#16A34A]/30 bg-[#16A34A]/10 px-2 py-0.5 text-[10px] font-bold text-[#16A34A]">
                                                    En ligne
                                                </span>
                                            @else
                                                <span class="inline-flex items-center rounded-md border border-[#F5791F]/30 bg-[#F5791F]/10 px-2 py-0.5 text-[10px] font-bold text-[#F5791F]">
                                                    En attente
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3 pl-3 text-right">
                                            <a href="{{ route('admin.creators.show', $creatorItem) }}" 
                                               class="rounded-lg border border-[#E5E7EB] bg-white px-2 py-1 text-xs font-bold text-[#1A1A1A] hover:bg-[#FAF4EF] hover:text-[#F5791F] transition-colors">
                                                Détails
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- Colonne Droite (1/3) : Actions Rapides & Statut Système -->
        <div class="space-y-6">
            
            <!-- Actions Rapides -->
            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6">
                <h3 class="text-xs font-bold text-[#1A1A1A] pb-3 border-b border-[#E5E7EB] uppercase tracking-wider">
                    Gestion du Site
                </h3>
                <div class="mt-4 space-y-2">
                    
                    <a href="{{ Route::has('admin.appointments.index') ? route('admin.appointments.index') : '#' }}" 
                       class="flex items-center justify-between p-3 rounded-xl border border-[#E5E7EB] hover:border-[#F5791F] hover:bg-[#FAF4EF]/40 transition-colors group">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-[#FAF4EF] text-[#F5791F]">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-[#1A1A1A] group-hover:text-[#F5791F] block">Rendez-vous</span>
                                <span class="text-[11px] text-[#555555]">Planning et demandes</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-[#555555] group-hover:text-[#F5791F] transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <a href="{{ Route::has('admin.creators.index') ? route('admin.creators.index') : '#' }}" 
                       class="flex items-center justify-between p-3 rounded-xl border border-[#E5E7EB] hover:border-[#F5791F] hover:bg-[#FAF4EF]/40 transition-colors group">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-[#FAF4EF] text-[#F5791F]">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632zM18 10.5h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-[#1A1A1A] group-hover:text-[#F5791F] block">Réseau Créateurs</span>
                                <span class="text-[11px] text-[#555555]">Candidatures et visibilité</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-[#555555] group-hover:text-[#F5791F] transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <a href="{{ Route::has('admin.team.index') ? route('admin.team.index') : '#' }}" 
                       class="flex items-center justify-between p-3 rounded-xl border border-[#E5E7EB] hover:border-[#F5791F] hover:bg-[#FAF4EF]/40 transition-colors group">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-[#FAF4EF] text-[#1A1A1A]">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-[#1A1A1A] group-hover:text-[#F5791F] block">Smart Team</span>
                                <span class="text-[11px] text-[#555555]">Membres et profils</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-[#555555] group-hover:text-[#F5791F] transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <a href="{{ Route::has('admin.portfolio.index') ? route('admin.portfolio.index') : '#' }}" 
                       class="flex items-center justify-between p-3 rounded-xl border border-[#E5E7EB] hover:border-[#F5791F] hover:bg-[#FAF4EF]/40 transition-colors group">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-[#FAF4EF] text-[#1A1A1A]">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-[#1A1A1A] group-hover:text-[#F5791F] block">Réalisations</span>
                                <span class="text-[11px] text-[#555555]">Portfolio et projets</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-[#555555] group-hover:text-[#F5791F] transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>

                </div>
            </div>

            <!-- Environnement & Sécurité -->
            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6">
                <h3 class="text-xs font-bold text-[#1A1A1A] pb-3 border-b border-[#E5E7EB] uppercase tracking-wider">
                    Système & Sécurité
                </h3>
                <dl class="mt-4 divide-y divide-[#E5E7EB] text-xs">
                    <div class="flex justify-between py-2">
                        <dt class="text-[#555555]">Framework</dt>
                        <dd class="font-bold text-[#1A1A1A]">Laravel {{ app()->version() }}</dd>
                    </div>
                    <div class="flex justify-between py-2">
                        <dt class="text-[#555555]">Base de données</dt>
                        <dd class="font-medium text-[#1A1A1A]">SQLite</dd>
                    </div>
                    <div class="flex justify-between py-2">
                        <dt class="text-[#555555]">Accès /admin</dt>
                        <dd class="font-mono text-xs font-bold text-[#16A34A]">404 Not Found</dd>
                    </div>
                    <div class="flex justify-between py-2">
                        <dt class="text-[#555555]">Rate Limiting</dt>
                        <dd class="font-medium text-[#1A1A1A]">5 tentatives / min</dd>
                    </div>
                </dl>
            </div>

        </div>

    </div>
@endsection
