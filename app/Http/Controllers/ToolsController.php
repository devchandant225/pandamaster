<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    /**
     * Display the tools page.
     */
    public function index()
    {
        return view('tools');
    }
}
