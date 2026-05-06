@extends('layouts.dashboard', ['active' => 'games'])

@section('title', ($game->id ? 'Edit' : 'Add') . ' Game')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-white">
                🎮 {{ $game->id ? 'Edit' : 'Add New' }} Game
            </h1>
            <p class="text-gray-400 mt-2">Manage game details and settings</p>
        </div>

        <!-- Form -->
        <form action="{{ $game->id ? route('admin.games.update', $game) : route('admin.games.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 rounded-2xl border border-gray-700 p-8 space-y-6">
            @csrf
            @if($game->id) @method('PUT') @endif

            <!-- Basic Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Game Title *</label>
                    <input type="text" name="title" value="{{ old('title', $game->title) }}" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="Starlight Princess">
                </div>
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $game->slug) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="starlight-princess">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-white mb-2">Description</label>
                <textarea name="description" id="description" rows="3" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="A magical slot game...">{{ old('description', $game->description) }}</textarea>
            </div>

            <!-- Game Type -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Game Type *</label>
                    <select name="game_type" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none">
                        <option value="slots" {{ old('game_type', $game->game_type) == 'slots' ? 'selected' : '' }}>🎰 Slots</option>
                        <option value="fish" {{ old('game_type', $game->game_type) == 'fish' ? 'selected' : '' }}>🐟 Fish Games</option>
                        <option value="keno" {{ old('game_type', $game->game_type) == 'keno' ? 'selected' : '' }}>🎲 Keno</option>
                        <option value="table" {{ old('game_type', $game->game_type) == 'table' ? 'selected' : '' }}>🎯 Table Games</option>
                        <option value="card" {{ old('game_type', $game->game_type) == 'card' ? 'selected' : '' }}>🃏 Card Games</option>
                        <option value="other" {{ old('game_type', $game->game_type) == 'other' ? 'selected' : '' }}>🎮 Other</option>
                    </select>
                </div>
            </div>

            <!-- Thumbnail Upload -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Thumbnail Image</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- File Upload -->
                    <div class="bg-gray-900 p-6 rounded-xl border border-gray-700">
                        <label class="block text-sm font-bold text-white mb-2">Upload Image</label>
                        <input type="file" name="thumbnail" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" id="thumbnail-upload" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-500 file:text-gray-900 hover:file:bg-yellow-400">
                        <p class="text-xs text-gray-400 mt-2">Max size: 5MB. Formats: JPG, PNG, GIF, WEBP</p>
                        
                        <!-- Preview -->
                        <div id="upload-preview" class="mt-4 {{ $game->thumbnail_path ? '' : 'hidden' }}">
                            <p class="text-sm text-gray-400 mb-2">Current uploaded image:</p>
                            <img id="preview-image" src="{{ $game->thumbnail ? $game->thumbnail : '' }}" alt="Thumbnail preview" class="max-w-full h-auto rounded-lg border border-gray-600">
                        </div>
                    </div>
                    
                    <!-- External URL -->
                    <div class="bg-gray-900 p-6 rounded-xl border border-gray-700">
                        <label class="block text-sm font-bold text-white mb-2">Or Use External URL</label>
                        <input type="text" name="thumbnail_url" value="{{ old('thumbnail_url', $game->thumbnail_url) }}" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="https://example.com/image.jpg">
                        <p class="text-xs text-gray-400 mt-2">Leave empty if using uploaded image</p>
                        
                        <!-- Preview -->
                        @if(!$game->thumbnail_path && $game->thumbnail_url)
                        <div class="mt-4">
                            <p class="text-sm text-gray-400 mb-2">Current URL image:</p>
                            <img src="{{ $game->thumbnail_url }}" alt="Thumbnail preview" class="max-w-full h-auto rounded-lg border border-gray-600">
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">RTP (%)</label>
                    <input type="number" name="rtp" value="{{ old('rtp', $game->rtp) }}" step="0.01" min="0" max="100" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="96.50">
                </div>
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Game URL (Real Play)</label>
                    <input type="text" name="game_url" value="{{ old('game_url', $game->game_url) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="https://provider.com/play/game-id">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Demo URL</label>
                    <input type="text" name="demo_url" value="{{ old('demo_url', $game->demo_url) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="https://provider.com/demo/game-id">
                </div>
                <div></div>
            </div>

            <!-- Flags -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <label class="flex items-center gap-3 cursor-pointer bg-gray-900 p-4 rounded-xl border border-gray-700 hover:border-yellow-500/50 transition-colors">
                    <input type="checkbox" name="is_hot" value="1" {{ old('is_hot', $game->is_hot) ? 'checked' : '' }} class="w-5 h-5 text-yellow-500 rounded focus:ring-yellow-500">
                    <span class="text-sm font-bold text-white">🔥 Hot</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer bg-gray-900 p-4 rounded-xl border border-gray-700 hover:border-green-500/50 transition-colors">
                    <input type="checkbox" name="is_new" value="1" {{ old('is_new', $game->is_new) ? 'checked' : '' }} class="w-5 h-5 text-green-500 rounded focus:ring-green-500">
                    <span class="text-sm font-bold text-white">✨ New</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer bg-gray-900 p-4 rounded-xl border border-gray-700 hover:border-yellow-500/50 transition-colors">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $game->is_featured) ? 'checked' : '' }} class="w-5 h-5 text-yellow-500 rounded focus:ring-yellow-500">
                    <span class="text-sm font-bold text-white">⭐ Featured</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer bg-gray-900 p-4 rounded-xl border border-gray-700 hover:border-blue-500/50 transition-colors">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $game->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 text-blue-500 rounded focus:ring-blue-500">
                    <span class="text-sm font-bold text-white">✅ Active</span>
                </label>
            </div>

            <!-- Hero Section -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-700 space-y-6">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Hero Section
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Hero Title</label>
                        <input type="text" name="hero_title" value="{{ old('hero_title', $game->hero_title) }}" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="Big Win at Orion Star">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Hero Subtitle</label>
                        <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $game->hero_subtitle) }}" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="Experience the thrill...">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-400 mb-2">Hero Call-to-Actions (CTAs)</label>
                    <div x-data="{ ctas: {{ json_encode(old('hero_ctas', $game->hero_ctas ?: [])) }} }" class="space-y-4">
                        <template x-for="(cta, index) in ctas" :key="index">
                            <div class="flex gap-4 items-start bg-gray-800 p-4 rounded-xl border border-gray-700 relative group">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 flex-1">
                                    <input type="text" x-model="cta.label" :name="'hero_ctas['+index+'][label]'" placeholder="Button Label" class="px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                                    <input type="text" x-model="cta.url" :name="'hero_ctas['+index+'][url]'" placeholder="Button URL" class="px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                                    <select x-model="cta.style" :name="'hero_ctas['+index+'][style]'" class="px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                                        <option value="primary">Primary (Yellow)</option>
                                        <option value="secondary">Secondary (Purple)</option>
                                        <option value="outline">Outline (White)</option>
                                    </select>
                                </div>
                                <button type="button" @click="ctas.splice(index, 1)" class="p-2 text-red-500 hover:bg-red-500/10 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="ctas.push({label: '', url: '', style: 'primary'})" class="w-full py-3 border-2 border-dashed border-gray-700 rounded-xl text-gray-500 font-bold hover:border-yellow-500/50 hover:text-white transition-all">
                            + Add Hero CTA
                        </button>
                    </div>
                </div>
            </div>

            <!-- Key Features Section -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-700 space-y-6">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    Key Features (Grid)
                </h3>

                <div x-data="{ features: {{ json_encode(old('features', $game->features ?: [])) }} }" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <template x-for="(feature, index) in features" :key="index">
                            <div class="flex gap-4 items-start bg-gray-800 p-4 rounded-xl border border-gray-700 relative group">
                                <div class="grid grid-cols-1 gap-4 flex-1">
                                    <input type="text" x-model="feature.title" :name="'features['+index+'][title]'" placeholder="Feature Title (e.g. Free Spins)" class="px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                                    <input type="text" x-model="feature.icon" :name="'features['+index+'][icon]'" placeholder="Icon (e.g. 🎰)" class="px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                                </div>
                                <button type="button" @click="features.splice(index, 1)" class="p-2 text-red-500 hover:bg-red-500/10 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </template>
                    </div>
                    <button type="button" @click="features.push({title: '', icon: '⭐'})" class="w-full py-3 border-2 border-dashed border-gray-700 rounded-xl text-gray-500 font-bold hover:border-yellow-500/50 hover:text-white transition-all">
                        + Add Key Feature
                    </button>
                </div>
            </div>

            <!-- Why Play Section -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-700 space-y-6">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Why Play (Special Highlights)
                </h3>

                <div>
                    <label class="block text-sm font-bold text-gray-400 mb-2">Special Title</label>
                    <input type="text" name="special_title" value="{{ old('special_title', $game->special_title) }}" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="Why Choose Orion Star?">
                </div>

                <div x-data="{ items: {{ json_encode(old('special_items', $game->special_items ?: [])) }} }" class="space-y-4">
                    <template x-for="(item, index) in items" :key="index">
                        <div class="flex gap-4 items-start bg-gray-800 p-6 rounded-xl border border-gray-700 relative group">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex-1">
                                <div class="space-y-4">
                                    <input type="text" x-model="item.title" :name="'special_items['+index+'][title]'" placeholder="Highlight Title" class="w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                                    <input type="text" x-model="item.icon" :name="'special_items['+index+'][icon]'" placeholder="Icon (e.g. ⚡)" class="w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                                </div>
                                <textarea x-model="item.content" :name="'special_items['+index+'][content]'" placeholder="Highlight Description" rows="3" class="w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none"></textarea>
                            </div>
                            <button type="button" @click="items.splice(index, 1)" class="p-2 text-red-500 hover:bg-red-500/10 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </template>
                    <button type="button" @click="items.push({title: '', content: '', icon: '✨'})" class="w-full py-3 border-2 border-dashed border-gray-700 rounded-xl text-gray-500 font-bold hover:border-yellow-500/50 hover:text-white transition-all">
                        + Add Highlight Item
                    </button>
                </div>
            </div>

            <!-- Alternating Content Sections -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-700 space-y-6">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                    Alternating Content Blocks
                </h3>

                <div x-data="{ 
                    sections: {{ json_encode(old('sections', $game->sections ?: [])) }},
                    updateImage(index, url) {
                        this.sections[index].image_url = url;
                    }
                }" @media-selected.window="if($event.detail.field.startsWith('section_image_')) { 
                    const idx = parseInt($event.detail.field.replace('section_image_', ''));
                    updateImage(idx, $event.detail.url);
                }" class="space-y-6">
                    <template x-for="(section, index) in sections" :key="index">
                        <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700 relative group">
                            <button type="button" @click="sections.splice(index, 1)" class="absolute -top-3 -right-3 w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors shadow-lg z-10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-400 mb-1">Section Title</label>
                                        <input type="text" x-model="section.title" :name="'sections['+index+'][title]'" placeholder="Section Title" class="w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-400 mb-1">Content</label>
                                        <textarea x-model="section.content" :name="'sections['+index+'][content]'" rows="4" placeholder="Section Content" class="w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none"></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-400 mb-1">Image Alignment</label>
                                        <select x-model="section.image_side" :name="'sections['+index+'][image_side]'" class="w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                                            <option value="right">Image on Right</option>
                                            <option value="left">Image on Left</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 mb-1">Section Image</label>
                                    <div class="relative aspect-video bg-gray-900 rounded-xl border-2 border-dashed border-gray-700 overflow-hidden group/img">
                                        <template x-if="section.image_url">
                                            <img :src="section.image_url" class="w-full h-full object-cover">
                                        </template>
                                        <template x-if="!section.image_url">
                                            <div class="flex flex-col items-center justify-center h-full text-gray-500">
                                                <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <span class="text-[10px] font-black uppercase tracking-widest">No Image</span>
                                            </div>
                                        </template>
                                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover/img:opacity-100 transition-opacity flex items-center justify-center gap-2">
                                            <button type="button" @click="$dispatch('open-media-drawer', { targetField: 'section_image_'+index })" class="px-3 py-1.5 bg-[#D4AF37] text-black text-[10px] font-black rounded-lg uppercase tracking-tighter">Library</button>
                                            <button type="button" @click="section.image_url = ''" class="px-3 py-1.5 bg-red-500 text-white text-[10px] font-black rounded-lg uppercase tracking-tighter">Clear</button>
                                        </div>
                                        <input type="hidden" :name="'sections['+index+'][image_url]'" x-model="section.image_url">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <button type="button" @click="sections.push({title: '', content: '', image_url: '', image_side: 'right'})" class="w-full py-4 border-2 border-dashed border-gray-700 rounded-2xl text-gray-500 font-black uppercase tracking-widest text-xs hover:border-[#D4AF37]/50 hover:text-white transition-all">
                        + Add Content Block
                    </button>
                </div>
            </div>

            <!-- Card Grid Section -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-700 space-y-6">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path></svg>
                    Modular Card Grid (2-Column)
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Section Title</label>
                        <input type="text" name="card_section_title" value="{{ old('card_section_title', $game->card_section_title) }}" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="Experience More Games">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Section Content (Bottom Text)</label>
                        <textarea name="card_section_content" rows="1" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="Join thousands of players today...">{{ old('card_section_content', $game->card_section_content) }}</textarea>
                    </div>
                </div>

                <div x-data="{ 
                    cards: {{ json_encode(old('card_section_cards', $game->card_section_cards ?: [])) }},
                    updateImage(index, url) {
                        this.cards[index].image_url = url;
                    }
                }" @media-selected.window="if($event.detail.field.startsWith('card_image_')) { 
                    const idx = parseInt($event.detail.field.replace('card_image_', ''));
                    updateImage(idx, $event.detail.url);
                }" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <template x-for="(card, index) in cards" :key="index">
                            <div class="bg-gray-800 p-4 rounded-xl border border-gray-700 relative group">
                                <button type="button" @click="cards.splice(index, 1)" class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors shadow-lg z-10">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                                
                                <div class="space-y-4">
                                    <div class="relative aspect-video bg-gray-900 rounded-lg overflow-hidden group/cimg">
                                        <template x-if="card.image_url">
                                            <img :src="card.image_url" class="w-full h-full object-cover">
                                        </template>
                                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover/cimg:opacity-100 transition-opacity flex items-center justify-center gap-2">
                                            <button type="button" @click="$dispatch('open-media-drawer', { targetField: 'card_image_'+index })" class="px-3 py-1.5 bg-[#D4AF37] text-black text-[10px] font-black rounded-lg uppercase tracking-tighter">Library</button>
                                        </div>
                                        <input type="hidden" :name="'card_section_cards['+index+'][image_url]'" x-model="card.image_url">
                                    </div>
                                    <textarea x-model="card.content" :name="'card_section_cards['+index+'][content]'" placeholder="Card Content" rows="2" class="w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-lg text-xs text-white focus:border-yellow-500 outline-none"></textarea>
                                    <div class="grid grid-cols-2 gap-2">
                                        <input type="text" x-model="card.button_label" :name="'card_section_cards['+index+'][button_label]'" placeholder="Button Label" class="px-3 py-2 bg-gray-900 border border-gray-700 rounded-lg text-xs text-white focus:border-yellow-500 outline-none">
                                        <input type="text" x-model="card.button_url" :name="'card_section_cards['+index+'][button_url]'" placeholder="Button URL" class="px-3 py-2 bg-gray-900 border border-gray-700 rounded-lg text-xs text-white focus:border-yellow-500 outline-none">
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <button type="button" @click="cards.push({image_url: '', content: '', button_label: '', button_url: ''})" class="w-full py-3 border-2 border-dashed border-gray-700 rounded-xl text-gray-500 font-bold hover:border-yellow-500/50 hover:text-white transition-all">
                        + Add Grid Card
                    </button>
                </div>
            </div>

            <!-- How To Section -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-700 space-y-6">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    How To Play (Steps)
                </h3>

                <div x-data="{ steps: {{ json_encode(old('how_to', $game->how_to ?: [])) }} }" class="space-y-3">
                    <template x-for="(step, index) in steps" :key="index">
                        <div class="flex gap-4 items-center bg-gray-800 p-3 rounded-xl border border-gray-700">
                            <span class="w-8 h-8 bg-[#D4AF37] text-black font-black rounded-lg flex items-center justify-center text-xs" x-text="index + 1"></span>
                            <input type="text" x-model="steps[index]" :name="'how_to['+index+']'" placeholder="Step description..." class="flex-1 px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                            <button type="button" @click="steps.splice(index, 1)" class="p-2 text-red-500 hover:bg-red-500/10 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </template>
                    <button type="button" @click="steps.push('')" class="w-full py-3 border-2 border-dashed border-gray-700 rounded-xl text-gray-500 font-bold hover:border-yellow-500/50 hover:text-white transition-all text-sm">
                        + Add Step
                    </button>
                </div>
            </div>

            <!-- Testimonials Section -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-700 space-y-6">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Social Proof (Testimonials)
                </h3>

                <div x-data="{ testimonials: {{ json_encode(old('testimonials', $game->testimonials ?: [])) }} }" class="space-y-4">
                    <template x-for="(t, index) in testimonials" :key="index">
                        <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 relative group">
                            <button type="button" @click="testimonials.splice(index, 1)" class="absolute -top-3 -right-3 w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors shadow-lg z-10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <input type="text" x-model="t.author" :name="'testimonials['+index+'][author]'" placeholder="Player Name" class="w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                                    <select x-model="t.rating" :name="'testimonials['+index+'][rating]'" class="w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                                        <option value="5">⭐⭐⭐⭐⭐ (5 Stars)</option>
                                        <option value="4">⭐⭐⭐⭐ (4 Stars)</option>
                                        <option value="3">⭐⭐⭐ (3 Stars)</option>
                                    </select>
                                </div>
                                <textarea x-model="t.content" :name="'testimonials['+index+'][content]'" placeholder="Player feedback..." rows="3" class="w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none"></textarea>
                            </div>
                        </div>
                    </template>
                    <button type="button" @click="testimonials.push({author: '', content: '', rating: 5})" class="w-full py-3 border-2 border-dashed border-gray-700 rounded-xl text-gray-500 font-bold hover:border-yellow-500/50 hover:text-white transition-all text-sm">
                        + Add Testimonial
                    </button>
                </div>
            </div>

            <!-- FAQs Section -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-700 space-y-6">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Frequently Asked Questions
                </h3>
                <div class="bg-gray-800 p-6 rounded-xl border border-gray-700">
                    <x-faq-repeater name="faqs" label="Game FAQs" :data="$game->faqs" />
                </div>
            </div>

            <!-- SEO & Meta -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-700 space-y-6">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    SEO & Meta Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ old('meta_title', $game->meta_title) }}" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="SEO optimized title">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Meta Keywords</label>
                        <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $game->meta_keywords) }}" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="keyword1, keyword2">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-400 mb-2">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="SEO optimized description...">{{ old('meta_description', $game->meta_description) }}</textarea>
                </div>

                <div class="pt-4">
                    <x-schema-repeater name="meta_schema" label="JSON-LD Schema" :data="$game->meta_schema" />
                </div>
            </div>

            <!-- Submit -->
            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 bg-gradient-to-r from-yellow-500 to-purple-500 hover:from-yellow-400 hover:to-purple-400 text-white px-8 py-4 rounded-xl font-bold transition-all shadow-lg">
                    {{ $game->id ? '💾 Update Game' : '✨ Add Game' }}
                </button>
                <a href="{{ route('admin.games.index') }}" class="px-8 py-4 bg-gray-700 hover:bg-gray-600 text-white rounded-xl font-bold transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize CKEditor
    if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.replace('description', {
            height: 300,
            removeButtons: 'PasteFromWord',
            skin: 'moono-lisa', // Use default or specific skin if available
        });
    }

    const fileInput = document.getElementById('thumbnail-upload');
    const previewDiv = document.getElementById('upload-preview');
    const previewImage = document.getElementById('preview-image');
    
    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewDiv.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                previewDiv.classList.add('hidden');
            }
        });
    }
});
</script>
@endpush
@endsection
