<?php

namespace App\Http\Controllers;

use App\annonceNav;
use App\armateur;
use App\cargaison;
use App\consignataire;
use App\navire;
use Illuminate\Http\Request;
use Auth;
use phpDocumentor\Reflection\Types\Null_;
use Session;

class AnnonceNavController extends Controller

{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function index()
    {
        $annonceNavs = annonceNav::orderby('id', 'desc')->paginate(10); //show only 5 items at a time in descending order

        return view('annonceNav.index', compact('annonceNavs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('annonceNav.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        //Validating title and body field
        $this->validate($request, [
            'date_dentree' => 'required',
            'imo' => 'required',
          /*  'LOA' => 'required',
            'BEAM' => 'required',
            'DWT' => 'required',
            'DRAFT' => 'required',*/

        ]);

        $nom =$request['nom'];

        //armateur

        $nom_armateur =$request['nom_armateur'];//

        //navire
        $pavillon =$request['pavillon'];//
        $type =$request['type']; //
        $nom_navire = $request['nom_navire']; //
        $longeur = $request['longeur'];
        $largeur = $request['largeur'];
        $imo = $request['imo'];
        $port_lourd = $request['port_lourd'];
        $tirant_eau = $request['tirant_eau'];
        //$poids = $request['poids'];

        //consignataire
        $nom_consignataire =$request['nom_consignataire'];

        //cargaison
        $tonnage =$request['tonnage'];

        //annonceNav
        $date_dentree = $request['date_dentree'];


        //cree armateur
        $armateur = armateur::where('nom', '=', $nom_armateur )->first();
        if ($armateur=== null) {
            $armateur = new armateur();
            $armateur->nom = $nom_armateur;
            $armateur->save();
        }

        //$armateur =armateur::create($request->only('nom_armateur'));


        //création de navire
        $navire = navire::where('nom', '=', $nom_navire )->first();
        if ($navire === null){
            $navire = new navire();
            $navire->armateur_id = $armateur->id;
            $navire->pavillon = $pavillon;
            $navire->type = $type;
            $navire->nom = $nom_navire;
            $navire->longeur = $longeur;
            $navire->largeur = $largeur;
            $navire->imo = $imo;
            $navire->port_lourd= $port_lourd;
            $navire->tirant_eau= $tirant_eau;
            //$navire->poids= $poids;
            $navire->save();
        }




        //création de con

        $consignataire = consignataire::where('nom','=',$nom_consignataire)->first();
        if ($consignataire === null){
            $consignataire =new consignataire();
            $consignataire->nom = $nom_consignataire;
            $consignataire->save();
        }


        //creation cargo

        $cargo =cargaison::where('tonnage','=',$tonnage)->first();
        if ($cargo===null){
            $cargo = new cargaison();
            $cargo->tonnage = $tonnage;
            $cargo->navire_id = $navire->id;
            $cargo->save();
        }

        //creation d l'annonceNav

        $annonceNav =new annonceNav();
        $annonceNav->navire_id =$navire->id;
        $annonceNav->date_dentree =$date_dentree;
        $annonceNav->consignataire_id = $consignataire->id;
        $annonceNav->cargaison_id =$cargo->id;
        $annonceNav->armateur_id =$armateur->id;
        $annonceNav->save();
        //$annonceNav = annonceNav::create($request->only( 'date_dentree', 'imo','loa','beam','dwt','draft'));





        //Display a successful message upon save
        return redirect()->route('annonceNav.index')
            ->with('flash_message', 'Annonce navire pour le ,
             ' . $annonceNav->date_entree . ' created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $annonceNav = annonceNav::findOrFail($id); //Find post of id = $id

        return view('annonceNav.show', compact('annonceNav'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $annonceNav = annonceNav::findOrFail($id);

        return view('annonceNav.edit', compact('annonceNav'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'navire_id'  => 'required',
            'date_dentree' => 'required',
            'IMO' => 'required',
            'LOA' => 'required',
            'BEAM' => 'required',
            'DWT' => 'required',
            'DRAFT' => 'required',
        ]);

        $annonceNav = annonceNav::findOrFail($id);
        $annonceNav->navire_id = $request->input('navire_id');
        $annonceNav->date_dentree = $request->input('date_dentree');
        $annonceNav->IMO = $request->input('IMO');
        $annonceNav->LOA = $request->input('LOA');
        $annonceNav->BEAM = $request->input('BEAM');
        $annonceNav->DWT = $request->input('DWT');
        $annonceNav->DRAFT = $request->input('DRAFT');
        $annonceNav->save();

        return redirect()->route('annonceNav.show',
            $annonceNav->id)->with('flash_message',
            'Annonce navire pour le , ' . $annonceNav->date_dentree . ' updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $annonceNav = annonceNav::findOrFail($id);
        $annonceNav->delete();

        return redirect()->route('annonceNav.index')
            ->with('flash_message',
                'Annonce navire successfully deleted');

    }
}


    /*public function __construct()
    {
        $this->middleware('auth');
    }*/


    /*public function index()
    {
        $arr['annoncenav'] = annonceNav::all();
        return view('Consignataire.annonceNav.index')->with($arr);
    }*/


