@extends('layouts.dashboard', ['active' => 'users'])

@section('title', 'Edit User - 888Realty')

@section('content')
<div class="p-6">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            <!-- Role Display -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-3">Role</label>
                                <div class="inline-flex px-4 py-2 rounded-xl bg-gray-100 font-semibold capitalize">
                                    {{ $user->role }}
                                </div>
                                <p class="text-xs text-gray-500 mt-1">To change role, use database or create new user</p>
                            </div>

                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Full Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                                    class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl @error('name') border-red-500 @enderror">
                                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                                    class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl @error('email') border-red-500 @enderror">
                                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                                    class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl @error('phone') border-red-500 @enderror">
                                @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- City -->
                            <div>
                                <label for="city" class="block text-sm font-bold text-gray-700 mb-2">City</label>
                                <input type="text" id="city" name="city" value="{{ old('city', $user->city) }}"
                                    class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl @error('city') border-red-500 @enderror">
                                @error('city') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Performance Score (for agents) -->
                            @if($user->role === 'agent')
                            <div>
                                <label for="performance_score" class="block text-sm font-bold text-gray-700 mb-2">Performance Score (0-100)</label>
                                <input type="number" id="performance_score" name="performance_score" value="{{ old('performance_score', $user->performance_score) }}" min="0" max="100"
                                    class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl @error('performance_score') border-red-500 @enderror">
                                @error('performance_score') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            @endif

                            <!-- New Password (optional) -->
                            <div class="pt-6 border-t border-gray-200">
                                <h3 class="font-bold text-gray-900 mb-4">Change Password (Optional)</h3>
                                <div>
                                    <label for="password" class="block text-sm font-bold text-gray-700 mb-2">New Password</label>
                                    <input type="password" id="password" name="password"
                                        class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl @error('password') border-red-500 @enderror">
                                    <p class="text-xs text-gray-500 mt-1">Leave blank to keep current password</p>
                                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="mt-4">
                                    <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Confirm New Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] transition-colors rounded-xl">
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4 mt-8">
                            <button type="submit" class="flex-1 bg-[#D4AF37] text-black px-6 py-4 rounded-xl font-bold hover:bg-[#F4D03F] transition-colors">
                                Update User
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="px-6 py-4 border-2 border-gray-300 text-gray-700 rounded-xl font-bold hover:bg-gray-50 transition-colors">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
</div>
@endsection
