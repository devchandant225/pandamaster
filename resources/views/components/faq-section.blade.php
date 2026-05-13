<!-- FAQ Section Component -->
<section id="faq" class="py-24 md:py-32 relative overflow-hidden bg-gray-950">
    <!-- Ambient Background Elements -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 -right-20 w-[600px] h-[600px] bg-purple-600/5 rounded-full blur-[150px] animate-pulse"></div>
        <div class="absolute bottom-1/4 -left-20 w-[500px] h-[500px] bg-yellow-500/5 rounded-full blur-[150px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center gap-3 px-4 py-2 bg-white/5 border border-white/10 rounded-full text-white/60 text-[10px] font-black uppercase tracking-[0.3em] mb-8 backdrop-blur-md">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span>
                </span>
                Common Intel
            </div>

            <h2 class="text-5xl md:text-8xl font-black tracking-tighter leading-[0.85] text-white uppercase italic mb-8">
                The <span class="bg-gradient-to-r from-yellow-400 via-yellow-200 to-yellow-500 bg-clip-text text-transparent text-glow-yellow">Knowledge</span> <br/>
                Vault.
            </h2>

            <p class="text-lg md:text-xl text-gray-400 font-medium max-w-2xl mx-auto leading-relaxed">
                Everything you need to know to master the Panda Master ecosystem. Instant answers for elite players.
            </p>
        </div>

        <!-- FAQ Items with Alpine.js -->
        <div class="space-y-4" x-data="{ active: null }">
            @php
                $faqs = [
                    [
                        'q' => 'How do I initiate my first session?',
                        'a' => 'Click "Login" to access your dashboard. If you don\'t have credentials yet, please contact our support commanders via the "Request Intel" button below to get your account staged for activation.'
                    ],
                    [
                        'q' => 'Is the Panda Master encryption ironclad?',
                        'a' => 'We deploy 256-bit AES military-grade encryption alongside multi-factor authentication (MFA). Your assets and data are protected by the same protocols used by global financial institutions.'
                    ],
                    [
                        'q' => 'What is the game diversity in the lobby?',
                        'a' => 'Our vault contains 100+ premium titles including high-volatility Slots, multiplayer Fish Games, and classic Table experiences. We inject new titles into the ecosystem every 7 days.'
                    ],
                    [
                        'q' => 'How fast are the liquidation cycles?',
                        'a' => 'We pride ourselves on the fastest payouts in the galaxy. Standard withdrawal requests are processed in under 5 minutes, with zero hidden fees across all payment vectors.'
                    ],
                    [
                        'q' => 'Is native mobile hardware supported?',
                        'a' => 'Absolutely. While our web interface is fully responsive, we offer native Android APKs and iOS Web-Apps for a superior, low-latency gaming experience with biometric login support.'
                    ]
                ];
            @endphp

            @foreach($faqs as $index => $faq)
            <div class="group bg-white/5 backdrop-blur-md rounded-[2rem] border border-white/5 hover:border-purple-500/30 transition-all duration-500 overflow-hidden">
                <button @click="active = active === {{ $index }} ? null : {{ $index }}" class="w-full flex items-center justify-between p-8 text-left transition-colors group-hover:bg-white/5">
                    <h3 class="text-xl font-black text-white uppercase italic tracking-tighter group-hover:text-purple-400 transition-colors pr-8">
                        {{ $faq['q'] }}
                    </h3>
                    <div class="flex-shrink-0 w-12 h-12 bg-white/5 rounded-xl flex items-center justify-center border border-white/10 group-hover:border-purple-500/30 transition-all transform" :class="active === {{ $index }} ? 'rotate-45' : ''">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                </button>
                <div x-show="active === {{ $index }}" x-collapse class="px-8 pb-8">
                    <div class="pt-6 border-t border-white/5">
                        <p class="text-gray-400 text-lg leading-relaxed font-medium">
                            {!! $faq['a'] !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Still Need Help CTA -->
        <div class="mt-20 p-1 bg-gradient-to-r from-purple-500/20 via-yellow-500/20 to-purple-500/20 rounded-[3rem]">
            <div class="bg-gray-900/90 backdrop-blur-xl rounded-[2.9rem] p-10 md:p-16 text-center border border-white/5">
                <h3 class="text-3xl md:text-5xl font-black text-white mb-6 uppercase italic tracking-tighter">Still in the <span class="text-yellow-500">Dark?</span></h3>
                <p class="text-gray-400 text-lg mb-10 font-medium">Our tactical support commanders are online 24/7 to assist you.</p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('contact') }}" class="group/btn inline-flex items-center justify-center gap-4 bg-white text-black px-10 py-5 rounded-2xl text-lg font-black transition-all hover:bg-yellow-500 transform hover:-translate-y-1 uppercase tracking-tighter">
                        Request Intel
                        <svg class="w-5 h-5 transition-transform group-hover/btn:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <a href="#" class="inline-flex items-center justify-center gap-4 bg-white/5 hover:bg-white/10 text-white px-10 py-5 rounded-2xl text-lg font-black transition-all border border-white/10 hover:border-purple-500 transform hover:-translate-y-1 uppercase tracking-tighter">
                        Base Manual
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
