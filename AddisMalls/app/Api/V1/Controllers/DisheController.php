<?php

namespace App\Api\V1\Controllers;



use App\Dishe;
use Dingo\Api\Http\Request;
use JWTAuth;
class DisheController extends Controller
{
    //

    public function post_dish(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();
        $file_name = time().'.'.$request->photo_path->getClientOriginalExtension();

        Dishe::create([
            'company_id'=>$currentuser->company_id,
            'name'=>$request->name,
            'photo_path'=>'uploads/'.$file_name,
            'description'=>$request->description,
            'price'=>$request->price
        ]);

        $request->photo_path->move(public_path('uploads'), $file_name);

        return response()->json(['status'=>"ok",'token'=>'ok']);
    }

    public function get_my_dish_list(){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $dish_list= Dishe::where('company_id',$currentuser->company_id)->get();
        return response()->json($dish_list);
    }
}
