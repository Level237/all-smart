@extends('admin.layouts.app')

@section('title', 'Ajouter une Réalisation - Administration AllSmart')

@section('header')
    <div class="flex items-center gap-2 text-xs text-[#555555]">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-[#F5791F]">Tableau de Bord</a>
        <span>/</span>
        <a href="{{ route('admin.portfolio.index') }}" class="hover:text-[#F5791F]">Réalisations</a>
        <span>/</span>
        <span class="text-[#1A1A1A] font-bold">Nouveau Projet</span>
    </div>
@endsection

@section('content')
    <div class="max-w-3xl mx-auto space-y-6">
        
        <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB]">
            <h1 class="text-xl sm:text-2xl font-bold text-[#1A1A1A] tracking-tight">Ajouter une Réalisation au Portfolio</h1>
            <p class="text-xs sm:text-sm text-[#555555] mt-1">
                Remplissez les détails du projet pour enrichir les cas clients de l'agence.
            </p>
        </div>

        <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 sm:p-8 rounded-2xl border border-[#E5E7EB] space-y-6">
            @csrf

            <!-- Titre du projet -->
            <div>
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                    Titre du Projet <span class="text-[#F5791F]">*</span>
                </label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       required 
                       value="{{ old('title') }}" 
                       placeholder="Ex: Campagne Digitale FECA-Scrabble 2026"
                       class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all placeholder:text-[#555555]/50">
                @error('title')
                    <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Client & Pôle de Service (Grille 2 colonnes) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="client" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                        Client / Marque
                    </label>
                    <input type="text" 
                           id="client" 
                           name="client" 
                           value="{{ old('client') }}" 
                           placeholder="Ex: Fédération Camerounaise de Scrabble"
                           class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all placeholder:text-[#555555]/50">
                    @error('client')
                        <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="service" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                        Pôle / Service <span class="text-[#F5791F]">*</span>
                    </label>
                    <select id="service" 
                            name="service" 
                            required
                            class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all">
                        <option value="">Sélectionnez un pôle...</option>
                        @foreach($services as $srv)
                            <option value="{{ $srv }}" {{ old('service') === $srv ? 'selected' : '' }}>
                                {{ $srv }}
                            </option>
                        @endforeach
                    </select>
                    @error('service')
                        <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                    Description du Projet
                </label>
                <textarea id="description" 
                          name="description" 
                          rows="4" 
                          placeholder="Décrivez les objectifs, le travail réalisé et les résultats obtenus pour ce client..."
                          class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all placeholder:text-[#555555]/50">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image de couverture & Lien externe -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-start">
                <div>
                    <label for="image" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                        Visuel / Image du projet
                    </label>
                    <input type="file" 
                           id="image" 
                           name="image" 
                           accept="image/jpeg,image/png,image/webp,image/avif"
                           class="block w-full text-xs text-[#555555] file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border file:border-[#E5E7EB] file:text-xs file:font-bold file:bg-[#FAF4EF] file:text-[#F5791F] hover:file:bg-[#F5791F] hover:file:text-white file:transition-colors file:cursor-pointer">
                    <p class="mt-1.5 text-[11px] text-[#555555]">Formats : JPG, PNG, WebP (2 Mo max). Ratio paysage recommandé (ex: 800x600 ou 1200x800).</p>
                    @error('image')
                        <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="link" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                        Lien externe (Optionnel)
                    </label>
                    <input type="url" 
                           id="link" 
                           name="link" 
                           value="{{ old('link') }}" 
                           placeholder="https://client-website.com"
                           class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all placeholder:text-[#555555]/50">
                    <p class="mt-1.5 text-[11px] text-[#555555]">URL vers le site web du projet ou la publication officielle.</p>
                    @error('link')
                        <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Options (Ordre, Visibilité, Mise en avant) -->
            <div class="border-t border-[#E5E7EB] pt-6 grid grid-cols-1 sm:grid-cols-3 gap-6 items-center">
                <div>
                    <label for="order" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                        Ordre d'affichage
                    </label>
                    <input type="number" 
                           id="order" 
                           name="order" 
                           min="0"
                           value="{{ old('order', 0) }}" 
                           class="w-32 rounded-xl bg-white px-4 py-2.5 text-sm text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none">
                    <p class="mt-1 text-[11px] text-[#555555]">0 = prioritaire.</p>
                </div>

                <div class="flex items-center gap-3 pt-4 sm:pt-0">
                    <input type="checkbox" 
                           id="is_active" 
                           name="is_active" 
                           value="1" 
                           {{ old('is_active', true) ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-[#E5E7EB] text-[#F5791F] focus:ring-[#F5791F] cursor-pointer">
                    <label for="is_active" class="text-xs font-bold text-[#1A1A1A] cursor-pointer select-none">
                        Actif (Visible en ligne)
                    </label>
                </div>

                <div class="flex items-center gap-3 pt-4 sm:pt-0">
                    <input type="checkbox" 
                           id="is_featured" 
                           name="is_featured" 
                           value="1" 
                           {{ old('is_featured', false) ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-[#E5E7EB] text-[#F5791F] focus:ring-[#F5791F] cursor-pointer">
                    <label for="is_featured" class="text-xs font-bold text-[#1A1A1A] cursor-pointer select-none">
                        Mettre à la une
                    </label>
                </div>
            </div>

            <!-- Actions du Formulaire -->
            <div class="border-t border-[#E5E7EB] pt-6 flex items-center justify-end gap-3">
                <a href="{{ route('admin.portfolio.index') }}" 
                   class="rounded-xl border border-[#E5E7EB] bg-white px-5 py-2.5 text-xs font-bold text-[#555555] hover:bg-slate-50 transition-colors">
                    Annuler
                </a>
                <button type="submit" 
                        class="rounded-xl bg-[#F5791F] px-6 py-2.5 text-xs font-bold text-white shadow-2xs hover:bg-[#d96716] transition-colors cursor-pointer">
                    Enregistrer la Réalisation
                </button>
            </div>
        </form>

    </div>
@endsection
