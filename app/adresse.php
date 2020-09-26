<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adresse extends Model
{
    protected $fillable =['rue',
            'cite',
            'etat',
            'paye',
            'code_postale'
    ];


    protected function client()
    {
        return $this->belongsTo('App\client');
    }

}
