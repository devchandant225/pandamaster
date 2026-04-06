@extends('layouts.app')

@push('meta')
    <x-meta-tags page="tools" />
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
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    Free Real Estate Tools
                </div>

                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 leading-tight">
                    Smart Tools for <span class="text-[#D4AF37]">Smart Buyers</span>
                </h1>
                
                <p class="text-xl md:text-2xl text-gray-300 mb-12 leading-relaxed">
                    Make informed decisions with our suite of professional-grade real estate calculators and tools
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#tools-section" class="inline-block bg-[#D4AF37] text-black hover:bg-[#F4D03F] px-12 py-5 text-xl font-bold rounded-xl shadow-lg hover:shadow-xl transition-all">
                        Explore All Tools
                    </a>
                    <a href="{{ url('/#contact') }}" class="inline-block border-2 border-white text-white hover:bg-white hover:text-black px-12 py-5 text-xl font-bold rounded-xl transition-all flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        Speak to an Expert
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Mortgage Calculator -->
    <section class="py-20 bg-white" x-data="{
        homePrice: 800000,
        downPayment: 160000,
        interestRate: 5.5,
        amortization: 25,
        get principal() { return this.homePrice - this.downPayment },
        get monthlyPayment() {
            const p = this.principal;
            const r = this.interestRate / 100 / 12;
            const n = this.amortization * 12;
            if (r === 0) return p / n;
            return (p * r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1);
        },
        get totalInterest() {
            return (this.monthlyPayment * this.amortization * 12) - this.principal;
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="text-[#D4AF37]">Mortgage</span> Calculator
                </h2>
                <p class="text-xl text-gray-600">
                    Calculate your monthly mortgage payments
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-start text-left">
                <!-- Calculator Form -->
                <div class="bg-gray-50 border-2 border-gray-200 rounded-2xl p-8">
                    <div class="space-y-6">
                        <div>
                            <label class="text-sm font-semibold mb-2 block">Home Price</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold">$</span>
                                <input type="number" x-model="homePrice" class="w-full h-14 pl-8 pr-4 text-lg border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl" />
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-semibold mb-2 block">Down Payment</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold">$</span>
                                <input type="number" x-model="downPayment" class="w-full h-14 pl-8 pr-4 text-lg border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl" />
                            </div>
                            <p class="text-sm text-gray-500 mt-2" x-text="((downPayment / homePrice) * 100).toFixed(1) + '% of home price'"></p>
                        </div>

                        <div>
                            <label class="text-sm font-semibold mb-2 block">Interest Rate (%)</label>
                            <input type="number" step="0.1" x-model="interestRate" class="w-full h-14 px-4 text-lg border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl" />
                        </div>

                        <div>
                            <label class="text-sm font-semibold mb-2 block">Amortization Period (Years)</label>
                            <select x-model="amortization" class="w-full h-14 px-4 text-lg border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl bg-white">
                                <option value="15">15 Years</option>
                                <option value="20">20 Years</option>
                                <option value="25">25 Years</option>
                                <option value="30">30 Years</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Results -->
                <div>
                    <div class="bg-gradient-to-br from-black to-gray-900 text-white rounded-2xl p-8 mb-6 text-left">
                        <h3 class="text-xl font-bold mb-6 text-[#D4AF37]">Monthly Payment</h3>
                        <div class="text-5xl font-bold mb-2">
                            $<span x-text="Math.round(monthlyPayment).toLocaleString()"></span>
                        </div>
                        <p class="text-gray-400">per month</p>
                    </div>

                    <div class="bg-white border-2 border-gray-200 rounded-2xl p-8 space-y-6 text-left">
                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                            <span class="text-gray-600">Mortgage Amount</span>
                            <span class="font-bold text-lg">$<span x-text="principal.toLocaleString()"></span></span>
                        </div>

                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                            <span class="text-gray-600">Total Interest</span>
                            <span class="font-bold text-lg text-red-600">$<span x-text="Math.round(totalInterest).toLocaleString()"></span></span>
                        </div>

                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                            <span class="text-gray-600">Total Payment</span>
                            <span class="font-bold text-lg text-[#D4AF37]">$<span x-text="Math.round(monthlyPayment * amortization * 12).toLocaleString()"></span></span>
                        </div>

                        <a href="{{ url('/#contact') }}" class="block w-full bg-[#D4AF37] text-black hover:bg-[#F4D03F] py-4 text-center text-lg font-bold rounded-xl transition-all">
                            Get Pre-Approved Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Affordability Calculator -->
    <section class="py-20 bg-gray-50" x-data="{
        annualIncome: 100000,
        monthlyDebts: 500,
        downPayment: 100000,
        interestRate: 5.5,
        get maxMonthlyPayment() { return (this.annualIncome / 12) * 0.39 - this.monthlyDebts },
        get maxHomePrice() {
            const p = this.maxMonthlyPayment;
            const r = this.interestRate / 100 / 12;
            const n = 25 * 12;
            if (r === 0) return (p * n) + parseFloat(this.downPayment);
            const maxMortgage = p * (Math.pow(1 + r, n) - 1) / (r * Math.pow(1 + r, n));
            return maxMortgage + parseFloat(this.downPayment);
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-left">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="text-[#D4AF37]">Affordability</span> Calculator
                </h2>
                <p class="text-xl text-gray-600">
                    Find out how much home you can afford
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <!-- Calculator Form -->
                <div class="bg-white border-2 border-gray-200 rounded-2xl p-8">
                    <div class="space-y-6">
                        <div>
                            <label class="text-sm font-semibold mb-2 block">Annual Household Income</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold">$</span>
                                <input type="number" x-model="annualIncome" class="w-full h-14 pl-8 pr-4 text-lg border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl" />
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-semibold mb-2 block">Monthly Debt Payments</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold">$</span>
                                <input type="number" x-model="monthlyDebts" class="w-full h-14 pl-8 pr-4 text-lg border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl" />
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-semibold mb-2 block">Down Payment Available</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold">$</span>
                                <input type="number" x-model="downPayment" class="w-full h-14 pl-8 pr-4 text-lg border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl" />
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-semibold mb-2 block">Interest Rate (%)</label>
                            <input type="number" step="0.1" x-model="interestRate" class="w-full h-14 px-4 text-lg border-2 border-gray-300 hover:border-[#D4AF37] focus:border-[#D4AF37] focus:outline-none transition-colors rounded-xl" />
                        </div>
                    </div>
                </div>

                <!-- Results -->
                <div>
                    <div class="bg-gradient-to-br from-green-600 to-green-700 text-white rounded-2xl p-8 mb-6 text-left">
                        <h3 class="text-xl font-bold mb-6">Maximum Home Price</h3>
                        <div class="text-5xl font-bold mb-2">
                            $<span x-text="Math.round(maxHomePrice).toLocaleString()"></span>
                        </div>
                        <p class="text-green-100">Estimated budget based on your income</p>
                    </div>

                    <div class="bg-white border-2 border-gray-200 rounded-2xl p-8 space-y-6 text-left">
                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                            <span class="text-gray-600">Max Monthly Payment</span>
                            <span class="font-bold text-lg text-[#D4AF37]">$<span x-text="Math.round(maxMonthlyPayment).toLocaleString()"></span></span>
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 text-left">
                            <p class="text-sm text-gray-700">
                                <svg class="w-4 h-4 text-blue-600 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Based on a 39% gross debt service ratio
                            </p>
                        </div>

                        <a href="{{ url('/#contact') }}" class="block w-full bg-[#D4AF37] text-black hover:bg-[#F4D03F] py-4 text-center text-lg font-bold rounded-xl transition-all">
                            Find Properties in Your Range
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- All Tools List -->
    <section id="tools-section" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-left">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 text-center">
                    All <span class="text-[#D4AF37]">Tools & Resources</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto text-center">
                    Everything you need to make informed real estate decisions
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach([
                    ['title' => 'Mortgage Calculator', 'desc' => 'Calculate your monthly mortgage payments and see detailed breakdown of principal and interest.', 'icon' => 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z', 'badge' => 'Popular'],
                    ['title' => 'Affordability Calculator', 'desc' => 'Find out how much home you can afford based on your income and debts.', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'badge' => 'Essential'],
                    ['title' => 'Vancouver Floor Report', 'desc' => 'Get exclusive market insights and property valuations for Vancouver neighborhoods.', 'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'badge' => 'Premium'],
                    ['title' => 'Investment ROI Calculator', 'desc' => 'Calculate potential returns on investment properties including rental income.', 'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', 'badge' => 'New'],
                    ['title' => 'Market Trends Analyzer', 'desc' => 'Track real-time market trends and price movements in your target neighborhoods.', 'icon' => 'M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z', 'badge' => 'Premium'],
                    ['title' => 'Instant Property Valuation', 'desc' => 'Get an instant estimate of your property\'s current market value.', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'badge' => 'Popular']
                ] as $tool)
                <div class="bg-white border-2 border-gray-100 rounded-2xl p-8 hover:border-[#D4AF37] hover:shadow-xl transition-all duration-300 text-left relative">
                    <span class="absolute top-4 right-4 px-3 py-1 bg-[#D4AF37] text-black text-xs font-bold rounded-full">
                        {{ $tool['badge'] }}
                    </span>
                    <div class="w-16 h-16 bg-[#D4AF37]/10 text-[#D4AF37] rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $tool['icon'] }}"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">{{ $tool['title'] }}</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">{{ $tool['desc'] }}</p>
                    <a href="{{ url('/#contact') }}" class="block w-full bg-black text-white hover:bg-gray-900 py-3 text-center font-semibold rounded-xl transition-all flex items-center justify-center gap-2 group">
                        Access Tool
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-20 bg-gradient-to-br from-black via-gray-900 to-black text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-center">
                Need Help Getting <span class="text-[#D4AF37]">Started?</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Our expert team is ready to guide you through every step of your real estate journey.
            </p>
            <a href="{{ url('/#contact') }}" class="inline-block bg-[#D4AF37] text-black hover:bg-[#F4D03F] px-12 py-5 text-xl font-bold rounded-xl shadow-lg hover:shadow-xl transition-all">
                Talk to an Expert
            </a>
        </div>
    </section>
</div>
@endsection
