@extends('mall.layouts.support_app')
@section('content')
                <h5 class="header blue-text text-lighten-1">Register your Retailers for Free</h5>
                <div class="card">
                    @if(\Illuminate\Support\Facades\Session::get('sp'))
                        <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                            {{\Illuminate\Support\Facades\Session::get('sp')}}
                        </div>
                    @else
                        <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                            Details of the service provider
                        </div>
                    @endif
                    <div class="card-content">
                        <form method="post" action="{{url('/addService')}}">
                            {{csrf_field()}}
                            <div class="row" style="max-height: 50px !important;">
                                <div class="input-field col s12 m12" style="padding: 0; margin: 0; max-height: 50px; ">
                                    <input id="tin" type="number" class="validate" name="tin1">
                                    <label for="tin" data-error="wrong" data-success="right">TIN number <i class="fa fa-asterisk" style="color: red;"></i></label>
                                </div>
                            </div>
                            <div class="row" style="max-height: 50px !important;">
                                <div class="input-field col s12 m12" style="padding: 0; margin: 0; max-height: 50px;">
                                    <input id="passowrd" type="password" class="validate" name="password1">
                                    <label for="password" data-error="wrong" data-success="right">password <i class="fa fa-asterisk" style="color: red;"></i></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                    <input value="Register" type="submit" class="btn-large waves-effect waves-light blue lighten-1 right" style="color: #fff; margin-right: 2%;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

@endsection