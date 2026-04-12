@extends('layouts.app')

@section('title', 'Panda Master Download — Get the App on Android, iOS & PC')

@section('content')
<div class="min-h-screen bg-gray-900">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-black">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(147,51,234,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-6xl md:text-8xl font-black mb-8 text-white text-glow-purple uppercase italic">DOWNLOAD HUB</h1>
            <p class="text-2xl text-gray-400 mb-12 font-bold uppercase tracking-widest">Get Panda Master for your preferred device</p>
            <div class="grid sm:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <a href="#android" class="group bg-gray-800/40 p-8 rounded-[2rem] border-2 border-white/5 hover:border-yellow-500 transition-all transform hover:-translate-y-2">
                    <div class="text-6xl mb-4 group-hover:scale-110 transition-transform">🤖</div>
                    <div class="text-2xl font-black text-white">ANDROID</div>
                </a>
                <a href="#ios" class="group bg-gray-800/40 p-8 rounded-[2rem] border-2 border-white/5 hover:border-blue-500 transition-all transform hover:-translate-y-2">
                    <div class="text-6xl mb-4 group-hover:scale-110 transition-transform">🍎</div>
                    <div class="text-2xl font-black text-white">iOS</div>
                </a>
                <a href="#pc" class="group bg-gray-800/40 p-8 rounded-[2rem] border-2 border-white/5 hover:border-purple-500 transition-all transform hover:-translate-y-2">
                    <div class="text-6xl mb-4 group-hover:scale-110 transition-transform">💻</div>
                    <div class="text-2xl font-black text-white">PC / WINDOWS</div>
                </a>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 py-24 space-y-32">
        <!-- Android Section -->
        <section id="android" class="grid md:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <h2 class="text-5xl font-black text-white italic uppercase tracking-tighter">Android APK Download</h2>
                <div class="space-y-4">
                    <p class="text-lg text-gray-400">Download the official Panda Master APK for Android devices. Our app is lightweight, secure, and offers the full casino experience.</p>
                    <ul class="text-gray-300 space-y-2">
                        <li class="flex items-center gap-3">✅ Version: Latest (2024)</li>
                        <li class="flex items-center gap-3">✅ File Size: ~93 MB</li>
                        <li class="flex items-center gap-3">✅ Requirements: Android 5.0+</li>
                    </ul>
                </div>
                <a href="#" class="inline-block px-12 py-6 bg-yellow-500 text-black text-2xl font-black rounded-2xl hover:bg-yellow-400 transition-all shadow-2xl">DOWNLOAD FOR ANDROID</a>
            </div>
            <div class="bg-gray-800/30 p-12 rounded-[3rem] border border-white/5 text-center">
                <div class="text-[150px]">🤖</div>
            </div>
        </section>

        <!-- iOS Section -->
        <section id="ios" class="grid md:grid-cols-2 gap-16 items-center">
            <div class="order-2 md:order-1 bg-gray-800/30 p-12 rounded-[3rem] border border-white/5 text-center">
                <div class="text-[150px]">🍎</div>
            </div>
            <div class="order-1 md:order-2 space-y-8">
                <h2 class="text-5xl font-black text-white italic uppercase tracking-tighter">iOS Download</h2>
                <p class="text-lg text-gray-400">For iPhone and iPad users, Panda Master is accessible via the App Store or our secure web-install portal. Follow the link below for the official iOS guide.</p>
                <a href="#" class="inline-block px-12 py-6 bg-blue-500 text-white text-2xl font-black rounded-2xl hover:bg-blue-400 transition-all shadow-2xl">DOWNLOAD FOR iOS</a>
            </div>
        </section>

        <!-- Windows / PC Section -->
        <section id="pc" class="grid md:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <h2 class="text-5xl font-black text-white italic uppercase tracking-tighter">Windows / PC Download</h2>
                <p class="text-lg text-gray-400">Enjoy Panda Master on the big screen. Download our dedicated Windows installer for the most stable and high-definition gaming experience.</p>
                <a href="#" class="inline-block px-12 py-6 bg-purple-600 text-white text-2xl font-black rounded-2xl hover:bg-purple-500 transition-all shadow-2xl">DOWNLOAD FOR PC</a>
            </div>
            <div class="bg-gray-800/30 p-12 rounded-[3rem] border border-white/5 text-center">
                <div class="text-[150px]">💻</div>
            </div>
        </section>

        <!-- How to Install -->
        <section class="bg-black/50 p-16 rounded-[4rem] border border-white/5">
            <h2 class="text-5xl font-black text-white text-center italic mb-16 uppercase tracking-tighter">How to Install</h2>
            <div class="grid md:grid-cols-3 gap-12">
                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-yellow-500 rounded-2xl flex items-center justify-center text-3xl font-black text-black mx-auto mb-6">1</div>
                    <h3 class="text-2xl font-black text-white">Enable Unknown Sources</h3>
                    <p class="text-gray-400 text-sm">Go to your device settings and allow installation from unknown sources for APK files.</p>
                </div>
                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-yellow-500 rounded-2xl flex items-center justify-center text-3xl font-black text-black mx-auto mb-6">2</div>
                    <h3 class="text-2xl font-black text-white">Download & Install</h3>
                    <p class="text-gray-400 text-sm">Click the download button, open the downloaded file, and follow the on-screen prompts.</p>
                </div>
                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-yellow-500 rounded-2xl flex items-center justify-center text-3xl font-black text-black mx-auto mb-6">3</div>
                    <h3 class="text-2xl font-black text-white">Login & Play</h3>
                    <p class="text-gray-400 text-sm">Open the app, enter your credentials, and start playing your favorite games instantly.</p>
                </div>
            </div>
        </section>

        <!-- Safety Section -->
        <div class="text-center max-w-3xl mx-auto space-y-6">
            <h2 class="text-3xl font-black text-white italic uppercase tracking-tighter">Safety & Security</h2>
            <p class="text-gray-400">Our APK is 100% verified, encrypted, and free from malware. We prioritize your account security and data privacy above all else.</p>
        </div>
    </div>

    <x-faq-section />
</div>
@endsection
