<!-- Hero Section with Dynamic Animations -->
@php
    $heroSection = $section ?? null;
    if(!$heroSection) return;
@endphp

<section class="relative overflow-hidden min-h-screen flex items-center justify-center bg-gray-950" id="hero-section"
     data-animation="{{ $heroSection->animation_type ?? 'stars' }}"
     data-background="{{ $heroSection->background_type ?? 'gradient' }}">
    
    <!-- Animated Background & Lighting -->
    <div class="absolute inset-0">
        @if(($heroSection->background_type ?? 'gradient') === 'gradient')
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>

            <!-- Dynamic Light Orbs -->
            <div class="absolute top-1/4 -left-20 w-[500px] h-[500px] bg-yellow-500/10 rounded-full blur-[120px] animate-pulse-slow"></div>
            <div class="absolute bottom-1/4 -right-20 w-[600px] h-[600px] bg-purple-500/10 rounded-full blur-[120px] animate-pulse-slow" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-purple-500/5 rounded-full blur-[150px] animate-pulse-slow" style="animation-delay: 4s;"></div>
            
            <!-- Rotating Neon Rings -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[140%] h-[140%] animate-rotate-very-slow opacity-10 pointer-events-none">
                <div class="absolute inset-0 bg-[conic-gradient(from_0deg,transparent_0deg,rgba(234,179,8,0.4)_15deg,transparent_30deg,rgba(168,85,247,0.4)_45deg,transparent_60deg)]"></div>
            </div>
        @elseif($heroSection->background_type === 'image' && $heroSection->background_url)
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $heroSection->background_url }}')"></div>
            <div class="absolute inset-0 bg-black/70 backdrop-blur-[2px]"></div>
        @endif
    </div>

    <!-- Animation Container -->
    <div class="absolute inset-0 pointer-events-none" id="animation-container">
        @if(($heroSection->animation_type ?? 'stars') === 'stars')
            <!-- Stars Animation -->
            @for($i = 0; $i < 60; $i++)
                <div class="absolute w-[2px] h-[2px] bg-white rounded-full animate-twinkle"
                     style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(3000, 6000) }}ms;"></div>
            @endfor
            
            <!-- Floating Casino Emojis -->
            @for($i = 0; $i < 25; $i++)
                <div class="absolute text-4xl md:text-5xl opacity-15 animate-float-casino"
                     style="top: {{ rand(10, 90) }}%; left: {{ rand(5, 95) }}%; animation-delay: {{ rand(0, 6000) }}ms; animation-duration: {{ rand(8000, 15000) }}ms;">
                    @php $icons = ['🎰', '💎', '7️⃣', '🎲', '🃏', '👑', '⭐', '🔥', '💰', '🏆', '💵', '🎯']; @endphp
                    {{ $icons[array_rand($icons)] }}
                </div>
            @endfor
        @elseif($heroSection->animation_type === 'particles')
            <!-- Particles Animation -->
            @for($i = 0; $i < 40; $i++)
                <div class="absolute w-1 h-1 bg-yellow-500/20 rounded-full animate-float"
                     style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(6000, 12000) }}ms;"></div>
            @endfor
            
            <!-- Floating Casino Emojis -->
            @for($i = 0; $i < 25; $i++)
                <div class="absolute text-4xl md:text-5xl opacity-15 animate-float-casino"
                     style="top: {{ rand(10, 90) }}%; left: {{ rand(5, 95) }}%; animation-delay: {{ rand(0, 6000) }}ms; animation-duration: {{ rand(8000, 15000) }}ms;">
                    @php $icons = ['🎰', '💎', '7️⃣', '🎲', '🃏', '👑', '⭐', '🔥', '💰', '🏆', '💵', '🎯']; @endphp
                    {{ $icons[array_rand($icons)] }}
                </div>
            @endfor
        @endif
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <!-- Badge -->
            @if($heroSection->badge_text)
                <div class="inline-flex items-center gap-3 px-8 py-3 bg-yellow-500/10 border border-yellow-500/30 rounded-full text-yellow-500 font-black text-sm tracking-widest uppercase mb-10 animate-fade-in-down shadow-lg shadow-yellow-500/5">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-yellow-500"></span>
                    </span>
                    {{ $heroSection->badge_text }}
                </div>
            @endif

            <!-- Title with Animation -->
            @if($heroSection->title)
                <h1 class="text-5xl sm:text-7xl md:text-8xl lg:text-9xl font-black mb-8 leading-[0.9] animate-fade-in-up">
                    @php
                        $titleParts = explode(' ', $heroSection->title);
                        $colors = ['text-yellow-500 text-glow-yellow', 'text-purple-500 text-glow-purple', 'text-white'];
                    @endphp
                    @foreach($titleParts as $index => $word)
                        <span class="{{ $colors[$index % count($colors)] }} block sm:inline">{{ $word }}</span>
                    @endforeach
                </h1>
            @endif

            <!-- Subtitle -->
            @if($heroSection->subtitle)
                <p class="text-2xl md:text-4xl text-gray-300 mb-6 font-bold tracking-tight animate-fade-in-up" style="animation-delay: 0.2s;">
                    {{ $heroSection->subtitle }}
                </p>
            @endif

            <!-- Description -->
            @if($heroSection->description)
                <p class="text-lg md:text-xl text-gray-400 mb-14 max-w-2xl mx-auto leading-relaxed animate-fade-in-up" style="animation-delay: 0.3s;">
                    {{ $heroSection->description }}
                </p>
            @endif

            <!-- CTA Buttons -->
            @if($heroSection->cta_primary_text || $heroSection->cta_secondary_text)
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center animate-fade-in-up" style="animation-delay: 0.4s;">
                    @if($heroSection->cta_primary_text)
                        <a href="{{ $heroSection->cta_primary_url ?? '/register' }}" 
                           class="group relative px-14 py-6 bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 text-white text-2xl font-black rounded-2xl transition-all shadow-[0_0_30px_rgba(234,179,8,0.4)] hover:shadow-[0_0_50px_rgba(234,179,8,0.6)] transform hover:-translate-y-1.5 overflow-hidden animate-shine hover-glow">
                            <span class="relative z-10 uppercase tracking-tighter">{{ $heroSection->cta_primary_text }}</span>
                        </a>
                    @endif

                    @if($heroSection->cta_secondary_text)
                        <a href="{{ $heroSection->cta_secondary_url ?? '/games' }}" 
                           class="px-14 py-6 bg-gray-900/50 hover:bg-gray-800 text-white text-2xl font-black rounded-2xl transition-all border-2 border-gray-700 hover:border-yellow-500 shadow-xl backdrop-blur-sm transform hover:-translate-y-1.5">
                            {{ $heroSection->cta_secondary_text }}
                        </a>
                    @endif
                </div>
            @endif

            <!-- Stats -->
            @if($heroSection->stats && count($heroSection->stats) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 md:gap-12 pt-20 max-w-4xl mx-auto animate-fade-in-up" style="animation-delay: 0.6s;">
                    @foreach($heroSection->stats as $stat)
                        <div class="group relative p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-yellow-500/50 transition-colors">
                            <div class="text-4xl md:text-5xl font-black text-yellow-500 mb-2 group-hover:scale-110 transition-transform text-glow-yellow">
                                {{ $stat['value'] ?? '' }}
                            </div>
                            <div class="text-xs md:text-sm text-gray-400 font-bold uppercase tracking-widest">{{ $stat['label'] ?? '' }}</div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="w-8 h-12 rounded-full border-2 border-yellow-500/30 flex justify-center p-2">
            <div class="w-1 h-3 bg-yellow-500 rounded-full animate-scroll"></div>
        </div>
    </div>
</section>

<style>
    @keyframes twinkle {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.3); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) translateX(0); }
        50% { transform: translateY(-30px) translateX(15px); }
    }

    @keyframes fade-in-up {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes fade-in-down {
        0% { opacity: 0; transform: translateY(-40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes scroll {
        0% { transform: translateY(0); opacity: 1; }
        100% { transform: translateY(15px); opacity: 0; }
    }

    .animate-twinkle {
        animation: twinkle var(--duration, 4s) ease-in-out infinite;
    }

    .animate-float {
        animation: float 10s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .animate-fade-in-down {
        animation: fade-in-down 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .animate-scroll {
        animation: scroll 2s ease-in-out infinite;
    }
</style>
