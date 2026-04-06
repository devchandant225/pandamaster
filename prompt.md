InvalidArgumentException
vendor/laravel/framework/src/Illuminate/View/FileViewFinder.php:138
View [admin.games.index] not found.

LARAVEL
12.56.0
PHP
8.2.30
UNHANDLED
CODE 0
500
GET
http://orionstars.joomni.com/admin/games

Exception trace
4 vendor frames

view()
app/Http/Controllers/Admin/GameAdminController.php:38

33        }
34
35        $games = $query->orderBy('created_at', 'desc')->paginate(20);
36        $categories = GameCategory::all();
37
38        return view('admin.games.index', compact('games', 'categories'));
39    }
40
41    /**
42     * Show the form for creating a new game.