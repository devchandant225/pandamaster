@extends('layouts.dashboard', ['active' => 'subscribers'])

@section('title', 'Newsletter Subscribers')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-extrabold text-white">
                    📧 Newsletter Subscribers
                </h1>
                <p class="text-gray-400 mt-2">Manage your email list and subscription statuses</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.subscribers.create') }}" class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 px-6 py-3 rounded-xl font-bold transition-all shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Add Subscriber
                </a>
            </div>
        </div>

        <!-- Filters & Search -->
        <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6 mb-8">
            <form action="{{ route('admin.subscribers.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by email..." class="w-full pl-12 pr-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none transition-all">
                </div>
                <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white px-8 py-3 rounded-xl font-bold transition-colors">
                    Filter
                </button>
                @if(request('search'))
                    <a href="{{ route('admin.subscribers.index') }}" class="flex items-center justify-center px-4 py-3 text-gray-400 hover:text-white transition-colors">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <!-- Table -->
        <div class="bg-gray-800 rounded-2xl border border-gray-700 overflow-hidden shadow-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-900/50 border-b border-gray-700">
                            <th class="px-6 py-4 text-sm font-bold text-gray-400 uppercase tracking-wider">Email Address</th>
                            <th class="px-6 py-4 text-sm font-bold text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-sm font-bold text-gray-400 uppercase tracking-wider">Joined Date</th>
                            <th class="px-6 py-4 text-sm font-bold text-gray-400 uppercase tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($subscribers as $subscriber)
                            <tr class="hover:bg-gray-700/30 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-white">{{ $subscriber->email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.subscribers.toggle', $subscriber) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold transition-all {{ $subscriber->is_active ? 'bg-green-500/10 text-green-500 border border-green-500/20' : 'bg-red-500/10 text-red-500 border border-red-500/20' }}">
                                            <span class="w-1.5 h-1.5 rounded-full {{ $subscriber->is_active ? 'bg-green-500 animate-pulse' : 'bg-red-500' }}"></span>
                                            {{ $subscriber->is_active ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-gray-400">
                                    {{ $subscriber->created_at->format('M d, Y') }}
                                    <div class="text-[10px]">{{ $subscriber->created_at->format('h:i A') }}</div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.subscribers.edit', $subscriber) }}" class="p-2 text-blue-400 hover:bg-blue-400/10 rounded-lg transition-colors" title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>
                                        <form action="{{ route('admin.subscribers.destroy', $subscriber) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this subscriber?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-red-500 hover:bg-red-500/10 rounded-lg transition-colors" title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="text-4xl mb-4">Empty</div>
                                    <p class="text-gray-500">No subscribers found in your list.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($subscribers->hasPages())
                <div class="px-6 py-4 bg-gray-900/50 border-t border-gray-700">
                    {{ $subscribers->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
