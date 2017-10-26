@extends('admin.layouts.support_app')
@section('content')
    <div class="row" ng-app="editMall">
        <div ng-controller="mainController">
            <?php $address = \App\Address::where('company_id',$mall->company_id)->get(); ?>
            <?php $phone = \App\Phone::where('company_id',$mall->company_id)->get(); ?>
            <form action='{{url("/admin/update_mall_detail/{$mall->id}")}}' class="col s12 m8" method="POST"  ng-if="detail">
                {{ csrf_field() }}
                <p>Fields marked with <i class="fa fa-asterisk" style="color: red;"></i> are mandatory.</p>
                <div class="card">
                    @if(\Illuminate\Support\Facades\Session::get('mallupdate'))
                        <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                            {{\Illuminate\Support\Facades\Session::get('mallupdate')}}
                        </div>
                    @else
                        <div class="card-title teal lighten-1" style="padding: 2%; color: #fff;">
                            update details of {{$mall->name}}
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input id="mallName" type="text" class="validate" name="mallname" value="{{$mall->name}}" >
                                <label for="mallName" data-error="wrong" data-success="right">Name of the Mall <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input id="tin" type="number" class="validate" name="tin" value="{{$mall->tin_no}}">
                                <label for="tin" data-error="wrong" data-success="right">TIN number <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                @if($phone->count() >0)
                                    <input id="phone" type="text" class="validate" name="phone" value="{{$phone[0]->phone_no}}">
                                    <label for="phone" data-error="wrong" data-success="right">phone number <i class="fa fa-asterisk" style="color: red;"></i></label>
                                @else
                                    <input id="phone" type="text" class="validate" name="phone">
                                    <label for="phone" data-error="wrong" data-success="right">phone number <i class="fa fa-asterisk" style="color: red;"></i></label>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">

                                @if($address->count() > 0)
                                    @if($address[0]->website != null)
                                        <input id="website" type="text" class="validate" name="website" value="{{$address[0]->website}}">
                                        <label for="website" data-error="wrong" data-success="right">Mall Website (if any)</label>
                                    @else
                                        <input id="website" type="text" class="validate" name="website">
                                        <label for="website" data-error="wrong" data-success="right">Mall Website (if any)</label>
                                    @endif
                                @else
                                    <input id="website" type="text" class="validate" name="website">
                                    <label for="website" data-error="wrong" data-success="right">Mall Website (if any)</label>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <select name="city" >
                                    <option value="" disabled selected>select Town / City </option>
                                    <option value='{{$address[0]->city}}' selected>{{$address[0]->city}}</option>
                                    <?php $cities = \App\City::all(); ?>
                                    @foreach($cities as $city )
                                        <?php $saCity =  $address[0]->city;?>

                                        @if($city === $saCity)
                                            <option value='{{$city->name}}'>{{$city->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label>Town / City . <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input id="floor" type="text" class="validate" name="floor" value="{{$mall->floors_no}}">
                                <label for="floor" data-error="wrong" data-success="right">Number of floor <i class="fa fa-asterisk" style="color: red;"></i> </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input id="descr" type="text" class="validate" name="description" value="{{$mall->description}}">
                                <label for="descr" data-error="wrong" data-success="right">Anything special about the mall</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input value="Update" type="submit" class="btn-large waves-effect waves-light blue lighten-1 right" style="color: #fff; margin-right: 2%;">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form class="col s12 m8" method="POST" action='{{url("/admin/update_mall_location/{$mall->id}")}}' ng-if="location" >
                {{csrf_field()}}
                <div class="card">
                    @if(\Illuminate\Support\Facades\Session::get('mallupdate'))
                        <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                            {{\Illuminate\Support\Facades\Session::get('mallupdate')}}
                        </div>
                    @else
                        <div class="card-title teal lighten-1" style="padding: 2%; color: #fff;">
                            update location of {{$mall->name}}
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                @if($mall->lat != null)
                                    <input required id="latitude" type="text" class="validate" name="latitude" value="{{$mall->lat}}">
                                    <label for="mallName" data-error="wrong" data-success="right">latitude <i class="fa fa-asterisk" style="color: red;"></i></label>
                                @else
                                    <input required id="latitude" type="text" class="validate" name="latitude">
                                    <label for="mallName" data-error="wrong" data-success="right">latitude <i class="fa fa-asterisk" style="color: red;"></i></label>
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                @if($mall->lat != null)
                                    <input required id="longitude" type="text" class="validate" name="longitude" value="{{$mall->lon}}">
                                @else
                                    <input required id="longitude" type="text" class="validate" name="longitude">
                                @endif
                                <label for="longitude" data-error="wrong" data-success="right">longitude <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input value="Update" type="submit" class="btn-large waves-effect waves-light blue lighten-1 right" style="color: #fff; margin-right: 2%;">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col s8 offset-s2 m4" style="padding-top: 3%;">
                <ul class="collection">
                    <li class="collection-item" style="padding-bottom: 0;">
                        <p style="font-size: 1.2em;" ng-click="detailMall()">
                            <a  href='{{"/admin/mall_edit/{$mall->id}"}}' class="<% isActiveClassMall %>">update Malls Detail</a>
                        </p>
                    </li>
                    <li  class="collection-item">
                        <p style="font-size: 1.2em;">
                            <a href='#updateMallAdmins'>Manage Admins of this mall</a>
                        </p>
                    </li>
                    <li class="collection-item">
                        <p style="font-size: 1.2em;" ng-click="updateLocation()">
                            <a  href="#updateMallLocation" class="<% isActiveClasslocation %>">update location of this mall</a>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection