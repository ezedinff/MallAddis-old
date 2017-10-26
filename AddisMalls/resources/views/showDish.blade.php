@extends('layouts.app')
@section('content')
    <div class="row">
        @include('showCafeNavBar')
    </div>
    <div class="row">
        <div class="container">
            @foreach($dishes as $dish)
                <div class="col l4 m4 s6">
                    <div class="card">
                        <?php $photo = $dish->photo_path; ?>
                        <div class="card-image">
                            <img src='{{asset("$photo")}}' />
                        </div>
                        <div class="card-content" id="dish">
                            <div class="card-title">
                                {{$dish->name}}
                            </div>
                            {{$dish->description}}
                        </div>
                        <div class="card-action center-align">
                            <span style="font-size:1.2em; ">{{$dish->price}}</span>
                            <span style="font-size: 1.4em; font-weight: bold;">
                                ETB
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection