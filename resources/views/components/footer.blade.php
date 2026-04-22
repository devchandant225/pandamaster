<footer class="bg-gray-950 text-gray-400 py-12 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <!-- Brand Section -->
            <div class="col-span-1 md:col-span-1">
                <a href="{{ url('/') }}" class="inline-block mb-6">
                    @if(isset($adminSettings) && $adminSettings->logo)
                        <img src="{{ Storage::url($adminSettings->logo) }}" alt="Orion Star" class="h-10 w-auto">
                    @else
                        <div class="text-2xl font-black tracking-tighter">
                            <span class="text-yellow-500 uppercase">Orion</span><span class="text-white uppercase">Star</span>
                        </div>
                    @endif
                </a>
                <p class="text-sm leading-relaxed mb-6 italic">
                    {{ $adminSettings->footer_description ?? ($adminSettings->description ?? 'Your premier destination for fish games, slots, and high-octane gaming thrills.') }}
                </p>
                <div class="flex gap-4">
                    @if(isset($adminSettings->facebook))
                        <a href="{{ $adminSettings->facebook }}" target="_blank" class="hover:text-yellow-500 transition-colors">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    @endif
                    @if(isset($adminSettings->whatsapp))
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $adminSettings->whatsapp) }}" target="_blank" class="hover:text-yellow-500 transition-colors">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Navigation -->
            <div>
                <h3 class="text-white font-black uppercase tracking-widest text-xs mb-6">Experience</h3>
                <ul class="space-y-4 text-sm font-bold">
                    <li><a href="{{ route('home') }}" class="hover:text-yellow-500 transition-colors uppercase">Home</a></li>
                    <li><a href="{{ route('orionstar.777') }}" class="hover:text-yellow-500 transition-colors uppercase">Orion Star 777</a></li>
                    <li><a href="{{ route('orionstar.download') }}" class="hover:text-yellow-500 transition-colors uppercase">Download</a></li>
                    <li><a href="{{ route('orionstar.play-online') }}" class="hover:text-yellow-500 transition-colors uppercase">Play Online</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="text-white font-black uppercase tracking-widest text-xs mb-6">Support</h3>
                <ul class="space-y-4 text-sm font-bold">
                    <li><a href="{{ route('contact') }}" class="hover:text-yellow-500 transition-colors uppercase">Contact Us</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-yellow-500 transition-colors uppercase">Latest News</a></li>
                    <li><a href="{{ route('admin.login') }}" class="hover:text-yellow-500 transition-colors uppercase">Admin Login</a></li>
                </ul>
            </div>

            <!-- Compliance -->
            <div>
                <h3 class="text-white font-black uppercase tracking-widest text-xs mb-6">Compliance</h3>
                <div class="flex items-center gap-2 mb-4 bg-white/5 p-3 rounded-xl border border-white/10">
                    <span class="text-2xl">🔞</span>
                    <span class="text-[10px] font-black uppercase leading-tight">Must be 18+ to play. Play responsibly.</span>
                </div>
                <div class="text-[10px] font-bold text-gray-500 uppercase tracking-widest leading-relaxed">
                    Licensed and Regulated. SSL Encrypted for your security.
                </div>
            </div>
        </div>

        <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 text-[10px] font-black uppercase tracking-[0.2em]">
            <p>&copy; {{ date('Y') }} Orion Star Official. All Rights Reserved.</p>
            <div class="flex gap-8">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
