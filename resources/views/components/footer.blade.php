<footer class="bg-gray-900 text-gray-300 border-t border-yellow-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Logo & About -->
            <div class="lg:col-span-2">
                <div class="flex items-center gap-2 mb-4">
                    <div class="text-3xl font-black">
                        <span class="text-yellow-500">Orion</span><span class="text-pink-500">Star</span>
                    </div>
                </div>
                <p class="text-sm text-gray-400 mb-6">
                    Your premier online gaming platform offering the best slots, fish games, keno, table games, and card games. Play and win big!
                </p>
                <div class="flex items-center gap-4">
                    <a href="{{ route('games.index') }}" class="bg-gradient-to-r from-yellow-500 to-yellow-400 text-black px-6 py-2.5 rounded-lg hover:from-yellow-400 hover:to-yellow-300 transition-all font-semibold text-sm inline-flex items-center gap-2 shadow-lg shadow-yellow-500/30">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.5 4a.5.5 0 010-1 4.5 4.5 0 019 0 .5.5 0 01-1 0 3.5 3.5 0 00-7 0 .5.5 0 01-1 0z"/>
                        </svg>
                        Play Now
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-sm hover:text-yellow-500 transition-colors">Home</a></li>
                    <li><a href="{{ route('games.index') }}" class="text-sm hover:text-yellow-500 transition-colors">All Games</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-sm hover:text-yellow-500 transition-colors">Blog</a></li>
                    <li><a href="{{ route('about') }}" class="text-sm hover:text-yellow-500 transition-colors">About Us</a></li>
                    @auth
                        <li><a href="{{ route('dashboard') }}" class="text-sm hover:text-yellow-500 transition-colors">Dashboard</a></li>
                    @endauth
                </ul>
            </div>

            <!-- Game Categories -->
            <div>
                <h3 class="text-white font-semibold mb-4">Game Categories</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('games.index', ['type' => 'slots']) }}" class="text-sm hover:text-yellow-500 transition-colors">🎰 Slots</a></li>
                    <li><a href="{{ route('games.index', ['type' => 'fish']) }}" class="text-sm hover:text-yellow-500 transition-colors">🐟 Fish Games</a></li>
                    <li><a href="{{ route('games.index', ['type' => 'keno']) }}" class="text-sm hover:text-yellow-500 transition-colors">🎲 Keno</a></li>
                    <li><a href="{{ route('games.index', ['type' => 'table']) }}" class="text-sm hover:text-yellow-500 transition-colors">🎯 Table Games</a></li>
                    <li><a href="{{ route('games.index', ['type' => 'card']) }}" class="text-sm hover:text-yellow-500 transition-colors">🃏 Card Games</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-500">
                    &copy; {{ date('Y') }} Orionstar Gaming. All rights reserved. | Play Responsibly
                </p>
                <div class="flex gap-6">
                    <a href="{{ route('about') }}" class="text-sm text-gray-500 hover:text-yellow-500 transition-colors">Privacy Policy</a>
                    <a href="{{ route('about') }}" class="text-sm text-gray-500 hover:text-yellow-500 transition-colors">Terms of Service</a>
                    <a href="{{ route('about') }}" class="text-sm text-gray-500 hover:text-yellow-500 transition-colors">Responsible Gaming</a>
                </div>
            </div>
        </div>
    </div>
</footer>
