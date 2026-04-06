<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GameCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameCategoryAdminController extends Controller
{
    /**
     * Display a listing of game categories.
     */
    public function index()
    {
        $categories = GameCategory::withCount('games')
            ->orderBy('sort_order')
            ->paginate(20);

        return view('admin.game-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.game-categories.create');
    }

    /**
     * Store a newly created category.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:game_categories,slug',
            'description' => 'nullable|string',
            'icon_url' => 'nullable|url',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $request->integer('sort_order', 0);

        GameCategory::create($validated);

        return redirect()->route('admin.game-categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(GameCategory $gameCategory)
    {
        return view('admin.game-categories.edit', compact('gameCategory'));
    }

    /**
     * Update the specified category.
     */
    public function update(Request $request, GameCategory $gameCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:game_categories,slug,' . $gameCategory->id,
            'description' => 'nullable|string',
            'icon_url' => 'nullable|url',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->boolean('is_active');

        $gameCategory->update($validated);

        return redirect()->route('admin.game-categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category.
     */
    public function destroy(GameCategory $gameCategory)
    {
        $gameCategory->delete();

        return redirect()->route('admin.game-categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
