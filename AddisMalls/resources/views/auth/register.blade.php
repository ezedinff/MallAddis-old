@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 50px;">
    <div class="row">
        <h3 class="header blue-text text-lighten-1">Register your Mall for Free</h3>

        <form class="col s12 m8" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <p>Fields marked with <i class="fa fa-asterisk" style="color: red;"></i> are mandatory.</p>
            <div class="card">
                <div class="card-title blue lighten-1" style="padding: 2%; color: #fff;">
                    Please give us the details of your mall
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                            <input id="mallName" type="text" class="validate" name="mallname">
                            <label for="mallName" data-error="wrong" data-success="right">Name of the Mall <i class="fa fa-asterisk" style="color: red;"></i></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                            <input id="tin" type="number" class="validate" name="tin">
                            <label for="tin" data-error="wrong" data-success="right">TIN number <i class="fa fa-asterisk" style="color: red;"></i></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                            <input id="phone" type="text" class="validate" name="phone">
                            <label for="phone" data-error="wrong" data-success="right">phone number <i class="fa fa-asterisk" style="color: red;"></i></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                            <input id="website" type="text" class="validate" name="website">
                            <label for="website" data-error="wrong" data-success="right">Mall Website (if any)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                            <select name="city">
                                <option value="" disabled selected>select Town / City </option>
                                <?php $cities = \App\City::all(); ?>
                                @foreach($cities as $city )
                                    <option value='{{$city->name}}'>{{$city->name}}</option>
                                @endforeach
                            </select>
                            <label>Town / City . <i class="fa fa-asterisk" style="color: red;"></i></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                            <input id="floor" type="text" class="validate" name="floor">
                            <label for="floor" data-error="wrong" data-success="right">Number of floor <i class="fa fa-asterisk" style="color: red;"></i> </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                            <input id="descr" type="text" class="validate" name="description">
                            <label for="descr" data-error="wrong" data-success="right">Anything special about the mall</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-title blue lighten-1" style="padding: 2%; color: #fff;">
                    Your Contact details
                </div>
            </div>
            <p style="color:red;">Your information will not be visible to site-visitors. Contact will be established through phone number only.</p>
            <div class="card">
                <div class="card-content">
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
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                    <input value="Register" type="submit" class="btn-large waves-effect waves-light blue lighten-1 right" style="color: #fff; margin-right: 2%;">
                </div>
            </div>
        </form>



        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <p style="color: #212121;">Benefits of Listing your mall in Addis Malls</p>
                        <ul class="collection">
                            <li class="collection-item">
                                <a href="#!" class="secondary-content" style="float: left; left: -10px; position: relative;"><i class="material-icons prefix">grade</i></a>
                                <p>Get the best brands to be a part of your mall</p>
                            </li>
                            <li class="collection-item">
                                <a href="#!" class="secondary-content" style="float: left; left: -10px; position: relative;"><i class="material-icons prefix">grade</i></a>
                                <p>Get the best retailers as your tenants.</p>
                            </li>
                            <li class="collection-item">
                                <a href="#!" class="secondary-content" style="float: left; left: -10px; position: relative;"><i class="material-icons prefix">grade</i></a>
                                <p>Be the destination of choice.</p>
                            </li>
                            <li class="collection-item">
                                <a href="#!" class="secondary-content" style="float: left; left: -10px; position: relative;"><i class="material-icons prefix">grade</i></a>
                                <p>Get attractive anchor tenants.</p>
                            </li>
                            <li class="collection-item">
                                <a href="#!" class="secondary-content" style="float: left; left: -10px; position: relative;"><i class="material-icons prefix">grade</i></a>
                                <p>Be the most successful Mall in your city.</p>
                            </li>
                        </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-content" style="text-align: center;">
                    <img src="{{asset('img/jobs.jpg')}}">
                    <span class="card-title">Find best careers in the retailing industry</span>
                </div>
            </div>
            <div class="card">
                <div class="card-content" style="text-align: center;">
                    <img src="{{asset('img/news.png')}}">
                    <span class="card-title">Reliable news and updated analysis on Retail.</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
