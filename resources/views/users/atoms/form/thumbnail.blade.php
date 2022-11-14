<div class="">
    <div id="thumbnail-preview">
        @empty($user->thumbnail)
            <img src="{{ asset('/img/bg.svg') }}" alt="" class="block dark:hidden rounded max-h-6">
            <img src="{{ asset('/img/bg-dark.svg') }}" alt="thumbnail" class="hidden dark:block rounded max-h-6">
        @else
            <img src="{{ Auth::user()->thumbnail }}" alt="profile_thumbnail" class="rounded max-h-6 flex">
        @endempty
    </div>
    <div class="uploadOuter">
        <span class="dragBox">
            ファイル選択 or ドラッグ&ドロップ
            <input type="file" name="thumbnail" onChange="dragdrop_two(event)" ondragover="drag()" ondrop="drop()"
                id="uploadFile" />
        </span>
    </div>
</div>
