@extends('layouts.app')

@push('meta')
    <x-meta-tags page="about" />
@endpush

@section('content')
<div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-black via-gray-900 to-black text-white py-24 lg:py-32 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#D4AF37]/10 border border-[#D4AF37]/30 rounded-full text-sm text-[#D4AF37] font-semibold mb-8">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    About 888Realty
                </div>

                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 leading-tight">
                    Redefining Real Estate in <span class="text-[#D4AF37]">Vancouver</span>
                </h1>
                
                <p class="text-xl md:text-2xl text-gray-300 mb-12 leading-relaxed">
                    We're not just another real estate company. We're your trusted partner in navigating 
                    Vancouver's dynamic property market with confidence and ease.
                </p>

                <a href="{{ route('contact') }}" class="inline-block bg-[#D4AF37] text-black hover:bg-[#F4D03F] px-12 py-6 text-xl font-bold rounded-xl shadow-lg hover:shadow-xl transition-all">
                    Get Started Today
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-[#D4AF37] mb-2">$500M+</div>
                    <div class="text-gray-600 font-medium">Transaction Volume</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-[#D4AF37] mb-2">2,000+</div>
                    <div class="text-gray-600 font-medium">Happy Clients</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-[#D4AF37] mb-2">50+</div>
                    <div class="text-gray-600 font-medium">Expert Agents</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-[#D4AF37] mb-2">15+</div>
                    <div class="text-gray-600 font-medium">Years Experience</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 text-left">
                        Our <span class="text-[#D4AF37]">Story</span>
                    </h2>
                    <div class="space-y-4 text-gray-700 leading-relaxed text-lg text-left">
                        <p>
                            Founded in 2011, 888Realty was born from a simple vision: to revolutionize the way people 
                            buy and sell real estate in Vancouver. We saw a market that needed transparency, innovation, 
                            and a genuine commitment to client success.
                        </p>
                        <p>
                            What started as a small team of passionate real estate professionals has grown into Vancouver's 
                            premier real estate matching service, connecting thousands of buyers and sellers with top-rated 
                            local agents who truly understand their needs.
                        </p>
                        <p>
                            Today, we're proud to serve clients across Greater Vancouver, from first-time homebuyers to 
                            seasoned investors, providing personalized service and exceptional results every step of the way.
                        </p>
                    </div>
                    <div class="mt-8 text-left">
                        <a href="{{ route('contact') }}" class="inline-block bg-[#D4AF37] text-black hover:bg-[#F4D03F] px-8 py-4 text-lg font-bold rounded-xl transition-all">
                            Learn More About Our Process
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <img
                        src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800"
                        alt="Modern Vancouver architecture"
                        class="rounded-2xl shadow-2xl"
                    />
                    <div class="absolute -bottom-6 -left-6 bg-[#D4AF37] text-black p-6 rounded-xl shadow-xl">
                        <div class="text-3xl font-bold mb-1">15+</div>
                        <div class="text-sm font-semibold">Years of Excellence</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Our Core <span class="text-[#D4AF37]">Values</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    The principles that guide everything we do
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Client-First -->
                <div class="bg-white border-2 border-gray-100 p-8 rounded-2xl hover:border-[#D4AF37] hover:shadow-xl transition-all duration-300 text-left">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Client-First Approach</h3>
                    <p class="text-gray-600 leading-relaxed">Your goals and satisfaction are our top priority. We tailor every service to meet your unique needs.</p>
                </div>

                <!-- Integrity -->
                <div class="bg-white border-2 border-gray-100 p-8 rounded-2xl hover:border-[#D4AF37] hover:shadow-xl transition-all duration-300 text-left">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Integrity & Transparency</h3>
                    <p class="text-gray-600 leading-relaxed">We believe in honest communication, clear processes, and building trust through transparency.</p>
                </div>

                <!-- Innovation -->
                <div class="bg-white border-2 border-gray-100 p-8 rounded-2xl hover:border-[#D4AF37] hover:shadow-xl transition-all duration-300 text-left">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Innovation & Excellence</h3>
                    <p class="text-gray-600 leading-relaxed">We leverage cutting-edge technology and market insights to deliver exceptional results.</p>
                </div>

                <!-- Community -->
                <div class="bg-white border-2 border-gray-100 p-8 rounded-2xl hover:border-[#D4AF37] hover:shadow-xl transition-all duration-300 text-left">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Community Commitment</h3>
                    <p class="text-gray-600 leading-relaxed">We're deeply invested in Vancouver's communities and committed to giving back.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Team -->
    <x-team-section />

    <!-- Why Choose Us -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800" alt="Team collaboration" class="rounded-2xl shadow-2xl" />
                </div>

                <div class="order-1 lg:order-2 text-left">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">
                        Why Choose <span class="text-[#D4AF37]">888Realty</span>
                    </h2>
                    <div class="space-y-4">
                        @foreach([
                            "Expert knowledge of Vancouver's diverse neighborhoods",
                            "Personalized matching with pre-vetted, top-rated agents",
                            "Cutting-edge technology for seamless transactions",
                            "Transparent process from start to finish",
                            "Dedicated support throughout your journey",
                            "Proven track record of successful outcomes",
                        ] as $item)
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-[#D4AF37] flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-lg text-gray-700">{{ $item }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section class="py-20 bg-gradient-to-br from-black via-gray-900 to-black text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center text-left">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">
                        Ready to Get <span class="text-[#D4AF37]">Started?</span>
                    </h2>
                    <p class="text-xl text-gray-300 mb-8">
                        Whether you're buying, selling, or investing, our team is here to help you achieve 
                        your real estate goals.
                    </p>
                    <a href="{{ route('contact') }}" class="inline-block bg-[#D4AF37] text-black hover:bg-[#F4D03F] px-12 py-4 text-xl font-bold rounded-xl shadow-lg hover:shadow-xl transition-all">
                        Get Matched with an Agent
                    </a>
                </div>

                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8">
                    <h3 class="text-2xl font-bold mb-6">Contact Information</h3>
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-[#D4AF37]/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <div class="text-sm text-gray-400">Phone</div>
                                <a href="tel:2505526542" class="text-lg font-semibold hover:text-[#D4AF37] transition-colors">
                                    250 552 6542
                                </a>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-[#D4AF37]/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <div class="text-sm text-gray-400">Email</div>
                                <a href="mailto:info@888realty.ca" class="text-lg font-semibold hover:text-[#D4AF37] transition-colors">
                                    info@888realty.ca
                                </a>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-[#D4AF37]/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <div class="text-sm text-gray-400">Location</div>
                                <div class="text-lg font-semibold">Vancouver, BC, Canada</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
