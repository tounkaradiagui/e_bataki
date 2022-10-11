<?php

namespace App\Http\Controllers;

use App\Models\courriers_entrants;
use App\Models\secretaire;
use App\Models\utilisateurs;
use Illuminate\Http\Request;

class CourriersEntrantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bara = utilisateurs::all();

        $crst = courriers_entrants::all();
        return view('courriermodalentrants', compact('crst','bara'));

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
            'expediteur' => 'required'
            
        ]);
        $crst = courriers_entrants::create($validatedData);
        return redirect('/courriers_entrants')->with('success', 'courrier receptionné avec succèss!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\courriers_entrants  $courriers_entrants
     * @return \Illuminate\Http\Response
     */
    public function show(courriers_entrants $courriers_entrants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\courriers_entrants  $courriers_entrants
     * @return \Illuminate\Http\Response
     */
    public function edit(courriers_entrants $courriers_entrants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\courriers_entrants  $courriers_entrants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, courriers_entrants $courriers_entrants, $id)
    {
        $validatedata = courriers_entrants::find($courriers_entrants);
        $validatedata->num_reference = $request->input('num_reference');
        $validatedata->objet = $request->input('objet');
        $validatedata->expediteur = $request->input('expediteur');
        $validatedata->save();
        return redirect('/courriers_entrants')->with('success', 'Courrier mise à jour avec succèss!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\courriers_entrants  $courriers_entrants
     * @return \Illuminate\Http\Response
     */
    public function destroy(courriers_entrants $courriers_entrants)
    {
        $courriers_entrants = courriers_entrants::findOrFail($courriers_entrants);
        $courriers_entrants->delete();
        return redirect('/courriers_entrants')->with('success', 'courrier supprimer avec succèss!!!');
    }
}
