<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredGames = Game::active()->featured()->with('gameCategory')->limit(4)->get();
        $hotGames = Game::active()->hot()->with('gameCategory')->limit(4)->get();
        $newGames = Game::active()->new()->with('gameCategory')->limit(4)->get();
        $latestPosts = Post::latest()->take(3)->get();

        return view('home', compact('featuredGames', 'hotGames', 'newGames', 'latestPosts'));
    }
}
