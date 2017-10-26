<?php

namespace App\Api\V1\Controllers;

use App\Address;
use App\Mall;
use App\Photo;
use App\Service_provider;
use App\User;
use Dingo\Api\Http\Request;
use JWTAuth;
class UsersController extends Controller
{
    //

    public function checkVerification(){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $company_id = $currentuser->company_id;

        if ($company_id[0]=='m'){
           if ($currentuser->permission_id=='1'){
             return response()->json(['role_type'=>'m','status'=>'ok']);
           }else{
               return response()->json(['role_type'=>'m','status'=>'waiting']);
           }
        }else if ($company_id[0]=='s'){
          return response()->json(['role_type'=>'s','status'=>'ok']);
        }else if ($company_id[0]=='p'){
            return response()->json(['role_type'=>'p','status'=>'ok']);
        }else if ($company_id[0]=='e'){
            return response()->json(['role_type'=>'se','status'=>'ok']);
        }
    }

    public function upload_mall_photo(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $file_name = time().'.'.$request->mall_photo->getClientOriginalExtension();
        Photo::create([
            'company_id'=>$currentuser->company_id,
            'photo_path'=>'uploads/'.$file_name
        ]);
        $request->mall_photo->move(public_path('uploads'), $file_name);

        return response()->json(['status'=>'ok','token'=>"ok"]);
    }

    public function checkMallPhotoAndAddress(){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $mall_photo_data= User::join('photos','users.company_id','=','photos.company_id')
            ->where('users.id',$currentuser->id)->get();

        $address_data= User::join('addresses','users.company_id','=','addresses.company_id')
            ->where('users.id',$currentuser->id)->get();

        foreach ($address_data as $value){
            $sub_city= $value->sub_city;
            if (count($mall_photo_data)<=0&&$sub_city==""){
                return response()->json(['status'=>'both','token'=>$currentuser->first_name]);
            }else if (count($mall_photo_data)<=0&&strlen($value->sub_city)>0){
                return response()->json(['status'=>'mall_photo','token'=>$currentuser->first_name]);
            }else if (count($mall_photo_data)>0&&strlen($value->sub_city)<=0){
                return response()->json(['status'=>'address','token'=>$currentuser->first_name]);
            }else{
                return response()->json(['status'=>'ok','token'=>$currentuser->first_name]);
            }
        }
    }

    public function add_address(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $user_data= User::find($currentuser->id);
        $address_data= Address::where('company_id',$user_data->company_id)->get();
        foreach ($address_data as $value){
            $address= Address::find($value->id);
            $address->sub_city=$request->sub_city;
            $address->save();
            return response()->json(['status'=>'ok','token'=>$currentuser->first_name]);
        }
    }

    public function users_detail(){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $data = User::join('malls','users.company_id','=','malls.company_id')
            ->join('photos','users.company_id','=','photos.company_id')
            ->where('users.id',$currentuser->id)
            ->select('users.first_name','users.last_name','malls.name as mall_name','photos.photo_path')->get();
        foreach ($data as $value){
            return response()->json(['first_name'=>$value->first_name,'last_name'=>$value->last_name,'mall_name'=>$value->mall_name,'photo_path'=>$value->photo_path]);
        }

    }

    public function mall_request(){
        $mall_request=User::join('malls','users.company_id','=','malls.company_id')
                           ->where('permission_id','<>','1')
                           ->select('users.first_name','users.last_name','malls.name as mall_name','users.company_id')->get();
        return response()->json($mall_request);
    }

    public function allow_request(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $allow= User::where('company_id',$request->company_id)->get();
        foreach ($allow as $value){
            $users = User::find($value->id);
            $users->permission_id='1';
            $users->save();
            return response()->json(['status'=>"ok",'token'=>'0']);
        }
    }

    public function mall_user_detail(){
        $currentuser= JWTAuth::parseToken()->authenticate();
        return response($currentuser);
    }
}
