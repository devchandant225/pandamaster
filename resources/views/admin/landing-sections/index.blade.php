@extends('layouts.dashboard', ['active' => 'landing-sections'])

@section('title', 'Landing Page Manager - Panda Master VIP')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">
                🎨 Landing <span class="text-yellow-500">Page</span> <span class="text-purple-500">Manager</span>
            </h1>
            <p class="text-gray-400 mt-2 font-medium">Customize your homepage hero section and animations</p>
        </div>
        <a href="{{ route('admin.landing-sections.create') }}" class="bg-gradient-to-r from-yellow-500 to-purple-500 hover:from-yellow-400 hover:to-purple-400 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg">
            + Add Section
        </a>
    </div>

    @if(session('success'))
        <div class="mb-8 p-5 bg-green-500/10 border border-green-500/30 rounded-xl flex items-center gap-4 text-green-400 shadow-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 2-2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Sections Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @forelse($sections as $section)
            <div class="bg-gray-800 rounded-2xl border border-gray-700 hover:border-yellow-500/50 transition-all overflow-hidden shadow-xl">
                <!-- Section Header -->
                <div class="bg-gradient-to-r from-yellow-500/10 to-purple-500/10 px-6 py-4 border-b border-gray-700 flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-black text-white">{{ $sectionKeys[$section->section_key] ?? $section->section_key }}</h3>
                        <p class="text-xs text-gray-400 mt-1">Key: <code class="bg-gray-900 px-2 py-0.5 rounded">{{ $section->section_key }}</code></p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $section->is_active ? 'bg-green-500/20 text-green-400' : 'bg-gray-700 text-gray-400' }}">
                        {{ $section->is_active ? '✓ Active' : '✗ Inactive' }}
                    </span>
                </div>

                <!-- Section Content Preview -->
                <div class="p-6 space-y-4">
                    @if($section->title)
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Title</p>
                            <p class="text-white font-bold">{{ Str::limit($section->title, 60) }}</p>
                        </div>
                    @endif

                    @if($section->badge_text)
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Badge</p>
                            <p class="text-yellow-500 text-sm font-semibold">{{ $section->badge_text }}</p>
                        </div>
                    @endif

                    @if($section->cta_primary_text)
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Primary CTA</p>
                                <p class="text-purple-500 text-sm font-semibold">{{ $section->cta_primary_text }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Secondary CTA</p>
                                <p class="text-gray-300 text-sm font-semibold">{{ $section->cta_secondary_text ?? '—' }}</p>
                            </div>
                        </div>
                    @endif

                    @if($section->stats)
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-2">Statistics</p>
                            <div class="flex gap-2 flex-wrap">
                                @foreach($section->stats as $stat)
                                    <span class="bg-gray-900 px-3 py-1 rounded-lg text-xs text-yellow-500 font-bold">
                                        {{ $stat['value'] ?? '' }} {{ $stat['label'] ?? '' }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="flex items-center gap-2 text-xs text-gray-500 pt-2 border-t border-gray-700">
                        <span>Animation: <strong class="text-gray-300">{{ $animationTypes[$section->animation_type] ?? $section->animation_type }}</strong></span>
                        <span>•</span>
                        <span>Background: <strong class="text-gray-300">{{ $backgroundTypes[$section->background_type] ?? $section->background_type }}</strong></span>
                    </div>
                </div>

                <!-- Actions -->
                <div class="px-6 py-4 bg-gray-900/50 border-t border-gray-700 flex items-center justify-between">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.landing-sections.edit', $section) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-black text-sm font-bold rounded-lg transition-colors">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('admin.landing-sections.toggle-status', $section) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm font-bold rounded-lg transition-colors">
                                {{ $section->is_active ? '🔇 Disable' : '🔊 Enable' }}
                            </button>
                        </form>
                    </div>
                    <form action="{{ route('admin.landing-sections.destroy', $section) }}" method="POST" class="inline" onsubmit="return confirm('Delete this section?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-400 text-white text-sm font-bold rounded-lg transition-colors">
                            🗑️ Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center py-16">
                <div class="text-6xl mb-4">🎨</div>
                <h3 class="text-2xl font-bold text-white mb-2">No landing sections yet</h3>
                <p class="text-gray-400 mb-6">Create your first section to start customizing your homepage</p>
                <a href="{{ route('admin.landing-sections.create') }}" class="inline-block bg-gradient-to-r from-yellow-500 to-purple-500 hover:from-yellow-400 hover:to-purple-400 text-white px-8 py-4 rounded-xl text-lg font-bold transition-all shadow-lg">
                    + Create First Section
                </a>
            </div>
        @endforelse
    </div>

    @if($sections->hasPages())
        <div class="mt-8">
            {{ $sections->links() }}
        </div>
    @endif
</div>
@endsection
