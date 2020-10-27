<?php

namespace App\Http\Controllers;



use App\armateur;
use App\formulaire;
use App\navire;
use App\Notifications\FormulaireValider;
use App\Notifications\NouveauFormulaire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Monarobase\CountryList\CountryListFacade as Countries;

class PosteQuaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {


        //tout les formulaire avec le titre 'poste_quai'


        $formulaires = formulaire::where('titre', 'Demande de poste à quai')->latest('id')->paginate(10);
        if ($formulaires->total()==0){
            $array=null;
        }
        else{
            $array=array_keys($formulaires[0]->champs);
        }


        return view('formulaires/poste_quais.index', compact('formulaires','array'));
    }
    public function navire($nom = 0 )
    {
        $nom = str_replace('_', ' ', $nom);

        $navire= navire::where('id','1')->first();


        return response()->json($navire);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $navires = navire::all();
        $users_trans = User::role('transitaire')->get();
        $users_cons = User::role('consignataire')->get();
        $armateurs =armateur::all();
        $countries = Countries::getList('en');


        return view('formulaires/poste_quais.create',compact('navires','users_trans','armateurs','users_cons','countries'));
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
            'champs.nom_navire' => ['required', 'regex:/^([\w0-9]+(,|[\._-])?\s?)*\s?[\w0-9]*$/'],
            'champs.transitaire' => ['required', 'regex:/^([\w0-9]+(,|[\._-])?\s?)*\s?[\w0-9]*$/'],
            'champs.armateur' => ['required', 'regex:/^([\w0-9]+(,|[\._-])?\s?)*\s?[\w0-9]*$/'],
            'champs.consignataire' => ['required', 'regex:/^([\w0-9]+(,|[\._-])?\s?)*\s?[\w0-9]*$/'],
            'champs.provenance' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.date' => 'required|date',
            'champs.marchandise' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.m_conditionnement' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.tonnage' => 'required|numeric',
            'champs.type' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.pavillon' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.cargaison' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.imo' => 'required|numeric',
            'champs.rade' => 'required|numeric',
            'champs.longeur_navire' => 'required|numeric',
            'champs.largeur_navire' => 'required|numeric',
            'champs.port_lourd' => 'required|numeric',
            'champs.tirant_eau' => 'required|numeric',
        ]);


        $formulaire = formulaire::create($validatedData);
        $formulaire->titre = 'Demande de poste à quai';
        $formulaire->url= 'poste_quais';
        $formulaire->user_id = Auth::id();
        $formulaire->save();

        $users = User::permission('demande_de_poste_a_quai-validate')->get();
        foreach ($users as $user){
            $user->notify(new NouveauFormulaire(Auth::id(),$formulaire));
        }

        return redirect()->route('poste_quais.index');
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
        return view('formulaires/poste_quais.show',compact('formulaire'));
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


        return view('formulaires/poste_quais.edit', compact('formulaire'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function validatation(Request $request,$id)
    {
        $formulaire =formulaire::findOrFail($id);

        //vérifier si une demande de validation


        if ( $formulaire->valide != null )
        {
            return redirect()->back()->with('alert', 'Cette formulaire a été déja validé!');


        }
        elseif ( $request->valide  )
        {
            $formulaire->valide = 1 ;
            $formulaire->update();
            $user = User::findOrFail($formulaire->user_id);
            $user->notify(new FormulaireValider(Auth::id(),$formulaire));



            return redirect()->route('poste_quais.index')->with('alert', 'Formulaire validé!');
        }



    }


    public function update(Request $request, $id)
    {

        $formulaire = formulaire::findOrFail($id);


        // création d'un variable champs pour stocker les valeurs modifier avec les valeurs originale
        //$array_key représente les valeurs index de champs et request


        $champs = $formulaire->champs;
        $array = $request->except('_token','_method');
        $array_key = array_keys($request->except('_token','_method'));

        for($i=0;$i<sizeof($array_key);$i++)
        {
            if ($array[$array_key[$i]])
            {
                $champs[$array_key[$i]] =$array[$array_key[$i]];
            }
        }


        // mise à jour de la table formulaires avec les nouveaux valeurs $champs


        DB::table('formulaires')
            ->where('id', $id)
            ->update(['champs' => $champs
                ]);


        //redirection vers le tableau des demande de poste à quai

        return redirect()->route('poste_quais.index');
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

        return redirect()->route('poste_quais.index')
            ->with('flash_message',
                'Annonce navire successfully deleted');
    }
}
