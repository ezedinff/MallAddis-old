<?php

namespace App\Api\V1\Controllers;

use App\Menu;
use Dingo\Api\Http\Request;
use JWTAuth;

class MenuController extends Controller
{
    //

    public function upload_menu(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $file_name = time().'.'.$request->photo_path->getClientOriginalExtension();
        Menu::create([
            'company_id'=>$currentuser->company_id,
            'photo_path'=>'uploads/'.$file_name,
            'description'=>''
        ]);
        $request->photo_path->move(public_path('uploads'), $file_name);
        return response()->json(['status'=>'ok','token'=>'ok']);
    }

    public function get_menu_image(){
        $currentuser= JWTAuth::parseToken()->authenticate();
        $menu_data= Menu::where("company_id",$currentuser->company_id)->get();

        return response()->json($menu_data);
    }
}
