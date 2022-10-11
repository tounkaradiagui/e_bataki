<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secretaires extends Model
{
    use HasFactory;



    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'phone',
        'email',
        'username',
        'password',
        'id_departement',
        'id_users'

    ];

    public function users()
    {
        return $this->belongsTo(User::class,'id_users');

    }

    public function courriersentrants()
    {
        return $this->hasMany(courriers_entrants::class,'id_secretaire');

    }
}
