<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manifeste extends Model
{

    protected $fillable = [
        'natureEscale',
        'dEstimation',
        'dCreation',
        'dValidation',
        'valide',
        'demande_poste_id',
        'cargaisons_id'
    ];

    public function consignataire()
    {
        return $this->belongsTo('App/consignataire');
    }
    public function dpquai()
    {
        return $this->belongsTo('App/dpquai');
    }

    public function cargaison()
    {
        return $this->hasMany('App/cargaison');
    }

}
