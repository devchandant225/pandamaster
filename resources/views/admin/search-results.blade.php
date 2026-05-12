@extends('layouts.dashboard', ['active' => 'admin-dashboard'])

@section('title', 'Search Results - 888Realty Admin')

@section('content')
<div class="p-6 md:p-10 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="mb-10">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Search <span class="text-[#D4AF37]">Results</span></h1>
        <p class="text-gray-500 mt-2 font-medium">Found results for: <span class="text-gray-900 font-bold">"{{ $query }}"</span></p>
    </div>

    <div class="space-y-12">
        <!-- Leads Section -->
        <section>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h2 class="text-xl font-black text-gray-900 tracking-tight">Matching Leads ({{ $leads->count() }})</h2>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                @if($leads->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50/50 border-b border-gray-100">
                                <tr>
                                    <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Client</th>
                                    <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Intent</th>
                                    <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach($leads as $lead)
                                    <tr class="hover:bg-gray-50/50 transition-colors group">
                                        <td class="px-8 py-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 font-black text-sm">
                                                    {{ substr($lead->name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="font-black text-gray-900">{{ $lead->name }}</div>
                                                    <div class="text-xs text-gray-400">{{ $lead->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-5">
                                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest border bg-blue-50 text-blue-600 border-blue-100">
                                                {{ $lead->intent }}
                                            </span>
                                        </td>
                                        <td class="px-8 py-5 text-right">
                                            <a href="{{ route('admin.leads.show', $lead) }}" class="inline-flex items-center gap-2 text-xs font-black text-[#D4AF37] hover:text-black transition-colors uppercase tracking-widest">
                                                Details
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-12 text-center text-gray-400 italic font-medium">No matching leads found.</div>
                @endif
            </div>
        </section>

        <!-- Properties Section -->
        <section>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
                <h2 class="text-xl font-black text-gray-900 tracking-tight">Matching Properties ({{ $properties->count() }})</h2>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                @if($properties->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50/50 border-b border-gray-100">
                                <tr>
                                    <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Property</th>
                                    <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Price</th>
                                    <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach($properties as $property)
                                    <tr class="hover:bg-gray-50/50 transition-colors group">
                                        <td class="px-8 py-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-12 h-10 rounded-xl bg-gray-100 overflow-hidden">
                                                    @php $images = is_array($property->images) ? $property->images : json_decode($property->images, true) ?? []; @endphp
                                                    @if(count($images) > 0)
                                                        <img src="{{ $images[0] }}" class="w-full h-full object-cover">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="font-black text-gray-900">{{ $property->title }}</div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-5">
                                            <span class="font-black text-[#D4AF37]">${{ number_format($property->price) }}</span>
                                        </td>
                                        <td class="px-8 py-5 text-right">
                                            <a href="{{ route('admin.properties.edit', $property) }}" class="inline-flex items-center gap-2 text-xs font-black text-[#D4AF37] hover:text-black transition-colors uppercase tracking-widest">
                                                Edit
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-12 text-center text-gray-400 italic font-medium">No matching properties found.</div>
                @endif
            </div>
        </section>

        <!-- Articles Section -->
        <section>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2zM14 4v4h4"></path></svg>
                </div>
                <h2 class="text-xl font-black text-gray-900 tracking-tight">Matching Articles ({{ $posts->count() }})</h2>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                @if($posts->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50/50 border-b border-gray-100">
                                <tr>
                                    <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Article</th>
                                    <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach($posts as $post)
                                    <tr class="hover:bg-gray-50/50 transition-colors group">
                                        <td class="px-8 py-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-12 h-10 rounded-xl bg-gray-100 overflow-hidden flex-shrink-0">
                                                    @if($post->image_url)
                                                        <img src="{{ $post->image_url }}" class="w-full h-full object-cover">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="font-black text-gray-900 truncate max-w-lg">{{ $post->title }}</div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-5 text-right">
                                            <a href="{{ route('admin.blog.edit', $post) }}" class="inline-flex items-center gap-2 text-xs font-black text-[#D4AF37] hover:text-black transition-colors uppercase tracking-widest">
                                                Edit
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-12 text-center text-gray-400 italic font-medium">No matching articles found.</div>
                @endif
            </div>
        </section>
    </div>
</div>
@endsection
