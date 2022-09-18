<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;

class SctController extends Controller
{
    /**
     * 利用規約ページを返す
     */
    public function __invoke()
    {
        return view('others.sct');
    }
}
