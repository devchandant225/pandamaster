<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Global Header Scripts -->
    @if(isset($adminSettings) && $adminSettings->header_scripts)
        {!! $adminSettings->header_scripts !!}
    @endif
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    @if(isset($adminSettings) && $adminSettings->favicon)
        <link rel="icon" type="image/png" href="{{ Storage::url($adminSettings->favicon) }}">
    @else
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    @endif
    <link rel="manifest" href="/site.webmanifest">

    <!-- SEO Meta Tags -->
    @if(request()->routeIs('blog.show') && isset($post))
        <x-blog-meta-tags :post="$post" />
    @elseif(request()->routeIs('games.show') && isset($game))
        <x-game-meta-tags :game="$game" />
    @else
        <x-meta-tags />
    @endif

    @stack('meta')
    @yield('meta_tags')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="font-sans antialiased bg-gray-900 text-white">
       <!-- Global Footer Scripts -->
    @if(isset($adminSettings) && $adminSettings->footer_scripts)
        {!! $adminSettings->footer_scripts !!}
    @endif
    <div class="min-h-screen">
        <!-- Flash Messages -->
        @if (session('success'))
            <div id="success-message"
                class="fixed top-4 right-4 z-50 bg-green-500 text-white px-6 py-4 rounded-xl shadow-lg flex items-center gap-3 animate-fade-in-down">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
                <button onclick="document.getElementById('success-message').remove()" class="ml-2 hover:opacity-75">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div id="error-message"
                class="fixed top-4 right-4 z-50 bg-red-500 text-white px-6 py-4 rounded-xl shadow-lg flex items-center gap-3 animate-fade-in-down">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <span class="font-medium">{{ session('error') }}</span>
                <button onclick="document.getElementById('error-message').remove()" class="ml-2 hover:opacity-75">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        @endif

        <x-header />

        <main>
            @yield('content')
        </main>

        <x-footer />
    </div>

    <!-- Floating Play Now CTA -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3 pointer-events-none">
        <a href="{{ $adminSettings->external_dashboard_url ?? ($adminSettings->login_url ?? route('login')) }}" 
           class="pointer-events-auto group relative flex items-center gap-3 bg-gradient-to-r from-yellow-500 to-yellow-600 text-black px-6 py-4 rounded-2xl font-black uppercase tracking-widest shadow-[0_20px_50px_rgba(234,179,8,0.3)] hover:shadow-[0_20px_50px_rgba(234,179,8,0.5)] transition-all transform hover:-translate-y-2 active:scale-95">
            <span class="relative z-10">Play Now</span>
            <div class="relative z-10 w-8 h-8 bg-black/10 rounded-lg flex items-center justify-center group-hover:bg-black/20 transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                </svg>
            </div>
            
            <!-- Pulse Effect -->
            <div class="absolute inset-0 rounded-2xl bg-yellow-400 animate-ping opacity-20 group-hover:opacity-40 transition-opacity"></div>
        </a>
    </div>

    @if (session('success'))
        <script>
            setTimeout(function() {
                const msg = document.getElementById('success-message');
                if (msg) {
                    msg.style.transition = 'opacity 0.5s ease';
                    msg.style.opacity = '0';
                    setTimeout(() => msg.remove(), 500);
                }
            }, 5000);
        </script>
    @endif
 
    @stack('scripts')
</body>

</html>
