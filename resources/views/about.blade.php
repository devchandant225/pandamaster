@extends('layouts.app')

@push('meta')
    <x-meta-tags page="about" />
@endpush

@section('content')
<div class="min-h-screen bg-black relative overflow-hidden">
    <!-- Sophisticated Background Lighting -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="absolute top-1/4 -left-20 w-[600px] h-[600px] bg-yellow-500/5 rounded-full blur-[150px] animate-pulse"></div>
        <div class="absolute bottom-1/4 -right-20 w-[800px] h-[800px] bg-pink-500/5 rounded-full blur-[150px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <!-- Stars Animation -->
    <div class="absolute inset-0 pointer-events-none">
        @for($i = 0; $i < 40; $i++)
            <div class="absolute w-[1px] h-[1px] bg-white rounded-full animate-twinkle" 
                 style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(3000, 6000) }}ms;"></div>
        @endfor
    </div>

    <!-- Hero Section -->
    <section class="relative py-24 lg:py-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-3 px-6 py-2 bg-yellow-500/10 border border-yellow-500/30 rounded-full text-xs text-yellow-500 font-black uppercase tracking-[0.3em] mb-10 animate-fade-in-down shadow-lg shadow-yellow-500/5">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-yellow-500"></span>
                </span>
                The Galaxy of Gaming
            </div>

            <h1 class="text-6xl md:text-8xl lg:text-9xl font-black mb-10 leading-[0.85] tracking-tighter animate-fade-in-up">
                REDEFINING THE <span class="bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-600 bg-clip-text text-transparent text-glow-yellow uppercase">LEVEL</span> OF PLAY
            </h1>
            
            <p class="text-2xl md:text-3xl text-gray-400 mb-16 leading-relaxed font-bold tracking-tight max-w-4xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s;">
                We're not just another gaming platform. We're your gateway to immersive experiences, high-stakes thrills, and a community built for winners.
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ route('contact') }}" class="group relative px-14 py-6 bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-600 text-white text-2xl font-black rounded-[2rem] transition-all shadow-[0_0_30px_rgba(234,179,8,0.4)] hover:shadow-[0_0_50px_rgba(234,179,8,0.6)] transform hover:-translate-y-1.5 overflow-hidden animate-shine hover-glow">
                    <span class="relative z-10 uppercase tracking-tighter">🚀 JOIN THE ELITE</span>
                </a>
                <a href="{{ route('games.index') }}" class="px-14 py-6 bg-gray-900/50 hover:bg-gray-800 text-white text-2xl font-black rounded-[2rem] transition-all border-2 border-gray-700 hover:border-yellow-500 shadow-xl backdrop-blur-sm transform hover:-translate-y-1.5 uppercase tracking-tighter">
                    Explore Games
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group relative p-10 rounded-[2.5rem] bg-white/5 border border-white/10 hover:border-yellow-500/50 transition-all text-center">
                    <div class="text-5xl md:text-6xl font-black text-yellow-500 mb-3 group-hover:scale-110 transition-transform text-glow-yellow tracking-tighter">$2M+</div>
                    <div class="text-gray-500 font-black uppercase tracking-widest text-[10px]">Weekly Payouts</div>
                </div>
                <div class="group relative p-10 rounded-[2.5rem] bg-white/5 border border-white/10 hover:border-pink-500/50 transition-all text-center">
                    <div class="text-5xl md:text-6xl font-black text-pink-500 mb-3 group-hover:scale-110 transition-transform text-glow-pink tracking-tighter">50K+</div>
                    <div class="text-gray-500 font-black uppercase tracking-widest text-[10px]">Active Players</div>
                </div>
                <div class="group relative p-10 rounded-[2.5rem] bg-white/5 border border-white/10 hover:border-blue-500/50 transition-all text-center">
                    <div class="text-5xl md:text-6xl font-black text-blue-500 mb-3 group-hover:scale-110 transition-transform tracking-tighter">100+</div>
                    <div class="text-gray-500 font-black uppercase tracking-widest text-[10px]">Premium Titles</div>
                </div>
                <div class="group relative p-10 rounded-[2.5rem] bg-white/5 border border-white/10 hover:border-green-500/50 transition-all text-center">
                    <div class="text-5xl md:text-6xl font-black text-green-500 mb-3 group-hover:scale-110 transition-transform tracking-tighter">24/7</div>
                    <div class="text-gray-500 font-black uppercase tracking-widest text-[10px]">Live Support</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <div class="animate-fade-in-up">
                    <h2 class="text-5xl md:text-6xl font-black mb-8 tracking-tighter uppercase">
                        OUR <span class="bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent">GALAXY</span>
                    </h2>
                    <div class="space-y-6 text-gray-400 leading-relaxed text-xl font-medium">
                        <p>
                            Born in the digital age, <span class="text-white font-black tracking-widest uppercase">OrionStar</span> was created with one mission: to build the most immersive, rewarding, and fair online gaming ecosystem in the world.
                        </p>
                        <p>
                            We've combined cutting-edge blockchain technology with world-class game design to deliver an experience that traditional platforms simply can't match. Every spin, every catch, and every bet is built on a foundation of transparency and high-octane fun.
                        </p>
                        <p>
                            Today, we're proud to lead the frontier of global online gaming, connecting thousands of winners every minute across every timezone.
                        </p>
                    </div>
                    <div class="mt-12">
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 bg-white/5 border border-white/10 hover:border-pink-500 text-white px-10 py-5 rounded-[2rem] text-lg font-black transition-all uppercase tracking-tighter">
                            Learn Our Methods
                            <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>

                <div class="relative group animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="absolute -inset-4 bg-gradient-to-r from-yellow-500 via-pink-500 to-purple-600 rounded-[3.5rem] opacity-20 blur-2xl group-hover:opacity-40 transition-opacity duration-700"></div>
                    <img
                        src="https://images.unsplash.com/photo-1511512578047-dfb367046420?w=1200"
                        alt="Pro Gaming Setup"
                        class="relative rounded-[3rem] shadow-2xl border border-white/10 grayscale-[0.2] group-hover:grayscale-0 transition-all duration-700"
                    />
                    <div class="absolute -bottom-10 -left-10 bg-black/80 backdrop-blur-xl border border-white/10 p-10 rounded-[2.5rem] shadow-2xl group-hover:-translate-y-2 transition-transform duration-500">
                        <div class="text-5xl font-black text-yellow-500 mb-1 tracking-tighter text-glow-yellow">#1</div>
                        <div class="text-xs font-black text-gray-400 uppercase tracking-widest">Global Platform</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-5xl md:text-6xl font-black mb-6 tracking-tighter uppercase">
                    OUR CORE <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">CODE</span>
                </h2>
                <p class="text-xl text-gray-500 font-bold max-w-3xl mx-auto uppercase tracking-widest">
                    The principles that fuel our galaxy
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">
                <!-- Winner-First -->
                <div class="bg-gray-900/50 border border-white/5 p-10 rounded-[3rem] hover:border-yellow-500/30 hover:-translate-y-3 transition-all duration-500 group">
                    <div class="w-20 h-20 bg-yellow-500/10 text-yellow-500 rounded-[1.5rem] flex items-center justify-center mb-8 group-hover:rotate-12 transition-transform">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-white mb-4 uppercase tracking-tighter">WINNER FIRST</h3>
                    <p class="text-gray-500 leading-relaxed font-medium">Your success is our success. We build every algorithm to maximize player enjoyment and rewards.</p>
                </div>

                <!-- Security -->
                <div class="bg-gray-900/50 border border-white/5 p-10 rounded-[3rem] hover:border-pink-500/30 hover:-translate-y-3 transition-all duration-500 group">
                    <div class="w-20 h-20 bg-pink-500/10 text-pink-500 rounded-[1.5rem] flex items-center justify-center mb-8 group-hover:-rotate-12 transition-transform">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-white mb-4 uppercase tracking-tighter">IRONCLAD</h3>
                    <p class="text-gray-500 leading-relaxed font-medium">Your data and winnings are protected by the highest level of encryption known to mankind.</p>
                </div>

                <!-- Innovation -->
                <div class="bg-gray-900/50 border border-white/5 p-10 rounded-[3rem] hover:border-blue-500/30 hover:-translate-y-3 transition-all duration-500 group">
                    <div class="w-20 h-20 bg-blue-500/10 text-blue-500 rounded-[1.5rem] flex items-center justify-center mb-8 group-hover:rotate-12 transition-transform">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-white mb-4 uppercase tracking-tighter">NEXT-GEN</h3>
                    <p class="text-gray-500 leading-relaxed font-medium">We don't follow trends; we set them. Expect titles and features you won't find anywhere else.</p>
                </div>

                <!-- Community -->
                <div class="bg-gray-900/50 border border-white/5 p-10 rounded-[3rem] hover:border-green-500/30 hover:-translate-y-3 transition-all duration-500 group">
                    <div class="w-20 h-20 bg-green-500/10 text-green-500 rounded-[1.5rem] flex items-center justify-center mb-8 group-hover:-rotate-12 transition-transform">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-white mb-4 uppercase tracking-tighter">ONE GALAXY</h3>
                    <p class="text-gray-500 leading-relaxed font-medium">We're building a global community of gamers who support each other's journey to the top.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Team -->
    <x-team-section />

    <!-- Final CTA -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(234,179,8,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-6xl sm:text-7xl md:text-8xl font-black mb-8 leading-[0.85] tracking-tighter uppercase">
                READY TO BECOME A <span class="bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-600 bg-clip-text text-transparent text-glow-yellow">LEGEND?</span>
            </h2>
            <p class="text-2xl md:text-3xl text-gray-300 mb-16 font-bold tracking-tight uppercase">
                The next massive jackpot has your name on it
            </p>

            <div class="flex flex-wrap justify-center gap-10">
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
        </div>
    </section>
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

    @keyframes fade-in-down {
        0% { opacity: 0; transform: translateY(-40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .animate-twinkle {
        animation: twinkle 4s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .animate-fade-in-down {
        animation: fade-in-down 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }
</style>
@endsection
