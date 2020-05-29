<?php

namespace App\Http\Controllers;

use App\formulaire;
use Illuminate\Http\Request;

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
        $formulaires = formulaire::where('titre', 'bon_a_enlever')->latest('id')->paginate(10); //show only 5 items at a time in descending order

        return view('formulaires/bon_a_enlevers.index', compact('formulaires'));
    }

    public function create()
    {
        return view('formulaires/bon_a_enlevers.create');
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
        $formulaire->titre ='bon_a_enlever';
        $formulaire->save();

        return redirect()->route('formulaires/bon_a_enlevers.index');
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
