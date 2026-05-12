@extends('layouts.dashboard', ['active' => 'categories'])

@section('title', 'Define Classification - 888Realty Admin')

@section('content')
<div class="p-6 md:p-10 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#D4AF37] hover:text-black transition-colors mb-3 group">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Taxonomy
            </a>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">New <span class="text-[#D4AF37]">Category</span></h1>
            <p class="text-gray-500 mt-2 font-medium">Create a new editorial classification for blog assets.</p>
        </div>
    </div>

    <div class="max-w-3xl">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-8">
            @csrf
            
            <div class="bg-white p-8 md:p-12 rounded-[2.5rem] shadow-sm border border-gray-100">
                <div class="space-y-8">
                    <div class="space-y-2">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-1">Classification Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="e.g. Market Insights" 
                            class="w-full h-16 px-6 bg-gray-50 border-2 border-gray-200 focus:border-[#D4AF37] focus:bg-white rounded-2xl outline-none transition-all font-black text-xl text-gray-900" 
                            required onkeyup="generateSlug()">
                        @error('name') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-1">System Slug</label>
                        <div class="relative">
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="market-insights" 
                                class="w-full h-12 px-5 bg-gray-50 border-2 border-gray-200 focus:border-[#D4AF37] focus:bg-white rounded-xl outline-none transition-all font-mono text-sm text-gray-600" required>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 text-[10px] font-black text-gray-300 uppercase tracking-tighter">URL Component</div>
                        </div>
                        @error('slug') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full md:w-auto px-12 py-5 bg-black text-[#D4AF37] font-black uppercase tracking-widest text-[10px] rounded-2xl hover:bg-gray-800 transition-all shadow-xl shadow-black/10 transform active:scale-95">
                            Register Classification
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function generateSlug() {
        const name = document.getElementById('name').value;
        const slug = name.toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('slug').value = slug;
    }
</script>
@endsection
