@extends('layouts.dashboard', ['active' => 'blog'])

@section('title', 'Create Article - Orion Star Admin')

@section('content')
<div class="p-6 md:p-10 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <a href="{{ route('admin.blog.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#D4AF37] hover:text-black transition-colors mb-3 group">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Articles
            </a>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Create <span class="text-[#D4AF37]">New Article</span></h1>
            <p class="text-gray-500 mt-2">Draft and publish high-quality real estate content.</p>
        </div>
    </div>

    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Left Side: Article Content (2/3) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Title & Slug Section -->
                <div class="bg-white p-8 md:p-10 rounded-3xl border border-gray-100 shadow-sm">
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Article Title <span class="text-red-500">*</span></label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="e.g. 5 Pro Tips for Winning Big at Orion Star" 
                                class="w-full h-16 px-6 bg-gray-50 border-2 border-gray-200 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-black text-xl text-gray-900" 
                                required onkeyup="generateSlug()">
                            @error('title') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">URL Slug <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="article-url-slug" 
                                    class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-200 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-mono text-sm text-gray-600" required>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-[10px] font-black text-gray-300 uppercase tracking-tighter">Auto-Generated</div>
                            </div>
                            @error('slug') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- Main Content Editor -->
                <div class="bg-white p-8 md:p-10 rounded-3xl border border-gray-100 shadow-sm">
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Article Content <span class="text-red-500">*</span></label>
                            <textarea name="content" id="content" rows="20" required class="w-full p-5 bg-gray-50 border-2 border-gray-200 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-medium text-gray-900">{{ old('content') }}</textarea>
                            @error('content') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2 pt-4">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Excerpt (Short Summary) <span class="text-red-500">*</span></label>
                            <textarea name="excerpt" rows="3" required placeholder="A brief summary for the blog cards..." 
                                class="w-full p-5 bg-gray-50 border-2 border-gray-200 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-medium text-gray-900 resize-none">{{ old('excerpt') }}</textarea>
                            <div class="flex justify-end"><span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Recommended: 150-200 characters</span></div>
                            @error('excerpt') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- FAQ Section Component -->
                <div class="bg-white p-8 md:p-10 rounded-3xl border border-gray-100 shadow-sm">
                    <x-faq-repeater name="faqs" label="Frequently Asked Questions" />
                </div>
            </div>

            <!-- Right Side: Settings & Metadata (1/3) -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Publish Box -->
                <div class="bg-black text-gray-900 p-8 rounded-3xl shadow-xl shadow-black/10">
                    <h3 class="text-sm font-bold text-[#D4AF37] uppercase tracking-widest mb-6">Publishing Settings</h3>
                    
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</label>
                            <select name="status" class="w-full h-12 px-4 bg-white border-2 border-gray-200 focus:border-[#D4AF37] rounded-xl outline-none transition-all font-bold text-sm text-gray-900">
                                <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }} class="text-black">Save as Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }} class="text-black">Published (Visible)</option>
                                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }} class="text-black">Archived</option>
                            </select>
                        </div>

                        <div class="space-y-2 text-left">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest">Author Display</label>
                            <input type="text" name="author" value="{{ old('author', 'Orion Star VIP Team') }}"
                                class="w-full h-12 px-4 bg-white border-2 border-gray-200 focus:border-yellow-500 rounded-xl outline-none transition-all font-bold text-sm text-gray-900">
                        </div>

                        <div class="pt-4 flex flex-col gap-3">
                            <button type="submit" class="w-full py-4 bg-[#D4AF37] text-black font-black uppercase tracking-widest rounded-2xl hover:bg-[#F4D03F] transition-all transform active:scale-95 shadow-lg shadow-[#D4AF37]/20">
                                Publish Article
                            </button>
                            <a href="{{ route('admin.blog.index') }}" class="w-full py-4 bg-white/5 text-gray-400 text-center font-bold uppercase tracking-widest text-[10px] rounded-2xl hover:bg-white transition-all">
                                Cancel Draft
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm" x-data="{ imageUrl: '' }" @media-selected.window="if($event.detail.field === 'featured_image') { imageUrl = $event.detail.url; $refs.imagePreview.src = $event.detail.url; $refs.previewContainer.classList.remove('hidden'); }">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Featured Media</h3>
                        <button type="button" @click="$dispatch('open-media-drawer', { targetField: 'featured_image' })" class="text-[9px] font-black text-[#D4AF37] uppercase tracking-widest hover:underline">
                            Choose from Library
                        </button>
                    </div>
                    <div class="relative group">
                        <div class="aspect-video bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200 flex flex-col items-center justify-center overflow-hidden transition-all group-hover:border-[#D4AF37]/50">
                            <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Article Cover</span>
                            <input type="file" name="image" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(this)">
                        </div>
                        <div x-ref="previewContainer" class="absolute inset-0 hidden">
                            <img x-ref="imagePreview" id="image-preview" src="#" alt="Preview" class="w-full h-full object-cover rounded-2xl">
                            <button type="button" onclick="removeImage()" class="absolute top-2 right-2 bg-black/50 backdrop-blur-md text-white p-1.5 rounded-full hover:bg-red-500 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                        <input type="hidden" name="image_url" x-model="imageUrl">
                    </div>
                    @error('image') <p class="text-red-500 text-[10px] font-bold mt-2 uppercase text-center">{{ $message }}</p> @enderror
                </div>

                <!-- SEO Box -->
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
                    <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-6 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        SEO Metadata
                    </h3>
                    
                    <div class="space-y-5 text-left">
                        <div class="space-y-1">
                            <label class="block text-[9px] font-black text-gray-400 uppercase tracking-widest">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ old('meta_title') }}" placeholder="SEO Optimized Title" 
                                class="w-full h-10 px-4 bg-gray-50 border border-gray-100 focus:border-[#D4AF37] rounded-lg outline-none transition-all text-xs font-bold text-gray-900">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-[9px] font-black text-gray-400 uppercase tracking-widest">Meta Keywords</label>
                            <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="slots, casino, gaming, strategy" 
                                class="w-full h-10 px-4 bg-gray-50 border border-gray-100 focus:border-[#D4AF37] rounded-lg outline-none transition-all text-xs font-bold text-gray-900">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-[9px] font-black text-gray-400 uppercase tracking-widest">Meta Description</label>
                            <textarea name="meta_description" rows="4" placeholder="Brief SEO description..." 
                                class="w-full p-4 bg-gray-50 border border-gray-100 focus:border-[#D4AF37] rounded-xl outline-none transition-all text-xs font-medium text-gray-900 resize-none">{{ old('meta_description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
    if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.replace('content', {
            height: 500,
            removeButtons: 'PasteFromWord',
            // Professional minimal configuration
        });
    }

    function generateSlug() {
        const title = document.getElementById('title').value;
        const slug = title.toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('slug').value = slug;
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').src = e.target.result;
                document.getElementById('image-preview-container').classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage() {
        document.getElementById('image-preview').src = '#';
        document.getElementById('image-preview-container').classList.add('hidden');
        document.querySelector('input[name="image"]').value = '';
    }
</script>
@endpush
