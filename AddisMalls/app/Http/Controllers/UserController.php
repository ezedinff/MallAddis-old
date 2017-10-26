<?php

namespace App\Http\Controllers;

use App\Service_provider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id  = auth()->user()->company_id;
        if($company_id[0] == "m"){
            $users = User::where(['company_id' => $company_id,'role_id' => 4])->get();
            return view('mall.users',compact('users'));
        }
        else if ($company_id[0] == "s"){
            $users = User::where(['company_id' => $company_id,'role_id' => 4])->get();
            $ser  = Service_provider::where('company_id',$company_id)->get();
            if ($ser[0]->category_id == 1){
                return view('cafe.users',compact('users'));
            }
            return view('sp.users',compact('users'));
        }
        else if ($company_id[0] == "p"){
            $users = User::where(['company_id' => $company_id,'role_id' => 4])->get();
            return view('cafe.users',compact('users'));
        }
        return dd("null");

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
            return view('mall.addUser');
        }
        else if ($company_id[0] == "s"){
            $ser  = Service_provider::where('company_id',$company_id)->get();
            if ($ser[0]->category_id == 1){
                return view('cafe.addUser');
            }
            return view('sp.addUser');
        }
        else if ($company_id[0] == "p"){
            return view('supplier.addSlide');
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

        $permission = \App\Permission::all()->last();
        $per_id = $permission->id;
        $roles = \App\Role::all();
        $role_id = $roles[3]->id;
        \App\User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'tin_no' =>  auth()->user()->tin_no,
            'phone_number' => $request->phoneu,
            'role_id' => $role_id,
            'permission_id' => $per_id,
            'company_id' => auth()->user()->company_id,
            'password' => bcrypt($request->password),
        ]);
        Session::regenerate();
        Session::flash('user',"You have successfully added new  user");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
