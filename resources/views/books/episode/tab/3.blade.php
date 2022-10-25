<template #comment>
    <div class="flex flex-col">

        @include('books.episode.tab.3.addComment')

        @foreach ($episode->comments as $comment)
            @include('books.episode.tab.3.commentList')
        @endforeach
    </div>
</template>
