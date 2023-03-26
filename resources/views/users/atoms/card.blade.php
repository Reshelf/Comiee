<div class="list-item">
  <a href="{{ route('book.show', ['book_title' => $book->title]) }}">
    @empty($book->thumbnail)
      <img src="{{ asset('/img/noimage.svg') }}" alt=""
        class="block dark:hidden min-h-[200px] max-h-[200px] w-full md:min-w-[200px] md:max-w-[200px] object-cover"
        loading="lazy">
      <img src="{{ asset('/img/noimage-dark.svg') }}" alt="thumbnail"
        class="hidden dark:block h-[200px] w-full md:w-[200px] object-cover" loading="lazy">
    @else
      <img src="{{ $book->thumbnail }}" alt="thumbnail" class="w-full md:w-[200px] h-[200px] object-cover" loading="lazy">
    @endempty
    <span class="thumbnail-title">{{ $book->title }}</span>
  </a>
</div>
