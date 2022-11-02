@extends('app')

@section('content')
    @include('atoms._simple_nav')

    <div class="mt-8">
        <div class="max-w-xl mx-auto bg-white rounded shadow">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="font-semibold bg-eee text-lg p-4">{{ __('メールアドレスをご確認ください') }}</div>

                        <div class="p-6">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('ご登録いただいたメールアドレスに確認用のリンクをお送りしました。') }}
                                </div>
                            @endif
                            <p class="mb-6">
                                {{ __('メールをご確認ください。') }} <br>
                                {{ __('もし確認用メールが送信されていない場合は、下記をクリックしてください。') }}
                            </p>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn-border">{{ __('確認メールを再送信する') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('atoms._footer') --}}
@endsection
