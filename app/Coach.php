<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function team()
    // {
    //     return $this->hasOne('App\Team');
    // }
}
