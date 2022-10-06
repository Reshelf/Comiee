@if ($errors->any())
    <ul class="absolute">
        @foreach ($errors->all() as $error)
            <li class="mb-4">
                <toast-modal :error="true" :success="false" :message='@json($error)'>
                </toast-modal>
            </li>
        @endforeach
    </ul>
@endif

@if (session('flash_message'))
    <toast-modal :error="false" :success="true" :message='@json(session('flash_message'))'>
    </toast-modal>
@endif
