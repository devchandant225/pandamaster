@extends('layouts.app')

@section('title', $game->title . ' - Orionstar Gaming')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 via-navy-900 to-gray-900">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <!-- Game Header -->
        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <!-- Game Thumbnail -->
            <div class="relative rounded-lg overflow-hidden shadow-2xl">
                <img src="{{ $game->thumbnail_url }}" 
                     alt="{{ $game->title }}" 
                     class="w-full h-auto">
                
                <!-- Badges -->
                <div class="absolute top-4 left-4 flex flex-col gap-2">
                    @if($game->is_hot)
                        <span class="bg-red-500 text-white text-sm font-bold px-3 py-2 rounded">
                            🔥 HOT
                        </span>
                    @endif
                    
                    @if($game->is_new)
                        <span class="bg-green-500 text-white text-sm font-bold px-3 py-2 rounded">
                            ✨ NEW
                        </span>
                    @endif
                    
                    @if($game->is_featured)
                        <span class="bg-yellow-500 text-black text-sm font-bold px-3 py-2 rounded">
                            ⭐ FEATURED
                        </span>
                    @endif
                </div>
            </div>

            <!-- Game Info -->
            <div class="flex flex-col justify-center">
                <div class="mb-2">
                    <span class="bg-gray-700 text-white text-sm px-3 py-1 rounded-full capitalize">
                        {{ $game->game_type }}
                    </span>
                    <span class="bg-pink-500 text-white text-sm px-3 py-1 rounded-full ml-2">
                        {{ $game->gameCategory->name }}
                    </span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $game->title }}</h1>

                @if($game->rtp)
                    <div class="mb-4 p-4 bg-gray-800 rounded-lg inline-block">
                        <span class="text-gray-400 text-sm">RTP (Return to Player)</span>
                        <p class="text-3xl font-bold text-yellow-500">{{ $game->rtp }}%</p>
                    </div>
                @endif

                <p class="text-gray-300 text-lg mb-6">{{ $game->description }}</p>

                @if($game->features)
                    <div class="mb-6">
                        <h3 class="text-white font-semibold mb-2">Features:</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($game->features as $feature)
                                <span class="bg-gray-700 text-gray-300 text-sm px-3 py-1 rounded capitalize">
                                    {{ str_replace('_', ' ', $feature) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Play Buttons -->
                <div class="flex flex-wrap gap-4">
                    @auth
                        <a href="{{ route('games.play', $game->slug) }}" 
                           class="flex-1 md:flex-none bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-4 px-8 rounded-lg text-lg transition-colors text-center">
                            🎮 Play Now
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="flex-1 md:flex-none bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-4 px-8 rounded-lg text-lg transition-colors text-center">
                            Login to Play
                        </a>
                    @endauth

                    @if($game->demo_url)
                        <a href="{{ route('games.demo', $game->slug) }}" 
                           class="flex-1 md:flex-none bg-pink-500 hover:bg-pink-400 text-white font-bold py-4 px-8 rounded-lg text-lg transition-colors text-center">
                            🎲 Play Demo
                        </a>
                    @endif
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div class="bg-gray-800 p-4 rounded-lg">
                        <p class="text-gray-400 text-sm">Total Plays</p>
                        <p class="text-2xl font-bold text-white">{{ number_format($game->play_count) }}</p>
                    </div>
                    <div class="bg-gray-800 p-4 rounded-lg">
                        <p class="text-gray-400 text-sm">Status</p>
                        <p class="text-2xl font-bold {{ $game->is_active ? 'text-green-500' : 'text-red-500' }}">
                            {{ $game->is_active ? 'Active' : 'Inactive' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Games -->
        @if($relatedGames->count() > 0)
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-white mb-8">You May Also Like</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($relatedGames as $relatedGame)
                        <x-game-card :game="$relatedGame" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
