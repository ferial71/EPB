<?php

namespace App\Http\Controllers;

use App\annonce_navire;
use App\armateur;
use App\cargaison;
use App\consignataire;
use App\formulaire;
use App\navire;
use Illuminate\Http\Request;
use Auth;
use phpDocumentor\Reflection\Types\Null_;
use Session;

class AnnonceNavireController extends Controller

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
        $formulaires = formulaire::where('titre', 'annonce_navire')->latest('id')->paginate(10); //show only 5 items at a time in descending order
        return view('formulaires/annonce_navires.index', compact('formulaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('formulaires/annonce_navires.create');
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

        $formulaire = formulaire::create($request->all());
        $formulaire->titre ='annonce_navire';
        $formulaire->save();

        return redirect()->route('formulaires/annonce_navires.index');
//        //Validating title and body field
//        $this->validate($request, [
//            'date_dentree' => 'required',
//            'imo' => 'required',
//          /*  'LOA' => 'required',
//            'BEAM' => 'required',
//            'DWT' => 'required',
//            'DRAFT' => 'required',*/
//
//        ]);
//
//        //armateur
//
//        $nom_armateur =$request['nom_armateur'];//
//
//        //navire
//        $pavillon =$request['pavillon'];//
//        $type =$request['type']; //
//        $nom_navire = $request['nom_navire']; //
//        $longeur = $request['longeur'];
//        $largeur = $request['largeur'];
//        $imo = $request['imo'];
//        $port_lourd = $request['port_lourd'];
//        $tirant_eau = $request['tirant_eau'];
//        //$poids = $request['poids'];
//
//        //consignataire
//        $nom_consignataire =$request['nom_consignataire'];
//
//        //cargaison
//        $tonnage =$request['tonnage'];
//
//        //annonce_navire
//        $date_dentree = $request['date_dentree'];
//
//
//        //cree armateur
//        $armateur = armateur::where('nom', '=', $nom_armateur )->first();
//        if ($armateur=== null) {
//            $armateur = new armateur();
//            $armateur->nom = $nom_armateur;
//            $armateur->save();
//        }
//
//        //$armateur =armateur::create($request->only('nom_armateur'));
//
//
//        //création de navire
//        $navire = navire::where('nom', '=', $nom_navire )->first();
//        if ($navire === null){
//            $navire = new navire();
//            $navire->armateur_id = $armateur->id;
//            $navire->pavillon = $pavillon;
//            $navire->type = $type;
//            $navire->nom = $nom_navire;
//            $navire->longeur = $longeur;
//            $navire->largeur = $largeur;
//            $navire->imo = $imo;
//            $navire->port_lourd= $port_lourd;
//            $navire->tirant_eau= $tirant_eau;
//            //$navire->poids= $poids;
//            $navire->save();
//        }
//
//
//
//
//        //création de con
//
//        $consignataire = consignataire::where('nom','=',$nom_consignataire)->first();
//        if ($consignataire === null){
//            $consignataire =new consignataire();
//            $consignataire->nom = $nom_consignataire;
//            $consignataire->save();
//        }
//
//
//        //creation cargo
//
//        $cargo =cargaison::where('tonnage','=',$tonnage)->first();
//        if ($cargo===null){
//            $cargo = new cargaison();
//            $cargo->tonnage = $tonnage;
//            $cargo->save();
//        }
//
//        //creation d l'annonce_navire
//
//        $annonce_navire =new annonce_navire();
//        $annonce_navire->navire_id =$navire->id;
//        $annonce_navire->date_dentree =$date_dentree;
//        $annonce_navire->consignataire_id = $consignataire->id;
//        $annonce_navire->cargaison_id =$cargo->id;
//        $annonce_navire->armateur_id =$armateur->id;
//        $annonce_navire->save();
//        //$annonce_navire = annonce_navire::create($request->only( 'date_dentree', 'imo','loa','beam','dwt','draft'));
//
//
//
//
//
//        //Display a successful message upon save
//        return redirect()->route('annonce_navire.index')
//            ->with('flash_message', 'Annonce navire pour le ,
//             ' . $annonce_navire->date_entree . ' created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
//        $annonce_navire = annonce_navire::findOrFail($id); //Find post of id = $id
//
//        return view('annonce_navire.show', compact('annonce_navire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $formulaire = formulaire::findOrFail($id);

        return view('formulaires/annonce_navires.edit', compact('formulaire'));
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
//        $this->validate($request, [
//            'navire_id'  => 'required',
//            'date_dentree' => 'required',
//            'IMO' => 'required',
//            'LOA' => 'required',
//            'BEAM' => 'required',
//            'DWT' => 'required',
//            'DRAFT' => 'required',
//        ]);
//
//        $annonce_navire = annonce_navire::findOrFail($id);
//        $annonce_navire->navire_id = $request->input('navire_id');
//        $annonce_navire->date_dentree = $request->input('date_dentree');
//        $annonce_navire->IMO = $request->input('IMO');
//        $annonce_navire->LOA = $request->input('LOA');
//        $annonce_navire->BEAM = $request->input('BEAM');
//        $annonce_navire->DWT = $request->input('DWT');
//        $annonce_navire->DRAFT = $request->input('DRAFT');
//        $annonce_navire->save();
//
//        return redirect()->route('annonce_navire.show',
//            $annonce_navire->id)->with('flash_message',
//            'Annonce navire pour le , ' . $annonce_navire->date_dentree . ' updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $formulaire = formulaire::findOrFail($id);
        $formulaire->delete();

        return redirect()->route('formulaires/annonce_navires.index')
            ->with('flash_message',
                'annonce navire successfully deleted');

    }
}


    /*public function __construct()
    {
        $this->middleware('auth');
    }*/


    /*public function index()
    {
        $arr['annonce_navire'] = annonce_navire::all();
        return view('Consignataire.annonce_navire.index')->with($arr);
    }*/


