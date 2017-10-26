<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/materialize.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("css/font-awesome.min.css")}}">
    <link href="{{ asset('css/jquery.bxslider.min.css') }}" rel="stylesheet" />
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
        #dish{
            height: 200px;
            max-height: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        #dish:hover{
           height: auto;
            max-height: 400px;
        }
        .sliderMenu{
            border: 0;
        }
        #navMenus>a{
            color: white;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <header style="position: fixed; top: 0; z-index: 9999999999999; width: 100%;">
        @include('layouts.header')
    </header>
    <main>@yield('content')</main>
    @include('layouts.footer')


    <!-- Scripts -->
    <script src='{{asset("js/jquery.min.js")}}'></script>
    <script src="{{asset("js/materialize.min.js")}}"></script>
    <script src="{{asset('js/jquery.bxslider.min.js')}}"></script>
    <script>
            $(function(){

                $('select').material_select();
                $('.dropdown-button').dropdown({
                        inDuration: 300,
                        outDuration: 225,
                        constrainWidth: false, // Does not change width of dropdown to that of the activator
                        hover: true, // Activate on hover
                        gutter: 0, // Spacing from edge
                        belowOrigin: false, // Displays dropdown below the button
                        alignment: 'left', // Displays dropdown with edge aligned to the left of button
                        stopPropagation: false // Stops event propagation
                    }
                );

                $('.collapsible').collapsible();
                $('.slider').slider({
                    height:680,
                    indicators: false
                });
                $('.sliderMenu').bxSlider({
                    slideWidth: 800,
                    minSlides: 1,
                    maxSlides: 2,
                    slideMargin: 10
                });
                $('.button-collapse').sideNav();

            }); // end of document ready
    </script>

</body>
</html>
