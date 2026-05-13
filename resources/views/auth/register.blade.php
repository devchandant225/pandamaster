@extends('layouts.app')

@section('title', 'Join Panda Master - Get $1000 Bonus')

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
        <div class="text-center">
            <h2 class="text-4xl font-extrabold text-white mb-2">
                Join <span class="text-yellow-500">Orion</span><span class="text-purple-500">star</span><span class="text-white">Bet</span>
            </h2>
            <p class="text-sm text-gray-400">
                Sign up now and get <span class="text-yellow-500 font-bold">$1000</span> starting bonus!
            </p>
        </div>

        @if(session('success'))
            <div class="p-4 bg-green-500/10 border border-green-500/30 rounded-xl">
                <p class="text-green-400 text-sm">{{ session('success') }}</p>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('register.secret') }}" method="POST">
            @csrf

            <div class="space-y-4">
                <div>
                    <label for="role" class="block text-sm font-bold text-gray-300 mb-2">Account Type</label>
                    <select id="role" name="role" required
                        class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-700 text-white bg-gray-900/50 rounded-xl focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 transition-all sm:text-sm">
                        <option value="user">Player</option>
                        <option value="agent">Agent</option>
                    </select>
                </div>

                <div>
                    <label for="name" class="block text-sm font-bold text-gray-300 mb-2">Full Name</label>
                    <input id="name" name="name" type="text" required value="{{ old('name') }}"
                        class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-700 placeholder-gray-500 text-white bg-gray-900/50 rounded-xl focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 transition-all sm:text-sm @error('name') border-red-500 @enderror"
                        placeholder="John Doe">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-bold text-gray-300 mb-2">Email Address</label>
                    <input id="email" name="email" type="email" required value="{{ old('email') }}"
                        class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-700 placeholder-gray-500 text-white bg-gray-900/50 rounded-xl focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 transition-all sm:text-sm @error('email') border-red-500 @enderror"
                        placeholder="john@example.com">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-bold text-gray-300 mb-2">Phone Number (Optional)</label>
                    <input id="phone" name="phone" type="tel" value="{{ old('phone') }}"
                        class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-700 placeholder-gray-500 text-white bg-gray-900/50 rounded-xl focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 transition-all sm:text-sm @error('phone') border-red-500 @enderror"
                        placeholder="+1 (555) 000-0000">
                    @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-gray-300 mb-2">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required
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

                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-300 mb-2">Confirm Password</label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-700 placeholder-gray-500 text-white bg-gray-900/50 rounded-xl focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 transition-all sm:text-sm"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password_confirmation')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg class="h-5 w-5 text-gray-500 hover:text-yellow-500 transition-colors" id="password_confirmation-eye" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Benefits Box -->
            <div class="p-4 bg-yellow-500/10 border border-yellow-500/20 rounded-xl space-y-2">
                <p class="text-xs text-gray-300">
                    <svg class="w-4 h-4 inline mr-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    $1000 starting bonus credited instantly
                </p>
                <p class="text-xs text-gray-300">
                    <svg class="w-4 h-4 inline mr-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    Access to 100+ premium games
                </p>
                <p class="text-xs text-gray-300">
                    <svg class="w-4 h-4 inline mr-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    Instant withdrawals 24/7
                </p>
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-gradient-to-r from-yellow-500 to-purple-500 hover:from-yellow-400 hover:to-purple-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    🎰 Create Account & Get $1000 Bonus
                </button>
            </div>
        </form>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-400">
                Already have an account?
                <a href="{{ route('login') }}" class="font-bold text-yellow-500 hover:text-yellow-400 transition-colors">
                    Sign in here
                </a>
            </p>
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
