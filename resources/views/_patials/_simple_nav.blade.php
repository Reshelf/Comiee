<div class="bg-white dark:bg-dark sticky top-0 z-40 w-full flex-none lg:z-20 border-b border-ddd dark:border-dark">
    <div class="max-w-8xl mx-auto">
        <div class="py-4 border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10 mx-4 lg:mx-0">
            <div class="relative flex items-center">

                {{-- ロゴ --}}
                @include('_patials.nav.logo')

                <div class="hidden lg:flex items-center ml-auto">
                    <nav class="text-sm">
                        <div class="flex items-center">
                            @guest
                                @include('auth._login')
                            @endguest
                            @auth
                                <div class="flex items-center h-full mr-8">
                                    <create-modal>
                                        <template #header>新しく作品を追加する</template>

                                        {{-- エラー文 --}}
                                        @include('_patials._error_card_list')

                                        <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
                                            @include('books._patials.form')
                                            <div class="w-full flex justify-end"><button
                                                    onclick="this.disabled='disabled'; this.form.submit();" type="submit"
                                                    class="btn">投稿する</button></div>
                                        </form>
                                    </create-modal>
                                </div>
                                <header-user-modal>
                                    <template #avatar>
                                        @if (empty(Auth::user()->avatar))
                                            <img src="{{ asset('/img/noimage-user.svg') }}" alt=""
                                                class="w-10 h-10  rounded-full">
                                        @else
                                            <img src="{{ asset('/img/users/avatar/' . Auth::user()->avatar) }}"
                                                alt="w-10 h-10  rounded-full" class="w-10 h-10  rounded-full">
                                        @endif
                                    </template>

                                    {{-- マイページ --}}
                                    <a href="{{ route('users.show', ['username' => Auth::user()->username]) }}"
                                        class="flex items-center text-sm cursor-pointer p-3 rounded hover:bg-f4 dark:hover:bg-dark-2 dark:hover:text-white whitespace-nowrap">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
                                                stroke="#333333" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" class="dark:stroke-white" />
                                            <path d="M20.59 22C20.59 18.13 16.74 15 12 15C7.26 15 3.41 18.13 3.41 22"
                                                stroke="#333333" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" class="dark:stroke-white" />
                                        </svg>
                                        <span class="pl-5">マイページ</span>
                                    </a>

                                    {{-- 設定 --}}
                                    <a href="{{ route('users.settings', ['username' => Auth::user()->username]) }}"
                                        class="flex items-center text-sm cursor-pointer p-3 rounded hover:bg-f4 dark:hover:bg-dark-2 dark:hover:text-white whitespace-nowrap">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                                                stroke="#333333" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white" />
                                            <path
                                                d="M2 12.8801V11.1201C2 10.0801 2.85 9.22006 3.9 9.22006C5.71 9.22006 6.45 7.94006 5.54 6.37006C5.02 5.47006 5.33 4.30006 6.24 3.78006L7.97 2.79006C8.76 2.32006 9.78 2.60006 10.25 3.39006L10.36 3.58006C11.26 5.15006 12.74 5.15006 13.65 3.58006L13.76 3.39006C14.23 2.60006 15.25 2.32006 16.04 2.79006L17.77 3.78006C18.68 4.30006 18.99 5.47006 18.47 6.37006C17.56 7.94006 18.3 9.22006 20.11 9.22006C21.15 9.22006 22.01 10.0701 22.01 11.1201V12.8801C22.01 13.9201 21.16 14.7801 20.11 14.7801C18.3 14.7801 17.56 16.0601 18.47 17.6301C18.99 18.5401 18.68 19.7001 17.77 20.2201L16.04 21.2101C15.25 21.6801 14.23 21.4001 13.76 20.6101L13.65 20.4201C12.75 18.8501 11.27 18.8501 10.36 20.4201L10.25 20.6101C9.78 21.4001 8.76 21.6801 7.97 21.2101L6.24 20.2201C5.33 19.7001 5.02 18.5301 5.54 17.6301C6.45 16.0601 5.71 14.7801 3.9 14.7801C2.85 14.7801 2 13.9201 2 12.8801Z"
                                                stroke="#333333" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white" />
                                        </svg>
                                        <span class="pl-5">設定</span>
                                    </a>

                                    {{-- ダークモード --}}
                                    <div href="{{ route('users.show', ['username' => Auth::user()->username]) }}"
                                        class="flex items-center text-sm cursor-pointer rounded hover:bg-f4 dark:hover:bg-dark-2 dark:hover:text-white whitespace-nowrap">
                                        <theme-toggle></theme-toggle>
                                    </div>

                                    <div class="border-b border-ddd dark:border-dark my-1 w-full"></div>

                                    {{-- ログアウト --}}
                                    <div>
                                        <button form="logout-button" type="submit"
                                            class="flex items-center w-full text-left cursor-pointer p-3 rounded hover:bg-f4 dark:hover:bg-dark-2 dark:hover:text-white whitespace-nowrap">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M8.89999 7.55999C9.20999 3.95999 11.06 2.48999 15.11 2.48999H15.24C19.71 2.48999 21.5 4.27999 21.5 8.74999V15.27C21.5 19.74 19.71 21.53 15.24 21.53H15.11C11.09 21.53 9.23999 20.08 8.90999 16.54"
                                                    stroke="#333333" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" class="dark:stroke-white" />
                                                <path d="M2 12H14.88" stroke="#333333" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="dark:stroke-white" />
                                                <path d="M12.65 8.65002L16 12L12.65 15.35" stroke="#333333"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="dark:stroke-white" />
                                            </svg>

                                            <span class="pl-5">ログアウト</span>
                                        </button>
                                        <form id="logout-button" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    </div>
                                </header-user-modal>
                            @endauth
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
