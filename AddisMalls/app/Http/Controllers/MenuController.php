<?php

namespace App\Http\Controllers;

use App\Mall;
use App\Menu;
use App\Service_provider;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::where('company_id',auth()->user()->id)->get();
        return view('cafe.menu',compact('menus'));
    }

    public function showMenu(Service_provider $sp){
        $retailers  = Service_provider::find($sp->id);
        $mall = Mall::find($sp->mall_id);
        $menus = Menu::where('company_id',$sp->company_id)->get();
        return view('showMenu',compact(['retailers','mall','menus']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cafe.addMenu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $pictures_name = time().'.'.$request->file->getClientOriginalExtension();
        $uploadPath = "uploads/".$pictures_name;
        $request->file->move(public_path('uploads'), $pictures_name);
        Menu::create([
            'company_id'=> auth()->user()->company_id,
            'photo_path'=> $uploadPath,
            'description'=> $request->descr
        ]);
        $message = "your menu has submitted successfully";
        session()->regenerate();
        session()->flash('menu',$message);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
