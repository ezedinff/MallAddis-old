@extends('layouts.app')
@section('content')
    @include('showSpNav')
    <div class="row">
        <?php $posts  = \App\Post_ads::where('company_id',$retailers->company_id)->get(); ?>
        @foreach($posts as $post)
            <div class="col l3 m3 s6" style="min-width: 24%; padding-left: 2%;">
                <div class="card" >
                    <?php $photo_path = $post->product_photo; ?>
                    <div class="card-image" style="max-height: 200px;">
                        <img src='{{asset("$photo_path")}}' style="max-height: 200px;"/>
                        <p class="btn-floating btn-large waves-effect waves-light red" style="position: absolute; top:10px; left: 20px;">{{$post->price}} ETB</p>
                    </div>
                    <div class="card-content">
                        <div class="bold-text" style="font-size: 1.2em;">{{$post->caption}}</div>
                        <p>{{$post->description}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection