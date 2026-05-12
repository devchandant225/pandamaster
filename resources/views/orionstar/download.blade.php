@extends('layouts.app')

@section('title', 'Panda Master Download — Get the App on Android, iPhone and PC for Free')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-gray-950">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-black mb-8 uppercase tracking-tighter animate-fade-in-up">
                Panda Master Download
            </h1>
            <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s;">
                The Panda Master download is free and available for all major devices. Whether you are on Android, iPhone, or a Windows computer, you can have the app installed and ready to play in just a few minutes.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-6 animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="px-10 py-5 bg-yellow-500 text-black text-xl font-black rounded-2xl hover:bg-yellow-400 transition-all transform hover:-translate-y-1 shadow-lg uppercase">Download for Android</a>
                <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="px-10 py-5 bg-purple-600 text-white text-xl font-black rounded-2xl hover:bg-purple-500 transition-all transform hover:-translate-y-1 shadow-lg uppercase">Download for iPhone</a>
                <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="px-10 py-5 bg-white/10 text-white text-xl font-black rounded-2xl hover:bg-white/20 transition-all transform hover:-translate-y-1 border border-white/20 backdrop-blur-sm uppercase">Download for PC</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-24 space-y-24">
        <!-- Android Download -->
        <section class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">Download Panda Master for Android</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>The Panda Master APK for Android is a direct install file that does not go through the Google Play Store. This is standard for gaming platforms like Panda Master, and the file is safe, verified, and lightweight at around 93 MB.</p>
                    <p class="font-bold text-white">Here is how to install the Pandamaster download APK on your Android device:</p>
                    <ul class="space-y-4">
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">1</span>
                            <span>Tap the Download for Android button on this page. You will be directed to our trusted distributor's <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a> page where they will share the APK file with you directly.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">2</span>
                            <span>Once you have the file, go to Settings on your phone, then Security or Privacy, and turn on Install from Unknown Sources.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">3</span>
                            <span>Open the APK file from your notification bar or your phone's file manager.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">4</span>
                            <span>Tap Install and give it a few seconds to complete.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 bg-yellow-500 text-black rounded-full flex items-center justify-center font-black">5</span>
                            <span>Open the app, enter your login credentials, and you are ready to play.</span>
                        </li>
                    </ul>
                    <p class="text-sm italic">If your phone shows a warning when you try to install, that is just Android's standard caution for apps outside the Play Store. Tap Install Anyway and the app will install without any issues. The Panda Master download APK is compatible with Android 5.0 and above.</p>
                </div>
                <div class="mt-8">
                    <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="inline-block px-10 py-4 bg-yellow-500 text-black font-black rounded-xl hover:bg-yellow-400 transition-colors uppercase tracking-tighter shadow-lg">Download Panda Master APK</a>
                </div>
            </div>
            <div class="bg-gray-900 border border-white/5 p-10 rounded-[3rem] text-center">
                <div class="text-8xl mb-6">🤖</div>
                <div class="text-2xl font-black text-yellow-500 uppercase tracking-widest">Android Optimized</div>
            </div>
        </section>

        <!-- iPhone Download -->
        <section class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1">
                <div class="bg-gray-800 border border-white/5 p-10 rounded-[3rem] text-center">
                    <div class="text-8xl mb-6">🍎</div>
                    <div class="text-2xl font-black text-purple-500 uppercase tracking-widest">iOS Ready</div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">Download Panda Master for iPhone and iOS</h2>
                <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
                    <p>Getting Panda Master on your iPhone or iPad is just as simple. Tap the Download for iPhone button on this page and you will be directed to our trusted distributor's <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a> page. Connect with them there and they will provide you with the installation file along with step-by-step guidance to get it onto your device.</p>
                    <p>Once you have the file installed, your login and game experience on iPhone are identical to the Android version. Same games, same account, same bonuses. If you run into any questions during installation, your distributor is available to walk you through it.</p>
                </div>
                <div class="mt-8">
                    <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="inline-block px-10 py-4 bg-purple-600 text-white font-black rounded-xl hover:bg-purple-500 transition-colors uppercase tracking-tighter shadow-lg">Download for iPhone</a>
                </div>
            </div>
        </section>

        <!-- PC Download -->
        <section class="p-10 bg-gray-900 border border-white/5 rounded-3xl text-center">
            <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Download Panda Master for Windows PC</h2>
            <p class="text-gray-400 mb-8 max-w-3xl mx-auto leading-relaxed">
                You can also play Panda Master on your Windows laptop or desktop. The PC version is a downloadable EXE file that installs like any standard Windows application. Tap the Download for PC button, get the file from our distributor <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">[Facebook Link]</a>, install it, and log in with your account credentials.
            </p>
            <p class="text-gray-400 mb-8 max-w-3xl mx-auto leading-relaxed">
                The desktop version gives you a larger screen experience and smoother controls for games like the fish shooting titles. If you have been playing on mobile and want to try Panda Master on a bigger screen, the PC download is worth it.
            </p>
            <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="inline-block px-10 py-4 bg-white text-black font-black rounded-xl hover:bg-yellow-500 transition-colors uppercase tracking-tighter">Download for PC</a>
        </section>

        <!-- Panda Master 777 & Fire Kirin -->
        <section class="grid lg:grid-cols-2 gap-12">
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Panda Master 777 APK Download</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">Looking for the Panda Master 777 APK specifically? The 777 version of the platform has its own dedicated APK for Android. The Panda Master 777 APK download process works exactly the same way as the standard Android install. Connect with our distributor on <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a>, get the 777 APK file, and follow the same installation steps above.</p>
                <a href="{{ route('orionstar.777') }}" class="text-yellow-500 font-bold uppercase tracking-widest hover:text-yellow-400 transition-colors">Download Panda Master 777 APK →</a>
            </div>
            <div class="p-10 bg-gray-900 border border-white/5 rounded-3xl">
                <h2 class="text-3xl font-black mb-6 uppercase tracking-tighter">Fire Kirin XYZ App and Download</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">You may have come across the Fire Kirin XYZ app or been looking for a Fire Kirin XYZ download for Android. Fire Kirin is the original platform that Panda Master was built from. The same development team created both, and the two platforms share a lot of the same game DNA.</p>
                <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-purple-500 font-bold uppercase tracking-widest hover:text-purple-400 transition-colors">Get Fire Kirin XYZ App →</a>
            </div>
        </section>

        <!-- Next Steps -->
        <section class="bg-gradient-to-br from-yellow-500/10 to-purple-500/10 border border-white/10 rounded-[3rem] p-12 lg:p-16 text-center">
            <h2 class="text-4xl font-black mb-8 uppercase tracking-tighter">What Comes Next After You Download</h2>
            <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto">
                Once your Panda Master download is done and the app is installed, you will need an account to log in. If you already have credentials, enter them and start exploring the game lobby. If you are a new player, connect with our distributor on <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a> and they will get your account ready within a short time.
            </p>
            <a href="{{ $adminSettings->login_url ?? '#' }}" class="inline-block bg-white text-black px-12 py-5 rounded-2xl text-2xl font-black hover:bg-yellow-500 transition-colors uppercase tracking-tighter shadow-lg">Login After Download</a>
        </section>

        <!-- FAQ Section -->
        <section class="py-12 border-t border-white/5">
            <h2 class="text-4xl font-black mb-16 text-center uppercase tracking-tighter">Frequently Asked Questions</h2>
            <div class="max-w-4xl mx-auto space-y-6" x-data="{ active: null }">
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 1 ? null : 1" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is the Panda Master APK free to download?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 1" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. The Panda Master APK download is completely free on all platforms. There is no cost to download or install the app.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 2 ? null : 2" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Is the Panda Master download APK safe to install?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 2" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Yes. The Pandamaster download APK available through our distributor is verified and safe. The warning Android shows during installation is a standard message for any app installed outside the Play Store.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 3 ? null : 3" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">How do I download Panda Master on iPhone?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 3" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Tap the Download for iPhone button on this page. You will be connected to our trusted distributor on <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a> who will provide the installation file and guide you through the process.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 4 ? null : 4" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">What is the Panda Master 777 APK download?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 4 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 4" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        The Panda Master 777 APK download is the installation file for the 777-branded version of the platform. It installs the same way as the standard APK and gives access to the same game library with its own dedicated login portal.
                    </div>
                </div>
                <div class="bg-gray-900 border border-white/5 rounded-2xl overflow-hidden">
                    <button @click="active = active === 5 ? null : 5" class="w-full p-6 text-left flex justify-between items-center">
                        <span class="text-lg font-black text-white uppercase">Where can I find the Fire Kirin XYZ download for Android?</span>
                        <span class="text-yellow-500 text-2xl" x-text="active === 5 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 5" class="p-6 pt-0 text-gray-400 border-t border-white/5">
                        Fire Kirin XYZ is the sister platform to Panda Master. You can find the Fire Kirin XYZ download for Android through our distributor network on <a href="{{ $adminSettings->facebook ?? '#' }}" target="_blank" class="text-yellow-500 font-bold hover:underline">Facebook</a>.
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
