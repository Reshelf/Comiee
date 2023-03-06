<div class="mobile-menu">
  @auth
    <div class="absolute right-[20px] top-[-65px]">
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

  @guest
    <a href="{{ route('ranking', app()->getLocale()) }}"
      class="{{ $tab === 1 ? 'stroke-primary text-primary font-semibold' : 'stroke-[#7c7c7c]' }}">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path
          d="M2 15.29V5.71002C2 4.38002 2.77 4.06002 3.71 5.00002L6.3 7.59002C6.69 7.98002 7.33 7.98002 7.71 7.59002L11.29 4.00002C11.68 3.61002 12.32 3.61002 12.7 4.00002L16.29 7.59002C16.68 7.98002 17.32 7.98002 17.7 7.59002L20.29 5.00002C21.23 4.06002 22 4.38002 22 5.71002V15.3C22 18.3 20 20.3 17 20.3H7C4.24 20.29 2 18.05 2 15.29Z"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      {{ __('ランキング') }}
    </a>
  @endguest
  @auth
    <a href="{{ route('ranking', app()->getLocale()) }}"
      class="{{ $tab === 1 ? 'stroke-primary text-primary font-semibold' : 'stroke-[#7c7c7c]' }}">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path
          d="M2 15.29V5.71002C2 4.38002 2.77 4.06002 3.71 5.00002L6.3 7.59002C6.69 7.98002 7.33 7.98002 7.71 7.59002L11.29 4.00002C11.68 3.61002 12.32 3.61002 12.7 4.00002L16.29 7.59002C16.68 7.98002 17.32 7.98002 17.7 7.59002L20.29 5.00002C21.23 4.06002 22 4.38002 22 5.71002V15.3C22 18.3 20 20.3 17 20.3H7C4.24 20.29 2 18.05 2 15.29Z"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      {{ __('ランキング') }}
    </a>
  @endauth
  <a href="{{ route('search.like', app()->getLocale()) }}"
    class="{{ $tab === 3 ? 'stroke-primary text-primary font-semibold' : 'stroke-[#7c7c7c]' }}">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
      <path
        d="M13.7299 3.51014L15.4899 7.03014C15.7299 7.52014 16.3699 7.99014 16.9099 8.08014L20.0999 8.61014C22.1399 8.95014 22.6199 10.4301 21.1499 11.8901L18.6699 14.3701C18.2499 14.7901 18.0199 15.6001 18.1499 16.1801L18.8599 19.2501C19.4199 21.6801 18.1299 22.6201 15.9799 21.3501L12.9899 19.5801C12.4499 19.2601 11.5599 19.2601 11.0099 19.5801L8.01991 21.3501C5.87991 22.6201 4.57991 21.6701 5.13991 19.2501L5.84991 16.1801C5.97991 15.6001 5.74991 14.7901 5.32991 14.3701L2.84991 11.8901C1.38991 10.4301 1.85991 8.95014 3.89991 8.61014L7.08991 8.08014C7.61991 7.99014 8.25991 7.52014 8.49991 7.03014L10.2599 3.51014C11.2199 1.60014 12.7799 1.60014 13.7299 3.51014Z"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    {{ __('お気に入り') }}
  </a>
  <a @if (Auth::user()) href="{{ route('users.show', ['lang' => app()->getLocale(), 'username' => Auth::user()->username]) }}"
        @else href="{{ route('login', app()->getLocale()) }}" @endif
    class="{{ $tab === 4 ? 'stroke-primary text-primary font-semibold' : 'stroke-[#7c7c7c]' }}">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
      <path
        d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M20.59 22C20.59 18.13 16.74 15 12 15C7.26003 15 3.41003 18.13 3.41003 22" stroke-width="1.5"
        stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    {{ __('プロフィールを見る') }}
  </a>
</div>
