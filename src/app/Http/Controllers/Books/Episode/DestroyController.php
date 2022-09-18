<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Models\Episode;

class DestroyController extends Controller
{
    /**
     * 作品の削除
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(Episode $episode)
    {
        // $this->authorize('delete', $episode);
        // dd($episode->id);
        $episode->delete();
        return redirect()->back();
    }
}
