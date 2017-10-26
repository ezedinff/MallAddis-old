<?php

namespace App\Http\Controllers;

use App\Address;
use App\Mall;
use App\Phone;
use App\Service_provider;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    //
    public  function index(){
        return view('sp.profile');
    }
    public function create(){

    }
    public function showCreateServiceProvider(){
        return view('mall.createServices');
    }
    public function dashboard(){
        return view('sp.dashboard');
    }
    public function store(Request $request){
        $idStart = "s";
        $idUn = uniqid();
        $compId = $idStart . $idUn;
        $cm = auth()->user()->company_id;
        $m = \App\Mall::where('company_id',$cm)->get();
        $mallid = $m[0]->id;
        $count  = $request->count;
        $roles = \App\Role::all();
        $role_id = $roles[2]->id;

           $u = \App\User::create([
               'first_name' => "service",
               'last_name' => "provider",
               'phone_number' => "0",
               "tin_no" => $request->tin1,
               'password' => bcrypt($request->password1),
               'role_id' => $role_id,
               'permission_id' => 0,
               'company_id' => $compId
            ]);
           if ($u){
               \App\Service_provider::create([
                'company_id'=>$compId,
                   'mall_id'=>$mallid,
                   'name'=>"unknown",
                   'description' => "unknown",
                   'tin_no' => $request->tin1,
                   'category_id' => 404,
                   'floor_no' => 0,
                   'office_no' => "0"
               ]);
           }
            session()->regenerate();
            session()->flash('sp',"you have successfully registered new retailer");

           return redirect()->back();

    }

    public function update(Request $request){
        $company_id = auth()->user()->company_id;
        $sp = Service_provider::where("company_id",$company_id)->update([
            'name' => $request->spname,
            'description' => $request->description,
            'floor_no' => $request->floor,
            'office_no' => $request->bnumber,
            'category_id' => $request->category
        ]);
        $serviceProvider = Service_provider::where('company_id',$company_id)->get();
        $mall  = \App\Mall::find($serviceProvider[0]->mall_id);
        $addressOfmall = \App\Address::where('company_id',$mall->company_id)->get();
        if ($sp){
            \App\Address::create([
               'company_id' => $company_id,
                'country' => $addressOfmall[0]->country,
              'city' => $addressOfmall[0]->city,
              'sub_city' => $addressOfmall[0]->sub_city,
              'website' => $request->website,
            ]);
            \App\Phone::create([
                'company_id' => $company_id,
                'phone_no' => $request->phone
            ]);

            \App\User::where("company_id",$company_id)->update([
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'phone_number' => $request->phoneu,
               'password'=>bcrypt($request->password)
            ]);
            if ($request->category == 1){
                return redirect('/cafe/dashboard');
            }
            return redirect('/sp/dashboard');
        }

    }
    public function show(Service_provider $retailers)
    {
        if ($retailers->category_id == 1){
            return view('showCafe',compact('retailers'));
        }
        return view('showSp',compact('retailers'));
    }
    public function showSp(Mall $mall){
        $retailers  = Service_provider::where('mall_id', $mall->id)->get();
        return view('showListOfSp',compact(['retailers','mall']));
    }
    public function showCafe(Service_provider $sp){
        $retailers  = Service_provider::find($sp->id);
        $mall = Mall::find($sp->mall_id);
        return view('showCafe',compact(['retailers','mall']));
    }
    public function showSpBy($mall_id, $id){
        $idarr  = explode(" ", $id);
        $cate_id = $id;
        $mall = Mall::find($mall_id);
        $retailers  = Service_provider::where(['mall_id' => $mall_id,'category_id' => $id])->get();
        return view('showSpByCategory',compact(['retailers','cate_id','mall']));
    }
    public function cafeDashboard(){
        return view('cafe.profile');
    }
    public function showTenants(){
        $company_id = auth()->user()->company_id;
        $mall = Mall::where('company_id',$company_id)->get();
        $retailers = Service_provider::where('mall_id',$mall[0]->id)->get();
        return view('mall.tenants',compact('retailers'));
    }
    public  function showCafeRestans(){
        $cafes  = Service_provider::where('category_id',1)->get();
        return view('showCafeRestans',compact('cafes'));
    }
    public function destroy(Service_provider $sp){
        return redirect()->back();
    }
}
