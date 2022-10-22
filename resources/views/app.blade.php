<!DOCTYPE html>
<html class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @vite('resources/sass/app.scss')
    <title>
        @yield('title')
    </title>
    @yield('head')
</head>

<body>
    <div id="app">
        {{-- @include('_patials._error_toast') --}}
        @yield('content')
    </div>

    @vite('resources/js/app.js')
    @yield('scripts')
</body>

</html>
