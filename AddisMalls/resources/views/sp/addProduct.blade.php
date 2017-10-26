@extends('sp.layouts.support_app')
@section('content')
    <?php $products = \App\Post_ads::where('company_id',auth()->user()->company_id)->get(); ?>
    @if($products->count() <= 4)
                <div class="card">
                    @if(\Illuminate\Support\Facades\Session::get('posted'))
                        <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                            {{\Illuminate\Support\Facades\Session::get('posted')}}
                        </div>
                    @else
                        <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                            Post product for advertisement purpose
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-content">
                        <form method="post" action="{{url('/sp/addProducts')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="file-field input-field">
                                    <div class="btn blue lighten-1">
                                        <span class="white-text">File</span>
                                        <input type="file" name="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="photo of product">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                    <input id="cap" type="text" class="validate" name="caption">
                                    <label for="cap" data-error="wrong" data-success="right">photo caption</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                    <input id="descr" type="text" class="validate" name="description">
                                    <label for="descr" data-error="wrong" data-success="right">Description of the product</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                    <input id="price" type="text" class="validate" name="price">
                                    <label for="price" data-error="wrong" data-success="right">Price of the product</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                    <input value="Post" type="submit" class="btn waves-effect waves-light blue lighten-1 right" style="color: #fff; margin-right: 2%;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    @else
                <div class="card">
                    <div class="card-title red lighten-1 white-text" style="padding: 2%;">
                        you have reached maximum number of post.
                    </div>
                </div>
        <!--  -->
    @endif
@endsection