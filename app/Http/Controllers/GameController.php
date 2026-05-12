<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of all games.
     */
    public function index(Request $request)
    {
        $query = Game::active();

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
        $types = ['slots', 'fish', 'keno', 'table', 'card', 'other'];

        return view('games.index', compact('games', 'types'));
    }

    /**
     * Display the specified game.
     */
    public function show(string $slug)
    {
        $game = Game::active()
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment play count
        $game->incrementPlayCount();

        // Get related games based on type
        $relatedGames = Game::active()
            ->where('game_type', $game->game_type)
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
