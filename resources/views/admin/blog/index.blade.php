@extends('layouts.dashboard', ['active' => 'blog'])

@section('title', 'Blog Management - 888Realty Admin')

@section('content')
<div class="p-6 md:p-10 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Blog <span class="text-[#D4AF37]">Management</span></h1>
            <p class="text-gray-500 mt-2 font-medium">Publish, edit, and manage your real estate insights.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="hidden md:flex flex-col items-end mr-4">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Total Articles</span>
                <span class="text-xl font-black text-gray-900">{{ $posts->total() }}</span>
            </div>
            <a href="{{ route('admin.blog.create') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-black text-white font-bold rounded-2xl hover:bg-gray-800 transition-all shadow-xl shadow-black/10 transform active:scale-95">
                <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                New Article
            </a>
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

    <!-- Filters & Search -->
    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 mb-8">
        <form action="{{ route('admin.blog.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title, author, or content..."
                    class="w-full h-14 pl-12 pr-4 bg-gray-50 border-2 border-transparent focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-medium">
                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <button type="submit" class="px-10 h-14 bg-gray-900 text-white font-bold rounded-2xl hover:bg-black transition-all">
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('admin.blog.index') }}" class="h-14 px-6 flex items-center justify-center bg-gray-100 text-gray-500 font-bold rounded-2xl hover:bg-gray-200 transition-all">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Posts Table -->
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Article Details</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Category</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Status</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Publish Date</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($posts as $post)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-20 h-14 rounded-xl overflow-hidden bg-gray-100 border border-gray-100 flex-shrink-0 shadow-sm">
                                        @if($post->image_url)
                                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-300">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="max-w-md">
                                        <div class="font-black text-gray-900 text-base line-clamp-1 group-hover:text-[#D4AF37] transition-colors">{{ $post->title }}</div>
                                        <div class="text-xs font-bold text-gray-400 uppercase tracking-tighter mt-0.5">By {{ $post->author }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-[10px] font-black uppercase tracking-wider border border-gray-200">
                                    {{ $post->category?->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                @php
                                    $statusColors = [
                                        'published' => 'bg-green-100 text-green-700 border-green-200',
                                        'draft' => 'bg-amber-100 text-amber-700 border-amber-200',
                                        'archived' => 'bg-gray-100 text-gray-700 border-gray-200'
                                    ];
                                    $color = $statusColors[$post->status] ?? $statusColors['draft'];
                                @endphp
                                <span class="px-3 py-1 {{ $color }} rounded-full text-[10px] font-black uppercase tracking-wider border">
                                    {{ $post->status }}
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <div class="text-sm font-bold text-gray-900">{{ $post->created_at->format('M d, Y') }}</div>
                                <div class="text-[10px] font-black text-gray-400 uppercase tracking-tighter">{{ $post->created_at->format('h:i A') }}</div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="w-10 h-10 bg-white border border-gray-200 text-gray-400 rounded-xl flex items-center justify-center hover:bg-black hover:text-white hover:border-black transition-all shadow-sm" title="View Article">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.blog.edit', $post) }}" class="w-10 h-10 bg-white border border-gray-200 text-gray-400 rounded-xl flex items-center justify-center hover:bg-[#D4AF37] hover:text-black hover:border-[#D4AF37] transition-all shadow-sm" title="Edit Article">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" onsubmit="return confirm('Archive this article? This cannot be undone.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-10 h-10 bg-white border border-gray-200 text-red-400 rounded-xl flex items-center justify-center hover:bg-red-500 hover:text-white hover:border-red-500 transition-all shadow-sm" title="Delete Article">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <div class="max-w-xs mx-auto">
                                    <div class="w-20 h-20 bg-gray-100 rounded-3xl flex items-center justify-center mx-auto mb-6 text-gray-300">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2zM14 4v4h4"></path></svg>
                                    </div>
                                    <h3 class="text-xl font-black text-gray-900 mb-2">No Articles Found</h3>
                                    <p class="text-sm text-gray-500 mb-8 leading-relaxed">We couldn't find any blog posts matching your search. Try adjusting your filters or create a new one.</p>
                                    <a href="{{ route('admin.blog.create') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-black text-white font-bold rounded-2xl hover:bg-gray-800 transition-all shadow-xl shadow-black/10 transform active:scale-95">
                                        Create New Post
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($posts->hasPages())
            <div class="px-8 py-6 bg-gray-50/50 border-t border-gray-100">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
