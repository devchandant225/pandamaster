Symfony\Component\Routing\Exception\RouteNotFoundException
vendor/laravel/framework/src/Illuminate/Routing/UrlGenerator.php:528
Route [admin.game-categories.create] not defined.

LARAVEL
12.56.0
PHP
8.3.30
UNHANDLED
CODE 0
500
GET
https://orionstarsbet.com/dashboard

Exception trace
2 vendor frames

route()
resources/views/admin/dashboard.blade.php:200

195            <div class="text-4xl mb-4">🎮</div>
196            <h3 class="text-xl font-black text-yellow-500 mb-2">Add New Game</h3>
197            <p class="text-gray-400 text-sm">Expand your game library</p>
198        </a>
199
200        <a href="{{ route('admin.game-categories.create') }}" class="bg-gradient-to-br from-purple-500/10 to-purple-600/10 border-2 border-purple-500/30 p-8 rounded-2xl hover:border-purple-500 hover:shadow-2xl hover:shadow-purple-500/20 transition-all group">
201            <div class="text-4xl mb-4">📂</div>
202            <h3 class="text-xl font-black text-purple-500 mb-2">A