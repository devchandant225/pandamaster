<div class="game-card group relative bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
    <!-- Thumbnail -->
    <div class="relative overflow-hidden aspect-video">
        <img src="{{ $game->thumbnail_url }}" 
             alt="{{ $game->title }}" 
             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
        
        <!-- Badges -->
        <div class="absolute top-2 left-2 flex gap-2">
            @if($game->is_hot)
                <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                    🔥 HOT
                </span>
            @endif
            
            @if($game->is_new)
                <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">
                    ✨ NEW
                </span>
            @endif
            
            @if($game->is_featured)
                <span class="bg-yellow-500 text-black text-xs font-bold px-2 py-1 rounded">
                    ⭐ FEATURED
                </span>
            @endif
        </div>
        
        <!-- Hover Overlay with CTAs -->
        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition-all duration-300 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100">
            @auth
                <a href="{{ route('games.play', $game->slug) }}" 
                   class="bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-2 px-4 rounded-lg transform scale-90 group-hover:scale-100 transition-all duration-300">
                    Play Now
                </a>
            @endauth
            
            @if($game->demo_url)
                <a href="{{ route('games.demo', $game->slug) }}" 
                   class="bg-pink-500 hover:bg-pink-400 text-white font-bold py-2 px-4 rounded-lg transform scale-90 group-hover:scale-100 transition-all duration-300">
                    Demo
                </a>
            @endif
            
            <a href="{{ route('games.show', $game->slug) }}" 
               class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transform scale-90 group-hover:scale-100 transition-all duration-300">
                Info
            </a>
        </div>
    </div>
    
    <!-- Game Info -->
    <div class="p-4">
        <h3 class="text-white font-bold text-lg mb-2 truncate">{{ $game->title }}</h3>
        
        <div class="flex items-center justify-between text-sm text-gray-400 mb-2">
            <span class="capitalize">{{ $game->game_type }}</span>
            
            @if($game->rtp)
                <span>RTP: {{ $game->rtp }}%</span>
            @endif
        </div>
        
        <div class="flex items-center justify-between text-xs text-gray-500">
            <span class="bg-gray-700 px-2 py-1 rounded">
                {{ $game->gameCategory->name }}
            </span>
            
            <span>{{ number_format($game->play_count) }} plays</span>
        </div>
    </div>
</div>
