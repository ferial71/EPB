<?php

namespace App\Http\Controllers;

use App\armateur;
use App\client;
use App\formulaire;
use App\navire;
use App\Notifications\FormulaireValider;
use App\Notifications\NouveauFormulaire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monarobase\CountryList\CountryListFacade as Countries;

class BonDelivrerController extends Controller
{

    //formulaires/bon_a_delivrers

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
        $formulaires = formulaire::where('titre', '=', 'Bon à delivrer')->orderby('id', 'desc')->paginate(10); //show only 5 items at a time in descending order

        return view('formulaires/bon_a_delivrers.index', compact('formulaires'));
    }

    public function create()
    {
        $navires = navire::all();
        $users_trans = User::role('transitaire')->get();
        $clients = client::find(1);
        $armateurs =armateur::all();
        $countries = Countries::getList('en');
        dd($clients->adresses());


        return view('formulaires/bon_a_delivrers.create',compact('navires','users_trans','clients','armateurs','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'champs.nom_navire' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.client' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.transitaire' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.client_adr' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.provenance' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.date' => 'required|date',
            'champs.marchandise' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.q_marchandise' => 'required|numeric',
            'champs.p_marchandise' => 'required|numeric',
            'champs.num_bl' => 'required|numeric',
            'champs.date_escale' => 'required|date',
            'champs.l_chargement' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.l_dechargement' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.nb_unite' => 'required|numeric',
            'champs.nb_poste' => 'required|numeric',
        ]);


        $formulaire = formulaire::create($validatedData);
        $formulaire->titre = 'Bon à delivrer';
        $formulaire->url= 'bon_a_delivrers';
        $formulaire->user_id=Auth::id() ;
        $formulaire->save();
        $users = User::permission('bon_a_delivrer-validate')->get();
        foreach ($users as $user){
            $user->notify(new NouveauFormulaire(Auth::id(),$formulaire));
        }


        return redirect()->route('bon_a_delivrers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $formulaire= formulaire::findOrFail($id);
        return view('formulaires/bon_a_delivrers.show',compact('formulaire'));
    }


    public function validatation(Request $request,$id)
    {
        $formulaire =formulaire::findOrFail($id);

        //vérifier si une demande de validation




            $formulaire->valide = 1 ;
            $formulaire->update();
            $user = User::findOrFail($formulaire->user_id);
            $user->notify(new FormulaireValider(Auth::id(),$formulaire));

            return redirect()->route('bon_a_delivrers.index')->with('alert', 'Formulaire validé!');




    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $formulaire = formulaire::findOrFail($id);

        return view('formulaires/bon_a_delivrers.edit', compact('formulaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $formulaire = formulaire::findOrFail($id);
        $formulaire->delete();

        return redirect()->route('bon_a_delivrers.index')
            ->with('flash_message',
                'bon_a_delivrers successfully deleted');
    }
}
