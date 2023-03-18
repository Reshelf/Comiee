<div class="mobile-menu">

  {{-- ホーム --}}
  <a href="{{ url('/') }}"
    class="{{ $tab === 0 ? 'stroke-primary dark:stroke-white text-primary font-semibold' : 'stroke-[#7c7c7c] dark:stroke-ddd' }} mobile-menu-icon">
    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
      <title>home</title>
      <path
        d="M9.02 2.83998L3.63 7.03998C2.73 7.73998 2 9.22998 2 10.36V17.77C2 20.09 3.89 21.99 6.21 21.99H17.79C20.11 21.99 22 20.09 22 17.78V10.5C22 9.28998 21.19 7.73998 20.2 7.04998L14.02 2.71998C12.62 1.73998 10.37 1.78998 9.02 2.83998Z"
        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M12 17.99V14.99" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
  </a>

  {{-- 検索 --}}
  <span class="stroke-[#7c7c7c] dark:stroke-ddd mobile-menu-icon">
    <sp-search-form :search='@json(__('検索する'))' :zero='@json(__('検索結果がありません'))'>
      <template #trigger>
        <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <title>search</title>
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
      </template>
    </sp-search-form>
  </span>

  {{-- 投稿 --}}
  @auth
    <div>
      <create-modal>
        {{-- エラー文 --}}
        @include('atoms._error_card_list')
        @include('atoms.success')
        <form method="POST" action="{{ route('book.store', app()->getLocale()) }}" enctype="multipart/form-data"
          onsubmit="submit_btn()">
          @include('books.atoms.form', ['update' => false, 'create_book_modal_count' => 14])
          <div class="w-full relative">
            <button type="submit" class="submit_btn3 btn-primary w-full lg:py-4">
              {{ __('投稿する') }}
              <span class="load loading"></span>
            </button>
          </div>
        </form>
      </create-modal>
    </div>
  @endauth

  {{-- 本棚 --}}
  <a href="{{ route('search.like', app()->getLocale()) }}"
    class="{{ $tab === 3 ? 'stroke-primary dark:stroke-white text-primary font-semibold' : 'stroke-[#7c7c7c] dark:stroke-ddd' }} mobile-menu-icon">
    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
      <title>shelf</title>
      <path
        d="M22 16.7399V4.66994C22 3.46994 21.02 2.57994 19.83 2.67994H19.77C17.67 2.85994 14.48 3.92994 12.7 5.04994L12.53 5.15994C12.24 5.33994 11.76 5.33994 11.47 5.15994L11.22 5.00994C9.44 3.89994 6.26 2.83994 4.16 2.66994C2.97 2.56994 2 3.46994 2 4.65994V16.7399C2 17.6999 2.78 18.5999 3.74 18.7199L4.03 18.7599C6.2 19.0499 9.55 20.1499 11.47 21.1999L11.51 21.2199C11.78 21.3699 12.21 21.3699 12.47 21.2199C14.39 20.1599 17.75 19.0499 19.93 18.7599L20.26 18.7199C21.22 18.5999 22 17.6999 22 16.7399Z"
        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M12 5.48999V20.49" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M7.75 8.48999H5.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M8.5 11.49H5.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
  </a>

  {{-- プロフィール --}}
  <a
    @if (Auth::user()) href="{{ route('users.show', ['lang' => app()->getLocale(), 'username' => Auth::user()->username]) }}"
        @else href="{{ route('login', app()->getLocale()) }}" @endif>
    @empty($user->avatar)
      <svg class="rounded-full shadow object-cover w-[28px] h-[28px]" viewBox="0 0 42 42" fill="none">
        <title>profile</title>
        <rect width="42" height="42" rx="21" class="dark:fill-dark-1 fill-eee" />
        <path class="stroke-white dark:stroke-ccc"
          d="M21 21C23.7614 21 26 18.7614 26 16C26 13.2386 23.7614 11 21 11C18.2386 11 16 13.2386 16 16C16 18.7614 18.2386 21 21 21Z"
          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M29.5901 31C29.5901 27.13 25.7402 24 21.0002 24C16.2602 24 12.4102 27.13 12.4102 31"
          class="stroke-white dark:stroke-ccc" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    @else
      <img src="{{ $user->avatar }}" alt="avatar" class="rounded-full shadow object-cover w-[28px] h-[28px]"
        loading="lazy">
    @endempty
  </a>
</div>
