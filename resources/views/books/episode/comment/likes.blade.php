@if (Auth::user() && $comment->user->id === Auth::user()->id)
    <div class="flex items-center cursor-not-allowed">
        <svg height="16" class="stroke-red" viewBox="0 0 22 20" fill="none">
            <path
                d="M11.62 18.8101C11.28 18.9301 10.72 18.9301 10.38 18.8101C7.48 17.8201 1 13.6901 1 6.6901C1 3.6001 3.49 1.1001 6.56 1.1001C8.38 1.1001 9.99 1.9801 11 3.3401C12.01 1.9801 13.63 1.1001 15.44 1.1001C18.51 1.1001 21 3.6001 21 6.6901C21 13.6901 14.52 17.8201 11.62 18.8101Z"
                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span class="ml-2">{{ $comment->count_likes }}</span>
    </div>
@else
    <comment-like :initial-is-liked-by='@json($comment->isLikedBy(Auth::user()))'
        :initial-count-likes='@json($comment->count_likes)' :authorized='@json(Auth::check())'
        endpoint="{{ route('book.episode.comment.like', [
            'lang' => app()->getLocale(),
            'book_id' => $book->id,
            'episode_id' => $episode->id,
            'comment' => $comment,
        ]) }}">
    </comment-like>
@endif
