<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class annonceNav extends Model
{





    protected $fillable = [

           'navire_id',
            'date_dentree',
            'IMO',
            'LOA',
            'BEAM',
            'DWT',
            'DRAFT'
    ];

    protected $table = 'annonce_navs';

}
