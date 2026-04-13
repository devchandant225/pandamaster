@extends('layouts.app')

@section('title', 'Premier Online Gaming Platform')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900">
    <!-- 1. H1 WITH BRAND + CORE VALUE + ABOVE-FOLD CTA SPLIT -->
    @if($heroSection && $heroSection->is_active)
        <x-hero-section :section="$heroSection" />
    @else
        <!-- Fallback Hero Section -->
        <section id="hero" class="relative overflow-hidden min-h-screen flex items-center justify-center bg-gray-950">
            <!-- Animated Background & Lighting -->
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
                <div class="absolute top-1/4 -left-20 w-[500px] h-[500px] bg-yellow-500/10 rounded-full blur-[120px] animate-pulse"></div>
                <div class="absolute bottom-1/4 -right-20 w-[600px] h-[600px] bg-purple-500/10 rounded-full blur-[120px] animate-pulse" style="animation-delay: 2s;"></div>
            </div>

            <div class="absolute inset-0 pointer-events-none">
                @for($i = 0; $i < 60; $i++)
                    <div class="absolute w-[1px] h-[1px] bg-white rounded-full animate-twinkle"
                         style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(3000, 6000) }}ms;"></div>
                @endfor
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
                <h1 class="text-6xl sm:text-7xl md:text-8xl lg:text-9xl font-black mb-8 leading-[0.9] animate-fade-in-up">
                    <span class="text-yellow-500 text-glow-yellow uppercase">Panda</span> <span class="text-white">Master</span>
                </h1>
                <p class="text-2xl md:text-3xl text-gray-300 mb-14 font-bold tracking-tight animate-fade-in-up" style="animation-delay: 0.2s;">
                    Your Premier Online Gaming Destination - Play 100+ Games & Win Big
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center animate-fade-in-up" style="animation-delay: 0.4s;">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="group relative px-14 py-6 bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 text-white text-2xl font-black rounded-2xl transition-all shadow-[0_0_30px_rgba(234,179,8,0.4)] hover:shadow-[0_0_50px_rgba(234,179,8,0.6)] transform hover:-translate-y-1.5 overflow-hidden animate-shine hover-glow">
                            <span class="relative z-10 uppercase tracking-tighter">🎰 PLAY NOW</span>
                        </a>
                    @else
                        <a href="{{ $adminSettings->register_url ?? '#' }}" class="group relative px-14 py-6 bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 text-white text-2xl font-black rounded-2xl transition-all shadow-[0_0_30px_rgba(234,179,8,0.4)] hover:shadow-[0_0_50px_rgba(234,179,8,0.6)] transform hover:-translate-y-1.5 overflow-hidden animate-shine hover-glow">
                            <span class="relative z-10 uppercase tracking-tighter">🎰 START PLAYING - GET $1000 BONUS</span>
                        </a>
                    @endauth
                    <a href="{{ route('games.index') }}" class="px-14 py-6 bg-gray-900/50 hover:bg-gray-800 text-white text-2xl font-black rounded-2xl transition-all border-2 border-gray-700 hover:border-yellow-500 shadow-xl backdrop-blur-sm transform hover:-translate-y-1.5">
                        BROWSE GAMES
                    </a>
                    @guest
                        <a href="{{ route('login') }}" class="px-14 py-6 bg-white/5 hover:bg-white/10 text-white text-2xl font-black rounded-2xl transition-all border-2 border-white/10 hover:border-purple-500 shadow-xl backdrop-blur-sm transform hover:-translate-y-1.5">
                            SIGN IN
                        </a>
                    @endguest
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 md:gap-12 pt-20 max-w-4xl mx-auto animate-fade-in-up" style="animation-delay: 0.6s;">
                    <div class="group relative p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-yellow-500/50 transition-colors">
                        <div class="text-4xl md:text-5xl font-black text-yellow-500 mb-2 group-hover:scale-110 transition-transform text-glow-yellow">100+</div>
                        <div class="text-xs md:text-sm text-gray-400 font-bold uppercase tracking-widest">Premium Games</div>
                    </div>
                    <div class="group relative p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-purple-500/50 transition-colors">
                        <div class="text-4xl md:text-5xl font-black text-purple-500 mb-2 group-hover:scale-110 transition-transform text-glow-purple">$2M+</div>
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

    <!-- About Section -->
    <x-about-section />

    <!-- 2. WHAT THE APP/GAME IS - Featured Games Section -->
    @if(isset($featuredGames) && $featuredGames->count() > 0)
    <section id="featured" class="py-20 md:py-32 relative overflow-hidden">
        <!-- Background Decor -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-yellow-500/5 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-purple-500/5 rounded-full blur-[120px] translate-y-1/2 -translate-x-1/2"></div>

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
                <a href="{{ route('games.index') }}" class="group relative inline-flex items-center gap-4 bg-gradient-to-r from-yellow-500 via-purple-500 to-purple-600 hover:from-yellow-400 hover:via-purple-400 hover:to-purple-500 text-white px-12 py-6 rounded-2xl text-xl font-black transition-all shadow-[0_0_30px_rgba(234,179,8,0.3)] hover:shadow-[0_0_50px_rgba(234,179,8,0.5)] transform hover:-translate-y-1 animate-shine overflow-hidden">
                    <span class="relative z-10 uppercase tracking-tighter">Explore All Games</span>
                    <svg class="w-6 h-6 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @endif



    <!-- 6. DOWNLOAD SECTION -->
    <x-download-section />

    <!-- Casino Experience Section -->
    <x-casino-experience :hotGames="$hotGames" :newGames="$newGames" />

    <!-- 7. MOBILE COMPATIBILITY -->
    <x-mobile-compatibility />

    <!-- 8. LOGIN/HELP ACCESS BLOCK -->
    <x-login-help-block />

    <!-- 9. FAQ SECTION -->
    <x-faq-section />
</div>
@endsection

