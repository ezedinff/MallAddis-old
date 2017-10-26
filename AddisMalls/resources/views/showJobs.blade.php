@extends('layouts.app')
@section('content')
    <div class="row" style="padding-top: 50px;">
        <div class="row">
            <div class="slider">
                <ul class="slides">
                    <li>
                        <img src="{{asset('img/eth.png')}}" style="background-size: cover;"> <!-- random image -->
                        <div class="caption center-align" style="padding-top: 100px;">
                            <h3 style="text-shadow: 0 0 3px #03a9f4, 0 0 5px #0000FF;">List of posted Jobs in MallAddis </h3>
                            <h5 style="text-shadow: 0 0 3px #03a9f4, 0 0 5px #0000FF;" class="light grey-text text-lighten-3"></h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container">
            @foreach($jobs as $job)
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">
                                {{$job->job_title}}
                            </div>
                            <?php $category = \App\JobCategory::where('id',$job->id)->get(); ?>
                            <p><label>Category:</label>&nbsp;{{$category[0]->name}}</p>
                            <p><label>Salary:</label>&nbsp;{{$job->salary}}</p>
                            <p><label>Employment Type:</label>&nbsp;{{$job->salary}}</p>
                            <p><label>Education level:</label>&nbsp;{{$job->qualifications}}</p>
                            <p><label>Years of Experience:</label>&nbsp;{{$job->years_exp}}</p>
                            <p><label>DeadLine:</label>&nbsp;{{$job->deadline}}</p>
                        </div>
                        <div class="card-action center-align">
                            <a href='{{url("/show/job/{$job->id}")}}'>SEE MORE</a>
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
            // a
            // lert("efa");

        });
    </script>
@endsection