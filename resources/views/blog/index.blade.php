@extends('layouts.app')


@section('content')
<div class="min-h-screen bg-gray-900">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-20 overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 opacity-10">
            @for($i = 0; $i < 30; $i++)
                <div class="absolute w-1 h-1 bg-yellow-500 rounded-full animate-twinkle" 
                     style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 3000) }}ms;"></div>
            @endfor
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-500/10 border border-yellow-500/30 rounded-full text-sm text-yellow-500 font-semibold mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    Gaming Tips & Strategy Updates
                </div>

                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    <span class="text-yellow-500">Orion</span> <span class="text-purple-500">Star</span> <span class="text-white">Blog</span>
                </h1>

                <p class="text-xl md:text-2xl text-gray-300 mb-8">
                    Expert strategies, game guides, and winning tips for smart players
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
                            class="w-full h-14 pl-12 pr-4 rounded-xl border-2 border-gray-700 bg-gray-800 text-white placeholder:text-gray-500 focus:border-yellow-500 focus:outline-none transition-colors"
                        />
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-white">Latest Articles</h2>
                <p class="text-gray-400">
                    Showing {{ $posts->count() }} articles
                </p>
            </div>

            @if($posts->isEmpty())
                <div class="text-center py-20">
                    <div class="text-6xl mb-4">📝</div>
                    <p class="text-xl text-gray-400">
                        No articles found. Try adjusting your search.
                    </p>
                </div>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                    <a
                        href="{{ url('/blog/' . $post->slug) }}"
                        class="group bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 text-left border border-gray-700 hover:border-yellow-500"
                    >
                        <div class="relative h-64 overflow-hidden">
                            <img
                                src="{{ $post->image_url }}"
                                alt="{{ $post->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3 line-clamp-2 group-hover:text-yellow-500 transition-colors text-white">
                                {{ $post->title }}
                            </h3>

                            <p class="text-gray-400 mb-4 line-clamp-3 leading-relaxed">
                                {{ $post->excerpt }}
                            </p>

                            <div class="flex items-center gap-4 text-sm text-gray-500 pb-4 mb-4 border-b border-gray-700">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    <span>{{ $post->author ?? 'Orion Star VIP Team' }}</span>
                                </div>
                                <span>{{ $post->read_time ?? '5 min read' }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">{{ $post->created_at->format('M d, Y') }}</span>
                                <div class="flex items-center gap-2 text-yellow-500 font-semibold group-hover:gap-3 transition-all">
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
    <section class="py-20 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-500/10 border border-yellow-500/30 rounded-full text-sm text-yellow-500 font-semibold mb-6">
                🎮 Level Up Your Game
            </div>

            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-center">
                Get Winning Strategies <span class="text-yellow-500">Weekly</span>
            </h2>

            <p class="text-xl text-gray-300 mb-8">
                Subscribe to receive exclusive game guides, bonus offers, and pro tips
                directly in your inbox.
            </p>

            <form class="flex flex-col sm:flex-row gap-4 max-w-2xl mx-auto">
                <input
                    type="email"
                    placeholder="Enter your email address"
                    class="flex-1 h-14 px-6 rounded-xl border-2 border-gray-700 bg-gray-800 text-white placeholder:text-gray-500 focus:border-yellow-500 focus:outline-none transition-colors"
                />
                <button class="bg-gradient-to-r from-yellow-500 to-purple-500 hover:from-yellow-400 hover:to-purple-400 text-white h-14 px-8 font-bold rounded-xl whitespace-nowrap transition-all shadow-lg">
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
