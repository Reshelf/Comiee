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

@section('scripts')
    <script>
        "use strict";

        function dragdrop_two(event) {
            let fileName = URL.createObjectURL(event.target.files[0]);
            let preview = document.getElementById("thumbnail-preview");
            let previewImg = document.createElement("img");
            previewImg.setAttribute("src", fileName);
            preview.innerHTML = "";
            preview.appendChild(previewImg);
        }

        function dragdrop_one(event) {
            let fileName = URL.createObjectURL(event.target.files[0]);
            let preview = document.getElementById("avatar-preview");
            let previewImg = document.createElement("img");
            previewImg.setAttribute("src", fileName);
            preview.innerHTML = "";
            preview.appendChild(previewImg);
        }

        function drag() {
            document.getElementById('uploadFile').parentNode.className = 'draging dragBox';
        }

        function drop() {
            document.getElementById('uploadFile').parentNode.className = 'dragBox';
        }
    </script>
@endsection
