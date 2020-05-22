<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class formulaire extends Model
{


    protected $casts = [
        'champ' => 'array',
        'réponce' => 'array'
    ];
}
