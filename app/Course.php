<?php

namespace App;

use App\BaseModel;

class Course extends BaseModel
{
    //

    protected $fillable = ['name'];

    public function students(){
        return $this->hasMany('App\Student');
    }
}
