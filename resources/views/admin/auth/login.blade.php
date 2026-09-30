<!DOCTYPE html>
<html lang="fr" class="h-full bg-[#FAF4EF]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Connexion | Allsmart</title>
    
    <!-- Police Google : Ubuntu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: "Ubuntu", sans-serif;
        }
    </style>
</head>
<body class="h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8 text-gray-900 bg-[#FAF4EF]">

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <!-- Logo AllSmart -->
        <div class="flex justify-center">
            <a href="/" class="focus:outline-none focus:ring-2 focus:ring-[#F5791F] rounded-lg">
                <img src="{{ asset('assets/logo.png') }}" alt="Allsmart Logo" class="h-12 w-auto transition-transform hover:scale-105 duration-300">
            </a>
        </div>

        <h1 class="mt-6 text-center text-2xl sm:text-3xl font-black uppercase tracking-tight text-[#1A1A1A]">
            Espace Administration
        </h1>
        <p class="mt-1 text-center text-xs sm:text-sm font-medium text-gray-500">
            Portail de gestion interne AllSmart Agency
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md px-4 sm:px-0">
        <div class="bg-white py-8 px-6 sm:px-10 rounded-[20px] border border-[#F4E6D9] shadow-[0_12px_36px_rgba(0,0,0,0.06)]">
            
            <!-- Alertes Succès & Déconnexion -->
            @if (session('success'))
                <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-200/80 p-4 text-sm font-medium text-emerald-800 flex items-start gap-3">
                    <svg class="h-5 w-5 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Alertes Erreur de Session ou Validation -->
            @if (session('error'))
                <div class="mb-6 rounded-xl bg-rose-50 border border-rose-200/80 p-4 text-sm font-medium text-rose-800 flex items-start gap-3">
                    <svg class="h-5 w-5 text-rose-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-xl bg-rose-50 border border-rose-200/80 p-4 text-sm font-medium text-rose-800">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulaire de Connexion -->
            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Champ Email -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                        Adresse Email <span class="text-[#F5791F]">*</span>
                    </label>
                    <div class="relative">
                        <input id="email" 
                               name="email" 
                               type="email" 
                               autocomplete="email" 
                               required 
                               value="{{ old('email') }}"
                               placeholder="Entrez votre adresse email"
                               class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all placeholder:text-gray-400">
                    </div>
                </div>

                <!-- Champ Mot de Passe -->
                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                        Mot de passe <span class="text-[#F5791F]">*</span>
                    </label>
                    <div class="relative">
                        <input id="password" 
                               name="password" 
                               type="password" 
                               autocomplete="current-password" 
                               required 
                               placeholder="Entrez votre mot de passe"
                               class="w-full rounded-xl bg-white px-4 py-3 text-sm text-[#1A1A1A] border border-gray-300 focus:border-[#F5791F] focus:outline-none focus:ring-2 focus:ring-[#F5791F]/20 transition-all placeholder:text-gray-400">
                    </div>
                </div>

                <!-- Se souvenir de moi -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" 
                               name="remember" 
                               type="checkbox" 
                               class="h-4 w-4 rounded border-gray-300 text-[#F5791F] focus:ring-[#F5791F] cursor-pointer">
                        <label for="remember" class="ml-2 block text-xs font-medium text-gray-600 cursor-pointer">
                            Se souvenir de moi
                        </label>
                    </div>

                    <span class="text-xs text-gray-400">Accès restreint</span>
                </div>

                <!-- Bouton Connexion -->
                <div>
                    <button type="submit" 
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-[#F5791F] px-6 py-3.5 text-sm sm:text-base font-bold text-white shadow-md transition-all duration-300 hover:bg-[#d6630f] hover:scale-[1.01] focus:outline-none focus:ring-4 focus:ring-[#F5791F]/30 cursor-pointer">
                        <span>Se connecter au Back-Office</span>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Pied du formulaire -->
            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <a href="/" class="inline-flex items-center gap-1.5 text-xs font-bold text-gray-500 hover:text-[#F5791F] transition-colors">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Retour au site public</span>
                </a>
            </div>

        </div>
    </div>

</body>
</html>
