<?php

namespace App\Http\Controllers\Admin;

use App\Models\courriers_entrants;
use App\Models\secretaire;
use App\Models\utilisateurs;
use Illuminate\Support\Facades\Validator;


use App\Http\Controllers\Controller;
use App\Models\secretaires;
use Illuminate\Http\Request;

class CourriersEntrantskouraController extends Controller
{
    public function index()
    {
        $bara = secretaires::all();
        $crst = courriers_entrants::all();
        return view('admin.courriersentrants.indexce', compact('crst','bara'));

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
            'expediteur' => 'required',
            'id_secretaire' => 'required',
            'pdf_courriers' => 'required|mimes:pdf|max:1000',
        
            
        ]);
        
        if($validatedData)
        {
            $fileName = time().'.'.$request->pdf_courriers->extension();  
                $request->pdf_courriers->move(public_path('courriers/entrants'), $fileName);
                $crst = courriers_entrants::create(
                [

                    'num_reference'=>$request['num_reference'],
                    'objet'=>$request['objet'],
                    'expediteur'=>$request['expediteur'],
                    'id_secretaire'=>$request['id_secretaire'],
                    'pdf_courriers'=>$fileName,

                ]
            );
        }
   

        return redirect('admin/courrierentrandd')   ;
        

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
    public function update(Request $request,$id )
    {
        $validatedata = courriers_entrants::find($id);
        $validatedata->num_reference = $request->input('num_reference');
        $validatedata->objet = $request->input('objet');
        $validatedata->expediteur = $request->input('expediteur');
        $validatedata->save();
        return view('admin.courriersentrants.indexce')->with('success', 'Courrier mise à jour avec succèss!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\courriers_entrants  $courriers_entrants
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $courriers_entrants = courriers_entrants::findOrFail($id);
        $courriers_entrants->delete();
        return view('admin.courriersentrants.indexce')->with('success', 'courrier supprimer avec succèss!!!');
    }
}
