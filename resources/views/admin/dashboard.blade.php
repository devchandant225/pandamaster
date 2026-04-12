@extends('layouts.dashboard', ['active' => 'admin-dashboard'])

@section('title', 'Admin Dashboard - Panda Master VIP')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <!-- Welcome Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">
                <span class="text-yellow-500">Admin</span> <span class="text-purple-500">Dashboard</span>
            </h1>
            <p class="text-gray-400 mt-2 font-medium">Welcome back, <span class="text-white font-bold">{{ explode(' ', auth()->user()->name)[0] }}</span>. Here's your gaming platform overview.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="px-4 py-2 bg-gray-800 rounded-xl border border-yellow-500/30 shadow-lg flex items-center gap-3">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-xs font-bold text-yellow-500 uppercase tracking-wider">Platform Active</span>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-8 p-5 bg-green-500/10 border border-green-500/30 rounded-xl flex items-center gap-4 text-green-400 shadow-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 2-2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Key Metrics Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Total Players -->
        <div class="bg-gray-800 p-8 rounded-2xl border border-gray-700 hover:border-yellow-500/50 transition-all group relative overflow-hidden shadow-xl">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-yellow-500/10 rounded-full blur-3xl group-hover:bg-yellow-500/20 transition-colors"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 bg-yellow-500/20 text-yellow-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"/>
                    </svg>
                </div>
                <div class="text-4xl font-black text-white mb-1 tracking-tighter">{{ $totalPlayers }}</div>
                <div class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Players</div>
            </div>
        </div>

        <!-- Active Players -->
        <div class="bg-gray-800 p-8 rounded-2xl border border-gray-700 hover:border-green-500/50 transition-all group relative overflow-hidden shadow-xl">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-green-500/10 rounded-full blur-3xl group-hover:bg-green-500/20 transition-colors"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-6">
                    <div class="w-12 h-12 bg-green-500/20 text-green-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="px-3 py-1 bg-green-500/20 text-green-400 text-xs font-bold rounded-full uppercase tracking-wider">7 Days</span>
                </div>
                <div class="text-4xl font-black text-white mb-1 tracking-tighter">{{ $activePlayers }}</div>
                <div class="text-xs font-bold text-gray-400 uppercase tracking-wider">Active Players</div>
            </div>
        </div>

        <!-- Total Games -->
        <div class="bg-gray-800 p-8 rounded-2xl border border-gray-700 hover:border-purple-500/50 transition-all group relative overflow-hidden shadow-xl">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-purple-500/10 rounded-full blur-3xl group-hover:bg-purple-500/20 transition-colors"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 bg-purple-500/20 text-purple-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 012 0v3a1 1 0 11-2 0V9zm4-1a1 1 0 011 1v3a1 1 0 11-2 0V9a1 1 0 011-1z"/>
                    </svg>
                </div>
                <div class="text-4xl font-black text-white mb-1 tracking-tighter">{{ $activeGames }}<span class="text-lg text-gray-400">/{{ $totalGames }}</span></div>
                <div class="text-xs font-bold text-gray-400 uppercase tracking-wider">Active Games</div>
            </div>
        </div>

        <!-- Total Deposits -->
        <div class="bg-gradient-to-br from-yellow-500/10 to-purple-500/10 p-8 rounded-2xl border border-yellow-500/30 shadow-xl hover:shadow-2xl transition-all group relative overflow-hidden">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-yellow-500/20 rounded-full blur-3xl"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 bg-yellow-500 text-black rounded-xl flex items-center justify-center mb-6 group-hover:rotate-12 transition-transform">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="text-4xl font-black text-yellow-500 mb-1 tracking-tighter">${{ number_format($totalDeposits / 1000, 1) }}K</div>
                <div class="text-xs font-bold text-yellow-400 uppercase tracking-wider">Total Deposits</div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Recent Players -->
        <div class="bg-gray-800 rounded-2xl border border-gray-700 overflow-hidden shadow-xl">
            <div class="px-8 py-6 border-b border-gray-700 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-black text-white tracking-tight">Recent <span class="text-yellow-500">Players</span></h2>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mt-1">Latest active users</p>
                </div>
                <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 bg-gray-700 text-gray-300 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-yellow-500 hover:text-black transition-all shadow-lg">
                    Manage All
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-gray-700 bg-gray-900/50">
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Player</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Balance</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Last Login</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($recentPlayers as $player)
                            <tr class="hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                                            {{ strtoupper(substr($player->user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-white">{{ $player->user->name }}</div>
                                            <div class="text-xs text-gray-400">{{ $player->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-yellow-500 font-bold">${{ number_format($player->balance, 2) }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-gray-400 text-sm">{{ $player->last_login_at ? $player->last_login_at->diffForHumans() : 'Never' }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center text-gray-400">No players found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top Players -->
        <div class="bg-gray-800 rounded-2xl border border-gray-700 overflow-hidden shadow-xl">
            <div class="px-8 py-6 border-b border-gray-700 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-black text-white tracking-tight">Top <span class="text-purple-500">Players</span></h2>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mt-1">Highest wagered</p>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-gray-700 bg-gray-900/50">
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Rank</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Player</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Wagered</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($topPlayers as $index => $player)
                            <tr class="hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4">
                                    <span class="text-2xl font-black {{ $index === 0 ? 'text-yellow-500' : ($index === 1 ? 'text-gray-400' : ($index === 2 ? 'text-purple-500' : 'text-gray-500')) }}">
                                        #{{ $index + 1 }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-white">{{ $player->user->name }}</div>
                                    <div class="text-xs text-gray-400">VIP: {{ ucfirst($player->vip_status) }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-purple-500 font-bold">${{ number_format($player->total_wagered, 2) }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center text-gray-400">No players found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('admin.games.create') }}" class="bg-gradient-to-br from-yellow-500/10 to-yellow-600/10 border-2 border-yellow-500/30 p-8 rounded-2xl hover:border-yellow-500 hover:shadow-2xl hover:shadow-yellow-500/20 transition-all group">
            <div class="text-4xl mb-4">🎮</div>
            <h3 class="text-xl font-black text-yellow-500 mb-2">Add New Game</h3>
            <p class="text-gray-400 text-sm">Expand your game library</p>
        </a>

        <a href="{{ route('admin.game-categories.create') }}" class="bg-gradient-to-br from-purple-500/10 to-purple-600/10 border-2 border-purple-500/30 p-8 rounded-2xl hover:border-purple-500 hover:shadow-2xl hover:shadow-purple-500/20 transition-all group">
            <div class="text-4xl mb-4">📂</div>
            <h3 class="text-xl font-black text-purple-500 mb-2">Add Category</h3>
            <p class="text-gray-400 text-sm">Organize your games</p>
        </a>

        <a href="{{ route('admin.users.create') }}" class="bg-gradient-to-br from-blue-500/10 to-blue-600/10 border-2 border-blue-500/30 p-8 rounded-2xl hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-500/20 transition-all group">
            <div class="text-4xl mb-4">👤</div>
            <h3 class="text-xl font-black text-blue-500 mb-2">Add User</h3>
            <p class="text-gray-400 text-sm">Create new accounts</p>
        </a>
    </div>
</div>
@endsection
