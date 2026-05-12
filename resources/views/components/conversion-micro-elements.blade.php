@props([
    'propertyName' => null,
    'propertyPrice' => null,
    'showingCount' => 5,
    'lastViewedMinutesAgo' => 15
])

<!-- Sticky Unlock Bar -->
<div class="fixed bottom-0 left-0 right-0 z-40 bg-black/90 backdrop-blur-md border-t border-[#D4AF37]/20 p-4 lg:hidden">
    <div class="flex items-center justify-between gap-4 max-w-7xl mx-auto">
        <div class="text-white">
            <div class="text-xs text-gray-400 truncate">{{ $propertyName ?? 'Property' }}</div>
            <div class="text-lg font-bold text-[#D4AF37]">${{ number_format($propertyPrice ?? 0) }}</div>
        </div>
        <a
            href="#contact-form"
            class="bg-[#D4AF37] text-black px-6 py-3 rounded-xl font-bold hover:bg-[#F4D03F] transition-colors whitespace-nowrap"
        >
            Request Info
        </a>
    </div>
</div>

<!-- Floating WhatsApp Button -->
<a
    href="https://wa.me/16045551234"
    target="_blank"
    class="fixed bottom-24 right-6 z-50 bg-green-500 text-white p-4 rounded-full shadow-2xl hover:bg-green-600 transition-all hover:scale-110 animate-bounce"
    title="Chat on WhatsApp"
>
    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
    </svg>
</a>

<!-- Urgency Indicator -->
<div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-r-xl">
    <div class="flex items-start gap-3">
        <svg class="w-6 h-6 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div>
            <h4 class="font-bold text-blue-900">High Demand Property</h4>
            <p class="text-sm text-blue-700 mt-1">
                <span class="font-semibold">{{ $showingCount }} showings</span> scheduled this week. 
                This property was viewed <span class="font-semibold">{{ $lastViewedMinutesAgo }} minutes ago</span>.
            </p>
        </div>
    </div>
</div>

<!-- Trust Badges -->
<div class="grid grid-cols-3 gap-4 mb-8">
    <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 text-center">
        <div class="w-10 h-10 bg-[#D4AF37]/10 text-[#D4AF37] rounded-lg flex items-center justify-center mx-auto mb-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 2-2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div class="text-xs font-bold text-gray-900">Verified Listing</div>
        <div class="text-xs text-gray-500 mt-0.5">MLS® Approved</div>
    </div>

    <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 text-center">
        <div class="w-10 h-10 bg-[#D4AF37]/10 text-[#D4AF37] rounded-lg flex items-center justify-center mx-auto mb-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div class="text-xs font-bold text-gray-900">Quick Response</div>
        <div class="text-xs text-gray-500 mt-0.5">Within 1 hour</div>
    </div>

    <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 text-center">
        <div class="w-10 h-10 bg-[#D4AF37]/10 text-[#D4AF37] rounded-lg flex items-center justify-center mx-auto mb-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 2-2m5.625-4.5a2.25 2.25 0 00-2.25-2.25h-1.5l-.327-1.308a2.25 2.25 0 00-2.183-1.692H10.5c-1.036 0-1.935.71-2.183 1.692L7.994 4.5h-1.5a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 006.494 19.5h10.5a2.25 2.25 0 002.25-2.25V7.5z"></path>
            </svg>
        </div>
        <div class="text-xs font-bold text-gray-900">Expert Agent</div>
        <div class="text-xs text-gray-500 mt-0.5">Top 1% Producer</div>
    </div>
</div>

<!-- Exit Intent Popup (requires JS to trigger) -->
<div
    x-data="{ show: false }"
    x-show="show"
    @exit-intent.window="show = true"
    class="fixed inset-0 z-[100] flex items-center justify-center p-4"
    style="display: none;"
>
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black/70 backdrop-blur-sm" x-show="show" x-transition.opacity></div>

    <!-- Modal -->
    <div
        class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-8"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
    >
        <!-- Close Button -->
        <button @click="show = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Content -->
        <div class="text-center">
            <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <h3 class="text-2xl font-bold mb-2">Wait! Don't Miss Out</h3>
            <p class="text-gray-600 mb-6">
                This property is in high demand. Get instant updates on price changes and new showings.
            </p>

            <form action="{{ url('/contact') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="intent" value="property_alert">
                <input type="hidden" name="property_id" value="{{ $propertyPrice ? '1' : null }}">

                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    class="w-full h-12 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] rounded-xl px-4 outline-none transition-all"
                    required
                />

                <button
                    type="submit"
                    class="w-full bg-[#D4AF37] text-black hover:bg-[#F4D03F] h-12 font-bold rounded-xl transition-all"
                >
                    Notify Me
                </button>
            </form>

            <p class="text-xs text-gray-500 mt-4">
                No spam. Unsubscribe anytime.
            </p>
        </div>
    </div>
</div>
