@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="row">
            <div class="slider">
                <ul class="slides">
                    <li>
                        <img src="{{asset('img/eth.png')}}" style="background-size: cover;"> <!-- random image -->
                        <div class="caption center-align" style="padding-top: 100px;">
                            <h3 style="text-shadow: 0 0 3px #03a9f4, 0 0 5px #0000FF;">Job's detail</h3>
                            <h5 style="text-shadow: 0 0 3px #03a9f4, 0 0 5px #0000FF;" class="light grey-text text-lighten-3"></h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="col l8 m8 s12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">
                                {{$job->job_title}}
                            </div>
                            <?php $category = \App\JobCategory::where('id',$job->id)->get(); ?>
                            <p><label>Category:</label>&nbsp;{{$category[0]->name}}</p>
                            <p><label>Salary:</label>&nbsp;{{$job->salary}}</p>
                            <p><label>Employment Type:</label>&nbsp;{{$job->employment_type}}</p>
                            <p><label>Education level:</label>&nbsp;{{$job->qualifications}}</p>
                            <p><label>Years of Experience:</label>&nbsp;{{$job->years_exp}}</p>
                            <p><label>DeadLine:</label>&nbsp;{{$job->deadline}}</p>
                            <div class="card-title">
                                How to apply
                            </div>
                            <p>{{$job->description}}</p>
                            <div class="card-title">
                                contact detail about the company
                                <?php $phone = \App\Phone::where('company_id',$job->company_id)->get();
                                ?>
                            </div>
                            <p>
                            <p><label>phone number:</label> {{$phone[0]->phone_no}}</p>
                            @if($job->company_id[0] == "m")
                                <?php $company = \App\Mall::where('company_id',$job->company_id )->get(); ?>
                                <p><label>company name: </label> {{$company[0]->name}}</p>
                            @elseif($job->company_id[0] == "s")
                                <?php $company = \App\Service_provider::where('company_id',$job->company_id )->get();
                                    $mall = \App\Mall::find($company[0]->mall_id);
                                ?>
                                <p><label>company name: </label> {{$company[0]->name}}</p>
                                <p>Address:</p>
                                    <p><label>Mall name: </label> {{$mall->name}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col l4 m4 s12">
                    <div class="card">
                        <div class="card-content">
                            <p style="color: #212121;">List jobs in Mall addis</p>
                            <ul class="collection">
                                <?php  $jobs = \App\Vacancy::where('id', '<>' , '0')->orderBy('id','desc')->limit(10)->get(); ?>
                                    @foreach($jobs as $job)
                                        <li class="collection-item">
                                            <p><a href='{{url("/show/job/{$job->id}")}}'>{{$job->job_title}}</a></p>
                                        </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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