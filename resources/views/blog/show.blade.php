@extends('layouts.app')

@push('meta')
    <x-blog-meta-tags :post="$post" />
@endpush

@section('content')
<div class="min-h-screen bg-white">
    <!-- Main Content Section -->
    <article x-data="{}" class="py-12 bg-white text-left">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                
                <!-- Main Content - 2/3 -->
                <div class="lg:col-span-2">
                    <!-- Back Button -->
                    <a 
                        href="{{ url('/blog') }}"
                        class="inline-flex items-center gap-2 text-gray-600 hover:text-[#D4AF37] mb-8 transition-colors group"
                    >
                        <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Blog
                    </a>

                    <!-- Category & Meta -->
                    <div class="flex flex-wrap items-center gap-4 mb-6">
                        <span class="px-3 py-1 bg-[#D4AF37]/10 text-[#D4AF37] rounded-full text-sm font-semibold">
                            {{ $post->category->name ?? 'Market Analysis' }}
                        </span>
                        <span class="text-gray-300">•</span>
                        <span class="text-gray-600">{{ $post->read_time ?? '8 min read' }}</span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight text-gray-900">
                        {{ $post->title }}
                    </h1>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center gap-6 text-gray-600 mb-8 pb-8 border-b-2 border-gray-100">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span>By <span class="font-semibold text-black">{{ $post->author ?? '888Realty Team' }}</span></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        <button 
                            @click="window.dispatchEvent(new CustomEvent('open-share-modal'))"
                            class="flex items-center gap-2 text-gray-600 hover:text-[#D4AF37] transition-colors ml-auto"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                            Share
                        </button>
                    </div>

                    <!-- Featured Image -->
                    <div class="rounded-2xl overflow-hidden mb-12 shadow-xl aspect-video">
                        <img
                            src="{{ $post->image_url }}"
                            alt="{{ $post->title }}"
                            class="w-full h-full object-cover"
                        />
                    </div>

                    <!-- Content -->
                    <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
                        {!! $post->content !!}
                    </div>

                    <!-- FAQ Section -->
                    @if($post->faqs->count() > 0)
                    <div class="mt-24 pt-20 border-t border-gray-100">
                        <!-- FAQ Header -->
                        <div class="max-w-3xl mx-auto text-center mb-12">
                            <span class="inline-block px-4 py-1.5 mb-4 text-[10px] uppercase tracking-[0.2em] font-bold text-[#D4AF37] bg-[#D4AF37]/10 rounded-full">
                                Support & Knowledge
                            </span>
                            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">
                                Frequently Asked Questions
                            </h2>
                            <p class="text-gray-500 text-lg leading-relaxed">
                                Everything you need to know about this topic. Can't find the answer you're looking for? Reach out to our team.
                            </p>
                        </div>
                        
                        <!-- FAQ Accordion -->
                        <div class="max-w-3xl mx-auto">
                            <div class="space-y-4">
                                @foreach($post->faqs as $index => $faq)
                                <div class="faq-item group bg-white border border-gray-200 rounded-2xl transition-all duration-300 hover:border-[#D4AF37]/30 hover:shadow-xl hover:shadow-[#D4AF37]/5">
                                    <button 
                                        class="faq-question w-full px-6 py-5 md:px-8 md:py-6 text-left flex items-center justify-between gap-6 outline-none" 
                                        onclick="toggleFaq({{ $index }})" 
                                        aria-expanded="false"
                                    >
                                        <span class="font-bold text-gray-900 text-lg md:text-xl leading-snug group-hover:text-[#D4AF37] transition-colors duration-300">
                                            {{ $faq->question }}
                                        </span>
                                        <span class="faq-icon flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-gray-50 text-gray-400 group-hover:bg-[#D4AF37]/10 group-hover:text-[#D4AF37] transition-all duration-300">
                                            <svg class="w-5 h-5 transform transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    
                                    <div id="faq-answer-{{ $index }}" class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                                        <div class="px-6 pb-6 md:px-8 md:pb-8">
                                            <div class="pt-2 border-t border-gray-50">
                                                <p class="text-gray-600 leading-relaxed text-base md:text-lg">
                                                    {{ $faq->answer }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- FAQ Footer Note -->
                        <div class="mt-12 text-center">
                            <div class="inline-flex items-center gap-2 px-6 py-3 bg-gray-50 rounded-2xl border border-gray-100">
                                <span class="text-gray-500">Still have questions?</span>
                                <a href="{{ url('/#contact') }}" class="text-[#D4AF37] font-bold hover:text-black transition-colors">
                                    Contact our support team
                                    <svg class="inline-block w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar - 1/3 -->
                <aside class="lg:col-span-1 space-y-8">
                    
                    <!-- CTA Widget -->
                    <div class="bg-gradient-to-br from-black to-gray-900 text-white p-8 rounded-2xl shadow-xl sticky top-24 text-left">
                        <h3 class="text-2xl font-bold mb-4">Ready to Get Started?</h3>
                        <p class="text-gray-300 mb-6">
                            Connect with Vancouver's top realtors and get expert guidance for free
                        </p>
                        <a href="{{ url('/#contact') }}" class="block w-full bg-[#D4AF37] text-black hover:bg-[#F4D03F] py-3 text-center font-bold rounded-xl transition-all">
                            Get Matched Now →
                        </a>
                    </div>

                    <!-- Recent Posts -->
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 text-left">
                        <h3 class="text-xl font-bold mb-6">Recent Posts</h3>
                        <div class="space-y-6">
                            @foreach($recentPosts as $recent)
                            <a
                                href="{{ url('/blog/' . $recent->slug) }}"
                                class="block group"
                            >
                                <h4 class="font-semibold text-gray-900 group-hover:text-[#D4AF37] transition-colors mb-1 line-clamp-2">
                                    {{ $recent->title }}
                                </h4>
                                <p class="text-sm text-gray-500">{{ $recent->created_at->format('M d, Y') }}</p>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 text-left">
                        <h3 class="text-xl font-bold mb-6">Categories</h3>
                        <div class="space-y-3">
                            @foreach($categories as $category)
                            <a
                                href="{{ url('/blog?category=' . $category->slug) }}"
                                class="flex items-center justify-between group py-2"
                            >
                                <span class="text-gray-700 group-hover:text-[#D4AF37] transition-colors font-medium">
                                    {{ $category->name }}
                                </span>
                                <div class="flex items-center gap-3">
                                    <span class="text-xs font-bold bg-white text-gray-500 px-2 py-0.5 rounded-full border border-gray-100 group-hover:border-[#D4AF37]/30 group-hover:text-[#D4AF37] transition-all">
                                        {{ $category->posts_count }}
                                    </span>
                                    <svg class="w-4 h-4 text-gray-400 group-hover:text-[#D4AF37] group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </article>

    <x-share-modal :url="url()->current()" :title="$post->title" :image="$post->image_url" />

    <!-- Final CTA Section -->
    <section class="py-16 bg-gradient-to-r from-black to-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 text-center">
                Talk to a <span class="text-[#D4AF37]">Market Expert</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8">
                Get personalized advice on buying or selling in today's Vancouver market
            </p>
            
            <a href="{{ url('/#contact') }}" class="inline-block bg-[#D4AF37] text-black hover:bg-[#F4D03F] px-10 py-5 text-xl font-bold rounded-xl transition-all shadow-lg hover:shadow-xl">
                Get Matched Now →
            </a>
        </div>
    </section>
</div>

<style>
    /* FAQ Animation Styles */
    .faq-answer {
        max-height: 0;
        opacity: 0;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .faq-answer.active {
        opacity: 1;
    }
    
    .faq-icon svg {
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .faq-icon.rotated svg {
        transform: rotate(180deg);
    }
    
    .faq-item.active {
        border-color: rgba(212, 175, 55, 0.3);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(212, 175, 55, 0.02);
    }
    
    .faq-item.active .faq-icon {
        background-color: rgba(212, 175, 55, 0.1);
        color: #D4AF37;
    }

    .faq-item.active .faq-question span:first-child {
        color: #D4AF37;
    }
</style>

<script>
function toggleFaq(index) {
    const answer = document.getElementById(`faq-answer-${index}`);
    const question = answer.previousElementSibling;
    const icon = question.querySelector('.faq-icon');
    const faqItem = question.closest('.faq-item');
    const isActive = faqItem.classList.contains('active');
    
    // Close all FAQs except the one being toggled
    document.querySelectorAll('.faq-item').forEach((item, i) => {
        if (i !== index) {
            item.classList.remove('active');
            const otherAnswer = item.querySelector('.faq-answer');
            const otherIcon = item.querySelector('.faq-icon');
            const otherQuestion = item.querySelector('.faq-question');
            
            otherAnswer.classList.remove('active');
            otherAnswer.style.maxHeight = '0';
            otherIcon.classList.remove('rotated');
            otherQuestion.setAttribute('aria-expanded', 'false');
        }
    });
    
    // Toggle the clicked FAQ
    if (!isActive) {
        faqItem.classList.add('active');
        answer.classList.add('active');
        answer.style.maxHeight = answer.scrollHeight + 'px';
        icon.classList.add('rotated');
        question.setAttribute('aria-expanded', 'true');
    } else {
        faqItem.classList.remove('active');
        answer.classList.remove('active');
        answer.style.maxHeight = '0';
        icon.classList.remove('rotated');
        question.setAttribute('aria-expanded', 'false');
    }
}
</script>
@endsection
