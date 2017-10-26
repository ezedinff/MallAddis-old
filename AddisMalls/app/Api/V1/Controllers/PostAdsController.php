<?php

namespace App\Api\V1\Controllers;

use App\Category;
use App\Post_ads;
use App\Service_provider;
use Dingo\Api\Http\Request;
use JWTAuth;

class PostAdsController extends Controller
{
    //

    public function getTops(){
      $top = Post_ads::all();

      return response()->json($top);
    }

    public function post_new_item(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $category=Service_provider::join('categories','service_providers.category_id','=','categories.id')
                   ->where('service_providers.company_id',$currentuser->company_id)->get();

        $file_name = time().'.'.$request->photo_path->getClientOriginalExtension();
        Post_ads::create([
          'company_id'=>$currentuser->company_id,
            'category_id'=>$category[0]->category_id,
            'caption'=>$request->caption,
            'product_photo'=>'uploads/'.$file_name,
            'price'=>$request->price,
            'description'=>''
        ]);
        $request->photo_path->move(public_path('uploads'), $file_name);
        return response()->json(['status'=>'ok','token'=>'ok']);
    }

    public function get_posted_item(){
        $currentuser= JWTAuth::parseToken()->authenticate();
        $my_data= Post_ads::where('company_id',$currentuser->company_id)->get();
        return response()->json($my_data);
    }
}
