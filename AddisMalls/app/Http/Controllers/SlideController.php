<?php

namespace App\Http\Controllers;

use App\Service_provider;
use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $company_id  = auth()->user()->company_id;
        if($company_id[0] == "m"){
            return view('mall.addSlide');
        }
        else if ($company_id[0] == "s"){
            $ser  = Service_provider::where('company_id',$company_id)->get();
            if ($ser[0]->category_id == 1){
                return view('cafe.addSlide');
            }
            return view('sp.addSlide');
        }
        else if ($company_id[0] == "p"){
            return view('supplier.addSlide');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_id  = auth()->user()->company_id;
        $this->validate($request,[
            'file' => 'required'
        ]);
        $pictures_name = time().'.'.$request->file->getClientOriginalExtension();
        $uploadPath = "uploads/".$pictures_name;
        $request->file->move(public_path('uploads'), $pictures_name);
        $s = Slide::create([
            'company_id' => $company_id,
            'caption1' => $request->caption1,
            'caption2' => $request->caption2,
            'photo_path' => $uploadPath
        ]);
        $message = "the picture for slide has submitted successfully";
        if ($s){
            session()->regenerate();
            session()->flash('slide',$message);
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        //
    }
}
