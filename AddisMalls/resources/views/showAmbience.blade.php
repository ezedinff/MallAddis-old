@extends('layouts.app')
@section('content')
    <div class="row">
        @include('showCafeNavBar')
    </div>
    <div class="row">
        <div class="container">
            @foreach($amebiences as $amebience)
                <div class="col l4 m4 s6">
                    <div class="card">
                        <?php $photo = $amebience->photo_path; ?>
                        <div class="card-image">
                            <img src='{{asset("$photo")}}' />
                        </div>
                        <div class="card-content">
                            <div class="card-title">
                                {{$amebience->name}}
                            </div>
                            {{$amebience->description}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection