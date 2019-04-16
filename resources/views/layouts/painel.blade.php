<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ asset('painel/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('painel/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('painel/css/custom.css') }}" rel="stylesheet">
</head>
<body class="{{ (in_array(Request::route()->getName(), ['password.email', 'password.reset', 'login'])) ? 'body-bg-color' : 'sidebar-mini'}}">

    <div class="wrapper">
        @if (\Auth::check())
            @include('layouts.header')
            @include('layouts.aside')
        @endif

        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('painel/js/jquery.min.js') }}"></script>
    <script src="{{ asset('painel/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('painel/js/script.js') }}"></script>

    <script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    </script>
</body>
</html>
