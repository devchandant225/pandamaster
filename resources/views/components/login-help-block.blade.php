<!-- Login/Help Access Block Component -->
<section id="support" class="py-20 md:py-32 relative overflow-hidden bg-gradient-to-b from-gray-950 to-gray-900">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(234,179,8,0.05)_0%,rgba(0,0,0,0)_70%)]"></div>
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-purple-500/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-stretch">
            <!-- Login/Account Access Card -->
            <div class="group relative bg-gray-900/50 backdrop-blur-xl rounded-[3rem] p-10 border border-white/5 hover:border-yellow-500/50 transition-all duration-500 hover:shadow-[0_30px_60px_rgba(234,179,8,0.15)]">
                <!-- Glow Effect -->
                <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-[3rem]"></div>
                
                <div class="relative z-10">
                    <!-- Icon -->
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl transform group-hover:scale-110 group-hover:rotate-6 transition-all">
                        <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                    </div>

                    <!-- Title & Description -->
                    <h3 class="text-3xl md:text-4xl font-black text-white mb-4 group-hover:text-yellow-400 transition-colors">
                        Player Login
                    </h3>
                    <p class="text-gray-400 text-lg mb-8 leading-relaxed">
                        Already have an account? Sign in to access your games, track winnings, and continue your winning streak.
                    </p>

                    <!-- Action Buttons -->
                    <div class="space-y-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="group/btn w-full inline-flex items-center justify-center gap-3 bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 hover:from-yellow-500 hover:via-yellow-600 hover:to-yellow-700 text-black px-8 py-5 rounded-2xl text-lg font-black transition-all shadow-2xl transform hover:-translate-y-1">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                                Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="group/btn w-full inline-flex items-center justify-center gap-3 bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 hover:from-yellow-500 hover:via-yellow-600 hover:to-yellow-700 text-black px-8 py-5 rounded-2xl text-lg font-black transition-all shadow-2xl transform hover:-translate-y-1">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                </svg>
                                Sign In Now
                            </a>
                            
                            <div class="text-center">
                                <span class="text-gray-400">New here?</span>
                                <a href="{{ route('register') }}" class="text-yellow-500 hover:text-yellow-400 font-black ml-2 underline decoration-2 underline-offset-4">
                                    Create Account
                                </a>
                            </div>
                        @endauth
                    </div>

                    <!-- Features -->
                    <div class="mt-8 pt-8 border-t border-white/5 space-y-3">
                        <div class="flex items-center gap-3 text-gray-300">
                            <svg class="w-5 h-5 text-yellow-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-bold text-sm">Access all 100+ games instantly</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-300">
                            <svg class="w-5 h-5 text-yellow-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-bold text-sm">Track your winnings & stats</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-300">
                            <svg class="w-5 h-5 text-yellow-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-bold text-sm">Claim exclusive bonuses</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Help & Support Card -->
            <div class="group relative bg-gray-900/50 backdrop-blur-xl rounded-[3rem] p-10 border border-white/5 hover:border-purple-500/50 transition-all duration-500 hover:shadow-[0_30px_60px_rgba(168,85,247,0.15)]">
                <!-- Glow Effect -->
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-[3rem]"></div>
                
                <div class="relative z-10">
                    <!-- Icon -->
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl flex items-center justify-center mb-8 shadow-2xl transform group-hover:scale-110 group-hover:rotate-6 transition-all">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>

                    <!-- Title & Description -->
                    <h3 class="text-3xl md:text-4xl font-black text-white mb-4 group-hover:text-purple-400 transition-colors">
                        Help & Support
                    </h3>
                    <p class="text-gray-400 text-lg mb-8 leading-relaxed">
                        Need assistance? Our expert support team is available 24/7 to help you with any questions or issues.
                    </p>

                    <!-- Support Options -->
                    <div class="space-y-4">
                        <!-- Live Chat -->
                        <a href="#" class="group/item flex items-center gap-4 bg-white/5 hover:bg-white/10 p-5 rounded-2xl border border-white/5 hover:border-purple-500/50 transition-all">
                            <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center border border-purple-500/30 group-hover/item:bg-purple-500/40 transition-all">
                                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-white font-black text-lg">Live Chat</div>
                                <div class="text-gray-400 text-sm">Average response: <span class="text-purple-500 font-bold">Under 2 minutes</span></div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-green-500 text-xs font-black uppercase">Online</span>
                            </div>
                        </a>

                        <!-- Email Support -->
                        <a href="{{ route('contact') }}" class="group/item flex items-center gap-4 bg-white/5 hover:bg-white/10 p-5 rounded-2xl border border-white/5 hover:border-purple-500/50 transition-all">
                            <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center border border-purple-500/30 group-hover/item:bg-purple-500/40 transition-all">
                                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-white font-black text-lg">Email Support</div>
                                <div class="text-gray-400 text-sm">Get detailed help at your inbox</div>
                            </div>
                        </a>

                        <!-- Help Center -->
                        <a href="#" class="group/item flex items-center gap-4 bg-white/5 hover:bg-white/10 p-5 rounded-2xl border border-white/5 hover:border-purple-500/50 transition-all">
                            <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center border border-purple-500/30 group-hover/item:bg-purple-500/40 transition-all">
                                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-white font-black text-lg">Help Center</div>
                                <div class="text-gray-400 text-sm">Guides, tutorials & FAQs</div>
                            </div>
                        </a>
                    </div>

                    <!-- Response Time Badge -->
                    <div class="mt-8 p-4 bg-gradient-to-r from-purple-500/10 to-yellow-500/10 rounded-2xl border border-white/10">
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-500/20 rounded-xl flex items-center justify-center border border-green-500/30">
                                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-white font-black text-sm">24/7 Availability</div>
                                    <div class="text-gray-400 text-xs">Always here when you need us</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-black text-purple-500">&lt;2min</div>
                                <div class="text-gray-400 text-xs font-bold">Avg Response</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
