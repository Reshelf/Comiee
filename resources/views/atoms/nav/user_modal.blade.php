@php
  $a = __('ダークモードにする');
  $b = __('ライトモードにする');
@endphp


<header-user-modal>
  <template #avatar>
    @if (empty(Auth::user()->avatar))
      <img src="{{ asset('/img/noimage-user.svg') }}" alt="" class="w-10 h-10  rounded-full">
    @else
      <img src="{{ Auth::user()->avatar }}" alt="w-10 h-10  rounded-full" class="w-10 h-10  rounded-full">
    @endif
  </template>

  {{-- マイページ --}}
  <a href="{{ route('users.show', ['lang' => app()->getLocale(), 'username' => Auth::user()->username]) }}"
    class="flex items-center text-sm cursor-pointer p-3 rounded hover:bg-f4 dark:hover:bg-dark-2 dark:hover:text-white whitespace-nowrap">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
      <path
        d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
        stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white" />
      <path d="M20.59 22C20.59 18.13 16.74 15 12 15C7.26 15 3.41 18.13 3.41 22" stroke="#333333" stroke-width="1.5"
        stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white" />
    </svg>
    <span class="pl-5">{{ __('マイページ') }}</span>
  </a>

  {{-- 本棚 --}}
  <a href="{{ route('user.shelf.like', app()->getLocale()) }}"
    class="flex items-center text-sm cursor-pointer p-3 rounded hover:bg-f4 dark:hover:bg-dark-2 dark:hover:text-white whitespace-nowrap">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
      <path
        d="M22 16.7399V4.66994C22 3.46994 21.02 2.57994 19.83 2.67994H19.77C17.67 2.85994 14.48 3.92994 12.7 5.04994L12.53 5.15994C12.24 5.33994 11.76 5.33994 11.47 5.15994L11.22 5.00994C9.44 3.89994 6.26 2.83994 4.16 2.66994C2.97 2.56994 2 3.46994 2 4.65994V16.7399C2 17.6999 2.78 18.5999 3.74 18.7199L4.03 18.7599C6.2 19.0499 9.55 20.1499 11.47 21.1999L11.51 21.2199C11.78 21.3699 12.21 21.3699 12.47 21.2199C14.39 20.1599 17.75 19.0499 19.93 18.7599L20.26 18.7199C21.22 18.5999 22 17.6999 22 16.7399Z"
        class="stroke-333 dark:stroke-white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      <path class="stroke-333 dark:stroke-white" d="M12 5.48999V20.49" stroke-width="1.5" stroke-linecap="round"
        stroke-linejoin="round" />
      <path class="stroke-333 dark:stroke-white" d="M7.75 8.48999H5.5" stroke-width="1.5" stroke-linecap="round"
        stroke-linejoin="round" />
      <path class="stroke-333 dark:stroke-white" d="M8.5 11.49H5.5" stroke-width="1.5" stroke-linecap="round"
        stroke-linejoin="round" />
    </svg>
    <span class="pl-5">{{ __('本棚') }}</span>
  </a>

  {{-- 設定 --}}
  <a href="{{ route('users.settings', ['lang' => app()->getLocale(), 'username' => Auth::user()->username]) }}"
    class="flex items-center text-sm cursor-pointer p-3 rounded hover:bg-f4 dark:hover:bg-dark-2 dark:hover:text-white whitespace-nowrap">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
      <path
        d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
        stroke="#333333" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"
        class="dark:stroke-white" />
      <path
        d="M2 12.8801V11.1201C2 10.0801 2.85 9.22006 3.9 9.22006C5.71 9.22006 6.45 7.94006 5.54 6.37006C5.02 5.47006 5.33 4.30006 6.24 3.78006L7.97 2.79006C8.76 2.32006 9.78 2.60006 10.25 3.39006L10.36 3.58006C11.26 5.15006 12.74 5.15006 13.65 3.58006L13.76 3.39006C14.23 2.60006 15.25 2.32006 16.04 2.79006L17.77 3.78006C18.68 4.30006 18.99 5.47006 18.47 6.37006C17.56 7.94006 18.3 9.22006 20.11 9.22006C21.15 9.22006 22.01 10.0701 22.01 11.1201V12.8801C22.01 13.9201 21.16 14.7801 20.11 14.7801C18.3 14.7801 17.56 16.0601 18.47 17.6301C18.99 18.5401 18.68 19.7001 17.77 20.2201L16.04 21.2101C15.25 21.6801 14.23 21.4001 13.76 20.6101L13.65 20.4201C12.75 18.8501 11.27 18.8501 10.36 20.4201L10.25 20.6101C9.78 21.4001 8.76 21.6801 7.97 21.2101L6.24 20.2201C5.33 19.7001 5.02 18.5301 5.54 17.6301C6.45 16.0601 5.71 14.7801 3.9 14.7801C2.85 14.7801 2 13.9201 2 12.8801Z"
        stroke="#333333" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"
        class="dark:stroke-white" />
    </svg>
    <span class="pl-5">{{ __('設定') }}</span>
  </a>

  <div class="border-b border-ddd dark:border-dark my-1 w-full"></div>

  {{-- ログアウト --}}
  <div>
    <button form="logout-button" type="submit"
      class="flex items-center w-full text-left cursor-pointer p-3 rounded hover:bg-f4 dark:hover:bg-dark-2 dark:hover:text-white whitespace-nowrap">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
        <path
          d="M8.89999 7.55999C9.20999 3.95999 11.06 2.48999 15.11 2.48999H15.24C19.71 2.48999 21.5 4.27999 21.5 8.74999V15.27C21.5 19.74 19.71 21.53 15.24 21.53H15.11C11.09 21.53 9.23999 20.08 8.90999 16.54"
          stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="dark:stroke-white" />
        <path d="M2 12H14.88" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="dark:stroke-white" />
        <path d="M12.65 8.65002L16 12L12.65 15.35" stroke="#333333" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" class="dark:stroke-white" />
      </svg>

      <span class="pl-5">{{ __('ログアウト') }}</span>
    </button>
    <form id="logout-button" method="POST" action="{{ route('logout', app()->getLocale()) }}">
      @csrf
    </form>
  </div>
</header-user-modal>
