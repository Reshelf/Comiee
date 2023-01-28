{{-- タイトル --}}
<div class="flex items-center my-4">
  <h3 class="tracking-widest text-[15px] font-semibold inline-block">{{ __('タイトル') }}</h3>
</div>
<input type="text" name="title" value="{{ old('title') }}" class="border border-ccc py-2 px-3 w-full rounded-[4px]"
  placeholder="50文字まで入力することができます" max="50">


{{-- サムネイル --}}
<div class="flex items-center mt-8 mb-4">
  <h3 class="tracking-widest text-[15px] font-semibold inline-block">{{ __('サムネイル') }}</h3>
  <div class="tooltip cursor-pointer ml-1">
    <svg class="stroke-primary w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
    </svg>
    <div
      class="tooltip-item p-4 hover:flex flex-col flex-wrap whitespace-pre-line lg:whitespace-nowrap w-[300px] lg:w-auto top-[20px] left-[-90px] bg-white dark:bg-dark text-t-color dark:text-gray shadow-lg">
      <p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
        {{ __('投稿できる画像形式はpng,jpg(jpeg),gif, webpです。') }}
      </p>
      <p class=" bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
        {{ __('横幅320px, 縦幅160pxの画像サイズが最も綺麗に表示されます。') }}
      </p>
    </div>
  </div>
</div>
<input type="file" name="thumbnail" value="{{ old('thumbnail') }}" @if (!$update) required @endif>


{{-- コンテンツ --}}
<div class="flex items-center mt-8 mb-4">
  <h3 class="tracking-widest text-[15px] font-semibold">{{ __('コンテンツ') }}</h3>
  <div class="tooltip cursor-pointer ml-1">
    <svg class="stroke-primary w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
    </svg>
    <div
      class="tooltip-item p-4 hover:flex flex-col flex-wrap whitespace-pre-line lg:whitespace-nowrap w-[300px] lg:w-auto top-[20px] left-[-90px] bg-white dark:bg-dark text-t-color dark:text-gray shadow-lg">
      <p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
        {{ __('1ページ = 画像1枚としてカウントされます。') }}
      </p>
      <p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
        {{ __('1エピソードにつき10枚〜100枚の画像登録ができます。') }}</p>
      <p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
        {{ __('投稿できる画像形式はpng,jpg(jpeg),gif, webpです。') }}
      </p>
      <p class=" bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
        {{ __('表示される画像の対比は 2 : 3となるようにお願いいたします。') }}<br>
        {{ __('横幅800px, 縦幅1200pxの画像サイズが最も綺麗に表示されます。') }}
      </p>
    </div>
  </div>
</div>
<input type="file" name="images[]" value="{{ old('images') }}" multiple="multiple"
  @if (!$update) required @endif>


{{-- 公開設定 --}}
<h3 class="tracking-widest mt-12 mb-4 text-[15px] font-semibold">{{ __('公開設定') }}</h3>
<div class="checkbox">
  <label class="light-checkbox">
    <input type="checkbox" name="is_hidden"
      @if ($update) {{ $e->is_hidden ?? old('is_hidden') ? 'checked' : '' }} @endif
      class="light-checkbox-Input">
    <span class="light-checkbox-DummyInput">
      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" />
      </svg>
    </span>
    <span class="light-checkbox-LabelText">{{ __('エピソードを非公開にする') }}</span>
  </label>
</div>

{{-- 有料選択 --}}
<h3 class="tracking-widest mt-12 mb-4 text-[15px] font-semibold">{{ __('料金設定') }}</h3>
<div class="checkbox">
  @empty(!$book->user->stripe_user_id)
    <label class="light-checkbox">
      <input type="checkbox" name="is_free"
        @if ($update) {{ !$e->is_free ?? old('is_free') ? 'checked' : '' }} @endif
        class="light-checkbox-Input">
      <span class="light-checkbox-DummyInput">
        <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
          <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
        </svg>
      </span>
      <span class="light-checkbox-LabelText">{{ __('このエピソードを有料で販売する') }}</span>
    </label>

    @if ($update && !$e->is_free)
      <p class="mt-4 tracking-widest">現在の値段：<strong>
          {{ $e->price ?? old('price') }}</strong>{{ __('円') }}
      </p>
    @endif
  @endempty
</div>

@empty($book->user->stripe_user_id)
  <p class="mt-4 mb-2 bg-red bg-opacity-10 text-red px-4 py-2 font-semibold">
    {{ __('有料販売をするには設定の「収益を受け取る準備」が完了している必要があります') }}
  </p>
@endempty

{{-- ご注意点 --}}
<div class="flex items-center mt-8 mb-4">
  <h3 class="tracking-widest text-[15px] font-semibold">{{ __('ご注意点') }}</h3>
  <div class="tooltip cursor-pointer ml-1">
    <svg class="stroke-primary w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
    </svg>
    <div
      class="tooltip-item p-4 hover:flex flex-col flex-wrap whitespace-pre-line w-[300px] lg:w-[552px] top-[-310px] lg:top-[-210px] left-[-70px] lg:left-[-75px] bg-white dark:bg-dark text-t-color dark:text-gray shadow-lg">
      <p class="mb-2 bg-red bg-opacity-10 text-red px-4 py-2 font-semibold">
        {{ __('複数ページにわたり1ページ1コマの描写があり、販売にふさわしくないと判断された場合、アカウントの有料販売を禁止する場合があります。') }}
      </p>
      <p class="mb-2 bg-warning bg-opacity-10 text-warning px-4 py-2 font-semibold">
        {{ __('投稿したエピソードは、鉛筆マークの編集ボタンから編集できます。') }}
      </p>
      <p class="bg-warning bg-opacity-10 text-warning px-4 py-2 font-semibold">
        {{ __('投稿したエピソードを後から削除することはできません。ただし、鉛筆マークの編集ボタンから「非公開」にできます。') }}</p>
    </div>
  </div>
</div>
