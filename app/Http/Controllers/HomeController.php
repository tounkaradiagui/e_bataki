<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\secretaires;
use App\Models\utilisateurs;
use App\Models\admins;
use App\Models\courriers_entrants;
use App\Models\courriers_sortants;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();


        if($user->status == 'utilisateur')
        {
            $utilisateur = utilisateurs::where ('id_users', $user->id)->first();
            return view ('utilisateurs.dashboard',compact('utilisateur'));
        }

        elseif($user->status == 'admin')
        {
            $courriers_reçus_sec = courriers_entrants::count();
            $courriers_envoyes = courriers_sortants::count();
            $secretaires = secretaires::all();
            $users = user::all();
            $admin = admins::where ('id_users', $user->id)->first();

            return view ('admin.dashboard',compact('admin','courriers_reçus_sec','courriers_envoyes','secretaires','users'));

        }

        elseif($user->status == 'secretaire')
        {
            $courriers_reçus = courriers_entrants::all();
            $courriers_reçus_sec = courriers_entrants::count();
            $courriers_envoyes = courriers_sortants::all();
            $secretaire = secretaires::where ('id_users', $user->id)->first();

            return view ('secretaire.dashboard',compact('secretaire','courriers_reçus','courriers_envoyes', 'courriers_reçus_sec'));

        }

        else
        {
          return view('home');
        }

    }
}
