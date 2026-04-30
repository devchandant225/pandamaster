@extends('layouts.app')

@section('title', ($game->meta_title ?: $game->title) . ' - Orion Star VIP')

@section('content')
<div class="min-h-screen bg-black relative overflow-hidden font-sans selection:bg-yellow-500 selection:text-black">
    <!-- Hero Section -->
    <section class="relative min-h-[80vh] flex items-center pt-24 pb-20 overflow-hidden">
        <!-- Background Visuals -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,0.8)_0%,rgba(0,0,0,1)_100%)]"></div>
            <img src="{{ $game->thumbnail }}" class="absolute inset-0 w-full h-full object-cover opacity-20 blur-xl scale-110" alt="Background">
            <div class="absolute top-1/4 -left-20 w-[600px] h-[600px] bg-yellow-500/10 rounded-full blur-[150px] animate-pulse"></div>
            <div class="absolute bottom-1/4 -right-20 w-[800px] h-[800px] bg-purple-500/10 rounded-full blur-[150px] animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 w-full">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-3 mb-12 text-[10px] font-black uppercase tracking-[0.3em] animate-fade-in-up">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-white transition-colors">Home</a>
                <span class="text-gray-800">/</span>
                <a href="{{ route('games.index') }}" class="text-gray-500 hover:text-white transition-colors">Games</a>
                <span class="text-gray-800">/</span>
                <span class="text-yellow-500">{{ $game->title }}</span>
            </nav>

            <div class="grid lg:grid-cols-12 gap-16 items-center">
                <div class="lg:col-span-7 animate-fade-in-up">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="bg-yellow-500 text-black text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest shadow-[0_0_20px_rgba(234,179,8,0.3)]">
                            {{ $game->game_type }}
                        </span>
                        @if($game->is_hot)
                            <span class="bg-red-600 text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest shadow-[0_0_20px_rgba(220,38,38,0.3)]">
                                🔥 Hot
                            </span>
                        @endif
                    </div>

                    <h1 class="text-6xl md:text-8xl font-black text-white mb-6 leading-[0.85] tracking-tighter uppercase">
                        {{ $game->hero_title ?: $game->title }}
                    </h1>

                    <p class="text-xl md:text-2xl text-gray-400 mb-10 leading-relaxed font-medium max-w-2xl">
                        {{ $game->hero_subtitle ?: $game->description }}
                    </p>

                    <!-- Hero CTAs -->
                    <div class="flex flex-wrap gap-6">
                        @if($game->hero_ctas)
                            @foreach($game->hero_ctas as $cta)
                                @php
                                    $styleClass = match($cta['style'] ?? 'primary') {
                                        'secondary' => 'bg-purple-600 hover:bg-purple-500 text-white shadow-purple-500/20',
                                        'outline' => 'bg-transparent border-2 border-white/20 hover:border-white text-white',
                                        default => 'bg-yellow-500 hover:bg-yellow-400 text-black shadow-yellow-500/20'
                                    };
                                @endphp
                                <a href="{{ $cta['url'] }}" class="px-10 py-5 {{ $styleClass }} text-xl font-black rounded-2xl transition-all transform hover:-translate-y-1.5 shadow-lg uppercase tracking-tighter">
                                    {{ $cta['label'] }}
                                </a>
                            @endforeach
                        @else
                            <a href="{{ $adminSettings->external_dashboard_url ?? '#' }}" class="px-12 py-6 bg-yellow-500 text-black text-xl font-black rounded-2xl hover:bg-yellow-400 transition-all transform hover:-translate-y-1.5 shadow-lg shadow-yellow-500/20 uppercase tracking-tighter">
                                Play {{ $game->title }} Now
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Featured Visual -->
                <div class="lg:col-span-5 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="relative rounded-[3rem] overflow-hidden border border-white/10 shadow-2xl group">
                        <img src="{{ $game->thumbnail }}" alt="{{ $game->title }}" class="w-full h-auto transform transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                        @if($game->rtp)
                            <div class="absolute bottom-8 left-8 right-8 p-6 bg-black/60 backdrop-blur-xl border border-white/10 rounded-2xl flex items-center justify-between">
                                <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Payout RTP</span>
                                <span class="text-3xl font-black text-yellow-500">{{ $game->rtp }}%</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features Grid -->
    @if($game->features)
        <section class="py-24 bg-gray-950 border-y border-white/5">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    @foreach($game->features as $feature)
                        <div class="flex flex-col items-center text-center p-8 bg-white/5 border border-white/5 rounded-3xl hover:border-yellow-500/30 transition-all group">
                            <span class="text-4xl mb-4 group-hover:scale-125 transition-transform duration-500">{{ $feature['icon'] ?? '⭐' }}</span>
                            <h3 class="text-white font-black uppercase tracking-widest text-xs">{{ $feature['title'] }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Alternating Content Sections -->
    @if($game->sections)
        @foreach($game->sections as $index => $section)
            <section class="py-24 {{ $index % 2 === 0 ? 'bg-black' : 'bg-gray-950' }}">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="grid lg:grid-cols-2 gap-16 items-center">
                        <div class="{{ ($section['image_side'] ?? 'right') === 'left' ? 'lg:order-2' : '' }}">
                            <h2 class="text-4xl md:text-5xl font-black text-white mb-8 leading-tight tracking-tighter uppercase">
                                {{ $section['title'] }}
                            </h2>
                            <div class="text-gray-400 text-lg leading-relaxed space-y-6 font-medium">
                                {!! nl2br(e($section['content'])) !!}
                            </div>
                        </div>
                        <div class="{{ ($section['image_side'] ?? 'right') === 'left' ? 'lg:order-1' : '' }}">
                            <div class="relative rounded-[3rem] overflow-hidden border border-white/10 shadow-2xl">
                                <img src="{{ $section['image_url'] }}" alt="{{ $section['title'] }}" class="w-full h-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    @endif

    <!-- How To Play Section -->
    @if($game->how_to)
        <section class="py-32 bg-black relative">
            <div class="max-w-4xl mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tighter uppercase">How to Play <span class="text-yellow-500">{{ $game->title }}</span></h2>
                    <p class="text-gray-400 text-xl">Follow these simple steps to start winning today.</p>
                </div>
                
                <div class="space-y-6">
                    @foreach($game->how_to as $index => $step)
                        <div class="flex gap-8 p-8 bg-gray-900/50 border border-white/5 rounded-[2.5rem] hover:border-purple-500/30 transition-all group">
                            <span class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-purple-600 to-purple-800 text-white rounded-2xl flex items-center justify-center text-3xl font-black shadow-lg">
                                {{ $index + 1 }}
                            </span>
                            <p class="text-gray-300 text-xl font-medium pt-2 leading-relaxed">
                                {{ $step }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Why Play Section (Premium Grid) -->
    @if($game->special_items)
        <section class="py-32 bg-gray-950 border-y border-white/5">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <h2 class="text-4xl md:text-6xl font-black text-white mb-20 tracking-tighter uppercase">
                    {{ $game->special_title ?: 'Why Play '.$game->title }}
                </h2>
                
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($game->special_items as $item)
                        <div class="p-10 bg-black border border-white/5 rounded-[3rem] hover:border-yellow-500/30 transition-all group text-left">
                            <span class="text-5xl mb-8 block">{{ $item['icon'] ?? '⚡' }}</span>
                            <h3 class="text-2xl font-black text-white mb-4 uppercase tracking-tighter">{{ $item['title'] }}</h3>
                            <p class="text-gray-500 leading-relaxed font-medium">{{ $item['content'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Dynamic Card Section -->
    @if($game->card_section_cards)
        <section class="py-32 bg-black">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-8 mb-16">
                    @foreach($game->card_section_cards as $card)
                        <div class="relative group aspect-[16/10] rounded-[3rem] overflow-hidden border border-white/10 shadow-2xl">
                            <img src="{{ $card['image_url'] }}" alt="Card Visual" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>
                            <div class="absolute bottom-10 left-10 right-10">
                                <p class="text-white text-2xl font-black mb-6 leading-tight uppercase tracking-tighter">
                                    {{ $card['content'] }}
                                </p>
                                @if(isset($card['button_label']) && isset($card['button_url']))
                                    <a href="{{ $card['button_url'] }}" class="inline-block px-8 py-4 bg-white text-black font-black rounded-xl hover:bg-yellow-500 transition-colors uppercase tracking-widest text-xs">
                                        {{ $card['button_label'] }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($game->card_section_title)
                    <div class="text-center max-w-4xl mx-auto">
                        <h2 class="text-4xl md:text-5xl font-black text-white mb-8 tracking-tighter uppercase">{{ $game->card_section_title }}</h2>
                        <p class="text-xl text-gray-500 font-medium leading-relaxed">{{ $game->card_section_content }}</p>
                    </div>
                @endif
            </div>
        </section>
    @endif

    <!-- Testimonials & FAQs -->
    <section class="py-32 bg-gray-950">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-20">
                <!-- Testimonials -->
                @if($game->testimonials)
                    <div>
                        <h2 class="text-4xl font-black text-white mb-12 uppercase tracking-tighter">What Players Say</h2>
                        <div class="space-y-6">
                            @foreach($game->testimonials as $t)
                                <div class="p-8 bg-black border border-white/5 rounded-3xl">
                                    <div class="flex text-yellow-500 mb-4 gap-1">
                                        @for($i=0; $i < ($t['rating'] ?? 5); $i++)
                                            <span>★</span>
                                        @endfor
                                    </div>
                                    <p class="text-gray-300 italic mb-6 font-medium leading-relaxed">"{{ $t['content'] }}"</p>
                                    <p class="text-white font-black uppercase tracking-widest text-[10px]">— {{ $t['author'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- FAQs -->
                @if($game->faqs)
                    <div>
                        <h2 class="text-4xl font-black text-white mb-12 uppercase tracking-tighter">Common Questions</h2>
                        <div class="space-y-4" x-data="{ active: null }">
                            @foreach($game->faqs as $index => $faq)
                                <div class="bg-black border border-white/5 rounded-2xl overflow-hidden transition-all duration-300">
                                    <button @click="active = active === {{ $index }} ? null : {{ $index }}" class="w-full p-6 text-left flex justify-between items-center group">
                                        <span class="text-lg font-black text-white uppercase tracking-tighter group-hover:text-yellow-500 transition-colors">{{ $faq['question'] }}</span>
                                        <span class="text-yellow-500 text-2xl transition-transform" :class="active === {{ $index }} ? 'rotate-45' : ''">+</span>
                                    </button>
                                    <div x-show="active === {{ $index }}" x-collapse class="px-6 pb-6 text-gray-400 font-medium leading-relaxed">
                                        {{ $faq['answer'] }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Related Games -->
    @if($relatedGames->count() > 0)
        <section class="py-32 bg-black border-t border-white/5">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex items-center justify-between mb-16">
                    <h2 class="text-4xl md:text-5xl font-black text-white tracking-tighter uppercase">More Games <span class="text-purple-500">To Explore</span></h2>
                    <a href="{{ route('games.index') }}" class="text-gray-500 hover:text-white text-[10px] font-black uppercase tracking-widest transition-colors flex items-center gap-2 group">
                        Browse Full Library 
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    @foreach($relatedGames as $relatedGame)
                        <x-game-card :game="$relatedGame" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>

<style>
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { opacity: 0; animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .text-glow-yellow { text-shadow: 0 0 20px rgba(234, 179, 8, 0.4); }
    .animate-shine {
        background-image: linear-gradient(120deg, transparent 0%, transparent 40%, rgba(255,255,255,0.15) 50%, transparent 60%, transparent 100%);
        background-size: 200% 100%;
        background-position: 150% 0;
        animation: shine 3s infinite;
    }
    @keyframes shine {
        to { background-position: -50% 0; }
    }
</style>
@endsection
