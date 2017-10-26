<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    //
    protected $fillable=['company_id','name','description','tin_no','lat','lon','floors_no'];
}
