<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestorController extends Controller
{
    /**
     * Display the investor deals page.
     */
    public function index()
    {
        return view('investors');
    }
}
