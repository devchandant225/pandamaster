<header
    x-data="{ mobileMenuOpen: false }"
    class="bg-gray-900 text-white sticky top-0 z-50 border-b border-yellow-500/20 shadow-lg shadow-yellow-500/10"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <div class="text-3xl font-black">
                    <span class="text-yellow-500">Orion</span><span class="text-pink-500">Star</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}" class="text-gray-300 hover:text-yellow-500 transition-colors font-medium">
                    Home
                </a>
                <a href="{{ route('games.index') }}" class="text-gray-300 hover:text-yellow-500 transition-colors font-medium">
                    Games
                </a>
                <a href="{{ route('blog.index') }}" class="text-gray-300 hover:text-yellow-500 transition-colors font-medium">
                    Blog
                </a>
                <a href="{{ route('about') }}" class="text-gray-300 hover:text-yellow-500 transition-colors font-medium">
                    About
                </a>

                @auth
                    <!-- Balance Display -->
                    @if(auth()->user()->player)
                        <div class="flex items-center gap-3 bg-gray-800 px-4 py-2 rounded-lg border border-yellow-500/30">
                            <div class="text-yellow-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.5 4a.5.5 0 010-1 4.5 4.5 0 019 0 .5.5 0 01-1 0 3.5 3.5 0 00-7 0 .5.5 0 01-1 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Balance</p>
                                <p class="text-sm font-bold text-yellow-500">${{ number_format(auth()->user()->player->balance, 2) }}</p>
                            </div>
                        </div>
                    @endif

                    <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-yellow-500 to-yellow-400 hover:from-yellow-400 hover:to-yellow-300 text-black px-6 py-2.5 rounded-lg transition-all font-semibold shadow-lg shadow-yellow-500/30">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-yellow-500 transition-colors font-medium">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-pink-500 to-pink-400 hover:from-pink-400 hover:to-pink-300 text-white px-6 py-2.5 rounded-lg transition-all font-semibold shadow-lg shadow-pink-500/30">
                        Sign Up
                    </a>
                @endauth
            </nav>

            <!-- Mobile Menu Button -->
            <button
                class="md:hidden p-2 text-white hover:text-yellow-500 transition-colors"
                @click="mobileMenuOpen = !mobileMenuOpen"
                aria-label="Toggle menu"
            >
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <nav
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="md:hidden pb-4 space-y-3 border-t border-yellow-500/20 pt-4 mt-4"
            style="display: none;"
        >
            <a href="{{ route('home') }}" class="block py-2 text-gray-300 hover:text-yellow-500">Home</a>
            <a href="{{ route('games.index') }}" class="block py-2 text-gray-300 hover:text-yellow-500">Games</a>
            <a href="{{ route('blog.index') }}" class="block py-2 text-gray-300 hover:text-yellow-500">Blog</a>
            <a href="{{ route('about') }}" class="block py-2 text-gray-300 hover:text-yellow-500">About</a>

            @auth
                @if(auth()->user()->player)
                    <div class="py-3 px-4 bg-gray-800 rounded-lg border border-yellow-500/30">
                        <p class="text-xs text-gray-400">Balance</p>
                        <p class="text-lg font-bold text-yellow-500">${{ number_format(auth()->user()->player->balance, 2) }}</p>
                    </div>
                @endif
                <a href="{{ route('dashboard') }}" class="block py-3 text-yellow-500 font-bold text-center bg-gray-800 rounded-lg">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block py-2 text-gray-300 hover:text-yellow-500">Login</a>
                <a href="{{ route('register') }}" class="block py-3 text-center bg-pink-500 hover:bg-pink-400 text-white rounded-lg font-semibold">Sign Up</a>
            @endauth
        </nav>
    </div>
</header>
