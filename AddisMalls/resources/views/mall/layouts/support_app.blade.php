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
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    .name,.email,.collapsible-header{
        color: #f5f5f5 !important;
    }
    .collapsible-body >a{
        color: #f5f5f5 !important;
    }
    .collapsible-header > i{
        color: #f5f5f5 !important;
    }
    .collapsible-header > span{
        color: #f5f5f5 !important;
        float: right;
        margin-right: 5%;
        margin-top: 6%;
    }
</style>
</head>
<body style="overflow-x: hidden;">
        <div class="row">
            <div class="row">
                <header>
                    @include('mall.layouts.header' )
                </header>
            </div>
            <div class="row" style="overflow-x: hidden;">
                <div class="col m8 l8 s12  offset-m3 offset-l3" style="overflow-x: hidden;">
                    <main style="overflow-x: hidden;">
                        @yield('content')
                        @show
                    </main>
                </div>
            </div>
        </div>


<!-- Scripts -->
<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{asset('js/angular.min.js')}}"></script>
<script src="{{asset('js/addsp.js')}}"></script>
      <script src="{{asset('js/vacancy.js')}}"></script>
      <script src="{{asset("js/materialize.min.js")}}"></script>
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
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });
    });
</script>
</body>
</html>
