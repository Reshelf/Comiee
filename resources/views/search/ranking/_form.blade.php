<div class="w-full flex overflow-x-auto">
    <div class="filters md:w-1/5 flex flex-col md:pr-12">
        <h4 class="text-xs my-2 py-4 border-b border-ccc">並び替え</h4>
        <input type="radio" name="sort" class="visually-hidden" id="like" value="お気に入り数"
            @if ($sort === 'お気に入り数') checked @endif />
        <label for="like" class="mt-4">お気に入り数</label>
        <input type="radio" name="sort" class="visually-hidden" id="view" value="閲覧回数"
            @if ($sort === '閲覧回数') checked @endif />
        <label for="view" class="mt-4">閲覧回数</label>
    </div>
    <div class="md:w-1/5 flex flex-col md:pr-12 ml-8 md:ml-0">
        <h4 class="text-xs my-2 py-4 border-b border-ccc">特徴</h4>
        <label class="light-checkbox mt-4">
            <input type="checkbox" name="feature" value="完結作品のみ" @if ($feature === '完結作品のみ') checked @endif
                class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">完結作品のみ</span>
        </label>
    </div>
</div>

<button type="submit" class="btn-border mt-6">絞り込む</button>
