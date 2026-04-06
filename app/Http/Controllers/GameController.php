<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameCategory;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of all games.
     */
    public function index(Request $request)
    {
        $query = Game::active()->with('gameCategory');

        // Filter by category
        if ($request->has('category')) {
            $query->whereHas('gameCategory', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by game type
        if ($request->has('type')) {
            $query->where('game_type', $request->type);
        }

        // Search by title
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Sort
        $sortBy = $request->get('sort', 'featured');
        match ($sortBy) {
            'newest' => $query->latest(),
            'popular' => $query->orderBy('play_count', 'desc'),
            'rtp' => $query->orderBy('rtp', 'desc'),
            default => $query->orderBy('is_featured', 'desc')->orderBy('title')
        };

        $games = $query->paginate(24);
        $categories = GameCategory::where('is_active', true)->orderBy('sort_order')->get();

        return view('games.index', compact('games', 'categories'));
    }

    /**
     * Display the specified game.
     */
    public function show(string $slug)
    {
        $game = Game::active()
            ->where('slug', $slug)
            ->with('gameCategory')
            ->firstOrFail();

        // Increment play count
        $game->incrementPlayCount();

        // Get related games
        $relatedGames = Game::active()
            ->where('game_category_id', $game->game_category_id)
            ->where('id', '!=', $game->id)
            ->inRandomOrder()
            ->limit(6)
            ->get();

        return view('games.show', compact('game', 'relatedGames'));
    }

    /**
     * Launch game in real mode.
     */
    public function play(string $slug)
    {
        $game = Game::active()->where('slug', $slug)->firstOrFail();

        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'Please login to play.');
        }

        // Check if player has sufficient balance
        $player = auth()->user()->player;
        if (!$player || $player->balance <= 0) {
            return redirect()->route('dashboard')->with('error', 'Insufficient balance. Please make a deposit.');
        }

        return redirect()->away($game->game_url);
    }

    /**
     * Launch game in demo mode.
     */
    public function demo(string $slug)
    {
        $game = Game::active()->where('slug', $slug)->firstOrFail();

        if (!$game->demo_url) {
            return redirect()->route('games.show', $slug)->with('error', 'Demo mode not available.');
        }

        return redirect()->away($game->demo_url);
    }
}
