@extends('layouts.dashboard', ['active' => 'meta-tags'])

@section('title', 'Create Meta Tag - 888Realty')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div>
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Create Meta Tag</h1>
                <p class="text-gray-500 mt-1">Add SEO meta tags for a page</p>
            </div>
            <a href="{{ route('admin.meta-tags.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border-2 border-gray-300 text-gray-700 font-medium hover:bg-gray-50 hover:border-gray-400 transition-all">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Meta Tags</span>
            </a>
        </div>

        <div class="bg-white border-2 border-gray-200 rounded-2xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-[#D4AF37] to-[#F4D03F] px-8 py-6">
                <h2 class="text-xl font-bold text-black flex items-center gap-3">
                    <i class="fas fa-plus-circle"></i>
                    <span>New SEO Meta Information</span>
                </h2>
            </div>

            <div class="p-8">
                <form action="{{ route('admin.meta-tags.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 gap-8">
                        <!-- Page Type -->
                        <div class="group">
                            <label for="page_type" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                                <i class="fas fa-file text-[#D4AF37]"></i>
                                <span>Page Type <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative">
                                <select name="page_type" id="page_type" class="w-full px-4 py-3.5 pr-10 text-gray-800 bg-white border-2 border-gray-300 rounded-xl focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition-all appearance-none cursor-pointer @error('page_type') border-red-400 @enderror" required>
                                    <option value="">Select Page Type</option>
                                    @foreach($pageTypes as $value => $label)
                                        @if(!in_array($value, $usedPageTypes))
                                            <option value="{{ $value }}" {{ old('page_type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500">
                                    <i class="fas fa-chevron-down text-sm"></i>
                                </div>
                            </div>
                            @error('page_type')
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            @if(count($usedPageTypes) > 0)
                                <p class="mt-2 text-sm text-gray-500 flex items-center gap-2">
                                    <i class="fas fa-info-circle text-[#D4AF37]"></i>
                                    <span>Note: Some page types are already configured</span>
                                </p>
                            @endif
                        </div>

                        <!-- Title -->
                        <div class="group">
                            <label for="title" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                                <i class="fas fa-heading text-[#D4AF37]"></i>
                                <span>Meta Title <span class="text-red-500">*</span></span>
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" maxlength="255" 
                                class="w-full px-4 py-3.5 text-gray-800 bg-white border-2 border-gray-300 rounded-xl focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition-all placeholder-gray-400 @error('title') border-red-400 @enderror" 
                                placeholder="Enter meta title..." required>
                            <div class="flex items-center justify-between mt-2">
                                @error('title')
                                    <p class="text-sm text-red-600 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <p class="text-sm text-gray-500 ml-auto">
                                    <span class="font-medium text-[#D4AF37]"><span id="title-count">0</span></span> / 60 chars (recommended)
                                </p>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="group">
                            <label for="desc" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                                <i class="fas fa-align-left text-[#D4AF37]"></i>
                                <span>Meta Description</span>
                            </label>
                            <textarea name="desc" id="desc" rows="4" maxlength="500" 
                                class="w-full px-4 py-3.5 text-gray-800 bg-white border-2 border-gray-300 rounded-xl focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition-all placeholder-gray-400 resize-none @error('desc') border-red-400 @enderror" 
                                placeholder="Enter meta description...">{{ old('desc') }}</textarea>
                            <div class="flex items-center justify-between mt-2">
                                @error('desc')
                                    <p class="text-sm text-red-600 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <p class="text-sm text-gray-500 ml-auto">
                                    <span class="font-medium text-[#D4AF37]"><span id="desc-count">0</span></span> / 160 chars (recommended)
                                </p>
                            </div>
                        </div>

                        <!-- Keywords -->
                        <div class="group">
                            <label for="keyword" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                                <i class="fas fa-key text-[#D4AF37]"></i>
                                <span>Meta Keywords</span>
                            </label>
                            <textarea name="keyword" id="keyword" rows="3" maxlength="1000" 
                                class="w-full px-4 py-3.5 text-gray-800 bg-white border-2 border-gray-300 rounded-xl focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition-all placeholder-gray-400 resize-none @error('keyword') border-red-400 @enderror" 
                                placeholder="keyword1, keyword2, keyword3">{{ old('keyword') }}</textarea>
                            @error('keyword')
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="mt-2 text-sm text-gray-500 flex items-center gap-2">
                                <i class="fas fa-info-circle text-[#D4AF37]"></i>
                                <span>Separate keywords with commas</span>
                            </p>
                        </div>

                        <!-- Image -->
                        <div class="group">
                            <label for="image" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                                <i class="fas fa-image text-[#D4AF37]"></i>
                                <span>Meta Image (Open Graph)</span>
                            </label>
                            <div class="relative">
                                <input type="file" name="image" id="image" accept="image/*" 
                                    class="block w-full px-4 py-3.5 text-gray-700 bg-white border-2 border-gray-300 rounded-xl focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition-all file:mr-4 file:py-3 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-gradient-to-r file:from-[#D4AF37] file:to-[#F4D03F] file:text-black hover:file:shadow-lg @error('image') border-red-400 @enderror">
                            </div>
                            @error('image')
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="mt-2 text-sm text-gray-500 flex items-center gap-2">
                                <i class="fas fa-info-circle text-[#D4AF37]"></i>
                                <span>Recommended: 1200x630px, max 2MB</span>
                            </p>
                        </div>

                        <!-- Schema JSON-LD (Head) -->
                        <x-schema-repeater name="schema_head" label="Schema JSON-LD (Head)" />

                        <!-- Schema JSON-LD (Body) -->
                        <x-schema-repeater name="schema_body" label="Schema JSON-LD (Body)" />

                        <!-- Status -->
                        <div class="group pt-6 border-t-2 border-gray-200">
                            <label class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                                <i class="fas fa-toggle-on text-[#D4AF37]"></i>
                                <span>Status</span>
                            </label>
                            <div class="flex items-center gap-4">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="sr-only peer">
                                    <div class="w-14 h-8 bg-gray-300 peer-focus:ring-2 peer-focus:ring-[#D4AF37] peer-focus:ring-offset-2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-2 after:border-gray-300 after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-[#D4AF37] peer-checked:to-[#F4D03F]"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">
                                        <span class="peer-checked:text-[#D4AF37] font-bold">Active</span> / Inactive
                                    </span>
                                </label>
                            </div>
                            <p class="mt-2 text-sm text-gray-500 flex items-center gap-2">
                                <i class="fas fa-info-circle text-[#D4AF37]"></i>
                                <span>Enable this meta tag for the selected page</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-10 pt-8 border-t-2 border-gray-200">
                        <a href="{{ route('admin.meta-tags.index') }}" class="px-6 py-3.5 border-2 border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all">
                            Cancel
                        </a>
                        <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-[#D4AF37] to-[#F4D03F] text-black font-bold rounded-xl hover:shadow-lg hover:shadow-[#D4AF37]/30 focus:ring-2 focus:ring-[#D4AF37] focus:ring-offset-2 transition-all transform hover:scale-105">
                            <i class="fas fa-save mr-2"></i>
                            Create Meta Tag
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Character counters
function updateCharCount(inputId, countId) {
    const input = document.getElementById(inputId);
    const counter = document.getElementById(countId);
    if (input && counter) {
        counter.textContent = input.value.length;
    }
}

document.getElementById('title').addEventListener('input', function() {
    updateCharCount('title', 'title-count');
});

document.getElementById('desc').addEventListener('input', function() {
    updateCharCount('desc', 'desc-count');
});

// JSON validation for schema fields
['schema_head', 'schema_body'].forEach(id => {
    const element = document.getElementById(id);
    if (element) {
        element.addEventListener('blur', function() {
            const value = this.value.trim();
            if (value) {
                try {
                    JSON.parse(value);
                    this.classList.remove('border-red-400');
                    this.classList.add('border-green-400');
                } catch (e) {
                    this.classList.remove('border-green-400');
                    this.classList.add('border-red-400');
                }
            } else {
                this.classList.remove('border-red-400', 'border-green-400');
            }
        });
    }
});
</script>
@endsection
