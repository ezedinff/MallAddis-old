<?php

namespace App\Http\Controllers;

use App\Category;
use App\Phone;
use App\Service_provider;
use App\TenantDetail;
use Illuminate\Http\Request;

class TenantDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Service_provider $sp)
    {
       return view('mall.tenantDetail',compact('sp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Service_provider $sp)
    {
        $this->validate($request,[
           'size'=>'required',
            'start'=>'required',
            'end'=>'required'
        ]);
        TenantDetail::create([
           'company_id'=> $sp->company_id,
           'rent_size'=>$request->size,
           'staring_date'=>$request->start,
            'ending_date'=>$request->end
        ]);
        session()->regenerate();
        session()->flash('detail',"you have successfully submitted the details.");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TenantDetail  $tenantDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TenantDetail $tenantDetail)
    {
        $sp = Service_provider::where('company_id',$tenantDetail->company_id)->get();
        $phone = Phone::where('company_id',$tenantDetail->company_id)->get();
        $category = Category::find($sp[0]->category_id);
        return view('mall.showTenantDetail',compact(['tenantDetail','sp','phone','category']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TenantDetail  $tenantDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Service_provider $sp)
    {
        $tenantDetail = TenantDetail::where('company_id',$sp->company_id)->get();
        return view('mall.editTenantDetail',compact(['tenantDetail','sp']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TenantDetail  $tenantDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TenantDetail $tenantDetail)
    {
        //
        $this->validate($request,[
            'size'=>'required',
            'start'=>'required',
            'end'=>'required'
        ]);
        $tenantDetail->rent_size = $request->size;
        $tenantDetail->staring_date = $request->start;
        $tenantDetail->ending_date = $request->end;
        $tenantDetail->save();
        session()->regenerate();
        session()->flash('detail',"you have successfully updated details.");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TenantDetail  $tenantDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TenantDetail $tenantDetail)
    {
        //
    }
}
