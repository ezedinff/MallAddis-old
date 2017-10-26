<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\Permission;
use App\Phone;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'tin_no' => 'required|string|max:10|unique:users',
            'phone_number' => 'required|string|max:12|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $country = "Ethiopia";
        $idStart = "m";
        $idUn = uniqid();
        $compId = $idStart + $idUn;
        $permission = Permission::all()->last();
        $roles = Role::all();
        $role_id = $roles[1]->id;
        $per_id = $permission->id;
        $u = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'tin_no' => $data['tin'],
            'phone_number' => $data['phoneu'],
            'role_id' => $role_id,
            'permission_id' => $per_id,
            'company_id' => $compId,
            'password' => bcrypt($data['password']),
        ]);
        if ($u){
            Mall::create([
                'company_id' => $compId,
                'name' => $data['mallname'],
                'description' => $data['description'],
                'tin_no' => $data['tin'],
                'floors_no' => $data['floor']
            ]);
            Address::create([
               'company_id' => $compId,
               'country' => $country,
               'city' => $data['city'],
               'sub_city' => $data['sub_city'],
               'email' => $data['email'],
               'website' => $data['website']
            ]);

            Phone::create([
                'company_id' => $compId,
                'phone_no' => $data['phone']
            ]);

        }

    }

    public function idGeneratorForMall()
    {
        $idStart = "m";
        $idUn = uniqid();
        $idFinal  = $idStart + $idUn;
        return $idFinal;
    }
}
