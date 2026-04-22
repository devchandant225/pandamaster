@props(['userRole' => 'admin', 'active' => 'admin-dashboard', 'isMobile' => false])

<aside class="flex flex-col h-full bg-gray-900 text-white border-r border-yellow-500/20 {{ $isMobile ? 'w-full' : 'fixed inset-y-0 left-0 w-64' }}">
    <!-- Logo Section -->
    <div class="h-24 flex items-center px-8 mb-4 relative overflow-hidden">
        <div class="absolute -top-10 -left-10 w-32 h-32 bg-yellow-500/10 rounded-full blur-3xl"></div>
        <a href="{{ url('/') }}" class="relative z-10 flex items-center gap-2 group">
            <div class="text-2xl font-black">
                <span class="text-green-500">Orion</span><span class="text-white">Star</span>
            </div>
        </a>
    </div>

    <!-- Navigation Content -->
    <div class="flex-1 px-4 space-y-8 overflow-y-auto custom-scrollbar">
        <!-- Main Section -->
        <div>
            <h3 class="px-4 text-[10px] font-black text-gray-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                <span class="w-1 h-1 bg-yellow-500 rounded-full"></span>
                Main Navigation
            </h3>
            <div class="space-y-1.5">
                <x-sidebar-link :href="route('admin.dashboard')" :active="$active === 'admin-dashboard'" icon="grid" label="Dashboard" />
                <x-sidebar-link :href="route('admin.games.index')" :active="$active === 'games'" icon="gamepad" label="Games" />
                <x-sidebar-link :href="route('admin.game-categories.index')" :active="$active === 'game-categories'" icon="folder" label="Categories" />
            </div>
        </div>

        <!-- Content Section -->
        <div>
            <h3 class="px-4 text-[10px] font-black text-gray-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                <span class="w-1 h-1 bg-purple-500 rounded-full"></span>
                Content & Pages
            </h3>
            <div class="space-y-1.5">
                <x-sidebar-link :href="route('admin.blog.index')" :active="$active === 'blog'" icon="edit" label="Blog Articles" />
                <x-sidebar-link :href="route('admin.categories.index')" :active="$active === 'categories'" icon="tag" label="Blog Categories" />
            </div>
        </div>

        <!-- Users & Settings -->
        <div>
            <h3 class="px-4 text-[10px] font-black text-gray-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                <span class="w-1 h-1 bg-green-500 rounded-full"></span>
                Users & Settings
            </h3>
            <div class="space-y-1.5">
                <x-sidebar-link :href="route('admin.users.index')" :active="$active === 'users'" icon="user-group" label="Users" />
                <x-sidebar-link :href="route('admin.meta-tags.index')" :active="$active === 'meta-tags'" icon="search" label="SEO Settings" />
            </div>
        </div>

        <!-- Quick Actions -->
        <div>
            <h3 class="px-4 text-[10px] font-black text-gray-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                <span class="w-1 h-1 bg-green-500 rounded-full"></span>
                Account
            </h3>
            <div class="space-y-1.5">
                <x-sidebar-link :href="route('admin.profile')" :active="$active === 'profile'" icon="user" label="My Profile" />
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-gray-300 hover:text-yellow-500 hover:bg-gray-800 rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    View Site
                </a>
            </div>
        </div>
    </div>

    <!-- User Profile Footer -->
    <div class="p-4 mt-auto">
        <div class="bg-gray-800 border border-yellow-500/20 rounded-xl p-4 flex items-center gap-3 hover:border-yellow-500/50 transition-colors cursor-pointer">
            <div class="relative">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-yellow-500 to-purple-500 flex items-center justify-center text-white font-black group-hover:scale-105 transition-transform">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-gray-900 rounded-full"></div>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-black truncate text-white leading-none mb-1">{{ auth()->user()->name }}</p>
                <p class="text-[10px] font-bold text-yellow-500 uppercase tracking-wider">{{ $userRole }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="flex-shrink-0">
                @csrf
                <button type="submit" class="p-2 text-gray-500 hover:text-red-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(234, 179, 8, 0.2);
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(234, 179, 8, 0.4);
    }
</style>
