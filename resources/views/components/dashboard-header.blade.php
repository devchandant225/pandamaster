@props(['title' => 'Dashboard'])

<header class="bg-white border-b border-gray-200 sticky top-0 z-40" x-data="{ showNotifications: false, showProfile: false }">
    <div class="flex items-center justify-between px-6 py-4">
        <!-- Mobile Menu Button -->
        <button @click="$dispatch('sidebar-toggle')" class="lg:hidden p-2 hover:bg-gray-100 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <!-- Page Title -->
        <h1 class="text-xl font-bold text-gray-900 hidden lg:block">{{ $title }}</h1>

        <!-- Search -->
        <div class="flex-1 max-w-xl mx-4 hidden md:block">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input
                    type="text"
                    placeholder="Search listings, leads..."
                    class="w-full pl-10 pr-4 h-11 bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#D4AF37] rounded-xl text-sm transition-colors outline-none"
                />
            </div>
        </div>

        <!-- Right Section -->
        <div class="flex items-center gap-4">
            <!-- Notifications -->
            <div class="relative">
                <button
                    @click="showNotifications = !showNotifications"
                    @click.away="showNotifications = false"
                    class="relative p-2 hover:bg-gray-100 rounded-lg transition-colors"
                >
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <span class="absolute top-1 right-1 w-5 h-5 bg-[#D4AF37] text-black text-xs font-bold rounded-full flex items-center justify-center">
                        3
                    </span>
                </button>

                <!-- Notifications Dropdown -->
                <div
                    x-show="showNotifications"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-2xl border border-gray-200 overflow-hidden z-50"
                    style="display: none;"
                >
                    <div class="p-4 bg-black text-white font-semibold flex items-center justify-between">
                        <span>Notifications</span>
                        <span class="text-xs bg-[#D4AF37] text-black px-2 py-0.5 rounded-full">3 new</span>
                    </div>
                    <div class="max-h-96 overflow-y-auto">
                        <div class="p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer bg-blue-50/50">
                            <p class="text-sm font-medium text-gray-900">New lead received from Vancouver</p>
                            <p class="text-xs text-gray-500 mt-1">5 min ago</p>
                        </div>
                        <div class="p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer bg-blue-50/50">
                            <p class="text-sm font-medium text-gray-900">Your listing was approved</p>
                            <p class="text-xs text-gray-500 mt-1">1 hour ago</p>
                        </div>
                        <div class="p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer">
                            <p class="text-sm font-medium text-gray-900">Meeting scheduled for tomorrow</p>
                            <p class="text-xs text-gray-500 mt-1">2 hours ago</p>
                        </div>
                    </div>
                    <div class="p-3 text-center border-t border-gray-200">
                        <button class="text-sm text-[#D4AF37] font-semibold hover:text-[#F4D03F]">
                            View All Notifications
                        </button>
                    </div>
                </div>
            </div>

            <!-- Profile -->
            <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                <div class="text-right hidden sm:block">
                    <div class="text-sm font-semibold text-gray-900">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-gray-500 capitalize">{{ auth()->user()->role }}</div>
                </div>
                <div class="w-10 h-10 rounded-full bg-[#D4AF37] flex items-center justify-center text-black font-bold border-2 border-[#D4AF37] overflow-hidden">
                    @if(auth()->user()->avatar_url)
                        <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="w-full h-full object-cover">
                    @else
                        {{ substr(auth()->user()->name, 0, 1) }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
