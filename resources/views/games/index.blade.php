@extends('layouts.app')

@section('title', 'All Games - Panda Master VIP')

@section('content')
<div class="min-h-screen bg-black">
    <!-- Cinematic Hero Section -->
    <section class="relative overflow-hidden py-24 md:py-32 flex items-center justify-center bg-gray-950">
        <!-- Animated Background & Lighting -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
            <div class="absolute top-1/4 -left-20 w-[500px] h-[500px] bg-yellow-500/10 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-1/4 -right-20 w-[600px] h-[600px] bg-purple-500/10 rounded-full blur-[120px] animate-pulse" style="animation-delay: 2s;"></div>
        </div>
        
        <!-- Stars Animation -->
        <div class="absolute inset-0 pointer-events-none">
            @for($i = 0; $i < 40; $i++)
                <div class="absolute w-[1px] h-[1px] bg-white rounded-full animate-twinkle" 
                     style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(3000, 6000) }}ms;"></div>
            @endfor
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-6xl sm:text-7xl md:text-8xl font-black mb-8 leading-[0.9] tracking-tighter animate-fade-in-up">
                <span class="bg-gradient-to-r from-yellow-400 via-yellow-200 to-yellow-500 bg-clip-text text-transparent text-glow-yellow">ORION</span><span class="bg-gradient-to-r from-purple-500 via-purple-500 to-purple-600 bg-clip-text text-transparent text-glow-purple">STAR</span> <span class="text-white">GAMES</span>
            </h1>
            <p class="text-2xl md:text-3xl text-gray-300 font-bold tracking-tight animate-fade-in-up" style="animation-delay: 0.2s;">
                Choose your destiny from our massive library of premium titles
            </p>
        </div>
    </section>

    <!-- Funky Category Navigation Rail -->
    <div class="sticky top-20 z-40 glass border-b border-white/5 shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex items-center gap-4 overflow-x-auto no-scrollbar pb-2">
                <a href="{{ route('games.index') }}" 
                   class="flex-shrink-0 px-8 py-3 rounded-2xl font-black uppercase tracking-tighter transition-all {{ !request('type') ? 'bg-gradient-to-r from-yellow-500 to-orange-500 text-black shadow-lg shadow-yellow-500/20' : 'bg-white/5 text-gray-400 hover:text-white hover:bg-white/10' }}">
                    All Games
                </a>
                
                @foreach($types as $type)
                    <a href="{{ route('games.index', ['type' => $type]) }}" 
                       class="flex-shrink-0 px-8 py-3 rounded-2xl font-black uppercase tracking-tighter transition-all {{ request('type') == $type ? 'bg-gradient-to-r from-purple-500 to-purple-600 text-white shadow-lg shadow-purple-500/20' : 'bg-white/5 text-gray-400 hover:text-white hover:bg-white/10' }}">
                        {{ ucfirst($type) }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Games Explorer Grid -->
    <div class="max-w-7xl mx-auto px-4 py-16 animate-fade-in-up" style="animation-delay: 0.4s;">
        <!-- Advanced Filters and Search -->
        <div class="bg-gray-900/50 p-8 rounded-[2.5rem] border border-white/5 mb-12 shadow-2xl backdrop-blur-xl">
            <form action="{{ route('games.index') }}" method="GET" class="flex flex-col lg:flex-row gap-6">
                <!-- Search Box -->
                <div class="flex-1 relative group">
                    <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-gray-500 group-focus-within:text-yellow-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" 
                           name="search" 
                           placeholder="Search your favorite game..." 
                           value="{{ request('search') }}"
                           class="w-full pl-14 pr-6 py-4 bg-black/40 border-2 border-white/5 rounded-2xl text-white font-bold placeholder-gray-600 focus:outline-none focus:border-yellow-500/50 focus:bg-black/60 transition-all">
                </div>
                
                <div class="flex flex-wrap md:flex-nowrap gap-4">
                    <!-- Type Filter -->
                    <div class="relative flex-1 md:w-48">
                        <select name="type" 
                                class="w-full appearance-none px-6 py-4 bg-black/40 border-2 border-white/5 rounded-2xl text-white font-bold focus:outline-none focus:border-purple-500/50 transition-all cursor-pointer">
                            <option value="">All Types</option>
                            <option value="slots" {{ request('type') == 'slots' ? 'selected' : '' }}>🎰 Slots</option>
                            <option value="fish" {{ request('type') == 'fish' ? 'selected' : '' }}>🐟 Fish Games</option>
                            <option value="keno" {{ request('type') == 'keno' ? 'selected' : '' }}>🎲 Keno</option>
                            <option value="table" {{ request('type') == 'table' ? 'selected' : '' }}>🎯 Table Games</option>
                            <option value="card" {{ request('type') == 'card' ? 'selected' : '' }}>🃏 Card Games</option>
                        </select>
                        <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Sort Filter -->
                    <div class="relative flex-1 md:w-48">
                        <select name="sort" 
                                class="w-full appearance-none px-6 py-4 bg-black/40 border-2 border-white/5 rounded-2xl text-white font-bold focus:outline-none focus:border-blue-500/50 transition-all cursor-pointer">
                            <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>🔥 Featured</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>✨ Newest</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>👑 Popular</option>
                            <option value="rtp" {{ request('sort') == 'rtp' ? 'selected' : '' }}>💎 Highest RTP</option>
                        </select>
                        <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <button type="submit" class="px-10 py-4 bg-gradient-to-r from-yellow-500 to-orange-500 text-black font-black uppercase tracking-widest rounded-2xl transition-all shadow-lg shadow-yellow-500/20 hover:shadow-yellow-500/40 hover:-translate-y-1 active:scale-95 animate-shine overflow-hidden">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Games Count and Status -->
        <div class="flex items-center justify-between mb-10 px-4">
            <div class="flex items-center gap-3">
                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse shadow-[0_0_10px_rgba(34,197,94,0.8)]"></div>
                <p class="text-gray-400 font-bold uppercase tracking-widest text-xs">
                    Showing <span class="text-white">{{ $games->total() }}</span> Premium Games
                </p>
            </div>
            @if(request()->anyFilled(['search', 'type', 'sort']))
                <a href="{{ route('games.index') }}" class="text-purple-500 text-xs font-black uppercase tracking-widest hover:text-purple-400 transition-colors">
                    Clear All Filters
                </a>
            @endif
        </div>

        <!-- Game Card Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($games as $game)
                <x-game-card :game="$game" />
            @empty
                <div class="col-span-full text-center py-32 bg-gray-900/30 rounded-[3rem] border-2 border-dashed border-white/5">
                    <div class="text-8xl mb-8 animate-float-slow">👾</div>
                    <h3 class="text-4xl font-black text-white mb-4 uppercase tracking-tighter">No games found</h3>
                    <p class="text-xl text-gray-500 font-medium">Try adjusting your filters or search for something else</p>
                    <a href="{{ route('games.index') }}" class="inline-block mt-10 px-10 py-4 bg-white/5 hover:bg-white/10 text-white font-black rounded-2xl transition-all">
                        Reset Filters
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Premium Pagination -->
        @if($games->hasPages())
            <div class="mt-20">
                {{ $games->links() }}
            </div>
        @endif
    </div>
</div>

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    @keyframes twinkle {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.3); }
    }

    @keyframes fade-in-up {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .animate-twinkle {
        animation: twinkle 4s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }
</style>
@endsection
