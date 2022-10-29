<template #episode>
    <div class="w-full max-h-[500px] overflow-y-auto scroll-none">

        <div class="mb-4">
            @include('atoms.success')
        </div>


        @if (Auth::id() === $book->user_id)
            <episode-list>
                <template #trigger>エピソードを追加する</template>
                <template #header>エピソードを追加する</template>
                <form method="POST" action="{{ route('book.episode.store', ['book_id' => $book->id]) }}">
                    @csrf
                    <button type="submit" class="btn w-full">投稿する</button>
                </form>
            </episode-list>
        @endif
        @foreach ($episodes_latest as $e)
            <div
                class="hover:bg-f5 dark:hover:bg-dark-1 my-2 py-2 border-b border-ddd dark:border-dark-1 flex items-center justify-between w-full overflow-hidden rounded-[3px]">
                <a href="{{ route('book.episode.show', ['book_id' => $book->id, 'episode_number' => $e->number]) }}"
                    class="flex items-center w-full cursor-pointer">
                    @empty($book->thumbnail)
                        <img src="/img/bg.svg" alt="thumbnail" class="block dark:hidden w-[160px] h-[80px] object-cover">
                        <img src="/img/bg-dark.svg" alt="thumbnail"
                            class="hidden dark:block w-[160px] h-[80px] object-cover">
                    @else
                        <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt=""
                            class="w-[160px] h-[80px] object-cover">
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
                                        <span class="inline-block ml-2 text-xs bg-eee py-0.5 px-1.5 rounded-[3px]">
                                            {{ $e->price }}pt
                                        </span>
                                    @endif
                                    @auth
                                        @if ($book->user->id !== Auth::user()->id)
                                            @if ($e->isReadBy(Auth::user()))
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
                            {{-- <a href="{{ route('book.episode.edit', ['book_id' => $book->id, 'episode_id' => $e->id]) }}"
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
