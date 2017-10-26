@extends('mall.layouts.support_app')
@section('content')
    <div class="card">
        @if(\Illuminate\Support\Facades\Session::get('slide'))
            <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                {{\Illuminate\Support\Facades\Session::get('slide')}}
            </div>
        @else
            <div class="card-title teal lighten-1 white-text" style="padding: 2%;">
                update your previous lease space post
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-content">
            <p class="green-text" style="padding-bottom: 5%;">we will help you to get the best tenants in the city.</p>
            <form method="post" action='{{url("/mall/space_edit/{$space->id}")}}' enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row" style="max-height: 50px !important;">
                    <div class="input-field" style="padding: 0; margin: 0; max-height: 50px;">
                        <input id="floor" type="number" class="validate" name="floor" value="{{$space->floor_no}}" required>
                        <label for="floor" data-error="wrong" data-success="right">floor number</label>
                    </div>
                </div>
                <div class="row" style="max-height: 50px !important;">
                    <div class="input-field" style="padding: 0; margin: 0; max-height: 50px;">
                        <input id="passowrd" type="number" class="validate" name="area" value="{{$space->area}}" required>
                        <label for="password" data-error="wrong" data-success="right">Area in meter square</label>
                    </div>
                </div>
                <div class="row" style="max-height: 50px !important;">
                    <div class="input-field" style="padding: 0; margin: 0; max-height: 50px;">
                        <input id="passowrd" type="text" class="validate" name="purpose" value="{{$space->purpose}}" required>
                        <label for="password" data-error="wrong" data-success="right">Purpose</label>
                    </div>
                </div>
                <div class="row" style="max-height: 50px !important;">
                    <div class="input-field" style="padding: 0; margin: 0; max-height: 50px;">
                        <input id="passowrd" type="text" class="validate" name="description" value="{{$space->description}}" required>
                        <label for="password" data-error="wrong" data-success="right">Description</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                        <input value="update" type="submit" class="btn waves-effect waves-light teal lighten-1 right" style="color: #fff; margin-right: 2%;">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection