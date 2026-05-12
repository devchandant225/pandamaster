@extends('layouts.app')

@section('title', 'Panda Master Login — Access Your Account and Start Playing Right Away')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-gray-950">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-black mb-8 uppercase tracking-tighter animate-fade-in-up">
                Panda Master Login — Access Your Account
            </h1>
            <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s;">
                Need to get into your Panda Master account? You are in the right place. The Panda Master login process is quick and takes less than a minute on any device.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-6 animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ $adminSettings->login_url ?? '#' }}" class="px-10 py-5 bg-yellow-500 text-black text-xl font-black rounded-2xl hover:bg-yellow-400 transition-all transform hover:-translate-y-1 shadow-lg uppercase">Player Login</a>
                <a href="{{ route('admin.login') }}" class="px-10 py-5 bg-purple-600 text-white text-xl font-black rounded-2xl hover:bg-purple-500 transition-all transform hover:-translate-y-1 shadow-lg uppercase">Admin Login</a>
                <a href="{{ route('orionstar.play-online') }}" class="px-10 py-5 bg-white/10 text-white text-xl font-black rounded-2xl hover:bg-white/20 transition-all transform hover:-translate-y-1 border border-white/20 backdrop-blur-sm uppercase">Play Without Downloading</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-24 space-y-24">
        <!-- Player Login Info -->
        <section class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">Player Login</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>Your Panda Master online login works the same way on every device. Open the app or visit the web portal, type in your username and password, and you are straight into your game lobby. Your account, your credits, and your bonuses are all exactly where you left them.</p>
                    <p>For the quickest login experience, save your credentials on your device so the app fills them in for you automatically. That way your Pandamaster login is one tap away every time you open the app. If you are using the browser version, bookmarking the login page makes it just as fast.</p>
                    <p>The Panda Master play online login through the web portal works on Chrome, Safari, Firefox, and every other standard browser. You do not need any special software or plugins. Just visit the page, enter your details, and play.</p>
                </div>
                <div class="mt-8">
                    <a href="{{ $adminSettings->login_url ?? '#' }}" class="inline-block px-10 py-4 bg-yellow-500 text-black font-black rounded-xl hover:bg-yellow-400 transition-colors uppercase tracking-tighter shadow-lg">Login to Panda Master</a>
                </div>
            </div>
            <div class="bg-gray-900 border border-white/5 p-10 rounded-[3rem] text-center">
                <div class="text-8xl mb-6">🔑</div>
                <div class="text-2xl font-black text-yellow-500 uppercase tracking-widest">Instant Access</div>
            </div>
        </section>

        <!-- New Account Info -->
        <section class="bg-gray-900 border border-white/5 rounded-[3rem] p-12 lg:p-16">
            <h2 class="text-4xl font-black mb-8 text-center uppercase tracking-tighter">New to Panda Master? Here Is How to Get Your Account</h2>
            <div class="max-w-4xl mx-auto space-y-8">
                <p class="text-xl text-gray-400 text-center">Getting a Panda Master account is handled through the distributor network rather than a traditional sign-up form. Here is how the process works:</p>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="p-8 bg-gray-800 rounded-2xl border border-white/5">
                        <div class="font-black text-yellow-500 mb-4 uppercase tracking-widest">Step 1</div>
                        <p class="text-gray-400">Connect with our trusted and reliable distributor on <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a> and reach out to them directly.</p>
                    </div>
                    <div class="p-8 bg-gray-800 rounded-2xl border border-white/5">
                        <div class="font-black text-yellow-500 mb-4 uppercase tracking-widest">Step 2</div>
                        <p class="text-gray-400">Let them know you want to set up a new player account.</p>
                    </div>
                    <div class="p-8 bg-gray-800 rounded-2xl border border-white/5">
                        <div class="font-black text-yellow-500 mb-4 uppercase tracking-widest">Step 3</div>
                        <p class="text-gray-400">They will ask for your name and a preferred password, then send you your login credentials.</p>
                    </div>
                    <div class="p-8 bg-gray-800 rounded-2xl border border-white/5">
                        <div class="font-black text-yellow-500 mb-4 uppercase tracking-widest">Step 4</div>
                        <p class="text-gray-400">Use those credentials to log in through the app or the web version.</p>
                    </div>
                </div>
                <p class="text-gray-400 text-center leading-relaxed">The whole process is quick and most distributors are active and responsive. Once your account is ready, your Pandamaster VIP login credentials will work across the app, the browser version, and the 777 portal.</p>
                <div class="text-center mt-8">
                    <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="inline-block px-10 py-4 bg-purple-600 text-white font-black rounded-xl hover:bg-purple-500 transition-colors uppercase tracking-tighter">Connect with Our Distributor</a>
                </div>
            </div>
        </section>

        <!-- Instant Play Info -->
        <section class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1">
                <div class="bg-gray-800 border border-white/5 p-10 rounded-[3rem] text-center">
                    <div class="text-7xl mb-6">🌐</div>
                    <div class="text-2xl font-black text-yellow-500 uppercase tracking-widest">Browser Play</div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">Play Online Without Downloading Just Login and Go</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>You do not need to have the app installed to access your account and play. The Panda Master play online login through the browser-based web version gives you full access to your account and the complete game library without downloading or installing anything.</p>
                    <p>This works on Android browsers, iPhone and iPad browsers, and any desktop browser. Your game history, credits, and bonuses sync automatically between the app and the browser version, so you will not miss anything by switching between the two.</p>
                </div>
                <div class="mt-8">
                    <a href="{{ route('orionstar.play-online') }}" class="inline-block px-10 py-4 bg-white text-black font-black rounded-xl hover:bg-yellow-500 transition-colors uppercase tracking-tighter">Play in Browser</a>
                </div>
            </div>
        </section>

        <!-- Help Section -->
        <section class="p-10 bg-gray-900 border border-white/5 rounded-3xl text-center">
            <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Cannot Log In? Here Is How to Get Help</h2>
            <p class="text-gray-400 mb-8 max-w-3xl mx-auto leading-relaxed">
                If you are having trouble with your Panda Master login, the best first step is to reach out to the distributor who set up your account. They can reset your password and restore access quickly. If you cannot reach your distributor, the Panda Master support team is available around the clock through the platform's official social media channels and live chat.
            </p>
            <p class="text-gray-400 mb-8 max-w-3xl mx-auto leading-relaxed italic">
                Keep in mind that Panda Master does not have a self-serve password reset. Accounts are managed through the distributor network, so your distributor is always the fastest route to getting back in.
            </p>
            <a href="{{ route('contact') }}" class="inline-block px-10 py-4 bg-purple-600 text-white font-black rounded-xl hover:bg-purple-500 transition-colors uppercase tracking-tighter">Contact Support</a>
        </section>

        <!-- FAQ Section -->
        <section class="py-12 border-t border-white/5">
            <h2 class="text-4xl font-black mb-16 text-center uppercase tracking-tighter">Frequently Asked Questions</h2>
            <div class="max-w-4xl mx-auto space-y-6" x-data="{ active: null }">
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 1 ? null : 1" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">How do I login to Panda Master?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 1" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Open the Panda Master app or visit the web version in your browser. Enter the username and password that your distributor provided and tap Login. If you are logging in for the first time, you will need to get your credentials from a distributor first.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 2 ? null : 2" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is the Panda Master admin login?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 2" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        The Panda Master admin login is for distributors and platform managers who need access to the backend management system. It is separate from the player login portal and gives access to account creation, credit management, and distributor tools.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 3 ? null : 3" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Can I login and play without downloading the app?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 3" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. Your Panda Master play online login works through the browser. Visit the web portal, log in with your credentials, and you can play fish games and slots without installing anything.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 4 ? null : 4" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is the Pandamaster VIP login?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 4 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 4" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        The Pandamaster VIP login is the same login portal used by all players. Once you log in, your VIP status and all the associated bonuses and perks will be visible in your account dashboard.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 5 ? null : 5" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">How do I reset my Panda Master password?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 5 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 5" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Contact the distributor who set up your account and they can reset your password for you. If you cannot reach them, the Panda Master support team is available 24 hours a day through the platform's official channels.
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
