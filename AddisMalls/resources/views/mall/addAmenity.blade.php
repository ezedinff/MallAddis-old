@extends('mall.layouts.support_app')
@section('content')
    <div class="card">
        <?php $s = \App\Slide::where('company_id',auth()->user()->company_id)->get(); ?>
        @if(\Illuminate\Support\Facades\Session::get('slide'))
            <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                {{\Illuminate\Support\Facades\Session::get('slide')}}
            </div>
        @else
            <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                Add Amenity of your mall
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-content">
            <form method="post" action="{{url('/mall/addAmenity')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row" style="max-height: 50px !important;">
                    <div class="input-field" style="padding: 0; margin: 0; max-height: 50px;">
                        <input id="passowrd" type="text" class="validate" name="name">
                        <label for="password" data-error="wrong" data-success="right">name</label>
                    </div>
                </div>
                <div class="row" style="max-height: 50px !important;">
                    <div class="input-field" style="padding: 0; margin: 0; max-height: 50px;">
                        <input id="passowrd" type="text" class="validate" name="descr">
                        <label for="password" data-error="wrong" data-success="right">description</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                        <input value="post" type="submit" class="btn waves-effect waves-light blue lighten-1 right" style="color: #fff; margin-right: 2%;">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection