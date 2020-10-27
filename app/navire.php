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
        return $this->hasMany('App\AnnonceNavire');
    }

    public function getCargaison($id)
    {

        return cargaison::where('navire_id',$id)->first();
    }
    public function getAnnonceNavire($id)
    {
//        dd(AnnonceNavire::where('navire_id',$id)->first()->id);
        return AnnonceNavire::where('navire_id',$id)->first();
    }
    public  function armateur()
    {
        return $this->belongsTo('App/armateur');

    }

    public function escale()
    {
        return $this->hasOne('App\escale');
    }

}
