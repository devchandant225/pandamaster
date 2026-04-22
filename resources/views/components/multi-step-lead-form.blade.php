@props(['propertyType' => null, 'expertCity' => null])

<div
    x-data="{
        currentStep: 1,
        totalSteps: 3,
        formData: {
            city: '',
            budgetMin: 500000,
            budgetMax: 2000000,
            interest: '',
            timeline: '',
            name: '',
            phone: '',
            email: ''
        },
        formatCurrency(value) {
            return new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(value);
        },
        isStepValid() {
            if (this.currentStep === 1) return this.formData.city !== '';
            if (this.currentStep === 2) {
                if (this.formData.interest === 'selling') return true;
                return this.formData.interest !== '' && this.formData.timeline !== '';
            }
            if (this.currentStep === 3) {
                if (this.formData.interest === 'selling') return this.formData.name !== '' && this.formData.phone !== '' && this.formData.email !== '';
                return this.formData.name !== '' && this.formData.phone !== '' && this.formData.email !== '' && this.formData.timeline !== '';
            }
            return false;
        },
        nextStep() {
            if (this.currentStep < this.totalSteps && this.isStepValid()) {
                this.currentStep++;
            }
        },
        prevStep() {
            if (this.currentStep > 1) {
                this.currentStep--;
            }
        }
    }"
    class="bg-white rounded-3xl shadow-2xl p-6 sm:p-8 md:p-10 border-2 border-gray-100"
>
    <!-- Progress Bar -->
    <div class="mb-6 md:mb-8">
        <div class="flex items-center justify-between mb-2 md:mb-3">
            <span class="text-xs md:text-sm font-semibold text-gray-600">
                Step <span x-text="currentStep"></span> of <span x-text="totalSteps"></span>
            </span>
            <span class="text-xs md:text-sm font-semibold text-[#D4AF37]">
                <span x-text="Math.round((currentStep / totalSteps) * 100)"></span>% Complete
            </span>
        </div>
        <div class="h-1.5 md:h-2 bg-gray-200 rounded-full overflow-hidden">
            <div
                class="h-full bg-gradient-to-r from-[#D4AF37] to-yellow-600 transition-all duration-500 ease-out"
                :style="'width: ' + (currentStep / totalSteps * 100) + '%'"
            ></div>
        </div>
    </div>

    <!-- Form Header -->
    <div class="mb-6 md:mb-8 text-center">
        <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 md:mb-3">
            <template x-if="currentStep === 1"><span>Where are you looking?</span></template>
            <template x-if="currentStep === 2"><span>Tell us your plans</span></template>
            <template x-if="currentStep === 3"><span>Almost there!</span></template>
        </h3>
        <p class="text-sm md:text-base text-gray-600">
            <template x-if="currentStep === 1"><span>Select your preferred city and budget range</span></template>
            <template x-if="currentStep === 2"><span>Help us match you with the perfect agent</span></template>
            <template x-if="currentStep === 3"><span>Get instant access to exclusive listings</span></template>
        </p>
    </div>

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        
        @if($propertyType)
            <input type="hidden" name="property_type" value="{{ $propertyType }}">
        @endif

        @if($expertCity)
            <input type="hidden" name="expert_city" value="{{ $expertCity }}">
        @endif

        <!-- Hidden Inputs for Step Data -->
        <input type="hidden" name="city" :value="formData.city">
        <input type="hidden" name="budget" :value="formatCurrency(formData.budgetMin) + ' - ' + formatCurrency(formData.budgetMax)">
        <input type="hidden" name="intent" :value="formData.interest">
        <input type="hidden" name="timeline" :value="formData.timeline">

        <!-- Step 1: City & Budget -->
        <div x-show="currentStep === 1" x-transition.opacity.duration.500ms class="space-y-6">
            <!-- City Selection -->
            <div>
                <label for="city" class="text-base font-bold mb-3 block">Select City *</label>
                <div class="relative">
                    <select
                        id="city"
                        x-model="formData.city"
                        name="city_select"
                        class="w-full h-14 border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/20 rounded-xl text-base px-4 pr-10 outline-none transition-all appearance-none bg-white cursor-pointer"
                    >
                        <option value="">Choose your city...</option>
                        <option value="vancouver">Vancouver</option>
                        <option value="burnaby">Burnaby</option>
                        <option value="surrey">Surrey</option>
                        <option value="richmond">Richmond</option>
                        <option value="coquitlam">Coquitlam</option>
                        <option value="north-vancouver">North Vancouver</option>
                        <option value="west-vancouver">West Vancouver</option>
                    </select>
                    <svg class="w-5 h-5 text-gray-400 absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>

            <!-- Budget Range -->
            <div>
                <label class="text-base font-bold mb-3 block">Budget Range *</label>
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-4 text-center">
                        <div class="flex-1">
                            <div class="text-sm text-gray-600 mb-1">Minimum</div>
                            <div class="text-2xl font-bold text-[#D4AF37]" x-text="formatCurrency(formData.budgetMin)"></div>
                        </div>
                        <div class="text-gray-400 px-4">—</div>
                        <div class="flex-1">
                            <div class="text-sm text-gray-600 mb-1">Maximum</div>
                            <div class="text-2xl font-bold text-[#D4AF37]" x-text="formatCurrency(formData.budgetMax)"></div>
                        </div>
                    </div>
                    
                    <!-- Min Slider -->
                    <div class="mb-4">
                        <input 
                            type="range" 
                            x-model="formData.budgetMin" 
                            min="100000" 
                            max="5000000" 
                            step="50000" 
                            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-[#D4AF37] hover:accent-[#F4D03F] transition-all"
                        >
                        <div class="flex justify-between text-xs text-gray-500 mt-2">
                            <span>$100K</span>
                            <span>$5M+</span>
                        </div>
                    </div>
                    
                    <!-- Max Slider -->
                    <div>
                        <input 
                            type="range" 
                            x-model="formData.budgetMax" 
                            min="100000" 
                            max="5000000" 
                            step="50000" 
                            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-[#D4AF37] hover:accent-[#F4D03F] transition-all"
                        >
                        <div class="flex justify-between text-xs text-gray-500 mt-2">
                            <span>$100K</span>
                            <span>$5M+</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 2: Buying/Selling & Timeline -->
        <div x-show="currentStep === 2" x-transition.opacity.duration.500ms class="space-y-6" style="display: none;">
            <!-- Interest Selection -->
            <div>
                <label class="text-base font-bold mb-3 block">I'm interested in *</label>
                <div class="grid grid-cols-2 gap-4">
                    <button
                        type="button"
                        @click="formData.interest = 'buying'"
                        :class="formData.interest === 'buying' ? 'border-[#D4AF37] bg-[#D4AF37]/10 text-[#D4AF37] ring-2 ring-[#D4AF37] ring-offset-2' : 'border-gray-300 hover:border-gray-400 hover:bg-gray-50'"
                        class="p-6 rounded-xl border-2 font-bold text-lg transition-all text-center focus:outline-none"
                    >
                        <div class="mb-2 text-2xl">🏠</div>
                        Buying
                    </button>
                    <button
                        type="button"
                        @click="formData.interest = 'selling'"
                        :class="formData.interest === 'selling' ? 'border-[#D4AF37] bg-[#D4AF37]/10 text-[#D4AF37] ring-2 ring-[#D4AF37] ring-offset-2' : 'border-gray-300 hover:border-gray-400 hover:bg-gray-50'"
                        class="p-6 rounded-xl border-2 font-bold text-lg transition-all text-center focus:outline-none"
                    >
                        <div class="mb-2 text-2xl">💰</div>
                        Selling
                    </button>
                </div>
            </div>

            <!-- Timeline Selection (Only show for Buying) -->
            <div x-show="formData.interest === 'buying'" x-transition.opacity.duration.300ms>
                <label for="timeline" class="text-base font-bold mb-3 block">Timeline *</label>
                <div class="relative">
                    <select
                        id="timeline"
                        x-model="formData.timeline"
                        class="w-full h-14 border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/20 rounded-xl text-base px-4 pr-10 outline-none transition-all appearance-none bg-white cursor-pointer"
                    >
                        <option value="">When are you planning to move?</option>
                        <option value="asap">ASAP (Within 1 month)</option>
                        <option value="1-3">1-3 Months</option>
                        <option value="3-6">3-6 Months</option>
                        <option value="6-12">6-12 Months</option>
                        <option value="12+">12+ Months</option>
                        <option value="researching">Just Researching</option>
                    </select>
                    <svg class="w-5 h-5 text-gray-400 absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Step 3: Contact Info -->
        <div x-show="currentStep === 3" x-transition.opacity.duration.500ms class="space-y-5" style="display: none;">
            <!-- Full Name -->
            <div>
                <label for="name" class="text-base font-bold mb-2 block">Full Name *</label>
                <div class="relative">
                    <input
                        id="name"
                        type="text"
                        name="name"
                        placeholder="John Smith"
                        x-model="formData.name"
                        class="w-full h-14 border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/20 rounded-xl text-base px-4 pl-12 outline-none transition-all placeholder:text-gray-400"
                        required
                    >
                    <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone" class="text-base font-bold mb-2 block">Phone Number *</label>
                <div class="relative">
                    <input
                        id="phone"
                        type="tel"
                        name="phone"
                        placeholder="(604) 555-0123"
                        x-model="formData.phone"
                        class="w-full h-14 border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/20 rounded-xl text-base px-4 pl-12 outline-none transition-all placeholder:text-gray-400"
                        required
                    >
                    <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="text-base font-bold mb-2 block">Email Address *</label>
                <div class="relative">
                    <input
                        id="email"
                        type="email"
                        name="email"
                        placeholder="john@example.com"
                        x-model="formData.email"
                        class="w-full h-14 border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/20 rounded-xl text-base px-4 pl-12 outline-none transition-all placeholder:text-gray-400"
                        required
                    >
                    <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                    </svg>
                </div>
            </div>

            <!-- Trust Badge -->
            <div class="bg-green-50 border-2 border-green-200 rounded-xl p-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <p class="text-sm text-gray-700">
                        Your information is secure and will only be used to connect you with verified real estate professionals.
                    </p>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex gap-4 mt-8">
            <button
                x-show="currentStep > 1"
                type="button"
                @click="prevStep()"
                class="flex-1 h-14 text-base font-bold border-2 border-gray-300 rounded-xl flex items-center justify-center gap-2 hover:bg-gray-50 hover:border-gray-400 transition-all focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Back
            </button>

            <button
                x-show="currentStep < totalSteps"
                type="button"
                @click="nextStep()"
                :disabled="!isStepValid()"
                :class="isStepValid() ? 'bg-gradient-to-r from-[#D4AF37] to-yellow-600 text-black hover:from-[#F4D03F] hover:to-yellow-500 shadow-lg hover:shadow-xl' : 'bg-gray-300 text-gray-500 cursor-not-allowed'"
                class="flex-1 h-14 text-base font-bold rounded-xl flex items-center justify-center gap-2 transition-all focus:outline-none focus:ring-2 focus:ring-[#D4AF37] focus:ring-offset-2 disabled:focus:ring-0"
            >
                Continue
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <button
                x-show="currentStep === totalSteps"
                type="submit"
                :disabled="!isStepValid()"
                :class="isStepValid() ? 'bg-gradient-to-r from-[#D4AF37] to-yellow-600 text-black hover:from-[#F4D03F] hover:to-yellow-500 shadow-lg hover:shadow-xl' : 'bg-gray-300 text-gray-500 cursor-not-allowed'"
                class="flex-1 h-14 text-base font-bold rounded-xl flex items-center justify-center gap-2 transition-all focus:outline-none focus:ring-2 focus:ring-[#D4AF37] focus:ring-offset-2 disabled:focus:ring-0"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Get Instant Access
            </button>
        </div>

        <!-- Step Indicators (Pagination Dots) -->
        <div class="flex justify-center gap-2 mt-6">
            <template x-for="step in [1, 2, 3]" :key="step">
                <div
                    class="h-2 rounded-full transition-all duration-300"
                    :class="{
                        'w-8 bg-[#D4AF37]': step === currentStep,
                        'w-2 bg-green-500': step < currentStep,
                        'w-2 bg-gray-300': step > currentStep
                    }"
                ></div>
            </template>
        </div>
    </form>

    <!-- Trust Badges -->
    <div class="grid grid-cols-3 gap-4 mt-8 pt-8 border-t-2 border-gray-100">
        <div class="text-center">
            <svg class="w-6 h-6 text-[#D4AF37] mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            <div class="text-xs font-semibold text-gray-600">Verified Agents</div>
        </div>
        <div class="text-center">
            <svg class="w-6 h-6 text-[#D4AF37] mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div class="text-xs font-semibold text-gray-600">1 Hour Response</div>
        </div>
        <div class="text-center">
            <svg class="w-6 h-6 text-[#D4AF37] mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <div class="text-xs font-semibold text-gray-600">10K+ Matched</div>
        </div>
    </div>
</div>
