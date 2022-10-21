<div class="w-full flex">
    <div class="filters w-1/5 flex flex-col pr-12">
        <h4 class="text-xs my-2 py-4 border-b border-ccc">特徴</h4>
        <input class="visually-hidden" type="radio" name="feature" id="all" value="全ての作品"
            @if ($feature === '全ての作品') checked @endif />
        <label for="all" class="mt-4">全ての作品</label>
        <input class="visually-hidden" id="is_complete" type="radio" name="feature" value="完結作品のみ"
            @if ($feature === '完結作品のみ') checked @endif />
        <label for="is_complete" class="mt-4">完結作品のみ</label>
    </div>
</div>

<button type="submit" class="btn-border mt-6">絞り込む</button>
