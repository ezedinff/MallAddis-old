<?php

namespace App\Api\V1\Controllers;

use App\Address;
use App\Mall;
use App\Phone;
use Config;
use App\User;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\SignUpRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SignUpController extends Controller
{
    public function signUp(SignUpRequest $request, JWTAuth $JWTAuth)
    {
        $user = new User;
        $company_id='m'.uniqid();
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->tin_no=$request->tin_no;
        $user->password=$request->password;
        $user->role_id='2';
        $user->permission_id='2';
        $user->company_id=$company_id;
        $user->save();
        if(!$user->save()) {
            throw new HttpException(500);
        }
        $phone= Phone::create([
              'company_id'=>$company_id,
              'phone_no'=>$request->phone_no
        ]);
        $malls= Mall::create([
            'company_id'=>$company_id,
            'name'=>$request->mall_name,
            'description'=>'',
            'tin_no'=>$request->tin_no,
            'lat'=>'0',
            'lon'=>'0',
            'floors_no'=>$request->floors_no
        ]);
        Address::create([
           'company_id'=>$company_id,
            'country'=>'Ethiopia',
            'city'=>$request->city,
            'sub_city'=>'',
            'email'=>'',
            'website'=>'',
            ''
        ]);

        $token = $JWTAuth->fromUser($user);
        return response()->json([
            'status' => 'ok',
            'token' => $token
        ], 201);
    }
}
