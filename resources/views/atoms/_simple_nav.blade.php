<div class="bg-white dark:bg-dark sticky top-0 z-40 w-full flex-none lg:z-20 mlg:border-b border-ddd dark:border-dark">
    <div class="max-w-8xl mx-auto">
        <div class="py-4 lg:px-6 mx-4 lg:mx-0">
            <div class="relative flex items-center">

                {{-- ロゴ --}}
                @include('atoms.nav.logo')

                <div class="hidden lg:flex items-center md:ml-auto">
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
                                                <button type="submit" class="btn-primary w-full py-4">投稿する</button>
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

@include('atoms._spnav', ['tab' => 4])
