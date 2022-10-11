<?php

namespace App\Http\Controllers;

use App\Models\courriers_sortants;
use App\Models\courriers_entrants;
use App\Models\utilisateurs;
use Illuminate\Http\Request;

class CourriersSortantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bara = utilisateurs::all();

        $crst = courriers_sortants::all();
        return view('admin.courriersortants.index', compact('crst','bara'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'num_reference' => 'required',
            'objet' => 'required',
            'destinateur' => 'required'
            
        ]);
    
        $crst = courriers_sortants::create($validatedData);
        return view('admin.courriersortants.index')->with('success', 'courrier envoyé avec succèss!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\courriers_sortants  $courriers_sortants
     * @return \Illuminate\Http\Response
     */
    public function show(courriers_sortants $courriers_sortants)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\courriers_sortants  $courriers_sortants
     * @return \Illuminate\Http\Response
     */
    public function edit(courriers_sortants $courriers_sortants)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\courriers_sortants  $courriers_sortants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedata = courriers_sortants::find($id);
        $validatedata->num_reference = $request->input('num_reference');
        $validatedata->objet = $request->input('objet');
        $validatedata->destinateur = $request->input('destinateur');
        $validatedata->save();
        return view('admin.courriersortants.index')->with('success', 'Courrier mise à jour avec succèss !!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\courriers_sortants  $courriers_sortants
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $courriers_sortants = courriers_sortants::findOrFail($id);
        $courriers_sortants->delete();
        return view('admin.courriersortants.index')->with('success', 'courrier supprimer avec succèss !!!');
    }
}
