@extends('layouts.app')

@section('title', 'Panda Master Sweepstakes Table Games — Play Online')

@section('content')
<div class="min-h-screen bg-black relative overflow-hidden font-sans">
    <!-- Animated Gaming Background -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <!-- Panda Master Orange/Red Themed Glows -->
        <div class="absolute top-0 -left-20 w-[600px] h-[600px] bg-orange-500/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-0 -right-20 w-[800px] h-[800px] bg-red-600/10 rounded-full blur-[150px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 py-20 lg:py-32">
        <!-- Hero Section -->
        <div class="text-center mb-24">
            <h1 class="text-5xl md:text-8xl font-black mb-6 tracking-tighter italic uppercase text-glow-orange">
                Panda Master <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-600">Table Games</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 font-bold max-w-3xl mx-auto leading-relaxed">
                Strategy-based gaming with real rewards. Master the virtual table and win big with our premium sweepstakes games.
            </p>
            
            <div class="flex flex-wrap justify-center gap-6 mt-12">
                <a href="{{ route('orionstar.play-online') }}" class="px-10 py-5 bg-orange-500 text-black font-black rounded-2xl hover:bg-orange-400 transition-all transform hover:-translate-y-1 shadow-[0_0_30px_rgba(249,115,22,0.4)] uppercase italic">Play Online</a>
                <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="px-10 py-5 bg-white/10 text-white font-black rounded-2xl hover:bg-white/20 transition-all border border-white/20 uppercase italic">Contact to Play</a>
                <a href="{{ route('orionstar.download') }}" class="px-10 py-5 bg-blue-600 text-white font-black rounded-2xl hover:bg-blue-500 transition-all transform hover:-translate-y-1 shadow-[0_0_37,99,235,0.4)] uppercase italic">Download App</a>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 space-y-16">
                <!-- Intro Section -->
                <section class="prose prose-invert prose-2xl max-w-none">
                    <h2 class="text-4xl font-black text-white italic uppercase tracking-tight flex items-center gap-4">
                        <span class="w-12 h-1 bg-orange-500 rounded-full"></span>
                        What Are Panda Master Sweepstakes Table Games?
                    </h2>
                    <p class="text-gray-400 leading-relaxed font-medium">
                        Panda Master sweepstakes table games are casino-style games played on a virtual table format. They cover titles like card games, board-style games, and other strategic formats that operate on the sweepstakes model. This means you play with credits, and any winnings you accumulate can be redeemed for real prizes.
                    </p>
                    <p class="text-gray-400 leading-relaxed font-medium mt-4">
                        The sweepstakes model makes panda master casino table games accessible to players across most of the US without the legal complications of traditional online gambling. You are playing for real prize value through a legal and widely accepted format.
                    </p>
                </section>

                <!-- How to Play Section -->
                <section class="bg-gray-900/40 border-2 border-orange-500/20 p-10 rounded-[3rem] backdrop-blur-md">
                    <h2 class="text-4xl font-black text-white italic uppercase tracking-tight mb-8">How to Play & Win</h2>
                    <div class="space-y-6">
                        @php
                            $steps = [
                                "Log in to your Panda Master account through the app or browser version.",
                                "Navigate to the table games or sweepstakes games section in your lobby.",
                                "Choose a table game title that interests you.",
                                "Review the rules for that specific game if you are playing it for the first time.",
                                "Place your bet using the on-screen controls and start the game.",
                                "Play through the round. Winnings are credited to your balance automatically."
                            ];
                        @endphp
                        @foreach($steps as $index => $step)
                            <div class="flex gap-6 items-start group">
                                <span class="flex-shrink-0 w-12 h-12 bg-orange-500/20 border border-orange-500/40 rounded-xl flex items-center justify-center text-orange-500 font-black text-xl italic group-hover:bg-orange-500 group-hover:text-black transition-all">
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
                            Panda Master table games work on Android, iPhone, iPad, Windows PC, and any device with a modern browser. Play directly in your browser without downloading anything.
                        </p>
                    </div>
                    <div class="bg-purple-600/10 border border-purple-600/20 p-8 rounded-3xl">
                        <h3 class="text-2xl font-black text-white italic mb-4 uppercase">Login & Access</h3>
                        <p class="text-gray-400 text-sm font-medium leading-relaxed">
                            To access Panda Master table games, log in using the button above. Your account gives you full access to the table games section along with your credit balance.
                        </p>
                    </div>
                </section>
            </div>

            <!-- Sidebar / Quick Actions -->
            <div class="space-y-8">
                <!-- Features Card -->
                <div class="bg-gradient-to-br from-gray-900 to-black border-2 border-white/5 p-8 rounded-[2.5rem] shadow-2xl sticky top-24">
                    <h3 class="text-2xl font-black text-white italic mb-6 uppercase tracking-tighter">Why Choose Tables</h3>
                    <ul class="space-y-4">
                        @foreach(["Strategy-based gameplay", "Legal sweepstakes model", "Mobile & Browser friendly", "Clean, easy-to-use interface", "VIP premium promotions"] as $feature)
                            <li class="flex items-center gap-3 text-gray-400 font-bold uppercase text-xs italic">
                                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                    
                    <div class="mt-8 p-6 bg-orange-600 rounded-2xl text-center">
                        <p class="text-white font-black text-xl italic mb-4">READY TO MASTER?</p>
                        <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="block w-full py-4 bg-black text-white font-black rounded-xl uppercase tracking-widest hover:bg-gray-800 transition-colors">LOGIN NOW</a>
                    </div>
                </div>

                <!-- Related Categories -->
                <div class="bg-gray-900/50 p-8 rounded-[2.5rem] border border-white/5">
                    <h3 class="text-xl font-black text-white italic mb-6 uppercase">Other Games</h3>
                    <div class="space-y-4">
                        <a href="{{ route('orionstar.fish-games') }}" class="block p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-colors font-bold text-gray-400 hover:text-white uppercase italic text-sm">Fish Games</a>
                        <a href="{{ route('orionstar.slot-games') }}" class="block p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-colors font-bold text-gray-400 hover:text-white uppercase italic text-sm">Slot Games</a>
                        <a href="{{ route('orionstar.keno') }}" class="block p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-colors font-bold text-gray-400 hover:text-white uppercase italic text-sm">Keno Games</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="mt-32">
            <h2 class="text-4xl md:text-6xl font-black text-white italic uppercase tracking-tighter text-center mb-16">Table Game <span class="text-orange-500">FAQ</span></h2>
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10">
                    <h4 class="text-white font-black mb-3 uppercase italic">What are Panda Master sweepstakes table games?</h4>
                    <p class="text-gray-400 text-sm font-medium">Casino-style games played in a virtual table format on the sweepstakes model. You play with credits and can redeem winnings for real prizes.</p>
                </div>
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10">
                    <h4 class="text-white font-black mb-3 uppercase italic">Can I play table games on my phone?</h4>
                    <p class="text-gray-400 text-sm font-medium">Yes. Panda Master table games are available on Android and iPhone through the browser or downloaded app.</p>
                </div>
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10">
                    <h4 class="text-white font-black mb-3 uppercase italic">Are Panda Master sweepstakes games legal?</h4>
                    <p class="text-gray-400 text-sm font-medium">Yes. The sweepstakes model used for Panda Master sweepstakes games is widely accepted and legal across most of the US.</p>
                </div>
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10">
                    <h4 class="text-white font-black mb-3 uppercase italic">Do I need a download to play?</h4>
                    <p class="text-gray-400 text-sm font-medium">No. You can play Panda Master online table games directly in your browser without installing anything on your device.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-glow-orange {
        text-shadow: 0 0 20px rgba(249, 115, 22, 0.5);
    }
</style>
@endsection
