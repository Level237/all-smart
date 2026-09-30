<div class="flex items-center justify-between gap-3 bg-white p-3 rounded-xl border border-[#E5E7EB]">
    <div class="flex items-center gap-2.5 min-w-0">
        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-[#1A1A1A] text-white font-bold text-xs">
            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
        </div>
        <div class="min-w-0">
            <div class="flex items-center gap-1.5">
                <p class="truncate text-xs font-bold text-[#1A1A1A]">{{ Auth::user()->name }}</p>
                <span class="rounded border border-[#E5E7EB] bg-[#FAF4EF] px-1.5 py-0.2 text-[9px] font-bold uppercase text-[#F5791F]">
                    {{ Auth::user()->role ?? 'admin' }}
                </span>
            </div>
            <p class="truncate text-[11px] text-[#555555]">{{ Auth::user()->email }}</p>
        </div>
    </div>

    <!-- Formulaire de déconnexion sécurisé (POST) -->
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" 
                title="Se déconnecter"
                class="rounded-lg p-1.5 text-[#555555] hover:bg-[#FAF4EF] hover:text-[#DC2626] transition-colors cursor-pointer">
            <span class="sr-only">Se déconnecter</span>
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
        </button>
    </form>
</div>
