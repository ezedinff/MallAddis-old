@extends('layouts.app')
@section('content')
    <div class="row">
        @include('showCafeNavBar')
    </div>
    <div class="row" style="padding-left: 25%;">
        <div class="col l8 m8 s12">
            <div class="sliderMenu">
            @foreach($menus as $menu)
                    <div class="slide">
                        <?php $photo = $menu->photo_path; ?>
                        <img src='{{asset("$photo")}}' />
                    </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection