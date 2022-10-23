@extends('app')

@section('title', $user->name . 'さんのフォロー')

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
                <template #header>{{ $user->name }}さんのフォロー</template>
                @if ($followings->count())
                    @foreach ($followings as $person)
                        @include('users.atoms.person')
                    @endforeach
                @else
                    <p>フォローしている人はいません</p>
                @endif
            </follow-modal>
        </div>
    </div>
@endsection
