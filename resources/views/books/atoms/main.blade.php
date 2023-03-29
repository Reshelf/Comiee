@include('atoms._error_card_list')
@include('atoms.success')


<div class="w-full max-h-[600px] overflow-y-auto scroll-none">
  @if (Auth::id() !== $book->user_id && $book->is_hidden)
    <div class="bg-primary bg-opacity-10 text-primary px-4 py-2 font-bold">
      {{ __('この作品は現在非公開になっています') }}
    </div>
  @else
    @if (Auth::id() === $book->user_id && !$book->is_complete && !$book->is_suspend)
      <episode-list @if (Session::has('store')) :store='true' @endif>
        <template #trigger>
          <div
            class="tracking-widest w-full flex justify-center py-4 mb-2 cursor-pointer hover:bg-f5 dark:hover:bg-dark-1 rounded-[5px] border-dotted border-2 dark:border-4 border-[#dadce0] hover:border-aaa dark:border-dark-1">
            {{ __('作品のエピソードを追加する') }}
          </div>
        </template>
        <template #header>{{ __('作品のエピソードを追加する') }}</template>
        <form method="POST" action="{{ route('book.episode.store', ['book_id' => $book->id]) }}"
          enctype="multipart/form-data" onsubmit="submit_btn()">
          @csrf

          <div class="-mt-4">
            @include('atoms._error_card_list')
            @include('atoms.success')
          </div>

          @include('books.episode.tab.1.episode_form', ['update' => false])
          <div class="relative mt-4">
            <button type="submit" class="submit_btn2 btn-primary lg:py-4 w-full">
              {{ __('追加する') }}
              <span class="load loading"></span>
            </button>
          </div>
        </form>
      </episode-list>
    @endif
    @foreach ($episodes_latest as $e)
      <div
        class="my-2 py-2 border-b border-ddd dark:border-dark-1 flex justify-between w-full overflow-hidden rounded-[5px] dark:hover:bg-dark-1 hover:bg-f5">
        <div class="flex items-center w-full">
          <a @if (Auth::id() === $book->user_id || !$e->is_hidden) href="{{ route('book.episode.show', ['book_title' => $book->title, 'episode_number' => $e->number]) }}" @endif
            class="cursor-pointer">
            @empty($e->thumbnail)
              <img src="/img/noimage.svg" alt="thumbnail"
                class="block dark:hidden min-w-[160px] max-w-[160px] min-h-[80px] max-h-[80px] object-cover"
                loading="lazy">
              <img src="/img/noimage-dark.svg" alt="thumbnail"
                class="hidden dark:block min-w-[160px] max-w-[160px] min-h-[80px] max-h-[80px] object-cover"
                loading="lazy">
            @else
              <img src="{{ $e->thumbnail }}" alt=""
                class="min-w-[160px] max-w-[160px] min-h-[80px] max-h-[80px] object-cover" loading="lazy">
            @endempty
          </a>


          {{-- タイトル --}}
          <div class="w-full h-full flex flex-col justify-around lg:justify-center pl-4 overflow-hidden">
            {{-- 日付 --}}
            <div class="text-666 text-xs hidden lg:block lg:mb-1">
              {{ $e->created_at->format('Y/m/d') }}
            </div>

            <div class="w-full flex justify-between items-end">
              {{-- 話数 --}}
              <div class="flex flex-col">
                <a @if (Auth::id() === $book->user_id || !$e->is_hidden) href="{{ route('book.episode.show', ['book_title' => $book->title, 'episode_number' => $e->number]) }}" @endif
                  class="mr-2 flex flex-col lg:flex-row lg:items-center cursor-pointer hover:text-primary dark:hover:text-f5">
                  <div>{{ __('第') }}{{ $e->number }}{{ __('話') }}</div>
                  @isset($e->title)
                    <div class="lg:ml-4 truncate text-sm">
                      {{ $e->title }}</div>
                  @endisset
                </a>

                <div class="flex items-center mt-1">

                  @if (Auth::user() && $book->user->id === Auth::user()->id)
                    <div class="flex items-center cursor-not-allowed">
                      <svg height="16" class="stroke-red" viewBox="0 0 22 20" fill="none">
                        <title>like icon</title>
                        <path
                          d="M11.62 18.8101C11.28 18.9301 10.72 18.9301 10.38 18.8101C7.48 17.8201 1 13.6901 1 6.6901C1 3.6001 3.49 1.1001 6.56 1.1001C8.38 1.1001 9.99 1.9801 11 3.3401C12.01 1.9801 13.63 1.1001 15.44 1.1001C18.51 1.1001 21 3.6001 21 6.6901C21 13.6901 14.52 17.8201 11.62 18.8101Z"
                          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                      <span class="ml-2">{{ $e->count_likes }}</span>
                    </div>
                  @else
                    <episode-like :initial-is-liked-by='@json($e->isLikedBy(Auth::user()))'
                      :initial-count-likes='@json($e->count_likes)' :authorized='@json(Auth::check())'
                      endpoint="{{ route('book.episode.like', [
                          'book_id' => $book->id,
                          'episode_id' => $e->id,
                      ]) }}">
                    </episode-like>
                  @endif

                  {{-- 閲覧回数 --}}
                  <div class="flex items-center mx-2 text-666 dark:text-ddd">
                    <svg height="18" class="mr-1" viewBox="0 0 24 24" fill="none">
                      <path
                        d="M15.5799 11.9999C15.5799 13.9799 13.9799 15.5799 11.9999 15.5799C10.0199 15.5799 8.41992 13.9799 8.41992 11.9999C8.41992 10.0199 10.0199 8.41992 11.9999 8.41992C13.9799 8.41992 15.5799 10.0199 15.5799 11.9999Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      <path
                        d="M12.0001 20.2702C15.5301 20.2702 18.8201 18.1902 21.1101 14.5902C22.0101 13.1802 22.0101 10.8102 21.1101 9.40021C18.8201 5.80021 15.5301 3.72021 12.0001 3.72021C8.47009 3.72021 5.18009 5.80021 2.89009 9.40021C1.99009 10.8102 1.99009 13.1802 2.89009 14.5902C5.18009 18.1902 8.47009 20.2702 12.0001 20.2702Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    {{ number_format($e->views) }}
                  </div>

                  {{-- 値段 --}}
                  @if (!$e->is_hidden && $e->is_free && !$e->isReadBy(Auth::user()) && !$e->isBoughtBy(Auth::user()))
                    <div
                      class="mr-2 tracking-widest inline-block text-xs bg-[#E50111] text-white py-0.5 px-1.5 rounded-[5px]">
                      {{ __('無料') }}
                    </div>
                  @endif

                  @if (!$e->is_free && !$e->isBoughtBy(Auth::user()))
                    <div
                      class="mr-2 tracking-widest inline-block text-xs bg-eee dark:bg-primary dark:text-white py-0.5 px-1.5 rounded-[5px]">
                      ¥{{ $e->price }}~
                    </div>
                  @endif

                  {{-- 非公開 --}}
                  @if ($e->is_hidden)
                    <div
                      class="mr-2 inline-block text-xs text-tahiti border border-tahiti py-0.5 px-1.5 rounded-[5px] whitespace-nowrap">
                      {{ __('非公開') }}
                    </div>
                  @endif


                  {{-- 既読 --}}
                  @auth
                    @if ($book->user->id !== Auth::user()->id)
                      @if ($e->isReadBy(Auth::user()))
                        <span class="inline-block text-xs text-666 dark:text-ddd mr-2">
                          {{ __('既読') }}
                        </span>
                      @else
                        <span class="inline-block text-xs text-666 dark:text-ddd mr-2">
                          {{ __('未読') }}
                        </span>
                      @endif
                    @endif
                  @endauth

                  {{-- 購入済 --}}
                  @if (!$e->is_hidden && !$e->is_free)
                    @auth
                      @if ($book->user->id !== Auth::user()->id && $e->isBoughtBy(Auth::user()))
                        <span class="inline-block text-xs text-666 dark:text-ddd mr-2">
                          {{ __('購入済') }}
                        </span>
                      @endif
                    @endif
      @endif
  </div>
  </div>
  </div>
  </div>
  </div>

  {{-- クリエイター欄 --}}
  @if (Auth::id() === $book->user_id)
    <episode-list>
      <template #trigger>
        <div class="lg:mr-2 p-2 rounded hover:bg-eee dark:hover:bg-dark-1">
          <svg class="w-[20px] h-[20px] stroke-666 dark:stroke-ddd" viewBox="0 0 24 24" fill="none">
            <title>update episode</title>
            <path
              d="M13.2601 3.59997L5.0501 12.29C4.7401 12.62 4.4401 13.27 4.3801 13.72L4.0101 16.96C3.8801 18.13 4.7201 18.93 5.8801 18.73L9.1001 18.18C9.5501 18.1 10.1801 17.77 10.4901 17.43L18.7001 8.73997C20.1201 7.23997 20.7601 5.52997 18.5501 3.43997C16.3501 1.36997 14.6801 2.09997 13.2601 3.59997Z"
              stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M11.8899 5.05005C12.3199 7.81005 14.5599 9.92005 17.3399 10.2" stroke-width="1.5"
              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3 22H21" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </div>
      </template>
      <template #header>{{ __('エピソードを更新する') }}</template>
      <form method="POST" action="{{ route('book.episode.update', ['book_id' => $book->id, 'episode_id' => $e->id]) }}"
        enctype="multipart/form-data" class="whitespace-pre-line" onsubmit="submit_btn()">
        @csrf
        @method('PATCH')
        @include('books.episode.tab.1.episode_form', ['update' => true])
        <div class="relative mt-4">
          <button type="submit" class="submit_btn2 btn-primary lg:py-4 w-full">
            {{ __('更新する') }}
            <span class="load loading"></span>
          </button>
        </div>
      </form>
    </episode-list>
  @endif
  </div>
  @endforeach
  @endif
  </div>
