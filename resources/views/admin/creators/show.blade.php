@extends('admin.layouts.app')

@section('title', 'Détails du Créateur - ' . $creator->name . ' (@' . ltrim($creator->handle, '@') . ')')

@section('header')
    <div class="flex items-center gap-2 text-xs text-[#555555]">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-[#F5791F]">Tableau de Bord</a>
        <span>/</span>
        <a href="{{ route('admin.creators.index') }}" class="hover:text-[#F5791F]">Réseau Créateurs</a>
        <span>/</span>
        <span class="text-[#1A1A1A] font-bold">{{ $creator->name }}</span>
    </div>
@endsection

@section('content')
    <div class="space-y-6">
        
        <!-- En-tête avec Navigation Retour, Identité et Actions Principales -->
        <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.creators.index') }}" 
                   class="rounded-xl border border-[#E5E7EB] bg-white p-2.5 text-[#555555] hover:text-[#1A1A1A] hover:bg-slate-50 transition-colors"
                   title="Retour à la liste des créateurs">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>

                <div class="relative h-16 w-16 rounded-2xl bg-[#FAF4EF] border border-[#E5E7EB] overflow-hidden shrink-0 flex items-center justify-center">
                    @if($creator->photo_url)
                        <img src="{{ $creator->photo_url }}" alt="{{ $creator->name }}" class="h-full w-full object-cover">
                    @else
                        <span class="font-bold text-xl text-[#F5791F]">{{ strtoupper(substr($creator->name, 0, 1)) }}</span>
                    @endif
                </div>

                <div>
                    <div class="flex flex-wrap items-center gap-2.5">
                        <h1 class="text-xl sm:text-2xl font-bold text-[#1A1A1A] tracking-tight">{{ $creator->name }}</h1>
                        
                        @if($creator->is_active)
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-[#16A34A]/10 px-2.5 py-0.5 text-xs font-bold text-[#16A34A] border border-[#16A34A]/20">
                                <span class="h-1.5 w-1.5 rounded-full bg-[#16A34A]"></span>
                                En ligne sur le site
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-[#F5791F]/10 px-2.5 py-0.5 text-xs font-bold text-[#F5791F] border border-[#F5791F]/20">
                                <span class="h-1.5 w-1.5 rounded-full bg-[#F5791F]"></span>
                                Dépublié / En attente
                            </span>
                        @endif
                    </div>
                    <p class="text-xs text-[#555555] mt-1 flex items-center gap-3">
                        <span class="font-bold text-[#1A1A1A]">{{ $creator->formatted_handle }}</span>
                        <span>•</span>
                        <span>Candidature enregistrée le {{ $creator->created_at->translatedFormat('d F Y à H:i') }}</span>
                    </p>
                </div>
            </div>

            <!-- Actions Rapides -->
            <div class="flex flex-wrap items-center gap-2.5 self-start md:self-auto">
                <!-- Toggle En ligne / Dépublier en 1 clic -->
                <form action="{{ route('admin.creators.toggle-active', $creator) }}" method="POST">
                    @csrf
                    @if($creator->is_active)
                        <button type="submit" 
                                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-bold bg-white border border-[#E5E7EB] text-[#555555] hover:text-[#DC2626] hover:border-[#DC2626]/40 transition-colors cursor-pointer"
                                title="Dépublier ce créateur du site public">
                            <svg class="h-3.5 w-3.5 text-[#555555]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"/>
                            </svg>
                            <span>Dépublier</span>
                        </button>
                    @else
                        <button type="submit" 
                                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-bold bg-[#16A34A] text-white hover:bg-[#15803d] shadow-2xs transition-colors cursor-pointer"
                                title="Mettre ce créateur en ligne immédiatement">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Mettre en ligne</span>
                        </button>
                    @endif
                </form>

                <!-- Éditer -->
                <a href="{{ route('admin.creators.edit', $creator) }}" 
                   class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-bold bg-[#1A1A1A] text-white hover:bg-[#F5791F] transition-colors">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/>
                    </svg>
                    <span>Modifier</span>
                </a>

                <!-- Supprimer -->
                <form action="{{ route('admin.creators.destroy', $creator) }}" 
                      method="POST" 
                      onsubmit="return confirm('Confirmez-vous la suppression définitive du profil de {{ addslashes($creator->name) }} ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="rounded-xl border border-[#DC2626]/30 bg-white px-3.5 py-2 text-xs font-bold text-[#DC2626] hover:bg-[#DC2626]/10 transition-colors cursor-pointer"
                            title="Supprimer définitivement ce profil">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Grille Principale (2 colonnes) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Colonne Gauche (2/3) : Bio, Thématiques, Niches -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Biographie / Présentation -->
                <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] space-y-3">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                        Bio & Pitch de Présentation
                    </h2>
                    @if($creator->bio)
                        <p class="text-sm text-[#1A1A1A] leading-relaxed whitespace-pre-line">{{ $creator->bio }}</p>
                    @else
                        <p class="text-xs italic text-[#555555]">Aucune biographie rédigée pour ce créateur.</p>
                    @endif
                </div>

                <!-- Niches & Domaines d'Expertise -->
                <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] space-y-3">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                        Niches & Thématiques de Création
                    </h2>
                    @if(!empty($creator->niches) && count($creator->niches) > 0)
                        <div class="flex flex-wrap gap-2 pt-1">
                            @foreach($creator->niches as $niche)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-[#FAF4EF] text-xs font-bold text-[#F5791F] border border-[#F5791F]/20">
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.386a6.002 6.002 0 002.502-2.502c.486-.827.313-1.908-.386-2.607L8.382 3.659A2.25 2.25 0 006.791 3z"/>
                                    </svg>
                                    {{ $niche }}
                                </span>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs italic text-[#555555]">Aucune niche renseignée.</p>
                    @endif
                </div>

                <!-- Langues de Contenu -->
                <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] space-y-3">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                        Langues de communication & expression
                    </h2>
                    @if(!empty($creator->languages) && count($creator->languages) > 0)
                        <div class="flex flex-wrap gap-2 pt-1">
                            @foreach($creator->languages as $lang)
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-slate-100 text-xs font-bold text-[#1A1A1A] border border-[#E5E7EB]">
                                    <svg class="h-3.5 w-3.5 text-[#555555]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896 3.064 2.457 5.84 4.5 8.125"/>
                                    </svg>
                                    {{ $lang }}
                                </span>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs italic text-[#555555]">Aucune langue renseignée.</p>
                    @endif
                </div>
            </div>

            <!-- Colonne Droite (1/3) : Paramètres Réseau, Ordre, Modération -->
            <div class="space-y-6">
                
                <!-- Détails Réseau & Plateforme -->
                <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                        Présence Digitale
                    </h2>

                    <div>
                        <span class="block text-[11px] font-bold text-[#555555] uppercase tracking-wider">Plateforme principale</span>
                        <p class="mt-1 text-sm font-bold text-[#1A1A1A] flex items-center gap-1.5">
                            <span class="h-2 w-2 rounded-full bg-[#F5791F]"></span>
                            {{ $creator->platform }}
                        </p>
                    </div>

                    @if($creator->platform_url)
                        <div>
                            <span class="block text-[11px] font-bold text-[#555555] uppercase tracking-wider">Lien vers le profil public</span>
                            <a href="{{ $creator->platform_url }}" 
                               target="_blank" 
                               rel="noopener noreferrer" 
                               class="mt-1 inline-flex items-center gap-1.5 text-xs font-bold text-[#F5791F] hover:underline break-all">
                                <span>{{ $creator->platform_url }}</span>
                                <svg class="h-3 w-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                                </svg>
                            </a>
                        </div>
                    @endif

                    <div class="border-t border-[#E5E7EB] pt-3">
                        <span class="block text-[11px] font-bold text-[#555555] uppercase tracking-wider">Localisation</span>
                        <p class="mt-1 text-xs font-bold text-[#1A1A1A] flex items-center gap-1.5">
                            <svg class="h-3.5 w-3.5 text-[#555555]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                            </svg>
                            {{ $creator->location }}
                        </p>
                    </div>

                    <div class="border-t border-[#E5E7EB] pt-3">
                        <span class="block text-[11px] font-bold text-[#555555] uppercase tracking-wider">Statut de disponibilité</span>
                        <p class="mt-1 text-xs font-semibold text-[#1A1A1A]">
                            {{ $creator->status }}
                        </p>
                    </div>
                </div>

                <!-- Ordre d'affichage -->
                <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                        Position & Ordre d'Affichage
                    </h2>
                    <p class="text-xs text-[#555555]">
                        Définit l'ordre dans lequel apparaît ce créateur sur la vitrine AllSmart (un nombre inférieur s'affiche en premier).
                    </p>

                    <form action="{{ route('admin.creators.update-order', $creator) }}" method="POST" class="flex items-center gap-3">
                        @csrf
                        <div class="relative w-28">
                            <input type="number" 
                                   name="order" 
                                   value="{{ $creator->order }}" 
                                   min="0"
                                   class="w-full rounded-xl bg-white px-3.5 py-2 text-xs font-bold text-center text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F]">
                        </div>
                        <button type="submit" 
                                class="px-4 py-2 rounded-xl text-xs font-bold bg-[#1A1A1A] text-white hover:bg-[#F5791F] transition-colors cursor-pointer">
                            Enregistrer l'ordre
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection
