@extends('layouts.app')

@section('title', 'Contact Panda Master - Get in Touch with Us')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-gray-950 border-b border-white/5">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(234,179,8,0.1)_0%,rgba(0,0,0,1)_100%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-black mb-8 leading-tight animate-fade-in-up uppercase tracking-tighter">
                Get in Touch with <span class="text-yellow-500">Panda Master</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-12 max-w-4xl mx-auto font-medium leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                Have questions about our games, bonuses, or VIP program? Our team is here to help you 24/7. Reach out to us using the form below or through our social channels.
            </p>
        </div>
    </section>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Contact Form -->
                <div class="bg-gray-900 border border-white/5 p-8 md:p-12 rounded-[3rem] shadow-2xl">
                    <h2 class="text-3xl font-black mb-8 uppercase tracking-tighter">Send us a Message</h2>
                    
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2 ml-4">Full Name</label>
                                <input type="text" name="name" required class="w-full px-6 py-4 bg-gray-950 border border-white/10 rounded-2xl focus:outline-none focus:border-yellow-500 transition-all text-white font-bold" placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2 ml-4">Email Address</label>
                                <input type="email" name="email" required class="w-full px-6 py-4 bg-gray-950 border border-white/10 rounded-2xl focus:outline-none focus:border-yellow-500 transition-all text-white font-bold" placeholder="john@example.com">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2 ml-4">Subject</label>
                            <input type="text" name="subject" required class="w-full px-6 py-4 bg-gray-950 border border-white/10 rounded-2xl focus:outline-none focus:border-yellow-500 transition-all text-white font-bold" placeholder="How can we help?">
                        </div>
                        <div>
                            <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2 ml-4">Message</label>
                            <textarea name="message" rows="5" required class="w-full px-6 py-4 bg-gray-950 border border-white/10 rounded-2xl focus:outline-none focus:border-yellow-500 transition-all text-white font-bold" placeholder="Write your message here..."></textarea>
                        </div>
                        <button type="submit" class="w-full py-6 bg-yellow-500 text-black text-xl font-black rounded-2xl hover:bg-yellow-400 transition-all transform hover:-translate-y-1 shadow-lg uppercase tracking-tighter">
                            Send Message →
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="space-y-12">
                    <div>
                        <h2 class="text-3xl font-black mb-8 uppercase tracking-tighter">Contact Information</h2>
                        <p class="text-gray-400 text-lg mb-8">Feel free to reach out to us through any of the following channels. We're always ready to assist our players.</p>
                        
                        <div class="space-y-6">
                            @if($adminSettings->email)
                            <div class="flex items-start gap-6">
                                <div class="w-12 h-12 bg-yellow-500/10 border border-yellow-500/20 rounded-xl flex items-center justify-center text-yellow-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-black uppercase tracking-widest text-sm">Email Us</h3>
                                    <p class="text-gray-400 font-bold">{{ $adminSettings->email }}</p>
                                </div>
                            </div>
                            @endif

                            @if($adminSettings->phone)
                            <div class="flex items-start gap-6">
                                <div class="w-12 h-12 bg-purple-500/10 border border-purple-500/20 rounded-xl flex items-center justify-center text-purple-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-black uppercase tracking-widest text-sm">Call Us</h3>
                                    <p class="text-gray-400 font-bold">{{ $adminSettings->phone }}</p>
                                </div>
                            </div>
                            @endif

                            @if($adminSettings->telegram)
                            <div class="flex items-start gap-6">
                                <div class="w-12 h-12 bg-blue-500/10 border border-blue-500/20 rounded-xl flex items-center justify-center text-blue-500">
                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.891 8.146l-2.003 9.442c-.149.659-.539.822-1.089.511l-3.048-2.246-1.47 1.415c-.163.163-.299.299-.614.299l.219-3.104 5.65-5.103c.245-.218-.054-.339-.379-.122l-6.983 4.397-3.006-.939c-.654-.205-.666-.654.136-.967l11.741-4.524c.544-.197 1.02.129.846.636z"/></svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-black uppercase tracking-widest text-sm">Telegram</h3>
                                    <p class="text-gray-400 font-bold">
                                        <a href="{{ $adminSettings->telegram }}" target="_blank" class="hover:text-blue-400 transition-colors">Join Channel</a>
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-black mb-6 uppercase tracking-tighter">Follow Our Community</h3>
                        <div class="flex flex-wrap gap-4">
                            @if($adminSettings->facebook)
                            <a href="{{ $adminSettings->facebook }}" target="_blank" class="w-12 h-12 bg-gray-900 border border-white/10 rounded-xl flex items-center justify-center hover:bg-blue-600 hover:border-blue-600 transition-all group">
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            @endif
                            @if($adminSettings->twitter)
                            <a href="{{ $adminSettings->twitter }}" target="_blank" class="w-12 h-12 bg-gray-900 border border-white/10 rounded-xl flex items-center justify-center hover:bg-black hover:border-gray-700 transition-all group">
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                            </a>
                            @endif
                            @if($adminSettings->instagram)
                            <a href="{{ $adminSettings->instagram }}" target="_blank" class="w-12 h-12 bg-gray-900 border border-white/10 rounded-xl flex items-center justify-center hover:bg-pink-600 hover:border-pink-600 transition-all group">
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { opacity: 0; animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
</style>
@endsection
