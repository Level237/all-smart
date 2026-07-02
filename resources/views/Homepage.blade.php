<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Allsmart - Faites rayonner votre marque avec notre expertise en stratégie, image et impact.">
    <title>Allsmart - Accueil</title>
    
    <!-- Préchargement de l'image principale pour les performances (LCP) -->
    <link rel="preload" as="image" href="{{ asset('assets/slider1.jpg') }}">
    
    <!-- Polices (Google Fonts - Inter & Montserrat pour un look moderne) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Alpine.js pour l'interactivité (ex: Menu Mobile) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-white">
    
    <!-- Header (s'il existe, sinon on l'inclura plus tard) -->
    @if(View::exists('components.header'))
        <x-header />
    @endif

    <main>
        <!-- Inclusion de la section Hero -->
        <x-hero />
        
        <!-- Le reste du contenu viendra ici -->
    </main>

</body>
</html>
