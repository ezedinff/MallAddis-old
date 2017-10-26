@extends('cafe.layouts.support_app')
@section('content')
            <?php $s  = \App\Slide::where('company_id',auth()->user()->company_id)->get(); ?>
            <div class="card">
                @if(\Illuminate\Support\Facades\Session::get('slide'))
                    <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                        {{\Illuminate\Support\Facades\Session::get('slide')}}
                        <p class="flow-text right white-text" style="height: 50px;">{{$s->count()}}/3</p>
                    </div>
                @else
                    <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                        Add image for slide
                        <p class="flow-text right white-text" style="height: 50px;">{{$s->count()}}/3</p>
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-content">
                    <form method="post" action="{{url('/cafe/addSlide')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row" style="max-height: 50px !important;">
                            <div class="input-field" style="padding: 0; margin: 0; max-height: 50px;">
                                <input id="passowrd" type="text" class="validate" name="caption1">
                                <label for="password" data-error="wrong" data-success="right">Caption one</label>
                            </div>
                        </div>
                        <div class="row" style="max-height: 50px !important;">
                            <div class="input-field" style="padding: 0; margin: 0; max-height: 50px;">
                                <input id="passowrd" type="text" class="validate" name="caption2">
                                <label for="password" data-error="wrong" data-success="right">Caption two</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="file-field input-field">
                                <div class="btn blue lighten-1">
                                    <span class="white-text">File</span>
                                    <input type="file" name="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="slide picture">
                                </div>
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
@endsection