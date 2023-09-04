<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
            
        'num_etd',
        'nom_projet',
        'nom_etudiant',
        'prenom_etudiant',
        'filiere_etudiant',
        'etat',
    
        ];
}
