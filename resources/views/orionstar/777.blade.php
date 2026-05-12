@extends('layouts.app')

@section('title', 'Panda Master 777 — Download, Login and Play the Best Fish Games and Slots')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-gray-950">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(234,179,8,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-8 leading-tight animate-fade-in-up uppercase tracking-tighter">
                Panda Master 777 — Download, Login and Play
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-12 max-w-4xl mx-auto font-medium leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                You are on the Panda Master 777 page. This covers everything you need to know about the 777 version of the platform. You will find the download link for the APK, the login portal, a look at the games available, and the bonuses you can claim.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-6 animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ route('orionstar.download') }}" class="px-10 py-5 bg-yellow-500 text-black text-xl font-black rounded-2xl hover:bg-yellow-400 transition-all transform hover:-translate-y-1.5 shadow-lg uppercase">Download 777 APK</a>
                <a href="{{ route('orionstar.play-online') }}" class="px-10 py-5 bg-purple-600 text-white text-xl font-black rounded-2xl hover:bg-purple-500 transition-all transform hover:-translate-y-1.5 shadow-lg uppercase">Play Online</a>
                <a href="{{ $adminSettings->login_url ?? '#' }}" class="px-10 py-5 bg-white/10 text-white text-xl font-black rounded-2xl hover:bg-white/20 transition-all transform hover:-translate-y-1.5 border border-white/20 backdrop-blur-sm uppercase">Login to 777</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-24 space-y-24">
        <!-- What is Panda Master 777? -->
        <section class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">What is Panda Master 777?</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>Panda Master 777 is a version of the Panda Master platform that many players recognise by its 777 branding. It carries the same game library, the same account system, and the same bonus structure as the main platform. The difference is that it has its own dedicated APK for Android users and a specific login entry point.</p>
                    <p>If you already play on Panda Master, the 777 version will feel completely familiar. The fish games are the same, the slots are the same, and your account works across both versions. Pandamaster 777 is simply a different way in to the same great gaming experience, and it is one that a lot of players actively prefer.</p>
                </div>
            </div>
            <div class="bg-gray-900 border border-white/5 p-10 rounded-[3rem] text-center">
                <div class="text-8xl mb-6">7️⃣7️⃣7️⃣</div>
                <div class="text-2xl font-black text-yellow-500 uppercase tracking-widest">Panda Master 777</div>
            </div>
        </section>

        <!-- Download Section -->
        <section class="bg-gray-900 border border-white/5 rounded-[3rem] p-12 lg:p-16">
            <h2 class="text-4xl font-black mb-12 text-center uppercase tracking-tighter">Download Panda Master 777 APK — Android Install Guide</h2>
            <div class="grid lg:grid-cols-2 gap-16">
                <div class="space-y-6 text-gray-400 text-lg">
                    <p>The Panda Master 777 APK download is available for Android devices. It does not come through the Google Play Store, but installing it is quick and simple. Here is how to get it:</p>
                    <ul class="space-y-4">
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">1</span>
                            <span>Tap the Download 777 APK button on this page. You will be taken to our trusted distributor's <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a> page where they will provide you with the APK file directly.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">2</span>
                            <span>Once you have the file, go to your phone's Settings, then Security or Privacy, and enable Install from Unknown Sources.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">3</span>
                            <span>Open the downloaded APK file from your notifications bar or your file manager.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">4</span>
                            <span>Tap Install and wait a few seconds for the app to load up.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">5</span>
                            <span>Open the app, enter your account credentials, and start playing.</span>
                        </li>
                    </ul>
                    <p class="text-sm italic">The Panda Master 777 APK is verified and safe to install. If your Android device shows a warning about installing outside the Play Store, that is a standard message. Tap Install Anyway to continue.</p>
                </div>
                <div class="flex flex-col justify-center items-center gap-8">
                    <a href="{{ route('orionstar.download') }}" class="w-full bg-yellow-500 text-black text-center py-6 rounded-2xl text-2xl font-black hover:bg-yellow-400 transition-colors uppercase tracking-tighter">
                        Download 777 APK Now →
                    </a>
                </div>
            </div>
        </section>

        <!-- Ultra Panda 777 -->
        <section class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1">
                <div class="bg-gray-800 border border-white/5 p-10 rounded-[3rem] text-center">
                    <div class="text-6xl mb-6">🐼✨</div>
                    <div class="text-2xl font-black text-purple-500 uppercase tracking-widest">Ultra Panda Edition</div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">What is Ultra Panda 777?</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>Ultra Panda 777 is a variant within the Panda Master 777 ecosystem. It shares the same platform infrastructure and game library, with its own branded experience for players who prefer it. If you have been searching for Ultra Panda 777 specifically, you can access it through the same login and download available on this page.</p>
                    <p>The Ultra Panda 777 experience includes the fish games, slots, and sweepstakes titles that the platform is built around. Your account credentials work across both, so there is no need to set up a separate account.</p>
                </div>
                <div class="mt-8">
                    <a href="{{ $adminSettings->login_url ?? '#' }}" class="inline-block px-10 py-4 bg-purple-600 text-white font-black rounded-xl hover:bg-purple-500 transition-colors uppercase tracking-tighter">Access Ultra Panda 777</a>
                </div>
            </div>
        </section>

        <!-- Login Section -->
        <section class="p-10 bg-gray-900 border border-white/5 rounded-3xl text-center">
            <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Panda Master 777 Login to Your Account</h2>
            <p class="text-gray-400 mb-8 max-w-3xl mx-auto leading-relaxed">
                Once the app is installed, logging in to Panda Master 777 is straightforward. Open the app, enter the username and password that your distributor provided, and you are in the game lobby. It takes less than a minute.
            </p>
            <p class="text-gray-400 mb-8 max-w-3xl mx-auto leading-relaxed">
                You can also log in through the browser version of Pandamaster 777 if you do not want to use the app. Visit the web portal, enter your credentials, and your full game lobby and account details load up instantly. Either way, your account history, credits, and bonuses are all there.
            </p>
            <a href="{{ $adminSettings->login_url ?? '#' }}" class="inline-block px-12 py-5 bg-white text-black font-black rounded-2xl hover:bg-yellow-500 transition-colors uppercase tracking-tighter shadow-lg">Login to Panda Master 777</a>
        </section>

        <!-- Games & Bonuses -->
        <section class="grid lg:grid-cols-2 gap-12">
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Games on Panda Master 777</h2>
                <p class="text-gray-400 mb-6 leading-relaxed">The Panda Master 777 game library includes everything that makes the platform popular. Fish shooting games with multiplayer rooms where you compete against other players online. Classic and video slot machines with real money payouts. Sweepstakes games that give you a real shot at cash prizes. And arcade-style games for quick sessions when you have a few minutes to spare.</p>
                <p class="text-gray-400 leading-relaxed">The fish games are the highlight. They are fast and competitive, and the multiplayer rooms are usually busy which makes winning feel even better. The Panda Master 777 slots come in several formats, from simple three-reel games to more complex titles with bonus features and growing jackpots.</p>
            </div>
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Bonuses on Panda Master 777</h2>
                <p class="text-gray-400 mb-6 leading-relaxed">Playing on Panda Master 777 gives you access to the same generous bonus structure as the main platform. New players get a welcome bonus when their account is set up through a distributor. There are also daily login rewards, free spins, and a referral bonus that you earn when friends join through your link.</p>
                <p class="text-gray-400 leading-relaxed font-bold italic text-yellow-500">VIP players on the 777 version unlock higher bonus tiers and get access to exclusive game promotions that are not available to regular players. If you play regularly, ask your distributor about upgrading to VIP status.</p>
            </div>
        </section>

        <!-- How to Get Started -->
        <section class="bg-gray-800 rounded-3xl border border-white/5 p-12 text-center">
            <h2 class="text-3xl font-black mb-12 uppercase tracking-tighter">How to Get Started on Panda Master 777</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <div class="text-4xl">📥</div>
                    <div class="font-bold text-white uppercase text-sm tracking-widest">Step 1</div>
                    <p class="text-gray-400 text-sm">Download the Panda Master 777 APK from this page (Android) or the iOS version for iPhone.</p>
                </div>
                <div class="space-y-4">
                    <div class="text-4xl">🤝</div>
                    <div class="font-bold text-white uppercase text-sm tracking-widest">Step 2</div>
                    <p class="text-gray-400 text-sm">Connect with our trusted distributor on <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a> to get your player account set up.</p>
                </div>
                <div class="space-y-4">
                    <div class="text-4xl">🔑</div>
                    <div class="font-bold text-white uppercase text-sm tracking-widest">Step 3</div>
                    <p class="text-gray-400 text-sm">Log in using the credentials your distributor sends you.</p>
                </div>
                <div class="space-y-4">
                    <div class="text-4xl">🎮</div>
                    <div class="font-bold text-white uppercase text-sm tracking-widest">Step 4</div>
                    <p class="text-gray-400 text-sm">Browse the game lobby, pick your game, and start playing.</p>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-12 border-t border-white/5">
            <h2 class="text-4xl font-black mb-16 text-center uppercase tracking-tighter">Frequently Asked Questions</h2>
            <div class="max-w-4xl mx-auto space-y-6" x-data="{ active: null }">
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 1 ? null : 1" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is Panda Master 777?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 1" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Panda Master 777 is a version of the Panda Master gaming platform with its own APK and login portal. It gives you access to the same fish games, slots, and sweepstakes as the main platform.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 2 ? null : 2" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is Panda Master 777 free to download?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 2" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. The Panda Master 777 APK download is completely free. There is no cost to download or install it on your Android device.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 3 ? null : 3" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is Ultra Panda 777?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 3" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Ultra Panda 777 is a branded variant within the Panda Master 777 platform. It shares the same games and account system. You can access it through the same login and APK available on this page.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 4 ? null : 4" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is Panda Master 777 the same as the main platform?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 4 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 4" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. They share the same game library, account system, and bonus structure. Pandamaster 777 is a different entry point with its own APK and login portal, but the gaming experience is identical.
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<style>
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { opacity: 0; animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
</style>
@endsection
