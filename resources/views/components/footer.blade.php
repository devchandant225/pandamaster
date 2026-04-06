<footer class="relative bg-gray-900 text-gray-300 border-t border-yellow-500/30 overflow-hidden">
    <!-- Subtle Background Glows -->
    <div class="absolute top-0 left-1/4 w-64 h-64 bg-yellow-500/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-pink-500/5 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- Logo & About -->
            <div class="lg:col-span-2">
                <div class="flex items-center gap-2 mb-6">
                    <div class="text-4xl font-black">
                        <span class="text-yellow-500 text-glow-yellow">Orion</span><span class="text-pink-500 text-glow-pink">Star</span>
                    </div>
                </div>
                <p class="text-base text-gray-400 mb-8 max-w-md leading-relaxed">
                    Experience the next generation of online gaming. From high-stakes slots to immersive fish games, OrionStar is your ultimate destination for big wins and endless entertainment.
                </p>
                <div class="flex items-center gap-4">
                    <a href="{{ route('games.index') }}" class="group relative bg-gradient-to-r from-yellow-500 to-yellow-400 text-black px-8 py-4 rounded-xl hover:from-yellow-400 hover:to-yellow-300 transition-all font-black inline-flex items-center gap-3 shadow-xl shadow-yellow-500/20 hover:shadow-yellow-500/40 animate-shine overflow-hidden">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.5 4a.5.5 0 010-1 4.5 4.5 0 019 0 .5.5 0 01-1 0 3.5 3.5 0 00-7 0 .5.5 0 01-1 0z"/>
                            </svg>
                            PLAY NOW
                        </span>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white font-black uppercase tracking-widest text-sm mb-6 border-l-4 border-yellow-500 pl-4">Quick Links</h3>
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}" class="text-sm hover:text-yellow-500 transition-colors flex items-center gap-2 group">
                        <span class="w-1.5 h-1.5 bg-gray-700 rounded-full group-hover:bg-yellow-500 transition-colors"></span>
                        Home
                    </a></li>
                    <li><a href="{{ route('games.index') }}" class="text-sm hover:text-yellow-500 transition-colors flex items-center gap-2 group">
                        <span class="w-1.5 h-1.5 bg-gray-700 rounded-full group-hover:bg-yellow-500 transition-colors"></span>
                        All Games
                    </a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-sm hover:text-yellow-500 transition-colors flex items-center gap-2 group">
                        <span class="w-1.5 h-1.5 bg-gray-700 rounded-full group-hover:bg-yellow-500 transition-colors"></span>
                        Blog
                    </a></li>
                    <li><a href="{{ route('about') }}" class="text-sm hover:text-yellow-500 transition-colors flex items-center gap-2 group">
                        <span class="w-1.5 h-1.5 bg-gray-700 rounded-full group-hover:bg-yellow-500 transition-colors"></span>
                        About Us
                    </a></li>
                </ul>
            </div>

            <!-- Game Categories -->
            <div>
                <h3 class="text-white font-black uppercase tracking-widest text-sm mb-6 border-l-4 border-pink-500 pl-4">Categories</h3>
                <ul class="space-y-4">
                    <li><a href="{{ route('games.index', ['type' => 'slots']) }}" class="text-sm hover:text-yellow-500 transition-colors flex items-center gap-3">
                        <span class="text-lg">🎰</span> Slots
                    </a></li>
                    <li><a href="{{ route('games.index', ['type' => 'fish']) }}" class="text-sm hover:text-yellow-500 transition-colors flex items-center gap-3">
                        <span class="text-lg">🐟</span> Fish Games
                    </a></li>
                    <li><a href="{{ route('games.index', ['type' => 'keno']) }}" class="text-sm hover:text-yellow-500 transition-colors flex items-center gap-3">
                        <span class="text-lg">🎲</span> Keno
                    </a></li>
                    <li><a href="{{ route('games.index', ['type' => 'table']) }}" class="text-sm hover:text-yellow-500 transition-colors flex items-center gap-3">
                        <span class="text-lg">🎯</span> Table Games
                    </a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800/50 mt-16 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex flex-col gap-2">
                    <p class="text-sm text-gray-500 font-medium">
                        &copy; {{ date('Y') }} Orionstar Gaming. All rights reserved.
                    </p>
                    <p class="text-xs text-gray-600 flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                        Play Responsibly. Must be 18+ to play.
                    </p>
                </div>
                <div class="flex flex-wrap justify-center gap-8">
                    <a href="{{ route('about') }}" class="text-xs text-gray-500 hover:text-yellow-500 transition-colors font-bold uppercase tracking-widest">Privacy Policy</a>
                    <a href="{{ route('about') }}" class="text-xs text-gray-500 hover:text-yellow-500 transition-colors font-bold uppercase tracking-widest">Terms</a>
                    <a href="{{ route('about') }}" class="text-xs text-gray-500 hover:text-yellow-500 transition-colors font-bold uppercase tracking-widest">Support</a>
                </div>
            </div>
        </div>
    </div>
</footer>
