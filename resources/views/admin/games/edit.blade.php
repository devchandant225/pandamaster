@extends('layouts.dashboard', ['active' => 'games'])

@section('title', ($game->id ? 'Edit' : 'Add') . ' Game')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-white">
                🎮 {{ $game->id ? 'Edit' : 'Add New' }} Game
            </h1>
            <p class="text-gray-400 mt-2">Manage game details and settings</p>
        </div>

        <!-- Form -->
        <form action="{{ $game->id ? route('admin.games.update', $game) : route('admin.games.store') }}" method="POST" class="bg-gray-800 rounded-2xl border border-gray-700 p-8 space-y-6">
            @csrf
            @if($game->id) @method('PUT') @endif

            <!-- Basic Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Game Title *</label>
                    <input type="text" name="title" value="{{ old('title', $game->title) }}" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="Starlight Princess">
                </div>
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $game->slug) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="starlight-princess">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-white mb-2">Description</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="A magical slot game...">{{ old('description', $game->description) }}</textarea>
            </div>

            <!-- Category & Type -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Category *</label>
                    <select name="game_category_id" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none">
                        <option value="">Select category...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('game_category_id', $game->game_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Game Type *</label>
                    <select name="game_type" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none">
                        <option value="slots" {{ old('game_type', $game->game_type) == 'slots' ? 'selected' : '' }}>🎰 Slots</option>
                        <option value="fish" {{ old('game_type', $game->game_type) == 'fish' ? 'selected' : '' }}>🐟 Fish Games</option>
                        <option value="keno" {{ old('game_type', $game->game_type) == 'keno' ? 'selected' : '' }}>🎲 Keno</option>
                        <option value="table" {{ old('game_type', $game->game_type) == 'table' ? 'selected' : '' }}>🎯 Table Games</option>
                        <option value="card" {{ old('game_type', $game->game_type) == 'card' ? 'selected' : '' }}>🃏 Card Games</option>
                        <option value="other" {{ old('game_type', $game->game_type) == 'other' ? 'selected' : '' }}>🎮 Other</option>
                    </select>
                </div>
            </div>

            <!-- URLs -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Thumbnail URL *</label>
                    <input type="text" name="thumbnail_url" value="{{ old('thumbnail_url', $game->thumbnail_url) }}" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="https://example.com/image.jpg">
                </div>
                <div>
                    <label class="block text-sm font-bold text-white mb-2">RTP (%)</label>
                    <input type="number" name="rtp" value="{{ old('rtp', $game->rtp) }}" step="0.01" min="0" max="100" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="96.50">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Game URL (Real Play)</label>
                    <input type="text" name="game_url" value="{{ old('game_url', $game->game_url) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="https://provider.com/play/game-id">
                </div>
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Demo URL</label>
                    <input type="text" name="demo_url" value="{{ old('demo_url', $game->demo_url) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="https://provider.com/demo/game-id">
                </div>
            </div>

            <!-- Flags -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <label class="flex items-center gap-3 cursor-pointer bg-gray-900 p-4 rounded-xl border border-gray-700 hover:border-yellow-500/50 transition-colors">
                    <input type="checkbox" name="is_hot" value="1" {{ old('is_hot', $game->is_hot) ? 'checked' : '' }} class="w-5 h-5 text-yellow-500 rounded focus:ring-yellow-500">
                    <span class="text-sm font-bold text-white">🔥 Hot</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer bg-gray-900 p-4 rounded-xl border border-gray-700 hover:border-green-500/50 transition-colors">
                    <input type="checkbox" name="is_new" value="1" {{ old('is_new', $game->is_new) ? 'checked' : '' }} class="w-5 h-5 text-green-500 rounded focus:ring-green-500">
                    <span class="text-sm font-bold text-white">✨ New</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer bg-gray-900 p-4 rounded-xl border border-gray-700 hover:border-yellow-500/50 transition-colors">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $game->is_featured) ? 'checked' : '' }} class="w-5 h-5 text-yellow-500 rounded focus:ring-yellow-500">
                    <span class="text-sm font-bold text-white">⭐ Featured</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer bg-gray-900 p-4 rounded-xl border border-gray-700 hover:border-blue-500/50 transition-colors">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $game->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 text-blue-500 rounded focus:ring-blue-500">
                    <span class="text-sm font-bold text-white">✅ Active</span>
                </label>
            </div>

            <!-- Submit -->
            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 bg-gradient-to-r from-yellow-500 to-pink-500 hover:from-yellow-400 hover:to-pink-400 text-white px-8 py-4 rounded-xl font-bold transition-all shadow-lg">
                    {{ $game->id ? '💾 Update Game' : '✨ Add Game' }}
                </button>
                <a href="{{ route('admin.games.index') }}" class="px-8 py-4 bg-gray-700 hover:bg-gray-600 text-white rounded-xl font-bold transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
