<?php

namespace App;

use App\BaseModel;

class Student extends BaseModel
{
    //

    protected $fillable = [
        'firstName',
        'lastName',
        'year'
    ];

    public function course(){
        return $this->belongsTo('App\Course');
    }
}
