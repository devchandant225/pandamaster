<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;

class RobotsController extends Controller
{
    public function index()
    {
        $admin = User::where('role', 'admin')->first();
        $content = $admin->robots_txt ?? "User-agent: *\nAllow: /";

        return response($content)
            ->header('Content-Type', 'text/plain');
    }
}
