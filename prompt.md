Symfony\Component\Routing\Exception\RouteNotFoundException
vendor/laravel/framework/src/Illuminate/Routing/UrlGenerator.php:528
Route [contact] not defined.

LARAVEL
12.56.0
PHP
8.2.30
UNHANDLED
CODE 0
500
GET
http://orionstars.joomni.com/about

Exception trace
2 vendor frames

route()
resources/views/about.blade.php:32

27                <p class="text-xl md:text-2xl text-gray-300 mb-12 leading-relaxed">
28                    We're not just another real estate company. We're your trusted partner in navigating 
29                    Vancouver's dynamic property market with confidence and ease.
30                </p>
31
32                <a href="{{ route('contact') }}" class="inline-block bg-[#D4AF37] text-black hover:bg-[#F4D03F] px-12 py-6 text-xl font-bold rounded-xl shadow-lg hover:shadow-xl transition-all">
33                    Get Started Today
34                </a>
35            </div>
36        </div>
37    </section>