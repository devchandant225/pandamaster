@extends('layouts.app')

@section('title', 'Play Panda Master Online in Your Browser Right Now')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-gray-950 text-center">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4">
            <h1 class="text-4xl md:text-6xl font-black mb-8 uppercase tracking-tighter animate-fade-in-up">
                Play Panda Master Online
            </h1>
            <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s;">
                Want to play Panda Master online without downloading anything? You can do exactly that. The Panda Master web version lets you play fish games, slots, and casino games directly in your browser on any device.
            </p>
            <div class="animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ $adminSettings->login_url ?? '#' }}" class="px-12 py-5 bg-yellow-500 text-black text-2xl font-black rounded-2xl hover:bg-yellow-400 transition-all transform hover:-translate-y-1 shadow-lg uppercase">Play Now in Browser</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-24 space-y-24">
        <!-- What is Web Version -->
        <section class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">What is the Panda Master Web Version?</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>The Panda Master web version is a browser-based platform that gives you full access to the same games and account you would get through the downloaded app. When you play Panda Master online, you are accessing the actual platform through your browser rather than a locally installed app. The experience is almost identical.</p>
                    <p>This is a great option for players who are on a shared device, who do not want to use up storage space, or who simply want to jump into a game as quickly as possible. The Panda Master online game lobby is responsive, loads fast, and works well on both phone screens and larger displays.</p>
                </div>
            </div>
            <div class="bg-gray-900 border border-white/5 p-10 rounded-[3rem] text-center">
                <div class="text-8xl mb-6">🌐</div>
                <div class="text-2xl font-black text-yellow-500 uppercase tracking-widest">Instant Play</div>
            </div>
        </section>

        <!-- How to Play -->
        <section class="bg-gray-900 border border-white/5 rounded-[3rem] p-12 lg:p-16">
            <h2 class="text-4xl font-black mb-12 text-center uppercase tracking-tighter">How to Play Panda Master Online</h2>
            <div class="max-w-4xl mx-auto space-y-8">
                <p class="text-xl text-gray-400 text-center">Playing Panda Master casino online through the browser takes less than two minutes to get started. Here is what to do:</p>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="p-8 bg-gray-800 rounded-2xl border border-white/5">
                        <div class="font-black text-yellow-500 mb-4 uppercase tracking-widest">Step 1</div>
                        <p class="text-gray-400">Tap or click the Play Now button on this page to open the Panda Master web portal.</p>
                    </div>
                    <div class="p-8 bg-gray-800 rounded-2xl border border-white/5">
                        <div class="font-black text-yellow-500 mb-4 uppercase tracking-widest">Step 2</div>
                        <p class="text-gray-400">Enter your username and password on the login screen.</p>
                    </div>
                    <div class="p-8 bg-gray-800 rounded-2xl border border-white/5">
                        <div class="font-black text-yellow-500 mb-4 uppercase tracking-widest">Step 3</div>
                        <p class="text-gray-400">Browse the game lobby and pick any fish game, slot, or casino game.</p>
                    </div>
                    <div class="p-8 bg-gray-800 rounded-2xl border border-white/5">
                        <div class="font-black text-yellow-500 mb-4 uppercase tracking-widest">Step 4</div>
                        <p class="text-gray-400">Tap or click to start playing. The game loads within seconds.</p>
                    </div>
                </div>
                <p class="text-gray-400 text-center leading-relaxed">Your account is the same one you would use in the app. Your credits, bonuses, and game history are all there, and anything you earn while playing online syncs back to your account automatically.</p>
            </div>
        </section>

        <!-- Android & iPhone -->
        <section class="grid lg:grid-cols-2 gap-12">
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Play Panda Master Online on Android</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">Android users can play Panda Master online without downloading anything at all. Open Chrome or any other browser on your Android phone or tablet, navigate to the Panda Master web portal, log in, and the full game lobby is right there. The controls are touch-friendly and the games run without any lag on most Android devices.</p>
                <p class="text-gray-400 leading-relaxed italic">This is perfect for Android players who cannot or do not want to install APK files. You get the same fish games, the same Panda Master casino play online experience, and all your bonuses without touching your phone's settings or storage.</p>
            </div>
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Play Panda Master Online on iPhone</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">iPhone and iPad users can also play Panda Master online without downloading anything. Open Safari or Chrome on your iOS device, visit the Panda Master web portal, log in, and start playing. The browser version is fully compatible with iOS and everything scales correctly to fit your screen.</p>
                <p class="text-gray-400 leading-relaxed italic">If you play regularly on iPhone, consider adding the Panda Master web portal to your home screen as a shortcut. It opens instantly and looks just like an app, without actually taking up app storage on your device.</p>
            </div>
        </section>

        <!-- Fire Kirin Online -->
        <section class="p-10 bg-gray-800 rounded-3xl border border-white/5 text-center">
            <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Fire Kirin Play Online — Login Free on Android</h2>
            <p class="text-gray-400 mb-8 max-w-3xl mx-auto leading-relaxed">
                Looking for Fire Kirin play online options? Fire Kirin is the sister platform to Panda Master, built by the same team. If you want to access Fire Kirin play online login free on Android, the process is exactly the same as Panda Master. Visit the Fire Kirin web portal, log in with your account credentials, and you are in the game lobby.
            </p>
            <a href="#" class="inline-block px-10 py-4 bg-purple-600 text-white font-black rounded-xl hover:bg-purple-500 transition-colors uppercase tracking-tighter shadow-lg">Access Fire Kirin Online</a>
        </section>

        <!-- Games & Bonuses -->
        <section class="grid lg:grid-cols-2 gap-12">
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">What Games Can You Play Online?</h2>
                <ul class="space-y-4 text-gray-400">
                    <li class="flex gap-4">
                        <span class="text-yellow-500 font-bold">•</span>
                        <span><strong>Fish Games:</strong> The most popular category on the platform. Multiplayer fish shooting games with skill-based mechanics and real reward payouts.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="text-yellow-500 font-bold">•</span>
                        <span><strong>Slot Games:</strong> Classic and video slots with bonus rounds, free spins, and jackpot opportunities.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="text-yellow-500 font-bold">•</span>
                        <span><strong>Casino Games:</strong> Table games, sweepstakes, and casino-style titles that give you a real shot at cash prizes.</span>
                    </li>
                </ul>
            </div>
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Bonuses for Online Players</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">Playing Panda Master online through the browser does not mean missing out on any bonuses. All of the same promotions apply. Welcome bonus for new accounts, daily login rewards, weekly credits, and the referral program are all accessible through the browser version.</p>
                <a href="{{ $adminSettings->login_url ?? '#' }}" class="inline-block px-10 py-4 bg-yellow-500 text-black font-black rounded-xl hover:bg-yellow-400 transition-colors uppercase tracking-tighter shadow-lg">Claim Your Bonus</a>
            </div>
        </section>

        <!-- Browser vs App -->
        <section class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
            <h2 class="text-3xl font-black mb-12 text-center uppercase tracking-tighter">Browser Play or Download — Which One Should You Choose?</h2>
            <div class="grid md:grid-cols-2 gap-12">
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-white uppercase tracking-widest">Browser Play</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li>• No download needed</li>
                        <li>• Works on any device with a browser</li>
                        <li>• Great for quick sessions and shared devices</li>
                        <li>• Zero storage impact</li>
                    </ul>
                </div>
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-white uppercase tracking-widest">App Download</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li>• Slightly faster loading</li>
                        <li>• Works better on slower internet connections</li>
                        <li>• Easier to access daily bonuses with a single tap</li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('orionstar.download') }}" class="inline-block px-10 py-4 bg-white text-black font-black rounded-xl hover:bg-yellow-500 transition-colors uppercase tracking-tighter shadow-lg">Download the App Instead</a>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-12 border-t border-white/5">
            <h2 class="text-4xl font-black mb-16 text-center uppercase tracking-tighter">Frequently Asked Questions</h2>
            <div class="max-w-4xl mx-auto space-y-6" x-data="{ active: null }">
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 1 ? null : 1" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Can I play Panda Master without downloading anything?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 1" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. Play Panda Master online without downloading by visiting the web portal in your browser. Log in with your account credentials and the full game lobby opens straight away.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 2 ? null : 2" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Does the browser version work on Android?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 2" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. You can play Panda Master online on Android through Chrome or any standard browser. The games are touch-friendly and load quickly on most Android devices.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 3 ? null : 3" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Can I play on iPhone without downloading the app?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 3" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. Open Safari or Chrome on your iPhone, visit the Panda Master web portal, and log in. The browser version works fully on iOS without any additional steps.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 4 ? null : 4" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is the online version the same as the downloaded app?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 4 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 4" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. The Panda Master casino play online browser version and the downloaded app give you access to the same games, account, and bonuses. The app loads a little faster, but the online play experience is just as good.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 5 ? null : 5" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is Fire Kirin play online and how does it relate to Panda Master?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 5 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 5" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Fire Kirin is the sister platform to Panda Master, built by the same development team. Fire Kirin play online login works the same way as Panda Master. Connect with our distributor on <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a> to get access to both platforms.
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
