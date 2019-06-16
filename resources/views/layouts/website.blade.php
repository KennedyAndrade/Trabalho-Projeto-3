<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content="900">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{!! asset('website/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('website/css/custom.css') !!}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    @include('website/includes/navbar')

    @yield('content')

    <script src="{!! asset('website/js/jquery-3.3.1.min.js') !!}"></script>
    <script src="{!! asset('website/js/popper.min.js') !!}"></script>
    <script src="{!! asset('website/js/bootstrap.min.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <script type="text/javascript">
    var offsetHeight = 120 + 1;
    $(document).on("scroll", onScroll);
    $('.navbar li a, .footerNav li a').click(function (event) {
        var scrollPos = $('body').find($(this).attr('href')).offset().top - (offsetHeight - 1);

        if ($("#navbarSupportedContent").hasClass("show")) {
            $(".navbar-toggler").click();
        }

        $('.navbar li a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');

        setTimeout(function(){
            $('body,html').animate({
                scrollTop: scrollPos
            }, 200);
        },200)
        return false;
    });


    function onScroll(event){
        var scrollPos = $(document).scrollTop();
        $('.navbar li a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top - (offsetHeight - 1) <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('.navbar li a').removeClass("active");
                currLink.addClass("active");
            }
            else{
                currLink.removeClass("active");
            }
        });
    }


    $(function(){
        var navMain = $(".navbar-collapse"); // avoid dependency on #id
        // "a:not([data-toggle])" - to avoid issues caused
        // when you have dropdown inside navbar
        navMain.on("click", "a:not([data-toggle])", null, function () {
            navMain.collapse('hide');
        });
    });

    </script>

    @yield('script')
</body>
</html>
