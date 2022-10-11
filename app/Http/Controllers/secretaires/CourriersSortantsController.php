<?php

namespace App\Http\Controllers\secretaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admins;
use App\Models\utilisateurs;
use App\Models\courriers_entrants;
use App\Models\courriers_sortants;
use App\Models\secretaires;




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
        return view('admin.secretaire.courrierssortants', compact('crst','bara'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'destinateur' => 'required',
            'id_utilisateurs' => 'required',
            'pdf_courriers' => 'required|mimes:pdf|max:1000',


        ]);

        if($validatedData)
        {
            $fileName = time().'.'.$request->pdf_courriers->extension();
                $request->pdf_courriers->move(public_path('courriers/sortants'), $fileName);
                $crst = courriers_sortants::create(
                [

                    'num_reference'=>$request['num_reference'],
                    'objet'=>$request['objet'],
                    'destinateur'=>$request['destinateur'],
                    'id_utilisateurs'=>$request['id_utilisateurs'],
                    'pdf_courriers'=>$fileName,

                ]
            );
        }


        return redirect('secretaire/courriers_sortants_list')->with('success', 'courrier envoyé avec succèss!!!');
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
