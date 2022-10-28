<template #comment>
    <div class="flex flex-col">

        @include('books.episode.tab.3.addComment')

        @if (count((array) $episode->comments))
            @foreach ($episode->comments as $comment)
                @empty($comment->parent_id)
                    <div id="{{ $book->title }}-{{ $episode->number }}-comment-{{ $comment->id }}">
                        <div class="mb-2 pt-2 px-2 pb-2">
                            @include('books.episode.tab.3.comment')
                        </div>

                        @include('books.episode.tab.3.commentList', ['comments' => $comment->replies])
                    </div>
                @endempty
            @endforeach
        @endif
    </div>
</template>
