<div class="slider">
    <ul class="slides">
        <?php $company_id = $retailers->company_id;
        $identify = "";
        if ($company_id[0] == "m"){
            $identify = "m";
        }
        $slides = \App\Slide::where('company_id', $company_id)->get();
        ?>
        @if($slides->count() > 0)
            @foreach($slides as $slide)
                <?php $image  = $slide->photo_path; ?>
                <li>
                    <img src='{{asset("$image")}}' class="center center-align" style=" object-fit: contain; height: 100%; width: 100%; background-size: cover;    -webkit-background-size: cover;
    -moz-background-size: cover;  -o-background-size: cover; background-position: center bottom;"> <!-- random image -->
                    <div class="caption center-align">
                        <h3 style="text-shadow: 1px 1px 1px #000;">{{$slide->caption1}}</h3>
                        <h5 class="light grey-text text-lighten-3" style="text-shadow: 1px 1px 1px #000;">{{$slide->caption2}}</h5>
                    </div>
                </li>
            @endforeach
        @else
            <li class="blue lighten-1">
                <img src='{{asset("")}}' class="center center-align" style=" object-fit: contain; height: 100%; width: 100%; background-size: cover;    -webkit-background-size: cover;
    -moz-background-size: cover;  -o-background-size: cover; background-position: center bottom; "> <!-- random image -->
                <div class="caption center-align">
                    <h3 class="white-text" style="text-shadow: 1px 1px 1px #000;">{{$retailers->name}}</h3>
                </div>
            </li>
        @endif
    </ul>
</div>
<nav class="blue lighten-1" style="position: relative; top: -40px; padding-left: 2%; padding-right: 2%;">
    <?php $logo  = \App\Logo::where('company_id',$retailers->company_id)->get(); ?>
    <div class="nav-wrapper">
        <a href='{{url("/show/cafe/{$retailers->id}")}}' class="brand-logo white-text">
            @if($logo->count()>0)
                <?php $logoPic =  $logo[0]->logo_path; ?>
                <img src='{{asset("$logoPic")}}' height="64">
            @else
                <span>{{$retailers->name}}</span>
            @endif
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 10%;">
            <li><a href='{{url("/show/cafe/{$retailers->id}")}}' class="white-text active">HOME</a></li>
            <li><a href='{{url("/show/cafe/menu/{$retailers->id}")}}' class="white-text">MENU</a></li>
            <li><a href='{{url("/show/cafe/dish/{$retailers->id}")}}' class="white-text">DISHES</a></li>
            <li><a href='{{url("/show/cafe/ambience/{$retailers->id}")}}' class="white-text">AMBIENCE'S</a></li>
            <li><a href='#' class="white-text">BOOK A TABLE</a></li>
            <li><a href="#" class="white-text">NEWS & EVENTS</a></li>
        </ul>
    </div>
</nav>