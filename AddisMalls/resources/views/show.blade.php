@extends('layouts.app')
@section('content')
    @include('showNavBar')
    <div class="row">
        <div class="row" >
            <div class="col l3 m3 s12">
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
            <div class="col l9 m9 s12">
                <div class="card" >
                    <div id="map" class="card-content" style="height: 350px; overflow: hidden; text-overflow: ellipsis;">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col l3 m3 s12">
                <div class="card" >
                    <?php
                    $phone = \App\Phone::where('company_id',$mall->company_id)->get();
                    $address = \App\Address::where('company_id',$mall->company_id)->get();
                    $amenities = \App\Amenity::where('company_id',$mall->company_id)->get();
                    ?>
                    <div class="card-content">
                        Phone number : {{$phone[0]->phone_no}} <br>
                        website : {{$address[0]->website}} <br>
                        Addis Ababa <br>
                        Ethiopia <br>
                    </div>
                </div>
            </div>

            <div class="col l8 m8 s12" >
                <div >
                    @if($amenities->count() >0)
                        <div class="card-title header">
                            <h4>Amenities</h4>
                        </div>
                        <div class="card-content no-padding">
                            <ul class="collapsible popout" data-collapsible="accordion">
                                @foreach($amenities as $amenity)
                                    <li>
                                        <div class="collapsible-header" style="color: #212121 !important;">{{$amenity->name}}</div>
                                        <div class="collapsible-body">
                                            <span style="color: #212121 !important;">
                                                {{$amenity->description}}
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_n7J4QTEgv89AWttZDKYf7ALt41MLYrQ&callback=initMap">
    </script>
    <script>
        function initMap() {
            var lat = {{$mall->lat}};
            var lon = {{$mall->lon}};
            var uluru = {lat: lat, lng:  lon};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
@endsection