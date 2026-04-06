@extends('layouts.app')

@section('title', 'Success - 888Realty')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center py-20 px-4">
    <!-- Main Card -->
    <div class="max-w-3xl w-full bg-white rounded-[3rem] shadow-2xl overflow-hidden border border-gray-100 relative">
        <!-- Aesthetic Background Elements -->
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-[#D4AF37]/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-black/5 rounded-full blur-3xl"></div>

        <!-- Success Header -->
        <div class="bg-black p-12 md:p-16 text-center text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-black via-gray-900 to-black opacity-50"></div>
            <div class="relative z-10">
                <div class="w-24 h-24 bg-[#D4AF37] rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-[0_0_30px_rgba(212,175,55,0.3)] transform rotate-12 hover:rotate-0 transition-transform duration-500">
                    <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl font-black mb-4 tracking-tight">Success!</h1>
                <p class="text-xl text-[#D4AF37] font-bold uppercase tracking-widest text-sm mb-4">Request Successfully Processed</p>
                <p class="text-gray-400 text-lg max-w-lg mx-auto leading-relaxed">
                    Thank you, <span class="text-white font-bold">{{ session('lead_name', 'valued client') }}</span>. Your inquiry has been prioritized and assigned to our matching specialists.
                </p>
            </div>
        </div>
        
        <div class="p-10 md:p-16 relative z-10">
            <!-- Process Timeline -->
            <div class="mb-16">
                <h2 class="text-xs font-black text-gray-400 uppercase tracking-[0.3em] text-center mb-10">The 888Realty Experience: What to Expect</h2>
                <div class="grid md:grid-cols-3 gap-10">
                    <div class="text-center group">
                        <div class="w-14 h-14 bg-gray-50 text-gray-400 group-hover:bg-[#D4AF37]/10 group-hover:text-[#D4AF37] rounded-2xl flex items-center justify-center mx-auto mb-5 transition-all duration-300 border border-gray-100 group-hover:border-[#D4AF37]/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                        <h3 class="font-black text-gray-900 mb-2 uppercase tracking-tighter">Analysis</h3>
                        <p class="text-xs text-gray-500 leading-relaxed uppercase font-bold">Our team analyzes your specific lifestyle & financial requirements.</p>
                    </div>
                    <div class="text-center group">
                        <div class="w-14 h-14 bg-gray-50 text-gray-400 group-hover:bg-[#D4AF37]/10 group-hover:text-[#D4AF37] rounded-2xl flex items-center justify-center mx-auto mb-5 transition-all duration-300 border border-gray-100 group-hover:border-[#D4AF37]/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="font-black text-gray-900 mb-2 uppercase tracking-tighter">Selection</h3>
                        <p class="text-xs text-gray-500 leading-relaxed uppercase font-bold">We identify the Top 1% specialist best suited for your target market.</p>
                    </div>
                    <div class="text-center group">
                        <div class="w-14 h-14 bg-gray-50 text-gray-400 group-hover:bg-[#D4AF37]/10 group-hover:text-[#D4AF37] rounded-2xl flex items-center justify-center mx-auto mb-5 transition-all duration-300 border border-gray-100 group-hover:border-[#D4AF37]/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        </div>
                        <h3 class="font-black text-gray-900 mb-2 uppercase tracking-tighter">Engagement</h3>
                        <p class="text-xs text-gray-500 leading-relaxed uppercase font-bold">Expect a personal reach-out from your matched expert within 24 hours.</p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="flex flex-col items-center gap-6">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 px-12 py-5 bg-black text-white font-black uppercase tracking-widest text-xs rounded-2xl hover:bg-gray-800 transition-all shadow-xl shadow-black/10 transform hover:-translate-y-1 active:scale-95">
                    Return to Experience
                    <svg class="w-4 h-4 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                
                <div class="flex items-center gap-4 text-gray-400">
                    <div class="h-px w-8 bg-gray-200"></div>
                    <span class="text-[10px] font-black uppercase tracking-widest">Or explore further</span>
                    <div class="h-px w-8 bg-gray-200"></div>
                </div>

                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('property.type', ['type' => 'all']) }}" class="px-6 py-3 bg-white border border-gray-200 text-gray-600 font-bold rounded-xl text-sm hover:border-[#D4AF37] hover:text-[#D4AF37] transition-all">
                        Browse Listings
                    </a>
                    <a href="{{ route('blog.index') }}" class="px-6 py-3 bg-white border border-gray-200 text-gray-600 font-bold rounded-xl text-sm hover:border-[#D4AF37] hover:text-[#D4AF37] transition-all">
                        Market Insights
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Support Footer -->
    <div class="mt-12 text-center">
        <p class="text-gray-400 text-sm font-medium">Urgent inquiry? Call our concierge at <span class="text-gray-900 font-bold">250 552 6542</span></p>
    </div>
</div>
@endsection
