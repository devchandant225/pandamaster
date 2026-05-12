@extends('layouts.app')

@section('title', 'Panda Master Keno — Play Online Keno Games and Win Real Prizes')

@section('content')
<div class="min-h-screen bg-black relative overflow-hidden font-sans">
    <!-- Animated Gaming Background -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <!-- Panda Master Green/Emerald Themed Glows -->
        <div class="absolute top-0 -left-20 w-[600px] h-[600px] bg-green-500/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-0 -right-20 w-[800px] h-[800px] bg-blue-600/10 rounded-full blur-[150px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 py-20 lg:py-32">
        <!-- Hero Section -->
        <div class="text-center mb-24">
            <h1 class="text-5xl md:text-8xl font-black mb-6 tracking-tighter italic uppercase text-glow-green">
                Panda Master <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-emerald-600">Online Keno</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 font-bold max-w-3xl mx-auto leading-relaxed">
                Pick your numbers and watch the draw. Simple, fast, and exciting Keno action with real prizes waiting for you!
            </p>
            
            <div class="flex flex-wrap justify-center gap-6 mt-12">
                <a href="{{ route('orionstar.play-online') }}" class="px-10 py-5 bg-green-500 text-black font-black rounded-2xl hover:bg-green-400 transition-all transform hover:-translate-y-1 shadow-[0_0_30px_rgba(34,197,94,0.4)] uppercase italic">Play Online</a>
                <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="px-10 py-5 bg-white/10 text-white font-black rounded-2xl hover:bg-white/20 transition-all border border-white/20 uppercase italic">Contact to Play</a>
                <a href="{{ route('orionstar.download') }}" class="px-10 py-5 bg-emerald-600 text-white font-black rounded-2xl hover:bg-emerald-500 transition-all transform hover:-translate-y-1 shadow-[0_0_16,185,129,0.4)] uppercase italic">Download App</a>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 space-y-16">
                <!-- Intro Section -->
                <section class="prose prose-invert prose-2xl max-w-none">
                    <h2 class="text-4xl font-black text-white italic uppercase tracking-tight flex items-center gap-4">
                        <span class="w-12 h-1 bg-green-500 rounded-full"></span>
                        What Are Panda Master Keno Games?
                    </h2>
                    <p class="text-gray-400 leading-relaxed font-medium">
                        Keno is a number-picking game where you select a set of numbers from a grid, and then a random draw picks winning numbers. The more of your chosen numbers that match the drawn numbers, the more you win. Panda Master keno games follow the same format in a clean, easy-to-use digital interface.
                    </p>
                    <p class="text-gray-400 leading-relaxed font-medium mt-4">
                        The panda master online keno experience is powered by a certified Random Number Generator system so every draw is completely random and fair. There is no way to predict the outcome and every player has the same odds on every game.
                    </p>
                </section>

                <!-- How to Play Section -->
                <section class="bg-gray-900/40 border-2 border-green-500/20 p-10 rounded-[3rem] backdrop-blur-md">
                    <h2 class="text-4xl font-black text-white italic uppercase tracking-tight mb-8">How to Play & Win</h2>
                    <div class="space-y-6">
                        @php
                            $steps = [
                                "Log in to your Panda Master account through the app or browser version.",
                                "Go to the keno section in your game lobby.",
                                "Choose how many numbers you want to pick (usually between 1 and 20).",
                                "Tap or click your chosen numbers on the grid.",
                                "Set your bet size and tap Play or Draw to start the round.",
                                "The game draws numbers. Any matches earn you an instant payout."
                            ];
                        @endphp
                        @foreach($steps as $index => $step)
                            <div class="flex gap-6 items-start group">
                                <span class="flex-shrink-0 w-12 h-12 bg-green-500/20 border border-green-500/40 rounded-xl flex items-center justify-center text-green-500 font-black text-xl italic group-hover:bg-green-500 group-hover:text-black transition-all">
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
                            Panda Master keno games work on Android, iPhone, iPad, Windows PC, and any browser-enabled device. Play directly without downloading anything.
                        </p>
                    </div>
                    <div class="bg-purple-600/10 border border-purple-600/20 p-8 rounded-3xl">
                        <h3 class="text-2xl font-black text-white italic mb-4 uppercase">Login & Access</h3>
                        <p class="text-gray-400 text-sm font-medium leading-relaxed">
                            To play Panda Master keno, log in using the button above. New players can get an account by connecting with our trusted distributor on Facebook.
                        </p>
                    </div>
                </section>
            </div>

            <!-- Sidebar / Quick Actions -->
            <div class="space-y-8">
                <!-- Features Card -->
                <div class="bg-gradient-to-br from-gray-900 to-black border-2 border-white/5 p-8 rounded-[2.5rem] shadow-2xl sticky top-24">
                    <h3 class="text-2xl font-black text-white italic mb-6 uppercase tracking-tighter">Why Choose Keno</h3>
                    <ul class="space-y-4">
                        @foreach(["Simple, accessible rules", "Quick, fast-paced rounds", "Certified RNG draw system", "Mobile & Browser friendly", "Welcome bonuses & free credits"] as $feature)
                            <li class="flex items-center gap-3 text-gray-400 font-bold uppercase text-xs italic">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                    
                    <div class="mt-8 p-6 bg-green-500 rounded-2xl text-center">
                        <p class="text-black font-black text-xl italic mb-4">READY TO DRAW?</p>
                        <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="block w-full py-4 bg-black text-white font-black rounded-xl uppercase tracking-widest hover:bg-gray-800 transition-colors">LOGIN NOW</a>
                    </div>
                </div>

                <!-- Related Categories -->
                <div class="bg-gray-900/50 p-8 rounded-[2.5rem] border border-white/5">
                    <h3 class="text-xl font-black text-white italic mb-6 uppercase">Other Games</h3>
                    <div class="space-y-4">
                        <a href="{{ route('orionstar.fish-games') }}" class="block p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-colors font-bold text-gray-400 hover:text-white uppercase italic text-sm">Fish Games</a>
                        <a href="{{ route('orionstar.slot-games') }}" class="block p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-colors font-bold text-gray-400 hover:text-white uppercase italic text-sm">Slot Games</a>
                        <a href="{{ route('orionstar.table-games') }}" class="block p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-colors font-bold text-gray-400 hover:text-white uppercase italic text-sm">Table Games</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="mt-32">
            <h2 class="text-4xl md:text-6xl font-black text-white italic uppercase tracking-tighter text-center mb-16">Keno Game <span class="text-green-500">FAQ</span></h2>
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10">
                    <h4 class="text-white font-black mb-3 uppercase italic">What are Panda Master keno games?</h4>
                    <p class="text-gray-400 text-sm font-medium">Digital number-picking games where you select numbers, a draw takes place, and you win based on how many matches you have.</p>
                </div>
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10">
                    <h4 class="text-white font-black mb-3 uppercase italic">Can I play keno on my phone?</h4>
                    <p class="text-gray-400 text-sm font-medium">Yes. Panda Master keno games are available on Android and iPhone through both the browser and the downloaded app.</p>
                </div>
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10">
                    <h4 class="text-white font-black mb-3 uppercase italic">Are Panda Master keno games fair?</h4>
                    <p class="text-gray-400 text-sm font-medium">Yes. Panda Master online keno games use a certified RNG system that guarantees every draw is completely random and fair.</p>
                </div>
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10">
                    <h4 class="text-white font-black mb-3 uppercase italic">Can I play keno without downloading?</h4>
                    <p class="text-gray-400 text-sm font-medium">Yes. Panda Master keno is available through the browser-based version of the platform. No download needed.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-glow-green {
        text-shadow: 0 0 20px rgba(34, 197, 94, 0.5);
    }
</style>
@endsection
