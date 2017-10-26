<?php

namespace App\Http\Controllers;

use App\Post_ads;
use App\Service_provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostAdsController extends Controller
{
    //
    public function index(){
        return view('sp.addProduct');
    }
    public function store(Request $request){
        $company_id = auth()->user()->company_id;
        $service = Service_provider::where('company_id',$company_id)->get();
        $category_id = $service[0]->category_id;
        $pictures_name = time().'.'.$request->file->getClientOriginalExtension();
        $uploadPath = "uploads/".$pictures_name;
        Post_ads::create([
            'company_id' => $company_id,
            'category_id' => $category_id,
            'caption' => $request->caption,
            'product_photo' => $uploadPath,
            'price' => $request->price,
            'description' => $request->description
        ]);
        $request->file->move(public_path('uploads'), $pictures_name);
        Session::regenerate();
        Session::flash('posted',"Your product uploaded successfully");
        return redirect()->back();
    }
    public function productList(){
        $company_id = auth()->user()->company_id;
        $posts = Post_ads::where('company_id',$company_id)->orderBy('created_at','desc')->get();
        return view('sp.products',compact('posts'));
    }
}
