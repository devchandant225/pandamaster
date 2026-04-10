@props(['hotGames' => collect(), 'newGames' => collect()])

<section id="casino-experience" class="py-20 md:py-32 relative overflow-hidden bg-[#0a0a0c]">
    <!-- Sophisticated Background Accents -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-[10%] -left-[5%] w-[40%] h-[40%] bg-yellow-500/5 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute -bottom-[10%] -right-[5%] w-[40%] h-[40%] bg-purple-600/5 rounded-full blur-[120px] animate-pulse" style="animation-delay: 3s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[radial-gradient(circle_at_center,rgba(17,24,39,0.4)_0%,transparent_70%)]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Modern Section Header -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-16 lg:mb-24">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-3 px-4 py-2 bg-white/5 border border-white/10 rounded-full text-white/60 text-[10px] font-black uppercase tracking-[0.3em] mb-6 backdrop-blur-md">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span>
                    </span>
                    Live Casino Lobby
                </div>
                <h2 class="text-5xl md:text-7xl font-black text-white tracking-tighter uppercase leading-[0.85]">
                    Premium <br class="hidden md:block" />
                    <span class="bg-gradient-to-r from-yellow-400 via-yellow-200 to-yellow-500 bg-clip-text text-transparent text-glow-yellow">Gaming</span> Experience
                </h2>
                <p class="mt-8 text-lg md:text-xl text-gray-400 font-medium leading-relaxed max-w-2xl">
                    Discover a world of high-stakes thrills and immersive gameplay. Our platform brings the elite casino atmosphere directly to your screen with unmatched speed and security.
                </p>
            </div>
            <div class="hidden lg:flex gap-4 mb-2">
                <a href="{{ route('games.index') }}" class="group px-10 py-5 bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl text-white font-black text-sm transition-all transform hover:-translate-y-1 uppercase tracking-tighter flex items-center gap-3">
                    View All Games
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>

        <!-- Professional Bentogrid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-8">
            <!-- Large Feature Card: Slots -->
            <div class="lg:col-span-8 group relative overflow-hidden rounded-[2.5rem] border border-white/5 aspect-[16/10] lg:aspect-auto lg:h-[600px] shadow-2xl">
                <img src="https://images.unsplash.com/photo-1596838132731-dd96c2971046?w=1200" alt="Slots" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-950/20 to-transparent"></div>
                
                <div class="absolute inset-0 p-8 md:p-14 flex flex-col justify-end">
                    <div class="flex flex-wrap gap-3 mb-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        <span class="px-5 py-1.5 bg-yellow-500 text-black text-[10px] font-black rounded-full uppercase tracking-widest shadow-xl">High Volatility</span>
                        <span class="px-5 py-1.5 bg-black/60 backdrop-blur-md text-white text-[10px] font-black rounded-full uppercase tracking-widest border border-white/10">Exclusive Titles</span>
                    </div>
                    <h3 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tighter uppercase italic leading-none">
                        Master <span class="text-yellow-500">The Slots</span>
                    </h3>
                    <p class="text-gray-300 text-lg md:text-xl mb-10 max-w-xl font-medium leading-tight">
                        Experience the most rewarding slot machines in the industry with massive progressive jackpots updated every second.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('games.index') }}" class="inline-flex items-center gap-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-black px-10 py-5 rounded-2xl font-black uppercase tracking-tighter hover:shadow-[0_0_30px_rgba(234,179,8,0.4)] transition-all transform hover:-translate-y-1 group/btn">
                            Enter Slots Lobby
                            <svg class="w-5 h-5 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Side Cards: Fish & Tables -->
            <div class="lg:col-span-4 flex flex-col gap-6 md:gap-8">
                <!-- Fish Games -->
                <div class="flex-1 group relative overflow-hidden rounded-[2.5rem] border border-white/5 min-h-[300px]">
                    <img src="https://images.unsplash.com/photo-1544652478-6653e09f18a2?w=800" alt="Fish" class="absolute inset-0 w-full h-full object-cover grayscale-[0.3] group-hover:grayscale-0 transition-all duration-700 group-hover:scale-110" />
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900 via-purple-900/40 to-transparent"></div>
                    <div class="absolute inset-0 p-10 flex flex-col justify-end">
                        <h4 class="text-3xl font-black text-white mb-3 tracking-tighter uppercase italic">Ocean Hunter</h4>
                        <p class="text-gray-300 text-sm font-medium mb-6 leading-relaxed">Multiplayer tactical shooting games with global leaderboards.</p>
                        <a href="{{ route('games.index') }}" class="text-yellow-400 font-black text-xs uppercase tracking-[0.2em] group-hover:translate-x-3 transition-transform inline-flex items-center gap-3">
                            Start Hunting <span class="text-lg">&rarr;</span>
                        </a>
                    </div>
                </div>

                <!-- Table Games -->
                <div class="flex-1 group relative overflow-hidden rounded-[2.5rem] border border-white/5 min-h-[300px]">
                    <img src="https://images.unsplash.com/photo-1511193311914-0346f16efe90?w=800" alt="Tables" class="absolute inset-0 w-full h-full object-cover grayscale-[0.3] group-hover:grayscale-0 transition-all duration-700 group-hover:scale-110" />
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
                    <div class="absolute inset-0 p-10 flex flex-col justify-end">
                        <h4 class="text-3xl font-black text-white mb-3 tracking-tighter uppercase italic">Elite Tables</h4>
                        <p class="text-gray-300 text-sm font-medium mb-6 leading-relaxed">Classic Blackjack, Roulette, and Baccarat with live dealers.</p>
                        <a href="{{ route('games.index') }}" class="text-yellow-400 font-black text-xs uppercase tracking-[0.2em] group-hover:translate-x-3 transition-transform inline-flex items-center gap-3">
                            Join Table <span class="text-lg">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hot Games: Swipeable on Mobile -->
        @if($hotGames->isNotEmpty())
        <div class="mt-24 md:mt-32">
            <div class="flex items-center justify-between mb-10">
                <div class="flex items-center gap-4">
                    <span class="w-12 h-[2px] bg-yellow-500"></span>
                    <h3 class="text-xl md:text-2xl font-black text-white uppercase tracking-widest italic">Trending Now</h3>
                </div>
                <div class="flex gap-2">
                    <button class="p-2 border border-white/10 rounded-lg text-white/40 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button class="p-2 border border-white/10 rounded-lg text-white/40 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>
            
            <div class="flex overflow-x-auto lg:grid lg:grid-cols-4 gap-6 pb-8 -mx-4 px-4 lg:mx-0 lg:px-0 scrollbar-hide snap-x">
                @foreach($hotGames as $game)
                    <div class="min-w-[280px] lg:min-w-0 snap-center">
                        <x-game-card :game="$game" />
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Professional Stats Bar -->
        <div class="mt-20 lg:mt-32 pt-16 border-t border-white/5">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 lg:gap-24 items-center">
                <div class="text-center lg:text-left">
                    <div class="text-4xl lg:text-5xl font-black text-white mb-2 tracking-tighter">98.5%</div>
                    <div class="text-[10px] font-black text-gray-500 uppercase tracking-[0.3em]">Audited RTP Rate</div>
                </div>
                <div class="text-center lg:text-left border-l border-white/5 pl-0 md:pl-12">
                    <div class="text-4xl lg:text-5xl font-black text-purple-500 mb-2 tracking-tighter">24/7</div>
                    <div class="text-[10px] font-black text-gray-500 uppercase tracking-[0.3em]">Live Support</div>
                </div>
                <div class="text-center lg:text-left border-l border-white/5 pl-0 md:pl-12">
                    <div class="text-4xl lg:text-5xl font-black text-yellow-500 mb-2 tracking-tighter">&lt; 5m</div>
                    <div class="text-[10px] font-black text-gray-500 uppercase tracking-[0.3em]">Avg. Withdrawal</div>
                </div>
                <div class="text-center lg:text-left border-l border-white/5 pl-0 md:pl-12">
                    <div class="text-4xl lg:text-5xl font-black text-white mb-2 tracking-tighter">SECURE</div>
                    <div class="text-[10px] font-black text-gray-500 uppercase tracking-[0.3em]">Bank-Grade Tech</div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
