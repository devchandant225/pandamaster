<footer class="relative bg-black text-gray-300 border-t border-white/5 overflow-hidden">
    <!-- Sophisticated Background Lighting -->
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-500 via-pink-500 to-purple-600 opacity-50 shadow-[0_0_20px_rgba(234,179,8,0.5)]"></div>
    <div class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-yellow-500/5 rounded-full blur-[120px] -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-1/4 w-[600px] h-[600px] bg-purple-500/5 rounded-full blur-[120px] translate-y-1/2"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16">
            <!-- Logo & About -->
            <div class="lg:col-span-2">
                <div class="flex items-center gap-2 mb-8">
                    <div class="text-5xl font-black tracking-tighter text-glow-yellow">
                        <span class="bg-gradient-to-r from-yellow-400 to-yellow-600 bg-clip-text text-transparent">Orion</span><span class="bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent text-glow-pink">Star</span>
                    </div>
                </div>
                <p class="text-lg text-gray-400 mb-10 max-w-md leading-relaxed font-medium">
                    Experience the next generation of online gaming. From high-stakes slots to immersive fish games, OrionStar is your ultimate destination for big wins and endless entertainment.
                </p>
                <div class="flex items-center gap-4">
                    <a href="{{ route('games.index') }}" class="group relative bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-600 text-white px-10 py-5 rounded-2xl transition-all font-black inline-flex items-center gap-3 shadow-[0_0_30px_rgba(234,179,8,0.3)] hover:shadow-[0_0_50px_rgba(234,179,8,0.5)] transform hover:-translate-y-1 animate-shine overflow-hidden">
                        <span class="relative z-10 flex items-center gap-3 uppercase tracking-tighter text-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.5 4a.5.5 0 010-1 4.5 4.5 0 019 0 .5.5 0 01-1 0 3.5 3.5 0 00-7 0 .5.5 0 01-1 0z"/>
                            </svg>
                            START WINNING NOW
                        </span>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white font-black uppercase tracking-widest text-sm mb-8 flex items-center gap-3">
                    <span class="w-8 h-1 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full"></span>
                    Quick Links
                </h3>
                <ul class="space-y-5">
                    <li><a href="{{ route('home') }}" class="text-base font-bold hover:text-yellow-500 transition-all flex items-center gap-3 group">
                        <span class="w-2 h-2 bg-gray-800 rounded-full group-hover:bg-yellow-500 group-hover:scale-125 transition-all"></span>
                        Home
                    </a></li>
                    <li><a href="{{ route('games.index') }}" class="text-base font-bold hover:text-yellow-500 transition-all flex items-center gap-3 group">
                        <span class="w-2 h-2 bg-gray-800 rounded-full group-hover:bg-yellow-500 group-hover:scale-125 transition-all"></span>
                        All Games
                    </a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-base font-bold hover:text-yellow-500 transition-all flex items-center gap-3 group">
                        <span class="w-2 h-2 bg-gray-800 rounded-full group-hover:bg-yellow-500 group-hover:scale-125 transition-all"></span>
                        Blog & News
                    </a></li>
                    <li><a href="{{ route('about') }}" class="text-base font-bold hover:text-yellow-500 transition-all flex items-center gap-3 group">
                        <span class="w-2 h-2 bg-gray-800 rounded-full group-hover:bg-yellow-500 group-hover:scale-125 transition-all"></span>
                        About Us
                    </a></li>
                </ul>
            </div>

            <!-- Game Categories -->
            <div>
                <h3 class="text-white font-black uppercase tracking-widest text-sm mb-8 flex items-center gap-3">
                    <span class="w-8 h-1 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full"></span>
                    Categories
                </h3>
                <ul class="space-y-5">
                    <li><a href="{{ route('games.index', ['type' => 'slots']) }}" class="text-base font-bold hover:text-transparent hover:bg-gradient-to-r hover:from-yellow-400 hover:to-orange-500 hover:bg-clip-text transition-all flex items-center gap-4 group">
                        <span class="text-2xl group-hover:scale-125 transition-transform">🎰</span> Slots
                    </a></li>
                    <li><a href="{{ route('games.index', ['type' => 'fish']) }}" class="text-base font-bold hover:text-transparent hover:bg-gradient-to-r hover:from-blue-400 hover:to-cyan-500 hover:bg-clip-text transition-all flex items-center gap-4 group">
                        <span class="text-2xl group-hover:scale-125 transition-transform">🐟</span> Fish Games
                    </a></li>
                    <li><a href="{{ route('games.index', ['type' => 'keno']) }}" class="text-base font-bold hover:text-transparent hover:bg-gradient-to-r hover:from-pink-400 hover:to-rose-500 hover:bg-clip-text transition-all flex items-center gap-4 group">
                        <span class="text-2xl group-hover:scale-125 transition-transform">🎲</span> Keno
                    </a></li>
                    <li><a href="{{ route('games.index', ['type' => 'table']) }}" class="text-base font-bold hover:text-transparent hover:bg-gradient-to-r hover:from-green-400 hover:to-emerald-500 hover:bg-clip-text transition-all flex items-center gap-4 group">
                        <span class="text-2xl group-hover:scale-125 transition-transform">🎯</span> Table Games
                    </a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/5 mt-20 pt-10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="flex flex-col gap-3">
                    <p class="text-sm text-gray-500 font-bold uppercase tracking-widest">
                        &copy; {{ date('Y') }} Orionstar Gaming. Built for Winners.
                    </p>
                    <div class="flex items-center gap-4">
                        <span class="flex items-center gap-2 bg-red-500/10 text-red-500 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-tighter border border-red-500/20">
                            <span class="animate-pulse">🔞</span> 18+ Responsible Gaming
                        </span>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center gap-10">
                    <a href="{{ route('about') }}" class="text-xs text-gray-500 hover:text-white transition-colors font-black uppercase tracking-[0.2em]">Privacy</a>
                    <a href="{{ route('about') }}" class="text-xs text-gray-500 hover:text-white transition-colors font-black uppercase tracking-[0.2em]">Terms</a>
                    <a href="{{ route('about') }}" class="text-xs text-gray-500 hover:text-white transition-colors font-black uppercase tracking-[0.2em]">Support</a>
                </div>
            </div>
        </div>
    </div>
</footer>
