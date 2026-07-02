<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Allsmart - Faites rayonner votre marque avec notre expertise en stratégie, image et impact.')">
    <title>@yield('title', 'Allsmart')</title>
    
    <!-- Contenu additionnel pour la balise head (ex: preload image) -->
    @yield('head')
    
    <!-- Polices Google : Ubuntu (globale) & Zeyada (cursive) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Zeyada&display=swap" rel="stylesheet">

    <!-- Alpine.js pour l'interactivité (ex: Menu Mobile) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Police par défaut pour tout le contenu (Titres, Paragraphes, etc.) */
        body {
            font-family: "Ubuntu", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        /* Classe spécifique pour la police manuscrite */
        .font-zeyada {
            font-family: "Zeyada", cursive;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>
<body class="text-gray-900 bg-white">
    
    <!-- Header Global -->
    @if(View::exists('components.header'))
        <x-header />
    @endif

    <!-- Contenu Principal -->
    <main>
        @yield('content')
        {{ $slot ?? '' }}
    </main>

</body>
</html>
