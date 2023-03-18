<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Carbon;

class SearchTagsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | タグ検索
    |--------------------------------------------------------------------------
     */
    public function __invoke()
    {
        $allTags = $this->getAllTags();

        return response()->json($allTags);
    }

    private function getAllTags()
    {
        $expiresAt = Carbon::now()->addDay();

        return \Cache::remember("all-tags", $expiresAt, function () {
            return Tag::pluck('name');
        });
    }
}
