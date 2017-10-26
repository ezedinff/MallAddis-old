<?php

namespace App\Http\Controllers;

use App\Demand;
use App\Service_provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DemandController extends Controller
{

    public function index(){
        $company_id = auth()->user()->company_id;
        $posts = Demand::where('company_id',$company_id)->orderBy('created_at','desc')->get();
        return view('sp.demands',compact('posts'));
    }
    public function create()
    {
        return view('sp.addDemand');
    }
    public function store(Request $request)
    {
        $company_id = auth()->user()->company_id;
        $service = Service_provider::where('company_id',$company_id)->get();
        $category_id = $service[0]->category_id;
        $pictures_name = time().'.'.$request->file->getClientOriginalExtension();
        $uploadPath = "uploads/".$pictures_name;
        $title  = "<h5>".$request->title."</h5>";
        $des  = "<p>" .$request->description . "</p>";
        $finDes = $title . $des;
        Demand::create([
            'company_id' => $company_id,
            'category_id' => $category_id,
            'product_photo' => $uploadPath,
            'availability' => "unknown",
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $finDes
        ]);
        $request->file->move(public_path('uploads'), $pictures_name);
        Session::regenerate();
        Session::flash('demand',"You have successfully uploaded your Demand");
        return redirect()->back();
    }

    public function allDemand(){
        $sp = \App\Service_provider::where('company_id',auth()->user()->company_id)->get();
        $demands   = \App\Demand::where('category_id',$sp[0]->category_id)->orderBy('created_at','desc')->get();
        return view('sp.allDemands',compact('demands'));
    }
}

