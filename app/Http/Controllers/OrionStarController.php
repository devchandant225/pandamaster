<?php

namespace App\Http\Controllers;

use App\Models\LandingSection;
use App\Models\Game;
use Illuminate\Http\Request;

class OrionStarController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function sevenSeven()
    {
        return view('orionstar.777');
    }

    public function download()
    {
        return view('orionstar.download');
    }

    public function playOnline()
    {
        return view('orionstar.play-online');
    }

    public function fishGames()
    {
        return view('orionstar.fish-games');
    }

    public function slotGames()
    {
        return view('orionstar.slot-games');
    }

    public function tableGames()
    {
        return view('orionstar.table-games');
    }

    public function keno()
    {
        return view('orionstar.keno');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function terms()
    {
        return view('terms');
    }

    public function login()
    {
        return view('orionstar.login');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        return back()->with('success', 'Thank you for contacting Orion Star! We will get back to you soon.');
    }
}
