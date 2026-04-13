@extends('layouts.app')

@section('title', 'Panda Master Casino — Fish Games, Slots & Real Money Gaming')

@section('content')
<div class="min-h-screen bg-gray-950">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-black">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(234,179,8,0.15)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-7xl md:text-9xl font-black mb-6 text-yellow-500 text-glow-yellow uppercase italic tracking-tighter">CASINO HUB</h1>
            <p class="text-2xl md:text-3xl text-gray-400 mb-12 font-bold uppercase tracking-widest">Premium Sweepstakes & Social Gaming</p>
            <a href="{{ route('pandamaster.play-online') }}" class="inline-block px-14 py-7 bg-yellow-500 text-black text-2xl font-black rounded-2xl hover:bg-yellow-400 transition-all shadow-[0_0_50px_rgba(234,179,8,0.3)]">🎰 ENTER THE CASINO</a>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 py-24 space-y-40">
        <!-- Fish Games Section -->
        <section class="grid md:grid-cols-2 gap-20 items-center">
            <div class="space-y-8">
                <h2 class="text-6xl font-black text-white italic tracking-tighter">Fish Games</h2>
                <p class="text-xl text-gray-400 leading-relaxed">Panda Master is the world leader in multiplayer fish gaming. Our flagship titles feature high-definition graphics, smooth mechanics, and massive boss multipliers. From Ocean King to Thunder Dragon, we have it all.</p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gray-900 p-6 rounded-2xl border border-white/5">
                        <div class="text-3xl mb-2">🐟</div>
                        <h3 class="text-white font-black italic">Boss Multipliers</h3>
                    </div>
                    <div class="bg-gray-900 p-6 rounded-2xl border border-white/5">
                        <div class="text-3xl mb-2">🌊</div>
                        <h3 class="text-white font-black italic">HD Graphics</h3>
                    </div>
                </div>
            </div>
            <div class="aspect-square bg-gradient-to-br from-yellow-500/10 to-transparent p-12 rounded-[4rem] border border-white/5 flex items-center justify-center">
                <div class="text-[200px] animate-bounce">🐳</div>
            </div>
        </section>

        <!-- Panda Slots Section -->
        <section class="grid md:grid-cols-2 gap-20 items-center">
            <div class="order-2 md:order-1 aspect-square bg-gradient-to-br from-purple-500/10 to-transparent p-12 rounded-[4rem] border border-white/5 flex items-center justify-center">
                <div class="text-[200px] animate-pulse">🎰</div>
            </div>
            <div class="order-1 md:order-2 space-y-8">
                <h2 class="text-6xl font-black text-white italic tracking-tighter">Panda Slots</h2>
                <p class="text-xl text-gray-400 leading-relaxed">Our exclusive slot collection is designed for high-payout excitement. Experience hundreds of themes with free spins, bonus rounds, and progressive jackpots that drop daily.</p>
                <a href="{{ route('games.index') }}" class="inline-block px-10 py-5 bg-purple-600 text-white font-black rounded-xl hover:bg-purple-500 transition-all">BROWSE ALL SLOTS →</a>
            </div>
        </section>

        <!-- Table & Board Games -->
        <section class="bg-gray-900/50 p-20 rounded-[4rem] border border-white/5 text-center space-y-12">
            <h2 class="text-5xl font-black text-white italic uppercase tracking-tighter">Table & Board Games</h2>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto">Beyond fish and slots, Panda Master offers a wide array of strategic board games and classic casino tables optimized for mobile play.</p>
            <div class="grid sm:grid-cols-4 gap-8">
                <div class="p-8 bg-black/40 rounded-3xl border border-white/5">🃏 Cards</div>
                <div class="p-8 bg-black/40 rounded-3xl border border-white/5">🎲 Dice</div>
                <div class="p-8 bg-black/40 rounded-3xl border border-white/5">🎡 Roulette</div>
                <div class="p-8 bg-black/40 rounded-3xl border border-white/5">🏆 Keno</div>
            </div>
        </section>

        <!-- Real Money Fun Section -->
        <div class="bg-gradient-to-r from-yellow-500/20 to-orange-500/20 p-20 rounded-[5rem] border border-yellow-500/30 text-center space-y-10">
            <h2 class="text-6xl font-black text-white italic uppercase tracking-tighter">Real Rewards. Real Fun.</h2>
            <p class="text-2xl text-gray-300 max-w-3xl mx-auto font-bold uppercase tracking-widest">Safe Deposits • Instant Payouts • 24/7 Security</p>
            <a href="{{ $adminSettings->register_url ?? '#' }}" class="inline-block px-16 py-8 bg-white text-black text-3xl font-black rounded-3xl hover:bg-gray-200 transition-all shadow-2xl uppercase italic tracking-tighter">Claim Your Welcome Bonus</a>
        </div>
    </div>

    <x-faq-section />
</div>
@endsection
