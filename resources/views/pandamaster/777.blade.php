@extends('layouts.app')

@section('title', 'Panda Master 777 — Play, Download & Win')

@section('content')
<div class="min-h-screen bg-gray-900">
    <!-- Hero Section -->
    <section class="relative py-20 overflow-hidden bg-black">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(234,179,8,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-6xl md:text-8xl font-black mb-6 text-yellow-500 text-glow-yellow">PANDA MASTER 777</h1>
            <p class="text-2xl md:text-3xl text-gray-300 mb-10 font-bold uppercase tracking-widest">The #1 Fish Game & Slot Platform</p>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="{{ route('pandamaster.play-online') }}" class="px-10 py-5 bg-yellow-500 text-black text-xl font-black rounded-2xl hover:bg-yellow-400 transition-all transform hover:-translate-y-1">PLAY ONLINE</a>
                <a href="{{ route('pandamaster.download') }}" class="px-10 py-5 bg-purple-600 text-white text-xl font-black rounded-2xl hover:bg-purple-500 transition-all transform hover:-translate-y-1">DOWNLOAD APK</a>
                <a href="{{ route('login') }}" class="px-10 py-5 bg-white/10 text-white text-xl font-black rounded-2xl hover:bg-white/20 transition-all transform hover:-translate-y-1 border border-white/20">LOGIN</a>
            </div>
        </div>
    </section>

    <!-- Content Sections -->
    <div class="max-w-7xl mx-auto px-4 py-20 space-y-32">
        <!-- What is Panda Master 777? -->
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h2 class="text-4xl md:text-5xl font-black text-white uppercase italic">What is Panda Master 777?</h2>
                <p class="text-xl text-gray-400 leading-relaxed">Panda Master 777 is the elite variant of our platform, optimized for high-performance gaming. Whether you're hunting bosses in fish games or spinning the reels on our 777 slots, this version offers enhanced graphics and faster payouts.</p>
            </div>
            <div class="bg-gradient-to-br from-yellow-500/20 to-purple-600/20 p-8 rounded-3xl border border-white/10">
                <div class="aspect-video bg-gray-800 rounded-2xl flex items-center justify-center text-4xl text-yellow-500 font-black italic">PREMIUM 777 EXPERIENCE</div>
            </div>
        </div>

        <!-- 777 Game Highlights -->
        <div class="space-y-12">
            <h2 class="text-4xl font-black text-center text-white uppercase italic">777 Game Highlights</h2>
            <div class="grid sm:grid-cols-3 gap-8">
                <div class="bg-gray-800/50 p-8 rounded-3xl border border-white/5 hover:border-yellow-500/50 transition-colors">
                    <div class="text-5xl mb-4">🎰</div>
                    <h3 class="text-2xl font-black text-white mb-2">Classic 777 Slots</h3>
                    <p class="text-gray-400">High-payout reels with massive jackpots and daily free spins.</p>
                </div>
                <div class="bg-gray-800/50 p-8 rounded-3xl border border-white/5 hover:border-purple-500/50 transition-colors">
                    <div class="text-5xl mb-4">🐟</div>
                    <h3 class="text-2xl font-black text-white mb-2">Fish Master</h3>
                    <p class="text-gray-400">Action-packed multiplayer fish hunting with boss multipliers.</p>
                </div>
                <div class="bg-gray-800/50 p-8 rounded-3xl border border-white/5 hover:border-yellow-500/50 transition-colors">
                    <div class="text-5xl mb-4">⚡</div>
                    <h3 class="text-2xl font-black text-white mb-2">Daily Jackpots</h3>
                    <p class="text-gray-400">Exclusive 777-only rewards for our most active players.</p>
                </div>
            </div>
        </div>

        <!-- Ultra Panda 777 Section -->
        <div class="bg-gradient-to-r from-purple-900/40 to-black p-12 rounded-[3rem] border border-purple-500/30">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 class="text-4xl font-black text-white uppercase italic">Ultra Panda 777</h2>
                    <p class="text-lg text-gray-300">Discover Ultra Panda 777 — the next evolution in online fish gaming. Faster gameplay, exclusive bosses, and higher win rates for our VIP members.</p>
                    <a href="{{ route('pandamaster.casino') }}" class="inline-block px-8 py-4 bg-purple-600 text-white font-black rounded-xl hover:bg-purple-500 transition-all">ACCESS ULTRA PANDA →</a>
                </div>
                <div class="text-center">
                    <div class="text-[120px] animate-pulse">🐼</div>
                </div>
            </div>
        </div>

        <!-- Download 777 APK -->
        <div class="text-center space-y-8">
            <h2 class="text-5xl font-black text-white uppercase italic">Download 777 APK</h2>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">Get the official Panda Master 777 APK for Android and start playing your favorite games anywhere, anytime.</p>
            <a href="{{ route('pandamaster.download') }}" class="inline-block px-12 py-6 bg-yellow-500 text-black text-2xl font-black rounded-2xl hover:bg-yellow-400 transition-all shadow-2xl">DOWNLOAD 777 APK FOR ANDROID</a>
        </div>
    </div>
    
    <x-faq-section />
</div>
@endsection
