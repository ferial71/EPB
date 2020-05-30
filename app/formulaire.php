<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class formulaire extends Model
{

    protected $fillable = [
        'titre',
      'champs',
      'valide'
    ];
    protected $casts = [
        'champs' => 'array',
        'valide' => 'boolean'
    ];
    public function user()
    {
        return $this->belongsTo('App/User');
    }
}
