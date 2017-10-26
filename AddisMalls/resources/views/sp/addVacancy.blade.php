@extends('sp.layouts.support_app')
@section('content')
    <div  ng-app="vacancy">
        <div  ng-controller="maincontroller">
            <div class="card">
                @if(\Illuminate\Support\Facades\Session::get('vacancy'))
                    <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                        {{\Illuminate\Support\Facades\Session::get('vacancy')}}
                    </div>
                @else
                    <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                        post vacancy
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-content">
                    <form method="post" action="{{url('/cafe/addVacancy')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input data-length="255" id="first_name" type="text" class="validate" name="title" required>
                                <label for="first_name" data-error="wrong" data-success="right" >Job title</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <select id="brand" name="job_category" required>
                                    <option value="" disabled selected>select job category</option>
                                    @foreach(\App\JobCategory::all() as $cats)
                                        <option value='{{$cats->id}}'>{{$cats->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <p><h5  ng-if="tit">select salary</h5></p>
                            <div class="row">
                                <div class="col l6 m6 s6" style="padding-top: 25px;" ng-if="nego">
                                    <input name="salary" type="radio" id="salary" style="float: left; position: relative; margin-top: 50px;" class="checkbox-indigo" value="Negotiable"/>
                                    <label for="salary" style="float: left;">Negotiable</label>
                                </div>
                                <div class="col l6 m6 s6" style="padding-top: 25px;" ng-if="fix">
                                    <input name="salary" type="radio" id="fixed" style="float: left; position: relative; margin-top: 50px;" class="checkbox-indigo"/>
                                    <label for="fixed" style="float: left;" ng-click="salaryFunc()">fixed salary</label>
                                </div>
                            </div>
                            <div class="row" ng-if="sala">
                                <div class="input-field col s12 m12 l12" style="padding: 0; margin: 0;">
                                    <input id="first_name" type="number" class="validate" name="salary" data-length="10" required>
                                    <label for="first_name" data-error="wrong" data-success="right">salary</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <select id="brand" name="type" required>
                                    <option value="" disabled selected>select employment type</option>
                                    <option value='Full-time'>Full-time</option>
                                    <option value='part-time'>Part-time</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input data-length="255" id="text" type="text" class="validate" name="education" required>
                                <label for="first_name" data-error="wrong" data-success="right">educational level</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input data-length="3" id="first_name" type="number" class="validate" name="exp" required>
                                <label for="first_name" data-error="wrong" data-success="right">minimum Years of experience</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea" data-length="700" name="descr" required></textarea>
                                <label for="textarea1" style="text-transform: capitalize;">More info and how to apply</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="date" type="text" class="datepicker" name="date" required>
                                <label for="date">Deadline</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="date" type="submit" value="Post" class="btn blue lighten-1 white-text" style="float: right;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection