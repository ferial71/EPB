<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected function adresse()
    {
        return $this->hasOne('App\adresse');
    }
    protected function telephone()
    {
        return $this->hasOne('App\Telephone');
    }

}
