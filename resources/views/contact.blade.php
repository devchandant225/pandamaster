@extends('layouts.app')

@push('meta')
    <x-meta-tags page="contact" />
@endpush

@section('content')
<div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-black via-gray-900 to-black text-white py-20 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#D4AF37]/10 border border-[#D4AF37]/30 rounded-full text-sm text-[#D4AF37] font-semibold mb-6">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    Free Service - No Obligation
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Get Matched with a <span class="text-[#D4AF37]">Top Agent</span>
                </h1>

                <p class="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed">
                    Tell us about your real estate needs and we'll connect you with Vancouver's best agents who specialize in your area and property type.
                </p>

                <div class="flex flex-wrap justify-center gap-8 text-center">
                    <div>
                        <div class="text-3xl font-bold text-[#D4AF37] mb-1">50+</div>
                        <div class="text-sm text-gray-400">Expert Agents</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-[#D4AF37] mb-1">500+</div>
                        <div class="text-sm text-gray-400">Happy Clients</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-[#D4AF37] mb-1">$200M+</div>
                        <div class="text-sm text-gray-400">Sales Volume</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-20 bg-gray-50" id="contact-form">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-8 p-6 bg-green-50 border border-green-200 rounded-2xl">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-green-900 mb-1">Thank You!</h3>
                            <p class="text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 p-8 md:p-12">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold mb-3">Tell Us About Your Needs</h2>
                    <p class="text-gray-600">Fill out the form below and we'll match you within 24 hours</p>
                </div>

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Personal Information -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                            <span class="w-8 h-8 bg-[#D4AF37] text-black rounded-full flex items-center justify-center text-sm font-bold">1</span>
                            Personal Information
                        </h3>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Full Name *</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="John Smith"
                                    class="w-full h-14 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/20 rounded-xl text-base outline-none transition-all @error('name') border-red-500 @enderror"
                                    required
                                />
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address *</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="john@example.com"
                                    class="w-full h-14 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/20 rounded-xl text-base outline-none transition-all @error('email') border-red-500 @enderror"
                                    required
                                />
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">Phone Number *</label>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="(604) 123-4567"
                                class="w-full h-14 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/20 rounded-xl text-base outline-none transition-all @error('phone') border-red-500 @enderror"
                                required
                            />
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Real Estate Needs -->
                    <div class="space-y-4 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                            <span class="w-8 h-8 bg-[#D4AF37] text-black rounded-full flex items-center justify-center text-sm font-bold">2</span>
                            What Are You Looking To Do?
                        </h3>

                        <div class="grid md:grid-cols-2 gap-4">
                            <label class="cursor-pointer">
                                <input type="radio" name="intent" value="buy" value="{{ old('intent') }}" class="peer sr-only" required>
                                <div class="p-4 border-2 border-gray-200 rounded-xl text-center peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]/10 transition-all hover:border-gray-300">
                                    <svg class="w-8 h-8 mx-auto mb-2 text-gray-400 peer-checked:text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    <div class="font-bold text-gray-900 peer-checked:text-[#D4AF37]">Buy a Property</div>
                                    <div class="text-xs text-gray-500 mt-1">Looking to purchase</div>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input type="radio" name="intent" value="sell" {{ old('intent') === 'sell' ? 'checked' : '' }} class="peer sr-only" required>
                                <div class="p-4 border-2 border-gray-200 rounded-xl text-center peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]/10 transition-all hover:border-gray-300">
                                    <svg class="w-8 h-8 mx-auto mb-2 text-gray-400 peer-checked:text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div class="font-bold text-gray-900 peer-checked:text-[#D4AF37]">Sell a Property</div>
                                    <div class="text-xs text-gray-500 mt-1">Looking to sell</div>
                                </div>
                            </label>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <label class="cursor-pointer">
                                <input type="radio" name="intent" value="both" {{ old('intent') === 'both' ? 'checked' : '' }} class="peer sr-only" required>
                                <div class="p-4 border-2 border-gray-200 rounded-xl text-center peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]/10 transition-all hover:border-gray-300">
                                    <svg class="w-8 h-8 mx-auto mb-2 text-gray-400 peer-checked:text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                    <div class="font-bold text-gray-900 peer-checked:text-[#D4AF37]">Buy & Sell</div>
                                    <div class="text-xs text-gray-500 mt-1">Doing both</div>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input type="radio" name="intent" value="invest" {{ old('intent') === 'invest' ? 'checked' : '' }} class="peer sr-only" required>
                                <div class="p-4 border-2 border-gray-200 rounded-xl text-center peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]/10 transition-all hover:border-gray-300">
                                    <svg class="w-8 h-8 mx-auto mb-2 text-gray-400 peer-checked:text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    <div class="font-bold text-gray-900 peer-checked:text-[#D4AF37]">Invest</div>
                                    <div class="text-xs text-gray-500 mt-1">Investment property</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Property Details -->
                    <div class="space-y-4 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                            <span class="w-8 h-8 bg-[#D4AF37] text-black rounded-full flex items-center justify-center text-sm font-bold">3</span>
                            Property Details
                        </h3>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="city" class="block text-sm font-bold text-gray-700 mb-2">Preferred City</label>
                                <select
                                    id="city"
                                    name="city"
                                    class="w-full h-14 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/20 rounded-xl text-base outline-none transition-all appearance-none bg-white @error('city') border-red-500 @enderror"
                                >
                                    <option value="">Select a city...</option>
                                    <option value="Vancouver" {{ old('city') === 'Vancouver' ? 'selected' : '' }}>Vancouver</option>
                                    <option value="Burnaby" {{ old('city') === 'Burnaby' ? 'selected' : '' }}>Burnaby</option>
                                    <option value="Richmond" {{ old('city') === 'Richmond' ? 'selected' : '' }}>Richmond</option>
                                    <option value="Surrey" {{ old('city') === 'Surrey' ? 'selected' : '' }}>Surrey</option>
                                    <option value="Coquitlam" {{ old('city') === 'Coquitlam' ? 'selected' : '' }}>Coquitlam</option>
                                    <option value="North Vancouver" {{ old('city') === 'North Vancouver' ? 'selected' : '' }}>North Vancouver</option>
                                    <option value="West Vancouver" {{ old('city') === 'West Vancouver' ? 'selected' : '' }}>West Vancouver</option>
                                    <option value="Other" {{ old('city') === 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('city')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="budget" class="block text-sm font-bold text-gray-700 mb-2">Budget Range</label>
                                <select
                                    id="budget"
                                    name="budget"
                                    class="w-full h-14 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/20 rounded-xl text-base outline-none transition-all appearance-none bg-white @error('budget') border-red-500 @enderror"
                                >
                                    <option value="">Select your budget...</option>
                                    <option value="Under $500K" {{ old('budget') === 'Under $500K' ? 'selected' : '' }}>Under $500K</option>
                                    <option value="$500K - $750K" {{ old('budget') === '$500K - $750K' ? 'selected' : '' }}>$500K - $750K</option>
                                    <option value="$750K - $1M" {{ old('budget') === '$750K - $1M' ? 'selected' : '' }}>$750K - $1M</option>
                                    <option value="$1M - $1.5M" {{ old('budget') === '$1M - $1.5M' ? 'selected' : '' }}>$1M - $1.5M</option>
                                    <option value="$1.5M - $2M" {{ old('budget') === '$1.5M - $2M' ? 'selected' : '' }}>$1.5M - $2M</option>
                                    <option value="$2M - $3M" {{ old('budget') === '$2M - $3M' ? 'selected' : '' }}>$2M - $3M</option>
                                    <option value="$3M+" {{ old('budget') === '$3M+' ? 'selected' : '' }}>$3M+</option>
                                </select>
                                @error('budget')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="timeline" class="block text-sm font-bold text-gray-700 mb-2">Timeline</label>
                            <select
                                id="timeline"
                                name="timeline"
                                class="w-full h-14 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/20 rounded-xl text-base outline-none transition-all appearance-none bg-white @error('timeline') border-red-500 @enderror"
                            >
                                <option value="">When are you looking to make a move?...</option>
                                <option value="ASAP" {{ old('timeline') === 'ASAP' ? 'selected' : '' }}>ASAP - Ready to move now</option>
                                <option value="1-3 months" {{ old('timeline') === '1-3 months' ? 'selected' : '' }}>1-3 months</option>
                                <option value="3-6 months" {{ old('timeline') === '3-6 months' ? 'selected' : '' }}>3-6 months</option>
                                <option value="6+ months" {{ old('timeline') === '6+ months' ? 'selected' : '' }}>6+ months</option>
                                <option value="Just browsing" {{ old('timeline') === 'Just browsing' ? 'selected' : '' }}>Just browsing / Not sure yet</option>
                            </select>
                            @error('timeline')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-bold text-gray-700 mb-2">Additional Details</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="4"
                                placeholder="Tell us more about what you're looking for (property type, bedrooms, special requirements, etc.)..."
                                class="w-full px-4 py-3 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:ring-4 focus:ring-[#D4AF37]/20 rounded-xl text-base outline-none transition-all resize-none @error('message') border-red-500 @enderror"
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button
                            type="submit"
                            class="w-full bg-gradient-to-r from-[#D4AF37] to-[#F4D03F] text-black h-16 text-lg font-bold rounded-xl shadow-lg hover:shadow-xl hover:from-[#F4D03F] hover:to-[#D4AF37] transition-all transform hover:scale-[1.02]"
                        >
                            Get Matched Now →
                        </button>
                        <p class="text-xs text-gray-500 text-center mt-4">
                            By submitting, you agree to our Terms of Service and Privacy Policy. Your information is secure and will never be shared.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Why Choose <span class="text-[#D4AF37]">888Realty?</span></h2>
                <p class="text-xl text-gray-600">We make finding the right agent simple and stress-free</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-8 bg-gray-50 rounded-2xl hover:shadow-xl transition-all">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 2-2m5.625-4.5a2.25 2.25 0 00-2.25-2.25h-1.5l-.327-1.308a2.25 2.25 0 00-2.183-1.692H10.5c-1.036 0-1.935.71-2.183 1.692L7.994 4.5h-1.5a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 006.494 19.5h10.5a2.25 2.25 0 002.25-2.25V7.5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Verified Agents</h3>
                    <p class="text-gray-600">All our agents are licensed, experienced, and thoroughly vetted for your peace of mind.</p>
                </div>

                <div class="text-center p-8 bg-gray-50 rounded-2xl hover:shadow-xl transition-all">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Perfect Match</h3>
                    <p class="text-gray-600">We match you with agents who specialize in your area, property type, and price range.</p>
                </div>

                <div class="text-center p-8 bg-gray-50 rounded-2xl hover:shadow-xl transition-all">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Free Service</h3>
                    <p class="text-gray-600">Our matching service is completely free with no obligations or hidden fees.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-black to-gray-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Ready to Find Your <span class="text-[#D4AF37]">Perfect Agent?</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8">
                Get started now and let us do the hard work for you
            </p>
            <a
                href="#contact-form"
                class="inline-block bg-[#D4AF37] text-black px-10 py-5 text-xl font-bold rounded-xl shadow-lg hover:bg-[#F4D03F] hover:shadow-xl transition-all transform hover:scale-105"
            >
                Get Matched Now →
            </a>
        </div>
    </section>
</div>
@endsection
