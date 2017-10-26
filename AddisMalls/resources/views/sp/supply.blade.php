@extends('sp.layouts.support_app')
@section('content')
        <style>
            .sup:hover{
                max-height: 500px !important;
            }
        </style>
            @foreach($posts as $post)
                <div class="col l3 m3 s6" >
                    <div class="card">
                        <div class="card-image">
                            <?php $photo = $post->product_photo; ?>
                            <img src='{{asset("$photo")}}'>
                        </div>
                        <div class="card-content sup" style="max-height: 200px; overflow: hidden; text-overflow: ellipsis;  ">
                            <p class="flow-text">
                                {!! $post->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
@endsection