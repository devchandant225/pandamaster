@extends('layouts.app')

@section('title', 'Register - 888Realty')

@section('content')
<div class="min-h-[90vh] flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8" x-data="{ role: 'user' }">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-3xl shadow-2xl border border-gray-100">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">
                Join <span class="text-[#D4AF37]">888Realty</span>
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Create your account to start your journey
            </p>
        </div>

        @if(session('success'))
            <div class="p-4 bg-green-50 border border-green-200 rounded-xl">
                <p class="text-green-800 text-sm">{{ session('success') }}</p>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
            @csrf

            <!-- Role Selection -->
            <div class="flex gap-4 mb-6">
                <button type="button" @click="role = 'user'"
                    class="flex-1 py-3 px-4 rounded-xl border-2 font-bold text-sm transition-all"
                    :class="role === 'user' ? 'border-[#D4AF37] bg-[#D4AF37]/10 text-[#D4AF37]' : 'border-gray-200 text-gray-500 hover:border-gray-300'">
                    <svg class="w-5 h-5 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Client
                </button>
                <button type="button" @click="role = 'agent'"
                    class="flex-1 py-3 px-4 rounded-xl border-2 font-bold text-sm transition-all"
                    :class="role === 'agent' ? 'border-[#D4AF37] bg-[#D4AF37]/10 text-[#D4AF37]' : 'border-gray-200 text-gray-500 hover:border-gray-300'">
                    <svg class="w-5 h-5 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Agent
                </button>
            </div>
            <input type="hidden" name="role" :value="role">

            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Full Name</label>
                    <input id="name" name="name" type="text" required value="{{ old('name') }}"
                        class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-[#D4AF37] focus:border-[#D4AF37] transition-all sm:text-sm @error('name') border-red-500 @enderror"
                        placeholder="John Smith">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Email Address</label>
                    <input id="email" name="email" type="email" required value="{{ old('email') }}"
                        class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-[#D4AF37] focus:border-[#D4AF37] transition-all sm:text-sm @error('email') border-red-500 @enderror"
                        placeholder="john@example.com">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div x-show="role === 'agent'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
                    <div>
                        <label for="phone" class="block text-sm font-bold text-gray-700 mb-1">Phone Number</label>
                        <input id="phone" name="phone" type="tel" value="{{ old('phone') }}"
                            class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-[#D4AF37] focus:border-[#D4AF37] transition-all sm:text-sm @error('phone') border-red-500 @enderror"
                            placeholder="(604) 123-4567">
                        @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="city" class="block text-sm font-bold text-gray-700 mb-1">Service City</label>
                        <input id="city" name="city" type="text" value="{{ old('city') }}"
                            class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-[#D4AF37] focus:border-[#D4AF37] transition-all sm:text-sm @error('city') border-red-500 @enderror"
                            placeholder="e.g. Vancouver">
                        @error('city') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="p-4 bg-[#D4AF37]/10 border border-[#D4AF37]/20 rounded-xl">
                        <p class="text-xs text-gray-600">
                            <svg class="w-4 h-4 inline mr-1 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Access to agent portal and lead management
                        </p>
                        <p class="text-xs text-gray-600 mt-1">
                            <svg class="w-4 h-4 inline mr-1 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Submit and manage property listings
                        </p>
                    </div>
                </div>

                <div x-show="role === 'user'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
                    <div>
                        <label for="phone" class="block text-sm font-bold text-gray-700 mb-1">Phone Number (Optional)</label>
                        <input id="phone" name="phone" type="tel" value="{{ old('phone') }}"
                            class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-[#D4AF37] focus:border-[#D4AF37] transition-all sm:text-sm @error('phone') border-red-500 @enderror"
                            placeholder="(604) 123-4567">
                        @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="p-4 bg-[#D4AF37]/10 border border-[#D4AF37]/20 rounded-xl">
                        <p class="text-xs text-gray-600">
                            <svg class="w-4 h-4 inline mr-1 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Instant access to exclusive property valuations
                        </p>
                        <p class="text-xs text-gray-600 mt-1">
                            <svg class="w-4 h-4 inline mr-1 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Unlock high-res media galleries and floor plans
                        </p>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required
                            class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-[#D4AF37] focus:border-[#D4AF37] transition-all sm:text-sm @error('password') border-red-500 @enderror"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg class="h-5 w-5 text-gray-500 hover:text-[#D4AF37] transition-colors" id="password-eye" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-1">Confirm Password</label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-[#D4AF37] focus:border-[#D4AF37] transition-all sm:text-sm"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password_confirmation')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg class="h-5 w-5 text-gray-500 hover:text-[#D4AF37] transition-colors" id="password_confirmation-eye" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-xl text-black bg-[#D4AF37] hover:bg-[#F4D03F] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#D4AF37] transition-all shadow-lg hover:shadow-xl">
                    Create Account
                </button>
            </div>
        </form>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="font-bold text-[#D4AF37] hover:text-yellow-600 transition-colors">
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
