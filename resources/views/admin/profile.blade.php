@extends('layouts.dashboard', ['active' => 'profile'])
@section('title', 'Admin Profile & Branding - Orion Star')

@section('content')
<div class="p-6 md:p-10 bg-gray-50 min-h-screen" x-data="{ activeTab: 'profile' }">
    <div class="max-w-6xl mx-auto">
        <!-- Profile Hero Section -->
        <div class="bg-black rounded-[2.5rem] p-8 md:p-12 mb-10 text-white relative overflow-hidden shadow-2xl shadow-black/20">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-yellow-500/10 rounded-full blur-3xl"></div>
            <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-purple-500/5 rounded-full blur-3xl"></div>

            <div class="relative z-10 flex flex-col md:flex-row items-center gap-8 text-center md:text-left">
                <div class="relative group">
                    <div class="w-32 h-32 rounded-[2.5rem] bg-gradient-to-br from-yellow-500 to-yellow-600 flex items-center justify-center text-black text-5xl font-black border-4 border-white/10 shadow-xl group-hover:scale-105 transition-transform duration-500 overflow-hidden">
                        @if($user->avatar_url)
                            <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                        @else
                            {{ substr($user->name, 0, 1) }}
                        @endif
                    </div>
                    <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-green-500 border-4 border-black rounded-full shadow-lg"></div>
                </div>
                
                <div class="flex-1">
                    <div class="flex flex-col md:flex-row md:items-center gap-3 mb-2">
                        <h2 class="text-3xl md:text-4xl font-black tracking-tight">{{ $user->name }}</h2>
                        <span class="px-3 py-1 bg-[#D4AF37] rounded-lg text-[10px] font-black uppercase tracking-widest text-black">
                            SYSTEM ADMINISTRATOR
                        </span>
                    </div>
                    <p class="text-gray-400 font-medium text-lg italic mb-6">Managing Orion Star Digital Assets</p>
                    
                    <div class="flex flex-wrap justify-center md:justify-start gap-4">
                        <div class="px-5 py-2 bg-white/5 border border-white/5 rounded-2xl flex items-center gap-3">
                            <span class="text-xs font-bold text-gray-500 uppercase tracking-widest">Platform Status</span>
                            <span class="text-lg font-black text-green-400">ONLINE</span>
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

        <div class="grid lg:grid-cols-4 gap-8">
            <!-- Settings Navigation -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white p-4 rounded-[2rem] shadow-sm border border-gray-100 sticky top-24">
                    <nav class="space-y-2">
                        <button @click="activeTab = 'profile'" :class="activeTab === 'profile' ? 'bg-[#D4AF37] text-black font-black shadow-lg shadow-[#D4AF37]/20' : 'text-gray-500 hover:bg-gray-50 hover:text-black'" class="w-full flex items-center gap-3 px-6 py-4 rounded-2xl transition-all duration-300 group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="text-[10px] uppercase tracking-widest font-bold">Identity</span>
                        </button>
                        <button @click="activeTab = 'branding'" :class="activeTab === 'branding' ? 'bg-[#D4AF37] text-black font-black shadow-lg shadow-[#D4AF37]/20' : 'text-gray-500 hover:bg-gray-50 hover:text-black'" class="w-full flex items-center gap-3 px-6 py-4 rounded-2xl transition-all duration-300 group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-[10px] uppercase tracking-widest font-bold">Branding Assets</span>
                        </button>
                        <button @click="activeTab = 'social'" :class="activeTab === 'social' ? 'bg-[#D4AF37] text-black font-black shadow-lg shadow-[#D4AF37]/20' : 'text-gray-500 hover:bg-gray-50 hover:text-black'" class="w-full flex items-center gap-3 px-6 py-4 rounded-2xl transition-all duration-300 group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            <span class="text-[10px] uppercase tracking-widest font-bold">Social & Links</span>
                        </button>
                        <button @click="activeTab = 'seo'" :class="activeTab === 'seo' ? 'bg-[#D4AF37] text-black font-black shadow-lg shadow-[#D4AF37]/20' : 'text-gray-500 hover:bg-gray-50 hover:text-black'" class="w-full flex items-center gap-3 px-6 py-4 rounded-2xl transition-all duration-300 group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <span class="text-[10px] uppercase tracking-widest font-bold">SEO & Scripts</span>
                        </button>
                        <button @click="activeTab = 'password'" :class="activeTab === 'password' ? 'bg-black text-white font-black shadow-lg shadow-black/10' : 'text-gray-500 hover:bg-gray-50 hover:text-black'" class="w-full flex items-center gap-3 px-6 py-4 rounded-2xl transition-all duration-300 group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            <span class="text-[10px] uppercase tracking-widest font-bold">Security</span>
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Form Panels -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Profile Tab -->
                        <div x-show="activeTab === 'profile'" x-cloak class="p-8 md:p-12 animate-fade-in space-y-8">
                            <div>
                                <h3 class="text-2xl font-black text-gray-900 tracking-tight">System Identity</h3>
                                <p class="text-gray-500 text-sm mt-1">Manage administrative contact details.</p>
                            </div>

                            <div class="grid md:grid-cols-2 gap-8">
                                <div class="space-y-4" x-data="{ avatarPreview: '{{ $user->avatar_url ?: '' }}', avatarName: '' }">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Profile Photo</label>
                                    <div class="flex items-center space-x-4">
                                        <div class="relative w-20 h-20 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200 flex items-center justify-center overflow-hidden"
                                            :class="{ 'p-1': avatarPreview }"
                                        >
                                            <template x-if="avatarPreview">
                                                <img :src="avatarPreview" alt="Avatar Preview" class="w-full h-full object-cover rounded-xl">
                                            </template>
                                            <template x-if="!avatarPreview">
                                                <div class="text-center">
                                                    <svg class="w-6 h-6 text-gray-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                                </div>
                                            </template>
                                            <input type="file" name="avatar_url" class="absolute inset-0 opacity-0 cursor-pointer"
                                                @change="
                                                    const file = $event.target.files[0];
                                                    if (file) {
                                                        const reader = new FileReader();
                                                        reader.onload = (e) => {
                                                            avatarPreview = e.target.result;
                                                            avatarName = file.name;
                                                        };
                                                        reader.readAsDataURL(file);
                                                    }
                                                "
                                            >
                                        </div>
                                        <div class="flex flex-col flex-1">
                                            <span class="text-xs font-medium text-gray-700" x-text="avatarName ? avatarName : 'Change Photo'">Change Photo</span>
                                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">Square PNG/JPG</p>
                                        </div>
                                    </div>
                                    @error('avatar_url') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Admin Name</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                        class="w-full h-14 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-bold text-gray-900">
                                    @error('name') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">System Email</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                                        class="w-full h-14 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-bold text-gray-900">
                                    @error('email') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Primary Phone</label>
                                    <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                                        class="w-full h-14 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-bold text-gray-900">
                                    @error('phone') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">City / Region</label>
                                    <input type="text" name="city" value="{{ old('city', $user->city) }}"
                                        class="w-full h-14 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-bold text-gray-900">
                                    @error('city') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Branding Tab -->
                        <div x-show="activeTab === 'branding'" x-cloak class="p-8 md:p-12 animate-fade-in space-y-8">
                            <div>
                                <h3 class="text-2xl font-black text-gray-900 tracking-tight">Visual Identity</h3>
                                <p class="text-gray-500 text-sm mt-1">Update platform-wide branding assets.</p>
                            </div>

                            <div class="grid md:grid-cols-2 gap-12">
                                <div class="space-y-4" x-data="{ logoPreview: '{{ $user->logo ? Storage::url($user->logo) : '' }}', logoName: '' }">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Platform Logo</label>
                                    <div class="flex items-center space-x-4">
                                        <div class="relative w-32 h-32 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200 flex items-center justify-center overflow-hidden"
                                            :class="{ 'p-2': logoPreview }"
                                        >
                                            <template x-if="logoPreview">
                                                <img :src="logoPreview" alt="Logo Preview" class="max-w-full max-h-full object-contain">
                                            </template>
                                            <template x-if="!logoPreview">
                                                <div class="text-center">
                                                    <svg class="w-8 h-8 text-gray-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                </div>
                                            </template>
                                            <input type="file" name="logo" class="absolute inset-0 opacity-0 cursor-pointer"
                                                @change="
                                                    const file = $event.target.files[0];
                                                    if (file) {
                                                        const reader = new FileReader();
                                                        reader.onload = (e) => {
                                                            logoPreview = e.target.result;
                                                            logoName = file.name;
                                                        };
                                                        reader.readAsDataURL(file);
                                                    } else {
                                                        logoPreview = '';
                                                        logoName = '';
                                                    }
                                                "
                                            >
                                        </div>
                                        <div class="flex flex-col flex-1">
                                            <span class="text-sm font-medium text-gray-700" x-text="logoName ? logoName : 'No file chosen'">No file chosen</span>
                                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">Recommended: Transparent PNG, 400x120px</p>
                                        </div>
                                        @if($user->logo)
                                            <button type="button" @click="if(confirm('Remove logo?')) $refs.removeLogoForm.submit()" class="text-red-500 hover:text-red-700 text-[10px] font-bold uppercase tracking-widest ml-4">
                                                Remove Logo
                                            </button>
                                        @endif
                                    </div>
                                    @error('logo') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="space-y-4" x-data="{ faviconPreview: '{{ $user->favicon ? Storage::url($user->favicon) : '' }}', faviconName: '' }">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Site Favicon</label>
                                    <div class="flex items-center space-x-4">
                                        <div class="relative w-32 h-32 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200 flex items-center justify-center overflow-hidden"
                                            :class="{ 'p-2': faviconPreview }"
                                        >
                                            <template x-if="faviconPreview">
                                                <img :src="faviconPreview" alt="Favicon Preview" class="max-w-full max-h-full object-contain">
                                            </template>
                                            <template x-if="!faviconPreview">
                                                <div class="text-center">
                                                    <svg class="w-8 h-8 text-gray-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>
                                                </div>
                                            </template>
                                            <input type="file" name="favicon" class="absolute inset-0 opacity-0 cursor-pointer"
                                                @change="
                                                    const file = $event.target.files[0];
                                                    if (file) {
                                                        const reader = new FileReader();
                                                        reader.onload = (e) => {
                                                            faviconPreview = e.target.result;
                                                            faviconName = file.name;
                                                        };
                                                        reader.readAsDataURL(file);
                                                    } else {
                                                        faviconPreview = '';
                                                        faviconName = '';
                                                    }
                                                "
                                            >
                                        </div>
                                        <div class="flex flex-col flex-1">
                                            <span class="text-sm font-medium text-gray-700" x-text="faviconName ? faviconName : 'No file chosen'">No file chosen</span>
                                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">Recommended: 32x32px .ico or .png</p>
                                        </div>
                                        @if($user->favicon)
                                            <button type="button" @click="if(confirm('Remove favicon?')) $refs.removeFaviconForm.submit()" class="text-red-500 hover:text-red-700 text-[10px] font-bold uppercase tracking-widest ml-4">
                                                Remove Favicon
                                            </button>
                                        @endif
                                    </div>
                                    @error('favicon') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Social & Description Tab -->
                        <div x-show="activeTab === 'social'" x-cloak class="p-8 md:p-12 animate-fade-in space-y-8">
                            <div>
                                <h3 class="text-2xl font-black text-gray-900 tracking-tight">Connectivity & Content</h3>
                                <p class="text-gray-500 text-sm mt-1">Manage social networks, external URLs and platform description.</p>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Platform Description</label>
                                <textarea name="description" rows="4"
                                    class="w-full p-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-medium text-gray-900">{{ old('description', $user->description) }}</textarea>
                                @error('description') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Footer Description</label>
                                <textarea name="footer_description" rows="2"
                                    class="w-full p-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-medium text-gray-900">{{ old('footer_description', $user->footer_description) }}</textarea>
                                @error('footer_description') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">WhatsApp</label>
                                    <input type="text" name="whatsapp" value="{{ old('whatsapp', $user->whatsapp) }}" placeholder="https://wa.me/..."
                                        class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                    @error('whatsapp') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Viber</label>
                                    <input type="text" name="viber" value="{{ old('viber', $user->viber) }}"
                                        class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                    @error('viber') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Facebook</label>
                                    <input type="text" name="facebook" value="{{ old('facebook', $user->facebook) }}"
                                        class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                    @error('facebook') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Twitter (X)</label>
                                    <input type="text" name="twitter" value="{{ old('twitter', $user->twitter) }}"
                                        class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                    @error('twitter') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">LinkedIn</label>
                                    <input type="text" name="linkedin" value="{{ old('linkedin', $user->linkedin) }}"
                                        class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                    @error('linkedin') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Instagram</label>
                                    <input type="text" name="instagram" value="{{ old('instagram', $user->instagram) }}"
                                        class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                    @error('instagram') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">TikTok</label>
                                    <input type="text" name="tiktok" value="{{ old('tiktok', $user->tiktok) }}"
                                        class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                    @error('tiktok') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Telegram</label>
                                    <input type="text" name="telegram" value="{{ old('telegram', $user->telegram) }}"
                                        class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                    @error('telegram') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Pinterest</label>
                                    <input type="text" name="pinterest" value="{{ old('pinterest', $user->pinterest) }}"
                                        class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                    @error('pinterest') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <!-- External Auth URLs -->
                            <div class="mt-8 pt-8 border-t border-gray-200">
                                <h4 class="text-sm font-black text-gray-900 mb-6 uppercase tracking-wide">External Authentication Links</h4>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Login URL</label>
                                        <input type="text" name="login_url" value="{{ old('login_url', $user->login_url) }}" placeholder="https://external-login-url.com/login"
                                            class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                        @error('login_url') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Register URL</label>
                                        <input type="text" name="register_url" value="{{ old('register_url', $user->register_url) }}" placeholder="https://external-register-url.com/register"
                                            class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                        @error('register_url') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">YouTube URL</label>
                                        <input type="text" name="youtube_url" value="{{ old('youtube_url', $user->youtube_url) }}" placeholder="https://youtube.com/@orionstar"
                                            class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                        @error('youtube_url') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">External Dashboard URL</label>
                                        <input type="text" name="external_dashboard_url" value="{{ old('external_dashboard_url', $user->external_dashboard_url) }}" placeholder="https://dashboard.example.com"
                                            class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-bold text-sm text-gray-900 placeholder-gray-400">
                                        @error('external_dashboard_url') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>                        </div>

                        <!-- SEO & Scripts Tab -->
                        <div x-show="activeTab === 'seo'" x-cloak class="p-8 md:p-12 animate-fade-in space-y-8">
                            <div>
                                <h3 class="text-2xl font-black text-gray-900 tracking-tight">SEO & Tracking Scripts</h3>
                                <p class="text-gray-500 text-sm mt-1">Manage platform-wide search engine configuration and external scripts.</p>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Robots.txt Content</label>
                                <textarea name="robots_txt" rows="6" placeholder="User-agent: *
Allow: /"
                                    class="w-full p-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-mono text-sm text-gray-900">{{ old('robots_txt', $user->robots_txt) }}</textarea>
                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter mt-1">Leave empty to use default "Allow: /"</p>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Header Scripts (Inside &lt;head&gt;)</label>
                                <textarea name="header_scripts" rows="6" placeholder="<!-- Google Tag Manager -->"
                                    class="w-full p-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-mono text-sm text-gray-900">{{ old('header_scripts', $user->header_scripts) }}</textarea>
                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter mt-1">Raw HTML/Javascript for analytics, verification, etc.</p>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Footer Scripts (Before &lt;/body&gt;)</label>
                                <textarea name="footer_scripts" rows="6" placeholder="<!-- Chatbot script -->"
                                    class="w-full p-5 bg-gray-50 border-2 border-gray-300 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-mono text-sm text-gray-900">{{ old('footer_scripts', $user->footer_scripts) }}</textarea>
                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter mt-1">Raw HTML/Javascript for tracking or widgets.</p>
                            </div>
                        </div>

                        <div x-show="activeTab !== 'password'" class="p-8 md:p-12 pt-0">
                            <button type="submit" class="px-10 py-4 bg-black text-white font-black uppercase tracking-widest text-[10px] rounded-2xl hover:bg-gray-800 transition-all shadow-xl shadow-black/10 active:scale-95">
                                Save Platform Changes
                            </button>
                        </div>
                    </form>

                    <!-- Hidden forms for removal -->
                    <form x-ref="removeLogoForm" action="{{ route('admin.profile.remove-logo') }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                    <form x-ref="removeFaviconForm" action="{{ route('admin.profile.remove-favicon') }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>

                    <!-- Password Tab -->
                    <div x-show="activeTab === 'password'" x-cloak class="p-8 md:p-12 animate-fade-in space-y-8">
                        <div>
                            <h3 class="text-2xl font-black text-gray-900 tracking-tight">Security Credentials</h3>
                            <p class="text-gray-500 text-sm mt-1">Update your administrative access password.</p>
                        </div>

                        <form action="{{ route('admin.profile.password') }}" method="POST" class="space-y-8">
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
                                    Update Administrative Credentials
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
