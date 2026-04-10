<!-- Login/Help Access Block Component -->
<section id="support" class="py-24 md:py-32 relative overflow-hidden bg-gray-950">
    <!-- Ambient Background Lighting -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[radial-gradient(circle_at_center,rgba(168,85,247,0.03)_0%,transparent_70%)]"></div>
        <div class="absolute top-0 right-1/4 w-[600px] h-[600px] bg-yellow-500/5 rounded-full blur-[150px] animate-pulse"></div>
        <div class="absolute bottom-0 left-1/4 w-[600px] h-[600px] bg-purple-600/5 rounded-full blur-[150px] animate-pulse" style="animation-delay: 2.5s;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-stretch">
            <!-- Player Login / Account Card -->
            <div class="group relative bg-white/5 backdrop-blur-xl rounded-[3rem] p-8 md:p-12 border border-white/5 hover:border-yellow-500/30 transition-all duration-700 hover:shadow-[0_40px_80px_-20px_rgba(234,179,8,0.15)] overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-yellow-500/10 transition-colors"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-[1.5rem] flex items-center justify-center mb-10 shadow-2xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                    </div>

                    <h3 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tighter uppercase italic">
                        Player <span class="text-yellow-500">Lobby</span>
                    </h3>
                    <p class="text-gray-400 text-lg mb-10 leading-relaxed font-medium">
                        Secure access to your personal gaming vault. Manage your balance, track your tournament rankings, and claim your daily rewards.
                    </p>

                    <div class="space-y-6">
                        @auth
                            <a href="{{ route('dashboard') }}" class="group/btn w-full inline-flex items-center justify-center gap-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-black px-10 py-6 rounded-2xl text-xl font-black transition-all shadow-[0_15px_30px_rgba(234,179,8,0.2)] hover:shadow-[0_20px_40px_rgba(234,179,8,0.3)] transform hover:-translate-y-1.5 uppercase tracking-tighter">
                                Enter Dashboard
                                <svg class="w-6 h-6 transition-transform group-hover/btn:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="group/btn w-full inline-flex items-center justify-center gap-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-black px-10 py-6 rounded-2xl text-xl font-black transition-all shadow-[0_15px_30px_rgba(234,179,8,0.2)] hover:shadow-[0_20px_40px_rgba(234,179,8,0.3)] transform hover:-translate-y-1.5 uppercase tracking-tighter">
                                Sign In Now
                                <svg class="w-6 h-6 transition-transform group-hover/btn:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            </a>
                            
                            <div class="text-center">
                                <span class="text-gray-500 font-bold uppercase tracking-widest text-[10px]">New to the galaxy?</span>
                                <a href="{{ route('register') }}" class="text-yellow-500 hover:text-white font-black ml-3 uppercase tracking-tighter text-sm transition-colors border-b-2 border-yellow-500/30 hover:border-white">
                                    Join the Elite
                                </a>
                            </div>
                        @endauth
                    </div>

                    <div class="mt-12 pt-10 border-t border-white/5 grid grid-cols-2 gap-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </div>
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">2FA Security</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/></svg>
                            </div>
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Instant Cashout</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Help & Support Card -->
            <div class="group relative bg-white/5 backdrop-blur-xl rounded-[3rem] p-8 md:p-12 border border-white/5 hover:border-purple-500/30 transition-all duration-700 hover:shadow-[0_40px_80px_-20px_rgba(168,85,247,0.15)] overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-purple-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-purple-500/10 transition-colors"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-700 rounded-[1.5rem] flex items-center justify-center mb-10 shadow-2xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>

                    <h3 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tighter uppercase italic">
                        Elite <span class="text-purple-500">Support</span>
                    </h3>
                    <p class="text-gray-400 text-lg mb-10 leading-relaxed font-medium">
                        Never play alone. Our dedicated support commanders are standing by 24/7 to ensure your gaming experience remains legendary.
                    </p>

                    <div class="space-y-4">
                        <a href="#" class="group/item flex items-center gap-5 bg-white/5 hover:bg-white/10 p-6 rounded-2xl border border-white/5 hover:border-purple-500/50 transition-all">
                            <div class="w-14 h-14 bg-purple-500/10 rounded-xl flex items-center justify-center border border-purple-500/20 group-hover/item:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-white font-black text-lg italic uppercase tracking-tighter">Live Support</div>
                                <div class="text-gray-500 text-xs font-bold uppercase tracking-widest">Avg Response: <span class="text-purple-400">90 Seconds</span></div>
                            </div>
                            <div class="flex items-center gap-2 px-3 py-1 bg-green-500/10 rounded-full border border-green-500/20">
                                <div class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-green-500 text-[10px] font-black uppercase tracking-widest">Online</span>
                            </div>
                        </a>

                        <a href="{{ route('contact') }}" class="group/item flex items-center gap-5 bg-white/5 hover:bg-white/10 p-6 rounded-2xl border border-white/5 hover:border-purple-500/50 transition-all">
                            <div class="w-14 h-14 bg-purple-500/10 rounded-xl flex items-center justify-center border border-purple-500/20 group-hover/item:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-white font-black text-lg italic uppercase tracking-tighter">Email Base</div>
                                <div class="text-gray-500 text-xs font-bold uppercase tracking-widest">Detailed Ticket Support</div>
                            </div>
                        </a>
                    </div>

                    <div class="mt-10 p-6 bg-gradient-to-r from-purple-500/10 via-yellow-500/5 to-purple-500/10 rounded-[2rem] border border-white/5">
                        <div class="flex items-center justify-between gap-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center border border-purple-500/30">
                                    <svg class="w-6 h-6 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                </div>
                                <div>
                                    <div class="text-white font-black text-sm uppercase tracking-tighter">Verified Team</div>
                                    <div class="text-gray-500 text-[10px] font-black uppercase tracking-[0.2em]">Always On Duty</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-3xl font-black text-purple-500 italic tracking-tighter">&lt; 2m</div>
                                <div class="text-[9px] font-black text-gray-500 uppercase tracking-widest">Fast Track</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
