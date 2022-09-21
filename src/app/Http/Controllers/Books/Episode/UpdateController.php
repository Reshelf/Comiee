<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $update = [
            'name' => $request->name,
            'body' => $request->body,
            // 'book_id' => $request->book_id
        ];
        Episode::where('id', $id)->update($update);
        // return response()->json([
        //     'id' => $episode->id,
        // ]);
    }
}
