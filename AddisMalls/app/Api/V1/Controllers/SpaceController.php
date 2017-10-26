<?php

namespace App\Api\V1\Controllers;



use App\Space;
use Dingo\Api\Http\Request;
use JWTAuth;

class SpaceController extends Controller
{
    //

    public function post_lease_space(Request $request){

        $currentuser= JWTAuth::parseToken()->authenticate();
        $file_name = time().'.'.$request->photo_path->getClientOriginalExtension();

        Space::create([
            'company_id'=>$currentuser->company_id,
            'description'=>$request->description,
            'photo_path'=>'uploads/'.$file_name
        ]);
        $request->photo_path->move(public_path('uploads'), $file_name);
   return response()->json(['status'=>'ok','token'=>'ok']);
    }

    public function get_lease_space(){
        $currentuser= JWTAuth::parseToken()->authenticate();
        $lease= Space::where('company_id',$currentuser->company_id)->get();
        return response()->json($lease);
    }
}
