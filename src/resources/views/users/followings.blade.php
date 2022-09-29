@extends('app')

@section('title', $user->name . 'さんのフォロー')

@section('content')
    @include('_patials._nav')
    <div class="">
        @include('users._patials.user', [
            'mypage' => false,
            'setting' => false,
        ])
    </div>
    <div class="flex max-w-lg w-full mx-auto px-8 md:px-0 justify-center">
        <div class="py-8 w-full">
            {{-- @include('users._patials.tabs', [
                'hasBooks' => false,
                'hasLikes' => false,
                'about' => false,
            ]) --}}

            <follow-modal :user-name='@json($user->name)'>
                <template #header>{{ $user->name }}さんのフォロー</template>
                @if ($followings->count())
                    @foreach ($followings as $person)
                        @include('users._patials.person')
                    @endforeach
                @else
                    <p>フォローしている人はいません</p>
                @endif
            </follow-modal>

        </div>
    </div>
@endsection
