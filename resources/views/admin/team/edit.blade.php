@extends('admin.layouts.app')

@section('title', 'Modifier un Collaborateur - Smart Team')

@section('header')
    <div class="flex items-center gap-2 text-xs text-[#555555]">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-[#F5791F]">Tableau de Bord</a>
        <span>/</span>
        <a href="{{ route('admin.team.index') }}" class="hover:text-[#F5791F]">Smart Team</a>
        <span>/</span>
        <span class="text-[#1A1A1A] font-bold">Modifier {{ $team->name }}</span>
    </div>
@endsection

@section('content')
    <div class="max-w-3xl mx-auto space-y-6">
        
        <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] flex items-center justify-between">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-[#1A1A1A] tracking-tight">Modifier le Profil</h1>
                <p class="text-xs sm:text-sm text-[#555555] mt-1">
                    Mettez à jour les informations du membre de la Smart Team.
                </p>
            </div>
            
            <form action="{{ route('admin.team.destroy', $team) }}" 
                  method="POST" 
                  onsubmit="return confirm('Confirmez-vous la suppression définitive de ce collaborateur ?');">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="rounded-xl border border-[#DC2626]/30 bg-white px-3.5 py-2 text-xs font-bold text-[#DC2626] hover:bg-[#DC2626]/10 transition-colors cursor-pointer">
                    Supprimer ce profil
                </button>
            </form>
        </div>

        <form action="{{ route('admin.team.update', $team) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 sm:p-8 rounded-2xl border border-[#E5E7EB] space-y-6">
            @csrf
            @method('PUT')

            <!-- Nom & Prénom -->
            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                    Nom Complet <span class="text-[#F5791F]">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       required 
                       value="{{ old('name', $team->name) }}" 
                       class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                @error('name')
                    <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Rôle & Label Zeyada (Grille 2 colonnes) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="role" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                        Poste / Fonction
                    </label>
                    <input type="text" 
                           id="role" 
                           name="role" 
                           value="{{ old('role', $team->role) }}" 
                           placeholder="Ex: Fondatrice, Directeur Artistique..."
                           class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                    @error('role')
                        <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="label" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                        Signature Affective (Police Zeyada)
                    </label>
                    <input type="text" 
                           id="label" 
                           name="label" 
                           value="{{ old('label', $team->label) }}" 
                           placeholder="Ex: Celle qui paie les salaires..."
                           class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                    @error('label')
                        <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Photo actuelle & Remplacement -->
            <div>
                <label for="photo" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                    Photo de Profil
                </label>
                
                <div class="flex items-center gap-4 mb-3">
                    <div class="h-16 w-16 shrink-0 overflow-hidden rounded-xl border border-[#E5E7EB] bg-slate-100">
                        <img src="{{ $team->photo_url }}" 
                             alt="{{ $team->name }}" 
                             class="h-full w-full object-cover object-top">
                    </div>
                    <div>
                        <p class="text-xs font-bold text-[#1A1A1A]">Photo actuelle</p>
                        <p class="text-[11px] text-[#555555]">Sélectionnez un nouveau fichier pour remplacer l'image existante.</p>
                    </div>
                </div>

                <input type="file" 
                       id="photo" 
                       name="photo" 
                       accept="image/jpeg,image/png,image/webp,image/avif"
                       class="block w-full text-xs text-[#555555] file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border file:border-[#E5E7EB] file:text-xs file:font-bold file:bg-[#FAF4EF] file:text-[#F5791F] hover:file:bg-[#F5791F] hover:file:text-white file:transition-colors file:cursor-pointer">
                @error('photo')
                    <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Réseaux Sociaux (Grille 2x2) -->
            <div class="border-t border-[#E5E7EB] pt-6">
                <h3 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-4">
                    Réseaux Sociaux Professionnels (Optionnels)
                </h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="linkedin_url" class="block text-[11px] font-medium text-[#555555] mb-1">LinkedIn</label>
                        <input type="url" 
                               id="linkedin_url" 
                               name="linkedin_url" 
                               value="{{ old('linkedin_url', $team->linkedin_url) }}" 
                               class="w-full rounded-xl bg-white px-3.5 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F]/20">
                    </div>

                    <div>
                        <label for="instagram_url" class="block text-[11px] font-medium text-[#555555] mb-1">Instagram</label>
                        <input type="url" 
                               id="instagram_url" 
                               name="instagram_url" 
                               value="{{ old('instagram_url', $team->instagram_url) }}" 
                               class="w-full rounded-xl bg-white px-3.5 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F]/20">
                    </div>

                    <div>
                        <label for="facebook_url" class="block text-[11px] font-medium text-[#555555] mb-1">Facebook</label>
                        <input type="url" 
                               id="facebook_url" 
                               name="facebook_url" 
                               value="{{ old('facebook_url', $team->facebook_url) }}" 
                               class="w-full rounded-xl bg-white px-3.5 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F]/20">
                    </div>

                    <div>
                        <label for="x_url" class="block text-[11px] font-medium text-[#555555] mb-1">X (Twitter)</label>
                        <input type="url" 
                               id="x_url" 
                               name="x_url" 
                               value="{{ old('x_url', $team->x_url) }}" 
                               class="w-full rounded-xl bg-white px-3.5 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F]/20">
                    </div>
                </div>
            </div>

            <!-- Ordre & Visibilité -->
            <div class="border-t border-[#E5E7EB] pt-6 grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
                <div>
                    <label for="order" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                        Ordre d'affichage
                    </label>
                    <input type="number" 
                           id="order" 
                           name="order" 
                           min="0"
                           value="{{ old('order', $team->order) }}" 
                           class="w-32 rounded-xl bg-white px-4 py-2.5 text-sm text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none">
                </div>

                <div class="flex items-center gap-3 pt-4 sm:pt-0">
                    <input type="checkbox" 
                           id="is_active" 
                           name="is_active" 
                           value="1" 
                           {{ old('is_active', $team->is_active) ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-[#E5E7EB] text-[#F5791F] focus:ring-[#F5791F] cursor-pointer">
                    <label for="is_active" class="text-xs font-bold text-[#1A1A1A] cursor-pointer select-none">
                        Actif et visible sur le site public
                    </label>
                </div>
            </div>

            <!-- Actions du Formulaire -->
            <div class="border-t border-[#E5E7EB] pt-6 flex items-center justify-end gap-3">
                <a href="{{ route('admin.team.index') }}" 
                   class="rounded-xl border border-[#E5E7EB] bg-white px-5 py-2.5 text-xs font-bold text-[#555555] hover:bg-slate-50 transition-colors">
                    Annuler
                </a>
                <button type="submit" 
                        class="rounded-xl bg-[#F5791F] px-6 py-2.5 text-xs font-bold text-white shadow-2xs hover:bg-[#d96716] transition-colors cursor-pointer">
                    Mettre à jour le Profil
                </button>
            </div>
        </form>

    </div>
@endsection
