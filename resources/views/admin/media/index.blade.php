@extends('layouts.dashboard', ['active' => 'media'])

@section('title', 'Media Library - Panda Master Admin')

@section('content')
<div class="p-6 md:p-10 bg-gray-50 min-h-screen" x-data="mediaLibrary()">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Media <span class="text-[#D4AF37]">Library</span></h1>
            <p class="text-gray-500 mt-2">Manage your images and assets for blog posts and games.</p>
        </div>
        <div class="flex items-center gap-4">
            <button @click="$refs.fileInput.click()" class="inline-flex items-center gap-2 px-6 py-3 bg-[#D4AF37] text-black font-black rounded-xl hover:bg-[#F4D03F] transition-all shadow-lg shadow-[#D4AF37]/20 uppercase tracking-widest text-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                Upload New
            </button>
            <input type="file" x-ref="fileInput" class="hidden" @change="uploadFile($event)">
        </div>
    </div>

    <!-- Stats & Filters -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Total Assets</p>
            <p class="text-2xl font-black text-gray-900">{{ $media->total() }}</p>
        </div>
        <div class="md:col-span-3 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <form action="{{ route('admin.media.index') }}" method="GET">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by filename..." class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:border-[#D4AF37] outline-none transition-colors">
                </form>
            </div>
        </div>
    </div>

    <!-- Media Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">
        @foreach($media as $item)
            <div class="group relative bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:border-[#D4AF37] transition-all">
                <div class="aspect-square bg-gray-50 flex items-center justify-center overflow-hidden">
                    @if(Str::startsWith($item->mime_type, 'image/'))
                        <img src="{{ $item->url }}" alt="{{ $item->original_name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    @endif
                </div>
                
                <div class="p-3">
                    <p class="text-[10px] font-bold text-gray-900 truncate mb-1" title="{{ $item->original_name }}">{{ $item->original_name }}</p>
                    <p class="text-[8px] font-bold text-gray-400 uppercase tracking-tighter">{{ $item->human_size }} • {{ strtoupper(Str::afterLast($item->mime_type, '/')) }}</p>
                </div>

                <!-- Hover Actions -->
                <div class="absolute inset-0 bg-black/60 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-3">
                    <button @click="copyUrl('{{ $item->url }}')" class="w-10 h-10 bg-white text-black rounded-full flex items-center justify-center hover:bg-[#D4AF37] transition-colors shadow-lg" title="Copy URL">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                    </button>
                    <form action="{{ route('admin.media.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this asset permanently?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-10 h-10 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors shadow-lg" title="Delete">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-10">
        {{ $media->links() }}
    </div>

    <!-- Toast -->
    <div x-show="toast.show" x-transition x-cloak class="fixed bottom-6 right-6 z-[100] bg-black text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3 border border-[#D4AF37]/30">
        <div class="w-8 h-8 bg-[#D4AF37] rounded-full flex items-center justify-center text-black">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <p class="font-black uppercase tracking-widest text-[10px]" x-text="toast.message"></p>
    </div>
</div>

<script>
    function mediaLibrary() {
        return {
            toast: {
                show: false,
                message: ''
            },
            showToast(message) {
                this.toast.message = message;
                this.toast.show = true;
                setTimeout(() => this.toast.show = false, 3000);
            },
            copyUrl(url) {
                navigator.clipboard.writeText(url).then(() => {
                    this.showToast('URL Copied to Clipboard');
                });
            },
            async uploadFile(event) {
                const file = event.target.files[0];
                if (!file) return;

                const formData = new FormData();
                formData.append('file', file);

                try {
                    const response = await fetch('{{ route("admin.media.store") }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        }
                    });

                    if (response.ok) {
                        window.location.reload();
                    } else {
                        alert('Upload failed');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('An error occurred during upload');
                }
            }
        }
    }
</script>
@endsection
