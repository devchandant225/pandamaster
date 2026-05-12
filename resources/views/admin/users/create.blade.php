@extends('layouts.dashboard', ['active' => 'users'])

@section('title', 'Create User - 888Realty')

@section('content')
<div class="p-6">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf

                        <div class="space-y-6">
                            <!-- Role Selection -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-3">Role</label>
                                <div class="grid grid-cols-3 gap-4">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="role" value="user" class="peer sr-only" checked>
                                        <div class="p-4 border-2 border-gray-200 rounded-xl text-center peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]/10 transition-all">
                                            <svg class="w-6 h-6 mx-auto mb-2 text-gray-400 peer-checked:text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <div class="font-semibold text-sm">Client</div>
                                        </div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="role" value="agent" class="peer sr-only">
                                        <div class="p-4 border-2 border-gray-200 rounded-xl text-center peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]/10 transition-all">
                                            <svg class="w-6 h-6 mx-auto mb-2 text-gray-400 peer-checked:text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            <div class="font-semibold text-sm">Agent</div>
                                        </div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="role" value="admin" class="peer sr-only">
                                        <div class="p-4 border-2 border-gray-200 rounded-xl text-center peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]/10 transition-all">
                                            <svg class="w-6 h-6 mx-auto mb-2 text-gray-400 peer-checked:text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 2-2m5.625-4.5a2.25 2.25 0 00-2.25-2.25h-1.5l-.327-1.308a2.25 2.25 0 00-2.183-1.692H10.5c-1.036 0-1.935.71-2.183 1.692L7.994 4.5h-1.5a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 006.494 19.5h10.5a2.25 2.25 0 002.25-2.25V7.5z"></path>
                                            </svg>
                                            <div class="font-semibold text-sm">Admin</div>
                                        </div>
                                    </label>
                                </div>
                                @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Full Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                    class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl @error('name') border-red-500 @enderror">
                                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl @error('email') border-red-500 @enderror">
                                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                    class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl @error('phone') border-red-500 @enderror">
                                @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- City -->
                            <div>
                                <label for="city" class="block text-sm font-bold text-gray-700 mb-2">City</label>
                                <input type="text" id="city" name="city" value="{{ old('city') }}"
                                    class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl @error('city') border-red-500 @enderror">
                                @error('city') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Performance Score (for agents) -->
                            <div id="performance-score-field" class="hidden">
                                <label for="performance_score" class="block text-sm font-bold text-gray-700 mb-2">Performance Score (0-100)</label>
                                <input type="number" id="performance_score" name="performance_score" value="{{ old('performance_score', 0) }}" min="0" max="100"
                                    class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl @error('performance_score') border-red-500 @enderror">
                                @error('performance_score') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                                <input type="password" id="password" name="password" required
                                    class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl @error('password') border-red-500 @enderror">
                                @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl">
                            </div>
                        </div>

                        <div class="flex gap-4 mt-8">
                            <button type="submit" class="flex-1 bg-[#D4AF37] text-black px-6 py-4 rounded-xl font-bold hover:bg-[#F4D03F] transition-colors">
                                Create User
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="px-6 py-4 border-2 border-gray-300 text-gray-700 rounded-xl font-bold hover:bg-gray-50 transition-colors">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
</div>

<script>
    document.querySelectorAll('input[name="role"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const performanceScoreField = document.getElementById('performance-score-field');
            if (this.value === 'agent') {
                performanceScoreField.classList.remove('hidden');
            } else {
                performanceScoreField.classList.add('hidden');
            }
        });
    });
</script>
@endsection
