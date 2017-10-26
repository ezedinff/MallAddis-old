<?php

namespace App\Http\Controllers;

use App\Ambience;
use App\Dish;
use App\Mall;
use App\Service_provider;
use Illuminate\Http\Request;

class AmbienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ams =  Ambience::where('company_id',auth()->user()->company_id)->get();
        return view('cafe.ambiences',compact('ams'));
    }

    public function showAmbience(Service_provider $sp){
        $retailers  = Service_provider::find($sp->id);
        $mall = Mall::find($sp->mall_id);
        $amebiences = Ambience::where('company_id',$sp->company_id)->get();
        return view('showAmbience',compact(['retailers','mall','amebiences']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cafe.addAmbience');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pictures_name = time().'.'.$request->file->getClientOriginalExtension();
        $uploadPath = "uploads/".$pictures_name;
        $request->file->move(public_path('uploads'), $pictures_name);
        Ambience::create([
            'company_id'=> auth()->user()->company_id,
            'photo_path'=> $uploadPath,
            'description'=> $request->descr
        ]);
        $message = "the ambience's has submitted successfully";
        session()->regenerate();
        session()->flash('amb',$message);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ambience  $ambience
     * @return \Illuminate\Http\Response
     */
    public function show(Ambience $ambience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ambience  $ambience
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambience $ambience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ambience  $ambience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ambience $ambience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ambience  $ambience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambience $ambience)
    {
        //
    }
}
