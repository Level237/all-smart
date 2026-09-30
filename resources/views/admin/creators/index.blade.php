@extends('admin.layouts.app')

@section('title', 'Réseau Créateurs & Influenceurs - Administration AllSmart')

@section('header')
    <div class="flex items-center gap-2 text-xs text-[#555555]">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-[#F5791F]">Tableau de Bord</a>
        <span>/</span>
        <span class="text-[#1A1A1A] font-bold">Réseau Créateurs</span>
    </div>
@endsection

@section('content')
    <div class="space-y-6">
        
        <!-- En-tête de section avec Titre et Bouton Ajouter -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-2xl border border-[#E5E7EB]">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-[#1A1A1A] tracking-tight">Réseau Créateurs & Influenceurs</h1>
                <p class="text-xs sm:text-sm text-[#555555] mt-1">
                    Gérez les candidatures entrantes, publiez ou dépubliez les profils créateurs et organisez leur ordre d'affichage.
                </p>
            </div>

            <a href="{{ route('admin.creators.create') }}" 
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#F5791F] px-4 py-2.5 text-xs font-bold text-white shadow-2xs hover:bg-[#d96716] transition-colors self-start sm:self-auto cursor-pointer">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                <span>Ajouter un créateur</span>
            </a>
        </div>

        <!-- Filtres par Statut & Recherche -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <!-- Tabs Filtres -->
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('admin.creators.index', ['status' => 'all', 'search' => $search]) }}" 
                   class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all {{ $statusFilter === 'all' ? 'bg-[#1A1A1A] text-white shadow-xs' : 'bg-white border border-[#E5E7EB] text-[#555555] hover:border-[#1A1A1A]' }}">
                    Tous ({{ $counts['all'] }})
                </a>
                <a href="{{ route('admin.creators.index', ['status' => 'published', 'search' => $search]) }}" 
                   class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all {{ $statusFilter === 'published' ? 'bg-[#16A34A] text-white shadow-xs' : 'bg-white border border-[#E5E7EB] text-[#555555] hover:border-[#16A34A]' }}">
                    En ligne ({{ $counts['published'] }})
                </a>
                <a href="{{ route('admin.creators.index', ['status' => 'pending', 'search' => $search]) }}" 
                   class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all {{ $statusFilter === 'pending' ? 'bg-[#F5791F] text-white shadow-xs' : 'bg-white border border-[#E5E7EB] text-[#555555] hover:border-[#F5791F]' }}">
                    En attente / Dépubliés ({{ $counts['pending'] }})
                </a>
            </div>

            <!-- Moteur de Recherche -->
            <form action="{{ route('admin.creators.index') }}" method="GET" class="w-full md:w-72">
                <input type="hidden" name="status" value="{{ $statusFilter }}">
                <div class="relative">
                    <input type="text" 
                           name="search" 
                           value="{{ $search }}"
                           placeholder="Rechercher nom, @pseudo, ville..." 
                           class="w-full rounded-xl bg-white pl-9 pr-4 py-2 text-xs border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F] transition-all">
                    <svg class="absolute left-3 top-2.5 h-3.5 w-3.5 text-[#555555]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                    </svg>
                </div>
            </form>
        </div>

        <!-- Tableau des Créateurs -->
        <div class="bg-white rounded-2xl border border-[#E5E7EB] overflow-hidden shadow-2xs">
            @if($creators->isEmpty())
                <div class="p-12 text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-[#FAF4EF] text-[#F5791F]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-bold text-[#1A1A1A]">Aucun créateur trouvé</h3>
                    <p class="mt-1 text-xs text-[#555555] max-w-sm mx-auto">
                        Aucun profil ne correspond aux critères de recherche ou aucune candidature n'a encore été soumise.
                    </p>
                    <div class="mt-5">
                        <a href="{{ route('admin.creators.create') }}" 
                           class="inline-flex items-center gap-2 rounded-lg bg-[#1A1A1A] px-4 py-2 text-xs font-bold text-white hover:bg-[#F5791F] transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                            <span>Créer un profil manuellement</span>
                        </a>
                    </div>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-[#FAF4EF]/40 border-b border-[#E5E7EB] text-[#555555] font-bold uppercase tracking-wider text-[11px]">
                            <tr>
                                <th scope="col" class="py-3.5 pl-6 pr-3">Créateur</th>
                                <th scope="col" class="px-3 py-3.5">Plateforme & Niches</th>
                                <th scope="col" class="px-3 py-3.5">Localisation</th>
                                <th scope="col" class="px-3 py-3.5">Disponibilité</th>
                                <th scope="col" class="px-3 py-3.5 text-center">Ordre d'affichage</th>
                                <th scope="col" class="px-3 py-3.5 text-center">Statut</th>
                                <th scope="col" class="py-3.5 pl-3 pr-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E5E7EB]">
                            @foreach($creators as $creator)
                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    <!-- Photo + Nom + Handle -->
                                    <td class="py-4 pl-6 pr-3">
                                        <div class="flex items-center gap-3">
                                            <div class="h-12 w-12 shrink-0 overflow-hidden rounded-xl bg-slate-100 border border-[#E5E7EB]">
                                                <img src="{{ $creator->photo_url }}" 
                                                     alt="{{ $creator->name }}" 
                                                     class="h-full w-full object-cover object-top">
                                            </div>
                                            <div>
                                                <a href="{{ route('admin.creators.show', $creator) }}" class="font-bold text-[#1A1A1A] hover:text-[#F5791F] transition-colors block text-sm">
                                                    {{ $creator->name }}
                                                </a>
                                                <span class="text-xs text-[#555555] font-mono">
                                                    {{ $creator->handle }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Plateforme & Niches -->
                                    <td class="px-3 py-4">
                                        <div class="space-y-1">
                                            <span class="inline-flex items-center rounded-md bg-[#FAF4EF] px-2 py-0.5 text-[11px] font-bold text-[#F5791F] border border-[#F4E6D9] capitalize">
                                                {{ $creator->platform }}
                                            </span>
                                            @if($creator->niches && count($creator->niches))
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach(array_slice($creator->niches, 0, 2) as $niche)
                                                        <span class="text-[10px] text-[#555555] bg-gray-100 px-1.5 py-0.5 rounded">
                                                            {{ $niche }}
                                                        </span>
                                                    @endforeach
                                                    @if(count($creator->niches) > 2)
                                                        <span class="text-[10px] text-[#555555]">+{{ count($creator->niches) - 2 }}</span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </td>

                                    <!-- Localisation -->
                                    <td class="px-3 py-4 text-[#555555] text-xs">
                                        {{ $creator->location }}
                                    </td>

                                    <!-- Statut Disponibilité -->
                                    <td class="px-3 py-4">
                                        <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-semibold {{ $creator->status === 'Disponible' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-amber-50 text-amber-700 border border-amber-200' }}">
                                            {{ $creator->status }}
                                        </span>
                                    </td>

                                    <!-- Ordre d'affichage (Modification rapide) -->
                                    <td class="px-3 py-4 text-center">
                                        <form action="{{ route('admin.creators.update-order', $creator) }}" method="POST" class="inline-flex items-center justify-center gap-1">
                                            @csrf
                                            <input type="number" 
                                                   name="order" 
                                                   value="{{ $creator->order }}" 
                                                   min="0"
                                                   aria-label="Ordre d'affichage pour {{ $creator->name }}"
                                                   class="w-14 rounded-lg border border-[#E5E7EB] py-1 text-center font-bold text-xs focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F]">
                                            <button type="submit" 
                                                    title="Mettre à jour l'ordre"
                                                    class="p-1 rounded text-[#555555] hover:text-[#F5791F] hover:bg-[#FAF4EF] transition-colors cursor-pointer">
                                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Statut En Ligne / Dépublié (Toggle 1 clic) -->
                                    <td class="px-3 py-4 text-center">
                                        <form action="{{ route('admin.creators.toggle-active', $creator) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit" 
                                                    title="{{ $creator->is_active ? 'Cliquer pour dépublier' : 'Cliquer pour mettre en ligne' }}"
                                                    class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-[11px] font-bold transition-all cursor-pointer {{ $creator->is_active ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                                <span class="h-1.5 w-1.5 rounded-full {{ $creator->is_active ? 'bg-green-600' : 'bg-gray-400' }}"></span>
                                                <span>{{ $creator->is_active ? 'En ligne' : 'Dépublié' }}</span>
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Actions -->
                                    <td class="py-4 pl-3 pr-6 text-right">
                                        <div class="flex items-center justify-end gap-1.5">
                                            <a href="{{ route('admin.creators.show', $creator) }}" 
                                               title="Voir la candidature"
                                               class="p-1.5 rounded-lg text-[#555555] hover:bg-gray-100 hover:text-[#1A1A1A] transition-colors">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                            </a>

                                            <a href="{{ route('admin.creators.edit', $creator) }}" 
                                               title="Modifier"
                                               class="p-1.5 rounded-lg text-[#555555] hover:bg-[#FAF4EF] hover:text-[#F5791F] transition-colors">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                                </svg>
                                            </a>

                                            <form action="{{ route('admin.creators.destroy', $creator) }}" 
                                                  method="POST" 
                                                  class="inline-block"
                                                  onsubmit="return confirm('Confirmez-vous la suppression définitive du profil de {{ addslashes($creator->name) }} ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        title="Supprimer"
                                                        class="p-1.5 rounded-lg text-rose-500 hover:bg-rose-50 hover:text-rose-700 transition-colors cursor-pointer">
                                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
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

                <!-- Pagination -->
                @if($creators->hasPages())
                    <div class="p-4 border-t border-[#E5E7EB]">
                        {{ $creators->links() }}
                    </div>
                @endif
            @endif
        </div>

    </div>
@endsection
