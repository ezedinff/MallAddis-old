<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    protected $fillable = ['company_id','opening','closing'];
}
