<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_ads extends Model
{
    //
    protected $fillable=['company_id','category_id','caption','product_photo','price','description'];
}
