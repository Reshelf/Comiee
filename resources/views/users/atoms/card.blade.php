<div class="list-item">
    <a href="{{ route('book.show', ['book_id' => $book->id]) }}">
        @empty($book->thumbnail)
            <img src="{{ asset('/img/bg.svg') }}" alt="" class="block dark:hidden h-[200px] w-[200px] object-cover">
            <img src="{{ asset('/img/bg-dark.svg') }}" alt="thumbnail"
                class="hidden dark:block h-[200px] w-[200px] object-cover">
        @else
            <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt="thumbnail"
                class="w-[200px] h-[200px] object-cover">
        @endempty
        <span class="thumbnail-title">{{ $book->title }}</span>
    </a>
</div>
