<?php

namespace App\Api\V1\Controllers;



use App\DailyDemand;
use App\Supplier;
use Dingo\Api\Http\Request;
use JWTAuth;
class DailyDemandController extends Controller
{
    //

    public function add_demand(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();
        DailyDemand::create([
            'brand_name_id'=>$request->id,
            'company_id'=>$currentuser->company_id,
            'quantity'=>$request->quantity
        ]);
        return response()->json(['status'=>'ok','token'=>'ok']);
    }

    public function manage_demand(){
        $currentuser= JWTAuth::parseToken()->authenticate();
       $daily_demand_data= DailyDemand::join('sub_supplier_categories','sub_supplier_categories.id','daily_demands.brand_name_id')
          ->where('company_id',$currentuser->company_id)
           ->select('daily_demands.id','sub_supplier_categories.name','daily_demands.quantity','daily_demands.created_at','sub_supplier_categories.photo_path')->get();
        return response()->json($daily_demand_data);
    }
    public function update_demand(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();
        $daily_demand= DailyDemand::find($request->id);
        $daily_demand->delivered='1';
        $daily_demand->save();

        $supplier_id= Supplier::where('company_id',$currentuser->company_id)->get();
        $demand_request_data= DailyDemand::join('sub_supplier_categories','sub_supplier_categories.id','daily_demands.brand_name_id')
            ->join('pack_sizes','sub_supplier_categories.pack_size_id','pack_sizes.id')
            ->join('service_providers','service_providers.company_id','daily_demands.company_id')
            ->join('malls','service_providers.mall_id','malls.id')
            ->join('photos','service_providers.company_id','photos.company_id')
            ->where(["daily_demands.brand_name_id"=>$request->br_id,'sub_supplier_categories.supplier_id'=>$supplier_id[0]->id,'daily_demands.delivered'=>'0'])
            ->select('daily_demands.id','service_providers.name as name','service_providers.floor_no',
                'service_providers.office_no','pack_sizes.name as pack_name','daily_demands.quantity','photos.photo_path','malls.name as mall_name')->get();

        if (count($demand_request_data)>0){
            return response()->json($demand_request_data);
        }else{
            return response()->json(array('name'=>'no'));
        }
    }
}
