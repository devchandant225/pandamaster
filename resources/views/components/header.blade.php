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
                
                <!-- Games Dropdown -->
                <div class="relative group py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center gap-1 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase focus:outline-none">
                        Games
                        <svg class="w-3 h-3 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div 
                        x-show="open" 
                        x-transition:enter="transition ease-out duration-200" 
                        x-transition:enter-start="opacity-0 translate-y-2" 
                        x-transition:enter-end="opacity-100 translate-y-0" 
                        class="absolute left-0 mt-2 w-64 bg-gray-900 border border-white/10 rounded-2xl shadow-2xl overflow-hidden z-[60]"
                    >
                        <div class="p-2 space-y-1">
                            @foreach($headerGames as $game)
                            <a href="{{ route('games.show', $game->slug) }}" class="flex items-center gap-3 px-4 py-3 text-[10px] font-black uppercase text-gray-400 hover:text-yellow-500 hover:bg-white/5 rounded-xl transition-all">
                                <span class="w-2 h-2 rounded-full bg-yellow-500"></span> {{ $game->title }}
                            </a>
                            @endforeach
                            <a href="{{ route('games.index') }}" class="flex items-center gap-3 px-4 py-3 text-[10px] font-black uppercase text-yellow-500 hover:bg-white/5 rounded-xl transition-all border-t border-white/5 mt-1">
                                View All Games
                            </a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('orionstar.casino') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
                    Casino
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('orionstar.casino') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
                    Casino
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('orionstar.download') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
                    Download
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('orionstar.play-online') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
                    Play Online
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('contact') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
                    Contact
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('blog.index') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
                    Blog
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a href="{{ route('login') }}" class="group relative bg-gradient-to-r from-yellow-500 to-yellow-400 hover:from-yellow-400 hover:to-yellow-300 text-black px-8 py-3 rounded-xl transition-all font-black shadow-lg shadow-yellow-500/30 hover:shadow-yellow-500/50 transform hover:-translate-y-0.5 overflow-hidden animate-shine">
                    <span class="relative z-10 uppercase tracking-tighter text-xs">Login</span>
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
            
            <div x-data="{ gamesOpen: false }">
                <button @click="gamesOpen = !gamesOpen" class="flex items-center justify-between w-full text-lg font-bold text-gray-300 hover:text-yellow-500 uppercase italic">
                    Games
                    <svg class="w-4 h-4 transition-transform" :class="gamesOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="gamesOpen" class="mt-4 ml-4 space-y-3">
                    @foreach($headerGames as $game)
                        <a href="{{ route('games.show', $game->slug) }}" class="block text-sm font-bold text-gray-400 hover:text-yellow-500 uppercase">
                            {{ $game->title }}
                        </a>
                    @endforeach
                    <a href="{{ route('games.index') }}" class="block text-sm font-bold text-yellow-500 uppercase">
                        View All Games
                    </a>
                </div>
            </div>

            <a href="{{ route('orionstar.casino') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500 uppercase italic">Casino</a>
            <a href="{{ route('orionstar.download') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500 uppercase italic">Download</a>
            <a href="{{ route('orionstar.play-online') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500 uppercase italic">Play Online</a>
            <a href="{{ route('contact') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500 uppercase italic">Contact</a>
            <a href="{{ route('blog.index') }}" class="block text-lg font-bold text-gray-300 hover:text-yellow-500 uppercase italic">Blog</a>

            <a href="{{ route('login') }}" class="block py-4 text-center bg-gradient-to-r from-yellow-500 to-yellow-400 text-black font-black rounded-xl shadow-lg uppercase tracking-widest">LOGIN</a>
        </nav>
    </div>
</header>
