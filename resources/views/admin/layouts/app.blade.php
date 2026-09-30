<!DOCTYPE html>
<html lang="fr" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Smart Desk | Administration AllSmart')</title>

    <!-- Google Fonts: Ubuntu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- Alpine.js pour l'interactivité du Back-Office -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: "Ubuntu", sans-serif;
        }
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="h-full bg-slate-50 text-[#1A1A1A] antialiased" x-data="{ sidebarOpen: false }">

    <!-- Voile et Drawer Mobile (Sidebar Mobile) -->
    <div x-cloak x-show="sidebarOpen" class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
        <!-- Backdrop d'assombrissement -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-black/60 backdrop-blur-xs"></div>

        <!-- Panneau Coulissant -->
        <div class="fixed inset-0 flex">
            <div x-show="sidebarOpen" 
                 x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="-translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="-translate-x-full"
                 class="relative mr-16 flex w-full max-w-xs flex-1">
                
                <!-- Bouton Fermer -->
                <div class="absolute top-0 left-full flex w-16 justify-center pt-5">
                    <button type="button" @click="sidebarOpen = false" class="-m-2.5 p-2.5 text-white hover:text-gray-200 cursor-pointer">
                        <span class="sr-only">Fermer la navigation</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Contenu Navigation Mobile -->
                <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-4 shadow-xl">
                    <div class="flex h-16 shrink-0 items-center gap-3 border-b border-slate-100">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                            <img src="{{ asset('assets/logo.png') }}" alt="Allsmart" class="h-8 w-auto">
                            <span class="rounded-md bg-[#FAF4EF] px-2 py-0.5 text-xs font-bold text-[#F5791F] border border-[#F4E6D9]">Smart Desk</span>
                        </a>
                    </div>
                    
                    <nav class="flex flex-1 flex-col justify-between">
                        <ul role="list" class="flex flex-1 flex-col gap-y-1">
                            @include('admin.layouts.partials.nav-links')
                        </ul>

                        <!-- Profil & Déconnexion Mobile -->
                        <div class="border-t border-slate-200 pt-4 mt-6">
                            @include('admin.layouts.partials.user-card')
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Desktop (Fixe à gauche) -->
    <aside class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col bg-white border-r border-slate-200 z-30 shadow-xs">
        <div class="flex grow flex-col gap-y-5 overflow-y-auto px-6 pb-4">
            
            <!-- Logo & En-tête -->
            <div class="flex h-16 shrink-0 items-center gap-2.5 border-b border-slate-100">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
                    <img src="{{ asset('assets/logo.png') }}" alt="Allsmart" class="h-8 w-auto">
                    <span class="rounded-md bg-[#FAF4EF] px-2 py-0.5 text-[11px] font-bold text-[#F5791F] border border-[#F4E6D9]">Smart Desk</span>
                </a>
            </div>

            <!-- Liens de navigation -->
            <nav class="flex flex-1 flex-col justify-between">
                <ul role="list" class="flex flex-1 flex-col gap-y-1">
                    @include('admin.layouts.partials.nav-links')
                </ul>

                <!-- Profil Administrateur & Déconnexion -->
                <div class="border-t border-slate-200 pt-4 mt-6">
                    @include('admin.layouts.partials.user-card')
                </div>
            </nav>
        </div>
    </aside>

    <!-- Zone Principale (Décalée sur Desktop) -->
    <div class="lg:pl-64 flex flex-col min-h-screen">
        
        <!-- Top Bar Sticky -->
        <header class="sticky top-0 z-20 flex h-16 shrink-0 items-center justify-between border-b border-slate-200 bg-white/95 backdrop-blur-xs px-4 sm:px-6 lg:px-8 shadow-2xs">
            
            <!-- Gauche : Burger mobile + Titre/Fil d'Ariane -->
            <div class="flex items-center gap-4">
                <button type="button" @click="sidebarOpen = true" class="-m-2.5 p-2.5 text-slate-700 lg:hidden cursor-pointer hover:text-slate-900">
                    <span class="sr-only">Ouvrir le menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <div>
                    @yield('header')
                </div>
            </div>

            <!-- Droite : Badge furtif + Lien vers site public -->
            <div class="flex items-center gap-3 sm:gap-4">
                <span class="hidden sm:inline-flex items-center rounded-md border border-[#E5E7EB] bg-white px-2.5 py-1 text-[11px] font-medium text-[#555555]">
                    Session sécurisée
                </span>

                <a href="/" target="_blank" class="inline-flex items-center gap-1.5 rounded-lg border border-[#E5E7EB] bg-white px-3 py-1.5 text-xs font-medium text-[#1A1A1A] hover:text-[#F5791F] transition-colors shadow-2xs">
                    <span>Site public</span>
                    <svg class="h-3.5 w-3.5 text-[#555555]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
            </div>
        </header>

        <!-- Zone de Notifications Flash -->
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 pt-6">
            @if(session('success'))
                <div class="mb-4 flex items-center justify-between rounded-xl border border-[#16A34A]/30 bg-[#16A34A]/10 p-4 text-[#16A34A] shadow-2xs" role="alert">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-[#16A34A] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 flex items-center justify-between rounded-xl border border-[#DC2626]/30 bg-[#DC2626]/10 p-4 text-[#DC2626] shadow-2xs" role="alert">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-[#DC2626] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            @if(session('warning'))
                <div class="mb-4 flex items-center justify-between rounded-xl border border-[#D97706]/30 bg-[#D97706]/10 p-4 text-[#D97706] shadow-2xs" role="alert">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-[#D97706] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <p class="text-sm font-medium">{{ session('warning') }}</p>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 rounded-xl border border-[#DC2626]/30 bg-[#DC2626]/10 p-4 text-[#DC2626] shadow-2xs" role="alert">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="h-5 w-5 text-[#DC2626] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-bold">Veuillez corriger les erreurs suivantes :</span>
                    </div>
                    <ul class="list-disc list-inside text-xs space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Contenu Principal Injecté -->
        <main class="flex-1 pb-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-4">
                @yield('content')
            </div>
        </main>

        <!-- Footer Administratif Sobre -->
        <footer class="border-t border-[#E5E7EB] bg-white py-4 px-4 sm:px-6 lg:px-8 text-center sm:flex sm:justify-between text-xs text-[#555555]">
            <p>AllSmart Consulting / Back-Office d'Administration</p>
            <p class="mt-1 sm:mt-0 font-medium">Espace confidentiel et restreint</p>
        </footer>
    </div>

</body>
</html>
