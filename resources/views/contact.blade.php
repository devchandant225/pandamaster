@extends('layouts.app')

@section('title', 'Contact Us - Panda Master VIP')

@section('content')
<div class="min-h-screen bg-black relative overflow-hidden">
    <!-- Sophisticated Background Lighting -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="absolute top-1/4 -left-20 w-[600px] h-[600px] bg-yellow-500/5 rounded-full blur-[150px] animate-pulse"></div>
        <div class="absolute bottom-1/4 -right-20 w-[800px] h-[800px] bg-purple-500/5 rounded-full blur-[150px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <!-- Stars Animation -->
    <div class="absolute inset-0 pointer-events-none">
        @for($i = 0; $i < 40; $i++)
            <div class="absolute w-[1px] h-[1px] bg-white rounded-full animate-twinkle" 
                 style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(3000, 6000) }}ms;"></div>
        @endfor
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 py-20 md:py-32">
        <div class="text-center mb-16 animate-fade-in-up">
            <h1 class="text-6xl sm:text-7xl md:text-8xl font-black mb-6 leading-[0.9] tracking-tighter">
                GET IN <span class="bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 bg-clip-text text-transparent text-glow-yellow">TOUCH</span>
            </h1>
            <p class="text-2xl text-gray-400 font-bold tracking-tight">Have questions? We're here to help you win big!</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-16 items-start">
            <!-- Contact Info -->
            <div class="space-y-8 animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="bg-white/5 border border-white/10 p-10 rounded-[2.5rem] backdrop-blur-xl">
                    <h2 class="text-3xl font-black text-white mb-8 uppercase tracking-tighter flex items-center gap-3">
                        <span class="w-8 h-1 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full"></span>
                        Contact Info
                    </h2>
                    
                    <div class="space-y-10">
                        <div class="flex items-center gap-6 group">
                            <div class="w-16 h-16 bg-yellow-500/10 rounded-2xl flex items-center justify-center border border-yellow-500/20 group-hover:border-yellow-500/50 transition-all">
                                <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-1">Email Us</p>
                                @if(isset($adminSettings) && $adminSettings->email)
                                    <a href="mailto:{{ $adminSettings->email }}" class="text-xl font-bold text-white hover:text-yellow-500 transition-colors">{{ $adminSettings->email }}</a>
                                @else
                                    <a href="mailto:support@pandamaster.vip" class="text-xl font-bold text-white hover:text-yellow-500 transition-colors">support@pandamaster.vip</a>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center gap-6 group">
                            <div class="w-16 h-16 bg-green-500/10 rounded-2xl flex items-center justify-center border border-green-500/20 group-hover:border-green-500/50 transition-all">
                                @if(isset($adminSettings) && $adminSettings->whatsapp)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $adminSettings->whatsapp) }}" target="_blank">
                                        <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                    </a>
                                @else
                                    <span class="text-2xl">💬</span>
                                @endif
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-1">WhatsApp</p>
                                @if(isset($adminSettings) && $adminSettings->whatsapp)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $adminSettings->whatsapp) }}" target="_blank" class="text-xl font-bold text-white hover:text-green-500 transition-colors">{{ $adminSettings->whatsapp }}</a>
                                @else
                                    <p class="text-xl font-bold text-white">Contact for VIP Support</p>
                                @endif
                            </div>
                        </div>

                        @if(isset($adminSettings) && $adminSettings->telegram)
                        <div class="flex items-center gap-6 group">
                            <div class="w-16 h-16 bg-blue-500/10 rounded-2xl flex items-center justify-center border border-blue-500/20 group-hover:border-blue-500/50 transition-all">
                                <a href="https://t.me/{{ Str::afterLast($adminSettings->telegram, '/') }}" target="_blank">
                                    <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.568 8.16l-1.68 8.28c-.12.56-.44.7-.89.44l-2.44-1.8-1.18 1.14c-.13.13-.24.24-.49.24l.18-2.52 4.56-4.12c.2-.18-.04-.27-.3-.1l-5.64 3.56-2.42-.76c-.52-.16-.53-.52.11-.77l9.46-3.64c.44-.16.82.1.68.77z"/></svg>
                                </a>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-1">Telegram</p>
                                <a href="https://t.me/{{ Str::afterLast($adminSettings->telegram, '/') }}" target="_blank" class="text-xl font-bold text-white hover:text-blue-500 transition-colors">{{ $adminSettings->telegram }}</a>
                            </div>
                        </div>
                        @endif

                        <div class="flex items-center gap-6 group">
                            <div class="w-16 h-16 bg-blue-500/10 rounded-2xl flex items-center justify-center border border-blue-500/20 group-hover:border-blue-500/50 transition-all">
                                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-1">Working Hours</p>
                                <p class="text-xl font-bold text-white">24/7 Premium Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-gray-900/50 p-10 rounded-[3rem] border border-white/5 backdrop-blur-xl animate-fade-in-up" style="animation-delay: 0.2s;">
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-4">Full Name</label>
                            <input type="text" name="name" required class="w-full px-6 py-4 bg-black/40 border-2 border-white/5 rounded-2xl text-white font-bold focus:outline-none focus:border-yellow-500/50 transition-all" placeholder="John Doe">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-4">Email Address</label>
                            <input type="email" name="email" required class="w-full px-6 py-4 bg-black/40 border-2 border-white/5 rounded-2xl text-white font-bold focus:outline-none focus:border-purple-500/50 transition-all" placeholder="john@example.com">
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-4">Subject</label>
                        <input type="text" name="subject" required class="w-full px-6 py-4 bg-black/40 border-2 border-white/5 rounded-2xl text-white font-bold focus:outline-none focus:border-purple-500/50 transition-all" placeholder="How can we help?">
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-4">Your Message</label>
                        <textarea name="message" required rows="5" class="w-full px-6 py-4 bg-black/40 border-2 border-white/5 rounded-2xl text-white font-bold focus:outline-none focus:border-yellow-500/50 transition-all" placeholder="Tell us everything..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-yellow-500 via-purple-500 to-purple-600 text-white font-black py-6 rounded-2xl text-2xl transition-all shadow-[0_0_30px_rgba(234,179,8,0.3)] hover:shadow-[0_0_50px_rgba(234,179,8,0.5)] transform hover:-translate-y-1.5 animate-shine overflow-hidden uppercase tracking-tighter">
                        🚀 Send Message Now
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes twinkle {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.3); }
    }

    @keyframes fade-in-up {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .animate-twinkle {
        animation: twinkle 4s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }
</style>
@endsection
