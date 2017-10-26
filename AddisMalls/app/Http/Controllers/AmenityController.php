<?php

namespace App\Http\Controllers;

use App\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
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
        return view('mall.addAmenity');
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
           'name' => 'required',
           'descr'=> 'required'
        ]);
        Amenity::create([
            'company_id' => auth()->user()->company_id,
           'name'=> $request->name,
           'description'=>$request->descr
        ]);
        session()->regenerate();
        session()->flash('slide',"you have successfully posted new amenity.");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     */
    public function show()
    {
        $amenities = Amenity::where('company_id',auth()->user()->company_id)->get();
        return view('mall.showAmenities',compact('amenities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function edit(Amenity $amenity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amenity $amenity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenity $amenity)
    {
        //
    }
}
