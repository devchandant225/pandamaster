@props(['active' => 'dashboard'])

<aside
    x-data="{ open: false }"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-black text-white transform lg:translate-x-0 transition-transform duration-300 ease-in-out"
    :class="open ? 'translate-x-0' : '-translate-x-full'"
>
    <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="h-20 flex items-center px-8 border-b border-[#D4AF37]/20">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-[#D4AF37]">888 <span class="text-white">REALTY</span></a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            @php
                $role = auth()->user()->role;
            @endphp

            @if($role === 'admin')
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'admin-dashboard' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.leads.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'leads' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Lead Management
                </a>
                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'users' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    User Management
                </a>
                <a href="{{ route('admin.properties.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'properties' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Property Management
                </a>
                <a href="{{ route('admin.team.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'team' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Team Management
                </a>
                <a href="{{ route('admin.blog.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'blog' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    Blog Management
                </a>
                <a href="{{ route('admin.categories.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'categories' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    Category Management
                </a>
@endif

            @if($role === 'agent')
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'dashboard' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('agent.listings') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'listings' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    My Listings
                </a>
                <a href="{{ route('agent.submit') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'submit-listing' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Submit Listing
                </a>
                <a href="{{ route('agent.leads') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'leads' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Leads Received
                </a>
            @endif

            @if($role === 'user')
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'dashboard' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-gray-900 hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    My Favorites
                </a>
            @endif

            <!-- Common Links -->
            @php
                $profileRoute = match($role) {
                    'admin' => route('admin.profile'),
                    'agent' => route('agent.profile'),
                    default => route('dashboard'), // Or a user profile if implemented
                };
            @endphp
            <a href="{{ $profileRoute }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'profile' ? 'bg-[#D4AF37] text-black font-bold' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                My Profile
            </a>
        </nav>

        <!-- Logout -->
        <div class="p-4 border-t border-[#D4AF37]/20">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 px-4 py-3 w-full rounded-xl font-medium text-gray-400 hover:text-white hover:bg-gray-900 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>
