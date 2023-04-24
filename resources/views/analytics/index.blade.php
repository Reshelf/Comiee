@extends('app')
@section('content')
  @include('atoms._nav', ['tab' => 0])

  @if ($books->count() > 0)
    <analytics-dashboard :user="{{ $user }}" :books="{{ $books }}"></analytics-dashboard>
  @else
    <div class="flex items-center justify-center p-12">{{ __('分析する作品がありません') }}</div>
  @endif
@endsection
