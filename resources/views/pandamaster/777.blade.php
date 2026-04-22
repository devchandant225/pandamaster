@extends('layouts.app')

@section('title', 'Orion Stars 777 APK Download & Login - Official Site')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-gray-950">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(234,179,8,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-8 leading-tight animate-fade-in-up uppercase tracking-tighter">
                Download the Orion Stars 777 APK, Login & Start Playing Today
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-12 max-w-4xl mx-auto font-medium leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                If you've been searching for Orion Stars 777, you're in the right place. This page covers everything about the 777 version of the platform — what it is, how to download it, how to log in, and what games you can play.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-6 animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ route('pandamaster.download') }}" class="px-10 py-5 bg-yellow-500 text-black text-xl font-black rounded-2xl hover:bg-yellow-400 transition-all transform hover:-translate-y-1.5 shadow-lg">Download 777 APK</a>
                <a href="{{ route('pandamaster.play-online') }}" class="px-10 py-5 bg-purple-600 text-white text-xl font-black rounded-2xl hover:bg-purple-500 transition-all transform hover:-translate-y-1.5 shadow-lg">Play Online</a>
                <a href="{{ route('login') }}" class="px-10 py-5 bg-white/10 text-white text-xl font-black rounded-2xl hover:bg-white/20 transition-all transform hover:-translate-y-1.5 border border-white/20 backdrop-blur-sm">Login to 777</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-24 space-y-24">
        <!-- What is Orion Stars 777? -->
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">What is Orion Stars 777?</h2>
                <div class="space-y-6 text-gray-400 text-lg">
                    <p>Orion Stars 777 is a version of the Orion Stars platform that a lot of players recognize by its 777 branding. It offers the same core experience that is fish games, slot machines, sweepstakes, and real rewards, but with its own dedicated APK for Android and a specific login portal.</p>
                    <p>If you already use the main Orion Stars platform, you'll feel right at home on orion stars 777. The game library, the account system, and the bonus structure all work the same way. The 777 version is just a different entry point into the same ecosystem. Players prefer this version because the APK is lighter and faster to install.</p>
                </div>
            </div>
            <div class="bg-gray-900 border border-white/5 p-10 rounded-[3rem] text-center">
                <div class="text-8xl mb-6">7️⃣7️⃣7️⃣</div>
                <div class="text-2xl font-black text-yellow-500 uppercase tracking-widest">Premium 777 Access</div>
            </div>
        </div>

        <!-- Download Section -->
        <div class="bg-gray-900 border border-white/5 rounded-[3rem] p-12 lg:p-16">
            <h2 class="text-4xl font-black mb-12 text-center uppercase tracking-tighter">Download Orion Stars 777 APK on Android, iOS & Latest Version</h2>
            <div class="grid lg:grid-cols-2 gap-16">
                <div class="space-y-6 text-gray-400 text-lg">
                    <p>The orion stars 777 apk download is available for Android devices and doesn't require the Google Play Store. You install it as a sideload APK, which takes about two minutes once you've enabled unknown sources on your phone.</p>
                    <p class="font-bold text-white uppercase text-sm tracking-widest">Here's how to get the latest version:</p>
                    <ul class="space-y-4">
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">1</span>
                            <span>Visit this page and tap the Android download button</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">2</span>
                            <span>Enable 'Install from unknown sources' in your phone settings</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">3</span>
                            <span>Open the downloaded APK file and tap Install</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">4</span>
                            <span>Once installed, open the app and log in</span>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col justify-center items-center gap-8">
                    <a href="{{ route('pandamaster.download') }}" class="w-full bg-yellow-500 text-black text-center py-6 rounded-2xl text-2xl font-black hover:bg-yellow-400 transition-colors uppercase tracking-tighter">
                        Download 777 APK Now →
                    </a>
                    <p class="text-gray-500 text-sm italic text-center">The APK is verified and safe to install. No verification variants refer to the direct installation method without the Play Store.</p>
                </div>
            </div>
        </div>

        <!-- Login & Games Section -->
        <div class="grid lg:grid-cols-2 gap-12">
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Orion Stars 777 Online Login</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">Once the app is installed, your orion stars 777 online login works just like the main platform. Open the app, enter your username and password, and you're in. You can also log in through the web version if you don't want to use the app.</p>
                <a href="{{ route('login') }}" class="inline-block px-10 py-4 bg-purple-600 text-white font-black rounded-xl hover:bg-purple-500 transition-colors uppercase tracking-tighter">Login to Orion Stars 777</a>
            </div>
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">What Games Are on Orion Stars 777?</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">The fish games are the standout category. They're competitive, skill-based, and always busy. You'll also find classic and video slot machines with bonus features and progressive jackpots.</p>
                <div class="flex flex-wrap gap-4">
                    <span class="px-4 py-2 bg-gray-800 rounded-lg text-sm font-bold text-gray-300">Fish Shooting</span>
                    <span class="px-4 py-2 bg-gray-800 rounded-lg text-sm font-bold text-gray-300">Video Slots</span>
                    <span class="px-4 py-2 bg-gray-800 rounded-lg text-sm font-bold text-gray-300">Sweepstakes</span>
                    <span class="px-4 py-2 bg-gray-800 rounded-lg text-sm font-bold text-gray-300">Arcade Games</span>
                </div>
            </div>
        </div>

        <!-- Bonuses & Start Steps -->
        <div class="grid lg:grid-cols-2 gap-12">
            <div>
                <h2 class="text-3xl font-black mb-8 uppercase tracking-tighter">Bonuses on Orion Stars 777</h2>
                <p class="text-gray-400 text-lg leading-relaxed mb-6">When you play on Orion Stars 777, you get access to the same bonus structure as the main platform. New players get a welcome bonus, there are daily free spins and login rewards, and a referral program.</p>
                <p class="text-yellow-500 font-bold italic">VIP players on the 777 version get access to higher-tier bonuses and exclusive promotions.</p>
            </div>
            <div class="p-10 bg-gray-800 rounded-3xl border border-white/5">
                <h2 class="text-2xl font-black mb-8 uppercase tracking-tighter">How to Get Started</h2>
                <ol class="space-y-4 text-gray-400">
                    <li class="flex gap-4">
                        <span class="text-white font-bold">Step 1:</span>
                        <span>Download the orion stars 777 apk from this page.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="text-white font-bold">Step 2:</span>
                        <span>Contact a distributor to set up your account.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="text-white font-bold">Step 3:</span>
                        <span>Log in using your distributor credentials.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="text-white font-bold">Step 4:</span>
                        <span>Pick a game and start playing!</span>
                    </li>
                </ol>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="py-24 border-t border-white/5">
            <h2 class="text-4xl font-black mb-16 text-center uppercase tracking-tighter">Frequently Asked Questions</h2>
            <div class="max-w-4xl mx-auto space-y-6" x-data="{ active: null }">
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 1 ? null : 1" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is Orion Stars 777?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 1" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Orion Stars 777 is a version of the Orion Stars gaming platform with its own APK and login portal. It offers the same fish games, slots, and sweepstakes as the main platform.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 2 ? null : 2" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is Orion Stars 777 free to download?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 2" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes, the orion stars 777 apk is free to download. There's no cost to install the app.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 3 ? null : 3" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">How do I download without verification?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 3" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Download orion stars 777 apk latest version no verification means you download and install it directly without going through the Google Play Store. Just enable 'Install from unknown sources' in your Android settings.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 4 ? null : 4" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is it the same as the main platform?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 4 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 4" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes, they share the same game library, account system, and bonus structure. The 777 version is just a different branded entry point with its own APK and login portal.
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
    .text-glow-yellow { text-shadow: 0 0 20px rgba(234, 179, 8, 0.5); }
</style>
@endsection
