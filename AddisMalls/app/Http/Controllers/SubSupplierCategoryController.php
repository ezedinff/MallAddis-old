<?php

namespace App\Http\Controllers;

use App\SubSupplierCategory;
use Illuminate\Http\Request;

class SubSupplierCategoryController extends Controller
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
        return view('admin.addSubSupplierCategory');
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
        $pictures_name = time().'.'.$request->file->getClientOriginalExtension();
        $uploadPath = "uploads/".$pictures_name;
        $request->file->move(public_path('uploads'), $pictures_name);
        SubSupplierCategory::create([
            'name'=>$request->name,
            'sub_cat_id'=>$request->supcate,
            'supplier_id'=>$request->sup_id,
            'type_id'=>$request->type,
            'pack_size_id'=>$request->pack_size,
            'description'=>$request->description,
            'photo_path'=>$uploadPath
        ]);
        session()->regenerate();
        session()->flash('subsupcat','you have successfully added new supplier sub category to the system');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubSupplierCategory  $subSupplierCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubSupplierCategory $subSupplierCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubSupplierCategory  $subSupplierCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubSupplierCategory $subSupplierCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubSupplierCategory  $subSupplierCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubSupplierCategory $subSupplierCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubSupplierCategory  $subSupplierCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubSupplierCategory $subSupplierCategory)
    {
        //
    }
}
