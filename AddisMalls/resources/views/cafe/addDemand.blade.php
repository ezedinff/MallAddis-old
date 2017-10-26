@extends('cafe.layouts.support_app')
@section('content')
            <div class="card">
                @if(\Illuminate\Support\Facades\Session::get('daily'))
                    <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                        {{\Illuminate\Support\Facades\Session::get('daily')}}
                    </div>
                @else
                    <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                       post your demand
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col l6 m6 s12">
                            <img src="" id="img" width="200" height="400">
                            <p>
                                <label class="flow-text">PACK SIZE: </label> <span id="pack" class="flow-text"></span>
                            </p>
                            <p id="des"></p>
                        </div>

                        <div class="col l6 m6 s12" style="padding-top: 50px;">
                         <form method="post" action="{{url('/cafe/addDemand')}}">
                             {{csrf_field()}}
                             <div class="row">
                                 <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                     <select id="brand" name="supcate" required>
                                         <option value="" disabled selected>select supplier category</option>
                                         <?php $spcates  = \App\SubSupplierCategory::all(); ?>
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
                                     <input id="first_name" type="number" class="validate" name="quantity" required>
                                     <label for="first_name" data-error="wrong" data-success="right">quantity in pack <i class="fa fa-asterisk" style="color: red;"></i></label>
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
    <script>
        $(document).ready(function () {
            $("#brand").on('change',function (data) {
                var id =  $("#brand").val();
                $.ajax(
                    {
                        type:'get',
                        url:"{{url('/cafe/brandDetail')}}",
                        data:{'id':id},
                        success:function (data) {
                            var photo = data[0]['photo_path'];
                            document.getElementById("img").src = '/'+photo;
                            $("#pack").html(data[0]['name']);
                            $("#des").html(data[0]['description']);
                            console.log(data);
                        }
                    }
                );
            });
            //
        });
    </script>
@endsection