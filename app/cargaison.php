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

    protected function annonceNav()
    {
        return $this->hasOne('App\annonceNav');
    }

    protected function marchandise()
    {
        return $this->hasMany('App\marchandise');
    }
}
