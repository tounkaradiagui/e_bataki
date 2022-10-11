<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
             
Route::resource('/courriers_sortants', 'CourriersSortantsController');
Route::resource('/users/dashboard/courriers_sortants', 'CourriersSortantsController');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function() {



    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('courriers_sortants', [App\Http\Controllers\Admin\CourriersSortantsController::class, 'index']);
    Route::post('courriers_sortants', [App\Http\Controllers\Admin\CourriersSortantsController::class, 'store']);


    Route::get('/utilisateursadd', [App\Http\Controllers\Admin\UtilisateursKouraController::class,'index']);
    Route::post('/utilisateursadd', [App\Http\Controllers\Admin\UtilisateursKouraController::class,'store']);
    Route::get('/utilisateurskacourriers', [App\Http\Controllers\Admin\UtilisateursKouraController::class,'voirmescourriers'])->name('centrantsdestinateursfinal');



    Route::get('/courrierentrandd', [App\Http\Controllers\Admin\CourriersEntrantskouraController::class,'index']);
    Route::post('/courrierentrandd', [App\Http\Controllers\Admin\CourriersEntrantskouraController::class,'store']);

    Route::get('secretaire', [App\Http\Controllers\Admin\SecretaireController::class, 'index']);
    Route::post('secretaire',[App\Http\Controllers\Admin\SecretaireController::class, 'store']);

    // Route::get('mon-profile', [App\Http\Controllers\Admin\::class, 'index']);
    Route::get('mon-profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'] )->name('mon-profile');
    Route::post('mon-profile-update', [App\Http\Controllers\Admin\ProfileController::class, 'store'] )->name('mon-profile');


});

Route::prefix('users')->group(function() {
    Route::get('dashboard', [App\Http\Controllers\users\DashboardUsersController::class, 'index']);

    Route::get('mon-profile', [App\Http\Controllers\users\ProfileController\ProfileController::class, 'index'] )->name('mon-profile');
    Route::post('mon-profile-update', [App\Http\Controllers\users\ProfileController\ProfileController::class, 'store'] )->name('mon-profile');

  
});

Route::prefix('secretaire')->group(function() {
    Route::get('dashboard', [App\Http\Controllers\secretaires\DashboardController::class, 'index']);
    Route::get('secretaire',[App\Http\Controllers\Admin\SecretaireController::class, 'voircourrier'])->name('mescourriers');
    Route::get('envoyercourrierformulaire/{id}',[App\Http\Controllers\Admin\SecretaireController::class, 'voirform'])->name('sendformuser');
    Route::patch('sendusercourrier/{id}',[App\Http\Controllers\Admin\SecretaireController::class, 'sendcingcourr'])->name('sendcourriertodestinataire');
    Route::get('courriers_sortants_list',[App\Http\Controllers\secretaires\CourriersSortantsController::class, 'index'])->name('courriersSortants');
    Route::post('courriers_sortants_ajout',[App\Http\Controllers\secretaires\CourriersSortantsController::class, 'store'])->name('enregistrercourriersSortants');
    Route::post('envoiuserformulaire',[App\Http\Controllers\Admin\SecretaireController::class, 'voircourrier'])->name('sendcourriertodestinataire');

    Route::get('mon-profile', [App\Http\Controllers\secretaires\ProfileController\ProfileController::class, 'index'] )->name('mon-profile');
    Route::post('mon-profile-update', [App\Http\Controllers\secretaires\ProfileController\ProfileController::class, 'store'] )->name('mon-profile');

 
});





Route::resource('/utilisateurs', 'UtilisateursController',['only' => [ 'index', 'create','store']]);
Route::resource('/departements', 'DepartementsController');
Route::resource('/adminskoura', 'AdminsController',['only' => [ 'index', 'create','store']]);


Route::resource('/courriers_entrants', 'CourriersEntrantsController');

Route::resource('/users/dashboard/courriers_entrants', 'CourriersEntrantsController');








?>
