<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\Player;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $totalPlayers = User::where('role', '!=', 'admin')->count();
        $activePlayers = Player::whereNotNull('last_login_at')->where('last_login_at', '>=', now()->subDays(7))->count();
        $totalGames = Game::count();
        $activeGames = Game::where('is_active', true)->count();
        
        $totalDeposits = Transaction::where('type', 'deposit')->where('status', 'completed')->sum('amount');
        $totalWithdrawals = Transaction::where('type', 'withdrawal')->where('status', 'completed')->sum('amount');
        
        $recentPlayers = Player::with('user')->latest('last_login_at')->take(5)->get();
        $topPlayers = Player::orderBy('total_wagered', 'desc')->with('user')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPlayers',
            'activePlayers',
            'totalGames',
            'activeGames',
            'totalDeposits',
            'totalWithdrawals',
            'recentPlayers',
            'topPlayers'
        ));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return redirect()->route('admin.dashboard');
        }

        $players = Player::whereHas('user', function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('email', 'LIKE', "%{$query}%");
            })->with('user')->take(10)->get();

        $games = Game::where('title', 'LIKE', "%{$query}%")
            ->latest()
            ->take(10)
            ->get();

        $posts = \App\Models\Post::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->latest()
            ->take(10)
            ->get();

        return view('admin.search-results', compact('query', 'players', 'games', 'posts'));
    }
}
