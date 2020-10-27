<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class escale extends Model
{
    public function navire()
    {
        return $this->belongsTo('App\navire');
    }

    public function getCargo($id_navire)
    {
        $users = DB::select('select * from navires where active = ?', [1]);
    }
    public function getNavire($id)
    {
        $navire =navire::where('id',$id)->first();
        return $navire;
    }
    public function getNavireNom($id)
    {
        $navire =navire::where('id',$id)->first();
        return $navire->nom;
    }

    public function getQuaiNum($id)
    {
        $quai = quai::where('id',$id)->first();
        return $quai->numero;
    }
    public function quai()
    {
        return $this->belongsTo('App\quai');
    }


}
