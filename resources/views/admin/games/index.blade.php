@extends('layouts.dashboard', ['active' => 'games'])

@section('title', 'Game Management - Orion Star VIP')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">
                🎮 Game <span class="text-yellow-500">Management</span>
            </h1>
            <p class="text-gray-400 mt-2 font-medium">Manage your gaming library and content</p>
        </div>
        <a href="{{ route('admin.games.create') }}" class="bg-gradient-to-r from-yellow-500 to-purple-500 hover:from-yellow-400 hover:to-purple-400 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg">
            + Add New Game
        </a>
    </div>

    @if(session('success'))
        <div class="mb-8 p-5 bg-green-500/10 border border-green-500/30 rounded-xl flex items-center gap-4 text-green-400 shadow-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 2-2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Filters -->
    <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6 mb-8">
        <form action="{{ route('admin.games.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-bold text-gray-400 mb-2">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search games..." class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-400 mb-2">Status</label>
                <select name="status" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none">
                    <option value="">All</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full px-6 py-3 bg-yellow-500 hover:bg-yellow-400 text-black font-bold rounded-xl transition-colors">
                    🔍 Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Games Table -->
    <div class="bg-gray-800 rounded-2xl border border-gray-700 overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-gray-700 bg-gray-900/50">
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Game</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">RTP</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Plays</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($games as $game)
                        <tr class="hover:bg-gray-700/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $game->thumbnail }}" alt="{{ $game->title }}" class="w-12 h-12 rounded-lg object-cover">
                                    <div>
                                        <div class="font-bold text-white">{{ $game->title }}</div>
                                        <div class="text-xs text-gray-400">{{ $game->slug }}</div>
                                    </div>
                                    @if($game->is_hot)
                                        <span class="px-2 py-0.5 bg-red-500/20 text-red-400 text-xs font-bold rounded">HOT</span>
                                    @endif
                                    @if($game->is_new)
                                        <span class="px-2 py-0.5 bg-green-500/20 text-green-400 text-xs font-bold rounded">NEW</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="capitalize text-gray-300">{{ $game->game_type }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-yellow-500 font-bold">{{ $game->rtp ?? '—' }}%</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $game->is_active ? 'bg-green-500/20 text-green-400' : 'bg-gray-700 text-gray-400' }}">
                                    {{ $game->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-gray-300 font-bold">{{ number_format($game->play_count) }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.games.edit', $game) }}" class="px-3 py-1.5 bg-yellow-500 hover:bg-yellow-400 text-black text-xs font-bold rounded-lg transition-colors">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('admin.games.toggle-status', $game) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="px-3 py-1.5 bg-gray-700 hover:bg-gray-600 text-white text-xs font-bold rounded-lg transition-colors">
                                            {{ $game->is_active ? '🔇' : '🔊' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.games.destroy', $game) }}" method="POST" class="inline" onsubmit="return confirm('Delete this game?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 bg-red-500 hover:bg-red-400 text-white text-xs font-bold rounded-lg transition-colors">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <div class="text-6xl mb-4">🎮</div>
                                <h3 class="text-xl font-bold text-white mb-2">No games found</h3>
                                <p class="text-gray-400 mb-6">Add your first game to start building your gaming library</p>
                                <a href="{{ route('admin.games.create') }}" class="inline-block bg-gradient-to-r from-yellow-500 to-purple-500 hover:from-yellow-400 hover:to-purple-400 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg">
                                    + Add First Game
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($games->hasPages())
            <div class="px-6 py-4 border-t border-gray-700">
                {{ $games->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
