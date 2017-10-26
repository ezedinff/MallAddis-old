<?php

namespace App\Api\V1\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function getCategories(){
        $category= Category::all();
        return response()->json($category);
    }
}
