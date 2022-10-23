<div class="fixed top-0 z-[100] bg-white opacity-0 hover:opacity-100 dark:bg-dark w-full">
    <div class="max-w-8xl mx-auto">
        <div class="py-4 lg:px-8 mx-4 lg:mx-0">
            <div class="relative flex items-center">

                {{-- ロゴ --}}
                @include('atoms.nav.logo')

                <div class="flex items-center ml-16 mr-auto">
                    {{-- 検索フォーム --}}
                    @include('search.atoms._tabs', ['tab' => 0])
                </div>

                <div class="flex items-center ml-auto">
                    <search-form class="mr-8"></search-form>
                    <div class="hidden lg:flex items-center">
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
                                            @include('atoms._error_card_list')

                                            <form method="POST" action="{{ route('book.store') }}"
                                                enctype="multipart/form-data">
                                                @include('books.atoms.form')
                                                <div class="w-full flex justify-end"><button
                                                        onclick="this.disabled='disabled'; this.form.submit();"
                                                        type="submit" class="btn">投稿する</button></div>
                                            </form>
                                        </create-modal>
                                    </div>
                                    {{-- ユーザーメニュー --}}
                                    @include('atoms.nav.user_modal')
                                @endauth
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
