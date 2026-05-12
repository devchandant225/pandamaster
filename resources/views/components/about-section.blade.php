<section id="about-preview" class="py-24 relative overflow-hidden bg-gray-950">
    <!-- Background Accents -->
    <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-purple-500/5 rounded-full blur-[120px] -translate-y-1/2 -translate-x-1/2"></div>
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-yellow-500/5 rounded-full blur-[120px] translate-y-1/2 translate-x-1/2"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Image Side -->
            <div class="relative group order-2 lg:order-1">
                <div class="absolute -inset-4 bg-gradient-to-r from-yellow-500 via-purple-500 to-purple-600 rounded-[3rem] opacity-20 blur-2xl group-hover:opacity-40 transition-opacity duration-700"></div>
                <div class="relative overflow-hidden rounded-[2.5rem] border border-white/10 aspect-video lg:aspect-square">
                    <img 
                        src="https://images.unsplash.com/photo-1511512578047-dfb367046420?w=1200" 
                        alt="OrionStar Gaming Experience" 
                        class="w-full h-full object-cover grayscale-[0.3] group-hover:grayscale-0 transition-all duration-700 scale-110 group-hover:scale-100"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent opacity-60"></div>
                </div>
                
                <!-- Floating Badge -->
                <div class="absolute -bottom-6 -right-6 bg-gray-900/90 backdrop-blur-xl border border-white/10 p-8 rounded-[2rem] shadow-2xl hidden md:block transform group-hover:-translate-y-2 transition-transform duration-500">
                    <div class="text-4xl font-black text-yellow-500 mb-1 tracking-tighter text-glow-yellow">#1</div>
                    <div class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Global Choice</div>
                </div>
            </div>

            <!-- Content Side -->
            <div class="order-1 lg:order-2">
                <div class="inline-flex items-center gap-3 px-4 py-1.5 bg-purple-500/10 border border-purple-500/30 rounded-full text-[10px] text-purple-400 font-black uppercase tracking-[0.3em] mb-8 shadow-lg shadow-purple-500/5">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-purple-500"></span>
                    </span>
                    The Orion Star Story
                </div>

                <h2 class="text-5xl md:text-6xl font-black mb-8 leading-[0.9] tracking-tighter text-white uppercase">
                    Redefining The <span class="bg-gradient-to-r from-yellow-400 via-yellow-200 to-yellow-500 bg-clip-text text-transparent text-glow-yellow">Experience</span> of Play
                </h2>

                <p class="text-xl text-gray-400 mb-10 leading-relaxed font-medium">
                    Orion Star VIP is built on the legendary Fire Kirin engine, delivering the world's most immersive, rewarding, and secure online fish gaming platform. With over 30+ exclusive titles, we set the gold standard for social casino entertainment.
                </p>

                <div class="grid sm:grid-cols-2 gap-6 mb-12">
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-white/5 border border-white/5 hover:border-yellow-500/30 transition-colors group">
                        <div class="w-12 h-12 bg-yellow-500/10 text-yellow-500 rounded-xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-white font-black text-sm uppercase tracking-tighter mb-1">Instant Payouts</h3>
                            <p class="text-gray-500 text-xs leading-relaxed">Fast and secure withdrawals anytime, anywhere.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-white/5 border border-white/5 hover:border-purple-500/30 transition-colors group">
                        <div class="w-12 h-12 bg-purple-500/10 text-purple-500 rounded-xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-white font-black text-sm uppercase tracking-tighter mb-1">Ironclad Security</h3>
                            <p class="text-gray-500 text-xs leading-relaxed">Your data is protected by elite-grade encryption.</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-6">
                    <a href="{{ route('about') }}" class="px-10 py-5 bg-gradient-to-r from-yellow-400 to-yellow-600 text-white font-black rounded-2xl transition-all shadow-lg shadow-yellow-500/20 hover:shadow-yellow-500/40 transform hover:-translate-y-1 uppercase tracking-tighter text-sm">
                        Learn More
                    </a>
                    <a href="{{ route('contact') }}" class="px-10 py-5 bg-white/5 hover:bg-white/10 text-white font-black rounded-2xl transition-all border border-white/10 hover:border-purple-500 transform hover:-translate-y-1 uppercase tracking-tighter text-sm">
                        Get In Touch
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
