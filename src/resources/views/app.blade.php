<!DOCTYPE html>
<html class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>
        @yield('title')
    </title>
    <script type="text/javascript">
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @include('_patials._error_toast')
        @yield('content')
    </div>

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    @yield('scripts')
</body>

</html>
