@extends('layouts.dashboard', ['active' => 'meta-tags'])

@section('title', 'Global SEO - 888Realty Admin')

@section('content')
<div class="p-6 md:p-10 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Global <span class="text-[#D4AF37]">SEO</span></h1>
            <p class="text-gray-500 mt-2 font-medium">Optimize platform visibility with high-performance meta metadata.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="hidden md:flex flex-col items-end mr-4">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Configured Pages</span>
                <span class="text-xl font-black text-gray-900">{{ $metaTags->total() }}</span>
            </div>
            <a href="{{ route('admin.meta-tags.create') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-black text-white font-bold rounded-2xl hover:bg-gray-800 transition-all shadow-xl shadow-black/10 transform active:scale-95">
                <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                Configure Page
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

    <!-- Meta Tags Console -->
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Asset</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">SEO Parameters</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Allocation</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Status</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-right">Operations</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($metaTags as $metaTag)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-8 py-6">
                                <div class="w-16 h-16 rounded-2xl overflow-hidden bg-gray-100 border-2 border-white shadow-md group-hover:border-[#D4AF37]/30 transition-all flex-shrink-0">
                                    @if($metaTag->image)
                                        <img src="{{ Storage::url($metaTag->image) }}" alt="{{ $metaTag->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="max-w-md">
                                    <div class="font-black text-gray-900 text-base line-clamp-1 group-hover:text-[#D4AF37] transition-colors">{{ $metaTag->title }}</div>
                                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 line-clamp-1 italic">{{ $metaTag->desc ?? 'No description provided' }}</div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                @php
                                    $pageTypeColors = [
                                        'home' => 'bg-blue-50 text-blue-600 border-blue-100',
                                        'about' => 'bg-purple-50 text-purple-600 border-purple-100',
                                        'contact' => 'bg-green-50 text-green-600 border-green-100',
                                        'blog' => 'bg-red-50 text-red-600 border-red-100',
                                        'property' => 'bg-amber-50 text-amber-600 border-amber-100',
                                    ];
                                    $color = $pageTypeColors[$metaTag->page_type] ?? 'bg-gray-50 text-gray-600 border-gray-100';
                                @endphp
                                <span class="inline-flex px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest border {{ $color }}">
                                    {{ str_replace('-', ' ', $metaTag->page_type) }}
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full {{ $metaTag->is_active ? 'bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.5)]' : 'bg-gray-300' }}"></div>
                                    <span class="text-[10px] font-black uppercase tracking-widest {{ $metaTag->is_active ? 'text-gray-900' : 'text-gray-400' }}">
                                        {{ $metaTag->is_active ? 'Live' : 'Offline' }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.meta-tags.edit', $metaTag) }}" class="w-10 h-10 bg-white border border-gray-200 text-gray-400 rounded-xl flex items-center justify-center hover:bg-[#D4AF37] hover:text-black hover:border-[#D4AF37] transition-all shadow-sm">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.meta-tags.toggle-status', $metaTag) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-10 h-10 bg-white border border-gray-200 text-gray-400 rounded-xl flex items-center justify-center hover:bg-black hover:text-white transition-all shadow-sm" title="Toggle visibility">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.meta-tags.destroy', $metaTag) }}" method="POST" onsubmit="return confirm('Permanently delete these SEO configurations?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-10 h-10 bg-white border border-gray-200 text-red-400 rounded-xl flex items-center justify-center hover:bg-red-500 hover:text-white transition-all shadow-sm">
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
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                    </div>
                                    <h3 class="text-xl font-black text-gray-900 mb-2">No SEO Tags Defined</h3>
                                    <p class="text-sm text-gray-500 mb-8 leading-relaxed">Global SEO configurations allow you to control how each page appears in search engines and social shares.</p>
                                    <a href="{{ route('admin.meta-tags.create') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-black text-white font-bold rounded-2xl hover:bg-gray-800 transition-all shadow-xl shadow-black/10 transform active:scale-95">
                                        Setup First Page
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($metaTags->hasPages())
            <div class="px-8 py-6 bg-gray-50/50 border-t border-gray-100">
                {{ $metaTags->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
