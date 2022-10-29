<template #comment>
    <div class="flex flex-col">

        @include('books.episode.tab.3.addComment', [
            'episode_id' => $episode_id,
            'episode_number' => $episode_number,
        ])

        @if (count((array) $book->comments))
            @foreach ($book->comments as $comment)
                @if ($episode->number === $comment->episode_number)
                @empty($comment->parent_id)
                    <div id="{{ $book->title }}-{{ $episode->number }}-comment-{{ $comment->id }}">
                        <div class="mb-2 pt-2 px-2 pb-2">
                            @include('books.episode.tab.3.comment')
                        </div>

                        @include('books.episode.tab.3.commentList', ['comments' => $comment->replies])
                    </div>
                @endempty
            @endif
        @endforeach
    @endif
</div>
</template>
