@extends('layouts.app')

@push('meta')
    <x-meta-tags page="blog" />
@endpush

@section('content')
<div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-black via-gray-900 to-black text-white py-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#D4AF37]/10 border border-[#D4AF37]/30 rounded-full text-sm text-[#D4AF37] font-semibold mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    Real Estate Insights & Market Updates
                </div>

                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    888Realty <span class="text-[#D4AF37]">Blog</span>
                </h1>

                <p class="text-xl md:text-2xl text-gray-300 mb-8">
                    Expert insights, market trends, and insider tips for Vancouver real estate
                </p>

                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto">
                    <form action="{{ url('/blog') }}" method="GET" class="relative">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <input
                            type="text"
                            name="search"
                            placeholder="Search articles..."
                            value="{{ request('search') }}"
                            class="w-full h-14 pl-12 pr-4 rounded-xl border-2 border-gray-700 bg-gray-900 text-white placeholder:text-gray-500 focus:border-[#D4AF37] focus:outline-none transition-colors"
                        />
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Filter -->
    <section class="py-8 bg-gray-50 border-b border-gray-200 sticky top-20 z-40 overflow-hidden text-left">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-hide">
                <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                <a
                    href="{{ url('/blog') }}"
                    class="px-6 py-2.5 rounded-xl font-semibold transition-all whitespace-nowrap {{ !request('category') ? 'bg-[#D4AF37] text-black shadow-lg' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200' }}"
                >
                    All
                </a>
                @foreach($categories as $category)
                <a
                    href="{{ url('/blog?category=' . $category->slug) }}"
                    class="px-6 py-2.5 rounded-xl font-semibold transition-all whitespace-nowrap {{ (request('category') == $category->slug) ? 'bg-[#D4AF37] text-black shadow-lg' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200' }}"
                >
                    {{ $category->name }} ({{ $category->posts_count }})
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold">Latest Articles</h2>
                <p class="text-gray-600">
                    Showing {{ $posts->count() }} articles
                </p>
            </div>

            @if($posts->isEmpty())
                <div class="text-center py-20">
                    <p class="text-xl text-gray-500">
                        No articles found. Try adjusting your search or category filter.
                    </p>
                </div>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                    <a
                        href="{{ url('/blog/' . $post->slug) }}"
                        class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 text-left"
                    >
                        <div class="relative h-64 overflow-hidden">
                            <img
                                src="{{ $post->image_url }}"
                                alt="{{ $post->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-[#D4AF37] text-black rounded-full text-[10px] uppercase font-bold tracking-wider">
                                    {{ $post->category->name ?? 'Real Estate' }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3 line-clamp-2 group-hover:text-[#D4AF37] transition-colors">
                                {{ $post->title }}
                            </h3>

                            <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                                {{ $post->excerpt }}
                            </p>

                            <div class="flex items-center gap-4 text-sm text-gray-500 pb-4 mb-4 border-b border-gray-200">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    <span>{{ $post->author ?? '888Realty Team' }}</span>
                                </div>
                                <span>{{ $post->read_time ?? '5 min read' }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">{{ $post->created_at->format('M d, Y') }}</span>
                                <div class="flex items-center gap-2 text-[#D4AF37] font-semibold group-hover:gap-3 transition-all">
                                    Read More
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </section>

    <!-- Newsletter CTA -->
    <section class="py-20 bg-gradient-to-br from-black via-gray-900 to-black text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#D4AF37]/10 border border-[#D4AF37]/30 rounded-full text-sm text-[#D4AF37] font-semibold mb-6">
                Stay Informed
            </div>

            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-center">
                Get Market Insights <span class="text-[#D4AF37]">Weekly</span>
            </h2>

            <p class="text-xl text-gray-300 mb-8">
                Subscribe to receive exclusive market reports, investment tips, and new listings
                directly in your inbox.
            </p>

            <form class="flex flex-col sm:flex-row gap-4 max-w-2xl mx-auto">
                <input
                    type="email"
                    placeholder="Enter your email address"
                    class="flex-1 h-14 px-6 rounded-xl border-2 border-gray-700 bg-gray-900 text-white placeholder:text-gray-500 focus:border-[#D4AF37] focus:outline-none transition-colors"
                />
                <button class="bg-[#D4AF37] text-black hover:bg-[#F4D03F] h-14 px-8 font-bold rounded-xl whitespace-nowrap transition-all">
                    Subscribe Now
                </button>
            </form>

            <p class="text-sm text-gray-400 mt-4">
                No spam. Unsubscribe anytime. We respect your privacy.
            </p>
        </div>
    </section>
</div>
@endsection
