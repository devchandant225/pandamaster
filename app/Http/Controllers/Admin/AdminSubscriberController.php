<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class AdminSubscriberController extends Controller
{
    /**
     * Display a listing of subscribers.
     */
    public function index(Request $request)
    {
        $query = Subscriber::query();

        if ($request->has('search')) {
            $query->where('email', 'like', '%' . $request->search . '%');
        }

        $subscribers = $query->latest()->paginate(20);

        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Show the form for creating a new subscriber.
     */
    public function create()
    {
        return view('admin.subscribers.create');
    }

    /**
     * Store a newly created subscriber.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:subscribers,email',
            'is_active' => 'boolean',
        ]);

        Subscriber::create($validated);

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber added successfully.');
    }

    /**
     * Show the form for editing the specified subscriber.
     */
    public function edit(Subscriber $subscriber)
    {
        return view('admin.subscribers.edit', compact('subscriber'));
    }

    /**
     * Update the specified subscriber.
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:subscribers,email,' . $subscriber->id,
            'is_active' => 'boolean',
        ]);

        $subscriber->update($validated);

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber updated successfully.');
    }

    /**
     * Remove the specified subscriber.
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber removed successfully.');
    }

    /**
     * Toggle subscriber status.
     */
    public function toggleStatus(Subscriber $subscriber)
    {
        $subscriber->update(['is_active' => !$subscriber->is_active]);

        return back()->with('success', 'Subscriber status updated.');
    }
}
