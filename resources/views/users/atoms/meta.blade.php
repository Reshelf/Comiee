@isset($user->avatar)
  @section('image')
    <meta property="og:image" content="{{ $user->avatar }}">
    <meta property="og:image:secure_url" content="{{ $user->avatar }}">
    <meta name="twitter:image" content="{{ $user->avatar }}">
  @endsection
@endisset
@isset($user->body)
  @section('description')
    <meta name="description" itemprop="description" content="{{ $user->body }}">
    <meta property="og:description" content="{{ $user->body }}">
    <meta name="twitter:description" content="{{ $user->body }}">
  @endsection
@endisset
