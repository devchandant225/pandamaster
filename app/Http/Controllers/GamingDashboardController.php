<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamingDashboardController extends Controller
{
    /**
     * Display the gaming dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        
        // Get or create player profile
        $player = $user->player;
        if (!$player) {
            $player = \App\Models\Player::create([
                'user_id' => $user->id,
                'balance' => 1000.00, // Starting bonus
                'bonus_coins' => 500.00,
            ]);
        }

        // Get featured games
        $featuredGames = Game::active()->featured()->with('gameCategory')->limit(8)->get();
        
        // Get hot games
        $hotGames = Game::active()->hot()->with('gameCategory')->limit(8)->get();
        
        // Get new games
        $newGames = Game::active()->new()->with('gameCategory')->limit(8)->get();
        
        // Get recent games (by play count)
        $popularGames = Game::active()->orderBy('play_count', 'desc')->with('gameCategory')->limit(8)->get();

        // Get recent transactions
        $recentTransactions = Transaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('dashboard.gaming', compact(
            'player',
            'featuredGames',
            'hotGames',
            'newGames',
            'popularGames',
            'recentTransactions'
        ));
    }

    /**
     * Display user profile for gaming platform.
     */
    public function profile()
    {
        $user = Auth::user();
        $player = $user->player;
        
        if (!$player) {
            $player = \App\Models\Player::create([
                'user_id' => $user->id,
                'balance' => 1000.00,
                'bonus_coins' => 500.00,
            ]);
        }

        return view('dashboard.profile', compact('player'));
    }

    /**
     * Update user profile.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'avatar_url' => 'nullable|url',
        ]);

        $user->update($validated);

        return back()->with('success', 'Profile updated successfully.');
    }
}
