@extends('app')

@section('title', $episode->name)

@section('content')
  @include('_patials._nav')

  <div class="max-w-md flex flex-col mx-auto container">
    <a href="{{ URL::previous() }}" class="inline-block text-xs cursor-pointer hover:text-primary mb-8">
      本のトップへ
    </a>
    <update-episode :id='@json($episode->id)' :name='@json($episode->name ?? old('name'))'
      :body='@json($episode->body ?? old('body'))'>
    </update-episode>
  </div>
@endsection
