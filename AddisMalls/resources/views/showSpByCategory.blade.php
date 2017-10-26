@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="row">
           <div class="col l12 m12 s12 no-padding">
               @include('showNavBar')
           </div>
        </div>
        <div class="row">
            <div class="col l3 m3 s6">
            </div>
            <div class="col l8 m3 s12">
                <div class="card">
                    <div class="card-title blue lighten-1 white-text" style="padding: 1%;">
                        <?php $category = \App\Category::find($cate_id); ?>
                        {{$category->name}} Retailers inside {{$mall->name}}
                    </div>
                </div>
                <span>Sort By: </span> <span><a href="#" class="btn btn-sm blue lighten-1 white-text"> ALL</a></span> <span><a href="#" class="btn btn-sm signinButton"> floor</a></span>
            </div>
        </div>
        <div class="row">
            <div class="col l3 m3 s12">
                @include('sidenavCategory')
            </div>
            <div class="col l9 m9 s12">
                <div class="row">
                    @foreach($retailers as $retailer)
                        <?php
                        $cover = \App\Photo::where('company_id',$retailer->company_id)->get();
                        $slide  = \App\Slide::where('company_id',$retailer->company_id)->get();
                        ?>
                        <div class="col l3 m3 s6">
                            <a href={{url("/show/retailer/{$retailer->id}")}}>
                                <div class="card">
                                    @if($cover->count() > 0)
                                        <?php $photo = $cover[0]->photo_path; ?>
                                        <div class="card-image">
                                            <img src='{{asset("$photo")}}'>
                                        </div>
                                    @elseif($slide->count() > 0)
                                        <?php $photo = $slide[0]->photo_path; ?>
                                        <div class="card-image">
                                            <img src='{{asset("$photo")}}'>
                                        </div>
                                    @endif
                                    <div class="card-action">
                                        <div class="card-title center">{{$retailer->name}}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection