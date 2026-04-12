<footer class="relative bg-black text-gray-300 overflow-hidden" x-data="{ activeCategory: null }">
    <!-- Animated Background Effects -->
    <div class="absolute inset-0">
        <!-- Gradient Mesh Background -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(168,85,247,0.15)_0%,rgba(0,0,0,0.8)_50%,transparent_100%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_right,rgba(234,179,8,0.1)_0%,transparent_60%)]"></div>
        
        <!-- Animated Floating Particles -->
        <div class="absolute inset-0 pointer-events-none">
            @for($i = 0; $i < 30; $i++)
                <div class="absolute w-1 h-1 bg-gradient-to-r from-yellow-400 to-purple-500 rounded-full animate-float-particle opacity-30"
                     style="top: {{ rand(10, 90) }}%; left: {{ rand(5, 95) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(4000, 8000) }}ms;"></div>
            @endfor
        </div>

        <!-- Glowing Orbs -->
        <div class="absolute top-0 left-1/4 w-[800px] h-[800px] bg-yellow-500/10 rounded-full blur-[150px] animate-pulse-slow -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-1/4 w-[800px] h-[800px] bg-purple-500/10 rounded-full blur-[150px] animate-pulse-slow translate-y-1/2" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-r from-yellow-500/5 to-purple-500/5 rounded-full blur-[120px] animate-rotate-slow"></div>
    </div>

    <!-- Top Gradient Border with Glow -->
    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-yellow-400 via-purple-500 to-transparent shadow-[0_0_20px_rgba(234,179,8,0.8),0_0_40px_rgba(168,85,247,0.6)]"></div>

    <!-- Main Footer Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
        <!-- Casino Slot Machine Header -->
        <div class="text-center mb-16 animate-fade-in-down">
            <!-- Animated Slot Machine Icons -->
            <div class="flex justify-center items-center gap-4 mb-6">
                <div class="text-5xl md:text-6xl animate-bounce-slow" style="animation-delay: 0ms;">🎰</div>
                <div class="text-5xl md:text-6xl animate-bounce-slow" style="animation-delay: 200ms;">💎</div>
                <div class="text-5xl md:text-6xl animate-bounce-slow" style="animation-delay: 400ms;">7️⃣</div>
                <div class="text-5xl md:text-6xl animate-bounce-slow" style="animation-delay: 600ms;">🎲</div>
                <div class="text-5xl md:text-6xl animate-bounce-slow" style="animation-delay: 800ms;">🃏</div>
            </div>

            <!-- Logo -->
            <div class="inline-block relative group">
                <div class="absolute -inset-4 bg-gradient-to-r from-yellow-400 via-purple-500 to-purple-600 opacity-30 blur-xl rounded-full group-hover:opacity-50 transition-opacity animate-pulse"></div>
                @if(isset($adminSettings) && $adminSettings->logo)
                    <img src="{{ Storage::url($adminSettings->logo) }}" alt="Panda Master" class="relative h-20 w-auto mx-auto mb-4">
                @else
                    <h2 class="relative text-5xl md:text-7xl font-black tracking-tighter">
                        <span class="bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-500 bg-clip-text text-transparent text-glow-yellow uppercase">PANDA</span><span class="text-white uppercase">MASTER</span>
                    </h2>
                @endif
            </div>
            <p class="text-lg md:text-xl text-gray-400 mt-4 font-bold max-w-2xl mx-auto uppercase tracking-widest">
                @if(isset($adminSettings) && $adminSettings->description)
                    {{ $adminSettings->description }}
                @else
                    The Ultimate Fish Game & Online Casino Platform 🐼
                @endif
            </p>
        </div>

        <!-- Jackpot Counter -->
        <div class="mb-16 bg-gradient-to-r from-gray-900/80 via-gray-800/80 to-gray-900/80 backdrop-blur-xl rounded-3xl p-6 md:p-8 border border-yellow-500/20 shadow-[0_0_40px_rgba(234,179,8,0.15)]">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="text-center md:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-yellow-500/10 border border-yellow-500/30 rounded-full mb-3">
                        <span class="w-2 h-2 bg-yellow-500 rounded-full animate-ping"></span>
                        <span class="text-xs font-black text-yellow-500 uppercase tracking-widest">Live Jackpot</span>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-black text-white">Total Won Today</h3>
                </div>
                <div class="text-5xl md:text-7xl font-black bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-500 bg-clip-text text-transparent text-glow-yellow animate-pulse">
                    $2,847,392
                </div>
                <div class="text-center md:text-right">
                    <div class="text-sm text-gray-400 font-bold">Updated in real-time</div>
                    <div class="text-xs text-gray-500 mt-1">🔥 1,247 winners in the last hour</div>
                </div>
            </div>
        </div>

        <!-- Main Grid Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 md:gap-10 mb-16">
            <!-- Brand & About (Spans 2 columns) -->
            <div class="lg:col-span-2 space-y-6">
                <div class="relative group">
                    <div class="absolute -inset-2 bg-gradient-to-r from-yellow-500/20 to-purple-500/20 blur-xl rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative bg-gray-900/50 backdrop-blur-md rounded-2xl p-6 border border-white/5 hover:border-yellow-500/30 transition-all">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-xl flex items-center justify-center shadow-lg animate-pulse">
                                <span class="text-2xl">🎮</span>
                            </div>
                            <h3 class="text-2xl font-black text-white uppercase tracking-tighter">About Us</h3>
                        </div>
                        <p class="text-gray-400 leading-relaxed mb-6">
                            @if(isset($adminSettings) && $adminSettings->description)
                                {{ \Illuminate\Support\Str::limit($adminSettings->description, 150) }}
                            @else
                                Experience the thrill of Panda Master VIP. From high-stakes slots to immersive fish games, we are your ultimate destination for big wins and endless entertainment.
                            @endif
                        </p>
                        
                        <!-- Social Media Links -->
                        <div class="flex flex-wrap gap-3">
                            @if(isset($adminSettings) && $adminSettings->facebook)
                                <a href="{{ $adminSettings->facebook }}" target="_blank" class="group/social w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-xl flex items-center justify-center transition-all">
                                    <svg class="w-5 h-5 text-gray-400 group-hover/social:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                            @endif
                            @if(isset($adminSettings) && $adminSettings->twitter)
                                <a href="{{ $adminSettings->twitter }}" target="_blank" class="group/social w-10 h-10 bg-gray-800 hover:bg-black rounded-xl flex items-center justify-center transition-all">
                                    <svg class="w-5 h-5 text-gray-400 group-hover/social:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                                </a>
                            @endif
                            @if(isset($adminSettings) && $adminSettings->instagram)
                                <a href="{{ $adminSettings->instagram }}" target="_blank" class="group/social w-10 h-10 bg-gray-800 hover:bg-pink-600 rounded-xl flex items-center justify-center transition-all">
                                    <svg class="w-5 h-5 text-gray-400 group-hover/social:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                                </a>
                            @endif
                            @if(isset($adminSettings) && $adminSettings->tiktok)
                                <a href="{{ $adminSettings->tiktok }}" target="_blank" class="group/social w-10 h-10 bg-gray-800 hover:bg-black rounded-xl flex items-center justify-center transition-all">
                                    <span class="text-xs font-black text-gray-400 group-hover/social:text-white">TK</span>
                                </a>
                            @endif
                            @if(isset($adminSettings) && $adminSettings->whatsapp)
                                <a href="{{ $adminSettings->whatsapp }}" target="_blank" class="group/social w-10 h-10 bg-gray-800 hover:bg-green-600 rounded-xl flex items-center justify-center transition-all">
                                    <span class="text-xs font-black text-gray-400 group-hover/social:text-white">WA</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="group">
                <div class="bg-gray-900/50 backdrop-blur-md rounded-2xl p-6 border border-white/5 hover:border-yellow-500/30 transition-all h-full">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-lg flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-black text-white uppercase tracking-wider">Quick Links</h3>
                    </div>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('home') }}" class="group/link flex items-center gap-3 text-gray-400 hover:text-yellow-500 transition-all font-bold">
                                <span class="w-2 h-2 bg-gray-700 rounded-full group-hover/link:bg-yellow-500 group-hover/link:scale-125 transition-all"></span>
                                <span class="relative overflow-hidden">
                                    Home
                                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 group-hover/link:w-full transition-all duration-300"></span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('games.index') }}" class="group/link flex items-center gap-3 text-gray-400 hover:text-yellow-500 transition-all font-bold">
                                <span class="w-2 h-2 bg-gray-700 rounded-full group-hover/link:bg-yellow-500 group-hover/link:scale-125 transition-all"></span>
                                <span class="relative overflow-hidden">
                                    All Games
                                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 group-hover/link:w-full transition-all duration-300"></span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}" class="group/link flex items-center gap-3 text-gray-400 hover:text-yellow-500 transition-all font-bold">
                                <span class="w-2 h-2 bg-gray-700 rounded-full group-hover/link:bg-yellow-500 group-hover/link:scale-125 transition-all"></span>
                                <span class="relative overflow-hidden">
                                    Blog & News
                                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 group-hover/link:w-full transition-all duration-300"></span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="group/link flex items-center gap-3 text-gray-400 hover:text-yellow-500 transition-all font-bold">
                                <span class="w-2 h-2 bg-gray-700 rounded-full group-hover/link:bg-yellow-500 group-hover/link:scale-125 transition-all"></span>
                                <span class="relative overflow-hidden">
                                    About Us
                                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 group-hover/link:w-full transition-all duration-300"></span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="group/link flex items-center gap-3 text-gray-400 hover:text-yellow-500 transition-all font-bold">
                                <span class="w-2 h-2 bg-gray-700 rounded-full group-hover/link:bg-yellow-500 group-hover/link:scale-125 transition-all"></span>
                                <span class="relative overflow-hidden">
                                    Contact Us
                                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 group-hover/link:w-full transition-all duration-300"></span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Game Categories -->
            <div class="group">
                <div class="bg-gray-900/50 backdrop-blur-md rounded-2xl p-6 border border-white/5 hover:border-purple-500/30 transition-all h-full">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <span class="text-xl">🎮</span>
                        </div>
                        <h3 class="text-lg font-black text-white uppercase tracking-wider">Games</h3>
                    </div>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('games.index', ['type' => 'slots']) }}" class="group/cat flex items-center gap-3 text-gray-400 hover:text-transparent hover:bg-gradient-to-r hover:from-yellow-400 hover:to-orange-500 hover:bg-clip-text transition-all font-bold">
                                <span class="text-2xl group-hover/cat:scale-125 group-hover/cat:rotate-12 transition-transform">🎰</span>
                                <span>Slots</span>
                                <span class="ml-auto text-[10px] bg-yellow-500/20 text-yellow-500 px-2 py-0.5 rounded-full font-black">100+</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('games.index', ['type' => 'fish']) }}" class="group/cat flex items-center gap-3 text-gray-400 hover:text-transparent hover:bg-gradient-to-r hover:from-blue-400 hover:to-cyan-500 hover:bg-clip-text transition-all font-bold">
                                <span class="text-2xl group-hover/cat:scale-125 group-hover/cat:rotate-12 transition-transform">🐟</span>
                                <span>Fish Games</span>
                                <span class="ml-auto text-[10px] bg-blue-500/20 text-blue-500 px-2 py-0.5 rounded-full font-black">50+</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('games.index', ['type' => 'keno']) }}" class="group/cat flex items-center gap-3 text-gray-400 hover:text-transparent hover:bg-gradient-to-r hover:from-purple-400 hover:to-purple-600 hover:bg-clip-text transition-all font-bold">
                                <span class="text-2xl group-hover/cat:scale-125 group-hover/cat:rotate-12 transition-transform">🎲</span>
                                <span>Keno</span>
                                <span class="ml-auto text-[10px] bg-purple-500/20 text-purple-500 px-2 py-0.5 rounded-full font-black">25+</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('games.index', ['type' => 'table']) }}" class="group/cat flex items-center gap-3 text-gray-400 hover:text-transparent hover:bg-gradient-to-r hover:from-green-400 hover:to-emerald-500 hover:bg-clip-text transition-all font-bold">
                                <span class="text-2xl group-hover/cat:scale-125 group-hover/cat:rotate-12 transition-transform">🎯</span>
                                <span>Table Games</span>
                                <span class="ml-auto text-[10px] bg-green-500/20 text-green-500 px-2 py-0.5 rounded-full font-black">30+</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('games.index', ['type' => 'card']) }}" class="group/cat flex items-center gap-3 text-gray-400 hover:text-transparent hover:bg-gradient-to-r hover:from-purple-400 hover:to-indigo-500 hover:bg-clip-text transition-all font-bold">
                                <span class="text-2xl group-hover/cat:scale-125 group-hover/cat:rotate-12 transition-transform">🃏</span>
                                <span>Card Games</span>
                                <span class="ml-auto text-[10px] bg-indigo-500/20 text-indigo-500 px-2 py-0.5 rounded-full font-black">20+</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Support & Help -->
            <div class="group">
                <div class="bg-gray-900/50 backdrop-blur-md rounded-2xl p-6 border border-white/5 hover:border-purple-500/30 transition-all h-full">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-black text-white uppercase tracking-wider">Support</h3>
                    </div>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('contact') }}" class="group/link flex items-center gap-3 text-gray-400 hover:text-purple-500 transition-all font-bold">
                                <span class="w-2 h-2 bg-gray-700 rounded-full group-hover/link:bg-purple-500 group-hover/link:scale-125 transition-all"></span>
                                Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="#" class="group/link flex items-center gap-3 text-gray-400 hover:text-purple-500 transition-all font-bold">
                                <span class="w-2 h-2 bg-gray-700 rounded-full group-hover/link:bg-purple-500 group-hover/link:scale-125 transition-all"></span>
                                Help Center
                            </a>
                        </li>
                        <li>
                            <a href="#" class="group/link flex items-center gap-3 text-gray-400 hover:text-purple-500 transition-all font-bold">
                                <span class="w-2 h-2 bg-gray-700 rounded-full group-hover/link:bg-purple-500 group-hover/link:scale-125 transition-all"></span>
                                Live Chat
                            </a>
                        </li>
                        <li>
                            <a href="#" class="group/link flex items-center gap-3 text-gray-400 hover:text-purple-500 transition-all font-bold">
                                <span class="w-2 h-2 bg-gray-700 rounded-full group-hover/link:bg-purple-500 group-hover/link:scale-125 transition-all"></span>
                                Responsible Gaming
                            </a>
                        </li>
                        <li>
                            <a href="#" class="group/link flex items-center gap-3 text-gray-400 hover:text-purple-500 transition-all font-bold">
                                <span class="w-2 h-2 bg-gray-700 rounded-full group-hover/link:bg-purple-500 group-hover/link:scale-125 transition-all"></span>
                                VIP Program
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Payment Methods & Certifications -->
        <div class="mb-12 bg-gray-900/30 backdrop-blur-md rounded-2xl p-6 border border-white/5">
            <div class="text-center mb-6">
                <h4 class="text-sm font-black text-gray-500 uppercase tracking-widest mb-4">Secure Payment Methods</h4>
                <div class="flex flex-wrap justify-center gap-4">
                    <div class="bg-white/5 px-6 py-3 rounded-xl border border-white/10 hover:border-yellow-500/30 transition-all hover:shadow-[0_0_15px_rgba(234,179,8,0.3)]">
                        <span class="text-2xl font-black text-gray-400 hover:text-yellow-500 transition-colors">💳</span>
                    </div>
                    <div class="bg-white/5 px-6 py-3 rounded-xl border border-white/10 hover:border-blue-500/30 transition-all hover:shadow-[0_0_15px_rgba(59,130,246,0.3)]">
                        <span class="text-2xl font-black text-gray-400 hover:text-blue-500 transition-colors">🏦</span>
                    </div>
                    <div class="bg-white/5 px-6 py-3 rounded-xl border border-white/10 hover:border-purple-500/30 transition-all hover:shadow-[0_0_15px_rgba(168,85,247,0.3)]">
                        <span class="text-2xl font-black text-gray-400 hover:text-purple-500 transition-colors">₿</span>
                    </div>
                    <div class="bg-white/5 px-6 py-3 rounded-xl border border-white/10 hover:border-green-500/30 transition-all hover:shadow-[0_0_15px_rgba(34,197,94,0.3)]">
                        <span class="text-2xl font-black text-gray-400 hover:text-green-500 transition-colors">💵</span>
                    </div>
                    <div class="bg-white/5 px-6 py-3 rounded-xl border border-white/10 hover:border-yellow-500/30 transition-all hover:shadow-[0_0_15px_rgba(234,179,8,0.3)]">
                        <span class="text-2xl font-black text-gray-400 hover:text-yellow-500 transition-colors">🔐</span>
                    </div>
                </div>
            </div>

            <!-- Certification Badges -->
            <div class="flex flex-wrap justify-center gap-4">
                <div class="flex items-center gap-2 bg-green-500/10 px-4 py-2 rounded-full border border-green-500/20">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-green-500 text-xs font-black uppercase tracking-wider">SSL Secured</span>
                </div>
                <div class="flex items-center gap-2 bg-purple-500/10 px-4 py-2 rounded-full border border-purple-500/20">
                    <svg class="w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-purple-500 text-xs font-black uppercase tracking-wider">Licensed & Regulated</span>
                </div>
                <div class="flex items-center gap-2 bg-red-500/10 px-4 py-2 rounded-full border border-red-500/20">
                    <span class="text-base">🔞</span>
                    <span class="text-red-500 text-xs font-black uppercase tracking-wider">18+ Only</span>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-white/5 pt-8">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-6">
                <!-- Copyright -->
                <div class="text-center lg:text-left">
                    <p class="text-sm text-gray-500 font-bold">
                        &copy; {{ date('Y') }} <span class="text-transparent bg-gradient-to-r from-yellow-400 to-yellow-600 bg-clip-text">Panda Master VIP</span>. All Rights Reserved.
                    </p>
                    <p class="text-xs text-gray-600 mt-1">Built for Winners. Play Responsibly.</p>
                </div>

                <!-- Legal Links -->
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="#" class="text-xs text-gray-500 hover:text-white transition-colors font-black uppercase tracking-wider">Privacy Policy</a>
                    <a href="#" class="text-xs text-gray-500 hover:text-white transition-colors font-black uppercase tracking-wider">Terms & Conditions</a>
                    <a href="#" class="text-xs text-gray-500 hover:text-white transition-colors font-black uppercase tracking-wider">Cookie Policy</a>
                    <a href="#" class="text-xs text-gray-500 hover:text-white transition-colors font-black uppercase tracking-wider">Responsible Gaming</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button @click="window.scrollTo({ top: 0, behavior: 'smooth' })" 
            x-show="window.scrollY > 500"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-0"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-0"
            class="fixed bottom-8 right-8 z-50 w-14 h-14 bg-gradient-to-r from-yellow-400 to-purple-500 rounded-2xl shadow-[0_0_30px_rgba(234,179,8,0.5)] flex items-center justify-center hover:scale-110 transition-transform cursor-pointer">
        <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>
</footer>

<!-- Footer Animations & Styles -->
<style>
@keyframes float-particle {
    0%, 100% {
        transform: translateY(0) translateX(0);
        opacity: 0;
    }
    10% {
        opacity: 0.3;
    }
    50% {
        transform: translateY(-100px) translateX(50px);
        opacity: 0.6;
    }
    90% {
        opacity: 0.3;
    }
}

@keyframes pulse-slow {
    0%, 100% {
        opacity: 0.1;
        transform: scale(1);
    }
    50% {
        opacity: 0.2;
        transform: scale(1.1);
    }
}

@keyframes rotate-slow {
    from {
        transform: translate(-50%, -50%) rotate(0deg);
    }
    to {
        transform: translate(-50%, -50%) rotate(360deg);
    }
}

@keyframes fade-in-down {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes bounce-slow {
    0%, 100% {
        transform: translateY(-5%);
        animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
    }
    50% {
        transform: translateY(0);
        animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
    }
}

.animate-float-particle {
    animation: float-particle linear infinite;
}

.animate-pulse-slow {
    animation: pulse-slow 4s ease-in-out infinite;
}

.animate-rotate-slow {
    animation: rotate-slow 20s linear infinite;
}

.animate-fade-in-down {
    animation: fade-in-down 0.8s ease-out forwards;
}

.animate-bounce-slow {
    animation: bounce-slow 2s infinite;
}
</style>
