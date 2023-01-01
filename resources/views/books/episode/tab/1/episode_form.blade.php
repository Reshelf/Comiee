{{-- サムネイル --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('サムネイル') }}</h3>
<p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
  {{ __('投稿できる画像形式はpng,jpg(jpeg),gif, webpです。') }}
</p>
<p class="mb-8 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
  {{ __('横幅320px, 縦幅160pxの画像サイズが最も綺麗に表示されます。') }}
</p>
<input type="file" name="thumbnail" value="{{ old('thumbnail') }}" @if (!$update) required @endif>


{{-- コンテンツ --}}
<h3 class="tracking-widest mt-12 mb-4 text-[15px] font-semibold">{{ __('コンテンツ') }}</h3>
<p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
  {{ __('1ページ = 画像1枚としてカウントされます。') }}
</p>
<p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
  {{ __('1エピソードにつき10枚〜100枚の画像登録ができます。') }}</p>
<p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
  {{ __('投稿できる画像形式はpng,jpg(jpeg),gif, webpです。') }}
</p>
<p class="mb-8 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
  {{ __('表示される画像の対比は 2 : 3となるようにお願いいたします。') }}<br>
  {{ __('横幅800px, 縦幅1200pxの画像サイズが最も綺麗に表示されます。') }}
</p>
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
<h3 class="tracking-widest mt-12 mb-4 text-[15px] font-semibold">{{ __('ご注意点') }}</h3>
<p class="mb-2 bg-red bg-opacity-10 text-red px-4 py-2 font-semibold">
  {{ __('複数ページにわたり1ページ1コマの描写があり、販売にふさわしくないと判断された場合、アカウントの有料販売を禁止する場合があります。') }}
</p>
<p class="mb-2 bg-warning bg-opacity-10 text-warning px-4 py-2 font-semibold">
  {{ __('投稿したエピソードは、鉛筆マークの編集ボタンから編集できます。') }}
</p>
<p class="mb-2 bg-warning bg-opacity-10 text-warning px-4 py-2 font-semibold">
  {{ __('投稿したエピソードを後から削除することはできません。ただし、鉛筆マークの編集ボタンから「非公開」にできます。') }}</p>
