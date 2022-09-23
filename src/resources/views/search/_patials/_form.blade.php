@csrf
<div class="flex flex-col text-sm p-4">
    <div class="flex w-full">
        <div class="w-1/2 font-semibold flex items-center">基準</div>
        <div class="sort-select w-1/2">
            {{-- <input type="text" name="name" value="{{ $user->name ?? old('name') }}"
                class="w-full p-2 bg-white-1 dark:bg-dark-2 rounded"> --}}
            <select name="time">
                <option class="w-full" value="お気に入り数" selected>お気に入り数</option>
                <option class="w-full" value="再生回数">再生回数</option>
            </select>
        </div>
    </div>
    <div class="flex w-full mt-4">
        <div class="w-1/2 font-semibold flex items-center">期間</div>
        <div class="sort-select w-1/2">
            <select name="time">
                <option class="w-full" value="すべての期間" selected>すべての期間</option>
                <option class="w-full" value="年間">年間</option>
                <option class="w-full" value="月間">月間</option>
                <option class="w-full" value="週間">週間</option>
            </select>
        </div>
    </div>
    <div class="flex w-full mt-4">
        <div class="w-1/2 font-semibold flex items-center">完結作品</div>
        <div class="sort-select w-1/2">
            <select name="time">
                <option class="w-full" value="すべての作品" selected>すべての作品</option>
                <option class="w-full" value="完結作品に絞る">完結作品に絞る</option>
            </select>
        </div>
    </div>
    @auth
        <div class="flex w-full mt-4">
            <div class="w-1/2 font-semibold flex items-center">読了作品</div>
            <div class="sort-select w-1/2">
                <select name="time">
                    <option class="w-full" value="すべての作品" selected>すべての作品</option>
                    <option class="w-full" value="読了作品は除く">読了作品は除く</option>
                </select>
            </div>
        </div>
        <div class="flex w-full mt-4">
            <div class="w-1/2 font-semibold flex items-center">非表示作品</div>
            <div class="sort-select w-1/2">
                <select name="time">
                    <option class="w-full" value="すべての作品" selected>すべての作品</option>
                    <option class="w-full" value="非表示作品は除く">非表示作品は除く</option>
                </select>
            </div>
        </div>
    @endauth
    {{-- <user-body-count :content='@json($user->body ?? old('body'))'></user-body-count> --}}
</div>
