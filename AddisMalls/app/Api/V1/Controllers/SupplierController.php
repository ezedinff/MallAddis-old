<?php

namespace App\Api\V1\Controllers;

use App\DailyDemand;
use App\Service_provider;
use App\SubSupplierCategory;
use App\Supplier;
use App\User;
use Dingo\Api\Http\Request;
use JWTAuth;

class SupplierController extends Controller
{
    //

    public function get_supplier_info(){
        $currentuser= JWTAuth::parseToken()->authenticate();
        $data = User::join("suppliers","users.company_id","=","suppliers.company_id")
                      ->where("users.company_id",$currentuser->company_id)
                      ->select('users.first_name','users.last_name','suppliers.name')->get();
        return response()->json($data);
    }
    public function get_supplier_item(){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $items_data= SubSupplierCategory::join("suppliers","sub_supplier_categories.supplier_id",'=',"suppliers.id")
                      ->join('daily_demands','daily_demands.brand_name_id','sub_supplier_categories.id')
                     ->where('suppliers.company_id',$currentuser->company_id)
                       ->where('daily_demands.delivered','<>','1')
                     ->groupBy('daily_demands.brand_name_id')
                      ->select('sub_supplier_categories.id','sub_supplier_categories.name')->get();
        return response()->json($items_data);
    }

    public function get_demand_request(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $supplier_id= Supplier::where('company_id',$currentuser->company_id)->get();

        $demand_request_data= DailyDemand::join('sub_supplier_categories','sub_supplier_categories.id','daily_demands.brand_name_id')
                                             ->join('pack_sizes','sub_supplier_categories.pack_size_id','pack_sizes.id')
                                             ->join('service_providers','service_providers.company_id','daily_demands.company_id')
                                              ->join('malls','service_providers.mall_id','malls.id')
                                              ->join('photos','service_providers.company_id','photos.company_id')
                                              ->where(["daily_demands.brand_name_id"=>$request->id,'sub_supplier_categories.supplier_id'=>$supplier_id[0]->id,'daily_demands.delivered'=>'0'])
                                              ->select('daily_demands.id','service_providers.name as name','service_providers.floor_no',
                                                  'service_providers.office_no','pack_sizes.name as pack_name','daily_demands.quantity','photos.photo_path','malls.name as mall_name')->get();

   if (count($demand_request_data)>0){
       return response()->json($demand_request_data);
   }else{
       return response()->json(array('name'=>'no'));
   }

    }
}
