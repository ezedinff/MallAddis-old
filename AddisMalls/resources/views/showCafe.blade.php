@extends('layouts.app')
@section('content')
    <div class="row">
        @include('showCafeNavBar')
    </div>
    <div class="row">
        <div class="row" >
            <div class="col l3 m3 s12">
                <?php $mall  = \App\Service_provider::find($retailers->id); ?>
                <div class="card" >
                    <div class="card-content blue lighten-1" style="height: 240px; overflow: hidden; text-overflow: ellipsis;">
                        <div class="card-title white-text">
                            About {{$mall->name}}
                        </div>
                        <p class="white-text" style="padding-bottom: 20px;">{{$mall->description}}</p>
                    </div>
                    <div class="card-action blue lighten-1" style="padding-bottom: 50px;">
                        <a class="white-text right">See more</a>
                    </div>
                </div>
            </div>
            <div class="col l9 m9 s12" >
                <div class="card" >
                    <div id="map" class="card-content" style="height: 350px; overflow: hidden; text-overflow: ellipsis;">

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col l3 m3 s12" >
                <div class="card" >
                    <div class="card-content">
                        Phone number : +251-11-6-623040 <br>
                        Email : info@snapeth.com <br>
                        Location : Africa venue street , <br>
                        Addis Ababa <br>
                        Ethiopia <br>
                    </div>
                </div>
            </div>
            <div class="col l3 m3 s12" style="width: auto; padding-left: 2%;">
                <h4 style="text-transform: uppercase;">Menu</h4>
                <hr>
                <div class="card">
                    <?php $menu  = \App\Menu::where('company_id',$retailers->company_id)->get();
                    $menupic = $menu[0]->photo_path;
                    ?>
                    @if($menu->count() > 0)
                        <div class="card-image">
                            <img src='{{asset("$menupic")}}' style="width: auto; max-height: 300px;"/>
                            <div class="card-title"  style="padding-top: 8px; padding-bottom: 8px; width: 100%;  background-color: #212121; color: #fff; opacity: 0.7;  text-align: center;">
                                {{$menu->count()}} pages
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col l3 m3 s12" >
                <div class="card">
                    <div class="card-title blue lighten-1 white-text center-align" style="padding: 2%;">
                        <p>OPENING HOURS</p>
                        7am - 9pm
                    </div>
                </div>
            </div>

            <div class="col l4 m4 s12" style="overflow: hidden;">
                <h4 style="text-transform: uppercase;">Special served dishes</h4>
                <hr>
                <div class="card">
                    <?php $dish  = \App\Dish::where('company_id',$retailers->company_id)->get();
                    $dishpic = $dish[0]->photo_path;
                    ?>
                    @if($dish->count() > 0)
                        <div class="card-image">
                            <img src='{{asset("$dishpic")}}' style="width: auto; max-height: 300px;"/>
                            <div class="card-title center-align"  style="padding-top: 8px; padding-bottom: 8px; width: 100%;  background-color: #212121; color: #fff; opacity: 0.7;  text-align: center;">
                                {{$dish->count()}} dishes
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection