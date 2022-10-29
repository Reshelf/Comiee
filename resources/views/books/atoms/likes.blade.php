<book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))' :initial-count-likes='@json($book->count_likes)'
    :authorized='@json(Auth::check())' endpoint="{{ route('book.like', ['book' => $book]) }}">
</book-like>
