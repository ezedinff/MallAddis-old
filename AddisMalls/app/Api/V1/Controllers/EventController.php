<?php

namespace App\Api\V1\Controllers;



use App\Event;
use Dingo\Api\Http\Request;
 use Carbon\Carbon;
class EventController extends Controller
{
    //

    public function getEvents(Request $request){

        /*$events= Event::where('company_id',$request->company_id)->get();

        return response()->json($events);*/
        echo Carbon::now()->addHours(2)->addMinutes(12);
    }
}
