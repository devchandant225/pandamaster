<div
    x-data="mediaDrawer()"
    x-show="isOpen"
    x-cloak
    @open-media-drawer.window="open($event.detail)"
    @keydown.escape.window="close()"
    @paste.window="handlePaste($event)"
    class="fixed inset-0 z-[100] overflow-hidden"
    aria-labelledby="slide-over-title"
    role="dialog"
    aria-modal="true"
>
    <div class="absolute inset-0 overflow-hidden">
        <!-- Backdrop -->
        <div 
            x-show="isOpen"
            x-transition:enter="ease-in-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in-out duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" 
            @click="close()"
            aria-hidden="true"
        ></div>

        <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
            <!-- Drawer Content -->
            <div 
                x-show="isOpen"
                x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="relative w-screen max-w-md md:max-w-2xl"
            >
                <div class="h-full flex flex-col bg-white shadow-2xl">
                    <!-- Header -->
                    <div class="bg-black px-6 py-6 border-b border-[#D4AF37]/20">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-black text-white uppercase tracking-tighter" id="slide-over-title">
                                Media <span class="text-[#D4AF37]">Drawer</span>
                            </h2>
                            <button @click="close()" class="text-gray-400 hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                        <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mt-2">
                            Select an asset or <span class="text-white italic">Paste (Ctrl+V)</span> to upload
                        </p>
                    </div>

                    <!-- Search & Upload -->
                    <div class="p-6 border-b border-gray-100 bg-gray-50 flex gap-4">
                        <div class="relative flex-1">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input 
                                type="text" 
                                x-model="search" 
                                @input.debounce.300ms="fetchMedia()"
                                placeholder="Search assets..." 
                                class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:border-[#D4AF37] outline-none"
                            >
                        </div>
                        <button @click="$refs.drawerFileInput.click()" class="px-4 py-2 bg-black text-[#D4AF37] text-xs font-black rounded-xl hover:bg-gray-900 transition-all uppercase tracking-widest border border-[#D4AF37]/30">
                            Upload
                        </button>
                        <input type="file" x-ref="drawerFileInput" class="hidden" @change="uploadFile($event)">
                    </div>

                    <!-- Media Grid -->
                    <div class="flex-1 overflow-y-auto p-6 custom-scrollbar">
                        <template x-if="loading">
                            <div class="flex flex-col items-center justify-center h-64 space-y-4">
                                <div class="w-12 h-12 border-4 border-[#D4AF37]/20 border-t-[#D4AF37] rounded-full animate-spin"></div>
                                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Loading assets...</p>
                            </div>
                        </template>

                        <template x-if="!loading && media.length === 0">
                            <div class="text-center py-20">
                                <div class="text-6xl mb-4 opacity-20">🖼️</div>
                                <p class="text-gray-400 font-bold">No assets found</p>
                            </div>
                        </template>

                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                            <template x-for="item in media" :key="item.id">
                                <div 
                                    @click="selectMedia(item)"
                                    class="group relative aspect-square bg-gray-50 rounded-xl border border-gray-100 overflow-hidden cursor-pointer hover:border-[#D4AF37] transition-all"
                                >
                                    <img 
                                        :src="item.url" 
                                        :alt="item.original_name"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    >
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <span class="bg-white text-black text-[10px] font-black px-3 py-1.5 rounded-full uppercase tracking-tighter">Select</span>
                                    </div>
                                    <div class="absolute bottom-0 inset-x-0 bg-black/60 p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <p class="text-[8px] font-bold text-white truncate" x-text="item.original_name"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="p-6 bg-gray-50 border-t border-gray-100">
                        <button @click="close()" class="w-full py-4 bg-white border border-gray-200 text-gray-600 font-black rounded-2xl hover:bg-gray-100 transition-all uppercase tracking-widest text-xs">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Progress Overlay -->
    <div x-show="uploading" x-cloak class="fixed inset-0 z-[110] flex items-center justify-center bg-black/80 backdrop-blur-md">
        <div class="text-center">
            <div class="w-20 h-20 border-8 border-[#D4AF37]/20 border-t-[#D4AF37] rounded-full animate-spin mb-6 mx-auto"></div>
            <h3 class="text-2xl font-black text-white uppercase tracking-tighter">Uploading...</h3>
            <p class="text-gray-400 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]" x-text="uploadProgress"></p>
        </div>
    </div>
</div>

<script>
    function mediaDrawer() {
        return {
            isOpen: false,
            loading: false,
            uploading: false,
            uploadProgress: 'Starting...',
            media: [],
            search: '',
            targetField: null,

            open(detail = {}) {
                this.isOpen = true;
                this.targetField = detail.targetField || null;
                this.fetchMedia();
                window.mediaDrawerOpen = true;
            },

            close() {
                this.isOpen = false;
                window.mediaDrawerOpen = false;
            },

            async fetchMedia() {
                this.loading = true;
                try {
                    const url = new URL('{{ route("admin.media.index") }}');
                    if (this.search) url.searchParams.append('search', this.search);
                    
                    const response = await fetch(url, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    });
                    this.media = await response.json();
                } catch (error) {
                    console.error('Error fetching media:', error);
                } finally {
                    this.loading = false;
                }
            },

            selectMedia(item) {
                if (this.targetField) {
                    window.dispatchEvent(new CustomEvent('media-selected', {
                        detail: {
                            field: this.targetField,
                            url: item.url,
                            media: item
                        }
                    }));
                }
                this.close();
            },

            async handlePaste(e) {
                if (!this.isOpen) return;
                
                const items = (e.clipboardData || e.originalEvent.clipboardData).items;
                for (let index in items) {
                    const item = items[index];
                    if (item.kind === 'file') {
                        const blob = item.getAsFile();
                        await this.uploadFileDirectly(blob);
                    }
                }
            },

            async uploadFile(event) {
                const file = event.target.files[0];
                if (!file) return;
                await this.uploadFileDirectly(file);
            },

            async uploadFileDirectly(file) {
                this.uploading = true;
                this.uploadProgress = 'Preparing ' + file.name + '...';

                const formData = new FormData();
                formData.append('file', file);

                try {
                    this.uploadProgress = 'Uploading ' + file.name + '...';
                    const response = await fetch('{{ route("admin.media.store") }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (response.ok) {
                        this.uploadProgress = 'Upload Complete!';
                        const newMedia = await response.json();
                        this.media.unshift(newMedia);
                        setTimeout(() => {
                            this.uploading = false;
                            this.fetchMedia(); // Refresh list to be sure
                        }, 1000);
                    } else {
                        const errorData = await response.json().catch(() => ({}));
                        console.error('Upload failed:', errorData);
                        alert('Upload failed: ' + (errorData.message || 'Server error (' + response.status + ')'));
                        this.uploading = false;
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('An error occurred during upload: ' + error.message);
                    this.uploading = false;
                }
            }
        }
    }
</script>

<style>
[x-cloak] { display: none !important; }
.custom-scrollbar::-webkit-scrollbar { width: 4px; }
.custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: #D4AF3740; border-radius: 10px; }
</style>
