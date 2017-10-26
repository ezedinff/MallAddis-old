<?php

namespace App\Api\V1\Controllers;

use App\SubSupplierCategory;
use Dingo\Api\Http\Request;
use JWTAuth;
class SubSupplierCategoryController extends Controller
{
    //

    public function get_items(){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $items_data= SubSupplierCategory::all();
        return response()->json($items_data);
    }

    public function items_detail(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $items_data= SubSupplierCategory::join('supplier_cates','sub_supplier_categories.sub_cat_id','=','supplier_cates.id')
                             ->join("pack_sizes",'sub_supplier_categories.pack_size_id','=','pack_sizes.id')
                             ->join("types",'sub_supplier_categories.type_id','types.id')
                             ->join("suppliers",'sub_supplier_categories.supplier_id','=','suppliers.id')
                             ->where('sub_supplier_categories.id',$request->id)
                             ->select('sub_supplier_categories.id','suppliers.name as supplier_name','sub_supplier_categories.name as category_name','supplier_cates.name as name',
                                 'pack_sizes.name as package_name','types.name as type_name','sub_supplier_categories.description','sub_supplier_categories.photo_path')->get();
        return response()->json($items_data);
    }
}
