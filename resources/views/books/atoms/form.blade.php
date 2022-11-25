@csrf
<div class="mb-4">
    <label for="title" class="text-xs text-666 dark:text-ddd">タイトル</label>
    <input type="text" name="title" class="w-full p-3 border dark:border-none border-ccc rounded-[3px] dark:bg-dark-2"
        placeholder="30字以内で入力してください" required value="{{ $book->title ?? old('title') }}" maxlength="30">
</div>
<div class="mb-4">
    <label for="thumbnail" class="text-xs text-666 dark:text-ddd">サムネイル</label>
    <div class="flex flex-col items-center">
        <input type="file" name="thumbnail" class="my-2 dark:text-gray">
    </div>
</div>

<div class="mb-4">
    <label for="genre_id" class="text-xs text-666 dark:text-ddd">ジャンル</label>
    <select name="genre_id" class="flex flex-col items-center">
        <option type="text" value="1"
            @isset($book->genre_id) @if (1 === (int) old('genre_id', $book->genre_id)) selected @endif @endisset>少年</option>
        <option type="text" value="2"
            @isset($book->genre_id) @if (2 === (int) old('genre_id', $book->genre_id)) selected @endif @endisset>青年</option>
        <option type="text" value="3"
            @isset($book->genre_id) @if (3 === (int) old('genre_id', $book->genre_id)) selected @endif @endisset>少女</option>
        <option type="text" value="4"
            @isset($book->genre_id) @if (4 === (int) old('genre_id', $book->genre_id)) selected @endif @endisset>女性</option>
        <option type="text" value="5"
            @isset($book->genre_id) @if (5 === (int) old('genre_id', $book->genre_id)) selected @endif @endisset>オトナ
        </option>
    </select>
</div>

<div class="mb-4">
    <label for="tag" class="text-xs text-666 dark:text-ddd">タグ</label>
    <book-tags-input :initial-tags='@json($book->tag_names ?? [])' :autocomplete-items='@json($allTags ?? [])'>
    </book-tags-input>
</div>
<div class="flex flex-col mb-4">
    <label for="story" class="text-xs text-666 dark:text-ddd">あらすじ</label>
    <textarea required name="story" class="dark:bg-dark-2 border border-ccc dark:border-none p-3 h-24 rounded-[3px]"
        placeholder="投稿できるのは400文字までです" maxlength="400">{{ $book->story ?? old('story') }}</textarea>
</div>

@if ($update)
    <div class="checkbox mb-8">
        <label class="light-checkbox">
            <input type="checkbox" name="is_complete" {{ $book->is_complete ?? old('is_complete') ? 'checked' : '' }}
                class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">作品を完結にする</span>
        </label>
    </div>
@endif
