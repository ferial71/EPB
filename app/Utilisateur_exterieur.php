<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur_exterieur extends Model
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
        return $this->belongsTo('App\User');

    }

    protected function annonce_navire()
    {
        return $this->hasMany('App/annonce_navire');
    }

    protected function manifeste()
    {
        return $this->hasMany('App/manifeste');

    }


}
