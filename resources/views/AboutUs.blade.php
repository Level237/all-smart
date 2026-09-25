@extends('layouts.main')

@section('title', 'Allsmart - À propos')

@section('content')
    
<!-- Hero Section with Image -->
<section class="relative min-h-[600px] lg:min-h-[700px]">
    <!-- Background Image -->
    <div class="absolute inset-0 h-full w-full">
        <img src="{{ asset('assets/slideabout.jpg') }}" 
             alt="Team collaboration" 
             class="h-full w-full object-cover object-center">
        <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-black/10 to-[#F5791F]/90"></div>
    </div>

    <!-- Content Container -->
    
</section>

<!-- Orange Content Section -->
 <x-about.intro />
<x-homepage.cta />
@endsection