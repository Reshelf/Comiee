<div id="avatar-preview">
    @empty($user->avatar)
        <img src="{{ asset('/img/noimage-user.svg') }}" alt="" class="avatar">
    @else
        <img src="{{ asset('/img/users/avatar/' . Auth::user()->avatar) }}" alt="avatar" class="avatar">
    @endempty
</div>
<div class="uploadOuter">
    <span class="dragBox">
        ファイル選択 or ドラッグ&ドロップ
        <input type="file" name="avatar" onChange="dragdrop_one(event)" ondragover="drag()" ondrop="drop()"
            id="uploadFile" />
    </span>
</div>
