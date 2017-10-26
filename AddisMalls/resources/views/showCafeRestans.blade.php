@extends('layouts.app')
@section('content')
    <div class="row" style="padding-top: 50px;">
        <div class="row">
            <div class="slider">
                <ul class="slides">
                    <li>
                        <img src="{{asset('img/eth.png')}}" style="background-size: cover;"> <!-- random image -->
                        <div class="caption center-align" style="padding-top: 100px;">
                            <h3 style="text-shadow: 0 0 3px #03a9f4, 0 0 5px #0000FF;">List of cafe & restaurants in MallAddis </h3>
                            <h5 style="text-shadow: 0 0 3px #03a9f4, 0 0 5px #0000FF;" class="light grey-text text-lighten-3"></h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container" style="padding-top: 50px;">
            @foreach($cafes as $cafe)
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image" style="text-align: center;">
                            <?php $cover = \App\Photo::where('company_id',$cafe->company_id)->get();
                                $slide = \App\Slide::where('company_id',$cafe->company_id)->get();
                            ?>
                                @if($cover->count() > 0)
                                    <?php $photo = $cover[0]->photo_path; ?>
                                    <a href='{{url("/show/cafe/{$cafe->id}")}}'><img src='{{asset("$photo")}}' style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7));"></a>
                                        <span class="card-title" style="text-shadow: 0 0 3px #03a9f4, 0 0 5px #0000FF; font-weight: 700;  text-transform: capitalize; top:35% ; height: 0%; text-align: center; min-width: 100%;">{{$cafe->name}}</span>
                                @elseif($slide->count() > 0)
                                    <?php $photo = $slide[0]->photo_path; ?>
                                    <a href='{{url("/show/cafe/{$cafe->id}")}}'><img src='{{asset("$photo")}}' style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7));"></a>
                                        <span class="card-title" style="text-shadow: 0 0 3px #03a9f4, 0 0 5px #0000FF; font-weight: 700;  text-transform: capitalize; top:35% ; height: 0%; text-align: center; min-width: 100%;">{{$cafe->name}}</span>
                                @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src='{{asset("js/jquery.min.js")}}'></script>
    <script src="{{asset("js/materialize.min.js")}}"></script>
    <script>
        $(document).ready(function () {
            $('.slider').slider({
                height: 500,
                indicators: false
            });
            $('.dropdown-button').dropdown({
                    inDuration: 300,
                    outDuration: 225,
                    constrainWidth: false, // Does not change width of dropdown to that of the activator
                    hover: true, // Activate on hover
                    gutter: 0, // Spacing from edge
                    belowOrigin: false, // Displays dropdown below the button
                    alignment: 'left', // Displays dropdown with edge aligned to the left of button
                    stopPropagation: false // Stops event propagation
                }
            );
            // alert("efa");

        });
    </script>
@endsection