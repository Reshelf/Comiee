@extends('app')

@section('title', $book->title)

@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection

@section('content')
    @include('atoms._nav', ['tab' => 0])

    <div class="w-full h-full bg-white dark:bg-dark">
        <div class="max-w-7xl mx-auto md:py-12 flex justify-between">
            {{-- 左サイドバー --}}
            <div class="top-0 sticky lg:h-[500px] pb-4 pr-4 lg:max-w-[266px] lg:min-w-[266px]">
                @empty($book->thumbnail)
                    <img src="/img/bg.svg" alt="thumbnail" class="block dark:hidden w-[250px] h-[250px] object-cover">
                    <img src="/img/bg-dark.svg" alt="thumbnail" class="hidden dark:block w-[250px] h-[250px] object-cover">
                @else
                    <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt="book thumbnail"
                        class="w-[250px] h-[250px] object-cover">
                @endempty

                {{-- 作品タイトル --}}
                <h2 class="text-2xl font-semibold my-2 px-2">
                    {{ $book->title }}
                </h2>

                {{-- 閲覧数 --}}
                {{-- @empty(!$book) --}}
                <div class="w-full flex items-center px-2 mb-2">
                    <div class="flex items-center">
                        <span class="text-666 text-lg">{{ number_format($book->views) }}</span>
                        <span class=" text-aaa pl-2">回閲覧</span>
                    </div>
                </div>
                {{-- @endempty --}}

                {{-- 完結作品 --}}
                @if ($book->is_complete)
                    <a href="{{ route('search.complete') }}"
                        class="mb-2 inline-block text-[#e19324] dark:bg-[#e19324] dark:bg-opacity-30 text-xs border dark:border-none px-2 py-0.5 rounded-[3px] ml-2">
                        完結</a>
                @endif


                {{-- お気に入り --}}
                <div class="w-full flex items-center px-2 mb-4">
                    <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                        :initial-count-likes='@json($book->count_likes)' :authorized='@json(Auth::check())'
                        endpoint="{{ route('book.like', ['book' => $book]) }}">
                    </book-like>
                </div>

                @if (Auth::id() !== $book->user_id)
                    {{-- 読者だったら --}}
                    <div class="w-full flex flex-col mt-6 px-2">
                        <button class="btn-border py-3 mb-2">1話を読む</button>
                        <button class="btn-primary py-3">全話をまとめて購入</button>
                    </div>
                @else
                    {{-- 作品内容の更新 --}}
                    @include('books.atoms.edit')
                @endif

                {{-- SNSシェア --}}
                <div class="mt-4 mx-2 flex justify-between items-center">
                    <!-- Twitter -->
                    <a class="js-sns-link w-1/4 mr-2 py-2 border border-[#46ACDF] rounded hover:bg-[#46ACDF] hover:bg-opacity-10"
                        href="//twitter.com/intent/tweet?text=&url=" target="_blank" rel="nofollow noopener noreferrer">
                        <svg class="mx-auto" width="18" height="18" viewBox="0 0 32 32" fill="none">
                            <path
                                d="M11.7887 28C8.55374 28 5.53817 27.0591 3 25.4356C5.15499 25.5751 8.95807 25.2411 11.3236 22.9848C7.76508 22.8215 6.16026 20.0923 5.95094 18.926C6.25329 19.0426 7.6953 19.1826 8.50934 18.856C4.4159 17.8296 3.78793 14.2373 3.92748 13.141C4.695 13.6775 5.99745 13.8641 6.50913 13.8174C2.69479 11.0882 4.06703 6.98276 4.74151 6.09635C7.47882 9.88867 11.5812 12.0186 16.6564 12.137C16.5607 11.7174 16.5102 11.2804 16.5102 10.8316C16.5102 7.61092 19.1134 5 22.3247 5C24.0025 5 25.5144 5.71275 26.5757 6.85284C27.6969 6.59011 29.3843 5.97507 30.2092 5.4432C29.7934 6.93611 28.4989 8.18149 27.7159 8.64308C27.7224 8.65878 27.7095 8.62731 27.7159 8.64308C28.4037 8.53904 30.2648 8.18137 31 7.68256C30.6364 8.52125 29.264 9.91573 28.1377 10.6964C28.3473 19.9381 21.2765 28 11.7887 28Z"
                                fill="#47ACDF" />
                        </svg>
                    </a>

                    <!-- Facebook -->
                    <a class="js-sns-link w-1/4 mr-2 py-2 border border-[#0F91F3] rounded hover:bg-[#0F91F3] hover:bg-opacity-10"
                        href="//www.facebook.com/sharer/sharer.php?u=&t=" target="_blank"
                        rel="nofollow noopener noreferrer">
                        <svg class="mx-auto" width="18" height="18" viewBox="0 0 32 32" fill="none">
                            <circle cx="16" cy="16" r="14" fill="url(#paint0_linear_29_2043)" />
                            <path
                                d="M21.2137 20.2816L21.8356 16.3301H17.9452V13.767C17.9452 12.6857 18.4877 11.6311 20.2302 11.6311H22V8.26699C22 8.26699 20.3945 8 18.8603 8C15.6548 8 13.5617 9.89294 13.5617 13.3184V16.3301H10V20.2816H13.5617V29.8345C14.2767 29.944 15.0082 30 15.7534 30C16.4986 30 17.2302 29.944 17.9452 29.8345V20.2816H21.2137Z"
                                fill="white" />
                            <defs>
                                <linearGradient id="paint0_linear_29_2043" x1="16" y1="2" x2="16"
                                    y2="29.917" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#18ACFE" />
                                    <stop offset="1" stop-color="#0163E0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </a>



                    <!-- LINE -->
                    <a class="js-sns-link w-1/4 mr-2 py-2 border border-[#2DCF54] rounded hover:bg-[#2DCF54] hover:bg-opacity-10"
                        href="//timeline.line.me/social-plugin/share?url=&text=" target="_blank"
                        rel="nofollow noopener noreferrer">
                        <svg class="mx-auto" width="18" height="18" viewBox="0 0 32 32" fill="none">
                            <path
                                d="M30 14.4979C30 8.15792 23.7199 3 15.9999 3C8.28094 3 2 8.15792 2 14.4979C2 20.1817 6.98063 24.9417 13.7084 25.8418C14.1644 25.9412 14.7849 26.146 14.9419 26.5404C15.0831 26.8986 15.0342 27.4598 14.987 27.8216C14.987 27.8216 14.8227 28.8214 14.7873 29.0343C14.7264 29.3926 14.5061 30.4353 15.9999 29.7981C17.4942 29.1609 24.0626 24.9935 26.9998 21.572C29.0287 19.3204 30 17.0353 30 14.4979Z"
                                fill="#2CCF54" />
                            <path
                                d="M13.1553 11.4249H12.1733C12.0228 11.4249 11.9004 11.5483 11.9004 11.7V17.8665C11.9004 18.0184 12.0228 18.1416 12.1733 18.1416H13.1553C13.3059 18.1416 13.428 18.0184 13.428 17.8665V11.7C13.428 11.5483 13.3059 11.4249 13.1553 11.4249Z"
                                fill="white" />
                            <path
                                d="M19.9147 11.4249H18.9327C18.7821 11.4249 18.66 11.5483 18.66 11.7V15.3635L15.8645 11.5472C15.8128 11.4688 15.729 11.43 15.6375 11.4249H14.6558C14.5052 11.4249 14.3828 11.5483 14.3828 11.7V17.8665C14.3828 18.0184 14.5052 18.1416 14.6558 18.1416H15.6375C15.7883 18.1416 15.9104 18.0184 15.9104 17.8665V14.204L18.7094 18.0252C18.7597 18.0972 18.845 18.1416 18.9327 18.1416H19.9147C20.0655 18.1416 20.1874 18.0184 20.1874 17.8665V11.7C20.1874 11.5483 20.0655 11.4249 19.9147 11.4249Z"
                                fill="white" />
                            <path
                                d="M10.7884 16.5974H8.12013V11.7002C8.12013 11.548 7.99802 11.4246 7.84773 11.4246H6.86545C6.71489 11.4246 6.59277 11.548 6.59277 11.7002V17.8657C6.59277 18.0154 6.71435 18.1416 6.86518 18.1416H10.7884C10.9389 18.1416 11.0605 18.0179 11.0605 17.8657V16.873C11.0605 16.7208 10.9389 16.5974 10.7884 16.5974Z"
                                fill="white" />
                            <path
                                d="M25.3377 12.9688C25.4883 12.9688 25.6098 12.8456 25.6098 12.6932V11.7005C25.6098 11.5483 25.4883 11.4246 25.3377 11.4246H21.4148C21.2641 11.4246 21.1421 11.5506 21.1421 11.7002V17.866C21.1421 18.0152 21.2638 18.1416 21.4142 18.1416H25.3377C25.4883 18.1416 25.6098 18.0179 25.6098 17.866V16.873C25.6098 16.7211 25.4883 16.5974 25.3377 16.5974H22.6697V15.5551H25.3377C25.4883 15.5551 25.6098 15.4316 25.6098 15.2794V14.2868C25.6098 14.1346 25.4883 14.0109 25.3377 14.0109H22.6697V12.9688H25.3377Z"
                                fill="white" />
                        </svg>
                    </a>

                    <!-- ピンタレスト -->
                    <a class="js-sns-link w-1/4 py-2 border border-[#BA0F23] rounded hover:bg-[#BA0F23] hover:bg-opacity-10"
                        href="//www.pinterest.com/pin/create/button/?url=&media=" target="_blank"
                        rel="nofollow noopener noreferrer">
                        <svg class="mx-auto" width="18" height="18" viewBox="0 0 32 32" fill="none">
                            <circle cx="16" cy="16" r="14" fill="white" />
                            <path
                                d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 21.6801 5.38269 26.5702 10.2435 28.7655C10.25 28.6141 10.2573 28.4752 10.2636 28.3561C10.2722 28.1938 10.2788 28.0682 10.2788 27.9976C10.2788 27.5769 10.5649 25.4904 10.5649 25.4904L12.3149 18.3053C12.0457 17.8678 11.8438 16.9423 11.8438 16.2356C11.8438 12.9711 13.6611 12.2644 14.7716 12.2644C16.1851 12.2644 16.5048 13.7957 16.5048 14.9231C16.5048 15.5194 16.1955 16.4528 15.8772 17.4134C15.5398 18.4314 15.1923 19.4799 15.1923 20.1899C15.1923 21.5697 16.5553 22.2596 17.4976 22.2596C19.988 22.2596 22.2764 19.1298 22.2764 16C22.2764 12.8702 20.8125 9.08412 16.0168 9.08412C11.2212 9.08412 9.06731 12.7356 9.06731 15.5288C9.06731 17.4134 9.77404 18.7933 10.1274 19.0288C10.2284 19.1186 10.4 19.3957 10.2788 19.786C10.1577 20.1764 9.9367 21.0481 9.84135 21.4351C9.83013 21.5248 9.72356 21.6774 9.38702 21.5697C8.96635 21.4351 6.29087 19.7524 6.29087 15.5288C6.29087 11.3053 9.60577 6.39182 16.0168 6.39182C22.4279 6.39182 25.7091 10.6995 25.7091 16C25.7091 21.3005 21.4183 24.6827 18.1538 24.6827C15.5423 24.6827 14.5192 23.516 14.3341 22.9327L13.3413 26.7187C13.1069 27.3468 12.6696 28.4757 12.1304 29.4583C13.3594 29.8111 14.6576 30 16 30Z"
                                fill="#BB0F23" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="w-full flex">
                {{-- メインコンテンツ --}}
                <div class="px-6 lg:w-2/3">
                    <book-tab>
                        <template #episode>
                            <div class="w-full max-h-[500px] overflow-y-auto scroll-none">
                                @if (Auth::id() === $book->user_id)
                                    <episode-list>
                                        <template #trigger>エピソードを追加する</template>
                                        <template #header>エピソードを追加する</template>
                                        <form method="POST"
                                            action="{{ route('book.episode.store', ['book_id' => $book->id]) }}">
                                            @csrf
                                            <button onclick="this.disabled='disabled'; this.form.submit();" type="submit"
                                                class="btn w-full">投稿する</button>
                                        </form>
                                    </episode-list>
                                @endif
                                @foreach ($book->episodes as $episode)
                                    <div
                                        class="hover:bg-f5 dark:hover:bg-dark-1 my-2 py-2 border-b border-ddd dark:border-dark-1 flex items-center justify-between w-full overflow-hidden rounded-[3px]">
                                        <a href="{{ route('book.episode.show', ['book_id' => $book->id, 'episode_number' => $episode->number]) }}"
                                            class="flex items-center w-full cursor-pointer">
                                            @empty($book->thumbnail)
                                                <img src="/img/bg.svg" alt="thumbnail"
                                                    class="block dark:hidden w-[160px] h-[80px] object-cover">
                                                <img src="/img/bg-dark.svg" alt="thumbnail"
                                                    class="hidden dark:block w-[160px] h-[80px] object-cover">
                                            @else
                                                <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}"
                                                    alt="" class="w-[160px] h-[80px] object-cover">
                                            @endempty

                                            {{-- タイトル --}}
                                            <div class="w-full flex flex-col px-4">
                                                {{-- 日付 --}}
                                                <div class="text-666 text-xs">
                                                    {{ $episode->created_at->format('Y/m/d') }}
                                                </div>


                                                <div class="w-full flex justify-between items-center">
                                                    {{-- 話数 --}}
                                                    {{-- 既読 --}}
                                                    <div class="flex flex-col">
                                                        <span class="">第{{ $episode->number }}話</span>

                                                        <div class="flex items-center mt-1">
                                                            {{-- 値段 --}}
                                                            @if ($episode->is_free)
                                                                <span
                                                                    class="text-xs bg-[#E50111] text-white py-0.5 px-1.5 rounded-[3px]">
                                                                    無料
                                                                </span>
                                                            @else
                                                                <span
                                                                    class="inline-block ml-2 text-xs bg-eee py-0.5 px-1.5 rounded-[3px]">
                                                                    {{ $episode->price }}pt
                                                                </span>
                                                            @endif
                                                            @auth
                                                                @if ($book->user->id !== Auth::user()->id)
                                                                    @if ($episode->isReadBy(Auth::user()))
                                                                        <span class="inline-block text-xs text-666 ml-2">
                                                                            既読
                                                                        </span>
                                                                    @else
                                                                        <span class="inline-block text-xs text-666 ml-2">
                                                                            未読
                                                                        </span>
                                                                    @endif
                                                                @endif
                                                            @endauth
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="flex mt-1"></div>
                                            </div>
                                        </a>

                                        {{-- 作者欄 --}}
                                        <div class="flex items-center pr-4">
                                            @if (Auth::id() === $book->user_id)
                                                <div class="flex items-center">
                                                    {{-- <a href="{{ route('book.episode.edit', ['book_id' => $book->id, 'episode_id' => $episode->id]) }}"
                                                        class="mr-2">
                                                        <svg class="h-5 w-5 cursor-pointer hover:text-primary"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a> --}}
                                                    <delete-modal>
                                                        <form method="POST"
                                                            action="{{ route('book.episode.destroy', ['book_id' => $book->id, 'episode_id' => $episode->id]) }}"
                                                            class="p-2 rounded">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="this.disabled='disabled'; this.form.submit();"
                                                                type="submit" class="btn-danger">削除する</button>
                                                        </form>
                                                    </delete-modal>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </template>
                        <template #info>
                            {{-- あらすじ --}}
                            @empty(!$book->story)
                                <div class="w-full flex flex-col border-b border-ccc dark:border-dark-1 pb-6 mb-6 pl-2">
                                    <div class="text-sm">
                                        {!! nl2br($book->story) !!}
                                    </div>
                                </div>
                            @endempty

                            {{-- 原作 --}}
                            @empty(!$book->user->name)
                                <div class="w-full flex items-center mb-4 pl-2">
                                    <div class="w-1/2">作者</div>
                                    <a href="{{ route('users.show', ['username' => $book->user->username]) }}"
                                        class="w-1/2 hover:text-primary">{{ $book->user->name }}</a>
                                </div>
                            @endempty


                            {{-- ジャンル --}}
                            @empty(!$book->genre_id)
                                <div class="w-full flex items-center mb-4 pl-2">
                                    <div class="w-1/2">ジャンル</div>
                                    <div class="w-1/2">
                                        @if ($book->genre_id === 1)
                                            <a href="{{ route('ranking.boys') }}" class="hover:text-primary">少年</a>
                                        @elseif($book->genre_id === 2)
                                            <a href="{{ route('ranking.youth') }}" class="hover:text-primary">青年</a>
                                        @elseif($book->genre_id === 3)
                                            <a href="{{ route('ranking.girls') }}" class="hover:text-primary">少女</a>
                                        @elseif($book->genre_id === 4)
                                            <a href="{{ route('ranking.woman') }}" class="hover:text-primary">女性</a>
                                        @elseif($book->genre_id === 5)
                                            <a href="{{ route('ranking.adult') }}" class="hover:text-primary">オトナ</a>
                                        @endif
                                    </div>
                                </div>
                            @endempty

                            {{-- タグ --}}
                            @if (count($book->tags) > 0)
                                <div class="w-full flex items-start pl-2">
                                    <div class="w-1/2">タグ</div>
                                    <div class="w-1/2 flex flex-wrap items-center">
                                        @foreach ($book->tags as $tag)
                                            @if ($loop->first)
                                            @endif
                                            <a href="{{ route('search.tag_name', ['name' => $tag->name]) }}"
                                                class="inline-block mr-2 mb-2 text-xs text-666 dark:text-ddd rounded-[3px] border border-aaa  hover:text-primary p-1.5 px-2">
                                                {{ $tag->hashtag }}
                                            </a>
                                            @if ($loop->last)
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </template>
                    </book-tab>
                </div>

                {{-- 右サイドバー --}}
                <div class="pl-4 lg:w-1/3">

                </div>
            </div>
        </div>

        <div class="w-full mx-auto">
            <div class="book-show">
                <div class="book-show-contents">
                    {{-- サムネイル --}}
                    @empty($book->thumbnail)
                        <img src="/img/bg.svg" alt="thumbnail" class="block dark:hidden w-[250px] h-[250px] object-cover">
                        <img src="/img/bg-dark.svg" alt="thumbnail"
                            class="hidden dark:block w-[250px] h-[250px] object-cover">
                    @else
                        <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt=""
                            class="w-[250px] h-[250px] object-cover">
                    @endempty

                    <div class="flex flex-col max-w-lg ml-16">
                        <p class="w-full flex flex-wrap text-4xl whitespace-pre-line text-white font-semibold">
                            {{ $book->title }}</p>
                        <a href="{{ route('users.show', ['username' => $book->user->username]) }}"
                            class="flex items-center my-4">
                            <span class="text-xl text-white">{{ $book->user->name }}</span>
                        </a>

                        <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                            :initial-count-likes='@json($book->count_likes)' :authorized='@json(Auth::check())'
                            endpoint="{{ route('book.like', ['book' => $book]) }}" :big='true'
                            class="text-white">
                        </book-like>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('atoms._footer')


    <script>
        let url = location.href
        let snsLinks = $(".js-sns-link")
        for (let i = 0; i < snsLinks.length; i++) {
            let href = snsLinks.eq(i).attr('href');
            //シェアページのURL上書き
            href = href.replace("u=", "u=" + url) //facebook
            href = href.replace("url=", "url=" + url) //twitter,LINE,ピンタレスト
            snsLinks.eq(i).attr('href', href);
        }
    </script>
@endsection
