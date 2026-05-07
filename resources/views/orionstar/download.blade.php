@extends('layouts.app')

@section('title', 'Orion Stars App Download - Android APK, iPhone & PC')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-gray-950">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(168,85,247,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-8 leading-tight animate-fade-in-up uppercase tracking-tighter">
                Orion Stars App Download on Android, iPhone & PC
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-12 max-w-4xl mx-auto font-medium leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                Ready to get the app? The orion stars download is available for all major devices, including Android phones and tablets, iPhone and iPad, and Windows PC. Pick your device below and follow the steps.
            </p>
            <div class="grid sm:grid-cols-3 gap-8 max-w-4xl mx-auto animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="#android" class="group bg-gray-900 border border-white/5 p-8 rounded-[2.5rem] hover:border-yellow-500 transition-all transform hover:-translate-y-2">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">🤖</div>
                    <div class="text-xl font-black uppercase tracking-tighter">Android</div>
                </a>
                <a href="#ios" class="group bg-gray-900 border border-white/5 p-8 rounded-[2.5rem] hover:border-purple-500 transition-all transform hover:-translate-y-2">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">🍎</div>
                    <div class="text-xl font-black uppercase tracking-tighter">iPhone</div>
                </a>
                <a href="#pc" class="group bg-gray-900 border border-white/5 p-8 rounded-[2.5rem] hover:border-yellow-500 transition-all transform hover:-translate-y-2">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">💻</div>
                    <div class="text-xl font-black uppercase tracking-tighter">PC</div>
                </a>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 py-24 space-y-32">
        <!-- Android Section -->
        <section id="android" class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <h2 class="text-4xl font-black uppercase tracking-tighter">Download Orion Stars APK for Android</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>The orion stars download for android works as an APK file, which means you install it directly on your phone without going through the Google Play Store. This is completely normal for gaming apps like Orion Stars, and the file is safe and verified.</p>
                    <p class="font-black text-white uppercase text-sm tracking-widest">Installation Steps:</p>
                    <ul class="space-y-4">
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">1</span>
                            <span>Tap the Download button below.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">2</span>
                            <span>Enable 'Install from unknown sources' in Settings → Security.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">3</span>
                            <span>Open the APK file from your downloads.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">4</span>
                            <span>Tap Install and wait for it to finish.</span>
                        </li>
                    </ul>
                </div>
                <a href="{{ $adminSettings->login_url ?? '#' }}" class="inline-block bg-yellow-500 text-black px-12 py-5 rounded-2xl text-xl font-black hover:bg-yellow-400 transition-colors uppercase tracking-tighter shadow-lg">Download Orion Stars APK</a>
            </div>
            <div class="bg-gray-900 border border-white/5 p-12 rounded-[3rem] text-center">
                <div class="text-[180px]">🤖</div>
            </div>
        </section>

                <!-- VIP 8580 Section -->
        <section class="p-12 bg-gradient-to-br from-yellow-500/10 to-purple-600/10 rounded-[3rem] border border-white/10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 text-center">
                    <div class="text-8xl mb-6">💎</div>
                    <div class="text-3xl font-black uppercase tracking-tighter">VIP 8580 APK</div>
                </div>
                <div class="order-1 lg:order-2 space-y-6">
                    <h2 class="text-3xl font-black uppercase tracking-tighter">Download Orion Stars VIP 8580 APK</h2>
                    <p class="text-gray-400 text-lg">Looking for the orion stars vip 8580 apk? This is the VIP version of the platform, accessible at port 8580. It gives you direct access to the VIP login portal and game lobby. The download process is the same as the standard APK.</p>
                    <a href="{{ $adminSettings->login_url ?? '#' }}" class="inline-block bg-white text-black px-8 py-3 rounded-xl font-black uppercase tracking-tighter hover:bg-yellow-500 transition-colors">Download VIP APK →</a>
                </div>
            </div>
        </section>

        <!-- iOS Section -->
        <section id="ios" class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1 bg-gray-900 border border-white/5 p-12 rounded-[3rem] text-center">
                <div class="text-[180px]">🍎</div>
            </div>
            <div class="order-1 lg:order-2 space-y-8">
                <h2 class="text-4xl font-black uppercase tracking-tighter">Download for iPhone & iOS</h2>
                <div class="space-y-6 text-gray-400 text-lg">
                    <p>The orion stars download ios is available through the App Store or as a direct browser install. iPhone and iPad users can install the app by following the on-screen prompts after tapping the iOS download button.</p>
                    <p>Once installed, your login and game experience are identical to the Android version — same games, same account, same bonuses.</p>
                </div>
                <a href="{{ $adminSettings->login_url ?? '#' }}" class="inline-block bg-purple-600 text-white px-12 py-5 rounded-2xl text-xl font-black hover:bg-purple-500 transition-colors uppercase tracking-tighter shadow-lg">Download for iPhone</a>
            </div>
        </section>

        <!-- 777 APK Section -->
        <section class="py-24 bg-gray-900 border border-white/5 rounded-[3rem] px-12">
            <div class="text-center max-w-4xl mx-auto">
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">Download Orion Stars 777 APK</h2>
                <p class="text-xl text-gray-400 mb-12 leading-relaxed">If you're specifically after the orion stars 777 download, this is the 777-branded version of the platform. It installs the same way as the standard APK and covers the full game library including fish games, slots, and sweepstakes.</p>
                <a href="{{ $adminSettings->login_url ?? '#' }}" class="inline-block bg-yellow-500 text-black px-12 py-6 rounded-2xl text-2xl font-black hover:bg-yellow-400 transition-all uppercase tracking-tighter shadow-2xl">Download Orion Stars 777 APK</a>
            </div>
        </section>

        <!-- Installation Guide Section -->
        <section class="bg-gray-800 p-16 rounded-[4rem] border border-white/10 relative overflow-hidden">
            <div class="absolute top-0 right-0 p-8 text-8xl opacity-10">📥</div>
            <h2 class="text-4xl font-black mb-16 uppercase tracking-tighter">How to Install the Orion Stars APK</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="space-y-4">
                    <div class="text-2xl font-black text-yellow-500">Step 1</div>
                    <p class="text-gray-400">Download the APK file by tapping the relevant button on this page.</p>
                </div>
                <div class="space-y-4">
                    <div class="text-2xl font-black text-yellow-500">Step 2</div>
                    <p class="text-gray-400">Open your Android Settings and go to Security or Privacy.</p>
                </div>
                <div class="space-y-4">
                    <div class="text-2xl font-black text-yellow-500">Step 3</div>
                    <p class="text-gray-400">Find 'Unknown Sources' or 'Install Unknown Apps' and enable it.</p>
                </div>
                <div class="space-y-4">
                    <div class="text-2xl font-black text-yellow-500">Step 4</div>
                    <p class="text-gray-400">Go to your Downloads folder and tap the APK file.</p>
                </div>
                <div class="space-y-4">
                    <div class="text-2xl font-black text-yellow-500">Step 5</div>
                    <p class="text-gray-400">Tap 'Install' when prompted. It only takes a few seconds.</p>
                </div>
                <div class="space-y-4">
                    <div class="text-2xl font-black text-yellow-500">Step 6</div>
                    <p class="text-gray-400">Open the app, enter your credentials, and you're in!</p>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <div class="py-24 border-t border-white/5">
            <h2 class="text-4xl font-black mb-16 text-center uppercase tracking-tighter">Frequently Asked Questions</h2>
            <div class="max-w-4xl mx-auto space-y-6" x-data="{ active: null }">
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 1 ? null : 1" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is the Orion Stars APK free to download?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 1" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. The orion stars apk download is completely free. There's no cost to download or install the app on any device.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 2 ? null : 2" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is it safe to install?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 2" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. The orionstars download apk available on this page is verified and safe. Android might show a standard warning for apps outside the Play Store, but the file is secure.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 3 ? null : 3" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is the VIP 8580 APK?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 3" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        The orion stars vip 8580 apk is the VIP version of the platform, configured for access through port 8580. It gives you access to the VIP login portal.
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
</style>
@endsection
