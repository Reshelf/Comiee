@php
  $type = null;
@endphp
<div class="w-full flex flex-wrap justify-start">
  @isset($books)
    {{-- 閲覧履歴 or 購入履歴 --}}
    @if ($type !== 'like')
      @foreach ($books as $episode)
        <div class="list-item">
          <a @empty(!$episode->book_id) href="{{ route('book.episode.show', ['lang' => app()->getLocale(), 'book_id' => $episode->book_id, 'episode_number' => $episode->number]) }}"   @endempty
            class="relative inline-block w-full">
            @empty($episode->thumbnail)
              <img src="/img/noimage.svg" alt="thumbnail" class="block dark:hidden list-item-img" loading="lazy">
              <img src="/img/noimage-dark.svg" alt="thumbnail" class="hidden dark:block list-item-img" loading="lazy">
            @else
              <img src="{{ $episode->thumbnail }}" alt="thumbnail" class="list-item-img" loading="lazy">
            @endempty
            <div class="pt-2 dark:text-ddd text-lg truncate">{{ $episode->number }}{{ __('話') }}
              {{ $episode->title }}</div>
          </a>
        </div>
      @endforeach
    @else
      {{-- お気に入り --}}
      @foreach ($books as $book)
        <div class="list-item">
          <a href="{{ route('book.show', ['lang' => app()->getLocale(), 'book_id' => $book->id]) }}"
            class="relative inline-block w-full">
            @empty($book->thumbnail)
              <img src="/img/noimage.svg" alt="thumbnail" class="block dark:hidden list-item-img" loading="lazy">
              <img src="/img/noimage-dark.svg" alt="thumbnail" class="hidden dark:block list-item-img" loading="lazy">
            @else
              <img src="{{ $book->thumbnail }}" alt="thumbnail" class="list-item-img" loading="lazy">
            @endempty
            <span class="thumbnail-title">{{ $book->title }}</span>
          </a>
          <div class="flex items-center">

            {{-- お気に入り --}}
            @isset($book->user->id)
              @include('books.atoms.likes')

              {{-- 閲覧回数 --}}
              <div class="flex items-center text-aaa pl-4">
                <svg class="stroke-666 w-[20px] h-[20px]" viewBox="0 0 24 24" fill="none">
                  <title>view counts</title>
                  <path d="M16.5 9.5L12.3 13.7L10.7 11.3L7.5 14.5" stroke="#292D32" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M14.5 9.5H16.5V11.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="pl-2">{{ number_format($book->views) }}{{ __('回') }}</span>
              </div>
            @endisset

          </div>
        </div>
      @endforeach
    @endif
  @endisset

  @include('atoms.nomessage')
</div>
