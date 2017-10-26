<?php

namespace App\Http\Controllers;

use App\DailyDemand;
use App\Phone;
use App\SubSupplierCategory;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::where('company_id',auth()->user()->company_id)->get();
        $dailyCates = SubSupplierCategory::where('supplier_id',$supplier[0]->id)->get();
        $dailyDemands = DailyDemand::join('sub_supplier_categories','daily_demands.brand_name_id','=','sub_supplier_categories.id')
                                        ->where('sub_supplier_categories.supplier_id',$supplier[0]->id)
                                        ->get();
        $dailyDetails =  DailyDemand::join('sub_supplier_categories','sub_supplier_categories.id','daily_demands.brand_name_id')
        ->join('pack_sizes','sub_supplier_categories.pack_size_id','pack_sizes.id')
        ->join('service_providers','service_providers.company_id','daily_demands.company_id')
            ->join('phones','phones.company_id','daily_demands.company_id')
            ->join('malls','service_providers.mall_id','malls.id')
        ->where('sub_supplier_categories.supplier_id',$supplier[0]->id)
        ->select('service_providers.name as name','service_providers.floor_no',
            'service_providers.office_no','pack_sizes.name as pack_name','daily_demands.quantity','daily_demands.brand_name_id','daily_demands.created_at','phones.phone_no','malls.name as mall_name','sub_supplier_categories.name as brand_name')->get();


        return view('supplier.profile',compact(['dailyDemands','dailyCates','dailyDetails']));
    }

    public function showDailyDemand($id){
        $supplier = Supplier::where('company_id',auth()->user()->company_id)->get();
        $dailyCates = SubSupplierCategory::where('supplier_id',$supplier[0]->id)->get();
        $dailyDemands = DailyDemand::join('sub_supplier_categories','daily_demands.brand_name_id','=','sub_supplier_categories.id')
            ->where('sub_supplier_categories.supplier_id',$supplier[0]->id)
            ->get();
        $dailyDetails =  DailyDemand::join('sub_supplier_categories','sub_supplier_categories.id','daily_demands.brand_name_id')
            ->join('pack_sizes','sub_supplier_categories.pack_size_id','pack_sizes.id')
            ->join('service_providers','service_providers.company_id','daily_demands.company_id')
            ->join('phones','phones.company_id','daily_demands.company_id')
            ->join('malls','service_providers.mall_id','malls.id')
            ->where(['sub_supplier_categories.supplier_id'=>$supplier[0]->id,'sub_supplier_categories.id'=>$id])
            ->select('service_providers.name as name','service_providers.floor_no',
                'service_providers.office_no','pack_sizes.name as pack_name','daily_demands.quantity','daily_demands.brand_name_id','daily_demands.created_at','phones.phone_no','malls.name as mall_name','sub_supplier_categories.name as brand_name')->get();


        return view('supplier.showCategory',compact(['dailyDemands','dailyCates','dailyDetails','id']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addSupplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $idStart = "p";
        $idUn = uniqid();
        $compId = $idStart . $idUn;

        $this->validate($request,[
            'name'=>'required|max:255'
        ]);
       $s =  Supplier::create([
            'company_id'=>$compId,
            'name'=>$request->name,
            'tin'=>$request->tin
        ]);
       if ($s){
           User::create([
              'first_name'=>$request->first_name,
              'last_name'=>$request->last_name,
              'tin_no'=>$request->tin,
              'phone_number' => $request->phoneu,
              'password'=> bcrypt($request->password),
              'role_id'=> 5,
              'permission_id'=>1,
              'company_id'=>$compId
           ]);
           Phone::create([
               'company_id'=>$compId,
               'phone_no'=>$request->phone
           ]);
           session()->regenerate();
           session()->flash('sup','you have successfully added new supplier to the system');
           return redirect()->back();
       }
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
