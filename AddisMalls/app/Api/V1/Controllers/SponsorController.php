<?php

namespace App\Api\V1\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use JWTAuth;
use Dingo\Api\Routing\Helpers;
class SponsorController extends Controller
{
    //

    public function getSponsors(){
        $sponser = Sponsor::all();
        return response()->json($sponser);
    }

}
