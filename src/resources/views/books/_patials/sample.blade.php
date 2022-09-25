{{-- ランキング --}}
<div class="w-full flex flex-col mb-4">
    <div class="w-full flex justify-between mb-4">
        <h3 class="text-xl font-semibold">ランキング</h3>
        <a href="" class="font-semibold hover:text-primary">もっと見る</a>
    </div>
    <div class="w-full flex flex-wrap justify-start">
        @if (!empty($books))
            @foreach ($books as $book)
                <div class="list-item">
                    <a href="{{ route('book.show', ['book_id' => $book->id]) }}">
                        <img src="/img/bg.svg" alt="thumbnail" class="list-item-img">
                        <span class="thumbnail-title">{{ $book->title }}</span>
                    </a>

                    <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                        :initial-count-likes='@json($book->count_likes)' :authorized='@json(Auth::check())'
                        endpoint="{{ route('book.like', ['book' => $book]) }}">
                    </book-like>
                </div>
            @endforeach
        @endif
    </div>
</div>
