@extends('layouts.dashboard', ['active' => 'landing-sections'])

@section('title', ($landingSection->id ? 'Edit' : 'Create') . ' Landing Section')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-white">
                🎨 {{ $landingSection->id ? 'Edit' : 'Create' }} Landing Section
            </h1>
            <p class="text-gray-400 mt-2">Customize your homepage content and animations</p>
        </div>

        <!-- Form -->
        <form action="{{ $landingSection->id ? route('admin.landing-sections.update', $landingSection) : route('admin.landing-sections.store') }}" method="POST" class="bg-gray-800 rounded-2xl border border-gray-700 p-8 space-y-6">
            @csrf
            @if($landingSection->id) @method('PUT') @endif

            <!-- Section Key -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Section Type *</label>
                <select name="section_key" required {{ $landingSection->id ? 'disabled' : '' }} class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none">
                    <option value="">Select section type...</option>
                    @foreach($sectionKeys as $key => $label)
                        <option value="{{ $key }}" {{ old('section_key', $landingSection->section_key ?? '') == $key ? 'selected' : '' }} {{ in_array($key, $usedKeys ?? []) && !$landingSection->id ? 'disabled' : '' }}>
                            {{ $label }} {{ in_array($key, $usedKeys ?? []) && !$landingSection->id ? '(Already used)' : '' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Content Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title', $landingSection->title) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="Play Win Repeat">
                </div>
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Badge Text</label>
                    <input type="text" name="badge_text" value="{{ old('badge_text', $landingSection->badge_text) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="Premium Gaming Experience">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-white mb-2">Description</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="Discover 100+ premium games...">{{ old('description', $landingSection->description) }}</textarea>
            </div>

            <!-- CTA Buttons -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-yellow-500 mb-2">Primary CTA Text</label>
                    <input type="text" name="cta_primary_text" value="{{ old('cta_primary_text', $landingSection->cta_primary_text) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="Start Playing">
                </div>
                <div>
                    <label class="block text-sm font-bold text-yellow-500 mb-2">Primary CTA URL</label>
                    <input type="text" name="cta_primary_url" value="{{ old('cta_primary_url', $landingSection->cta_primary_url) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="/dashboard">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-purple-500 mb-2">Secondary CTA Text</label>
                    <input type="text" name="cta_secondary_text" value="{{ old('cta_secondary_text', $landingSection->cta_secondary_text) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-purple-500 focus:outline-none" placeholder="Browse Games">
                </div>
                <div>
                    <label class="block text-sm font-bold text-purple-500 mb-2">Secondary CTA URL</label>
                    <input type="text" name="cta_secondary_url" value="{{ old('cta_secondary_url', $landingSection->cta_secondary_url) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-purple-500 focus:outline-none" placeholder="/games">
                </div>
            </div>

            <!-- Animation & Background -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Animation Type *</label>
                    <select name="animation_type" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none">
                        @foreach($animationTypes as $key => $label)
                            <option value="{{ $key }}" {{ old('animation_type', $landingSection->animation_type) == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Background Type *</label>
                    <select name="background_type" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none">
                        @foreach($backgroundTypes as $key => $label)
                            <option value="{{ $key }}" {{ old('background_type', $landingSection->background_type) == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-white mb-2">Background URL (Optional)</label>
                <input type="text" name="background_url" value="{{ old('background_url', $landingSection->background_url) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="https://example.com/image.jpg">
            </div>

            <!-- Stats -->
            <div>
                <label class="block text-sm font-bold text-white mb-3">Statistics (JSON Format)</label>
                <textarea name="stats" rows="4" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white font-mono text-sm focus:border-yellow-500 focus:outline-none" placeholder='[{"value": "100+", "label": "Games"}, {"value": "$2M+", "label": "Won"}]'>{{ old('stats', json_encode($landingSection->stats, JSON_PRETTY_PRINT)) }}</textarea>
                <p class="text-xs text-gray-500 mt-2">Format: [{"value": "100+", "label": "Games"}]</p>
            </div>

            <!-- Settings -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $landingSection->sort_order ?? 0) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none">
                </div>
                <div class="flex items-center">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $landingSection->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 text-yellow-500 rounded focus:ring-yellow-500">
                        <span class="text-sm font-bold text-white">Active</span>
                    </label>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 bg-gradient-to-r from-yellow-500 to-purple-500 hover:from-yellow-400 hover:to-purple-400 text-white px-8 py-4 rounded-xl font-bold transition-all shadow-lg">
                    {{ $landingSection->id ? '💾 Update Section' : '✨ Create Section' }}
                </button>
                <a href="{{ route('admin.landing-sections.index') }}" class="px-8 py-4 bg-gray-700 hover:bg-gray-600 text-white rounded-xl font-bold transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
