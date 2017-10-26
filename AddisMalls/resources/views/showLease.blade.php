@extends('layouts.app')
@section('content')
    <div class="row">
        @include('showNavBar')
    </div>
    <div class="row">
        <div class="col l3 m3 s6" style="max-width: 25%;"></div>
        <div class="co l8 m8 s12" style="max-width: 65%; position: relative; left: 27%;">
            <div class="card">
                <div class="card-title blue lighten-1 white-text" style="padding: 1%;">
                    All Lease spaces inside {{$mall->name}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('sidenavCategory')
        @foreach($spaces as $space)
            <?php $phone = \App\Phone::where('company_id',$space->company_id)->get(); ?>
            <div class="col l3 m3 s6" style="min-width: 24%; padding-left: 2%;">
               <a href="#">
                    <div class="card">
                        <div class="card-image">
                            <img src='{{asset("$space->photo_path")}}'>
                        </div>
                        <div class="card-content">
                            <p><label>Floor number: </label><span>{{$space->floor_no}}</span></p>
                            <p><label>Area in m<sup>2</sup>: </label><span>{{$space->area}}</span></p>
                            <p><label>Purpose: </label><span>{{$space->purpose}}</span></p>
                            <p><label>Description: </label><span>{{$space->description}}</span></p>
                            <p><label>Phone number: </label><span>{{$phone[0]->phone_no}}</span></p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection