@csrf
<div class="mb-4">
    <label for="title" class="text-xs text-666 dark:text-ddd">タイトル</label>
    <input type="text" name="title" class="w-full p-3 border dark:border-none border-ccc rounded-[3px] dark:bg-dark-2"
        placeholder="30字以内で入力してください" required value="{{ $book->title ?? old('title') }}" maxlength="30">
</div>
<div class="mb-4">
    <label for="author" class="text-xs text-666 dark:text-ddd">原作</label>
    <input type="text" name="author"
        class="w-full p-3 border dark:border-none border-ccc rounded-[3px] dark:bg-dark-2" placeholder=""
        value="{{ $book->author ?? old('author') }}" maxlength="30">
</div>
<div class="mb-4">
    <label for="manga_artist" class="text-xs text-666 dark:text-ddd">漫画家</label>
    <input type="text" name="manga_artist"
        class="w-full p-3 border dark:border-none border-ccc rounded-[3px] dark:bg-dark-2" placeholder=""
        value="{{ $book->manga_artist ?? old('manga_artist') }}" maxlength="30">
</div>
<div class="mb-4">
    <label for="assistant" class="text-xs text-666 dark:text-ddd">アシスタント</label>
    <input type="text" name="assistant"
        class="w-full p-3 border dark:border-none border-ccc rounded-[3px] dark:bg-dark-2" placeholder=""
        value="{{ $book->assistant ?? old('assistant') }}" maxlength="30">
</div>
<div class="mb-4">
    <label for="thumbnail" class="text-xs text-666 dark:text-ddd">サムネイル</label>
    <div class="flex flex-col items-center">
        @empty($book->thumbnail)
            <img src="{{ asset('/img/bg.svg') }}" alt="" class="w-[200px] h-[200px] object-cover">
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
    <textarea name="story" class="dark:bg-dark-2 border border-ccc dark:border-none p-3 h-24 rounded-[3px]"
        placeholder="投稿できるのは400文字までです" maxlength="400" required>{{ $book->story ?? old('story') }}</textarea>
</div>
