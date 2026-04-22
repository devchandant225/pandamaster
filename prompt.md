ParseError
resources/views/admin/profile.blade.php:18
syntax error, unexpected token "else", expecting end of file

LARAVEL
12.56.0
PHP
8.3.30
UNHANDLED
CODE 0
500
GET
https://orionstarsbet.com/admin/profile
Exception trace
Illuminate\Filesystem\Filesystem::Illuminate\Filesystem\{closure}()
resources/views/admin/profile.blade.php:18
13                <div class="relative group">
14                    <div class="w-32 h-32 rounded-[2.5rem] bg-gradient-to-br from-yellow-500 to-yellow-600 flex items-center justify-center text-black text-5xl font-black border-4 border-white/10 shadow-xl group-hover:scale-105 transition-transform duration-500 overflow-hidden">
15...
16                    <p class="text-gray-400 font-medium text-lg italic mb-6">Managing Orion Star Digital Assets</p>
17                            <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
18                        @else
19                            {{ substr($user->name, 0, 1) }}
20                        @endif