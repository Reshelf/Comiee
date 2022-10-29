<comment-like :initial-is-liked-by='@json($comment->isLikedBy(Auth::user()))' :initial-count-likes='@json($comment->count_likes)'
    :authorized='@json(Auth::check())'
    endpoint="{{ route('book.episode.comment.like', [
        'book_id' => $book->id,
        'episode_id' => $episode->id,
        'comment_id' => $comment->id,
    ]) }}">
</comment-like>
