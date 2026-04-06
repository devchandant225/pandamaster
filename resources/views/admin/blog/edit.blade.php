@extends('layouts.dashboard', ['active' => 'blog'])

@section('title', 'Edit Article - OrionstarBet Admin')

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
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Edit <span class="text-[#D4AF37]">Article</span></h1>
            <p class="text-gray-500 mt-2 font-medium">Updating: <span class="text-gray-900 font-bold">{{ $post->title }}</span></p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="px-6 py-3 bg-white border border-gray-200 text-gray-600 font-bold rounded-xl hover:bg-black hover:text-gray-900 transition-all shadow-sm">
                Preview Live
            </a>
        </div>
    </div>

    <form action="{{ route('admin.blog.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Left Side: Article Content (2/3) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Title & Slug Section -->
                <div class="bg-white p-8 md:p-10 rounded-3xl border border-gray-100 shadow-sm">
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Article Title <span class="text-red-500">*</span></label>
                            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" placeholder="e.g. 5 Tips for First-Time Home Buyers in Vancouver" 
                                class="w-full h-16 px-6 bg-gray-50 border-2 border-gray-200 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-black text-xl text-gray-900" 
                                required onkeyup="generateSlug()">
                            @error('title') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">URL Slug <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" placeholder="article-url-slug" 
                                    class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-200 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-mono text-sm text-gray-600" required>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-[10px] font-black text-gray-300 uppercase tracking-tighter">SEO Link</div>
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
                            <textarea name="content" id="content" rows="20" required class="w-full p-5 bg-gray-50 border-2 border-gray-200 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-medium text-gray-900">{{ old('content', $post->content) }}</textarea>
                            @error('content') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2 pt-4">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Excerpt (Short Summary) <span class="text-red-500">*</span></label>
                            <textarea name="excerpt" rows="3" required placeholder="A brief summary for the blog cards..." 
                                class="w-full p-5 bg-gray-50 border-2 border-gray-200 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-medium text-gray-900 resize-none">{{ old('excerpt', $post->excerpt) }}</textarea>
                            <div class="flex justify-end"><span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Displays on home & listings page</span></div>
                            @error('excerpt') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- FAQ Section Component -->
                <div class="bg-white p-8 md:p-10 rounded-3xl border border-gray-100 shadow-sm">
                    <x-faq-repeater name="faqs" label="Frequently Asked Questions" :data="$post->faqs->map(fn($faq) => ['question' => $faq->question, 'answer' => $faq->answer])->toArray()" />
                </div>
            </div>

            <!-- Right Side: Settings & Metadata (1/3) -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Publish Box -->
                <div class="bg-black text-gray-900 p-8 rounded-3xl shadow-xl shadow-black/10">
                    <h3 class="text-sm font-bold text-[#D4AF37] uppercase tracking-widest mb-6 text-center">Update Settings</h3>
                    
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest">Article Status</label>
                            <select name="status" class="w-full h-12 px-4 bg-white border-2 border-gray-200 focus:border-[#D4AF37] rounded-xl outline-none transition-all font-bold text-sm text-gray-900">
                                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }} class="text-black">Draft Mode</option>
                                <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }} class="text-black">Published & Public</option>
                                <option value="archived" {{ old('status', $post->status) == 'archived' ? 'selected' : '' }} class="text-black">Archived</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest">Category</label>
                            <select name="category_id" class="w-full h-12 px-4 bg-white border-2 border-gray-200 focus:border-[#D4AF37] rounded-xl outline-none transition-all font-bold text-sm text-gray-900">
                                <option value="" class="text-black text-gray-400">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }} class="text-black">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest">Author Display</label>
                            <input type="text" name="author" value="{{ old('author', $post->author) }}" 
                                class="w-full h-12 px-4 bg-white border-2 border-gray-200 focus:border-[#D4AF37] rounded-xl outline-none transition-all font-bold text-sm text-gray-900">
                        </div>

                        <div class="pt-4 flex flex-col gap-3">
                            <button type="submit" class="w-full py-4 bg-[#D4AF37] text-black font-black uppercase tracking-widest rounded-2xl hover:bg-[#F4D03F] transition-all transform active:scale-95 shadow-lg shadow-[#D4AF37]/20">
                                Save Changes
                            </button>
                            <a href="{{ route('admin.blog.index') }}" class="w-full py-4 bg-white/5 text-gray-400 text-center font-bold uppercase tracking-widest text-[10px] rounded-2xl hover:bg-white transition-all">
                                Cancel Updates
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
                    <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Featured Media</h3>
                    <div class="relative group">
                        <div class="aspect-video bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200 flex flex-col items-center justify-center overflow-hidden transition-all group-hover:border-[#D4AF37]/50">
                            @if($post->image_url)
                                <img id="image-preview" src="{{ $post->image_url }}" alt="Current image" class="w-full h-full object-cover">
                            @else
                                <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Article Cover</span>
                            @endif
                            <input type="file" name="image" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(this)">
                        </div>
                        <div id="new-image-indicator" class="absolute -top-2 -right-2 bg-[#D4AF37] text-black text-[9px] font-black px-2 py-1 rounded-full shadow-lg hidden uppercase tracking-tighter">New Image Selected</div>
                    </div>
                    <p class="text-[9px] text-gray-400 mt-4 leading-relaxed uppercase font-bold text-center italic text-left">Keep empty to retain current image. Recommended: 1200x800px.</p>
                    @error('image') <p class="text-red-500 text-[10px] font-bold mt-2 uppercase text-center">{{ $message }}</p> @enderror
                </div>

                <!-- SEO Box -->
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
                    <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-6 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        SEO & Meta
                    </h3>
                    
                    <div class="space-y-5">
                        <div class="space-y-1">
                            <label class="block text-[9px] font-black text-gray-400 uppercase tracking-widest">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}" placeholder="SEO Optimized Title" 
                                class="w-full h-10 px-4 bg-gray-50 border border-gray-100 focus:border-[#D4AF37] rounded-lg outline-none transition-all text-xs font-bold text-gray-900">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-[9px] font-black text-gray-400 uppercase tracking-widest">Meta Keywords</label>
                            <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $post->meta_keywords) }}" placeholder="vancouver, real estate, matching" 
                                class="w-full h-10 px-4 bg-gray-50 border border-gray-100 focus:border-[#D4AF37] rounded-lg outline-none transition-all text-xs font-bold text-gray-900">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-[9px] font-black text-gray-400 uppercase tracking-widest">Meta Description</label>
                            <textarea name="meta_description" rows="4" placeholder="Brief SEO description..." 
                                class="w-full p-4 bg-gray-50 border border-gray-100 focus:border-[#D4AF37] rounded-xl outline-none transition-all text-xs font-medium text-gray-900 resize-none">{{ old('meta_description', $post->meta_description) }}</textarea>
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
        });
    }

    function generateSlug() {
        // Only auto-generate if the slug field is empty or matching the old title
        // For editing, usually we don't want to break existing URLs unless intended
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').src = e.target.result;
                document.getElementById('new-image-indicator').classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
