@extends('admin.layouts.app')

@section('title', 'Réalisations - Administration AllSmart')

@section('header')
    <div class="flex items-center gap-2 text-xs text-[#555555]">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-[#F5791F]">Tableau de Bord</a>
        <span>/</span>
        <span class="text-[#1A1A1A] font-bold">Réalisations</span>
    </div>
@endsection

@section('content')
    <div class="space-y-6">
        
        <!-- En-tête de section avec Titre et Bouton Créer -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-2xl border border-[#E5E7EB]">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-[#1A1A1A] tracking-tight">Réalisations & Portfolio</h1>
                <p class="text-xs sm:text-sm text-[#555555] mt-1">
                    Gérez les études de cas et réalisations clients affichées sur la page « Réalisations ».
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="/realisations" target="_blank" 
                   class="inline-flex items-center gap-1.5 rounded-xl border border-[#E5E7EB] bg-white px-3.5 py-2.5 text-xs font-bold text-[#1A1A1A] hover:bg-slate-50 transition-colors">
                    <svg class="h-4 w-4 text-[#555555]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    <span>Voir la page publique</span>
                </a>

                <a href="{{ route('admin.portfolio.create') }}" 
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#F5791F] px-4 py-2.5 text-xs font-bold text-white shadow-2xs hover:bg-[#d96716] transition-colors cursor-pointer">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                    <span>Ajouter un projet</span>
                </a>
            </div>
        </div>

        <!-- Filtre par pôle de service -->
        <div class="bg-white p-4 rounded-xl border border-[#E5E7EB] flex flex-wrap items-center justify-between gap-3 text-xs">
            <div class="flex items-center gap-2 overflow-x-auto py-1">
                <span class="font-bold text-[#1A1A1A] mr-1">Filtrer par pôle :</span>
                <a href="{{ route('admin.portfolio.index') }}" 
                   class="px-3 py-1.5 rounded-lg font-medium transition-colors {{ !request('service') ? 'bg-[#F5791F] text-white font-bold' : 'bg-[#FAF4EF] text-[#1A1A1A] hover:bg-[#F5791F]/10' }}">
                    Tous ({{ \App\Models\PortfolioProject::count() }})
                </a>
                @foreach($services as $srv)
                    <a href="{{ route('admin.portfolio.index', ['service' => $srv]) }}" 
                       class="px-3 py-1.5 rounded-lg font-medium transition-colors whitespace-nowrap {{ request('service') === $srv ? 'bg-[#F5791F] text-white font-bold' : 'bg-[#FAF4EF] text-[#1A1A1A] hover:bg-[#F5791F]/10' }}">
                        {{ $srv }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Tableau des Projets -->
        <div class="bg-white rounded-2xl border border-[#E5E7EB] overflow-hidden">
            @if($projects->isEmpty())
                <div class="p-12 text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-[#FAF4EF] text-[#F5791F]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-bold text-[#1A1A1A]">Aucune réalisation trouvée</h3>
                    <p class="mt-1 text-xs text-[#555555] max-w-sm mx-auto">
                        @if(request('service'))
                            Aucun projet n'est actuellement enregistré pour le pôle sélectionné.
                        @else
                            Votre portfolio est actuellement vide. Ajoutez les succès et projets clients réalisés.
                        @endif
                    </p>
                    <div class="mt-5 flex justify-center gap-3">
                        @if(request('service'))
                            <a href="{{ route('admin.portfolio.index') }}" 
                               class="inline-flex items-center gap-2 rounded-lg border border-[#E5E7EB] bg-white px-4 py-2 text-xs font-bold text-[#1A1A1A] hover:bg-slate-50 transition-colors">
                                Réinitialiser le filtre
                            </a>
                        @endif
                        <a href="{{ route('admin.portfolio.create') }}" 
                           class="inline-flex items-center gap-2 rounded-lg bg-[#1A1A1A] px-4 py-2 text-xs font-bold text-white hover:bg-[#F5791F] transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                            <span>Créer le premier projet</span>
                        </a>
                    </div>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-[#FAF4EF]/40 border-b border-[#E5E7EB] text-[#555555] font-bold uppercase tracking-wider text-[11px]">
                            <tr>
                                <th scope="col" class="py-3.5 pl-6 pr-3">Projet</th>
                                <th scope="col" class="px-3 py-3.5">Client</th>
                                <th scope="col" class="px-3 py-3.5">Pôle / Service</th>
                                <th scope="col" class="px-3 py-3.5 text-center">À la une</th>
                                <th scope="col" class="px-3 py-3.5 text-center">Ordre</th>
                                <th scope="col" class="px-3 py-3.5 text-center">Statut</th>
                                <th scope="col" class="py-3.5 pl-3 pr-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E5E7EB]">
                            @foreach($projects as $project)
                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    <!-- Image + Titre -->
                                    <td class="py-4 pl-6 pr-3">
                                        <div class="flex items-center gap-3">
                                            <div class="h-12 w-16 shrink-0 overflow-hidden rounded-lg bg-slate-100 border border-[#E5E7EB]">
                                                <img src="{{ $project->image_url }}" 
                                                     alt="{{ $project->title }}" 
                                                     class="h-full w-full object-cover">
                                            </div>
                                            <div>
                                                <span class="font-bold text-[#1A1A1A] block">{!! $project->title !!}</span>
                                                @if($project->link)
                                                    <a href="{{ $project->link }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] text-[#F5791F] hover:underline mt-0.5">
                                                        <span>Lien externe</span>
                                                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                        </svg>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Client -->
                                    <td class="px-3 py-4 text-[#1A1A1A] font-medium">
                                        {{ $project->client ?: '—' }}
                                    </td>

                                    <!-- Service -->
                                    <td class="px-3 py-4">
                                        <span class="inline-flex items-center rounded-md bg-[#FAF4EF] px-2 py-1 text-[11px] font-semibold text-[#F5791F] border border-[#F4E6D9]">
                                            {{ $project->service }}
                                        </span>
                                    </td>

                                    <!-- Featured -->
                                    <td class="px-3 py-4 text-center">
                                        @if($project->is_featured)
                                            <span class="inline-flex items-center rounded-md bg-amber-50 px-2 py-0.5 text-[11px] font-bold text-amber-700 border border-amber-200">
                                                En avant
                                            </span>
                                        @else
                                            <span class="text-[#555555]/60 text-[11px]">Non</span>
                                        @endif
                                    </td>

                                    <!-- Ordre -->
                                    <td class="px-3 py-4 text-center font-mono text-slate-700">
                                        {{ $project->order }}
                                    </td>

                                    <!-- Statut -->
                                    <td class="px-3 py-4 text-center">
                                        @if($project->is_active)
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
                                            <a href="{{ route('admin.portfolio.edit', $project) }}" 
                                               class="rounded-lg border border-[#E5E7EB] bg-white px-2.5 py-1.5 text-xs font-medium text-[#1A1A1A] hover:bg-[#FAF4EF] hover:text-[#F5791F] transition-colors"
                                               title="Modifier">
                                                Modifier
                                            </a>

                                            <form action="{{ route('admin.portfolio.destroy', $project) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Confirmez-vous la suppression définitive de ce projet ?');"
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

                @if($projects->hasPages())
                    <div class="p-4 border-t border-[#E5E7EB]">
                        {{ $projects->links() }}
                    </div>
                @endif
            @endif
        </div>

    </div>
@endsection
