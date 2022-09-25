@csrf
<div class="flex flex-col text-sm p-4">
    <div class="flex w-full">
        <div class="w-1/2 font-semibold flex items-center">基準</div>
        <div class="sort-select w-1/2">
            {{-- <input type="text" name="name" value="{{ $user->name ?? old('name') }}"
                class="w-full p-2 bg-white-1 dark:bg-dark-2 rounded"> --}}
            <select name="sort_basis">
                <option value="likes" selected>お気に入り数</option>
                <option value="views">再生回数</option>
            </select>
        </div>
    </div>

    @if ($ranking)
        <div class="flex w-full mt-4">
            <div class="w-1/2 font-semibold flex items-center">期間</div>
            <div class="sort-select w-1/2">
                <select name="sort_time">
                    <option value="all">すべての期間</option>
                    <option value="year">年間</option>
                    <option value="month">月間</option>
                    <option value="week">週間</option>
                </select>
            </div>
        </div>
    @endif

    @if (!$todays_new)
        <div class="flex w-full mt-4">
            <div class="w-1/2 font-semibold flex items-center">完結作品</div>
            <div class="sort-select w-1/2">
                <select name="sort_complete">
                    <option value="false">指定なし</option>
                    <option value="true">完結作品のみ</option>
                </select>
            </div>
        </div>
    @endif

    @auth
        @if ($like)
            <div class="flex w-full mt-4">
                <div class="w-1/2 font-semibold flex items-center">未読作品</div>
                <div class="sort-select w-1/2">
                    <select name="sort_unread">
                        <option value="false">指定なし</option>
                        <option value="true">未読作品のみ</option>
                    </select>
                </div>
            </div>
        @endif
        @if ($like)
            <div class="flex w-full mt-4">
                <div class="w-1/2 font-semibold flex items-center">追加順</div>
                <div class="sort-select w-1/2">
                    <select name="sort_add">
                        <option value="false">指定なし</option>
                        <option value="true">追加順</option>
                    </select>
                </div>
            </div>
        @endif
        @if (!$todays_new)
            <div class="flex w-full mt-4">
                <div class="w-1/2 font-semibold flex items-center">読了作品</div>
                <div class="sort-select w-1/2">
                    <select name="sort_read">
                        <option value="false">指定なし</option>
                        <option value="true">読了作品のみ</option>
                    </select>
                </div>
            </div>
        @endif

        <div class="flex w-full mt-4">
            <div class="w-1/2 font-semibold flex items-center">非表示作品</div>
            <div class="sort-select w-1/2">
                <select name="sort_hidden">
                    <option value="false">指定なし</option>
                    <option value="true">非表示作品は除く</option>
                </select>
            </div>
        </div>
    @endauth
    {{-- <user-body-count :content='@json($user->body ?? old('body'))'></user-body-count> --}}
</div>
