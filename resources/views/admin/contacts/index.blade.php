@extends('layouts.dashboard', ['active' => 'contacts'])

@section('title', 'Contact Messages')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-3xl font-extrabold text-white">
                📥 Contact Messages
            </h1>
            <p class="text-gray-400 mt-2">View and manage messages from your site visitors</p>
        </div>

        <!-- Filters & Search -->
        <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6 mb-8">
            <form action="{{ route('admin.contacts.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, email or subject..." class="w-full pl-12 pr-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none transition-all">
                </div>
                <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white px-8 py-3 rounded-xl font-bold transition-colors">
                    Filter
                </button>
            </form>
        </div>

        <!-- Table -->
        <div class="bg-gray-800 rounded-2xl border border-gray-700 overflow-hidden shadow-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-900/50 border-b border-gray-700">
                            <th class="px-6 py-4 text-sm font-bold text-gray-400 uppercase tracking-wider">Sender</th>
                            <th class="px-6 py-4 text-sm font-bold text-gray-400 uppercase tracking-wider">Subject</th>
                            <th class="px-6 py-4 text-sm font-bold text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-sm font-bold text-gray-400 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-4 text-sm font-bold text-gray-400 uppercase tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($messages as $message)
                            <tr class="hover:bg-gray-700/30 transition-colors {{ !$message->is_read ? 'bg-yellow-500/5' : '' }}">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-white">{{ $message->name }}</div>
                                    <div class="text-xs text-gray-500">{{ $message->email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-gray-300 font-medium line-clamp-1">{{ $message->subject }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    @if(!$message->is_read)
                                        <span class="px-2 py-1 bg-yellow-500/10 text-yellow-500 text-[10px] font-black rounded-full border border-yellow-500/20 uppercase">New</span>
                                    @else
                                        <span class="px-2 py-1 bg-gray-700 text-gray-400 text-[10px] font-black rounded-full uppercase">Read</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-400 text-sm">
                                    {{ $message->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.contacts.show', $message) }}" class="p-2 text-yellow-500 hover:bg-yellow-500/10 rounded-lg transition-colors" title="View">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </a>
                                        <form action="{{ route('admin.contacts.destroy', $message) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
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
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <p class="text-gray-500">No messages found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($messages->hasPages())
                <div class="px-6 py-4 bg-gray-900/50 border-t border-gray-700">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
