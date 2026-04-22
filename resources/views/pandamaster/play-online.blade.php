@extends('layouts.app')

@section('title', 'Play Orion Stars Online - No Download Web Version')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-gray-950">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(34,197,94,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-8 leading-tight animate-fade-in-up uppercase tracking-tighter">
                Play Orion Stars Online without Downloading
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-12 max-w-4xl mx-auto font-medium leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                Want to play orion stars online without downloading anything? You're in the right place. Orion Stars has a full browser-based version that lets you play fish games, slots, and sweepstakes games directly from your phone, tablet, or computer.
            </p>
            <div class="animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ route('login') }}" class="inline-block px-14 py-6 bg-green-500 text-black text-2xl font-black rounded-2xl hover:bg-green-400 transition-all transform hover:-translate-y-1.5 shadow-[0_0_50px_rgba(34,197,94,0.4)] uppercase tracking-tighter">
                    Play Now in Browser →
                </a>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 py-24 space-y-24">
        <!-- What is the Web Version? -->
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">What is the Orion Stars Web Version?</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>The Orion Stars web version is a browser-based platform that gives you access to the same game library as the mobile app. When you play orion stars online, you're getting the exact same fish games, the same slot machines, and the same sweepstakes games, just through your browser.</p>
                    <p>This is ideal for players who don't want to install anything, players who are on a shared device, or anyone who wants to get into a game quickly without going through a full app download. The orion stars online game experience in the browser is smooth, fast, and fully responsive.</p>
                </div>
            </div>
            <div class="bg-gray-900 border border-white/5 p-12 rounded-[3rem] text-center">
                <div class="text-[150px]">🌐</div>
                <div class="mt-6 flex justify-center gap-4">
                    <span class="px-4 py-1 bg-green-500/10 text-green-500 border border-green-500/20 rounded-full text-xs font-black uppercase">Instant Play</span>
                    <span class="px-4 py-1 bg-green-500/10 text-green-500 border border-green-500/20 rounded-full text-xs font-black uppercase">No Download</span>
                </div>
            </div>
        </div>

        <!-- How to Play Section -->
        <div class="bg-gray-900 border border-white/5 rounded-[3rem] p-12 lg:p-16">
            <h2 class="text-4xl font-black mb-12 text-center uppercase tracking-tighter">How to Play Orion Stars Online</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <div class="text-2xl font-black text-green-500">01</div>
                    <p class="text-gray-400 font-bold uppercase tracking-widest text-sm">Visit Web Portal</p>
                    <p class="text-gray-500 text-sm">Click the button on this page to access the portal.</p>
                </div>
                <div class="space-y-4">
                    <div class="text-2xl font-black text-green-500">02</div>
                    <p class="text-gray-400 font-bold uppercase tracking-widest text-sm">Enter Credentials</p>
                    <p class="text-gray-500 text-sm">Log in with your existing username and password.</p>
                </div>
                <div class="space-y-4">
                    <div class="text-2xl font-black text-green-500">03</div>
                    <p class="text-gray-400 font-bold uppercase tracking-widest text-sm">Pick a Game</p>
                    <p class="text-gray-500 text-sm">Browse the lobby for fish games or slots.</p>
                </div>
                <div class="space-y-4">
                    <div class="text-2xl font-black text-green-500">04</div>
                    <p class="text-gray-400 font-bold uppercase tracking-widest text-sm">Start Winning</p>
                    <p class="text-gray-500 text-sm">The game loads in seconds. Enjoy!</p>
                </div>
            </div>
        </div>

        <!-- Android & iPhone Section -->
        <div class="grid lg:grid-cols-2 gap-12">
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h3 class="text-2xl font-black mb-6 uppercase tracking-tighter text-green-500">Android No Download</h3>
                <p class="text-gray-400 leading-relaxed">You can play orion stars on android using just your mobile browser. Open Chrome, navigate to the web portal, and play. The controls are touch-friendly and the games run without any lag on most phones.</p>
            </div>
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h3 class="text-2xl font-black mb-6 uppercase tracking-tighter text-green-500">iPhone Safari & Chrome</h3>
                <p class="text-gray-400 leading-relaxed">iPhone users can play orion stars on iPhone through Safari or Chrome. The layout adjusts automatically so everything is easy to tap and navigate on a smaller screen.</p>
            </div>
        </div>

        <!-- Games Online Section -->
        <div class="py-24">
            <h2 class="text-4xl font-black mb-16 text-center uppercase tracking-tighter">What Games Can I Play Online?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-900 p-8 rounded-3xl border border-white/5 text-center group">
                    <div class="text-5xl mb-6 group-hover:scale-110 transition-transform">🐟</div>
                    <h4 class="text-xl font-black mb-4 uppercase">Fish Games</h4>
                    <p class="text-gray-400 text-sm">Multiplayer shooting games where you earn points by taking down fish. Fast and competitive.</p>
                </div>
                <div class="bg-gray-900 p-8 rounded-3xl border border-white/5 text-center group">
                    <div class="text-5xl mb-6 group-hover:scale-110 transition-transform">🎰</div>
                    <h4 class="text-xl font-black mb-4 uppercase">Slots</h4>
                    <p class="text-gray-400 text-sm">Classic and video slot machines with real money rewards. Spin the reels and hit the jackpot.</p>
                </div>
                <div class="bg-gray-900 p-8 rounded-3xl border border-white/5 text-center group">
                    <div class="text-5xl mb-6 group-hover:scale-110 transition-transform">🏆</div>
                    <h4 class="text-xl font-black mb-4 uppercase">Sweepstakes</h4>
                    <p class="text-gray-400 text-sm">Play for free credits and redeem winnings. Legal and popular across the US.</p>
                </div>
            </div>
        </div>

        <!-- Comparison Section -->
        <div class="bg-gradient-to-r from-green-900/20 to-gray-900 p-12 rounded-[3rem] border border-green-500/20">
            <h2 class="text-3xl font-black mb-8 uppercase tracking-tighter">Browser Play vs Downloading App</h2>
            <div class="grid md:grid-cols-2 gap-12 text-gray-400">
                <ul class="space-y-4">
                    <li class="font-black text-white uppercase text-sm mb-4 tracking-widest text-green-500">Orion Stars Web Access</li>
                    <li class="flex gap-4"><span>✓</span> <span>No download needed</span></li>
                    <li class="flex gap-4"><span>✓</span> <span>Works on any device</span></li>
                    <li class="flex gap-4"><span>✓</span> <span>Great for shared devices</span></li>
                </ul>
                <ul class="space-y-4">
                    <li class="font-black text-white uppercase text-sm mb-4 tracking-widest text-purple-500">App Download</li>
                    <li class="flex gap-4"><span>✓</span> <span>Slightly faster load times</span></li>
                    <li class="flex gap-4"><span>✓</span> <span>Better on slow internet</span></li>
                    <li class="flex gap-4"><span>✓</span> <span>One-tap access</span></li>
                </ul>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="py-24 border-t border-white/5">
            <h2 class="text-4xl font-black mb-16 text-center uppercase tracking-tighter">Frequently Asked Questions</h2>
            <div class="max-w-4xl mx-auto space-y-6" x-data="{ active: null }">
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 1 ? null : 1" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Can I play without downloading?</span>
                        <span class="text-green-500 text-2xl" x-text="active === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 1" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. Play orion stars online no download by visiting the web version in your browser. Log in and the lobby opens immediately.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 2 ? null : 2" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Does it work on Android?</span>
                        <span class="text-green-500 text-2xl" x-text="active === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 2" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. You can play orion stars on android through any standard browser like Chrome or Firefox.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 3 ? null : 3" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is the online version the same as the app?</span>
                        <span class="text-green-500 text-2xl" x-text="active === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 3" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. Both versions give you access to the same games, the same account, and the same bonuses.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { opacity: 0; animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
</style>
@endsection
