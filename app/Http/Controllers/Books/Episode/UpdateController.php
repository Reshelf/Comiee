<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | エピソードの更新
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request)
    {
        $book = Book::find($request->book_id);
        $episode = Episode::find($request->episode_id);

        if ($book->user->id === Auth::user()->id) {
            $request->validate([
                'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,webp|max:30720',
                'images' => 'array|min:10|max:100',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:30720',
            ]);

            if ($request->has('title')) {
                $episode->title = $request->title;
            }

            if ($request->has('short_from_author')) {
                $episode->short_from_author = $request->short_from_author;
            }

            $episode->is_hidden = $request->is_hidden == null ? false : true;
            $episode->is_free = $request->is_free == null ? true : false;

            if ($request->has('thumbnail')) {
                $episode->thumbnail = $this->processImage($request->file('thumbnail'), $book->title, $episode->number, 'thumbnail', 1000);
            }

            if ($request->hasfile('images')) {
                $imgData = [];
                foreach ($request->file('images') as $index => $image) {
                    $imgData[] = $this->processImage($image, $book->title, $episode->number, $index);
                }
                $episode->contents = json_encode($imgData);
            }
        }

        $episode->save();

        return back()->with('success', __('エピソードを更新しました！'));
    }

    /*
    |--------------------------------------------------------------------------
    | 画像圧縮
    |--------------------------------------------------------------------------
     */
    private function processImage($image, $bookTitle, $episodeNumber, $fileName, $resizeWidth = 3200)
    {
        $img = \Image::make($image)->resize(
            $resizeWidth,
            null,
            function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            }
        )->limitColors(null)->encode('webp', 0.01);

        $filePath = 'app/' . env('APP_ENV') . '/books/' . $bookTitle . '/' . $episodeNumber . '/' . $fileName . '.webp';
        Storage::disk('r2')->put($filePath, $img);

        return env('CLOUDFLARE_R2_URL') . '/' . $filePath;
    }
}
