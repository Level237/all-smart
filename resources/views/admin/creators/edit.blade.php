@extends('admin.layouts.app')

@section('title', 'Modifier le Créateur - ' . $creator->name)

@section('header')
    <div class="flex items-center gap-2 text-xs text-[#555555]">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-[#F5791F]">Tableau de Bord</a>
        <span>/</span>
        <a href="{{ route('admin.creators.index') }}" class="hover:text-[#F5791F]">Réseau Créateurs</a>
        <span>/</span>
        <a href="{{ route('admin.creators.show', $creator) }}" class="hover:text-[#F5791F]">{{ $creator->name }}</a>
        <span>/</span>
        <span class="text-[#1A1A1A] font-bold">Modifier</span>
    </div>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        
        <!-- En-tête -->
        <div class="bg-white p-6 rounded-2xl border border-[#E5E7EB] flex items-center justify-between">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-[#1A1A1A] tracking-tight">Modifier le Profil de {{ $creator->name }}</h1>
                <p class="text-xs sm:text-sm text-[#555555] mt-1">
                    Mettez à jour les informations, la présence en ligne et l'ordre d'affichage.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.creators.show', $creator) }}" 
                   class="rounded-xl border border-[#E5E7EB] bg-white px-3.5 py-2 text-xs font-bold text-[#555555] hover:text-[#1A1A1A] hover:bg-slate-50 transition-colors">
                    Fiche détaillée
                </a>
            </div>
        </div>

        <form action="{{ route('admin.creators.update', $creator) }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="bg-white p-6 sm:p-8 rounded-2xl border border-[#E5E7EB] space-y-8">
            @csrf
            @method('PUT')

            <!-- Informations Personnelles -->
            <div class="space-y-6">
                <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                    1. Identité & Profil
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                            Nom Complet <span class="text-[#F5791F]">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               required 
                               value="{{ old('name', $creator->name) }}" 
                               class="w-full rounded-xl bg-white px-4 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F] transition-all">
                        @error('name')
                            <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="handle" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                            Pseudo / Handle Réseau <span class="text-[#F5791F]">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-2.5 text-xs font-bold text-[#555555]">@</span>
                            <input type="text" 
                                   id="handle" 
                                   name="handle" 
                                   required 
                                   value="{{ old('handle', ltrim($creator->handle, '@')) }}" 
                                   class="w-full rounded-xl bg-white pl-8 pr-4 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F] transition-all">
                        </div>
                        @error('handle')
                            <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="location" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                            Localisation / Ville <span class="text-[#F5791F]">*</span>
                        </label>
                        <input type="text" 
                               id="location" 
                               name="location" 
                               required 
                               value="{{ old('location', $creator->location) }}" 
                               class="w-full rounded-xl bg-white px-4 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F] transition-all">
                        @error('location')
                            <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                            Disponibilité <span class="text-[#F5791F]">*</span>
                        </label>
                        <select id="status" 
                                name="status" 
                                required
                                class="w-full rounded-xl bg-white px-4 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F] transition-all">
                            @php
                                $statusOptions = [
                                    'Disponible immédiatement',
                                    'Ouvert aux collabs marques',
                                    'En projet actif',
                                    'Sur devis / Contact exclusif'
                                ];
                            @endphp
                            @foreach($statusOptions as $opt)
                                <option value="{{ $opt }}" {{ old('status', $creator->status) === $opt ? 'selected' : '' }}>
                                    {{ $opt }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Photo actuelle et remplacement -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                        Photo de Profil / Visuel
                    </label>
                    <div class="flex items-center gap-4 mb-3">
                        <div class="relative h-14 w-14 rounded-xl bg-[#FAF4EF] border border-[#E5E7EB] overflow-hidden shrink-0 flex items-center justify-center">
                            @if($creator->photo_url)
                                <img src="{{ $creator->photo_url }}" alt="{{ $creator->name }}" class="h-full w-full object-cover">
                            @else
                                <span class="font-bold text-sm text-[#F5791F]">{{ strtoupper(substr($creator->name, 0, 1)) }}</span>
                            @endif
                        </div>
                        <div class="text-xs text-[#555555]">
                            <span class="font-bold text-[#1A1A1A] block">Photo actuelle</span>
                            <span>Téléversez un nouveau fichier ci-dessous pour remplacer la photo existante.</span>
                        </div>
                    </div>

                    <input type="file" 
                           id="photo" 
                           name="photo" 
                           accept="image/jpeg,image/png,image/webp,image/avif"
                           class="block w-full text-xs text-[#555555] file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border file:border-[#E5E7EB] file:text-xs file:font-bold file:bg-[#FAF4EF] file:text-[#F5791F] hover:file:bg-[#F5791F] hover:file:text-white file:transition-colors file:cursor-pointer">
                    <p class="mt-1 text-[11px] text-[#555555]">Formats : JPG, PNG, WebP (3 Mo max).</p>
                    @error('photo')
                        <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bio -->
                <div>
                    <label for="bio" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                        Biographie / Pitch Créateur
                    </label>
                    <textarea id="bio" 
                              name="bio" 
                              rows="4" 
                              class="w-full rounded-xl bg-white px-4 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F] transition-all">{{ old('bio', $creator->bio) }}</textarea>
                    @error('bio')
                        <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Réseau & Plateforme -->
            <div class="space-y-6 pt-4 border-t border-[#E5E7EB]">
                <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                    2. Présence Digitale & Plateforme
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="platform" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                            Plateforme Principale <span class="text-[#F5791F]">*</span>
                        </label>
                        <select id="platform" 
                                name="platform" 
                                required
                                class="w-full rounded-xl bg-white px-4 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F] transition-all">
                            @php
                                $platformOptions = ['TikTok', 'Instagram', 'YouTube', 'LinkedIn', 'Facebook', 'X / Twitter', 'Autre'];
                            @endphp
                            @foreach($platformOptions as $plat)
                                <option value="{{ $plat }}" {{ old('platform', $creator->platform) === $plat ? 'selected' : '' }}>
                                    {{ $plat }}
                                </option>
                            @endforeach
                        </select>
                        @error('platform')
                            <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="platform_url" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                            Lien vers le Profil Public
                        </label>
                        <input type="url" 
                               id="platform_url" 
                               name="platform_url" 
                               value="{{ old('platform_url', $creator->platform_url) }}" 
                               class="w-full rounded-xl bg-white px-4 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F] transition-all">
                        @error('platform_url')
                            <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Niches & Langues -->
            <div class="space-y-6 pt-4 border-t border-[#E5E7EB]">
                <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                    3. Thématiques & Langues
                </h2>

                <!-- Niches -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-2">
                        Niches & Thématiques
                    </label>
                    @php
                        $availableNiches = [
                            'Tech / IA', 'Lifestyle / Mode', 'Humour / Divertissement', 
                            'Business / Entreprenariat', 'Musique / Danse', 'Cuisine / Food', 
                            'Voyage / Tourisme', 'Sport / Fitness', 'Art / Design / Créa'
                        ];
                        $currentNiches = old('niches', $creator->niches ?? []);
                    @endphp
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach($availableNiches as $niche)
                            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-[#E5E7EB] bg-[#FAF4EF]/30 hover:bg-[#FAF4EF] cursor-pointer transition-colors">
                                <input type="checkbox" 
                                       name="niches[]" 
                                       value="{{ $niche }}"
                                       {{ in_array($niche, (array)$currentNiches) ? 'checked' : '' }}
                                       class="rounded text-[#F5791F] focus:ring-[#F5791F] h-4 w-4 border-[#E5E7EB]">
                                <span class="text-xs font-medium text-[#1A1A1A]">{{ $niche }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('niches')
                        <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Langues -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-2">
                        Langues de communication
                    </label>
                    @php
                        $availableLangs = ['Français', 'Anglais', 'Douala', 'Ewondo', 'Pidgin'];
                        $currentLangs = old('languages', $creator->languages ?? []);
                    @endphp
                    <div class="flex flex-wrap gap-3">
                        @foreach($availableLangs as $lang)
                            <label class="flex items-center gap-2 p-2.5 px-3 rounded-xl border border-[#E5E7EB] bg-white hover:bg-slate-50 cursor-pointer transition-colors">
                                <input type="checkbox" 
                                       name="languages[]" 
                                       value="{{ $lang }}"
                                       {{ in_array($lang, (array)$currentLangs) ? 'checked' : '' }}
                                       class="rounded text-[#F5791F] focus:ring-[#F5791F] h-4 w-4 border-[#E5E7EB]">
                                <span class="text-xs font-medium text-[#1A1A1A]">{{ $lang }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('languages')
                        <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Publication & Ordre -->
            <div class="space-y-6 pt-4 border-t border-[#E5E7EB]">
                <h2 class="text-xs font-bold uppercase tracking-wider text-[#1A1A1A] border-b border-[#E5E7EB] pb-3">
                    4. Paramètres d'Affichage & Publication
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
                    <div>
                        <label for="order" class="block text-xs font-bold uppercase tracking-wider text-[#1A1A1A] mb-1.5">
                            Ordre d'Affichage (Position)
                        </label>
                        <input type="number" 
                               id="order" 
                               name="order" 
                               min="0"
                               value="{{ old('order', $creator->order) }}" 
                               class="w-full rounded-xl bg-white px-4 py-2.5 text-xs text-[#1A1A1A] border border-[#E5E7EB] focus:border-[#F5791F] focus:outline-none focus:ring-1 focus:ring-[#F5791F] transition-all">
                        <p class="mt-1 text-[11px] text-[#555555]">0 = Prioritaire / En premier sur la vitrine.</p>
                        @error('order')
                            <p class="mt-1 text-xs text-[#DC2626] font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-2 sm:pt-4">
                        <label class="flex items-center gap-3 p-4 rounded-xl border border-[#E5E7EB] bg-[#FAF4EF]/40 cursor-pointer">
                            <input type="checkbox" 
                                   name="is_active" 
                                   value="1" 
                                   {{ old('is_active', $creator->is_active) ? 'checked' : '' }}
                                   class="h-4 w-4 rounded text-[#16A34A] focus:ring-[#16A34A] border-[#E5E7EB]">
                            <div>
                                <span class="text-xs font-bold text-[#1A1A1A] block">En ligne sur le site</span>
                                <span class="text-[11px] text-[#555555] block">Coché = visible publiquement / Décoché = dépublié.</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Boutons de Validation -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-[#E5E7EB]">
                <a href="{{ route('admin.creators.index') }}" 
                   class="rounded-xl border border-[#E5E7EB] bg-white px-5 py-2.5 text-xs font-bold text-[#555555] hover:text-[#1A1A1A] hover:bg-slate-50 transition-colors">
                    Annuler
                </a>
                <button type="submit" 
                        class="rounded-xl bg-[#F5791F] px-6 py-2.5 text-xs font-bold text-white shadow-2xs hover:bg-[#d96716] transition-colors cursor-pointer">
                    Mettre à jour le créateur
                </button>
            </div>
        </form>

    </div>
@endsection
