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

    protected function consignataire()
    {

        return $this->belongsTo('App\consignataire');
    }
}
