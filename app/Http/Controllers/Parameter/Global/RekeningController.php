<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;

class RekeningController extends Controller
{
    public function index()
    {
        return view('pages.parameter.global.rekening.index');
    }
}
