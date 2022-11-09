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
    <meta name="description" itemprop="description" content="@yield('description')">
    <meta property="og:description" content="@yield('description')">
    <meta name="twitter:description" content="@yield('description')">
@else
    <meta name="description" itemprop="description" content="Starbooksはマンガプラットフォームです。">
    <meta property="og:description" content="Starbooksはマンガプラットフォームです。">
    <meta name="twitter:description" content="Starbooksはマンガプラットフォームです。">
@endif

@hasSection('image')
    <meta property="og:image" content="@yield('image')">
    <meta property="og:image:secure_url" content="@yield('image')">
    <meta name="twitter:image" content="@yield('image')">
@else
    <meta property="og:image" content="{{ asset('/img/ogp.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('/img/ogp.png') }}">
    <meta name="twitter:image" content="{{ asset('/img/ogp.png') }}">
@endif

<meta property="og:url" content="{{ url() }}">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta name="twitter:card" content="summary">
