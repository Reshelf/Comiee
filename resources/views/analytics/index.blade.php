@extends('app')
@section('content')
  @include('atoms._nav', ['tab' => 0])

  <analytics-dashboard :user="{{ $user }}" :books="{{ $books }}"></analytics-dashboard>
@endsection
