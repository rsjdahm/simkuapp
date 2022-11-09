<?php

namespace App\Http\Controllers\Parameter\Global;

use App\Http\Controllers\Controller;

class UrusanBidangController extends Controller
{
    public function index()
    {
        return view('pages.parameter.global.urusan_bidang.index');
    }
}
