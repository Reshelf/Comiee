<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | エピソードの保存
    |--------------------------------------------------------------------------
    */
    public function __invoke(Request $request, Episode $episode)
    {
        $episode->book_id = $request->book_id;

        // エピソードの話数
        $episode->number = $episode->where('book_id', $request->book_id)->count() + 1;
        $episode->save();

        return redirect()->back();
    }
}
