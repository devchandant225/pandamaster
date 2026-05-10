<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Store a new subscriber.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:subscribers,email',
        ], [
            'email.unique' => 'You are already subscribed to our newsletter!',
        ]);

        Subscriber::create([
            'email' => $validated['email'],
            'is_active' => true,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing!',
            ]);
        }

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}
