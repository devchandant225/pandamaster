@extends('layouts.dashboard', ['active' => 'about-page'])

@section('title', 'Manage About Page')

@section('content')
<div class="p-6 md:p-10 bg-gray-900 min-h-screen">
    <div class="max-w-5xl mx-auto">
        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-3xl font-extrabold text-white">
                ℹ️ Manage About Us Page
            </h1>
            <p class="text-gray-400 mt-2">Control the content of your public About Us page</p>
        </div>

        <form action="{{ route('admin.about.update') }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Main Content Section -->
            <div class="bg-gray-800 rounded-3xl border border-gray-700 p-8 shadow-2xl">
                <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Hero & Content
                </h3>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Page Title</label>
                        <input type="text" name="title" value="{{ old('title', $about->title) }}" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="e.g. About Orion Stars Official">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Detailed Description (CKEditor)</label>
                        <textarea name="description" id="description" rows="15" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none">{{ old('description', $about->description) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div x-data="{ imageUrl: '{{ old('image_url', $about->image_url) }}' }">
                            <label class="block text-sm font-bold text-gray-400 mb-2">Featured Image URL</label>
                            <div class="flex gap-2">
                                <input type="text" name="image_url" x-model="imageUrl" class="flex-1 px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="https://example.com/image.jpg">
                                <button type="button" @click="$dispatch('open-media-drawer', { targetField: 'about_image' })" class="px-4 bg-yellow-500 text-black font-bold rounded-xl hover:bg-yellow-400 transition-colors">Library</button>
                            </div>
                            <input type="hidden" id="about_image_input" x-model="imageUrl" @change="imageUrl = $el.value">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-400 mb-2">Image Alt Text</label>
                            <input type="text" name="image_alt" value="{{ old('image_alt', $about->image_alt) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="SEO description for image">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-700 space-y-6">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    Achievement Stats
                </h3>

                <div x-data="{ stats: {{ json_encode(old('stats', $about->stats ?: [])) }} }" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <template x-for="(stat, index) in stats" :key="index">
                            <div class="bg-gray-800 p-4 rounded-xl border border-gray-700 relative">
                                <button type="button" @click="stats.splice(index, 1)" class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors shadow-lg z-10">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                                <div class="space-y-3">
                                    <input type="text" x-model="stat.value" :name="'stats['+index+'][value]'" placeholder="Value (e.g. 50M+)" class="w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-lg text-xs text-white focus:border-yellow-500 outline-none">
                                    <input type="text" x-model="stat.label" :name="'stats['+index+'][label]'" placeholder="Label (e.g. Players)" class="w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-lg text-xs text-white focus:border-yellow-500 outline-none">
                                    <input type="text" x-model="stat.icon" :name="'stats['+index+'][icon]'" placeholder="Icon (e.g. 👤)" class="w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-lg text-xs text-white focus:border-yellow-500 outline-none">
                                </div>
                            </div>
                        </template>
                    </div>
                    <button type="button" @click="stats.push({value: '', label: '', icon: '✨'})" class="w-full py-3 border-2 border-dashed border-gray-700 rounded-xl text-gray-500 font-bold hover:border-yellow-500/50 hover:text-white transition-all text-sm">
                        + Add Stat Card
                    </button>
                </div>
            </div>

            <!-- Call to Action Section -->
            <div class="bg-gray-800 rounded-3xl border border-gray-700 p-8 shadow-2xl">
                <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Action Button (CTA)
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Button Label</label>
                        <input type="text" name="cta_label" value="{{ old('cta_label', $about->cta_label) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="e.g. Join the VIP Club">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Button URL</label>
                        <input type="text" name="cta_url" value="{{ old('cta_url', $about->cta_url) }}" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-white focus:border-yellow-500 focus:outline-none" placeholder="e.g. https://orionstar.com/register">
                    </div>
                </div>
            </div>

            <!-- FAQs Section -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-700 space-y-6">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Frequently Asked Questions
                </h3>
                
                <div x-data="{ faqs: {{ json_encode(old('faqs', $about->faqs ?: [])) }} }" class="space-y-4">
                    <template x-for="(faq, index) in faqs" :key="index">
                        <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 relative group">
                            <button type="button" @click="faqs.splice(index, 1)" class="absolute -top-3 -right-3 w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors shadow-lg z-10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                            <div class="space-y-4">
                                <input type="text" x-model="faq.question" :name="'faqs['+index+'][question]'" placeholder="Question" class="w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none">
                                <textarea x-model="faq.answer" :name="'faqs['+index+'][answer]'" placeholder="Answer" rows="3" class="w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg text-sm text-white focus:border-yellow-500 outline-none"></textarea>
                            </div>
                        </div>
                    </template>
                    <button type="button" @click="faqs.push({question: '', answer: ''})" class="w-full py-3 border-2 border-dashed border-gray-700 rounded-xl text-gray-500 font-bold hover:border-yellow-500/50 hover:text-white transition-all text-sm">
                        + Add FAQ Item
                    </button>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-6">
                <button type="submit" class="w-full bg-gradient-to-r from-yellow-500 to-yellow-400 hover:from-yellow-400 hover:to-yellow-300 text-black px-8 py-5 rounded-2xl font-black uppercase tracking-widest transition-all shadow-xl shadow-yellow-500/20 text-lg">
                    💾 Save About Page Content
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof CKEDITOR !== 'undefined') {
            CKEDITOR.replace('description', {
                height: 500,
                removeButtons: 'PasteFromWord',
            });
        }
    });

    window.addEventListener('media-selected', function(e) {
        if(e.detail.field === 'about_image') {
            document.getElementById('about_image_input').value = e.detail.url;
            document.getElementById('about_image_input').dispatchEvent(new Event('change'));
        }
    });
</script>
@endpush
@endsection
