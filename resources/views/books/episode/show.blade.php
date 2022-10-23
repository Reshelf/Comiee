@extends('app')

@section('title', $episode_story->number . '話' . ' - ' . $book->title)

@section('content')
    @include('atoms._episode_nav', ['tab' => 0])

    {{-- エピソードスクリーン --}}
    <episode-screen></episode-screen>

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
                <a href="{{ route('book.show', ['book_id' => $book->id]) }}"
                    class="text-2xl font-semibold my-2 px-2">{{ $book->title }}</a>

                {{-- 閲覧数 --}}
                {{-- @empty(!$book) --}}
                <div class="w-full flex items-center px-2 mb-2">
                    <div class="flex items-center">
                        <span class="text-666 text-lg">{{ number_format($book->views) }}</span>
                        <span class=" text-aaa pl-2">回閲覧</span>
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
                    {{-- 作品内容の更新 --}}
                    @include('books.atoms.edit')
                @endif
            </div>

            <div class="w-full flex">
                {{-- メインコンテンツ --}}
                <div class="px-6 lg:w-2/3">
                    <book-tab :is_comment="true">
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
                                        class="dark:hover:bg-dark-1 hover:bg-f5 my-2 py-2 border-b border-ddd dark:border-dark-1 flex items-center justify-between w-full overflow-hidden rounded-[3px]">
                                        <a href="{{ route('book.episode.show', ['book_id' => $book->id, 'episode_number' => $episode->number]) }}"
                                            class="flex items-center w-full cursor-pointer">
                                            @empty($episode->thumbnail)
                                                <img src="/img/bg.svg" alt="thumbnail"
                                                    class="block dark:hidden w-[160px] h-[80px] object-cover">
                                                <img src="/img/bg-dark.svg" alt="thumbnail"
                                                    class="hidden dark:block w-[160px] h-[80px] object-cover">
                                            @else
                                                <img src="{{ asset('/img/book/thumbnail/' . $episode->thumbnail) }}"
                                                    alt="" class="w-[160px] h-[80px] object-cover">
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
                                                        <span class="">第{{ $episode->number }}話</span>
                                                        @auth
                                                            @if ($book->user->id !== Auth::user()->id)
                                                                @if ($episode->isReadBy(Auth::user()))
                                                                    <span class="inline-block text-xs text-666 mt-1">既読</span>
                                                                @else
                                                                    <span class="inline-block text-xs text-666 mt-1">未読</span>
                                                                @endif
                                                            @endif
                                                        @endauth

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
                                                        <svg width="24" height="24" class=""
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
                                                            action="{{ route('book.episode.destroy', ['book_id' => $book->id, 'episode_id' => $episode_story->id]) }}"
                                                            class="p-2 rounded">
                                                            @csrf
                                                            @method('DELETE')

                                                            <span>本当に削除してよろしいですか？</span>
                                                            <span>一度削除したら戻すことができません。</span>
                                                            <button onclick="this.disabled='disabled'; this.form.submit();"
                                                                type="submit" class="btn-danger mt-4">削除する</button>
                                                        </form>
                                                    </delete-modal>
                                                </div>

                                            </hover-menu>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </template>
                        <template #info>
                            {{-- あらすじ --}}
                            @isset($book->story)
                                <div class="w-full flex flex-col border-b border-ccc dark:border-dark-1 pb-6 mb-6 pl-2">
                                    <div class="text-sm">
                                        {!! nl2br($book->story) !!}
                                    </div>
                                </div>
                            @endisset

                            {{-- 作者 --}}
                            @isset($book->user->name)
                                <div class="w-full flex items-center mb-4 pl-2">
                                    <div class="w-1/2">作者</div>
                                    <a href="{{ route('users.show', ['username' => $book->user->username]) }}"
                                        class="w-1/2 hover:text-primary">{{ $book->user->name }}</a>
                                </div>
                            @endisset

                            {{-- ジャンル --}}
                            @isset($book->genre_id)
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
                            @endisset

                            {{-- タグ --}}
                            @isset($book->tags)
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
                            @endisset
                        </template>
                        <template #comment>
                            <div class="flex flex-col">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-lg font-semibold mb-4">エピソードへの応援コメント</h3>
                                    <comment-post-modal>
                                        <template #btn-trigger>
                                            <span class="btn-border px-4 text-xs">コメントをする</span>
                                        </template>
                                        <template #header>応援コメントを投稿する</template>
                                        <form method="POST"
                                            action="{{ route('book.episode.comment.store', ['book_id' => $book->id, 'episode_number' => $episode_story->number]) }}">
                                            @csrf
                                            <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                                            <textarea class="w-full h-[250px] rounded-[3px]"
                                                placeholder="ここはエピソードへの応援コメントを投稿できる場所です！&#10;&#10;作品内容と関係がないコメント、作品や作家を中傷するようなコメント、ネタバレやその他不適切なコメントは投稿しないでね！&#10;&#10;不適切なコメントを見つけた場合は通報をお願いいたします！&#10;&#10;ひどい場合は、断りなくコメントの削除やアカウントを凍結させていただく場合があります。"
                                                autocomplete="off" autofocus="on" type="text" name="comment" maxlength="400" required></textarea>
                                            <button onclick="this.disabled='disabled'; this.form.submit();" type="submit"
                                                class="btn-primary py-4 w-full">投稿する</button>
                                        </form>
                                    </comment-post-modal>
                                </div>


                                @foreach ($episode_comments as $comment)
                                    {{-- コメント --}}
                                    @empty($comment->parent_id)
                                        <div id="comment-episode-{{ $episode_story->number }}" class="mb-2 pt-2 px-2 pb-2">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center">
                                                    <a href="{{ route('users.show', ['username' => $comment->user->username]) }}"
                                                        class="flex items-center">
                                                        @empty($comment->user->avatar)
                                                            <img src="{{ asset('/img/bg.svg') }}" alt=""
                                                                class="block dark:hidden h-8 w-8 rounded-full">
                                                            <img src="{{ asset('/img/bg-dark.svg') }}" alt=""
                                                                class="hidden dark:block h-8 w-8 rounded-full">
                                                        @else
                                                            <img src="{{ asset('/img/users/avatar/' . $comment->user->avatar) }}"
                                                                alt="" class="h-8 w-8 rounded-full">
                                                        @endempty
                                                        <div class="flex flex-col ml-2">
                                                            <div class="flex items-center">
                                                                <span>{{ $comment->user->name }}</span>
                                                                @if ($book->user->id === $comment->user->id)
                                                                    <svg class="ml-1 w-[14px] h-[14px]" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path
                                                                            d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z"
                                                                            class="fill-primary" />
                                                                    </svg>
                                                                @endif
                                                            </div>

                                                            <span
                                                                class="text-xs text-666 dark:text-ddd">{{ $comment->created_at->format('Y/m/d H:i') }}</span>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="flex items-center">
                                                    {{-- 通報 --}}
                                                    @if ($book->user->id !== $comment->user->id)
                                                        <comment-post-modal>
                                                            <template #trigger>
                                                                <span class="text-666 leading-4 pr-4">通報する</span>
                                                            </template>
                                                            <template #header>コメントに対して通報する</template>
                                                            <form method="POST"
                                                                action="{{ route('others.report', ['user' => Auth::user(), 'reportedUser' => $comment->user->email, 'comment' => $comment->comment]) }}">
                                                                @csrf
                                                                <input value="{{ Auth::id() }}" type="hidden"
                                                                    name="user_id" />
                                                                <textarea class="dark:bg-dark-1 w-full h-[250px] rounded-[3px]" placeholder="お問い合せ内容を記入してください。" autocomplete="off"
                                                                    autofocus="on" type="text" name="body" maxlength="400" required></textarea>
                                                                <button onclick="this.disabled='disabled'; this.form.submit();"
                                                                    type="submit" class="btn w-full">送信する</button>
                                                            </form>
                                                        </comment-post-modal>
                                                    @endif

                                                    <comment-post-modal>
                                                        <template #trigger>
                                                            <span class="text-666 leading-4">返信する</span>
                                                        </template>
                                                        <template #header>{{ $comment->user->username }}さんに返信する</template>
                                                        <form method="POST"
                                                            action="{{ route('book.episode.comment.store', ['book_id' => $book->id, 'episode_number' => $episode_story->number, 'parent_id' => $comment->id]) }}">
                                                            @csrf
                                                            <input value="{{ Auth::id() }}" type="hidden"
                                                                name="user_id" />
                                                            <textarea class="w-full h-[250px] rounded-[3px]"
                                                                placeholder="ここはエピソードへの応援コメントを投稿できる場所です！&#10;&#10;作品内容と関係がないコメント、作品や作家を中傷するようなコメント、ネタバレやその他不適切なコメントは投稿しないでね！&#10;&#10;不適切なコメントを見つけた場合は通報をお願いいたします！&#10;&#10;ひどい場合は、断りなくコメントの削除やアカウントを凍結させていただく場合があります。"
                                                                autocomplete="off" autofocus="on" type="text" name="comment" maxlength="400" required></textarea>
                                                            <button onclick="this.disabled='disabled'; this.form.submit();"
                                                                type="submit" class="btn w-full">返信する</button>
                                                        </form>
                                                    </comment-post-modal>
                                                    @if ($comment->user->id == Auth::id())
                                                        <form method="POST"
                                                            action="{{ route('book.episode.comment.destroy', ['book_id' => $book->id, 'episode_id' => $episode_story->id, 'comment_id' => $comment->id]) }}"
                                                            class="text-xs text-666 ml-2 leading-4">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="this.disabled='disabled'; this.form.submit();"
                                                                type="submit" class="leading-4">削除する</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="px-4 pt-4 text-666">{!! nl2br($comment->comment) !!}</div>
                                        </div>
                                    @endempty

                                    {{-- リプライ --}}
                                    @empty(!$comment->parent_id)
                                        <div id="comment-episode-{{ $episode_story->number }}"
                                            class="mb-2 pt-2 px-2 pb-2 ml-8">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center">
                                                    <a href="{{ route('users.show', ['username' => $comment->user->username]) }}"
                                                        class="flex items-center">
                                                        @empty($comment->user->avatar)
                                                            <img src="{{ asset('/img/bg.svg') }}" alt=""
                                                                class="block dark:hidden h-8 w-8 rounded-full">
                                                            <img src="{{ asset('/img/bg-dark.svg') }}" alt=""
                                                                class="hidden dark:block h-8 w-8 rounded-full">
                                                        @else
                                                            <img src="{{ asset('/img/users/avatar/' . $comment->user->avatar) }}"
                                                                alt="" class="h-8 w-8 rounded-full">
                                                        @endempty
                                                        <div class="flex flex-col ml-2">
                                                            <div class="flex items-center">
                                                                <span>{{ $comment->user->name }}</span>
                                                                @if ($book->user->id === $comment->user->id)
                                                                    <svg class="ml-1 w-[14px] h-[14px]" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path
                                                                            d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z"
                                                                            class="fill-primary" />
                                                                    </svg>
                                                                @endif
                                                            </div>

                                                            <span
                                                                class="text-xs text-666 dark:text-ddd">{{ $comment->created_at->format('Y/m/d H:i') }}</span>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="flex items-center">
                                                    <comment-post-modal>
                                                        <template #trigger>
                                                            <span class="text-666 leading-4">返信する</span>
                                                        </template>
                                                        <template #header>{{ $comment->user->username }}さんに返信する</template>
                                                        <form method="POST"
                                                            action="{{ route('book.episode.comment.store', ['book_id' => $book->id, 'episode_number' => $episode_story->number, 'parent_id' => $comment->id]) }}">
                                                            @csrf
                                                            <input value="{{ Auth::id() }}" type="hidden"
                                                                name="user_id" />
                                                            <textarea class="w-full h-[250px] rounded-[3px]"
                                                                placeholder="ここはエピソードへの応援コメントを投稿できる場所です！&#10;&#10;作品内容と関係がないコメント、作品や作家を中傷するようなコメント、ネタバレやその他不適切なコメントは投稿しないでね！&#10;&#10;不適切なコメントを見つけた場合は通報をお願いいたします！&#10;&#10;ひどい場合は、断りなくコメントの削除やアカウントを凍結させていただく場合があります。"
                                                                autocomplete="off" autofocus="on" type="text" name="comment" maxlength="400" required></textarea>
                                                            <button onclick="this.disabled='disabled'; this.form.submit();"
                                                                type="submit" class="btn w-full">返信する</button>
                                                        </form>
                                                    </comment-post-modal>
                                                    @if ($comment->user->id == Auth::id())
                                                        <form method="POST"
                                                            action="{{ route('book.episode.comment.destroy', ['book_id' => $book->id, 'episode_id' => $episode_story->id, 'comment_id' => $comment->id]) }}"
                                                            class="text-xs text-666 ml-2 leading-4">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="this.disabled='disabled'; this.form.submit();"
                                                                type="submit" class="leading-4">削除する</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="px-4 pt-4 text-666">{!! nl2br($comment->comment) !!}</div>
                                        </div>
                                    @endempty
                                @endforeach
                            </div>
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
@endsection
