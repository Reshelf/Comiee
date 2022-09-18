<div class="list-item">
    <a href="{{ route('book.show', ['book' => $book->id]) }}">
        @empty($book->thumbnail)
            <img src="{{ asset('/img/bg.svg') }}" alt="" class="h-[200px] w-[200px] object-cover flex-shrink-0">
        @else
            <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt="thumbnail"
                class="w-[200px] h-[200px] object-cover flex-shrink-0">
        @endempty
        <span class="thumbnail-title">{{ $book->title }}</span>
    </a>
</div>
