<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\secretaires;
use App\Models\utilisateurs;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardUsersController extends Controller
{

    public function index()
    {
      return view('utilisateurs.dashboard');

    }
}
