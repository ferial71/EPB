<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cpn extends Model
{
    public function quai()
    {
        return $this->belongsTo('App\quai');
    }

    public function getQuai($id)
    {
        return quai::where('id',$id)->first();
    }
    public function navire()
    {
        return $this->belongsTo('App\navire');
    }

    public function getNavire($id)
    {
        return navire::where('id',$id)->first();
    }
}
