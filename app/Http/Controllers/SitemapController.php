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

        $staticUrls = [
            route('home'),
            route('about'),
            route('contact'),
            route('blog.index'),
            route('games.index'),
            route('orionstar.777'),
            route('orionstar.download'),
            route('orionstar.play-online'),
            route('orionstar.fish-games'),
            route('orionstar.slot-games'),
            route('orionstar.table-games'),
            route('orionstar.keno'),
            route('privacy'),
            route('terms'),
            route('investors'),
            route('tools'),
        ];

        $content = view('sitemap', compact('posts', 'staticUrls'))->render();
        
        // Generate the physical sitemap.xml file in the public directory
        file_put_contents(public_path('sitemap.xml'), $content);

        return response($content)->header('Content-Type', 'text/xml');
    }
}
