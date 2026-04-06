<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameAdminController extends Controller
{
    /**
     * Display a listing of games.
     */
    public function index(Request $request)
    {
        $query = Game::with('gameCategory');

        // Search
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->has('category')) {
            $query->where('game_category_id', $request->category);
        }

        // Filter by status
        if ($request->has('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $games = $query->orderBy('created_at', 'desc')->paginate(20);
        $categories = GameCategory::all();

        return view('admin.games.index', compact('games', 'categories'));
    }

    /**
     * Show the form for creating a new game.
     */
    public function create()
    {
        $categories = GameCategory::all();
        return view('admin.games.create', compact('categories'));
    }

    /**
     * Store a newly created game.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'game_category_id' => 'required|exists:game_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:games,slug',
            'description' => 'nullable|string',
            'thumbnail_url' => 'required|url',
            'game_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'rtp' => 'nullable|numeric|between:0,100',
            'game_type' => 'required|in:slots,fish,keno,table,card,other',
            'is_hot' => 'boolean',
            'is_new' => 'boolean',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'features' => 'nullable|array',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_hot'] = $request->boolean('is_hot');
        $validated['is_new'] = $request->boolean('is_new');
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        Game::create($validated);

        return redirect()->route('admin.games.index')
            ->with('success', 'Game created successfully.');
    }

    /**
     * Show the form for editing the specified game.
     */
    public function edit(Game $game)
    {
        $categories = GameCategory::all();
        return view('admin.games.edit', compact('game', 'categories'));
    }

    /**
     * Update the specified game.
     */
    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'game_category_id' => 'required|exists:game_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:games,slug,' . $game->id,
            'description' => 'nullable|string',
            'thumbnail_url' => 'required|url',
            'game_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'rtp' => 'nullable|numeric|between:0,100',
            'game_type' => 'required|in:slots,fish,keno,table,card,other',
            'is_hot' => 'boolean',
            'is_new' => 'boolean',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'features' => 'nullable|array',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_hot'] = $request->boolean('is_hot');
        $validated['is_new'] = $request->boolean('is_new');
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        $game->update($validated);

        return redirect()->route('admin.games.index')
            ->with('success', 'Game updated successfully.');
    }

    /**
     * Remove the specified game.
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('admin.games.index')
            ->with('success', 'Game deleted successfully.');
    }

    /**
     * Toggle game active status.
     */
    public function toggleStatus(Game $game)
    {
        $game->update(['is_active' => !$game->is_active]);

        return back()->with('success', 'Game status updated.');
    }
}
