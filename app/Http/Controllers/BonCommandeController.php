<?php

namespace App\Http\Controllers;

use App\formulaire;
use App\Notifications\NouveauFormulaire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonCommandeController extends Controller
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

        $formulaires = formulaire::where('titre', 'Bon de commande')->latest('id')->paginate(10); //show only 5 items at a time in descending order
        return view('formulaires/bon_de_commandes.index', compact('formulaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('formulaires/bon_de_commandes.create');
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
            //'champs.imo' => 'required|numeric',
            'champs.poids' => 'required|numeric',
            'champs.objet' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.provenance' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.date' => 'required|date',
            ]);
        $formulaire = formulaire::create($request->all());
        $formulaire->titre = 'Bon de commande';
        $formulaire->user_id = Auth::id();
        $formulaire->save();
        $users = User::permission('bon_de_commande-validate')->get();
        foreach ($users as $user){
            $user->notify(new NouveauFormulaire(Auth::id(),$formulaire));
        }


        return redirect()->route('bon_de_commandes.index');
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
        return view('formulaires/bon_de_commandes.show',compact('formulaire'));
    }


    public function validatation(Request $request,$id)
    {
        $formulaire =formulaire::findOrFail($id);

        //vérifier si une demande de validation


        if ($formulaire->valide!=null)
        {
            return redirect()->back()->with('alert', 'Cette formulaire a été déja validé!');

        }
        elseif ($request->valide)
        {
            $formulaire->valide ='valide';
            $formulaire->update();

            return redirect()->route('bon_de_commandes.index')->with('alert', 'Formulaire validé!');
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

        return view('formulaires/bon_de_commandes.edit', compact('formulaire'));
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

        return redirect()->route('formulaires/bon_de_commandes.index')
            ->with('flash_message',
                'formulaires/bon_de_commandes successfully deleted');
    }
}
