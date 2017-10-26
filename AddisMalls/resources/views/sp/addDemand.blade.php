@extends('sp.layouts.support_app')
@section('content')
    <?php $demands = \App\Demand::where('company_id',auth()->user()->company_id)->get(); ?>
    @if($demands->count() <= 4)
                <div class="card">
                    @if(\Illuminate\Support\Facades\Session::get('demand'))
                        <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                            {{\Illuminate\Support\Facades\Session::get('demand')}}
                        </div>
                    @else
                        <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                            Add your Demand
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-content">
                        <form method="post" action="{{url('/sp/addDemand')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row" style="max-height: 50px !important;">
                                <div class="input-field" style="padding: 0; margin: 0; max-height: 50px;">
                                    <input id="passowrd" type="text" class="validate" name="title">
                                    <label for="password" data-error="wrong" data-success="right">product name</label>
                                </div>
                            </div>
                            <div class="row" style="max-height: 50px !important;">
                                <div class="input-field" style="padding: 0; margin: 0; max-height: 50px;">
                                    <input id="passowrd" type="text" class="validate" name="description">
                                    <label for="password" data-error="wrong" data-success="right">product description</label>
                                </div>
                            </div>
                            <div class="row" style="max-height: 50px !important;">
                                <div class="input-field" style="padding: 0; margin: 0; max-height: 50px;">
                                    <input id="passowrd" type="text" class="validate" name="quantity">
                                    <label for="password" data-error="wrong" data-success="right">product quantity</label>
                                </div>
                            </div>
                            <div class="row" style="max-height: 50px !important;">
                                <div class="input-field" style="padding: 0; margin: 0; max-height: 50px;">
                                    <input id="passowrd" type="text" class="validate" name="price">
                                    <label for="password" data-error="wrong" data-success="right">unit price</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="file-field input-field">
                                    <div class="btn blue lighten-1">
                                        <span class="white-text">File</span>
                                        <input type="file" name="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="product picture">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                    <input value="Save" type="submit" class="btn waves-effect waves-light blue lighten-1 right" style="color: #fff; margin-right: 2%;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    @else
                <div class="card">
                    <div class="card-title red lighten-1 white-text" style="padding: 2%;">
                        you have reached maximum number of demand.
                    </div>
                </div>
        <!--  -->
    @endif
@endsection