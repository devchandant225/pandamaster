<?php

namespace App\Http\Controllers;

use App\Models\LandingSection;
use App\Models\Game;
use Illuminate\Http\Request;

class PandaMasterController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function sevenSevenSeven()
    {
        return view('pandamaster.777');
    }

    public function download()
    {
        return view('pandamaster.download');
    }

    public function playOnline()
    {
        return view('pandamaster.play-online');
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

        // Here you would typically send an email or save to DB
        // For now, we just redirect back with success message

        return back()->with('success', 'Thank you for contacting Orion Stars! We will get back to you soon.');
    }
}
