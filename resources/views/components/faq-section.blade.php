<!-- FAQ Section Component -->
<section id="faq" class="py-24 md:py-40 relative overflow-hidden bg-gray-950">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(168,85,247,0.06)_0%,rgba(0,0,0,0)_70%)]"></div>
    <div class="absolute top-1/4 -right-20 w-[600px] h-[600px] bg-purple-500/10 rounded-full blur-[150px] animate-pulse"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-20 space-y-6">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-purple-500/10 border border-purple-500/20 rounded-full">
                <span class="w-2 h-2 bg-purple-500 rounded-full animate-ping"></span>
                <span class="text-xs font-black text-purple-500 uppercase tracking-widest">Got Questions?</span>
            </div>

            <h2 class="text-5xl md:text-8xl font-black tracking-tighter leading-none">
                <span class="text-white">FREQUENTLY</span>
                <br>
                <span class="bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 bg-clip-text text-transparent text-glow-yellow">ASKED</span>
                <br>
                <span class="text-white">QUESTIONS</span>
            </h2>

            <p class="text-xl md:text-2xl text-gray-400 font-medium max-w-3xl mx-auto">
                Everything you need to know to start winning. Can't find what you're looking for? Contact our 24/7 support team.
            </p>
        </div>

        <!-- FAQ Items -->
        <div class="space-y-6" x-data="{ active: null }">
            <!-- FAQ Item 1 -->
            <div class="group bg-gray-900/50 backdrop-blur-md rounded-3xl border border-white/5 hover:border-purple-500/50 transition-all overflow-hidden">
                <button @click="active = active === 1 ? null : 1" class="w-full flex items-center justify-between p-8 text-left hover:bg-white/5 transition-colors">
                    <h3 class="text-xl md:text-2xl font-black text-white group-hover:text-purple-400 transition-colors pr-8">
                        How do I create an account and start playing?
                    </h3>
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center border border-purple-500/30 group-hover:bg-purple-500/40 transition-all transform" :class="active === 1 ? 'rotate-45' : ''">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                </button>
                <div x-show="active === 1" x-collapse class="px-8 pb-8">
                    <div class="pt-4 border-t border-white/10">
                        <p class="text-gray-400 text-lg leading-relaxed">
                            Creating your account takes less than 30 seconds. Simply click the <span class="text-yellow-500 font-bold">"Register"</span> button, fill in your email and password, verify your account, and you're ready to play with our $1000 welcome bonus!
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="group bg-gray-900/50 backdrop-blur-md rounded-3xl border border-white/5 hover:border-purple-500/50 transition-all overflow-hidden">
                <button @click="active = active === 2 ? null : 2" class="w-full flex items-center justify-between p-8 text-left hover:bg-white/5 transition-colors">
                    <h3 class="text-xl md:text-2xl font-black text-white group-hover:text-purple-400 transition-colors pr-8">
                        Is the platform safe and secure?
                    </h3>
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center border border-purple-500/30 group-hover:bg-purple-500/40 transition-all transform" :class="active === 2 ? 'rotate-45' : ''">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                </button>
                <div x-show="active === 2" x-collapse class="px-8 pb-8">
                    <div class="pt-4 border-t border-white/10">
                        <p class="text-gray-400 text-lg leading-relaxed">
                            Absolutely! We use <span class="text-purple-500 font-bold">256-bit SSL encryption</span> (the same as major banks), two-factor authentication, and are fully licensed and regulated. Your personal data and funds are protected with industry-leading security measures.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="group bg-gray-900/50 backdrop-blur-md rounded-3xl border border-white/5 hover:border-purple-500/50 transition-all overflow-hidden">
                <button @click="active = active === 3 ? null : 3" class="w-full flex items-center justify-between p-8 text-left hover:bg-white/5 transition-colors">
                    <h3 class="text-xl md:text-2xl font-black text-white group-hover:text-purple-400 transition-colors pr-8">
                        What games are available to play?
                    </h3>
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center border border-purple-500/30 group-hover:bg-purple-500/40 transition-all transform" :class="active === 3 ? 'rotate-45' : ''">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                </button>
                <div x-show="active === 3" x-collapse class="px-8 pb-8">
                    <div class="pt-4 border-t border-white/10">
                        <p class="text-gray-400 text-lg leading-relaxed">
                            We offer <span class="text-yellow-500 font-bold">100+ premium games</span> including Slots, Fish Games, Keno, Table Games (Blackjack, Roulette, Baccarat), Card Games (Poker variants), and more. New titles are added weekly!
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="group bg-gray-900/50 backdrop-blur-md rounded-3xl border border-white/5 hover:border-purple-500/50 transition-all overflow-hidden">
                <button @click="active = active === 4 ? null : 4" class="w-full flex items-center justify-between p-8 text-left hover:bg-white/5 transition-colors">
                    <h3 class="text-xl md:text-2xl font-black text-white group-hover:text-purple-400 transition-colors pr-8">
                        How quickly can I withdraw my winnings?
                    </h3>
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center border border-purple-500/30 group-hover:bg-purple-500/40 transition-all transform" :class="active === 4 ? 'rotate-45' : ''">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                </button>
                <div x-show="active === 4" x-collapse class="px-8 pb-8">
                    <div class="pt-4 border-t border-white/10">
                        <p class="text-gray-400 text-lg leading-relaxed">
                            We process withdrawals <span class="text-purple-500 font-bold">instantly</span>! Most payment methods receive funds within minutes. We support bank transfers, e-wallets, cryptocurrencies, and more with zero withdrawal fees.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="group bg-gray-900/50 backdrop-blur-md rounded-3xl border border-white/5 hover:border-purple-500/50 transition-all overflow-hidden">
                <button @click="active = active === 5 ? null : 5" class="w-full flex items-center justify-between p-8 text-left hover:bg-white/5 transition-colors">
                    <h3 class="text-xl md:text-2xl font-black text-white group-hover:text-purple-400 transition-colors pr-8">
                        Can I play on my mobile device?
                    </h3>
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center border border-purple-500/30 group-hover:bg-purple-500/40 transition-all transform" :class="active === 5 ? 'rotate-45' : ''">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                </button>
                <div x-show="active === 5" x-collapse class="px-8 pb-8">
                    <div class="pt-4 border-t border-white/10">
                        <p class="text-gray-400 text-lg leading-relaxed">
                            Yes! Our platform is fully optimized for <span class="text-yellow-500 font-bold">iOS, Android, tablets, and desktop</span>. You can also download our mobile app for an even faster experience with push notifications for bonuses and new games.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 6 -->
            <div class="group bg-gray-900/50 backdrop-blur-md rounded-3xl border border-white/5 hover:border-purple-500/50 transition-all overflow-hidden">
                <button @click="active = active === 6 ? null : 6" class="w-full flex items-center justify-between p-8 text-left hover:bg-white/5 transition-colors">
                    <h3 class="text-xl md:text-2xl font-black text-white group-hover:text-purple-400 transition-colors pr-8">
                        What bonuses and promotions are available?
                    </h3>
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center border border-purple-500/30 group-hover:bg-purple-500/40 transition-all transform" :class="active === 6 ? 'rotate-45' : ''">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                </button>
                <div x-show="active === 6" x-collapse class="px-8 pb-8">
                    <div class="pt-4 border-t border-white/10">
                        <p class="text-gray-400 text-lg leading-relaxed">
                            New players receive a <span class="text-yellow-500 font-bold">$1000 welcome bonus</span> on signup! Plus daily bonuses, weekly tournaments, VIP rewards, cashback offers, and exclusive promotions for loyal players.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 7 -->
            <div class="group bg-gray-900/50 backdrop-blur-md rounded-3xl border border-white/5 hover:border-purple-500/50 transition-all overflow-hidden">
                <button @click="active = active === 7 ? null : 7" class="w-full flex items-center justify-between p-8 text-left hover:bg-white/5 transition-colors">
                    <h3 class="text-xl md:text-2xl font-black text-white group-hover:text-purple-400 transition-colors pr-8">
                        How can I get help if I have a problem?
                    </h3>
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center border border-purple-500/30 group-hover:bg-purple-500/40 transition-all transform" :class="active === 7 ? 'rotate-45' : ''">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                </button>
                <div x-show="active === 7" x-collapse class="px-8 pb-8">
                    <div class="pt-4 border-t border-white/10">
                        <p class="text-gray-400 text-lg leading-relaxed">
                            Our support team is available <span class="text-purple-500 font-bold">24/7 via live chat, email, and phone</span>. We also have an extensive Help Center with guides, tutorials, and troubleshooting tips. Average response time is under 2 minutes!
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Still Need Help CTA -->
        <div class="mt-16 text-center bg-gradient-to-r from-purple-500/10 to-yellow-500/10 backdrop-blur-md rounded-3xl p-12 border border-white/10">
            <h3 class="text-3xl md:text-4xl font-black text-white mb-4">Still Have Questions?</h3>
            <p class="text-gray-400 text-lg mb-8">Our friendly support team is here to help you 24/7</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 hover:from-yellow-500 hover:via-purple-600 hover:to-purple-700 text-white px-8 py-4 rounded-2xl text-lg font-black transition-all shadow-2xl transform hover:-translate-y-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    Contact Support
                </a>
                <a href="#" class="inline-flex items-center justify-center gap-3 bg-white/5 hover:bg-white/10 text-white px-8 py-4 rounded-2xl text-lg font-black transition-all border-2 border-white/10 hover:border-purple-500/50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Help Center
                </a>
            </div>
        </div>
    </div>
</section>
