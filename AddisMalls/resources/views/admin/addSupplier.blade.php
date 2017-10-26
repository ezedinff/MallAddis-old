@extends('admin.layouts.support_app')
@section('content')
    <div class="row">
        <div class="col m8 s12 l8" style="position: relative; left: 15%;">
            <div class="card">

                @if(\Illuminate\Support\Facades\Session::get('sup'))
                    <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                        {{\Illuminate\Support\Facades\Session::get('sup')}}
                    </div>
                @else
                    <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                        Add new supplier.
                    </div>
                @endif

            </div>
            <div class="card">
                <div class="card-content">
                    <form method="post" action="{{url('/admin/addSupplier')}}">
                        {{csrf_field()}}
                        <div class="card-title blue lighten-1 white-text" style="padding: 2%; margin-bottom: 3%;">
                            company details
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input id="first_name" type="text" class="validate" name="name" required>
                                <label for="first_name" data-error="wrong" data-success="right">name of the supplier company <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input id="first_name" type="number" class="validate" name="tin" required>
                                <label for="first_name" data-error="wrong" data-success="right">tin number of the company <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input id="first_name" type="text" class="validate" name="phone" required>
                                <label for="first_name" data-error="wrong" data-success="right">phone number of the company <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="card-title blue lighten-1" style="padding: 2%; color: #fff; margin-bottom: 2%;">
                            Contact details of the admin
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="first_name" type="text" class="validate" name="first_name" required>
                                <label for="first_name" data-error="wrong" data-success="right">First Name <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="lastname" type="text" class="validate" name="last_name" required>
                                <label for="lastname" data-error="wrong" data-success="right">Last Name <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <i class="material-icons prefix">phone</i>
                                <input id="phoneu" type="text" class="validate" name="phoneu" required>
                                <label for="phoneu" data-error="wrong" data-success="right">phone number <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <i class="material-icons prefix">lock</i>
                                <input id="passowrd" type="password" class="validate" name="password" required>
                                <label for="password" data-error="wrong" data-success="right">password <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input value="register" type="submit" class="btn waves-effect waves-light blue lighten-1 right" style="color: #fff; margin-right: 2%;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection