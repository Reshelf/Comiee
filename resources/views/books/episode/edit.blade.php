@extends('app')
@section('title', $episode->name)

@section('content')
    @include('atoms._nav', ['tab' => 0])

    <div class="max-w-md flex flex-col mx-auto container">
        <a href="{{ URL::previous() }}" class="inline-block text-xs cursor-pointer hover:text-primary mb-8">
            {{ __('作品トップへ') }}
        </a>
        <update-episode :id='@json($episode->id)' :name='@json($episode->name ?? old('name'))'
            :body='@json($episode->body ?? old('body'))'>
        </update-episode>
    </div>
@endsection
