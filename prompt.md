Illuminate\Contracts\Container\BindingResolutionException
vendor/laravel/framework/src/Illuminate/Container/Container.php:1124
Target class [App\Http\Controllers\PandaMasterController] does not exist.

LARAVEL
12.56.0
PHP
8.3.30
UNHANDLED
CODE 0
500
GET
https://orionstarsbet.com

Exception trace
52 vendor frames

Illuminate\Foundation\Application->handleRequest()
public/index.php:20

15
16// Bootstrap Laravel and handle the request...
17/** @var Application $app */
18$app = require_once __DIR__.'/../bootstrap/app.php';
19
20$app->handleRequest(Request::capture());
21
