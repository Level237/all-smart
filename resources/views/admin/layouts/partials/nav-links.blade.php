<!-- Tableau de bord -->
<li>
    @php
        $isDashboard = request()->routeIs('admin.dashboard');
    @endphp
    <a href="{{ route('admin.dashboard') }}" 
       class="group flex items-center gap-x-3 rounded-lg px-3 py-2.5 text-xs font-medium transition-all {{ $isDashboard ? 'bg-[#FAF4EF] text-[#F5791F] font-bold border-l-4 border-[#F5791F]' : 'text-[#1A1A1A] hover:bg-[#FAF4EF]/60 hover:text-[#F5791F]' }}">
        <svg class="h-5 w-5 shrink-0 {{ $isDashboard ? 'text-[#F5791F]' : 'text-[#555555] group-hover:text-[#F5791F]' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        <span>Tableau de Bord</span>
    </a>
</li>

<!-- Rendez-vous -->
<li>
    @php
        $hasAppointmentsRoute = Route::has('admin.appointments.index');
        $isAppointments = request()->routeIs('admin.appointments.*');
    @endphp
    <a href="{{ $hasAppointmentsRoute ? route('admin.appointments.index') : '#' }}" 
       class="group flex items-center gap-x-3 rounded-lg px-3 py-2.5 text-xs font-medium transition-all {{ $isAppointments ? 'bg-[#FAF4EF] text-[#F5791F] font-bold border-l-4 border-[#F5791F]' : 'text-[#1A1A1A] hover:bg-[#FAF4EF]/60 hover:text-[#F5791F]' }}">
        <svg class="h-5 w-5 shrink-0 {{ $isAppointments ? 'text-[#F5791F]' : 'text-[#555555] group-hover:text-[#F5791F]' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <span>Rendez-vous</span>
    </a>
</li>

<!-- Smart Team -->
<li>
    @php
        $hasTeamRoute = Route::has('admin.team.index');
        $isTeam = request()->routeIs('admin.team.*');
    @endphp
    <a href="{{ $hasTeamRoute ? route('admin.team.index') : '#' }}" 
       class="group flex items-center gap-x-3 rounded-lg px-3 py-2.5 text-xs font-medium transition-all {{ $isTeam ? 'bg-[#FAF4EF] text-[#F5791F] font-bold border-l-4 border-[#F5791F]' : 'text-[#1A1A1A] hover:bg-[#FAF4EF]/60 hover:text-[#F5791F]' }}">
        <svg class="h-5 w-5 shrink-0 {{ $isTeam ? 'text-[#F5791F]' : 'text-[#555555] group-hover:text-[#F5791F]' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
        <span>Smart Team</span>
    </a>
</li>

<!-- Réalisations -->
<li>
    @php
        $hasPortfolioRoute = Route::has('admin.portfolio.index');
        $isPortfolio = request()->routeIs('admin.portfolio.*');
    @endphp
    <a href="{{ $hasPortfolioRoute ? route('admin.portfolio.index') : '#' }}" 
       class="group flex items-center gap-x-3 rounded-lg px-3 py-2.5 text-xs font-medium transition-all {{ $isPortfolio ? 'bg-[#FAF4EF] text-[#F5791F] font-bold border-l-4 border-[#F5791F]' : 'text-[#1A1A1A] hover:bg-[#FAF4EF]/60 hover:text-[#F5791F]' }}">
        <svg class="h-5 w-5 shrink-0 {{ $isPortfolio ? 'text-[#F5791F]' : 'text-[#555555] group-hover:text-[#F5791F]' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <span>Réalisations</span>
    </a>
</li>

<!-- Réseau Créateurs -->
<li>
    @php
        $hasCreatorsRoute = Route::has('admin.creators.index');
        $isCreators = request()->routeIs('admin.creators.*');
    @endphp
    <a href="{{ $hasCreatorsRoute ? route('admin.creators.index') : '#' }}" 
       class="group flex items-center gap-x-3 rounded-lg px-3 py-2.5 text-xs font-medium transition-all {{ $isCreators ? 'bg-[#FAF4EF] text-[#F5791F] font-bold border-l-4 border-[#F5791F]' : 'text-[#1A1A1A] hover:bg-[#FAF4EF]/60 hover:text-[#F5791F]' }}">
        <svg class="h-5 w-5 shrink-0 {{ $isCreators ? 'text-[#F5791F]' : 'text-[#555555] group-hover:text-[#F5791F]' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632zM18 10.5h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"/>
        </svg>
        <span>Réseau Créateurs</span>
    </a>
</li>

<!-- Séparateur Navigation Secondaire -->
<li class="pt-5 pb-2">
    <div class="text-[10px] font-bold tracking-wider text-[#555555]/60 uppercase px-3">
        Liens Rapides
    </div>
</li>

<li>
    <a href="/" target="_blank" 
       class="group flex items-center gap-x-3 rounded-lg px-3 py-2 text-xs font-medium text-[#555555] hover:bg-[#FAF4EF]/60 hover:text-[#F5791F] transition-all">
        <svg class="h-4 w-4 shrink-0 text-[#555555] group-hover:text-[#F5791F]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
        </svg>
        <span>Voir le site public</span>
    </a>
</li>
