<?php

namespace App\Http\Controllers;

use App\formulaire;
use App\Notifications\FormulaireValider;
use App\Notifications\NouveauFormulaire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManifesteController extends Controller
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
        $formulaires = formulaire::where('titre', '=', 'Manifeste')->orderby('id', 'desc')->paginate(10); //show only 5 items at a time in descending order

        return view('formulaires/manifestes.index', compact('formulaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('formulaires/manifestes.create');
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
            'champs.nature_escale' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.provenance' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.date' => 'required|date',
            'champs.receptionnaire' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.marchandise' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.n_marchandise' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.m_conditionnement' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'champs.poids' => 'required|numeric',
            'champs.poids_bl' => 'required|numeric',
            'champs.nb_colis' => 'required|numeric',
        ]);
        $formulaire = formulaire::create($request->all());
        $formulaire->titre = 'Manifeste';
        $formulaire->url= 'manifestes';
        $formulaire->user_id = Auth::id();
        $formulaire->save();
        $users = User::permission('manifeste-validate')->get();
        foreach ($users as $user){
            $user->notify(new NouveauFormulaire(Auth::id(),$formulaire));
        }

        return redirect()->route('manifestes.index');
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
        return view('formulaires/manifestes.show',compact('formulaire'));
    }


        public function validatation(Request $request,int $id)
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


            return redirect()->route('manifestes.index')->with('alert', 'Formulaire validé!');
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

        return view('formulaires/manifestes.edit', compact('formulaire'));
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

        return redirect()->route('manifestes.index')
            ->with('flash_message',
                'manifeste successfully deleted');
    }
}
