<?php

namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Models\BookExitEvent;
use Illuminate\Http\Request;

class BounceRateController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'book_id' => 'required|integer|exists:books,id',
        ]);

        $bookExitEvent = new BookExitEvent([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
        ]);

        slack_log($bookExitEvent);

        $bookExitEvent->save();
        return response()->json(['message' => 'Bounce rate event recorded successfully.']);
    }
}
