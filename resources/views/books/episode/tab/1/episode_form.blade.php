{{-- 非公開設定 --}}
@if ($update)
    <h3 class="tracking-widest mb-4 text-[15px] font-semibold">非公開設定</h3>
    <div class="checkbox mb-12">
        <label class="light-checkbox">
            <input type="checkbox" name="is_hidden" {{ $e->is_hidden ?? old('is_hidden') ? 'checked' : '' }}
                class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">エピソードを非公開にする</span>
        </label>
    </div>
@endif


{{-- サムネイル --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">サムネイル</h3>
<input type="file" name="thumbnail" value="{{ old('thumbnail') }}" @if (!$update) required @endif>


{{-- コンテンツ --}}
<h3 class="tracking-widest mt-12 mb-4 text-[15px] font-semibold">コンテンツ</h3>
<p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">1ページ =
    画像1枚としてカウントされます。
</p>
<p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
    1エピソードにつき20枚〜200枚の画像登録ができます。</p>
<p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
    投稿できる画像形式はpng,
    jpg(jpeg),
    gif, webpです。
</p>
<p class="mb-8 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
    表示される画像の対比は 2 : 3
    となるようにお願いいたします。<br> 横幅800px, 縦幅1200pxの画像サイズが最も綺麗に表示されます。
</p>
<input type="file" name="images[]" value="{{ old('images') }}" multiple="multiple"
    @if (!$update) required @endif>


{{-- ご注意点 --}}
<h3 class="tracking-widest mt-12 mb-4 text-[15px] font-semibold">ご注意点</h3>
<p class="mb-2 bg-yellow bg-opacity-10 text-yellow px-4 py-2 font-semibold">
    追加したエピソードは後から削除することができません。<br>
</p>
<p class="mb-2 bg-yellow bg-opacity-10 text-yellow px-4 py-2 font-semibold">
    もし更新したい場合はエピソード追加後に「編集する」ボタンから、新しい画像をアップロードし更新してください。
</p>
<p class="mb-2 bg-yellow bg-opacity-10 text-yellow px-4 py-2 font-semibold">
    もし削除したい場合はエピソード追加後に「編集する」ボタンから「非公開」を選択し更新してください。
</p>
