@extends('layouts.dashboard', ['active' => 'contacts'])

@section('title', 'View Message')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-10">
            <a href="{{ route('admin.contacts.index') }}" class="text-yellow-500 hover:text-yellow-400 font-bold flex items-center gap-2 mb-4 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Back to Messages
            </a>
            <h1 class="text-3xl font-extrabold text-white">
                📩 View Message
            </h1>
        </div>

        <div class="bg-gray-800 rounded-[2.5rem] border border-gray-700 overflow-hidden shadow-2xl">
            <!-- Message Header -->
            <div class="p-8 border-b border-gray-700 bg-gray-900/30">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                    <div>
                        <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-1">From</p>
                        <h2 class="text-2xl font-black text-white">{{ $contact->name }}</h2>
                        <a href="mailto:{{ $contact->email }}" class="text-yellow-500 hover:underline font-bold">{{ $contact->email }}</a>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-1">Received On</p>
                        <p class="text-white font-bold">{{ $contact->created_at->format('M d, Y') }}</p>
                        <p class="text-xs text-gray-500">{{ $contact->created_at->format('h:i A') }}</p>
                    </div>
                </div>
                
                <div>
                    <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-1">Subject</p>
                    <p class="text-xl font-bold text-white">{{ $contact->subject }}</p>
                </div>
            </div>

            <!-- Message Content -->
            <div class="p-8">
                <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-4">Message</p>
                <div class="bg-gray-950 rounded-2xl p-8 border border-gray-700 text-gray-300 leading-relaxed whitespace-pre-wrap text-lg">
                    {{ $contact->message }}
                </div>
            </div>

            <!-- Actions -->
            <div class="p-8 bg-gray-900/30 border-t border-gray-700 flex flex-wrap gap-4">
                <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="flex-1 bg-yellow-500 hover:bg-yellow-400 text-gray-900 px-8 py-4 rounded-xl font-black uppercase tracking-widest text-center transition-all shadow-lg flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Reply via Email
                </a>
                
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-500/10 hover:bg-red-500/20 text-red-500 border border-red-500/20 px-8 py-4 rounded-xl font-black uppercase tracking-widest transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Delete Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
