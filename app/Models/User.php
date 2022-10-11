<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'status',

    ];

    public function secretaires()
    {
        return $this->hasMany(secretaires::class,'id_users');
    }

    public function admins()
    {
        return $this->hasMany(admins::class,'id_users');

    }

    public function utilisateurs()
    {
        return $this->hasMany(utilisateurs::class,'id_users');

    }
    public function UtilisateurskouraController()
    
        {
            return $this->hasMany(UtilisateurskouraController::class,'id_users');
    
        }
    

    public function departements()
    {
        return $this->hasMany(departements::class,'nom');

    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
