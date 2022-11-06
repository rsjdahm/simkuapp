<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('layouts.dashboard');
    }

    public function show()
    {
        return view('pages.dashboard');
    }
}
