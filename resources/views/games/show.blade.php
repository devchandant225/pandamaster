@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#1a1a1a] text-white">
    <!-- Hero Section -->
    <div class="relative py-24 md:py-32">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <!-- Breadcrumbs -->
            <nav class="flex items-center justify-center gap-3 mb-12 text-[10px] font-black uppercase tracking-[0.3em]">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-white transition-colors">Home</a>
                <span class="text-gray-800">/</span>
                <a href="{{ route('games.index') }}" class="text-gray-500 hover:text-white transition-colors">Games</a>
                <span class="text-gray-800">/</span>
                <span class="text-[#D4AF37]">{{ $game->title }}</span>
            </nav>

            <!-- Featured Image -->
            <div class="relative max-w-5xl mx-auto mb-16 group">
                <div class="absolute -inset-4 bg-gradient-to-r from-[#D4AF37]/20 to-purple-500/20 rounded-[3rem] blur-3xl opacity-50 group-hover:opacity-100 transition-all duration-700"></div>
                <img src="{{ $game->thumbnail }}" alt="{{ $game->title }}" class="relative w-full h-auto rounded-[3rem] shadow-2xl border border-white/10 transform transition-transform duration-700 group-hover:scale-[1.02]">
            </div>

            <!-- Title & Description -->
            <div class="max-w-4xl mx-auto space-y-8">
                <h1 class="text-6xl md:text-8xl font-black tracking-tighter uppercase leading-[0.85]">
                    {{ $game->hero_title ?? $game->title }}
                </h1>

                <div class="text-xl md:text-2xl text-gray-400 font-medium leading-relaxed">
                    {!! $game->description !!}
                </div>
                
                <div class="h-1.5 w-32 bg-[#D4AF37] mx-auto"></div>

                @if($game->hero_subtitle)
                    <p class="text-lg text-gray-500 font-medium leading-relaxed">
                        {{ $game->hero_subtitle }}
                    </p>
                @endif

                <div class="flex flex-wrap justify-center gap-6 pt-8">
                    @if($game->hero_ctas && count($game->hero_ctas) > 0)
                        @foreach($game->hero_ctas as $cta)
                            <a href="{{ $cta['url'] }}" 
                               class="px-12 py-5 rounded-2xl font-black uppercase tracking-widest transition-all transform hover:-translate-y-1 
                               {{ ($cta['type'] ?? 'primary') === 'primary' ? 'bg-[#D4AF37] text-black shadow-[0_0_30px_rgba(212,175,55,0.4)]' : '' }}
                               {{ ($cta['type'] ?? 'primary') === 'secondary' ? 'bg-white text-black' : '' }}
                               {{ ($cta['type'] ?? 'primary') === 'outline' ? 'border-2 border-white text-white hover:bg-white hover:text-black' : '' }}">
                                {{ $cta['label'] }}
                            </a>
                        @endforeach
                    @else
                        <a href="{{ route('games.play', $game->slug) }}" class="px-12 py-5 rounded-2xl bg-[#D4AF37] text-black font-black uppercase tracking-widest shadow-[0_0_30px_rgba(212,175,55,0.4)] transform hover:-translate-y-1 transition-all">
                            Play Now
                        </a>
                        @if($game->demo_url)
                            <a href="{{ route('games.demo', $game->slug) }}" class="px-12 py-5 rounded-2xl border-2 border-white text-white font-black uppercase tracking-widest hover:bg-white hover:text-black transform hover:-translate-y-1 transition-all">
                                Try Demo
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Alternating Content Sections -->
    @if($game->sections && count($game->sections) > 0)
        <div class="max-w-7xl mx-auto px-4 py-20 space-y-32">
            @foreach($game->sections as $index => $section)
                <div class="flex flex-col {{ ($section['type'] ?? 'text-image') === 'text-image' ? 'md:flex-row' : 'md:flex-row-reverse' }} items-center gap-12 lg:gap-24">
                    <div class="flex-1 space-y-6">
                        <h2 class="text-4xl md:text-5xl font-black uppercase tracking-tighter">{{ $section['title'] ?? '' }}</h2>
                        <div class="h-1.5 w-24 bg-[#D4AF37]"></div>
                        <p class="text-gray-400 text-lg leading-relaxed">
                            {!! nl2br(e($section['text'] ?? '')) !!}
                        </p>
                        @if(!empty($section['cta_label']))
                            <a href="{{ $section['cta_url'] ?? '#' }}" class="inline-block px-8 py-3 bg-[#D4AF37] text-black font-black uppercase tracking-widest rounded-lg hover:bg-yellow-400 transition-colors">
                                {{ $section['cta_label'] }}
                            </a>
                        @endif
                    </div>
                    <div class="flex-1">
                        <div class="relative group">
                            <div class="absolute -inset-4 bg-[#D4AF37]/10 rounded-[2rem] blur-2xl group-hover:bg-[#D4AF37]/20 transition-all"></div>
                            <img src="{{ $section['image'] ?? $game->thumbnail }}" alt="Section Image" class="relative rounded-[2rem] shadow-2xl border border-white/10 w-full h-auto object-cover">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- How To Section -->
    @if($game->how_to && count($game->how_to) > 0)
        <div class="bg-black/50 py-32 border-y border-white/5">
            <div class="max-w-4xl mx-auto px-4 text-center">
                <h2 class="text-5xl font-black uppercase mb-16 tracking-tighter">
                    How To <span class="text-[#D4AF37]">Play</span>
                </h2>
                <ul class="space-y-8 text-left">
                    @foreach($game->how_to as $step)
                        <li class="flex items-start gap-6 group">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full border-2 border-[#D4AF37] flex items-center justify-center text-[#D4AF37] font-black group-hover:bg-[#D4AF37] group-hover:text-black transition-all">
                                {{ $loop->iteration }}
                            </div>
                            <p class="text-xl text-gray-300 font-medium py-2">{{ is_array($step) ? ($step['step'] ?? '') : $step }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <!-- Features Section -->
    @if($game->features && count($game->features) > 0)
        <div class="max-w-7xl mx-auto px-4 py-32">
            <h2 class="text-5xl font-black uppercase text-center mb-20 tracking-tighter">Key <span class="text-[#D4AF37]">Features</span></h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($game->features as $feature)
                    <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] hover:border-[#D4AF37]/50 transition-all group flex items-start gap-5">
                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-[#D4AF37]/10 flex items-center justify-center text-[#D4AF37]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-lg text-gray-300 font-medium leading-relaxed">
                            {{ is_array($feature) ? ($feature['feature'] ?? '') : $feature }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Special Note / Why Play Section -->
    @if($game->special_items && count($game->special_items) > 0)
        <div class="max-w-7xl mx-auto px-4 py-32">
            <div class="bg-gradient-to-br from-red-500/20 to-purple-500/20 rounded-[3rem] p-12 md:p-20 border border-white/10 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-red-500/10 blur-[100px] rounded-full"></div>
                
                <h2 class="text-4xl md:text-5xl font-black uppercase mb-16 text-center tracking-tighter">{{ $game->special_title ?? 'Important Note' }}</h2>
                
                <div class="grid md:grid-cols-3 gap-12 relative z-10">
                    @foreach($game->special_items as $item)
                        <div class="bg-[#1a1a1a]/80 backdrop-blur-xl p-10 rounded-[2rem] border border-white/5 shadow-2xl">
                            <h3 class="text-xl font-black text-[#D4AF37] uppercase mb-6 tracking-widest border-b border-[#D4AF37]/30 pb-4">
                                {{ $item['subtitle'] ?? '' }}
                            </h3>
                            <p class="text-gray-400 leading-relaxed">
                                {{ $item['content'] ?? '' }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Dynamic Card Section -->
    @if($game->card_section_cards && count($game->card_section_cards) > 0)
        <div class="max-w-7xl mx-auto px-4 py-32">
            <div class="grid md:grid-cols-2 gap-12 mb-20">
                @foreach($game->card_section_cards as $card)
                    <div class="bg-white/5 border border-white/10 rounded-[3rem] p-12 flex flex-col items-center text-center group hover:border-[#D4AF37]/50 transition-all duration-500">
                        @if(!empty($card['image_url']))
                            <div class="mb-8 w-24 h-24 flex items-center justify-center">
                                <img src="{{ $card['image_url'] }}" alt="" class="max-w-full max-h-full object-contain">
                            </div>
                        @endif
                        <div class="mb-8 text-gray-300 text-lg leading-relaxed font-medium flex-1">
                            {!! nl2br(e($card['content'] ?? '')) !!}
                        </div>
                        @if(!empty($card['button_label']))
                            <a href="{{ $card['button_url'] ?? '#' }}" class="mt-8 px-12 py-4 bg-[#D4AF37] text-black font-black uppercase tracking-[0.2em] rounded-full hover:bg-yellow-400 transition-all shadow-[0_0_30px_rgba(212,175,55,0.3)] hover:shadow-[0_0_50px_rgba(212,175,55,0.5)] transform hover:-translate-y-1">
                                {{ $card['button_label'] }}
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="text-center max-w-4xl mx-auto">
                @if($game->card_section_title)
                    <h2 class="text-4xl md:text-5xl font-black uppercase mb-6 tracking-tighter">{{ $game->card_section_title }}</h2>
                @endif
                @if($game->card_section_content)
                    <p class="text-xl text-gray-400 leading-relaxed font-medium">
                        {!! nl2br(e($game->card_section_content)) !!}
                    </p>
                @endif
            </div>
        </div>
    @endif

    <!-- Two-column / Testimonials Design Layout -->
    @if($game->testimonials && count($game->testimonials) > 0)
        <div class="max-w-7xl mx-auto px-4 py-32">
            <h2 class="text-5xl font-black uppercase text-center mb-20 tracking-tighter">Player <span class="text-[#D4AF37]">Testimonials</span></h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($game->testimonials as $testimonial)
                    <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] hover:border-[#D4AF37]/50 transition-all group">
                        <div class="flex gap-1 mb-4 text-[#D4AF37]">
                            @for($i=0; $i < ($testimonial['stars'] ?? 5); $i++)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            @endfor
                        </div>
                        <p class="text-gray-400 italic mb-6 leading-relaxed">"{{ $testimonial['review'] ?? '' }}"</p>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#D4AF37] flex items-center justify-center text-black font-black">
                                {{ substr($testimonial['name'] ?? 'P', 0, 1) }}
                            </div>
                            <span class="font-black text-sm uppercase tracking-widest">{{ $testimonial['name'] ?? 'Player' }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- FAQs Section -->
    @if($game->faqs && count($game->faqs) > 0)
        <div class="bg-white/5 py-32">
            <div class="max-w-4xl mx-auto px-4">
                <h2 class="text-5xl font-black uppercase text-center mb-16 tracking-tighter">Frequently Asked <span class="text-[#D4AF37]">Questions</span></h2>
                <div class="space-y-4" x-data="{ active: null }">
                    @foreach($game->faqs as $index => $faq)
                        <div class="border border-white/10 rounded-2xl overflow-hidden">
                            <button @click="active = (active === {{ $index }} ? null : {{ $index }})" class="w-full flex items-center justify-between p-6 text-left hover:bg-white/5 transition-colors">
                                <span class="text-lg font-black uppercase tracking-tight">{{ $faq['question'] ?? '' }}</span>
                                <svg class="w-6 h-6 transform transition-transform" :class="active === {{ $index }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="active === {{ $index }}" x-collapse x-cloak>
                                <div class="p-6 pt-0 text-gray-400 leading-relaxed border-t border-white/10">
                                    {{ $faq['answer'] ?? '' }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection
