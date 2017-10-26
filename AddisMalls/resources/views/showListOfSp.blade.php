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
                    All Retailers inside {{$mall->name}}
                </div>
            </div>
            <span>Sort By: </span> <span><a href="#" class="btn btn-sm blue lighten-1 white-text"> ALL</a></span> <span><a href="#" class="btn btn-sm signinButton"> floor</a></span>
        </div>
   </div>
    <div class="row">
        @include('sidenavCategory')
        @foreach($retailers as $retailer)
            <div class="col l3 m3 s6" style="min-width: 24%; padding-left: 2%;">
                <a href={{url("/show/retailer/{$retailer->id}")}}>
                    <?php
                    $cover = \App\Photo::where('company_id',$retailer->company_id)->get();
                    $slide  = \App\Slide::where('company_id',$retailer->company_id)->get();
                    ?>
                    <div class="card">
                        <div class="card-image">
                            @if($cover->count() > 0)
                                <?php $photo = $cover[0]->photo_path; ?>
                                <img src='{{asset("$photo")}}'>
                            @elseif($slide->count() > 0)
                                <?php $photo = $slide[0]->photo_path; ?>
                                <img src='{{asset("$photo")}}'>
                            @endif

                        </div>
                        <div class="card-action">
                            <div class="card-title center">{{$retailer->name}}</div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection