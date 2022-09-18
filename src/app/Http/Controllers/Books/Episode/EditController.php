<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Episode;
use Faker\Core\Number;

class EditController extends Controller
{
    /**
     * $episodeにはチャプターコードが入ってきてます
     */
    public function __invoke(Book $book, Episode $episode)
    {
        $episode = Episode::where('id', $episode)->first();
        return view('books.episode.edit', compact('episode'));
    }
}
