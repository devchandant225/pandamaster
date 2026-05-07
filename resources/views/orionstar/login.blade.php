@extends('layouts.app')

@section('title', 'Orion Stars Login - Access Your Player Account')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-gray-950 border-b border-white/5">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(168,85,247,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-black mb-8 leading-tight animate-fade-in-up uppercase tracking-tighter">
                Fast & Easy Orion Stars Login to Your Account
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-12 max-w-4xl mx-auto font-medium leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                Need to get into your account? This is the right page. Your orion stars login is straightforward, just enter your username and password and you're in. Whether you're a regular player coming back for another session or a new player setting up your account for the first time, we've got everything you need right here.
            </p>
            <div class="flex flex-wrap justify-center gap-6 animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ $adminSettings->login_url ?? '#login-form' }}" class="px-10 py-5 bg-yellow-500 text-black text-xl font-black rounded-2xl hover:bg-yellow-400 transition-all transform hover:-translate-y-1.5 shadow-lg">Login to Orion Stars</a>
                <a href="{{ $adminSettings->register_url ?? '#sign-up' }}" class="px-10 py-5 bg-purple-600 text-white text-xl font-black rounded-2xl hover:bg-purple-500 transition-all transform hover:-translate-y-1.5 shadow-lg">Register New Account</a>
                <a href="{{ $adminSettings->external_dashboard_url ?? route('orionstar.play-online') }}" class="px-10 py-5 bg-white/10 text-white text-xl font-black rounded-2xl hover:bg-white/20 transition-all transform hover:-translate-y-1.5 border border-white/20 backdrop-blur-sm">Play Without Downloading</a>
            </div>
        </div>
    </section>

    <!-- Login Form Section -->
    <section id="login-form" class="py-24 bg-gray-900 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-start">
                <div>
                    <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">Fast Player Login to the Game</h2>
                    <div class="space-y-6 text-gray-400 text-lg">
                        <p>Your orion stars online login works the same way on any device. Open the app or visit the web version in your browser, enter your credentials, and you're straight into the game lobby. The whole process takes less than 30 seconds once your account is set up.</p>
                        <p>A lot of returning players ask about fast orion stars login options. The quickest way is to save your login credentials on your device so the app fills them in automatically. For easy orion stars login on browser, you can also bookmark the login page so you don't have to go searching for it.</p>
                        <p>If you're logging in through the web version, your orion stars web login works on any browser whether it’s Chrome, Safari, Firefox, or whatever you normally use.</p>
                    </div>
                    
                    <div class="mt-12 p-8 bg-purple-900/20 border border-purple-500/30 rounded-[2rem]">
                        <h3 class="text-2xl font-black text-white mb-4 uppercase tracking-tighter">VIP Premium Login</h3>
                        <p class="text-gray-300">If you're a VIP player, your orion stars vip login takes you directly to your premium dashboard. VIP accounts have access to exclusive bonuses, higher game limits, and priority support.</p>
                    </div>
                </div>

                <div class="bg-gray-800 border border-white/10 p-10 rounded-[3rem] shadow-2xl relative">
                    <div class="absolute -top-6 -right-6 w-20 h-20 bg-yellow-500 rounded-full flex items-center justify-center text-4xl shadow-lg">🎰</div>
                    <h2 class="text-3xl font-black mb-8 text-center uppercase tracking-tighter">Login to Play</h2>
                    
                    <div class="space-y-6">
                        <p class="text-gray-400 text-center font-medium">Ready to jump into the action? You can log in and play Orion Stars directly in your browser or through the mobile app.</p>
                        
                        <div class="p-6 bg-yellow-500/10 border border-yellow-500/20 rounded-2xl mb-8">
                            <h4 class="text-white font-black uppercase mb-2 tracking-tighter">Browser Play</h4>
                            <p class="text-sm text-gray-400">Instant access to all fish games and slots without any downloads. Works on Android, iPhone, and PC.</p>
                        </div>

                        <a href="{{ $adminSettings->external_dashboard_url ?? route('orionstar.play-online') }}" class="block w-full py-6 bg-yellow-500 text-black text-center text-xl font-black rounded-2xl hover:bg-yellow-400 transition-all transform hover:-translate-y-1 shadow-lg uppercase tracking-tighter">
                            Play Online Now →
                        </a>
                        
                        <div class="text-center">
                            <a href="{{ $adminSettings->login_url ?? route('orionstar.download') }}" class="text-purple-500 font-black uppercase tracking-widest text-sm hover:text-purple-400">
                                Download Mobile App
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sign Up Section -->
    <section id="sign-up" class="py-24 bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black mb-4 uppercase tracking-tighter">New to Orion Stars? Here's How to Sign Up</h2>
                <p class="text-xl text-gray-400">Orion Stars accounts aren't created through a traditional sign-up form.</p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="bg-gray-900 p-10 rounded-[3rem] border border-white/5">
                    <ul class="space-y-8">
                        <li class="flex gap-6">
                            <span class="flex-shrink-0 w-12 h-12 bg-purple-600 rounded-2xl flex items-center justify-center font-black text-xl">1</span>
                            <p class="text-gray-400 text-lg">Search for Orion Stars distributors on Facebook — look for pages with good reviews and active posts</p>
                        </li>
                        <li class="flex gap-6">
                            <span class="flex-shrink-0 w-12 h-12 bg-purple-600 rounded-2xl flex items-center justify-center font-black text-xl">2</span>
                            <p class="text-gray-400 text-lg">You can find our trusted and reliable distributor on Facebook and connect with them directly</p>
                        </li>
                        <li class="flex gap-6">
                            <span class="flex-shrink-0 w-12 h-12 bg-purple-600 rounded-2xl flex items-center justify-center font-black text-xl">3</span>
                            <p class="text-gray-400 text-lg">Message a distributor and tell them you want to set up a new player account</p>
                        </li>
                        <li class="flex gap-6">
                            <span class="flex-shrink-0 w-12 h-12 bg-purple-600 rounded-2xl flex items-center justify-center font-black text-xl">4</span>
                            <p class="text-gray-400 text-lg">They'll ask for your name and a preferred password, then send you your login credentials</p>
                        </li>
                        <li class="flex gap-6">
                            <span class="flex-shrink-0 w-12 h-12 bg-purple-600 rounded-2xl flex items-center justify-center font-black text-xl">5</span>
                            <p class="text-gray-400 text-lg">Use those credentials to log in through the app or web version</p>
                        </li>
                    </ul>
                </div>
                <div>
                    <div class="space-y-8 text-gray-400 text-lg">
                        <p>The orion stars register process through a distributor might seem a little different to what you're used to, but it's actually fast and easy. Most distributors respond within a few hours, and some are online 24/7.</p>
                        <p>Once your orion stars online account is set up, you can use it to play on the app, the browser version, or both. Your game history, credits, and bonuses are all tied to the account and not the device.</p>
                        <div class="p-8 bg-yellow-500/10 border border-yellow-500/20 rounded-3xl">
                            <h3 class="text-white font-black uppercase mb-4 tracking-tighter text-xl">Play Without Downloading</h3>
                            <p>Don't have the app installed? You can still access your account and play. The orion stars login online play without downloading option lets you play fish games and slots directly in your browser.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Section -->
    <section class="py-24 bg-gray-900 border-y border-white/5 text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">Forgot Your Password or Can't Log In?</h2>
            <p class="text-xl text-gray-400 mb-12 leading-relaxed">
                If you're having trouble with your orion stars account login, the easiest solution is to reach out to the distributor who set up your account. They can reset your password and get you back in quickly. The Orion Stars support team is also available 24/7 through the platform's official social media channels.
            </p>
            <a href="{{ route('contact') }}" class="inline-block px-12 py-5 bg-white text-black text-xl font-black rounded-2xl hover:bg-yellow-500 transition-colors uppercase tracking-tighter">Contact Support Now</a>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-24 bg-gray-950">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-black mb-16 text-center uppercase tracking-tighter">Frequently Asked Questions</h2>
            <div class="space-y-6" x-data="{ active: null }">
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 1 ? null : 1" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">How do I login to Orion Stars?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 1" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Open the Orion Stars app or visit the web version in your browser. Enter the username and password provided by your distributor and tap Login.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 2 ? null : 2" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is the Orion Stars VIP login?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 2" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        The orion stars vip login is the same login portal as a regular player account. Once you log in, your VIP status and all associated bonuses will be visible.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 3 ? null : 3" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">How do I create an account?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 3" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Find an authorised distributor on Facebook, message them with your name and preferred password, and they'll send you your login credentials.
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { opacity: 0; animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
</style>
@endsection
