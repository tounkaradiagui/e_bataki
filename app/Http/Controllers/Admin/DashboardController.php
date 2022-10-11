<?php

namespace App\Http\Controllers\Admin;
use App\Models\utilisateurs;
use App\Models\secretaires;
use App\Models\admins;
use App\Models\user;



use App\Http\Controllers\Controller;
use App\Models\courriers_entrants;
use App\Models\courriers_sortants;


class DashboardController extends Controller
{

    public function index()
    {


        $courriers_reçus_sec = courriers_entrants::count();
        $courriers_envoyes = courriers_sortants::count();
        $secretaires = secretaires::all();
        $users = user::all();
        //$secretaires = User::where('status == secretaire')->count();
        return view('admin/dashboard',compact('courriers_reçus_sec','courriers_envoyes','secretaires','users'));

    }


}

