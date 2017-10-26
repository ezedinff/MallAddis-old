@extends('admin.layouts.support_app')
@section('content')
    <div class="row">
        <div class="col m8 s12 l8" style="position: relative; left: 15%;">
            <div class="card">
                @if(\Illuminate\Support\Facades\Session::get('subsupcat'))
                    <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                        {{\Illuminate\Support\Facades\Session::get('subsupcat')}}
                    </div>
                @else
                    <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                        Add new supplier sub category.
                    </div>
                @endif

            </div>
            <div class="card">
                <div class="card-content">
                    <form method="post" action="{{url('/admin/addSubSupplierCategory')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <select name="supcate" required>
                                    <option value="" disabled selected>select supplier category</option>
                                    <?php $spcates  = \App\Supplier_cate::all(); ?>
                                    @if($spcates->count() > 0)
                                        @foreach($spcates as $spcate)
                                            <option value='{{$spcate->id}}'>{{$spcate->name}}</option>
                                        @endforeach
                                    @else
                                        <p class="red-text">Add supplier category first</p>
                                    @endif
                                </select>
                                <label>Supplier category. <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <select name="sup_id" required>
                                    <option value="" disabled selected>select supplier</option>
                                    <?php $sps  = \App\Supplier::all(); ?>
                                    @if($sps->count() > 0)
                                        @foreach($sps as $sp)
                                            <option value='{{$sp->id}}'>{{$sp->name}}</option>
                                        @endforeach
                                    @else
                                        <p class="red-text">Add supplier category first</p>
                                    @endif
                                </select>
                                <label>select supplier. <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <select name="type" required>
                                    <option value="" disabled selected>select type</option>
                                    <?php $types  = \App\Type::all(); ?>
                                    @if($types->count() > 0)
                                        @foreach($types as $type)
                                            <option value='{{$type->id}}'>{{$type->name}}</option>
                                        @endforeach
                                    @else
                                        <p class="red-text">Add supplier category first</p>
                                    @endif
                                </select>
                                <label>select type <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <select name="pack_size" required>
                                    <option value="" disabled selected>select pack size</option>
                                    <?php $packs  = \App\PackSize::all(); ?>
                                    @if($packs->count() > 0)
                                        @foreach($packs as $pack)
                                            <option value='{{$pack->id}}'>{{$pack->name}}</option>
                                        @endforeach
                                    @else
                                        <p class="red-text">Add supplier category first</p>
                                    @endif
                                </select>
                                <label>select pack size. <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input id="first_name" type="text" class="validate" name="name" required>
                                <label for="first_name" data-error="wrong" data-success="right">name of the sub category <i class="fa fa-asterisk" style="color: red;"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input id="first_name" type="text" class="validate" name="description" required>
                                <label for="first_name" data-error="wrong" data-success="right">name of the sub category <i class="fa fa-asterisk" style="color: red;"></i></label>
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
        </div>
    </div>
@endsection