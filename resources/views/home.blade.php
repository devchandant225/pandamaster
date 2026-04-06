@extends('layouts.app')

@section('title', 'Premier Online Gaming Platform')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900">
    <!-- Dynamic Hero Section -->
    @if($heroSection && $heroSection->is_active)
        <x-hero-section :section="$heroSection" />
    @else
        <!-- Fallback Hero Section -->
        <section class="relative overflow-hidden min-h-screen flex items-center justify-center bg-gray-950">
            <!-- Animated Background & Lighting -->
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
                <div class="absolute top-1/4 -left-20 w-[500px] h-[500px] bg-yellow-500/10 rounded-full blur-[120px] animate-pulse"></div>
                <div class="absolute bottom-1/4 -right-20 w-[600px] h-[600px] bg-pink-500/10 rounded-full blur-[120px] animate-pulse" style="animation-delay: 2s;"></div>
            </div>
            
            <div class="absolute inset-0 pointer-events-none">
                @for($i = 0; $i < 60; $i++)
                    <div class="absolute w-[1px] h-[1px] bg-white rounded-full animate-twinkle" 
                         style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(3000, 6000) }}ms;"></div>
                @endfor
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
                <h1 class="text-6xl sm:text-7xl md:text-8xl lg:text-9xl font-black mb-8 leading-[0.9] animate-fade-in-up">
                    <span class="text-yellow-500 text-glow-yellow">PLAY</span> <span class="text-pink-500 text-glow-pink">WIN</span> <span class="text-white">REPEAT</span>
                </h1>
                <p class="text-2xl md:text-3xl text-gray-300 mb-14 font-bold tracking-tight animate-fade-in-up" style="animation-delay: 0.2s;">
                    Your Premier Online Gaming Destination
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center animate-fade-in-up" style="animation-delay: 0.4s;">
                    <a href="{{ route('register') }}" class="group relative px-14 py-6 bg-gradient-to-r from-yellow-500 to-yellow-400 text-black text-2xl font-black rounded-2xl transition-all shadow-2xl shadow-yellow-500/40 hover:shadow-yellow-500/60 transform hover:-translate-y-1.5 overflow-hidden animate-shine hover-glow">
                        <span class="relative z-10 uppercase tracking-tighter">🎰 START PLAYING</span>
                    </a>
                    <a href="{{ route('games.index') }}" class="px-14 py-6 bg-gray-900/50 hover:bg-gray-800 text-white text-2xl font-black rounded-2xl transition-all border-2 border-gray-700 hover:border-yellow-500 shadow-xl backdrop-blur-sm transform hover:-translate-y-1.5">
                        BROWSE GAMES
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 md:gap-12 pt-20 max-w-4xl mx-auto animate-fade-in-up" style="animation-delay: 0.6s;">
                    <div class="group relative p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-yellow-500/50 transition-colors">
                        <div class="text-4xl md:text-5xl font-black text-yellow-500 mb-2 group-hover:scale-110 transition-transform text-glow-yellow">100+</div>
                        <div class="text-xs md:text-sm text-gray-400 font-bold uppercase tracking-widest">Premium Games</div>
                    </div>
                    <div class="group relative p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-pink-500/50 transition-colors">
                        <div class="text-4xl md:text-5xl font-black text-pink-500 mb-2 group-hover:scale-110 transition-transform text-glow-pink">$2M+</div>
                        <div class="text-xs md:text-sm text-gray-400 font-bold uppercase tracking-widest">Won This Week</div>
                    </div>
                    <div class="group relative p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-yellow-500/50 transition-colors">
                        <div class="text-4xl md:text-5xl font-black text-yellow-500 mb-2 group-hover:scale-110 transition-transform text-glow-yellow">50K+</div>
                        <div class="text-xs md:text-sm text-gray-400 font-bold uppercase tracking-widest">Active Players</div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Featured Games Section -->
    @if(isset($featuredGames) && $featuredGames->count() > 0)
    <section class="py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-black mb-4">
                    ⭐ <span class="text-yellow-500">Featured</span> Games
                </h2>
                <p class="text-lg md:text-xl text-gray-400">Hand-picked games with the best odds</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredGames as $game)
                    <x-game-card :game="$game" />
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('games.index') }}" class="inline-flex items-center gap-3 bg-gradient-to-r from-yellow-500 to-pink-500 hover:from-yellow-400 hover:to-pink-400 text-white px-10 py-5 rounded-xl text-lg font-black transition-all shadow-2xl transform hover:-translate-y-1">
                    View All Games
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Game Categories -->
    <section class="py-16 md:py-24 bg-gray-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-black mb-4">
                    🎮 Browse <span class="text-pink-500">Categories</span>
                </h2>
                <p class="text-lg md:text-xl text-gray-400">Find your favorite game type</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <a href="{{ route('games.index', ['type' => 'slots']) }}" class="group bg-gradient-to-br from-yellow-500/20 to-yellow-600/20 border-2 border-yellow-500/30 p-8 rounded-2xl hover:border-yellow-500 hover:shadow-2xl hover:shadow-yellow-500/30 transition-all text-center transform hover:-translate-y-2">
                    <div class="text-5xl mb-4">🎰</div>
                    <h3 class="text-xl font-black text-yellow-500 mb-2">Slots</h3>
                    <p class="text-gray-400 text-sm">50+ Games</p>
                </a>

                <a href="{{ route('games.index', ['type' => 'fish']) }}" class="group bg-gradient-to-br from-blue-500/20 to-blue-600/20 border-2 border-blue-500/30 p-8 rounded-2xl hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-500/30 transition-all text-center transform hover:-translate-y-2">
                    <div class="text-5xl mb-4">🐟</div>
                    <h3 class="text-xl font-black text-blue-500 mb-2">Fish Games</h3>
                    <p class="text-gray-400 text-sm">20+ Games</p>
                </a>

                <a href="{{ route('games.index', ['type' => 'keno']) }}" class="group bg-gradient-to-br from-pink-500/20 to-pink-600/20 border-2 border-pink-500/30 p-8 rounded-2xl hover:border-pink-500 hover:shadow-2xl hover:shadow-pink-500/30 transition-all text-center transform hover:-translate-y-2">
                    <div class="text-5xl mb-4">🎲</div>
                    <h3 class="text-xl font-black text-pink-500 mb-2">Keno</h3>
                    <p class="text-gray-400 text-sm">10+ Games</p>
                </a>

                <a href="{{ route('games.index', ['type' => 'table']) }}" class="group bg-gradient-to-br from-green-500/20 to-green-600/20 border-2 border-green-500/30 p-8 rounded-2xl hover:border-green-500 hover:shadow-2xl hover:shadow-green-500/30 transition-all text-center transform hover:-translate-y-2">
                    <div class="text-5xl mb-4">🎯</div>
                    <h3 class="text-xl font-black text-green-500 mb-2">Table Games</h3>
                    <p class="text-gray-400 text-sm">15+ Games</p>
                </a>

                <a href="{{ route('games.index', ['type' => 'card']) }}" class="group bg-gradient-to-br from-purple-500/20 to-purple-600/20 border-2 border-purple-500/30 p-8 rounded-2xl hover:border-purple-500 hover:shadow-2xl hover:shadow-purple-500/30 transition-all text-center transform hover:-translate-y-2">
                    <div class="text-5xl mb-4">🃏</div>
                    <h3 class="text-xl font-black text-purple-500 mb-2">Card Games</h3>
                    <p class="text-gray-400 text-sm">15+ Games</p>
                </a>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-4">
                    🚀 How It <span class="text-yellow-500">Works</span>
                </h2>
                <p class="text-lg md:text-xl text-gray-400">Start playing in 3 simple steps</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all border-2 border-yellow-500/20 hover:border-yellow-500 text-center transform hover:-translate-y-2">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-yellow-400 text-black rounded-2xl flex items-center justify-center mb-6 text-3xl font-black mx-auto shadow-lg shadow-yellow-500/50">
                        1
                    </div>
                    <h3 class="text-2xl font-black text-white mb-4">Sign Up</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Create your account in 30 seconds and get $1000 starting bonus
                    </p>
                </div>

                <div class="bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all border-2 border-pink-500/20 hover:border-pink-500 text-center transform hover:-translate-y-2">
                    <div class="w-20 h-20 bg-gradient-to-br from-pink-500 to-pink-400 text-white rounded-2xl flex items-center justify-center mb-6 text-3xl font-black mx-auto shadow-lg shadow-pink-500/50">
                        2
                    </div>
                    <h3 class="text-2xl font-black text-white mb-4">Choose a Game</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Browse our collection and find your perfect game with the best odds
                    </p>
                </div>

                <div class="bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all border-2 border-yellow-500/20 hover:border-yellow-500 text-center transform hover:-translate-y-2">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-yellow-400 text-black rounded-2xl flex items-center justify-center mb-6 text-3xl font-black mx-auto shadow-lg shadow-yellow-500/50">
                        3
                    </div>
                    <h3 class="text-2xl font-black text-white mb-4">Play & Win</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Start playing instantly and withdraw your winnings anytime
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Hot Games Section -->
    @if(isset($hotGames) && $hotGames->count() > 0)
    <section class="py-16 md:py-24 bg-gradient-to-r from-red-900/20 via-pink-900/20 to-red-900/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-black mb-4">
                    🔥 <span class="text-red-500">Hot</span> Games Right Now
                </h2>
                <p class="text-lg md:text-xl text-gray-400">Most popular games with biggest wins</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($hotGames as $game)
                    <x-game-card :game="$game" />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- New Games Section -->
    @if(isset($newGames) && $newGames->count() > 0)
    <section class="py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-black mb-4">
                    ✨ <span class="text-green-500">New</span> Additions
                </h2>
                <p class="text-lg md:text-xl text-gray-400">Latest games added this week</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($newGames as $game)
                    <x-game-card :game="$game" />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Blog Preview Section -->
    @if(isset($latestPosts) && $latestPosts->count() > 0)
    <section class="py-16 md:py-24 bg-gray-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-black mb-4">
                    📝 Gaming <span class="text-pink-500">Tips & News</span>
                </h2>
                <p class="text-lg md:text-xl text-gray-400">Expert strategies and updates</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestPosts as $post)
                <article class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all border border-gray-700 hover:border-pink-500 group">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img
                            src="{{ $post->image_url }}"
                            alt="{{ $post->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                        >
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-black mb-3 group-hover:text-pink-500 transition-colors">
                            {{ $post->title }}
                        </h3>
                        <p class="text-gray-400 mb-4 leading-relaxed text-sm md:text-base line-clamp-3">{{ $post->excerpt }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center text-pink-500 font-semibold hover:text-pink-400 transition-colors">
                            Read More
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-3 bg-gray-800 hover:bg-gray-700 border-2 border-pink-500 text-pink-500 hover:text-white px-10 py-4 rounded-xl text-lg font-black transition-all">
                    View All Articles
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Final CTA Section -->
    <section class="py-20 md:py-32 bg-gradient-to-br from-yellow-500/10 via-pink-500/10 to-yellow-500/10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl sm:text-5xl md:text-6xl font-black mb-6 leading-tight">
                Ready to <span class="text-yellow-500">Play</span> & <span class="text-pink-500">Win?</span>
            </h2>
            <p class="text-xl md:text-2xl text-gray-300 mb-12">
                Join thousands of players winning big every day
            </p>

            <div class="flex flex-wrap justify-center gap-4 sm:gap-8 mb-12">
                <div class="flex items-center gap-2 text-gray-300">
                    <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-bold">$1000 Starting Bonus</span>
                </div>
                <div class="flex items-center gap-2 text-gray-300">
                    <svg class="w-6 h-6 text-pink-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-bold">Instant Withdrawals</span>
                </div>
                <div class="flex items-center gap-2 text-gray-300">
                    <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-bold">24/7 Support</span>
                </div>
            </div>

            @auth
                <a href="{{ route('dashboard') }}" class="inline-block bg-gradient-to-r from-yellow-500 to-pink-500 hover:from-yellow-400 hover:to-pink-400 text-white px-16 py-6 text-2xl font-black rounded-xl shadow-2xl transition-all transform hover:-translate-y-1">
                    🎮 Start Playing Now
                </a>
            @else
                <a href="{{ route('register') }}" class="inline-block bg-gradient-to-r from-yellow-500 to-pink-500 hover:from-yellow-400 hover:to-pink-400 text-white px-16 py-6 text-2xl font-black rounded-xl shadow-2xl transition-all transform hover:-translate-y-1">
                    🎰 Create Account & Play
                </a>
            @endauth
        </div>
    </section>
</div>
@endsection
