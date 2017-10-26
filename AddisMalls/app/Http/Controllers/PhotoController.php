<?php

namespace App\Http\Controllers;

use App\Logo;
use App\Photo;
use App\Slide;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    //
    public function addLogo(Request $request){
        $company_id  = auth()->user()->company_id;
        $pictures_name = time().'.'.$request->file->getClientOriginalExtension();
        $uploadPath = "uploads/".$pictures_name;
        $request->file->move(public_path('uploads'), $pictures_name);
        Logo::create([
            'company_id' =>$company_id,
            'logo_path' => $uploadPath
        ]);
        $message = "the company's logo has submitted successfully";
        session()->regenerate();
        session()->flash('logo',$message);
        return redirect()->back();
    }
    public function showAddLogoForm(){
        return view('mall.addLogo');
    }
    public function showAddLogoFormSp(){
        return view('sp.addLogo');
    }
    public function showAddLogoFormCafe(){
        return view('cafe.addLogo');
    }
    public function addSpSlide(Request $request){
        $company_id  = auth()->user()->company_id;
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
    public function create(){
        return view('cafe.addCover');
    }
    public function showAddCoverFormSp(){
        return view('sp.addCover');
    }
    public function showAddCoverFormMall(){
        return view('mall.addCover');
    }
    public  function storeCover(Request $request){
        $company_id  = auth()->user()->company_id;
        $pictures_name = time().'.'.$request->file->getClientOriginalExtension();
        $uploadPath = "uploads/".$pictures_name;
        $request->file->move(public_path('uploads'), $pictures_name);
        Photo::create([
            'company_id' =>$company_id,
            'photo_path' => $uploadPath
        ]);
        $message = "the cover picture has submitted successfully";
        session()->regenerate();
        session()->flash('logo',$message);
        return redirect()->back();
    }

}
