@csrf

@if ($update)
  <h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('公開設定') }}</h3>
  <div class="checkbox mb-12">
    @if ($book->is_contracted)
      <label class="light-checkbox">
        <input type="checkbox" name="is_hidden" {{ $book->is_hidden ?? old('is_hidden') ? '' : 'checked' }}
          class="light-checkbox-Input">
        <span class="light-checkbox-DummyInput">
          <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
            <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </span>
        <span class="light-checkbox-LabelText">{{ __('作品を公開する') }}</span>
      </label>
    @else
      <div class="">
        {{ __('現在、この作品は非公開になっており、作品を公開にするには、作品毎に当サービスと出版契約書（電子配信）を交わす必要があります。') }}<br>
        {{ __('以下のボタンから契約書をダウンロードをして記入の上、この作品の契約書を送信してください。') }} <br>
        <a href="https://comiee.s3.ap-northeast-1.amazonaws.com/app/system/work_contract.pdf" target="_blank"
          rel="noopener noreferrer" class="btn-border inline-block mt-4">{{ __('契約書をダウンロード') }}</a><br>
        <a href="https://docs.google.com/forms/d/1BJP0Z7yXIi50QcMRd4cTEOLAEvc90fIjGJhzvuOXQUs/edit" target="_blank"
          rel="noopener noreferrer" class="btn-border inline-block mt-4">{{ __('出版契約書（電子配信）を送信する') }}</a>
      </div>
    @endif
  </div>

  <h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('全エピソードを有料化する') }}</h3>
  <div class="checkbox mb-12">
  @empty($book->user->stripe_user_id)
    <a href="/{{ app()->getLocale() }}/{{ Auth::user()->username }}/settings#earnings" class="text-primary">
      {{ __('「収益を受け取る準備」') }}
    </a>
    {{ __('を完了したら有料販売をすることができます') }}
  @else
    <label class="light-checkbox">
      <input type="checkbox" name="is_all_charge" {{ $book->is_all_charge ?? old('is_all_charge') ? 'checked' : '' }}
        class="light-checkbox-Input">
      <span class="light-checkbox-DummyInput">
        <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
          <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
        </svg>
      </span>
      <span class="light-checkbox-LabelText">{{ __('この作品の全エピソードを有料化する') }}</span>
    </label>
  @endempty
</div>



<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('タイトル') }}</h3>
<div class="mb-12">
  <input type="text" name="title" class="w-full p-2 border-b dark:border-none border-ccc dark:bg-dark-1 rounded"
    placeholder="{{ __('30字以内で入力してください') }}" required value="{{ $book->title ?? old('title') }}" maxlength="30">
</div>


<div class="relative flex items-center mt-8 mb-4">
  <h3 class="tracking-widest text-[15px] font-semibold">{{ __('サムネイル') }}</h3>
  <div class="tooltip cursor-pointer ml-1">
    <svg class="stroke-primary w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
    </svg>
    <div
      class="tooltip-item p-4 hover:flex flex-col flex-wrap whitespace-pre-line w-[300px] lg:w-[552px] top-[-310px] lg:top-[20px] left-[-70px] lg:left-[-90px] bg-white dark:bg-dark text-t-color dark:text-gray shadow-lg">
      <p class="mb-2 py-1 text-[14px]">
        {{ __('投稿できる画像形式はpng,jpg(jpeg),gif, webpです。') }}
      </p>
      <p class="py-1 text-[14px]">
        {{ __('横幅500px, 縦幅500pxの画像サイズが最も綺麗に表示されます。') }}
      </p>
    </div>
  </div>
</div>
<input type="file" name="thumbnail" class="mt-2 mb-12 dark:text-gray"
  @if (!$update) required @endif>


<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('ジャンル') }}</h3>
<div class="mb-12">
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
  </select>
</div>


<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('作品言語') }}</h3>
<div class="mb-12">
  <select name="lang" class="flex flex-col items-center">
    <option type="text" value="0"
      @isset($book->lang) @if (0 === (int) old('lang', $book->lang)) selected @endif @endisset>
      {{ __('日本語') }}</option>
    <option type="text" value="1"
      @isset($book->lang) @if (1 === (int) old('lang', $book->lang)) selected @endif @endisset>
      {{ __('英語') }}</option>
    <option type="text" value="2"
      @isset($book->lang) @if (2 === (int) old('lang', $book->lang)) selected @endif @endisset>
      {{ __('繁体字') }}</option>
    <option type="text" value="3"
      @isset($book->lang) @if (3 === (int) old('lang', $book->lang)) selected @endif @endisset>
      {{ __('簡体字') }}</option>
    <option type="text" value="4"
      @isset($book->lang) @if (4 === (int) old('lang', $book->lang)) selected @endif @endisset>
      {{ __('スペイン語') }}</option>
    <option type="text" value="5"
      @isset($book->lang) @if (5 === (int) old('lang', $book->lang)) selected @endif @endisset>
      {{ __('ヒンディー語') }}
    </option>
    <option type="text" value="6"
      @isset($book->lang) @if (6 === (int) old('lang', $book->lang)) selected @endif @endisset>
      {{ __('アラビア語') }}</option>
    <option type="text" value="7"
      @isset($book->lang) @if (7 === (int) old('lang', $book->lang)) selected @endif @endisset>
      {{ __('ポルトガル語') }}</option>
    <option type="text" value="8"
      @isset($book->lang) @if (8 === (int) old('lang', $book->lang)) selected @endif @endisset>
      {{ __('ベンガル語') }}</option>
    <option type="text" value="9"
      @isset($book->lang) @if (9 === (int) old('lang', $book->lang)) selected @endif @endisset>
      {{ __('ドイツ語') }}</option>
  </select>
</div>


<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('カラー作品') }}</h3>
<div class="checkbox mb-12">
  <label class="light-checkbox">
    <input type="checkbox" name="is_color" {{ $book->is_color ?? old('is_color') ? 'checked' : '' }}
      class="light-checkbox-Input">
    <span class="light-checkbox-DummyInput">
      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" />
      </svg>
    </span>
    <span class="light-checkbox-LabelText">{{ __('この作品はカラーです') }}</span>
  </label>
</div>

<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('タグ') }}</h3>
<div class="mb-12">
  <book-tags-input :initial-tags='@json($book->tag_names ?? [])' :autocomplete-items='@json($allTags ?? [])'>
  </book-tags-input>
</div>

@isset($create_book_modal_count)
  <h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('あらすじ') }}</h3>
  <textarea required name="story"
    class="count_{{ $create_book_modal_count }} dark:bg-dark-1-2 border border-ccc dark:border-none p-3 h-24 rounded-[5px] mb-1 w-full"
    placeholder="投稿できるのは400文字までです" maxlength="400">{{ $book->story ?? old('story') }}</textarea>
  <div class="mb-4 text-right">
    <span class="string_count_{{ $create_book_modal_count }}">0</span>
    <span>/400文字</span>
  </div>
@endisset

<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('完結作品の設定') }}</h3>
<div class="checkbox mb-12">
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

<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('休載設定') }}</h3>
<div class="checkbox mb-12">
  <label class="light-checkbox">
    <input type="checkbox" name="is_suspend" {{ $book->is_suspend ?? old('is_suspend') ? 'checked' : '' }}
      class="light-checkbox-Input">
    <span class="light-checkbox-DummyInput">
      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" />
      </svg>
    </span>
    <span class="light-checkbox-LabelText">{{ __('作品を休載する') }}</span>
  </label>
</div>
@endif

@if (!$update)
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('作品投稿後の流れ') }}</h3>
<p class="mb-6 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
  {{ __('作品を投稿したら、続いてエピソードを追加してみましょう！') }}
</p>
@endif
