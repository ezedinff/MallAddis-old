<?php

namespace App\Http\Controllers;

use App\Service_provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    //

    public function user_login(Request $request){
     if (Auth::attempt(['tin_no'=>$request->tin,'password'=>$request->password])){
        $company_id = auth()->user()->company_id;
        if ($company_id[0] == "m"){
            if (auth()->user()->permission_id == 2 and auth()->user()->role_id == 2){
                return redirect('mall/wait_to_be_verified');
            }
            return redirect('/home');
        }
        elseif ($company_id[0] == "s"){
            $ser  = Service_provider::where('company_id',$company_id)->get();
            if ( $ser[0]->name == "unknown"){
                return redirect('/sp/addDetails');
            }else{
                if ($ser[0]->category_id == 1){
                    return redirect('/cafe/dashboard');
                }
                else{
                    return redirect('/sp/dashboard');
                }

            }
        }
        elseif ($company_id[0] == "a"){
            return redirect('/admin/dashboard');
        }
        elseif ($company_id[0] == "p"){
            return redirect('/supplier/dashboard');
        }
     }
    }
}
