<div 
    x-data="{ isVisible: false }" 
    @scroll.window="isVisible = window.scrollY > 300"
    x-show="isVisible"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="translate-y-full"
    x-transition:enter-end="translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="translate-y-0"
    x-transition:leave-end="translate-y-full"
    class="md:hidden fixed bottom-0 left-0 right-0 p-4 bg-black shadow-lg border-t border-[#D4AF37]/30 z-50"
    style="display: none;"
>
    <a
        href="{{ route('contact') }}"
        class="flex items-center justify-center gap-2 w-full bg-[#D4AF37] text-black text-center py-3.5 rounded-lg font-bold hover:bg-[#F4D03F] transition-colors"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
        Get Matched Now
    </a>
</div>
