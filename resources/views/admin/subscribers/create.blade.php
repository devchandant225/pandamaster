@extends('layouts.dashboard', ['active' => 'subscribers'])

@section('title', 'Add Subscriber')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-10">
            <a href="{{ route('admin.subscribers.index') }}" class="text-yellow-500 hover:text-yellow-400 font-bold flex items-center gap-2 mb-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Back to List
            </a>
            <h1 class="text-3xl font-extrabold text-white">
                ➕ Add New Subscriber
            </h1>
            <p class="text-gray-400 mt-2">Manually add an email to your newsletter list</p>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.subscribers.store') }}" method="POST" class="bg-gray-800 rounded-2xl border border-gray-700 p-8 space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-bold text-white mb-2">Email Address *</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="example@email.com">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="flex items-center gap-3 cursor-pointer bg-gray-900 p-4 rounded-xl border border-gray-700 hover:border-yellow-500/50 transition-colors">
                    <input type="checkbox" name="is_active" value="1" checked class="w-5 h-5 text-yellow-500 rounded focus:ring-yellow-500">
                    <span class="text-sm font-bold text-white">Active Subscription</span>
                </label>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-400 text-gray-900 px-8 py-4 rounded-xl font-bold transition-all shadow-lg text-lg">
                    ✨ Add Subscriber
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
