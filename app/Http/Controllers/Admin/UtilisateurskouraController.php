<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\utilisateurs;
use App\Models\departements;
use App\Models\User;
use App\Models\courriers_entrants;

use Illuminate\Support\Facades\Auth;

class UtilisateurskouraController extends Controller
{
    public function index()
    {
        $departements = departements::all();
        $bara = utilisateurs::all();

        return view('admin.users.index',compact('departements','bara'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $departements = departements::all();
        dd($departements);
        return view('utilisateursmodal',compact('id', 'departements')); 
    }   
    
    public function voirmescourriers()
    {
        $user = Auth::user();
        $secretaire = utilisateurs::where('id_users', $user->id)->first();
        $mescourriers = courriers_entrants::where('id_utilisateurs',$secretaire->id)->orderBy('id','desc')->get();
        return view('admin.users.mescourentrants', compact('user', 'mescourriers'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barakaila = $request->validate([
        'nom' => ['required','string','max:225'],
        'prenom' => ['required','string','max:225'],
        'adresse' => ['required','string','max:225'],
        'phone' => ['required','string','max:50'],
        'email' => ['required','string','email','max:50','unique:users'],
        'username' => ['required','string','max:50','unique:utilisateurs'],
        'poste' => ['required','string','max:30'],
        'password'=>['required','string','min:5','confirmed'],
        'id_departement'=> 'required',
        
        ]);

        if($barakaila)
        {

        $merci= user::create(
            [

            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'email' =>$request['email'],
            'password' => bcrypt($request['password']),
            'status' => 'utilisateur',
            ]
            );

            if($merci)
            {
                $tchiden = utilisateurs::create(
                    [
                        'id_users' => $merci->id,

                        'nom' => $request['nom'],
                        'prenom'  => $request['prenom'],
                        'adresse'  => $request['adresse'],
                        'phone'  =>	$request['phone'],
                        'email' =>$request['email'],
                        'username' => $request['username'],
                        'password' => bcrypt($request['password']),
                        'poste'	=> $request['poste'],
                        'id_departement'=> $request['id_departement'],
                                                           
                    ]

                    );
            return redirect('admin/utilisateursadd')->with('success', 'Utilisateur ajouté avec Succes!!');

            }

        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\utilisateurs  $utilisateurs
     * @return \Illuminate\Http\Response
     */
    public function show(utilisateurs $utilisateurs)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\utilisateurs  $utilisateurs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\utilisateurs  $utilisateurs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barakaila = utilisateurs::find($id);
        $barakaila->nom = $request->input('nom');
        $barakaila->prenom = $request->input('prenom');
        $barakaila->adresse = $request->input('adresse');
        $barakaila->phone = $request->input('phone');
        $barakaila->email = $request->input('email');
        $barakaila->poste = $request->input('poste');
        $barakaila->id_departement = $request->input('id_departement');
        $barakaila->save();
        return view('admin.users.index')->with('success', 'utilisateur Modifié avec Succes!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\utilisateurs  $utilisateurs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barakaila = utilisateurs::find($id) ;
        $barakaila->delete();
        return redirect('admin.users.index')->with('success', 'Utilisateurs Supprimé avec Succes!!');
    }

}
