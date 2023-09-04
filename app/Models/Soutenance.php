<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soutenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_etd',
        'nom_etudiant',
        'prenom_etudiant',
        'nom_projet',
        'num_salle',
        'date_soutenance',
        'heure_soutenance',
        'encadrant',
        'note_finale',
    ];
}
