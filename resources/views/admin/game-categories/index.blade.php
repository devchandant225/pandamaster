@extends('layouts.dashboard', ['active' => 'game-categories'])

@section('title', 'Game Categories Management')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">Game <span class="text-green-500">Categories</span></h1>
            <p class="text-gray-400 mt-2 font-medium">Organize and manage your game categories</p>
        </div>
        <a href="{{ route('admin.game-categories.create') }}" class="bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-400 hover:to-emerald-400 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg">+ Add New Category</a>
    </div>

    @if(session('success'))
        <div class="mb-8 p-5 bg-green-500/10 border border-green-500/30 rounded-xl flex items-center gap-4 text-green-400 shadow-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 2-2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-gray-800 rounded-2xl border border-gray-700 overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-gray-700 bg-gray-900/50">
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Games</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Sort Order</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($categories as $category)
                        <tr class="hover:bg-gray-700/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($category->icon_url)
                                        <img src="{{ $category->icon_url }}" alt="{{ $category->name }}" class="w-10 h-10 rounded-lg object-cover">
                                    @else
                                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-green-500 to-emerald-500 flex items-center justify-center text-white font-bold">{{ strtoupper(substr($category->name, 0, 1)) }}</div>
                                    @endif
                                    <div>
                                        <div class="font-bold text-white">{{ $category->name }}</div>
                                        @if($category->description)
                                            <div class="text-xs text-gray-400 truncate max-w-xs">{{ Str::limit($category->description, 50) }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4"><code class="text-sm text-gray-400 bg-gray-900 px-2 py-1 rounded">{{ $category->slug }}</code></td>
                            <td class="px-6 py-4"><span class="text-green-500 font-bold">{{ $category->games_count }}</span></td>
                            <td class="px-6 py-4"><span class="text-gray-300 font-bold">{{ $category->sort_order }}</span></td>
                            <td class="px-6 py-4"><span class="px-3 py-1 rounded-full text-xs font-bold {{ $category->is_active ? 'bg-green-500/20 text-green-400' : 'bg-gray-700 text-gray-400' }}">{{ $category->is_active ? 'Active' : 'Inactive' }}</span></td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.game-categories.edit', $category) }}" class="px-3 py-1.5 bg-green-500 hover:bg-green-400 text-white text-xs font-bold rounded-lg transition-colors">Edit</a>
                                    <form action="{{ route('admin.game-categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Delete this category?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 bg-red-500 hover:bg-red-400 text-white text-xs font-bold rounded-lg transition-colors">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-6 py-16 text-center"><div class="text-6xl mb-4">📁</div><h3 class="text-xl font-bold text-white mb-2">No categories found</h3><p class="text-gray-400 mb-6">Create your first game category</p><a href="{{ route('admin.game-categories.create') }}" class="inline-block bg-gradient-to-r from-green-500 to-emerald-500 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg">+ Add First Category</a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($categories->hasPages())
            <div class="px-6 py-4 border-t border-gray-700">{{ $categories->links() }}</div>
        @endif
    </div>
</div>
@endsection
