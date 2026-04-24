@extends('layouts.app')


@section('content')
<div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-black via-gray-900 to-black text-white py-24 lg:py-32 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#D4AF37]/10 border border-[#D4AF37]/30 rounded-full text-sm text-[#D4AF37] font-semibold mb-8 text-left">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        Exclusive Investment Opportunities
                    </div>

                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight text-left">
                        Premium <span class="text-[#D4AF37]">Investor Deals</span>
                    </h1>
                    
                    <p class="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed text-left">
                        Access off-market properties, pre-construction developments, and high-ROI investment opportunities 
                        in Vancouver's hottest markets.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <a href="#investor-form" class="inline-block bg-[#D4AF37] text-black hover:bg-[#F4D03F] px-8 py-4 text-base md:text-lg font-bold rounded-xl shadow-lg hover:shadow-xl transition-all text-center">
                            View Exclusive Deals
                        </a>
                        <a href="tel:2505526542" class="inline-flex items-center justify-center gap-2 border-2 border-white text-white hover:bg-white hover:text-black px-8 py-4 text-base md:text-lg font-bold rounded-xl transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>Call Now</span>
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-6 border-t border-white/20">
                        <div>
                            <div class="text-3xl font-bold text-[#D4AF37] mb-1">$200M+</div>
                            <div class="text-sm text-gray-400">Deals Closed</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-[#D4AF37] mb-1">18-25%</div>
                            <div class="text-sm text-gray-400">Avg ROI</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-[#D4AF37] mb-1">500+</div>
                            <div class="text-sm text-gray-400">Investors</div>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <img
                        src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800"
                        alt="Investment Property"
                        class="rounded-2xl shadow-2xl"
                    />
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Why Invest with <span class="text-[#D4AF37]">888Realty</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    We provide institutional-grade investment opportunities to individual investors
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- ROI -->
                <div class="bg-white border-2 border-gray-100 p-8 rounded-2xl hover:border-[#D4AF37] hover:shadow-xl transition-all duration-300 text-left">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">High ROI Opportunities</h3>
                    <p class="text-gray-600 leading-relaxed">Access exclusive investment properties with projected returns of 15-25% annually.</p>
                </div>

                <!-- Pre-Construction -->
                <div class="bg-white border-2 border-gray-100 p-8 rounded-2xl hover:border-[#D4AF37] hover:shadow-xl transition-all duration-300 text-left">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Pre-Construction Access</h3>
                    <p class="text-gray-600 leading-relaxed">Get first access to pre-construction developments before they hit the market.</p>
                </div>

                <!-- Expert Analysis -->
                <div class="bg-white border-2 border-gray-100 p-8 rounded-2xl hover:border-[#D4AF37] hover:shadow-xl transition-all duration-300 text-left">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Expert Analysis</h3>
                    <p class="text-gray-600 leading-relaxed">Receive detailed market analysis and investment reports for every opportunity.</p>
                </div>

                <!-- Fast Track -->
                <div class="bg-white border-2 border-gray-100 p-8 rounded-2xl hover:border-[#D4AF37] hover:shadow-xl transition-all duration-300 text-left">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Fast Track Approval</h3>
                    <p class="text-gray-600 leading-relaxed">Streamlined purchasing process with priority access to financing partners.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Deals -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Current <span class="text-[#D4AF37]">Investment Opportunities</span>
                </h2>
                <p class="text-xl text-gray-600">
                    Exclusive deals available to qualified investors only
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach([
                    ['title' => 'Pre-Construction Condo - Metrotown', 'location' => 'Burnaby, BC', 'price' => '$650,000', 'roi' => '18-22%', 'image' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=800', 'badge' => 'Hot Deal'],
                    ['title' => 'Multi-Family Investment Property', 'location' => 'Surrey, BC', 'price' => '$1,850,000', 'roi' => '12-15%', 'image' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=800', 'badge' => 'High ROI'],
                    ['title' => 'Luxury Waterfront Development', 'location' => 'Richmond, BC', 'price' => '$2,200,000', 'roi' => '20-25%', 'image' => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=800', 'badge' => 'Premium']
                ] as $deal)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all hover:-translate-y-2 border border-gray-100 text-left">
                    <div class="relative h-64">
                        <img src="{{ $deal['image'] }}" alt="{{ $deal['title'] }}" class="w-full h-full object-cover blur-sm" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        
                        <!-- Badge -->
                        <div class="absolute top-4 left-4">
                            <span class="px-4 py-2 bg-[#D4AF37] text-black rounded-full text-xs font-bold shadow-lg">
                                {{ $deal['badge'] }}
                            </span>
                        </div>

                        <!-- Lock Icon -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-20 h-20 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $deal['title'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $deal['location'] }}</p>
                        
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <div class="text-sm text-gray-500 mb-1 text-left">Price</div>
                                <div class="text-2xl font-bold text-[#D4AF37] text-left">{{ $deal['price'] }}</div>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500 mb-1 text-left">Projected ROI</div>
                                <div class="text-2xl font-bold text-green-600 text-left">{{ $deal['roi'] }}</div>
                            </div>
                        </div>

                        <a href="#investor-form" class="block w-full bg-black text-white hover:bg-gray-900 py-3 text-center font-bold rounded-xl transition-all">
                            Request Access
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="bg-gradient-to-r from-[#D4AF37] to-[#F4D03F] text-black p-8 rounded-2xl text-center">
                <h3 class="text-2xl font-bold mb-2 text-center">More Exclusive Deals Available</h3>
                <p class="mb-6 text-center">Register to access our complete portfolio of investment opportunities</p>
                <a href="#investor-form" class="inline-block bg-black text-white hover:bg-gray-900 px-8 py-4 text-lg font-bold rounded-xl transition-all">
                    View All Deals
                </a>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    How It <span class="text-[#D4AF37]">Works</span>
                </h2>
                <p class="text-xl text-gray-600">
                    Simple steps to start investing in Vancouver real estate
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                @foreach([
                    ['step' => '1', 'title' => 'Register Interest', 'desc' => 'Fill out our investor qualification form'],
                    ['step' => '2', 'title' => 'Get Verified', 'desc' => 'Quick verification process for qualified investors'],
                    ['step' => '3', 'title' => 'Access Deals', 'desc' => 'Browse exclusive off-market opportunities'],
                    ['step' => '4', 'title' => 'Invest & Profit', 'desc' => 'Secure your investment and track returns']
                ] as $index => $item)
                <div class="relative text-center">
                    <div class="w-16 h-16 bg-[#D4AF37] text-black rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-6">
                        {{ $item['step'] }}
                    </div>
                    <h3 class="text-xl font-bold mb-3">{{ $item['title'] }}</h3>
                    <p class="text-gray-600">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Investor Form -->
    <section id="investor-form" class="py-20 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Access <span class="text-[#D4AF37]">Exclusive Deals</span>
                </h2>
                <p class="text-xl text-gray-600">
                    Register now to receive curated investment opportunities
                </p>
            </div>

            <div class="bg-white border-2 border-gray-200 p-10 md:p-12 rounded-2xl shadow-2xl">
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="intent" value="investor">

                    <!-- Full Name -->
                    <div>
                        <label for="name" class="text-sm font-semibold mb-2 block">Full Name *</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            placeholder="John Smith"
                            class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl"
                            required
                        />
                    </div>

                    <!-- Email & Phone -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="text-sm font-semibold mb-2 block">Email Address *</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                placeholder="john@example.com"
                                class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl"
                                required
                            />
                        </div>

                        <div>
                            <label for="phone" class="text-sm font-semibold mb-2 block">Phone Number *</label>
                            <input
                                id="phone"
                                name="phone"
                                type="tel"
                                placeholder="(604) 123-4567"
                                class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl"
                                required
                            />
                        </div>
                    </div>

                    <!-- Investment Budget -->
                    <div>
                        <label for="budget" class="text-sm font-semibold mb-2 block">Investment Budget *</label>
                        <input
                            id="budget"
                            name="budget"
                            type="text"
                            placeholder="e.g., $500,000 - $1,000,000"
                            class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl"
                            required
                        />
                    </div>

                    <!-- Property Type -->
                    <div>
                        <label for="property_type" class="text-sm font-semibold mb-2 block">Property Type of Interest</label>
                        <input
                            id="property_type"
                            name="property_type"
                            type="text"
                            placeholder="e.g., Pre-construction, Multi-family, Commercial"
                            class="w-full h-12 px-4 border-2 border-gray-200 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl"
                        />
                    </div>

                    <!-- Trust Badge -->
                    <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl">
                        <svg class="w-5 h-5 text-[#D4AF37] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            By submitting this form, you agree to receive exclusive investment opportunities and market updates from 888Realty.
                            Your information is kept strictly confidential.
                        </p>
                    </div>

                    <button type="submit" class="w-full bg-[#D4AF37] text-black hover:bg-[#F4D03F] h-16 text-lg font-bold rounded-xl shadow-lg hover:shadow-xl transition-all">
                        Get Exclusive Access
                    </button>

                    <p class="text-center text-sm text-gray-500">
                        Our investment team will contact you within 24 hours
                    </p>
                </form>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="py-20 bg-gradient-to-br from-black via-gray-900 to-black text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready to Start <span class="text-[#D4AF37]">Investing?</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Join hundreds of successful investors building wealth through Vancouver real estate
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a
                    href="tel:2505526542"
                    class="inline-flex items-center justify-center gap-2 bg-[#D4AF37] text-black hover:bg-[#F4D03F] px-12 py-8 text-xl font-bold rounded-xl shadow-lg hover:shadow-xl transition-all"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    Call: 250 552 6542
                </a>
                <a
                    href="mailto:info@888realty.ca"
                    class="inline-flex items-center justify-center gap-2 border-2 border-white text-white hover:bg-white hover:text-black px-12 py-8 text-xl font-bold rounded-xl transition-all"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    info@888realty.ca
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
