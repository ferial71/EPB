<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marchandise extends Model
{
    protected $fillable =[
        'name',
        'poids',
        'nature',
        'mode_conditionnement',
        'cargaison_id'
    ];

    public function cargaison()
    {
        return $this->belongsTo('App/cargaison');
    }
}
