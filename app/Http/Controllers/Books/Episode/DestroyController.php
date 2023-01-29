<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Models\Episode;

class DestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | 作品の削除
    |--------------------------------------------------------------------------
    */
    public function __invoke(Episode $episode)
    {
        $episode->delete();
        return back();
    }
}
