@extends('layouts.app')

@section('title', $game->title . ' - Orion Star VIP')

@section('content')
<div class="min-h-screen bg-black relative overflow-hidden">
    <!-- Sophisticated Background Lighting -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="absolute top-1/4 -left-20 w-[600px] h-[600px] bg-yellow-500/5 rounded-full blur-[150px] animate-pulse"></div>
        <div class="absolute bottom-1/4 -right-20 w-[800px] h-[800px] bg-purple-500/5 rounded-full blur-[150px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <!-- Stars Animation -->
    <div class="absolute inset-0 pointer-events-none">
        @for($i = 0; $i < 50; $i++)
            <div class="absolute w-[1px] h-[1px] bg-white rounded-full animate-twinkle" 
                 style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(3000, 6000) }}ms;"></div>
        @endfor
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 py-20 md:py-32">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-3 mb-12 text-sm font-black uppercase tracking-[0.2em] animate-fade-in-up">
            <a href="{{ route('home') }}" class="text-gray-500 hover:text-white transition-colors">Home</a>
            <span class="text-gray-700">/</span>
            <a href="{{ route('games.index') }}" class="text-gray-500 hover:text-white transition-colors">Games</a>
            <span class="text-gray-700">/</span>
            <span class="text-yellow-500">{{ $game->title }}</span>
        </nav>

        <!-- Game Header -->
        <div class="grid lg:grid-cols-12 gap-12 lg:gap-20 mb-20">
            <!-- Game Thumbnail & Visuals -->
            <div class="lg:col-span-5 animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="relative rounded-[3rem] overflow-hidden shadow-[0_0_50px_rgba(0,0,0,0.5)] border border-white/10 group">
                    <img src="{{ $game->thumbnail }}"
                         alt="{{ $game->title }}"
                         class="w-full h-auto transition-transform duration-700 group-hover:scale-110">
                    
                    <!-- Advanced Badges -->
                    <div class="absolute top-6 left-6 flex flex-col gap-3">
                        @if($game->is_hot)
                            <span class="bg-gradient-to-r from-red-600 to-orange-600 text-white text-xs font-black px-5 py-2 rounded-full shadow-2xl flex items-center gap-2 uppercase tracking-tighter">
                                <span class="animate-pulse">🔥</span> HOT GAME
                            </span>
                        @endif
                        
                        @if($game->is_new)
                            <span class="bg-gradient-to-r from-green-600 to-emerald-600 text-white text-xs font-black px-5 py-2 rounded-full shadow-2xl flex items-center gap-2 uppercase tracking-tighter">
                                <span class="animate-bounce">✨</span> NEW RELEASE
                            </span>
                        @endif
                        
                        @if($game->is_featured)
                            <span class="bg-gradient-to-r from-yellow-500 to-amber-500 text-black text-xs font-black px-5 py-2 rounded-full shadow-2xl flex items-center gap-2 uppercase tracking-tighter">
                                <span>⭐</span> FEATURED
                            </span>
                        @endif
                    </div>

                    <!-- Payout Glow -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
            </div>

            <!-- Game Info & Interaction -->
            <div class="lg:col-span-7 flex flex-col justify-center animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="flex flex-wrap items-center gap-4 mb-8">
                    <span class="bg-white/5 border border-white/10 text-gray-300 text-xs font-black px-4 py-1.5 rounded-full uppercase tracking-widest">
                        {{ $game->game_type }}
                    </span>
                    <span class="bg-purple-500/10 border border-purple-500/20 text-purple-500 text-xs font-black px-4 py-1.5 rounded-full uppercase tracking-widest">
                        {{ $game->gameCategory->name }}
                    </span>
                    <div class="flex items-center gap-2 text-yellow-500 font-black text-xs uppercase tracking-widest ml-auto">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse shadow-[0_0_10px_rgba(34,197,94,0.8)]"></div>
                        Live Now
                    </div>
                </div>

                <h1 class="text-6xl md:text-8xl font-black text-white mb-6 leading-[0.85] tracking-tighter">
                    {{ $game->title }}
                </h1>

                @if($game->rtp)
                    <div class="mb-10 p-8 bg-white/5 border border-white/10 rounded-[2.5rem] inline-flex flex-col items-center group hover:border-yellow-500/50 transition-all duration-500">
                        <span class="text-gray-500 text-xs font-black uppercase tracking-[0.3em] mb-2 group-hover:text-yellow-500 transition-colors">Return to Player</span>
                        <p class="text-6xl font-black text-yellow-500 text-glow-yellow tracking-tighter">{{ $game->rtp }}%</p>
                    </div>
                @endif

                <p class="text-xl text-gray-400 mb-10 leading-relaxed font-medium max-w-2xl">
                    {{ $game->description }}
                </p>

                @if($game->features)
                    <div class="mb-12">
                        <h3 class="text-white text-sm font-black uppercase tracking-widest mb-6 flex items-center gap-3">
                            <span class="w-8 h-1 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full"></span>
                            Special Features
                        </h3>
                        <div class="flex flex-wrap gap-3">
                            @foreach($game->features as $feature)
                                <span class="bg-gray-900 border border-white/5 text-gray-300 text-xs font-bold px-5 py-2.5 rounded-2xl capitalize hover:border-white/20 hover:text-white transition-all">
                                    {{ str_replace('_', ' ', $feature) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Play Buttons -->
                <div class="flex flex-col sm:flex-row gap-6 mb-12">
                    @auth
                        <a href="{{ $adminSettings->external_dashboard_url ?? route('admin.dashboard') }}"
                           class="flex-1 bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 text-white font-black py-6 px-12 rounded-[2rem] text-2xl transition-all shadow-[0_0_30px_rgba(234,179,8,0.4)] hover:shadow-[0_0_50px_rgba(234,179,8,0.6)] transform hover:-translate-y-1.5 text-center animate-shine overflow-hidden group">
                            <span class="relative z-10 flex items-center justify-center gap-3 uppercase tracking-tighter">
                                🎮 PLAY NOW
                            </span>
                        </a>
                    @else
                        <a href="{{ $adminSettings->register_url ?? '#' }}" 
                           class="flex-1 bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 text-white font-black py-6 px-12 rounded-[2rem] text-2xl transition-all shadow-[0_0_30px_rgba(234,179,8,0.4)] hover:shadow-[0_0_50px_rgba(234,179,8,0.6)] transform hover:-translate-y-1.5 text-center animate-shine overflow-hidden group">
                            <span class="relative z-10 flex items-center justify-center gap-3 uppercase tracking-tighter">
                                🎰 SIGN UP TO PLAY
                            </span>
                        </a>
                    @endauth

                    @if($game->demo_url)
                        <a href="{{ route('games.demo', $game->slug) }}" 
                           class="flex-1 bg-gray-900/50 hover:bg-gray-800 text-white font-black py-6 px-12 rounded-[2rem] text-2xl transition-all border-2 border-gray-700 hover:border-purple-500 shadow-xl backdrop-blur-sm transform hover:-translate-y-1.5 text-center flex items-center justify-center gap-3 uppercase tracking-tighter">
                            🎲 TRY DEMO
                        </a>
                    @endif
                </div>

                <!-- Stats Rails -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white/5 border border-white/5 p-6 rounded-[2rem] group hover:border-blue-500/30 transition-all">
                        <p class="text-gray-500 text-[10px] font-black uppercase tracking-[0.2em] mb-1">Worldwide Plays</p>
                        <p class="text-3xl font-black text-white group-hover:text-blue-500 transition-colors tracking-tighter">{{ number_format($game->play_count) }}</p>
                    </div>
                    <div class="bg-white/5 border border-white/5 p-6 rounded-[2rem] group hover:border-green-500/30 transition-all">
                        <p class="text-gray-500 text-[10px] font-black uppercase tracking-[0.2em] mb-1">Server Status</p>
                        <p class="text-3xl font-black tracking-tighter {{ $game->is_active ? 'text-green-500' : 'text-red-500' }}">
                            {{ $game->is_active ? 'ONLINE' : 'OFFLINE' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Games -->
        @if($relatedGames->count() > 0)
            <div class="mt-32 pt-20 border-t border-white/5">
                <div class="flex items-center justify-between mb-16">
                    <h2 class="text-4xl md:text-5xl font-black text-white tracking-tighter uppercase">
                        YOU MAY <span class="bg-gradient-to-r from-purple-500 to-purple-600 bg-clip-text text-transparent">ALSO LIKE</span>
                    </h2>
                    <a href="{{ route('games.index') }}" class="text-gray-500 hover:text-white text-xs font-black uppercase tracking-widest transition-colors flex items-center gap-2 group">
                        View All Games 
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($relatedGames as $relatedGame)
                        <x-game-card :game="$relatedGame" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

<style>
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
