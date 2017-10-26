<html class="mdc-typography">
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/materialize.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("css/font-awesome.min.css")}}">
</head>
<style>
    #nav{
        background-color: transparent !important;
    }
    #navMenus>a{
        color: white;
        font-size: 1.2em;
    }
</style>
<body>

<header style="position: fixed; top: 0; z-index: 9999999999999; width: 100%;">
    @include('layouts.header')
</header>
<main>
    <div class="row">
        <div class="row">
              <div class="slider">
                    <ul class="slides">
                        <li>
                            <img src="{{asset('img/slider/y.jpg')}}"> <!-- random image -->
                            <div class="caption center-align" style="padding-top: 100px;">
                                <h3 style="text-shadow: 0 0 3px #03a9f4, 0 0 5px #0000FF;">MALL'S & SHOPPING CENTERS</h3>
                                <h5 style="text-shadow: 0 0 3px #03a9f4, 0 0 5px #0000FF;" class="light grey-text text-lighten-3">Get the best Brands and Retailers as Tenants.</h5>
                                <br>
                                <br>
                                <div class="row center">
                                    <a href="{{url('/register')}}" id="download-button" class="btn-large waves-effect waves-light blue lighten-1">Get Started</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
        </div>
        <div class="container">
            <div class="row">
                    <div class="sec-title text-center">
                        <h2 class="wow animated bounceInLeft he">Service</h2>
                        <p class="wow animated bounceInRight pa">The Key Features of our Job</p>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="card">
                            <div class="card-image" style="text-align: center;">
                                <img src="{{asset('img/s1.png')}}" style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7));">
                                <span class="card-title" style="text-shadow: 1px 1px 1px #000; font-weight: 700; text-transform: capitalize;">Mall Advertising & Marketing opportunities</span>
                            </div>
                            <div class="card-action" style="text-align: center;">
                                <a class="btn waves-light green lighten-1" style="margin: 0 auto; ">GET Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="card">
                            <div class="card-image" style="text-align: center;">
                                <img src="{{asset('img/s3.png')}}" style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7));">
                                <span class="card-title" style="text-shadow: 1px 1px 1px #000; font-weight: 700; text-transform: capitalize; font-size: 1.2em;">
                            In a mall, center, or office, the perfect retail real estate partnership awaits.</span>
                            </div>
                            <div class="card-action" style="text-align: center;">
                                <a class="btn waves-light orange lighten-1" style="margin: 0 auto;">Find space</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="card">
                            <div class="card-image" style="text-align: center;">
                                <img src="{{asset('img/s2.png')}}" style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7));">
                                <span class="card-title" style="text-shadow: 1px 1px 1px #000; font-weight: 700; text-transform: capitalize;">Get connected with malls with your mobile</span>
                            </div>
                            <div class="card-action"  style="text-align: center;">
                                <a class="btn waves-light red lighten-1" style="margin: 0 auto; "><i class="fa fa-download" style="color: #fff"></i>&nbsp;Download</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="sec-title text-center">
                    <h2 class="wow animated bounceInLeft he">featured malls</h2>
                    <p class="wow animated bounceInRight pa">malls made a special attraction.</p>
                </div>
                <?php $malls = \App\Mall::where('id','<>','0')->limit(3)->get(); ?>
                @foreach($malls as $mall)
                    <?php
                    $cover = \App\Photo::where('company_id',$mall->company_id)->get();
                    $slide = \App\Slide::where('company_id',$mall->company_id)->get();
                    ?>
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image item" style="text-align: center;">
                                @if($cover->count()>0)
                                    <?php $photo = $cover[0]->photo_path; ?>
                                    <a href='{{url("/show/mall/{$mall->id}")}}'><img src='{{asset("$photo")}}' style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7)); height: 300px;"></a>
                                @elseif($slide->count()>0)
                                    <?php $photo = $slide[0]->photo_path; ?>
                                    <a href='{{url("/show/mall/{$mall->id}")}}'><img src='{{asset("$photo")}}' style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7)); height: 300px;"></a>
                                @endif
                                <span class="card-title" style="text-shadow: 1px 1px 1px #000; font-weight: 700;  text-transform: capitalize; top:35% ; height: 0%; text-align: center; min-width: 100%;">{{$mall->name}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <?php $cafes = \App\Service_provider::where('category_id',1)->limit(3)->get(); ?>
        @if($cafes->count() > 0)
            <div class="row">
                <div class="container">
                    <div class="sec-title text-center">
                        <h2 class="wow animated bounceInLeft he">featured cafe & restaurants </h2>
                        <p class="wow animated bounceInRight pa">cafe & restaurants made a special attraction.</p>
                    </div>
                    @foreach($cafes as $cafe)
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image item" style="text-align: center;">
                                    <?php
                                    $cover = \App\Photo::where('company_id',$cafe->company_id)->get();
                                    $slide = \App\Slide::where('company_id',$cafe->company_id)->get();
                                    $mall = \App\Mall::find($cafe->mall_id);
                                    $id = $mall->id .' '.$cafe->id;
                                    ?>
                                    @if($cover->count()>0)
                                        <?php $photo = $cover[0]->photo_path; ?>
                                        <a href='{{url("/show/cafe/{$cafe->id}")}}'><img src='{{asset("$photo")}}' style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7));  height: 200px;"></a>
                                    @elseif($slide->count()>0)
                                        <?php $photo = $slide[0]->photo_path; ?>
                                        <a href='{{url("/show/cafe/{$cafe->id}")}}'><img src='{{asset("$photo")}}' style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7)); height: 285px;"></a>
                                    @endif

                                    <span class="card-title" style="text-shadow: 1px 1px 1px #000; font-weight: 700;  text-transform: capitalize; top:35% ; height: 0%; text-align: center; min-width: 100%;">{{$cafe->name}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <?php
            $jobs = \App\Vacancy::join('service_providers','service_providers.company_id','=','vacancies.company_id')
                                ->join('malls','malls.id','=','service_providers.mall_id')
                                ->orderBy('vacancies.created_at','desc')
                                ->select(['malls.name','malls.id'])
                                ->limit(5)
                                ->get();
        ?>
        <div class="row">
            <div class="container">
                <div class="sec-title text-center">
                    <h2 class="wow animated bounceInLeft he">AddisMalls Community Posts</h2>
                    <p class="wow animated bounceInRight pa">keep in touch with community.</p>
                </div>
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card">
                            <div class="card-title teal lighten-1" style="padding: 3%; color: #fff;"><span>Recent Job Posts</span> <a style="color: #fff; float: right; font-size: 0.8em; padding-top: 5px;" href="{{url('/show/jobs')}}">View All</a></div>
                        </div>
                        <div class="card">
                            @if($jobs->count() > 0)
                                @foreach($jobs as $job)
                                    <div class="card-content">
                                        <span>Vacancy Available <a style="float: right;" href='{{url("/show/jobs/{$job->id}")}}'>view/apply</a></span><br>
                                        <p><a href='{{url("/show/jobs/{$job->id}")}}'>{{$job->name}}</a></p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="card">
                            <div class="card-title orange lighten-1" style="padding: 3%; color: #fff;"><span>Top 5 Malls</span></div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <ul class="mdc-list" style="padding-right: 0;">
                                    <li class="mdc-list-item" style="width: 100%;">
                                        <div class="row">
                                            <span class="col l7 m7 s12" style="padding-left: 0;">SNAP plaza</span>
                                            <span class="col l5 m5 s" >
                                            <a href="#" class="material-icons">favorite</a>
                                            <a href="#" class="material-icons">favorite</a>
                                            <a href="#" class="material-icons">favorite</a>
                                            <a href="#" class="material-icons">favorite</a>
                                            <a href="#" class="material-icons">favorite</a>
                                         </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="sec-title text-center">
                    <h2 class="wow animated bounceInLeft he">AddisMalls Shopping Blogs</h2>
                    <p class="wow animated bounceInRight pa">Get a peak at what's hip & happening in the retail space.</p>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.footer')
<script src='{{asset("js/jquery.min.js")}}'></script>
<script src="{{asset("js/materialize.min.js")}}"></script>
<script>
    (function($){
        $(function(){

            $('.button-collapse').sideNav();
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
            $('.slider').slider({
                height:680,
                indicators: false
            });

            $(document).scroll(function () {
                var $nav = $(".nav-wrapper");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            });

        }); // end of document ready
    })(jQuery);
</script>
</body>
</html>