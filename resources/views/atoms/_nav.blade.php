<div class="bg-white dark:bg-dark w-full flex-none lg:border-b border-ddd dark:border-dark">
    <div class="max-w-8xl mx-auto">
        <div class="py-4 lg:px-8 lg:border-0 mx-4 lg:mx-0">
            <div class="relative flex items-center">

                {{-- ロゴ --}}
                @include('atoms.nav.logo')

                <div class="hidden md:flex items-center ml-16 mr-auto">
                    @include('search.atoms._tabs', ['tab' => $tab])
                </div>

                <div class="flex items-center md:ml-auto">

                    {{-- 検索 --}}
                    <search-form :lang='@json(app()->getLocale())' class="md:mr-8 hidden lg:block"></search-form>

                    <div class="hidden lg:flex items-center">
                        <nav class="text-sm">
                            <div class="flex items-center">
                                @guest
                                    @include('auth._login')
                                @endguest
                                @auth
                                    <div class="flex items-center h-full mr-8">
                                        <create-modal>
                                            {{-- エラー文 --}}
                                            @include('atoms._error_card_list')
                                            @include('atoms.success')


                                            <form method="POST" action="{{ route('book.store', app()->getLocale()) }}"
                                                enctype="multipart/form-data">
                                                @include('books.atoms.form', ['update' => false])
                                                <div class="w-full flex justify-end">
                                                    <button type="submit"
                                                        class="btn-primary w-full py-4">{{ __('投稿する') }}</button>
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

@include('atoms._spnav', ['tab' => $tab])
