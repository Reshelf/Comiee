<div class="flex items-center">
    <input id="acd-check1" class="acd-check hidden" type="checkbox">
    <label class="acd-label inline-block" for="acd-check1">
        <div
            class="inline-flex hover:text-primary text-666 stroke-666 hover:stroke-primary dark:stroke-eee items-center text-xs rounded-[3px] px-2 py-1.5 font-semibold cursor-pointer">
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
    <form class="acd-content flex items-center">
        @if ($ranking || $todays_new)
            <div class="flex items-center">
                <div class="{{ $like ? 'btn-primary' : 'btn-border' }} px-2 text-xs">お気に入り順</div>
                <div class="{{ $ranking ? 'btn-primary' : 'btn-border' }} px-2 text-xs">閲覧回数順</div>
            </div>
        @endif

        @if ($like)
            <div class="checkbox ml-4">
                <label for="is_complete" class="text-sm">未読エピソード</label>
                <input id="is_complete" type="checkbox" required name="is_complete"
                    {{ $book->is_complete ?? old('is_complete') ? 'checked' : '' }} class="switch ml-4">

            </div>
        @endif

        @if ($ranking || $like)
            <div class="checkbox ml-4">
                <label for="is_complete" class="text-sm">完結作品のみ</label>
                <input id="is_complete" type="checkbox" required name="is_complete"
                    {{ $book->is_complete ?? old('is_complete') ? 'checked' : '' }} class="switch ml-4">

            </div>
        @endif
    </form>
</div>
