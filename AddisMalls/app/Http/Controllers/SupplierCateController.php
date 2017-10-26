<?php

namespace App\Http\Controllers;

use App\Supplier_cate;
use Illuminate\Http\Request;

class SupplierCateController extends Controller
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
    public function create()
    {
        return view('admin.addSupplierCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required|max:255'
        ]);
        Supplier_cate::create([
           'name'=>$request->name
        ]);
        session()->regenerate();
        session()->flash('supcat','you have successfully added new supplier category to the system');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier_cate  $supplier_cate
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier_cate $supplier_cate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier_cate  $supplier_cate
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier_cate $supplier_cate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier_cate  $supplier_cate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier_cate $supplier_cate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier_cate  $supplier_cate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier_cate $supplier_cate)
    {
        //
    }
}
