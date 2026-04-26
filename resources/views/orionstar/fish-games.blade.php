@extends('layouts.app')

@section('title', 'Orion Stars Fish Games — Play Fish Shooting Games Online')

@section('content')
<div class="min-h-screen bg-black relative overflow-hidden font-sans">
    <!-- Animated Gaming Background -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <!-- Orion Stars Blue/Purple Themed Glows -->
        <div class="absolute top-0 -left-20 w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-0 -right-20 w-[800px] h-[800px] bg-purple-600/10 rounded-full blur-[150px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 py-20 lg:py-32">
        <!-- Hero Section -->
        <div class="text-center mb-24">
            <h1 class="text-5xl md:text-8xl font-black mb-6 tracking-tighter italic uppercase text-glow-blue">
                Orion Stars <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-600">Fish Games</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 font-bold max-w-3xl mx-auto leading-relaxed">
                Experience skill-based shooting games with real rewards. Fast action, competitive rooms, and genuine cash prizes await you!
            </p>
            
            <div class="flex flex-wrap justify-center gap-6 mt-12">
                <a href="{{ route('orionstar.play-online') }}" class="px-10 py-5 bg-blue-600 text-white font-black rounded-2xl hover:bg-blue-500 transition-all transform hover:-translate-y-1 shadow-[0_0_30px_rgba(37,99,235,0.4)] uppercase italic">Play Online</a>
                <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="px-10 py-5 bg-white/10 text-white font-black rounded-2xl hover:bg-white/20 transition-all border border-white/20 uppercase italic">Contact to Play</a>
                <a href="{{ route('orionstar.download') }}" class="px-10 py-5 bg-purple-600 text-white font-black rounded-2xl hover:bg-purple-500 transition-all transform hover:-translate-y-1 shadow-[0_0_147,51,234,0.4)] uppercase italic">Download App</a>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 space-y-16">
                <!-- Intro Section -->
                <section class="prose prose-invert prose-2xl max-w-none">
                    <h2 class="text-4xl font-black text-white italic uppercase tracking-tight flex items-center gap-4">
                        <span class="w-12 h-1 bg-blue-500 rounded-full"></span>
                        What Are Orion Stars Fish Games?
                    </h2>
                    <p class="text-gray-400 leading-relaxed font-medium">
                        Orion Stars fish games are skill-based shooting games where you aim and fire at fish of different sizes swimming across your screen. Every fish you hit earns you points, and those points convert into real cash rewards. The bigger the fish, the bigger the payout. Some fish also carry special bonuses and multipliers that can significantly boost your winnings in a single shot.
                    </p>
                    <p class="text-gray-400 leading-relaxed font-medium mt-4">
                        These are not purely luck-based games. The more you play orion stars fish games online, the better your aim gets and the more efficiently you use your credits. That is a big part of why players keep coming back to the fish games category above everything else on the platform.
                    </p>
                </section>

                <!-- How to Play Section -->
                <section class="bg-gray-900/40 border-2 border-blue-500/20 p-10 rounded-[3rem] backdrop-blur-md">
                    <h2 class="text-4xl font-black text-white italic uppercase tracking-tight mb-8">How to Play & Win</h2>
                    <div class="space-y-6">
                        @php
                            $steps = [
                                "Open the Orion Stars app or the browser version and log in to your account.",
                                "Go to the fish games section in your game lobby.",
                                "Choose your room. Rooms have different bet sizes so pick one that suits your credit balance.",
                                "Select your weapon. Stronger weapons cost more per shot but take down bigger fish faster.",
                                "Aim at the fish on screen and tap or click to fire. Target larger fish and boss characters for the biggest rewards.",
                                "Your winnings are credited to your account automatically as you play."
                            ];
                        @endphp
                        @foreach($steps as $index => $step)
                            <div class="flex gap-6 items-start group">
                                <span class="flex-shrink-0 w-12 h-12 bg-blue-500/20 border border-blue-500/40 rounded-xl flex items-center justify-center text-blue-500 font-black text-xl italic group-hover:bg-blue-500 group-hover:text-black transition-all">
                                    {{ $index + 1 }}
                                </span>
                                <p class="text-gray-300 font-bold text-lg pt-2">{{ $step }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>

                <!-- Compatibility & Access -->
                <section class="grid md:grid-cols-2 gap-8">
                    <div class="bg-blue-600/10 border border-blue-600/20 p-8 rounded-3xl">
                        <h3 class="text-2xl font-black text-white italic mb-4 uppercase">Web & Mobile</h3>
                        <p class="text-gray-400 text-sm font-medium leading-relaxed">
                            Orion Stars fish games are fully compatible with Android, iPhone, iPad, Windows PC, and any device with a modern browser. Play directly in your browser without downloading anything.
                        </p>
                    </div>
                    <div class="bg-purple-600/10 border border-purple-600/20 p-8 rounded-3xl">
                        <h3 class="text-2xl font-black text-white italic mb-4 uppercase">Login & Access</h3>
                        <p class="text-gray-400 text-sm font-medium leading-relaxed">
                            New players can get an account by connecting with our trusted distributor on Facebook. Your login works across the app, the browser, and all game categories.
                        </p>
                    </div>
                </section>
            </div>

            <!-- Sidebar / Quick Actions -->
            <div class="space-y-8">
                <!-- Why Play Card -->
                <div class="bg-gradient-to-br from-gray-900 to-black border-2 border-white/5 p-8 rounded-[2.5rem] shadow-2xl sticky top-24">
                    <h3 class="text-2xl font-black text-white italic mb-6 uppercase tracking-tighter">Why Players Love It</h3>
                    <ul class="space-y-4">
                        @foreach(["Skill-based gameplay", "Multiplayer rooms", "Boss fish payouts", "Mobile & Browser", "Works on Android, iPhone, & PC"] as $feature)
                            <li class="flex items-center gap-3 text-gray-400 font-bold uppercase text-xs italic">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                    
                    <div class="mt-8 p-6 bg-blue-600 rounded-2xl text-center">
                        <p class="text-white font-black text-xl italic mb-4">READY TO HUNT?</p>
                        <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="block w-full py-4 bg-black text-white font-black rounded-xl uppercase tracking-widest hover:bg-gray-800 transition-colors">LOGIN NOW</a>
                    </div>
                </div>

                <!-- Related Categories -->
                <div class="bg-gray-900/50 p-8 rounded-[2.5rem] border border-white/5">
                    <h3 class="text-xl font-black text-white italic mb-6 uppercase">Other Games</h3>
                    <div class="space-y-4">
                        <a href="{{ route('orionstar.slot-games') }}" class="block p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-colors font-bold text-gray-400 hover:text-white uppercase italic text-sm">Slot Games</a>
                        <a href="{{ route('orionstar.table-games') }}" class="block p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-colors font-bold text-gray-400 hover:text-white uppercase italic text-sm">Table Games</a>
                        <a href="{{ route('orionstar.keno') }}" class="block p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-colors font-bold text-gray-400 hover:text-white uppercase italic text-sm">Keno Games</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="mt-32">
            <h2 class="text-4xl md:text-6xl font-black text-white italic uppercase tracking-tighter text-center mb-16">Frequently Asked <span class="text-blue-500">Intel</span></h2>
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10">
                    <h4 class="text-white font-black mb-3 uppercase italic">What are Orion Stars fish games?</h4>
                    <p class="text-gray-400 text-sm font-medium">Orion Stars fish games are skill-based shooting games where you fire at fish on screen to earn points and real cash rewards. They are the most popular game category on the platform.</p>
                </div>
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10">
                    <h4 class="text-white font-black mb-3 uppercase italic">Can I play on my phone?</h4>
                    <p class="text-gray-400 text-sm font-medium">Yes. Orion Stars fish games are available on Android and iPhone through the app and through the browser. For app installation, connect with our distributor on Facebook.</p>
                </div>
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10">
                    <h4 class="text-white font-black mb-3 uppercase italic">Are they free to play?</h4>
                    <p class="text-gray-400 text-sm font-medium">New players receive welcome bonuses and free credits when their account is created through our distributor. These can be used to play without spending anything upfront.</p>
                </div>
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10">
                    <h4 class="text-white font-black mb-3 uppercase italic">What is a fish table game?</h4>
                    <p class="text-gray-400 text-sm font-medium">An Orion Stars fish table game is the version designed to look and feel like a physical arcade machine. Mechanics are identical but the presentation is different.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-glow-blue {
        text-shadow: 0 0 20px rgba(37, 99, 235, 0.5);
    }
</style>
@endsection
