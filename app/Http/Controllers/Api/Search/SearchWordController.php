<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class SearchWordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | キーワード検索
    |--------------------------------------------------------------------------
     */
    public function __invoke()
    {
        $searchResults = $this->getSearchResults();

        return response()->json($searchResults);
    }

    private function getSearchResults()
    {
        $expiresAt = Carbon::now()->endOfDay()->addSecond();

        return Cache::remember("search-results", $expiresAt, function () {
            // 論理削除ユーザーは除外する
            return Book::with('user')
                ->whereHas('user', function ($q) {
                    $q->whereNull('deleted_at');
                })
                ->get()
                ->map(function ($book) {
                    return [
                        'id' => $book->id,
                        'title' => $book->title,
                        'thumbnail' => $book->thumbnail,
                        'name' => $book->user->name,
                    ];
                });
        });
    }
}
