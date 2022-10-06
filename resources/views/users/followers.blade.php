@extends('app')

@section('title', $user->name . 'さんのフォロワー')

@section('content')
    @include('_patials._nav')
    <div class="">
        @include('users._patials.user', [
            'mypage' => false,
            'settings' => false,
        ])
    </div>
    <div class="flex max-w-lg w-full mx-auto px-8 md:px-0 justify-center">
        <div class="py-8 w-full">
            <follow-modal :user-name='@json($user->name)'>
                <template #header>{{ $user->name }}さんのフォロワー</template>
                @if ($followers->count())
                    @foreach ($followers as $person)
                        @include('users._patials.person')
                    @endforeach
                @else
                    <p>フォロワーはいません</p>
                @endif
            </follow-modal>
        </div>
    </div>
@endsection
