<?php

namespace App\Http\Controllers;

use App\Service_provider;
use App\Supply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplyController extends Controller
{

    public function index(){
        $company_id = auth()->user()->company_id;
        $posts = Supply::where('company_id',$company_id)->orderBy('created_at','desc')->get();
        return view('sp.supply',compact('posts'));
    }

    public function create()
    {
        return view('sp.addSupply');
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
        Supply::create([
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
        Session::flash('supply',"You have successfully uploaded your supply");
        return redirect()->back();
    }

    public function allSupply(){
        $sp = \App\Service_provider::where('company_id',auth()->user()->company_id)->get();
        $supplies   = \App\Supply::where('category_id',$sp[0]->category_id)->orderBy('created_at','desc')->get();
        return view('sp.allSupply',compact('supplies'));
    }
}

