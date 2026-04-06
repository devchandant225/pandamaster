ParseError
resources/views/components/hero-section.blade.php:65
Unclosed '[' does not match ')'

LARAVEL
12.56.0
PHP
8.2.30
UNHANDLED
CODE 0
500
GET
http://orionstars.joomni.com

Exception trace
Illuminate\Filesystem\Filesystem::Illuminate\Filesystem\{closure}()
resources/views/components/hero-section.blade.php:65

60                    @php
61                        $titleParts = explode(' ', $heroSection->title);
62                        $colors = ['text-yellow-500', 'text-pink-500', 'text-white'];
63                    @endphp
64                    @foreach($titleParts as $index => $word)
65                        <span class="{{ $colors[$index % count($colors) }}">{{ $word }}</span>@if(!$loop->last) @endif
66                    @endforeach
67                </h1>
68            @endif