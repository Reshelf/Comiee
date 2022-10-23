@extends('app')

@section('title', $user->name . 'さんのフォロワー')

@section('content')
    @include('atoms._nav', ['tab' => 0]))
    <div class="">
        @include('users.atoms.user', [
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
                        @include('users.atoms.person')
                    @endforeach
                @else
                    <p>フォロワーはいません</p>
                @endif
            </follow-modal>
        </div>
    </div>
@endsection
