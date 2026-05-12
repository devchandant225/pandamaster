@extends('layouts.app')

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
                        class="inline-flex items-center gap-2 text-gray-500 hover:text-yellow-600 mb-8 transition-colors group"
                    >
                        <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Blog
                    </a>

                    <!-- Category & Meta -->
                    <div class="flex flex-wrap items-center gap-4 mb-6">
                        <span class="text-gray-500">{{ $post->read_time ?? '8 min read' }}</span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight text-gray-900">
                        {{ $post->title }}
                    </h1>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center gap-6 text-gray-500 mb-8 pb-8 border-b-2 border-gray-100">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span>By <span class="font-semibold text-gray-900">{{ $post->author ?? 'Panda Master VIP Team' }}</span></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div class="rounded-2xl overflow-hidden mb-12 shadow-xl aspect-video border border-gray-100">
                        <img
                            src="{{ $post->image_url }}"
                            alt="{{ $post->image_alt ?? $post->title }}"
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
                            <span class="inline-block px-4 py-1.5 mb-4 text-[10px] uppercase tracking-[0.2em] font-bold text-yellow-600 bg-yellow-50 rounded-full">
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
                                <div class="faq-item group bg-gray-50 border border-gray-200 rounded-2xl transition-all duration-300 hover:border-yellow-600/30 hover:shadow-xl hover:shadow-yellow-600/5">
                                    <button
                                        class="faq-question w-full px-6 py-5 md:px-8 md:py-6 text-left flex items-center justify-between gap-6 outline-none"
                                        onclick="toggleFaq({{ $index }})"
                                        aria-expanded="false"
                                    >
                                        <span class="font-bold text-gray-900 text-lg md:text-xl leading-snug group-hover:text-yellow-600 transition-colors duration-300">
                                            {{ $faq->question }}
                                        </span>
                                        <span class="faq-icon flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 text-gray-500 group-hover:bg-yellow-50 group-hover:text-yellow-600 transition-all duration-300">
                                            <svg class="w-5 h-5 transform transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </span>
                                    </button>

                                    <div id="faq-answer-{{ $index }}" class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                                        <div class="px-6 pb-6 md:px-8 md:pb-8">
                                            <div class="pt-2 border-t border-gray-200">
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
                            <div class="inline-flex items-center gap-2 px-6 py-3 bg-gray-50 rounded-2xl border border-gray-200">
                                <span class="text-gray-500">Still have questions?</span>
                                <a href="{{ route('contact') }}" class="text-yellow-600 font-bold hover:text-yellow-500 transition-colors">
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
                    <div class="bg-gradient-to-br from-yellow-500 to-purple-600 text-white p-8 rounded-2xl shadow-xl sticky top-24 text-left">
                        <h3 class="text-2xl font-bold mb-4">Ready to Win Big?</h3>
                        <p class="text-white/90 mb-6">
                            Get $1000 bonus when you sign up and start playing today!
                        </p>
                        <a href="{{ $adminSettings->register_url ?? '#' }}" class="block w-full bg-white text-gray-900 hover:bg-gray-100 py-3 text-center font-bold rounded-xl transition-all">
                            🎰 Join Now →
                        </a>
                    </div>

                    <!-- Recent Posts -->
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-left">
                        <h3 class="text-xl font-bold mb-6 text-gray-900">Recent Posts</h3>
                        <div class="space-y-6">
                            @foreach($recentPosts as $recent)
                            <a
                                href="{{ url('/blog/' . $recent->slug) }}"
                                class="block group"
                            >
                                <h4 class="font-semibold text-gray-900 group-hover:text-yellow-600 transition-colors mb-1 line-clamp-2">
                                    {{ $recent->title }}
                                </h4>
                                <p class="text-sm text-gray-500">{{ $recent->created_at->format('M d, Y') }}</p>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </article>

    <!-- Final CTA Section -->
    <section class="py-16 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 border-t border-gray-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 text-center">
                Ready to <span class="text-yellow-500">Play & Win?</span>
            </h2>
            <p class="text-xl text-gray-400 mb-8">
                Join thousands of players and start your winning journey today
            </p>

            <a href="{{ $adminSettings->register_url ?? '#' }}" class="inline-block bg-gradient-to-r from-yellow-500 to-purple-500 hover:from-yellow-400 hover:to-purple-400 text-white px-10 py-5 text-xl font-bold rounded-xl transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                🎰 Get $1000 Bonus →
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
