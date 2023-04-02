@extends('app')
@section('content')
  @include('atoms._nav', ['tab' => 0])

  <div class="flex w-full mx-auto justify-center">
    <div class="w-full flex flex-col md:flex-row justify-around mx-auto px-4 lg:pt-4 lg:pb-8 lg:px-8 mb-8">
      <div class="w-full md:w-4/5 rounded-lg md:ml-8">
        <page-views-graph :page-views="{{ $pageViews }}"></page-views-graph>
      </div>
    </div>
  </div>
@endsection
