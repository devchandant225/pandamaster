<div class="game-card group relative bg-gray-900 rounded-2xl overflow-hidden border border-white/5 transition-all duration-500 hover:border-yellow-500/50 hover:-translate-y-3 hover:shadow-[0_20px_50px_rgba(234,179,8,0.15)]">
    <!-- Thumbnail Container -->
    <div class="relative overflow-hidden aspect-[4/5] sm:aspect-video lg:aspect-[4/5]">
        <img src="{{ $game->thumbnail }}"
             alt="{{ $game->title }}"
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        
        <!-- Premium Badges -->
        <div class="absolute top-3 left-3 flex flex-col gap-2">
            @if($game->is_hot)
                <span class="bg-gradient-to-r from-red-600 to-orange-600 text-white text-[10px] font-black px-3 py-1 rounded-full shadow-lg flex items-center gap-1 uppercase tracking-tighter">
                    <span class="animate-pulse">🔥</span> HOT
                </span>
            @endif
            
            @if($game->is_new)
                <span class="bg-gradient-to-r from-green-600 to-emerald-600 text-white text-[10px] font-black px-3 py-1 rounded-full shadow-lg flex items-center gap-1 uppercase tracking-tighter">
                    <span class="animate-bounce">✨</span> NEW
                </span>
            @endif
            
            @if($game->is_featured)
                <span class="bg-gradient-to-r from-yellow-500 to-amber-500 text-black text-[10px] font-black px-3 py-1 rounded-full shadow-lg flex items-center gap-1 uppercase tracking-tighter">
                    <span>⭐</span> FEATURED
                </span>
            @endif
        </div>

        <!-- RTP Badge -->
        @if($game->rtp)
            <div class="absolute top-3 right-3 bg-black/60 backdrop-blur-md border border-white/10 text-yellow-500 text-[10px] font-black px-2 py-1 rounded-lg">
                {{ $game->rtp }}% RTP
            </div>
        @endif
        
        <!-- Advanced Hover Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-950/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col items-center justify-center p-6 translate-y-4 group-hover:translate-y-0">
            <div class="mb-6 transform -translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-75">
                <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center shadow-[0_0_30px_rgba(234,179,8,0.5)] animate-pulse">
                    <svg class="w-8 h-8 text-black ml-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4.516 7.548c0-.447.362-.809.809-.809.447 0 .808.362.808.809v4.904c0 .447-.361.809-.808.809-.447 0-.809-.362-.809-.809V7.548zm5.271 0c0-.447.362-.809.809-.809.447 0 .808.362.808.809v4.904c0 .447-.361.809-.808.809-.447 0-.809-.362-.809-.809V7.548zM1.5 10c0-4.694 3.806-8.5 8.5-8.5s8.5 3.806 8.5 8.5-3.806 8.5-8.5 8.5S1.5 14.694 1.5 10z"/>
                    </svg>
                </div>
            </div>

            <div class="flex flex-col w-full gap-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-150">
                @auth
                    <a href="{{ route('games.play', $game->slug) }}" 
                       class="w-full bg-yellow-500 hover:bg-yellow-400 text-black font-black py-3 rounded-xl text-center shadow-lg animate-shine overflow-hidden uppercase tracking-tighter">
                        Play Now
                    </a>
                @else
                    <a href="{{ route('register') }}" 
                       class="w-full bg-yellow-500 hover:bg-yellow-400 text-black font-black py-3 rounded-xl text-center shadow-lg animate-shine overflow-hidden uppercase tracking-tighter">
                        Sign Up to Play
                    </a>
                @endauth
                
                <div class="flex gap-2">
                    @if($game->demo_url)
                        <a href="{{ route('games.demo', $game->slug) }}" 
                           class="flex-1 bg-white/10 hover:bg-white/20 text-white font-bold py-2.5 rounded-xl text-center backdrop-blur-md transition-colors text-sm uppercase tracking-tighter">
                            Demo
                        </a>
                    @endif
                    <a href="{{ route('games.show', $game->slug) }}" 
                       class="flex-1 bg-white/10 hover:bg-white/20 text-white font-bold py-2.5 rounded-xl text-center backdrop-blur-md transition-colors text-sm uppercase tracking-tighter">
                        Details
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Game Info -->
    <div class="p-5 bg-gradient-to-b from-gray-900 to-black">
        <div class="flex items-start justify-between gap-2 mb-3">
            <h3 class="text-white font-black text-lg truncate group-hover:text-yellow-500 transition-colors">{{ $game->title }}</h3>
            <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest bg-gray-800/50 px-2 py-1 rounded">
                {{ $game->game_type }}
            </span>
        </div>
        
        <div class="flex items-center justify-between text-[11px] font-bold">
            <span class="text-pink-500 uppercase tracking-widest">
                {{ $game->gameCategory->name }}
            </span>
            
            <div class="flex items-center gap-1 text-gray-500">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                {{ number_format($game->play_count) }}
            </div>
        </div>
    </div>
</div>
