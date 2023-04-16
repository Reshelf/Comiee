<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="dark">

<head>
  @include('atoms.meta')
  @includeWhen(env('GA_ENABLE'), 'atoms.analytics')
  @yield('header-scripts')
  @vite(['resources/sass/app.scss', 'resources/js/app.ts', 'resources/js/common/atoms/common.js'])
</head>

<body>
  <div id="app">
    @yield('content')
  </div>
  @yield('footer-scripts')
</body>

</html>
