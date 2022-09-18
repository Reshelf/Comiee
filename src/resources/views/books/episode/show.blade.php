@extends('app')

@section('title', $book->title)

@section('content')
    @include('_patials._episode_nav')

    {{-- エピソードスクリーン --}}
    <episode-screen></episode-screen>

    <div class="w-full h-full bg-white dark:bg-dark">
        <div class="max-w-7xl mx-auto md:py-12 flex justify-between">
            {{-- 左サイドバー --}}
            <div class="top-0 sticky lg:h-[500px] pb-4 pr-4 lg:max-w-[266px] lg:min-w-[266px]">
                @empty($book->thumbnail)
                    <img src="/img/bg.svg" alt="thumbnail"
                        class="block dark:hidden w-[250px] h-[250px] object-cover flex-shrink-0">
                    <img src="/img/bg-dark.svg" alt="thumbnail"
                        class="hidden dark:block w-[250px] h-[250px] object-cover flex-shrink-0">
                @else
                    <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt="book thumbnail"
                        class="w-[250px] h-[250px] object-cover flex-shrink-0">
                @endempty

                {{-- 作品タイトル --}}
                <a href="{{ route('book.show', ['book' => $book->id]) }}"
                    class="text-2xl font-semibold my-2 px-2">{{ $book->title }}</a>

                {{-- 再生数 --}}
                {{-- @empty(!$book) --}}
                <div class="w-full flex items-center px-2 mb-2">
                    <div class="flex items-center">
                        <span class="text-666 text-lg">{{ $book_views }}</span>
                        <span class=" text-aaa pl-2">回再生</span>
                    </div>
                </div>
                {{-- @endempty --}}

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
                    {{-- 作者だったら --}}
                    <div class="mt-6 px-2 w-full">
                        <book-edit-modal>
                            <template #trigger>作品内容を更新する</template>
                            <template #header>作品内容の更新</template>
                            @include('_patials._error_card_list')
                            {{-- HTMLのformタグは、PUTメソッドやPATCHメソッドをサポートしていない(DELETEメソッドもサポートしていない) --}}
                            <form id="submit-form" method="POST" enctype="multipart/form-data"
                                action="{{ route('book.update', ['book' => $book->id]) }}">
                                @csrf
                                {{-- LaravelのBladeでPATCHメソッド等を使う場合は、formタグではmethod属性を"POST"のままとしつつ、@methodでPATCHメソッド等を指定する --}}
                                @method('PATCH')
                                @include('books._patials.form')
                                <div class="w-full flex justify-end"><button id="submit-btn" type="submit"
                                        class="btn">更新する</button></div>
                            </form>
                        </book-edit-modal>
                    </div>
                @endif
            </div>

            <div class="w-full flex">
                {{-- メインコンテンツ --}}
                <div class="px-6 lg:w-2/3">
                    <book-tab>
                        <template #episode>
                            <div class="w-full max-h-[500px] overflow-y-auto scroll-none">
                                @if (Auth::id() === $book->user_id)
                                    <div
                                        class="w-full flex justify-end py-4 mb-2 cursor-pointer hover:bg-f5 rounded-[3px] border-dotted border-2 border-ccc hover:border-aaa">
                                        <episode-list :book='@json($book)'>
                                            エピソードを追加する
                                        </episode-list>
                                    </div>
                                @endif
                                @foreach ($episodes as $episode)
                                    <div
                                        class=" hover:bg-f5 my-2 py-2 border-b border-ddd flex items-center justify-between w-full overflow-hidden rounded-[3px]">
                                        <a href="{{ route('book.episode.show', ['book' => $book->id, 'episode' => $episode->id]) }}"
                                            class="flex items-center w-full cursor-pointer">
                                            @empty($book->thumbnail)
                                                <img src="/img/bg.svg" alt="thumbnail"
                                                    class="w-[160px] h-[80px] object-cover flex-shrink-0">
                                            @else
                                                <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt=""
                                                    class="w-[160px] h-[80px] object-cover flex-shrink-0">
                                            @endempty

                                            {{-- タイトル --}}
                                            <div class="w-full flex flex-col px-4">
                                                {{-- 日付 --}}
                                                <div class="text-666 text-xs">{{ $episode->created_at->format('Y/m/d') }}
                                                </div>


                                                <div class="w-full flex justify-between items-center">
                                                    {{-- 話数 --}}
                                                    {{-- 既読 --}}
                                                    <div class="flex flex-col">
                                                        <span class="">第{{ $counts-- }}話</span>
                                                        @if ($book->user->id !== Auth::user()->id)
                                                            @if ($episode->is_read)
                                                                <span class="inline-block text-xs text-666 mt-1">既読</span>
                                                            @else
                                                                <span class="inline-block text-xs text-666 mt-1">未読</span>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    {{-- 値段 --}}
                                                    <div class="flex items-center ml-4">
                                                        @if ($episode->is_free)
                                                            <span
                                                                class="text-xs bg-[#E50111] text-white py-0.5 px-1.5 rounded-[3px]">無料</span>
                                                        @else
                                                            <span
                                                                class="inline-block ml-2 text-xs bg-eee py-0.5 px-1.5 rounded-[3px]">{{ $episode->price }}
                                                                pt</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="flex mt-1"></div>
                                            </div>
                                        </a>

                                        {{-- 作者欄 --}}
                                        @if (Auth::id() === $book->user_id)
                                            <hover-menu>
                                                <template #avatar>
                                                    <div class="flex p-1 hover:bg-ddd rounded-full cursor-pointer">
                                                        <svg width="24" height="24" class="flex-shrink-0"
                                                            style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                            <path
                                                                d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </template>
                                                {{-- <a href="{{ route('book.episode.edit', ['book' => $book->id, 'episode' => $episode->id]) }}"
                                                    class="">
                                                    <svg class="h-5 w-5 cursor-pointer hover:text-primary" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a> --}}

                                                {{-- エピソードの削除 --}}
                                                <div class="flex flex-col">
                                                    <span
                                                        class="inline-block whitespace-nowrap cursor-pointer hover:text-primary mb-2">編集する</span>
                                                    <delete-modal>
                                                        <template #trigger>
                                                            <span
                                                                class="whitespace-nowrap cursor-pointer hover:text-primary">削除する</span>
                                                        </template>
                                                        <template #header>エピソードの削除</template>
                                                        <form method="POST"
                                                            action="{{ route('book.episode.destroy', ['book' => $book->id, 'episode' => $episode->id]) }}"
                                                            class="p-2 rounded">
                                                            @csrf
                                                            @method('DELETE')

                                                            <span>本当に削除してよろしいですか？</span>
                                                            <span>一度削除したら戻すことができません。</span>
                                                            <button type="submit" class="btn-danger mt-4">削除する</button>
                                                        </form>
                                                    </delete-modal>
                                                </div>

                                            </hover-menu>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </template>
                        <template #story>
                            {!! nl2br($book->story) !!}
                        </template>
                        <template #info>

                            {{-- 原作 --}}
                            @empty(!$book->author)
                                <div class="w-full flex items-center mb-4 pl-2">
                                    <div class="w-1/2">原作</div>
                                    <a href="{{ route('users.show', ['username' => $book->user->username]) }}"
                                        class="w-1/2 hover:text-primary">{{ $book->author }}</a>
                                </div>
                            @endempty

                            {{-- 漫画 --}}
                            @empty(!$book->manga_artist)
                                <div class="w-full flex items-center mb-4 pl-2">
                                    <div class="w-1/2">漫画</div>
                                    <a href="" class="w-1/2 hover:text-primary">{{ $book->manga_artist }}</a>
                                </div>
                            @endempty

                            {{-- アシスタント --}}
                            @empty(!$book->assistant)
                                <div class="w-full flex items-start mb-4 pl-2">
                                    <div class="w-1/2">アシスタント</div>
                                    <ul class="w-1/2 flex flex-col">
                                        @foreach ($book->assistant as $assistant)
                                            @if ($loop->first)
                                            @endif
                                            <li class="mb-1">
                                                <a href="" class="hover:text-primary">
                                                    {{ $assistant->name }}
                                                </a>
                                            </li>
                                            @if ($loop->last)
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endempty

                            {{-- カテゴリー --}}
                            @empty(!$book->category)
                                <div class="w-full flex items-center mb-4 pl-2">
                                    <div class="w-1/2">カテゴリー</div>
                                    <div class="w-1/2">{{ $book->category }}</div>
                                </div>
                            @endempty

                            {{-- タグ --}}
                            @empty(!$book->tags)
                                <div class="w-full flex items-start pl-2">
                                    <div class="w-1/2">タグ</div>
                                    <div class="w-1/2 flex flex-wrap items-center">
                                        @foreach ($book->tags as $tag)
                                            @if ($loop->first)
                                            @endif
                                            <a href="{{ route('tags.show', ['name' => $tag->name]) }}"
                                                class="inline-block mr-2 mb-2 text-xs text-666 dark:text-ddd rounded-[3px] border border-aaa hover:border-primary hover:text-primary p-1.5 px-2">
                                                {{ $tag->hashtag }}
                                            </a>
                                            @if ($loop->last)
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endempty
                        </template>
                    </book-tab>


                    <div class="w-full mx-auto flex flex-col">
                        {{-- コメント --}}
                        <div class="flex flex-col mb-8 pb-8">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold mb-4">エピソードへの応援コメント</h3>
                                <comment-post-modal>
                                    <template #trigger>コメントをする</template>
                                    <template #header>コメントを投稿する</template>
                                    <form id="submit-form" method="POST"
                                        action="{{ route('book.episode.comment.store', ['book_id' => $book->id, 'episode_id' => $episode->id]) }}">
                                        @csrf
                                        <input value="{{ $episode->id }}" type="hidden" name="episode_id" />
                                        <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                                        <textarea class="w-full h-[250px] rounded-[3px]"
                                            placeholder="コメントを書いて作品を応援しよう！暴言・誹謗中傷は禁止です。違反した場合はアカウント凍結になりますのでご注意ください。" autocomplete="off" autofocus="on"
                                            type="text" name="comment" maxlength="400" required></textarea>
                                        <button id="submit-btn" type="submit" class="btn w-full">投稿する</button>
                                    </form>
                                </comment-post-modal>
                            </div>

                            {{-- @if (!$episode->comments->count() > 0)
                                このエピソードに応援コメントをしよう！
                            @else --}}
                            <div class="max-h-[500px] overflow-y-auto scroll-none ">
                                @foreach ($episode->comments as $comment)
                                    @if ($comment->episode_id === $episode->id)
                                        <div id="comment-episode-{{ $episode->id }}"
                                            class="mb-2 pt-2 px-2 pb-4 border-b border-ccc">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center">
                                                    <a href="{{ route('users.show', ['username' => $comment->user->username]) }}"
                                                        class="flex items-center">
                                                    @empty($comment->user->avatar)
                                                        <img src="{{ asset('/img/bg.svg') }}" alt=""
                                                            class="h-8 w-8 rounded-full">
                                                    @else
                                                        <img src="{{ asset('/img/users/avatar/' . $comment->user->avatar) }}"
                                                            alt="" class="h-8 w-8 rounded-full">
                                                    @endempty
                                                    <div class="flex flex-col ml-2">
                                                        <span>{{ $comment->user->name }}</span>
                                                        <span
                                                            class="text-xs text-666 dark:text-ddd">{{ $comment->created_at->format('Y/m/d H:i') }}</span>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="">
                                                @if ($comment->user->id == Auth::id())
                                                    <form method="POST"
                                                        action="{{ route('book.episode.comment.destroy', ['book_id' => $book->id, 'episode_id' => $episode->id, 'comment_id' => $comment->id]) }}"
                                                        class="text-xs text-666">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-xs text-666">削除する</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="px-4 pt-4 text-666">{!! nl2br($comment->comment) !!}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

            {{-- 右サイドバー --}}
            <div class="pl-4 lg:w-1/3">
                {{-- こんな作品はいかがですか？ --}}
                {{-- <div class="flex flex-col mb-8 pb-8">
                        <h3 class="text-lg font-semibold">オススメの作品</h3>
                        <div class="p-8">
                            <div class="w-full flex flex-col">
                                @empty($book->thumbnail)
                                    <img src="/img/bg.svg" alt="thumbnail"
                                        class="block dark:hidden w-[200px] h-[200px] object-cover flex-shrink-0">
                                    <img src="/img/bg-dark.svg" alt="thumbnail"
                                        class="hidden dark:block w-[200px] h-[200px] object-cover flex-shrink-0">
                                @else
                                    <img src="/img/{{ $book->thumbnail }}" alt=""
                                        class="thumbnail">
                                @endempty
                                <h2 class="text-lg font-semibold my-2 px-2">{{ $book->title }}</h2>
                            </div>
                        </div>
                    </div> --}}
            </div>
        </div>
    </div>

    <div class="w-full mx-auto">
        <div class="book-show">
            <div class="book-show-contents">
                {{-- サムネイル --}}
                @empty($book->thumbnail)
                    <img src="/img/bg.svg" alt="thumbnail" class="w-[250px] h-[250px] object-cover flex-shrink-0">
                @else
                    <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt=""
                        class="w-[250px] h-[250px] object-cover flex-shrink-0">
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
@endsection
