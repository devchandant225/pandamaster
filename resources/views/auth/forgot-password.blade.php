@extends('layouts.app')

@section('title', 'Forgot Password - 888Realty')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-3xl shadow-2xl border border-gray-100">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Reset <span class="text-[#D4AF37]">Password</span>
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Enter your email address and we'll send you a link to reset your password.
            </p>
        </div>

        @if(session('status'))
            <div class="p-4 bg-green-50 border border-green-200 rounded-xl">
                <p class="text-green-800 text-sm">{{ session('status') }}</p>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Email Address</label>
                <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                    class="appearance-none relative block w-full px-4 py-3 border-2 border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-[#D4AF37] focus:border-[#D4AF37] transition-all sm:text-sm @error('email') border-red-500 @enderror"
                    placeholder="john@example.com">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-xl text-black bg-[#D4AF37] hover:bg-[#F4D03F] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#D4AF37] transition-all shadow-lg hover:shadow-xl">
                    Send Reset Link
                </button>
            </div>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('login') }}" class="font-bold text-[#D4AF37] hover:text-yellow-600 transition-colors text-sm">
                ← Back to login
            </a>
        </div>
    </div>
</div>
@endsection
