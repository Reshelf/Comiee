@include('atoms._error_card_list')
@include('atoms.success')


<div class="w-full max-h-[600px] overflow-y-auto scroll-none">
  @if (Auth::id() !== $book->user_id && $book->is_hidden)
    <div class="bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
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
        <form method="POST"
          action="{{ route('book.episode.store', ['lang' => app()->getLocale(), 'book_id' => $book->id]) }}"
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
        <a @if (Auth::id() === $book->user_id || !$e->is_hidden) href="{{ route('book.episode.show', ['lang' => app()->getLocale(), 'book_id' => $book->id, 'episode_number' => $e->number]) }}" @endif
          class="flex items-center w-full {{ Auth::id() === $book->user_id || !$e->is_hidden ?? 'cursor-pointer' }}">
          @empty($e->thumbnail)
            <img src="/img/noimage.svg" alt="thumbnail" class="block dark:hidden w-[160px] h-[80px] object-cover">
            <img src="/img/noimage-dark.svg" alt="thumbnail" class="hidden dark:block w-[160px] h-[80px] object-cover">
          @else
            <img src="{{ $e->thumbnail }}" alt="" class="w-[160px] h-[80px] object-cover">
          @endempty

          {{-- タイトル --}}
          <div class="w-full h-full flex flex-col justify-around lg:justify-center pl-4 overflow-hidden">
            {{-- 日付 --}}
            <div class="text-666 text-xs hidden lg:block lg:mb-1">
              {{ $e->created_at->format('Y/m/d') }}
            </div>

            <div class="w-full flex justify-between items-end">
              {{-- 話数 --}}
              <div class="flex flex-col">
                <div class="mr-2 flex flex-col lg:flex-row lg:items-center">
                  <div>{{ __('第') }}{{ $e->number }}{{ __('話') }}</div>
                  @isset($e->title)
                    <div class="lg:ml-4 truncate text-sm">
                      {{ $e->title }}</div>
                  @endisset
                </div>

                <div class="flex items-center mt-1">

                  {{-- 値段 --}}
                  @if (!$e->is_hidden && $e->is_free && !$e->isReadBy(Auth::user()) && !$e->isBoughtBy(Auth::user()))
                    <div
                      class="mr-2 tracking-widest inline-block text-xs bg-[#E50111] dark:bg-opacity-50 dark:text-ccc text-white py-0.5 px-1.5 rounded-[5px]">
                      {{ __('無料') }}
                    </div>
                  @endif

                  @if (!$e->is_free && !$e->isBoughtBy(Auth::user()))
                    <div
                      class="mr-2 tracking-widest inline-block text-xs bg-eee dark:bg-primary dark:text-white py-0.5 px-1.5 rounded-[5px]">
                      {{ $e->price }}{{ __('円') }}〜
                    </div>
                  @else
                  @endif

                  {{-- 非公開 --}}
                  @if ($e->is_hidden)
                    <div
                      class="mr-2 inline-block text-xs text-tahiti border border-tahiti py-0.5 px-1.5 rounded-[5px] whitespace-nowrap">
                      {{ __('非公開') }}
                    </div>
                  @endif


                  {{-- 閲覧回数 --}}
                  <div class="mr-2 text-666 dark:text-ddd">
                    {{ number_format($e->views) }} <span class="text-xs">{{ __('回') }}</span>
                  </div>

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
                  @if (!$e->is_hidden)
                    @if (!$e->is_free)
                      @auth
                        @if ($book->user->id !== Auth::user()->id && $e->isBoughtBy(Auth::user()))
                          <span class="inline-block text-xs text-666 dark:text-ddd mr-2">
                            {{ __('購入済') }}
                          </span>
                        @endif
                      @endauth
                    @endif
                  @endif
                </div>
              </div>
            </div>
          </div>
        </a>

        {{-- 作者欄 --}}
        @if (Auth::id() === $book->user_id)
          <episode-list>
            <template #trigger>
              <div class="lg:mr-2 p-2 rounded hover:bg-eee dark:hover:bg-dark-1">
                <svg class="w-[20px] h-[20px] stroke-666 dark:stroke-ddd" viewBox="0 0 24 24" fill="none">
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
            <form method="POST"
              action="{{ route('book.episode.update', ['lang' => app()->getLocale(), 'book_id' => $book->id, 'episode_id' => $e->id]) }}"
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
