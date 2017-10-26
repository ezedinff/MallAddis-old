<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSupplierCategory extends Model
{
    //
    protected $fillable = ['name','sub_cat_id','supplier_id','type_id','pack_size_id','description','photo_path'];
}
