<?php

namespace App\Api\V1\Controllers;

use App\Address;
use Dingo\Api\Http\Request;
use JWTAuth;

class AddressController extends Controller
{
    //

    public function update_address(Request $request){

        $currentuser= JWTAuth::parseToken()->authenticate();
        $address= Address::where('company_id',$currentuser->company_id)->get();
        foreach ($address as $value){
            $address= Address::find($value->id);
            $address->sub_city=$request->sub_city;
            $address->save();
            return response()->json(['status'=>'ok','token'=>'0']);
        }
    }
}
