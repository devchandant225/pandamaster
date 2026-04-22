Symfony\Component\Routing\Exception\RouteNotFoundException
vendor/laravel/framework/src/Illuminate/Routing/UrlGenerator.php:528
Route [blog.index] not defined.

LARAVEL
12.56.0
PHP
8.3.30
UNHANDLED
CODE 0
500
GET
https://orionstarsbet.com/admin-login

Exception trace
2 vendor frames

route()
resources/views/components/header.blade.php:42

37                </a>
38                <a href="{{ route('contact') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
39                    Contact
40                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
41                </a>
42                <a href="{{ route('blog.index') }}" class="relative group py-2 text-gray-300 hover:text-yellow-500 transition-colors font-bold text-xs tracking-wider uppercase">
43                    Blog
44                    <span class="absolute bottom-0 le