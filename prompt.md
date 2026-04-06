Illuminate\Database\QueryException
vendor/laravel/framework/src/Illuminate/Database/Connection.php:838
SQLSTATE[42S02]: Base table or view not found: 1146 Table 'orion.categories' doesn't exist (Connection: mysql, Host: 127.0.0.1, Port: 3306, Database: orion, SQL: select `categories`.*, (select count(*) from `posts` where `categories`.`id` = `posts`.`category_id`) as `posts_count` from `categories`)

LARAVEL
12.56.0
PHP
8.2.30
UNHANDLED
CODE 42S02
500
GET
http://orionstars.joomni.com/blog

Exception trace
9 vendor frames

Illuminate\Database\Eloquent\Builder->get()
app/Http/Controllers/BlogController.php:29

24                  ->orWhere('content', 'like', '%' . $request->search . '%');
25            });
26        }
27
28        $posts = $query->paginate(9);
29        $categories = Category::withCount('posts')->get();
30        $recentPosts = Post::latest()->take(5)->get();