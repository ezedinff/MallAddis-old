@extends('sp.layouts.support_app')
@section('content')
    <?php
    $sp = \App\Service_provider::where('company_id',auth()->user()->company_id)->get();
    $supplies   = \App\Supply::where('category_id',$sp[0]->category_id)->where('company_id','<>',auth()->user()->company_id)->orderBy('created_at','desc')->limit(5)->get();
    $demands = \App\Demand::where('category_id',$sp[0]->category_id)->where('company_id','<>',auth()->user()->company_id)->orderBy('created_at','desc')->get();
    ?>

    @if($supplies->count() > 0)
        <div class="row">
            <style>
                .sup:hover{
                    max-height: 500px !important;
                }
            </style>
            <div  style="position: relative; left: 5%; width: 90%; background-color: #f5f5f5; padding: 1%; margin-top: 1%;">
                <div class="card-title" style="padding: 1%;">
                    <h5 style="display: inline;">Recent posted supplies in your category</h5>
                    <a class="right" style="padding-top: 5px;" href="{{url('/sp/allSupplies')}}">
                        VIEW ALL
                    </a>
                </div>
            </div>

            <div style="padding-left: 10%;">
                <div class="row slider2" style="background-color: #f5f5f5;">
                    @foreach($supplies as $supply)
                        <div class="col l8 m8 s12 slide" >
                            <div class="card horizontal">
                                <div class="card-image">
                                    <?php $photo = $supply->product_photo; ?>
                                    <?php $sp = \App\Service_provider::where('company_id',$supply->company_id)->get();
                                    $phone = \App\Phone::where('company_id',$supply->company_id)->get();
                                    $mall = \App\Mall::find($sp[0]->mall_id);
                                    $address = \App\Address::where('company_id',$mall->company_id)->get();
                                    ?>
                                    <img src='{{asset("$photo")}}'>
                                </div>
                                <div class="col l6 m6 s6">
                                    <div class="card-content sup" style="max-height: 200px; overflow: hidden; text-overflow: ellipsis; padding-top: 0; margin-top: 0;  ">
                                        <p class="flow-text">
                                            {!! $supply->description !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="col l6 m6 s6">
                                    <div class="card-content sup" style="max-height: 200px; overflow: hidden; text-overflow: ellipsis; margin-top: 0;  ">
                                        <p  style="font-size: 1.2em; font-weight: 700;">price & quantity</p>
                                        <label style="font-size: 1.2em;">Unit price:</label>&nbsp;<span>{{$supply->price}}</span><br>
                                        <label style="font-size: 1.2em;">Quantity:</label>&nbsp;<span>{{$supply->quantity}}</span>&nbsp;<span>pieces</span><br>
                                        <p  style="font-size: 1.2em; font-weight: 700;">{{$sp[0]->name}}</p>
                                        <p  style="font-size: 1.2em; font-weight: 700;">Address:</p>
                                        <label style="font-size: 1.2em;">Phone:</label>&nbsp;<span>{{$phone[0]->phone_no}}</span><br>
                                        <label style="font-size: 1.2em;">Mall:</label>&nbsp;<span>{{$mall->name}}</span><br>
                                        <span>{{$address[0]->city}}</span>
                                        <span>{{$address[0]->country}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    @else
        <div class="row" style="padding-top: 100px;">
            <style>
                .sup:hover{
                    max-height: 500px !important;
                }
            </style>
            <div  style="position: relative; left: 5%; width: 90%; background-color: #f5f5f5; padding: 1%; margin-top: 1%;">
                <div class="card-title" style="padding: 1%;">
                    <h5 style="display: inline;"> there is no supplies and demands posted</h5>

                </div>
            </div>
        </div>
    @endif

    @if($demands->count() > 0)
        <div class="row">
            <style>
                .sup:hover{
                    max-height: 500px !important;
                }
            </style>
            <div  style="position: relative; left: 5%; width: 90%; background-color: #f5f5f5; padding: 1%; margin-top: 1%;">
                <div class="card-title" style="padding: 1%;">
                    <h5 style="display: inline;">Recent posted demands in your category</h5>
                    <a class="right" style="padding-top: 5px;" href="{{url('/sp/allDemands')}}">
                        VIEW ALL
                    </a>
                </div>
            </div>
            <div style="padding-left: 10%;">
                <div class="row slider2" style="background-color: #f5f5f5;">
                    @foreach($demands as $supply)
                        <div class="col l8 m8 s12 slide" >
                            <div class="card horizontal">
                                <div class="card-image">
                                    <?php $photo = $supply->product_photo; ?>
                                    <?php $sp = \App\Service_provider::where('company_id',$supply->company_id)->get();
                                    $phone = \App\Phone::where('company_id',$supply->company_id)->get();
                                    $mall = \App\Mall::find($sp[0]->mall_id);
                                    $address = \App\Address::where('company_id',$mall->company_id)->get();
                                    ?>
                                    <img src='{{asset("$photo")}}'>
                                </div>
                                <div class="col l6 m6 s6">
                                    <div class="card-content sup" style="max-height: 200px; overflow: hidden; text-overflow: ellipsis; padding-top: 0; margin-top: 0;  ">
                                        <p class="flow-text">
                                            {!! $supply->description !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="col l6 m6 s6">
                                    <div class="card-content sup" style="max-height: 200px; overflow: hidden; text-overflow: ellipsis; margin-top: 0;  ">
                                        <p  style="font-size: 1.2em; font-weight: 700;">price & quantity</p>
                                        <label style="font-size: 1.2em;">Unit price:</label>&nbsp;<span>{{$supply->price}}</span><br>
                                        <label style="font-size: 1.2em;">Quantity:</label>&nbsp;<span>{{$supply->quantity}}</span><br>
                                        <p  style="font-size: 1.2em; font-weight: 700;">{{$sp[0]->name}}</p>
                                        <p  style="font-size: 1.2em; font-weight: 700;">Address:</p>
                                        <label style="font-size: 1.2em;">Phone:</label>&nbsp;<span>{{$phone[0]->phone_no}}</span><br>
                                        <label style="font-size: 1.2em;">Mall:</label>&nbsp;<span>{{$mall->name}}</span><br>
                                        <span>{{$address[0]->city}}</span>
                                        <span>{{$address[0]->country}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

@endsection