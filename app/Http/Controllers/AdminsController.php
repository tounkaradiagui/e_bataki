<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\admins;
use App\Models\courriers_entrants;
use App\Models\courriers_sortants;
use App\Models\User;

use App\Models\departements;
use App\Models\secretaires;

class AdminsController extends Controller
{
    public function index()
    {

        $departements= departements::all();
        $admins= admins::all();

        return view('adminsmodal',compact('departements','admins'));

    }

    public function create()
    {
        $secretaires = secretaires::count();
        return view('admins.dashboard',compact('secretaires'));

    }


    public function store(Request $request)
    {
        $nagnana = $request->validate(
            [

                'nom'=>['required','string','max:225'],
                'prenom'=>['required','string','max:225'],
                'adresse'=>['required','string','max:225'],
                'phone'=>['required','string','max:50'],
                'username'=>['required','string','max:225'],
                'email'=>['required','string','email','max:50','unique:users'],

                'password'=>['required','string','min:5','confirmed']


            ]
            );

            if($nagnana)
            {
                $user =  User::create(
                    [
                        'nom' => $request['nom'],
                        'prenom' => $request['prenom'],

                        'email' =>$request['email'],
                        'password' => bcrypt($request['password']),
                        'status' => 'admin',
                    ]

                    );

                    if($user)
                    {
                        $adminis = admins::create(
                            [
                                'id_users' => $user->id,
                                'nom'=>$request['nom'],
                                'prenom'=>$request['prenom'],
                                'adresse'=>$request['adresse'],
                                'phone'=>$request['phone'],


                                'email'=>$request['email'],
                                'username'=>$request['username'],
                                'password' => bcrypt($request['password']),

                            ]
                            );

                            return redirect('/adminskoura')->with('success', 'Admin ajouté avec Succes!!');


                    }
            }

    }
}
