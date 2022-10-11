<?php

namespace App\Http\Controllers;
use App\Models\departements;
use App\Models\utilisateurs;

use Illuminate\Http\Request;

class DepartementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $departements = departements::all();
        return view('admin.departements.departementsmodal')->with('departements',$departements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    public function create()
    {
       
        return view('departementsmodal');
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
            'nom' => 'required|max:255',
            ]);

            $departements = Departements::create($validatedData);
    
        return redirect('/departements')->with('success', 'DEPARTEMENT AJOUTÉ AVEC SUCCES');
        $structure = $request->validate([
            'nom' => 'required',
            ]);

        departements::create($departements);
        return redirect('/departements')->with('success', 'Departement ajouté avec Succes!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departements = Departements::findOrFail($id);
        return view('show', compact('departements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departements = departements::findOrFail($id);

    return view('edit', compact('departements'));
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
        $validatedData = $request->validate([
            'nom' => 'required',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departements = departements::findOrFail($id);
        $departements->delete();
    
        return redirect('/departements')->with('success', 'SUPPRIMER  REUSSIE');
    }
}
