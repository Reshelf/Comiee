<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;

class SctController extends Controller
{
    /**
     * 特許商取引
     */
    public function __invoke()
    {
        return view('others.sct');
    }
}
