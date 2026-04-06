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
    <section id="categories" class="py-20 md:py-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-gray-900/40 backdrop-blur-3xl"></div>
        <!-- Decorative light blobs -->
        <div class="absolute top-0 -left-20 w-80 h-80 bg-pink-500/10 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-0 -right-20 w-80 h-80 bg-blue-500/10 rounded-full blur-[100px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 space-y-4">
                <h2 class="text-4xl md:text-7xl font-black mb-6 tracking-tighter animate-fade-in-down">
                    <span class="inline-block animate-bounce-slow">🎮</span> 
                    <span class="bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text text-transparent drop-shadow-[0_0_15px_rgba(236,72,153,0.3)]">CHOOSE</span> 
                    <span class="text-white">YOUR DESTINY</span>
                </h2>
                <div class="h-1.5 w-24 bg-gradient-to-r from-pink-500 to-blue-500 mx-auto rounded-full shadow-[0_0_10px_rgba(236,72,153,0.5)]"></div>
                <p class="text-lg md:text-2xl text-gray-400 max-w-2xl mx-auto font-medium opacity-80 pt-4">
                    Dive into our premium selection of high-stakes entertainment
                </p>
            </div>

            <!-- Mobile: Horizontal Scroll, Desktop: Grid -->
            <div class="flex md:grid md:grid-cols-3 lg:grid-cols-5 gap-6 overflow-x-auto md:overflow-x-visible pb-12 md:pb-0 snap-x snap-mandatory no-scrollbar -mx-4 px-4 md:mx-0 md:px-0">
                @php
                    $categories = [
                        ['type' => 'slots', 'emoji' => '🎰', 'label' => 'Slots', 'color' => 'from-yellow-400/20 to-orange-500/20', 'border' => 'hover:border-yellow-500/50', 'count' => '50+'],
                        ['type' => 'fish', 'emoji' => '🐟', 'label' => 'Fish Games', 'color' => 'from-blue-400/20 to-cyan-500/20', 'border' => 'hover:border-blue-500/50', 'count' => '20+'],
                        ['type' => 'keno', 'emoji' => '🎲', 'label' => 'Keno', 'color' => 'from-pink-400/20 to-rose-500/20', 'border' => 'hover:border-pink-500/50', 'count' => '10+'],
                        ['type' => 'table', 'emoji' => '🎯', 'label' => 'Table Games', 'color' => 'from-green-400/20 to-emerald-500/20', 'border' => 'hover:border-green-500/50', 'count' => '15+'],
                        ['type' => 'card', 'emoji' => '🃏', 'label' => 'Card Games', 'color' => 'from-purple-400/20 to-indigo-500/20', 'border' => 'hover:border-purple-500/50', 'count' => '15+'],
                    ];
                @endphp

                @foreach($categories as $cat)
                <a href="{{ route('games.index', ['type' => $cat['type']]) }}" 
                   class="group relative flex-none w-[80vw] md:w-auto bg-gray-900/40 backdrop-blur-xl border border-white/5 p-8 md:p-10 rounded-[2.5rem] {{ $cat['border'] }} transition-all duration-700 text-center transform hover:-translate-y-4 hover:shadow-[0_20px_50px_rgba(0,0,0,0.5)] overflow-hidden snap-center animate-shine-fast">
                    
                    <!-- Hover Background Reveal -->
                    <div class="absolute inset-0 bg-gradient-to-br {{ $cat['color'] }} opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    
                    <!-- Emoji with floating animation -->
                    <div class="text-7xl mb-8 relative z-10 transition-all duration-700 transform group-hover:scale-125 group-hover:-rotate-12 drop-shadow-2xl animate-float-slow">
                        {{ $cat['emoji'] }}
                    </div>

                    <!-- Labels -->
                    <div class="relative z-10 space-y-2">
                        <h3 class="text-2xl font-black text-white group-hover:tracking-wider transition-all duration-500 uppercase">
                            {{ $cat['label'] }}
                        </h3>
                        <p class="text-gray-400 text-sm font-bold uppercase tracking-[0.2em] group-hover:text-white/80 transition-colors">
                            {{ $cat['count'] }} Games
                        </p>
                    </div>

                    <!-- Decorative elements -->
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-white/5 rounded-full blur-2xl group-hover:bg-white/10 transition-colors duration-700"></div>
                </a>
                @endforeach
            </div>
            
            <!-- Mobile Hint -->
            <div class="md:hidden mt-4 text-center">
                <div class="inline-flex items-center gap-2 text-gray-500 text-xs font-bold uppercase tracking-widest animate-pulse">
                    <span>Swipe to explore</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-20 md:py-32 relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[1000px] h-[1000px] bg-blue-500/5 rounded-full blur-[120px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-24 space-y-6">
                <h2 class="text-5xl md:text-8xl font-black mb-6 tracking-tighter leading-none">
                    <span class="inline-block animate-bounce-slow">🚀</span> 
                    <span class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent">3 STEPS</span> 
                    <span class="text-white">TO WIN</span>
                </h2>
                <div class="h-1.5 w-32 bg-gradient-to-r from-yellow-400 to-red-500 mx-auto rounded-full shadow-[0_0_20px_rgba(234,179,8,0.5)]"></div>
                <p class="text-xl md:text-3xl text-gray-400 font-medium max-w-2xl mx-auto">Start your winning streak in under a minute</p>
            </div>

            <div class="relative grid grid-cols-1 md:grid-cols-3 gap-16 md:gap-8">
                <!-- Connection Line (Desktop) -->
                <div class="hidden md:block absolute top-32 left-[15%] right-[15%] h-px bg-gradient-to-r from-transparent via-gray-700 to-transparent"></div>

                <!-- Step 1 -->
                <div class="group relative text-center">
                    <div class="relative mb-12 inline-block">
                        <div class="absolute inset-0 bg-yellow-500/20 blur-3xl rounded-full group-hover:bg-yellow-500/40 transition-all duration-700"></div>
                        <div class="relative w-32 h-32 bg-gray-900 border-2 border-yellow-500/30 rounded-[2.5rem] flex items-center justify-center text-5xl font-black text-yellow-500 shadow-2xl transform group-hover:rotate-[15deg] group-hover:scale-110 transition-all duration-500">
                            1
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-500 rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    <div class="space-y-4 px-4">
                        <h3 class="text-3xl font-black text-white uppercase tracking-tighter group-hover:text-yellow-400 transition-colors duration-500">Sign Up</h3>
                        <p class="text-gray-400 text-lg leading-relaxed font-medium group-hover:text-gray-300 transition-colors">
                            Create your account in 30 seconds and instantly unlock a <span class="text-yellow-500 font-bold drop-shadow-[0_0_10px_rgba(234,179,8,0.3)]">$1000</span> starting bonus.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="group relative text-center">
                    <div class="relative mb-12 inline-block">
                        <div class="absolute inset-0 bg-pink-500/20 blur-3xl rounded-full group-hover:bg-pink-500/40 transition-all duration-700"></div>
                        <div class="relative w-32 h-32 bg-gray-900 border-2 border-pink-500/30 rounded-[2.5rem] flex items-center justify-center text-5xl font-black text-pink-500 shadow-2xl transform group-hover:-rotate-[15deg] group-hover:scale-110 transition-all duration-500">
                            2
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-pink-500 rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    <div class="space-y-4 px-4">
                        <h3 class="text-3xl font-black text-white uppercase tracking-tighter group-hover:text-pink-400 transition-colors duration-500">Choose Game</h3>
                        <p class="text-gray-400 text-lg leading-relaxed font-medium group-hover:text-gray-300 transition-colors">
                            Explore our massive library of premium titles and find your lucky match with the <span class="text-pink-500 font-bold drop-shadow-[0_0_10px_rgba(236,72,153,0.3)]">best odds</span>.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="group relative text-center">
                    <div class="relative mb-12 inline-block">
                        <div class="absolute inset-0 bg-blue-500/20 blur-3xl rounded-full group-hover:bg-blue-500/40 transition-all duration-700"></div>
                        <div class="relative w-32 h-32 bg-gray-900 border-2 border-blue-500/30 rounded-[2.5rem] flex items-center justify-center text-5xl font-black text-blue-500 shadow-2xl transform group-hover:rotate-[15deg] group-hover:scale-110 transition-all duration-500">
                            3
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-blue-500 rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    <div class="space-y-4 px-4">
                        <h3 class="text-3xl font-black text-white uppercase tracking-tighter group-hover:text-blue-400 transition-colors duration-500">Play & Win</h3>
                        <p class="text-gray-400 text-lg leading-relaxed font-medium group-hover:text-gray-300 transition-colors">
                            Experience the rush of winning and withdraw your earnings <span class="text-blue-500 font-bold drop-shadow-[0_0_10px_rgba(59,130,246,0.3)]">instantly</span> to your account.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Final CTA -->
            <div class="mt-24 text-center">
                <a href="#auth-section" class="inline-flex items-center gap-3 bg-white text-black px-10 py-5 rounded-2xl text-xl font-black hover:scale-105 active:scale-95 transition-all shadow-[0_20px_40px_rgba(255,255,255,0.1)]">
                    GET STARTED NOW
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
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
