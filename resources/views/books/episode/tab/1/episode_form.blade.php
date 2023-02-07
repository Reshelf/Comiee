{{-- タイトル --}}
<div class="flex items-center mb-4">
  <h3 class="tracking-widest text-[15px] font-semibold inline-block">{{ __('タイトル') }}</h3>
</div>
<input type="text" name="title" value="{{ $e->title ?? old('title') }}"
  class="border border-ccc py-2 px-3 w-full rounded-[4px]" placeholder="50文字まで入力することができます" max="50">


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
      <p class="mb-2 py-1 text-[14px]">
        {{ __('投稿できる画像形式はpng,jpg(jpeg),gif, webpです。') }}
      </p>
      <p class="py-1 text-[14px]">
        {{ __('横幅320px, 縦幅160pxの画像サイズが最も綺麗に表示されます。') }}
      </p>
    </div>
  </div>
</div>
<input type="file" name="thumbnail" @if (!$update) required @endif>


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
      <p class="mb-2 py-1 text-[14px]">
        {{ __('1ページ = 画像1枚としてカウントされます。') }}
      </p>
      <p class="mb-2 py-1 text-[14px]">
        {{ __('1エピソードにつき10枚〜100枚の画像登録ができます。') }}</p>
      <p class="mb-2 py-1 text-[14px]">
        {{ __('投稿できる画像形式はpng,jpg(jpeg),gif, webpです。') }}
      </p>
      <p class="py-1 text-[14px]">
        {{ __('表示される画像の対比は 2 : 3となるようにお願いいたします。') }}<br>
        {{ __('横幅800px, 縦幅1200pxの画像サイズが最も綺麗に表示されます。') }}
      </p>
    </div>
  </div>
</div>
<input type="file" name="images[]" multiple="multiple" @if (!$update) required @endif>


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
<h3 class="tracking-widest mt-12 mb-4 text-[15px] font-semibold">{{ __('このエピソードを有料化する') }}</h3>
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
      <span class="light-checkbox-LabelText">{{ __('読者からスーパーエールを受け取る') }}</span>
    </label>

    @if ($update && !$e->is_free)
      <p class="mt-4 tracking-widest">{{ __('現在のエール下限価格：') }}<strong>
          {{ $e->price ?? old('price') }}</strong>{{ __('円') }}〜
      </p>
    @endif
  @endempty
</div>

@empty($book->user->stripe_user_id)
  <a href="/{{ app()->getLocale() }}/{{ Auth::user()->username }}/settings#earnings" class="text-primary">
    {{ __('「収益を受け取る準備」') }}
  </a>
  {{ __('を完了したら有料販売をすることができます') }}
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
      <p class="mb-2 py-1 text-[14px]">
        {{ __('複数ページにわたり1ページ1コマの描写があり、販売にふさわしくないと判断された場合、アカウントの有料販売を禁止する場合があります。') }}
      </p>
      <p class="mb-2 py-1 text-[14px]">
        {{ __('投稿したエピソードは、鉛筆マークの編集ボタンから編集できます。') }}
      </p>
      <p class="py-1 text-[14px]">
        {{ __('投稿したエピソードを後から削除することはできません。ただし、鉛筆マークの編集ボタンから「非公開」にできます。') }}</p>
    </div>
  </div>
</div>
