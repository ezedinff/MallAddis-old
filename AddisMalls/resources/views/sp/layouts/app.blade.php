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
    <link rel="stylesheet"
          href='{{asset("material-components-web/dist/material-components-web.css")}}'>
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

    </style>
</head>
<body>
<header>@include('layouts.header')</header>
<main>
    @yield('content')
    @show
</main>
<!-- Scripts -->
<script src='{{asset("js/jquery.min.js")}}'></script>
<script src='{{asset("/material-components-web/dist/material-components-web.js")}}'></script>
<script>mdc.autoInit()</script>
<script src="{{asset("js/materialize.min.js")}}"></script>
<script src="{{asset('js/angular.min.js')}}"></script>
<script src="{{asset('js/addsp.js')}}"></script>
<script>
    $(function(){

        $('.button-collapse').sideNav();
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

    }); // end of document ready
</script>

</body>
</html>
