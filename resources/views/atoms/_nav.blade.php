<div class="bg-white dark:bg-dark w-full flex-none lg:border-b border-ddd dark:border-dark">
    <div class="max-w-8xl mx-auto">
        <div class="py-4 lg:px-8 lg:border-0 mx-4 lg:mx-0">
            <div class="relative flex items-center">

                {{-- ロゴ --}}
                @include('atoms.nav.logo')

                <div class="hidden md:flex items-center ml-16 mr-auto">
                    @include('search.atoms._tabs', ['tab' => $tab])
                </div>

                <div class="flex items-center ml-auto">

                    {{-- 検索 --}}
                    <search-form class="mr-8 hidden lg:block"></search-form>

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
                                                <div class="w-full flex justify-end">
                                                    <button type="submit"
                                                        onclick="this.disabled='disabled'; this.form.submit();"
                                                        class="btn-primary w-full py-4">投稿する</button>
                                                </div>
                                            </form>
                                        </create-modal>
                                    </div>

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
