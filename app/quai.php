<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quai extends Model
{
    public function escale()
    {
        return $this->hasOne('App\escale');
    }
}
