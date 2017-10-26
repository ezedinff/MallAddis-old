<?php

namespace App\Api\V1\Controllers;

use App\Category;
use App\Photo;
use Illuminate\Http\Request;
use JWTAuth;
use App\Service_provider;
use App\Demand;
class DemandController extends Controller
{
    //
    public function get_demand_and_supply(){
        //\Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans()
        $currentuser= JWTAuth::parseToken()->authenticate();

        $category_data = Service_provider::where('company_id',$currentuser->company_id)
            ->select('category_id')->get();

            $demand_data = Demand::join('service_providers','demands.company_id','=','service_providers.company_id')
                           ->join('photos','demands.company_id','=','photos.company_id')
                         ->where('demands.company_id','<>',$currentuser->company_id)
                         ->where('demands.category_id',$category_data[0]->category_id)
                         ->select('photos.photo_path','service_providers.name','demands.product_photo',
                             'demands.description','demands.availability','demands.quantity','demands.price','demands.created_at as time')->get();

            return response()->json($demand_data);



    }
    public function upload_demand(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $category_data= Service_provider::where('company_id',$currentuser->company_id)->get();

        $file_name = time().'.'.$request->photo_path->getClientOriginalExtension();
        Demand::create([
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
