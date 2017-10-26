@extends('sp.layouts.support_app')
@section('content')
            @foreach($posts as $post)
                <div class="col l3 m3 s6" >
                    <div class="card">
                        <div class="card-image">
                            <?php $photo = $post->product_photo; ?>
                            <img src='{{asset("$photo")}}'>
                        </div>
                        <div class="card-content">
                           <div class="card-title">
                               {{$post->caption}}
                           </div>
                           <p>
                               {{$post->description}}
                           </p>
                        </div>
                    </div>
                </div>
            @endforeach
@endsection