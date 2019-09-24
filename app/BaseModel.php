<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\UUIDable;

class BaseModel extends Model
{
    //
    use UUIDable;
}
