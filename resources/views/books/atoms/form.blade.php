@csrf

@if ($update)
  <h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('完結作品の設定') }}</h3>
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
      <span class="light-checkbox-LabelText">{{ __('作品を完結にする') }}</span>
    </label>
  </div>

  {{-- 公開設定 --}}
  <h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('公開設定') }}</h3>
  <div class="checkbox mb-8">
    <label class="light-checkbox">
      <input type="checkbox" name="is_hidden" {{ $book->is_hidden ?? old('is_hidden') ? 'checked' : '' }}
        class="light-checkbox-Input">
      <span class="light-checkbox-DummyInput">
        <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
          <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
        </svg>
      </span>
      <span class="light-checkbox-LabelText">{{ __('作品を非公開にする') }}</span>
    </label>
  </div>
@endif

{{-- タイトル --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('タイトル') }}</h3>
<div class="mb-8">
  <input type="text" name="title" class="w-full p-2 border-b dark:border-none border-ccc dark:bg-dark-1 rounded"
    placeholder="{{ __('30字以内で入力してください') }}" required value="{{ $book->title ?? old('title') }}" maxlength="30">
</div>

{{-- サムネイル --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('サムネイル') }}</h3>
<div class="mb-8">
  <p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
    {{ __('投稿できる画像形式はpng,jpg(jpeg),gif, webpです。') }}
  </p>
  <p class="mb-4 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
    {{ __('横幅500px, 縦幅500pxの画像サイズが最も綺麗に表示されます。') }}
  </p>
  <input type="file" name="thumbnail" class="my-2 dark:text-gray" @if (!$update) required @endif>
</div>

{{-- ジャンル --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('ジャンル') }}</h3>
<div class="mb-8">
  <select name="genre_id" class="flex flex-col items-center">
    <option type="text" value="1"
      @isset($book->genre_id) @if (1 === (int) old('genre_id', $book->genre_id)) selected @endif @endisset>
      {{ __('少年') }}</option>
    <option type="text" value="2"
      @isset($book->genre_id) @if (2 === (int) old('genre_id', $book->genre_id)) selected @endif @endisset>
      {{ __('青年') }}</option>
    <option type="text" value="3"
      @isset($book->genre_id) @if (3 === (int) old('genre_id', $book->genre_id)) selected @endif @endisset>
      {{ __('少女') }}</option>
    <option type="text" value="4"
      @isset($book->genre_id) @if (4 === (int) old('genre_id', $book->genre_id)) selected @endif @endisset>
      {{ __('女性') }}</option>
    <option type="text" value="5"
      @isset($book->genre_id) @if (5 === (int) old('genre_id', $book->genre_id)) selected @endif @endisset>
      {{ __('オトナ') }}
    </option>
  </select>
</div>

{{-- タグ --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('タグ') }}</h3>
<div class="mb-8">
  <book-tags-input :initial-tags='@json($book->tag_names ?? [])' :autocomplete-items='@json($allTags ?? [])'>
  </book-tags-input>
</div>

{{-- あらすじ --}}
@isset($create_book_modal_count)
  <h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('あらすじ') }}</h3>
  <textarea required name="story"
    class="count_{{ $create_book_modal_count }} dark:bg-dark-1-2 border border-ccc dark:border-none p-3 h-24 rounded-[3px] mb-1 w-full"
    placeholder="投稿できるのは400文字までです" maxlength="400">{{ $book->story ?? old('story') }}</textarea>
  <div class="mb-4 text-right">
    <span class="string_count_{{ $create_book_modal_count }}">0</span>
    <span>/400文字</span>
  </div>
@endisset

{{-- 作品投稿後の流れ --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('作品投稿後の流れ') }}</h3>
<p class="mb-6 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
  {{ __('作品を投稿したら、続いてエピソードを追加してみましょう！') }}
</p>
