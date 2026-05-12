@props(['active' => 'dashboard'])

<aside
    x-data="{ open: false }"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-black text-white transform lg:translate-x-0 transition-transform duration-300 ease-in-out border-r border-[#D4AF37]/20"
    :class="open ? 'translate-x-0' : '-translate-x-full'"
>
    <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="h-20 flex items-center px-8 border-b border-[#D4AF37]/20">
            <a href="{{ url('/') }}" class="text-2xl font-black tracking-tighter text-[#D4AF37]">ORION <span class="text-white">STAR</span></a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto custom-scrollbar">
            @php
                $role = auth()->user()->role;
            @endphp

            @if($role === 'admin')
                <div class="pb-2">
                    <p class="px-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2">Main</p>
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'admin-dashboard' ? 'bg-[#D4AF37] text-black font-bold shadow-lg shadow-[#D4AF37]/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.users.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'users' ? 'bg-[#D4AF37] text-black font-bold shadow-lg shadow-[#D4AF37]/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        User Management
                    </a>
                </div>

                <div class="py-2">
                    <p class="px-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2">Gaming Content</p>
                    <a href="{{ route('admin.games.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'games' ? 'bg-[#D4AF37] text-black font-bold shadow-lg shadow-[#D4AF37]/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Game Library
                    </a>
                    <a href="{{ route('admin.landing-sections.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'landing-sections' ? 'bg-[#D4AF37] text-black font-bold shadow-lg shadow-[#D4AF37]/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                        Landing Sections
                    </a>
                </div>

                <div class="py-2">
                    <p class="px-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2">Marketing</p>
                    <a href="{{ route('admin.about.edit') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'about-page' ? 'bg-[#D4AF37] text-black font-bold shadow-lg shadow-[#D4AF37]/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        About Us Page
                    </a>
                    <a href="{{ route('admin.blog.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'blog' ? 'bg-[#D4AF37] text-black font-bold shadow-lg shadow-[#D4AF37]/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        Blog Articles
                    </a>
                    <a href="{{ route('admin.subscribers.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'subscribers' ? 'bg-[#D4AF37] text-black font-bold shadow-lg shadow-[#D4AF37]/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Subscribers
                    </a>
                    <a href="{{ route('admin.contacts.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'contacts' ? 'bg-[#D4AF37] text-black font-bold shadow-lg shadow-[#D4AF37]/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0l-8 5-8-5"></path></svg>
                        Contact Messages
                    </a>
                    <a href="{{ route('admin.media.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'media' ? 'bg-[#D4AF37] text-black font-bold shadow-lg shadow-[#D4AF37]/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Media Library
                    </a>
                </div>

                <div class="py-2">
                    <p class="px-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2">SEO & Settings</p>
                    <a href="{{ route('admin.meta-tags.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'meta-tags' ? 'bg-[#D4AF37] text-black font-bold shadow-lg shadow-[#D4AF37]/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path></svg>
                        Page Meta Tags
                    </a>
                    <a href="{{ route('admin.profile') }}?tab=seo"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'sitemap' ? 'bg-[#D4AF37] text-black font-bold shadow-lg shadow-[#D4AF37]/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Sitemap & Robots
                    </a>
                </div>
@endif

            <!-- Common Links -->
            @php
                $profileRoute = match($role) {
                    'admin' => route('admin.profile'),
                    'agent' => route('admin.profile'),
                    default => route('admin.dashboard'),
                };
            @endphp
            <div class="py-2">
                <p class="px-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2">Account</p>
                <a href="{{ $profileRoute }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active === 'profile' ? 'bg-[#D4AF37] text-black font-bold shadow-lg shadow-[#D4AF37]/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    System Profile
                </a>
            </div>
        </nav>

        <!-- Logout -->
        <div class="p-4 border-t border-[#D4AF37]/20">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 px-4 py-3 w-full rounded-xl font-black uppercase tracking-widest text-[10px] text-gray-400 hover:text-white hover:bg-red-500/10 transition-all">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout
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
    background: #D4AF3720;
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #D4AF3740;
}
</style>
