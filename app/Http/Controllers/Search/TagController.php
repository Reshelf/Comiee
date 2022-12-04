<?php

namespace App\Http\Controllers\Search;

use App\Models\Tag;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | タグ検索結果 一覧
    |--------------------------------------------------------------------------
    */
    public function __invoke($lang, string $name)
    {
        $tag = \Cache::remember("tag.{$name}", Carbon::now()->endOfDay()->addSecond(), function () use ($name) {
            return Tag::where('name', $name)->latest()->first();
        });

        return view('search.tag_name', ['lang' => $lang, 'tag' => $tag]);
    }
}
