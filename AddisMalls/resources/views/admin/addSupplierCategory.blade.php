@extends('admin.layouts.support_app')
@section('content')
    <div class="row">
        <div class="col m8 s12 l8" style="position: relative; left: 15%;">
            <div class="card">

                @if(\Illuminate\Support\Facades\Session::get('supcat'))
                    <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                        {{\Illuminate\Support\Facades\Session::get('supcat')}}
                    </div>
                @else
                    <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                        Add new supplier category.
                    </div>
                @endif

            </div>
            <div class="card">
                <div class="card-content">
                    <form method="post" action="{{url('/admin/addSupplierCategory')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input id="first_name" type="text" class="validate" name="name" required>
                                <label for="first_name" data-error="wrong" data-success="right">name of the category <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input value="Save" type="submit" class="btn waves-effect waves-light blue lighten-1 right" style="color: #fff; margin-right: 2%;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection