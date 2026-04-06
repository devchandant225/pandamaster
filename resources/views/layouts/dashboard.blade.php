<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard - Orionstar Gaming')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
</head>
<body class="font-sans antialiased bg-gray-900 text-white">
    <div class="min-h-screen bg-gray-900" x-data="{ sidebarOpen: false }">
        @php
            $userRole = auth()->user()->role ?? 'user';
        @endphp

        <!-- Sidebar (Desktop) -->
        <div class="hidden lg:block">
            @include('layouts.partials.dashboard-sidebar', ['userRole' => $userRole])
        </div>

        <!-- Sidebar (Mobile) -->
        <div 
            x-show="sidebarOpen" 
            class="fixed inset-0 z-[60] lg:hidden" 
            x-cloak
        >
            <!-- Backdrop -->
            <div 
                x-show="sidebarOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="sidebarOpen = false"
                class="absolute inset-0 bg-black/60 backdrop-blur-sm"
            ></div>

            <!-- Sidebar Content -->
            <div 
                x-show="sidebarOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                class="absolute inset-y-0 left-0 w-72 shadow-2xl"
            >
                @include('layouts.partials.dashboard-sidebar', ['userRole' => $userRole, 'isMobile' => true])
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:pl-64 flex flex-col min-h-screen">
            <!-- Header -->
            @include('layouts.partials.dashboard-header')

            <!-- Page Content -->
            <main class="flex-1">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
