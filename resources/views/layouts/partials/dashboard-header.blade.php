<header class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-40">
    <div class="flex items-center justify-between px-6 md:px-10 py-4">
        <!-- Left: Mobile Toggle & Page Info -->
        <div class="flex items-center gap-4">
            <button @click="sidebarOpen = true" class="lg:hidden p-2.5 bg-gray-50 text-gray-600 hover:bg-gray-100 hover:text-black rounded-xl transition-all active:scale-95 shadow-sm border border-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            
            <div class="hidden md:block">
                <h2 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] leading-none mb-1">Current Section</h2>
                <p class="text-sm font-black text-gray-900 leading-none">Management Hub</p>
            </div>
        </div>

        <!-- Center: Search (Refined) -->
        <div class="flex-1 max-w-lg mx-8 hidden lg:block">
            <form action="{{ route('admin.search') }}" method="GET" class="relative group">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 group-focus-within:text-[#D4AF37] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Search leads, properties, or articles..."
                    class="w-full pl-11 pr-4 h-12 bg-gray-50/50 border border-gray-100 focus:bg-white focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/5 rounded-2xl text-sm font-medium transition-all outline-none hover:border-gray-200"
                />
                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex gap-1 pointer-events-none">
                    <kbd class="px-1.5 py-0.5 text-[10px] font-black bg-gray-100 text-gray-400 rounded border border-gray-200 uppercase">⌘</kbd>
                    <kbd class="px-1.5 py-0.5 text-[10px] font-black bg-gray-100 text-gray-400 rounded border border-gray-200 uppercase">K</kbd>
                </div>
            </form>
        </div>

        <!-- Right: Actions -->
        <div class="flex items-center gap-2 md:gap-4">
            <!-- Profile Dropdown -->
            <div class="relative" x-data="{ userMenuOpen: false }">
                <button 
                    @click="userMenuOpen = !userMenuOpen"
                    @click.away="userMenuOpen = false"
                    class="w-10 h-10 rounded-2xl bg-black flex items-center justify-center shadow-lg shadow-black/10 overflow-hidden border-2 border-white ring-1 ring-gray-100 group cursor-pointer transition-all hover:scale-105 active:scale-95"
                >
                    @if(auth()->user()->avatar_url)
                        <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="w-full h-full object-cover">
                    @else
                        <span class="text-[#D4AF37] font-black text-sm uppercase">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    @endif
                </button>

                <!-- Dropdown Menu -->
                <div 
                    x-show="userMenuOpen"
                    x-cloak
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                    class="absolute right-0 mt-4 w-56 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden z-50 py-2"
                >
                    <div class="px-4 py-3 border-b border-gray-50 mb-1">
                        <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-1">Signed in as</p>
                        <p class="text-sm font-bold text-gray-900 truncate">{{ auth()->user()->name }}</p>
                    </div>

                    @php
                        $userRole = auth()->user()->role;
                        $profileRoute = match($userRole) {
                            'admin' => route('admin.profile'),
                            'agent' => route('agent.profile'),
                            default => route('user.profile'),
                        };
                    @endphp

                    <a href="{{ $profileRoute }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-gray-600 hover:bg-[#D4AF37]/10 hover:text-[#D4AF37] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        My Profile
                    </a>

                    <div class="border-t border-gray-50 mt-1 pt-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm font-bold text-red-500 hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
