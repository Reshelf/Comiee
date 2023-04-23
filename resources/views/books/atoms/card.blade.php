<div class="p-4">
  @empty($book->thumbnail)
    <img src="{{ asset('/img/noimage.svg') }}" alt="" class="block dark:hidden w-[250px] h-[250px] object-cover"
      loading="lazy">
    <img src="{{ asset('/img/noimage-dark.svg') }}" alt="thumbnail"
      class="hidden dark:block w-full md:w-[250px] h-[250px] object-cover" loading="lazy">
  @else
    <a href="{{ route('book.show', ['book_title' => $book->title]) }}">
      <img src="{{ $book->thumbnail }}" alt="thumbnail" class="w-[250px] h-[250px] object-cover" loading="lazy">
      <span class="thumbnail-title">{{ $book->title }}</span>
    </a>
  @endempty

  @if (Auth::id() === $book->user_id)
    <div class="flex items-center">
      <edit-modal class="mr-2">

        @include('atoms._error_card_list')
        @include('atoms.success')


        <form method="POST" action="{{ route('book.update', ['book_id' => $book->id]) }}">
          @csrf
          @method('PATCH')
          @include('books.atoms.form')
          <button type="submit" class="btn">{{ __('更新する') }}</button>
        </form>
      </edit-modal>
      <delete-modal>
        <form method="POST" action="{{ route('book.episode.destroy', ['book_id' => $book->id]) }}" class="p-2 rounded">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn-danger">{{ __('削除する') }}</button>
        </form>
      </delete-modal>
    </div>
  @endif

  @if ($book->tags)
    @foreach ($book->tags as $tag)
      @if ($loop->first)
        <div class="">
          <div class="">
      @endif
      <a href="{{ route('search.tag_name', ['name' => $tag->name]) }}"
        class="inline-block text-xs btn-border p-1.5 px-2 m-1">
        {{ $tag->hashtag }}
      </a>
      @if ($loop->last)
</div>
</div>
@endif
@endforeach
@endif
<div class="card-body pt-0 pb-2 pl-3">
  <div class="card-text">
    {{-- お気に入り --}}
    @if (Auth::user() && $book->user->id !== Auth::id())
      <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))' :initial-count-likes='@json($book->count_likes)'
        :authorized='@json(Auth::check())' endpoint="{{ route('book.like', ['book_id' => $book->id]) }}">
      </book-like>
    @endif
  </div>
</div>

</div>
