@extends('layouts.dashboard', ['active' => 'profile'])

@section('title', 'System Profile - 888Realty Admin')

@section('content')
<div class="p-6 md:p-10 bg-gray-50 min-h-screen" x-data="{ activeTab: 'profile' }">
    <div class="max-w-5xl mx-auto">
        <!-- Profile Hero Section -->
        <div class="bg-black rounded-[2.5rem] p-8 md:p-12 mb-10 text-white relative overflow-hidden shadow-2xl shadow-black/20">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-[#D4AF37]/10 rounded-full blur-3xl"></div>
            <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-blue-500/5 rounded-full blur-3xl"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center gap-8 text-center md:text-left">
                <div class="relative group">
                    <div class="w-32 h-32 rounded-[2.5rem] bg-gradient-to-br from-[#D4AF37] to-yellow-600 flex items-center justify-center text-black text-5xl font-black border-4 border-white/10 shadow-xl group-hover:scale-105 transition-transform duration-500">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-green-500 border-4 border-black rounded-full shadow-lg"></div>
                </div>
                
                <div class="flex-1">
                    <div class="flex flex-col md:flex-row md:items-center gap-3 mb-2">
                        <h2 class="text-3xl md:text-4xl font-black tracking-tight">{{ $user->name }}</h2>
                        <span class="px-3 py-1 bg-white/10 border border-white/10 rounded-lg text-[10px] font-black uppercase tracking-widest text-[#D4AF37]">
                            {{ $user->role }} Access
                        </span>
                    </div>
                    <p class="text-gray-400 font-medium text-lg italic mb-6">Expert in {{ $user->city ?? 'Metro Vancouver' }} Region</p>
                    
                    <div class="flex flex-wrap justify-center md:justify-start gap-4">
                        <div class="px-5 py-2 bg-white/5 border border-white/5 rounded-2xl flex items-center gap-3">
                            <span class="text-xs font-bold text-gray-500 uppercase tracking-widest">Performance</span>
                            <span class="text-xl font-black text-[#D4AF37]">{{ $user->performance_score }}%</span>
                        </div>
                        <div class="px-5 py-2 bg-white/5 border border-white/5 rounded-2xl flex items-center gap-3">
                            <span class="text-xs font-bold text-gray-500 uppercase tracking-widest">Member Since</span>
                            <span class="text-lg font-black text-white">{{ $user->created_at->format('Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-8 p-5 bg-green-50 border border-green-100 rounded-2xl flex items-center gap-4 text-green-800 shadow-sm animate-fade-in">
                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 2-2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="font-bold">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Settings Navigation -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white p-4 rounded-[2rem] shadow-sm border border-gray-100">
                    <nav class="space-y-2">
                        <button 
                            @click="activeTab = 'profile'"
                            :class="activeTab === 'profile' ? 'bg-[#D4AF37] text-black font-black shadow-lg shadow-[#D4AF37]/20' : 'text-gray-500 hover:bg-gray-50 hover:text-black'"
                            class="w-full flex items-center gap-3 px-6 py-4 rounded-2xl transition-all duration-300 group"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="text-sm uppercase tracking-widest">Personal Info</span>
                        </button>
                        <button 
                            @click="activeTab = 'password'"
                            :class="activeTab === 'password' ? 'bg-black text-white font-black shadow-lg shadow-black/10' : 'text-gray-500 hover:bg-gray-50 hover:text-black'"
                            class="w-full flex items-center gap-3 px-6 py-4 rounded-2xl transition-all duration-300 group"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            <span class="text-sm uppercase tracking-widest">Security</span>
                        </button>
                    </nav>
                </div>

                <!-- Quick Stats Mini -->
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100">
                    <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-6">Activity metrics</h3>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-gray-500">Total Listings</span>
                            <span class="text-lg font-black text-gray-900">{{ \App\Models\Property::where('agent_id', $user->id)->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-gray-500">Leads Managed</span>
                            <span class="text-lg font-black text-gray-900">{{ \App\Models\Lead::where('assigned_agent_id', $user->id)->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Panels -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Profile Tab -->
                    <div x-show="activeTab === 'profile'" x-cloak class="p-8 md:p-12 animate-fade-in">
                        <div class="mb-10">
                            <h3 class="text-2xl font-black text-gray-900 tracking-tight">Identity & Connectivity</h3>
                            <p class="text-gray-500 text-sm mt-1">Manage your professional contact details.</p>
                        </div>

                        <form action="{{ route('agent.profile.update') }}" method="POST" class="space-y-8">
                            @csrf
                            @method('PUT')

                            <div class="grid md:grid-cols-2 gap-8">
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Full Name</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                        class="w-full h-14 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-bold text-gray-900">
                                    @error('name') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Email Address</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                                        class="w-full h-14 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-bold text-gray-900">
                                    @error('email') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Business Phone</label>
                                    <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                                        class="w-full h-14 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-bold text-gray-900">
                                    @error('phone') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Assigned City</label>
                                    <input type="text" name="city" value="{{ old('city', $user->city) }}"
                                        class="w-full h-14 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-bold text-gray-900">
                                    @error('city') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Professional Bio</label>
                                <textarea name="description" rows="4" 
                                    class="w-full p-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-medium text-gray-900">{{ old('description', $user->description) }}</textarea>
                                @error('description') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="pt-6">
                                <button type="submit" class="px-10 py-4 bg-black text-white font-black uppercase tracking-widest text-[10px] rounded-2xl hover:bg-gray-800 transition-all shadow-xl shadow-black/10 active:scale-95">
                                    Synchronize Profile
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Password Tab -->
                    <div x-show="activeTab === 'password'" x-cloak class="p-8 md:p-12 animate-fade-in">
                        <div class="mb-10">
                            <h3 class="text-2xl font-black text-gray-900 tracking-tight">Security Credentials</h3>
                            <p class="text-gray-500 text-sm mt-1">Ensure your account uses a complex, secure password.</p>
                        </div>

                        <form action="{{ route('agent.profile.password') }}" method="POST" class="space-y-8">
                            @csrf
                            @method('PUT')

                            <div class="max-w-md space-y-6">
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Current Password</label>
                                    <input type="password" name="current_password" required
                                        class="w-full h-14 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-bold">
                                    @error('current_password') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">New Secure Password</label>
                                    <input type="password" name="password" required
                                        class="w-full h-14 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-bold">
                                    @error('password') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Confirm New Password</label>
                                    <input type="password" name="password_confirmation" required
                                        class="w-full h-14 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-bold">
                                </div>
                            </div>

                            <div class="pt-6">
                                <button type="submit" class="px-10 py-4 bg-black text-white font-black uppercase tracking-widest text-[10px] rounded-2xl hover:bg-gray-800 transition-all shadow-xl shadow-black/10 active:scale-95">
                                    Update Credentials
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
