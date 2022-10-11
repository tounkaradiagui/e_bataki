<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilisateurskouraController extends Model
{
    use HasFactory;
    protected $fillable =  [
        'nom',
        'prenom',
        'adresse',
        'phone',
        'email',
        'username',
        'password',
        'poste',
        'id_departement',
        'id_users'];  

    public function users()
    {
        return $this->belongsTo(User::class,'id_users');

    }
}

