@props(['hotGames' => collect(), 'newGames' => collect()])

<section id="casino-experience" class="py-24 relative overflow-hidden bg-[#0a0a0c]">
    <!-- Dynamic Decorative Elements -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/4 w-[400px] h-[400px] bg-yellow-500/5 rounded-full blur-[100px] animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-purple-600/5 rounded-full blur-[120px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-yellow-500/10 border border-yellow-500/20 rounded-lg text-yellow-500 text-[10px] font-black uppercase tracking-widest mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></span>
                    Ultimate Gaming Hub
                </div>
                <h2 class="text-4xl md:text-6xl font-black text-white tracking-tighter uppercase leading-none">
                    EXPLORE OUR <br/>
                    <span class="bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 bg-clip-text text-transparent text-glow-yellow">CASINO UNIVERSE</span>
                </h2>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('games.index') }}" class="px-8 py-4 bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl text-white font-black text-sm transition-all transform hover:-translate-y-1 uppercase tracking-tighter">
                    Full Lobby
                </a>
            </div>
        </div>

        <!-- Featured Categories / Game Grid -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <!-- Large Feature Card -->
            <div class="md:col-span-8 group relative overflow-hidden rounded-[2.5rem] border border-white/10 aspect-[16/9] md:aspect-auto md:h-[500px]">
                <img src="https://images.unsplash.com/photo-1596838132731-dd96c2971046?w=1200" alt="Live Slots" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-900/40 to-transparent"></div>
                
                <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full">
                    <div class="flex flex-wrap gap-3 mb-6">
                        <span class="px-4 py-1 bg-yellow-500 text-black text-[10px] font-black rounded-full uppercase tracking-tighter shadow-lg shadow-yellow-500/20">Hot Jackpot</span>
                        <span class="px-4 py-1 bg-purple-600 text-white text-[10px] font-black rounded-full uppercase tracking-tighter">Live Support</span>
                    </div>
                    <h3 class="text-3xl md:text-5xl font-black text-white mb-4 tracking-tighter uppercase italic">Premium Slots Collection</h3>
                    <p class="text-gray-300 text-lg mb-8 max-w-xl font-medium leading-tight">Spin your way to legendary status with our curated selection of high-RTP slots and massive progressive jackpots.</p>
                    <a href="{{ route('games.index') }}" class="inline-flex items-center gap-4 bg-white text-black px-8 py-4 rounded-xl font-black uppercase tracking-tighter hover:bg-yellow-500 transition-colors group/btn">
                        Play Now
                        <svg class="w-5 h-5 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Side Cards Column -->
            <div class="md:col-span-4 flex flex-col gap-6">
                <!-- Mini Card 1: Fish Games -->
                <div class="flex-1 group relative overflow-hidden rounded-[2rem] border border-white/10">
                    <img src="https://images.unsplash.com/photo-1544652478-6653e09f18a2?w=600" alt="Fish Games" class="absolute inset-0 w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-all duration-700 group-hover:scale-110" />
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/90 via-purple-900/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8">
                        <h4 class="text-2xl font-black text-white mb-2 tracking-tighter uppercase italic">Ocean Hunter</h4>
                        <p class="text-gray-300 text-sm font-medium mb-4">Tactical multiplayer fishing action.</p>
                        <span class="text-yellow-400 font-black text-xs uppercase tracking-widest group-hover:translate-x-2 transition-transform inline-block">Dive In &rarr;</span>
                    </div>
                </div>

                <!-- Mini Card 2: Table Games -->
                <div class="flex-1 group relative overflow-hidden rounded-[2rem] border border-white/10">
                    <img src="https://images.unsplash.com/photo-1511193311914-0346f16efe90?w=600" alt="Table Games" class="absolute inset-0 w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-all duration-700 group-hover:scale-110" />
                    <div class="absolute inset-0 bg-gradient-to-t from-yellow-900/90 via-yellow-900/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8">
                        <h4 class="text-2xl font-black text-white mb-2 tracking-tighter uppercase italic">Classic Tables</h4>
                        <p class="text-gray-300 text-sm font-medium mb-4">Roulette, Blackjack, and Baccarat.</p>
                        <span class="text-yellow-400 font-black text-xs uppercase tracking-widest group-hover:translate-x-2 transition-transform inline-block">Join Table &rarr;</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hot Games Row -->
        @if($hotGames->isNotEmpty())
        <div class="mt-16">
            <div class="flex items-center gap-4 mb-8">
                <h3 class="text-xl font-black text-white uppercase tracking-widest">Hot Right Now</h3>
                <div class="h-px flex-1 bg-gradient-to-r from-white/10 to-transparent"></div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach($hotGames as $game)
                    <a href="{{ route('games.index') }}" class="group relative aspect-[3/4] rounded-xl overflow-hidden border border-white/5 hover:border-yellow-500/50 transition-all">
                        <img src="{{ $game->thumbnail_url }}" alt="{{ $game->title }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
                        <div class="absolute bottom-0 left-0 p-3">
                            <div class="text-[10px] font-black text-yellow-500 uppercase mb-0.5">{{ $game->gameCategory->name ?? 'Game' }}</div>
                            <div class="text-xs font-black text-white truncate w-full">{{ $game->title }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Horizontal Game Slider Placeholder / Stats -->
        <div class="mt-20 pt-20 border-t border-white/5">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
                <div>
                    <div class="text-4xl md:text-5xl font-black text-white mb-2 tracking-tighter">98.5%</div>
                    <div class="text-xs font-black text-gray-500 uppercase tracking-widest">Average RTP</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-black text-purple-500 mb-2 tracking-tighter">LIVE</div>
                    <div class="text-xs font-black text-gray-500 uppercase tracking-widest">Dealer Tables</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-black text-yellow-500 mb-2 tracking-tighter">FAST</div>
                    <div class="text-xs font-black text-gray-500 uppercase tracking-widest">Cashouts</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-black text-white mb-2 tracking-tighter">PRO</div>
                    <div class="text-xs font-black text-gray-500 uppercase tracking-widest">Player Perks</div>
                </div>
            </div>
        </div>
    </div>
</section>
