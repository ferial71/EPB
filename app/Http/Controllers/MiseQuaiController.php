<?php

namespace App\Http\Controllers;

use App\formulaire;
use App\Notifications\NouveauFormulaire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MiseQuaiController extends Controller
{
    //formulaires/mise_a_quais

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
        $formulaires = formulaire::where('titre', 'Mise à quai')->latest('id')->paginate(10);

        //test si il y a au moins une formulaire si oui récupérer les index dans le tableau array
        //sinon tableau array est null
        if ($formulaires->total()==0){
            $array=null;
        }
        else{
            $array=array_keys($formulaires[0]->champs);
        }

        return view('formulaires/mise_a_quais.index', compact('formulaires','array'));

    }

    public function create()
    {
        return view('formulaires/mise_a_quais.create');
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
            'champs.marques' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.nb' => 'required|numeric',
            'champs.n_colis' => 'required|numeric',
            'champs.p_marchandise' => 'required|numeric',
        ]);

        $formulaire = formulaire::create($request->all());
        $formulaire->titre = 'Mise à quai';
        $formulaire->save();
        $users = User::permission('mise_a_quai-validate')->get();
        foreach ($users as $user){
            $user->notify(new NouveauFormulaire(Auth::id(),$formulaire));
        }


        return redirect()->route('mise_a_quais.index');
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
        return view('formulaires/mise_a_quais.show',compact('formulaire'));
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

            return redirect()->route('mise_a_quais.index')->with('alert', 'Formulaire validé!');
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

        return view('formulaires/mise_a_quais.edit', compact('formulaire'));
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

        return redirect()->route('formulaires/mise_a_quais.index')
            ->with('flash_message',
                'formulaires/mise_a_quais successfully deleted');
    }
}
