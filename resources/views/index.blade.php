@extends('app')
@section('content')
  @include('atoms._nav', ['tab' => 0])

  <div class="flex w-full mx-auto justify-center">
    <div class="w-full flex flex-col md:flex-row justify-around mx-auto px-4 lg:pt-4 lg:pb-8 lg:px-8 mb-8">

      <div class="lg:mb-4">
        @include('books.atoms.tabs')
      </div>

      <div class="w-full md:w-4/5 rounded-lg md:ml-8">
        @include('atoms._error_card_list')
        @include('atoms.success')

        <books-lists :lang='@json(app()->getLocale())'></books-lists>
      </div>
    </div>
  </div>

  <footer-contents></footer-contents>


  {{-- ログイン後、Piniaにデータを保存 --}}
@section('footer-scripts')
  <script>
    window.userData = @json(Auth::user());
  </script>
@endsection

@endsection
