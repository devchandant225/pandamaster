@extends('layouts.app')

@section('title', 'Orion Stars Official - Fish Games, Slots & Online Casino Fun')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <section id="hero" class="relative overflow-hidden min-h-screen flex items-center justify-center bg-gray-950 py-20">
        <!-- Animated Background & Lighting -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
            <div class="absolute top-1/4 -left-20 w-[500px] h-[500px] bg-yellow-500/10 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-1/4 -right-20 w-[600px] h-[600px] bg-purple-500/10 rounded-full blur-[120px] animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="absolute inset-0 pointer-events-none">
            @for($i = 0; $i < 60; $i++)
                <div class="absolute w-[1px] h-[1px] bg-white rounded-full animate-twinkle"
                     style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(3000, 6000) }}ms;"></div>
            @endfor
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-8 leading-tight animate-fade-in-up">
                <span class="text-yellow-500 text-glow-yellow uppercase">Orion Stars,</span><br>
                <span class="text-white">Your Go-To Platform for Fish Games, Slots & Online Casino Fun</span>
            </h1>
            
            <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-4xl mx-auto font-medium leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                Welcome to Orion Stars. One of the most popular online gaming platforms around right now. Whether you're here for the fish games, the slots, or the sweepstakes, you've landed in the right place. Orionstars gives you access to a full library of casino-style games, a simple login, easy downloads, and the option to play right in your browser without installing anything.
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ route('orionstar.play-online') }}" class="group relative px-10 py-5 bg-gradient-to-r from-yellow-500 to-yellow-600 text-black text-xl font-black rounded-2xl transition-all shadow-lg hover:shadow-yellow-500/50 transform hover:-translate-y-1.5 overflow-hidden">
                    <span class="relative z-10 uppercase tracking-tighter">Play Online Now</span>
                </a>
                <a href="{{ route('orionstar.download') }}" class="group relative px-10 py-5 bg-gradient-to-r from-purple-500 to-purple-600 text-white text-xl font-black rounded-2xl transition-all shadow-lg hover:shadow-purple-500/50 transform hover:-translate-y-1.5 overflow-hidden">
                    <span class="relative z-10 uppercase tracking-tighter">Download the App</span>
                </a>
                <a href="{{ route('login') }}" class="group relative px-10 py-5 bg-white/10 hover:bg-white/20 text-white text-xl font-black rounded-2xl transition-all border border-white/20 shadow-lg transform hover:-translate-y-1.5 backdrop-blur-sm">
                    <span class="relative z-10 uppercase tracking-tighter">Login to Your Account</span>
                </a>
            </div>

            <div class="mt-16 text-gray-400 font-medium animate-fade-in-up" style="animation-delay: 0.6s;">
                <p>You can find the platform at <span class="text-yellow-500 font-bold">orionstars.vip</span>, and it works on your phone, your tablet, and your PC. One login, one account, all your games in one place.</p>
            </div>
        </div>
    </section>

    <!-- What is Orion Stars Section -->
    <section class="py-24 bg-gray-900 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl md:text-5xl font-black mb-8 text-white uppercase tracking-tighter">What is Orion Stars?</h2>
                    <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                        <p>Orion Stars is an online social casino and gaming platform that lets you play fish games, slot machines, and sweepstakes games all from your phone or computer. It's been around long enough to build a solid reputation, and players across the US love it for its game variety, smooth gameplay, and real rewards.</p>
                        <p>The platform runs as a mobile app that you can download on Android or iPhone, and it also has a web version you can open directly in your browser. The orionstars online experience is designed to feel just like playing on a physical gaming machine, except you can do it from home, on the go, or anywhere you have an internet connection.</p>
                        <div class="p-6 bg-yellow-500/10 border border-yellow-500/20 rounded-2xl">
                            <p class="text-yellow-500 font-bold italic">Orion Stars VIP takes things up a notch. VIP players get access to exclusive bonuses, higher reward tiers, and priority support. If you're a regular player, the VIP program is worth looking into as it is one of the best perks the platform offers.</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -inset-4 bg-purple-500/20 blur-3xl rounded-full"></div>
                    <div class="relative bg-gray-800 border border-white/10 p-8 rounded-[2rem] shadow-2xl">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="aspect-square bg-gray-900 rounded-xl flex items-center justify-center text-4xl">🐟</div>
                            <div class="aspect-square bg-gray-900 rounded-xl flex items-center justify-center text-4xl">🎰</div>
                            <div class="aspect-square bg-gray-900 rounded-xl flex items-center justify-center text-4xl">🏆</div>
                            <div class="aspect-square bg-gray-900 rounded-xl flex items-center justify-center text-4xl">🃏</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Play Online Section -->
    <section class="py-24 bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-black mb-8 text-white uppercase tracking-tighter">Play Orion Stars Online Right from Your Browser</h2>
            <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto">
                Don't want to download anything? That's completely fine. Orion Stars has a full web version that runs in your browser without needing an app. You can play orion stars online on your Android, your iPhone, your laptop, or your desktop PC.
            </p>
            <a href="{{ route('orionstar.play-online') }}" class="inline-flex items-center gap-4 bg-white text-black px-12 py-5 rounded-2xl text-xl font-black hover:bg-yellow-500 transition-colors uppercase tracking-tighter">
                Play Orion Stars Online Now →
            </a>
        </div>
    </section>

    <!-- Download Section -->
    <section class="py-24 bg-gray-900 border-y border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <div class="lg:w-1/2 order-2 lg:order-1">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="p-8 bg-gray-800 rounded-3xl border border-white/5 text-center">
                            <div class="text-4xl mb-4">🤖</div>
                            <h3 class="text-xl font-bold text-white mb-2">Android</h3>
                            <p class="text-gray-400 text-sm">Direct APK Download</p>
                        </div>
                        <div class="p-8 bg-gray-800 rounded-3xl border border-white/5 text-center">
                            <div class="text-4xl mb-4">🍎</div>
                            <h3 class="text-xl font-bold text-white mb-2">iPhone</h3>
                            <p class="text-gray-400 text-sm">iOS App Store / Web</p>
                        </div>
                        <div class="p-8 bg-gray-800 rounded-3xl border border-white/5 text-center col-span-2">
                            <div class="text-4xl mb-4">💻</div>
                            <h3 class="text-xl font-bold text-white mb-2">Windows PC</h3>
                            <p class="text-gray-400 text-sm">Desktop Experience</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 order-1 lg:order-2">
                    <h2 class="text-4xl md:text-5xl font-black mb-8 text-white uppercase tracking-tighter">Download Orion Stars on Android, iPhone & PC</h2>
                    <p class="text-lg text-gray-400 mb-8 leading-relaxed">
                        If you want the full app experience, downloading Orion Stars takes just a few minutes. The app is available for Android (as an APK file), iPhone and iPad (through the App Store or browser install), and Windows PC (as a desktop download). It's lightweight, it runs smoothly, and it keeps all your game progress and account info in one place.
                    </p>
                    <a href="{{ route('orionstar.download') }}" class="inline-flex items-center gap-4 bg-purple-600 text-white px-12 py-5 rounded-2xl text-xl font-black hover:bg-purple-500 transition-colors uppercase tracking-tighter">
                        Download the App →
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Games Section -->
    <section class="py-24 bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-4 text-white uppercase tracking-tighter">Fish Games, Slots & More</h2>
                <p class="text-xl text-gray-400">Orion Stars has a game library that keeps growing.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="p-10 bg-gray-900 rounded-[2.5rem] border border-white/5 hover:border-yellow-500/30 transition-all group">
                    <div class="flex items-start gap-6">
                        <div class="text-5xl group-hover:scale-110 transition-transform">🐟</div>
                        <div>
                            <h3 class="text-2xl font-black text-white mb-4 uppercase">Fish Games</h3>
                            <p class="text-gray-400 leading-relaxed">The heart of the platform. Shoot fish, rack up points, and win big. Orion Stars fish games are fast, fun, and skill-based. You can play solo or go head-to-head with other players online.</p>
                        </div>
                    </div>
                </div>
                <div class="p-10 bg-gray-900 rounded-[2.5rem] border border-white/5 hover:border-purple-500/30 transition-all group">
                    <div class="flex items-start gap-6">
                        <div class="text-5xl group-hover:scale-110 transition-transform">🎰</div>
                        <div>
                            <h3 class="text-2xl font-black text-white mb-4 uppercase">Slot Games</h3>
                            <p class="text-gray-400 leading-relaxed">Classic reels, bonus rounds, and big jackpots. From simple three-reel classics to feature-packed video slots with multipliers and free spins.</p>
                        </div>
                    </div>
                </div>
                <div class="p-10 bg-gray-900 rounded-[2.5rem] border border-white/5 hover:border-yellow-500/30 transition-all group">
                    <div class="flex items-start gap-6">
                        <div class="text-5xl group-hover:scale-110 transition-transform">🏆</div>
                        <div>
                            <h3 class="text-2xl font-black text-white mb-4 uppercase">Sweepstakes Games</h3>
                            <p class="text-gray-400 leading-relaxed">Play for free credits and redeem your winnings. The sweepstakes model gives you a real shot at cash prizes without requiring a direct buy-in.</p>
                        </div>
                    </div>
                </div>
                <div class="p-10 bg-gray-900 rounded-[2.5rem] border border-white/5 hover:border-purple-500/30 transition-all group">
                    <div class="flex items-start gap-6">
                        <div class="text-5xl group-hover:scale-110 transition-transform">🎯</div>
                        <div>
                            <h3 class="text-2xl font-black text-white mb-4 uppercase">Arcade & Skill Games</h3>
                            <p class="text-gray-400 leading-relaxed">Quick rounds, responsive controls, and plenty of variety for players who want something different.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bonuses & VIP Section -->
    <section class="py-24 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <div class="lg:w-1/2">
                    <h2 class="text-4xl md:text-5xl font-black mb-8 text-white uppercase tracking-tighter">Bonuses, Rewards & VIP Access</h2>
                    <p class="text-lg text-gray-400 mb-8 leading-relaxed">
                        Orion Stars takes care of its players. From the moment you sign up, there are orion stars bonuses waiting for you. New players typically get a welcome bonus just for getting their account set up. After that, there are daily login rewards, weekly promos, and a referral program that lets you earn when you invite friends.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 text-white font-bold">
                            <span class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center text-black">✓</span>
                            <span>Daily Login Rewards</span>
                        </div>
                        <div class="flex items-center gap-4 text-white font-bold">
                            <span class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center text-black">✓</span>
                            <span>Referral Bonuses</span>
                        </div>
                        <div class="flex items-center gap-4 text-white font-bold">
                            <span class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center text-black">✓</span>
                            <span>VIP Exclusive Perks</span>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <div class="p-10 bg-gradient-to-br from-yellow-500/20 to-purple-500/20 rounded-[3rem] border border-white/10 text-center">
                        <div class="text-6xl mb-6">🎁</div>
                        <h3 class="text-3xl font-black text-white mb-4 uppercase">Claim Your Bonus</h3>
                        <p class="text-gray-300 mb-8">Ready to boost your play? Join the Orion Stars community today and get more out of every spin.</p>
                        <a href="{{ route('login') }}" class="inline-block bg-yellow-500 text-black px-10 py-4 rounded-xl font-black uppercase tracking-tighter hover:bg-yellow-400 transition-colors">Get Started Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Instructions Section -->
    <section class="py-24 bg-gray-950 border-y border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-4 text-white uppercase tracking-tighter">Easy & Fast Login Into Your Account</h2>
                <p class="text-xl text-gray-400">Already have an account? Your orion stars login is simple.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="p-10 bg-gray-900 rounded-3xl border border-white/5">
                    <h3 class="text-2xl font-black text-white mb-6 uppercase">Existing Players</h3>
                    <p class="text-gray-400 mb-8">Just head to the login page, enter your username and password, and you're in. If you're logging in on a new device, you might need to verify your account through your distributor.</p>
                    <a href="{{ route('login') }}" class="text-yellow-500 font-black uppercase tracking-widest hover:text-yellow-400 transition-colors">Login to Orion Stars →</a>
                </div>
                <div class="p-10 bg-gray-900 rounded-3xl border border-white/5">
                    <h3 class="text-2xl font-black text-white mb-6 uppercase">New Players</h3>
                    <p class="text-gray-400 mb-8">Orion Stars accounts are created through a distributor network. Search for Orion Stars distributors on Facebook or reach out to the support team for help getting started.</p>
                    <div class="text-sm font-bold text-gray-500 uppercase tracking-widest">Connect with our trusted distributor on Facebook</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Devices Section -->
    <section class="py-24 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-black mb-8 text-white uppercase tracking-tighter">Mobile, Browser, or Desktop. Play on Any Device</h2>
            <p class="text-xl text-gray-400 mb-12 max-w-4xl mx-auto leading-relaxed">
                Orion Stars is built for the way people actually play games today — on their phone, mostly, but also on tablets and computers. The orion stars mobile play experience is smooth and responsive, whether you're on Android or iPhone. The app fits on low-storage phones too, so you don't need the latest device to enjoy it.
            </p>
            <div class="flex flex-wrap justify-center gap-12 opacity-50">
                <span class="text-6xl">📱</span>
                <span class="text-6xl">💻</span>
                <span class="text-6xl">🍎</span>
                <span class="text-6xl">🤖</span>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-24 bg-gray-950 border-t border-white/5">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-5xl font-black mb-16 text-center text-white uppercase tracking-tighter">Frequently Asked Questions</h2>
            <div class="space-y-6" x-data="{ active: null }">
                <!-- FAQ 1 -->
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 1 ? null : 1" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is Orion Stars?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 1" class="p-6 pt-0 text-gray-400 leading-relaxed border-t border-white/5">
                        Orion Stars is an online gaming platform with fish games, slots, and sweepstakes games. You can play through the mobile app or the browser-based web version. It's free to download and available on Android, iPhone, and PC.
                    </div>
                </div>
                <!-- FAQ 2 -->
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 2 ? null : 2" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">How do I access Orion Stars online?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 2" class="p-6 pt-0 text-gray-400 leading-relaxed border-t border-white/5">
                        You can access orion stars online by visiting the platform's web version in your browser, or by downloading the app on your device. Either way, you'll need an account to start playing.
                    </div>
                </div>
                <!-- FAQ 3 -->
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 3 ? null : 3" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Can I play Orion Stars without downloading anything?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 3" class="p-6 pt-0 text-gray-400 leading-relaxed border-t border-white/5">
                        Yes. The orion stars web version lets you play directly in your browser without downloading or installing anything. It works on Android, iPhone, and PC browsers.
                    </div>
                </div>
                <!-- FAQ 4 -->
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 4 ? null : 4" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is Orion Stars VIP?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 4 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 4" class="p-6 pt-0 text-gray-400 leading-relaxed border-t border-white/5">
                        Orion Stars VIP is the premium tier of the platform. VIP players get access to better bonuses, exclusive game events, and priority customer support. Ask your distributor or the support team how to upgrade.
                    </div>
                </div>
                <!-- FAQ 5 -->
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 5 ? null : 5" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is Orion Stars available on iPhone and Android?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 5 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 5" class="p-6 pt-0 text-gray-400 leading-relaxed border-t border-white/5">
                        Yes. You can play orion stars on iPhone and on Android. There's also a Windows PC version and a browser-based web version for those who don't want to download anything.
                    </div>
                </div>
                <!-- FAQ 6 -->
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 6 ? null : 6" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What games can I play on Orion Stars?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 6 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 6" class="p-6 pt-0 text-gray-400 leading-relaxed border-t border-white/5">
                        You can play fish games, slot games, sweepstakes games, and arcade games on Orion Stars. The fish games and slots are the most popular categories on the platform.
                    </div>
                </div>
                <!-- FAQ 7 -->
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 7 ? null : 7" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is Orion Stars 777?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 7 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 7" class="p-6 pt-0 text-gray-400 leading-relaxed border-t border-white/5">
                        Orion Stars 777 is a variant of the platform with its own APK and login. It covers the same games and features as the main platform. You can find the full Orion Stars 777 download and login guide on the /777/ page.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.3); }
        }
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-twinkle { animation: twinkle 4s ease-in-out infinite; }
        .animate-fade-in-up { opacity: 0; animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .text-glow-yellow { text-shadow: 0 0 20px rgba(234, 179, 8, 0.5); }
    </style>
</div>
@endsection
