<?php

namespace App\Api\V1\Controllers;

use App\Amenity;
use App\Event;
use App\Mall;
use App\News;
use App\Service_provider;
use Dingo\Api\Http\Request;

class MallController extends Controller
{
    //

    public function getTopMall(){
        $data= Mall::join('photos','malls.company_id','=','photos.company_id')
              ->select('malls.name','malls.company_id','photos.photo_path')->limit(10)->get();
        return response()->json($data);
    }

  public function getMallDetails(Request $request){

        $mall_data = Mall::join('photos','malls.company_id','=','photos.company_id')
                          ->where('malls.company_id',$request->company_id)
                          ->select('malls.id','malls.name','malls.company_id','photos.photo_path')->get();
        return response()->json($mall_data);

  }
  public function show_retailers(Request $request){
      $mall_id= Mall::where('company_id',$request->company_id)->get();

      foreach ($mall_id as $value){
          $retailers= Service_provider::join('photos','service_providers.company_id','photos.company_id')
                      ->where('service_providers.mall_id',$value->id)
                      ->select('service_providers.id','service_providers.floor_no','service_providers.office_no','service_providers.name','photos.photo_path')->get();
          return response()->json($retailers);
      }

  }

  public function about_mall(Request $request){
      $mall_Data = Mall::join('addresses','malls.company_id','=','addresses.company_id')
                   ->join('phones','malls.company_id','=','phones.company_id')
                   ->where('malls.company_id',$request->company_id)
                  ->get();

      return response()->json($mall_Data);
  }

  public function amenities(Request $request){
      $amenities= Amenity::where('company_id',$request->company_id)->get();
      return response()->json($amenities);
  }

  public function  get_events(Request $request){
     $events= Event::where('company_id',$request->company_id)->get();
     return response()->json($events);
  }
  public function get_news(Request $request){
      $news= News::where('company_id',$request->company_id)->get();
      return response()->json($news);
  }


}
