<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consignataire extends Model
{

    protected $fillable = [
        'user_id',
        'adresse_id',
        'nom',
        'prenom',
        'numero_tel',
        'numero_tel_fix',
        'numero_fax'
    ];
    protected function adresse()
    {
        return $this->hasOne('App/adresse');

    }

    protected function user()
    {
        return $this->belongsTo('App/user');

    }

    protected function annonceNav()
    {
        return $this->hasMany('App/annonceNav');
    }

    protected function manifeste()
    {
        return $this->hasMany('App/manifeste');

    }
}
