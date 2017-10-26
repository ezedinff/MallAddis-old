<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    //
    protected $fillable=['company_id','name','photo_path','description','lat','lon'];
}
