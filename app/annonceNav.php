<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class annonceNav extends Model
{





    protected $fillable = [
            'navire_id',
            'consignataire_id',
            'armateur_id',
            'cargaison_id',
            'date_dentree',
            'IMO',
            'LOA',
            'BEAM',
            'DWT',
            'DRAFT'
    ];

    protected $table = 'annonce_navs';

    public function navire()
    {
        return $this->belongsTo('App\navire');
    }

    protected function consignataire()
    {
        return $this->belongsTo('App/consignataire');
    }

    protected function cargaison()
    {
        return $this->hasMany('App/cargaison');
    }



}
