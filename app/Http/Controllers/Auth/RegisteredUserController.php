<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:user,agent'],
            'phone' => ['nullable', 'string', 'max:20'],
            'city' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
            'city' => $request->city,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Check if user was trying to access property details before signup
        $intendedUrl = session('intended_property_url');
        if ($intendedUrl) {
            session()->forget('intended_property_url');
            session()->forget('intended_property_type');
            return redirect($intendedUrl)->with('success', 'Account created! Property details unlocked.');
        }

        // Role-based redirect
        if ($user->isAgent()) {
            return redirect()->route('agent.leads');
        }

        return redirect()->route('dashboard');
    }
}
