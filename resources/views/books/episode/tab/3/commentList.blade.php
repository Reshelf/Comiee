@foreach ($comment->replies as $comment)
    <div class="mb-2 pt-2 px-2 pb-2 ml-4">
        @include('books.episode.tab.3.comment')
    </div>

    <div class="mb-2 pt-2 px-2 pb-2 ml-4">
        @include('books.episode.tab.3.commentList')
    </div>
@endforeach
