<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AdminProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Lenient validation: everything is nullable and simple strings
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'viber' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'pinterest' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'login_url' => 'nullable|string|max:255',
            'register_url' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|string|max:255',
            'external_dashboard_url' => 'nullable|string|max:255',
            'footer_description' => 'nullable|string',
            'robots_txt' => 'nullable|string',
            'header_scripts' => 'nullable|string',
            'footer_scripts' => 'nullable|string',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:4096',
            'favicon' => 'nullable|mimes:png,jpg,jpeg,svg,webp,ico|max:2048',
            'avatar_url' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($user->logo) {
                Storage::disk('public')->delete($user->logo);
            }
            $validated['logo'] = $request->file('logo')->store('branding', 'public');
        }

        if ($request->hasFile('favicon')) {
            if ($user->favicon) {
                Storage::disk('public')->delete($user->favicon);
            }
            $validated['favicon'] = $request->file('favicon')->store('branding', 'public');
        }

        if ($request->hasFile('avatar_url')) {
            if ($user->avatar_url && !str_starts_with($user->avatar_url, 'http')) {
                Storage::disk('public')->delete($user->avatar_url);
            }
            $path = $request->file('avatar_url')->store('avatars', 'public');
            $validated['avatar_url'] = Storage::url($path);
        }

        $user->update($validated);

        return back()->with('success', 'Admin profile and branding updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => 'required|string',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Password updated successfully!');
    }

    public function removeLogo()
    {
        $user = Auth::user();
        if ($user->logo) {
            Storage::disk('public')->delete($user->logo);
            $user->update(['logo' => null]);
        }
        return back()->with('success', 'Logo removed successfully!');
    }

    public function removeFavicon()
    {
        $user = Auth::user();
        if ($user->favicon) {
            Storage::disk('public')->delete($user->favicon);
            $user->update(['favicon' => null]);
        }
        return back()->with('success', 'Favicon removed successfully!');
    }
}
