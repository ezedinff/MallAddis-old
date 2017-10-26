<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyDemand extends Model
{
    //
    protected $fillable = ['company_id','brand_name_id','quantity'];
}
