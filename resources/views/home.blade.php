@extends('layouts.app')

@section('title', 'Panda Master VIP with Fish Games, Slots and Real Money Casino Gaming in One Place')

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

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center min-h-[80vh]">
                <!-- LEFT CONTENT -->
                <div class="text-center lg:text-left max-w-2xl">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black mb-6 leading-tight animate-fade-in-up">
                        <span class="text-yellow-500 uppercase">Panda Master VIP,</span><br>
                        <span class="text-white">Fish Games, Slots & Real Money Casino Gaming</span>
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl text-gray-300 mb-8 leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                        Welcome to Panda Master, the online gaming platform that players across the US keep coming back to. If you enjoy fish games, slot machines, and casino-style action, you are going to feel right at home here. Panda Master gives you access to 30 plus games all in one place, with real rewards and a smooth experience whether you are on your phone or your computer.<br><br>
                        A lot of players find this platform through different names. Some call it Pandamaster, some know it as Panda Master VIP, and others find it by searching Panda Master XYZ or Panda Masters. It is all the same platform. One account, one login, and all your games ready whenever you are.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start items-center animate-fade-in-up" style="animation-delay: 0.4s;">
                        <a href="{{ route('orionstar.play-online') }}" class="px-7 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 text-black text-sm md:text-base font-bold rounded-xl transition-all shadow-lg hover:shadow-yellow-500/50 hover:-translate-y-1">PLAY ONLINE NOW</a>
                        <a href="{{ route('orionstar.download') }}" class="px-7 py-3 bg-gradient-to-r from-purple-500 to-purple-600 text-white text-sm md:text-base font-bold rounded-xl transition-all shadow-lg hover:shadow-purple-500/50 hover:-translate-y-1">DOWNLOAD APP</a>
                        <a href="{{ route('login') }}" class="px-7 py-3 bg-white/10 hover:bg-white/20 text-white text-sm md:text-base font-bold rounded-xl transition-all border border-white/20 shadow-lg hover:-translate-y-1 backdrop-blur-sm">LOGIN</a>
                    </div>
                </div>
                <!-- RIGHT IMAGE -->
                <div class="relative flex justify-center lg:justify-end animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="absolute w-[300px] h-[300px] bg-yellow-500/20 blur-3xl rounded-full"></div>
                    <img src="{{ asset('images/orionstar-hero.jpeg') }}" alt="Panda Master" class="relative z-10 w-full max-w-md lg:max-w-lg object-contain animate-float">
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Sections -->
    <div class="max-w-7xl mx-auto px-4 py-24 space-y-24">
        <!-- Section 1 -->
        <section class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">What is Panda Master and Why Do Players Love It?</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>Panda Master is an online social casino platform built for players who want real entertainment and real rewards. The platform was developed by the same team behind the well-known Fire Kirin fish game app, which means it carries the same quality and game-making expertise that players already trust.</p>
                    <p>What makes Pandamaster stand out is simple. You get a wide variety of games, a free download, strong security, and the flexibility to play online without installing anything. Whether you are a first-time player or someone who has been gaming on platforms like this for years, Panda Master VIP is built to work for you.</p>
                    <p>The platform is free to download and works on Android phones, iPhones, tablets, and Windows computers. You can also access it through your browser without downloading anything at all. It is designed to be easy, fun, and fair for everyone.</p>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 bg-purple-500/20 blur-3xl rounded-full"></div>
                <div class="relative bg-gray-900 border border-white/5 p-10 rounded-[3rem] text-center">
                    <div class="text-6xl mb-6">🐼</div>
                    <div class="text-2xl font-black text-yellow-500 uppercase tracking-widest">Panda Master Excellence</div>
                </div>
            </div>
        </section>

        <!-- Section 2 -->
        <section class="bg-gray-900 border border-white/5 rounded-[3rem] p-12 lg:p-16 text-center">
            <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">Play Panda Master Online Without Downloading Anything</h2>
            <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto">
                Not ready to download the app just yet? That is completely fine. Panda Master has a web version that you can open directly in your browser. You get the same fish games, the same slots, and the same bonuses as the full app. No installation, no storage used on your phone, no waiting.
            </p>
            <p class="text-gray-400 mb-12 max-w-3xl mx-auto">
                Panda Master online play works on any browser on Android, iPhone, or computer. Just visit the web portal, log in with your account details, and you are in the game lobby straight away. A lot of players use the web version as their everyday option because it is quick and convenient.
            </p>
            <a href="{{ route('orionstar.play-online') }}" class="inline-flex items-center gap-4 bg-yellow-500 text-black px-12 py-5 rounded-2xl text-xl font-black hover:bg-yellow-400 transition-colors uppercase tracking-tighter shadow-lg">Play Panda Master Online Now</a>
        </section>

        <!-- Section 3 -->
        <section class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1">
                <div class="grid grid-cols-2 gap-6">
                    <div class="p-8 bg-gray-800 rounded-3xl border border-white/5 text-center">
                        <div class="text-4xl mb-4">🤖</div>
                        <h3 class="text-xl font-bold text-white mb-2">Android</h3>
                    </div>
                    <div class="p-8 bg-gray-800 rounded-3xl border border-white/5 text-center">
                        <div class="text-4xl mb-4">🍎</div>
                        <h3 class="text-xl font-bold text-white mb-2">iPhone</h3>
                    </div>
                    <div class="p-8 bg-gray-800 rounded-3xl border border-white/5 text-center col-span-2">
                        <div class="text-4xl mb-4">💻</div>
                        <h3 class="text-xl font-bold text-white mb-2">Windows PC</h3>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">Download Panda Master and Play on Any Device</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>If you prefer the app experience, the Pandamaster download is fast and straightforward. The app is available for Android as an APK file, for iPhone through the App Store or direct install, and for Windows PC as a desktop download. The APK is small and lightweight, so it fits on most phones without any issues.</p>
                    <p>For iPhone, iPad, & for Windows PC users, the process is just as simple. Connect with our trusted distributor on <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a> and they will guide you through getting the app set up on your iOS device.</p>
                    <p>Once you have the Panda Master app installed, everything is right there whenever you want it. Your games, your account balance, your bonuses, and your progress are all saved and ready to go every time you open the app.</p>
                </div>
                <div class="mt-8">
                    <a href="{{ route('orionstar.download') }}" class="inline-flex items-center gap-4 bg-purple-600 text-white px-10 py-4 rounded-2xl text-xl font-black hover:bg-purple-500 transition-colors uppercase tracking-tighter shadow-lg">Download the App</a>
                </div>
            </div>
        </section>

        <!-- Section 4 -->
        <section class="py-12">
            <h2 class="text-4xl font-black mb-12 text-center uppercase tracking-tighter">Games on Panda Master — Fish Games, Slots, Arcade and More</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="p-10 bg-gray-900 rounded-[2.5rem] border border-white/5 hover:border-yellow-500/30 transition-all">
                    <h3 class="text-2xl font-black text-white mb-4 uppercase">Fish Games</h3>
                    <p class="text-gray-400 leading-relaxed">This is what Panda Master is best known for. The fish games are fast, skill-based, and genuinely fun. You can play alone or in a room with other players online. Pick your weapon, target the fish, and earn points that convert into real rewards. These are the most played games on the platform.</p>
                </div>
                <div class="p-10 bg-gray-900 rounded-[2.5rem] border border-white/5 hover:border-purple-500/30 transition-all">
                    <h3 class="text-2xl font-black text-white mb-4 uppercase">Slot Machines</h3>
                    <p class="text-gray-400 leading-relaxed">Classic reels and modern video slots with bonus rounds, free spins, and jackpot opportunities. The Panda Master casino slot games cover a wide range of styles, so there is always something that suits your taste.</p>
                </div>
                <div class="p-10 bg-gray-900 rounded-[2.5rem] border border-white/5 hover:border-yellow-500/30 transition-all">
                    <h3 class="text-2xl font-black text-white mb-4 uppercase">Arcade and Action Games</h3>
                    <p class="text-gray-400 leading-relaxed">Quick, high-energy rounds with responsive controls. Great for players who want something different from fish games and slots.</p>
                </div>
                <div class="p-10 bg-gray-900 rounded-[2.5rem] border border-white/5 hover:border-purple-500/30 transition-all">
                    <h3 class="text-2xl font-black text-white mb-4 uppercase">Table and Board Games</h3>
                    <p class="text-gray-400 leading-relaxed">Strategic games that require a bit more thought. A solid option if you enjoy games that go beyond pure luck.</p>
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('games.index') }}" class="inline-flex items-center gap-4 bg-white text-black px-10 py-4 rounded-2xl text-xl font-black hover:bg-yellow-500 transition-colors uppercase tracking-tighter">Browse All Games</a>
            </div>
        </section>

        <!-- Section 5 -->
        <section class="bg-gradient-to-br from-yellow-500/10 to-purple-500/10 border border-white/10 rounded-[3rem] p-12 lg:p-16">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">Bonuses and Rewards That Keep You Playing</h2>
                    <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                        <p>Panda Master takes care of its players right from the start. New players get a welcome bonus when they sign up through a distributor. After that, there are daily login rewards, weekly bonuses, and a referral program that pays you and your friend when they join.</p>
                        <p>The first deposit bonus gives you 50 percent extra on top of what you put in. The second and third deposits each come with a 20 percent bonus. VIP players on Pandamaster VIP get access to exclusive promotions and higher reward tiers that regular players cannot access.</p>
                        <p>You can also earn free coins and free spins just by logging in daily. If you keep an eye on the platform's social media pages on Facebook and Instagram, you will find promo codes and special offers posted regularly.</p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-7xl mb-6">🎁</div>
                    <a href="{{ route('login') }}" class="inline-block bg-yellow-500 text-black px-12 py-5 rounded-2xl text-2xl font-black hover:bg-yellow-400 transition-colors uppercase tracking-tighter shadow-lg">Claim Your Bonus</a>
                </div>
            </div>
        </section>

        <!-- Section 6 -->
        <section class="grid lg:grid-cols-2 gap-12">
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Easy Login and Account Access</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">Already have a Panda Master account? Your Pandamaster login is quick and simple. Open the app or visit the web version, enter your username and password, and you are in. The whole process takes less than 30 seconds.</p>
                <p class="text-gray-400 mb-8 leading-relaxed">If you are new and need to set up an account, Panda Master accounts are created through a distributor network. Connect with our trusted and reliable distributor on <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a> and they will get your account set up for you.</p>
                <a href="{{ route('login') }}" class="inline-block px-10 py-4 bg-white/10 text-white font-black rounded-xl hover:bg-white/20 transition-colors uppercase tracking-tighter border border-white/20">Login to Panda Master</a>
            </div>
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Play on Any Device — Phone, Tablet, or Computer</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">Panda Master is built to work on the devices people actually use. The mobile app runs well on Android phones and tablets, iPhones, iPads, and Windows laptops and desktops. The APK file is around 93 MB, which means it installs quickly and does not drain your phone's storage.</p>
                <p class="text-gray-400 mb-8 leading-relaxed">For players who do not want to use the app, the browser version of Pandamaster works just as well on any device with an internet connection. You can even play offline on a physical device if you have downloaded the game, and other players nearby can scan a QR code to download and join from their own phones.</p>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-12 border-t border-white/5">
            <h2 class="text-4xl font-black mb-16 text-center uppercase tracking-tighter">Frequently Asked Questions</h2>
            <div class="max-w-4xl mx-auto space-y-6" x-data="{ active: null }">
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 1 ? null : 1" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is Panda Master?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 1" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Panda Master is an online gaming platform with fish games, slot machines, arcade games, and table games. It is free to download and available on Android, iPhone, and PC. You can also play through the browser without downloading anything.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 2 ? null : 2" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is Panda Master free to play?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 2" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. The Pandamaster app is free to download and install. The platform offers free coins, daily bonuses, and promotional credits so you can play without spending anything upfront.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 3 ? null : 3" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">How do I get a Panda Master account?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 3" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Panda Master accounts are set up through a distributor network. Connect with our trusted distributor on <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a> and they will create your account and send you your login credentials.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 4 ? null : 4" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is Panda Master VIP?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 4 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 4" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Panda Master VIP is the premium tier of the platform. VIP players get access to bigger bonuses, exclusive game events, and priority support. Ask your distributor how to upgrade your account to VIP status.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 5 ? null : 5" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Can I play Panda Master on iPhone and Android?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 5 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 5" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. Panda Master is available on both Android and iPhone. There is also a Windows PC version and a browser-based version that works on any device without requiring a download.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 6 ? null : 6" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is Panda Master safe to use?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 6 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 6" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. The platform uses end-to-end encryption to keep your personal information and transactions secure. Account registration through the distributor network also adds an extra layer of security since no duplicate accounts are created.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 7 ? null : 7" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">How do I deposit or withdraw money?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 7 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 7" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        You can add or withdraw money through Cash App, e-wallets, credit and debit cards, and bank transfers. Deposits are processed quickly, and withdrawals are typically completed within minutes once you request them.
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

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
    .animate-float { animation: float 6s ease-in-out infinite; }
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
</style>
@endsection
