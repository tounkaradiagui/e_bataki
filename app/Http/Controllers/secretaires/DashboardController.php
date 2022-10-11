<?php

namespace App\Http\Controllers\secretaires;

use App\Http\Controllers\Controller;
use App\Models\courriers_entrants;
use App\Models\courriers_sortants;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    
        $courriers_reçus_sec = courriers_entrants::count();
        $courriers_envoyes_sec = courriers_sortants::count();
        return view('secretaire.dashboard', compact('courriers_reçus_sec', 'courriers_envoyes_sec'));

    }
}
