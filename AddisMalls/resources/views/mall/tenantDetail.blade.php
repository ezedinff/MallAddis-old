@extends('mall.layouts.support_app')
@section('content')
            <div class="card">
                @if(\Illuminate\Support\Facades\Session::get('detail'))
                    <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                        {{\Illuminate\Support\Facades\Session::get('detail')}}
                    </div>
                @else
                    <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                        Add detail of {{$sp->name}}
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-content">
                    <p class="green-text" style="font-size: 1.2em; margin-bottom: 3%;">filling these details enable you to manage the lease spaces and retailers inside of your mall</p>
                    <form method="post" action='{{url("/mall/tenantDetail/{$sp->id}")}}' enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input id="size"  type="number" class="validate" name="size">
                                <label for="size" data-error="wrong" data-success="right">Area in meter square</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="date" type="text" class="datepicker" name="start" required>
                                <label for="date">Starting date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="date" type="text" class="datepicker" name="end" required>
                                <label for="date">Ending date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="date" type="submit" value="save" class="btn blue lighten-1 white-text" style="float: right;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection