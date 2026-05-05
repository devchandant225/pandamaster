ErrorException
app/Http/Controllers/SitemapController.php:37
file_put_contents(/var/www/orionstars/public/sitemap.xml): Failed to open stream: Permission denied

LARAVEL
12.56.0
PHP
8.3.30
UNHANDLED
CODE 0
500
GET
https://orionstarsbet.com/generate-sitemap

Exception trace
file_put_contents()
app/Http/Controllers/SitemapController.php:37

32        ];
33
34        $content = view('sitemap', compact('posts', 'staticUrls'))->render();
35        
36        // Generate the physical sitemap.xml file in the public directory
37        file_put_contents(public_path('sitemap.xml'), $content);
38
39        return response($content)->header('Content-Type', 'text/xml');