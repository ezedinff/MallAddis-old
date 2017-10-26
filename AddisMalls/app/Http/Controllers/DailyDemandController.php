<?php

namespace App\Http\Controllers;

use App\DailyDemand;
use App\SubSupplierCategory;
use Illuminate\Http\Request;

class DailyDemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demands = DailyDemand::where('company_id',auth()->user()->company_id)->get();
        return view('cafe.demands', compact('demands'));
    }

    public function brandDetail(Request $request){
        $brand = SubSupplierCategory::join('types','sub_supplier_categories.type_id','=','types.id')
            ->join('pack_sizes','sub_supplier_categories.pack_size_id','=','pack_sizes.id')
        ->where('sub_supplier_categories.id',$request->id)->get();
        return response()->json($brand);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cafe.addDemand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //supcate,quantity
        DailyDemand::create([
            'company_id'=>auth()->user()->company_id,
            'brand_name_id'=>$request->supcate,
            'quantity' => $request->quantity
        ]);
        session()->regenerate();
        session()->flash('daily','you have successfully posted your demand.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DailyDemand  $dailyDemand
     * @return \Illuminate\Http\Response
     */
    public function show(DailyDemand $dailyDemand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DailyDemand  $dailyDemand
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyDemand $dailyDemand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DailyDemand  $dailyDemand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyDemand $dailyDemand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DailyDemand  $dailyDemand
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyDemand $dailyDemand)
    {
        //
    }
}
