Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException
vendor/laravel/framework/src/Illuminate/Routing/AbstractRouteCollection.php:130
The DELETE method is not supported for route admin/profile. Supported methods: GET, HEAD, PUT.

LARAVEL
12.56.0
PHP
8.3.30
UNHANDLED
CODE 0
405
DELETE
https://orionstarsbet.com/admin/profile
Exception trace
31 vendor frames
Illuminate\Foundation\Application->handleRequest()
public/index.php:20
15
16// Bootstrap Laravel and handle the request...
17/** @var Application $app */
18$app = require_once __DIR__.'/../bootstrap/app.php';
19
20$app->handleRequest(Request::capture());
21