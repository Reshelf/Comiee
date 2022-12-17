<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">

@hasSection('title')
  <title>@yield('title') | {{ config('app.name') }}</title>
  <meta property="og:title" content="@yield('title') | {{ config('app.name') }}">
  <meta name="twitter:title" content="@yield('title') | {{ config('app.name') }}">
@else
  <title>{{ config('app.name') }}</title>
  <meta property="og:title" content="{{ config('app.name') }}">
  <meta name="twitter:title" content="{{ config('app.name') }}">
@endif

@hasSection('description')
  @yield('description')
@else
  <meta name="description" itemprop="description"
    content="{{ __('Starbooksは「面白いマンガを、もっともっと読みたい」という声から生まれた、マンガを楽しむことができるプラットフォームです。「良い作品を生んでくれた作者に、ちゃんとした評価と利益が入るようにしたい」、「作者の方が安心して制作活動に励めるよう、作者と作品の安全を守りたい」という理念をもとに設計されています。') }}">
  <meta property="og:description"
    content="{{ __('Starbooksは「面白いマンガを、もっともっと読みたい」という声から生まれた、マンガを楽しむことができるプラットフォームです。「良い作品を生んでくれた作者に、ちゃんとした評価と利益が入るようにしたい」、「作者の方が安心して制作活動に励めるよう、作者と作品の安全を守りたい」という理念をもとに設計されています。') }}">
  <meta name="twitter:description"
    content="{{ __('Starbooksは「面白いマンガを、もっともっと読みたい」という声から生まれた、マンガを楽しむことができるプラットフォームです。「良い作品を生んでくれた作者に、ちゃんとした評価と利益が入るようにしたい」、「作者の方が安心して制作活動に励めるよう、作者と作品の安全を守りたい」という理念をもとに設計されています。') }}">
@endif

@hasSection('image')
  @yield('image')
@else
  <meta property="og:image" content="{{ url('/') }}/img/ogp.png">
  <meta property="og:image:secure_url" content="{{ url('/') }}/img/ogp.png">
  <meta name="twitter:image" content="{{ url('/') }}/img/ogp.png">
@endif

<meta property="og:url" content="{{ url('/') }}">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta name="twitter:card" content="summary_large_image">
