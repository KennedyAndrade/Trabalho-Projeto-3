<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content="30">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{!! asset('website/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('website/css/custom.css') !!}">
</head>
<body>
    @include('website/includes/navbar')

    @yield('content')

    <script src="{!! asset('website/js/jquery-3.3.1.min.js') !!}"></script>
    <script src="{!! asset('website/js/popper.min.js') !!}"></script>
    <script src="{!! asset('website/js/bootstrap.min.js') !!}"></script>

    <script type="text/javascript">
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 50) {
            $(".navbar").removeClass("bigMenu");
        }else{
            $(".navbar").addClass("bigMenu");
        }
    });
    </script>
</body>
</html>
