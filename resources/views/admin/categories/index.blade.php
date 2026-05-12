@extends('layouts.dashboard', ['active' => 'categories'])

@section('title', 'Content Taxonomy - 888Realty Admin')

@section('content')
<div class="p-6 md:p-10 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Content <span class="text-[#D4AF37]">Taxonomy</span></h1>
            <p class="text-gray-500 mt-2 font-medium">Organize your editorial assets into professional classifications.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-black text-white font-bold rounded-2xl hover:bg-gray-800 transition-all shadow-xl shadow-black/10 transform active:scale-95">
                <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                New Category
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

    @if(session('error'))
        <div class="mb-8 p-5 bg-red-50 border border-red-100 rounded-2xl flex items-center gap-4 text-red-800 shadow-sm">
            <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center text-red-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <span class="font-bold">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Category Roster -->
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Classification Name</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">System Slug</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-center">Asset Count</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-right">Operations</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($categories as $category)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-400 group-hover:bg-[#D4AF37]/10 group-hover:text-[#D4AF37] transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                    </div>
                                    <div class="font-black text-gray-900 text-lg tracking-tight">{{ $category->name }}</div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <code class="px-3 py-1 bg-gray-50 text-gray-500 rounded-lg text-xs font-mono border border-gray-100 group-hover:border-[#D4AF37]/30 transition-all">
                                    {{ $category->slug }}
                                </code>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <div class="inline-flex flex-col items-center">
                                    <span class="text-xl font-black text-gray-900 leading-none">{{ $category->posts_count }}</span>
                                    <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mt-1">Articles</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="w-10 h-10 bg-white border border-gray-200 text-gray-400 rounded-xl flex items-center justify-center hover:bg-[#D4AF37] hover:text-black hover:border-[#D4AF37] transition-all shadow-sm">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Archive this classification? This operation is restricted if active assets are assigned.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-10 h-10 bg-white border border-gray-200 text-red-400 rounded-xl flex items-center justify-center hover:bg-red-500 hover:text-white hover:border-red-500 transition-all shadow-sm">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-20 text-center">
                                <div class="max-w-xs mx-auto text-gray-300">
                                    <svg class="w-16 h-16 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    <h3 class="text-xl font-black text-gray-900 mb-2">No Categories Defined</h3>
                                    <p class="text-sm text-gray-500 mb-8 leading-relaxed">Establish your content hierarchy by creating your first editorial category.</p>
                                    <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-black text-white font-bold rounded-2xl hover:bg-gray-800 transition-all">
                                        Setup First Category
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($categories->hasPages())
            <div class="px-8 py-6 bg-gray-50/50 border-t border-gray-100">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
