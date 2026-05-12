@extends('layouts.dashboard', ['active' => 'game-categories'])
@section('title', 'Edit Game Category')
@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div><h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">Edit <span class="text-green-500">Category</span></h1><p class="text-gray-400 mt-2 font-medium">Update category details</p></div>
        <a href="{{ route('admin.game-categories.index') }}" class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-xl font-bold transition-all">&larr; Back</a>
    </div>
    @if($errors->any())<div class="mb-8 p-5 bg-red-500/10 border border-red-500/30 rounded-xl text-red-400"><ul class="list-disc list-inside space-y-1">@foreach($errors->all() as $error)<li class="font-bold">{{ $error }}</li>@endforeach</ul></div>@endif
    <div class="bg-gray-800 rounded-2xl border border-gray-700 p-8 max-w-4xl shadow-xl">
        <form action="{{ route('admin.game-categories.update', $gameCategory) }}" method="POST">@csrf @method('PUT')
            <div class="space-y-6">
                <div><label class="block text-sm font-bold text-gray-400 mb-2">Category Name</label><input type="text" name="name" value="{{ old('name', $gameCategory->name) }}" required class="w-full px-5 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-green-500 focus:outline-none transition-colors"></div>
                <div><label class="block text-sm font-bold text-gray-400 mb-2">Slug <span class="text-gray-600 font-normal">(auto-generated if empty)</span></label><input type="text" name="slug" value="{{ old('slug', $gameCategory->slug) }}" class="w-full px-5 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-green-500 focus:outline-none transition-colors"></div>
                <div><label class="block text-sm font-bold text-gray-400 mb-2">Description</label><textarea name="description" rows="4" class="w-full px-5 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-green-500 focus:outline-none transition-colors">{{ old('description', $gameCategory->description) }}</textarea></div>
                <div><label class="block text-sm font-bold text-gray-400 mb-2">Icon URL</label><input type="text" name="icon_url" value="{{ old('icon_url', $gameCategory->icon_url) }}" class="w-full px-5 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-green-500 focus:outline-none transition-colors" placeholder="https://example.com/icon.png"></div>
                <div><label class="block text-sm font-bold text-gray-400 mb-2">Sort Order</label><input type="number" name="sort_order" value="{{ old('sort_order', $gameCategory->sort_order) }}" class="w-full px-5 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-green-500 focus:outline-none transition-colors"></div>
                <div class="flex items-center gap-4"><label class="relative inline-flex items-center cursor-pointer"><input type="hidden" name="is_active" value="0"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $gameCategory->is_active) ? 'checked' : '' }} class="sr-only peer"><div class="w-11 h-6 bg-gray-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div></label><span class="text-sm font-bold text-gray-400">Active</span></div>
            </div>
            <div class="mt-8 flex gap-4"><button type="submit" class="px-8 py-3 bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-400 hover:to-emerald-400 text-white font-bold rounded-xl transition-all shadow-lg">Update Category</button><a href="{{ route('admin.game-categories.index') }}" class="px-8 py-3 bg-gray-700 hover:bg-gray-600 text-white font-bold rounded-xl transition-all">Cancel</a></div>
        </form>
    </div>
</div>
@endsection
