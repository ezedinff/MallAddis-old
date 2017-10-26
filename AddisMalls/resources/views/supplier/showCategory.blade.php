@extends('supplier.layouts.support_app')
@section('content')
    <div class="row" style="padding-top: 50px;">
        <style>
            .signinButton:hover{
                color:#fff !important;
            }
        </style>
        <div class="col l10 m10 s12 offset-l1 offset-m1">
            <div>
                <span>Sort By:</span>
                <a href='{{url("/supplier/dashboard")}}' class="btn waves-effect waves-light blue white-text">ALL</a>
                @foreach($dailyCates as $dailyCate)
                    <?php $posted = \App\DailyDemand::where('brand_name_id',$dailyCate->id)->get(); ?>
                    @if($posted->count()>0)
                        <a href='{{url("/supplier/demand/{$dailyCate->id}")}}' class="btn waves-effect waves-light  blue-text signinButton">{{$dailyCate->name}}</a>
                    @endif
                @endforeach
            </div>
            <div class="card">
                <div class="card-title blue lighten-1 white-text" style="padding: 1%;">
                    <?php $da = \App\SubSupplierCategory::find($id);  ?>
                    <h5 style="display: inline;">Today's posted Daily demands by {{$da->name}} </h5>
                </div>
            </div>
            <?php $colors = ['teal','blue','orange','red'];
            $i = 0;
            ?>
            <?php $supplier = \App\Supplier::where('company_id',auth()->user()->company_id)->get(); ?>
            @foreach($dailyDetails as $dailyDetail)
                <div class="col l4 m4 s6">
                    <div class="card">
                        <div class="card-content {{$colors[$i]}} lighten-1">
                            <div>
                                <label style="color:#fff; font-size: 1.3em;">{{$dailyDetail->name}}</label><br>
                                <label style="color:#fff; font-size: 1.0em;">phone number:</label><label  style="color:#fff;">&nbsp; {{$dailyDetail->phone_no}}</label><br>
                                <label style="color:#fff;"><i class="fa fa-clock-o"></i>&nbsp;{{\Carbon\Carbon::createFromTimeStamp(strtotime($dailyDetail->created_at))->diffForHumans()}}</label>
                                <div>
                                    <p style="color:#fff;">Hi {{$supplier[0]->name}}, {{$dailyDetail->name}} needs <label  style="color:#fff; font-size: 1.1em;">{{$dailyDetail->quantity}} packs</label> of <label  style="color:#fff; font-size: 1.1em;">{{$dailyDetail->brand_name}}</label>. we are located inside <label style="color:#fff; font-size: 1.1em;">{{$dailyDetail->mall_name}}</label> floor number <label style="color:#fff; font-size: 1.1em;">{{$dailyDetail->floor_no}}</label> and building number <label style="color:#fff; font-size: 1.1em;">{{$dailyDetail->office_no}}</label></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++;  ?>
                @if($i  > 3)
                    <?php $i =0; ?>
                @endif



            @endforeach
        </div>
    </div>
@endsection