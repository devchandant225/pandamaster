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
                    <img src="{{ Storage::url($adminSettings->logo) }}" alt="Panda Master" class="h-12 w-auto transition-transform duration-300 group-hover:scale-110">
                @else
                    <div class="text-3xl font-black transition-transform duration-300 group-hover:scale-110">
                        <span class="text-yellow-500 text-glow-yellow uppercase">Panda</span><span class="text-white uppercase">Master</span>
                    </div>
                @endif
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
                    Home
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('pandamaster.777') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
                    777
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('pandamaster.download') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
                    Download
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('pandamaster.play-online') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
                    Play Online
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('pandamaster.casino') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
                    Casino
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('games.index') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
                    Games
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>

                @auth
                    <!-- Balance Display -->
                    @if(auth()->user()->player)
                        <div class="flex items-center gap-3 bg-gray-800/80 px-4 py-2 rounded-xl border border-yellow-500/30 shadow-lg shadow-yellow-500/5 transition-all hover:border-yellow-500 hover:shadow-yellow-500/20 group cursor-default">
                            <div class="text-yellow-500 animate-pulse group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.5 4a.5.5 0 010-1 4.5 4.5 0 019 0 .5.5 0 01-1 0 3.5 3.5 0 00-7 0 .5.5 0 01-1 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 uppercase font-black tracking-widest">Balance</p>
                                <p class="text-sm font-black text-yellow-500">${{ number_format(auth()->user()->player->balance, 2) }}</p>
                            </div>
                        </div>
                    @endif

                    <a href="{{ route('dashboard') }}" class="group relative bg-gradient-to-r from-yellow-500 to-yellow-400 hover:from-yellow-400 hover:to-yellow-300 text-black px-8 py-3 rounded-xl transition-all font-black shadow-lg shadow-yellow-500/30 hover:shadow-yellow-500/50 transform hover:-translate-y-0.5 overflow-hidden animate-shine">
                        <span class="relative z-10 uppercase tracking-tighter">Dashboard</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-yellow-500 transition-colors font-bold text-sm tracking-wider uppercase">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="group relative bg-gradient-to-r from-purple-600 to-purple-500 hover:from-purple-500 hover:to-purple-400 text-white px-8 py-3 rounded-xl transition-all font-black shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 transform hover:-translate-y-0.5 overflow-hidden animate-shine">
                        <span class="relative z-10 uppercase tracking-tighter">Sign Up</span>
                    </a>
                @endauth
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
            <a href="{{ route('home') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500">Home</a>
            <a href="{{ route('pandamaster.777') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500">777</a>
            <a href="{{ route('pandamaster.download') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500">Download</a>
            <a href="{{ route('pandamaster.play-online') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500">Play Online</a>
            <a href="{{ route('pandamaster.casino') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500">Casino</a>
            <a href="{{ route('games.index') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500">Games</a>
            <a href="{{ route('blog.index') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500">Blog</a>
            <a href="{{ route('about') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500">About</a>
            <a href="{{ route('contact') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500">Contact</a>

            @auth
                @if(auth()->user()->player)
                    <div class="py-4 px-5 bg-gray-800/80 rounded-xl border border-yellow-500/30">
                        <p class="text-[10px] text-gray-400 uppercase font-black tracking-widest">Balance</p>
                        <p class="text-xl font-black text-yellow-500">${{ number_format(auth()->user()->player->balance, 2) }}</p>
                    </div>
                @endif
                <a href="{{ route('dashboard') }}" class="block py-4 text-center bg-gradient-to-r from-yellow-500 to-yellow-400 text-black font-black rounded-xl shadow-lg">DASHBOARD</a>
            @else
                <div class="pt-4 space-y-4">
                    <a href="{{ route('login') }}" class="block py-4 text-center text-lg font-bold text-gray-300 border border-gray-700 rounded-xl">LOGIN</a>
                    <a href="{{ route('register') }}" class="block py-4 text-center bg-gradient-to-r from-purple-600 to-purple-500 text-white font-black rounded-xl shadow-lg">SIGN UP</a>
                </div>
            @endauth
        </nav>
    </div>
</header>
