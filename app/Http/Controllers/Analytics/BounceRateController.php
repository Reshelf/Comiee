<?php

namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Models\BookExitEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BounceRateController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'book_id' => 'required|integer|exists:books,id',
        ]);

        // 作者以外ならば、作品の離脱率を記録する
        if ($request->user_id !== Auth::user()->id) {
            $bookExitEvent = new BookExitEvent([
                'user_id' => $request->user_id,
                'book_id' => $request->book_id,
            ]);

            $bookExitEvent->save();
            return response()->json(['message' => 'Bounce rate event recorded successfully.']);
        }
    }
}
