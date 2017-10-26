<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    //
    protected $fillable=['company_id','category_id','product_photo','availability','quantity','price','description'];
}
