@extends('layouts.app')

@section('title', 'All Games - Orionstar Gaming')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 via-navy-900 to-gray-900">
    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0 bg-gradient-to-r from-yellow-500/20 to-pink-500/20"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 py-16">
            <h1 class="text-5xl md:text-6xl font-bold text-center text-white mb-4">
                <span class="text-yellow-500">Orion</span><span class="text-pink-500">Star</span> Games
            </h1>
            <p class="text-xl text-gray-300 text-center">Discover our amazing collection of premium games</p>
        </div>
    </div>

    <!-- Category Navigation Rail -->
    <div class="sticky top-0 z-10 bg-gray-800/95 backdrop-blur-sm border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex items-center gap-4 overflow-x-auto">
                <a href="{{ route('games.index') }}" 
                   class="flex-shrink-0 px-6 py-2 rounded-full font-semibold transition-all {{ !request('category') ? 'bg-yellow-500 text-black' : 'bg-gray-700 text-white hover:bg-gray-600' }}">
                    All Games
                </a>
                
                @foreach($categories as $category)
                    <a href="{{ route('games.index', ['category' => $category->slug]) }}" 
                       class="flex-shrink-0 px-6 py-2 rounded-full font-semibold transition-all {{ request('category') == $category->slug ? 'bg-pink-500 text-white' : 'bg-gray-700 text-white hover:bg-gray-600' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Games Grid -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <!-- Filters and Search -->
        <div class="flex flex-col md:flex-row gap-4 mb-8">
            <div class="flex-1">
                <form action="{{ route('games.index') }}" method="GET" class="flex gap-2">
                    <input type="text" 
                           name="search" 
                           placeholder="Search games..." 
                           value="{{ request('search') }}"
                           class="flex-1 px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-yellow-500">
                    
                    <select name="type" 
                            class="px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-yellow-500">
                        <option value="">All Types</option>
                        <option value="slots" {{ request('type') == 'slots' ? 'selected' : '' }}>Slots</option>
                        <option value="fish" {{ request('type') == 'fish' ? 'selected' : '' }}>Fish Games</option>
                        <option value="keno" {{ request('type') == 'keno' ? 'selected' : '' }}>Keno</option>
                        <option value="table" {{ request('type') == 'table' ? 'selected' : '' }}>Table Games</option>
                        <option value="card" {{ request('type') == 'card' ? 'selected' : '' }}>Card Games</option>
                    </select>
                    
                    <select name="sort" 
                            class="px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-yellow-500">
                        <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Featured</option>
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                        <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                        <option value="rtp" {{ request('sort') == 'rtp' ? 'selected' : '' }}>Highest RTP</option>
                    </select>
                    
                    <button type="submit" class="px-6 py-2 bg-yellow-500 hover:bg-yellow-400 text-black font-bold rounded-lg transition-colors">
                        Filter
                    </button>
                </form>
            </div>
        </div>

        <!-- Games Count -->
        <div class="mb-6">
            <p class="text-gray-400">Showing {{ $games->firstItem() ?? 0 }}-{{ $games->lastItem() ?? 0 }} of {{ $games->total() }} games</p>
        </div>

        <!-- Game Card Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($games as $game)
                <x-game-card :game="$game" />
            @empty
                <div class="col-span-full text-center py-16">
                    <div class="text-6xl mb-4">🎮</div>
                    <h3 class="text-2xl font-bold text-white mb-2">No games found</h3>
                    <p class="text-gray-400">Try adjusting your filters or search terms</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($games->hasPages())
            <div class="mt-12">
                {{ $games->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
