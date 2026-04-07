@extends('layouts.app')

@section('title', 'Reset Password - OrionstarBet')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 opacity-10">
        @for($i = 0; $i < 30; $i++)
            <div class="absolute w-1 h-1 bg-yellow-500 rounded-full animate-twinkle" 
                 style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 3000) }}ms;"></div>
        @endfor
    </div>

    <div class="max-w-md w-full space-y-8 bg-gray-800/90 backdrop-blur-sm p-10 rounded-3xl shadow-2xl border border-yellow-500/20 relative z-10">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
                Reset <span class="text-yellow-500">Password</span> 🔐
            </h2>
            <p class="mt-2 text-center text-sm text-gray-400">
                Enter your email and we'll send you a reset link
            </p>
        </div>

        @if(session('status'))
            <div class="p-4 bg-green-500/10 border border-green-500/30 rounded-xl">
                <p class="text-green-400 text-sm">{{ session('status') }}</p>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div>
                <label for="email" class="block text-sm font-bold text-gray-300 mb-2">Email Address</label>
                <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                    class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-700 placeholder-gray-500 text-white bg-gray-900/50 rounded-xl focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 transition-all sm:text-sm @error('email') border-red-500 @enderror"
                    placeholder="john@example.com">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-gradient-to-r from-yellow-500 to-purple-500 hover:from-yellow-400 hover:to-purple-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Send Reset Link
                </button>
            </div>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('login') }}" class="font-bold text-yellow-500 hover:text-yellow-400 transition-colors text-sm">
                ← Back to login
            </a>
        </div>
    </div>
</div>
@endsection
