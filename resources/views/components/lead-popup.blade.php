@props([
    'title' => 'Get Exclusive Access',
    'subtitle' => 'Connect with Vancouver\'s top realtors and unlock off-market listings',
    'triggerText' => 'Get Free Consultation',
    'route' => route('contact.submit')
])

<div x-data="{ 
        isOpen: false,
        submitted: false,
        formData: {
            name: '',
            email: '',
            phone: ''
        },
        openModal() {
            this.isOpen = true;
            document.body.style.overflow = 'hidden';
        },
        closeModal() {
            this.isOpen = false;
            document.body.style.overflow = '';
            this.submitted = false;
            this.formData = { name: '', email: '', phone: '' };
        },
        submitForm() {
            // Simple validation
            if (!this.formData.name || !this.formData.email || !this.formData.phone) {
                alert('Please fill in all fields');
                return;
            }
            this.submitted = true;
            // Form will submit normally
        }
    }"
    x-init="
        $watch('isOpen', value => {
            if (value) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
        // Timed Popup (after 5 seconds for first-time visitors)
        setTimeout(() => {
            if (!submitted && !localStorage.getItem('popupShown')) {
                openModal();
                localStorage.setItem('popupShown', 'true');
            }
        }, 5000);
    "
    @open-lead-popup.window="openModal()"
    class="relative"
>
    <!-- Modal Backdrop -->
    <div
        x-show="isOpen"
        x-cloak
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm"
        @click="closeModal()"
    >
        <!-- Modal Content -->
        <div
            x-show="isOpen"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4"
            class="bg-white rounded-3xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto relative"
            @click.stop
        >
            <!-- Close Button -->
            <button
                type="button"
                @click="closeModal()"
                class="absolute top-4 right-4 z-50 p-2.5 bg-white/90 hover:bg-gray-100 text-gray-900 rounded-full transition-all shadow-lg border border-gray-100 group active:scale-95"
                aria-label="Close modal"
            >
                <svg class="w-6 h-6 transform group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div class="grid md:grid-cols-5 h-full">
                <!-- Left Side: Branding & Benefits -->
                <div class="md:col-span-2 bg-gradient-to-br from-[#D4AF37] to-yellow-600 p-6 md:p-8 flex flex-col justify-center text-white relative overflow-hidden">
                    <!-- Decorative Background Element -->
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-black/10 rounded-full blur-3xl"></div>
                    
                    <div class="relative z-10">
                        <div class="w-12 h-12 md:w-16 md:h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-4 md:mb-6">
                            <svg class="w-6 h-6 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold mb-2 md:mb-3 leading-tight">{{ $title }}</h3>
                        <p class="text-white/90 text-sm md:text-lg mb-6 md:mb-8">{{ $subtitle }}</p>

                        <!-- Benefits List -->
                        <div class="space-y-3 md:space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-5 h-5 md:w-6 md:h-6 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3 h-3 md:w-4 md:h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="stroke-width: 3;"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="font-bold text-sm md:text-base">100% Free Service</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-5 h-5 md:w-6 md:h-6 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3 h-3 md:w-4 md:h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="stroke-width: 3;"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="font-bold text-sm md:text-base">No Obligations</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-5 h-5 md:w-6 md:h-6 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3 h-3 md:w-4 md:h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="stroke-width: 3;"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="font-bold text-sm md:text-base">Verified Top Agents</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Form Content -->
                <div class="md:col-span-3 p-6 md:p-12">
                    <!-- Success Message -->
                    <div x-show="submitted" class="text-center py-4 md:py-8 h-full flex flex-col justify-center items-center">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-green-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h4 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Thank You!</h4>
                        <p class="text-gray-600 text-base md:text-lg mb-6 md:mb-8">We'll connect you with an expert within 24 hours.</p>
                        <button
                            type="button"
                            @click="closeModal()"
                            class="bg-[#D4AF37] text-black px-10 py-3 md:px-12 md:py-4 rounded-xl font-bold hover:bg-[#F4D03F] transition-all transform hover:scale-105 shadow-lg"
                        >
                            Return to Site
                        </button>
                    </div>

                    <!-- Form -->
                    <form x-show="!submitted" action="{{ $route }}" method="POST" class="space-y-4 md:space-y-5" @submit="submitForm">
                        @csrf
                        <input type="hidden" name="intent" value="consultation">
                        <input type="hidden" name="message" value="General Inquiry from Lead Popup Modal">

                        <div class="grid md:grid-cols-2 gap-4 md:gap-5">
                            <!-- Full Name -->
                            <div class="md:col-span-2">
                                <label for="popup-name" class="block text-xs md:text-sm font-bold text-gray-700 mb-1 md:mb-1.5">Full Name</label>
                                <div class="relative">
                                    <input
                                        id="popup-name"
                                        type="text"
                                        name="name"
                                        x-model="formData.name"
                                        placeholder="John Smith"
                                        class="w-full h-11 md:h-12 pl-10 md:pl-11 pr-4 border-2 border-gray-100 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/10 rounded-xl text-sm md:text-base outline-none transition-all"
                                        required
                                    >
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400 absolute left-3.5 md:left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="md:col-span-1">
                                <label for="popup-email" class="block text-xs md:text-sm font-bold text-gray-700 mb-1 md:mb-1.5">Email</label>
                                <div class="relative">
                                    <input
                                        id="popup-email"
                                        type="email"
                                        name="email"
                                        x-model="formData.email"
                                        placeholder="john@example.com"
                                        class="w-full h-11 md:h-12 pl-10 md:pl-11 pr-4 border-2 border-gray-100 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/10 rounded-xl text-sm md:text-base outline-none transition-all"
                                        required
                                    >
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400 absolute left-3.5 md:left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="md:col-span-1">
                                <label for="popup-phone" class="block text-xs md:text-sm font-bold text-gray-700 mb-1 md:mb-1.5">Phone</label>
                                <div class="relative">
                                    <input
                                        id="popup-phone"
                                        type="tel"
                                        name="phone"
                                        x-model="formData.phone"
                                        placeholder="(604) 555-0123"
                                        class="w-full h-11 md:h-12 pl-10 md:pl-11 pr-4 border-2 border-gray-100 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/10 rounded-xl text-sm md:text-base outline-none transition-all"
                                        required
                                    >
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400 absolute left-3.5 md:left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2 md:pt-2">
                            <button
                                type="submit"
                                class="w-full h-12 md:h-14 bg-gradient-to-r from-[#D4AF37] to-yellow-600 text-black font-bold rounded-xl shadow-lg hover:shadow-xl hover:from-[#F4D03F] hover:to-yellow-500 transition-all transform hover:scale-[1.02] flex items-center justify-center gap-2"
                            >
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <span class="text-sm md:text-base">Get My Free Consultation</span>
                            </button>
                            <p class="text-[9px] md:text-[10px] text-gray-400 text-center mt-3 uppercase tracking-wider font-bold">
                                <svg class="w-3 h-3 inline-block mr-1 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                Secure & Private • No Spam
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
