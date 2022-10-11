<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courriers_sortants extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_reference',
        'objet',
        'destinateur',
        'pdf_courriers',
        'id_utilisateurs',
        ];
}


