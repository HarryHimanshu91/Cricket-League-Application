<?php

namespace App;
use App\Match;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function match()
    {
       return $this->belongsTo(Match::class,'id');
    }
}
