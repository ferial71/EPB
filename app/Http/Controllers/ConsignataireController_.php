<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consignataire;

class ConsignataireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $arr['consignataire'] = Consignataire::all();
        return view('Consignataire.annonce_navire.index')->with($arr);
    }

}
