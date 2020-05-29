<?php

namespace App\Http\Controllers;

use App\formulaire;
use Illuminate\Http\Request;

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
        $formulaires = formulaire::where('titre', 'mise_a_quai')->latest('id')->paginate(10); //show only 5 items at a time in descending order

        return view('formulaires/mise_a_quais.index', compact('formulaires'));
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
        $formulaire = formulaire::create($request->all());
        $formulaire->titre = 'mise_a_quai';
        $formulaire->save();


        return redirect()->route('formulaires/mise_a_quais.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
