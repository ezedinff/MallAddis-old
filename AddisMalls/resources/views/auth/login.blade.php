@extends('layouts.app')

@section('content')
    <style>
        body{
            background-color: #42A5F5;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col m4 s10 offset-m4 offset-s1" style="padding: 0; margin-top: 100px; margin-bottom: 200px;">
            <form class="col s12 m12 center" style="padding: 0;" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="card z-depth-5">
                    <div class="card-content center" >
                        <img src="{{asset('img/logo.png')}}" style="margin-bottom: 20px;"/>
                        <div class="card-title center">Login</div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding-left: 0;">
                                <i class="material-icons prefix">person_outline</i>
                                <input id="tin" type="number" class="validate" name="tin">
                                <label for="tin" data-error="wrong" data-success="right">TIN number <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <i class="material-icons prefix">lock_outline</i>
                                <input id="password" type="password" class="validate" name="password">
                                <label for="password" data-error="wrong" data-success="right">password <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <input type="checkbox" id="remember" style="float: left;" class="checkbox-indigo"/>
                        <label for="remember" style="float: left;">Remember me</label>
                        <div class="row">
                            <div class="input-field col s12 m12" >
                                <input type="submit" class="btn waves-effect waves-light blue lighten-1 col s12" value="login">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
