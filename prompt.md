Symfony\Component\Routing\Exception\RouteNotFoundException
vendor/laravel/framework/src/Illuminate/Routing/UrlGenerator.php:528
Route [orionstar.login] not defined.

LARAVEL
12.56.0
PHP
8.3.30
UNHANDLED
CODE 0
500
GET
https://orionstarsbet.com/orion-stars-fish-games
Exception trace
2 vendor frames
route()
resources/views/orionstar/fish-games.blade.php:107
102                        @endforeach
103                    </ul>
104                    
105                    <div class="mt-8 p-6 bg-blue-600 rounded-2xl text-center">
106                        <p class="text-white font-black text-xl italic mb-4">READY TO HUNT?</p>
107                        <a href="{{ route('orionstar.login') }}" class="block w-full py-4 bg-black text-white font-black rounded-xl uppercase tracking-widest hover:bg-gray-800 transition-colors">LOGIN NOW</a>
108                    </div>
109                </div>
110
111                <!-- Related Categories -->
112                <div class="bg-gray-900/