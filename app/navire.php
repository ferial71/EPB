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

    public function annonce_navire()
    {
        return $this->hasMany('App\annonce_navire');
    }
    public  function armateur()
    {
        return $this->belongsTo('App/armateur');

    }

}
