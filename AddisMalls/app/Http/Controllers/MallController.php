<?php

namespace App\Http\Controllers;

use App\Address;
use App\Logo;
use App\Mall;
use App\Phone;
use App\Photo;
use App\Service_provider;
use App\Slide;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MallController extends Controller
{
    public function index(){
        $malls = \App\Mall::where('id','<>','0')->get();
        return view('showMalls',compact('malls'));
    }
    public  function showMallsAdmin(){
        $mallsV = \App\Mall::join('users','users.company_id','malls.company_id')
                        ->where(['users.role_id'=> 2,'users.permission_id'=>2])->get();
        $malls = \App\Mall::join('users','users.company_id','malls.company_id')
            ->select(['users.first_name','users.last_name','users.phone_number','malls.name','malls.tin_no','malls.id'])
            ->where(['users.role_id'=> 2,'users.permission_id'=>1])
            ->get();
        return view('admin.malls',compact(['mallsV','malls']));
    }
    public function verifyMall($company_id){
        $user = User::where('company_id',$company_id)->get();
        DB::table('users')->where(['company_id' => $company_id,'role_id'=> 2])->update(['permission_id' => 1]);
        return redirect()->back();
    }
    public function rejectMall($company_id){
        $m = Mall::where('company_id',$company_id)->get();
        if ($m->count() > 0){
            User::where('company_id',$company_id)->delete();
            Address::where('company_id',$company_id)->delete();
            Mall::where('company_id',$company_id)->delete();
        }
        return redirect()->back();
    }
    public function unverfied(){
        return view('mall.unverfied');
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'tin'=>'required',
            'password'=>'required'
        ]);
        if (Auth::attempt(['tin_no'=>$request->tin,'password'=>$request->password])){
            return redirect('/home');
        }

    }


    public function store(Request $request){
        $country = "Ethiopia";
        $idStart = "m";
        $idUn = uniqid();
        $compId = $idStart . $idUn;
        $permission = \App\Permission::all()->last();
        $roles = \App\Role::all();
        $role_id = $roles[1]->id;
        $per_id = $permission->id;
        $u = \App\User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'tin_no' => $request->tin,
            'phone_number' => $request->phoneu,
            'role_id' => $role_id,
            'permission_id' => $per_id,
            'company_id' => $compId,
            'password' => bcrypt($request->password),
        ]);
        if ($u){
            Mall::create([
                'company_id' => $compId,
                'name' => $request->mallname,
                'description' => $request->description,
                'tin_no' => $request->tin,
                'floors_no' => $request->floor
            ]);
            \App\Address::create([
                'company_id' => $compId,
                'country' => $country,
                'city' => $request->city,
                'sub_city' => $request->sub_city,
                'email' => $request->email,
                'website' => $request->website
            ]);
            \App\Phone::create([
                'company_id' => $compId,
                'phone_no' => $request->phone
            ]);
            if (Auth::attempt(['tin_no'=>$request->tin,'password'=>$request->password])){
                return redirect('mall/wait_to_be_verified');
            }
        }
    }

    public function show(Mall $mall){
        return view('show',compact('mall'));
    }


    public function edit(Mall $mall){
       return view('admin.editMall',compact('mall'));
    }
    public function update(Request $request,Mall $mall){
        DB::table('malls')->where('id',$mall->id)
            ->update([
                'name' => $request->mallname,
                'description' => $request->description,
                'tin_no'=>$request->tin,
                'floors_no' => $request->floor
            ]);
        DB::table('addresses')->where('company_id',$mall->company_id)
            ->update([
                'website' => $request->website
            ]);
        DB::table('phones')->where('company_id',$mall->company_id)
            ->update([
                'phone_no' => $request->phone
            ]);
        session()->regenerate();
        session()->flash('mallupdate',"you have updated successfully");
        return redirect()->back();
    }
    public function updateLocation(Request $request, Mall $mall){
        $this->validate($request,[
            'latitude'=> 'required',
            'longitude'=> 'required'
        ]);
        $mall->lat = $request->latitude;
        $mall->lon = $request->longitude;
        $mall->save();
        session()->regenerate();
        session()->flash('mallupdate',"you have updated successfully");
        return redirect()->back();
    }
    public function destroy(Mall $mall){
        Address::where('company_id',$mall->company_id)->delete();
        Phone::where('company_id',$mall->company_id)->delete();
        Service_provider::where('mall_id',$mall->mall_id)->delete();
        Slide::where('company_id',$mall->company_id)->delete();
        Photo::where('company_id',$mall->company_id)->delete();
        Logo::where('company_id',$mall->company_id)->delete();
        $mall->delete();
        return redirect()->back();
    }
}
