<?php

namespace App\Http\Controllers;

use App\OpeningHour;
use App\Service_provider;
use Illuminate\Http\Request;

class OpeningHourController extends Controller
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
        $company_id  = auth()->user()->company_id;
        if($company_id[0] == "m"){
            return view('mall.openingHour');
        }
        else if ($company_id[0] == "s"){
            $ser  = Service_provider::where('company_id',$company_id)->get();
            if ($ser[0]->category_id == 1){
                return view('cafe.openingHour');
            }
            return view('sp.openingHour');
        }
        else if ($company_id[0] == "p"){
            return view('supplier.openingHour');
        }
        return dd("null");
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OpeningHour  $openingHour
     * @return \Illuminate\Http\Response
     */
    public function show(OpeningHour $openingHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OpeningHour  $openingHour
     * @return \Illuminate\Http\Response
     */
    public function edit(OpeningHour $openingHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OpeningHour  $openingHour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OpeningHour $openingHour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OpeningHour  $openingHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpeningHour $openingHour)
    {
        //
    }
}
