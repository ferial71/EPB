<?php

namespace App\Http\Controllers;

use App\Client;
use App\emplacement;
use App\Formulaire;
use App\marchandise;
use App\navire;
use App\Notifications\FormulaireValider;
use App\Notifications\NouveauFormulaire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monarobase\CountryList\CountryListFacade as Countries;

class constatVueQuaisController extends Controller
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
        //C:\Users\feria\project\resources\views\formulaires\constat_de_vue_a_quais\create.blade.php
        $formulaires = formulaire::where('titre', 'Constat de vue à quais')->latest('id')->paginate(10); //show only 5 items at a time in descending order

        return view('formulaires/constat_de_vue_a_quais.index', compact('formulaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $emplacements = emplacement::all();
        $marchandise = marchandise::all();


        return view('formulaires/constat_de_vue_a_quais.create',compact('emplacements','marchandise'));
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
            'champs.poids' => 'required|numeric',
        ]);

        $formulaire = formulaire::create($request->all());
        $formulaire->titre ='Constat de vue à quais';
        $formulaire->url= 'constat_de_vue_a_quais';
        $formulaire->save();
        $users = User::role('Transitaire')->get();
        foreach ($users as $user){
            $user->notify(new NouveauFormulaire(Auth::id(),$formulaire));
        }

        return redirect()->route('constat_de_vue_a_quais.index');
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
        return view('formulaires/constat_de_vue_a_quais.show',compact('formulaire'));
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

            return redirect()->route('constat_de_vue_a_quais.index')->with('alert', 'Formulaire validé!');
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

        return view('formulaires/constat_de_vue_a_quais.edit', compact('formulaire'));
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

        return redirect()->route('formulaires/constat_de_vue_a_quais.index')
            ->with('flash_message',
                'formulaires/constat_de_vue_a_quais successfully deleted');
    }

}
