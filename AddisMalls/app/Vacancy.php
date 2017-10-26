<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    //
    protected $fillable = ['company_id','job_title','job_category_id','salary','employment_type','qualifications','years_exp','description','deadline'];
}
