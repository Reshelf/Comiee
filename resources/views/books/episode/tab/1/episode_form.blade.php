<h3 class="mb-4 text-[15px] font-semibold">サムネイル</h3>
<input type="file" name="thumbnail" value="{{ old('thumbnail') }}" required>

<h3 class="mt-8 mb-4 text-[15px] font-semibold">コンテンツ</h3>
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
<input type="file" name="images[]" value="{{ old('images') }}" multiple="multiple" required>

<h3 class="mt-8 mb-4 text-[15px] font-semibold">ご注意点</h3>
<p class="mb-2 bg-yellow bg-opacity-10 text-yellow px-4 py-2 font-semibold">
    追加したエピソードは後から削除することができません。<br>
</p>
<p class="mb-2 bg-yellow bg-opacity-10 text-yellow px-4 py-2 font-semibold">
    もし更新したい場合はエピソード追加後に「編集する」ボタンから、新しい画像をアップロードし更新してください。
</p>
<p class="mb-2 bg-yellow bg-opacity-10 text-yellow px-4 py-2 font-semibold">
    もし削除したい場合はエピソード追加後に「編集する」ボタンから「非公開」を選択し更新してください。
</p>
