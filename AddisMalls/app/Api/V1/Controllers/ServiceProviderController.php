<?php

namespace App\Api\V1\Controllers;

use App\Category;
use App\Demand;
use App\Mall;
use App\Photo;
use App\Post_ads;
use App\Service_provider;
use App\User;
use Dingo\Api\Http\Request;
use JWTAuth;

class ServiceProviderController extends Controller
{
    //

    public function getTopSellers(){
        $top_sellers= Service_provider::join('photos','service_providers.company_id','=','photos.company_id')
            ->select('service_providers.id',"name",'photo_path')->limit(10)->get();
        return response()->json($top_sellers);
    }
 public function getTopSellersDetail(Request $request){
     $top_sellers= Service_provider::join('photos','service_providers.company_id','=','photos.company_id')
              ->where('service_providers.id',$request->id)
              ->select('service_providers.id',"name",'photo_path')->get();
     return response()->json($top_sellers);
 }
    public function getTopSellersItem(Request $request){
        $service_provider_id=Service_provider::find($request->id);

        $items = Post_ads::where('company_id',$service_provider_id->company_id)
                          ->select('id','product_photo','caption','price')->get();
        return response()->json($items);

    }
    public function add_new_retailer(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $mall_data = Mall::where('company_id',$currentuser->company_id)->get();
        $mall_id="";
        foreach ($mall_data as $value){
            $mall_id= $value->id;
        }
        echo  $mall_id;
        $password= $request->password;
        $json= json_decode($request->tin_no);
            foreach($json->data as $values)
            {
                echo $values->tin_no . "\n";
                $company_id='s'.uniqid();
                Service_provider::create([
                    'company_id'=>$company_id,
                    'mall_id'=>$mall_id,
                    'name'=>'coming soon',
                    'description'=>'',
                    'tin_no'=>$values->tin_no,
                    'category_id'=>'0',
                    'floor_no'=>'0',
                    'office_no'=>'0'
                ]);
                User::create([
                    'first_name'=>'service',
                    'last_name'=>'provider',
                    'password'=>$password,
                    'tin_no'=>$values->tin_no,
                    'role_id'=>'3',
                    'permission_id'=>'1',
                    'company_id'=>$company_id,
                ]);

            }
        return response()->json(['status'=>'ok','token'=>"ok"]);

    }

    public function get_mall_owner(){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $mall_data= Service_provider::join('malls','malls.id','=','service_providers.mall_id')
                             ->where('service_providers.company_id',$currentuser->company_id)
                             ->select('malls.name')->get();
        return response()->json($mall_data);
    }

    public function get_categories(){
        $currentuser= JWTAuth::parseToken()->authenticate();
        $category= Category::all()->select('name')->get();
        return response()->json($category);
    }
    public function complete_profile(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();
        $retailers= Service_provider::where('company_id',$currentuser->company_id)->get();
        $users= User::where('company_id',$currentuser->company_id)->get();
        $category=Category::where('name',$request->category_type)->get();

        $file_name = time().'.'.$request->photo_path->getClientOriginalExtension();
        foreach ($users as $values){
            $users_data = User::find($values->id);
            $users_data->first_name=$request->first_name;
            $users_data->last_name=$request->last_name;
            $users_data->save();
        }

        foreach ($retailers as $value){
            $retailers_data= Service_provider::find($value->id);
            $retailers_data->name=$request->name;
            $retailers_data->floor_no=$request->floor_no;
            $retailers_data->office_no=$request->office_no;
            $retailers_data->category_id=$category[0]->id;
            $retailers_data->save();

            $photos=Photo::create([
               'company_id'=>$value->company_id,
                'photo_path'=>"uploads/".$file_name
            ]);
        }

        $request->photo_path->move(public_path('uploads'), $file_name);

      return response()->json(['status'=>'ok','token'=>'']);

    }

    public function check_profile_completion(){

        $currentuser= JWTAuth::parseToken()->authenticate();

        $retailers_data= User::join('service_providers','users.company_id','=','service_providers.company_id')
                        ->where('users.company_id',$currentuser->company_id)
                        ->select('users.first_name','users.last_name','service_providers.name','service_providers.floor_no','service_providers.office_no','service_providers.category_id','service_providers.mall_id')->get();


         return response()->json($retailers_data);

    }

    public function get_retailers(Request $request){
        $currentuser= JWTAuth::parseToken()->authenticate();

        $data = Mall::join('service_providers','malls.id','=','service_providers.mall_id')
                      ->join('photos','service_providers.company_id','=','photos.company_id')
                     ->where(['malls.company_id'=>$currentuser->company_id,'floor_no'=>$request->floor_no])
                     ->select('service_providers.name','photos.photo_path','service_providers.office_no')->get();
        return response()->json($data);
    }

}
