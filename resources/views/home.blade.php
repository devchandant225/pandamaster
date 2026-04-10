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
                    <span class="text-yellow-500 text-glow-yellow">ORIONSTAR</span> <span class="text-purple-500 text-glow-purple">GAMING</span>
                </h1>
                <p class="text-2xl md:text-3xl text-gray-300 mb-14 font-bold tracking-tight animate-fade-in-up" style="animation-delay: 0.2s;">
                    Your Premier Online Gaming Destination - Play 100+ Games & Win Big
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center animate-fade-in-up" style="animation-delay: 0.4s;">
                    @auth
                        <a href="{{ route('dashboard') }}" class="group relative px-14 py-6 bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 text-white text-2xl font-black rounded-2xl transition-all shadow-[0_0_30px_rgba(234,179,8,0.4)] hover:shadow-[0_0_50px_rgba(234,179,8,0.6)] transform hover:-translate-y-1.5 overflow-hidden animate-shine hover-glow">
                            <span class="relative z-10 uppercase tracking-tighter">🎰 PLAY NOW</span>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="group relative px-14 py-6 bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 text-white text-2xl font-black rounded-2xl transition-all shadow-[0_0_30px_rgba(234,179,8,0.4)] hover:shadow-[0_0_50px_rgba(234,179,8,0.6)] transform hover:-translate-y-1.5 overflow-hidden animate-shine hover-glow">
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

    <!-- 3. CASINO/GAME CATEGORIES - Destiny Awaits Section -->
    <section id="categories" class="py-24 md:py-40 relative overflow-hidden bg-gray-950">
        <!-- Animated Background Effects -->
        <div class="absolute inset-0">
            <!-- Gradient Mesh -->
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(168,85,247,0.12)_0%,rgba(0,0,0,0.9)_70%)]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(234,179,8,0.08)_0%,transparent_50%)]"></div>
            
            <!-- Floating Casino Particles -->
            <div class="absolute inset-0 pointer-events-none overflow-hidden">
                @for($i = 0; $i < 20; $i++)
                    <div class="absolute text-4xl opacity-10 animate-float-casino"
                         style="top: {{ rand(10, 90) }}%; left: {{ rand(5, 95) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(6000, 12000) }}ms;">
                        @php $icons = ['🎰', '💎', '7️⃣', '🎲', '🃏', '👑', '⭐', '🔥']; @endphp
                        {{ $icons[array_rand($icons)] }}
                    </div>
                @endfor
            </div>

            <!-- Rotating Neon Rings -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[140%] h-[140%] animate-rotate-very-slow opacity-15 pointer-events-none">
                <div class="absolute inset-0 bg-[conic-gradient(from_0deg,transparent_0deg,rgba(234,179,8,0.4)_15deg,transparent_30deg,rgba(168,85,247,0.4)_45deg,transparent_60deg)]"></div>
            </div>

            <!-- Neon Glow Lines -->
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-yellow-500/30 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-purple-500/30 to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header - Slot Machine Style -->
            <div class="text-center mb-20 space-y-8">
                <!-- Animated Badge -->
                <div class="inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-yellow-500/10 to-purple-500/10 backdrop-blur-md border border-yellow-500/30 rounded-full shadow-[0_0_30px_rgba(234,179,8,0.2)] animate-pulse-slow">
                    <span class="w-3 h-3 bg-yellow-500 rounded-full animate-ping"></span>
                    <span class="text-sm font-black uppercase tracking-[0.3em] text-transparent bg-gradient-to-r from-yellow-400 to-yellow-600 bg-clip-text">🎰 Choose Your Arena</span>
                </div>

                <!-- Slot Machine Title -->
                <div class="relative inline-block">
                    <!-- Glow Behind Title -->
                    <div class="absolute -inset-4 bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 opacity-30 blur-2xl rounded-full animate-pulse"></div>
                    
                    <h2 class="relative text-6xl md:text-9xl font-black tracking-tighter leading-[0.85]">
                        <span class="inline-block animate-bounce-slow" style="animation-delay: 0ms;">🎰</span>
                        <span class="inline-block animate-bounce-slow" style="animation-delay: 150ms;">💎</span>
                        <span class="inline-block animate-bounce-slow" style="animation-delay: 300ms;">7️⃣</span>
                        <br>
                        <span class="bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-500 bg-clip-text text-transparent text-glow-yellow filter drop-shadow-[0_0_30px_rgba(234,179,8,0.6)]">DESTINY</span>
                        <br>
                        <span class="bg-gradient-to-r from-purple-400 via-purple-500 to-purple-600 bg-clip-text text-transparent text-glow-purple filter drop-shadow-[0_0_30px_rgba(168,85,247,0.6)] text-[0.5em] md:text-[0.35em] tracking-widest">AWAITS YOU</span>
                    </h2>
                </div>

                <p class="text-xl md:text-2xl text-gray-400 max-w-3xl mx-auto font-medium leading-relaxed">
                    Step into our legendary collection of <span class="text-yellow-500 font-bold">high-stakes arenas</span> where fortune favors the bold and champions are crowned
                </p>

                <!-- Decorative Divider -->
                <div class="flex items-center justify-center gap-4 pt-4">
                    <div class="w-24 h-1 bg-gradient-to-r from-transparent to-yellow-500 rounded-full shadow-[0_0_10px_rgba(234,179,8,0.8)]"></div>
                    <div class="text-3xl animate-spin-slow">⭐</div>
                    <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-transparent rounded-full shadow-[0_0_10px_rgba(168,85,247,0.8)]"></div>
                </div>
            </div>

            <!-- Game Category Cards - Slot Machine Style -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 md:gap-8">
                @php
                    $categories = [
                        ['type' => 'slots', 'emoji' => '🎰', 'label' => 'Slots', 'games' => '100+', 'color' => 'from-yellow-400 via-orange-500 to-yellow-600', 'glow' => 'rgba(234,179,8,0.6)', 'bg' => 'bg-yellow-500/10', 'border' => 'border-yellow-500/30', 'shadow' => 'shadow-[0_0_40px_rgba(234,179,8,0.3)]'],
                        ['type' => 'fish', 'emoji' => '🐟', 'label' => 'Fish Hunter', 'games' => '50+', 'color' => 'from-blue-400 via-cyan-500 to-blue-600', 'glow' => 'rgba(59,130,246,0.6)', 'bg' => 'bg-blue-500/10', 'border' => 'border-blue-500/30', 'shadow' => 'shadow-[0_0_40px_rgba(59,130,246,0.3)]'],
                        ['type' => 'keno', 'emoji' => '🎲', 'label' => 'Keno', 'games' => '25+', 'color' => 'from-purple-400 via-purple-500 to-purple-600', 'glow' => 'rgba(168,85,247,0.6)', 'bg' => 'bg-purple-500/10', 'border' => 'border-purple-500/30', 'shadow' => 'shadow-[0_0_40px_rgba(168,85,247,0.3)]'],
                        ['type' => 'table', 'emoji' => '🎯', 'label' => 'Table Games', 'games' => '30+', 'color' => 'from-green-400 via-emerald-500 to-green-600', 'glow' => 'rgba(16,185,129,0.6)', 'bg' => 'bg-green-500/10', 'border' => 'border-green-500/30', 'shadow' => 'shadow-[0_0_40px_rgba(16,185,129,0.3)]'],
                        ['type' => 'card', 'emoji' => '🃏', 'label' => 'Card Games', 'games' => '20+', 'color' => 'from-purple-400 via-indigo-500 to-purple-600', 'glow' => 'rgba(139,92,246,0.6)', 'bg' => 'bg-indigo-500/10', 'border' => 'border-indigo-500/30', 'shadow' => 'shadow-[0_0_40px_rgba(139,92,246,0.3)]'],
                    ];
                @endphp

                @foreach($categories as $index => $cat)
                <a href="{{ route('games.index', ['type' => $cat['type']]) }}"
                   class="group relative animate-fade-in-up"
                   style="animation-delay: {{ $index * 100 }}ms;">
                    
                    <!-- Outer Glow Ring -->
                    <div class="absolute -inset-1 bg-gradient-to-r {{ $cat['color'] }} rounded-[2.5rem] opacity-0 group-hover:opacity-100 transition-all duration-700 blur-md group-hover:blur-lg"></div>
                    
                    <!-- Card Container -->
                    <div class="relative h-full bg-gray-900/90 backdrop-blur-xl rounded-[2.3rem] border-2 {{ $cat['border'] }} overflow-hidden transition-all duration-700 group-hover:{{ $cat['shadow'] }} group-hover:scale-105 group-hover:-translate-y-2">
                        
                        <!-- Animated Background Gradient -->
                        <div class="absolute inset-0 {{ $cat['bg'] }} opacity-50 group-hover:opacity-100 transition-opacity duration-700"></div>
                        
                        <!-- Rotating Border Effect -->
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-rotate-border">
                            <div class="absolute inset-0 bg-gradient-to-r {{ $cat['color'] }} rounded-[2.3rem] blur-sm"></div>
                        </div>

                        <!-- Card Content -->
                        <div class="relative z-10 p-8 md:p-10 flex flex-col items-center justify-center min-h-[320px]">
                            
                            <!-- Floating Neon Emoji with Glow -->
                            <div class="relative mb-8">
                                <!-- Emoji Glow Background -->
                                <div class="absolute inset-0 text-8xl blur-2xl opacity-0 group-hover:opacity-60 transition-opacity duration-700 drop-shadow-[0_0_40px_{{ $cat['glow'] }}]">
                                    {{ $cat['emoji'] }}
                                </div>
                                
                                <!-- Main Emoji -->
                                <div class="text-8xl md:text-9xl transition-all duration-700 transform group-hover:scale-125 group-hover:rotate-12 drop-shadow-[0_0_20px_{{ $cat['glow'] }}] animate-float-slow">
                                    {{ $cat['emoji'] }}
                                </div>
                                
                                <!-- Sparkle Effect -->
                                <div class="absolute -top-2 -right-2 text-2xl opacity-0 group-hover:opacity-100 transition-all duration-500 animate-bounce-slow">
                                    ✨
                                </div>
                            </div>

                            <!-- Category Label -->
                            <h3 class="text-2xl md:text-3xl font-black text-white uppercase tracking-tighter mb-3 group-hover:bg-gradient-to-r group-hover:{{ $cat['color'] }} group-hover:bg-clip-text group-hover:text-transparent transition-all duration-500 text-center">
                                {{ $cat['label'] }}
                            </h3>

                            <!-- Game Count Badge -->
                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/5 backdrop-blur-sm rounded-full border border-white/10 group-hover:{{ $cat['border'] }} transition-all duration-500">
                                <span class="text-xs font-black text-gray-400 group-hover:text-white uppercase tracking-wider">Games</span>
                                <span class="text-sm font-black text-transparent bg-gradient-to-r {{ $cat['color'] }} bg-clip-text">{{ $cat['games'] }}</span>
                            </div>

                            <!-- Animated Progress Bar -->
                            <div class="w-full h-1 bg-white/10 rounded-full mt-6 overflow-hidden">
                                <div class="h-full bg-gradient-to-r {{ $cat['color'] }} rounded-full w-0 group-hover:w-full transition-all duration-1000 ease-out shadow-[0_0_10px_{{ $cat['glow'] }}]"></div>
                            </div>

                            <!-- Hover Arrow -->
                            <div class="mt-4 flex items-center gap-2 text-white opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">
                                <span class="text-xs font-black uppercase tracking-widest">Play Now</span>
                                <svg class="w-4 h-4 animate-bounce-x" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Corner Decorations -->
                        <div class="absolute top-4 left-4 w-8 h-8 border-t-2 border-l-2 {{ $cat['border'] }} rounded-tl-lg opacity-50 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute top-4 right-4 w-8 h-8 border-t-2 border-r-2 {{ $cat['border'] }} rounded-tr-lg opacity-50 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute bottom-4 left-4 w-8 h-8 border-b-2 border-l-2 {{ $cat['border'] }} rounded-bl-lg opacity-50 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute bottom-4 right-4 w-8 h-8 border-b-2 border-r-2 {{ $cat['border'] }} rounded-br-lg opacity-50 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                </a>
                @endforeach
            </div>

            <!-- Bottom CTA -->
            <div class="mt-16 text-center">
                <a href="{{ route('games.index') }}" class="group relative inline-flex items-center justify-center gap-4 bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 hover:from-yellow-500 hover:via-purple-600 hover:to-purple-700 text-white px-12 py-6 rounded-2xl text-xl font-black transition-all shadow-[0_0_40px_rgba(234,179,8,0.4)] hover:shadow-[0_0_60px_rgba(168,85,247,0.6)] transform hover:-translate-y-1 animate-shine overflow-hidden">
                    <span class="relative z-10 uppercase tracking-tighter">🎮 Explore All Games</span>
                    <svg class="w-6 h-6 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- 4. PLAY ONLINE SECTION - Hot Games -->
    @if(isset($hotGames) && $hotGames->count() > 0)
    <section id="play-online" class="py-20 md:py-32 relative overflow-hidden bg-gray-950">
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

    <!-- 5. NEW GAMES - Player Play/Login -->
    @if(isset($newGames) && $newGames->count() > 0)
    <section id="new-games" class="py-24 md:py-32 relative overflow-hidden bg-gray-950">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-emerald-500/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-teal-500/10 rounded-full blur-[120px] animate-pulse" style="animation-delay: 1s;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div class="space-y-4">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-emerald-500/10 border border-emerald-500/20 rounded-full">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-ping"></span>
                        <span class="text-xs font-black text-emerald-500 uppercase tracking-widest">Live Updates</span>
                    </div>
                    <h2 class="text-5xl md:text-7xl font-black tracking-tighter text-white uppercase">
                        Fresh <span class="bg-gradient-to-r from-emerald-400 to-teal-500 bg-clip-text text-transparent">Arrivals</span>
                    </h2>
                </div>
                <p class="text-xl text-gray-400 max-w-md font-medium leading-tight">
                    Be the first to conquer our latest legendary additions
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($newGames as $game)
                    <div class="hover-border-glow transition-all duration-500 rounded-[2rem]">
                        <x-game-card :game="$game" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- 6. DOWNLOAD SECTION -->
    <x-download-section />

    <!-- 7. MOBILE COMPATIBILITY -->
    <x-mobile-compatibility />

    <!-- 8. LOGIN/HELP ACCESS BLOCK -->
    <x-login-help-block />

    <!-- 9. FAQ SECTION -->
    <x-faq-section />
</div>
@endsection

