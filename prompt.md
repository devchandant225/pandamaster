Illuminate\Database\QueryException
vendor/laravel/framework/src/Illuminate/Database/Connection.php:838
SQLSTATE[42S02]: Base table or view not found: 1146 Table 'orion.faqs' doesn't exist (Connection: mysql, Host: 127.0.0.1, Port: 3306, Database: orion, SQL: select * from `faqs` where `faqs`.`post_id` in (4) order by `sort_order` asc)

LARAVEL
12.56.0
PHP
8.2.30
UNHANDLED
CODE 42S02
500
GET
http://orionstars.joomni.com/blog/top-10-slot-strategies-for-maximum-wins-in-2026

Exception trace
16 vendor frames

Illuminate\Database\Eloquent\Builder->firstOrFail()
app/Http/Controllers/BlogController.php:37

32        return view('blog.index', compact('posts', 'categories', 'recentPosts'));
33    }
34
35    public function show($slug)
36    {
37        $post = Post::with(['category', 'faqs'])->where('slug', $slug)->firstOrFail();
38        $recentPosts = Post::latest()->where('id', '!=', $post->id)->take(5)->get();
39        $categories = Category::withCount('posts')->get();