@extends('layouts.main')

@section('title', 'Allsmart - Accueil')

@section('head')
    <!-- Préchargement de l'image principale pour les performances (LCP) -->
    <link rel="preload" as="image" href="{{ asset('assets/slider1.jpg') }}">
@endsection

@section('content')
    <!-- Inclusion de la section Hero -->
    <x-hero />
    
    <!-- Section À Propos -->
    <x-homepage.about />
    
    <!-- Section Nos Offres -->
    <x-homepage.offer />
    
    <!-- Section Nos Succès -->
    <x-homepage.success />

    <!-- Section Blog -->
    

    <!-- Section CTA -->
   
    
    <!-- Section Partenaires -->
    <x-homepage.partner />
<x-homepage.blog />
     <x-homepage.cta />
@endsection
