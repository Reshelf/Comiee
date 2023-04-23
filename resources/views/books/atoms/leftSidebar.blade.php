<div class="lg:top-0 lg:sticky md:py-8 px-6 lg:px-4 md:pr-4 w-full lg:max-w-[266px] lg:min-w-[266px]">
  @empty($book->thumbnail)
    <img src="/img/noimage.svg" alt="thumbnail" class="block dark:hidden w-full md:w-[250px] h-[250px] object-cover rounded"
      loading="lazy">
    <img src="/img/noimage-dark.svg" alt="thumbnail" class="hidden dark:block w-full md:w-[250px] h-[250px] object-cover"
      loading="lazy">
  @else
    <img src="{{ $book->thumbnail }}" alt="book thumbnail" class="w-full md:w-[250px] h-[250px] object-cover"
      loading="lazy">
  @endempty

  {{-- 作品タイトル --}}
  <a href="{{ route('book.show', ['book_title' => $book->title]) }}"
    class="inline-block text-2xl dark:text-white font-bold my-4 px-2">{{ $book->title }}</a>

  {{-- 閲覧数 --}}
  {{-- @empty(!$book) --}}
  <div class="w-full flex items-center px-2 mb-2">
    <div class="flex items-center cursor-default mr-4">
      <svg :class="{ clicked: isLikedBy }" height="16px" class="stroke-red" viewBox="0 0 22 20" fill="none">
        <path
          d="M11.62 18.8101C11.28 18.9301 10.72 18.9301 10.38 18.8101C7.48 17.8201 1 13.6901 1 6.6901C1 3.6001 3.49 1.1001 6.56 1.1001C8.38 1.1001 9.99 1.9801 11 3.3401C12.01 1.9801 13.63 1.1001 15.44 1.1001C18.51 1.1001 21 3.6001 21 6.6901C21 13.6901 14.52 17.8201 11.62 18.8101Z"
          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <span class="ml-2 text-666 dark:text-ddd">{{ $total_likes }}</span>
    </div>

    <div class="flex items-center">
      <svg height="18" class="mr-1" viewBox="0 0 24 24" fill="none">
        <path
          d="M15.5799 11.9999C15.5799 13.9799 13.9799 15.5799 11.9999 15.5799C10.0199 15.5799 8.41992 13.9799 8.41992 11.9999C8.41992 10.0199 10.0199 8.41992 11.9999 8.41992C13.9799 8.41992 15.5799 10.0199 15.5799 11.9999Z"
          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        <path
          d="M12.0001 20.2702C15.5301 20.2702 18.8201 18.1902 21.1101 14.5902C22.0101 13.1802 22.0101 10.8102 21.1101 9.40021C18.8201 5.80021 15.5301 3.72021 12.0001 3.72021C8.47009 3.72021 5.18009 5.80021 2.89009 9.40021C1.99009 10.8102 1.99009 13.1802 2.89009 14.5902C5.18009 18.1902 8.47009 20.2702 12.0001 20.2702Z"
          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <span class="text-666 dark:text-white text-lg">{{ number_format($book->views) }}</span>
    </div>
  </div>



  {{-- @endempty --}}

  {{-- お気に入り --}}
  @if (Auth::user() && $book->user->id !== Auth::id())
    <div class="w-full flex items-center px-2 mb-4">
      <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))' :initial-count-likes='@json($book->count_likes)'
        :authorized='@json(Auth::check())' endpoint="{{ route('book.like', ['book_id' => $book->id]) }}">
      </book-like>
    </div>
  @endif

  {{-- カラー作品 --}}
  @if ($book->is_color)
    <span
      class="inline-block text-pink dark:text-white dark:bg-pink text-xs border dark:border-none px-2 py-0.5 rounded-[5px] ml-2 mb-2">
      {{ __('カラー') }}</span>
  @endif

  {{-- 画面タイプ --}}
  @if ($book->screen_type === 'vertical')
    <span
      class="inline-block text-green dark:text-white dark:bg-green text-xs border dark:border-none px-2 py-0.5 rounded-[5px] ml-2 mb-2">
      {{ __('縦スク') }}</span>
  @else
    <span
      class="inline-block text-green dark:text-white dark:bg-green text-xs border dark:border-none px-2 py-0.5 rounded-[5px] ml-2 mb-2">
      {{ __('横読み') }}</span>
  @endif

  {{-- 完結作品 --}}
  @if ($book->is_complete)
    <span
      class="inline-block text-[#e19324] dark:text-white dark:bg-[#e19324] text-xs border dark:border-none px-2 py-0.5 rounded-[5px] ml-2 mb-2">
      {{ __('完結') }}</span>
  @endif

  {{-- 非公開作品 --}}
  @if ($book->is_hidden)
    <span
      class="inline-block text-tahiti dark:text-white dark:bg-tahiti text-xs border dark:border-none px-2 py-0.5 rounded-[5px] ml-2 mb-2">
      {{ __('非公開') }}</span>
  @endif

  {{-- 休載中作品 --}}
  @if ($book->is_suspend)
    <span
      class="inline-block text-red dark:text-white dark:bg-red text-xs border dark:border-none px-2 py-0.5 rounded-[5px] ml-2 mb-2">
      {{ __('休載中') }}</span>
  @endif


  {{-- 購入 --}}
  {{-- @if (Auth::id() !== $book->user_id && !$book->is_hidden)
    <div class="w-full flex flex-col mt-4 px-2">
      <button class="btn-border py-3 mb-2">{{ __('1話を読む') }}</button>
      <button class="btn-primary py-3">{{ __('全話をまとめて購入') }}</button>
    </div>
  @endif --}}

  {{-- 作品内容の更新 --}}
  @if (Auth::id() === $book->user_id)
    @include('books.atoms.edit')
  @endif


  {{-- SNSシェア --}}
  @if (!$book->is_hidden)
    <div class="mt-4 mx-2 flex justify-end">
      @include('atoms.sns', ['sns_title' => $sns_title])
    </div>
  @endif
</div>
