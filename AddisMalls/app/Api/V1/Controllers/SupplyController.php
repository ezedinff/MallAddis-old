<?php

namespace App\Api\V1\Controllers;

use App\Service_provider;
use App\Supply;
use Illuminate\Http\Request;
use JWTAuth;
class SupplyController extends Controller
{
    //

    public function upload_supply(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $category_data= Service_provider::where('company_id',$currentuser->company_id)->get();

        $file_name = time().'.'.$request->photo_path->getClientOriginalExtension();
        Supply::create([
            'company_id'=>$currentuser->company_id,
            'category_id'=>$category_data[0]->category_id,
            'product_photo'=>'uploads/'.$file_name,
            'availability'=>$request->availability,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'description'=>$request->description
        ]);
        $request->photo_path->move(public_path('uploads'), $file_name);
        return response()->json(['status'=>'ok','token'=>"ok"]);
    }
}
