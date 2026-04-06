<!-- Hero Section with Dynamic Animations -->
@php
    $heroSection = $section ?? null;
    if(!$heroSection) return;
@endphp

<section class="relative overflow-hidden min-h-screen flex items-center justify-center" id="hero-section"
     data-animation="{{ $heroSection->animation_type ?? 'stars' }}"
     data-background="{{ $heroSection->background_type ?? 'gradient' }}">
    
    <!-- Animated Background -->
    <div class="absolute inset-0">
        @if(($heroSection->background_type ?? 'gradient') === 'gradient')
            <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-yellow-500/10 via-pink-500/10 to-yellow-500/10 animate-pulse"></div>
        @elseif($heroSection->background_type === 'image' && $heroSection->background_url)
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $heroSection->background_url }}')"></div>
            <div class="absolute inset-0 bg-black/70"></div>
        @endif
    </div>

    <!-- Animation Container -->
    <div class="absolute inset-0 pointer-events-none" id="animation-container">
        @if(($heroSection->animation_type ?? 'stars') === 'stars')
            <!-- Stars Animation -->
            @for($i = 0; $i < 50; $i++)
                <div class="absolute w-1 h-1 bg-white rounded-full animate-twinkle" 
                     style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 3000) }}ms; animation-duration: {{ rand(2000, 4000) }}ms;"></div>
            @endfor
        @elseif($heroSection->animation_type === 'particles')
            <!-- Particles Animation -->
            @for($i = 0; $i < 30; $i++)
                <div class="absolute w-2 h-2 bg-yellow-500/30 rounded-full animate-float" 
                     style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(5000, 10000) }}ms;"></div>
            @endfor
        @elseif($heroSection->animation_type === 'neon')
            <!-- Neon Glow Effects -->
            <div class="absolute top-20 left-10 w-72 h-72 bg-yellow-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-pink-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
        @endif
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <!-- Badge -->
            @if($heroSection->badge_text)
                <div class="inline-flex items-center gap-2 px-6 py-3 bg-yellow-500/20 border border-yellow-500 rounded-full text-yellow-500 font-semibold mb-8 animate-fade-in-down">
                    <svg class="w-5 h-5 animate-spin" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                    </svg>
                    {{ $heroSection->badge_text }}
                </div>
            @endif

            <!-- Title with Animation -->
            @if($heroSection->title)
                <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-black mb-6 leading-tight animate-fade-in-up">
                    @php
                        $titleParts = explode(' ', $heroSection->title);
                        $colors = ['text-yellow-500', 'text-pink-500', 'text-white'];
                    @endphp
                    @foreach($titleParts as $index => $word)
                        <span class="{{ $colors[$index % count($colors) }}">{{ $word }}</span>@if(!$loop->last) @endif
                    @endforeach
                </h1>
            @endif

            <!-- Subtitle -->
            @if($heroSection->subtitle)
                <p class="text-2xl md:text-3xl text-gray-300 mb-4 animate-fade-in-up" style="animation-delay: 0.2s;">
                    {{ $heroSection->subtitle }}
                </p>
            @endif

            <!-- Description -->
            @if($heroSection->description)
                <p class="text-xl md:text-2xl text-gray-400 mb-12 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.3s;">
                    {{ $heroSection->description }}
                </p>
            @endif

            <!-- CTA Buttons -->
            @if($heroSection->cta_primary_text || $heroSection->cta_secondary_text)
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-fade-in-up" style="animation-delay: 0.4s;">
                    @if($heroSection->cta_primary_text)
                        <a href="{{ $heroSection->cta_primary_url ?? '/register' }}" 
                           class="group relative px-12 py-5 bg-gradient-to-r from-yellow-500 to-yellow-400 hover:from-yellow-400 hover:to-yellow-300 text-black text-xl font-black rounded-xl transition-all shadow-2xl shadow-yellow-500/50 hover:shadow-yellow-500/70 transform hover:-translate-y-1 overflow-hidden">
                            <span class="relative z-10">{{ $heroSection->cta_primary_text }}</span>
                            <div class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                        </a>
                    @endif

                    @if($heroSection->cta_secondary_text)
                        <a href="{{ $heroSection->cta_secondary_url ?? '/games' }}" 
                           class="px-12 py-5 bg-gray-800 hover:bg-gray-700 text-white text-xl font-bold rounded-xl transition-all border-2 border-gray-700 hover:border-yellow-500 hover:shadow-lg transform hover:-translate-y-1">
                            {{ $heroSection->cta_secondary_text }}
                        </a>
                    @endif
                </div>
            @endif

            <!-- Stats -->
            @if($heroSection->stats && count($heroSection->stats) > 0)
                <div class="grid grid-cols-3 gap-4 md:gap-8 pt-16 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.5s;">
                    @foreach($heroSection->stats as $stat)
                        <div class="group">
                            <div class="text-3xl md:text-5xl font-black text-yellow-500 mb-2 group-hover:scale-110 transition-transform">
                                {{ $stat['value'] ?? '' }}
                            </div>
                            <div class="text-xs md:text-sm text-gray-400">{{ $stat['label'] ?? '' }}</div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<style>
    @keyframes twinkle {
        0%, 100% { opacity: 0.2; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.5); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) translateX(0); opacity: 0.3; }
        25% { transform: translateY(-20px) translateX(10px); opacity: 0.6; }
        50% { transform: translateY(-40px) translateX(-10px); opacity: 0.3; }
        75% { transform: translateY(-20px) translateX(20px); opacity: 0.6; }
    }

    @keyframes fade-in-up {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes fade-in-down {
        0% { opacity: 0; transform: translateY(-30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .animate-twinkle {
        animation: twinkle 3s ease-in-out infinite;
    }

    .animate-float {
        animation: float 8s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
        opacity: 0;
    }

    .animate-fade-in-down {
        animation: fade-in-down 0.8s ease-out forwards;
        opacity: 0;
    }
</style>
