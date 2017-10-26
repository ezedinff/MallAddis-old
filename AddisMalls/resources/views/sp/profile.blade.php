@extends('sp.layouts.app')
@section('content')
    <?php $mall  = \App\Mall::find(1); ?>
    <div class="row" ng-app="addsp">
        <div class="col l6 m6 s10 offset-l3 offset-m3 offset-s1" ng-controller="maincontroller">
           <form method="post" action="{{url('/sp/addDetails')}}">
               {{csrf_field()}}
               <p class="flow-text red-text">
                   please take a time and fill this details about your service.
               </p>
               <p>Fields marked with <i class="fa fa-asterisk" style="color: red;"></i> are mandatory.</p>
               <div class="card no-padding">
                   <div class="card-title blue lighten-1" style="padding: 2%; color: #fff;">
                       <% title %>
                   </div>
               </div>
               <div class="card" ng-show="first">
                   <div class="card-content" style="padding-bottom: 50px;">
                       <div class="row">
                           <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                               <input id="mallName" type="text" class="validate" name="spname">
                               <label for="mallName" data-error="wrong" data-success="right">Name of the service provider <i class="fa fa-asterisk" style="color: red;"></i></label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                               <input id="phone" type="text" class="validate" name="phone">
                               <label for="phone" data-error="wrong" data-success="right">phone number <i class="fa fa-asterisk" style="color: red;"></i></label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                               <input id="website" type="text" class="validate" name="website">
                               <label for="website" data-error="wrong" data-success="right">service provider's Website (if any)</label>
                           </div>
                       </div>
                       <div class="row">
                           <?php $categorys = \App\Category::orderBy('name', 'asc')->get(); ?>
                           <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                               <select name="category">
                                   <option value="" disabled selected>select category </option>
                                   @foreach($categorys as $category)
                                       <option value="{{$category->id}}">{{$category->name}}</option>
                                   @endforeach
                               </select>
                               <label>Category <i class="fa fa-asterisk" style="color: red;"></i></label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                               <input id="floor" type="text" class="validate" name="floor">
                               <label for="floor" data-error="wrong" data-success="right">floor number<i class="fa fa-asterisk" style="color: red;"></i> </label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                               <input id="floor" type="text" class="validate" name="bnumber">
                               <label for="floor" data-error="wrong" data-success="right">building number<i class="fa fa-asterisk" style="color: red;"></i> </label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                               <input id="descr" type="text" class="validate" name="description">
                               <label for="descr" data-error="wrong" data-success="right">Anything special about the mall</label>
                           </div>
                       </div>
                       <div class="btn blue lighten-1 white-text right" ng-click="toSecond()">
                           Next
                           &nbsp;
                           <i class="fa fa-arrow-circle-right"></i>
                       </div>
                   </div>
               </div>

               <!-- end of first card -->
               <div class="card" ng-show="second">
                   <div class="card-content" style="padding-bottom: 50px;">
                       <div class="row">
                           <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                               <i class="fa fa-user prefix"></i>
                               <input id="first_name" type="text" class="validate" name="first_name">
                               <label for="first_name" data-error="wrong" data-success="right">First Name <i class="fa fa-asterisk" style="color: red;"></i></label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                               <i class="fa fa-user prefix"></i>
                               <input id="lastname" type="text" class="validate" name="last_name">
                               <label for="lastname" data-error="wrong" data-success="right">Last Name <i class="fa fa-asterisk" style="color: red;"></i></label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                               <i class="fa fa-phone prefix"></i>
                               <input id="phoneu" type="text" class="validate" name="phoneu">
                               <label for="phoneu" data-error="wrong" data-success="right">phone number <i class="fa fa-asterisk" style="color: red;"></i></label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                               <i class="fa fa-lock prefix"></i>
                               <input id="passowrd" type="password" class="validate" name="password">
                               <label for="password" data-error="wrong" data-success="right">password <i class="fa fa-asterisk" style="color: red;"></i></label>
                           </div>
                       </div>
                       <div class="btn blue lighten-1 white-text left" ng-click="toFirst()">
                           <i class="fa fa-arrow-circle-left"></i>
                           &nbsp;
                           Back
                       </div>
                   </div>
               </div>

               <div class="row" ng-show="finalbutton">
                   <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                       <input value="Register" type="submit" class="btn-large waves-effect waves-light blue lighten-1 right" style="color: #fff; margin-right: 2%;">
                   </div>
               </div>
           </form>
        </div>
    </div>
@endsection

