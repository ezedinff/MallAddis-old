@extends('sp.layouts.support_app')
@section('content')
    <div class="row">
        <style>
            .sup:hover{
                max-height: 500px !important;
            }
        </style>
        <div class="col m12 s12 l12" style="position: relative; left: 5%;">
            @foreach($posts as $post)
                <div class="col l3 m3 s6" >
                    <div class="card">
                        <div class="card-image">
                            <?php $photo = $post->product_photo; ?>
                            <img src='{{asset("$photo")}}'>
                        </div>
                        <div class="card-content sup" style="min-height: 0; max-height: 200px; overflow: hidden; text-overflow: ellipsis;  ">
                            <p class="flow-text">
                                {!! $post->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection