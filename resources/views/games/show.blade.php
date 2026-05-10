@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <div class="relative py-24 md:py-32 overflow-hidden border-b border-white/5">
        <!-- Animated Background & Lighting -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
            <div class="absolute top-1/4 -left-20 w-[500px] h-[500px] bg-yellow-500/10 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-1/4 -right-20 w-[600px] h-[600px] bg-purple-500/10 rounded-full blur-[120px] animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="absolute inset-0 pointer-events-none">
            @for($i = 0; $i < 30; $i++)
                <div class="absolute w-[1px] h-[1px] bg-white rounded-full animate-twinkle"
                     style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(3000, 6000) }}ms;"></div>
            @endfor
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <!-- Breadcrumbs -->
            <nav class="flex items-center justify-center gap-3 mb-12 text-[10px] font-black uppercase tracking-[0.3em]">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-white transition-colors">Home</a>
                <span class="text-gray-800">/</span>
                <a href="{{ route('games.index') }}" class="text-gray-500 hover:text-white transition-colors">Games</a>
                <span class="text-gray-800">/</span>
                <span class="text-yellow-500">{{ $game->title }}</span>
            </nav>

            <!-- Featured Image -->
            <div class="relative max-w-5xl mx-auto mb-16 group">
                <div class="absolute -inset-4 bg-gradient-to-r from-yellow-500/20 to-purple-500/20 rounded-[3rem] blur-3xl opacity-50 group-hover:opacity-100 transition-all duration-700"></div>
                <img src="{{ $game->thumbnail }}" alt="{{ $game->title }}" class="relative w-full h-auto rounded-[3rem] shadow-2xl border border-white/10 transform transition-transform duration-700 group-hover:scale-[1.02]">
            </div>

            <!-- Title & Description -->
            <div class="max-w-4xl mx-auto space-y-8">
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-black tracking-tighter uppercase leading-tight text-white">
                    {{ $game->hero_title ?? $game->title }}
                </h1>

                <div class="text-xl md:text-2xl text-gray-300 font-medium leading-relaxed">
                    {!! $game->description !!}
                </div>
                
                <div class="h-1.5 w-32 bg-yellow-500 mx-auto rounded-full"></div>

                @if($game->hero_subtitle)
                    <p class="text-lg text-gray-400 font-medium leading-relaxed">
                        {{ $game->hero_subtitle }}
                    </p>
                @endif

                <div class="flex flex-wrap justify-center gap-6 pt-8">
                    @if($game->hero_ctas && count($game->hero_ctas) > 0)
                        @foreach($game->hero_ctas as $cta)
                            <a href="{{ $cta['url'] }}" 
                               class="px-12 py-5 rounded-2xl font-black uppercase tracking-widest transition-all transform hover:-translate-y-1 shadow-lg
                               {{ ($cta['style'] ?? 'primary') === 'primary' ? 'bg-gradient-to-r from-yellow-500 to-yellow-600 text-black hover:shadow-yellow-500/50' : '' }}
                               {{ ($cta['style'] ?? 'primary') === 'secondary' ? 'bg-gradient-to-r from-purple-500 to-purple-600 text-white hover:shadow-purple-500/50' : '' }}
                               {{ ($cta['style'] ?? 'primary') === 'outline' ? 'bg-white/10 hover:bg-white/20 text-white border border-white/20 backdrop-blur-sm' : '' }}">
                                {{ $cta['label'] }}
                            </a>
                        @endforeach
                    @else
                        <a href="{{ route('games.play', $game->slug) }}" class="px-12 py-5 rounded-2xl bg-gradient-to-r from-yellow-500 to-yellow-600 text-black font-black uppercase tracking-widest shadow-lg hover:shadow-yellow-500/50 transform hover:-translate-y-1 transition-all">
                            Play Now
                        </a>
                        @if($game->demo_url)
                            <a href="{{ route('games.demo', $game->slug) }}" class="px-12 py-5 rounded-2xl bg-white/10 hover:bg-white/20 text-white border border-white/20 font-black uppercase tracking-widest transform hover:-translate-y-1 transition-all backdrop-blur-sm">
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
        <div class="max-w-7xl mx-auto px-4 py-24 space-y-32">
            @foreach($game->sections as $index => $section)
                <div class="flex flex-col {{ ($section['image_side'] ?? 'right') === 'left' ? 'md:flex-row-reverse' : 'md:flex-row' }} items-center gap-12 lg:gap-24">
                    <div class="flex-1 space-y-6">
                        <h2 class="text-4xl md:text-5xl font-black uppercase tracking-tighter text-white leading-tight">{{ $section['title'] ?? '' }}</h2>
                        <div class="h-1.5 w-24 bg-yellow-500 rounded-full"></div>
                        <div class="text-gray-400 text-lg leading-relaxed">
                            {!! nl2br(e($section['content'] ?? $section['text'] ?? '')) !!}
                        </div>
                        @if(!empty($section['cta_label']))
                            <a href="{{ $section['cta_url'] ?? '#' }}" class="inline-block px-10 py-4 bg-yellow-500 text-black font-black uppercase tracking-widest rounded-xl hover:bg-yellow-400 transition-colors shadow-lg">
                                {{ $section['cta_label'] }}
                            </a>
                        @endif
                    </div>
                    <div class="flex-1 w-full">
                        <div class="relative group">
                            <div class="absolute -inset-4 bg-yellow-500/5 rounded-[2rem] blur-2xl group-hover:bg-yellow-500/10 transition-all"></div>
                            <img src="{{ $section['image_url'] ?? $section['image'] ?? $game->thumbnail }}" alt="{{ $section['image_alt'] ?? $section['title'] ?? 'Section Image' }}" class="relative rounded-[2rem] shadow-2xl border border-white/5 w-full h-auto object-cover transition-transform duration-500 group-hover:scale-[1.01]">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- How To Section -->
    @if($game->how_to && count($game->how_to) > 0)
        <div class="bg-gray-900 py-32 border-y border-white/5">
            <div class="max-w-4xl mx-auto px-4 text-center">
                <h2 class="text-4xl md:text-5xl font-black uppercase mb-16 tracking-tighter text-white">
                    How To <span class="text-yellow-500">Play</span>
                </h2>
                <div class="space-y-6 text-left">
                    @foreach($game->how_to as $step)
                        <div class="flex items-start gap-6 group bg-gray-950 p-6 rounded-2xl border border-white/5 hover:border-yellow-500/30 transition-all">
                            <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-yellow-500/10 border border-yellow-500/20 flex items-center justify-center text-yellow-500 font-black group-hover:bg-yellow-500 group-hover:text-black transition-all">
                                {{ $loop->iteration }}
                            </div>
                            <p class="text-xl text-gray-300 font-medium py-2">{{ is_array($step) ? ($step['step'] ?? '') : $step }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Special Note / Why Play Section -->
    @if($game->special_items && count($game->special_items) > 0)
        <div class="max-w-7xl mx-auto px-4 py-32">
            <div class="bg-gradient-to-br from-yellow-500/5 to-purple-500/5 rounded-[3rem] p-12 md:p-20 border border-white/5 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-500/5 blur-[100px] rounded-full"></div>
                
                <h2 class="text-4xl md:text-5xl font-black uppercase mb-16 text-center tracking-tighter text-white">{{ $game->special_title ?? 'Important Note' }}</h2>
                
                <div class="grid md:grid-cols-3 gap-12 relative z-10">
                    @foreach($game->special_items as $item)
                        <div class="bg-gray-900/50 backdrop-blur-xl p-10 rounded-[2.5rem] border border-white/5 shadow-2xl hover:border-yellow-500/30 transition-all group">
                            <h3 class="text-xl font-black text-yellow-500 uppercase mb-6 tracking-widest border-b border-white/5 pb-4 group-hover:text-white transition-colors">
                                {{ $item['subtitle'] ?? '' }}
                            </h3>
                            <p class="text-gray-400 leading-relaxed text-lg">
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
        <div class="max-w-7xl mx-auto px-4 py-32 border-t border-white/5">
            <!-- Section Header -->
            @if($game->card_section_title || $game->card_section_content)
                <div class="text-center max-w-4xl mx-auto mb-20">
                    @if($game->card_section_title)
                        <h2 class="text-4xl md:text-5xl font-black uppercase mb-6 tracking-tighter text-white leading-tight">{{ $game->card_section_title }}</h2>
                    @endif
                    @if($game->card_section_content)
                        <p class="text-xl text-gray-400 leading-relaxed font-medium">
                            {!! nl2br(e($game->card_section_content)) !!}
                        </p>
                    @endif
                </div>
            @endif

            <!-- Grid -->
            <div class="grid md:grid-cols-2 gap-12">
                @foreach($game->card_section_cards as $card)
                    <div class="bg-gray-900 border border-white/5 rounded-[3rem] p-12 flex flex-col items-center text-center group hover:border-yellow-500/30 transition-all duration-500 shadow-2xl">
                        @if(!empty($card['image_url']))
                            <div class="mb-8 w-24 h-24 flex items-center justify-center">
                                <img src="{{ $card['image_url'] }}" alt="{{ $card['image_alt'] ?? $game->title }}" class="max-w-full max-h-full object-contain group-hover:scale-110 transition-transform">
                            </div>
                        @endif
                        <div class="mb-8 text-gray-400 text-lg leading-relaxed font-medium flex-1">
                            {!! nl2br(e($card['content'] ?? '')) !!}
                        </div>
                        @if(!empty($card['button_label']))
                            <a href="{{ $card['button_url'] ?? '#' }}" class="mt-8 px-12 py-4 bg-yellow-500 text-black font-black uppercase tracking-[0.2em] rounded-full hover:bg-yellow-400 transition-all shadow-lg hover:shadow-yellow-500/50 transform hover:-translate-y-1">
                                {{ $card['button_label'] }}
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Two-column / Testimonials Design Layout -->
    @if($game->testimonials && count($game->testimonials) > 0)
        <div class="max-w-7xl mx-auto px-4 py-32">
            <h2 class="text-4xl md:text-5xl font-black uppercase text-center mb-20 tracking-tighter text-white">Player <span class="text-yellow-500">Testimonials</span></h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($game->testimonials as $testimonial)
                    <div class="bg-gray-900 border border-white/5 p-8 rounded-[2rem] hover:border-yellow-500/30 transition-all group shadow-2xl">
                        <div class="flex gap-1 mb-4 text-yellow-500">
                            @for($i=0; $i < (int)($testimonial['rating'] ?? 5); $i++)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            @endfor
                        </div>
                        <p class="text-gray-400 italic mb-6 leading-relaxed">"{{ $testimonial['content'] ?? '' }}"</p>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-black font-black">
                                {{ substr($testimonial['author'] ?? 'P', 0, 1) }}
                            </div>
                            <span class="font-black text-sm uppercase tracking-widest text-white">{{ $testimonial['author'] ?? 'Player' }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- FAQs Section -->
    @if($game->faqs && count($game->faqs) > 0)
        <div class="bg-gray-900 py-32 border-y border-white/5">
            <div class="max-w-4xl mx-auto px-4">
                <h2 class="text-4xl md:text-5xl font-black uppercase text-center mb-16 tracking-tighter text-white">Frequently Asked <span class="text-yellow-500">Questions</span></h2>
                <div class="space-y-4" x-data="{ active: null }">
                    @foreach($game->faqs as $index => $faq)
                        <div class="bg-gray-950 border border-white/5 rounded-2xl overflow-hidden">
                            <button @click="active = (active === {{ $index }} ? null : {{ $index }})" class="w-full flex items-center justify-between p-6 text-left hover:bg-white/5 transition-colors">
                                <span class="text-lg font-black uppercase tracking-tight text-white">{{ $faq['question'] ?? '' }}</span>
                                <span class="text-yellow-500 text-2xl" x-text="active === {{ $index }} ? '−' : '+'"></span>
                            </button>
                            <div x-show="active === {{ $index }}" x-collapse x-cloak>
                                <div class="p-6 pt-0 text-gray-400 leading-relaxed border-t border-white/5 prose prose-invert prose-sm max-w-none">
                                    {!! $faq['answer'] ?? '' !!}
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
    @keyframes twinkle {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.3); }
    }
    .animate-twinkle { animation: twinkle 4s ease-in-out infinite; }
</style>
@endsection
