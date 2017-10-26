<?php

namespace App\Api\V1\Controllers;

use App\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    //

    public function getTops(){
          $tops = Grade::all();

          return response()->json($tops);
    }
}
