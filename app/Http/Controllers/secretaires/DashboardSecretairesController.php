<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\courriers_entrants;
use App\Models\courriers_sortants;

class DashboardSecretairesController extends Controller
{
    public function index()
    {
        $courriers_reçus = courriers_entrants::all();
        $courriers_envoyes = courriers_sortants::all();
        $courriers_reçus_sec = courriers_entrants::count();
        return view('secretaire.dashboard',compact('courriers_reçus','courriers_envoyes', 'courriers_reçus_sec'));

    }
}
