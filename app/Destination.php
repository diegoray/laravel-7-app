<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    public function class()
    {
        return $this->belongsTo('App\Classes');
    }
}
