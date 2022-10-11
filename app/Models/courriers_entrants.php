<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courriers_entrants extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_reference',
        'objet',
        'expediteur',
        'id_secretaire',
        'pdf_courriers',
    ];

    public function secretaires()
    {
        return $this->belongsTo(secretaires::class,'id_secretaire');
    }
}
