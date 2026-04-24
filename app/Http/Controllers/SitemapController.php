<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Game;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')->latest()->get();
        $games = Game::where('is_active', true)->latest()->get();

        $staticUrls = [
            route('home'),
            route('about'),
            route('contact'),
            route('blog.index'),
            route('games.index'),
            route('orionstar.777'),
            route('orionstar.download'),
            route('orionstar.play-online'),
            route('privacy'),
            route('terms'),
            route('investors'),
            route('tools'),
        ];

        return response()->view('sitemap', compact('posts', 'games', 'staticUrls'))
            ->header('Content-Type', 'text/xml');
    }
}
