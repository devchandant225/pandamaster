@extends('layouts.app')

@section('title', 'Login to OrionStar')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-black relative overflow-hidden py-20 px-4 sm:px-6 lg:px-8">
    <!-- cinematic Background & Lighting -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(17,24,39,1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="absolute top-1/4 -left-20 w-[500px] h-[500px] bg-yellow-500/5 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-1/4 -right-20 w-[600px] h-[600px] bg-pink-500/5 rounded-full blur-[120px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <!-- Stars Animation -->
    <div class="absolute inset-0 pointer-events-none">
        @for($i = 0; $i < 50; $i++)
            <div class="absolute w-[1px] h-[1px] bg-white rounded-full animate-twinkle" 
                 style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5000) }}ms; animation-duration: {{ rand(3000, 6000) }}ms;"></div>
        @endfor
    </div>

    <div class="max-w-md w-full space-y-8 bg-gray-900/40 backdrop-blur-2xl p-10 md:p-12 rounded-[3rem] shadow-[0_0_50px_rgba(0,0,0,0.5)] border border-white/5 relative z-10 animate-fade-in-up">
        <div class="text-center">
            <a href="{{ url('/') }}" class="inline-block mb-8">
                <div class="text-4xl font-black tracking-tighter">
                    <span class="text-yellow-500 text-glow-yellow uppercase">Orion</span><span class="text-pink-500 text-glow-pink uppercase">Star</span>
                </div>
            </a>
            <h2 class="text-3xl font-black text-white uppercase tracking-tighter mb-2">
                Welcome <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">Back</span> 👋
            </h2>
            <p class="text-gray-400 font-bold text-sm uppercase tracking-widest">
                Sign in to your premium account
            </p>
        </div>

        @if(session('success'))
            <div class="p-4 bg-green-500/10 border border-green-500/20 rounded-2xl animate-fade-in-down">
                <p class="text-green-400 text-xs font-bold text-center uppercase tracking-widest">{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 bg-red-500/10 border border-red-500/20 rounded-2xl animate-fade-in-down">
                <p class="text-red-400 text-xs font-bold text-center uppercase tracking-widest">{{ session('error') }}</p>
            </div>
        @endif

        <form class="mt-10 space-y-8" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="space-y-6">
                <div class="space-y-2">
                    <label for="email" class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-4">Email Address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                        class="appearance-none block w-full px-6 py-4 bg-black/40 border-2 border-white/5 placeholder-gray-700 text-white font-bold rounded-2xl focus:outline-none focus:border-yellow-500/50 focus:bg-black/60 transition-all @error('email') border-red-500/50 @enderror"
                        placeholder="john@example.com">
                    @error('email') <p class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4">{{ $message }}</p> @enderror
                </div>
                
                <div class="space-y-2">
                    <label for="password" class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-4">Secret Password</label>
                    <div class="relative group">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="appearance-none block w-full px-6 py-4 bg-black/40 border-2 border-white/5 placeholder-gray-700 text-white font-bold rounded-2xl focus:outline-none focus:border-pink-500/50 focus:bg-black/60 transition-all @error('password') border-red-500/50 @enderror"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-6 flex items-center text-gray-500 hover:text-pink-500 transition-colors">
                            <svg class="h-6 w-6" id="password-eye" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    @error('password') <p class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex items-center justify-between px-2">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox"
                        class="h-5 w-5 text-yellow-500 focus:ring-yellow-500/50 border-white/10 rounded-lg bg-black/40 cursor-pointer">
                    <label for="remember_me" class="ml-3 block text-xs font-bold text-gray-400 uppercase tracking-widest cursor-pointer hover:text-gray-300 transition-colors">
                        Remember me
                    </label>
                </div>

                <div class="text-xs">
                    <a href="{{ route('password.request') }}" class="font-black text-pink-500 hover:text-pink-400 transition-colors uppercase tracking-widest">
                        Lost Access?
                    </a>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="group relative w-full flex justify-center py-6 px-4 bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-600 text-white text-xl font-black rounded-2xl transition-all shadow-[0_0_30px_rgba(234,179,8,0.3)] hover:shadow-[0_0_50px_rgba(234,179,8,0.5)] transform hover:-translate-y-1.5 animate-shine overflow-hidden uppercase tracking-tighter">
                    <span class="relative z-10">🎰 SIGN IN & WIN BIG</span>
                </button>
            </div>
        </form>

        <div class="text-center pt-8">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-[0.2em]">
                New to the Galaxy?
                <a href="{{ route('register') }}" class="font-black text-yellow-500 hover:text-yellow-400 transition-colors ml-2">
                    JOIN NOW & GET $1000 BONUS →
                </a>
            </p>
        </div>

        <!-- Quick Stats -->
        <div class="pt-10 border-t border-white/5">
            <div class="grid grid-cols-3 gap-6">
                <div class="text-center group">
                    <div class="text-xl font-black text-yellow-500 group-hover:scale-110 transition-transform tracking-tighter">100+</div>
                    <div class="text-[8px] font-black text-gray-600 uppercase tracking-[0.2em]">Games</div>
                </div>
                <div class="text-center group">
                    <div class="text-xl font-black text-pink-500 group-hover:scale-110 transition-transform tracking-tighter">$2M+</div>
                    <div class="text-[8px] font-black text-gray-600 uppercase tracking-[0.2em]">Wins</div>
                </div>
                <div class="text-center group">
                    <div class="text-xl font-black text-yellow-500 group-hover:scale-110 transition-transform tracking-tighter">50K+</div>
                    <div class="text-[8px] font-black text-gray-600 uppercase tracking-[0.2em]">Legends</div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes twinkle {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.3); }
    }

    @keyframes fade-in-up {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .animate-twinkle {
        animation: twinkle 4s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }
</style>
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
