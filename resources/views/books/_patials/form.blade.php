@csrf
<div class="mb-4">
    <label for="title" class="text-xs text-666 dark:text-ddd">タイトル</label>
    <input type="text" name="title" class="w-full p-3 border dark:border-none border-ccc rounded-[3px] dark:bg-dark-2"
        placeholder="30字以内で入力してください" required value="{{ $book->title ?? old('title') }}" maxlength="30">
</div>
<div class="mb-4">
    <label for="thumbnail" class="text-xs text-666 dark:text-ddd">サムネイル</label>
    <div class="flex flex-col items-center">
        @empty($book->thumbnail)
            <img src="{{ asset('/img/bg.svg') }}" alt="" class="block dark:hidden w-[200px] h-[200px] object-cover">
            <img src="{{ asset('/img/bg-dark.svg') }}" alt=""
                class="hidden dark:block w-[200px] h-[200px] object-cover">
        @else
            <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt="book thumbnail"
                class="w-[100px] h-[100px] object-cover">
        @endempty
        <input type="file" name="thumbnail" class="my-2 dark:text-gray">
    </div>
</div>
<div class="mb-4">
    <label for="tag" class="text-xs text-666 dark:text-ddd">タグ</label>
    <book-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'>
    </book-tags-input>
</div>
<div class="flex flex-col mb-4">
    <label for="story" class="text-xs text-666 dark:text-ddd">あらすじ</label>
    <textarea required name="story" class="dark:bg-dark-2 border border-ccc dark:border-none p-3 h-24 rounded-[3px]"
        placeholder="投稿できるのは400文字までです" maxlength="400">{{ $book->story ?? old('story') }}</textarea>
</div>

<div class="checkbox mb-8">
    <label for="is_complete" class="text-sm">作品を完結にする</label>
    <input id="is_complete" type="checkbox" required name="is_complete"
        {{ $book->is_complete ?? old('is_complete') ? 'checked' : '' }} class="switch ml-4">
</div>
