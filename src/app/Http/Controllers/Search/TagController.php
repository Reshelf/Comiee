<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke(string $name)
    {
        $tag = Tag::where('name', $name)->latest()->first();

        return view('search.tag_name', ['tag' => $tag]);
    }
}
