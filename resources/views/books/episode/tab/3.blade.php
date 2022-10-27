<template #comment>
    <div class="flex flex-col">

        @include('books.episode.tab.3.addComment')

        @if (count((array) $episode->comments))
            @foreach ($episode->comments as $comment)
                <div id="{{ $book->title }}-{{ $episode->number }}-comment-{{ $comment->id }}">
                    @empty($comment->parent_id)
                        <div class="mb-2 pt-2 px-2 pb-2">
                            @include('books.episode.tab.3.comment')
                        </div>
                    @endempty

                    @include('books.episode.tab.3.commentList', ['comments' => $comment->replies])
                </div>
            @endforeach
        @endif
    </div>
</template>
