<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class SearchTagsController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | タグ検索
    |--------------------------------------------------------------------------
    */
    public function __invoke(Tag $tag)
    {
        $allTags = \Cache::remember("allTags", now()->addHour(), function () use ($tag) {
            return $tag->all_tag_names;
        });

        return response()->json($allTags);
    }
}
