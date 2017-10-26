<?php

namespace App\Api\V1\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use JWTAuth;

class PhotoController extends Controller
{
    //

    public function checkMallPhoto(){
        $currentuser= JWTAuth::parseToken()->authenticate();

       $mall_photo=Photo::where('company_id',$currentuser->company_id)->get();
       if (count($mall_photo)>0){
           return response()->json(['status'=>'added','token'=>'ok']);
       }else{
           return response()->json(['status'=>'not','token'=>'not ok']);
       }

    }
}
