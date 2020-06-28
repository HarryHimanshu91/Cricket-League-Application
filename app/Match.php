<?php

namespace App;

use App\Location;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function location()
    {
       return $this->hasOne(Location::class,'id','location_id');
    }
}
