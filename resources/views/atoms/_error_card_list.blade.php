@if ($errors->any())
    <ul class="my-4 max-w-6xl mx-auto">
        @foreach ($errors->all() as $error)
            <li class="text-red bg-red bg-opacity-10 my-2 mx-4 lg:mx-0 font-semibold rounded py-2 px-4">
                {{ $error }}
            </li>
        @endforeach
    </ul>
@endif
