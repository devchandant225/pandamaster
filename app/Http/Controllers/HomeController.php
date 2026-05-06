<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Post;
use App\Models\LandingSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $heroSection = LandingSection::getByKey('hero');
        $featuredGames = Game::active()->featured()->limit(4)->get();
        $hotGames = Game::active()->hot()->limit(4)->get();
        $newGames = Game::active()->new()->limit(4)->get();
        $latestPosts = Post::latest()->take(3)->get();

        return view('home', compact('heroSection', 'featuredGames', 'hotGames', 'newGames', 'latestPosts'));
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

        // For now, just simulate sending or log it
        // In a real app, you'd use Mail::to('devchandant225@gmail.com')->send(new ContactMail($request->all()));
        
        return back()->with('success', 'Thank you for your message! We will get back to you shortly.');
    }
}
