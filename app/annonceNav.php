<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class annonceNav extends Model
{





    protected $fillable = [
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

}
