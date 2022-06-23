@extends('app')

@section('title', $chapter->name ?? '無題')

@section('content')
  @include('atoms.nav')

  <div class="flex flex-col mx-auto max-w-md">
    <div class="my-8 text-3xl">{{ $chapter->name ?? 'ないよ' }}</div>
    <div class="p-8 bg-white rounded shadow whitespace-pre-line">
      {!! nl2br(e($chapter->body)) !!}
    </div>
  </div>
@endsection
