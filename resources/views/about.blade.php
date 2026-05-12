@extends('layouts.app')

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

    <!-- Hero Section -->
    <section class="relative py-24 lg:py-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-3 px-6 py-2 bg-yellow-500/10 border border-yellow-500/30 rounded-full text-xs text-yellow-500 font-black uppercase tracking-[0.3em] mb-10 animate-fade-in-down shadow-lg shadow-yellow-500/5">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-yellow-500"></span>
                </span>
                {{ $about->title ?? 'The Panda Master VIP Experience' }}
            </div>

            <h1 class="text-6xl md:text-8xl lg:text-9xl font-black mb-10 leading-[0.85] tracking-tighter animate-fade-in-up">
                @if($about->title)
                    {!! str_replace(['Level', 'LEVEL'], '<span class="bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 bg-clip-text text-transparent text-glow-yellow uppercase">LEVEL</span>', e($about->title)) !!}
                @else
                    REDEFINING THE <span class="bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 bg-clip-text text-transparent text-glow-yellow uppercase">LEVEL</span> OF PLAY
                @endif
            </h1>
            
            <div class="prose prose-invert prose-lg max-w-4xl mx-auto text-gray-400 mb-16 leading-relaxed font-bold tracking-tight animate-fade-in-up" style="animation-delay: 0.2s;">
                @if($about->description)
                    {!! $about->description !!}
                @else
                    <p class="text-2xl md:text-3xl">We're not just another gaming platform. We're your gateway to immersive experiences, high-stakes thrills, and a community built for winners.</p>
                @endif
            </div>

            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ $about->cta_url ?? route('contact') }}" class="group relative px-14 py-6 bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 text-white text-2xl font-black rounded-[2rem] transition-all shadow-[0_0_30px_rgba(234,179,8,0.4)] hover:shadow-[0_0_50px_rgba(234,179,8,0.6)] transform hover:-translate-y-1.5 overflow-hidden animate-shine hover-glow">
                    <span class="relative z-10 uppercase tracking-tighter">🚀 {{ $about->cta_label ?? 'JOIN THE ELITE' }}</span>
                </a>
                <a href="{{ route('games.index') }}" class="px-14 py-6 bg-gray-900/50 hover:bg-gray-800 text-white text-2xl font-black rounded-[2rem] transition-all border-2 border-gray-700 hover:border-yellow-500 shadow-xl backdrop-blur-sm transform hover:-translate-y-1.5 uppercase tracking-tighter">
                    Explore Games
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    @if($about->stats && count($about->stats) > 0)
    <section class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($about->stats as $index => $stat)
                <div class="group relative p-10 rounded-[2.5rem] bg-white/5 border border-white/10 hover:border-{{ ['yellow','purple','blue','green'][$index % 4] }}-500/50 transition-all text-center">
                    <div class="text-5xl md:text-6xl font-black text-{{ ['yellow','purple','blue','green'][$index % 4] }}-500 mb-3 group-hover:scale-110 transition-transform text-glow-{{ ['yellow','purple','blue','green'][$index % 4] }} tracking-tighter">{{ $stat['value'] ?? '' }}</div>
                    <div class="text-gray-500 font-black uppercase tracking-widest text-[10px]">{{ $stat['label'] ?? '' }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Our Story -->
    <section class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <div class="animate-fade-in-up">
                    <h2 class="text-5xl md:text-6xl font-black mb-8 tracking-tighter uppercase">
                        OUR <span class="bg-gradient-to-r from-purple-500 to-purple-600 bg-clip-text text-transparent">LEGACY</span>
                    </h2>
                    <div class="space-y-6 text-gray-400 leading-relaxed text-xl font-medium">
                        @if($about->description)
                             {!! $about->description !!}
                        @else
                            <p>
                                Born from the passion for high-octane gaming, <span class="text-white font-black tracking-widest uppercase">Panda Master VIP</span> was created with one mission: to build the most immersive, rewarding, and secure online fish gaming ecosystem in the world.
                            </p>
                        @endif
                    </div>
                </div>

                <div class="relative group animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="absolute -inset-4 bg-gradient-to-r from-yellow-500 via-purple-500 to-purple-600 rounded-[3.5rem] opacity-20 blur-2xl group-hover:opacity-40 transition-opacity duration-700"></div>
                    <img
                        src="{{ $about->image_url ?? 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=1200' }}"
                        alt="{{ $about->image_alt ?? 'Pro Gaming Setup' }}"
                        class="relative rounded-[3rem] shadow-2xl border border-white/10 grayscale-[0.2] group-hover:grayscale-0 transition-all duration-700"
                    />
                    <div class="absolute -bottom-10 -left-10 bg-black/80 backdrop-blur-xl border border-white/10 p-10 rounded-[2.5rem] shadow-2xl group-hover:-translate-y-2 transition-transform duration-500">
                        <div class="text-5xl font-black text-yellow-500 mb-1 tracking-tighter text-glow-yellow">#1</div>
                        <div class="text-xs font-black text-gray-400 uppercase tracking-widest">Global Platform</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQs Section -->
    @if($about->faqs && count($about->faqs) > 0)
    <section class="py-24 relative overflow-hidden bg-white/5 border-y border-white/10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black mb-4 tracking-tighter uppercase text-white">FREQUENTLY ASKED <span class="text-yellow-500">QUESTIONS</span></h2>
            </div>
            
            <div class="space-y-4" x-data="{ active: null }">
                @foreach($about->faqs as $index => $faq)
                    <div class="border border-white/10 rounded-2xl overflow-hidden bg-black/40">
                        <button @click="active = (active === {{ $index }} ? null : {{ $index }})" class="w-full flex items-center justify-between p-6 text-left hover:bg-white/5 transition-colors">
                            <span class="text-lg font-black uppercase tracking-tight text-white">{{ $faq['question'] ?? '' }}</span>
                            <svg class="w-6 h-6 transform transition-transform text-gray-400" :class="active === {{ $index }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="active === {{ $index }}" x-collapse x-cloak>
                            <div class="p-6 pt-0 text-gray-400 leading-relaxed border-t border-white/10 prose prose-invert prose-sm max-w-none">
                                {!! $faq['answer'] ?? '' !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Final CTA -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(234,179,8,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-6xl sm:text-7xl md:text-8xl font-black mb-8 leading-[0.85] tracking-tighter uppercase">
                READY TO BECOME A <span class="bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 bg-clip-text text-transparent text-glow-yellow">LEGEND?</span>
            </h2>
            <p class="text-2xl md:text-3xl text-gray-300 mb-16 font-bold tracking-tight uppercase">
                {{ $about->cta_label ?? 'The next massive jackpot has your name on it' }}
            </p>

            <div class="flex flex-wrap justify-center gap-10">
                <a href="{{ $about->cta_url ?? ($adminSettings->register_url ?? '#') }}" class="group relative inline-block bg-gradient-to-r from-yellow-500 via-purple-500 to-purple-600 text-white px-20 py-8 text-3xl font-black rounded-[2rem] shadow-[0_0_50px_rgba(234,179,8,0.4)] transition-all transform hover:-translate-y-2 animate-shine overflow-hidden">
                    <span class="relative z-10 uppercase tracking-tighter">🚀 {{ $about->cta_label ?? 'START PLAYING NOW' }}</span>
                </a>
            </div>
        </div>
    </section>
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

    @keyframes fade-in-down {
        0% { opacity: 0; transform: translateY(-40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .animate-twinkle {
        animation: twinkle 4s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .animate-fade-in-down {
        animation: fade-in-down 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    [x-cloak] { display: none !important; }
</style>
@endsection
