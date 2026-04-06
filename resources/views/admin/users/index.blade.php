@extends('layouts.dashboard', ['active' => 'users'])

@section('title', 'Team Access - 888Realty Admin')

@section('content')
<div class="p-6 md:p-10 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Team <span class="text-[#D4AF37]">Access</span></h1>
            <p class="text-gray-500 mt-2 font-medium">Control system permissions and manage professional credentials.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-black text-white font-bold rounded-2xl hover:bg-gray-800 transition-all shadow-xl shadow-black/10 transform active:scale-95">
                <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Create Account
            </a>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="mb-8 p-5 bg-green-50 border border-green-100 rounded-2xl flex items-center gap-4 text-green-800 shadow-sm animate-fade-in">
            <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 2-2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Distribution Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
            <div class="text-xs font-black text-gray-400 uppercase tracking-widest mb-1">Global Users</div>
            <div class="text-3xl font-black text-gray-900 tracking-tighter">{{ \App\Models\User::count() }}</div>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
            <div class="text-xs font-black text-blue-400 uppercase tracking-widest mb-1">Administrators</div>
            <div class="text-3xl font-black text-blue-600 tracking-tighter">{{ \App\Models\User::where('role', 'admin')->count() }}</div>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
            <div class="text-xs font-black text-[#D4AF37] uppercase tracking-widest mb-1">Active Agents</div>
            <div class="text-3xl font-black text-[#D4AF37] tracking-tighter">{{ \App\Models\User::where('role', 'agent')->count() }}</div>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
            <div class="text-xs font-black text-green-400 uppercase tracking-widest mb-1">Client Accounts</div>
            <div class="text-3xl font-black text-green-600 tracking-tighter">{{ \App\Models\User::where('role', 'user')->count() }}</div>
        </div>
    </div>

    <!-- User Roster -->
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Profile</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">System Role</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Regional Base</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Onboarding</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-black flex items-center justify-center text-[#D4AF37] font-black shadow-lg shadow-black/10 group-hover:scale-110 transition-transform">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="font-black text-gray-900 text-base">{{ $user->name }}</div>
                                        <div class="text-xs font-bold text-gray-400">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                @php
                                    $roleClasses = [
                                        'admin' => 'bg-blue-50 text-blue-600 border-blue-100',
                                        'agent' => 'bg-amber-50 text-amber-600 border-amber-100',
                                        'user' => 'bg-green-50 text-green-600 border-green-100',
                                    ];
                                    $class = $roleClasses[$user->role] ?? 'bg-gray-50 text-gray-600 border-gray-100';
                                @endphp
                                <span class="inline-flex px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest border {{ $class }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <span class="text-sm font-bold text-gray-900">{{ $user->city ?? 'Unassigned' }}</span>
                            </td>
                            <td class="px-8 py-6">
                                <div class="text-sm font-bold text-gray-900">{{ $user->created_at->format('M d, Y') }}</div>
                                <div class="text-[10px] font-black text-gray-400 uppercase tracking-tighter">{{ $user->created_at->diffForHumans() }}</div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="w-10 h-10 bg-white border border-gray-200 text-gray-400 rounded-xl flex items-center justify-center hover:bg-[#D4AF37] hover:text-black hover:border-[#D4AF37] transition-all shadow-sm">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Revoke system access for this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-10 h-10 bg-white border border-gray-200 text-red-400 rounded-xl flex items-center justify-center hover:bg-red-500 hover:text-white hover:border-red-500 transition-all shadow-sm">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center text-gray-400 italic">No user accounts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
            <div class="px-8 py-6 bg-gray-50/50 border-t border-gray-100">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
