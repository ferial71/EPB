<?php

namespace App\Http\Controllers;

use App\annonceNav;
use App\consignataire;
use App\navire;
use Illuminate\Http\Request;
use Auth;
use Session;

class AnnonceNavController extends Controller

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
        $annonceNavs = annonceNav::orderby('id', 'desc')->paginate(10); //show only 5 items at a time in descending order

        return view('annonceNav.index', compact('annonceNavs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('annonceNav.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        //Validating title and body field
        $this->validate($request, [
            'date_dentree' => 'required',
            'imo' => 'required',
          /*  'LOA' => 'required',
            'BEAM' => 'required',
            'DWT' => 'required',
            'DRAFT' => 'required',*/

        ]);

        $nom =$request['nom'];
        $pavillon =$request['pavillon'];
        $type =$request['type'];


        $date_dentree = $request['date_dentree'];
        $imo = $request['imo'];
        $loa = $request['loa'];
        $beam = $request['beam'];
        $dwt = $request['dwt'];
        $draft = $request['draft'];

        $navire = navire::create($request->only('nom','pavillon','imo','loa','beam','dwt','draft','type'));




        $annonceNav =new annonceNav();
        $annonceNav->navire_id =$navire->id;
        $annonceNav->date_dentree =$date_dentree;
        $annonceNav->imo = $imo;
        $annonceNav->loa =$loa;
        $annonceNav->beam =$beam;
        $annonceNav->dwt = $dwt;
        $annonceNav->draft = $draft ;
        $annonceNav->save();
        //$annonceNav = annonceNav::create($request->only( 'date_dentree', 'imo','loa','beam','dwt','draft'));





        //Display a successful message upon save
        return redirect()->route('annonceNav.index')
            ->with('flash_message', 'Annonce navire pour le ,
             ' . $annonceNav->date_entree . ' created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $annonceNav = annonceNav::findOrFail($id); //Find post of id = $id

        return view('annonceNav.show', compact('annonceNav'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $annonceNav = annonceNav::findOrFail($id);

        return view('annonceNav.edit', compact('annonceNav'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'navire_id'  => 'required',
            'date_dentree' => 'required',
            'IMO' => 'required',
            'LOA' => 'required',
            'BEAM' => 'required',
            'DWT' => 'required',
            'DRAFT' => 'required',
        ]);

        $annonceNav = annonceNav::findOrFail($id);
        $annonceNav->navire_id = $request->input('navire_id');
        $annonceNav->date_dentree = $request->input('date_dentree');
        $annonceNav->IMO = $request->input('IMO');
        $annonceNav->LOA = $request->input('LOA');
        $annonceNav->BEAM = $request->input('BEAM');
        $annonceNav->DWT = $request->input('DWT');
        $annonceNav->DRAFT = $request->input('DRAFT');
        $annonceNav->save();

        return redirect()->route('annonceNav.show',
            $annonceNav->id)->with('flash_message',
            'Annonce navire pour le , ' . $annonceNav->date_dentree . ' updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $annonceNav = annonceNav::findOrFail($id);
        $annonceNav->delete();

        return redirect()->route('annonceNav.index')
            ->with('flash_message',
                'Annonce navire successfully deleted');

    }
}


    /*public function __construct()
    {
        $this->middleware('auth');
    }*/


    /*public function index()
    {
        $arr['annoncenav'] = annonceNav::all();
        return view('Consignataire.annonceNav.index')->with($arr);
    }*/


