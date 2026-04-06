@extends('layouts.app')

@section('title', 'Login to OrionstarBet')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 opacity-10">
        @for($i = 0; $i < 40; $i++)
            <div class="absolute w-1 h-1 bg-yellow-500 rounded-full animate-twinkle" 
                 style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 3000) }}ms;"></div>
        @endfor
    </div>

    <div class="max-w-md w-full space-y-8 bg-gray-800/90 backdrop-blur-sm p-10 rounded-3xl shadow-2xl border border-yellow-500/20 relative z-10">
        <div>
            <h2 class="mt-6 text-center text-4xl font-extrabold text-white">
                Welcome <span class="text-yellow-500">Back</span> 👋
            </h2>
            <p class="mt-2 text-center text-sm text-gray-400">
                Sign in to your OrionstarBet account
            </p>
        </div>

        @if(session('success'))
            <div class="p-4 bg-green-500/10 border border-green-500/30 rounded-xl">
                <p class="text-green-400 text-sm">{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 bg-red-500/10 border border-red-500/30 rounded-xl">
                <p class="text-red-400 text-sm">{{ session('error') }}</p>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-300 mb-2">Email Address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                        class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-700 placeholder-gray-500 text-white bg-gray-900/50 rounded-xl focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 transition-all sm:text-sm @error('email') border-red-500 @enderror"
                        placeholder="john@example.com">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="relative">
                    <label for="password" class="block text-sm font-bold text-gray-300 mb-2">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-700 placeholder-gray-500 text-white bg-gray-900/50 rounded-xl focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 transition-all sm:text-sm @error('password') border-red-500 @enderror"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg class="h-5 w-5 text-gray-500 hover:text-yellow-500 transition-colors" id="password-eye" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox"
                        class="h-4 w-4 text-yellow-500 focus:ring-yellow-500 border-gray-700 rounded bg-gray-900/50">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-300">
                        Remember me
                    </label>
                </div>

                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-bold text-yellow-500 hover:text-yellow-400 transition-colors">
                        Forgot password?
                    </a>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-gradient-to-r from-yellow-500 to-pink-500 hover:from-yellow-400 hover:to-pink-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    🎰 Sign In & Start Playing
                </button>
            </div>
        </form>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-400">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-bold text-yellow-500 hover:text-yellow-400 transition-colors">
                    Join now & get $1000 bonus →
                </a>
            </p>
        </div>

        <!-- Quick Stats -->
        <div class="pt-6 border-t border-gray-700">
            <div class="grid grid-cols-3 gap-4 text-center">
                <div>
                    <div class="text-lg font-bold text-yellow-500">100+</div>
                    <div class="text-xs text-gray-500">Games</div>
                </div>
                <div>
                    <div class="text-lg font-bold text-pink-500">$2M+</div>
                    <div class="text-xs text-gray-500">Won Today</div>
                </div>
                <div>
                    <div class="text-lg font-bold text-yellow-500">50K+</div>
                    <div class="text-xs text-gray-500">Players</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const eyeIcon = document.getElementById(inputId + '-eye');

    if (input.type === 'password') {
        input.type = 'text';
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 1.053 0 2.062.18 3 .512M7.943 7.943L16.057 16.057M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
        `;
    } else {
        input.type = 'password';
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        `;
    }
}
</script>
@endpush
