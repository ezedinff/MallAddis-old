@extends('sp.layouts.support_app')
@section('content')
            <div class="card">
                @if(\Illuminate\Support\Facades\Session::get('logo'))
                    <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                        {{\Illuminate\Support\Facades\Session::get('logo')}}
                    </div>
                @else
                    <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                        Add your company's logo
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-content">
                    <form method="post" action="{{url('/sp/addLogo')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <p class="red-text flow-text">
                            Note: the logo should be 64 x 64 px
                        </p>
                        <div class="row">
                            <div class="file-field input-field">
                                <div class="btn blue lighten-1">
                                    <span class="white-text">File</span>
                                    <input type="file" name="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="logo">
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