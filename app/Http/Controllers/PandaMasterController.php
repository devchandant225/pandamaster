<?php

namespace App\Http\Controllers;

use App\Models\LandingSection;
use App\Models\Game;
use Illuminate\Http\Request;

class PandaMasterController extends Controller
{
    public function index()
    {
        $heroSection = LandingSection::getByKey('hero');
        $featuredGames = Game::active()->featured()->limit(4)->get();
        $hotGames = Game::active()->hot()->limit(4)->get();
        $newGames = Game::active()->new()->limit(4)->get();

        return view('home', compact('heroSection', 'featuredGames', 'hotGames', 'newGames'));
    }

    public function sevenSevenSeven()
    {
        return view('pandamaster.777');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function download()
    {
        return view('pandamaster.download');
    }

    public function playOnline()
    {
        return view('pandamaster.play-online');
    }

    public function casino()
    {
        return view('pandamaster.casino');
    }
}
