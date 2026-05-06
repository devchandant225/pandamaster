<header
    x-data="{ mobileMenuOpen: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
    :class="scrolled ? 'glass' : 'bg-gray-900/50'"
    class="text-white sticky top-0 z-50 transition-all duration-500 border-b border-yellow-500/20"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                @if(isset($adminSettings) && $adminSettings->logo)
                    <img src="{{ Storage::url($adminSettings->logo) }}" alt="Orion Star" class="h-12 w-auto transition-transform duration-300 group-hover:scale-110">
                @else
                    <div class="text-3xl font-black transition-transform duration-300 group-hover:scale-110">
                        <span class="text-yellow-500 text-glow-yellow uppercase">Orion</span><span class="text-white uppercase">Star</span>
                    </div>
                @endif
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-4">
                <a href="{{ route('home') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-[10px] tracking-widest uppercase">
                    Home
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>

                @foreach($gameTypes as $type)
                <a href="{{ route('games.index', ['type' => $type['slug']]) }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-[10px] tracking-widest uppercase">
                    {{ $type['label'] }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                @endforeach

                <a href="{{ route('login') }}" class="ml-4 group relative bg-gradient-to-r from-yellow-500 to-yellow-400 hover:from-yellow-400 hover:to-yellow-300 text-black px-6 py-2.5 rounded-xl transition-all font-black shadow-lg shadow-yellow-500/30 hover:shadow-yellow-500/50 transform hover:-translate-y-0.5 overflow-hidden">
                    <span class="relative z-10 uppercase tracking-tighter text-[10px]">Login</span>
                </a>
            </nav>

            <!-- Mobile Menu Button -->
            <button
                class="md:hidden p-2 text-white hover:text-yellow-500 transition-colors"
                @click="mobileMenuOpen = !mobileMenuOpen"
                aria-label="Toggle menu"
            >
                <svg x-show="!mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <svg x-show="mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <nav
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-8"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-8"
            class="md:hidden glass rounded-2xl p-6 space-y-4 mb-4 border border-yellow-500/20"
            style="display: none;"
        >
            <a href="{{ route('home') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500 uppercase italic">Home</a>
            
            @foreach($gameTypes as $type)
                <a href="{{ route('games.index', ['type' => $type['slug']]) }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500 uppercase italic">
                    {{ $type['icon'] }} {{ $type['label'] }}
                </a>
            @endforeach

            <a href="{{ route('login') }}" class="block py-4 text-center bg-gradient-to-r from-yellow-500 to-yellow-400 text-black font-black rounded-xl shadow-lg uppercase tracking-widest">LOGIN</a>
        </nav>
    </div>
</header>
