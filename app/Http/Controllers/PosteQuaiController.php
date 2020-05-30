<?php

namespace App\Http\Controllers;

use App\annonce_navire;
use App\dpquai;
use App\formulaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $formulaires = formulaire::where('titre', 'poste_quai')->latest('id')->paginate(10); //show only 5 items at a time in descending order
        if ($formulaires->total()==0){
            $array=null;


        }
        else{
            $array=array_keys($formulaires[0]->champs);
        }



        return view('formulaires/poste_quais.index', compact('formulaires','array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('formulaires/poste_quais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $formulaire = formulaire::create($request->all());
        $formulaire->titre = 'poste_quai';
        $formulaire->user_id = Auth::id();
        $formulaire->save();


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
     * @return \Illuminate\Http\Response
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

    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {


    }

    public function update(Request $request, $id)
    {

        $formulaire = formulaire::findOrFail($id);

        //vérifier si une demande de validation
        if ($request->input('valide')!=null && $formulaire->valide)
        {
            return redirect()->route('poste_quais.show',$id)->with('alert', 'Cette formulaire a été déja validé!');

        }elseif($request->input('valide')){
            $formulaire->valide =$request->valide;
            $formulaire->update();
        }

//        $nom_nav =$request['nom_navire'];
//        if ($nom_nav ===null)
//        {
//            $nom_nav = $formulaire->champs['nom_navire'];
//        }

        // création d'un variable champ pour stoqué les valeurs modifier avec les valeurs originale
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
        // maj de la table formulaires avec les nouveaux valeurs $champs
        DB::table('formulaires')
            ->where('id', $id)
            ->update(['champs' => $champs
                ]);

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
