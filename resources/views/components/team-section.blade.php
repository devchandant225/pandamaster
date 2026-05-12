@php
    $members = \App\Models\TeamMember::orderBy('sort_order')->get();
@endphp

@if($members->count() > 0)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-center">
                Meet Our <span class="text-[#D4AF37]">Leadership Team</span>
            </h2>
            <p class="text-xl text-gray-600">
                Experienced professionals dedicated to your success
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($members as $member)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all hover:-translate-y-2 text-left flex flex-col h-full">
                    <div class="relative h-80">
                        @if($member->image_path)
                            <img src="{{ Storage::url($member->image_path) }}" alt="{{ $member->name }}" class="w-full h-full object-cover" />
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        
                        <!-- Social Icons -->
                        <div class="absolute bottom-4 right-4 flex gap-2">
                            @if($member->linkedin_url)
                                <a href="{{ $member->linkedin_url }}" target="_blank" class="w-8 h-8 bg-white/20 hover:bg-[#D4AF37] backdrop-blur-md rounded-full flex items-center justify-center text-white transition-all">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-2xl font-bold mb-1">{{ $member->name }}</h3>
                        <div class="text-[#D4AF37] font-semibold mb-3">{{ $member->role }}</div>
                        @if($member->bio)
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $member->bio }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
