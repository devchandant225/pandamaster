@extends('layouts.app')

@section('title', 'Admin Login - Orion Star VIP')

@section('content')
<div class="min-h-screen bg-gray-950 text-white flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(168,85,247,0.05)_0%,rgba(0,0,0,1)_100%)]"></div>
    
    <div class="relative z-10 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="text-center">
            <h1 class="text-4xl font-black uppercase tracking-tighter text-white mb-2">Orion Star VIP</h1>
            <h2 class="text-xl font-bold text-gray-500 uppercase tracking-widest mb-8">Admin Dashboard</h2>
        </div>

        <div class="bg-gray-900 border border-white/10 py-10 px-6 shadow-2xl rounded-[2rem] sm:px-10">
            @if(session('status'))
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 rounded-xl text-green-400 text-sm font-bold text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2 ml-4">Admin Email</label>
                    <div class="relative">
                        <input id="email" name="email" type="email" autocomplete="email" required 
                            class="w-full px-6 py-4 bg-gray-950 border border-white/10 rounded-2xl focus:outline-none focus:border-purple-500 transition-all text-white font-bold"
                            placeholder="admin@example.com">
                    </div>
                    @error('email') <p class="text-red-500 text-xs mt-2 ml-4">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password" class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2 ml-4">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                            class="w-full px-6 py-4 bg-gray-950 border border-white/10 rounded-2xl focus:outline-none focus:border-purple-500 transition-all text-white font-bold"
                            placeholder="••••••••">
                    </div>
                    @error('password') <p class="text-red-500 text-xs mt-2 ml-4">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center justify-between px-4">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded bg-gray-950">
                        <label for="remember_me" class="ml-2 block text-xs font-bold text-gray-400 uppercase tracking-widest cursor-pointer">
                            Remember me
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="text-xs font-bold text-purple-500 uppercase tracking-widest hover:text-purple-400">
                                Forgot password?
                            </a>
                        </div>
                    @endif
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-5 px-4 border border-transparent rounded-2xl shadow-sm text-xl font-black text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all transform hover:-translate-y-1 uppercase tracking-tighter">
                        Sign In →
                    </button>
                </div>
            </form>
        </div>
        
        <div class="mt-8 text-center">
            <a href="{{ url('/') }}" class="text-xs font-bold text-gray-500 uppercase tracking-widest hover:text-white transition-colors">
                ← Back to Main Site
            </a>
        </div>
    </div>
</div>
@endsection
