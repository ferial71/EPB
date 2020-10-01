<?php

namespace App\Http\Controllers;

use App\armateur;
use App\formulaire;
use App\marchandise;
use App\navire;
use App\Notifications\FormulaireValider;
use App\Notifications\NouveauFormulaire;
use App\User;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monarobase\CountryList\CountryListFacade as Countries;
class BonEnleverController extends Controller
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
        $formulaires = formulaire::where('titre', 'Bon à enlever')->latest('id')->paginate(10); //show only 5 items at a time in descending order

        return view('formulaires/bon_a_enlevers.index', compact('formulaires'));
    }

    public function create()
    {

        $navires = navire::all();
        $users_trans = User::role('transitaire')->get();
        $clients = client::all();
//        $armateurs =armateur::all();
        $countries = Countries::getList('en');
        $marchandise = marchandise::all();


        return view('formulaires/bon_a_enlevers.create',compact('navires','users_trans','clients','marchandise','countries'));
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
            'champs.transitaire' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.receptionnaire' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.marchandise' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.date' => 'required|date',
            'champs.date_enlever' => 'required|date',
            'champs.date_declaration' => 'required|date',
            'champs.m_conditionnement' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.p_marchandise' => 'required|numeric',
            'champs.nb_unite' => 'required|numeric',
            'champs.num_declaration' => 'required|numeric',
        ]);

        $formulaire = formulaire::create($request->all());
        $formulaire->titre ='Bon à enlever';
        $formulaire->url= 'bon_a_enlevers';
        $formulaire->save();
        $users = User::permission('bon_a_enlever-validate')->get();
        foreach ($users as $user){
            $user->notify(new NouveauFormulaire(Auth::id(),$formulaire));
        }

        return redirect()->route('bon_a_enlevers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formulaire= formulaire::findOrFail($id);
        return view('formulaires/bon_a_enlevers.show',compact('formulaire'));
    }
    public function validatation(Request $request,$id)
    {
        $formulaire =formulaire::findOrFail($id);

        //vérifier si une demande de validation


        if ( $formulaire->valide != null )
        {
            return redirect()->back()->with('alert', 'Cette formulaire a été déja validé!');


        }
        else
        {
            $formulaire->valide = 1 ;
            $formulaire->update();
            $user = User::findOrFail($formulaire->user_id);
            $user->notify(new FormulaireValider(Auth::id(),$formulaire));

            return redirect()->route('bon_a_enlevers.index')->with('alert', 'Formulaire validé!');
        }



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

        return view('formulaires/bon_a_enlevers.edit', compact('formulaire'));
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

        return redirect()->route('formulaires/bon_a_enlevers.index')
            ->with('flash_message',
                'formulaires/bon_a_enlevers successfully deleted');
    }
}
