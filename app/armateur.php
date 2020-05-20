<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class armateur extends Model
{
    protected $fillable =[
        'nom',
        'nationalite'
    ];

    protected function navire()
    {
        return $this->hasMany('App/navire');
    }
}
