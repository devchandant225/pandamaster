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
                    <a href="{{ route('register') }}" class="group relative px-14 py-6 bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-600 text-white text-2xl font-black rounded-2xl transition-all shadow-[0_0_30px_rgba(234,179,8,0.4)] hover:shadow-[0_0_50px_rgba(234,179,8,0.6)] transform hover:-translate-y-1.5 overflow-hidden animate-shine hover-glow">
                        <span class="relative z-10 uppercase tracking-tighter">🎰 START PLAYING - GET $1000 BONUS</span>
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
    <section class="py-20 md:py-32 relative overflow-hidden">
        <!-- Background Decor -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-yellow-500/5 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-pink-500/5 rounded-full blur-[120px] translate-y-1/2 -translate-x-1/2"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 tracking-tighter">
                    <span class="text-white">⭐</span> <span class="bg-gradient-to-r from-yellow-400 via-yellow-200 to-yellow-500 bg-clip-text text-transparent text-glow-yellow">FEATURED</span> <span class="text-white">GAMES</span>
                </h2>
                <p class="text-xl md:text-2xl text-gray-400 max-w-2xl mx-auto font-medium">Hand-picked premium experiences with the highest winning odds</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($featuredGames as $game)
                    <x-game-card :game="$game" />
                @endforeach
            </div>

            <div class="mt-16 text-center">
                <a href="{{ route('games.index') }}" class="group relative inline-flex items-center gap-4 bg-gradient-to-r from-yellow-500 via-pink-500 to-purple-600 hover:from-yellow-400 hover:via-pink-400 hover:to-purple-500 text-white px-12 py-6 rounded-2xl text-xl font-black transition-all shadow-[0_0_30px_rgba(234,179,8,0.3)] hover:shadow-[0_0_50px_rgba(234,179,8,0.5)] transform hover:-translate-y-1 animate-shine overflow-hidden">
                    <span class="relative z-10 uppercase tracking-tighter">Explore All Games</span>
                    <svg class="w-6 h-6 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Game Categories -->
    <section class="py-20 md:py-32 relative">
        <div class="absolute inset-0 bg-gray-900/40 backdrop-blur-3xl"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 tracking-tighter">
                    <span class="text-white">🎮</span> <span class="bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text text-transparent text-glow-pink">CHOOSE</span> <span class="text-white">YOUR DESTINY</span>
                </h2>
                <p class="text-xl md:text-2xl text-gray-400 max-w-2xl mx-auto font-medium">Browse our massive collection of high-stakes entertainment</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @php
                    $categories = [
                        ['type' => 'slots', 'emoji' => '🎰', 'label' => 'Slots', 'color' => 'from-yellow-500 to-orange-600', 'glow' => 'shadow-yellow-500/20', 'count' => '50+'],
                        ['type' => 'fish', 'emoji' => '🐟', 'label' => 'Fish Games', 'color' => 'from-blue-500 to-cyan-600', 'glow' => 'shadow-blue-500/20', 'count' => '20+'],
                        ['type' => 'keno', 'emoji' => '🎲', 'label' => 'Keno', 'color' => 'from-pink-500 to-rose-600', 'glow' => 'shadow-pink-500/20', 'count' => '10+'],
                        ['type' => 'table', 'emoji' => '🎯', 'label' => 'Table Games', 'color' => 'from-green-500 to-emerald-600', 'glow' => 'shadow-green-500/20', 'count' => '15+'],
                        ['type' => 'card', 'emoji' => '🃏', 'label' => 'Card Games', 'color' => 'from-purple-500 to-indigo-600', 'glow' => 'shadow-purple-500/20', 'count' => '15+'],
                    ];
                @endphp

                @foreach($categories as $cat)
                <a href="{{ route('games.index', ['type' => $cat['type']]) }}" 
                   class="group relative bg-gray-800/50 border border-white/5 p-10 rounded-[2rem] hover:border-white/20 transition-all duration-500 text-center transform hover:-translate-y-4 hover:shadow-2xl overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br {{ $cat['color'] }} opacity-0 group-hover:opacity-10 transition-opacity duration-500"></div>
                    <div class="text-6xl mb-6 transition-transform duration-500 group-hover:scale-125 group-hover:rotate-6">{{ $cat['emoji'] }}</div>
                    <h3 class="text-2xl font-black text-white mb-2 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:{{ $cat['color'] }} group-hover:bg-clip-text">{{ $cat['label'] }}</h3>
                    <p class="text-gray-500 text-sm font-bold uppercase tracking-widest group-hover:text-gray-300">{{ $cat['count'] }} Games</p>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-20 md:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-5xl md:text-6xl font-black mb-6 tracking-tighter">
                    <span class="text-white">🚀</span> <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">3 STEPS</span> <span class="text-white">TO WIN</span>
                </h2>
                <p class="text-xl md:text-2xl text-gray-400 font-medium">Start your winning streak in under a minute</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="group relative bg-gray-900/50 p-12 rounded-[2.5rem] border border-white/5 hover:border-yellow-500/30 transition-all duration-500 text-center transform hover:-translate-y-3">
                    <div class="w-24 h-24 bg-gradient-to-br from-yellow-500 to-orange-500 text-black rounded-3xl flex items-center justify-center mb-10 text-4xl font-black mx-auto shadow-[0_0_30px_rgba(234,179,8,0.4)] transition-transform group-hover:rotate-12 group-hover:scale-110">
                        1
                    </div>
                    <h3 class="text-3xl font-black text-white mb-6 uppercase tracking-tighter group-hover:text-yellow-500 transition-colors">Sign Up</h3>
                    <p class="text-gray-400 text-lg leading-relaxed font-medium">
                        Create your account in 30 seconds and instantly unlock a <span class="text-yellow-500 font-bold">$1000</span> starting bonus.
                    </p>
                </div>

                <div class="group relative bg-gray-900/50 p-12 rounded-[2.5rem] border border-white/5 hover:border-pink-500/30 transition-all duration-500 text-center transform hover:-translate-y-3">
                    <div class="w-24 h-24 bg-gradient-to-br from-pink-500 to-purple-600 text-white rounded-3xl flex items-center justify-center mb-10 text-4xl font-black mx-auto shadow-[0_0_30px_rgba(236,72,153,0.4)] transition-transform group-hover:-rotate-12 group-hover:scale-110">
                        2
                    </div>
                    <h3 class="text-3xl font-black text-white mb-6 uppercase tracking-tighter group-hover:text-pink-500 transition-colors">Choose Game</h3>
                    <p class="text-gray-400 text-lg leading-relaxed font-medium">
                        Explore our massive library of premium titles and find your lucky match with the <span class="text-pink-500 font-bold">best odds</span>.
                    </p>
                </div>

                <div class="group relative bg-gray-900/50 p-12 rounded-[2.5rem] border border-white/5 hover:border-blue-500/30 transition-all duration-500 text-center transform hover:-translate-y-3">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-cyan-600 text-white rounded-3xl flex items-center justify-center mb-10 text-4xl font-black mx-auto shadow-[0_0_30px_rgba(59,130,246,0.4)] transition-transform group-hover:rotate-12 group-hover:scale-110">
                        3
                    </div>
                    <h3 class="text-3xl font-black text-white mb-6 uppercase tracking-tighter group-hover:text-blue-500 transition-colors">Play & Win</h3>
                    <p class="text-gray-400 text-lg leading-relaxed font-medium">
                        Experience the rush of winning and withdraw your earnings <span class="text-blue-500 font-bold">instantly</span> to your account.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Hot Games Section -->
    @if(isset($hotGames) && $hotGames->count() > 0)
    <section class="py-20 md:py-32 relative overflow-hidden bg-gray-950">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(239,68,68,0.05)_0%,rgba(0,0,0,0)_70%)]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 tracking-tighter">
                    <span class="text-white">🔥</span> <span class="bg-gradient-to-r from-red-500 via-orange-500 to-yellow-500 bg-clip-text text-transparent">FEEL THE</span> <span class="text-white text-glow-red">HEAT</span>
                </h2>
                <p class="text-xl md:text-2xl text-gray-400 font-medium">Most popular games with the biggest jackpots being hit right now</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($hotGames as $game)
                    <x-game-card :game="$game" />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- New Games Section -->
    @if(isset($newGames) && $newGames->count() > 0)
    <section class="py-20 md:py-32 relative overflow-hidden">
        <div class="absolute top-1/2 right-0 w-[400px] h-[400px] bg-green-500/5 rounded-full blur-[100px] -translate-y-1/2"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 tracking-tighter">
                    <span class="text-white">✨</span> <span class="bg-gradient-to-r from-green-400 via-emerald-400 to-teal-500 bg-clip-text text-transparent">FRESH</span> <span class="text-white">ARRIVALS</span>
                </h2>
                <p class="text-xl md:text-2xl text-gray-400 font-medium">Just landed! Be the first to play and conquer our latest additions</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($newGames as $game)
                    <x-game-card :game="$game" />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Blog Preview Section -->
    @if(isset($latestPosts) && $latestPosts->count() > 0)
    <section class="py-20 md:py-32 relative">
        <div class="absolute inset-0 bg-gray-900/20 backdrop-blur-3xl"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 tracking-tighter">
                    <span class="text-white">📝</span> <span class="bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent">PRO TIPS</span> <span class="text-white">& NEWS</span>
                </h2>
                <p class="text-xl md:text-2xl text-gray-400 font-medium">Master the games with expert strategies and stay updated</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($latestPosts as $post)
                <article class="group relative bg-gray-900 rounded-[2rem] overflow-hidden border border-white/5 hover:border-pink-500/30 transition-all duration-500 hover:-translate-y-3 shadow-2xl">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img
                            src="{{ $post->image_url }}"
                            alt="{{ $post->title }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent opacity-60"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="px-3 py-1 bg-pink-500/10 text-pink-500 text-[10px] font-black uppercase tracking-widest rounded-full border border-pink-500/20">Strategy</span>
                            <span class="text-gray-500 text-[10px] font-bold uppercase tracking-widest">{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="text-2xl font-black mb-4 group-hover:text-pink-500 transition-colors leading-tight">
                            {{ $post->title }}
                        </h3>
                        <p class="text-gray-400 mb-6 leading-relaxed font-medium line-clamp-2 text-sm">{{ $post->excerpt }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-2 text-pink-500 font-black uppercase tracking-tighter hover:gap-4 transition-all group/link">
                            Read Full Guide
                            <svg class="w-5 h-5 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="mt-16 text-center">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-3 border-2 border-pink-500/30 hover:border-pink-500 text-pink-500 hover:bg-pink-500 hover:text-white px-12 py-5 rounded-2xl text-lg font-black transition-all shadow-xl">
                    Explore All Articles
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Final CTA Section -->
    <section class="py-24 md:py-40 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(234,179,8,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-6xl sm:text-7xl md:text-8xl font-black mb-8 leading-[0.85] tracking-[ -0.05em]">
                READY TO <span class="bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-600 bg-clip-text text-transparent text-glow-yellow">CONQUER</span> THE GALAXY?
            </h2>
            <p class="text-2xl md:text-3xl text-gray-300 mb-16 font-bold tracking-tight">
                Join <span class="text-white underline decoration-yellow-500 decoration-4 underline-offset-8">50,000+</span> players winning big every day
            </p>

            <div class="flex flex-wrap justify-center gap-6 sm:gap-12 mb-20">
                <div class="flex items-center gap-3 text-gray-200 bg-white/5 px-6 py-3 rounded-full border border-white/10 backdrop-blur-md">
                    <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-black uppercase tracking-widest text-xs">$1000 BONUS</span>
                </div>
                <div class="flex items-center gap-3 text-gray-200 bg-white/5 px-6 py-3 rounded-full border border-white/10 backdrop-blur-md">
                    <svg class="w-6 h-6 text-pink-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-black uppercase tracking-widest text-xs">INSTANT PAYOUTS</span>
                </div>
                <div class="flex items-center gap-3 text-gray-200 bg-white/5 px-6 py-3 rounded-full border border-white/10 backdrop-blur-md">
                    <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-black uppercase tracking-widest text-xs">24/7 SUPPORT</span>
                </div>
            </div>

            @auth
                <a href="{{ route('dashboard') }}" class="group relative inline-block bg-gradient-to-r from-yellow-500 via-pink-500 to-purple-600 text-white px-20 py-8 text-3xl font-black rounded-[2rem] shadow-[0_0_50px_rgba(234,179,8,0.4)] transition-all transform hover:-translate-y-2 animate-shine overflow-hidden">
                    <span class="relative z-10 uppercase tracking-tighter">🚀 START PLAYING NOW</span>
                </a>
            @else
                <a href="{{ route('register') }}" class="group relative inline-block bg-gradient-to-r from-yellow-500 via-pink-500 to-purple-600 text-white px-20 py-8 text-3xl font-black rounded-[2rem] shadow-[0_0_50px_rgba(234,179,8,0.4)] transition-all transform hover:-translate-y-2 animate-shine overflow-hidden">
                    <span class="relative z-10 uppercase tracking-tighter">🎰 CREATE ACCOUNT & WIN</span>
                </a>
            @endauth
        </div>
    </section>
</div>
@endsection
