<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script></head>

<!-- Styles -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/buttons.css')}}">
<link href="{{ asset('css/editor.css') }}" rel="stylesheet" />

<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
<script src="{{asset('js/admin.js')}}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
<link href="{{ asset('css/support.css') }}" rel="stylesheet">
<link href="{{asset('css/ticket_details.css')}}">
<script src="{{asset('js/ticket_details.js')}}"></script>
<link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/materialize.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

<style>
    body{
        background-color: #f5f5f5;
    }
    .contacts {
        display:block;
        position:fixed;
        bottom: 5%;
        right:3%;
        width:40px;
        border: hidden;
    }
    @-webkit-keyframes pulse {
        0% { box-shadow:0 0 8px #42A5F5, inset 0 0 8px #42A5F5; }
        50% { box-shadow:0 0 16px #42A5F5, inset 0 0 14px #42A5F5; }
        100% { box-shadow:0 0 8px #42A5F5, inset 0 0 8px #42A5F5; }
    }

    .inner {
        background-color:transparent;
        width:100px;
        height:100px;
        border-radius:50px;
        box-shadow: 0 0 8px #42A5F5, inset 0 0 8px #42A5F5;
        -webkit-animation: pulse 2s linear 1s infinite;
    }
    #online{
        display:none;
        position:fixed;
        bottom: 11.7%;
        right:0%;
        z-index: 9999999999999999999999999999999;
    }
    #right{
        height: 30px;
        width: 30px;
        border-radius: 50%;
        background-color: #f5f5f5;
        display: block;
        text-align: center;
        font-size: 1.5em;
        font-weight: 900;
        padding-top: 5px;
        position: relative;
        left: 96%;
        top: 30%;
        cursor: pointer;
    }
    #right:hover{
        background-color: #212121;
        color:#f5f5f5;
    }
    #left{
        height: 30px;
        width: 30px;
        border-radius: 50%;
        background-color: #f5f5f5;
        text-align: center;
        font-size: 1.5em;
        font-weight: 900;
        padding-top: 5px;
        position: relative;
        left: 96%;
        top: 30%;
        cursor: pointer;
    }
    #left:hover{
        background-color: #212121;
        color:#f5f5f5;
    }
</style>
</head>
<body>
      <div class="col l3 m3 s3 left_col" style="margin:0; padding: 0;">
            @include('admin.layouts.support_sidenav')
        </div>
        <div class="col l9 m9 s9"style="margin:0; padding: 0; overflow: hidden; position: relative; width: 80%; left: 20%;" >
            <header>
                @include('admin.layouts.support_nav' )
            </header>
            <main>
                @yield('content')
                @show
            </main>
       </div>



<!-- Scripts -->
<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{asset('js/editor.js')}}"></script>
<script src="{{asset('js/angular.min.js')}}"></script>
<script src="{{asset('js/addsp.js')}}"></script>
<script src="{{asset('js/editMall.js')}}"></script>
      <script src="{{asset("js/materialize.min.js")}}"></script>
<script>
    $(document).ready(function() {
        $("#txtEditor").Editor();
    });
</script>
<script>
    $(function () {

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


    });
</script>
</body>
</html>
