<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class navire extends Model
{



    protected $fillable = [
        'nom',
        'imo',
        'loa',
        'beam',
        'dwt',
        'draft',
        'type',
        'pavillon'
    ];

    public function annonceNav()
    {
        return $this->hasMany('App\annonceNav');
    }
    public  function armateur()
    {
        return $this->belongsTo('App/armateur');

    }

}
