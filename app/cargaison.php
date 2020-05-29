<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cargaison extends Model
{

    protected $fillable = [
        'tonnage',
        'nombreColis',
        'navire_id'
        ];

    protected function annonce_navire()
    {
        return $this->hasOne('App\annonce_navire');
    }

    protected function marchandise()
    {
        return $this->hasMany('App\marchandise');
    }
}
