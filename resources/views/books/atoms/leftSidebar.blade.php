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
  <a href="{{ route('book.show', ['lang' => app()->getLocale(), 'book_id' => $book->id]) }}"
    class="inline-block text-2xl dark:text-white font-semibold my-4 px-2">{{ $book->title }}</a>

  {{-- 閲覧数 --}}
  {{-- @empty(!$book) --}}
  <div class="w-full flex items-center px-2 mb-2">
    <div class="flex items-center">
      <span class="text-666 dark:text-white text-lg">{{ number_format($book->views) }}</span>
      <span class=" text-aaa pl-2">{{ __('回閲覧') }}</span>
    </div>
  </div>
  {{-- @endempty --}}

  {{-- お気に入り --}}
  <div class="w-full flex items-center px-2 mb-4">
    @include('books.atoms.likes')
  </div>

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
    <a href="{{ route('search.complete', app()->getLocale()) }}"
      class="inline-block text-[#e19324] dark:text-white dark:bg-[#e19324] text-xs border dark:border-none px-2 py-0.5 rounded-[5px] ml-2 mb-2">
      {{ __('完結') }}</a>
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
