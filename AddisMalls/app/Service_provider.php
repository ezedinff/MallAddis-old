<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_provider extends Model
{
    //
    protected $fillable=['company_id','mall_id','name','description','tin_no','category_id','floor_no','office_no'];
}
