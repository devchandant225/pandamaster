@extends('layouts.app')

@section('title', 'Panda Master Play Online — No Download Needed')

@section('content')
<div class="min-h-screen bg-gray-900">
    <!-- Hero Section -->
    <section class="relative py-20 overflow-hidden bg-black">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(34,197,94,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-6xl md:text-8xl font-black mb-6 text-white text-glow-green uppercase italic">PLAY ONLINE</h1>
            <p class="text-2xl md:text-3xl text-gray-300 mb-10 font-bold uppercase tracking-widest">Instant Action in Your Browser</p>
            <a href="{{ route('login') }}" class="inline-block px-14 py-7 bg-green-500 text-black text-2xl font-black rounded-2xl hover:bg-green-400 transition-all transform hover:-translate-y-1 shadow-[0_0_50px_rgba(34,197,94,0.4)]">🎰 LAUNCH WEB PORTAL</a>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 py-24 space-y-32">
        <!-- What is the Web Version? -->
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div class="space-y-6">
                <h2 class="text-4xl md:text-5xl font-black text-white uppercase italic">No Download? No Problem.</h2>
                <p class="text-xl text-gray-400 leading-relaxed">The Panda Master Web Version allows you to enjoy our entire library of fish games and slots directly in your browser. No APK needed, no storage used—just pure gaming action.</p>
                <div class="flex flex-wrap gap-4">
                    <span class="px-4 py-2 bg-gray-800 text-green-400 rounded-full font-bold">Chrome Optimized</span>
                    <span class="px-4 py-2 bg-gray-800 text-green-400 rounded-full font-bold">Safari Ready</span>
                    <span class="px-4 py-2 bg-gray-800 text-green-400 rounded-full font-bold">HTML5 Power</span>
                </div>
            </div>
            <div class="bg-gray-800/40 p-12 rounded-[3rem] border border-white/5 text-center">
                <div class="text-[120px]">🌐</div>
            </div>
        </div>

        <!-- How to Play Online -->
        <div class="space-y-12">
            <h2 class="text-4xl font-black text-center text-white uppercase italic">How to Play Online</h2>
            <div class="grid sm:grid-cols-3 gap-8">
                <div class="bg-gray-800/50 p-8 rounded-3xl border border-white/5">
                    <h3 class="text-2xl font-black text-white mb-4">1. Visit URL</h3>
                    <p class="text-gray-400">Access our official play portal via any modern browser.</p>
                </div>
                <div class="bg-gray-800/50 p-8 rounded-3xl border border-white/5">
                    <h3 class="text-2xl font-black text-white mb-4">2. Secure Login</h3>
                    <p class="text-gray-400">Enter your Panda Master credentials or play as a guest.</p>
                </div>
                <div class="bg-gray-800/50 p-8 rounded-3xl border border-white/5">
                    <h3 class="text-2xl font-black text-white mb-4">3. Start Winning</h3>
                    <p class="text-gray-400">Select your game and enjoy lag-free instant play.</p>
                </div>
            </div>
        </div>

        <!-- Compatibility -->
        <div class="bg-gradient-to-r from-gray-800 to-black p-12 rounded-[3rem] border border-white/5 text-center space-y-8">
            <h2 class="text-4xl font-black text-white uppercase italic">Device Compatibility</h2>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">Our web version is built on HTML5, ensuring a seamless experience across Android browsers, iOS Safari, and all Desktop platforms (Windows, macOS, Linux).</p>
            <div class="flex justify-center gap-12 text-5xl">
                <span>📱</span>
                <span>💻</span>
                <span>🖥️</span>
            </div>
        </div>
    </div>

    <x-faq-section />
</div>
@endsection
