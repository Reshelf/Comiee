<template #episode>
    <div class="w-full max-h-[500px] overflow-y-auto scroll-none">

        @include('atoms._error_card_list')
        @include('atoms.success')


        @if (Auth::id() === $book->user_id)
            <episode-list>
                <template #trigger>エピソードを追加する</template>
                <template #header>エピソードを追加する</template>
                <form method="POST" action="{{ route('book.episode.store', ['book_id' => $book->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <h3 class="mb-4 text-[15px] font-semibold">サムネイル</h3>
                    <input type="file" name="thumbnail" required>

                    <h3 class="mt-8 mb-4 text-[15px] font-semibold">コンテンツ</h3>
                    <p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">1ページ =
                        画像1枚としてカウントされます。
                    </p>
                    <p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
                        1エピソードにつき20枚〜200枚の画像登録ができます。</p>
                    <p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">投稿できる画像形式はpng,
                        jpg(jpeg),
                        gif, webpです。
                    </p>
                    <p class="mb-8 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">表示される画像の対比は 2 : 3
                        となるようにお願いいたします。<br> 横幅800px, 縦幅1200pxの画像サイズが最も綺麗に表示されます。
                    </p>
                    <input type="file" name="images[]" multiple="multiple" required>
                    <button type="submit" class="btn w-full mt-8">投稿する</button>
                </form>
            </episode-list>
        @endif
        @foreach ($episodes_latest as $e)
            <div
                class="hover:bg-f5 dark:hover:bg-dark-1 my-2 py-2 border-b border-ddd dark:border-dark-1 flex items-center justify-between w-full overflow-hidden rounded-[3px]">
                <a href="{{ route('book.episode.show', ['book_id' => $book->id, 'episode_number' => $e->number]) }}"
                    class="flex items-center w-full cursor-pointer">
                    @empty($e->thumbnail)
                        <img src="/img/bg.svg" alt="thumbnail" class="block dark:hidden w-[160px] h-[80px] object-cover">
                        <img src="/img/bg-dark.svg" alt="thumbnail"
                            class="hidden dark:block w-[160px] h-[80px] object-cover">
                    @else
                        <img src="{{ $e->thumbnail }}" alt="" class="w-[160px] h-[80px] object-cover">
                    @endempty

                    {{-- タイトル --}}
                    <div class="w-full flex flex-col px-4">
                        {{-- 日付 --}}
                        <div class="text-666 text-xs">
                            {{ $e->created_at->format('Y/m/d') }}
                        </div>


                        <div class="w-full flex justify-between items-center">
                            {{-- 話数 --}}
                            {{-- 既読 --}}
                            <div class="flex flex-col">
                                <span class="">第{{ $e->number }}話</span>

                                <div class="flex items-center mt-1">
                                    {{-- 値段 --}}
                                    @if ($e->is_free)
                                        <span
                                            class="text-xs bg-[#E50111] dark:bg-opacity-50 dark:text-ccc text-white py-0.5 px-1.5 rounded-[3px]">
                                            無料
                                        </span>
                                    @else
                                        <span
                                            class="inline-block ml-2 text-xs bg-eee dark:bg-primary dark:text-white py-0.5 px-1.5 rounded-[3px]">
                                            {{ $e->price }}pt
                                        </span>
                                    @endif
                                    @auth
                                        @if ($book->user->id !== Auth::user()->id)
                                            @if ($e->isReadBy(Auth::user()))
                                                <span class="inline-block text-xs text-666 dark:text-ddd ml-2">
                                                    既読
                                                </span>
                                            @else
                                                <span class="inline-block text-xs text-666 dark:text-ddd ml-2">
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
                            <delete-modal>
                                <form method="POST"
                                    action="{{ route('book.episode.destroy', ['book_id' => $book->id, 'episode_id' => $e->id]) }}"
                                    class="p-2 rounded">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">削除する</button>
                                </form>
                            </delete-modal>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</template>
