<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transitaire extends Model
{
    protected function user()
    {
        return $this->belongsTo('App/user');

    }
}
