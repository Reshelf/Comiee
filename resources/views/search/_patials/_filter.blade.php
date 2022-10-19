<div class="flex flex-col justify-center border-b border-ddd dark:border-dark-1 pb-2">
    <input id="acd-check1" class="acd-check hidden" type="checkbox">
    <label class="acd-label inline-block" for="acd-check1">
        <div
            class="inline-flex hover:text-primary dark:hover:text-666 text-666 stroke-666 hover:stroke-primary dark:stroke-eee items-center text-xs rounded-[3px] px-2 py-1.5 font-semibold cursor-pointer">
            <svg class="w-[20px] h-[20px] mr-2" viewBox="0 0 24 24" fill="none">
                <path d="M19 22V11" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M19 7V2" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M12 22V17" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M12 13V2" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M5 22V11" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M5 7V2" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M3 11H7" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M17 11H21" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M10 13H14" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            フィルタ
        </div>
    </label>
    <form class="acd-content flex">
        @if ($ranking || $todays_new)
            <div class="flex flex-col mr-12">
                <h4 class="text-xs mb-4">並び替え</h4>
                <a class="{{ $like ? 'font-semibold' : '' }} mb-2">お気に入り順</a>
                <a class="{{ $ranking ? 'font-semibold' : '' }}">閲覧回数順</a>
            </div>
        @endif

        @if ($ranking || $like)
            <div class="flex flex-col mr-12">
                <h4 class="text-xs mb-4">特徴</h4>
                <div class="checkbox mb-4">
                    <label for="is_complete" class="text-sm">未読エピソード</label>
                    <input id="is_complete" type="checkbox" required name="is_complete"
                        {{ $book->is_complete ?? old('is_complete') ? 'checked' : '' }} class="switch ml-4">
                </div>
                @if ($like)
                    <div class="checkbox">
                        <label for="is_complete" class="text-sm">完結作品のみ</label>
                        <input id="is_complete" type="checkbox" required name="is_complete"
                            {{ $book->is_complete ?? old('is_complete') ? 'checked' : '' }} class="switch ml-4">

                    </div>
                @endif
            </div>
        @endif


    </form>
</div>
