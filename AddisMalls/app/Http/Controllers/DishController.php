<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Mall;
use App\Service_provider;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::where('company_id',auth()->user()->company_id)->get();
        return view('cafe.dishes',compact('dishes'));
    }

    public function showDish(Service_provider $sp){
        $retailers  = Service_provider::find($sp->id);
        $mall = Mall::find($sp->mall_id);
        $dishes = Dish::where('company_id',$sp->company_id)->get();
        return view('showDish',compact(['retailers','mall','dishes']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cafe.addDishes');
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
        Dish::create([
           'company_id'=>auth()->user()->company_id,
           'name'=>$request->title,
           'photo_path'=>$uploadPath,
           'description'=>$request->descr,
           'price'=>$request->price
        ]);
        $message = "you have successfully posted new dish";
        session()->regenerate();
        session()->flash('dish',$message);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
