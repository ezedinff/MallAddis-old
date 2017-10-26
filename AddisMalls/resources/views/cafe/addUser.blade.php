@extends('cafe.layouts.support_app')
@section('content')
            <div class="card">
                @if(\Illuminate\Support\Facades\Session::get('user'))
                    <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                        {{\Illuminate\Support\Facades\Session::get('user')}}
                    </div>
                @else
                    <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                        Add new user to controller over this admin panel beside you.
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-content">
                    <form method="post" action="{{url('/cafe/addUser')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="first_name" type="text" class="validate" name="first_name">
                                <label for="first_name" data-error="wrong" data-success="right">First Name <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="lastname" type="text" class="validate" name="last_name">
                                <label for="lastname" data-error="wrong" data-success="right">Last Name <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <i class="material-icons prefix">phone</i>
                                <input id="phoneu" type="text" class="validate" name="phoneu">
                                <label for="phoneu" data-error="wrong" data-success="right">phone number <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <i class="material-icons prefix">lock</i>
                                <input id="passowrd" type="password" class="validate" name="password">
                                <label for="password" data-error="wrong" data-success="right">password <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input value="Register" type="submit" class="btn waves-effect waves-light blue lighten-1 right" style="color: #fff; margin-right: 2%;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection